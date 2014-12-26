<div class="training-content mt30">
	<div class="head-layout w-1000"><!-- slider-bar-->
	<div class="carousel slide" id="training" data-interval="false">
		<div class="carousel-inner row-fluid">
		<?php for($i = 0;$i< 5;$i++):?>
		<div class="item <?php if ($i ==0) echo "active";?>">
		 <div>
			<!-- image-->
			<div class="span8 left-store">
				<img src="<?php echo get_template_directory_uri(); ?>/images/news.png"/>
			</div><!--/*image*/-->
			<!-- content-->
			<div class="span4 right-store">
				<p class="t-tini text-uppercase">Tủ sách</p>
				<h2 class="title-store text-uppercase text-justify">Tinh hoa lãnh đạo</h2>
				<span class="author text-uppercase">John Kenl</span>
				
				<div class="content-store-text">
					<p class="text-justify">With Bootstrap 2, we added optional mobile friendly styles for key aspects of the framework. With Bootstrap 3, we've rewritten the project to be mobile friendly from the start. Instead of adding on optional mobile styles, they're ba</p>
					<p class="text-justify">With Bootstrap 2, we added optional mobile friendly styles for key aspects of the framework. With Bootstrap 3, we've rewritten the project to be mobile friendly from the start. Instead of adding on optional mobile styles, they're ba
					</p>
					<p>
					nstead of adding on optional mobile styles, they're ba
					</p>
				</div>
				<div class="clearfix"></div>
				<div class="view-more-c">
					<a href="#">Xem thêm </a>
				</div>
			</div><!--/*content*/-->
		 </div>
		</div>
		<?php endfor;?>
		</div>
		<a class="left carousel-control" href="#training" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
		<a class="right carousel-control" href="#training" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
	</div><!-- /.carousel -->
		<div class="clearfix"></div>
	</div><!-- slider-bar-->
	<div class="clearfix"></div>
<div class="clearfix"></div>
	<div class=" height-75 nav-view-more widh-1075 relative">
		<a href="#" class="view-more">Xem thêm <span class="text-uppercase">Danh mục giải pháp tủ sách(10)</span></a>
		<a class="right arrow-icon text-transparent" href="#">#</a>
		</div>
	</div>
</div>