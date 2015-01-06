<?php
/**
* Template Name: Home Page
*/
get_header(); ?>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$('#bookstore').carousel({
				interval: 200000
			});
			$('#trainning').carousel({
				interval: 200000
			});
			//$('#myCarousel').carousel('cycle');

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
		//hide next-prev button
			$('.block-store')
			  .mouseover(function() {
				$( this ).find("button.slick-next").show();
				$( this ).find("button.slick-prev").show();
			  })
			  .mouseout(function() {
				$( this ).find( "button.slick-next" ).hide();
				$( this ).find( "button.slick-prev" ).hide();
			  });
		});

	</script>
	<section class="header-banner">
		<?php get_template_part( 'template-parts/header-banner' ); ?>
	</section>
	<section class="page-body-outer">
		<section class="page-body-wrapper container "> 
			<div class="main-content-block">
			<?php get_template_part( 'template-parts/book-store' ); ?>
			</div>
			<div class="main-content-block">
			<?php get_template_part( 'template-parts/book-category' ); ?>
			</div>
			<div class="main-content-block">
			<?php get_template_part( 'template-parts/book-new' ); ?>
			</div>
			<!-- trainning-->
			<div class="main-content-block">
			<?php get_template_part( 'template-parts/trainning' ); ?>
			</div>
			<div class="main-content-block">
			<?php get_template_part( 'template-parts/book-images' ); ?>
			</div>
			<div class="main-content-block">
			<?php get_template_part( 'template-parts/popular-post' ); ?>
			</div>
		</section> <!--page-body-wrapper-end-->
	</section>  

<?php get_footer(); ?>