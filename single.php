<? get_header(); ?>
  <main class="mdl-layout__content">
    <div class="wrapper">
    <div class="mdl-layout__header" style="height: 194px;">
    </div>
    <div class="page-content">
 <?php if (have_posts()) {
          while (have_posts()) {
            the_post(); ?>
      <div class="mdl-grid post">
        <div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col">
          <div class="mdl-card__title">
            <h2 class="mdl-card__title-text"><?php the_title(); ?></h2>
          </div>
 	        <small>Há <?php echo human_time_diff(get_post_time(), current_time('timestamp')); ?> por <?php the_author_posts_link(); ?></small>
          <div class="mdl-card__supporting-text">
            <?php the_content(); ?>
            
            <table>
              <tr>
                <td><i class="mdl-color-text--black material-icons">folder</i></td>
                <td>Categoria: <?php the_category(', '); ?></td>
              </tr>
              <tr>
                <td><i class="mdl-color-text--black material-icons">label</i></td>
                <td>Tags: <?php the_tags('', ', ', ''); ?></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      
      <div class="mdl-grid comments">
        <div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col">
          <div class="mdl-card__title">
            <h2 class="mdl-card__title-text">Comentários</h2>
          </div>
          <div class="mdl-card__supporting-text">
            <?php comments_template(); ?>
          </div>
        </div>
      </div>
 <?php }
  }

get_footer(); ?>