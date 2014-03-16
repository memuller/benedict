<?php

$prefix = 'adm_';

function glg_language_setup(){
    load_theme_textdomain('themelovin', get_template_directory().'/languages');
}
add_action('after_setup_theme', 'glg_language_setup');

if (!isset( $content_width)) $content_width = 960;

/*-----------------------------------------------------------------------------------*/
/*	Register and load admin javascript(s)
/*-----------------------------------------------------------------------------------*/

function glg_load_admin_scripts() {
	wp_enqueue_script('color-picker', get_template_directory_uri().'/admin/js/colorpicker.js', array('jquery'));
	wp_enqueue_script('glg_admin', get_template_directory_uri().'/themelovin/include/jquery.admin.js', array('jquery'));
}
add_action('admin_enqueue_scripts', 'glg_load_admin_scripts');

/*-----------------------------------------------------------------------------------*/
/*	Register and load admin CSS
/*-----------------------------------------------------------------------------------*/

function glg_admin_styles() {
	wp_enqueue_style('color-picker', get_template_directory_uri().'/admin/colorpicker.css');
	wp_enqueue_style('glg_admin_css', get_template_directory_uri().'/themelovin/styles/glg-admin.css');
}
add_action('admin_print_styles', 'glg_admin_styles');

/*-----------------------------------------------------------------------------------*/
/*	Load other function(s)
/*-----------------------------------------------------------------------------------*/

require_once(TEMPLATEPATH . '/admin/admin-functions.php');
#require_once(TEMPLATEPATH . '/admin/admin-interface.php');
require_once(TEMPLATEPATH . '/admin/theme-settings.php');
#require_once(TEMPLATEPATH . '/themelovin/post-metabox.php');
require_once(TEMPLATEPATH . '/themelovin/init.php');
require_once('lib/scripts.php');
function glg_load_scripts() {
	if (!is_admin()) {
		wp_enqueue_script('jquery');
		// wp_enqueue_script('easing', get_template_directory_uri().'/include/jquery.easing.js', array('jquery'), false, true);
		// wp_enqueue_script('flexslider', get_template_directory_uri().'/include/jquery.flexslider.js', array('jquery'), false, false);
		// wp_enqueue_script('hoverintent', get_template_directory_uri().'/include/jquery.hoverIntent.js', array('jquery'), false, true);
		// wp_enqueue_script('supersubs', get_template_directory_uri().'/include/jquery.supersubs.js', array('jquery'), false, true);
		// wp_enqueue_script('superfish', get_template_directory_uri().'/include/jquery.superfish.js', array('jquery'), false, true);
		// wp_enqueue_script('fitvids', get_template_directory_uri().'/include/jquery.fitvids.js', array('jquery'), false, true);
		// wp_enqueue_script('nicescroll', get_template_directory_uri().'/include/jquery.nicescroll.js', array('jquery'), false, true);
		// wp_enqueue_script('cookie', get_template_directory_uri().'/include/jquery.cookie.js', array('jquery'), false, true);
		//conditional load for contact page scripts
		if(is_page_template('page-contact.php')) {
			wp_enqueue_script('gmaps', get_template_directory_uri().'/include/jquery.mobilegmap.js', array('jquery'), false, true);
			wp_enqueue_script('mapsensor', 'http://maps.googleapis.com/maps/api/js?sensor=false', array('jquery'), false, true);
			wp_localize_script('gmaps', 'glg_map_vars', array(
				'themeDir' => get_template_directory_uri()
				)
			);
		}
		#wp_enqueue_script('totop', get_template_directory_uri().'/include/jquery.ui.totop.js', array('jquery'), false, true);
		#wp_enqueue_script('themelovin', get_template_directory_uri().'/include/jquery.themelovin.js', array('jquery'), false, true);
		wp_localize_script('themelovin', 'glg_script_vars', array(
			'wpDir' => site_url(),
			'loveNonce' => wp_create_nonce('love-it-nonce')
			)
		);
		if(is_singular() && get_option('thread_comments'))
			wp_enqueue_script('comment-reply');
		#wp_enqueue_script('modernizr', get_template_directory_uri().'/include/modernizr.custom.71362.js', array('jquery'));
	}
}
add_action('wp_enqueue_scripts', 'glg_load_scripts');

function glg_load_styles() {
	#wp_enqueue_style('default', get_stylesheet_uri());
	#wp_enqueue_style('totop', get_template_directory_uri().'/styles/totop.css');
	#wp_enqueue_style('responsive', get_template_directory_uri().'/styles/responsive.css');
	#wp_enqueue_style('flexslider', get_template_directory_uri().'/styles/flexslider.css');
}
add_action('wp_enqueue_scripts', 'glg_load_styles');

if (is_admin() && isset($_GET['activated'] ) && $pagenow == 'themes.php' ) {
	update_option('adm_color', 'carrot');
	update_option('adm_font', 'Ubuntu');
	update_option('adm_port_items', '-1');
	update_option('adm_contact_form', 'enable');
}

/*-----------------------------------------------------------------------------------*/
/*	Load sidebar(s)
/*-----------------------------------------------------------------------------------*/

if(function_exists('register_sidebar')) {
	register_sidebar(array(
		'name' => 'Blog widget',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	));
	register_sidebar(array(
		'name' => 'Footer 1 widget',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	));
	
	register_sidebar(array(
		'name' => 'Footer 2 widget',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	));
	
	register_sidebar(array(
		'name' => 'Footer 3 widget',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	));
}

/*-----------------------------------------------------------------------------------*/
/*	Custom post type
/*-----------------------------------------------------------------------------------*/

#require 'post_types.php' ;
#add_action( 'init', 'glg_taxonomy_team_type', 1 );

/*-----------------------------------------------------------------------------------*/
/*	Widget(s)
/*-----------------------------------------------------------------------------------*/

#include("themelovin/widgets/widget-flickr.php");
#include("themelovin/widgets/widget-twitter.php");
#include("themelovin/widgets/widget-social.php");

/*-----------------------------------------------------------------------------------*/
/*	Shortcode(s)
/*-----------------------------------------------------------------------------------*/

if(!function_exists('glg_enqueue_script')){
	#require_once('shortcodes/themelovin.php');
}

/*-----------------------------------------------------------------------------------*/
/*	Stuff
/*-----------------------------------------------------------------------------------*/

if (!function_exists('glg_portfolio_icons')) :
function glg_portfolio_icons() {
?>
<style type="text/css" media="screen">
        #menu-posts-portfolio .wp-menu-image {
            background: url(<?php echo get_template_directory_uri() ?>/admin/images/portfolio-icon.png) no-repeat 6px 6px !important;
        }
        #menu-posts-portfolio:hover .wp-menu-image, #menu-posts-portfolio.wp-has-current-submenu .wp-menu-image {
            background-position:6px -16px !important;
        }
        #icon-edit.icon32-posts-portfolio {
        	background: url(<?php echo get_template_directory_uri() ?>/admin/images/portfolio-32x32.png) no-repeat 0px -4px;
        }
        #menu-posts-team .wp-menu-image {
            background: url(<?php echo get_template_directory_uri() ?>/admin/images/team-icon.png) no-repeat 6px 6px !important;
        }
        #menu-posts-team:hover .wp-menu-image, #menu-posts-team.wp-has-current-submenu .wp-menu-image {
            background-position:6px -17px !important;
        }
        #icon-edit.icon32-posts-team {
        	background: url(<?php echo get_template_directory_uri() ?>/admin/images/portfolio-32x32.png) no-repeat 0px -4px;
        }
    </style>

<?php }
add_action( 'admin_head', 'glg_portfolio_icons' );
endif;

//Register menus
if (!function_exists('register_adm_menus')) :
function register_adm_menus() {
	register_nav_menus(
		array( 'header-menu' => __('Header menu', 'themelovin'))
	);
}	
add_action( 'init', 'register_adm_menus' );
endif;

if(function_exists('add_theme_support')) : 
	add_theme_support('post-thumbnails');
	add_theme_support('post-formats', array('gallery', 'video', 'quote', 'link'));
	add_theme_support('custom-background');
	add_theme_support('custom-header');
	add_theme_support('automatic-feed-links');
endif;

if(function_exists('add_editor_style')) :
	add_editor_style();
endif;

if (function_exists('add_image_size')) :
	add_image_size('square', 300, 300, true);
	add_image_size('inner', 960, 300, true);
	add_image_size('inner-blog', 655);
	add_image_size('team', 210, 210, true);
	add_image_size('header', 1400, 600);
	add_image_size('header_short', 1400, 300);
endif;

if(!function_exists('glg_excerpt_more')) :
	function glg_excerpt_more() {
		global $post;
		return '...<br /><a href="'. get_permalink($post->ID) . '" class="more">'.__('Continue reading', 'themelovin').'</a>';
	}
	add_filter('excerpt_more', 'glg_excerpt_more');
endif;

if(!function_exists('glg_truncate_title')) :
	function glg_truncate_title($post, $limit) { 
		$title = get_the_title($post->ID);
		if(strlen($title) >= $limit) {
			$title = $title." "; 
			$title = substr($title, 0, $limit); 
			$title = substr($title, 0, strrpos($title,' ')); 
			$title = $title."...";
		}
		echo '<h1>'.$title.'</h1>';
	}
endif;

if(!function_exists('glg_custom_css')) :
function glg_custom_css($content) {	
	$items = get_posts(array(
		'numberposts' => -1,
		'post_type' => 'portfolio'
	));
	$output = ' ';
	
	foreach($items as $item) {
		$hover_color = get_post_meta($item->ID, "glg_hover_color", true);
		$font_color = get_post_meta($item->ID, "glg_font_color", true);
		
		$output .= "\n#post-".$item->ID.".type-portfolio div.caption {\n";
		$output .= "\tbackground: $hover_color;\n";
		$output .= "}\n";
		
		$output .= "\n#post-".$item->ID.".type-portfolio div.caption, #post-".$item->ID.".type-portfolio div.caption .pictogram {\n";
		$output .= "\tcolor: $font_color;\n";
		$output .= "}\n";
		
	};
	
	return $output;
}
#add_action('glg_custom_styles', 'glg_custom_css', 10);
endif;

if(!function_exists('glg_link_custom_styles')) :
function glg_link_custom_styles() {
    $output = ' ';
    if(apply_filters('glg_custom_styles', $output)) {
    	$permalink_structure = get_option('permalink_structure');
    	$css = home_url().'/glg-custom-styles.css?'.time();
    	$color = get_template_directory_uri().'/themes/'.get_option('adm_color').'.css';
    	if(!$permalink_structure) $css = home_url().'/?page_id=glg-custom-styles.css';
        echo '<link rel="stylesheet" href="'.$css.'" type="text/css" media="screen" />'.'<link rel="stylesheet" href="'.$color.'" type="text/css" media="screen" />';
    }
}
#add_action('wp_head', 'glg_link_custom_styles', 10);
endif;

if(!function_exists('glg_create_custom_styles')) :
function glg_create_custom_styles() {
	$permalink_structure = get_option('permalink_structure');
	$css = false;

	if($permalink_structure){
		if(!isset($_SERVER['REQUEST_URI'])){
		    $_SERVER['REQUEST_URI'] = substr($_SERVER['PHP_SELF'], 1);
		    if(isset($_SERVER['QUERY_STRING'])){ $_SERVER['REQUEST_URI'].='?'.$_SERVER['QUERY_STRING']; }
		}
		$url = (isset($GLOBALS['HTTP_SERVER_VARS']['REQUEST_URI'])) ? $GLOBALS['HTTP_SERVER_VARS']['REQUEST_URI'] : $_SERVER["REQUEST_URI"];
		if(preg_replace('/\\?.*/', '', basename($url)) == 'glg-custom-styles.css') $css = true;
	} else {
		if(isset($_GET['page_id']) && $_GET['page_id'] == 'glg-custom-styles.css') $css = true;
	}

	if($css){
		$output = '';
		header('Content-Type: text/css');
		echo apply_filters('glg_custom_styles', $output);
		exit;	
	}
}
#add_action('init', 'glg_create_custom_styles');
endif;

if(!function_exists('glg_header_slider')) :
	function glg_header_slider($id, $type) {
		$header = get_post_meta($id, 'glg_header', true);
		if(get_custom_header()->url == '' && get_option('adm_port_slideshow') == 'true' && is_page_template('page-portfolio.php')):
			$output = '<div class="flexslider" id="header-slider"><ul class="slides">';
			for($i = 1; $i <= 5; $i++) {
				$current = get_option('adm_port_slide_'.$i);
				if($current != '') {
					$output .= '<li style="background-image: url('.$current.');"></li>';
				}
			}
			$output .= '</ul></div>';
		elseif(get_custom_header()->url == '' && get_option('adm_blog_slideshow') == 'true' && (is_page_template('page-blog.php') || is_home())):
			$output = '<div class="flexslider" id="header-slider"><ul class="slides">';
			for($i = 1; $i <= 5; $i++) {
				$current = get_option('adm_blog_slide_'.$i);
				if($current != '') {
					$output .= '<li style="background-image: url('.$current.');"></li>';
				}
			}
			$output .= '</ul></div>';
		elseif(get_custom_header()->url == '' && get_option('adm_home_slideshow') == 'true' && is_page_template('page-home.php')):
			$output = '<div class="flexslider" id="header-slider"><ul class="slides">';
			for($i = 1; $i <= 5; $i++) {
				$current = get_option('adm_home_slide_'.$i);
				if($current != '') {
					$output .= '<li style="background-image: url('.$current.');"></li>';
				}
			}
			$output .= '</ul></div>';
		elseif(get_custom_header()->url == '' && $header == 'header'):
			$output = '<div class="flexslider" id="header-slider"><ul class="slides">';
			$url = get_post_meta($id, 'glg_header_img', true);
			$output .= '<li style="background-image: url('.$url.');"></li>';
			$output .= '</ul></div>';
		elseif(get_custom_header()->url == ''):
			$args = array(
				'post_type' => 'any',
				'showposts' => -1,
				'meta_key' => 'featured',
				'meta_value' => '1',
			);
			$all = get_posts($args);
			if(count($all) != 0):
				$output = '<div class="flexslider" id="header-slider"><ul class="slides">';
				foreach($all as $current) {
					$thumb = get_post_thumbnail_id( $current->ID );
					$url = wp_get_attachment_image_src( $thumb, 'header');
					$claim = get_post_meta( $current->ID, 'claim', true );
					if(!$claim) $claim = get_the_title($current->ID);
					$output .= '<li><div class="image" style="background-image: url('.$url[0].');"></div>';
					$output .= '<a href="'.get_permalink($current->ID).'" title="'.get_the_title($current->ID).'">
						<div id="claim"><div class="container row">'.$claim.'</div> </a></div></li>' ;
				}
				$output .= '</ul></div>';
			else:
				$output = false;
			endif;
		else:
			$output = '<div class="flexslider" id="header-slider"><ul class="slides">';
			$output .= '<li style="background-image: url('.get_custom_header()->url.');"></li>';
			$output .= '</ul></div>';
		endif;
		return $output;
	}
endif;

if(!function_exists('glg_post_header')) :
	function glg_post_header($id) {
		$output = '';
		if(get_post_meta( $id, 'image_header', true) == 1) {
			$output = '<div class="flexslider" id="header-slider"><ul class="slides">';
			$thumb = get_post_thumbnail_id( $id );
			$url = wp_get_attachment_image_src( $thumb, 'header_short');
			$output .= '<li style="height:400px; display: block;"><div class="image" style="background-image: url('.$url[0].'); height:400px;"></div></li>';
			$output .= '</ul></div>';
		}
		return $output;
	}
endif;

if(!function_exists('glg_get_id_from_src')) :
function glg_get_id_from_src ($image_src) {
	global $wpdb;
	$query = "SELECT ID FROM {$wpdb->posts} WHERE guid='$image_src'";
	$id = $wpdb->get_var($query);
	return $id;
}
endif;

if(!function_exists('glg_gallery_images')) :
	function glg_gallery_images($id, $size) {
		$exclude = array();
		$current = get_post($id);
		$output = '';
		$exclude[] = get_post_thumbnail_id($id); 
		if('header' == get_post_meta($id, 'glg_header', true)) {
			$url = get_post_meta($id, 'glg_header_img', true);
			$exclude[] = glg_get_id_from_src($url);
		}
		$args = array(
			'post_type' => 'attachment', 'post_mime_type' =>'image', 'post_status' => 'inherit', 'post_parent' => $id, 'showposts' => -1, 'exclude' => $exclude,
		);
		$attachments = get_posts($args);
		if ($attachments) {
			$output = '<div class="flexslider" id="inner-slider"><ul class="slides">';
			foreach($attachments as $attachment) {
				$image_alt = $attachment->post_title;
				$thumb = wp_get_attachment_image_src($attachment->ID, $size);
				$output .= '<li><img src="'.$thumb[0].'" alt="'.$image_alt.'" /></li>';
			}
			$output .= '</ul></div>';
		}
		return $output;
	}
endif;

if(!function_exists('glg_video_featured')) :
function glg_video_featured($embed, $type) {
	if($type == 'portfolio') {
		$width = '960';
		$height = '540';
	}
	else {
		$width = '655';
		$height = '368';
	}
	$output = '';
	preg_match_all('/http:\/\/www\.youtube\.com\/embed\/(.{11})|http:\/\/player\.vimeo\.com\/video\/([0-9]{1,10})/i', $embed, $matches);
	if(!empty($matches[0][0])) {
		$output = '<iframe src="';
		$output .= $matches[0][0];
		$output .= '" width="'.$width.'" height="'.$height.'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';
	}
	return $output;
}
endif;

if(!function_exists('glg_addhttp')) :
	function glg_addhttp($url) {
		if(empty($url))
			$url = 'http://www.themelovin.com';
		$url = trim($url, '/');
		if(!preg_match('~^(?:f|ht)tps?://~i', $url)) {
			$url = 'http://'.$url;
		}
		$array = array(
			"url" => $url
		);
		
		$urlParts = parse_url($url);
		$array['domain'] = preg_replace('/^www\./', '', $urlParts['host']);
		
		return $array;
	}
endif;

if(!function_exists('glg_img_paragraph')) :
	function glg_img_paragraph($content) {
		$content = preg_replace('/<p>\\s*?(<a .*?><img.*?><\\/a>|<img.*?>)?\\s*<\\/p>/s', '<figure>$1</figure>', $content);
		return $content;
	}
	add_filter('the_content', 'glg_img_paragraph', 10);
endif;

function get_the($field){
		global $post, $post_object ;

		if($post->post_type == 'page') 
			return get_post_meta($post->ID, $field, true); 

		$class = '\\Benedict\\' . ucfirst($post->post_type) ;

		if (empty($post_object) || $post_object->ID != $post->ID){
			$post_object = new $class($post) ;
		}

		if($class::$fields[$field]['type'] == 'set') return $post_object->set($field);

		return $post_object->$field  ;

	}
	function the_($field, $editable = false){
		global $post, $post_object ;
		$class = '\\Benedict\\' . ucfirst($post->post_type) ;
		$value = get_the($field);
		$editable_when_filled = true ; $empty = false ; 
		if(!is_single($post->ID)) $editable = false ; 
		if(!$editable_when_filled && !(($value && !empty($value) )|| intval($value) === 0)) $editable = false ;

		$data_type = $field == 'content' ? 'textarea' : $class::$fields[$field]['type'] ;
		if(!in_array($data_type, array('text', 'textarea', 'select', 'date', 'checklist'))) $data_type = 'text' ;
		$tag_properties = $editable ? sprintf("data-name='%s' data-type='%s' data-pk='%s' data-url='%s'", 
			$field, $data_type, $post->ID, admin_url('admin-ajax.php')) : "";

		$default = 'content' == $field ? '' : $class::$fields[$field]['default'] ;
		if(($value && !empty($value) && $value != $default)){
			$content =  $value ;
		} else {
			$content =  $editable ? '' : __('spot_field_info_missing', 'benedict') ;
			$empty = true;
		}

		echo sprintf("<span class='field%s%s' %s %s >", $editable ? ' editable' : '', $empty ? ' empty': '',  $data_type, $tag_properties);
		
		echo $content ; 

		echo "</span>" ;
		
	}

	function the_editable_($field, $condition = true){
		the_($field, $condition);
	}

	function inline_svg($url, $class='', $html=array()){
		if(strpos($url, 'http://') === false){
			$url = get_stylesheet_directory_uri().$url ;
		}

		$path = str_replace(home_url(), ABSPATH, $url);
		if($url == '') die ($path);
		require $path ;
	}

?>