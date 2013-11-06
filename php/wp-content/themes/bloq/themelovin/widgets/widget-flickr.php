<?php
/*
Plugin Name: Flickr widget
Plugin URI: http://themelovin.com
Description: Display your latest Flickr pics.
Version: 1.0
Author: Themelovin
Author URI: http://themelovin.com
*/

function glg_flickr_jquery() {
	wp_enqueue_script('jquery');
}
add_action('widgets_init','glg_flickr_jquery');

class Glg_Flickr extends WP_Widget {

	function Glg_Flickr() {
		$widget_options = array('classname' => 'glg-flickr', 'description' => __('Simple Flickr widget.', 'themelovin'));
		$control_options = array('width' => 200, 'height' => 350, 'id_base' => 'glg-flickr-widget');
		$this->WP_Widget('glg-flickr-widget', __('Flickr Widget', 'themelovin'), $widget_options, $control_options);
	}
	
	function widget( $args, $instance ) {
		extract($args);
		
		$title = apply_filters('widget_title', $instance['title']);
		$flickrid = $instance['flickrid'];
		$count = $instance['flickrcount'];
		
		echo $before_widget;
		
		if ($title)
			echo $before_title . $title . $after_title;
?>
			<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=<?php echo $count ?>&amp;display=latest&amp;size=s&amp;layout=x&amp;source=user&amp;user=<?php echo $flickrid ?>"></script>
<?php		
			echo $after_widget;

	}
	
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title']);
		$instance['flickrcount'] = strip_tags( $new_instance['flickrcount']);
		$instance['flickrid'] = strip_tags( $new_instance['flickrid']);
		return $instance;
	}
	
	function form($instance) {
?>
	<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'themelovin'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php if(isset($instance['title']) && $instance['title']) { echo $instance['title']; } ?>" />
	</p>
	<p>
		<label for="<?php echo $this->get_field_id('flickrid'); ?>"><?php _e('Your Flickr User ID:', 'themelovin'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('flickrid'); ?>" name="<?php echo $this->get_field_name('flickrid'); ?>" value="<?php if(isset($instance['flickrid'])) { echo $instance['flickrid']; } ?>" />
	 	<small>Don't know your ID? Head on over to <a href="http://idgettr.com">idgettr</a> to find it.</small>
	 </p>
	 <p>
		<label for="<?php echo $this->get_field_id('flickrcount'); ?>"><?php _e('Number of Flickr photos', 'themelovin') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id('flickrcount'); ?>" name="<?php echo $this->get_field_name('flickrcount'); ?>" value="<?php if(isset($instance['flickrcount'])) { echo $instance['flickrcount']; } ?>" />
	</p>
<?php
	}

}

function load_glg_flickr() {
	register_widget('Glg_Flickr');
}
add_action('widgets_init','load_glg_flickr');

?>