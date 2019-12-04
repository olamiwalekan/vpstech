<?php 
/**
 * Pixzlo Mailchimp
 */
if ( ! function_exists( "pixzlo_vc_mailchimp_shortcode" ) ) {
	function pixzlo_vc_mailchimp_shortcode( $atts, $content = NULL ) {
		
		$atts = vc_map_get_attributes( "pixzlo_vc_mailchimp", $atts );
		extract( $atts );
		
		//Define Variables
		$animation = isset( $animation ) ? $animation : '';
		$class = isset( $extra_class ) && $extra_class != '' ? $extra_class : '';		
		// Get VC Animation
		$class .= pixzloGetCSSAnimation( $animation );
		
		//Get mailchimp list id's
		$pixzlo_option = get_option( 'pixzlo_options' );
		$mc_api_key = isset( $pixzlo_option['mailchimp-api'] ) ? $pixzlo_option['mailchimp-api'] : '';
		
		$output = '';
		$rand_id = pixzlo_shortcode_rand_id();
		
		// This is custom css options for main shortcode warpper
		$shortcode_css = '';
		$shortcode_rand_id = $rand_class = 'shortcode-rand-'. pixzlo_shortcode_rand_id();
		
		//Shortcode css ccde here
		$shortcode_css .= isset( $font_color ) && $font_color != '' ? '.' . esc_attr( $rand_class ) . '.mailchimp-wrapper { color: '. esc_attr( $font_color ) .'; }' : '';
		
		if( $shortcode_css ) $class .= ' ' . $shortcode_rand_id . ' pixzlo-inline-css';
		$output .= '<div class="mailchimp-wrapper'. esc_attr( $class ) .'" data-css="'. htmlspecialchars( json_encode( $shortcode_css ), ENT_QUOTES, 'UTF-8' ) .'">';
			$output .= isset( $title ) && $title != '' ? '<h3 class="mailchimp-title">'. esc_html( $title ) .'</h3>' : '';
			$output .= isset( $sub_title ) && $sub_title != '' ? '<p class="mailchimp-sub-title">'. esc_html( $sub_title ) .'</p>' : '';
			
			$output .= '<div class="form-group">';
			
				$output .= '<form class="mc-form" method="post">';
					$output .= isset( $first_name ) && $first_name == 'on' ? '<input type="text" class="form-control" name="mc_first_name" placeholder="'. esc_attr__( 'Enter First Name', 'pixzlo' ) .'">' : '';
					$output .= isset( $last_name ) && $last_name == 'on' ? '<input type="text" class="form-control" name="mc_last_name" placeholder="'. esc_attr__( 'Enter Last Name', 'pixzlo' ) .'">' : '';
					
					$output .= isset( $mailchimp_list ) && $mailchimp_list != '' ? '<input type="hidden" class="form-control" name="mc_list_id" value="'. esc_attr( $mailchimp_list ) .'">' : '';
	
					$placeholder = isset( $placeholder ) && $placeholder != '' ? $placeholder : '';
					
					$button_style = isset( $button_style ) ? $button_style : 'icon';
					$btn_txt = '';
					if( $button_style == 'text' ){
						$btn_txt = isset( $button_text ) ? '<span class="subscribe-text">' . $button_text . '</span>' : '';
					}elseif( $button_style == 'icon' ){
						$btn_txt = apply_filters( 'pixzlo_mailchimp_icon', '<span class="fa fa-paper-plane-o"></span>' );
					}else{
						$btn_txt = isset( $button_text ) ? '<span class="subscribe-text">' . $button_text . '</span>' . apply_filters( 'pixzlo_mailchimp_icon', '<span class="fa fa-paper-plane-o"></span>' ) : '';
					}
					
					if( isset( $mailchimp_layout ) && $mailchimp_layout == '1' ){
						$output .= '<div class="input-group">';
							$output .= '<input type="text" class="form-control" name="mc_email" placeholder="'. esc_attr( $placeholder ) .'">';
			
							$output .= '<span class="input-group-btn">';
								$output .= '<button class="btn btn-secondary mc-submit-btn" type="button">'. wp_kses_post( $btn_txt ) .'</button>';
							$output .= '</span>';
						$output .= '</div><!-- .input-group -->';
					}else{
						$output .= '<input type="text" class="form-control" name="mc_email" placeholder="'. esc_attr( $placeholder ) .'">';
						$output .= '<span class="input-group-btn">';
							$output .= '<button class="btn btn-secondary mc-submit-btn" type="button">'. wp_kses_post( $btn_txt ) .'</button>';
						$output .= '</span>';
					}
				$output .= '</form><!-- .mc-form -->';
				
			$output .= '</div><!-- .form-group -->';
			
			$success = isset( $success_text ) && $success_text != '' ? $success_text : esc_html__( 'Success', 'pixzlo' );
			$fail = isset( $fail_text ) && $fail_text != '' ? $fail_text : esc_html__( 'Failed', 'pixzlo' );
			$output .= '<div class="mc-notice-group" data-success="'. esc_html( $success ) .'" data-fail="'. esc_html( $fail ) .'">';
				$output .= '<span class="mc-notice-msg"></span>';
			$output .= '</div><!-- .mc-notice-group -->';
			
		$output .= '</div><!-- .mailchimp-wrapper -->';
		return $output;
	}
}
function pixzlo_get_mcapi(){
	$pixzlo_option = get_option( 'pixzlo_options' );
	$mc_api_key = isset( $pixzlo_option['mailchimp-api'] ) ? $pixzlo_option['mailchimp-api'] : '';
	$mcapi = '';
	if( class_exists( "MCAPI" ) ){
		$mcapi = new MCAPI( $mc_api_key );
	}
	
	return $mcapi;
}
function pixzlo_get_mailchimp_list_ids(){
	$pixzlo_option = get_option( 'pixzlo_options' );
	$mc_api_key = isset( $pixzlo_option['mailchimp-api'] ) ? $pixzlo_option['mailchimp-api'] : '';
	
	$data = array(
		'fields' => 'lists'
	);					
	$url = 'https://' . substr($mc_api_key,strpos($mc_api_key,'-')+1) . '.api.mailchimp.com/3.0/lists/';
	$r_mc_lists = array();
	
	if( function_exists('pixzlo_mailchimp_list_curl_connect') ){
		$list_result = json_decode( pixzlo_mailchimp_list_curl_connect( $url, 'GET', $mc_api_key, $data) );
		
		if( !empty( $list_result->lists ) ) {
			foreach( $list_result->lists as $list ){
				$r_mc_lists[ $list->name ] = $list->id;
			}
		}
	}
	
	return $r_mc_lists; 
	
}
if( ! function_exists('pixzlo_vc_mailchimp') ) {
	function pixzlo_vc_mailchimp(){
		$nonce = sanitize_text_field($_POST['nonce']);
	  
		if ( ! wp_verify_nonce( $nonce, 'pixzlo-mailchimp' ) )
			die ( esc_html__( 'Busted', 'pixzlo' ) );
			
		if( isset( $_POST['mc_email'] ) && $_POST['mc_email'] != '' ){
			$email = esc_attr( $_POST['mc_email'] );
			$first_name = isset( $_POST['mc_first_name'] ) && $_POST['mc_first_name'] != '' ? esc_attr( $_POST['mc_first_name'] ) : '';
			$last_name = isset( $_POST['mc_last_name'] ) && $_POST['mc_last_name'] != '' ? esc_attr( $_POST['mc_last_name'] ) : '';
			$list_id = isset( $_POST['mc_list_id'] ) && $_POST['mc_list_id'] != '' ? esc_attr( $_POST['mc_list_id'] ) : '';
			
			$pixzlo_option = get_option( 'pixzlo_options' );
			$mc_api_key = isset( $pixzlo_option['mailchimp-api'] ) ? $pixzlo_option['mailchimp-api'] : '';
			
			$memberID = md5(strtolower($email));
			
			$data = json_encode( array(
					'email_address' => esc_attr( $email ),
					'status' => 'subscribed',
					'merge_fields'  => array(
						'FNAME'     => esc_attr( $first_name ),
						'LNAME'     => esc_attr( $last_name )
					)		
				)
			);
			
			$url = 'https://' . substr($mc_api_key,strpos($mc_api_key,'-')+1) . '.api.mailchimp.com/3.0/lists/'. esc_attr( $list_id ) .'/members/'. esc_attr( $memberID );
			
			if( function_exists('pixzlo_mailchimp_subscribe_curl_connect') ){
				$result = pixzlo_mailchimp_subscribe_curl_connect( $url, $mc_api_key, $data);
				
				if( $result == 200 ){
					echo 'mc_1';
				}elseif( $result == 214 ){
					echo 'mc_1';
				}else{
					echo 'mc_0';
				}
			}
			
		}
		die();
	}
	add_action('wp_ajax_nopriv_pixzlomc', 'pixzlo_vc_mailchimp');
	add_action('wp_ajax_pixzlomc', 'pixzlo_vc_mailchimp');
}
if ( ! function_exists( "pixzlo_vc_mailchimp_shortcode_map" ) ) {
	function pixzlo_vc_mailchimp_shortcode_map() {
				
		vc_map( 
			array(
				"name"					=> esc_html__( "Mailchimp", "pixzlo" ),
				"description"			=> esc_html__( "AJAX mailchimp.", "pixzlo" ),
				"base"					=> "pixzlo_vc_mailchimp",
				"category"				=> esc_html__( "Shortcodes", "pixzlo" ),
				"mailchimp"					=> "zozo-vc-mailchimp",
				"params"				=> array(
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Extra Class", "pixzlo" ),
						"param_name"	=> "extra_class",
						"value" 		=> "",
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Title", "pixzlo" ),
						"param_name"	=> "title",
						"value" 		=> ""
					),
					array(
						"type"			=> "animation_style",
						"heading"		=> esc_html__( "Animation Style", "pixzlo" ),
						"description"	=> esc_html__( "Choose your animation style.", "pixzlo" ),
						"param_name"	=> "animation",
						'admin_label'	=> false,
                		'weight'		=> 0,
					),
					array(
						"type"			=> "colorpicker",
						"heading"		=> esc_html__( "Font Color", "pixzlo" ),
						"description"	=> esc_html__( "Here you can put the font color.", "pixzlo" ),
						"param_name"	=> "font_color",
						"group"			=> esc_html__( "Layouts", "pixzlo" )
					),
					array(
						"type"			=> "img_select",
						"heading"		=> esc_html__( "Mailchimp Layout", "pixzlo" ),
						"param_name"	=> "mailchimp_layout",
						"img_lists" => array ( 
							"1"	=> PIXZLO_ADMIN_URL . "/assets/images/services/1.png",
							"2"	=> PIXZLO_ADMIN_URL . "/assets/images/services/2.png"
						),
						"default"		=> "1",
						"group"			=> esc_html__( "Mailchimp", "pixzlo" )
					),
					array(
						"type" 			=> "dropdown",
						"heading" 		=> esc_html__( "Select a Mailing List", "pixzlo" ),
						"description" 	=> esc_html__( "This mailchimp list's showing by given mailchimp api key from theme options.", "pixzlo" ),
						"value" 		=> pixzlo_get_mailchimp_list_ids(),
						"param_name" 	=> "mailchimp_list",
						"group"			=> esc_html__( "Mailchimp", "pixzlo" ),
					),
					array(
						"type" 			=> "dropdown",
						"heading" 		=> esc_html__( "Signup Button Style", "pixzlo" ),
						"description" 	=> esc_html__( "This is option for mailchimp button style.", "pixzlo" ),
						"value" 		=> array(
							esc_html__( "Only Text", "pixzlo" ) 	=> "text",
							esc_html__( "Only Icon", "pixzlo" ) 	=> "icon",
							esc_html__( "Text with Icon", "pixzlo" ) => "text-icon",
						),
						"param_name" 	=> "button_style",
						"group"			=> esc_html__( "Mailchimp", "pixzlo" ),
					),		
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Signup Button Text", "pixzlo" ),
						"description"		=> esc_html__( "This is the option for mailchimp singup button text. If no text need, then leave it empty.", "pixzlo" ),
						"param_name"	=> "button_text",
						"value" 		=> "",
						"group"			=> esc_html__( "Mailchimp", "pixzlo" )
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Placeholder Text", "pixzlo" ),
						"description"		=> esc_html__( "This is for placeholder text.", "pixzlo" ),
						"param_name"	=> "placeholder",
						"value" 		=> "",
						"group"			=> esc_html__( "Mailchimp", "pixzlo" )
					),
					array(
						"type"			=> "switch_bit",
						"heading"		=> esc_html__( "First Name Field", "pixzlo" ),
						"description"	=> esc_html__( "This is option for collect first name.", "pixzlo" ),
						"param_name"	=> "first_name",
						"value"			=> "off",
						"group"			=> esc_html__( "Mailchimp", "pixzlo" )
					),
					array(
						"type"			=> "switch_bit",
						"heading"		=> esc_html__( "Last Name Field", "pixzlo" ),
						"description"	=> esc_html__( "This is option for collect last name.", "pixzlo" ),
						"param_name"	=> "last_name",
						"value"			=> "off",
						"group"			=> esc_html__( "Mailchimp", "pixzlo" )
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Sub Title", "pixzlo" ),
						"description"	=> esc_html__( "This subtitle text show below of mailchimp title.", "pixzlo" ),
						"param_name"	=> "sub_title",
						"value" 		=> "",
						"group"			=> esc_html__( "Mailchimp", "pixzlo" )
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Success Text", "pixzlo" ),
						"description"	=> esc_html__( "This success message text for mailchimp.", "pixzlo" ),
						"param_name"	=> "success_text",
						"value" 		=> "",
						"group"			=> esc_html__( "Mailchimp", "pixzlo" )
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Failed Text", "pixzlo" ),
						"description"	=> esc_html__( "This failed message text for mailchimp.", "pixzlo" ),
						"param_name"	=> "fail_text",
						"value" 		=> "",
						"group"			=> esc_html__( "Mailchimp", "pixzlo" )
					),
				)
			) 
		);
	}
}
add_action( "vc_before_init", "pixzlo_vc_mailchimp_shortcode_map" );