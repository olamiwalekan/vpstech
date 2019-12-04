<?php 
/**
 * Pixzlo Modal Popup
 */
if ( ! function_exists( "pixzlo_vc_modal_popup_shortcode" ) ) {
	function pixzlo_vc_modal_popup_shortcode( $atts, $content = NULL ) {
		
		$atts = vc_map_get_attributes( "pixzlo_vc_modal_popup", $atts );
		extract( $atts );
		
		//Define Variables
		$popup_size = isset( $popup_size ) ? ' modal-' . $popup_size : '';
		$animation = isset( $animation ) ? $animation : '';
		$class = isset( $extra_class ) && $extra_class != '' ? ' '. $extra_class : '';		
		$class .= isset( $text_align ) && $text_align != 'default' ? ' text-' . $text_align : '';		
		// Get VC Animation
		$class .= pixzloGetCSSAnimation( $animation );
		
		$shortcode_css = '';
		$shortcode_rand_id = $rand_class = 'shortcode-rand-'. pixzlo_shortcode_rand_id();
		
		//Shortcode css ccde here
		$shortcode_css .= isset( $btn_color ) && $btn_color != '' ? '.' . esc_attr( $rand_class ) . ' .btn.modal-box-trigger { color: '. esc_attr( $btn_color ) .'; }' : '';
		$shortcode_css .= isset( $btn_hcolor ) && $btn_hcolor != '' ? '.' . esc_attr( $rand_class ) . ' .btn.modal-box-trigger:hover { color: '. esc_attr( $btn_hcolor ) .'; }' : '';
		$shortcode_css .= isset( $btn_bg ) && $btn_bg != '' ? '.' . esc_attr( $rand_class ) . ' .btn.modal-box-trigger { background-color: '. esc_attr( $btn_bg ) .'; }' : '';
		$shortcode_css .= isset( $btn_hbg ) && $btn_hbg != '' ? '.' . esc_attr( $rand_class ) . ' .btn.modal-box-trigger:hover { background-color: '. esc_attr( $btn_hbg ) .'; }' : '';
		
		$shortcode_css .= isset( $modal_title_color ) && $modal_title_color != '' ? '.' . esc_attr( $rand_class ) . ' .modal-title { color: '. esc_attr( $modal_title_color ) .'; }' : '';
		
		$shortcode_css .= isset( $font_color ) && $font_color != '' ? '.' . esc_attr( $rand_class ) . '.modal-popup-wrapper { color: '. esc_attr( $font_color ) .'; }' : '';
		
		
		if( $shortcode_css ) $class .= ' ' . $shortcode_rand_id . ' pixzlo-inline-css';
		
		$output = '';
		
		$trigger_type = isset( $trigger_type ) ? $trigger_type : 'btn';
		$class .= $trigger_type == 'load' ? ' page-load-modal' : '';
		
		$output .= '<div class="modal-popup-wrapper'. esc_attr( $class ) .'" data-css="'. htmlspecialchars( json_encode( $shortcode_css ), ENT_QUOTES, 'UTF-8' ) .'">';
		
			if( $trigger_type == 'btn' ){
				// Button trigger modal
				$output .= '<button type="button" class="btn btn-default modal-box-trigger" data-toggle="modal" data-target="#'. esc_attr( $shortcode_rand_id ) .'">';
					$output .= isset( $btn_text ) && $btn_text != '' ? esc_attr( $btn_text ) : esc_html( 'Modal Box', 'pixzlo' );
				$output .= '</button>';				
			}elseif( $trigger_type == 'link' ){
				// Link trigger modal
				$output .= '<a href="#" class="modal-box-trigger" data-toggle="modal" data-target="#'. esc_attr( $shortcode_rand_id ) .'">';
					$output .= isset( $link_text ) && $link_text != '' ? esc_attr( $link_text ) : esc_html( 'Modal Box', 'pixzlo' );
				$output .= '</a>';
			}elseif( $trigger_type == 'image' ){
				if( isset( $trigger_img ) && $trigger_img != '' ):
					$img_attr = wp_get_attachment_image_src( absint( $trigger_img ), 'full', true );
					$image_alt = get_post_meta( absint( $trigger_img ), '_wp_attachment_image_alt', true);
					$output .= isset( $img_attr[0] ) ? '<img class="img-fluid modal-box-trigger-img" src="'. esc_url( $img_attr[0] ) .'" width="'. esc_attr( $img_attr[1] ) .'" height="'. esc_attr( $img_attr[2] ) .'" data-toggle="modal" data-target="#'. esc_attr( $shortcode_rand_id ) .'" alt="'. esc_attr( $image_alt ) .'" />' : '';
				endif;
			}elseif( $trigger_type == 'text' ){
				if( isset( $trigger_icon ) && $trigger_icon != '' ):
					$output .= '<div class="modal-trigger-icon modal-box-trigger-img" data-toggle="modal" data-target="#'. esc_attr( $shortcode_rand_id ) .'"><div class="icon-wrap"><span class="'. esc_attr( $trigger_icon ) .'"></span></div></div>';
				endif;
			}
			// Modal 
			$output .= '<div class="modal fade" id="'. esc_attr( $shortcode_rand_id ) .'" tabindex="-1" role="dialog" aria-labelledby="'. esc_attr( $shortcode_rand_id ) .'" aria-hidden="true">';
				$output .= '<div class="modal-dialog'. esc_attr( $popup_size ) .'" role="document">';
					$output .= '<div class="modal-content">';
						$output .= '<div class="modal-header">';
							if( isset( $modal_title ) && $modal_title != '' ) $output .= '<h5 class="modal-title">'. esc_html( $modal_title ) .'</h5>';
							$output .= '<span class="modal-close icon-close" data-dismiss="modal"></span>';
						$output .= '</div>';
						$output .= '<div class="modal-body">';
							$output .= do_shortcode( $content );
						$output .= '</div>';
					$output .= '</div>';
				$output .= '</div>';
			$output .= '</div>';
		$output .= '</div><!-- .modal-popup-wrapper -->';
		return $output;
	}
}
if ( ! function_exists( "pixzlo_vc_modal_popup_shortcode_map" ) ) {
	function pixzlo_vc_modal_popup_shortcode_map() {
				
		vc_map( 
			array(
				"name"					=> esc_html__( "Modal Popup", "pixzlo" ),
				"description"			=> esc_html__( "Default popup box.", "pixzlo" ),
				"base"					=> "pixzlo_vc_modal_popup",
				"is_container"			=> true,
				"content_element"		=> true,
				"js_view" 				=> 'VcColumnView',
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
						"description"	=> esc_html__( "This is an option for modal popup text align", "pixzlo" ),
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
						"type"			=> "dropdown",
						"heading"		=> esc_html__( "Modal Popup Trigger Type", "pixzlo" ),
						"description"	=> esc_html__( "This is an option for modal popup trigger type. If you choose button, then set button style with Button tab.", "pixzlo" ),
						"param_name"	=> "trigger_type",
						"value"			=> array(
							esc_html__( "Button", "pixzlo" )	=> "btn",
							esc_html__( "Link", "pixzlo" )		=> "link",
							esc_html__( "Image", "pixzlo" )		=> "image",
							esc_html__( "Icon Class", "pixzlo" )		=> "text",
							esc_html__( "On Page Load", "pixzlo" ) => "load"
						),
						"group"			=> esc_html__( "Layouts", "pixzlo" )
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Link Text", "pixzlo" ),
						"description"	=> esc_html__( "Here you can put the modal popup trigger link text.", "pixzlo" ),
						"param_name"	=> "link_text",
						"value" 		=> "",
						'dependency' => array(
							'element' => 'trigger_type',
							'value' => 'link',
						),
						"group"			=> esc_html__( "Layouts", "pixzlo" )
					),
					array(
						"type"			=> "attach_image",
						"heading"		=> esc_html__( "Image", "pixzlo" ),
						"description"	=> esc_html__( "Here you can put the modal popup trigger image.", "pixzlo" ),
						"param_name"	=> "trigger_img",
						"value" 		=> "",
						'dependency' => array(
							'element' => 'trigger_type',
							'value' => 'image',
						),
						"group"			=> esc_html__( "Layouts", "pixzlo" )
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Icon Class Name", "pixzlo" ),
						"description"	=> esc_html__( "Here you can put the modal popup trigger custom icon class name. Example fa fa-play-circle-o", "pixzlo" ),
						"param_name"	=> "trigger_icon",
						"value" 		=> "",
						'dependency' => array(
							'element' => 'trigger_type',
							'value' => 'text',
						),
						"group"			=> esc_html__( "Layouts", "pixzlo" )
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Button Text", "pixzlo" ),
						"description"	=> esc_html__( "Here you can put the modal popup trigger button text.", "pixzlo" ),
						"param_name"	=> "btn_text",
						"value" 		=> "",
						"group"			=> esc_html__( "Button", "pixzlo" )
					),
					array(
						"type"			=> "colorpicker",
						"heading"		=> esc_html__( "Modal Popup Button Font Color", "pixzlo" ),
						"description"	=> esc_html__( "Here you can put the modal popup trigger button color.", "pixzlo" ),
						"param_name"	=> "btn_color",
						"group"			=> esc_html__( "Button", "pixzlo" )
					),
					array(
						"type"			=> "colorpicker",
						"heading"		=> esc_html__( "Modal Popup Button Font Hover Color", "pixzlo" ),
						"description"	=> esc_html__( "Here you can put the modal popup trigger button hover color.", "pixzlo" ),
						"param_name"	=> "btn_hcolor",
						"group"			=> esc_html__( "Button", "pixzlo" )
					),
					array(
						"type"			=> "colorpicker",
						"heading"		=> esc_html__( "Modal Popup Button Background Color", "pixzlo" ),
						"description"	=> esc_html__( "This is color option for modal popup trigger button background color.", "pixzlo" ),
						"param_name"	=> "btn_bg",
						"group"			=> esc_html__( "Button", "pixzlo" )
					),
					array(
						"type"			=> "colorpicker",
						"heading"		=> esc_html__( "Modal Popup Button Hover Background Color", "pixzlo" ),
						"description"	=> esc_html__( "This is color option for modal popup trigger button background hover color.", "pixzlo" ),
						"param_name"	=> "btn_hbg",
						"group"			=> esc_html__( "Button", "pixzlo" )
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Modal Box Title", "pixzlo" ),
						"description"	=> esc_html__( "Here you can put the modal popup box title.", "pixzlo" ),
						"param_name"	=> "modal_title",
						"value" 		=> "",
						"group"			=> esc_html__( "Title", "pixzlo" )
					),
					array(
						"type"			=> "colorpicker",
						"heading"		=> esc_html__( "Modal Box Title Color", "pixzlo" ),
						"description"	=> esc_html__( "Here you can put the modal popup box title color.", "pixzlo" ),
						"param_name"	=> "modal_title_color",
						"group"			=> esc_html__( "Title", "pixzlo" )
					),
					array(
						"type"			=> "dropdown",
						"heading"		=> esc_html__( "Popup Size", "pixzlo" ),
						"description"	=> esc_html__( "This is an option for modal popup window size.", "pixzlo" ),
						"param_name"	=> "popup_size",
						"value"			=> array(
							esc_html__( "Medium", "pixzlo" )	=> "md",
							esc_html__( "Large", "pixzlo" )		=> "lg",
							esc_html__( "Small", "pixzlo" )		=> "sm"
						),
						"group"			=> esc_html__( "Popup", "pixzlo" )
					),
				)
			) 
		);
	}
}
add_action( "vc_before_init", "pixzlo_vc_modal_popup_shortcode_map" );

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_Pixzlo_Vc_Modal_Popup extends WPBakeryShortCodesContainer {
    }
}