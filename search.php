<?php get_header(); ?>

<section class="section">

  <?php if (have_posts()) : ?>
  
  <h2 class="pagetitle"><?php _e('Searching for','ace'); ?> &quot;<?php the_search_query(); ?>&quot;</h2>
  <?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('loop'); ?>
  <?php endwhile; ?>
    <?php get_pagination(); ?>
  <?php else : include('none.php'); endif; ?>

</section><!-- .section -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>