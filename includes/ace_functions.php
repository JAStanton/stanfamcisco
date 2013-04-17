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
