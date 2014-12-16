<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>

		</div><!-- #main -->
		<div class="row line-top"></div>
		<footer id="colophon" class="site-footer witdh-1085" role="contentinfo">
			<div class="row">
				<div class="col-md-7 static-position">
				 <span>Khám phá và xem những thông tin từ Olymbook.com</span>
					<div class="footer-menu">
						<ul>
							<li>Khám phá và xem</li>
							<li>Khám phá và xem</li>
							<li>Khám phá và xem</li>
							<li>Khám phá và xem</li>
							<li>Khám phá và xem</li>
							<li>Khám phá</li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<span>All re</span>
					<div class="social">
						<ul id="footer-social" class="clr">
				<li><a href="#" target="_blank" class="facebook-icon">a</a></li>
				<li><a href="#" target="_blank" class="twiter-icon">a</a></li>
				<li><a href="#" target="_blank" class="pint-icon">a</a></li>
				<li><a href="#" target="_blank" class="youtube-icon">a</a></li>
				<li><a href="#" target="_blank" class="mail-icon">a</a></li>
				
			</ul>
					</div>
				</div>
				<div class="col-md-5">
				 <span><strong>Bạn không muốn bỏ lỡ những thông tin hấp dẫn nhất</strong></span>
					<form>
						<div class="">
							<label class="text-normal for="email">Đăng ký để nhận ngay</label></br>
							<input type="email" class="text-input-custom" name="email" id="email" width="200"/><br>
							<input type="submit" value="ĐĂNG KÝ">
						</div>
					</form>
			   </div>
			
      </div>
			<?php get_sidebar( 'main' ); ?>

			<!--<div class="site-info">
				<?php do_action( 'twentythirteen_credits' ); ?>
				<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'twentythirteen' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'twentythirteen' ); ?>"><?php printf( __( 'Proudly powered by %s', 'twentythirteen' ), 'WordPress' ); ?></a>
			</div><!-- .site-info -->
			
		</footer><!-- #colophon -->
	</div><!-- #page -->

	<?php wp_footer(); ?>
</body>
</html>