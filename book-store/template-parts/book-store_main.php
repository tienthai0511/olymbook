<div class="block-store mt30">
	<div class="head-layout w-1000"><!-- slider-bar-->
	<div class="carousel slide" id="bookstore" data-interval="false">
		<div class="carousel-inner row-fluid">
		<?php 
			/*$args = array(
			    'posts_per_page' => 100,
			    'product_cat' => 'bookcase',
			    'post_type' => 'product',
			);
			$loop = new WP_Query( $args );
			$i = 0;
			while ( $loop->have_posts() ) : $loop->the_post(); global $product;
			*/
			for($i = 0;$i<5;$i++):
		?>
		<!-- item -->
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
					<p class="text-justify">Nổi tiếng với câu chuyện bữa tối 21 xu & nỗ lực vươn lên từ khốn khó - Jack Canfield đã làm bừng tỉnh thế giới về niềm tin vào khoa học thành công. Trở thành Tiến sỹ/ Giảng viên của Đại học Harvard chưa làm dừng bước chân ông. Khám phá & ứng dụng bí mật Luật hấp dẫn trong thực tiễn, ông trở thành một đa tỷ phú với lợi nhuận ròng hàng tỷ USD mỗi năm - suốt từ hơn 20 năm qua; phá mọi kỷ lục thế giới về xuất bản sách với trên 225 tựa Chicken Soup for the Soul - bán được trên 25 triệu ấn bản...</p>
					<p>
					nstead of adding on optional mobile styles, they're ba
					</p>
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
				<div class="view-more-c">
					<a href="#">Xem thêm </a>
				</div>
			</div><!--/*content*/-->
		 </div>
		</div>
		<!-- end item-->
		<?php 
		//$i++;
		endfor; 
		?>
	</div><!-- /.carousel -->
	<a class="left carousel-control" href="#bookstore" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
	<a class="right carousel-control" href="#bookstore" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
		<div class="clearfix"></div>
	</div><!-- slider-bar-->
	<div class="clearfix"></div>
<div class="clearfix"></div>
	<div class=" height-75 nav-view-more row-fluid relative">
		<a href="#" class="view-more">Xem thêm <span class="text-uppercase">Danh mục giải pháp tủ sách(10)</span></a>
		<a class="right arrow-icon text-transparent" href="#">#</a>
		</div>
	</div>
</div>
