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
	  <div class="site">
		<!--<header id="masthead" class="site-header" role="banner" <?php //if ( get_header_image() != '' ) { echo 'style="background-image: url(' . esc_url( get_header_image() ) . ')";'; } ?>> -->
		<!-- header-->
		<header id="masthead" class="site-header">
			 <!-- Static navbar -->
      <nav class="navbar navbar-default witdh-1085">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
			<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" height="" width=""/>
				</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav navbar-nav' ) ); ?>
			<ul class="nav navbar-nav navbar-right inline-block-li">
				<li><?php get_search_form(); ?></li>
				<li class="login-btn"><a href="#"></a></li>
				<li class="cart-btn"><a href="#"></a></li>
			</ul>
		</div><!--/.nav-collapse -->
		</div><!--/.container-fluid -->
	</nav>
		<div class="row line-top"></div>
			<div class="clearfix"></div>
		<div class="row">
			<div class="under-line-head">
				<div class="row witdh-1085 line-title-head">
					<div class="col-md-3 title-intro"><p>Kiến thức là một tài sản mới</p></div>
					<div class="col-md-9 feature">
						<ul>
							<li class="text-uppercase book-icon-servise">
								<span>Chuyên dóng sách</span>
								<span>Chuyên dóng sách</span>
								<span>Chuyên dóng sách</span>
							</li>
							<li class="text-uppercase book-icon-dis">
								<span>Chuyên dóng sách</span>
								<span>Chuyên dóng sách</span>
								<span>Chuyên dóng sách</span>
							</li>
							<li class="text-uppercase book-icon-tel">
								<span>Chuyên dóng sách</span>
								<span>Chuyên dóng sách</span>
								<span>Chuyên dóng sách</span>
							</li>
						<ul>
						
					</div>
				</div>
			<div style="clear:both"></div>
			</div>
		</div>
		</header><!-- #masthead -->
		<!-- end header-->
<div style="clear:both"></div>
		<div id="main" class="site-main">
