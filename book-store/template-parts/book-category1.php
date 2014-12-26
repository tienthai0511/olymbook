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
<div class="block-store mt30">
	<div class="head-layout w-1000"><!-- slider-bar-->

	<div class="carousel slide " id="myCarousel" data-interval="false" data-cycle-fx="carousel" data-cycle-timeout="0" data-cycle-pager="#myCarousel" data-cycle-carousel-visible="3" data-cycle-allow-wrap="false">
		<div class="carousel-inner block-store-slide">
		<?php 
		$all_categories = get_categories( $args );
		$categories = array();
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
		                $cateUrl = get_term_link($sub_category->slug, 'product_cat');
		                $cateName = $sub_category->name;
		                $thumbnail_id = get_woocommerce_term_meta( $sub_category->term_id, 'thumbnail_id', true );
		                $image = wp_get_attachment_url( $thumbnail_id );
		                $categories[] = array(
		                	'cateUrl' =>	$cateUrl,
		                	'cateName' =>	$cateName,
		                	'image' =>	$image
		                );
		                if(count($categories) == 3){
		               		$blockCategories[] = $categories;
		               		$categories = array();
		                }
		            }
		
		        }else{
		        	$cateUrl = get_term_link($cat->slug, 'product_cat');
		        	$cateName = $cat->name;
		        	$thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
		        	$image = wp_get_attachment_url( $thumbnail_id );		        	
		        	$categories[] = array(
		        			'cateUrl' =>	$cateUrl,
		        			'cateName' =>	$cateName,
		        			'image' =>	$image
		        	);
		        	if(count($categories) == 3){
		        		$blockCategories[] = $categories;
		        		$categories = array();
		        	}
		        }
		    	?>
		    <?php }     
		}
		if($categories != array()){
			$blockCategories[] = $categories;
			$categories = array();
		}
		?>
		<?php 
		foreach ($blockCategories as $key => $categories){?>
		<div class="item <?php if($key ==0) echo "active";?>">
			<?php 
			foreach ($categories as $category){
			?>
			<!-- item 0-->
			<div class="span4">
			<div class="price right">171<?php echo $key?></div>
			<div class="clearfix"></div>
			<div class="main-block text-center">
				<?php 
				if($category['image'] != false){
				?>
				<a href="<?php echo $category['cateUrl'];?>"><img src="<?php echo $category['image'];?>"/></a>
				<?php 
				}else{
				?>
				<a href="<?php echo $category['cateUrl'];?>"><img src="<?php echo get_template_directory_uri(); ?>/images/book1.png"/></a>
				<?php 
				}
				?>
			</div>

			<div class="content-block-bot">
				<div class="left title-sub-store">
				<a href="<?php echo $category['cateUrl'];?>"><span">Xem thêm</span><p class="text-uppercase"><?php echo $category['cateName'];?></p></a>
				</div>
				<a class="right arrow-icon text-transparent" href="<?php echo $category['cateUrl'];?>">#</a>
			</div>
			<div class="clearfix"></div>
		  </div><!-- /*item 0*/-->
		  <?php 
			}
		  ?>
		</div>
		<?php }?>
	</div>
	
		<!--<a class="left carousel-control" href="#myCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
		<a class="right carousel-control" href="#myCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>-->
		<div class="clearfix"></div>
		<div class="control-slide-book-category relative">
			<ul class="carousel-indicators" >
			<?php 
			foreach ($blockCategories as $key => $categories){?>
				<li data-target="#myCarousel" data-slide-to="<?php echo $key;?>" <?php if($key == 0)echo 'class="active"';?>><?php echo $key+1;?></li>
			<?php }?>
			</ul>
		</div>
	</div><!-- /.carousel -->
	</div><!-- slider-bar-->
	<div class="clearfix"></div>
	<div class=" height-75 nav-view-more widh-1075">
		<a href="#" class="view-more">Xem thêm <span class="text-uppercase">Danh mục giải pháp tủ sách(10)</span></a>
		<a class="right arrow-icon text-transparent" href="#">#</a>
	</div>
</div>
