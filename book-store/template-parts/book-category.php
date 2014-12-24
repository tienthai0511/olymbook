<div class="block-store mt30">
	<div class="head-layout w-1000"><!-- slider-bar-->

	<div class="carousel slide" id="myCarousel" data-interval="false">
		<div class="carousel-inner">
		<?php for($i=0;$i<4;$i++){?>
		<div class="item <?php if($i ==0) echo "active";?>">
		  <div class="span4">
			<div class="price right">175K</div>
			<div class="clearfix"></div>
			<div class="main-block text-center">
				<a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/book1.png"/></a>
			</div>

			<div class="content-block-bot">
				<div class="left title-sub-store">
				<a href="#"><span">Xem thêm</span><p class="text-uppercase">Nghệ thuật lãnh đạo và quản lý</p></a>
				</div>
				<a class="right arrow-icon text-transparent" href="#">#</a>
				
			</div>
			<div class="clearfix"></div>
		  </div>
			
		</div>
		<?php }?>
	</div>
		<a class="left carousel-control" href="#myCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
		<a class="right carousel-control" href="#myCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
	</div><!-- /.carousel -->
		<div class="clearfix"></div>
	</div><!-- slider-bar-->
	<div class="clearfix"></div>
<div class="clearfix"></div>
	<div class=" height-75 nav-view-more widh-1075">
		<a href="#" class="view-more">Xem thêm <span class="text-uppercase">Danh mục giải pháp tủ sách(10)</span></a>
		<a class="right arrow-icon text-transparent" href="#">#</a>
	</div>
</div>