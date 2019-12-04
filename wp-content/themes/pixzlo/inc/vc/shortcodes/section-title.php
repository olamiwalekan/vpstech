<?php 
/**
 * Pixzlo Section Title
 */
if ( ! function_exists( "pixzlo_vc_section_title_shortcode" ) ) {
	function pixzlo_vc_section_title_shortcode( $atts, $content = NULL ) {
		
		$atts = vc_map_get_attributes( "pixzlo_vc_section_title", $atts );
		extract( $atts );
		
		$output = '';
		
		//Define Variables
		$animation = isset( $animation ) ? $animation : '';
		$class = isset( $extra_class ) && $extra_class != '' ? ' ' . $extra_class : '';		
		$class .= isset( $text_align ) && $text_align != 'default' ? ' text-' . $text_align : '';	
		
		$title = isset( $title ) ? $title : '';
		$title_head = isset( $title_head ) ? $title_head : 'h1';
		$google_fonts = isset( $google_fonts ) ? $google_fonts : array();
		$background_title = isset( $background_title ) ? $background_title : '';
		$background_title_color = isset( $background_title_color ) ? $background_title_color : '';
				
		// Get VC Animation
		$class .= pixzloGetCSSAnimation( $animation );
		
		$shortcode_css = '';
		$shortcode_rand_id = $rand_class = 'shortcode-rand-'. pixzlo_shortcode_rand_id();
		
		if( !empty( $google_fonts ) ){
			$google_font_rand = str_replace( "-", "_", $shortcode_rand_id );
			$google_font_style = pixzlo_get_custom_google_font_con( $google_fonts, $google_font_rand );
			$shortcode_css .= isset( $google_font_style ) && $google_font_style != '' ? '.' . esc_attr( $rand_class ) . ' .background-title { '. ( $google_font_style ) .' }' : '';
		}
		
		$bg_title_class = '';
		if( !empty( $background_title_color ) ){ 
			$bg_title_class = ' bg-title-enabled';
			$shortcode_css .= '.' . esc_attr( $rand_class ) . ' .background-title { color: '. esc_attr( $background_title_color ) .'; }';
		}
		
		// Title Color/ Title Prefix / Title Suffix Coloe CSS / Title Typo Settings
		$shortcode_css .= isset( $title_prefix_color ) && $title_prefix_color != '' ? '.' . esc_attr( $rand_class ) . ' .section-title .title-prefix { color: '. esc_attr( $title_prefix_color ) .'; }' : '';
		$shortcode_css .= isset( $title_suffix_color ) && $title_suffix_color != '' ? '.' . esc_attr( $rand_class ) . ' .section-title .title-suffix { color: '. esc_attr( $title_suffix_color ) .'; }' : '';
		$shortcode_css .= isset( $title_margin ) && $title_margin != '' ? '.' . esc_attr( $rand_class ) . ' .title-wrap { margin: '. esc_attr( $title_margin ) .'; }' : '';
		
		
		$sep_border_color = isset( $sep_border_color ) ? $sep_border_color : '';
		$shortcode_css .= isset( $sep_type ) && $sep_type == 'border' ? '.' . esc_attr( $rand_class ) . ' .title-separator.separator-border { background-color: '. esc_attr( $sep_border_color ) .'; }' : '';
		
		$shortcode_css .= isset( $font_color ) && $font_color != '' ? '.' . esc_attr( $rand_class ) . '.section-title-wrapper { color: '. esc_attr( $font_color ) .'; }' : '';
		$shortcode_css .= isset( $sub_title_color ) && $sub_title_color != '' ? '.' . esc_attr( $rand_class ) . '.section-title-wrapper .sub-title { color: '. esc_attr( $sub_title_color ) .'; }' : '';
		
		//Spacing
		if( isset( $sc_spacing ) && !empty( $sc_spacing ) ){
			$sc_spacing = preg_replace( '!\s+!', ' ', $sc_spacing );
			$space_arr = explode( " ", $sc_spacing );
			$i = 1;
			$space_class_name = '.' . esc_attr( $rand_class ) . '.section-title-wrapper >';
			foreach( $space_arr as $space ){
				$shortcode_css .= $space != 'default' ? $space_class_name .' *:nth-child('. esc_attr( $i ) .') { margin-bottom: '. esc_attr( $space ) .'; }' : '';
				$i++;
			}
		}		
		
		$title_css = isset( $title_color ) && $title_color != '' ? ' color: '. esc_attr( $title_color ) .';' : '';
		$title_css .= isset( $font_size ) && $font_size != '' ? ' font-size: '. esc_attr( $font_size ) .'px;' : '';
		$title_css .= isset( $line_height ) && $line_height != '' ? ' line-height: '. esc_attr( $line_height ) .'px;' : '';
		$title_css .= isset( $title_trans ) && $title_trans != '' ? ' text-transform: '. esc_attr( $title_trans ) .';' : '';
		
		$shortcode_css .= $title_css != '' ? '.' . esc_attr( $rand_class ) . ' .section-title {' . $title_css . ' }' : '';
		
		if( $shortcode_css ) $class .= ' ' . $shortcode_rand_id . ' pixzlo-inline-css'; 
		
		$sub_title = isset( $sub_title ) && $sub_title != '' ? '<span class="sub-title">'. esc_html( $sub_title ) .'</span>' : ''; 
		$sub_title_pos = isset( $sub_title_pos ) ? $sub_title_pos : 'bottom';
		
		$output .= '<div class="section-title-wrapper'. esc_attr( $class ) .'" data-css="'. htmlspecialchars( json_encode( $shortcode_css ), ENT_QUOTES, 'UTF-8' ) .'">';
			
			$output .= '<div class="title-wrap'. esc_attr( $bg_title_class ) .'">';
			
				if( $background_title ){
					$output .= '<span class="background-title">'. esc_html( $background_title ) .'</span>'; 
				}
			
				// Section title 
				$output .= $sub_title != '' && $sub_title_pos == 'top' ? $sub_title : '';
				$output .= '<' . esc_attr( $title_head ) . ' class="section-title">';
					$output .= isset( $title_prefix ) && $title_prefix != '' ? '<span class="title-prefix theme-color">' . esc_html( $title_prefix ) . '</span> ' : '';
					$output .= esc_html( $title );
					$output .= isset( $title_suffix ) && $title_suffix != '' ? ' <span class="title-suffix theme-color">' . esc_html( $title_suffix ) . '</span>' : '';
				$output .= '</' . esc_attr( $title_head ) . '>';
				$output .= $sub_title != '' && $sub_title_pos == 'bottom' ? $sub_title : '';
				// Section title separator 
				$sep_type = isset( $sep_type ) ? $sep_type : 'border';
				if( $sep_type == 'border' ){
					$output .= '<span class="title-separator separator-border theme-color-bg"></span>';
				}elseif( $sep_type == 'image' ){
					$img_attr = wp_get_attachment_image_src( absint( $sep_image ), 'full', true );
					$image_alt = get_post_meta( absint( $sep_image ), '_wp_attachment_image_alt', true);
					$output .= isset( $img_attr[0] ) ? '<span class="title-separator separator-img"><img class="img-fluid" src="'. esc_url( $img_attr[0] ) .'" width="'. esc_attr( $img_attr[1] ) .'" height="'. esc_attr( $img_attr[2] ) .'" alt="'. esc_attr( $image_alt ) .'" /></span>' : '';
				}
			$output .= '</div><!-- .title-wrap -->';
			
			$output .= '<div class="section-description">';
				$output .= isset( $content ) && $content != '' ? wp_kses_post( $content ) : '';
			$output .= '</div><!-- .section-description -->';
			
			$output .= '<div class="button-section">';
				$btn_url = isset( $btn_url ) ? $btn_url : '';
				$btn_type = isset( $btn_type ) ? $btn_type : '';
				$output .= isset( $btn_text ) && $btn_text != '' ? '<p><a class="btn '. esc_attr( $btn_type ) .'" href="'. esc_url( $btn_url ) .'" title="'. esc_attr( $btn_text ) .'">'. esc_html( $btn_text ) .'</a></p>' : '';			
			$output .= '</div><!-- .button-section -->';
			
		$output .= '</div><!-- .section-title-wrapper -->';
		return $output;
	}
}
if ( ! function_exists( "pixzlo_vc_section_title_shortcode_map" ) ) {
	function pixzlo_vc_section_title_shortcode_map() {
				
		vc_map( 
			array(
				"name"					=> esc_html__( "Section Title", "pixzlo" ),
				"description"			=> esc_html__( "Variant section title.", "pixzlo" ),
				"base"					=> "pixzlo_vc_section_title",
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
						"heading"		=> esc_html__( "Title Heading Tag", "pixzlo" ),
						"description"	=> esc_html__( "This is an option for title heading tag", "pixzlo" ),
						"param_name"	=> "title_head",
						"value"			=> array(
							esc_html__( "H1", "pixzlo" )=> "h1",
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
						"heading"		=> esc_html__( "Title", "pixzlo" ),
						"description"	=> esc_html__( "Enter section title here.", "pixzlo" ),
						"param_name"	=> "title",
						"value" 		=> "",
						"group"			=> esc_html__( "Title", "pixzlo" )
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Title Prefix", "pixzlo" ),
						"description"	=> esc_html__( "Enter section title prefix. If no need title prefix, then leave this box blank.", "pixzlo" ),
						"param_name"	=> "title_prefix",
						"value" 		=> "",
						"group"			=> esc_html__( "Title", "pixzlo" )
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Title Suffix", "pixzlo" ),
						"description"	=> esc_html__( "Enter section title suffix. If no need title suffix, then leave this box blank.", "pixzlo" ),
						"param_name"	=> "title_suffix",
						"value" 		=> "",
						"group"			=> esc_html__( "Title", "pixzlo" )
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Background Title", "pixzlo" ),
						"description"	=> esc_html__( "Enter section title background title.", "pixzlo" ),
						"param_name"	=> "background_title",
						"value" 		=> "",
						"group"			=> esc_html__( "Title", "pixzlo" )
					),
					array(
						"type"			=> "google_fonts",
						"heading"		=> esc_html__( "Choose Background Title Font Name and Style", "pixzlo" ),
						"description"	=> esc_html__( "Choose background title section title font from google.", "pixzlo" ),
						"param_name"	=> "google_fonts",
						"value" 		=> "",
						"group"			=> esc_html__( "Title", "pixzlo" )
					),
					array(
						"type"			=> "colorpicker",
						"heading"		=> esc_html__( "Background Title Color", "pixzlo" ),
						"description"	=> esc_html__( "Here you can set the section background title color.", "pixzlo" ),
						"param_name"	=> "background_title_color",
						"group"			=> esc_html__( "Title", "pixzlo" )
					),
					array(
						"type"			=> "dropdown",
						"heading"		=> esc_html__( "Text Align", "pixzlo" ),
						"description"	=> esc_html__( "This is an option for section title text align.", "pixzlo" ),
						"param_name"	=> "text_align",
						"value"			=> array(
							esc_html__( "Default", "pixzlo" )	=> "default",
							esc_html__( "Left", "pixzlo" )		=> "left",
							esc_html__( "Center", "pixzlo" )	=> "center",
							esc_html__( "Right", "pixzlo" )		=> "right"
						),
						"group"			=> esc_html__( "Title", "pixzlo" )
					),
					array(
						"type"			=> "colorpicker",
						"heading"		=> esc_html__( "Title Color", "pixzlo" ),
						"description"	=> esc_html__( "Here you can set the section title color.", "pixzlo" ),
						"param_name"	=> "title_color",
						"group"			=> esc_html__( "Title", "pixzlo" )
					),
					array(
						"type"			=> "colorpicker",
						"heading"		=> esc_html__( "Title Prefix Color", "pixzlo" ),
						"description"	=> esc_html__( "Here you can set the section prefix title color.", "pixzlo" ),
						"param_name"	=> "title_prefix_color",
						"group"			=> esc_html__( "Title", "pixzlo" )
					),
					array(
						"type"			=> "colorpicker",
						"heading"		=> esc_html__( "Title Suffix Color", "pixzlo" ),
						"description"	=> esc_html__( "Here you can set the section title suffix color.", "pixzlo" ),
						"param_name"	=> "title_suffix_color",
						"group"			=> esc_html__( "Title", "pixzlo" )
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Font Size", "pixzlo" ),
						"description"	=> esc_html__( "Enter title font size. Example 30.", "pixzlo" ),
						"param_name"	=> "font_size",
						"value" 		=> "",
						"group"			=> esc_html__( "Title", "pixzlo" )
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Line Height", "pixzlo" ),
						"description"	=> esc_html__( "Enter title line height. Example 30.", "pixzlo" ),
						"param_name"	=> "line_height",
						"value" 		=> "",
						"group"			=> esc_html__( "Title", "pixzlo" )
					),
					array(
						"type" 			=> "dropdown",
						"heading" 		=> esc_html__( "Title Text Transform", "pixzlo" ),
						"param_name" 	=> "title_trans",
						"value" 		=> array(
							esc_html__( "None", "pixzlo" ) => "none",
							esc_html__( "Capitalize", "pixzlo" ) => "capitalize",
							esc_html__( "Upper Case", "pixzlo" )=> "uppercase",
							esc_html__( "Lower Case", "pixzlo" )=> "lowercase"
						),
						"group"			=> esc_html__( "Title", "pixzlo" ),
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Title Margin", "pixzlo" ),
						"description"	=> esc_html__( "Enter title margin here. Example 30px 20px 30px 20px.", "pixzlo" ),
						"param_name"	=> "title_margin",
						"value" 		=> "",
						"group"			=> esc_html__( "Title", "pixzlo" )
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Sub Title", "pixzlo" ),
						"description"	=> esc_html__( "Enter section title here. If no need sub title, then leave this box blank.", "pixzlo" ),
						"param_name"	=> "sub_title",
						"value" 		=> "",
						"group"			=> esc_html__( "Sub Title", "pixzlo" ),
					),
					array(
						"type" 			=> "dropdown",
						"heading" 		=> esc_html__( "Sub Title Position", "pixzlo" ),
						"param_name" 	=> "sub_title_pos",
						"value" 		=> array(
							esc_html__( "Bottom", "pixzlo" ) => "bottom",
							esc_html__( "Top", "pixzlo" )=> "top"
						),
						"group"			=> esc_html__( "Sub Title", "pixzlo" ),
					),
					array(
						"type"			=> "colorpicker",
						"heading"		=> esc_html__( "Sub Title Color", "pixzlo" ),
						"description"	=> esc_html__( "Here you can set the section sub title color.", "pixzlo" ),
						"param_name"	=> "sub_title_color",
						"group"			=> esc_html__( "Sub Title", "pixzlo" )
					),
					array(
						"type" 			=> "dropdown",
						"heading" 		=> esc_html__( "Separator Type", "pixzlo" ),
						"param_name" 	=> "sep_type",
						"value" 		=> array(
							esc_html__( "None", "pixzlo" ) => "none",
							esc_html__( "Border", "pixzlo" ) => "border",
							esc_html__( "Image", "pixzlo" )=> "image"
						),
						"group"			=> esc_html__( "Separator", "pixzlo" ),
					),
					array(
						"type"			=> "colorpicker",
						"heading"		=> esc_html__( "Title Separator Border", "pixzlo" ),
						"description"	=> esc_html__( "Here you can set the section title separator border color.", "pixzlo" ),
						"param_name"	=> "sep_border_color",
						'dependency' => array(
							'element' => 'sep_type',
							'value' => 'border',
						),
						"group"			=> esc_html__( "Separator", "pixzlo" )
					),
					array(
						"type" => "attach_image",
						"heading" => esc_html__( "Separator Image", "pixzlo" ),
						"description" => esc_html__( "Choose section title separator image.", "pixzlo" ),
						"param_name" => "sep_image",
						"value" => '',
						'dependency' => array(
							'element' => 'sep_type',
							'value' => 'image',
						),
						"group"			=> esc_html__( "Separator", "pixzlo" ),
					),
					array(
						"type"			=> "textarea_html",
						"heading"		=> esc_html__( "Content", "pixzlo" ),
						"description"	=> esc_html__( "Enter section title below content.", "pixzlo" ),
						"param_name"	=> "content",
						"value" 		=> "",
						"group"			=> esc_html__( "Content", "pixzlo" )
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
						"type"			=> "textarea",
						"heading"		=> esc_html__( "Items Spacing", "pixzlo" ),
						"description"	=> esc_html__( "Enter custom bottom space for each item on main wrapper. Your space values will apply like nth child method. If you leave this empty, default theme space apply for each child. If you want default value for any child, just type \"default\". It will take default value for that child. Example 10px 12px 8px", "pixzlo" ),
						"param_name"	=> "sc_spacing",
						"value" 		=> "",
						"group"			=> esc_html__( "Spacing", "pixzlo" ),
					)
				)
			) 
		);
	}
}
add_action( "vc_before_init", "pixzlo_vc_section_title_shortcode_map" );