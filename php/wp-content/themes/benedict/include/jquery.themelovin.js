jQuery(document).ready(function(jQuery){

	var windowWidth = jQuery(window).width();
	
	/*-----------------------------------------------------------------------------------
	SUPERFISH
	-----------------------------------------------------------------------------------*/
	
	if( windowWidth <= 1024 ) {
		jQuery('.primary-menu').superfish({
			animation: {height:'show'},
			animationOut: {height: 'hide'},
			useClick: true
		});
		jQuery(this).toggleClass('sf-js-enabled');
	} else {
		jQuery('.primary-menu').superfish();
	}
	
	jQuery("#menu-icon").on("click", function(){
    	jQuery("nav.menu-mobile").slideToggle();
    });
    
    jQuery(window).resize(function(){
    	if( jQuery(window).width() > 1024 ) {
    		jQuery("nav.menu-mobile").removeAttr( 'style' );
		}
	});
	
	/*-----------------------------------------------------------------------------------
	SEARCH FORM
	-----------------------------------------------------------------------------------*/
	
	jQuery.fn.setCursorPosition = function(position){
	    if(this.lengh == 0) return this;
	    return jQuery(this).setSelection(position, position);
	}
	
	jQuery.fn.setSelection = function(selectionStart, selectionEnd) {
	    if(this.lengh == 0) return this;
	    input = this[0];
	
	    if (input.createTextRange) {
	        var range = input.createTextRange();
	        range.collapse(true);
	        range.moveEnd('character', selectionEnd);
	        range.moveStart('character', selectionStart);
	        range.select();
	    } else if (input.setSelectionRange) {
	        input.focus();
	        input.setSelectionRange(selectionStart, selectionEnd);
	    }
	
	    return this;
	}
	
	var placeholder = jQuery('#searchFadeIn form#searchform input[type=text]').attr('data-placeholder');
	
	jQuery('#iconFadeIn').click(function(){
		jQuery('#overlay').fadeIn(500);
        jQuery('#searchFadeIn').fadeIn(500, function() {
        	jQuery('#searchFadeIn form#searchform input[type=text]').focus();
        	
        	if(jQuery('#searchFadeIn form#searchform input[type=text]').attr('value') == placeholder){
				jQuery('#searchFadeIn form#searchform input[type=text]').setCursorPosition(0);	
			}
			
			jQuery('#searchFadeIn form#searchform input[type=text]').keydown(function(){
				if(jQuery(this).attr('value') == placeholder){
					jQuery(this).attr('value', '');
				}
			});
			
			jQuery('#searchFadeIn form#searchform input[type=text]').keyup(function(){
				if(jQuery(this).attr('value') == ''){
					jQuery(this).attr('value', placeholder);
					jQuery(this).setCursorPosition(0);
				}
			});
        });
        return false;
    });
    
    jQuery('#overlay').click(function(){
        jQuery('#overlay').fadeOut(500);
        jQuery('#searchFadeIn').fadeOut(500);
        return false;
    });
    
    jQuery(document).keyup(function(e){
    	if (e.keyCode == 27) {
			jQuery('#overlay').fadeOut(500);
			jQuery('#searchFadeIn').fadeOut(500);
		};
    });
    
    /*-----------------------------------------------------------------------------------
	SCROLL HEADER RESIZE
	-----------------------------------------------------------------------------------*/
	
	jQuery(window).bind('scroll',smallNav);
	
	function smallNav() {
		var jQueryoffset = jQuery(window).scrollTop();
		var jQuerywindowWidth = jQuery(window).width();
		
		if(jQueryoffset > 0 && jQuerywindowWidth >= 1050) {
			jQuery('header#primary-header').stop().animate({
				'padding-top' : 5,
				'padding-bottom' : 5
			},{queue:false, duration:450, easing: 'easeOutExpo'});
			
			jQuery('header#primary-header a#logo-link img').stop().animate({
				'max-height' : 31,
				'width' : 'auto'
			},{queue:false, duration:450, easing: 'easeOutExpo'});
			
			jQuery('header#primary-header a#logo-link').stop().animate({
				'font-size' : 20
			},{queue:false, duration:450, easing: 'easeOutExpo'});
			
			jQuery('header#primary-header div#searchFadeIn').stop().animate({
				'top' : 0
			},{queue:false, duration:450, easing: 'easeOutExpo'});
			
			jQuery('#searchFadeIn form#searchform input[type=text]').stop().animate({
				'padding-top' : 5,
				'padding-bottom' : 5,
				'font-size' : 20
			},{queue:false, duration:450, easing: 'easeOutExpo'});
			
			jQuery('header#primary-header div#searchFadeIn input#searchsubmit').stop().animate({
				'padding' : 5
			},{queue:false, duration:450, easing: 'easeOutExpo'});
			
			jQuery(window).unbind('scroll',smallNav);
			jQuery(window).bind('scroll',bigNav);
		}
		
	}
	
	function bigNav() {
		var jQueryoffset = jQuery(window).scrollTop();
		var jQuerywindowWidth = jQuery(window).width();
		
		if(jQueryoffset == 0 && jQuerywindowWidth >= 1050) {
			jQuery('header#primary-header').stop().animate({
				'padding-top' : 20,
				'padding-bottom' : 20
			},{queue:false, duration:450, easing: 'easeOutExpo'});
		
			jQuery('header#primary-header a#logo-link img').stop().animate({
				'max-height' : 40,
				'width' : 'auto'
			},{queue:false, duration:450, easing: 'easeOutExpo'});
			
			jQuery('header#primary-header a#logo-link').stop().animate({
				'font-size' : 28
			},{queue:false, duration:450, easing: 'easeOutExpo'});
			
			jQuery('header#primary-header div#searchFadeIn').stop().animate({
				'top' : 10
			},{queue:false, duration:450, easing: 'easeOutExpo'});
			
			jQuery('#searchFadeIn form#searchform input[type=text]').stop().animate({
				'padding-top' : 10,
				'padding-bottom' : 10,
				'font-size' : 26
			},{queue:false, duration:450, easing: 'easeOutExpo'});
			
			jQuery('header#primary-header div#searchFadeIn input#searchsubmit').stop().animate({
				'padding' : 10
			},{queue:false, duration:450, easing: 'easeOutExpo'});
			
			jQuery(window).unbind('scroll',bigNav);
			jQuery(window).bind('scroll',smallNav);
		}
	}
	
	/*-----------------------------------------------------------------------------------
	FIT VIDEOS
	-----------------------------------------------------------------------------------*/
	
	jQuery(".container").fitVids();
	
	/*-----------------------------------------------------------------------------------
	SLIDER PARALLAX
	-----------------------------------------------------------------------------------*/
		
	function smoothScroll() {
		$window = jQuery(window);
	
		jQuery(window).scroll(function() {
			var yPos = ($window.scrollTop() / 3);
			var coords = '50% ' + yPos + 'px';
			var tTop = 30 + yPos + '%';
			var fadeOpacity = 1 - (yPos / 50);
		
			jQuery('.flexslider ul.slides li').css({backgroundPosition: coords});
			jQuery('.flexslider ul.slides li div.flex-caption').css({top: tTop, opacity: fadeOpacity});
		});
	}
	
	if(windowWidth > 1024) {
		smoothScroll();
	}
	 jQuery(window).resize(function(){
    	if(jQuery(window).width() > 1024 ) {
    		smoothScroll();
		} else {
			jQuery(window).scroll(function() {
				jQuery('.flexslider ul.slides li').css({backgroundPosition: '50% 0'});
			});
		}
	});
	
	/*-----------------------------------------------------------------------------------
	SCROLLTOTOP
	-----------------------------------------------------------------------------------*/
	
	jQuery().UItoTop({
		scrollSpeed: 700,
		easingType: 'easeOutQuart'
	});
	
	/*-----------------------------------------------------------------------------------
	NICESCROLL
	-----------------------------------------------------------------------------------*/
	
	function niceScrollInit(){
		jQuery("html").niceScroll({
			scrollspeed: 60,
			mousescrollstep: 35,
			cursorwidth: 5,
			cursorborder: 0,
			cursorcolor: '#2D3032',
			cursorborderradius: 16,
		});
	}
	
	if(jQuery(window).width() > 690){ niceScrollInit(); }
	
	/*-----------------------------------------------------------------------------------
	PORTFOLIO HOVER
	-----------------------------------------------------------------------------------*/
	
	jQuery('article.type-portfolio').hover(function() {
			jQuery(this).find('div.caption').stop(false,true).fadeIn(350);
		}, function(){
			jQuery(this).find('div.caption').stop(false,true).fadeOut(350);
	});
	
	/*-----------------------------------------------------------------------------------
	LOVE-IT
	-----------------------------------------------------------------------------------*/
	
	jQuery('a.love-it').on('click', function() {
		
		var postid = jQuery(this).data('post-id');
		var lovenonce = glg_script_vars.loveNonce;
		
		if(jQuery.cookie('loved-' + postid)) {
			/*jQuery(".love-it-mex").empty();
			jQuery(".love-it-mex").stop().text('You have already loved this item.').fadeTo(500, 1, function() {
				jQuery(".love-it-mex").delay(2000).fadeTo(500,0);
			});*/
			return false;
		}
		
		jQuery.ajax({
			type: 'POST',  
			url: glg_script_vars.wpDir+'/wp-admin/admin-ajax.php',
			data: {
				action: 'glg_process_love',
				itemid: postid,
				loveitnonce: lovenonce
			},
			success: function(data, textStatus, XMLHttpRequest) {
				var count = jQuery('.love-it-counter').text();
				jQuery('.love-it-counter').text(parseInt(count) + 1);
				jQuery('a.love-it').addClass('loved');
				jQuery.cookie('loved-' + postid, 'yes', { expires: 1 });
			},
			error: function(MLHttpRequest, textStatus, errorThrown){  
				/*jQuery(".love-it-mex").empty();
				jQuery(".love-it-mex").text('Sorry, there was a problem processing your request.').fadeTo(500, 1, function() {
					jQuery(".love-it-mex").delay(2000).fadeTo(500,0);
				});*/
			}
		});
		return false;
	});
	
	/*-----------------------------------------------------------------------------------
	CONTACT FORM
	-----------------------------------------------------------------------------------*/
	
	jQuery('#contactForm').live('submit',function() {
		if(jQuery("#contactName").val() != "" && jQuery("#email").val() != "" && jQuery("#commentsText").val() != "") {
			jQuery('#contactForm').hide();
			jQuery("#messages").empty();
			jQuery("#messages").removeClass('error');
			jQuery('#loading').fadeIn();
			var name = jQuery("#contactName").val();
			var email = jQuery("#email").val();
			var comments = jQuery("#commentsText").val();
			jQuery.ajax({
				type: 'POST',  
				url: glg_script_vars.wpDir+'/wp-admin/admin-ajax.php',  
				data: {  
					action: 'glg_send_contact',
					name: name,
					email: email,
					comments: comments 
				},
				success: function(data, textStatus, XMLHttpRequest){  
					jQuery("#loading").hide();
					jQuery("#messages").addClass('success');
					jQuery("#messages").html('');  
					jQuery("#messages").append(data);
					jQuery("#messages").fadeIn();
				},
				error: function(MLHttpRequest, textStatus, errorThrown){  
					alert(errorThrown);  
				}
			});
		} else {
			jQuery("#messages").empty();
			jQuery("#messages").addClass('error');
			jQuery("#messages").append('All fields are required!');
			jQuery("#messages").fadeIn();
		}
	return false;
	});

});