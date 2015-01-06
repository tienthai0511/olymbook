<div class="row-fluid block-new mt30">
<?php 
$prod_cat_args = array(
  'taxonomy'     => 'product_cat', //woocommerce
  'orderby'      => 'name',
  'empty'        => 0
);

$woo_categories = get_categories( $prod_cat_args );
foreach ($woo_categories as $category){
	if($category->slug == "new"){	      
		$cateUrl = get_term_link($category->slug, 'product_cat');
		$categories['new'] = array(
			'cateUrl' =>	$cateUrl,
			'cateName' =>	$category->name,
			'slug' => $category->slug
		);
	}elseif ($category->slug == "best-seller"){
		$cateUrl = get_term_link($category->slug, 'product_cat');
		$categories['best-seller'] = array(
			'cateUrl' =>	$cateUrl,
			'cateName' =>	$category->name,
			'slug' => $category->slug
		);
	}
}
	$args = array(
		    'posts_per_page' => 1,
		    'product_cat' => $categories['new']['slug'],
		    'post_type' => 'product',
		);
		$loop = new WP_Query( $args );
		while ( $loop->have_posts() ) : $loop->the_post(); global $product;
?>
	<div class="span6 block-new-item-sub text-center">
		<div class="block-new-item-content">
			<div class="price right">
				<a class="add_to_cart_button product_type_simple added" 
	        		data-quantity="1" 
	        		data-product_sku="1200" 
	        		data-product_id="<?php echo $product->id;?>" 
	        		rel="nofollow" 
	        		href="/shop/?add-to-cart=<?php echo $product->id;?>"><?php echo number_format($product->get_price(),0,".",".")." VNĐ"; ?></a>
			</div>
			<div class="clearfix"></div>
			<div class="main-block-new">
			<?php 
				if(has_post_thumbnail( $loop->post->ID )){
					//echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog');
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID ), '236x338' );
					if(isset($image[0])){
						echo "<a href=\"".get_permalink( $loop->post->ID )."\"><img src=\"{$image[0]}\"/></a>";
					}else{
						echo '<img src="'.woocommerce_placeholder_img_src().'" alt="product"/>';
					}
				}else{
					echo '<img src="'.woocommerce_placeholder_img_src().'" alt="product"/>';
				}
			?>
			</div>
		</div>
		<div class="content-block-bot text-center">
			<a href="<?php echo $categories['new']['cateUrl']?>">Xem thêm <span class="text-uppercase"><?php echo $categories['new']['cateName']?></span></a>
			<a class="right arrow-icon text-transparent" href="<?php echo $categories['new']['cateUrl']?>">#</a>
			</div>
	</div>
	<?php endwhile; ?>
    <?php wp_reset_query();
    $args = array(
		    'posts_per_page' => 1,
		    'product_cat' => $categories['best-seller']['slug'],
		    'post_type' => 'product',
		);
		$loop = new WP_Query( $args );
		while ( $loop->have_posts() ) : $loop->the_post(); global $product;
	?>
	<div class="span6 block-new-item-sub text-center">
		<div class="block-new-item-content">
			<div class="price right">
				<a class="add_to_cart_button product_type_simple added" 
	        		data-quantity="1" 
	        		data-product_sku="1200" 
	        		data-product_id="<?php echo $product->id;?>" 
	        		rel="nofollow" 
	        		href="/shop/?add-to-cart=<?php echo $product->id;?>"><?php echo number_format($product->get_price(),0,".",".")." VNĐ"; ?></a>
			</div>
			<div class="clearfix"></div>
			<div class="main-block-new">
			<?php 
				if(has_post_thumbnail( $loop->post->ID )){
					//echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog');
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID ), '236x338' );
					if(isset($image[0])){
						echo "<a href=\"".get_permalink( $loop->post->ID )."\"><img src=\"{$image[0]}\"/></a>";
					}else{
						echo '<img src="'.woocommerce_placeholder_img_src().'" alt="product"/>';
					}
				}else{
					echo '<img src="'.woocommerce_placeholder_img_src().'" alt="product"/>';
				}
			?>
			</div>
		</div>
		<div class="content-block-bot text-middle">
			<a href="<?php echo $categories['best-seller']['cateUrl']?>">Xem thêm <span class="text-uppercase"><?php echo $categories['best-seller']['cateName']?></span></a>
			<a class="right arrow-icon text-transparent" href="<?php echo $categories['best-seller']['cateUrl']?>">#</a>
		</div>
	</div>
	<?php endwhile; ?>
    <?php wp_reset_query();?>
	<div class="clearfix"></div>
</div><!--/* end bock new-->