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
		});
	</script>
	<section class="header-banner">
		<?php get_template_part( 'template-parts/header-banner' ); ?>
	</section>
	<section class="page-body-outer">
		<section class="page-body-wrapper container "> 
			<div  style="max-width:1075px;margin:0 auto;">
			<?php get_template_part( 'template-parts/book-store' ); ?>
			</div>
			<div  style="max-width:1075px;margin:0 auto;">
			<?php get_template_part( 'template-parts/book-category' ); ?>
			</div>
			<div  style="max-width:1075px;margin:0 auto;">
			<?php get_template_part( 'template-parts/book-new' ); ?>
			</div>
			<!-- trainning-->
			<div  style="max-width:1075px;margin:0 auto;">
			<?php get_template_part( 'template-parts/trainning' ); ?>
			</div>
			<div  style="max-width:1075px;margin:0 auto;">
			<?php get_template_part( 'template-parts/book-images' ); ?>
			</div>
			<div  style="max-width:1075px;margin:0 auto;">
			<?php get_template_part( 'template-parts/popular-post' ); ?>
			</div>
		</section> <!--page-body-wrapper-end-->
	</section>  

<?php get_footer(); ?>