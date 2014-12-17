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
				<div class="col-md-7 static-position foot-info">
				 <span>Khám phá và xem những thông tin từ Olymbook.com</span>
					<div class="footer-menu mt-20">
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
					<div class="mt-20 social-contain">
					<span>&copy; Olymbook.com All rights reserved.</span>
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
				</div>
				<div class="col-md-5 foot-contact">
					<div style="width:364px">
					 <p>Bạn không muốn bỏ lỡ những thông tin hấp dẫn nhất?</p>
						<form class="mt-20">
							<div class="">
								<label class="text-normal for="email">Đăng ký để nhận Newletter hàng tuần</label></br>
								<input type="email" class="text-input-custom" name="email" id="email" width="200"/><br>
								<input class="mt-20" type="submit" value="ĐĂNG KÝ">
							</div>
						</form>
					</div>
			   </div>
			
      </div>
	
			<?php// get_sidebar( 'main' ); ?>

			<!--<div class="site-info">
				<?php //do_action( 'twentythirteen_credits' ); ?>
				<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'twentythirteen' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'twentythirteen' ); ?>"><?php printf( __( 'Proudly powered by %s', 'twentythirteen' ), 'WordPress' ); ?></a>
			</div><!-- .site-info -->
			
		</footer><!-- #colophon -->
	</div><!-- #page -->

	<?php wp_footer(); ?>
</body>
</html>