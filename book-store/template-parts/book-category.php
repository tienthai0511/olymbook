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
?>
<?php 
$all_categories = get_categories( $args );
foreach ($all_categories as $cat) {
    if($cat->category_parent == 0) {
        $category_id = $cat->term_id;

?>      
        <?php
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
                echo  '<br /><a href="'. get_term_link($sub_category->slug, 'product_cat') .'">'. $sub_category->name .'</a>';
                $thumbnail_id = get_woocommerce_term_meta( $sub_category->term_id, 'thumbnail_id', true );
                $image = wp_get_attachment_url( $thumbnail_id );
                if ( $image ) {
                	echo '<img src="' . $image . '" alt="" />';
                }
            }

        }else{
        	echo  '<br /><a href="'. get_term_link($cat->slug, 'product_cat') .'">'. $cat->name .'</a>';
        }
    	?>



    <?php }     
}
?>

<div class="block-store mt30">
	<div class="head-layout w-1000"><!-- slider-bar-->

	<div class="carousel slide" id="myCarousel">
		<div class="carousel-inner">
		<?php  
		$args = array( 'post_type' => 'product', 'posts_per_page' => 100, 'product_cat' => 'clothing' );
		$loop = new WP_Query( $args );
		$flag = 0;
		while ( $loop->have_posts() ) : $loop->the_post(); 
			global $product;
		?>
			<div class="item<?php if ($flag == 0) echo " active"; $flag++;?>">
			  <div class="span4"><a href="<?php echo get_permalink();?>">
				<div class="price right">175K</div>
				<div class="clearfix"></div>
				<div class="main-block text-center">
					<?php echo woocommerce_get_product_thumbnail(); ?>
				</div>
				<div class="clearfix"></div>
				<div class="content-block-bot">
					
					<a href="<?php echo get_permalink();?>">Dòng sách1<br><span class="text-uppercase"><?php echo the_title();?></span></a>
					<a class="right" href="#">click</a>
				</div>
				</a>
			  </div>
			</div>
			<?php //echo '<br /><a href="'.get_permalink().'">' . woocommerce_get_product_thumbnail().' '.the_title().'</a>'; ?>
		<?php 
		endwhile; 
		wp_reset_query(); 
		?>
		</div>
		<a class="left carousel-control" href="#myCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
		<a class="right carousel-control" href="#myCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
	</div><!-- /.carousel -->
		<div class="clearfix"></div>
	</div><!-- slider-bar-->
	<div class="clearfix"></div>
<div class="clearfix"></div>
	<div class=" height-75 nav-view-more widh-1075">
		<a href="#" class="view-more">Xem thêm <span class="text-uppercase">Danh mục giải pháp tủ sách(10)</span></a>
		<a href="#" class="btn-view-more">Xem thêm</a>
	</div>
</div>