<?php
/**
* Template Name: Home Page
*/
get_header(); ?>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$('#myCarousel').carousel({
				interval: 100000
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
	<div class="container pd-6">
		<div class="row">
			<div  style="max-width:1071px;">
			<?php get_template_part( 'template-parts/book-store' ); ?>
			</div>
			<div  style="max-width:1071px;">
			<?php get_template_part( 'template-parts/book-category' ); ?>
			</div>
			<div  style="max-width:1071px;">
			<?php get_template_part( 'template-parts/book-new' ); ?>
			</div>
		</div>
		<div class="row">
			<div class="span12" data-motopress-wrapper-file="page-home.php" data-motopress-wrapper-type="content">
				<div class="page_home_top">
					<div class="row">
					
	
					
					</div>
				</div>

			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>