<?php
// ==================================================================
// Custom background
// ==================================================================
if ( function_exists('get_custom_header')) {
  add_theme_support('custom-background');
} else {
  add_custom_background();
}

// ==================================================================
// Menu location
// ==================================================================
register_nav_menu('top_menu', 'Top Menu');

// ==================================================================
// Language
// ==================================================================
load_theme_textdomain('ace', TEMPLATEPATH . '/languages');

// ==================================================================
// Post thumbnail
// ==================================================================
add_theme_support('post-thumbnails');

// ==================================================================
// Add default posts and comments RSS feed links to head
// ==================================================================
add_theme_support( 'automatic-feed-links' );

// ==================================================================
// Shortcode in excerpt
// ==================================================================
add_filter('the_excerpt', 'do_shortcode');

// ==================================================================
// Shortcode in widget
// ==================================================================
add_filter('widget_text', 'do_shortcode');

// ==================================================================
// Clickable link in content
// ==================================================================
add_filter('the_content', 'make_clickable');

// ==================================================================
// Remove version generator
// ==================================================================
remove_action('wp_head', 'wp_generator');

// ==================================================================
// Add "Home" in menu
// ==================================================================
function home_page_menu( $args ) {
  $args['show_home'] = true;
  return $args;
}
add_filter( 'wp_page_menu_args', 'home_page_menu' );

// ==================================================================
// Comment spam, prevention
// ==================================================================
function check_referrer() {
  if (!isset($_SERVER['HTTP_REFERER']) || $_SERVER['HTTP_REFERER'] == "") {
    wp_die( __('Please enable referrers in your browser.') );
  }
}
add_action('check_comment_flood', 'check_referrer');

// ==================================================================
// Comment time
// ==================================================================
function time_ago( $type = 'comment' ) {
  $d = 'comment' == $type ? 'get_comment_time' : 'get_post_time';
  return human_time_diff($d('U'), current_time('timestamp')) . " " . __('ago');
}

// ==================================================================
// Custom comment style
// ==================================================================
function comment_style($comment, $args, $depth) {
$GLOBALS['comment'] = $comment; ?>
<li <?php comment_class(); ?>>
  <article class="comment-content" id="comment-<?php comment_ID(); ?>">
    <div class="comment-meta">
    <?php echo get_avatar($comment, $size = '32'); ?>
    <?php printf(__('<h6>%s</h6>'), get_comment_author_link()) ?>
    <small><?php printf( __('%1$s at %2$s'), get_comment_date(), get_comment_time()) ?> (<?php printf(__('%s'), time_ago()) ?>)</small>
    </div>
  <?php if ($comment->comment_approved == '0') : ?><em><?php _e('Your comment is awaiting moderation.') ?></em><br /><?php endif; ?>
  <?php comment_text() ?>
  <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
  </article>
<?php }

// ==================================================================
// Add internal lightbox
// ==================================================================
function add_themescript(){
if(!is_admin()){
  wp_enqueue_script('jquery');
  wp_enqueue_script('thickbox',null,array('jquery'));
  }
}

function wp_thickbox_script() {
$url = get_bloginfo('template_directory');
?>
<script type="text/javascript">
if ( typeof tb_pathToImage != 'string' )
  {
    var tb_pathToImage = "<?php echo get_bloginfo('url').'/wp-includes/js/thickbox'; ?>/loadingAnimation.gif";
  }
if ( typeof tb_closeImage != 'string' )
  {
    var tb_closeImage = "<?php echo get_bloginfo('url').'/wp-includes/js/thickbox'; ?>/tb-close.png";
  }
</script>
<?php
  wp_enqueue_style('thickbox.css', '/'.WPINC.'/js/thickbox/thickbox.css', null, '1.0');
}

add_action('init','add_themescript');
add_action('wp_head', 'wp_thickbox_script');

// ==================================================================
// Add slimbox
// ==================================================================
define("IMAGE_FILETYPE", "(bmp|gif|jpeg|jpg|png)", true);

function slimbox_css() {
$url = get_bloginfo('template_directory');
?>
<link href="<?php echo $url; ?>/js/lightbox/css/slimbox2.css" rel="stylesheet" type="text/css" media="screen" />
<?php }

function slimbox_script() {
$url = get_bloginfo('template_directory');
?>
<script type="text/javascript" src="<?php echo $url; ?>/js/lightbox/lightbox.js"></script>
<?php }

function slimbox_replace($string) {
$pattern = '/(<a(.*?)href="([^"]*.)'.IMAGE_FILETYPE.'"(.*?)><img)/ie';
$replacement = 'stripslashes(strstr("\2\5","rel=") ? "\1" : "<a\2href=\"\3\4\"\5 rel=\"slimbox\"><img")';
return preg_replace($pattern, $replacement, $string);
}

function add_slimbox_rel( $attachment_link ) {
$attachment_link = str_replace( 'a href' , 'a rel="slimbox-cats" href' , $attachment_link );
return $attachment_link;
}

add_action('wp_head', 'slimbox_css');
add_action('wp_footer', 'slimbox_script');
add_filter('the_content', 'slimbox_replace');
add_filter('wp_get_attachment_link' , 'add_slimbox_rel');

// ==================================================================
// Pagination
// ==================================================================
function get_pagination($args = null) {
$defaults = array(
  'page' => null,
  'pages' => null, 
  'range' => 2,
  'gap' => 2,
  'anchor' => 1,
  'before' => '<ul class="pagination"><li class="pages radius-4">Pages</li>',
  'after' => '</ul>',
  'nextpage' => __('Next'),
  'previouspage' => __('Back'),
  'echo' => 1
);
$r = wp_parse_args($args, $defaults); extract($r, EXTR_SKIP);
if (!$page && !$pages) {
  global $wp_query;
  $page = get_query_var('paged');
  $page = !empty($page) ? intval($page) : 1;
  $posts_per_page = intval(get_query_var('posts_per_page'));
  $pages = intval(ceil($wp_query->found_posts / $posts_per_page));
}
$output = "";
if ($pages > 1) {	
  $output .= "$before";
  $ellipsis = "<li><span class=\"current-page radius-4\">...</span></li>";
if ($page > 1 && !empty($previouspage)) {
  $output .= "<li><a href=\"" . get_pagenum_link($page - 1) . "\" class=\"radius-4\">$previouspage</a></li>";
}
$min_links = $range * 2 + 1;
$block_min = min($page - $range, $pages - $min_links);
$block_high = max($page + $range, $min_links);
$left_gap = (($block_min - $anchor - $gap) > 0) ? true : false;
$right_gap = (($block_high + $anchor + $gap) < $pages) ? true : false;
if ($left_gap && !$right_gap) {
  $output .= sprintf('%s%s%s', 
  pagination(1, $anchor), 
  $ellipsis, 
  pagination($block_min, $pages, $page)
  );
}
else if ($left_gap && $right_gap) {
  $output .= sprintf('%s%s%s%s%s', 
  pagination(1, $anchor), 
  $ellipsis, 
  pagination($block_min, $block_high, $page), 
  $ellipsis, 
  pagination(($pages - $anchor + 1), $pages)
  );
}
else if ($right_gap && !$left_gap) {
  $output .= sprintf('%s%s%s', 
  pagination(1, $block_high, $page),
  $ellipsis,
  pagination(($pages - $anchor + 1), $pages)
  );
}
else {
  $output .= pagination(1, $pages, $page);
}
if ($page < $pages && !empty($nextpage)) {
  $output .= "<li><a href=\"" . get_pagenum_link($page + 1) . "\" class=\"radius-4\">$nextpage</a></li>";
}
$output .= $after;
}
if ($echo) {
  echo $output;
}
return $output;
}

function pagination($start, $max, $page = 0) {
$output = "";
for ($i = $start; $i <= $max; $i++) {
  $output .= ($page === intval($i)) 
  ? "<li><span class=\"current-page radius-4\">$i</span></li>" 
  : "<li><a href=\"" . get_pagenum_link($i) . "\" class=\"radius-4\">$i</a></li>";
}
return $output;
}