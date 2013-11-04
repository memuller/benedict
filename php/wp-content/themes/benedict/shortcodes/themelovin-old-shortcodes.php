<?php
/*
* @since version 2.0
* This file contents old shortcodes, all shortcodes are renamed with a prefix of the word vision.
* This will prevent conflict with theme shortcode name.
* All new shortcode usage and function will remain the same, only the shortcode names and functions names are changed.
* Old shortcodes has been modified to exercute new shortcode.
* IMPORTANT, do not remove this file or any codes from this file to remain backward compatibility.
*/


/*-----------------------------------------------------*/
/*	Accordions
/*-----------------------------------------------------*/

function o_glg_accordion_wrap( $atts, $content = null ) {
   $new_shortcode = "[glg_accordion_set]".do_shortcode($content)."[/glg_accordion_set]";
   $output = do_shortcode("{$new_shortcode}");
   return $output;
}
add_shortcode('accordion_set', 'o_glg_accordion_wrap');


function o_glg_accordion_content($atts, $content = null) {
  extract(shortcode_atts(array(
  'title' => '',
  'active' => '',
  ), $atts));

  $new_shortcode = "[glg_accordion title='{$title}' active='{$active}']".do_shortcode($content)."[/glg_accordion]";
  $output = do_shortcode("{$new_shortcode}");

  return $output;
}
add_shortcode('accordion', 'o_glg_accordion_content');



/*-----------------------------------------------------*/
/*	Buttons
/*-----------------------------------------------------*/
function o_glg_button($atts, $content = null) {
  extract(shortcode_atts(array(
  'size' => '',
  'color' => '',
  'url' => '',
  'target' => '',
	'lightbox_content' => '',
	'lightbox_description' => '',
  ), $atts));
  
  $new_shortcode = "[glg_button url='{$url}' class='button' size='{$size}' color='{$color}' target='{$target}' lightbox_content='{$lightbox_content}' lightbox_description='{$lightbox_description}']".do_shortcode($content)."[/glg_button]";
  $output = do_shortcode("{$new_shortcode}");

  return $output;
}
add_shortcode('button', 'o_glg_button');


/*-----------------------------------------------------*/
/*	Columns
/*-----------------------------------------------------*/
// 6
function o_glg_one_sixth( $atts, $content = null ) {
  $new_shortcode = "[glg_one_sixth]".do_shortcode($content)."[/glg_one_sixth]";
  $output = do_shortcode("{$new_shortcode}");
  return $output;
}
add_shortcode('one_sixth', 'o_glg_one_sixth');


// 5
function o_glg_one_fifth( $atts, $content = null ) {
  $new_shortcode = "[glg_one_fifth]".do_shortcode($content)."[/glg_one_fifth]";
  $output = do_shortcode("{$new_shortcode}");
  return $output;
}
add_shortcode('one_fifth', 'o_glg_one_fifth');


// 4
function o_glg_one_fourth( $atts, $content = null ) {
  $new_shortcode = "[glg_one_fourth]".do_shortcode($content)."[/glg_one_fourth]";
  $output = do_shortcode("{$new_shortcode}");
  return $output;
}
add_shortcode('one_fourth', 'o_glg_one_fourth');


// 3
function o_glg_one_third( $atts, $content = null ) {
  $new_shortcode = "[glg_one_third]".do_shortcode($content)."[/glg_one_third]";
  $output = do_shortcode("{$new_shortcode}");
  return $output;
}
add_shortcode('one_third', 'o_glg_one_third');


// 2
function o_glg_one_half( $atts, $content = null ) {
  $new_shortcode = "[glg_one_half]".do_shortcode($content)."[/glg_one_half]";
  $output = do_shortcode("{$new_shortcode}");
  return $output;
}
add_shortcode('one_half', 'o_glg_one_half');


// 2/3
function o_glg_two_thirds( $atts, $content = null ) {
  $new_shortcode = "[glg_two_thirds]".do_shortcode($content)."[/glg_two_thirds]";
  $output = do_shortcode("{$new_shortcode}");
  return $output;
}
add_shortcode('two_thirds', 'o_glg_two_thirds');


// divider
function o_glg_column_break( $atts, $content = null ) {
  $new_shortcode = "[glg_column_break]".do_shortcode($content)."[/glg_column_break]";
  $output = do_shortcode("{$new_shortcode}");
  return $output;
}
add_shortcode('column_break', 'o_glg_column_break');



/*-----------------------------------------------------*/
/*	Content Boxes
/*-----------------------------------------------------*/
function o_glg_contentbox($atts, $content = null) {
  extract(shortcode_atts(array(
  'style' => '',
  'title' => '',
  ), $atts));
  
  $new_shortcode = "[glg_content_box style='{$style}' title='{$title}']".do_shortcode($content)."[/glg_content_box]";
  $output = do_shortcode("{$new_shortcode}");
  return $output;
}
add_shortcode('content_box', 'o_glg_contentbox');



/*-----------------------------------------------------*/
/*	Dividers
/*-----------------------------------------------------*/
function o_glg_dividers($atts, $content = null) {
  extract(shortcode_atts(array(
  'style' => '',
  ), $atts));
  
  $new_shortcode = "[glg_divider style='{$style}']";
  $output = do_shortcode("{$new_shortcode}");
  return $output;
}
add_shortcode('divider', 'o_glg_dividers');


/*-----------------------------------------------------*/
/*	Email Encoder
/*-----------------------------------------------------*/
function o_glg_mailto( $atts , $content=null ) {

  $new_shortcode = "[glg_mailto]".do_shortcode($content)."[/glg_mailto]";
  $output = do_shortcode("{$new_shortcode}");
  return $output;

}
add_shortcode('mailto', 'o_glg_mailto');

/*-----------------------------------------------------*/
/*	Icons
/*-----------------------------------------------------*/
function o_glg_icons($atts, $content = null) {
  extract(shortcode_atts(array(
  'url' => '',
  'style' => '',
  'target' => '',
	'lightbox_content' => '',
	'lightbox_description' => '',
  ), $atts));
  
  $new_shortcode = "[glg_icon style='{$style}' url='{$url}' target='{$target}' lightbox_content='{$lightbox_content}' lightbox_description='{$lightbox_description}']".do_shortcode($content)."[/glg_icon]";
  $output = do_shortcode("{$new_shortcode}");
  return $output;
}
add_shortcode('icon', 'o_glg_icons');




/*-----------------------------------------------------*/
/*	Icons - Minimal
/*-----------------------------------------------------*/
function o_glg_icons_minimal($atts, $content = null) {
  extract(shortcode_atts(array(
  'url' => '',
  'style' => '',
  'heading' => '',
  'target' => '',
	'lightbox_content' => '',
	'lightbox_description' => '',
  ), $atts));
  
  $new_shortcode = "[glg_minimal_icon style='{$style}' url='{$url}' target='{$target}' lightbox_content='{$lightbox_content}' lightbox_description='{$lightbox_description}']".do_shortcode($content)."[/glg_minimal_icon]";
  $output = do_shortcode("{$new_shortcode}");
  return $output;
}
add_shortcode('minimal_icon', 'o_glg_icons_minimal');




/*-----------------------------------------------------*/
/*	Notification Boxes
/*-----------------------------------------------------*/
function o_glg_notification($atts, $content = null) {
  extract(shortcode_atts(array(
  'style' => '',
  'font_size' => '13px',
  'closeable' => '',
  ), $atts));
  
  
  $new_shortcode = "[glg_notification style='{$style}' font_size='{$font_size}' closeable='{$closeable}']".do_shortcode($content)."[/glg_notification]";
  $output = do_shortcode("{$new_shortcode}");
  return $output;
}
add_shortcode('notification', 'o_glg_notification');


/*-----------------------------------------------------*/
/*	Tabs
/*-----------------------------------------------------*/
function o_glg_tabs_wrap($atts, $content = null) {
  extract(shortcode_atts(array(
  'style' => '',
  ), $atts));
  
  $new_shortcode = "[glg_tabset style='{$style}']".do_shortcode($content)."[/glg_tabset]";
  $output = do_shortcode("{$new_shortcode}");
  return $output;
}
add_shortcode('tabset', 'o_glg_tabs_wrap');



function o_glg_tabs_content($atts, $content = null) {
  extract(shortcode_atts(array(
  'title' => '',
  'active' => '',
  ), $atts));
  
  $new_shortcode = "[glg_tab title='{$title}' active='{$active}']".do_shortcode($content)."[/glg_tab]";
  $output = do_shortcode("{$new_shortcode}");
  return $output;
}
add_shortcode('tab', 'o_glg_tabs_content');



/*-----------------------------------------------------*/
/*	Testimonials
/*-----------------------------------------------------*/
function o_glg_testimonial_wrap( $atts, $content = null ) {
  
  $new_shortcode = "[glg_testimonial_set]".do_shortcode($content)."[/glg_testimonial_set]";
  $output = do_shortcode("{$new_shortcode}");
  return $output;

}
add_shortcode('testimonial_set', 'o_glg_testimonial_wrap');



function o_glg_testimonial_content($atts, $content = null) {
  extract(shortcode_atts(array(
  'client' => '',
  ), $atts));
  
  $new_shortcode = "[glg_testimonial client='{$client}']".do_shortcode($content)."[/glg_testimonial]";
  $output = do_shortcode("{$new_shortcode}");
  return $output;
  
}
add_shortcode('testimonial', 'o_glg_testimonial_content');

?>