
		<div  style="max-width:1075px;margin:0 auto;">
		<div class="row-fluid ">
			<div class="under-line-head">
				<div class="line-title-head">
					<div class="span4 title-intro text-uppercase">Kiến thức là một tài sản mới</div>
					<div class="span8 feature">
						<ul>
							<li class="text-uppercase book-icon-servise">
								<p>Chuyên đóng sách</p>
								<p>kinh doanh& </p>
								<p>Phát triển bản than</p>
							</li>
							<li class="text-uppercase book-icon-dis">
								<p>Giao hàng miễn phí</p>
								<p>toàn quốc với</p>
								<p>đơn hàng trên 200k</p>
							</li>
							<li class="text-uppercase book-icon-tel">
								<p>Hot line 24/7</p>
								<p class="hight-light">1900 545 056</p>
								<p>chỉ với <sub>1000</sub>Đ/Phút</p>
							</li>
						</ul>
						
					</div>
				</div>
			<div style="clear:both"></div>
			</div>
		<div style="clear:both"></div>
		<div class="witdh-1075" class="span12" style="background:#404042">
		<div style="margin:0 auto">
			<?php 
			$styleOptinForm= get_option('styleOptinForm');
			$description= get_option('description');
			$shortDescription= get_option('shortDescription');
			if($styleOptinForm == 1){
			?>
				<img src="<?php echo get_template_directory_uri(); ?>/images/banner1.png">
			<?php 
			}elseif($styleOptinForm == 2){
			?>
				<img src="<?php echo get_template_directory_uri(); ?>/images/banner2.png">
			<?php 
			}elseif($styleOptinForm == 3){
			?>
				<img src="<?php echo get_template_directory_uri(); ?>/images/banner3.png">
			<?php 
			}elseif($styleOptinForm == 4){
			?>
				<img src="<?php echo get_template_directory_uri(); ?>/images/banner4.png">
			<?php 
			}elseif($styleOptinForm == 5){
			?>
				<img src="<?php echo get_template_directory_uri(); ?>/images/banner5.png">
			<?php 
			}
			?>
				<?php echo $description."<br/>".$shortDescription;?>
				<form method="POST" class="infusion-form" action="http://email.olymbook.com/form.php?form=1" accept-charset="UTF-8" id="UserOptinForm">
				<table width="280" cellspacing="0" cellpadding="5" border="0" align="center" background-color="#ffff00">
					<tbody>
						<tr>
							<td width="99"><label for="CustomFields_2_1">First Name*</label></td>
							<td width="181"><input type="text" name="CustomFields[2]" id="CustomFields_2_1" class="infusion-field-input-container"></td>
						</tr>
						<tr>
							<td><label for="inf_field_FirstName">Your Email*</label></td>
							<td>
								<input type="text" name="email" id="email" class="infusion-field-input-container">
								<input type="hidden" name="format" value="h">
							</td>
						</tr>
						<tr>
							<td style="text-align: center" colspan="2">
								<input type="image" border="0" value="Start Now!" src="images/popup/start.jpg" name="submit">
							</td>
						</tr>
					</tbody>
				</table>
				<p style="text-align: center;">
				<em style="font-size: 12px">We respect your email privacy. </em>
					</p>
				</form>
			</div>
		</div>
		</div>
	</div>
	<div class="clearfix"></div>
	