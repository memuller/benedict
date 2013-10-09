<?php
/*
Plugin Name: Twitter widget
Plugin URI: http://themelovin.com
Description: Display your latest Flickr pics.
Version: 1.0
Author: Themelovin
Author URI: http://themelovin.com
*/

function glg_twitter_js() {
	wp_enqueue_script('jquery'); 
	wp_register_script('glg-twitter-widget', get_template_directory_uri() . '/include/jquery.tweet.js', array('jquery'), false, true);
	wp_enqueue_script('glg-twitter-widget');
}
add_action('wp_enqueue_scripts', 'glg_twitter_js');


class glg_tweet_widget extends WP_Widget {

	function glg_tweet_widget() {
	
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'glg_tweet_widget', 'description' => __('Simple Twitter widget.', 'themelovin') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'glg_tweet_widget' );

		/* Create the widget. */
		$this->WP_Widget( 'glg_tweet_widget', __('Twitter Widget', 'themelovin'), $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters('widget_title', $instance['title'] );
		
		$glg_twitter_username = $instance['username'];
		$glg_twitter_postcount = $instance['postcount'];

		echo $before_widget;

		if ( $title ) { echo $before_title . $title . $after_title; }
			
		$id = rand(0,999);

		?>
			<script type="text/javascript">
    			jQuery(document).ready(function($){
    				$.getJSON('http://api.twitter.com/1/statuses/user_timeline/<?php echo $glg_twitter_username; ?>.json?count=<?php echo $glg_twitter_postcount; ?>&include_rts=1&callback=?', function(tweets){
    					$("#twitter_update_list_<?php echo $id; ?>").html(glg_format_twitter(tweets));
    				});
    			});
			</script>
            <ul id="twitter_update_list_<?php echo $id; ?>" class="twitter">
                <li><p></p></li>
            </ul>
            
            <a href="http://twitter.com/<?php echo $glg_twitter_username; ?>" class="twitter-link">Follow on Twitter</a>
		
		<?php 

		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['username'] = strip_tags( $new_instance['username'] );
		$instance['postcount'] = strip_tags( $new_instance['postcount'] );

		return $instance;
	}
	
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array(
		'title' => 'Twitter',
		'username' => 'themelovin',
		'postcount' => '5',
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); 
		
		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'themelovin') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'username' ); ?>"><?php _e('Twitter Username', 'themelovin') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'username' ); ?>" name="<?php echo $this->get_field_name( 'username' ); ?>" value="<?php echo $instance['username']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'postcount' ); ?>"><?php _e('Number of tweets (20 max)', 'themelovin') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'postcount' ); ?>" name="<?php echo $this->get_field_name( 'postcount' ); ?>" value="<?php echo $instance['postcount']; ?>" />
		</p>
		
	<?php
	}
}

function glg_tweets_widgets() {
	register_widget( 'glg_tweet_widget' );
}
add_action( 'widgets_init', 'glg_tweets_widgets' );

?>