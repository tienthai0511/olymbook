<div class="block-store mt30">
	<div class="head-layout w-1000"><!-- slider-bar-->
	<div class="carousel slide" id="bookstore" data-interval="false">
		<div class="carousel-inner row-fluid">
		<?php 
			$args = array(
			    'posts_per_page' => 100,
			    'product_cat' => 'bookcase',
			    'post_type' => 'product',
			);
			$loop = new WP_Query( $args );
			$i = 0;
			while ( $loop->have_posts() ) : $loop->the_post(); global $product;
		?>
		<div class="item <?php if ($i ==0) echo "active";?>">
		 <div>
			<!-- image-->
			<div class="span8 left-store">
				<div class="price right">
					<a class="add_to_cart_button product_type_simple added" 
						data-quantity="1" 
						data-product_sku="1200" 
						data-product_id="<?php echo $product->id;?>" 
						rel="nofollow" 
						href="/shop/?add-to-cart=<?php echo $product->id;?>"><?php if ($product->get_price() != NULL) echo number_format($product->get_price(),0,".",".")." VNĐ"; ?></a>
		        </div>
				<?php 
				if(has_post_thumbnail( $loop->post->ID )){
					//echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog');
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID ), 'single-post-thumbnail' );
					if(isset($image[0])){
						echo "<a href=\"".get_permalink( $loop->post->ID )."\"><img src=\"{$image[0]}\"/></a>";
					}else{
						echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder"/>';
					}
				}else{
					echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder"/>';
				}?>
			</div><!--/*image*/-->
			<!-- content-->
			<div class="span4 right-store">
				<p class="t-tini text-uppercase">Tủ sách</p>
				<h2 class="title-store text-uppercase text-justify">Tinh hoa lãnh đạo</h2>
				<span class="author text-uppercase">John Kenl</span>
				
				<div class="content-store-text">
					<p class="text-justify color-style-1">
					<?php echo $product->post->post_content;?>
					</p>
				</div>
				<div class="clearfix"></div>
				<div class="view-more-c">
					<a class="right arrow-icon pr-15" href="#">Xem Thêm</a>
				</div>
			</div><!--/*content*/-->
		 </div>
		</div>
		<?php 
		$i++;
		endwhile; 
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
