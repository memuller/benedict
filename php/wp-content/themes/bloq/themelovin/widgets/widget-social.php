<?php
/*
Plugin Name: Social widget
Plugin URI: http://themelovin.com
Description: Display your social links.
Version: 1.0
Author: Themelovin
Author URI: http://themelovin.com
*/

class Social_Widget extends WP_Widget {
	function Social_Widget() {
		parent::WP_Widget(false, $name = 'Social icons', array(
			'description' => 'Add social icons.'
		));
	}
 
	function widget($args, $instance) {
		// outputs the content of the widget
		extract($args);
		
		$title = apply_filters('widget_title', $instance['title']);
		echo $before_widget;
		
		if($title)
			echo $before_title.$title.$after_title;
		
		$social = array('behance' => 'adm_behance', 'dribbble' => 'adm_dribbble', 'facebook' => 'adm_facebook', 'flickr' => 'adm_flickr', 'google' => 'adm_google', 'instagram' => 'adm_instagram', 'linkedin' => 'adm_linkedin', 'pinterest' => 'adm_pinterest', 'tumblr' => 'adm_tumblr', 'twitter' => 'adm_twitter', 'vimeo' => 'adm_vimeo');
		$pictograms = array('behance' => '&#62286;', 'dribbble' => '&#62235;', 'facebook' => '&#62220;', 'flickr' => '&#62211;', 'google' => '&#62223;', 'instagram' => '&#62253;', 'linkedin' => '&#62232;', 'pinterest' => '&#62226;', 'tumblr' => '&#62229;', 'twitter' => '&#62217;', 'vimeo' => '&#62214;');
		$output = '<ul>';
		foreach($social as $key => $value) {
			$var = get_option($value);
			if(!empty($var)) {
				$var = trim($var, '/');
				if(!preg_match('~^(?:f|ht)tps?://~i', $var)) {
					$var = 'http://'.$var;
				}
				$output .= '<li><a href="'.$var.'" title="Join us on '.$key.'" target="_blank"><span class="pictogram-social">'.$pictograms[$key].'</span></a></li>';
			}
		}
		$output .= '</ul>';
		$output .= '<div class="clear"></div>';
		echo $output;
		
		echo $after_widget;
	}
 
	function update($new_instance, $old_instance) {
		return $new_instance;
		$instance['title'] = strip_tags($new_instance['title']);
	}
 
	function form($instance) {
		// outputs the options form on admin
		$defaults = array('title' => __('Social', 'themelovin'), 'show_info' => true);  
		$instance = wp_parse_args((array) $instance, $defaults );
?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'themelovin'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
<?php
	}
}
register_widget('Social_Widget');
?>