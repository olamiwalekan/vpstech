<?php 
/**
 * Pixzlo Flip Box
 */
if ( ! function_exists( "pixzlo_vc_flip_box_shortcode" ) ) {
	function pixzlo_vc_flip_box_shortcode( $atts, $content = NULL ) {
		
		$atts = vc_map_get_attributes( "pixzlo_vc_flip_box", $atts );
		extract( $atts );
		$output = '';
	
		//Defined Variable
		$animation = isset( $animation ) ? $animation : '';
		$class = isset( $extra_class ) && $extra_class != '' ? ' ' . $extra_class : '';		
		$class .= isset( $text_align ) && $text_align != 'default' ? ' text-' . $text_align : '';	
		
		// Get VC Animation
		$class .= pixzloGetCSSAnimation( $animation );
		
		$shortcode_css = '';
		$shortcode_rand_id = $rand_class = 'shortcode-rand-'. pixzlo_shortcode_rand_id();
		
		// VC Design Options
		$class .= apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), "pixzlo_vc_flip_box", $atts );
		
		//Shortcode css ccde here
		$shortcode_css .= isset( $font_color ) && $font_color != '' ? '.' . esc_attr( $rand_class ) . '.flip-box-wrapper, .' . esc_attr( $rand_class ) . '.flip-box-wrapper .flip-box-title > * { color: '. esc_attr( $font_color ) .'; }' : '';
		$shortcode_css .= isset( $font_hcolor ) && $font_hcolor != '' ? '.' . esc_attr( $rand_class ) . '.flip-box-wrapper .flip-back, .' . esc_attr( $rand_class ) . '.flip-box-wrapper .flip-back .flip-box-title > * { color: '. esc_attr( $font_hcolor ) .'; }' : '';
		$shortcode_css .= isset( $front_bg ) && $front_bg != '' ? '.' . esc_attr( $rand_class ) . '.flip-box-wrapper .flip-front { background-color: '. esc_attr( $front_bg ) .'; }' : '';
		$shortcode_css .= isset( $back_bg ) && $back_bg != '' ? '.' . esc_attr( $rand_class ) . '.flip-box-wrapper .flip-back { background-color: '. esc_attr( $back_bg ) .'; }' : '';
		$shortcode_css .= isset( $front_padding ) && $front_padding != '' ? '.' . esc_attr( $rand_class ) . '.flip-box-wrapper .flip-front { padding-top: '. esc_attr( $front_padding ) .'px; padding-bottom: '. esc_attr( $front_padding ) .'px; }' : '';
		$shortcode_css .= isset( $back_padding ) && $back_padding != '' ? '.' . esc_attr( $rand_class ) . '.flip-box-wrapper .flip-back { padding-top: '. esc_attr( $back_padding ) .'px; padding-bottom: '. esc_attr( $back_padding ) .'px; }' : '';
		
		//Spacing
		if( isset( $sc_spacing ) && !empty( $sc_spacing ) ){
			$sc_spacing = preg_replace( '!\s+!', ' ', $sc_spacing );
			$space_arr = explode( " ", $sc_spacing );
			$i = 1;
			foreach( $space_arr as $space ){
				$shortcode_css .= $space != 'default' ? '.' . esc_attr( $rand_class ) . '.flip-box-wrapper .flip-front > div:nth-child('. esc_attr( $i ) .') { margin-bottom: '. esc_attr( $space ) .'; }' : '';
				$i++;
			}
		}
		
		if( isset( $sc_sspacing ) && !empty( $sc_sspacing ) ){
			$sc_sspacing = preg_replace( '!\s+!', ' ', $sc_sspacing );
			$sspace_arr = explode( " ", $sc_sspacing );
			$i = 1;
			foreach( $sspace_arr as $sspace ){
				$shortcode_css .= $sspace != 'default' ? '.' . esc_attr( $rand_class ) . '.flip-box-wrapper .flip-back > div:nth-child('. esc_attr( $i ) .') { margin-bottom: '. esc_attr( $sspace ) .'; }' : '';
				$i++;
			}
		}
		
		if( isset( $icon_size ) && $icon_size ){
			$shortcode_css .= '.' . esc_attr( $rand_class ) . ' .flip-box-icon { font-size: '. esc_attr( $icon_size ) .'px; }';
			$dimension = absint( $icon_size ) * 2;
			if( isset( $icon_inner_space ) && !$icon_inner_space )
				$shortcode_css .= '.' . esc_attr( $rand_class ) . ' .flip-box-icon { height: '. esc_attr( $dimension ) .'px; width: '. esc_attr( $dimension ) .'px; }';
		}
		if( isset( $icon_midd ) && $icon_midd ){
			if( isset( $icon_inner_space ) && !$icon_inner_space )
				$shortcode_css .= '.' . esc_attr( $rand_class ) . ' .flip-box-icon { line-height: 2; }';
		}
		
		if( isset( $secondary_icon_size ) && $secondary_icon_size ){
			$shortcode_css .= '.' . esc_attr( $rand_class ) . ' .flip-back .flip-box-icon { font-size: '. esc_attr( $secondary_icon_size ) .'px; }';
			$dimension = absint( $secondary_icon_size ) * 2;
			if( isset( $icon_inner_space ) && !$icon_inner_space )
				$shortcode_css .= '.' . esc_attr( $rand_class ) . ' .flip-back .flip-box-icon { height: '. esc_attr( $dimension ) .'px; width: '. esc_attr( $dimension ) .'px; }';
		}
		
		$icon_type = isset( $icon_type ) ? 'icon_' . $icon_type : '';
		$icon = isset( $$icon_type ) ? $$icon_type : '';
		$icon_class = isset( $icon_style ) ? ' ' . $icon_style : '';
		
		if( isset( $icon_variation ) ){
			if( $icon_variation == 'c' ){
				$shortcode_css .= isset( $icon_color ) && $icon_color != '' ? '.' . esc_attr( $rand_class ) . ' .flip-box-icon { color: '. esc_attr( $icon_color ) .'; }' : '';
			}else{
				$icon_class .= ' ' . esc_attr( $icon_variation );
			}
		}
		$shortcode_css .= isset( $icon_hcolor ) && $icon_hcolor != '' ? '.' . esc_attr( $rand_class ) . ':hover .flip-box-icon { color: '. esc_attr( $icon_hcolor ) .'; }' : '';
		if( isset( $icon_bg_trans ) ){
			if( $icon_bg_trans == 't' ){
				$shortcode_css .= '.' . esc_attr( $rand_class ) . ' .flip-box-icon { background: transparent; }';
			}elseif( $icon_bg_trans == 'c' ){
				$shortcode_css .= isset( $icon_bg_color ) && $icon_bg_color != '' ? '.' . esc_attr( $rand_class ) . ' .flip-box-icon { background-color: '. esc_attr( $icon_bg_color ) .'; }' : '';
			}else{
				$icon_class .= ' ' . esc_attr( $icon_bg_trans );
			}
		}
		if( isset( $icon_hbg_trans ) && $icon_hbg_trans == 't' ){
			$shortcode_css .= '.' . esc_attr( $rand_class ) . ':hover .flip-box-icon { background: transparent; }';
		}else{
			$shortcode_css .= isset( $icon_hbg_color ) && $icon_hbg_color != '' ? '.' . esc_attr( $rand_class ) . ':hover .flip-box-icon { background-color: '. esc_attr( $icon_hbg_color ) .'; }' : '';
		}
		
		if( isset( $border_color ) && $border_color != '' ){
			$shortcode_css .= '.' . esc_attr( $rand_class ) . ' .flip-box-icon { border-style: solid; border-color: '. esc_attr( $border_color ) .'; }';
			$shortcode_css .= isset( $border_size ) && $border_size != '' ? '.' . esc_attr( $rand_class ) . ' .icon-inner { border-width: '. esc_attr( $border_size ) .'px; }' : '';
		}
		
		//Button Properties
		$btnn_txt = $btnn_type = $btnn_url = '';
		if( isset( $btn_text ) && $btn_text != '' ){
			$btnn_txt = $btn_text;
			$btnn_url = isset( $btn_url ) ? $btn_url : '';
			$btnn_type = isset( $btn_type ) ? $btn_type : '';
		}
		
		if( $shortcode_css ) $class .= ' ' . $shortcode_rand_id . ' pixzlo-inline-css';
		
		$title = isset( $title ) ? $title : '';
		$title_head = isset( $title_head ) ? $title_head : 'h2';
		$img_class = isset( $img_style ) ? ' ' . $img_style : ''; 
		$fbox_image = isset( $fbox_image ) ? ' ' . $fbox_image : '';
		
		$content = isset( $content ) && $content != '' ? $content : '';
		
		$layout = isset( $layout ) ? $layout : 'normal';
			
		$output .= '<div class="flip-box-wrapper'. esc_attr( $class ) .'" data-css="'. htmlspecialchars( json_encode( $shortcode_css ), ENT_QUOTES, 'UTF-8' ) .'">';
			
			$opt_array = array(
				'icon_class' => $icon_class,
				'icon' => $icon,
				'img_id' => $fbox_image,
				'img_class' => $img_class,
				'title' => $title,
				'title_head' => $title_head,
				'content' => $content,
				'btn_text' => $btnn_txt,
				'btn_url' => $btnn_url,
				'btn_type' => $btnn_type
			);
			
			$inner_class = isset( $flip_style ) ? ' ' . $flip_style : ' imghvr-push-up';
			$p_elemetns = isset( $fbox_primary_items ) ? pixzlo_drag_and_drop_trim( $fbox_primary_items ) : array( 'Enabled' => '' );
			$s_elemetns = isset( $fbox_secondary_items ) ? pixzlo_drag_and_drop_trim( $fbox_secondary_items ) : array( 'Enabled' => '' );
			
			$output .= '<div class="flip-inner'. esc_attr( $inner_class ) .'">';
				$output .= '<div class="flip-front">';
					if( isset( $p_elemetns['Enabled'] ) ) :
						foreach( $p_elemetns['Enabled'] as $element => $value ){
							$output .= pixzlo_flip_box_shortcode_elements( $element, $opt_array );
						}
					endif;
				$output .= '</div><!-- .flip-front -->';
				
				$output .= '<div class="flip-back">';
					if( isset( $s_elemetns['Enabled'] ) ) :
						foreach( $s_elemetns['Enabled'] as $element => $value ){
							$output .= pixzlo_flip_box_shortcode_elements( $element, $opt_array );
						}
					endif;
				$output .= '</div><!-- .flip-back -->';
			$output .= '</div><!-- .flip-inner -->';
		$output .= '</div><!-- .flip-box-wrapper -->';
		
		return $output;
	}
}
function pixzlo_flip_box_shortcode_elements( $element, $opts ){
	$output = '';
	switch( $element ){
	
		case "title":
			$output .= '<div class="flip-box-title">';
				$output .= '<' . esc_attr( $opts['title_head'] ) . ' class="section-title">';
					$output .= esc_html( $opts['title'] );
				$output .= '</' . esc_attr( $opts['title_head'] ) . '>';
			$output .= '</div><!-- .flip-box-title -->';		
		break;
		
		case "icon":
			$icon_class = $opts['icon_class'];
			$icon = $opts['icon'];
			$output .= '<div class="flip-box-icon text-center'. esc_attr( $icon_class ) .'">';
				$output .= '<span class="'. esc_attr( $icon ) .'"></span>';
			$output .= '</div><!-- .flip-box-icon -->';
		break;
		
		case "image":
			$img_id = $opts['img_id'];
			$img_class = $opts['img_class'];
			$img_attr = wp_get_attachment_image_src( absint( $img_id ), 'full', true );
			if( isset( $img_attr ) ):
				$output .= '<div class="flip-box-thumb">';
					$image_alt = get_post_meta( absint( $img_id ), '_wp_attachment_image_alt', true);
					$image_alt = $image_alt != '' ? $image_alt : esc_html( $opts['title'] );
					$output .= isset( $img_attr[0] ) ? '<img class="img-fluid'. esc_attr( $img_class ) .'" src="'. esc_url( $img_attr[0] ) .'" width="'. esc_attr( $img_attr[1] ) .'" height="'. esc_attr( $img_attr[2] ) .'" alt="'. esc_attr( $image_alt ) .'" />' : '';
				$output .= '</div><!-- .flip-box-thumb -->';
			endif;
		break;
		
		case "btn":
			if( $opts['btn_text'] != '' ):
				$output .= '<div class="flip-box-btn">';
					$output .= '<a class="btn '. esc_attr( $opts['btn_type'] ) .'" href="'. esc_url( $opts['btn_url'] ) .'" title="'. esc_attr( $opts['btn_text'] ) .'">'. esc_html( $opts['btn_text'] ) .'</a>';
				$output .= '</div><!-- .flip-box-btn -->';
			endif;
		break;
		
		case "content":
			if( $opts['content'] != '' ):
				$output .= '<div class="flip-box-content">';
					$output .= wp_kses_post( $opts['content'] );
				$output .= '</div><!-- .flip-box-content -->';
			endif;
		break;
		
	}
	return $output; 
}
if ( ! function_exists( "pixzlo_vc_flip_box_shortcode_map" ) ) {
	function pixzlo_vc_flip_box_shortcode_map() {
				
		vc_map( 
			array(
				"name"					=> esc_html__( "Flip Box", "pixzlo" ),
				"description"			=> esc_html__( "Animated flip box.", "pixzlo" ),
				"base"					=> "pixzlo_vc_flip_box",
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
						"type"			=> "dropdown",
						"heading"		=> esc_html__( "Text Align", "pixzlo" ),
						"description"	=> esc_html__( "This is an option for flip box text align", "pixzlo" ),
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
						'type'			=> 'drag_drop',
						'heading'		=> esc_html__( 'Primary Box Items', 'pixzlo' ),
						"description"	=> esc_html__( "This is settings for primary box custom layout. here you can set your own layout. Drag and drop needed flip items to enabled part.", "pixzlo" ),
						'param_name'	=> 'fbox_primary_items',
						'dd_fields' => array ( 
							'Enabled' => array( 
								'icon'	=> esc_html__( 'Icon', 'pixzlo' ),
								'title'	=> esc_html__( 'Title', 'pixzlo' ),
								'content'	=> esc_html__( 'Content', 'pixzlo' )					
							),
							'disabled' => array(
								'btn'	=> esc_html__( 'Button', 'pixzlo' ),
								'image'	=> esc_html__( 'Image', 'pixzlo' )
							)
						),
						"group"			=> esc_html__( "Layouts", "pixzlo" )
					),
					array(
						'type'			=> 'drag_drop',
						'heading'		=> esc_html__( 'Secondary Box Items', 'pixzlo' ),
						"description"	=> esc_html__( "This is settings for secondary box custom layout. here you can set your own layout. Drag and drop needed flip items to enabled part.", "pixzlo" ),
						'param_name'	=> 'fbox_secondary_items',
						'dd_fields' => array ( 
							'Enabled' => array( 
								'icon'	=> esc_html__( 'Icon', 'pixzlo' ),
								'title'	=> esc_html__( 'Title', 'pixzlo' ),
								'content'	=> esc_html__( 'Content', 'pixzlo' )					
							),
							'disabled' => array(
								'btn'	=> esc_html__( 'Button', 'pixzlo' ),
								'image'	=> esc_html__( 'Image', 'pixzlo' )
							)
						),
						"group"			=> esc_html__( "Layouts", "pixzlo" )
					),
					array(
						"type"			=> "colorpicker",
						"heading"		=> esc_html__( "Font Color", "pixzlo" ),
						"description"	=> esc_html__( "Here you can put the font color.", "pixzlo" ),
						"param_name"	=> "font_color",
						"group"			=> esc_html__( "Layouts", "pixzlo" )
					),
					array(
						"type"			=> "colorpicker",
						"heading"		=> esc_html__( "Flip Box Secondary Font Color", "pixzlo" ),
						"description"	=> esc_html__( "Here you can put the flip box secondary color.", "pixzlo" ),
						"param_name"	=> "font_hcolor",
						"group"			=> esc_html__( "Layouts", "pixzlo" )
					),
					array(
						"type"			=> "colorpicker",
						"heading"		=> esc_html__( "Flip Box Primary Background Color", "pixzlo" ),
						"description"	=> esc_html__( "This is color option for before animate box background.", "pixzlo" ),
						"param_name"	=> "front_bg",
						"group"			=> esc_html__( "Layouts", "pixzlo" )
					),
					array(
						"type"			=> "colorpicker",
						"heading"		=> esc_html__( "Flip Box Secondary Background Color", "pixzlo" ),
						"description"	=> esc_html__( "This is color option for after animate box background.", "pixzlo" ),
						"param_name"	=> "back_bg",
						"group"			=> esc_html__( "Layouts", "pixzlo" )
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Flip Box Primary Padding", "pixzlo" ),
						"description"	=> esc_html__( "This is padding top and bottom settings for before animate box( primary box ). Example 20", "pixzlo" ),
						"param_name"	=> "front_padding",
						"value" 		=> "20",
						"group"			=> esc_html__( "Layouts", "pixzlo" )
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Flip Box Secondary Padding", "pixzlo" ),
						"description"	=> esc_html__( "This is padding top and bottom settings for after animate box( secondary box ). Example 20", "pixzlo" ),
						"param_name"	=> "back_padding",
						"value" 		=> "20",
						"group"			=> esc_html__( "Layouts", "pixzlo" )
					),
					array(
						"type"			=> "dropdown",
						"heading"		=> esc_html__( "Flip Box Hover Styles", "pixzlo" ),
						"description"	=> esc_html__( "This is an option for hover animation style flip box.", "pixzlo" ),
						"param_name"	=> "flip_style",
						"value"			=> array(
							esc_html__( "Fade", "pixzlo" )=> "imghvr-fade",
							esc_html__( "Push Up", "pixzlo" )=> "imghvr-push-up",
							esc_html__( "Push Down", "pixzlo" )=> "imghvr-push-down",
							esc_html__( "Push Left", "pixzlo" )=> "imghvr-push-left",
							esc_html__( "Push Right", "pixzlo" )=> "imghvr-push-right",
							esc_html__( "Slide Up", "pixzlo" )=> "imghvr-slide-up",
							esc_html__( "Slide Down", "pixzlo" )=> "imghvr-slide-down",
							esc_html__( "Slide Left", "pixzlo" )=> "imghvr-slide-left",
							esc_html__( "Slide Right", "pixzlo" )=> "imghvr-slide-right",
							esc_html__( "Reveal Up", "pixzlo" )=> "imghvr-reveal-up",
							esc_html__( "Reveal Down", "pixzlo" )=> "imghvr-reveal-down",
							esc_html__( "Reveal Left", "pixzlo" )=> "imghvr-reveal-left",
							esc_html__( "Reveal Right", "pixzlo" )=> "imghvr-reveal-right",
							esc_html__( "Hinge Up", "pixzlo" )=> "imghvr-hinge-up",
							esc_html__( "Hinge Down", "pixzlo" )=> "imghvr-hinge-down",
							esc_html__( "Hinge Left", "pixzlo" )=> "imghvr-hinge-left",
							esc_html__( "Hinge Right", "pixzlo" )=> "imghvr-hinge-right",
							esc_html__( "Flip Horizontal", "pixzlo" )=> "imghvr-flip-horiz",
							esc_html__( "Flip Vertical", "pixzlo" )=> "imghvr-flip-vert",
							esc_html__( "Diagonal 1", "pixzlo" )=> "imghvr-flip-diag-1",
							esc_html__( "Diagonal 2", "pixzlo" )=> "imghvr-flip-diag-2",
							esc_html__( "Shutter Out Horizontal", "pixzlo" )=> "imghvr-shutter-out-horiz",
							esc_html__( "Shutter Out Vertical", "pixzlo" )=> "imghvr-shutter-out-vert",
							esc_html__( "Shutter Out Diagonal 1", "pixzlo" )=> "imghvr-shutter-out-diag-1",
							esc_html__( "Shutter Out Diagonal 2", "pixzlo" )=> "imghvr-shutter-out-diag-2",
							esc_html__( "Shutter In Horizontal", "pixzlo" )=> "imghvr-shutter-in-horiz",
							esc_html__( "Shutter In Vertical", "pixzlo" )=> "imghvr-shutter-in-vert",
							esc_html__( "Shutter In Out Horizontal", "pixzlo" )=> "imghvr-shutter-in-out-horiz",
							esc_html__( "Shutter In Out Vertical", "pixzlo" )=> "imghvr-shutter-in-out-vert",
							esc_html__( "Shutter In Out Diagonal 1", "pixzlo" )=> "imghvr-shutter-in-out-diag-1",
							esc_html__( "Shutter In Out Diagonal 2", "pixzlo" )=> "imghvr-shutter-in-out-diag-2",
							esc_html__( "Fold Up", "pixzlo" )=> "imghvr-fold-up",
							esc_html__( "Fold Down", "pixzlo" )=> "imghvr-fold-down",
							esc_html__( "Fold Left", "pixzlo" )=> "imghvr-fold-left",
							esc_html__( "Fold Right", "pixzlo" )=> "imghvr-fold-right",
							esc_html__( "Zoom In", "pixzlo" )=> "imghvr-zoom-in",
							esc_html__( "Zoom Out", "pixzlo" )=> "imghvr-zoom-out",
							esc_html__( "Zoom Out Up", "pixzlo" )=> "imghvr-zoom-out-up",
							esc_html__( "Zoom Out Down", "pixzlo" )=> "imghvr-zoom-out-down",
							esc_html__( "Zoom Out Left", "pixzlo" )=> "imghvr-zoom-out-left",
							esc_html__( "Zoom Out Right", "pixzlo" )=> "imghvr-zoom-out-right",
							esc_html__( "Zoom Out Flip Horizontal", "pixzlo" )=> "imghvr-zoom-out-flip-horiz",
							esc_html__( "Zoom Out Flip Vertical", "pixzlo" )=> "imghvr-zoom-out-flip-vert",
							esc_html__( "Blur", "pixzlo" )=> "imghvr-blur",
						),
						"group"			=> esc_html__( "Layouts", "pixzlo" )
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Title", "pixzlo" ),
						"param_name"	=> "title",
						"value" 		=> "",
						"group"			=> esc_html__( "Title", "pixzlo" )
					),
					array(
						"type"			=> "dropdown",
						"heading"		=> esc_html__( "Title Heading Tag", "pixzlo" ),
						"description"	=> esc_html__( "This is an option for title heading tag", "pixzlo" ),
						"param_name"	=> "title_head",
						"value"			=> array(
							esc_html__( "H2", "pixzlo" )=> "h2",
							esc_html__( "H3", "pixzlo" )=> "h3",
							esc_html__( "H4", "pixzlo" )=> "h4",
							esc_html__( "H5", "pixzlo" )=> "h5",
							esc_html__( "H6", "pixzlo" )=> "h6"
						),
						"group"			=> esc_html__( "Title", "pixzlo" )
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Primary Box Icon Size", "pixzlo" ),
						"description" 	=> esc_html__( "This is an option for set primary icon size. Example 30", "pixzlo" ),
						"param_name"	=> "icon_size",
						"value" 		=> "24",
						"group"			=> esc_html__( "Icon", "pixzlo" )
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Secondary Box Icon Size", "pixzlo" ),
						"description" 	=> esc_html__( "This is an option for set secondary icon size. Example 30", "pixzlo" ),
						"param_name"	=> "secondary_icon_size",
						"value" 		=> "",
						"group"			=> esc_html__( "Icon", "pixzlo" )
					),
					array(
						"type"			=> "dropdown",
						"heading"		=> esc_html__( "Icon Vertical Middle", "pixzlo" ),
						"description"	=> esc_html__( "This is an option for feature box icon set vertically middle.", "pixzlo" ),
						"param_name"	=> "icon_midd",
						"value"			=> array(
							esc_html__( "Yes", "pixzlo" )	=> "1",
							esc_html__( "No", "pixzlo" )	=> "0"
						),
						"group"			=> esc_html__( "Icon", "pixzlo" )
					),
					array(
						"type"        => "checkbox",
						"heading"     => esc_html__( "Icon Inner Space Empty", "pixzlo" ),
						"description" => esc_html__( "check this to empty icon inner space.", "pixzlo" ),
						"param_name"  => "icon_inner_space",
						"value"       => array(
							'Check to 0 space' => '1'
						), //value
						"group"			=> esc_html__( "Icon", "pixzlo" )
					),
					array(
						"type" 			=> "dropdown",
						"heading" 		=> esc_html__( "Choose from Icon library", "pixzlo" ),
						"value" 		=> array(
							esc_html__( "None", "pixzlo" ) 				=> "",
							esc_html__( "Font Awesome", "pixzlo" ) 		=> "fontawesome",
							esc_html__( "Simple Line Icons", "pixzlo" ) => "simplelineicons",
						),
						"admin_label" 	=> true,
						"param_name" 	=> "icon_type",
						"description" 	=> esc_html__( "Select icon library.", "pixzlo" ),
						"group"			=> esc_html__( "Icon", "pixzlo" ),
					),		
					array(
						'type' => 'iconpicker',
						'heading' => esc_html__( 'Icon', 'pixzlo' ),
						'param_name' => 'icon_fontawesome',
						"value" 		=> "fa fa-heart-o",
						'settings' => array(
							'emptyIcon' => false,
							'type' => 'fontawesome',
							'iconsPerPage' => 675,
						),
						'dependency' => array(
							'element' => 'icon_type',
							'value' => 'fontawesome',
						),
						'description' => esc_html__( 'Select icon from library.', 'pixzlo' ),
						"group"			=> esc_html__( "Icon", "pixzlo" )
					),
					array(
						'type' => 'iconpicker',
						'heading' => esc_html__( 'Icon', 'pixzlo' ),
						'param_name' => 'icon_simplelineicons',
						"value" 	=> "vc_li vc_li-star",
						'settings' => array(
							'emptyIcon' => false,
							'type' => 'simplelineicons',
							'iconsPerPage' => 500,
						),
						'dependency' => array(
							'element' => 'icon_type',
							'value' => 'simplelineicons',
						),
						'description' => esc_html__( 'Select icon from library.', 'pixzlo' ),
						"group"			=> esc_html__( "Icon", "pixzlo" )
					),
					array(
						"type"			=> "dropdown",
						"heading"		=> esc_html__( "Icon Style", "pixzlo" ),
						"description"	=> esc_html__( "This is an option for flipbox icon style.", "pixzlo" ),
						"param_name"	=> "icon_variation",
						"value"			=> array(
							esc_html__( "Dark", "pixzlo" )		=> "icon-dark",
							esc_html__( "Light", "pixzlo" )		=> "icon-light",
							esc_html__( "Theme", "pixzlo" )		=> "theme-color",
							esc_html__( "Custom", "pixzlo" )	=> "c"
						),
						"group"			=> esc_html__( "Icon", "pixzlo" )
					),
					array(
						"type"			=> "colorpicker",
						"heading"		=> esc_html__( "Icon Color", "pixzlo" ),
						"description"	=> esc_html__( "Here you can put the icons icon color.", "pixzlo" ),
						"param_name"	=> "icon_color",
						'dependency' => array(
							'element' => 'icon_variation',
							'value' => 'c',
						),
						"group"			=> esc_html__( "Icon", "pixzlo" )
					),
					array(
						"type"			=> "colorpicker",
						"heading"		=> esc_html__( "Icon Hover Color", "pixzlo" ),
						"description"	=> esc_html__( "Here you can put the icon hover color.", "pixzlo" ),
						"param_name"	=> "icon_hcolor",
						"group"			=> esc_html__( "Icon", "pixzlo" )
					),
					array(
						"type" 			=> "dropdown",
						"heading" 		=> esc_html__( "Icon Background", "pixzlo" ),
						"value" 		=> array(
							esc_html__( "Transparent", "pixzlo" ) => "t",
							esc_html__( "Theme Color", "pixzlo" ) => "theme-color-bg",
							esc_html__( "Set Color", "pixzlo" )=> "c"
						),
						"param_name" 	=> "icon_bg_trans",
						"group"			=> esc_html__( "Icon", "pixzlo" ),
					),
					array(
						"type"			=> "colorpicker",
						"heading"		=> esc_html__( "Icon Background Color", "pixzlo" ),
						"description"	=> esc_html__( "Here you can put the icon background color.", "pixzlo" ),
						"param_name"	=> "icon_bg_color",
						'dependency' => array(
							'element' => 'icon_bg_trans',
							'value' => 'c',
						),
						"group"			=> esc_html__( "Icon", "pixzlo" )
					),
					array(
						"type" 			=> "dropdown",
						"heading" 		=> esc_html__( "Icon Background Hover", "pixzlo" ),
						"value" 		=> array(
							esc_html__( "Transparent", "pixzlo" ) => "t",
							esc_html__( "Set Color", "pixzlo" )=> "c"
						),
						"param_name" 	=> "icon_hbg_trans",
						"group"			=> esc_html__( "Icon", "pixzlo" ),
					),
					array(
						"type"			=> "colorpicker",
						"heading"		=> esc_html__( "Icon Background Hover Color", "pixzlo" ),
						"description"	=> esc_html__( "Here you can put the icon background hover color.", "pixzlo" ),
						"param_name"	=> "icon_hbg_color",
						'dependency' => array(
							'element' => 'icon_hbg_trans',
							'value' => 'c',
						),
						"group"			=> esc_html__( "Icon", "pixzlo" )
					),
					array(
						"type" 			=> "dropdown",
						"heading" 		=> esc_html__( "Icon Style", "pixzlo" ),
						"value" 		=> array(
							esc_html__( "Squared", "pixzlo" ) => "squared",
							esc_html__( "Rounded", "pixzlo" ) => "rounded",
							esc_html__( "Circled", "pixzlo" ) => "rounded-circle",
						),
						"param_name" 	=> "icon_style",
						"group"			=> esc_html__( "Icon", "pixzlo" ),
					),
					array(
						"type"			=> "colorpicker",
						"heading"		=> esc_html__( "Border Color", "pixzlo" ),
						"description"	=> esc_html__( "Here you can put the border color.", "pixzlo" ),
						"param_name"	=> "border_color",
						"group"			=> esc_html__( "Icon", "pixzlo" )
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Border Size", "pixzlo" ),
						"param_name"	=> "border_size",
						"value" 		=> "",
						"group"			=> esc_html__( "Icon", "pixzlo" )
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Button Text", "pixzlo" ),
						"description"	=> esc_html__( "Enter section button text here. If no need button, then leave this box blank.", "pixzlo" ),
						"param_name"	=> "btn_text",
						"value" 		=> "",
						"group"			=> esc_html__( "Button", "pixzlo" ),
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Button URL", "pixzlo" ),
						"description"	=> esc_html__( "Enter section button url here. If no need button url, then leave this box blank.", "pixzlo" ),
						"param_name"	=> "btn_url",
						"value" 		=> "",
						"group"			=> esc_html__( "Button", "pixzlo" ),
					),
					array(
						"type" 			=> "dropdown",
						"heading" 		=> esc_html__( "Button Type", "pixzlo" ),
						"param_name" 	=> "btn_type",
						"value" 		=> array(
							esc_html__( "Default", "pixzlo" )	=> "default",
							esc_html__( "Link", "pixzlo" )		=> "link",
							esc_html__( "Classic", "pixzlo" )	=> "classic",
							esc_html__( "Bordered", "pixzlo" )	=> "bordered",
							esc_html__( "Inverse", "pixzlo" )	=> "inverse"
						),
						"group"			=> esc_html__( "Button", "pixzlo" ),
					),
					array(
						"type" => "attach_image",
						"heading" => esc_html__( "Flip Box Image", "pixzlo" ),
						"description" => esc_html__( "Choose flip box image.", "pixzlo" ),
						"param_name" => "fbox_image",
						"value" => '',
						"group"			=> esc_html__( "Image", "pixzlo" ),
					),
					array(
						"type" 			=> "dropdown",
						"heading" 		=> esc_html__( "Image Style", "pixzlo" ),
						"value" 		=> array(
							esc_html__( "Squared", "pixzlo" ) => "squared",
							esc_html__( "Rounded", "pixzlo" ) => "rounded",
							esc_html__( "Circled", "pixzlo" ) => "rounded-circle",
						),
						"param_name" 	=> "img_style",
						"group"			=> esc_html__( "Image", "pixzlo" ),
					),
					array(
						"type"			=> "textarea_html",
						"heading"		=> esc_html__( "Content", "pixzlo" ),
						"description" 	=> esc_html__( "You can give the flip box content here. HTML allowed here.", "pixzlo" ),
						"param_name"	=> "content",
						"value" 		=> "",
						"group"			=> esc_html__( "Content", "pixzlo" )
					),
					array(
						"type"			=> "textarea",
						"heading"		=> esc_html__( "Primary Items Spacing", "pixzlo" ),
						"description"	=> esc_html__( "Enter custom bottom space for each primary item on main wrapper. Your space values will apply like nth child method. If you leave this empty, default theme space apply for each child. If you want default value for any child, just type \"default\". It will take default value for that child. Example 10px 12px 8px", "pixzlo" ),
						"param_name"	=> "sc_spacing",
						"value" 		=> "",
						"group"			=> esc_html__( "Spacing", "pixzlo" ),
					),
					array(
						"type"			=> "textarea",
						"heading"		=> esc_html__( "Secondary Items Spacing", "pixzlo" ),
						"description"	=> esc_html__( "Enter custom bottom space for each secondary item on main wrapper. Your space values will apply like nth child method. If you leave this empty, default theme space apply for each child. If you want default value for any child, just type \"default\". It will take default value for that child. Example 10px 12px 8px", "pixzlo" ),
						"param_name"	=> "sc_sspacing",
						"value" 		=> "",
						"group"			=> esc_html__( "Spacing", "pixzlo" ),
					),
					array(
						'type'		=> "css_editor",
						'heading'	=> esc_html__( "Css", 'pixzlo' ),
						'param_name'=> "css",
						'group'		=> esc_html__( "Design options", "pixzlo" ),
					),
				)
			) 
		);
	}
}
add_action( "vc_before_init", "pixzlo_vc_flip_box_shortcode_map" );