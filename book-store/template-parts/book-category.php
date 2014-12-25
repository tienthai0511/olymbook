<div class="block-store mt30">
	<div class="head-layout w-1000"><!-- slider-bar-->

	<div class="carousel slide " id="myCarousel" data-interval="false" data-cycle-fx="carousel" data-cycle-timeout="0" data-cycle-pager="#myCarousel" data-cycle-carousel-visible="3" data-cycle-allow-wrap="false">
		<div class="carousel-inner block-store-slide">
		<?php for($i=0;$i<3;$i++){?>
		<div class="item <?php if($i ==0) echo "active";?>">
			<!-- item 0-->
			<div class="span4">
			<div class="price right">171<?php echo $i?></div>
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
		  </div><!-- /*item 0*/-->
		  <!-- item 1-->
			<div class="span4">
			<div class="price right">172 <?php echo $i?></div>
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
		  </div><!-- /*item 1*/-->
		  <!-- item 2-->
			<div class="span4">
			<div class="price right">171<?php echo $i?></div>
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
		  </div><!-- /*item 2*/-->
		</div>
		<?php }?>
	</div>
	
		<!--<a class="left carousel-control" href="#myCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
		<a class="right carousel-control" href="#myCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>-->
		<div class="clearfix"></div>
		<div class="control-slide-book-category relative">
			<ul class="carousel-indicators" >
				<li data-target="#myCarousel" data-slide-to="0" class="active">1</li>
				<li data-target="#myCarousel" data-slide-to="1">2</li>
				<li data-target="#myCarousel" data-slide-to="2">3</li>
			</ul>
		</div>
	</div><!-- /.carousel -->
	</div><!-- slider-bar-->
	<div class="clearfix"></div>
	<div class=" height-75 nav-view-more widh-1075">
		<a href="#" class="view-more">Xem thêm <span class="text-uppercase">Danh mục giải pháp tủ sách(10)</span></a>
		<a class="right arrow-icon text-transparent" href="#">#</a>
	</div>
</div>
