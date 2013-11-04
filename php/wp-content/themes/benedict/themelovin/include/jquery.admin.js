jQuery(document).ready(function(jQuery){

	var videoOptions = jQuery('#glg-video-metabox');
	var videoTrigger = jQuery('#post-format-video');
	var quoteOptions = jQuery('#glg-quote-metabox');
	var quoteTrigger = jQuery('#post-format-quote');
	var linkOptions = jQuery('#glg-link-metabox');
	var linkTrigger = jQuery('#post-format-link');
	var radiobox = jQuery('#post-formats-select input');
	var sidebarOptions = jQuery("#glg-port-sidebar");
	var sidebarTrigger = jQuery('#side');
	var radioport = jQuery('#glg-port-metabox input');
	
	glg_hide();
	glg_hide_port();
	
	radiobox.change(function(){
		glg_hide();
		if(jQuery(this).val() == 'video') {
			videoOptions.css('display', 'block');
		} else if(jQuery(this).val() == 'quote') {
			quoteOptions.css('display', 'block');		
		} else if(jQuery(this).val() == 'link') {
			linkOptions.css('display', 'block');		
		}
	});
	
	radioport.change(function(){
		glg_hide_port();
		if(jQuery(this).val() == 'side') {
			sidebarOptions.css('display', 'block');
		}
	});
	
	if(videoTrigger.is(':checked'))
		videoOptions.css('display', 'block');
	if(quoteTrigger.is(':checked'))
		quoteOptions.css('display', 'block');
	if(linkTrigger.is(':checked'))
		linkOptions.css('display', 'block');
	if(sidebarTrigger.is(':checked'))
		sidebarOptions.css('display', 'block');
		
	function glg_hide() {
		videoOptions.css('display', 'none');
		quoteOptions.css('display', 'none');
		linkOptions.css('display', 'none');
    }
    
    function glg_hide_port() {
    	sidebarOptions.css('display', 'none');
    }

	jQuery('input#glg_hover_color').ColorPicker({
		onShow: function (colpkr) {
			jQuery(colpkr).fadeIn(500);
			return false;
		},
		onHide: function (colpkr) {
			jQuery(colpkr).fadeOut(500);
			return false;
		},
		onChange: function (hsb, hex, rgb) {
			jQuery('input#glg_hover_color').attr('value','#' + hex);
		}
	});
	
	jQuery('input#glg_font_color').ColorPicker({
		onShow: function (colpkr) {
			jQuery(colpkr).fadeIn(500);
			return false;
		},
		onHide: function (colpkr) {
			jQuery(colpkr).fadeOut(500);
			return false;
		},
		onChange: function (hsb, hex, rgb) {
			jQuery('input#glg_font_color').attr('value','#' + hex);
		}
	});
	
});