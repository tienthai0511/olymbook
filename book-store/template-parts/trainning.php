<?php 
	$args = array(
		'posts_per_page' => 100,
		'product_cat' => 'course',
		'post_type' => 'product',
	);
	$loop = new WP_Query( $args );
	$i = 0;
?>
<?php if (($loop->have_posts())) :?>
<div class="block-store mt30">
		<div class="block-training-slide row-fluid">
		<?php
			while ( $loop->have_posts() ) : $loop->the_post(); global $product;
		?>
		<!-- item-->
		<div class="item <?php if ($i ==0) echo "active";?>">
			<!-- image-->
			<div class="span8 left-store">
				<?php 
				if(has_post_thumbnail( $loop->post->ID )){
					//echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog');
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID ), '717x355' );
					if(isset($image[0])){
						echo "<a href=\"".get_permalink( $loop->post->ID )."\"><img src=\"{$image[0]}\"/></a>";
					}else{
						echo '<img src="'.woocommerce_placeholder_img_src().'" alt="product"/>';
					}
				}else{
					echo '<img src="'.woocommerce_placeholder_img_src().'" alt="product"/>';
				}
				?>
			</div><!--/*image*/-->
			<!-- content-->
			<div class="span4 right-store">
				<p class="t-tini text-uppercase"><?php echo $product->post->post_title;?></p>
				
				<div class="content-store-text">
					<p class="text-justify"><?php echo $product->post->post_content;?></p>

					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
				<div class="view-more-c">
					<a href="<?php echo get_permalink( $loop->post->ID );?>">Xem thêm </a>
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
		<a href="<?php echo get_term_link("course", 'product_cat' )?>" class="view-more">Xem thêm <span class="text-uppercase">Khóa Học</span></a>
		<a class="right arrow-icon text-transparent" href="<?php echo get_term_link("course", 'product_cat' )?>">#</a>
	</div>
</div>
<?php endif;?>
	<script type="text/javascript">
		jQuery(document).ready(function ($) {
			var option = {
				slidesToShow: 1,
				slidesToScroll: 1,
				dots: true,
				speed: 900,
				draggable:false,
			};
			$('.block-training-slide').slick(option);
		});
    </script>
