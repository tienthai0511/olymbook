<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>

	<![endif]-->
	<link href="<?php echo get_template_directory_uri(); ?>/css/carousel.css" rel="stylesheet">
	<link href="<?php echo get_template_directory_uri(); ?>/css/grid.css" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="hfeed site">
		<!--<header id="masthead" class="site-header" role="banner" <?php //if ( get_header_image() != '' ) { echo 'style="background-image: url(' . esc_url( get_header_image() ) . ')";'; } ?>> -->
		<header id="masthead" class="site-header"  >
			<div class="header_top">
				<!-- logo-->
				<a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" height="" width=""/>
				</a>
				<!-- menu primary-->
				<nav id="site-navigation" class="navigation main-navigation" role="navigation">
					<button class="menu-toggle"><?php _e( 'Menu', 'twentythirteen' ); ?></button>
					<a class="screen-reader-text skip-link" href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentythirteen' ); ?>"><?php _e( 'Skip to content', 'twentythirteen' ); ?></a>
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
				</nav><!-- #site-navigation -->
				<!-- right menu-->
				<div class="left-navigation">
					
					<?php get_search_form(); ?>
					
					<a class="btn-nav mr-15 login-btn" href="#" title="View your shopping cart">#</a>
					<a class="btn-nav cart-button" href="#" title="View your shopping cart">#</a>
					<!--<div class="cart-button"><a  href="#">Login</a>-->
					</div>
					
				</div>
			</div>
			<div class="line-top"></div>
			<!-- coltop-->
			<div class="under-line-head">
				<div class="row witdh-1085 line-title-head">
					<div class="col-md-6 pl-0"><p>Kiến thức là một tài sản mới</p></div>
					<div class="col-md-6 feature">
						<div class="row">
							<div class="col-md-4 book-icon-servise">
							<span>Chuyên đóng sách</span>
							<span>Chuyên đóng sách</span>
							<span>Chuyên đóng sách</span>
							</div>
							<div class="col-md-4 book-icon-dis">
							<span>Chuyên đóng sách</span>
							<span>Chuyên đóng sách</span>
							<span>Chuyên đóng sách</span>
							</div>
							<div class="col-md-4 book-icon-tel">
							<span>Chuyên đóng sách</span>
							<span>Chuyên đóng sách</span>
							<span>Chuyên đóng sách</span>
							</div>
						</div>
						
					</div>
				</div>
			<div style="clear:both"></div>
			</div>
  </div>
			<div style="clear:both"></div>
		</header><!-- #masthead -->
<div style="clear:both"></div>
		<div id="main" class="site-main">
