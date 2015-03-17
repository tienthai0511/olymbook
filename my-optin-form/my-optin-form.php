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
$imageOptinForm = get_option('imageOptinForm'); 
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
	return myFormHTML($styleOptinForm);
}

function myFormHTML($styleOptinForm){
	global $description, $shortDescription,$imageOptinForm;
	$source_img = get_site_url() . "/wp-admin/" .$imageOptinForm;
	if ($styleOptinForm == 1) {
		return "" . '
			<div style="margin:0 auto">
				<img class="img-optin-bg" src="' . $source_img . '">
				<form method="POST" class="infusion-form" action="http://email.olymbook.com/form.php?form=1" accept-charset="UTF-8" id="UserOptinForm" 
					<div id="optinforms-form1-container">
                            <div id="optinforms-form1" style="color:#fff">
                                <p id="optinforms-form1-title" style="font-family:Damion; font-size:36px; line-height:36px; color:#eb432c; ">' . $shortDescription . '</p>
        
                                <p id="optinforms-form1-subtitle" style="font-family:Arial; font-size:16px; line-height: 16px; ">' . $description .'</p>
                                <div id="optinforms-form1-name-field-container">
                                    <input type="text" id="optinforms-form1-name-field" placeholder="Nhập tên" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#666666">
                                </div><!--optinforms-form1-name-field-container-->
                                <div id="optinforms-form1-email-field-container">
                                    <input type="text" id="optinforms-form1-email-field" placeholder="Nhập email" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#666666">
                                </div><!--optinforms-form1-email-field-container-->
                                <div id="optinforms-form1-button-container">
                                    <input type="button" id="optinforms-form1-button" value="ĐĂNG KÝ" style="font-family:Arial, Helvetica, sans-serif; font-size:21px; color:#FFFFFF; background-color:#818286!important">
                                </div><!--optinforms-form1-button-container-->
                                <div class="clear"></div>
                            </div><!--optinforms-form1-->
                        </div>
				</form>
				<div class="clear"></div>
			</div>';
	}
	elseif ($styleOptinForm == 2) {
		return "" . '
			<div style="margin:0 auto">
				<img class="img-optin-bg" src="' . $source_img . '">
				<form method="POST" class="infusion-form" action="http://email.olymbook.com/form.php?form=1" accept-charset="UTF-8" id="UserOptinForm">
					<div id="optinforms-form2-container-c">
						<div id="optinforms-form5" style="background: #333333;">
                                <div id="optinforms-form5-container-left">
                                    <!--<div id="optinforms-form5-title" style="font-family:News Cycle; font-size:24px; line-height:24px; color:#fb6a13; ">ĐĂNG KÍ NGAY</div>--><!--optinforms-form5-title-->
                                    <input type="text" id="optinforms-form5-name-field" placeholder="Nhập tên" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#000000; ">
                                    <input type="text" id="optinforms-form5-email-field" placeholder="Nhập mail" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#000000">
                                    <input type="button" id="optinforms-form5-button" value="Đăng kí ngay" style="font-family:Arial, Helvetica, sans-serif; font-size:16px; color:#FFFFFF; background-color:#fb6a13">
                                </div><!--optinforms-form5-container-left-->
                                <div id="optinforms-form5-container-right">
                                    <div id="optinforms-form5-subtitle" style="font-family:Georgia; font-size:16px; color:#cccccc; ">' . $description . '</div><!--optinforms-form5-subtitle-->
                                    <div id="optinforms-form5-disclaimer" style="font-family:Georgia, Times New Roman, Times, serif; font-size:14px; color:#727272;  ">' . $shortDescription . '</div><!--optinforms-form5-disclaimer-->
                                </div><!--optinforms-form5-container-right-->
                                <div class="clear"></div>
                            </div>
					</div><!--optinforms-form2-->
				</form>
			<div class="clear"></div>
			</div>';
	} else if ($styleOptinForm == 3){
		return ''.'
			<div style="margin:0 auto">
				<img class="img-optin-bg" src="' . $source_img . '">
				<form method="POST" class="infusion-form" action="http://email.olymbook.com/form.php?form=1" accept-charset="UTF-8" id="UserOptinForm">
				<div id="optinforms-form3">
                                <div id="optinforms-form3-inside" style="background: #FFFFFF;">
                                    <div id="optinforms-form3-container-left">
                                        <div id="optinforms-form3-title" style="font-family:Droid Serif; font-size:24px; line-height:28px; color:#505050; ">' . $shortDescription .'</div><!--optinforms-form3-title-->
                                        <div id="optinforms-form3-subtitle" style="font-family:Arial; font-size:16px; color:#000000; ">' . $description . '</div><!--optinforms-form3-subtitle-->
                                    </div><!--optinforms-form3-container-left-->
                                    <div id="optinforms-form3-container-right">
                                        <input type="text" id="optinforms-form3-name-field" placeholder="Your Name" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#666666; ">
                                        <input type="text" id="optinforms-form3-email-field" placeholder="Your Email Address" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#666666">
                                        <input type="button" id="optinforms-form3-button" value="Nhận sách!" style="font-family:Arial, Helvetica, sans-serif; font-size:18px; color:#FFFFFF; background-color:#49A3FE">
                                    </div><!--optinforms-form3-container-right-->
                                    <div class="clear"></div>
                                </div><!--optinforms-form3-inside-->
                            </div>
					</form>
					<div class="clear"></div>
			</div>';
	}
}
 //add shortcode
 add_shortcode( 'optinmyform', 'optinforms_create_my_form' );

 /*
 * Add css for form optin
 */
function customize_css_site() {
	wp_enqueue_style('optinforms-stylesheet', plugins_url('/stylesheet/optinforms.css', __FILE__));
}
function customize_css_admin() {
	wp_enqueue_style('optinforms-admin-stylesheet', plugins_url('/stylesheet/optinforms-admin.css', __FILE__ ));
}
if (is_admin()){
	add_action( 'admin_enqueue_scripts', 'customize_css_admin' );
}
add_action( 'wp_enqueue_scripts', 'customize_css_site' );

