<?php
// ==================================================================
// Flickr
// ==================================================================
class ace_flickr extends WP_Widget {
function ace_flickr() {
$widget_ops = array('description' => 'Show Flickr image gallery' );
parent::WP_Widget(false, "Ace Flickr",$widget_ops);
}
function widget($args, $data) {
extract( $args );
  $title = $data['title'];
  $id = $data['id'];
  $number = $data['number'];
?>


<?php echo $before_widget; ?>

<?php if ($title) { echo $before_title . $title . $after_title; } ?>

<div class="flickr">
  <script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=<?php echo $number; ?>&amp;display=latest&amp;size=s&amp;layout=x&amp;source=user&amp;user=<?php echo $id; ?>"></script>
</div>

<?php echo $after_widget;}
function update($new_data, $old_data) {return $new_data;}
function form($data) {
$title = esc_attr($data['title']);
$id = esc_attr($data['id']);
$number = esc_attr($data['number']);
?>

<p>
  <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','ace'); ?></label>
  <input type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
</p>
<p>
  <label for="<?php echo $this->get_field_id('id'); ?>"><?php _e('Flickr ID (<a href="http://www.idgettr.com" target="_blank">idGettr</a>):','ace'); ?></label>
  <input type="text" name="<?php echo $this->get_field_name('id'); ?>" value="<?php echo $id; ?>" class="widefat" id="<?php echo $this->get_field_id('id'); ?>" />
</p>
<p>
  <label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number:','ace'); ?></label>
  <select name="<?php echo $this->get_field_name('number'); ?>" class="widefat" id="<?php echo $this->get_field_id('number'); ?>">
    <?php for ( $i = 1; $i < 10; $i += 1) { ?>
    <option value="<?php echo $i; ?>" <?php if($number == $i){ echo "selected='selected'";} ?>><?php echo $i; ?></option>
    <?php } ?>
  </select>
</p>

<?php } }
register_widget('ace_flickr');

// ==================================================================
// Social network
// ==================================================================
class ace_social extends WP_Widget {
function ace_social() {
$widget_ops = array('description' => 'Show social network like instagram, Facebook, RSS, etc.' );
parent::WP_Widget(false, "Ace Social Networks",$widget_ops);
}

function widget($args, $data) {
extract( $args );
  $title = $data['title'];
  $rss = $data['rss'];
  $instagram = $data['instagram'];
  $photo = $data['photo'];
  $facebook = $data['facebook'];
  $pinterest = $data['pinterest'];
?>

<?php echo $before_widget; ?>

<?php if( $photo ) echo '<div class="personal_photo"><img src="'.$photo.'"/></div>' ?>

<?php if ($title) { echo $before_title . $title . $after_title; } ?>
<div class="textwidget">
  <ul class="social-icons">
    <?php if( $instagram ) echo '<li><a href="http://www.instagram.com/'.$instagram.'" ><i class="icon-camera-retro"></i></a></li>' ?>
    <?php if( $facebook ) echo '<li><a href="'.$facebook.'" ><i class="icon-facebook-sign"></i></a></li>' ?>
    <?php if( $pinterest ) echo '<li><a href="'.$pinterest.'" ><i class="icon-pinterest"></i></a></li>' ?>
  </ul>
</div>

<?php	 echo $after_widget;}
function update($new_data, $old_data) {return $new_data;}
function form($data) {
  $title = esc_attr($data['title']);
  $rss = esc_attr($data['rss']);
  $instagram = esc_attr($data['instagram']);
  $facebook = esc_attr($data['facebook']);
  $pinterest = esc_attr($data['pinterest']);
  $photo = esc_attr($data['photo']);
?>

<p>
  <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','ace'); ?></label>
  <input type="text" name="<?php echo $this->get_field_name('title'); ?>"  value="<?php echo $title; ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
</p>

<p>
  <label for="<?php echo $this->get_field_id('photo'); ?>"><?php _e('Personal Picture (url):','ace'); ?></label>
  <input type="text" name="<?php echo $this->get_field_name('photo'); ?>"  value="<?php echo $photo; ?>" class="widefat" id="<?php echo $this->get_field_id('photo'); ?>" />
</p>

<p>
  <label for="<?php echo $this->get_field_id('instagram'); ?>"><?php _e('Instagram username:','ace'); ?></label>
  <input type="text" name="<?php echo $this->get_field_name('instagram'); ?>"  value="<?php echo $instagram; ?>" class="widefat" id="<?php echo $this->get_field_id('instagram'); ?>" />
</p>
<p>
  <label for="<?php echo $this->get_field_id('facebook'); ?>"><?php _e('Facebook full URL:','ace'); ?></label>
  <input type="text" name="<?php echo $this->get_field_name('facebook'); ?>"  value="<?php echo $facebook; ?>" class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>" />
</p>
<p>
  <label for="<?php echo $this->get_field_id('pinterest'); ?>"><?php _e('Pinterest:','ace'); ?></label>
  <input type="text" name="<?php echo $this->get_field_name('pinterest'); ?>"  value="<?php echo $pinterest; ?>" class="widefat" id="<?php echo $this->get_field_id('pinterest'); ?>" />
</p>

<?php } }
register_widget('ace_social');

// ==================================================================
// Tweets
// ==================================================================
class ace_tweet extends WP_Widget {
function ace_tweet() {
$widget_ops = array('description' => 'Show your tweets' );
parent::WP_Widget(false, "Ace Tweet",$widget_ops);
}

function widget($args, $data) {
extract( $args );
  $title = $data['title'];
  $instagram = $data['instagram'];
  $updates = $data['updates'];
  $photo = $data['photo'];
?>

<?php echo $before_widget; ?>

<?php if ($title) { echo $before_title . $title . $after_title; } ?>

<?php	 echo $after_widget;}
function update($new_data, $old_data) {return $new_data;}
function form($data) {
  $title = esc_attr($data['title']);
  $instagram = esc_attr($data['instagram']);
  $updates = esc_attr($data['updates']);
  $photo = esc_attr($data['photo']);
?>

<p>
  <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','ace'); ?></label>
  <input type="text" name="<?php echo $this->get_field_name('title'); ?>"  value="<?php echo $title; ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
</p>
<p>
  <label for="<?php echo $this->get_field_id('instagram'); ?>"><?php _e('instagram username:','ace'); ?></label>
  <input type="text" name="<?php echo $this->get_field_name('instagram'); ?>"  value="<?php echo $instagram; ?>" class="widefat" id="<?php echo $this->get_field_id('instagram'); ?>" />
</p>
<p>
  <label for="<?php echo $this->get_field_id('photo'); ?>"><?php _e('photo username:','ace'); ?></label>
  <input type="text" name="<?php echo $this->get_field_name('photo'); ?>"  value="<?php echo $photo; ?>" class="widefat" id="<?php echo $this->get_field_id('photo'); ?>" />
</p>
<p>
  <label for="<?php echo $this->get_field_id('updates'); ?>"><?php _e('Number of instagram updates:','ace'); ?></label>
  <select name="<?php echo $this->get_field_name('updates'); ?>" class="widefat" id="<?php echo $this->get_field_id('updates'); ?>">
    <?php for ( $i = 1; $i < 11; $i += 1) { ?>
    <option value="<?php echo $i; ?>" <?php if($updates == $i){ echo "selected='selected'";} ?>><?php echo $i; ?></option>
    <?php } ?>
  </select>
</p>

<?php } }
register_widget('ace_tweet');
