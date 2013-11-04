<?php
/*
Plugin Name: Themelovin shortcodes
Plugin URI: http://themelovin.com
Description: New shortcodes for Wordpress
Author: Themelovin
Version: 1.0
Author URI: http://themelovin.com
*/

/*----------------------------*/
/*	Load Localization
/*----------------------------*/
load_plugin_textdomain( 'themelovin', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );


/*----------------------------*/
/*	Define File Paths
/*----------------------------*/
define('GLG_TINYMCE_URI', get_template_directory_uri() . '/shortcodes');
define('GLG_TINYMCE_PATH', get_template_directory() . '/shortcodes');

/*----------------------------*/
/*	Load TinyMCE dialog
/*----------------------------*/
require_once( GLG_TINYMCE_PATH . '/tinymce.class.php' ); // TinyMCE wrapper class
new vision_tinymce();


/*----------------------------*/
/*	Load Shortcodes
/*----------------------------*/
require_once( GLG_TINYMCE_PATH . '/themelovin-old-shortcodes.php' );	// old vision shortcodes (before 2.0) keep file for backward compatible.
require_once( GLG_TINYMCE_PATH . '/themelovin-shortcodes.php' );	// new vision shortcodes, only renamed, functions and usage remains the same.


/*----------------------------*/
/*	Setup and Load Scripts
/*----------------------------*/
function glg_enqueue_script(){
	
//register scripts
wp_register_script( 'glg-shortcodes', GLG_TINYMCE_URI . '/js/themelovin-shortcodes.js',array('jquery'), '3.0', $infooter = true );
wp_register_script( 'glg-knob', GLG_TINYMCE_URI . '/js/jquery.knob.js',array('jquery'), '1.2.0', $infooter = true );
wp_register_style( 'glg-shortcodes', GLG_TINYMCE_URI . '/themelovin-shortcodes.css');
wp_register_style( 'glg-social', GLG_TINYMCE_URI . '/webfonts/ss-social.css');

//load scripts
	if(!is_admin()){
		wp_enqueue_script( 'glg-knob');
		wp_enqueue_script( 'glg-shortcodes'); // follow by this which contains the prettyphoto init script.
		wp_enqueue_style('glg-shortcodes'); // css in html head
		wp_enqueue_style('glg-social'); // ss-social icon font
	}
}
add_action('init','glg_enqueue_script');


/*----------------------------*/
/*	IE-specific scripts
/*----------------------------*/
function glg_hook_scripts(){
?>
<!--[if lt IE 9]>
<link rel="stylesheet" href="<?php echo plugins_url(); ?>/shortcodes/css/IE.css" />
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<script type="text/javascript" src="<?php echo plugins_url(); ?>/vision/js/IE.js"></script>
<![endif]-->
<?php
}
add_action('wp_head','glg_hook_scripts',10);


if(!function_exists('my_formatter')){

/*----------------------------*/
/*	Shortcode Formatter
/*----------------------------*/
function glg_my_formatter($content) {
	$new_content = '';
	$pattern_full = '{(\[raw\].*?\[/raw\])}is';
	$pattern_contents = '{\[raw\](.*?)\[/raw\]}is';
	$pieces = preg_split($pattern_full, $content, -1, PREG_SPLIT_DELIM_CAPTURE);

	foreach ($pieces as $piece) {
		if (preg_match($pattern_contents, $piece, $matches)) {
			$new_content .= $matches[1]; //matches the raw tags.
		} else {
			$new_content .= $piece;
		}
	}

	return $new_content;
}

add_filter('the_content', 'glg_my_formatter', 99);
add_filter('widget_text', 'glg_my_formatter', 99);

}
?>