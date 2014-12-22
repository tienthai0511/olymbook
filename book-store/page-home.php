<?php
/**
* Template Name: Home Page
*/
get_header(); ?>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$('#myCarousel').carousel({
				interval: 2000
			})
			$('#myCarousel1').carousel({
				interval: 2000
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
	 <section class="page-body-outer mt30">
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
                  </section> <!--page-body-wrapper-end-->
                </section>  

<?php get_footer(); ?>