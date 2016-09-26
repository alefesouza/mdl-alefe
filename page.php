<? get_header(); ?>
  <main class="mdl-layout__content">
    <div class="wrapper">
    <div class="mdl-layout__header" style="height: 194px;">
    </div>
    <div class="page-content">
 <?php if (have_posts()) {
          while (have_posts()) {
            the_post(); ?>
      <div class="mdl-grid">
        <div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col">
          <div class="mdl-card__title">
            <h2 class="mdl-card__title-text"><?php the_title(); ?></h2>
          </div>
          <div class="mdl-card__supporting-text">
            <?php the_content(); ?>
          </div>
        </div>
      </div>
 <?php }
  }
  
get_footer(); ?>