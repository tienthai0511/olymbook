<?php 
	
	/*	
	*	CrunchPress function.php
	*	---------------------------------------------------------------------
	* 	@version	1.0
	*   @ Package   The Church Theme
	* 	@author		CrunchPress
	* 	@link		http://crunchpress.com
	* 	@copyright	Copyright (c) CrunchPress
	*	---------------------------------------------------------------------
	*	This file contains all important functions and features of the theme.
	*	---------------------------------------------------------------------
	*/
	
	// constants
	define('THEME_NAME_S','cp');                                   // Short name of theme (used for various purpose in CP framework)
	define('THEME_NAME_F','Book Store');                           // Full name of theme (used for various purpose in CP framework)
	define('CP_PATH_URL', get_template_directory_uri());           // logical location for CP framework
	define('CP_PATH_SER', get_template_directory() );                          // Physical location for CP framework
	define( 'CP_FW_URL', CP_PATH_URL . '/framework' );             // Define URL path of framework directory
	define( 'CP_FW', CP_PATH_SER . '/framework' );                 // Define server path of framework directory                   
	define('AJAX_URL', admin_url( 'admin-ajax.php' ));             // Define admin url
	define('FONT_SAMPLE_TEXT', 'Font Family'); 				       // Demo font text of the CrunchPress panel
	
	   add_theme_support( 'woocommerce' );
	   
	$date_format = get_option(THEME_NAME_S.'_default_date_format','F d, Y');                     // Get default date format
	$widget_date_format = get_option(THEME_NAME_S.'_default_widget_date_format','M d, Y');       // Get default date format for widgets
	define('GDL_DATE_FORMAT', $date_format);
	define('GDL_WIDGET_DATE_FORMAT', $widget_date_format);
 
	$cp_is_responsive = 'enable';
	$cp_is_responsive = ($cp_is_responsive == 'enable')? true: false;
	
	$default_post_sidebar = get_option(THEME_NAME_S.'_default_post_sidebar','post-no-sidebar');   // Get default post sidebar
	$default_post_sidebar = str_replace('post-', '', $default_post_sidebar);               
	$default_post_left_sidebar = get_option(THEME_NAME_S.'_default_post_left_sidebar','');        // Get option for left sidebar
	$default_post_right_sidebar = get_option(THEME_NAME_S.'_default_post_right_sidebar','');      // Get option for right sidebar
	
	if( !function_exists('get_root_directory') ){                                                 // Get file path ( to support child theme )
		function get_root_directory( $path ){
			if( file_exists( get_stylesheet_directory() . '/' . $path ) ){
				return get_stylesheet_directory() . '/';
			}else{
				return get_stylesheet_directory() . '/';
			}
		}
	}
	
	// include essential files to enhance framework functionality
	include_once(CP_FW.	'/script-handler.php');							 // It includes all javacript and style in theme
	include_once(CP_FW.	'/extensions/super-object.php'); 				 // Super object function
	include_once(CP_FW.	'/cp-functions.php'); 							 // Registered CP framework functions
	include_once(CP_FW.	'/cp-option.php');								 // CP framework control panel
	include_once(CP_FW.	'/extensions/fontloader.php');					 // Load necessary font
	include_once(CP_FW.	'/extensions/shortcodes/shortcodes.php'); 		 // Register shortcode
	include_once(CP_FW.	'/extensions/cutom_meta_boxes.php'); 			 // Register meta boxes 
	include_once(CP_FW.	'/extensions/breadcrumbs.php');                  // Register breadcrumbs navigation
	include_once(CP_FW.	'/extensions/class-tgm-plugin-activation.php');  // Register Plugins Installer
	include_once(CP_FW.	'/extensions/plugins.php');  					 // Register Plugins Installer
	include_once(CP_FW.	'/extensions/seo_module.php'); 
	
	
	// dashboard option
	include_once(CP_FW. '/options/meta-template.php'); 								// templates for post portfolio and gallery
	include_once(CP_FW. '/options/post-option.php');								// Register meta fields for post_type
	include_once(CP_FW. '/options/page-option.php'); 								// Register meta fields page post_type
	include_once(CP_FW. '/options/portfolio-option.php');							// Register meta fields portfolio post_type
	include_once(CP_FW. '/options/testimonial-option.php');							// Register meta fields testimonial post_type
	include_once(CP_FW. '/options/price-table-option.php'); 						// Register meta fields	price post_type
	include_once(CP_FW. '/extensions/author-bio.php');                              // Author Bio box
	
	
	
	// exterior plugins
	
	include_once(CP_FW. '/extensions/filosofo-image/filosofo-custom-image-sizes.php'); // Custom image size plugin
	include_once(CP_FW. '/extensions/dropdown-menus.php'); 							   // Custom dropdown menu


	if(!is_admin()){
		
		include_once(CP_FW. '/extensions/sliders.php');	                            // Functions to print sliders
		include_once(CP_FW. '/options/page-elements.php');	                        // Organize page item element
		include_once(CP_FW. '/options/product-elements.php');                       // Organize Product elements
		include_once(CP_FW. '/options/portfolio-elements.php');                     // Organize Portfolio elements
		include_once(CP_FW. '/options/blog-elements.php');						    // Organize blog item element
	    include_once(CP_FW. '/extensions/comment.php'); 							// function to get list of comment
		include_once(CP_FW. '/extensions/pagination.php'); 							// Register pagination plugin
		include_once(CP_FW. '/extensions/social-shares.php'); 						// Register social shares 
		include_once( 'woocommerce/config.php' );
	}
	
	// include custom widget
	
		foreach ( glob( CP_FW . '/extensions/widgets/*.php') as $filename ):
		include $filename;
		endforeach;

		
	/*	add_action( 'widgets_init', 'override_woocommerce_widgets', 15 );
		function override_woocommerce_widgets() { 
		  if ( class_exists( 'WC_Widget_Cart' ) ) {
			unregister_widget( 'WC_Widget_Cart' ); 
			 include_once(CP_FW. '/extensions/widget-cart.php'); 
			register_widget( 'WooCommerce_Widget_Cart' );
		  } 
		}
		*/
		include_once(CP_FW. '/extensions/widget-cart.php'); 
		
		$item_fetch =  get_option(THEME_NAME_S.'_products_item_fetch','12'); 
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return '.$item_fetch.';' ), 20 );


function add_css(){
	
	wp_enqueue_style('grid css', get_template_directory_uri() . '/stylesheet/grid.css',false,'','all');
	wp_enqueue_style('slick css', get_template_directory_uri() . '/stylesheet/slick.css',false,'','all');
	wp_enqueue_style('cat css', get_template_directory_uri() . '/stylesheet/cat.css',false,'','all');
	//slide one to one
	//wp_enqueue_style('carousel css', get_template_directory_uri() . '/stylesheet/carousel.css',false,'','all');
	//wp_enqueue_style('site style', get_template_directory_uri() . '/css/style-editor.css',false,'','all');
}
function add_js_customize(){
wp_enqueue_script('jquery');
	wp_enqueue_script( 'slick js slider', get_template_directory_uri().'/javascript/slick.min.js', array( 'jquery' ) );
}
add_action( 'wp_enqueue_scripts', 'add_js_customize' );
if (!is_admin()){
add_action('wp_enqueue_scripts','add_css');
}
//add cart button
add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cartplus_fragment_number_ordered');
function woocommerce_header_add_to_cartplus_fragment_number_ordered( $fragments ) {
    global $woocommerce;
    if($woocommerce->cart->cart_contents_count){
        //$fragments['hw_cart_status']=$woocommerce->cart->cart_contents_count.' '.__('s?n ph?m','hwtheme').' cho '.$woocommerce->cart->get_cart_total();
		$fragments['hw_cart_status'] = $woocommerce->cart->cart_contents_count;
    }
    return $fragments;
}
/**
 * Register ajax file
 */
 
/**
 * Add script ajax 
 */
function my_script_enqueuer() {
	wp_register_script("olymbook_search_script", get_template_directory_uri() . '/js/olymbook.js', array('jquery'));
	wp_localize_script('olymbook_search_script', 'olymbookAjax', array('ajaxurl' => admin_url('admin-ajax.php')));
	wp_enqueue_script('jquery');
	wp_enqueue_script('olymbook_search_script');
}
add_action('init', 'my_script_enqueuer');
/**
 * Vote for post
 */
function olymbook_search() {
	global $wpdb;
	$page['Begin'] = 0;
	$arrayPrice = array('price1','price2','price3','price4','price5');
	$arrayRating = array('rating1','rating2','rating3','rating4');
	$slugsNew = $slugsBestSeller = "default-category-none";
	$priceSql = "AND (";
	$ratingSql = "AND (key3.meta_key =  '_rating' AND (";
	if(count($_POST['data']) > 0)
	foreach ($_POST['data'] as $filterKey){
		if($filterKey == "new=new"){
			$slugsNew = "new";
		}elseif ($filterKey == "best-seller=best-seller"){
			$slugsBestSeller = "best-seller";
		}else{
			$filterKey = explode("=",$filterKey);
			
			if(in_array($filterKey[0], $arrayPrice)){
				$filterValues = explode("-",$filterKey[1]);
				if($filterValues[1] == 0)
					if($priceSql == "AND (")
						$priceSql .= "key2.meta_value >= {$filterValues[0]} OR key1.meta_value >= {$filterValues[0]}\n";
					else 
						$priceSql .= "OR key2.meta_value >= {$filterValues[0]} OR key1.meta_value >= {$filterValues[0]}\n";
				else 
					if($priceSql == "AND (")
						$priceSql .= "(key2.meta_value BETWEEN {$filterValues[0]} AND {$filterValues[1]} AND key2.meta_value <> '') OR (key1.meta_value BETWEEN {$filterValues[0]} AND {$filterValues[1]} AND key1.meta_value <> '')\n";
					else 
						$priceSql .= "OR (key2.meta_value BETWEEN {$filterValues[0]} AND {$filterValues[1]} AND key2.meta_value <> '') OR (key1.meta_value BETWEEN {$filterValues[0]} AND {$filterValues[1]} AND key1.meta_value <> '')\n";
			}elseif(in_array($filterKey[0], $arrayRating)){
				$filterValues = explode("-",$filterKey[1]);
				if($ratingSql == "AND (key3.meta_key =  '_rating' AND (")
					$ratingSql .= "key3.meta_value BETWEEN {$filterValues[0]} AND $filterValues[1]\n";
				else
					$ratingSql .= "OR key3.meta_value BETWEEN {$filterValues[0]} AND $filterValues[1]\n";
				
			}else if($filterKey[0] == 'pageNumber'){
				$page['Begin'] = ($filterKey[1] - 1)*12;
			}
		}
	}
	if($priceSql != "AND (")
		$priceSql .= ")";
	else 
		$priceSql = "";
	if($ratingSql != "AND (key3.meta_key =  '_rating' AND (")
		$ratingSql .= "))";
	else 
		$ratingSql = "";
	if($slugsNew == $slugsBestSeller)
		$needCategories = 1;
	else 
		$needCategories = 0;
	$sql = $wpdb->prepare( 
	"	SELECT      DISTINCT key3.post_id
		FROM        $wpdb->postmeta key3
		INNER JOIN 	$wpdb->term_relationships tr 
					ON (key3.post_id = tr.object_id)
		INNER JOIN 	$wpdb->term_taxonomy tt 
					ON (tr.term_taxonomy_id = tt.term_taxonomy_id AND tt.taxonomy = 'product_cat')
		INNER JOIN	$wpdb->terms t ON tt.term_id = t.term_id
		INNER JOIN  $wpdb->postmeta key1 
		            ON key1.post_id = key3.post_id
		            AND key1.meta_key = '_price' 
		INNER JOIN  $wpdb->postmeta key2
		            ON key2.post_id = key3.post_id
		            AND key2.meta_key = '_sale_price'
		WHERE       (t.slug IN (%s,%s) OR {$needCategories})
					{$ratingSql}
					{$priceSql}
		ORDER BY    key1.meta_value, key2.meta_value
		"
		,$slugsNew,$slugsBestSeller
	);

	$postids = $wpdb->get_col($sql);
	if($postids == array()){
		$response = array( 
			'sucess' => true, 
			'html' => "",
			'id' => $postID ,
			'debugString' => "",
			'searchCondition' => "",
		);
		echo json_encode($response);
		die();
	}
		
	$args = array(
		'posts_per_page' => 100,
		'product_cat' => $_POST['currentCategorySlug'],
		'post_type' => 'product',
		'post__in' => $postids,
	);
	switch ($_POST['orderBy']) :
		case 'date' :
			$args['orderby'] = 'date';
			$args['order'] = 'asc';
			$args['meta_key'] = '';
		break;
		case 'price' :
			$args['orderby'] = 'meta_value_num';
			$args['order'] = 'asc';
			$args['meta_key'] = '_price';
		break;
		case 'price-desc' :
			$args['orderby'] = 'meta_value_num';
			$args['order'] = 'desc';
			$args['meta_key'] = '_price';
		break;
		case 'rating' :
			$args['orderby'] = 'meta_value_num';
			$args['order'] = 'asc';
			$args['meta_key'] = '_rating';
		break;
		case 'popularity' :
			$args['orderby'] = 'comment_count';
			$args['order'] = 'desc';
			$args['meta_key'] = '';
		break;
		case 'menu_order' :
			$args['orderby'] = 'menu_order';
			$args['order'] = 'desc';
			$args['meta_key'] = '';
		break;
	endswitch;
	wp_reset_query();
	$loop = new WP_Query( $args );
	$i = 0;
	if (($loop->have_posts())) :
	while ( $loop->have_posts() ) : $loop->the_post(); global $product;
		if($i >= $page['Begin'] && $i < $page['Begin']+12){
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID ), 'single-post-thumbnail' );
			
			$debugString .= "get_sale_price : ".$product->get_sale_price(). " - get_regular_price: ".$product->get_regular_price()." <----->";
			if($product->is_on_sale()){
				if ($product->get_regular_price() != NULL) 
					$poductPrice = money_format_k($product->get_regular_price());
				else 
					$poductPrice = "";
					
				if ($product->get_sale_price() != NULL) 
					$poductSalePrice = money_format_k($product->get_sale_price());
				else 
					$poductSalePrice = "";
			}else{
				if ($product->get_regular_price() != NULL) 
					$poductSalePrice = money_format_k($product->get_regular_price());
				else 
					$poductSalePrice = "";
			}
			
			$rating = get_post_meta( $loop->post->ID, "_rating", TRUE );
				
			$html .= "<div class=\"span3 slide columns\">";
			$html .= "    <span class=\"onsale\">";
			$html .= "        <span class=\"saletext\">Sale!</span>";
			$html .= "    </span>";
			$html .= "    <div class=\"product-thumb\">";
			$html .= "        <a title=\"{$product->post->post_title}\" href=\"".get_permalink( $loop->post->ID )."\">";
			$html .= "            <img alt=\"\" src=\"{$image[0]}\" style=\"width:250px; height:250px; \">";
			$html .= "            </a>";
			$html .= "        </div>";
			$html .= "        <div class=\"clearfix\"></div>";
			$html .= "        <div class=\"title-holder title\">";
			$html .= "            <a href=\"".get_permalink( $loop->post->ID )."\" style=\"right: 0px;\">{$product->post->post_title}</a>";
			$html .= "        </div>";
			$html .= "        <div class=\"product-meta\">";
			$html .= "            <div class=\"cart-btn2\">";
			$html .= "                <a class=\"button add_to_cart_button product_type_simple\" data-quantity=\"1\" data-product_sku=\"\" data-product_id=\"{$product->id}\" rel=\"nofollow\" href=\"/product-category/thinking_personal_development/?add-to-cart={$product->id}\">Add to cart</a>";
			$html .= "                <div title=\"Rated 4.00 out of 5\" class=\"star-rating\">";
			$html .= "                    <span style=\"width:".( ( $rating / 5 ) * 100 ) ."%\">";
			$html .= "                        <strong class=\"rating\">4.00</strong> out of 5";
			$html .= "                    </span>";
			$html .= "                </div>";
			$html .= "                <span class=\"price\">";
			$html .= "                    <label>";
			$html .= "                        <span class=\"amount\">{$poductPrice}</span>";
			$html .= "                    </label>";
			$html .= "                    <ins>";
			$html .= "                        <span class=\"amount\">{$poductSalePrice}</span>";
			$html .= "                    </ins>";
			$html .= "                </span>";
			$html .= "                <span class=\"price\"></span>";
			$html .= "            </div>";
			$html .= "        </div>";
			$html .= "    </div>";
		}
		$i++;
	endwhile;
	endif;
	$numberPage = ceil($i/12);
	$currenpage = ($page['Begin']/12)+1;
	$htmlPagination = "";
	for($flagPage = 1; $flagPage <= $numberPage; $flagPage++){
		if($flagPage == $currenpage)
			$htmlPagination .= "<span class=\"page-numbers current\">{$flagPage}</span>";
		else 
			$htmlPagination .= "<a href=\"javascript:addSortPage({$flagPage});\" class=\"page-numbers\">{$flagPage}</a>";
	}
	$response = array( 
		'sucess' => true, 
		'html' => $html,
		'id' => $postID ,
		'debugString' => $debugString,
		'searchCondition' => $searchCondition,
		'htmlPagination' => $htmlPagination,
	);
	echo json_encode($response);
	die();
}

add_action("wp_ajax_olymbook_search", "olymbook_search");
add_action("wp_ajax_nopriv_olymbook_search", "olymbook_search");


/*change format price element*/
function price_replace_element($price){
	$price = str_replace('</del>', '</label>', $price);
	$price = str_replace('<del>', '<label>', $price);
	return $price;
}
add_filter( 'woocommerce_get_price_html', 'price_replace_element', 100, 2 );

/*
 * format money to K/M/B/T
 * echo money_format_k(110100) => 110.1K
 * echo money_format_k(1101000) => 1.1M
 * echo money_format_k(1101000000) => 1.1B
 * echo money_format_k(1101000000000) => 1.1T
 */
function money_format_k($money) {
	if ($money < 1000) return $money . 'Đ';
	$f_money = round($money);
	$x_number_format = number_format($f_money);
	$x_array = explode(',', $x_number_format);
	$x_parts = array('K', 'M', 'B', 'T');
	$x_count_parts = count($x_array) - 1;
	$x_display = $x_array[0] . ((int) $x_array[1][0] !== 0 ? '.' . $x_array[1][0] : '');
	$x_display .= $x_parts[$x_count_parts - 1];
	return $x_display;
}

function usortBySortKey($array1, $array2) {
	if($array1['sortkey'] < $array2['sortkey'])
		return -1;
	else 
		return 1;
}

function getFilterCondistion($slug){
	global $wpdb;
	$sql = $wpdb->prepare( 
	"	SELECT      MIN(CAST(key3.meta_value AS UNSIGNED)) as `minPrice`
					, MAX(CAST(key3.meta_value AS UNSIGNED)) as `maxPrice`
					, MAX(CAST(key1.meta_value AS DECIMAL(19,2))) as `maxRating`
					, MIN(CAST(key1.meta_value AS DECIMAL(19,2))) as `minRating`
		FROM        $wpdb->postmeta key3
		INNER JOIN 	$wpdb->term_relationships tr 
					ON (key3.post_id = tr.object_id)
		INNER JOIN 	$wpdb->term_taxonomy tt 
					ON (tr.term_taxonomy_id = tt.term_taxonomy_id AND tt.taxonomy = 'product_cat')
		INNER JOIN	$wpdb->terms t ON tt.term_id = t.term_id
		LEFT JOIN  	$wpdb->postmeta key1 
		            ON key1.post_id = key3.post_id
		            AND key1.meta_key = '_rating' 
		LEFT JOIN  	$wpdb->postmeta key2
		            ON key2.post_id = key3.post_id
		            AND key2.meta_key = '_sale_price'
		WHERE       t.slug = %s
					AND (key3.meta_key =  '_price')
		"
		,$slug->slug
	);
	$filterCondistions = $wpdb->get_results($sql);
	$filterCondistion = array();
	if(isset($filterCondistions[0])){
		$filterCondistion['minPrice'] = $filterCondistions[0]->minPrice;
        $filterCondistion['maxPrice'] = $filterCondistions[0]->maxPrice;
        $filterCondistion['maxRating'] = $filterCondistions[0]->maxRating;
        $filterCondistion['minRating'] = $filterCondistions[0]->minRating;
	}

	$sql = $wpdb->prepare( 
	"	SELECT count(DISTINCT IF(t1.slug = 'new',key3.post_id,NULL)) `new`,count(DISTINCT IF(t1.slug = 'best-seller',key3.post_id,NULL)) `bestSeller` 
		FROM $wpdb->postmeta key3 
		INNER JOIN $wpdb->term_relationships tr ON (key3.post_id = tr.object_id) 
		INNER JOIN $wpdb->term_taxonomy tt ON (tr.term_taxonomy_id = tt.term_taxonomy_id AND tt.taxonomy = 'product_cat') 
		INNER JOIN $wpdb->terms t ON tt.term_id = t.term_id 
		INNER JOIN $wpdb->term_relationships tr1 ON (key3.post_id = tr1.object_id) 
		INNER JOIN $wpdb->term_taxonomy tt1 ON (tr1.term_taxonomy_id = tt1.term_taxonomy_id AND tt1.taxonomy = 'product_cat')
		INNER JOIN $wpdb->terms t1 ON tt1.term_id = t1.term_id AND t1.slug IN ('new','best-seller')
		WHERE t.slug = %s
		"
		,$slug->slug
	);
	$newAndBestSalers = $wpdb->get_results($sql);
	if(isset($newAndBestSalers[0])){
		$filterCondistion['new'] = $newAndBestSalers[0]->new;
		$filterCondistion['bestSeller'] = $newAndBestSalers[0]->bestSeller;
	}
	return $filterCondistion;
}