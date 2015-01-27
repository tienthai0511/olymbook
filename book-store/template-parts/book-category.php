<?php
  $taxonomy     = 'product_cat';
  $orderby      = 'name';  
  $show_count   = 0;      // 1 for yes, 0 for no
  $pad_counts   = 0;      // 1 for yes, 0 for no
  $hierarchical = 1;      // 1 for yes, 0 for no  
  $title        = '';  
  $empty        = 0;
$args = array(
  'taxonomy'     => $taxonomy,
  'orderby'      => $orderby,
  'show_count'   => $show_count,
  'pad_counts'   => $pad_counts,
  'hierarchical' => $hierarchical,
  'title_li'     => $title,
  'hide_empty'   => $empty
);
$all_categories = get_categories( $args );
$categories = array();
foreach ($all_categories as $cat) {
    if($cat->category_parent == 0) {
        $category_id = $cat->term_id;
        $args2 = array(
          'taxonomy'     => $taxonomy,
          'child_of'     => 0,
          'parent'       => $category_id,
          'orderby'      => $orderby,
          'show_count'   => $show_count,
          'pad_counts'   => $pad_counts,
          'hierarchical' => $hierarchical,
          'title_li'     => $title,
          'hide_empty'   => $empty
        );
        $sub_cats = get_categories( $args2 );
        if($sub_cats) {
            foreach($sub_cats as $sub_category) {
                $cateUrl = get_term_link($sub_category->slug, 'product_cat');
                $cateName = $sub_category->name;
                $thumbnail_id = get_woocommerce_term_meta( $sub_category->term_id, 'thumbnail_id', true );
                $image = wp_get_attachment_url( $thumbnail_id );
                if($sub_category->slug != "bookcase" && $sub_category->slug != 'best-seller' && $sub_category->slug != "course" && $sub_category->slug != 'new'){
	                $categories[] = array(
	                	'cateUrl' =>	$cateUrl,
	                	'cateName' =>	$cateName,
	                	'image' =>	$image,
	                	'slug' => $sub_category->slug
	                );
                }
            }
        }else{
        	$cateUrl = get_term_link($cat->slug, 'product_cat');
        	$cateName = $cat->name;
        	$thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
        	$image = wp_get_attachment_url( $thumbnail_id );	
        	if($cat->slug != "bookcase" && $cat->slug != 'best-seller' && $cat->slug != 'new' && $cat->slug != 'course'){	        	
	        	$categories[] = array(
	        			'cateUrl' =>	$cateUrl,
	        			'cateName' =>	$cateName,
	        			'image' =>	$image,
	        			'slug' => $cat->slug
	        	);
        	}
        }
    	?>
    <?php }     
}
?>
<div class="block-store mt30">
	<div class="block-slide-book row-fluid">

	<?php 
	foreach ($categories as $category){
		$args = array(
		    'posts_per_page' => 1,
		    'product_cat' => $category['slug'],
		    'post_type' => 'product',
		);
		$loop = new WP_Query( $args );
		while ( $loop->have_posts() ) : $loop->the_post(); global $product;
	?>
   <div class="book-slide-container">
        <div class="price right">
        	<a class="add_to_cart_button product_type_simple added" 
        		data-quantity="1" 
        		data-product_sku="1200" 
        		data-product_id="<?php echo $product->id;?>" 
        		rel="nofollow" 
        		href="/shop/?add-to-cart=<?php echo $product->id;?>"><?php echo number_format($product->get_price()/1000,0,".",".")."K"; ?></a>
        </div>
			<div class="clearfix"></div>
			<div class="main-block text-center">
				<?php 
				if(has_post_thumbnail( $loop->post->ID )){
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID ), 'single-post-thumbnail' );
					if(isset($image[0])){
						echo "<a href=\"".get_permalink( $loop->post->ID )."\"><img src=\"{$image[0]}\"/></a>";
					}else{
						echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder"/>';
					}
				}else{
					echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder"/>';
				}?>
			</div>
			<div class="content-block-bot-slide">
				<div class="left title-sub-store">
				<a href="<?php echo $category['cateUrl']?>"><span">Dòng sách</span><p class="text-uppercase"><?php echo $category['cateName']?></a>
				</div>
				<a class="right arrow-icon arrow-customize text-transparent" href="<?php echo $category['cateUrl']?>"><?php echo $category['cateName']?></a>
			</div>
			
    </div>
    <?php endwhile; ?>
    <?php wp_reset_query(); ?>
	<?php
	}
	?>
	
	</div>
	
	<div class=" height-75 nav-view-more widh-1075">
		<a href="#" class="view-more">Xem thêm <span class="text-uppercase">Danh mục dòng sách</span></a>
		<a class="right arrow-icon text-transparent" href="#">#</a>
	</div>
	</div>
</div>

	</style>

				
	<script type="text/javascript">
	jQuery(document).ready(function ($) {
	var numSlideShow = numSlideScroll = 3;
		option = {};
				var w = Math.max(document.documentElement.clientWidth, window.innerWidth || 0)
		var h = Math.max(document.documentElement.clientHeight, window.innerHeight || 0)
		if (w <= 767){
			option['slidesToShow'] = 1;
			option['slidesToScroll'] =  1;
		}
		console.log(option.slidesToShow);
	var	option = {
		infinite: true,
		slidesToShow: numSlideShow,
		slidesToScroll: numSlideScroll,
		dots: true,
		speed: 900,
		prevArrow:"",
		nextArrow:"",
		dotsClass: 'custom-paging-num',
	};
	
	function get(){
		console.log(option.slidesToShow);
	}

$(window).resize = get;
		window.onresize = get;
		$('.block-slide-book').slick(
			option
		);

});
    </script>
