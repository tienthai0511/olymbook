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
	$html = $debugString = $searchCondition = "";
	$postID = $_POST['post_id'];
	$args = array(
		'posts_per_page' => 100,
		'product_cat' => 'thinking_personal_development',
		'post_type' => 'product',
		'meta_query' => array(
			'relation' => 'AND',
		  	array(
				'key' => '_rating',
				'value' => array( 1, 5 ),
				'type' => 'numeric',
				'compare' => 'BETWEEN'
		  	),
			array(
	  			'relation' => 'OR',
				array(
					'key' => '_price',
					'value' => array( 50000, 400000 ),
					'type' => 'numeric',
					'compare' => 'BETWEEN'
			  	),
			  	array(
					'key' => '_sale_price',
					'value' => array( 50000, 400000 ),
					'type' => 'numeric',
					'compare' => 'BETWEEN'
			  	),
		  	),
		 ),
	);
	
	$loop = new WP_Query( $args );
	$i = 0;
	if (($loop->have_posts())) :
	while ( $loop->have_posts() ) : $loop->the_post(); global $product;
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID ), 'single-post-thumbnail' );
		$debugString .= $product->get_sale_price(). "/n".$product->get_regular_price()."/n".json_encode($product)."/n"."/n"."/n";
		if ($product->get_price() != NULL) 
			$poductPrice = number_format($product->get_price(),0,".",".")." VNĐ";
		else 
			$poductPrice = "";
		$html .= '<div class="span3 slide columns">';
		$html .= '    <span class="onsale"><span class="saletext">Sale!</span></span>';
		$html .= '    <div class="product-thumb">';
		$html .= '        <a title="'.$product->post->post_title.'" href="'.get_permalink( $loop->post->ID ).'"><img alt="" src="'.$image[0].'" style="width:250px; height:250px; ">';
		$html .= '        </a>';
		$html .= '    </div>';
		$html .= '    <div class="clearfix"></div>';
		$html .= '    <div class="title-holder title">';
		$html .= '        <a href="'.get_permalink( $loop->post->ID ).'" style="right: 0px;"></a>';
		$html .= '    </div>';
		$html .= '    <div class="product-meta">';
		$html .= '        <div class="cart-btn2"><a class="button add_to_cart_button product_type_simple" data-quantity="1" data-product_sku="" data-product_id="'.$product->id.'" rel="nofollow" href="/product-category/add-to-card/?add-to-cart='.$product->id.'">Add to cart</a>';
		$html .= '            <span class="price">'.$poductPrice;
		$html .= '            </span>';
		$html .= '        </div>';
		$html .= '    </div>';
		$html .= '</div>';
	$i++;
	endwhile;
	endif;
	
	$response = array( 
		'sucess' => true, 
		'html' => $html,
		'id' => $postID ,
		'debugString' => $debugString,
		'searchCondition' => $searchCondition,
	);
	echo json_encode($response);
	die();
}

add_action("wp_ajax_olymbook_search", "olymbook_search");
add_action("wp_ajax_nopriv_olymbook_search", "olymbook_search");

add_action('shutdown', 'sql_logger');
function sql_logger() {
    global $wpdb;
    $log_file = fopen(get_template_directory().'/sql.log', 'a');
    fwrite($log_file, "//////////////////////////////////////////\n\n" . date("F j, Y, g:i:sa" )."\n");
    foreach($wpdb->queries as $q) {
        fwrite($log_file, $q[0] . " - ($q[1] s)" . "\n\n");
    }
    fclose($log_file);
}