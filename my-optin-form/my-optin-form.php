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
	global $styleOptinForm;
	$urlImg = get_template_directory_uri();
	if ($styleOptinForm == 1) {
		return "" . '
				<img src="' . $urlImg . '/images/banner' . $styleOptinForm . '.png">
				<form method="POST" class="infusion-form" action="http://email.olymbook.com/form.php?form=1" accept-charset="UTF-8" id="UserOptinForm">
					<div id="optinforms-form1" >
					<p id="optinforms-form1-title" style="font-family:Damion; font-size:36px; line-height:36px; color:#eb432c">Get Free Email Updates!</p>
					<p id="optinforms-form1-subtitle" style="font-family:Arial; font-size:16px; line-height:16px; color:#000000">Signup now and receive an email once I publish new content.</p>
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
						<p id="optinforms-form1-disclaimer" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; line-height:12px; color:#666666">I will never give away, trade or sell your email address. You can unsubscribe at any time.</p>
					</div>
			</form>';
	}
	elseif ($styleOptinForm == 2) {
		return "" . '
			<img src="' . $urlImg . '/images/banner' . $styleOptinForm . '.png">
			<form method="POST" class="infusion-form" action="http://email.olymbook.com/form.php?form=1" accept-charset="UTF-8" id="UserOptinForm">
				<div id="optinforms-form2-container">
						<div id="optinforms-form2" style="background: #266d7c;">
							<div id="optinforms-form2-title-container">
								<div id="optinforms-form2-title" style="font-family:Pacifico; font-size:28px; line-height:28px; color:#ffffff">Receive Updates</div><!--optinforms-form2-title-->
							</div><!--optinforms-form2-title-container-->
							<div id="optinforms-form2-email-field-container">
								<input type="text" id="optinforms-form2-email-field" placeholder="Enter Your Email Address" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#000000;">
							</div><!--optinforms-form2-email-field-container-->
							<div id="optinforms-form2-button-container">
								<input type="button" id="optinforms-form2-button" value="Sign Up" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#FFFFFF; background-color:#49A3FE">
							</div><!--optinforms-form2-button-container-->
							<div id="optinforms-form2-disclaimer-container">
								<p id="optinforms-form2-disclaimer" style="font-family:Arial, Helvetica, sans-serif; font-size:11px; line-height: 11px; color:#ffffff">No spam guarantee.</p>
							</div><!--optinforms-form2-disclaimer-container-->
							<div class="clear"></div>
						</div><!--optinforms-form2-->
					</div>
					</form>
						';
	}
	elseif ($styleOptinForm == 3){
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