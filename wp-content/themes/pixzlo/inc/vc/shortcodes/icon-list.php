<?php 
/**
 * Pixzlo List Item
 */
if ( ! function_exists( "pixzlo_vc_list_item_shortcode" ) ) {
	function pixzlo_vc_list_item_shortcode( $atts, $content = NULL ) {
		
		$atts = vc_map_get_attributes( "pixzlo_vc_list_item", $atts );
		extract( $atts );
		$output = $class = '';
		
		//Defined Variable
		$animation = isset( $animation ) ? $animation : '';
		$class_names = isset( $extra_class ) && $extra_class != '' ? ' ' . $extra_class : '';
		$class_names .= isset( $text_align ) && $text_align != 'default' ? ' text-' . $text_align : '';
		
		$list_items = isset( $list_items ) && $list_items != '' ? $list_items : '';
		
		// This is custom css options for main shortcode warpper
		$shortcode_css = '';
		$shortcode_rand_id = $rand_class = 'shortcode-rand-'. pixzlo_shortcode_rand_id();
		
		// Get VC Animation
		$class .= pixzloGetCSSAnimation( $animation );
		//Shortcode css ccde here
		$shortcode_css .= isset( $font_color ) && $font_color != '' ? '.' . esc_attr( $rand_class ) . '.list-item-wrapper { color: '. esc_attr( $font_color ) .'; }' : '';
		
		if( $shortcode_css ) $class_names .= ' ' . $shortcode_rand_id . ' pixzlo-inline-css';
		
		$output .= '<div class="list-item-wrapper'. esc_attr( $class_names ) .'" data-css="'. htmlspecialchars( json_encode( $shortcode_css ), ENT_QUOTES, 'UTF-8' ) .'">';
		//List Item Slide
			
			$list_items =  json_decode( urldecode( $list_items ), true ); // $prc_fetrs is pricing features
			if( $list_items ):
				foreach( $list_items as $list_item ) {
				
					$shortcode_css = '';
					$shortcode_rand_id = $rand_class = 'shortcode-rand-'. pixzlo_shortcode_rand_id();
					$icon_class = '';
					
					if( isset( $list_item['icon_variation'] ) ){
						$icon_variation =  isset( $list_item['icon_variation'] ) && $list_item['icon_variation'] != '' ? $list_item['icon_variation'] : '';
						$icon_color = isset( $list_item['icon_color'] ) && $list_item['icon_color'] != '' ? $list_item['icon_color'] : '';
						if( $icon_variation == 'c' ){
							$shortcode_css .= $icon_color ? '.' . esc_attr( $rand_class ) . ' .list-item-title span { color: '. esc_attr( $icon_color ) .'; }' : '';
						}else{
							$icon_class .= ' ' . esc_attr( $icon_variation );
						}
					}
					$icon_hcolor = isset( $list_item['icon_hcolor'] ) && $list_item['icon_hcolor'] != '' ? $list_item['icon_hcolor'] : '';
					$shortcode_css .= $icon_hcolor ? '.' . esc_attr( $rand_class ) . ':hover .list-item-title span { color: '. esc_attr( $icon_hcolor ) .'; }' : '';
					
					$inner_class = '';
					if( $shortcode_css ) $inner_class .= ' ' . $shortcode_rand_id . ' pixzlo-inline-css';
					
				
					$icon_type = isset( $list_item['icon_type'] ) ? 'icon_' . $list_item['icon_type'] : '';
					$icon = isset( $list_item[$icon_type] ) ? $list_item[$icon_type] : '';
					$list_title = isset( $list_item['list_title'] ) ? $list_item['list_title'] : '';
					$icon_class .= ' '. $icon;
					
					$output .= '<div class="list-item-inner'. esc_attr( $inner_class ) .'" data-css="'. htmlspecialchars( json_encode( $shortcode_css ), ENT_QUOTES, 'UTF-8' ) .'">';
						$output .= '<div class="list-item-title media">';
							$output .= '<span class="mr-3'. esc_attr( $icon_class ) .'"></span>';
							$output .= '<div class="media-body align-self-center list-item-desc">'. esc_html( $list_title ) .'</div>';
						$output .= '</div><!-- .list-item-title -->';
					$output .= '</div><!-- .list-item-inner -->';
				}
			endif;
			
		//List Item Slide End
		$output .= '</div><!-- .list-item-wrapper -->';
		
		return $output;
	}
}
if ( ! function_exists( "pixzlo_vc_list_item_shortcode_map" ) ) {
	function pixzlo_vc_list_item_shortcode_map() {
				
		vc_map( 
			array(
				"name"					=> esc_html__( "List Item", "pixzlo" ),
				"description"			=> esc_html__( "Simple List.", "pixzlo" ),
				"base"					=> "pixzlo_vc_list_item",
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
						"description"	=> esc_html__( "This is option for content carousel text align", "pixzlo" ),
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
						'type' => 'param_group',
						"heading"		=> esc_html__( "Price Features List", "pixzlo" ),
						'value' => '',
						'param_name' => 'list_items',
						'params' => array(
							array(
								"type" 			=> "dropdown",
								"heading" 		=> esc_html__( "Choose List Head Icon", "pixzlo" ),
								"value" 		=> array(
									esc_html__( "None", "pixzlo" ) 				=> "",
									esc_html__( "Font Awesome", "pixzlo" ) 		=> "fontawesome",
									esc_html__( "Simple Line Icons", "pixzlo" ) => "simplelineicons",
								),
								"admin_label" 	=> true,
								"param_name" 	=> "icon_type",
								"description" 	=> esc_html__( "Select list head icon from icons library.", "pixzlo" ),
								"group"			=> esc_html__( "Icon", "pixzlo" ),
							),		
							array(
								'type' => 'iconpicker',
								'heading' => esc_html__( 'Font Awesome', 'pixzlo' ),
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
								'heading' => esc_html__( 'Simple Line Icons', 'pixzlo' ),
								'param_name' => 'icon_simplelineicons',
								"value" 	=> "icon-star",
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
								"description"	=> esc_html__( "This is option for icon list icons style.", "pixzlo" ),
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
								"type"			=> "textfield",
								"heading"		=> esc_html__( "List Title", "pixzlo" ),
								'description' => esc_html__( 'Enter list title here.', 'pixzlo' ),
								"param_name"	=> "list_title",
								"value" 		=> "",
							),
						),
						"group"			=> esc_html__( "Layouts", "pixzlo" )
					),
				)
			) 
		);
	}
}
add_action( "vc_before_init", "pixzlo_vc_list_item_shortcode_map" );