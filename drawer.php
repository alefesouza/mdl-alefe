<?php
if ($_SERVER['HTTP_HOST'] === 'alefesouza.com.br') {
  	$en = false;
} else {
  	$en = true;
}
?>
<nav class="mdl-navigation" id="site-items">
    <a class="mdl-navigation__link mdl-button mdl-js-button mdl-js-ripple-effect<?php if($_SERVER['REQUEST_URI'] == '/') echo ' selected'; ?>" href="/">
        <i class="mdl-color-text--black material-icons">home</i>
        <span><?= $en ? 'Home' : 'Início'; ?></span>
    </a>

    <?php lateralIcon('blog', 'library_books', 'Blog', 'Blog'); ?>
    <?php lateralIcon('talks', 'record_voice_over', 'Lectures', 'Palestras'); ?>
    <?php lateralIcon('portfolio', 'work', 'Portfolio', 'Portfólio'); ?>
    <?php lateralIcon('contact', 'email', 'Contact', 'Contato'); ?>
    <span class="category"><?= $en ? 'Social networks' : 'Redes sociais'; ?></span>
    <?php socialIcon('https://alefe.io/f', 'facebook', 'Facebook', 'FB'); ?>
    <?php socialIcon('https://alefe.io/g', 'github', 'GitHub', 'GH'); ?>
    <?php socialIcon('https://alefe.io/gp','googleplus', 'Google+', 'G+'); ?>
    <?php socialIcon('https://alefe.io/l', 'linkedin', 'LinkedIn', 'LI'); ?>
    <?php socialIcon('https://alefe.io/t', 'twitter', 'Twitter', 'TW'); ?>
    <?php socialIcon('https://alefe.io/w', 'wakatime', 'WakaTime', 'WT'); ?>

    <span class="category"><?= $en ? "Recent posts" : "Posts recentes"; ?></span>
    <?php
        $drawer_query = new WP_Query(array('post_type' => 'post'));
        $drawer_posts = $drawer_query->get_posts();

        foreach($drawer_posts as $drawer_post) {
            lateralIcon($drawer_post->post_name, 'description', $drawer_post->post_title, $drawer_post->post_title, 'post-drawer');
        }
    ?>
</nav>
