<?php $args = array(
		'posts_per_page'   => 3,
		'offset'           => 0,
		'category_name'    => 'popular-post',
		'orderby'          => 'post_date',
		'orderby'          => 'comment_count',
		'order'            => 'DESC',
		'post_type'        => 'post',
		'post_status'      => 'publish'
	);
	//$loop = new WP_Query( $args );
	$myposts = get_posts( $args );
?>
<?php if (count($myposts) > 0): ?>
<div class="block-store block-post mt30">
	<!-- block first-->
	<div class="row-fluid">
	<?php
		if (count($myposts[0])) :
		if(has_post_thumbnail( $myposts[0]->ID )){
			if(has_post_thumbnail( $myposts[0]->ID )){
					//echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog');
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $myposts[0]->ID ), '717x375' );
					if(isset($image[0])){
						$image_left =  $image[0];
					}else{
						$image_left = woocommerce_placeholder_img_src();
					}
				}else{
					$image_left = woocommerce_placeholder_img_src();
				}
		}
	?>
	<div class="span8 left-block bg-cover" style="background:url(<?php echo $image_left;?>)">
		<div class="block-post-top-img">
			<a href="<?php echo  get_permalink($myposts[0]->ID); ?>"><h3 class="text-uppercase"><?php echo $myposts[0]->post_title;?></h3></a>
			<p class="text-justify"><?php echo wp_trim_words( $myposts[0]->post_content, 50, null ); ?>
			</p>
			<a href="<?php echo  get_permalink($myposts[0]->ID); ?>" class="view-more-link right">Xem thêm</a>
		</div>
	<div class="clearfix"></div>
	</div><!--/*block first*/-->
	<?php endif;?>
	<!-- block item-->
	<div class="span4 right-block pd-0 row">
		<ul>
		<?php if (isset($myposts[1]) && count($myposts[1])) :
			if (has_post_thumbnail( $myposts[1]->ID )) {
			if (has_post_thumbnail( $myposts[1]->ID )) {
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $myposts[1]->ID ), '357x178' );
					if(isset($image[0])){
						$image_right_top =  $image[0];
					}else{
						$image_right_top = woocommerce_placeholder_img_src();
					}
				}else{
					$image_right_top = woocommerce_placeholder_img_src();
				}
		}
		?>
			<li>
				<div class="item-block-post bg-cover" style="background:url(<?php echo $image_right_top;?>);">
					<div class="block-post-item-img">
					<a href="<?php echo  get_permalink($myposts[1]->ID); ?>"><h3 class="text-uppercase"><?php echo wp_trim_words( $myposts[1]->post_title, 15, null ); ?></h3></a>
					<a class="right arrow-icon text-uppercase" href="<?php echo  get_permalink($myposts[1]->ID); ?>">Xem thêm</a>
					</div>
				</div>
			</li>
		<?php endif; ?>
		<?php if (isset($myposts[2]) && count($myposts[2])) :
			if (has_post_thumbnail( $myposts[2]->ID )) {
			if (has_post_thumbnail( $myposts[2]->ID )) {
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $myposts[2]->ID ), '357x178' );
					if(isset($image[0])){
						$image_right_bot =  $image[0];
					}else{
						$image_right_bot = woocommerce_placeholder_img_src();
					}
				}else{
					$image_right_bot = woocommerce_placeholder_img_src();
				}
		}
		?>
			<li>
				<div class="item-block-post bg-cover" style="background:url(<?php echo $image_right_bot;?>);">
					<div class="block-post-item-img">
					<a href="<?php echo  get_permalink($myposts[2]->ID); ?>"><h3 class="text-uppercase"><?php echo wp_trim_words( $myposts[2]->post_title, 15, null ); ?></h3></a>
					<a class="right arrow-icon text-uppercase" href="<?php echo  get_permalink($myposts[2]->ID); ?>">Xem thêm</a>
				</div>
				</div>
			</li>
			<?php endif;?>
		</ul>
		<div class="clearfix"></div>
		</div>
	<div class="clearfix"></div>
	</div>
	</div>
	<div class="clearfix"></div>
	<div class=" height-75 nav-view-more row-fluid content-block-bot">
			<a href="<?php echo get_category_link(25); ?>" class="view-more">Xem thêm <span class="text-uppercase">Xem những bài viết nổi bật</span></a>
			<a class="right arrow-icon text-transparent" href="<?php echo get_category_link( 25 ); ?>">#</a>
	</div>
</div>
<?php endif; 
	wp_reset_query();
?>