<?php get_header();

$en = $_SERVER['HTTP_HOST'] === 'alefesouza.com';
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
                    <a href="<?php the_permalink(); ?>">
                        <h2 class="mdl-card__title-text"><?php the_title(); ?></h2>
                    </a>
                </div>
                <small><?php the_date('Y-m-d') ?></small>
                <div class="mdl-card__supporting-text">
                    <?php the_content(); ?>

                    <div class="talk-links">
                    <?php
                        make_link(get_field('code'), 'Code', 'Código');
                        make_link(get_field('slides'), 'Slides (Speaker Deck)', 'Slides (Speaker Deck)');
                        make_link(get_field('video'), 'Video', 'Vídeo');
                    ?>
                    </div>

                    <?php
                    if (!empty(get_field('gallery'))) {
                    ?>
                    <div class="talk-media" id="gallery">
                        <?php photo_gallery(get_field('gallery')); ?>
                    </div>
                    <?php
                    }

                    if (!empty(get_field('speakerdeck_id'))) {
                    ?>
                    <div class="talk-media" id="slides">
                        <script async class="speakerdeck-embed" data-id="<?= get_field('speakerdeck_id') ?>" data-ratio="1.77725118483412" src="//speakerdeck.com/assets/embed.js"></script>
                    </div>
                    <?php
                    }
                    ?>

                    <div class="flex-center">
                         <i class="mdl-color-text--black material-icons">location_on</i>
                         <a href="<?php the_field('location_link'); ?>"><?php the_field('location'); ?></a>
                    </div>

                    <div class="flex-center">
                         <i class="mdl-color-text--black material-icons">event</i>
                         <a href="<?php the_field('link'); ?>"><?php the_field('event'); ?></a>
                    </div>
                </div>
                <meta itemprop="position" content="<?= $count++; ?>" />
            </div>
        </div>
        <script type="application/ld+json">
        <?= json_encode([
            '@context' => 'http://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => [[
                '@type' => 'ListItem',
                'position' => 1,
                'item' => [
                    '@id' => get_site_url().'/talks',
                    'name' => $en ? 'Lectures' : 'Palestras'
                ]
            ],
            [
                '@type' => 'ListItem',
                'position' => 2,
                'item' => [
                    '@id' => get_site_url().'/'.$wp->request,
                    'name' => get_the_title()
                ]
            ]]
        ]); ?>
      </script>
      <script>
      // Sorry for this
      setTimeout(function() {
        if(window.location.hash) {
          $('.mdl-layout__content').animate({
            scrollTop: $(window.location.hash).offset().top
          }, 500);
        }
      }, 3000);
      </script>
 <?php  }
    }

get_footer();
