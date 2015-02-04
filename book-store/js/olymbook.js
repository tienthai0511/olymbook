var nav = jQuery('.sort-content'),
	animateTime = 300;
function search(attr, value){
	arrSearch = new Array();
	text = jQuery('#' + attr).text();

	if(jQuery('#'+attr).hasClass('added-filter')) return false;

	element_li = '<li class="term-tag" id=\"del_'+attr+'\" data-search=\"'+attr+':'+value+'\" data-value=\"'+value+'\" onclick="javascript:removeSeach(\''+ attr+ '\', \''+value+ '\')"><i class="term-tag-close"></i><span href="javascript:void(0);">' + text + '</span></li>';
	
	(jQuery('.tag-filter-cd ul li').length > 0) ? jQuery('.tag-filter-cd ul li:last-child').after(element_li) : jQuery('.tag-filter-cd ul').html(element_li);
	autoHeightAnimate(jQuery('.sort-content'), animateTime);
	jQuery('.features-condition #'+attr).addClass('added-filter');
	
	jQuery('.tag-filter-cd li.term-tag').each(function(index){
		arrSearch.push(jQuery(this).attr('data-search'));
	});
	//console.log(arrSearch);
	ajaxSearch(arrSearch);
	arrSearch = new Array();
	return false;
}

function removeSeach(attr, value){
	arrSearch = new Array();
	jQuery('.tag-filter-cd li.term-tag').each(function(index){
		if (jQuery(this).attr('data-search') != attr +':' + value)
		arrSearch.push(jQuery(this).attr('data-search'));
	});
	jQuery('#del_'+attr).remove();
	autoHeightAnimate(jQuery('.sort-content'), animateTime);
	jQuery('.features-condition #'+attr).removeClass('added-filter');
	ajaxSearch(arrSearch);
	arrSearch = new Array();
	return false;
}

function addSort(){
	arrSearch = new Array();
	
	jQuery('.tag-filter-cd li.term-tag').each(function(index){
		arrSearch.push(jQuery(this).attr('data-search'));
	});
	ajaxSearch(arrSearch);
	arrSearch = new Array();
	return false;
}

	function ajaxSearch(data) {
		
		var url      = window.location.href; 
		urlString = data.join('&');
		urlString = urlString.replace(/:/g, "=");
		url_after = url.split('?')[0];
		var orderBy = jQuery( ".orderby" ).val()
		if(urlString == "")
			urlString = "orderBy="+orderBy;
		else
			urlString += "&order_by="+orderBy;

		urlString = url_after + '?' + urlString;
		jQuery('.over-lay').show();
		jQuery.ajax({
		type : "post",
		dataType : "json",
		url : olymbookAjax.ajaxurl,
		data : {action: "olymbook_search", data : data},
		success: function(response) {
			if (response.sucess == true) {
				jQuery('.over-lay').hide();

				jQuery('.grid-holder.features-books').html(response.html);
				
				window.history.pushState(null,null,urlString);
			}
		}
	});
	}
	function autoHeightAnimate( element, time ) {
		var curHeight = element.height(), // Get Default Height
		autoHeight = element.css('height', 'auto').height(); // Get Auto Height
		element.height(curHeight); // Reset to Default Height
		element.stop().animate({ height: autoHeight }, parseInt(time)); // Animate to Auto Height
	}
	
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

	jQuery( ".orderby" ).change(function() {
		addSort();
	});
	// get height element


	//click search condition
	/*$('.col-filter').each(function(){
		$(this).bind('click', function(){
			condition = 11;
			data_name = $(this).attr('data-name');
			data_value = $(this).attr('data-value');
			data={};
			text = $(this).text();
			jQuery('.over-lay').show();
			element_li = '<li class="term-tag" data-name="' + data_name + '" data-value="' + data_value + '"><i class="term-tag-close"></i><span href="#">' + text + '</span></li>';
			($('.tag-filter-cd ul li').length > 0) ? $('.tag-filter-cd ul li:last-child').after(element_li) : $('.tag-filter-cd ul').html(element_li);
			ajaxSearch(data_name, data_value, data, $(this), 'add');
		});
	});*/

	// remove condition
	/*$(document).on('click','.term-tag-close', function(){
		$(this).parent().remove();
			var condition = 1;//jQuery(this).attr("post_id");
			//jQuery('.over-lay').show();
			ajaxSearch(data_name, data_value, data, $(this), 'del');
	});*/
});