<?php
/* 
Plugin Name: my-optin-form 
Plugin URI: olymbook.com
Description: Plugin using edit opt-in form
Author: TânTV
Version: 1.0 
Author URI: https://www.facebook.com/lonelyghost.the
*/  
ob_start();
// ---------- admin configuration page ----------
add_action( 'admin_menu', 'my_plugin_menu' );
$styleOptinForm = get_option('styleOptinForm');
$description= get_option('description');
$shortDescription= get_option('shortDescription');

function my_plugin_menu() {
	add_menu_page( 'My Opt-in Form Options', 'My Opt-in Form', 'manage_options', 'my-opt-in-form', 'my_optin_form_options',plugins_url('my-optin-form/images/icon.png'));
}

function my_optin_form_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	require_once 'my-optin-form-admin.php';
}
/*
 * GET form Optin
 */
function optinforms_create_my_form() {
	global $styleOptinForm,$description, $shortDescription;
	$urlImg = get_template_directory_uri();
	if ($styleOptinForm == 1) {
		return "" . '
				<img class="img-optin-bg" src="' . $urlImg . '/images/banner' . $styleOptinForm . '.png">
				<form method="POST" class="infusion-form" action="http://email.olymbook.com/form.php?form=1" accept-charset="UTF-8" id="UserOptinForm">
					<div id="optinforms-form1">
					<div class="description-opt">'.$description.'</div>
					<div class="short-desciprtion-opt">'.$shortDescription.'</div>
					<div id="optinforms-form1-name-field-container">
						<input type="text" id="optinforms-form1-name-field" name="FNAME" placeholder="Enter Your Name" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#666666"></div>
					<!--optinforms-form1-name-field-container-->
					<div id="optinforms-form1-email-field-container">
						<input type="text" id="optinforms-form1-email-field" name="EMAIL" placeholder="Enter Your Email Address" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#666666"></div>
					<!--optinforms-form1-email-field-container-->
					<div id="optinforms-form1-button-container">
						<input type="submit" name="submit" id="optinforms-form1-button" value="SIGN UP" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#FFFFFF; background-color:#20A64C">
					</div>
					<!--optinforms-form1-button-container-->
					<div class="clear"></div>
						
					</div>
			</form>';
	}
	elseif ($styleOptinForm == 2) {
		return "" . '
			<img class="img-optin-bg" src="' . $urlImg . '/images/banner' . $styleOptinForm . '.png">
			<form method="POST" class="infusion-form" action="http://email.olymbook.com/form.php?form=1" accept-charset="UTF-8" id="UserOptinForm">
				<div id="optinforms-form2-container">
				<div id="optinforms-form2" style="background: #266d7c;background: #266d7c;padding-top: 31px;padding: 31px 0 0 11px;">
					<div id="optinforms-form2-email-field-container" style="margin-right:4px;">
						<input type="text" id="optinforms-form2-email-field" placeholder="Nhập tên" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#000000;margin-right:4px">
					</div><!--optinforms-form2-email-field-container-->
					<div id="optinforms-form2-email-field-container">
						<input type="text" id="optinforms-form2-email-field" placeholder="Nhập Email" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#000000;">
					</div><!--optinforms-form2-email-field-container-->
					<div id="optinforms-form2-button-container">
						<input type="button" id="optinforms-form2-button" value="Sign Up" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#FFFFFF; background-color:#49A3FE">
					</div><!--optinforms-form2-button-container-->
					<div style="clear:both"></div>
					<div id="" style="color: #fff;font-size: 19px;padding: 10px;">
						'.$shortDescription.'
					</div><!--optinforms-form2-title-container-->
					<div class="clear"></div>
				</div><!--optinforms-form2-->
					</form>
						';
	} else if ($styleOptinForm == 3){
		return ''.'
				<img class="img-optin-bg" src="' . $urlImg . '/images/banner' . $styleOptinForm . '.png">
				<form method="POST" class="infusion-form" action="http://email.olymbook.com/form.php?form=1" accept-charset="UTF-8" id="UserOptinForm">
				<div id="optinforms-form3-container">
                            <div id="optinforms-form3">
                                <div id="optinforms-form3-inside" style="background: #FFFFFF;">
                                    <div id="optinforms-form3-container-left">
                                        <div id="optinforms-form3-title" style="font-family:Droid Serif; font-size:26px; line-height:28px; color:#505050; ">'.$shortDescription.'</div><!--optinforms-form3-title-->
                                        <div id="optinforms-form3-subtitle" style="font-family:Arial; font-size:16px; color:#000000; ">'.$description.'</div><!--optinforms-form3-subtitle-->
                                    </div><!--optinforms-form3-container-left-->
                                    <div id="optinforms-form3-container-right">
                                        <input type="text" id="optinforms-form3-name-field" placeholder="Your Name" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#666666;margin-bottom:4px !important; ">
                                        <input type="text" id="optinforms-form3-email-field" placeholder="Your Email Address" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#666666;margin-bottom:4px !important;">
                                        <input type="button" id="optinforms-form3-button" value="Sign Up Today!" style="font-family:Arial, Helvetica, sans-serif; font-size:18px; color:#FFFFFF; background-color:#49A3FE">
                                    </div><!--optinforms-form3-container-right-->
                                    <div class="clear"></div>
                                </div><!--optinforms-form3-inside-->
                            </div><!--optinforms-form3-->
                        </div>
					</form>
						';
	}
	elseif ($styleOptinForm == 5){
		return ''. '
		<img class="img-optin-bg" src="' . $urlImg . '/images/banner' . $styleOptinForm . '.png">
			<form method="POST" class="infusion-form" action="http://email.olymbook.com/form.php?form=1" accept-charset="UTF-8" id="UserOptinForm">
		<div id="optinforms-form5-container">
                            <div id="optinforms-form5" style="background: #333333;">
                                <div id="optinforms-form5-container-left">
                                    <input type="text" id="optinforms-form5-name-field" placeholder="Enter Your Name" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#000000;margin-bottom:4px !important; ">
                                    <input type="text" id="optinforms-form5-email-field" placeholder="Enter Your Email" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#000000;margin-bottom:4px !important;">
                                    <input type="button" id="optinforms-form5-button" value="SUBSCRIBE FOR FREE" style="font-family:Arial, Helvetica, sans-serif; font-size:16px; color:#FFFFFF; background-color:#fb6a13">
                                </div><!--optinforms-form5-container-left-->
                                <div id="optinforms-form5-container-right">
									<div id="optinforms-form5-title" style="font-family:News Cycle; font-size:24px; line-height:24px; color:#fb6a13; ">'.$shortDescription.'</div><!--optinforms-form5-title-->
                                    <div id="optinforms-form5-subtitle" style="font-family:Georgia; font-size:16px; color:#cccccc; ">'.$description.'</div><!--optinforms-form5-subtitle-->
                                    <!--<div id="optinforms-form5-disclaimer" style="font-family:Georgia, Times New Roman, Times, serif; font-size:14px; color:#727272;  ">We hate spam. Your email address will not be sold or shared with anyone else.</div>--><!--optinforms-form5-disclaimer-->
                                </div><!--optinforms-form5-container-right-->
                                <div class="clear"></div>
                            </div><!--optinforms-form5-->
                        </div>
						</form>
						';
						
	}
 }
 //add shortcode
 add_shortcode( 'optinmyform', 'optinforms_create_my_form' );

 /*
 * Add css for form optin
 */
function customize_css_alls() {
	wp_enqueue_style('optinforms-admin-stylesheet', plugins_url('/stylesheet/optinforms-admin.css', __FILE__ ));
}

// Add our CSS and JS to admin head, but just for our pages (see load_optinforms_admin_scripts above!)
function optinforms_scripts_front() {
	wp_enqueue_style('optinforms-stylesheet', plugins_url('/stylesheet/optinforms.css', __FILE__ ));
}

if (!is_admin()){
	add_action( 'wp_enqueue_scripts', 'optinforms_scripts_front' );
}
else{
	add_action( 'admin_enqueue_scripts', 'customize_css_alls' );
}
?>