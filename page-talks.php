<?php get_header();

$count = 1;

$queryMyTalks = new WP_Query(['post_type' => 'talks']);
?>
    <main class="mdl-layout__content">
        <div class="wrapper">
            <section class="mdl-layout__tab-panel is-active" id="talks-items">
                <?php
                if ($queryMyTalks->have_posts()) {
                    while ($queryMyTalks->have_posts()) {
                        $queryMyTalks->the_post(); ?>
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
                                make_link(get_permalink() . '#slides', 'Slides', 'Slides');
                                make_link(get_permalink() . '#gallery', 'Gallery', 'Galeria');
                                make_link(get_field('video'), 'Video', 'Vídeo');
                            ?>
                            </div>

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
                <?php
                    }
                }
                ?>
            </section>
        </div>
        <script type="application/ld+json">
        <?php
            wp_reset_postdata();

            echo json_encode([
                '@context' => 'http://schema.org',
                '@type' => 'BreadcrumbList',
                'itemListElement' => [[
                    '@type' => 'ListItem',
                    'position' => 1,
                    'item' => [
                        '@id' => get_site_url() . '/' . $wp->request,
                        'name' => get_the_title()
                    ]
                ]]
            ]);
        ?>
        </script>

<?php get_footer();
