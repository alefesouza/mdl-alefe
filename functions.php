<?php

$en = $_SERVER['HTTP_HOST'] !== 'alefesouza.com.br';

if ($en) {
    define('WP_SITEURL', 'https://alefesouza.com');
    define('WP_HOME', 'https://alefesouza.com');
} else {
    define('WP_SITEURL', 'http://alefesouza.com.br');
    define('WP_HOME', 'http://alefesouza.com.br');
}

function postDecoder($content) {
    $content = str_replace('[section]', '</p><div class="mdl-grid"><div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col">', $content);
    $content = str_replace('[/section]', '</div></div><p>', $content);
    $content = str_replace('[title]', '<div class="mdl-card__title"><h2 class="mdl-card__title-text">', $content);
    $content = str_replace('[/title]', '</h2></div>', $content);
    $content = str_replace('[scontent]', '<div class="mdl-card__supporting-text"><p>', $content);
    $content = str_replace('[/scontent]', '</p></div>', $content);

    return $content;
}

function sendMail($name, $email, $subject, $message) {
    global $send;

    if(empty($name) || empty($email) || empty($subject) || empty($message)) {
        echo '<script>alert(\'Please, fill out all fields.\');</script>';
        $send = false;
    } else {
        $headers = 'Reply-To: '.$email.'\r\n'.
        'X-Mailer: PHP/'.phpversion();
        $name_contact = 'Name: '.$name.'\n';
        $email_contact = 'Email: '.$email.'\n';
        $subject_contact = 'Email: '.$email.' Subject: '.$subject;
        $message_contact = $name_contact.$email_contact.'Subject: '.$subject.'\n\nMessage: '.$message;
        mail('contact@alefesouza.com', $subject_contact, $message_contact, $headers);
        $send = true;

        echo '<script>alert(\'Your message has been sent successfully!\');</script>';
    }
}

function defaultScripts() {
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://code.getmdl.io/1.3.0/material.min.js"></script>

<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-77462021-1', 'auto');
    ga('send', 'pageview');
</script>

<script>
    $('main .mdl-card__supporting-text a').not('table a').attr('target', '_blank');
</script>
<?php
}

function make_link($link, $name, $name_pt) {
		global $en;

    if(!empty($link)) {
?>
        <a href="<?= $link ?>"><?= $en ? $name : $name_pt ?></a>&nbsp;
<?php
    }
}

function lateralIcon($link, $icon, $en_title, $pt_title, $extra_class = '') {
	  global $en;
    $selected = strpos($_SERVER["REQUEST_URI"], $link) !== false;
?>
    <a class="mdl-navigation__link mdl-button mdl-js-button mdl-js-ripple-effect<?= ($selected ? ' selected' : ' ') . $extra_class; ?>" href="/<?= $link; ?>/">
        <i class="mdl-color-text--black material-icons"><?= $icon; ?></i>
        <span><?= $en ? $en_title : $pt_title; ?></span>
    </a>
<?php }

function socialIcon($link, $icon, $title, $alt) { ?>
    <a class="mdl-navigation__link mdl-button mdl-js-button mdl-js-ripple-effect" target="_blank" href="<?= $link; ?>">
        <img src="<?= get_stylesheet_directory_uri(); ?>/images/<?= $icon; ?>.png" alt="<?= $alt; ?>"> <?= $title; ?>
    </a>
<?php }

add_action('wp_footer', 'defaultScripts');
add_filter('wpseo_json_ld_output', '__return_false');

function endsWith($haystack, $needle) {
    return $needle === '' || (($temp = strlen($haystack) - strlen($needle)) >= 0 && strpos($haystack, $needle, $temp) !== false);
}
