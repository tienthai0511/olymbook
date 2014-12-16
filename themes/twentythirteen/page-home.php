<?php
/**
* Template Name: Home Page
*/
get_header(); ?>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$('#myCarousel').carousel({
				interval: 4000
			})

		$('.carousel .item').each(function(){
			var next = $(this).next();
			if (!next.length) {
				next = $(this).siblings(':first');
			}
			next.children(':first-child').clone().appendTo($(this));

			if (next.next().length>0) {
				next.next().children(':first-child').clone().appendTo($(this));
			}
			else {
				$(this).siblings(':first').children(':first-child').clone().appendTo($(this));
			}
		});
		});
	</script>
<div class="motopress-wrapper content-holder clearfix">
	<div class="container">
		<div class="row">
			<div class="span12" data-motopress-wrapper-file="page-home.php" data-motopress-wrapper-type="content">
				<div class="page_home_top">
					<div class="row">
					
	<div class="head-layout w-1000"><!-- slider-bar-->

	<div class="carousel slide" id="myCarousel">
		<div class="carousel-inner">
		<div class="item">
		  <div class="col-md-4"><a href="#"><img src="https://fbexternal-a.akamaihd.net/safe_image.php?d=AQBe7PFBsbVhScL0&bust=1&w=470&h=246&url=https%3A%2F%2Fscontent-b-sin.xx.fbcdn.net%2Fhphotos-xpf1%2Fv%2Ft1.0-9%2F10492375_10152968361055786_3250237143140613650_n.jpg%3Foh%3Dacecbeb83c5d24a92cae311854a82c2a%26oe%3D550F3DE2&cfs=1&upscale=1&sx=0&sy=121&sw=500&sh=262" class="img-responsive"></a></div>
		</div>
		<div class="item">
		  <div class="col-md-4"><a href="#"><img src="http://l.f29.img.vnecdn.net/2014/12/16/lam-dong-sap-ham-1-ok-9318-141-7233-1339-1418710273_490x294.jpg" class="img-responsive"></a></div>
	</div>
		<div class="item active">
		  <div class="col-md-4"><a href="#"><img src="http://m.f9.img.vnecdn.net/2014/12/16/03-2937-1418698999.jpg" class="img-responsive"></a></div>
	</div>
		<div class="item">
		  <div class="col-md-4"><a href="#"><img src="http://m.f9.img.vnecdn.net/2014/12/16/04-7877-1418699000.jpg" class="img-responsive"></a></div></div>
		<div class="item">
		  <div class="col-md-4"><a href="#"><img src="http://m.f9.img.vnecdn.net/2014/12/16/06-9786-1418699001.jpg" class="img-responsive"></a></div></div>
		<div class="item">
		  <div class="col-md-4"><a href="#"><img src="http://m.f9.img.vnecdn.net/2014/12/16/07-8718-1418699001.jpg" class="img-responsive"></a></div>
		</div>
		</div>
		<a class="left carousel-control" href="#myCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
		<a class="right carousel-control" href="#myCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
	</div><!-- /.carousel -->
		<div class="clearfix"></div>
	</div><!-- slider-bar-->
						<div class="span8" data-motopress-type="static" data-motopress-static-file="static/static-slider.php">
							<?php get_template_part("static/static-slider"); ?>
						</div>
						<div class="span4" data-motopress-type="static" data-motopress-static-file="static/static-home-banner.php">
							<?php get_template_part("static/static-home-banner"); ?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="span12" data-motopress-type="loop" data-motopress-loop-file="loop/loop-page.php">
						<?php get_template_part("loop/loop-page"); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>