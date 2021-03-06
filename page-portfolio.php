<?php get_header();

$count = 1;

$queryMyProjects = new WP_Query(['post_type' => 'portfolio', 'project_type' => 'my-projects']);
?>
    <main class="mdl-layout__content">
        <div class="wrapper">
            <section class="mdl-layout__tab-panel is-active" id="portfolio-items">
                <?php
                if (have_posts()) {
                    while (have_posts()) {
                        the_post();

                        ob_start();
                        the_content();
                        $content = ob_get_clean();
                        echo postDecoder($content);
                    }
                }

                if ($queryMyProjects->have_posts()) {
                    while ($queryMyProjects->have_posts()) {
                        $queryMyProjects->the_post(); ?>
                <div class="mdl-grid post">
                    <div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col">
                        <div class="mdl-card__title">
                            <a href="<?php the_permalink(); ?>">
                                <h2 class="mdl-card__title-text"><?php the_title(); ?></h2>
                            </a>
                        </div>
                        <div class="mdl-card__supporting-text">
                            <?php the_content(); ?>
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
