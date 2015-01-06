<?php 
	$args = array(
		'posts_per_page' => 100,
		'product_cat' => 'bookcase',
		'post_type' => 'product',
	);
	$loop = new WP_Query( $args );
	$i = 0;
?>
<?php if (($loop->have_posts())) :?>
<div class="block-store mt30">
		<div class="block-training-slide row-fluid">
		<?php
			while ( $loop->have_posts() ) : $loop->the_post(); global $product;
		?>
		<!-- item-->
		<div class="item <?php if ($i ==0) echo "active";?>">
			<!-- image-->
			<div class="span8 left-store">
				<img src="<?php echo get_template_directory_uri(); ?>/images/news.png"/>
			</div><!--/*image*/-->
			<!-- content-->
			<div class="span4 right-store">
				<p class="t-tini text-uppercase">2 NGÀY CUỐI TUẦN SẼ LẤP ĐẦY THÀNH CÔNG TOÀN BỘ 07 KHÍA CẠNH CUỘC SỐNG CỦA BẠN</p>
				
				<div class="content-store-text">
					<p class="text-justify">Nổi tiếng với câu chuyện bữa tối 21 xu & nỗ lực vươn lên từ khốn khó - Jack Canfield đã làm bừng tỉnh thế giới về niềm tin vào khoa học thành công. Trở thành Tiến sỹ/ Giảng viên của Đại học Harvard chưa làm dừng bước chân ông. Khám phá & ứng dụng bí mật Luật hấp dẫn trong thực tiễn, ônục thế giới về xuất bản sách với trên 225 tựa Chicken Soup for the Soul - bán được trên 25 triệu ấn bản...</p>

					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
				<div class="view-more-c">
					<a href="#">Xem thêm </a>
				</div>
			</div><!--/*content*/-->
		</div>
		<!-- end item-->
		<?php
			$i++;
			endwhile;
		?>
		</div>
		<div class="clearfix"></div>
	<div class=" height-75 nav-view-more row-fluid relative">
		<a href="#" class="view-more">Xem thêm <span class="text-uppercase">Danh mục giải pháp tủ sách(10)</span></a>
		<a class="right arrow-icon text-transparent" href="#">#</a>
	</div>
</div>
<?php endif;?>
	<script type="text/javascript">
		jQuery(document).ready(function ($) {
			var option = {
				slidesToShow: 1,
				slidesToScroll: 1,
				dots: true,
				speed: 900,
				draggable:false,
			};
			$('.block-training-slide').slick(option);
		});
    </script>
