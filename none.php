  <article class="article">

    <div class="post-text"><h2 class="post-title"><?php _e('Not Found','ace'); ?></h2></div>

    <p><?php _e('You have come to a page that is either not existing or already been removed','ace'); ?>.</p>

    <?php get_search_form();?>

    <div class="left">
      <h3><?php _e('Archives by month:','ace'); ?></h3>
      <ul>
        <?php wp_get_archives('type=monthly'); ?>
      </ul>
    </div>
    <div class="right">
      <h3><?php _e('Archives by category:','ace'); ?></h3>
      <ul>
        <?php wp_list_cats('sort_column=name'); ?>
      </ul>
    </div>
    <div class="clearfix">&nbsp;</div>

  </article><!-- .article -->