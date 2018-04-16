<?php
header('Content-Type: text/html; charset=utf-8');

$en = $_SERVER['HTTP_HOST'] === 'alefesouza.com';

if ($en) {
    $language_link = 'https://alefesouza.com';
} else {
    $language_link = 'http://alefesouza.com.br';
}
?>
<!doctype html>
<html lang="<?= $en ? 'en' : 'pt-br'; ?>">
<head>
    <?php if($_SERVER['REQUEST_URI'] === '/') { ?>
    <title><?php bloginfo('name'); ?></title>
    <?php } else if($_SERVER['REQUEST_URI'] === '/blog/') { ?>
    <title>Blog - Alefe Souza</title>
    <?php } else { ?>
    <title><?php the_title(); ?> - Alefe Souza</title>
    <?php } ?>

    <link rel="alternate" type="application/rss+xml" title="<?= $en ? 'Alefe Souza\'s Blog' : 'Feed do blog Alefe Souza'; ?>" href="<?php bloginfo('rss2_url'); ?>" />
    <link rel="alternate" type="application/rss+xml" title="<?= $en ? 'Alefe Souza\'s Blog Comments' : 'Feed de comentários do blog Alefe Souza'; ?>" href="<?php bloginfo('comments_rss2_url'); ?>" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.blue-light_blue.min.css">
    <link rel="stylesheet" href="<?= get_stylesheet_uri(); ?>">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="language" content="<?= $en ? 'en' : 'pt-br'; ?>" />
    <?php if($en) { ?>
    <meta name="google-site-verification" content="ui_JocACR5AX0U8EB4HLs8PeEfbck8Gg_0jOTy8jAqA" />
    <?php } else { ?>
    <meta name="google-site-verification" content="Qb1Wdn2NgglcpdgSEOICMWOiNS1KRRo9YZ3PBjRgAxk" />
    <?php } ?>
    <meta name="msvalidate.01" content="255D71299485237121F5717F3850B0D5" />
    <meta name="keywords" content="blog, <?= $en ? 'programming, photography, developer,' : 'programacao, fotografia, desenvolvedor,'; ?> java, c#, c sharp, php, xamarin, .net framework" />
    <meta name="author" content="Alefe Souza" />

    <?php wp_head(); ?>

    <meta name="theme-color" content="#0000cc">

    <link rel="manifest" href="<?= get_stylesheet_directory_uri(); ?>/extras/manifest<?= $en ? '' : '.pt'; ?>.json" />

    <meta name="apple-mobile-web-app-title" content="Alefe Souza" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="default" />
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="<?= get_site_url(); ?>/wp-content/uploads/2016/05/cropped-favicon-3-60x60.png" />
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="<?= get_site_url(); ?>/wp-content/uploads/2016/05/cropped-favicon-3-76x76.png" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?= get_site_url(); ?>/wp-content/uploads/2016/05/cropped-favicon-3-120x120.png" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?= get_site_url(); ?>/wp-content/uploads/2016/05/cropped-favicon-3-152x152.png" />

    <link rel="icon" type="image/png" sizes="192x192" href="<?= get_site_url(); ?>/wp-content/uploads/2016/05/cropped-favicon-3-192x192.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= get_site_url(); ?>/wp-content/uploads/2016/05/cropped-favicon-3-96x96.png">

    <script type="application/ld+json">
    <?= json_encode([
        '@context' => 'http://schema.org',
        '@type' => 'WebSite',
        'url' => get_site_url(),
        'author' => 'Alefe Souza',
        'name' => 'Alefe Souza',
        'alternateName' => get_bloginfo('name'),
        'description' => get_bloginfo('description'),
        'potentialAction' => [
            '@type' => 'SearchAction',
            'target' => get_site_url() . '?s={search_term_string}',
            'query-input' => 'required name=search_term_string'
        ]
        ]);
    ?>
    </script>
    <script type="application/ld+json">
    <?= json_encode([
            '@context' => 'http://schema.org',
            '@type' => 'Person',
            'url' => get_site_url(),
            'name' => 'Alefe Souza',
            'image' => 'https://avatars1.githubusercontent.com/u/1693223',
            'email' => 'mailto:contact@alefesouza.com',
            'jobTitle' => 'Full Stack and Mobile Developer',
            'worksFor' => 'iMasters',
            'alumniOf' => 'FIAP',
            'birthPlace' => 'Ipiaú, Bahia, Brazil',
            'birthDate' => '1997.01.19',
            'gender' => 'male',
            'height' => '69 inches',
            'nationality' => 'Brazilian',
            'homeLocation' => 'São Paulo, São Paulo, Brazil',
            'sameAs' => ['https://facebook.com/alefesouza', 'https://linkedin.com/in/alefesouza', 'https://youtube.com/c/alefesouza', 'https://twitter.com/alefesouza', 'https://github.com/alefesouza', 'https://plus.google.com/+AlefeSouza']
        ]);
        ?>
    </script>
</head>
<body>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header mdl-layout--fixed-drawer mdl-layout--fixed-tabs">
    <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
        <span class="mdl-layout-title">Alefe Souza</span>
        <div class="mdl-layout-spacer"></div>

        <a class="mdl-button mdl-js-button mdl-button--icon change-language <?= $en ? 'pt-br' : 'en'; ?>" rel="noreferrer" title="<?= $en ? 'Português' : 'English'; ?>" href="<?= $language_link . '/' . $wp->request; ?>"></a>
        </div>
        <?php if(endsWith($_SERVER['REQUEST_URI'], 'portfolio/')) { ?>
        <div class="mdl-layout__tab-bar mdl-js-ripple-effect">
            <a href="#scroll-tab-1" class="mdl-layout__tab is-active"><?= $en ? 'My projects' : 'Meus projetos'; ?></a>
        </div>
        <?php } ?>
    </header>
    <div class="mdl-layout__drawer">
        <?php include("drawer.php"); ?>
    </div>
