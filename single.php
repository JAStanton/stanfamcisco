<?php get_header(); ?>

<section class="section">

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <article class="article">

    <?php if(get_post_meta($post->ID, 'ace_title', true)) {} else { ?>
    <header class="post-header">
      <div class="post-date radius-100"><span><?php the_time('d') ?></span><br /><?php the_time('M') ?><br /><?php the_time('Y') ?></div>
      <h2 class="post-title"><a href="<?php the_permalink() ?>" rel="<?php _e('bookmark','ace'); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
      <div class="post-category"><?php _e('categories', 'ace'); ?>: <?php the_category(', ') ?></div>
    </header>
    <?php } ?>

    <?php the_Content(); ?>

    <footer class="post-footer">
      <ul class="post-info-meta">
        <li>
          <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink() ?>" data-count="horizontal">Tweet</a><script type="text/javascript" src="//platform.twitter.com/widgets.js"></script>
        </li>
        <li>
          <iframe src="//www.facebook.com/plugins/like.php?href=<?php the_permalink() ?>&amp;send=false&amp;layout=button_count&amp;width=100&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21&amp;appId=145390898882465" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100px; height:21px;" allowTransparency="true"></iframe>
        </li>
        <li class="post-info-comment"><div class="post-comment"><?php comments_popup_link(__('0 comment','ace'), __('1 Comment','ace'), __('% Comments','ace')); ?></div></li>
      </ul>
      <ul class="footer-navi">
        <?php previous_post_link(__('<li class="previous">&laquo; %link</li>')); ?>
        <?php next_post_link(__('<li class="next">%link &raquo;</li>')); ?>
      </ul>
    </footer><!-- .post-footer -->

  <?php comments_template('/comments.php',true); ?>

  </article><!-- .article -->
  <?php endwhile; else: include('none.php'); endif; ?>

</section><!-- .section -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>