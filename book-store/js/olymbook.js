jQuery(document).ready( function($) {
	// show / hide search content 
	var nav = $('.sort-content'),
	animateTime = 300,
	navLink = $('.check-sort-button');
	autoHeightAnimate(nav, animateTime);
	navLink.removeClass('close-status').addClass('open-status');
	// auto heigth when resize browser
	$( window ).resize(function() {
		autoHeightAnimate(nav, animateTime);
	});
	// show/ hide
	navLink.click( function() {
		if (nav.height() === 0) {
			navLink.removeClass('close-status').addClass('open-status');
			(autoHeightAnimate(nav, animateTime));
		}
		else{
			navLink.removeClass('open-status').addClass('close-status');
			nav.stop().animate({ height: '0' }, animateTime);
		}
	});

	// get height element
	function autoHeightAnimate( element, time ) {
		var curHeight = element.height(), // Get Default Height
		autoHeight = element.css('height', 'auto').height(); // Get Auto Height
		element.height(curHeight); // Reset to Default Height
		element.stop().animate({ height: autoHeight }, parseInt(time)); // Animate to Auto Height
	}
	
	function ajaxSearch( product_id ) {
		jQuery.ajax({
		type : "post",
		dataType : "json",
		url : olymbookAjax.ajaxurl,
		data : {action: "olymbook_search", post_id : product_id},
		success: function(response) {
			if (response.sucess == true) {
				jQuery('.over-lay').hide();
				jQuery('.grid-holder.features-books').html(response.html);
				console.log(response.debugString);
			} 
		}
	});
	}
	//click search condition
	$('.col-filter').each(function(){
		$(this).bind('click', function(){
			condition = 11;
			autoHeightAnimate(nav, animateTime);
			text = $(this).text();
			jQuery('.over-lay').show();
			$('.tag-filter-cd ul li:last-child').after('<li class="term-tag"><i class="term-tag-close"></i><span href="#">' + text + '</span></li>');
			ajaxSearch(condition);
		});
	});

	// remove condition
	$(document).on('click','.term-tag-close', function(){
		autoHeightAnimate(nav, animateTime);
		$(this).parent().remove();
			var condition = 1;//jQuery(this).attr("post_id");
			jQuery('.over-lay').show();
			ajaxSearch(condition);
	});
});