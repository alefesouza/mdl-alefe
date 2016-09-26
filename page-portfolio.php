<? get_header();

$queryMyProjects = new WP_Query(array('post_type' => 'portfolio', 'project_type' => 'my-projects'));
$queryAgencyProjects = new WP_Query(array('post_type' => 'portfolio', 'project_type' => 'agency-projects'));
// $queryFreelancerProjects = new WP_Query(array('post_type' => 'portfolio', 'type' => 'freelancer-projects'));
?>
  <main class="mdl-layout__content">
    <div class="wrapper">
    <section class="mdl-layout__tab-panel is-active" id="scroll-tab-1">
       <?php if (have_posts()) {
                while (have_posts()) {
                  the_post(); ?>
                <?php
                ob_start();
                the_content();
                $content = ob_get_clean();
                echo postDecoder($content); ?>
       <?php }
        }
      if ($queryMyProjects->have_posts()) {
              while ($queryMyProjects->have_posts()) {
                $queryMyProjects->the_post(); ?>
          <div class="mdl-grid post">
            <div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col">
              <div class="mdl-card__title">
                <a href="<?php the_permalink(); ?>"><h2 class="mdl-card__title-text"><?php the_title(); ?></h2></a>
              </div>
              <div class="mdl-card__supporting-text">
                <?php the_content(); ?>
              </div>
            </div>
          </div>
     <?php }
    } ?>
    </section>
    <section class="mdl-layout__tab-panel" id="scroll-tab-2">
     <?php if ($queryAgencyProjects->have_posts()) {
              while ($queryAgencyProjects->have_posts()) {
                $queryAgencyProjects->the_post(); ?>
          <div class="mdl-grid post">
            <div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col">
              <div class="mdl-card__supporting-text">
                <?php the_content(); ?>
              </div>
            </div>
          </div>
     <?php }
    } ?>
    </section>
      <? if(false) { ?>
    <section class="mdl-layout__tab-panel" id="scroll-tab-3">
     <?php if ($queryFreelancerProjects->have_posts()) {
              while ($queryFreelancerProjects->have_posts()) {
                $queryFreelancerProjects->the_post(); ?>
          <div class="mdl-grid post">
            <div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col">
              <div class="mdl-card__title">
                <a href="<?php the_permalink(); ?>"><h2 class="mdl-card__title-text"><?php the_title(); ?></h2></a>
              </div>
              <div class="mdl-card__supporting-text">
                <?php the_content(); ?>
              </div>
            </div>
          </div>
     <?php }
    } ?>
    </section>
<?php } get_footer(); ?>