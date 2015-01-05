<div class="block-store mt30">
		<div class="block-store-slide row-fluid">
		<?php for($i = 0;$i< 5;$i++):?>
		<div class="item">
			<!-- image-->
			<div class="span8 left-store">
				<div class="price right">175K1</div>
				<img src="<?php echo get_template_directory_uri(); ?>/images/shop-1.png"/>
			</div><!--/*image*/-->
			<!-- content-->
			<div class="span4 right-store">
				<p class="t-tini text-uppercase">Tủ sách</p>
				<h2 class="title-store text-uppercase text-justify">Tinh hoa lãnh đạo</h2>
				<span class="author text-uppercase">John Kenl</span>
				
				<div class="content-store-text">
					<p class="text-justify color-style-1">With Bootstrap 2, we added optional mobile friendly styles for key aspects of the framework. With Bootstrap 3, we've rewritten the project to be mobile friendly from the start. Instead of adding on optional mobile styles, they're ba</p>
					<p class="text-justify">With Bootstrap 2, we added optional mobile friendly styles for key aspects of the framework. With Bootstrap 3, we've rewritten the project to be mobile friendly from the start. Instead of adding on optional mobile styles, they're ba
					</p>
					<p>
					nstead of adding on optional mobile styles, they're ba
					</p>
				</div>
				<div class="clearfix"></div>
				<div class="view-more-c">
					<a class="right arrow-icon text-transparent" href="#">#</a>
				</div>
			</div><!--/*content*/-->
		</div>
		<?php endfor;?>
		</div>
		<div class="clearfix"></div>
	<div class="clearfix"></div>
<div class="clearfix"></div>
	<div class=" height-75 nav-view-more row-fluid relative">
		<a href="#" class="view-more">Xem thêm <span class="text-uppercase">Danh mục giải pháp tủ sách(10)</span></a>
		<a class="right arrow-icon text-transparent" href="#">#</a>
		</div>
	</div>
</div>

	<script type="text/javascript">
	jQuery(document).ready(function ($) {

	var	option = {
		
		slidesToShow: 1,
		slidesToScroll: 1,
		dots: true,
		speed: 900,
		prevArrow:"",
		nextArrow:"",
	};

		$('.block-store-slide').slick(
			option
		);

});
    </script>
