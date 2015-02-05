<?php 
/**
 * Template Name: Block Book
 */

get_header(); 
 
?>
<section id="content-holder" class="container-fluid product-block">
	<section class="container">
		<div class="row-fluid">
			<div class=" cp-page-float-left">
				<div class="span12 page-item columns" style="padding:20px 0">
					<section class="span12 columns page-heading-wrapper">
						<div class="heading-bar">
							<h2>Tủ sách</h2>
							<div class="product-shorting">
								<p class="woocommerce-result-count">Showing 1->2 of 14 results</p>
								<form class="woocommerce-ordering" method="get">
									<select name="orderby" class="orderby">
										<option value="menu_order" selected="selected">Default sorting</option>
										<option value="popularity">Sort by popularity</option>
										<option value="rating">Sort by average rating</option>
										<option value="date">Sort by newness</option>
										<option value="price">Sort by price: low to high</option>
										<option value="price-desc">Sort by price: high to low</option>
										</select>
									</form>
							</div>
							<span class="h-line"></span>
						</div><!--./heading-bar-->
					</section><!--./span12 columns page-heading-wrapper-->

					<section class="grid-holder features-books-block">
						<?php for($i = 0; $i<6;$i++) :?>
						<div class="span6 slide columns">
							<div class="product-thumb">
								<a href="http://www.olymbook.com/product/business-strategy-marketing/woo-logo-2/" title="Woo Logo"><img src="http://www.olymbook.com/wp-content/uploads/2015/01/shop-3.png" alt=""></a>
							</div><!--./product-thumb-->
							<div class="clearfix"></div>
							<div class="title-block"><a href="http://www.olymbook.com/product/business-strategy-marketing/woo-logo-2/" style="right: 0px;">Woo Logo Woo Logo Woo LogoWoo Logo Woo Logo Woo LogoWoo Logo Woo Logo Woo LogoWoo Logo Woo Logo Woo LogoWoo Logo Woo Logo Woo Logo</a>
							</div><!--./title-block-->
							<div class="product-meta"><div class="cart-btn2"><a href="/product-category/thinking_personal_development/?add-to-cart=157" rel="nofollow" data-product_id="157" data-product_sku="" data-quantity="1" class="button add_to_cart_button product_type_simple"></a>
								<div class="star-rating" title="Rated 4.00 out of 5"><span style="width:80%"><strong class="rating">4.00</strong> out of 5</span></div>
								<span class="price"><label><span class="amount">139,000₫</span></label> <ins><span class="amount">100,000₫</span></ins></span>
							<span class="price"></span></div></div>
						</div>
						<?php endfor;?>
					</section><!--./grid-holder features-books-->
				</div>
			</div>
		</div>
	</section>
</div>
<?php get_footer(); ?>