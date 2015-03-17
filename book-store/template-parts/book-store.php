<?php 
	$args = array(
		'posts_per_page' => 100,
		'product_cat' => 'bookcase',
		'post_type' => 'product',
	);
	$loop = new WP_Query( $args );
	$i = 0;
?>
<?php if (($loop->have_posts())) :?>
<div class="block-store mt30">
		<div class="block-store-slide row-fluid">
		<?php
			while ( $loop->have_posts() ) : $loop->the_post(); global $product;
		?>
		<!-- item-->
		<div class="item <?php if ($i ==0) echo "active";?>">
			<!-- image-->
			<div class="span8 left-store">
				<div class="price right">
					<a class="add_to_cart_button product_type_simple added" 
						data-quantity="1" 
						data-product_sku="1200" 
						data-product_id="<?php echo $product->id;?>" 
						rel="nofollow" 
						href="/shop/?add-to-cart=<?php echo $product->id;?>"><?php if ($product->get_price() != NULL) echo money_format_k($product->get_price())/*number_format($product->get_price(),0,".",".")." VNĐ"*/; ?></a>
				</div>
				<div class="clearfix"></div>
				<div class="pd-10">
				<?php 
					if (has_post_thumbnail( $loop->post->ID )) {
						//echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog');
						$image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID ), 'single-post-thumbnail' );
						if (isset($image[0])) {
							echo "<a href=\"".get_permalink( $loop->post->ID )."\"><img src=\"{$image[0]}\"/></a>";
						}
						else {
							echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder"/>';
						}
					}
					else {
						echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder"/>';
					}
				?>
				</div>
			</div><!--/*image*/-->
			<!-- content-->
			<div class="span4 right-store">
				<p class="t-tini text-uppercase">Tủ sách</p>
				<h2 class="title-store text-uppercase text-justify">
				<?php echo $product->post->post_title;?>
				</h2>
				<span class="author text-uppercase">
				<?php 
					echo (get_the_term_list($product->id, 'product_author' ) != FALSE) ? (get_the_term_list($product->id, 'product_author' )) : '-';
				?>
				</span>
				<div class="content-store-text">
					<p class="text-justify color-style-1"><?php echo $product->post->post_content;?></p>
				</div>
				<div class="clearfix"></div>
				<div class="view-more-c">
					<a class="right arrow-icon" style="line-height:1;padding-right:15px;" href="<?php echo get_permalink( $loop->post->ID );?>">Xem thêm</a>
				</div>
			</div><!--/*content*/-->
		</div>
		<!-- end item-->
		<?php
			$i++;
			endwhile;
		?>
		</div>
		<div class="clearfix"></div>
	<div class=" height-75 nav-view-more row-fluid relative">
		<a href="/product-category/bookcase/" class="view-more">Xem thêm <span class="text-uppercase">Danh mục giải pháp tủ sách (<?php echo $i;?>)</span></a>
		<a class="right arrow-icon text-transparent" href="/product-category/bookcase/">#</a>
	</div>
</div>
<?php endif;?>
<?php $timeSlideInterval =  get_option( 'cp_slick_slider_pause_time', 5000 ); ?>
	<script type="text/javascript">
		jQuery(document).ready(function ($) {
			var autoplaySpeedTime = <?php echo $timeSlideInterval;?>;
			var option = {
				slidesToShow: 1,
				slidesToScroll: 1,
				dots: true,
				speed: 900,
				draggable:false,
				autoplay : true,
				autoplaySpeed : autoplaySpeedTime
			};
			$('.block-store-slide').slick(option);
		});
    </script>
