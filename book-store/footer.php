<?php 
	/*

	 * This file is used to generate footer section of theme.

	 */	
?>
		<?php 
          $cp_show_footer = get_option(THEME_NAME_S.'_show_footer','enable');
		  $cp_top_footer = get_option(THEME_NAME_S.'_top_footer','enable');
		  $cp_social_footer = get_option(THEME_NAME_S.'_top_footer','enable');
          $cp_show_copyright = get_option(THEME_NAME_S.'_show_copyright','enable');
          $footer_text = do_shortcode( __(get_option(THEME_NAME_S.'_copyright_left_area'), 'cp_front_end') );
         ?>
      </div>
      <div class="row line-top mt30"></div>
		<footer id="colophon" class="site-footer witdh-1085" role="contentinfo">
			<div class="row" style="max-width:1075px;margin:0 auto;">
				<div class="span7 static-position foot-info">
				 <span>Khám phá và xem những thông tin quan trọng từ Olymbook.com</span>
					<div class="footer-menu mt-20">
						<ul>
							<li>Hỗ trợ khách hàng</li>
							<li>Khuyến mãi</li>
							<li>Về Olymbook.com</li>
							<li>Tài khoản của bạn</li>
							<li>Block</li>
							<li>Sitemap</li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="mt-30 social-contain">
					<span>&copy; Olymbook.com All rights reserved.</span>
					<div class="clearfix"></div>
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
				<div class="span4 foot-contact">
					<div style="width:364px">
					 <b class="color-1">Bạn không muốn bỏ lỡ những thông tin hấp dẫn nhất?</b>
						<form class="mt-20">
							<div class="">
								<label class="text-normal color-1" for="email">Đăng ký để nhận NewLetter hàng tuần</label>
								<input type="email" class="text-input-custom" name="email" id="email" placeholder="Email của bạn" width="200"/><br>
								<input class="mt-20 btn-submit-custom" type="submit" value="đăng ký">
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
           
  
 									 <script type="text/javascript">
                                       <?php get_template_part( 'cufon', 'replace' ); ?>
								    </script> 
  <?php wp_footer(); ?>
  
            <script type="text/javascript">
			    <?php get_template_part( '/javascript/bx', 'scripts' ); ?>
            </script>
            
            
</body>
</html>       
           
    