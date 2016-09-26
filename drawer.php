<?php
$en = strpos($_SERVER["HTTP_HOST"], "en") !== false;

function getSelected($value) {
	if(strpos($_SERVER["REQUEST_URI"], $value) !== false) {
		echo " selected";
	}
}
?>
	<nav class="mdl-navigation">
      <a class="mdl-navigation__link mdl-button mdl-js-button mdl-js-ripple-effect<? if($_SERVER["REQUEST_URI"] == "/") echo " selected"; ?>" href="/"><i class="mdl-color-text--black material-icons">home</i> <? echo $en ? "Home" : "Início"; ?></a>
      <a class="mdl-navigation__link mdl-button mdl-js-button mdl-js-ripple-effect<? getSelected("profile"); ?>" href="/profile/"><i class="mdl-color-text--black material-icons">person</i> <? echo $en ? "Profile (pt)" : "Perfil"; ?></a>
      <a class="mdl-navigation__link mdl-button mdl-js-button mdl-js-ripple-effect<? getSelected("blog/"); ?>" href="/blog/"><i class="mdl-color-text--black material-icons">library_books</i> Blog <? echo $en ? " (pt)" : ""; ?></a>
      <a class="mdl-navigation__link mdl-button mdl-js-button mdl-js-ripple-effect<? getSelected("portfolio"); ?>" href="/portfolio/"><i class="mdl-color-text--black material-icons">work</i> <? echo $en ? "Portfolio" : "Portfólio"; ?></a>
      <a class="mdl-navigation__link mdl-button mdl-js-button mdl-js-ripple-effect<? getSelected("contact"); ?>" href="/contact/"><i class="mdl-color-text--black material-icons">email</i> <? echo $en ? "Contact" : "Contato"; ?></a>
      <span class="category"><? echo $en ? "Social networks" : "Redes sociais"; ?></span>
      <a class="mdl-navigation__link mdl-button mdl-js-button mdl-js-ripple-effect" target="_blank" href="http://facebook.com/alefesouza5"><img src="<? echo get_stylesheet_directory_uri(); ?>/images/facebook.png" alt="FB"> Facebook</a>
      <a class="mdl-navigation__link mdl-button mdl-js-button mdl-js-ripple-effect" target="_blank" href="http://github.com/alefesouza"><img src="<? echo get_stylesheet_directory_uri(); ?>/images/github.png" alt="GH"> GitHub</a>
      <a class="mdl-navigation__link mdl-button mdl-js-button mdl-js-ripple-effect" target="_blank" href="http://plus.google.com/+AlefeSouza"><img src="<? echo get_stylesheet_directory_uri(); ?>/images/googleplus.png" alt="G+"> Google+</a>
      <a class="mdl-navigation__link mdl-button mdl-js-button mdl-js-ripple-effect" target="_blank" href="http://linkedin.com/in/alefesouza"><img src="<? echo get_stylesheet_directory_uri(); ?>/images/linkedin.png" alt="LI"> LinkedIn</a>
      <a class="mdl-navigation__link mdl-button mdl-js-button mdl-js-ripple-effect" target="_blank" href="http://twitter.com/alefERROR"><img src="<? echo get_stylesheet_directory_uri(); ?>/images/twitter.png" alt="TW"> Twitter</a>
      <span class="category"><? echo $en ? "Recent posts (pt)" : "Posts recentes"; ?></span>
			<?php
			$drawer_query = new WP_Query(array('post_type' => 'post'));
			$drawer_posts = $drawer_query->get_posts();
			foreach($drawer_posts as $drawer_post) { ?>
		<a class="mdl-navigation__link mdl-button mdl-js-button mdl-js-ripple-effect post-drawer <? getSelected($drawer_post->post_name); ?>" href="/blog/<?php echo $drawer_post->post_name; ?>"><i class="mdl-color-text--black material-icons">description</i> <?php echo $drawer_post->post_title; ?></a>
			<?php } ?>
    </nav>