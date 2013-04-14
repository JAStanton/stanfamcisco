<section class="comment-box">

<?php
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
  die ('Please do not load this page directly. Thanks!');
if ( post_password_required() ) { ?>
  <p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments','ace'); ?>.</p>
<?php return; } ?>

<!-- You can start editing here. -->
  <?php if ( have_comments() ) : ?>
  <section class="navigation">
    <section class="alignleft"><?php previous_comments_link() ?></section>
    <section class="alignright"><?php next_comments_link() ?></section>
  </section>

  <?php if (!empty($comments_by_type['comment'])) { ?>
    <h4 id="comments"><?php comments_number(__('0 comment','ace'), __('1 Comment','ace'), __('% Comments','ace')); ?> <?php _e('on','ace'); ?> <?php the_title(); ?></h4>
    <ol class="commentlist">
      <?php wp_list_comments('type=comment&callback=comment_style'); ?>
    </ol>
  <?php } if (!empty($comments_by_type['pings'])) { ?>
    <h4 id="comments"><?php echo count($wp_query->comments_by_type['pings']); ?><?php _e('Pingbacks &amp; Trackbacks on','ace'); ?> <?php the_title(); ?></h4>
    <ol class="commentlist">
      <?php wp_list_comments('type=pingback&callback=comment_style'); ?>
    </ol>
  <?php } ?>

  <?php else : // this is displayed if there are no comments so far ?>
  <?php if ('open' == $post->comment_status) : ?>
  <?php else : // comments are closed ?><p class="nocomments"><?php _e('Comments are closed','ace'); ?>.</p><?php endif; ?>
  <?php endif; ?>

  <?php if ('open' == $post->comment_status) : ?>

  <section id="respond">
    <h4><?php comment_form_title( __('Leave a reply','ace'), __('Leave a reply to %s','ace') ); ?></h4>
    <?php cancel_comment_reply_link(); ?>

    <?php if ( get_option('comment_registration') && !$user_ID ) : ?>
      <p><?php _e('You must be','ace'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>"><?php _e('logged in','ace'); ?></a> <?php _e('to post a comment','ace'); ?>.</p>
    <?php else : ?>

    <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
 
    <?php if ( $user_ID ) : ?>
      <p><?php _e('Logged in as','ace'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e('Log out of this account','ace'); ?>"><?php _e('Log out &raquo;','ace'); ?></a></p>
    <?php else : ?>
      <p>
      <input type="text" name="author" class="comment-text" title="<?php _e('Name','ace'); ?>" value="<?php echo $comment_author; ?>" size="22" tabindex="2" />
      <input type="text" name="email" class="comment-text" title="<?php _e('Email','ace'); ?>" value="<?php echo $comment_author_email; ?>" size="22" tabindex="3" />
      <input type="text" name="url" class="comment-text" title="<?php _e('Website','ace'); ?>" value="<?php echo $comment_author_url; ?>" size="22" tabindex="4" />
      </p>
    <?php endif; ?>
    
    <p><textarea name="comment" class="comment-textarea" title="<?php _e('Comment','ace'); ?>" cols="50" rows="5" tabindex="1"></textarea></p>
    <p><input type="submit" class="button" value="<?php _e('Comment','ace'); ?>" tabindex="5" /> <?php comment_id_fields(); ?></p>
    <?php do_action('comment_form', $post->ID); ?>

    </form>

    <?php endif; // If registration required and not logged in ?>
  </section>
  <?php endif; // if you delete this the sky will fall on your head ?>
</section>