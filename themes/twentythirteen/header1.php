<div class="row header_top">
				<!-- logo-->
				<div class="col-md-3">
				<a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" height="" width=""/>
				</a>
				</div>
				<!-- menu primary-->
				<div class="col-md-6">
					<nav id="site-navigation" class="navigation main-navigation" role="navigation">
						<button class="menu-toggle"><?php _e( 'Menu', 'twentythirteen' ); ?></button>
						<a class="screen-reader-text skip-link" href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentythirteen' ); ?>"><?php _e( 'Skip to content', 'twentythirteen' ); ?></a>
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
					</nav><!-- #site-navigation -->
				</div>
				<!-- right menu-->
				<div class="col-md-3 left-navigation">
					
					<?php get_search_form(); ?>
					
					<a class="btn-nav mr-15 login-btn" href="#" title="View your shopping cart">#</a>
					<a class="btn-nav cart-button" href="#" title="View your shopping cart">#</a>
					<!--<div class="cart-button"><a  href="#">Login</a>-->
					</div>
					
				</div>
			</div>
			<div class="row line-top"></div>
			<!-- coltop-->
			<div class="under-line-head">
				<div class="row witdh-1085 line-title-head">
					<div class="col-md-6 pl-0"><p>Ki?n th?c là m?t tài s?n m?i</p></div>
					<div class="col-md-6 feature">
						<div class="row">
							<div class="col-md-4 book-icon-servise">
							<span>Chuyên dóng sách</span>
							<span>Chuyên dóng sách</span>
							<span>Chuyên dóng sách</span>
							</div>
							<div class="col-md-4 book-icon-dis">
							<span>Chuyên dóng sách</span>
							<span>Chuyên dóng sách</span>
							<span>Chuyên dóng sách</span>
							</div>
							<div class="col-md-4 book-icon-tel">
							<span>Chuyên dóng sách</span>
							<span>Chuyên dóng sách</span>
							<span>Chuyên dóng sách</span>
							</div>
						</div>
						
					</div>
				</div>
			<div style="clear:both"></div>
			</div>