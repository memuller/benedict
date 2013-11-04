<?php
/*-----------------------------------*/
/*	Bar graph
/*-----------------------------------*/

function glg_bar_graph($atts, $content = null) {  
    return '<ul class="bar_graph">'. do_shortcode($content) .'</ul>';
}
add_shortcode('glg_short_bar_graph', 'glg_bar_graph');


function glg_bar($atts, $content = null) {
	extract(shortcode_atts(array(
	"title" => '',
	"color" => ''
	), $atts)); 
	 
	return '<li><p>'.$title.'</p><div class="bar-wrap"><span data-width="'.$content.'" class="'.$color.'"></span></div></li>';
}
add_shortcode('glg_short_bar', 'glg_bar');

/*-----------------------------------*/
/*	Knob
/*-----------------------------------*/
function glg_knob_wrap( $atts, $content = null ) {
   return '[raw]<ul class="glg_short_circ_wrap">[/raw]' . do_shortcode($content) . '[raw]</ul>[/raw]';
}
add_shortcode('glg_short_knob_set', 'glg_knob_wrap');

function glg_short_knob( $atts , $content=null ) {
	extract(shortcode_atts(array(
	"title" => '',
	'color' => ''
	), $atts));
	
	$id = str_replace(' ', '-', $title);

	return '[raw]<li class="glg_short_circ_singular_wrap"><input class="knob" id="'.$id.'" data-fgcolor="'.$color.'" data-thickness=".13" data-readOnly=true rel="'.$content.'" value="0"><p>'.$title.'</p></li>[/raw]';

}
add_shortcode('glg_knob', 'glg_short_knob');

/*-----------------------------------*/
/*	Accordions
/*-----------------------------------*/
function glg_accordion_wrap( $atts, $content = null ) {
   return '[raw]<dl class="glg_short-accordion">[/raw]' . do_shortcode($content) . '[raw]</dl>[/raw]';
}
add_shortcode('glg_short_accordion_set', 'glg_accordion_wrap');



function glg_accordion_content($atts, $content = null) {
  extract(shortcode_atts(array(
  'title' => '',
  'active' => '',
  ), $atts));
  
  if ($active == 'yes'){
  	$output = '[raw]<dt class="current">'.$title.'</dt><dd class="current">[/raw]' . do_shortcode($content) . '[raw]</dd>[/raw]';
  } else{
	$output = '[raw]<dt>'.$title.'</dt><dd>[/raw]' . do_shortcode($content) . '[raw]</dd>[/raw]';
  }
  
  return $output;
}
add_shortcode('glg_short_accordion', 'glg_accordion_content');



/*-----------------------------------*/
/*	Buttons
/*-----------------------------------*/
function glg_button($atts, $content = null) {
  extract(shortcode_atts(array(
  'size' => '',
  'color' => '',
  'url' => '',
  'target' => '',
	'lightbox_content' => '',
	'lightbox_description' => '',
  ), $atts));
  
	if(!empty($lightbox_content)) {
		$output = '<a href="'.$lightbox_content.'" class="'.$size.' '.$color.' glg_short-button" data-gal="prettyPhoto" title="'.$lightbox_description.'">' .do_shortcode($content). '</a>';
		
	} else {
		
  $output = '<a href="'.$url.'" class="'.$size.' '.$color.' glg_short-button" target="'.$target.'">' .do_shortcode($content). '</a>';
	
	};
	
  return $output;
}
add_shortcode('glg_short_button', 'glg_button');


//@since version 2.0 The column css has been changed to .vision prefix, example .glg_short_one_sixth
/*-----------------------------------*/
/*	Columns
/*-----------------------------------*/
// 6
function glg_one_sixth( $atts, $content = null ) {
   return '[raw]<div class="glg_short_one_sixth">[/raw]' . do_shortcode($content) . '[raw]</div>[/raw]';
}
add_shortcode('glg_short_one_sixth', 'glg_one_sixth');


// 5
function glg_one_fifth( $atts, $content = null ) {
   return '[raw]<div class="glg_short_one_fifth">[/raw]' . do_shortcode($content) . '[raw]</div>[/raw]';
}
add_shortcode('glg_short_one_fifth', 'glg_one_fifth');


// 4
function glg_one_fourth( $atts, $content = null ) {
   return '[raw]<div class="glg_short_one_fourth">[/raw]' . do_shortcode($content) . '[raw]</div>[/raw]';
}
add_shortcode('glg_short_one_fourth', 'glg_one_fourth');


// 3
function glg_one_third( $atts, $content = null ) {
   return '[raw]<div class="glg_short_one_third">[/raw]' . do_shortcode($content) . '[raw]</div>[/raw]';
}
add_shortcode('glg_short_one_third', 'glg_one_third');


// 2
function glg_one_half( $atts, $content = null ) {
   return '[raw]<div class="glg_short_one_half">[/raw]' . do_shortcode($content) . '[raw]</div>[/raw]';
}
add_shortcode('glg_short_one_half', 'glg_one_half');


// 2/3
function glg_two_thirds( $atts, $content = null ) {
   return '[raw]<div class="glg_short_two_thirds">[/raw]' . do_shortcode($content) . '[raw]</div>[/raw]';
}
add_shortcode('glg_short_two_thirds', 'glg_two_thirds');


// divider
function glg_column_break( $atts, $content = null ) {
   return '[raw]<div class="glg_short_column_clear">&nbsp;</div>[/raw]';
}
add_shortcode('glg_short_column_break', 'glg_column_break');



/*-----------------------------------*/
/*	Content Boxes
/*-----------------------------------*/
function glg_contentbox($atts, $content = null) {
  extract(shortcode_atts(array(
  'style' => '',
  'title' => '',
  ), $atts));
  
	$output = '<div class="glg_short-contentbox"><div class="glg_short-contentbox-title tt-cb-title-'.$style.'"><span>'.$title.'</span></div><div class="glg_short-contentbox-content tt-content-style-'.$style.'">' .do_shortcode($content). '</div></div>';
  
  return $output;
}
add_shortcode('glg_short_content_box', 'glg_contentbox');



/*-----------------------------------*/
/*	Dividers
/*-----------------------------------*/
function glg_dividers($atts, $content = null) {
  extract(shortcode_atts(array(
  'style' => '',
  ), $atts));
  
  $output = '<div class="hr '.$style.'">&nbsp;</div>';
  return $output;
}
add_shortcode('glg_short_divider', 'glg_dividers');


/*-----------------------------------*/
/*	Email Encoder
/*-----------------------------------*/
function glg_mailto( $atts , $content=null ) {

	$encodedmail = '';

    for ($i = 0; $i < strlen($content); $i++) $encodedmail .= "&#" . ord($content[$i]) . ';';

  return '<a href="mailto:'.$encodedmail.'">'.$encodedmail.'</a>';

}
add_shortcode('glg_short_mailto', 'glg_mailto');

/*-----------------------------------*/
/*	Icons
/*-----------------------------------*/
function glg_short_icons($atts, $content = null) {
  extract(shortcode_atts(array(
  'url' => '',
  'style' => '',
  'target' => ''
  ), $atts));
  
  $pictograms = array(
  'icon-phone' => '<span class="pictogram">&#128222;</span>',
  'icon-mobile' => '<span class="pictogram">&#128241;</span>',
  'icon-mouse' => '<span class="pictogram">&#59273;</span>',
  'icon-address' => '<span class="pictogram">&#59171;</span>',
  'icon-mail' => '<span class="pictogram">&#9993;</span>',
  'icon-paper-plane' => '<span class="pictogram">&#128319;</span>',
  'icon-pencil' => '<span class="pictogram">&#9998;</span>',
  'icon-feather' => '<span class="pictogram">&#10002;</span>',
  'icon-attach' => '<span class="pictogram">&#128206;</span>',
  'icon-inbox' => '<span class="pictogram">&#59255;</span>',
  'icon-reply' => '<span class="pictogram">&#59154;</span>',
  'icon-reply-all' => '<span class="pictogram">&#59155;</span>',
  'icon-forward' => '<span class="pictogram">&#10150;</span>',
  'icon-user' => '<span class="pictogram">&#128100;</span>',
  'icon-users' => '<span class="pictogram">&#128101;</span>',
  'icon-add-user' => '<span class="pictogram">&#59136;</span>',
  'icon-vcard' => '<span class="pictogram">&#59170;</span>',
  'icon-export' => '<span class="pictogram">&#59157;</span>',
  'icon-location' => '<span class="pictogram">&#59172;</span>',
  'icon-map' => '<span class="pictogram">&#59175;</span>',
  'icon-compass' => '<span class="pictogram">&#59176;</span>',
  'icon-direction' => '<span class="pictogram">&#10146;</span>',
  'icon-hair-cross' => '<span class="pictogram">&#127919;</span>',
  'icon-share' => '<span class="pictogram">&#59196;</span>',
  'icon-shareable' => '<span class="pictogram">&#59198;</span>',
  'icon-heart' => '<span class="pictogram">&hearts;</span>',
  'icon-heart-empty' => '<span class="pictogram">&#9825;</span>',
  'icon-star' => '<span class="pictogram">&#9733;</span>',
  'icon-star-empty' => '<span class="pictogram">&#9734;</span>',
  'icon-thumbs-up' => '<span class="pictogram">&#128077;</span>',
  'icon-thumbs-down' => '<span class="pictogram">&#128078;</span>',
  'icon-chat' => '<span class="pictogram">&#59168;</span>',
  'icon-comment' => '<span class="pictogram">&#59160;</span>',
  'icon-quote' => '<span class="pictogram">&#10078;</span>',
  'icon-home' => '<span class="pictogram">&#8962;</span>',
  'icon-popup' => '<span class="pictogram">&#59212;</span>',
  'icon-search' => '<span class="pictogram">&#128269;</span>',
  'icon-flashlight' => '<span class="pictogram">&#128294;</span>',
  'icon-print' => '<span class="pictogram">&#59158;</span>',
  'icon-bell' => '<span class="pictogram">&#128276;</span>',
  'icon-link' => '<span class="pictogram">&#128279;</span>',
  'icon-flag' => '<span class="pictogram">&#9873;</span>',
  'icon-cog' => '<span class="pictogram">&#9881;</span>',
  'icon-tools' => '<span class="pictogram">&#9874;</span>',
  'icon-trophy' => '<span class="pictogram">&#127942;</span>',
  'icon-tag' => '<span class="pictogram">&#59148;</span>',
  'icon-camera' => '<span class="pictogram">&#128247;</span>',
  'icon-megaphone' => '<span class="pictogram">&#128227;</span>',
  'icon-moon' => '<span class="pictogram">&#9789;</span>',
  'icon-palette' => '<span class="pictogram">&#127912;</span>',
  'icon-leaf' => '<span class="pictogram">&#127810;</span>',
  'icon-note' => '<span class="pictogram">&#9834;</span>',
  'icon-beamed-note' => '<span class="pictogram">&#9835;</span>',
  'icon-new' => '<span class="pictogram">&#128165;</span>',
  'icon-graduation-cap' => '<span class="pictogram">&#127891;</span>',
  'icon-book' => '<span class="pictogram">&#128213;</span>',
  'icon-newspaper' => '<span class="pictogram">&#128240;</span>',
  'icon-bag' => '<span class="pictogram">&#128092;</span>',
  'icon-airplane' => '<span class="pictogram">&#9992;</span>',
  'icon-lifebuoy' => '<span class="pictogram">&#59272;</span>',
  'icon-eye' => '<span class="pictogram">&#59146;</span>',
  'icon-clock' => '<span class="pictogram">&#128340;</span>',
  'icon-mic' => '<span class="pictogram">&#127908;</span>',
  'icon-calendar' => '<span class="pictogram">&#128197;</span>',
  'icon-flash' => '<span class="pictogram">&#9889;</span>',
  'icon-thunder-cloud' => '<span class="pictogram">&#9928;</span>',
  'icon-droplet' => '<span class="pictogram">&#128167;</span>',
  'icon-cd' => '<span class="pictogram">&#128191;</span>',
  'icon-briefcase' => '<span class="pictogram">&#128188;</span>',
  'icon-air' => '<span class="pictogram">&#128168;</span>',
  'icon-hourglass' => '<span class="pictogram">&#9203;</span>',
  'icon-gauge' => '<span class="pictogram">&#128711;</span>',
  'icon-language' => '<span class="pictogram">&#127892;</span>',
  'icon-network' => '<span class="pictogram">&#59254;</span>',
  'icon-key' => '<span class="pictogram">&#128273;</span>',
  'icon-battery' => '<span class="pictogram">&#128267;</span>',
  'icon-bucket' => '<span class="pictogram">&#128254;</span>',
  'icon-magnet' => '<span class="pictogram">&#59297;</span>',
  'icon-drive' => '<span class="pictogram">&#128253;</span>',
  'icon-cup' => '<span class="pictogram">&#9749;</span>',
  'icon-rocket' => '<span class="pictogram">&#128640;</span>',
  'icon-brush' => '<span class="pictogram">&#59290;</span>',
  'icon-suitcase' => '<span class="pictogram">&#128710;</span>',
  'icon-traffic-cone' => '<span class="pictogram">&#128712;</span>',
  'icon-globe' => '<span class="pictogram">&#127758;</span>',
  'icon-keyboard' => '<span class="pictogram">&#9000;</span>',
  'icon-browser' => '<span class="pictogram">&#59214;</span>',
  'icon-publish' => '<span class="pictogram">&#59213;</span>',
  'icon-progress-3' => '<span class="pictogram">&#59243;</span>',
  'icon-progress-2' => '<span class="pictogram">&#59242;</span>',
  'icon-progress-1' => '<span class="pictogram">&#59241;</span>',
  'icon-progress-0' => '<span class="pictogram">&#59240;</span>',
  'icon-light-down' => '<span class="pictogram">&#128261;</span>',
  'icon-light-up' => '<span class="pictogram">&#128262;</span>',
  'icon-adjust' => '<span class="pictogram">&#9681;</span>',
  'icon-code' => '<span class="pictogram">&#59156;</span>',
  'icon-monitor' => '<span class="pictogram">&#128187;</span>',
  'icon-infinity' => '<span class="pictogram">&infin;</span>',
  'icon-light-bulb' => '<span class="pictogram">&#128161;</span>',
  'icon-credit-card' => '<span class="pictogram">&#128179;</span>',
  'icon-database' => '<span class="pictogram">&#128248;</span>',
  'icon-voicemail' => '<span class="pictogram">&#9991;</span>',
  'icon-clipboard' => '<span class="pictogram">&#128203;</span>',
  'icon-cart' => '<span class="pictogram">&#59197;</span>',
  'icon-box' => '<span class="pictogram">&#128230;</span>',
  'icon-ticket' => '<span class="pictogram">&#127915;</span>',
  'icon-rss' => '<span class="pictogram">&#59194;</span>',
  'icon-signal' => '<span class="pictogram">&#128246;</span>',
  'icon-thermometer' => '<span class="pictogram">&#128255;</span>',
  'icon-water' => '<span class="pictogram">&#128166;</span>',
  'icon-sweden' => '<span class="pictogram">&#62977;</span>',
  'icon-line-graph' => '<span class="pictogram">&#128200;</span>',
  'icon-pie-chart' => '<span class="pictogram">&#9716;</span>',
  'icon-bar-graph' => '<span class="pictogram">&#128202;</span>',
  'icon-area-graph' => '<span class="pictogram">&#128318;</span>',
  'icon-lock' => '<span class="pictogram">&#128274;</span>',
  'icon-lock-open' => '<span class="pictogram">&#59194;</span>',
  'icon-logout' => '<span class="pictogram">&#59201;</span>',
  'icon-login' => '<span class="pictogram">&#59200;</span>',
  'icon-check' => '<span class="pictogram">&#10003;</span>',
  'icon-cross' => '<span class="pictogram">&#10060;</span>',
  'icon-squared-minus' => '<span class="pictogram">&#8863;</span>',
  'icon-squared-plus' => '<span class="pictogram">&#8862;</span>',
  'icon-squared-cross' => '<span class="pictogram">&#10062;</span>',
  'icon-circled-minus' => '<span class="pictogram">&#8854;</span>',
  'icon-circled-plus' => '<span class="pictogram">&oplus;</span>',
  'icon-circled-cross' => '<span class="pictogram">&#10006;</span>',
  'icon-minus' => '<span class="pictogram">&#10134;</span>',
  'icon-plus' => '<span class="pictogram">&#10133;</span>',
  'icon-erase' => '<span class="pictogram">&#9003;</span>',
  'icon-block' => '<span class="pictogram">&#128683;</span>',
  'icon-info' => '<span class="pictogram">&#8505;</span>',
  'icon-circled-info' => '<span class="pictogram">&#59141;</span>',
  'icon-help' => '<span class="pictogram">&#10067;</span>',
  'icon-circled-help' => '<span class="pictogram">&#59140;</span>',
  'icon-warning' => '<span class="pictogram">&#9888;</span>',
  'icon-cycle' => '<span class="pictogram">&#128260;</span>',
  'icon-cw' => '<span class="pictogram">&#10227;</span>',
  'icon-ccw' => '<span class="pictogram">&#10226;</span>',
  'icon-shuffle' => '<span class="pictogram">&#128256;</span>',
  'icon-back' => '<span class="pictogram">&#128281;</span>',
  'icon-level-down' => '<span class="pictogram">&#8627;</span>',
  'icon-retweet' => '<span class="pictogram">&#59159;</span>',
  'icon-loop' => '<span class="pictogram">&#128257;</span>',
  'icon-back-in-time' => '<span class="pictogram">&#59249;</span>',
  'icon-level-up' => '<span class="pictogram">&#8624;</span>',
  'icon-switch' => '<span class="pictogram">&#8646;</span>',
  'icon-numbered-list' => '<span class="pictogram">&#57349;</span>',
  'icon-add-to-list' => '<span class="pictogram">&#57347;</span>',
  'icon-layout' => '<span class="pictogram">&#9871;</span>',
  'icon-list' => '<span class="pictogram">&#9776;</span>',
  'icon-text-doc' => '<span class="pictogram">&#128196;</span>',
  'icon-text-doc-inverted' => '<span class="pictogram">&#59185;</span>',
  'icon-doc' => '<span class="pictogram">&#59184;</span>',
  'icon-docs' => '<span class="pictogram">&#59190;</span>',
  'icon-landscape-doc' => '<span class="pictogram">&#59191;</span>',
  'icon-picture' => '<span class="pictogram">&#127748;</span>',
  'icon-video' => '<span class="pictogram">&#127916;</span>',
  'icon-music' => '<span class="pictogram">&#127925;</span>',
  'icon-folder' => '<span class="pictogram">&#128193;</span>',
  'icon-archive' => '<span class="pictogram">&#59392;</span>',
  'icon-trash' => '<span class="pictogram">&#59177;</span>',
  'icon-upload' => '<span class="pictogram">&#128228;</span>',
  'icon-download' => '<span class="pictogram">&#128229;</span>',
  'icon-save' => '<span class="pictogram">&#128190;</span>',
  'icon-install' => '<span class="pictogram">&#59256;</span>',
  'icon-cloud' => '<span class="pictogram">&#9729;</span>',
  'icon-upload-cloud' => '<span class="pictogram">&#59153;</span>',
  'icon-bookmark' => '<span class="pictogram">&#128278;</span>',
  'icon-bookmarks' => '<span class="pictogram">&#128209;</span>',
  'icon-open-book' => '<span class="pictogram">&#128214;</span>',
  'icon-play' => '<span class="pictogram">&#9654;</span>',
  'icon-paus' => '<span class="pictogram">&#8214;</span>',
  'icon-record' => '<span class="pictogram">&#9679;</span>',
  'icon-stop' => '<span class="pictogram">&#9632;</span>',
  'icon-ff' => '<span class="pictogram">&#9193;</span>',
  'icon-fb' => '<span class="pictogram">&#9194;</span>',
  'icon-to-start' => '<span class="pictogram">&#9198;</span>',
  'icon-to-end' => '<span class="pictogram">&#9197;</span>',
  'icon-resize-full' => '<span class="pictogram">&#59204;</span>',
  'icon-resize-small' => '<span class="pictogram">&#59206;</span>',
  'icon-volume' => '<span class="pictogram">&#9207;</span>',
  'icon-sound' => '<span class="pictogram">&#128266;</span>',
  'icon-mute' => '<span class="pictogram">&#128263;</span>',
  'icon-flow-cascade' => '<span class="pictogram">&#128360;</span>',
  'icon-flow-branch' => '<span class="pictogram">&#128361;</span>',
  'icon-flow-tree' => '<span class="pictogram">&#128362;</span>',
  'icon-flow-line' => '<span class="pictogram">&#128363;</span>',
  'icon-flow-parallel' => '<span class="pictogram">&#128364;</span>',
  'icon-left-bold' => '<span class="pictogram">&#58541;</span>',
  'icon-down-bold' => '<span class="pictogram">&#58544;</span>',
  'icon-up-bold' => '<span class="pictogram">&#58543;</span>',
  'icon-right-bold' => '<span class="pictogram">&#58542;</span>',
  'icon-left' => '<span class="pictogram">&#11013;</span>',
  'icon-down' => '<span class="pictogram">&#11015;</span>',
  'icon-up' => '<span class="pictogram">&#11014;</span>',
  'icon-right' => '<span class="pictogram">&#10145;</span>',
  'icon-circled-left' => '<span class="pictogram">&#59225;</span>',
  'icon-circled-down' => '<span class="pictogram">&#59224;</span>',
  'icon-circled-up' => '<span class="pictogram">&#59227;</span>',
  'icon-circled-right' => '<span class="pictogram">&#59226;</span>',
  'icon-triangle-left' => '<span class="pictogram">&#9666;</span>',
  'icon-triangle-down' => '<span class="pictogram">&#9662;</span>',
  'icon-triangle-up' => '<span class="pictogram">&#9652;</span>',
  'icon-triangle-right' => '<span class="pictogram">&#9656;</span>',
  'icon-chevron-left' => '<span class="pictogram">&#59229;</span>',
  'icon-chevron-down' => '<span class="pictogram">&#59228;</span>',
  'icon-chevron-up' => '<span class="pictogram">&#59231;</span>',
  'icon-chevron-right' => '<span class="pictogram">&#59230;</span>',
  'icon-chevron-small-left' => '<span class="pictogram">&#59233;</span>',
  'icon-chevron-small-down' => '<span class="pictogram">&#59232;</span>',
  'icon-chevron-small-up' => '<span class="pictogram">&#59235;</span>',
  'icon-chevron-small-right' => '<span class="pictogram">&#59234;</span>',
  'icon-chevron-thin-left' => '<span class="pictogram">&#59237;</span>',
  'icon-chevron-thin-down' => '<span class="pictogram">&#59236;</span>',
  'icon-chevron-thin-up' => '<span class="pictogram">&#59239;</span>',
  'icon-chevron-thin-right' => '<span class="pictogram">&#59238;</span>',
  'icon-left-thin' => '<span class="pictogram">&larr;</span>',
  'icon-down-thin' => '<span class="pictogram">&darr;</span>',
  'icon-up-thin' => '<span class="pictogram">&uarr;</span>',
  'icon-right-thin' => '<span class="pictogram">&rarr;</span>',
  'icon-arrow-combo' => '<span class="pictogram">&#59215;</span>',
  'icon-three-dots' => '<span class="pictogram">&#9206;</span>',
  'icon-two-dots' => '<span class="pictogram">&#9205;</span>',
  'icon-dot' => '<span class="pictogram">&#9204;</span>',
  'icon-cc' => '<span class="pictogram">&#128325;</span>',
  'icon-cc-by' => '<span class="pictogram">&#128326;</span>',
  'icon-cc-nc' => '<span class="pictogram">&#128327;</span>',
  'icon-cc-nc-eu' => '<span class="pictogram">&#128328;</span>',
  'icon-cc-nc-jp' => '<span class="pictogram">&#128329;</span>',
  'icon-cc-sa' => '<span class="pictogram">&#128330;</span>',
  'icon-cc-nd' => '<span class="pictogram">&#128331;</span>',
  'icon-cc-pd' => '<span class="pictogram">&#128332;</span>',
  'icon-cc-zero' => '<span class="pictogram">&#128333;</span>',
  'icon-cc-share' => '<span class="pictogram">&#128334;</span>',
  'icon-cc-remix' => '<span class="pictogram">&#128335;</span>',
  'icon-db-logo' => '<span class="pictogram">&#128505;</span>',
  'icon-db-shape' => '<span class="pictogram">&#128506</span>',
  'icon-github' => '<span class="pictogram-social">&#62208;</span>',
  'icon-c-github' => '<span class="pictogram-social">&#62209;</span>',
  'icon-flickr' => '<span class="pictogram-social">&#62211;</span>',
  'icon-c-flickr' => '<span class="pictogram-social">&#62212;</span>',
  'icon-vimeo' => '<span class="pictogram-social">&#62214;</span>',
  'icon-c-vimeo' => '<span class="pictogram-social">&#62215;</span>',
  'icon-twitter' => '<span class="pictogram-social">&#62214;</span>',
  'icon-c-twitter' => '<span class="pictogram-social">&#62215;</span>',
  'icon-facebook' => '<span class="pictogram-social">&#62220;</span>',
  'icon-c-facebook' => '<span class="pictogram-social">&#62221;</span>',
  'icon-s-facebook' => '<span class="pictogram-social">&#62220;</span>',
  'icon-google+' => '<span class="pictogram-social">&#62223;</span>',
  'icon-c-google+' => '<span class="pictogram-social">&#62224;</span>',
  'icon-google+' => '<span class="pictogram-social">&#62223;</span>',
  'icon-c-google+' => '<span class="pictogram-social">&#62224;</span>',
  'icon-pinterest' => '<span class="pictogram-social">&#62226;</span>',
  'icon-c-pinterest' => '<span class="pictogram-social">&#62227;</span>',
  'icon-tumblr' => '<span class="pictogram-social">&#62229;</span>',
  'icon-c-tumblr' => '<span class="pictogram-social">&#62230;</span>',
  'icon-linkedin' => '<span class="pictogram-social">&#62232;</span>',
  'icon-c-linkedin' => '<span class="pictogram-social">&#62232;</span>',
  'icon-dribbble' => '<span class="pictogram-social">&#62235;</span>',
  'icon-c-dribbble' => '<span class="pictogram-social">&#62236;</span>',
  'icon-stumbleupon' => '<span class="pictogram-social">&#62238;</span>',
  'icon-c-stumbleupon' => '<span class="pictogram-social">&#62239;</span>',
  'icon-lastfm' => '<span class="pictogram-social">&#62241;</span>',
  'icon-c-lastfm' => '<span class="pictogram-social">&#62241;</span>',
  'icon-rdio' => '<span class="pictogram-social">&#62244;</span>',
  'icon-c-rdio' => '<span class="pictogram-social">&#62244;</span>',
  'icon-spotify' => '<span class="pictogram-social">&#62247;</span>',
  'icon-c-spotify' => '<span class="pictogram-social">&#62248;</span>',
  'icon-qq' => '<span class="pictogram-social">&#62250;</span>',
  'icon-instagram' => '<span class="pictogram-social">&#62253;</span>',
  'icon-dropbox' => '<span class="pictogram-social">&#62256;</span>',
  'icon-evernote' => '<span class="pictogram-social">&#62259;</span>',
  'icon-flattr' => '<span class="pictogram-social">&#62262;</span>',
  'icon-skype' => '<span class="pictogram-social">&#62265;</span>',
  'icon-c-skype' => '<span class="pictogram-social">&#62266;</span>',
  'icon-renren' => '<span class="pictogram-social">&#62268;</span>',
  'icon-sina-weibo' => '<span class="pictogram-social">&#62271;</span>',
  'icon-paypal' => '<span class="pictogram-social">&#62274;</span>',
  'icon-picasa' => '<span class="pictogram-social">&#62277;</span>',
  'icon-soundcloud' => '<span class="pictogram-social">&#62280;</span>',
  'icon-mixi' => '<span class="pictogram-social">&#62283;</span>',
  'icon-behance' => '<span class="pictogram-social">&#62286;</span>',
  'icon-google-circles' => '<span class="pictogram-social">&#62289;</span>',
  'icon-vk' => '<span class="pictogram-social">&#62292;</span>',
  'icon-smashing' => '<span class="pictogram-social">&#62295;</span>',
	);
  
  
  if(!empty($url)){
  	$output = '<a href="'.$url.'" class="tt-icon-link tt-icon" target="'.$target.'">'.$pictograms[$style].''.do_shortcode($content). '</a>';
  }
	
	if(empty($url)){
  	$output = '<p class="tt-icon">'.$pictograms[$style].'</p>';
  }
  
  return $output;
}
add_shortcode('glg_short_icon', 'glg_short_icons');




/*-----------------------------------*/
/*	Icons - Mini
/*-----------------------------------*/
function glg_short_icons_mini($atts, $content = null) {
  extract(shortcode_atts(array(
  'url' => '',
  'style' => '',
  'target' => ''
  ), $atts));
  
  $pictograms = array(
  'icon-phone' => '<span class="pictogram">&#128222;</span>',
  'icon-mobile' => '<span class="pictogram">&#128241;</span>',
  'icon-mouse' => '<span class="pictogram">&#59273;</span>',
  'icon-address' => '<span class="pictogram">&#59171;</span>',
  'icon-mail' => '<span class="pictogram">&#9993;</span>',
  'icon-paper-plane' => '<span class="pictogram">&#128319;</span>',
  'icon-pencil' => '<span class="pictogram">&#9998;</span>',
  'icon-feather' => '<span class="pictogram">&#10002;</span>',
  'icon-attach' => '<span class="pictogram">&#128206;</span>',
  'icon-inbox' => '<span class="pictogram">&#59255;</span>',
  'icon-reply' => '<span class="pictogram">&#59154;</span>',
  'icon-reply-all' => '<span class="pictogram">&#59155;</span>',
  'icon-forward' => '<span class="pictogram">&#10150;</span>',
  'icon-user' => '<span class="pictogram">&#128100;</span>',
  'icon-users' => '<span class="pictogram">&#128101;</span>',
  'icon-add-user' => '<span class="pictogram">&#59136;</span>',
  'icon-vcard' => '<span class="pictogram">&#59170;</span>',
  'icon-export' => '<span class="pictogram">&#59157;</span>',
  'icon-location' => '<span class="pictogram">&#59172;</span>',
  'icon-map' => '<span class="pictogram">&#59175;</span>',
  'icon-compass' => '<span class="pictogram">&#59176;</span>',
  'icon-direction' => '<span class="pictogram">&#10146;</span>',
  'icon-hair-cross' => '<span class="pictogram">&#127919;</span>',
  'icon-share' => '<span class="pictogram">&#59196;</span>',
  'icon-shareable' => '<span class="pictogram">&#59198;</span>',
  'icon-heart' => '<span class="pictogram">&hearts;</span>',
  'icon-heart-empty' => '<span class="pictogram">&#9825;</span>',
  'icon-star' => '<span class="pictogram">&#9733;</span>',
  'icon-star-empty' => '<span class="pictogram">&#9734;</span>',
  'icon-thumbs-up' => '<span class="pictogram">&#128077;</span>',
  'icon-thumbs-down' => '<span class="pictogram">&#128078;</span>',
  'icon-chat' => '<span class="pictogram">&#59168;</span>',
  'icon-comment' => '<span class="pictogram">&#59160;</span>',
  'icon-quote' => '<span class="pictogram">&#10078;</span>',
  'icon-home' => '<span class="pictogram">&#8962;</span>',
  'icon-popup' => '<span class="pictogram">&#59212;</span>',
  'icon-search' => '<span class="pictogram">&#128269;</span>',
  'icon-flashlight' => '<span class="pictogram">&#128294;</span>',
  'icon-print' => '<span class="pictogram">&#59158;</span>',
  'icon-bell' => '<span class="pictogram">&#128276;</span>',
  'icon-link' => '<span class="pictogram">&#128279;</span>',
  'icon-flag' => '<span class="pictogram">&#9873;</span>',
  'icon-cog' => '<span class="pictogram">&#9881;</span>',
  'icon-tools' => '<span class="pictogram">&#9874;</span>',
  'icon-trophy' => '<span class="pictogram">&#127942;</span>',
  'icon-tag' => '<span class="pictogram">&#59148;</span>',
  'icon-camera' => '<span class="pictogram">&#128247;</span>',
  'icon-megaphone' => '<span class="pictogram">&#128227;</span>',
  'icon-moon' => '<span class="pictogram">&#9789;</span>',
  'icon-palette' => '<span class="pictogram">&#127912;</span>',
  'icon-leaf' => '<span class="pictogram">&#127810;</span>',
  'icon-note' => '<span class="pictogram">&#9834;</span>',
  'icon-beamed-note' => '<span class="pictogram">&#9835;</span>',
  'icon-new' => '<span class="pictogram">&#128165;</span>',
  'icon-graduation-cap' => '<span class="pictogram">&#127891;</span>',
  'icon-book' => '<span class="pictogram">&#128213;</span>',
  'icon-newspaper' => '<span class="pictogram">&#128240;</span>',
  'icon-bag' => '<span class="pictogram">&#128092;</span>',
  'icon-airplane' => '<span class="pictogram">&#9992;</span>',
  'icon-lifebuoy' => '<span class="pictogram">&#59272;</span>',
  'icon-eye' => '<span class="pictogram">&#59146;</span>',
  'icon-clock' => '<span class="pictogram">&#128340;</span>',
  'icon-mic' => '<span class="pictogram">&#127908;</span>',
  'icon-calendar' => '<span class="pictogram">&#128197;</span>',
  'icon-flash' => '<span class="pictogram">&#9889;</span>',
  'icon-thunder-cloud' => '<span class="pictogram">&#9928;</span>',
  'icon-droplet' => '<span class="pictogram">&#128167;</span>',
  'icon-cd' => '<span class="pictogram">&#128191;</span>',
  'icon-briefcase' => '<span class="pictogram">&#128188;</span>',
  'icon-air' => '<span class="pictogram">&#128168;</span>',
  'icon-hourglass' => '<span class="pictogram">&#9203;</span>',
  'icon-gauge' => '<span class="pictogram">&#128711;</span>',
  'icon-language' => '<span class="pictogram">&#127892;</span>',
  'icon-network' => '<span class="pictogram">&#59254;</span>',
  'icon-key' => '<span class="pictogram">&#128273;</span>',
  'icon-battery' => '<span class="pictogram">&#128267;</span>',
  'icon-bucket' => '<span class="pictogram">&#128254;</span>',
  'icon-magnet' => '<span class="pictogram">&#59297;</span>',
  'icon-drive' => '<span class="pictogram">&#128253;</span>',
  'icon-cup' => '<span class="pictogram">&#9749;</span>',
  'icon-rocket' => '<span class="pictogram">&#128640;</span>',
  'icon-brush' => '<span class="pictogram">&#59290;</span>',
  'icon-suitcase' => '<span class="pictogram">&#128710;</span>',
  'icon-traffic-cone' => '<span class="pictogram">&#128712;</span>',
  'icon-globe' => '<span class="pictogram">&#127758;</span>',
  'icon-keyboard' => '<span class="pictogram">&#9000;</span>',
  'icon-browser' => '<span class="pictogram">&#59214;</span>',
  'icon-publish' => '<span class="pictogram">&#59213;</span>',
  'icon-progress-3' => '<span class="pictogram">&#59243;</span>',
  'icon-progress-2' => '<span class="pictogram">&#59242;</span>',
  'icon-progress-1' => '<span class="pictogram">&#59241;</span>',
  'icon-progress-0' => '<span class="pictogram">&#59240;</span>',
  'icon-light-down' => '<span class="pictogram">&#128261;</span>',
  'icon-light-up' => '<span class="pictogram">&#128262;</span>',
  'icon-adjust' => '<span class="pictogram">&#9681;</span>',
  'icon-code' => '<span class="pictogram">&#59156;</span>',
  'icon-monitor' => '<span class="pictogram">&#128187;</span>',
  'icon-infinity' => '<span class="pictogram">&infin;</span>',
  'icon-light-bulb' => '<span class="pictogram">&#128161;</span>',
  'icon-credit-card' => '<span class="pictogram">&#128179;</span>',
  'icon-database' => '<span class="pictogram">&#128248;</span>',
  'icon-voicemail' => '<span class="pictogram">&#9991;</span>',
  'icon-clipboard' => '<span class="pictogram">&#128203;</span>',
  'icon-cart' => '<span class="pictogram">&#59197;</span>',
  'icon-box' => '<span class="pictogram">&#128230;</span>',
  'icon-ticket' => '<span class="pictogram">&#127915;</span>',
  'icon-rss' => '<span class="pictogram">&#59194;</span>',
  'icon-signal' => '<span class="pictogram">&#128246;</span>',
  'icon-thermometer' => '<span class="pictogram">&#128255;</span>',
  'icon-water' => '<span class="pictogram">&#128166;</span>',
  'icon-sweden' => '<span class="pictogram">&#62977;</span>',
  'icon-line-graph' => '<span class="pictogram">&#128200;</span>',
  'icon-pie-chart' => '<span class="pictogram">&#9716;</span>',
  'icon-bar-graph' => '<span class="pictogram">&#128202;</span>',
  'icon-area-graph' => '<span class="pictogram">&#128318;</span>',
  'icon-lock' => '<span class="pictogram">&#128274;</span>',
  'icon-lock-open' => '<span class="pictogram">&#59194;</span>',
  'icon-logout' => '<span class="pictogram">&#59201;</span>',
  'icon-login' => '<span class="pictogram">&#59200;</span>',
  'icon-check' => '<span class="pictogram">&#10003;</span>',
  'icon-cross' => '<span class="pictogram">&#10060;</span>',
  'icon-squared-minus' => '<span class="pictogram">&#8863;</span>',
  'icon-squared-plus' => '<span class="pictogram">&#8862;</span>',
  'icon-squared-cross' => '<span class="pictogram">&#10062;</span>',
  'icon-circled-minus' => '<span class="pictogram">&#8854;</span>',
  'icon-circled-plus' => '<span class="pictogram">&oplus;</span>',
  'icon-circled-cross' => '<span class="pictogram">&#10006;</span>',
  'icon-minus' => '<span class="pictogram">&#10134;</span>',
  'icon-plus' => '<span class="pictogram">&#10133;</span>',
  'icon-erase' => '<span class="pictogram">&#9003;</span>',
  'icon-block' => '<span class="pictogram">&#128683;</span>',
  'icon-info' => '<span class="pictogram">&#8505;</span>',
  'icon-circled-info' => '<span class="pictogram">&#59141;</span>',
  'icon-help' => '<span class="pictogram">&#10067;</span>',
  'icon-circled-help' => '<span class="pictogram">&#59140;</span>',
  'icon-warning' => '<span class="pictogram">&#9888;</span>',
  'icon-cycle' => '<span class="pictogram">&#128260;</span>',
  'icon-cw' => '<span class="pictogram">&#10227;</span>',
  'icon-ccw' => '<span class="pictogram">&#10226;</span>',
  'icon-shuffle' => '<span class="pictogram">&#128256;</span>',
  'icon-back' => '<span class="pictogram">&#128281;</span>',
  'icon-level-down' => '<span class="pictogram">&#8627;</span>',
  'icon-retweet' => '<span class="pictogram">&#59159;</span>',
  'icon-loop' => '<span class="pictogram">&#128257;</span>',
  'icon-back-in-time' => '<span class="pictogram">&#59249;</span>',
  'icon-level-up' => '<span class="pictogram">&#8624;</span>',
  'icon-switch' => '<span class="pictogram">&#8646;</span>',
  'icon-numbered-list' => '<span class="pictogram">&#57349;</span>',
  'icon-add-to-list' => '<span class="pictogram">&#57347;</span>',
  'icon-layout' => '<span class="pictogram">&#9871;</span>',
  'icon-list' => '<span class="pictogram">&#9776;</span>',
  'icon-text-doc' => '<span class="pictogram">&#128196;</span>',
  'icon-text-doc-inverted' => '<span class="pictogram">&#59185;</span>',
  'icon-doc' => '<span class="pictogram">&#59184;</span>',
  'icon-docs' => '<span class="pictogram">&#59190;</span>',
  'icon-landscape-doc' => '<span class="pictogram">&#59191;</span>',
  'icon-picture' => '<span class="pictogram">&#127748;</span>',
  'icon-video' => '<span class="pictogram">&#127916;</span>',
  'icon-music' => '<span class="pictogram">&#127925;</span>',
  'icon-folder' => '<span class="pictogram">&#128193;</span>',
  'icon-archive' => '<span class="pictogram">&#59392;</span>',
  'icon-trash' => '<span class="pictogram">&#59177;</span>',
  'icon-upload' => '<span class="pictogram">&#128228;</span>',
  'icon-download' => '<span class="pictogram">&#128229;</span>',
  'icon-save' => '<span class="pictogram">&#128190;</span>',
  'icon-install' => '<span class="pictogram">&#59256;</span>',
  'icon-cloud' => '<span class="pictogram">&#9729;</span>',
  'icon-upload-cloud' => '<span class="pictogram">&#59153;</span>',
  'icon-bookmark' => '<span class="pictogram">&#128278;</span>',
  'icon-bookmarks' => '<span class="pictogram">&#128209;</span>',
  'icon-open-book' => '<span class="pictogram">&#128214;</span>',
  'icon-play' => '<span class="pictogram">&#9654;</span>',
  'icon-paus' => '<span class="pictogram">&#8214;</span>',
  'icon-record' => '<span class="pictogram">&#9679;</span>',
  'icon-stop' => '<span class="pictogram">&#9632;</span>',
  'icon-ff' => '<span class="pictogram">&#9193;</span>',
  'icon-fb' => '<span class="pictogram">&#9194;</span>',
  'icon-to-start' => '<span class="pictogram">&#9198;</span>',
  'icon-to-end' => '<span class="pictogram">&#9197;</span>',
  'icon-resize-full' => '<span class="pictogram">&#59204;</span>',
  'icon-resize-small' => '<span class="pictogram">&#59206;</span>',
  'icon-volume' => '<span class="pictogram">&#9207;</span>',
  'icon-sound' => '<span class="pictogram">&#128266;</span>',
  'icon-mute' => '<span class="pictogram">&#128263;</span>',
  'icon-flow-cascade' => '<span class="pictogram">&#128360;</span>',
  'icon-flow-branch' => '<span class="pictogram">&#128361;</span>',
  'icon-flow-tree' => '<span class="pictogram">&#128362;</span>',
  'icon-flow-line' => '<span class="pictogram">&#128363;</span>',
  'icon-flow-parallel' => '<span class="pictogram">&#128364;</span>',
  'icon-left-bold' => '<span class="pictogram">&#58541;</span>',
  'icon-down-bold' => '<span class="pictogram">&#58544;</span>',
  'icon-up-bold' => '<span class="pictogram">&#58543;</span>',
  'icon-right-bold' => '<span class="pictogram">&#58542;</span>',
  'icon-left' => '<span class="pictogram">&#11013;</span>',
  'icon-down' => '<span class="pictogram">&#11015;</span>',
  'icon-up' => '<span class="pictogram">&#11014;</span>',
  'icon-right' => '<span class="pictogram">&#10145;</span>',
  'icon-circled-left' => '<span class="pictogram">&#59225;</span>',
  'icon-circled-down' => '<span class="pictogram">&#59224;</span>',
  'icon-circled-up' => '<span class="pictogram">&#59227;</span>',
  'icon-circled-right' => '<span class="pictogram">&#59226;</span>',
  'icon-triangle-left' => '<span class="pictogram">&#9666;</span>',
  'icon-triangle-down' => '<span class="pictogram">&#9662;</span>',
  'icon-triangle-up' => '<span class="pictogram">&#9652;</span>',
  'icon-triangle-right' => '<span class="pictogram">&#9656;</span>',
  'icon-chevron-left' => '<span class="pictogram">&#59229;</span>',
  'icon-chevron-down' => '<span class="pictogram">&#59228;</span>',
  'icon-chevron-up' => '<span class="pictogram">&#59231;</span>',
  'icon-chevron-right' => '<span class="pictogram">&#59230;</span>',
  'icon-chevron-small-left' => '<span class="pictogram">&#59233;</span>',
  'icon-chevron-small-down' => '<span class="pictogram">&#59232;</span>',
  'icon-chevron-small-up' => '<span class="pictogram">&#59235;</span>',
  'icon-chevron-small-right' => '<span class="pictogram">&#59234;</span>',
  'icon-chevron-thin-left' => '<span class="pictogram">&#59237;</span>',
  'icon-chevron-thin-down' => '<span class="pictogram">&#59236;</span>',
  'icon-chevron-thin-up' => '<span class="pictogram">&#59239;</span>',
  'icon-chevron-thin-right' => '<span class="pictogram">&#59238;</span>',
  'icon-left-thin' => '<span class="pictogram">&larr;</span>',
  'icon-down-thin' => '<span class="pictogram">&darr;</span>',
  'icon-up-thin' => '<span class="pictogram">&uarr;</span>',
  'icon-right-thin' => '<span class="pictogram">&rarr;</span>',
  'icon-arrow-combo' => '<span class="pictogram">&#59215;</span>',
  'icon-three-dots' => '<span class="pictogram">&#9206;</span>',
  'icon-two-dots' => '<span class="pictogram">&#9205;</span>',
  'icon-dot' => '<span class="pictogram">&#9204;</span>',
  'icon-cc' => '<span class="pictogram">&#128325;</span>',
  'icon-cc-by' => '<span class="pictogram">&#128326;</span>',
  'icon-cc-nc' => '<span class="pictogram">&#128327;</span>',
  'icon-cc-nc-eu' => '<span class="pictogram">&#128328;</span>',
  'icon-cc-nc-jp' => '<span class="pictogram">&#128329;</span>',
  'icon-cc-sa' => '<span class="pictogram">&#128330;</span>',
  'icon-cc-nd' => '<span class="pictogram">&#128331;</span>',
  'icon-cc-pd' => '<span class="pictogram">&#128332;</span>',
  'icon-cc-zero' => '<span class="pictogram">&#128333;</span>',
  'icon-cc-share' => '<span class="pictogram">&#128334;</span>',
  'icon-cc-remix' => '<span class="pictogram">&#128335;</span>',
  'icon-db-logo' => '<span class="pictogram">&#128505;</span>',
  'icon-db-shape' => '<span class="pictogram">&#128506</span>',
  'icon-github' => '<span class="pictogram-social">&#62208;</span>',
  'icon-c-github' => '<span class="pictogram-social">&#62209;</span>',
  'icon-flickr' => '<span class="pictogram-social">&#62211;</span>',
  'icon-c-flickr' => '<span class="pictogram-social">&#62212;</span>',
  'icon-vimeo' => '<span class="pictogram-social">&#62214;</span>',
  'icon-c-vimeo' => '<span class="pictogram-social">&#62215;</span>',
  'icon-twitter' => '<span class="pictogram-social">&#62214;</span>',
  'icon-c-twitter' => '<span class="pictogram-social">&#62215;</span>',
  'icon-facebook' => '<span class="pictogram-social">&#62220;</span>',
  'icon-c-facebook' => '<span class="pictogram-social">&#62221;</span>',
  'icon-s-facebook' => '<span class="pictogram-social">&#62220;</span>',
  'icon-google+' => '<span class="pictogram-social">&#62223;</span>',
  'icon-c-google+' => '<span class="pictogram-social">&#62224;</span>',
  'icon-google+' => '<span class="pictogram-social">&#62223;</span>',
  'icon-c-google+' => '<span class="pictogram-social">&#62224;</span>',
  'icon-pinterest' => '<span class="pictogram-social">&#62226;</span>',
  'icon-c-pinterest' => '<span class="pictogram-social">&#62227;</span>',
  'icon-tumblr' => '<span class="pictogram-social">&#62229;</span>',
  'icon-c-tumblr' => '<span class="pictogram-social">&#62230;</span>',
  'icon-linkedin' => '<span class="pictogram-social">&#62232;</span>',
  'icon-c-linkedin' => '<span class="pictogram-social">&#62232;</span>',
  'icon-dribbble' => '<span class="pictogram-social">&#62235;</span>',
  'icon-c-dribbble' => '<span class="pictogram-social">&#62236;</span>',
  'icon-stumbleupon' => '<span class="pictogram-social">&#62238;</span>',
  'icon-c-stumbleupon' => '<span class="pictogram-social">&#62239;</span>',
  'icon-lastfm' => '<span class="pictogram-social">&#62241;</span>',
  'icon-c-lastfm' => '<span class="pictogram-social">&#62241;</span>',
  'icon-rdio' => '<span class="pictogram-social">&#62244;</span>',
  'icon-c-rdio' => '<span class="pictogram-social">&#62244;</span>',
  'icon-spotify' => '<span class="pictogram-social">&#62247;</span>',
  'icon-c-spotify' => '<span class="pictogram-social">&#62248;</span>',
  'icon-qq' => '<span class="pictogram-social">&#62250;</span>',
  'icon-instagram' => '<span class="pictogram-social">&#62253;</span>',
  'icon-dropbox' => '<span class="pictogram-social">&#62256;</span>',
  'icon-evernote' => '<span class="pictogram-social">&#62259;</span>',
  'icon-flattr' => '<span class="pictogram-social">&#62262;</span>',
  'icon-skype' => '<span class="pictogram-social">&#62265;</span>',
  'icon-c-skype' => '<span class="pictogram-social">&#62266;</span>',
  'icon-renren' => '<span class="pictogram-social">&#62268;</span>',
  'icon-sina-weibo' => '<span class="pictogram-social">&#62271;</span>',
  'icon-paypal' => '<span class="pictogram-social">&#62274;</span>',
  'icon-picasa' => '<span class="pictogram-social">&#62277;</span>',
  'icon-soundcloud' => '<span class="pictogram-social">&#62280;</span>',
  'icon-mixi' => '<span class="pictogram-social">&#62283;</span>',
  'icon-behance' => '<span class="pictogram-social">&#62286;</span>',
  'icon-google-circles' => '<span class="pictogram-social">&#62289;</span>',
  'icon-vk' => '<span class="pictogram-social">&#62292;</span>',
  'icon-smashing' => '<span class="pictogram-social">&#62295;</span>',
	);
  
  if(!empty($url)){
  	$output = '<a href="'.$url.'" class="tt-mono-icon" target="'.$target.'">'.$pictograms[$style].''.do_shortcode($content). '</a>';
  }
	
	if(empty($url)){
  	$output = '<p class="tt-mono-icon">'.$pictograms[$style].''.do_shortcode($content). '</p>';
  }
  
  return $output;
}
add_shortcode('glg_short_mini_icon', 'glg_short_icons_mini');




/*-----------------------------------*/
/*	Notification Boxes
/*-----------------------------------*/
function glg_notification($atts, $content = null) {
  extract(shortcode_atts(array(
  'style' => '',
  'font_size' => '13px',
  'closeable' => '',
  ), $atts));
  
  
  if ($closeable == 'true'){
  	$output = '<div class="glg_short-notification '.$style.' closeable"><div class="closeable-x"><p style="font-size:'.$font_size.';">' .do_shortcode($content). '</p></div></div>';
  } else{
	$output = '<div class="glg_short-notification '.$style.'"><p style="font-size:'.$font_size.';">' .do_shortcode($content). '</p></div>';
  }
  
  return $output;
}
add_shortcode('glg_short_notification', 'glg_notification');




/*--------------------------------------*/
/*	Pricing Boxes
/*--------------------------------------*/

//styles: true-vision-pricing-style-1, true-vision-pricing-style-2

function glg_pricing_box($atts, $content = null) {
  extract(shortcode_atts(array(
  'style' => '',
  'color' => '',
  'plan' => '',
  'currency' => '',
  'price' => '',
  'term' => '',
  'button_label' => '',
  'button_size' => '',
  'button_color' => '',
  'button_url' => '',
  'button_target' => '',
  ), $atts));
	
	if ($style == 'style-1'){
	$output = '<div class="glg_short-pricing-column glg_short-pricing-'.$style.'"><div class="glg_short-pricing-top tt-cb-title-'.$color.'">
	<h2>'.$plan.'</h2>
	<h1><sup>'.$currency.'</sup>'.$price.'</h1>
	<p>'.$term.'</p>
	</div>' 
	.do_shortcode($content). '<hr />
	<a href="'.esc_url( $button_url ).'" class="'.sanitize_html_class( $button_size ).' '.sanitize_html_class( $button_color ).' glg_short-button" target="'.esc_attr( $button_target ).'">' .$button_label. '</a>
	</div>';
	}
	
	if ($style == 'style-2'){
	$output = '<div class="glg_short-pricing-column glg_short-pricing-'.$style.'"><div class="glg_short-pricing-top tt-cb-title-'.$color.'">
	<h2>'.$plan.'</h2>
	</div>' 
	.do_shortcode($content). '<hr /><h1><sup>'.$currency.'</sup>'.$price.'</h1>
	<p>'.$term.'</p>
	<a href="'.esc_url( $button_url ).'" class="'.sanitize_html_class( $button_size ).' '.sanitize_html_class( $button_color ).' glg_short-button" target="'.esc_attr( $button_target ).'">' .$button_label. '</a>
	</div>';
	}
	
  
  return $output;
}
add_shortcode('glg_short_pricing_box', 'glg_pricing_box');



/*-----------------------------------*/
/*	Social Icons
/*-----------------------------------*/
function glg_social($atts, $content = null) {
  extract(shortcode_atts(array(
  'design' => '',
  'icon_style' => '',
  'twitter' => '',
  'facebook' => '',
  'dribbble' => '',
  'linkedin' => '',
  'vimeo' => '',
  'flickr' => '',
  'youtube' => '',
  'pinterest' => '',
  'google' => '',
  'rss' => '',
  'mail' => '',
  'skype' => '',
  'wordpress' => '',
  'instagram' => '',
  ), $atts));
  
  //check for round and add inline-css
  if ($icon_style == 'round') {
	$icon_output = ' style="font-weight:bold;"';
	$round_class = ' vs-round';
		}else{
			$icon_output = '';
			$round_class = '';
		}
  
  
  
	$output = '<ul class="vision-social vs-'.$design.$round_class.'">';
	
	if ($twitter != ''){
	$output .= '<li><a href="'.$twitter.'" class="ss-icon vs-twitter"><span'.$icon_output.'>&#xF611;</span></a></li>';
	}
	if ($facebook != ''){
	$output .= '<li><a href="'.$facebook.'" class="ss-icon vs-facebook"><span'.$icon_output.'>&#xF610;</span></a></li>';
	}
	if ($dribbble != ''){
	$output .= '<li><a href="'.$dribbble.'" class="ss-icon vs-dribbble"><span'.$icon_output.'>&#xF660;</span></a></li>';
	}
	if ($linkedin != ''){
	$output .= '<li><a href="'.$linkedin.'" class="ss-icon vs-linkedin"><span'.$icon_output.'>&#xF612;</span></a></li>';
	}
	if ($vimeo != ''){
	$output .= '<li><a href="'.$vimeo.'" class="ss-icon vs-vimeo"><span'.$icon_output.'>&#xF631;</span></a></li>';
	}
	if ($flickr != ''){
	$output .= '<li><a href="'.$flickr.'" class="ss-icon vs-flickr"><span'.$icon_output.'>&#xF640;</span></a></li>';
	}
	if ($youtube != ''){
	$output .= '<li><a href="'.$youtube.'" class="ss-icon vs-youtube"><span'.$icon_output.'>&#xF630;</span></a></li>';
	}
	if ($pinterest != ''){
	$output .= '<li><a href="'.$pinterest.'" class="ss-icon vs-pinterest"><span'.$icon_output.'>&#xF650;</span></a></li>';
	}
	if ($google != ''){
	$output .= '<li><a href="'.$google.'" class="ss-icon vs-google"><span'.$icon_output.'>&#xF613;</span></a></li>';
	}
	if ($rss != ''){
	$output .= '<li><a href="'.$rss.'" class="ss-icon vs-rss"><span'.$icon_output.'>&#xE310;</span></a></li>';
	}
	if ($mail != ''){
	$output .= '<li><a href="'.$mail.'" class="ss-icon vs-mail"><span'.$icon_output.'>&#x2709;</span></a></li>';
	}
	if ($skype != ''){
	$output .= '<li><a href="'.$skype.'" class="ss-icon vs-skype"><span'.$icon_output.'>&#xF6A0;</span></a></li>';
	}
	if ($wordpress != ''){
	$output .= '<li><a href="'.$wordpress.'" class="ss-icon vs-wordpress"><span'.$icon_output.'>&#xF621;</span></a></li>';
	}
	if ($instagram != ''){
	$output .= '<li><a href="'.$instagram.'" class="ss-icon vs-instagram"><span'.$icon_output.'>&#xF641;</span></a></li>';
	}
	
	$output .= '</ul>';
	
	
	
	
  
  return $output;
}
add_shortcode('glg_short_social', 'glg_social');


/*-----------------------------------*/
/*	Tabs
/*-----------------------------------*/
function glg_tabs_wrap($atts, $content = null) {
  
	$output = '[raw]<dl class="glg_short-tabs-horizontal">[/raw]' .do_shortcode($content). '[raw]<div class"clear"></div></dl>[/raw]';  
  
  return $output;
}
add_shortcode('glg_short_tabset', 'glg_tabs_wrap');



function glg_tabs_content($atts, $content = null) {
  extract(shortcode_atts(array(
  'title' => '',
  'active' => '',
  ), $atts));
  
  if ($active == 'yes'){
  	$output = '[raw]<dt class="current">'.$title.'</dt><dd class="current">[/raw]' . do_shortcode($content) . '[raw]</dd>[/raw]';
  } else{
	$output = '[raw]<dt>'.$title.'</dt><dd>[/raw]' . do_shortcode($content) . '[raw]</dd>[/raw]';
  }
  
  return $output;
}
add_shortcode('glg_short_tab', 'glg_tabs_content');


/*-----------------------------------*/
/*	Team
/*-----------------------------------*/

function glg_team( $atts, $content = null ) {
	$members = get_posts(array(
		'numberposts' => -1,
		'post_type'  => 'team'
	));
	$output = '<ul class="team-members">';

	$placeholder = GLG_TINYMCE_URI.'/images/shortcodes/team-member.png';
	
	foreach($members as $member) {
		$thumb_ID = get_post_thumbnail_id($member->ID);
		$thumb = wp_get_attachment_image_src($thumb_ID, 'team');
		$categories = glg_post_categories($member->ID, 'job-position', false);
		$description = get_post_meta($member->ID, 'glg_team_details', true);
		$social = glg_member_social($member->ID);
		if($thumb)
			$output .= '<li class="member-wrap"><img src="'.$thumb[0].'" alt="'.$member->post_title.'" />'.strtoupper($member->post_title).'<span>'.$categories.'</span><p>'.$description.'</p>'.$social.'</li>';
		else
			$output .= '<li class="member-wrap"><img src="'.$placeholder.'" alt="'.$member->post_title.'" />'.strtoupper($member->post_title).'<span>'.$categories.'</span><p>'.$description.'</p>'.$social.'</li>';
	}
	
	$output .= '</ul>';
	
	return $output;
}
add_shortcode('glg_short_team', 'glg_team');

/*-----------------------------------*/
/*	Testimonials
/*-----------------------------------*/
function glg_testimonial_wrap( $atts, $content = null ) {
   return '[raw]<div class="glg_short-testimonials">[/raw]' . do_shortcode($content) . '[raw]</div>[/raw]';
}
add_shortcode('glg_short_testimonial_set', 'glg_testimonial_wrap');


function glg_testimonial_content($atts, $content = null) {
  extract(shortcode_atts(array(
  'client' => ''
  ), $atts));
  

	$output = '[raw]<div class="glg_short-testimonial"><blockquote>' . do_shortcode($content) . '</blockquote><strong class="vision-client_identity">'.$client.'</strong></div>[/raw]';
  
  return $output;
}
add_shortcode('glg_short_testimonial', 'glg_testimonial_content');

?>