<?php
// ==================================================================
// Theme custom css
// ==================================================================
function ace_css() {
  if( get_option("ace_css") ) { ?>
    <style type="text/css">
    <?php echo stripslashes( get_option('ace_css') ); ?>
    </style><?php }
}

// ==================================================================
// Heading
// ==================================================================
function ace_heading() {
  if( get_option('ace_enable_image_logo') ) {  ?> 
    <a href="<?php echo get_option('home'); ?>"><img src="<?php echo get_option('ace_logo'); ?>" title="<?php bloginfo('name'); ?>" alt="<?php bloginfo('name'); ?>" class="aligncenter" /></a>
  <?php } else { ?>

  <?php if( is_home() || is_front_page() ) { ?>
    <h1><a href="<?php echo get_option('home'); ?>" class="header-title"><?php bloginfo('name'); ?></a></h1>
    <p class="header-desc"><?php bloginfo('description'); ?></p>
  <?php } else { ?>
    <h5><a href="<?php echo get_option('home'); ?>" class="header-title"><?php bloginfo('name'); ?></a></h5>
    <p class="header-desc"><?php bloginfo('description'); ?></p>
  <?php }
  }
}

// ==================================================================
// Header scripts
// ==================================================================
function ace_header_scripts() {
  if( get_option('ace_header_scripts') ) { echo stripslashes( get_option('ace_header_scripts') ); }
}

// ==================================================================
// Footer scripts
// ==================================================================
function ace_footer_scripts() {
  if( get_option('ace_footer_scripts') ) { echo stripslashes( get_option('ace_footer_scripts') ); }
}