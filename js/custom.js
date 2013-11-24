// BM Back to Top
jQuery(document).ready(function(){

	// add elements to interact with
	// top anchor
	jQuery('body').prepend('<span id="bm-top" />');
	// back to top link
	jQuery('body').append('<a href="#bm-top" id="bm-arrow-top">Back To Top</a>');

	//set the link
	jQuery('#bm-arrow-top').bm_topLink({
		min: 200,
		fadeSpeed: 500
	});
	
	//smoothscroll
	jQuery('#bm-arrow-top').click(function(e) {
		e.preventDefault();
	});
	
	jQuery('a[href*=#]').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
		
			var $target = jQuery(this.hash);
			$target = $target.length && $target || jQuery('[name=' + this.hash.slice(1) +']');
			
			if ($target.length) {
				var targetOffset = $target.offset().top;
				jQuery('html,body').animate({scrollTop: targetOffset}, 1000);
				return false;
			}
		}
	});
	
});

//plugin
jQuery.fn.bm_topLink = function(settings) {
	settings = jQuery.extend({
		min: 1,
		fadeSpeed: 200
	}, settings);
	return this.each(function() {
		//listen for scroll
		var el = jQuery(this);
		el.hide(); //in case the user forgot
		jQuery(window).scroll(function() {
			if (jQuery(window).scrollTop() >= settings.min) {
				el.fadeIn(settings.fadeSpeed);
			} else {
				el.fadeOut(settings.fadeSpeed);
			}
		});
	});
};