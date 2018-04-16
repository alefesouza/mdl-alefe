<?php get_header(); ?>
<main class="mdl-layout__content">
    <div class="wrapper">
        <div class="mdl-layout__header" style="height: 194px;"></div>
    <div class="page-content">
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

get_footer();
