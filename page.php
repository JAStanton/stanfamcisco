<?php get_header(); ?>

<section class="section">

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <article class="article">

    <header class="post-header">
      <h2 class="post-title"><?php the_title(); ?></h2>
    </header>
 
    <?php the_content(); ?>

  </article><!-- .article -->
  <?php endwhile; endif; ?>

</section><!-- .section -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>