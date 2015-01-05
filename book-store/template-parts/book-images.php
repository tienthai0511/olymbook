<?php $args = array(
		'posts_per_page'   => 3,
		'offset'           => 0,
		'category_name'    => 'danh-ngon',
		'orderby'          => 'post_date',
		'order'            => 'DESC',
		'post_type'        => 'post',
		'post_status'      => 'publish'
	);
	$loop = new WP_Query( $args );

?>
<?php if(($loop->have_posts())) :?>
<div class="block-images">
	<div class="row-fluid">
	<?php
		while ( $loop->have_posts() ) :
			$loop->the_post();
			global $product;
			if (has_post_thumbnail( $loop->post->ID )) {
				$image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID ), 'single-post-thumbnail' );
			}
			else {
				
			}
			?>
			<div class="span4">
				<a href="<?php echo get_permalink( $loop->post->ID ); ?>">
				<div class="main-block text-center">
					<img src="<?php echo $image[0]; ?>"/>
				</div>
				<div class="clearfix"></div>
				</a>
			</div>
			<?php
		endwhile;
		wp_reset_query();
	?>
	</div>
	<div class="clearfix"></div>
	<div class=" height-75 nav-view-more widh-1075 content-block-bot">
		<a href="#" class="view-more">Xem thêm <span class="text-uppercase">Những câu danh ngôn hay nhất(10)</span></a>
		<a class="right arrow-icon text-transparent" href="#">#</a>
	</div>
	<div class="clearfix"></div>
	</div><!-- slider-bar-->
<?php endif;?>