<?php 
/**
 * Pixzlo Contact Info
 */
if ( ! function_exists( "pixzlo_vc_contact_info_shortcode" ) ) {
	function pixzlo_vc_contact_info_shortcode( $atts, $content = NULL ) {
		$atts = vc_map_get_attributes( "pixzlo_vc_contact_info", $atts ); 
		extract( $atts );
		
		$output = '';
		
		//Define Variables
		$animation = isset( $animation ) ? $animation : '';
		$class = isset( $extra_class ) && $extra_class != '' ? ' ' . $extra_class : '';		
		$class .= isset( $contact_style ) ? ' contact-info-' . $contact_style : '';	
		$class .= isset( $text_align ) && $text_align != 'default' ? ' text-' . $text_align : '';
		$class .= isset( $contact_layout ) && $contact_layout != '' ? ' contact-info-style-' . $contact_layout : '';
		$title = isset( $title ) && $title != '' ? $title : '';
		$title_tag = isset( $title_tag ) && $title_tag != 'default' ? $title_tag : 'h3';
		
		// Get VC Animation
		$class .= pixzloGetCSSAnimation( $animation );
		
		// This is custom css options for main shortcode warpper
		$shortcode_css = '';
		$shortcode_rand_id = $rand_class = 'shortcode-rand-'. pixzlo_shortcode_rand_id();
		
		//Shortcode css ccde here
		$shortcode_css .= isset( $font_color ) && $font_color != '' ? '.' . esc_attr( $rand_class ) . '.contact-info-wrapper { color: '. esc_attr( $font_color ) .'; }' : '';
		
		if( $shortcode_css ) $class .= ' ' . $shortcode_rand_id . ' pixzlo-inline-css';
		
		$output .= '<div class="contact-info-wrapper'. esc_attr( $class ) .'" data-css="'. htmlspecialchars( json_encode( $shortcode_css ), ENT_QUOTES, 'UTF-8' ) .'">';
		
			$output .= $title ? '<'. esc_attr( $title_tag ) .' class="contact-info-title">'. esc_html( $title ) .'</'. esc_attr( $title_tag ) .'>' : '';
			
			$elemetns = isset( $contact_items ) ? pixzlo_drag_and_drop_trim( $contact_items ) : array( 'Enabled' => '' );
			if( isset( $elemetns['Enabled'] ) ) :
				foreach( $elemetns['Enabled'] as $element => $value ){
					switch( $element ){
						case "info":
							if( isset( $contact_info ) && $contact_info != '' ){
								$output .= '<div class="contact-info">';
									$output .= do_shortcode( $contact_info );
								$output .= '</div><!-- .contact-info -->';
							}
						break;
						
						
						case "phone":
							if( isset( $contact_number ) && $contact_number != '' ){
								$output .= '<div class="contact-phone">';
								$phone_out = '';
								foreach( explode( ",", $contact_number ) as $phone ){
									$phone_out .= '<span class="icon-screen-smartphone icons"></span> <span>'. esc_html( trim( $phone ) ) .'</span>, ';
								}
								$output .= rtrim( $phone_out, ', ' );
								$output .= '</div><!-- .contact-phone -->';
							}
						break;
						
						case "address":
							if( isset( $contact_address ) && $contact_address != '' ){
								$output .= '<div class="contact-address">';
									$output .= '<span class="icon-directions icons"></span> '. do_shortcode( $contact_address );
								$output .= '</div><!-- .contact-info -->';
							}
						break;
						
						case "mail":
							if( isset( $contact_email ) && $contact_email != '' ){
								$output .= '<div class="contact-mail">';
								$mail_out = '';
								foreach( explode( ",", $contact_email ) as $email ){
									$mail_out .= '<a href="mailto:'. esc_attr( trim( $email ) ) .'"><span class="icon-envelope icons"></span> '. esc_html( trim( $email ) ) .'</a>, ';
								}
								$output .= rtrim( $mail_out, ', ' );
								$output .= '</div><!-- .contact-mail -->';
							}
						break;
						
						case "social":
							$output .= '<div class="social-icons">';
								$social_media = array( 
									'social-fb' => 'fa fa-facebook', 
									'social-twitter' => 'fa fa-twitter', 
									'social-instagram' => 'fa fa-instagram', 
									'social-linkedin' => 'fa fa-linkedin', 
									'social-pinterest' => 'fa fa-pinterest-p',
									'social-youtube' => 'fa fa-youtube-play', 
									'social-vimeo' => 'fa fa-vimeo', 
									'social-soundcloud' => 'fa fa-soundcloud', 
									'social-yahoo' => 'fa fa-yahoo', 
									'social-tumblr' => 'fa fa-tumblr',  
									'social-paypal' => 'fa fa-paypal', 
									'social-mailto' => 'fa fa-envelope-o', 
									'social-flickr' => 'fa fa-flickr', 
									'social-dribbble' => 'fa fa-dribbble', 
									'social-rss' => 'fa fa-rss' 
								);
					
								// Actived social icons from theme option output generate via loop
								$social_icons = '';
								foreach( $social_media as $key => $icon_class ){
									
									$social_field = str_replace( "-", "_", $key );
									
									if( isset( $$social_field ) && $$social_field != '' ){
										$social_url = $$social_field;
										$social_icons .= '<li>
														<a href="'. esc_url( $social_url ) .'" class="nav-link '. esc_attr( $key ) .'">
															<i class="'. esc_attr( $icon_class ) .'"></i>
														</a>
													</li>';
									}
								}
						
								$social_class = isset( $social_icons_type ) ? ' social-' . $social_icons_type : '';
								$social_class .= isset( $social_icons_fore ) ? ' social-' . $social_icons_fore : '';
								$social_class .= isset( $social_icons_hfore ) ? ' social-' . $social_icons_hfore : '';
								$social_class .= isset( $social_icons_bg ) ? ' social-' . $social_icons_bg : '';
								$social_class .= isset( $social_icons_hbg ) ? ' social-' . $social_icons_hbg : '';
								
								$output .= '<ul class="nav social-icons '. esc_attr( $social_class ) .'">';
									$output .= $social_icons;
								$output .= '</ul>';
					
							$output .= '</div><!-- .social-icons-wrapper -->';
						break;
						
						case "form":
							if( isset( $contact_form ) && $contact_form != '' ){
								$output .= '<div class="contact-form">';
									$output .= do_shortcode( '[contact-form-7 id="'. esc_attr( $contact_form ) .'"]' );
								$output .= '</div><!-- .contact-form -->';
							}
						break;
					}
				}
			endif;
		$output .= '</div><!-- .contact-info-wrapper -->';
		return $output;
	}
}
if ( ! function_exists( "pixzlo_vc_contact_info_shortcode_map" ) ) {
	function pixzlo_vc_contact_info_shortcode_map() {
				
		$contact_forms = array();
		if( class_exists( "WPCF7" ) ){
			$args = array('post_type' => 'wpcf7_contact_form', 'posts_per_page' => -1);
			if( $data = get_posts( $args ) ){
				foreach( $data as $key ){
					$contact_forms[$key->post_title] = $key->ID;
				}
			}
		}
				
		vc_map( 
			array(
				"name"					=> esc_html__( "Contact Info", "pixzlo" ),
				"description"			=> esc_html__( "Stylish Contact Info.", "pixzlo" ),
				"base"					=> "pixzlo_vc_contact_info",
				"category"				=> esc_html__( "Shortcodes", "pixzlo" ),
				"icon"					=> "zozo-vc-icon",
				"params"				=> array(
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Extra Class", "pixzlo" ),
						"param_name"	=> "extra_class",
						"value" 		=> "",
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
						"type"			=> "dropdown",
						"heading"		=> esc_html__( "Text Align", "pixzlo" ),
						"description"	=> esc_html__( "This is option for day counter text align", "pixzlo" ),
						"param_name"	=> "text_align",
						"value"			=> array(
							esc_html__( "Default", "pixzlo" )	=> "default",
							esc_html__( "Left", "pixzlo" )		=> "left",
							esc_html__( "Center", "pixzlo" )	=> "center",
							esc_html__( "Right", "pixzlo" )		=> "right"
						),
						"group"			=> esc_html__( "Layouts", "pixzlo" )
					),					
					array(
						"type"			=> "img_select",
						"heading"		=> esc_html__( "Contact Info Layout", "pixzlo" ),
						"param_name"	=> "contact_layout",
						"img_lists" => array ( 
							"1"	=> PIXZLO_ADMIN_URL . "/assets/images/contact-info/1.png",
							"2"	=> PIXZLO_ADMIN_URL . "/assets/images/contact-info/2.png",
							"3"	=> PIXZLO_ADMIN_URL . "/assets/images/contact-info/3.png"
						),
						"default"		=> "1",
						"group"			=> esc_html__( "Layouts", "pixzlo" )
					),
					array(
						'type'			=> 'drag_drop',
						'heading'		=> esc_html__( 'Contact Info Items', 'pixzlo' ),
						"description"	=> esc_html__( "This is settings for contact info custom layout. here you can set your own layout. Drag and drop needed contact items to Enabled part.", "pixzlo" ),
						'param_name'	=> 'contact_items',
						'dd_fields' => array ( 
							'Enabled' => array( 
								'info'	=> esc_html__( 'Info', 'pixzlo' ),
								'mail'	=> esc_html__( 'Mail ID', 'pixzlo' ),
								'phone'	=> esc_html__( 'Phone', 'pixzlo' ),
								'social'	=> esc_html__( 'Social', 'pixzlo' )			
							),
							'disabled' => array(
								'address'	=> esc_html__( 'Address', 'pixzlo' ),
								'form'	=> esc_html__( 'Form', 'pixzlo' )
							)
						),
						"group"			=> esc_html__( "Layouts", "pixzlo" )
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Contact Info Title", "pixzlo" ),
						"description"	=> esc_html__( "Enter contact form title.", "pixzlo" ),
						"param_name"	=> "title",
						"value" 		=> "",
						"group"			=> esc_html__( "Info", "pixzlo" )
					),
					array(
						"type"			=> "dropdown",
						"heading"		=> esc_html__( "Title Heading Tag", "pixzlo" ),
						"description"	=> esc_html__( "This is option for title heading tag", "pixzlo" ),
						"param_name"	=> "title_tag",
						"value"			=> array(
							esc_html__( "H2", "pixzlo" )=> "h2",
							esc_html__( "H3", "pixzlo" )=> "h3",
							esc_html__( "H4", "pixzlo" )=> "h4",
							esc_html__( "H5", "pixzlo" )=> "h5",
							esc_html__( "H6", "pixzlo" )=> "h6"
						),
						"group"			=> esc_html__( "Info", "pixzlo" )
					),
					array(
						"type"			=> "textarea",
						"heading"		=> esc_html__( "Contact Information or Description", "pixzlo" ),
						"description"	=> esc_html__( "Enter contact informaion or description here.", "pixzlo" ),
						"param_name"	=> "contact_info",
						"value" 		=> "",
						"group"			=> esc_html__( "Info", "pixzlo" )
					),
					array(
						"type"			=> "textarea",
						"heading"		=> esc_html__( "Contact Address", "pixzlo" ),
						"description"	=> esc_html__( "Enter contact address here.", "pixzlo" ),
						"param_name"	=> "contact_address",
						"value" 		=> "",
						"group"			=> esc_html__( "Info", "pixzlo" )
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Email Id", "pixzlo" ),
						"description"	=> esc_html__( "Enter email id. If you enter multiple email id means, seperate with comma(,).", "pixzlo" ),
						"param_name"	=> "contact_email",
						"value"			=> "",
						"group"			=> esc_html__( "Info", "pixzlo" )
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Contact Number", "pixzlo" ),
						"description"	=> esc_html__( "Enter contact number. If you enter multiple contact number means, seperate with comma(,).", "pixzlo" ),
						"param_name"	=> "contact_number",
						"value"			=> "",
						"group"			=> esc_html__( "Info", "pixzlo" )
					),
					array(
						"type"			=> "img_select",
						"heading"		=> esc_html__( "Social Iocns Type", "pixzlo" ),
						"param_name"	=> "social_icons_type",
						"img_lists" => array ( 
							"squared"	=> PIXZLO_ADMIN_URL . "/assets/images/social-icons/1.png",
							"rounded"	=> PIXZLO_ADMIN_URL . "/assets/images/social-icons/2.png",
							"circled"	=> PIXZLO_ADMIN_URL . "/assets/images/social-icons/3.png",
							"transparent"	=> PIXZLO_ADMIN_URL . "/assets/images/social-icons/4.png"
						),
						"default"		=> "transparent",
						"group"			=> esc_html__( "Layouts", "pixzlo" )
					),
					array(
						"type"			=> "dropdown",
						"heading"		=> esc_html__( "Social Icons Fore", "pixzlo" ),
						"description"	=> esc_html__( "This is option for day social icons fore color.", "pixzlo" ),
						"param_name"	=> "social_icons_fore",
						"value"			=> array(
							esc_html__( "Black", "pixzlo" )	=> "black",
							esc_html__( "White", "pixzlo" )		=> "white",
							esc_html__( "Own Color", "pixzlo" )	=> "own"
						),
						"group"			=> esc_html__( "Layouts", "pixzlo" )
					),
					array(
						"type"			=> "dropdown",
						"heading"		=> esc_html__( "Social Icons Fore Hover", "pixzlo" ),
						"description"	=> esc_html__( "This is option for day social icons fore hover color.", "pixzlo" ),
						"param_name"	=> "social_icons_hfore",
						"value"			=> array(
							esc_html__( "Own Color", "pixzlo" )	=> "h-own",
							esc_html__( "Black", "pixzlo" )	=> "h-black",
							esc_html__( "White", "pixzlo" )		=> "h-white"
						),
						"group"			=> esc_html__( "Layouts", "pixzlo" )
					),
					array(
						"type"			=> "dropdown",
						"heading"		=> esc_html__( "Social Icons Background", "pixzlo" ),
						"description"	=> esc_html__( "This is option for day social icons background color.", "pixzlo" ),
						"param_name"	=> "social_icons_bg",
						"value"			=> array(
							esc_html__( "Transparent", "pixzlo" )	=> "bg-transparent",
							esc_html__( "White", "pixzlo" )		=> "bg-white",
							esc_html__( "Black", "pixzlo" )		=> "bg-black",
							esc_html__( "Light", "pixzlo" )		=> "bg-light",
							esc_html__( "Dark", "pixzlo" )		=> "bg-dark",
							esc_html__( "Own Color", "pixzlo" )	=> "bg-own"
						),
						"group"			=> esc_html__( "Layouts", "pixzlo" )
					),
					array(
						"type"			=> "dropdown",
						"heading"		=> esc_html__( "Social Icons Background Hover", "pixzlo" ),
						"description"	=> esc_html__( "This is option for day social icons background hover color.", "pixzlo" ),
						"param_name"	=> "social_icons_hbg",
						"value"			=> array(
							esc_html__( "Transparent", "pixzlo" )	=> "hbg-transparent",
							esc_html__( "White", "pixzlo" )		=> "hbg-white",
							esc_html__( "Black", "pixzlo" )		=> "hbg-black",
							esc_html__( "Light", "pixzlo" )		=> "hbg-light",
							esc_html__( "Dark", "pixzlo" )		=> "hbg-dark",
							esc_html__( "Own Color", "pixzlo" )	=> "hbg-own"
						),
						"group"			=> esc_html__( "Layouts", "pixzlo" )
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Facebook", "pixzlo" ),
						"description"	=> esc_html__( "This is option for facebook social icon.", "pixzlo" ),
						"param_name"	=> "social_fb",
						"value" 		=> "",
						"group"			=> esc_html__( "Links", "pixzlo" )
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Twitter", "pixzlo" ),
						"description"	=> esc_html__( "This is option for twitter social icon.", "pixzlo" ),
						"param_name"	=> "social_twitter",
						"value" 		=> "",
						"group"			=> esc_html__( "Links", "pixzlo" )
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Instagram", "pixzlo" ),
						"description"	=> esc_html__( "This is option for instagram social icon.", "pixzlo" ),
						"param_name"	=> "social_instagram",
						"value" 		=> "",
						"group"			=> esc_html__( "Links", "pixzlo" )
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Pinterest", "pixzlo" ),
						"description"	=> esc_html__( "This is option for pinterest social icon.", "pixzlo" ),
						"param_name"	=> "social_pinterest",
						"value" 		=> "",
						"group"			=> esc_html__( "Links", "pixzlo" )
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Youtube", "pixzlo" ),
						"description"	=> esc_html__( "This is option for youtube social icon.", "pixzlo" ),
						"param_name"	=> "social_youtube",
						"value" 		=> "",
						"group"			=> esc_html__( "Links", "pixzlo" )
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Vimeo", "pixzlo" ),
						"description"	=> esc_html__( "This is option for vimeo social icon.", "pixzlo" ),
						"param_name"	=> "social_vimeo",
						"value" 		=> "",
						"group"			=> esc_html__( "Links", "pixzlo" )
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Soundcloud", "pixzlo" ),
						"description"	=> esc_html__( "This is option for soundcloud social icon.", "pixzlo" ),
						"param_name"	=> "social_soundcloud",
						"value" 		=> "",
						"group"			=> esc_html__( "Links", "pixzlo" )
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Yahoo", "pixzlo" ),
						"description"	=> esc_html__( "This is option for yahoo social icon.", "pixzlo" ),
						"param_name"	=> "social_yahoo",
						"value" 		=> "",
						"group"			=> esc_html__( "Links", "pixzlo" )
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Tumblr", "pixzlo" ),
						"description"	=> esc_html__( "This is option for tumblr social icon.", "pixzlo" ),
						"param_name"	=> "social_tumblr",
						"value" 		=> "",
						"group"			=> esc_html__( "Links", "pixzlo" )
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Paypal", "pixzlo" ),
						"description"	=> esc_html__( "This is option for paypal social icon.", "pixzlo" ),
						"param_name"	=> "social_paypal",
						"value" 		=> "",
						"group"			=> esc_html__( "Links", "pixzlo" )
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Mailto", "pixzlo" ),
						"description"	=> esc_html__( "This is option for mailto social icon.", "pixzlo" ),
						"param_name"	=> "social_mailto",
						"value" 		=> "",
						"group"			=> esc_html__( "Links", "pixzlo" )
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Flickr", "pixzlo" ),
						"description"	=> esc_html__( "This is option for flickr social icon.", "pixzlo" ),
						"param_name"	=> "social_flickr",
						"value" 		=> "",
						"group"			=> esc_html__( "Links", "pixzlo" )
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Dribbble", "pixzlo" ),
						"description"	=> esc_html__( "This is option for dribbble social icon.", "pixzlo" ),
						"param_name"	=> "social_dribbble",
						"value" 		=> "",
						"group"			=> esc_html__( "Links", "pixzlo" )
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "RSS", "pixzlo" ),
						"description"	=> esc_html__( "This is option for rss social icon.", "pixzlo" ),
						"param_name"	=> "social_rss",
						"value" 		=> "",
						"group"			=> esc_html__( "Links", "pixzlo" )
					),
					array(
						"type"			=> "dropdown",
						"heading"		=> esc_html__( "Contact Form", "pixzlo" ),
						"description"	=> esc_html__( "Choose contact form which you want to show.", "pixzlo" ),
						"param_name"	=> "contact_form",
						"value"			=> $contact_forms,
						"group"			=> esc_html__( "Form", "pixzlo" )
					)
				)
			) 
		);
	}
}
add_action( "vc_before_init", "pixzlo_vc_contact_info_shortcode_map" );