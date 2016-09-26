<?php
header('Content-Type: text/html; charset=utf-8');
$en = strpos($_SERVER["HTTP_HOST"], "en") !== false;
?>
<!doctype html>
<html lang="<? echo $en ? "en" : "pt-br"; ?>">
<head>
  <? if($_SERVER["REQUEST_URI"] == "/") { ?>
  <title><?php bloginfo("name"); ?></title>
  <? } else if($_SERVER["REQUEST_URI"] == "/blog/") { ?>
  <title>Blog - Alefe Souza</title>
  <? } else { ?>
  <title><? the_title(); ?> - Alefe Souza</title>
  <? } ?>
  
  <link rel="alternate" type="application/rss+xml" title="Feed do blog Alefe Souza" href="<?php bloginfo('rss2_url'); ?>" />
  <link rel="alternate" type="application/rss+xml" title="Feed de comentários do blog Alefe Souza" href="<?php bloginfo('comments_rss2_url'); ?>" />
  
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="<? echo get_stylesheet_directory_uri(); ?>/css/material-1.2.1.min.css">
  <link rel="stylesheet" href="<? echo get_stylesheet_uri(); ?>?v=5">
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <meta name="language" content="pt-br" />
  <meta name="google-site-verification" content="ui_JocACR5AX0U8EB4HLs8PeEfbck8Gg_0jOTy8jAqA" />
  <meta name="msvalidate.01" content="255D71299485237121F5717F3850B0D5" />
  <meta name="keywords" content="blog, programming, programacao, fotografia, photography, java, c#, c sharp, php, xamarin, .net, developer, desenvolvedor" />
  <meta name="author" content="Alefe Souza" />
  
  <?php wp_head(); ?>

  <meta name="theme-color" content="#0000cc">
  
  <link rel="manifest" href="<?php echo get_stylesheet_directory_uri(); ?>/extras/manifest<? echo $en ? ".en" : ""; ?>.json" />
  
  <meta name="apple-mobile-web-app-title" content="Alefe Souza" />
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-status-bar-style" content="default" />
  <link rel="apple-touch-icon-precomposed" sizes="60x60" href="http://alefesouza.com/wp-content/uploads/2016/05/cropped-favicon-3-60x60.png" />
  <link rel="apple-touch-icon-precomposed" sizes="76x76" href="http://alefesouza.com/wp-content/uploads/2016/05/cropped-favicon-3-76x76.png" />
  <link rel="apple-touch-icon-precomposed" sizes="120x120" href="http://alefesouza.com/wp-content/uploads/2016/05/cropped-favicon-3-120x120.png" />
  <link rel="apple-touch-icon-precomposed" sizes="152x152" href="http://alefesouza.com/wp-content/uploads/2016/05/cropped-favicon-3-152x152.png" />
  
  <script type='application/ld+json'>{"@context":"http:\/\/schema.org","@type":"WebSite","url":"http:\/\/alefesouza.com\/","name":"Alefe Souza","potentialAction":{"@type":"SearchAction","target":"http:\/\/alefesouza.com\/?s={search_term_string}","query-input":"required name=search_term_string"}}</script>
  <script type='application/ld+json'>{"@context":"http:\/\/schema.org","@type":"Person","url":"http:\/\/alefesouza.com\/","sameAs":["http:\/\/facebook.com\/alefesouza5","http:\/\/linkedin.com\/in\/alefesouza","http:\/\/youtube.com\/c\/alefesouza","http:\/\/twitter.com\/alefERROR","http:\/\/twitter.com\/alefesouza5", "http:\/\/plus.google.com\/+AlefeSouza", "http:\/\/panoramio.com\/user\/alefesouza"],"name":"Alefe Souza", "email": "contato@alefesouza.com", "jobTitle": "Mobile, .NET and web developer", "alumniOf": "UNINOVE", "birthPlace": "Ipia\u00fa, Bahia, Brazil", "homeLocation": "S\u00e3o Paulo, S\u00e3o Paulo, Brazil"}</script>
</head>
<body>
<div class="mdl-layout mdl-js-layout
            mdl-layout--fixed-header mdl-layout--fixed-drawer mdl-layout--fixed-tabs">
  <header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
      <span class="mdl-layout-title">Alefe Souza</span>
      <div class="mdl-layout-spacer"></div>
      
      <a class="mdl-button mdl-js-button mdl-button--icon change-language <?php echo $en ? "pt-br" : "en"; ?>" rel="noreferrer" title="<?php echo $en ? "Português" : "English"; ?>" href="<? if($en) { $language_link = str_replace("en.", "", $_SERVER["HTTP_HOST"]); } else { $language_link = "en.".$_SERVER["HTTP_HOST"]; } echo "http://".$language_link.$_SERVER["REQUEST_URI"]; ?>"></a>
    </div>
      <?php if(endsWith($_SERVER["REQUEST_URI"], "portfolio/") !== false) { ?>
      <div class="mdl-layout__tab-bar mdl-js-ripple-effect">
        <a href="#scroll-tab-1" class="mdl-layout__tab is-active">Meus projetos</a>
        <a href="#scroll-tab-2" class="mdl-layout__tab">Em agências</a>
        <? if(false) { ?><a href="#scroll-tab-3" class="mdl-layout__tab">Freelancer</a><? } ?>
      </div>
      <?php } ?>
  </header>
  <div class="mdl-layout__drawer">
    <? include("drawer.php"); ?>
  </div>