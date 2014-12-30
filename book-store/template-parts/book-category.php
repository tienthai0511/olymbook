<div class="block-store mt30">
	<div class="block-slide-book row-fluid">

	<?php for($i = 0; $i < 7; $i++ ):?>
   <div class="book-slide-container">
        <div class="price right"><?php echo $i?></div>
			<div class="clearfix"></div>
			<div class="main-block text-center">
				<a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/book1.png"/></a>
			</div>
			<div class="content-block-bot-slide">
				<div class="left title-sub-store">
				<a href="#"><span">Dòng sách</span><p class="text-uppercase">Nghệ thuật lãnh đạo và quản lý</a>
				</div>
				<a class="right arrow-icon text-transparent" href="#">#</a>
			</div>
			
    </div>
	<?php
		endfor;
	?>
	</div>
	
	<div class=" height-75 nav-view-more widh-1075">
		<a href="#" class="view-more">Xem thêm <span class="text-uppercase">Danh mục giải pháp tủ sách(10)</span></a>
		<a class="right arrow-icon text-transparent" href="#">#</a>
	</div>
	</div>
</div>

	</style>

				
	<script type="text/javascript">
	jQuery(document).ready(function ($) {
	var numSlideShow = numSlideScroll = 3;
		option = {};
				var w = Math.max(document.documentElement.clientWidth, window.innerWidth || 0)
		var h = Math.max(document.documentElement.clientHeight, window.innerHeight || 0)
		if (w <= 767){
			option['slidesToShow'] = 1;
			option['slidesToScroll'] =  1;
		}
		console.log(option.slidesToShow);
	var	option = {
		infinite: true,
		slidesToShow: numSlideShow,
		slidesToScroll: numSlideScroll,
		dots: true,
		speed: 900,
		prevArrow:"",
		nextArrow:"",
		dotsClass: 'custom-paging-num',
	};
	
	function get(){
		console.log(option.slidesToShow);
	}

$(window).resize = get;
		window.onresize = get;
		$('.block-slide-book').slick(
			option
		);

});
    </script>
