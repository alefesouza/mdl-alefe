<?php
$en = strpos($_SERVER["HTTP_HOST"], "en") !== false;

function postDecoder($content) {
  $final = $content;
  $final = str_replace('[section]', '</p><div class="mdl-grid"><div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col">', $final);
  $final = str_replace('[/section]', '</div></div><p>', $final);
  $final = str_replace('[title]', '<div class="mdl-card__title"><h2 class="mdl-card__title-text">', $final);
  $final = str_replace('[/title]', '</h2></div>', $final);
  $final = str_replace('[scontent]', '<div class="mdl-card__supporting-text"><p>', $final);
  $final = str_replace('[/scontent]', '</p></div>', $final);
  return $final;
}

function sendMail($name, $email, $subject, $message) {
  global $send;
  if($name == "" || $email == "" || $subject == "" || $message == "") {
    echo "<script>alert(\"Por favor, preencha todos os campos.\");</script>";
    $send = false;
  } else {
    $headers = "Reply-To: ".$email."\r\n".
    "X-Mailer: PHP/".phpversion();
    $name_contact = "Nome: ".$name."\n";
    $email_contact = "Email: ".$email."\n";
    $subject_contact = "Email: ".$email." Assunto: ".$subject;
    $message_contact = $name_contact.$email_contact."Assunto: ".$subject."\n\nMensagem: ".$message;
    mail("contato@alefesouza.com", $subject_contact, $message_contact, $headers);
    $send = true;
    echo "<script>alert(\"Mensagem enviada!\");</script>";
  }
}

function defaultScripts() {
?>
<script src="<? echo get_stylesheet_directory_uri(); ?>/js/jquery-3.1.1.min.js"></script>
<script src="<? echo get_stylesheet_directory_uri(); ?>/js/material-1.2.1.min.js"></script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-77462021-1', 'auto');
  ga('send', 'pageview');

</script>

<script>
$("main .mdl-card__supporting-text a").not("table a").attr("target", "_blank");
</script>
<?php }

add_action('wp_footer', 'defaultScripts');
add_filter('wpseo_json_ld_output', '__return_false');

function endsWith($haystack, $needle) {
    return $needle === "" || (($temp = strlen($haystack) - strlen($needle)) >= 0 && strpos($haystack, $needle, $temp) !== false);
}
?>