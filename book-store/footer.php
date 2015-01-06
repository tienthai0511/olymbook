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
	  <div class="clearfix"></div>
		<footer id="colophon" class="site-footer witdh-1085" role="contentinfo">
			<div class="row-fluid main-content-block">
				<div class="span7 static-position foot-info">
				 <span>Khám phá và xem những thông tin quan trọng từ Olymbook.com</span>
					<div class="footer-menu mt-20">
						 <?php wp_nav_menu( array( 'theme_location' => 'footer_menu' ) );  ?>
						<div class="clearfix"></div>
					</div>
					<div class="mt-15 social-contain">
					<span>
					<?php
						if ($footer_text != '' ) {
							echo sprintf(__('%s','crunchpress'), $footer_text);
							}else {
							echo __('<p>&copy; <a href="http://olymbook.com/">Olymbook.com. </a>','crunchpress'). __('All rights reserved.','crunchpress');
							}
					?>
					</span>
					<div class="clearfix"></div>
					<div class="social">
						<ul id="footer-social" class="clr">
							<li><a href="#" target="_blank" class="facebook-icon">facebook</a></li>
							<li><a href="#" target="_blank" class="twiter-icon">twiter</a></li>
							<li><a href="#" target="_blank" class="pint-icon">pint</a></li>
							<li><a href="#" target="_blank" class="youtube-icon">youtube</a></li>
							<li><a href="#" target="_blank" class="mail-icon">mail</a></li>
							
						</ul>
					</div>
					</div>
				</div>
				<div class="span5 foot-contact">
					<div>
					 <b class="color-1">Bạn không muốn bỏ lỡ những thông tin hấp dẫn nhất?</b>
						<form class="mt-15">
							<div class="">
								<label class="text-normal color-1" for="email">Đăng ký ngay để nhận NewLetter hàng tuần</label>
								<input type="email" class="text-input-custom" name="email" id="email" placeholder="Email của bạn" width="200"/><br>
								<input class="mt-15 btn-submit-custom" type="submit" value="đăng ký">
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
		<div class="clearfix"></div>
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
           
    