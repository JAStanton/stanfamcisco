<footer class="footer">
  <p class="footer-copy">
    <?php if( get_option('ace_footer_credit') == true ) { echo stripslashes (get_option('ace_footer_credit')); } else { ?>&copy; <?php _e('Copyright','ace'); ?> <a href="<?php echo get_option('home'); ?>"><?php bloginfo('name'); ?></a> <?php echo date('Y'); ?>. <?php _e('Powered by','ace'); ?> <a href="http://www.wordpress.org">WordPress</a>. <a href="http://www.bluchic.com" title="Adelle theme designed by BluChic" class="footer-credit"><?php _e('Designed by','ace'); ?> BluChic</a><?php } ?>
  </p>
</footer><!-- .footer -->

</section><!-- .container -->

  <!-- Javascript -->
  <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/respond.js"></script>
  <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.tweet.js"></script>
  <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/superfish.js"></script>
  <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/scripts.js"></script>
  <!-- Javascript -->

  <?php echo ace_footer_scripts(); ?>

<?php wp_footer(); ?>
</body>
</html>
