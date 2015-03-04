<?php 
/*
	 * This file is used to generate WordPress standard archive/category pages.
	  * @author     TânTV
      * @package 	WooCommerce/Templates
      * @version     2.0.0
*/
$filterPrices = $filterRatings = array();
$bestSalerFlag = $newFlag = false;
if (is_product_category()) {
	global $wp_query;
	$cat = $wp_query->get_queried_object();
	$filterCondistions = getFilterCondistion($cat);
	
	if($filterCondistions['new'] > 0)
		$newFlag = true;
		
	if($filterCondistions['bestSeller'] > 0)
		$bestSalerFlag = true;	
		
	if($filterCondistions['maxPrice'] < 50000)
		$prices[0] = 1;
	else if($filterCondistions['maxPrice'] < 100000){
		$prices[0] = 1;
		$prices[1] = 1;
	}else if($filterCondistions['maxPrice'] < 200000){
		$prices[0] = 1;
		$prices[1] = 1;
		$prices[2] = 1;
	}else if($filterCondistions['maxPrice'] < 500000){
		$prices[0] = 1;
		$prices[1] = 1;
		$prices[2] = 1;
		$prices[3] = 1;
	}else{
		$prices[0] = 1;
		$prices[1] = 1;
		$prices[2] = 1;
		$prices[3] = 1;
		$prices[4] = 1;
	}
	if($filterCondistions['minPrice'] > 50000){
		unset($prices[0]);
	}else if($filterCondistions['minPrice'] > 100000){
		unset($prices[0]);
		unset($prices[1]);
	}else if($filterCondistions['minPrice'] > 200000){
		unset($prices[0]);
		unset($prices[1]);
		unset($prices[2]);
	}else if($filterCondistions['minPrice'] > 500000){
		unset($prices[0]);
		unset($prices[1]);
		unset($prices[2]);
		unset($prices[3]);
	}	
	if(isset($prices[0]))
		$filterPrices[] = array("sortkey" => 1,"key" => '0-50000', "value"=> "Nhỏ hơn 50k");
	if(isset($prices[1]))
		$filterPrices[] = array("sortkey" => 2,"key" => '50000-100000', "value" => "50k - 100k");
	if(isset($prices[2]))
		$filterPrices[] = array("sortkey" => 3,"key" => '100000-200000', "value" => "100k - 200k");
	if(isset($prices[3]))
		$filterPrices[] = array("sortkey" => 4,"key" => '200000-500000', "value" => "200k - 500k");
	if(isset($prices[4]))
		$filterPrices[] = array("sortkey" => 5,"key" => '500000-0', "value" => "Lơn hơn 500k");
		
	$starString = '<img src="http://www.olymbook.com/wp-content/themes/book-store/woocommerce/images/star.gif">';
	if($filterCondistions['minRating'] < 2 && $filterCondistions['maxRating'] >= 5){
		$filterRatings[] = array("sortkey" => 2,"key" => '0-2', "value"=> "0 đến {$starString}{$starString}");
		$filterRatings[] = array("sortkey" => 3,"key" => '2-4', "value"=> "{$starString}{$starString} đến {$starString}{$starString}{$starString}{$starString}");
		$filterRatings[] = array("sortkey" => 4,"key" => '5-6', "value"=> "{$starString}{$starString}{$starString}{$starString}{$starString}");
	}elseif($filterCondistions['minRating'] < 2 && $filterCondistions['maxRating'] >= 4){
		$filterRatings[] = array("sortkey" => 2,"key" => '0-2', "value"=> "0 đến {$starString}{$starString}");
		$filterRatings[] = array("sortkey" => 3,"key" => '2-4', "value"=> "{$starString}{$starString} đến {$starString}{$starString}{$starString}{$starString}");
	}elseif ($filterCondistions['minRating'] >= 2 && $filterCondistions['maxRating'] >= 5){
		$filterRatings[] = array("sortkey" => 3,"key" => '2-4', "value"=> "{$starString}{$starString} đến {$starString}{$starString}{$starString}{$starString}");
		$filterRatings[] = array("sortkey" => 4,"key" => '5-6', "value"=> "{$starString}{$starString}{$starString}{$starString}{$starString}");
	}
	usort($filterPrices, "usortBySortKey");
	usort($filterRatings, "usortBySortKey");
}
/*
 * Set search condition if have parameter in URL
 */
$label_search = [
	'price1' => 'Nhỏ hơn 50k',
	'price2' => '50k - 100k',
	'price3' => '100k - 500k',
	'price4' => '500k - 1M',
	'best-seller' => 'best-seller',
	'rating2' => "0 đến {$starString}{$starString}",
	'rating3' => "{$starString}{$starString} đến {$starString}{$starString}{$starString}{$starString}",
	'rating4' => "{$starString}{$starString}{$starString}{$starString}{$starString}"
];
$string_pararm = $_SERVER['QUERY_STRING'];
$url_output = $html_tag = '';
$aray_key = [];
if ($string_pararm != "")
	parse_str($string_pararm, $url_output);
if (($url_output) != '') {
	foreach ($url_output as $key => $value) {
		if (array_key_exists($key, $label_search)) {
			$label_text = $label_search [$key];
			if (strpos($key, 'rating') !== false) {
			
				preg_match_all('!\d+!', $key, $matches);
				$loop_rating = ($matches[0][0] > 0) ? $matches[0][0] : 0;
				if ($loop_rating > 0 && $loop_rating < 6) {
					$html_tag .= '<li class="term-tag" id="del_'. $key .'" data-search="' .$key. '='.$value.'" data-value="'.$value.'" onclick="javascript:removeSeach(\'' .$key .'\', \''. $value.'\')"><i class="term-tag-close"></i><span href="javascript:void(0);">';
					$html_tag .= '<a href="javascript:void(0);">';
					for ($i = 0 ; $i < $loop_rating ; $i++)
						$html_tag .= '<img src="'. CP_PATH_URL .'/woocommerce/images/star.gif">';
					$html_tag .= '</a>';
					$html_tag .= '</span></li>';
				}
			}
			elseif ($key !='orderby') {
				$html_tag .= '<li class="term-tag" id="del_'. $key .'" data-search="' .$key. '='.$value.'" data-value="'.$value.'" onclick="javascript:removeSeach(\'' .$key .'\', \''. $value.'\')"><i class="term-tag-close"></i><span href="javascript:void(0);">' . $label_text . '</span></li>';
			}
			if ($key !='orderby') $aray_key[] = $key;
		}
	}
}
get_header();
?>
<?php
	    global $paged, $sidebar, $left_sidebar, $right_sidebar;
		$left_sidebar = "Shop Left Sidebar";
		$right_sidebar = "Shop Right Sidebar";

		$sidebar = get_option ( THEME_NAME_S . '_products_page_sidebar', 'no-sidebar' );
        $sidebar = str_replace('product-', '', $sidebar) ; 
		    $bcontainer_class = '';
		    $sidebar_class = '';
        if ($sidebar == "left-sidebar" || $sidebar == "right-sidebar") {
            $sidebar_class = "sidebar-included " . $sidebar;
			$container_class = "span9";
        } else if ($sidebar == "both-sidebar") {
            $sidebar_class = "both-sidebar-included";
			 $bcontainer_class ="span9";
			 $container_class = "span8";
        } else {
		    $container_class = "span12";	
		}
	?>
	<script>
		jQuery(document).ready(function($){
			var arrayFromPHP = [<?php echo (count($aray_key)) ? '"' . implode('","',  $aray_key ) . '"' : ''; ?>];
			//console.log(arrayFromPHP);
			$.each(arrayFromPHP, function( index, value ) {
				$('.filter-sort-cd #' + value).addClass('added-filter');
			});
		});
	</script>
		<div class="row-fluid sort-condition main-content-block mt20">
			<ul class="left-menu-sort">
				<li><a href="#">Dòng Sách
				<?php 
				if (is_product_category()) {
			        global $wp_query;
			        $cat = $wp_query->get_queried_object();
			        echo "<input id='currentCategorySlug' type=\"hidden\" id=\"myInput\" value=\"{$cat->slug}\">";
			    }else{
			    	echo "<input id='currentCategorySlug' type=\"hidden\" id=\"myInput\" value=\"\">";
			    }
				?></a></li>
				<li><a href="<?php echo get_term_link("bookcase", 'product_cat' )?>">Tủ Sách</a></li>
			</ul><!--./left-menu-sort-->
			<ul class="right-menu-sort">
				<li><a href="#">Tất cả</a></li>
			</ul><!--./left-menu-sort-->
			<div class="clear"></div>
			<div class="span12 check-sort-content">
				<span class="check-sort-button close-status"></span>
					<div class="sort-content row-fluid">
						<div class="span12">
							<div class="filter-sort">
								<span class="filter-sort-text test" >Điều kiện lọc</span>
							</div><!--./div-->
							<div class="filter-sort-cd mt20 grid-holder features-condition">
								<ul>
									<?php 
									if(count($filterPrices) > 1)
										foreach ($filterPrices as $key => $filterPrice){
											echo "<li class=\"span2 col-filter\" id=\"price{$filterPrice['sortkey']}\" onclick=\"javascript:search('price{$filterPrice['sortkey']}', '{$filterPrice['key']}', 'add')\"><a href=\"javascript:void(0);\">{$filterPrice['value']}</a></li>";
										}
									if($bestSalerFlag){
									?>
									<li class="span2 col-filter" id="best-seller" onclick="javascript:search('best-seller', 'best-seller', 'add')"><a href="javascript:void(0);">Best Seller</a></li>
									<?php 
									}
									if($newFlag){
									?>
									<li class="span2 col-filter" id="new" onclick="javascript:search('new', 'new', 'add')"><a href="javascript:void(0);">New</a></li>
									<?php 
									}
									if(count($filterRatings) > 1)
										foreach ($filterRatings as $key => $filterRating){
											echo "<li class=\"span2 col-filter\" id=\"rating{$filterRating['sortkey']}\" onclick=\"javascript:search('rating{$filterRating['sortkey']}', '{$filterRating['key']}', 'add')\"><a href=\"javascript:void(0);\">{$filterRating['value']}</a></li>";
										}
									?>
								</ul>
							</div>
						</div>
						<div class="clear"></div>
						<div class="line-condition"></div>
						<div class="tag-filter-cd">
							<ul>
								<?php echo $html_tag;?>
							</ul>
							<div class="clear"></div>
						</div><!--./tag-filter-cd-->
					</div>

				<div class="clear"></div>
			</div><!--./check-sort-content-->
			
		</div><!--./row-fluid sort-condition-->
		
  <?php
							
			echo '<section id="content-holder" class="container-fluid product-archive">';
			 echo '<section class="container">';

		       echo '<div class="row-fluid '.$sidebar_class.'">';
		       	   echo "<div class='".$bcontainer_class." cp-page-float-left'>";
		     			echo "<div class='".$container_class. " page-item columns'> ";
                          echo '<section class="span12 columns page-heading-wrapper">';
						   ?>
                            <div class="heading-bar">
        	                         <h2>
          
		                            <?php if ( is_search() ) : printf( __( 'Search Results: &ldquo;%s&rdquo;', 'woocommerce' ), get_search_query() );
                                          if ( get_query_var( 'paged' ) ) printf( __( '&nbsp;&ndash; Page %s', 'woocommerce' ), get_query_var( 'paged' ) );
                                        ?>
                                    <?php elseif ( is_tax() ) : 
                                          echo single_term_title( "", false ); 
                                          else :
                                          $shop_page = get_post( woocommerce_get_page_id( 'shop' ) );
                                          echo apply_filters( 'the_title', ( $shop_page_title = get_option( 'woocommerce_shop_page_title' ) ) ? $shop_page_title : $shop_page->post_title );
                                          endif; 
                                     ?>
                                     </h2>
                                   
                                     <div class="product-shorting">
                                     <?php
									  do_action('woocommerce_before_shop_loop'); 
									  ?>
                                      </div>
                                     <span class="h-line"></span>
                                     </div>
                                     
                                 </section>
                                <?php do_action( 'woocommerce_archive_description' ); ?>
                        
                                <?php if ( is_tax() ) : ?>
                                    <?php do_action( 'woocommerce_taxonomy_archive_description' ); ?>
                                <?php elseif ( ! empty( $shop_page ) && is_object( $shop_page ) ) : ?>
                                    <?php do_action( 'woocommerce_product_archive_description', $shop_page ); ?>
                                <?php endif; ?>

                    		<?php 
						// start fetching database
						global $post, $wp_query;
							
						$port_size ="element1-4" ;
					
							
						$num_fetch = get_option(THEME_NAME_S.'_products_page_item');
						$item_size = get_option(THEME_NAME_S.'_products_page_thumb_size', '250x250');		
						$paged = (get_query_var('page')) ? get_query_var('page') : 1; 
					   	echo ' <section class="grid-holder features-books">';
							
						
						
						if( $sidebar == "product-no-sidebar"){
						/*woocommerce_catalog_ordering();*/
						}
								
							// get the category for filter
							$item_categories = get_the_terms( $post->ID, 'product_cat' );
							$category_slug = " ";
							if( !empty($item_categories) ){
								foreach( $item_categories as $item_category ){
									$category_slug = $category_slug . $item_category->slug . ' ';
								}
							}
							
							$counter_product = 0;
							while( have_posts() ){
							global $post;
							global $product;
							the_post();	
							
							if($counter_product % 4 == 0 ){
								//echo '<div class="span3 slide columns block-cols">';
							 	echo '<div class="span3 slide columns">';
								 $thumbnail_types = "Image";
								 
												if( $thumbnail_types == "Image" ){
													
													$image_type = "Lightbox to Current Thumbnail";
													$image_type = empty($image_type)? "Link to Current Post": $image_type; 
													$thumbnail_id = get_post_thumbnail_id();
													$thumbnail = wp_get_attachment_image_src( $thumbnail_id , $item_size );
													$alt_text = get_post_meta($thumbnail_id , '_wp_attachment_image_alt', true);
													$image_type ="Lightbox to Picture";
													if($image_type == "Lightbox to Picture" ){
														$hover_thumb = "hover-link";
														$permalink = get_permalink();	
														
													}		
												}
												$product_title= get_the_title();
												$title_length = get_option(THEME_NAME_S.'_products_page_title_length');					 
												$short_title = substr($product_title,0,$title_length);
												 woocommerce_show_product_loop_sale_flash();
												echo '<div class="product-thumb">';
												$item_size_arr= explode('x',$item_size); $item_size_new_h=$item_size_arr[1]; $item_size_new_w=$item_size_arr[0];
												if (! empty($thumbnail)) {
															 echo '<a href="' . get_permalink() . '" title="' . get_the_title() . '">';
															 echo '<img style="width:'.$item_size_new_w.'px; height:'.$item_size_new_h.'px; " src="' . $thumbnail[0] .'" alt="'. $alt_text .'"/>';
															 echo '</a>';
															}else {
															 echo '<a href="' . get_permalink() . '" title="' . get_the_title() . '">';
																	$item_size_arr= explode('x',$item_size); $item_size_new_h=$item_size_arr[1]; $item_size_new_w=$item_size_arr[0];
																	  echo '<img style="width:'.$item_size_new_w.'px; height:'.$item_size_new_h.'px; " width="'. $item_size_new_w .'px"  height="'. $item_size_new_h .'px" " src="' .CP_PATH_URL.'/images/no-image.jpg" alt="no image"/>';
															 echo '</a>'; 
												 }
												echo '</div>';
												echo '<div class="clearfix"></div>';
												echo '<div class="title"><a href="' . get_permalink() . '">' . $short_title. '</a></div>';
												echo '<div class="product-meta">';
												echo '<div class="cart-btn2">';
												do_action( 'woocommerce_after_shop_loop_item' );
												echo '<span class="price">'.do_action( 'woocommerce_after_shop_loop_item_title' ).'</span>';
												
												echo '</div>';
												echo '</div>';
												
								echo '</div>';
					
							}else{
								
								//echo '<div class="span3 slide columns block-cols">';
								echo '<div class="span3 slide columns">';
							      woocommerce_show_product_loop_sale_flash();
								 $thumbnail_types = "Image";
												if( $thumbnail_types == "Image" ){
													
													$image_type = "Lightbox to Current Thumbnail";
													$image_type = empty($image_type)? "Link to Current Post": $image_type; 
													$thumbnail_id = get_post_thumbnail_id();
													$thumbnail = wp_get_attachment_image_src( $thumbnail_id , $item_size );
													$alt_text = get_post_meta($thumbnail_id , '_wp_attachment_image_alt', true);
													$image_type ="Lightbox to Picture";
													if($image_type == "Lightbox to Picture" ){
														$hover_thumb = "hover-link";
														$permalink = get_permalink();	
														
													}		
												}
												$product_title= get_the_title();
												$title_length = get_option(THEME_NAME_S.'_products_page_title_length');					 
												$short_title = substr($product_title,0,$title_length);
												echo '<div class="product-thumb">';
												$item_size_arr= explode('x',$item_size); $item_size_new_h=$item_size_arr[1]; $item_size_new_w=$item_size_arr[0];
												if (! empty($thumbnail)) {
															 echo '<a href="' . get_permalink() . '" title="' . get_the_title() . '">';
															 echo '<img style="width:'.$item_size_new_w.'px; height:'.$item_size_new_h.'px; " src="' . $thumbnail[0] .'" alt="'. $alt_text .'"/>';
															 echo '</a>';
															}else {
															 echo '<a href="' . get_permalink() . '" title="' . get_the_title() . '">';
																	  echo '<img style="width:'.$item_size_new_w.'px; height:'.$item_size_new_h.'px; " width="'. $item_size_new_w .'px"  height="'. $item_size_new_h .'px" " src="' .CP_PATH_URL.'/images/no-image.jpg" alt="no image"/>';
															 echo '</a>'; 
												 }
												echo '</div>';
												echo '<div class="clearfix"></div>';
												echo '<div class="title-holder title"><a href="' . get_permalink() . '">' . $short_title. '</a></div>';
												echo '<div class="product-meta">';
												echo '<div class="cart-btn2">';
												do_action( 'woocommerce_after_shop_loop_item' );
												echo '<span class="price">'.do_action( 'woocommerce_after_shop_loop_item_title' ).'</span>';
												echo '</div>';
												echo '</div>';
												
								echo '</div>';
							 
							 }
							 if($counter_product % 4 == 0 ){'<div class="clear"></div>';}
							$counter_product++;
					    	}
						    echo '</section>';
							echo '<div class="clear"></div>';
						    $product_nav = get_option(THEME_NAME_S.'_products_navi','Yes');
						    if ('Yes' == $product_nav ){
							   	   
									pagination();
							}
							?>
						    <?php /*do_action('woocommerce_after_shop_loop');*/ ?>
						    
							
							<?php	
							echo "</div>"; // end of cp-page-item
		            	    get_sidebar ( 'left' );
							echo "</div>"; // cp-page-float-left
		                	get_sidebar ( 'right' );
		 	
			?>
        
    
   			 </div>
             
       </section>
       </section>
	   <!-- Div Overlay-->

<!--content-separator-->
<?php get_footer(); ?>
