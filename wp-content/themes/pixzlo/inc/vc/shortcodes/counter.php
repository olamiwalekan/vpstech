<?php 
/**
 * Pixzlo Counter
 */
if ( ! function_exists( "pixzlo_vc_counter_shortcode" ) ) {
	function pixzlo_vc_counter_shortcode( $atts, $content = NULL ) {
		
		$atts = vc_map_get_attributes( "pixzlo_vc_counter", $atts );
		extract( $atts );
		
		//Define Variables
		$title = isset( $title ) && $title != '' ? $title : '';
		$content = isset( $content ) && $content != '' ? $content : '';
		$count_val = isset( $count_val ) && $count_val != '' ? $count_val : '';
		$icon_type = isset( $icon_type ) ? $icon_type : '';
		$animation = isset( $animation ) ? $animation : '';
		$counter_image = isset( $counter_image ) ? ' ' . $counter_image : '';	
		$count_suffix_val = isset( $count_suffix_val ) ? $count_suffix_val : '';	
		
		$icon = 'icon_' . esc_attr( $icon_type );
		$icon = isset( $$icon ) ? $$icon : '';
		$icon_variation = isset( $icon_variation ) ? $icon_variation : '';
		$icon_color = isset( $icon_color ) && $icon_variation == 'custom' ? $icon_color : '';
		
		$class = isset( $extra_class ) && $extra_class != '' ? $extra_class : '';	
		$counter_layout = isset( $counter_layout ) ? $counter_layout : '1';
		$class .= ' counter-style-' . $counter_layout;		
		$class .= isset( $text_align ) && $text_align != 'default' ? ' text-' . $text_align : '';		
		$icon_class = $icon_variation != 'custom' ? ' ' . $icon_variation : '';
		// Get VC Animation
		$class .= pixzloGetCSSAnimation( $animation );
		
		// Shortcode Css
		$pshortcode_css = '';
		$pshortcode_rand_id = $prand_class = 'shortcode-rand-'. pixzlo_shortcode_rand_id();
		$class .= ' ' . $pshortcode_rand_id;
		
		//Spacing
		if( isset( $sc_spacing ) && !empty( $sc_spacing ) ){
			$sc_spacing = preg_replace( '!\s+!', ' ', $sc_spacing );
			$space_arr = explode( " ", $sc_spacing );
			$i = 1;
			if( $counter_layout == '4' ){
				$space_class_name = '.' . esc_attr( $prand_class ) . '.counter-wrapper .media-body >';
			}else{
				$space_class_name = '.' . esc_attr( $prand_class ) . '.counter-wrapper >';
			}
			foreach( $space_arr as $space ){
				$pshortcode_css .= $space != 'default' ? $space_class_name .' *:nth-child('. esc_attr( $i ) .') { margin-bottom: '. esc_attr( $space ) .'; }' : '';
				$i++;
			}
		}
		
		//Shortcode css code here
		$pshortcode_css .= isset( $font_color ) && $font_color != '' ? '.' . esc_attr( $prand_class ) . '.counter-wrapper, .' . esc_attr( $prand_class ) . '.counter-wrapper h3, .' . esc_attr( $prand_class ) . '.counter-wrapper h4 { color: '. esc_attr( $font_color ) .'; }' : '';
		
		if( $pshortcode_css ) $class .= ' pixzlo-inline-css';
		
		$shortcode_css = '';
		if( $icon_color ){
			$rand_class = 'shortcode-rand-'. pixzlo_shortcode_rand_id();
			$class .= ' ' . $rand_class;
			$icon_class .= ' pixzlo-inline-css';
			$shortcode_css = '.' . esc_attr( $rand_class ) . ' .counter-icon > span { color: '. esc_attr( $icon_color ) .'; }';
		}
		
		$output = '';
		
		$elemetns = isset( $counter_items ) ? pixzlo_drag_and_drop_trim( $counter_items ) : array( 'Enabled' => '' );
	
		if( isset( $elemetns['Enabled'] ) ) :
		
			$output .= '<div class="counter-wrapper'. esc_attr( $class ) .'" data-css="'. htmlspecialchars( json_encode( $pshortcode_css ), ENT_QUOTES, 'UTF-8' ) .'">';
			
				if( $counter_layout == '4' ){
					$output .= '<div class="media">';
						if( isset( $elemetns['Enabled']['icon'] ) ){ 
							$output .= '<div class="counter-icon mr-3'. esc_attr( $icon_class ) .' mr-3" data-css="'. htmlspecialchars( json_encode( $shortcode_css ), ENT_QUOTES, 'UTF-8' ) .'">';
								$output .= '<span class="'. esc_attr( $icon ) .'"></span>';
							$output .= '</div><!-- .counter-icon -->';
						}elseif( isset( $elemetns['Enabled']['image'] ) ){
							if( $counter_image ){
								$img_attr = wp_get_attachment_image_src( absint( $counter_image ), 'full', true );
								$output .= '<div class="counter-thumb mr-3">';
									$image_alt = get_post_meta( absint( $counter_image ), '_wp_attachment_image_alt', true);
									$image_alt = $image_alt != '' ? $image_alt : $title;
									$output .= isset( $img_attr[0] ) ? '<img class="img-fluid" src="'. esc_url( $img_attr[0] ) .'" width="'. esc_attr( $img_attr[1] ) .'" height="'. esc_attr( $img_attr[2] ) .'" alt="'. esc_attr( $image_alt ) .'" />' : '';
								$output .= '</div><!-- .counter-thumb -->';
							}
						} 
						$output .= '<div class="media-body">';		
				}
		
				foreach( $elemetns['Enabled'] as $element => $value ){
					switch( $element ){
		
						case "title":
							$output .= '<div class="counter-title">';
								$output .= '<h4>'. esc_html( $title ) .'</h4>';
							$output .= '</div><!-- .counter-title -->';		
						break;
				
						case "icon":
							if( $counter_layout != '4' ):
								$output .= '<div class="counter-icon'. esc_attr( $icon_class ) .'" data-css="'. htmlspecialchars( json_encode( $shortcode_css ), ENT_QUOTES, 'UTF-8' ) .'">';
									$output .= '<span class="'. esc_attr( $icon ) .'"></span>';
								$output .= '</div><!-- .counter-icon -->';
							endif;
						break;
						
						case "image":
							if( $counter_layout != '4' && $counter_image ){
								$img_attr = wp_get_attachment_image_src( absint( $counter_image ), 'full', true );
								$output .= '<div class="counter-thumb">';
									$image_alt = get_post_meta( absint( $counter_image ), '_wp_attachment_image_alt', true);
									$image_alt = $image_alt != '' ? $image_alt : $title;
									$output .= isset( $img_attr[0] ) ? '<img class="img-fluid" src="'. esc_url( $img_attr[0] ) .'" width="'. esc_attr( $img_attr[1] ) .'" height="'. esc_attr( $img_attr[2] ) .'" alt="'. esc_attr( $image_alt ) .'" />' : '';
								$output .= '</div><!-- .counter-thumb -->';
							}
						break;
						
						case "count":
							$output .= '<div class="counter-value">';
								$output .= '<h3><span class="counter-up" data-count="'. esc_attr( $count_val ) .'">0</span>';
								$output .= $count_suffix_val ? '<span class="counter-suffix">'. esc_html( $count_suffix_val ) .'</span>' : '';
								$output .= '</h3>';
							$output .= '</div><!-- .counter-value -->';	
						break;
						
						case "content":
							$output .= '<div class="counter-content">';
								$output .= '<p>'. esc_textarea( $content ) .'</p>';
							$output .= '</div><!-- .counter-read-more -->';		
						break;
						
					}
				} // foreach end
				
				if( $counter_layout == '4' ){
						$output .= '</div><!-- .media-body -->';
					$output .= '</div><!-- .media -->';	
				}
				
			$output .= '</div><!-- .counter-wrapper -->';
				
		endif;
		return $output;
	}
}
if ( ! function_exists( "pixzlo_vc_counter_shortcode_map" ) ) {
	function pixzlo_vc_counter_shortcode_map() {
				
		vc_map( 
			array(
				"name"					=> esc_html__( "Counter", "pixzlo" ),
				"description"			=> esc_html__( "Numeric counter.", "pixzlo" ),
				"base"					=> "pixzlo_vc_counter",
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
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Title", "pixzlo" ),
						"description"	=> esc_html__( "Here you put the counter title.", "pixzlo" ),
						"param_name"	=> "title",
						"value" 		=> "",
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Count", "pixzlo" ),
						"description"	=> esc_html__( "Here you can place counter value. Example 200", "pixzlo" ),
						"param_name"	=> "count_val",
						"value" 		=> "",
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Counter Suffix", "pixzlo" ),
						"description"	=> esc_html__( "Here you can place counter suffix value. Example +", "pixzlo" ),
						"param_name"	=> "count_suffix_val",
						"value" 		=> "",
					),
					array(
						"type"			=> "textarea",
						"heading"		=> esc_html__( "Content", "pixzlo" ),
						"description"	=> esc_html__( "Here you put the counter content.", "pixzlo" ),
						"param_name"	=> "content",
						"value" 		=> "",
					),
					array(
						"type"			=> "colorpicker",
						"heading"		=> esc_html__( "Font Color", "pixzlo" ),
						"description"	=> esc_html__( "Here you can put the font color.", "pixzlo" ),
						"param_name"	=> "font_color",
						"group"			=> esc_html__( "Layouts", "pixzlo" )
					),
					array(
						"type"			=> "animation_style",
						"heading"		=> esc_html__( "Animation Style", "pixzlo" ),
						"description"	=> esc_html__( "Choose your animation style.", "pixzlo" ),
						"param_name"	=> "animation",
						'admin_label'	=> false,
                		'weight'		=> 0,
						"group"			=> esc_html__( "Layouts", "pixzlo" )
					),
					array(
						"type"			=> "img_select",
						"heading"		=> esc_html__( "Counter Layout", "pixzlo" ),
						"param_name"	=> "counter_layout",
						"img_lists" => array ( 
							"1"	=> PIXZLO_ADMIN_URL . "/assets/images/counter/1.png",
							"2"	=> PIXZLO_ADMIN_URL . "/assets/images/counter/2.png",
							"3"	=> PIXZLO_ADMIN_URL . "/assets/images/counter/3.png",
							"4"	=> PIXZLO_ADMIN_URL . "/assets/images/counter/4.png"
						),
						"default"		=> "1",
						"group"			=> esc_html__( "Layouts", "pixzlo" )
					),
					array(
						'type'			=> 'drag_drop',
						'heading'		=> esc_html__( 'Counter Items', 'pixzlo' ),
						"description"	=> esc_html__( "This is settings for counter custom layout. here you can set your own layout. Drag and drop needed counter items to Enabled part.", "pixzlo" ),
						'param_name'	=> 'counter_items',
						'dd_fields' => array ( 
							'Enabled' => array( 
								'icon'	=> esc_html__( 'Icon', 'pixzlo' ),
								'count'	=> esc_html__( 'Count Value', 'pixzlo' ),
								'title'	=> esc_html__( 'Title', 'pixzlo' )
								
							),
							'disabled' => array(
								'content'	=> esc_html__( 'Content', 'pixzlo' ),
								'image'		=> esc_html__( 'Image', 'pixzlo' )
							)
						),
						"group"			=> esc_html__( "Layouts", "pixzlo" )
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
						"group"			=> esc_html__( "Layouts", "pixzlo" ),
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
						"group"			=> esc_html__( "Layouts", "pixzlo" )
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
						"group"			=> esc_html__( "Layouts", "pixzlo" )
					),
					array(
						"type"			=> "dropdown",
						"heading"		=> esc_html__( "Icon Style", "pixzlo" ),
						"description"	=> esc_html__( "This is an option for counter icon style.", "pixzlo" ),
						"param_name"	=> "icon_variation",
						"value"			=> array(
							esc_html__( "Dark", "pixzlo" )		=> "icon-dark",
							esc_html__( "Light", "pixzlo" )		=> "icon-light",
							esc_html__( "Theme", "pixzlo" )		=> "theme-color",
							esc_html__( "Custom", "pixzlo" )	=> "custom"
						),
						"group"			=> esc_html__( "Layouts", "pixzlo" )
					),
					array(
						"type"			=> "colorpicker",
						"heading"		=> esc_html__( "Icon Color", "pixzlo" ),
						"description"	=> esc_html__( "Here you can put the counter icon color.", "pixzlo" ),
						"param_name"	=> "icon_color",
						'dependency' => array(
							'element' => 'icon_variation',
							'value' => 'custom',
						),
						"group"			=> esc_html__( "Layouts", "pixzlo" )
					),					
					array(
						"type"			=> "dropdown",
						"heading"		=> esc_html__( "Text Align", "pixzlo" ),
						"description"	=> esc_html__( "This is an option for counter text align", "pixzlo" ),
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
						"type" => "attach_image",
						"heading" => esc_html__( "Counter Image", "pixzlo" ),
						"description" => esc_html__( "Choose counter image instead of counter icon.", "pixzlo" ),
						"param_name" => "counter_image",
						"value" => '',
						"group"			=> esc_html__( "Image", "pixzlo" ),
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
add_action( "vc_before_init", "pixzlo_vc_counter_shortcode_map" );