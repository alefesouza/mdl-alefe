<?php get_header();

$en = $_SERVER['HTTP_HOST'] !== 'alefesouza.com.br';
?>
<main class="mdl-layout__content">
    <div class="wrapper">
        <div class="mdl-layout__header" style="height: 194px;"></div>
        <div class="page-content">
        <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post(); ?>
        <div class="mdl-grid post">
            <div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col">
                <div class="mdl-card__title">
                    <h2 class="mdl-card__title-text"><?php the_title(); ?></h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
        <script type="application/ld+json">
        <?= json_encode([
                '@context' => 'http://schema.org',
                '@type' => 'BreadcrumbList',
                'itemListElement' => [
                    [
                        '@type' => 'ListItem',
                        'position' => 1,
                        'item' => [
                            '@id' => get_site_url().'/portfolio',
                            'name' => $en ? 'Portfolio' : 'Portfólio'
                        ]
                    ], [
                        '@type' => 'ListItem',
                        'position' => 2,
                        'item' => [
                            '@id' => get_site_url().'/'.$wp->request,
                            'name' => get_the_title()
                        ]
                    ]
                ]
            ]); ?>
      </script>
 <?php  }
    }

get_footer();
