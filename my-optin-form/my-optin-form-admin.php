<?php
/*
Description: This page is in wp admin control pannel to config parameter using to integration with zopim system 
Author: Trung.Ngo 
*/
if($_POST['ispost_hidden'] == 'Y') {  
	//Form data sent  
	$styleOptinForm = $_POST['styleOptinForm'];  
	update_option('styleOptinForm', $styleOptinForm);   

	$description = $_POST['description'];
	update_option('description', $description);

	$shortDescription = $_POST['shortDescription'];
	update_option('shortDescription', $shortDescription);
?>
<div class="updated"><p><strong><?php _e('Options saved.' ); ?></strong></p></div>  
<?php
}
else {
	//Normal page display 
	$styleOptinForm= get_option('styleOptinForm'); 
	$description= get_option('description');
	$shortDescription= get_option('shortDescription');
}
?>
<script src="<?php echo get_template_directory_uri();?>/javascript/ckediter/jquery-1.11.2.min.js"></script>
<script src="<?php echo get_template_directory_uri();?>/javascript/ckediter/ckeditor.js"></script>
<script src="<?php echo get_template_directory_uri();?>/javascript/ckediter/adapters/jquery.js"></script>*/
<script>
jQuery( document ).ready( function() {
	$( 'textarea#description' ).ckeditor();
	$( 'textarea#shortDescription' ).ckeditor();
	$( "#styleoptinForm" ).change(function() {
		var style = $( "#styleoptinForm" ).val();
		$( "#style1" ).hide();
		$( "#style2" ).hide();
		$( "#style3" ).hide();
		$( "#style4" ).hide();
		$( "#style5" ).hide();
		$( "#style"+style ).show();
	});
} );
</script>
<style>
#style1,#style2,#style3,#style4,#style5{
	display:none;
}
</style>
<div class="wrap">  
    <?php    echo "<h2>" . __( 'My Opt-in Form Option', 'myoptinform_trdom' ) . "</h2>"; ?>  
    <form name="my_product" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">   
    	<input name="ispost_hidden" type="hidden" value="Y"/>
        <?php    echo "<h4>" . __( 'My Opt-in Form Option', 'myoptinform_trdom' ) . "</h4>"; ?> 
        <table>
        	<tr>
        		<td><?php _e("Zopim API Token: " ); ?></td>
        		<td>
        		<select id="styleoptinForm" name="styleOptinForm"">
        			<option <?php if($styleOptinForm == 1) echo "selected"; ?> value="1">Style 1</option>
        			<option <?php if($styleOptinForm == 2) echo "selected"; ?> value="2">Style 2</option>
        			<option <?php if($styleOptinForm == 3) echo "selected"; ?> value="3">Style 3</option>
        			<option <?php if($styleOptinForm == 4) echo "selected"; ?> value="4">Style 4</option>
        			<option <?php if($styleOptinForm == 5) echo "selected"; ?> value="5">Style 5</option>
        		</select>
        		</td>
        		<td>
	        		<div class="span12" style="background:#404042;">
						<div id="style1" style="margin:0 auto;<?php if($styleOptinForm == 1) echo "display: block";?>">
							<!--Style 1-->
							<?php include( plugin_dir_path( __FILE__ ) . 'includes/preview-form-1.php'); ?>
						</div>
						<div id="style2" style="margin:0 auto;<?php if($styleOptinForm == 2) echo "display: block";?>">
							<?php include( plugin_dir_path( __FILE__ ) . 'includes/preview-form-2.php'); ?>
						</div>
						<div id="style3" style="margin:0 auto;<?php if($styleOptinForm == 3) echo "display: block";?>">
							<?php include( plugin_dir_path( __FILE__ ) . 'includes/preview-form-3.php'); ?>
						</div>
						<div id="style4" style="margin:0 auto;<?php if($styleOptinForm == 4) echo "display: block";?>">
							<?php include( plugin_dir_path( __FILE__ ) . 'includes/preview-form-4.php'); ?>
						</div>
						<div id="style5" style="margin:0 auto;<?php if($styleOptinForm == 5) echo "display: block";?>">
							<?php include( plugin_dir_path( __FILE__ ) . 'includes/preview-form-5.php'); ?>
						</div>
					</div>
				</td>
        	</tr>
        	<tr>
        		<td><?php _e("Description: " ); ?></td>
        		<td colspan="2">
        		<textarea cols="80" id="description" name="description" rows="10">
        			<?php echo $description; ?>
        		</textarea>
        		</td>
        	</tr>
        	<tr>
        		<td><?php _e("Short description: " ); ?></td>
        		<td colspan="2" >
        		<textarea cols="80" id="shortDescription" name="shortDescription" rows="10">
        			<?php echo $shortDescription; ?>
        		</textarea>
        		</td>
        	</tr>
        	<tr>
        		<td colspan="3" align="center">
        			<input type="submit" name="Submit" value="<?php _e('Update Options', 'zopimapi_trdom' ) ?>" />  
        		</td>
        	</tr>
        </table>
    </form>  
</div>  