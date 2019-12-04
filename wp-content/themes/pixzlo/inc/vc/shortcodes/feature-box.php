<?php 
/**
 * Pixzlo Feature Box
 */
if ( ! function_exists( "pixzlo_vc_feature_box_shortcode" ) ) {
	function pixzlo_vc_feature_box_shortcode( $atts, $content = NULL ) {
		
		$atts = vc_map_get_attributes( "pixzlo_vc_feature_box", $atts );
		extract( $atts );
		$output = '';
	
		//Defined Variable
		$animation = isset( $animation ) ? $animation : '';
		$class = isset( $extra_class ) && $extra_class != '' ? ' ' . $extra_class : '';		
		$class .= isset( $feature_layout ) ? ' feature-box-style-' . $feature_layout : '';	
		$class .= isset( $text_align ) && $text_align != 'default' ? ' text-' . $text_align : '';	
		
		
		// Get VC Animation
		$class .= pixzloGetCSSAnimation( $animation );
		
		$shortcode_css = '';
		$shortcode_rand_id = $rand_class = 'shortcode-rand-'. pixzlo_shortcode_rand_id();
		
		// VC Design Options
		$class .= apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), "pixzlo_vc_feature_box", $atts );
		
		//Shortcode css ccde here
		$shortcode_css .= isset( $title_color ) && $title_color != '' ? '.' . esc_attr( $rand_class ) . '.feature-box-wrapper .section-title { color: '. esc_attr( $title_color ) .'; }' : '';
		$shortcode_css .= isset( $title_text_trans ) && $title_text_trans != 'default' ? '.' . esc_attr( $rand_class ) . '.feature-box-wrapper .section-title { text-transform: '. esc_attr( $title_text_trans ) .'; }' : '';
		$shortcode_css .= isset( $font_color ) && $font_color != '' ? '.' . esc_attr( $rand_class ) . '.feature-box-wrapper { color: '. esc_attr( $font_color ) .'; }' : '';
		
		//Spacing
		if( isset( $sc_spacing ) && !empty( $sc_spacing ) ){
			$sc_spacing = preg_replace( '!\s+!', ' ', $sc_spacing );
			$space_arr = explode( " ", $sc_spacing );
			$i = 1;
			$space_class_name = '';
			if( $layout == 'list' ){
				$list_layout = isset( $list_layout ) ? $list_layout : 'list-1';
				if( $list_layout == 'list-2' ){
					$space_class_name = '.' . esc_attr( $rand_class ) . '.feature-box-wrapper .fbox-list >';
				}else{
					$space_class_name = '.' . esc_attr( $rand_class ) . '.feature-box-wrapper .fbox-list .media-body >';
				}	
			}else{
				$space_class_name = '.' . esc_attr( $rand_class ) . '.feature-box-wrapper >';
			}
			foreach( $space_arr as $space ){
				$shortcode_css .= $space != 'default' ? $space_class_name .' *:nth-child('. esc_attr( $i ) .') { margin-bottom: '. esc_attr( $space ) .'; }' : '';
				$i++;
			}
		}
		
		if( isset( $gradient_opt ) && $gradient_opt != '' ){
			$clr_1 = isset( $gradient_color_1 ) ? $gradient_color_1 : '';
			$clr_2 = isset( $gradient_color_2 ) ? $gradient_color_2 : '';
			$clr_3 = isset( $gradient_color_3 ) ? $gradient_color_3 : '';
			$shortcode_css .= '.' . esc_attr( $rand_class ) . '.feature-box-wrapper {';
				$shortcode_css .= 'background: -moz-linear-gradient(141deg, '. esc_attr( $clr_1 ) .' 0%, '. esc_attr( $clr_2 ) .' 51%, '. esc_attr( $clr_3 ) .' 75%);
				background: -webkit-linear-gradient(141deg, '. esc_attr( $clr_1 ) .' 0%, '. esc_attr( $clr_2 ) .' 51%, '. esc_attr( $clr_3 ) .' 75%);
				background: linear-gradient(141deg, '. esc_attr( $clr_1 ) .' 0%, '. esc_attr( $clr_2 ) .' 51%, '. esc_attr( $clr_3 ) .' 75%);';
			$shortcode_css .= '}';
		}
		
		
		if( isset( $icon_size ) && $icon_size ){
			$shortcode_css .= '.' . esc_attr( $rand_class ) . ' .feature-box-icon { font-size: '. esc_attr( $icon_size ) .'px; }';
			$dimension = absint( $icon_size ) * 2;
			if( isset( $icon_inner_space ) && !$icon_inner_space )
				$shortcode_css .= '.' . esc_attr( $rand_class ) . ' .feature-box-icon { height: '. esc_attr( $dimension ) .'px; width: '. esc_attr( $dimension ) .'px; }';
		}
		if( isset( $icon_midd ) && $icon_midd ){
			if( isset( $icon_inner_space ) && !$icon_inner_space )
				$shortcode_css .= '.' . esc_attr( $rand_class ) . ' .feature-box-icon > span { line-height: 2; }';
		}
		
		// Icon Variation/Styles
		$icon_type = isset( $icon_type ) ? 'icon_' . $icon_type : '';
		$icon = isset( $$icon_type ) ? $$icon_type : '';
		$icon_class = isset( $icon_style ) ? ' ' . $icon_style : '';
		
		//Number
		$number_opt = isset( $number_opt ) ? $number_opt : '';
		
		if( isset( $icon_variation ) ){
			if( $icon_variation == 'c' ){
				$shortcode_css .= isset( $icon_color ) && $icon_color != '' ? '.' . esc_attr( $rand_class ) . ' .feature-box-icon { color: '. esc_attr( $icon_color ) .'; }' : '';
			}else{
				$icon_class .= ' ' . esc_attr( $icon_variation );
			}
		}
		$shortcode_css .= isset( $icon_hcolor ) && $icon_hcolor != '' ? '.' . esc_attr( $rand_class ) . ':hover .feature-box-icon { color: '. esc_attr( $icon_hcolor ) .'; }' : '';
		if( isset( $icon_bg_trans ) ){
			if( $icon_bg_trans == 'c' ){
				$shortcode_css .= isset( $icon_bg_color ) && $icon_bg_color != '' ? '.' . esc_attr( $rand_class ) . ' .feature-box-icon { background-color: '. esc_attr( $icon_bg_color ) .'; }' : '';
			}elseif( $icon_bg_trans == 't' ){
				$shortcode_css .= '.' . esc_attr( $rand_class ) . ' .feature-box-icon { background: transparent; }';
			}else{
				$icon_class .= ' ' . esc_attr( $icon_bg_trans );
			}
			
		}
		if( isset( $icon_hbg_trans ) ){
		
			if( $icon_hbg_trans == 'c' ){
				$shortcode_css .= isset( $icon_hbg_color ) && $icon_hbg_color != '' ? '.' . esc_attr( $rand_class ) . ':hover .feature-box-icon { background-color: '. esc_attr( $icon_hbg_color ) .'; }' : '';
			}elseif( $icon_hbg_trans == 't' ){
				$shortcode_css .= '.' . esc_attr( $rand_class ) . ':hover .feature-box-icon { background: '. esc_attr( $icon_hbg_trans ) .'; }';
			}elseif( $icon_hbg_trans != 'none' ){
				$icon_class .= ' ' . esc_attr( $icon_hbg_trans );
			}
		}
		
		if( isset( $border_color ) && $border_color != '' ){
			$shortcode_css .= '.' . esc_attr( $rand_class ) . ' .feature-box-icon { border-style: solid; border-color: '. esc_attr( $border_color ) .'; }';
		}
		
		if( isset( $border_hcolor ) && $border_hcolor != '' ){
			$shortcode_css .= '.' . esc_attr( $rand_class ) . ':hover .feature-box-icon { border-color: '. esc_attr( $border_hcolor ) .'; }';
		}
		
		if( isset( $border_size ) && $border_size != '' ){
			$shortcode_css .= '.' . esc_attr( $rand_class ) . ' .feature-box-icon { border-width: '. esc_attr( $border_size ) .'px; }';
		}
		
		if( $shortcode_css ) $class .= ' ' . $shortcode_rand_id . ' pixzlo-inline-css';
		
		$title = isset( $title ) ? $title : '';
		$title_head = isset( $title_head ) ? $title_head : 'h2';
		$img_class = isset( $img_style ) ? ' ' . $img_style : ''; 
		$class .= isset( $img_effects ) && $img_effects != 'none' ? ' fbox-img-' . $img_effects : '';
		$fbox_image = isset( $fbox_image ) ? ' ' . $fbox_image : '';
		$video_url = isset( $fbox_video ) ? $fbox_video : '';
		
		$content = isset( $content ) && $content != '' ? $content : '';
		
		//Button Properties
		$btnn_txt = $btnn_type = $btnn_url = '';
		if( isset( $btn_text ) && $btn_text != '' ){
			$btnn_txt = $btn_text;
			$btnn_url = isset( $btn_url ) ? $btn_url : '';
			$btnn_type = isset( $btn_type ) ? $btn_type : '';
		}
		
		$layout = isset( $layout ) ? $layout : 'normal';
		
		if( $layout == 'list' ){
			$class .= isset( $list_layout ) ? ' feature-' . $list_layout : '';
		}		
		
		$tit_url = '';
		if( isset( $title_url_opt ) && $title_url_opt == 'yes' ){
			$tit_url = isset( $title_url ) ? $title_url : '';
		}
			
		$output .= '<div class="feature-box-wrapper'. esc_attr( $class ) .'" data-css="'. htmlspecialchars( json_encode( $shortcode_css ), ENT_QUOTES, 'UTF-8' ) .'">';
		
			$output .= isset( $ribbon_value ) && $ribbon_value != '' && $layout != 'list' && $feature_layout == '4' ? '<span class="feature-box-ribbon">'. esc_html( $ribbon_value ) .'</span>' : '';
			
			// Normal/Grid Layout
			if( $layout == 'normal' ):
			
				$opt_array = array(
					'icon_class' => $icon_class,
					'icon' => $icon,
					'img_id' => $fbox_image,
					'img_class' => $img_class,
					'img_effects' => $img_effects,
					'title' => $title,
					'title_url' => $tit_url,
					'title_head' => $title_head,
					'content' => $content,
					'btn_text' => $btnn_txt,
					'btn_url' => $btnn_url,
					'btn_type' => $btnn_type,
					'video'	=> $video_url,
					'number_opt' => $number_opt
				);
	
				$elemetns = isset( $fbox_items ) ? pixzlo_drag_and_drop_trim( $fbox_items ) : array( 'Enabled' => '' );
	
				if( isset( $elemetns['Enabled'] ) ) :
					foreach( $elemetns['Enabled'] as $element => $value ){
						$output .= pixzlo_feature_box_shortcode_elements( $element, $opt_array );
					}
				endif;
				
			elseif( $layout == 'list' ):
				
				$list_layout = isset( $list_layout ) ? $list_layout : 'list-1';
				$list_head = isset( $list_head ) ? $list_head : 'icon';
				
				$title_url_opt = isset( $title_url_opt ) ? $title_url_opt : '';
				$tit_url = isset( $title_url ) ? $title_url : '';
				
				if( $list_layout == 'list-1' ):
				
					$output .= '<div class="fbox-list">';
						$output .= '<div class="media">';
							if( $list_head == 'icon' ){
								$output .= '<div class="feature-box-icon mr-3 text-center'. esc_attr( $icon_class ) .'">';
									$output .= '<span class="'. esc_attr( $icon ) .'"></span>';
								$output .= '</div><!-- .feature-box-icon -->';
							}else{
								if( $list_head == 'invis_num' ){
									$output .= $number_opt ? '<h6 class="invisible-number">'. esc_html( $number_opt ) .'</h6>' : '';
								}else{
									if( $fbox_image ){
										$img_attr = wp_get_attachment_image_src( absint( $fbox_image ), 'full', true );
										$output .= '<div class="feature-box-thumb mr-3">';
											$image_alt = get_post_meta( absint( $fbox_image ), '_wp_attachment_image_alt', true);
											$image_alt = $image_alt != '' ? $image_alt : $title;
											$output .= isset( $img_attr[0] ) ? '<img class="img-fluid'. esc_attr( $img_class ) .'" src="'. esc_url( $img_attr[0] ) .'" width="'. esc_attr( $img_attr[1] ) .'" height="'. esc_attr( $img_attr[2] ) .'" alt="'. esc_attr( $image_alt ) .'" />' : '';
										$output .= '</div><!-- .feature-box-thumb -->';
									}
								}	
							}
							
							$output .= '<div class="media-body">';
							
								$output .= '<div class="feature-box-title">';
									$output .= '<' . esc_attr( $title_head ) . ' class="section-title">';
										$output .= pixzlo_feature_box_title( $title_url_opt, $tit_url, $title );
									$output .= '</' . esc_attr( $title_head ) . '>';
								$output .= '</div><!-- .feature-box-title -->';
								
								if( $content != '' ):
									$output .= '<div class="feature-box-content">';
										$output .= wp_kses_post( $content );
									$output .= '</div><!-- .feature-box-content -->';
								endif;
								
								if( $btnn_txt != '' ):
									$output .= '<div class="feature-box-btn">';
										$output .= '<a class="btn '. esc_attr( $btnn_type ) .'" href="'. esc_url( $btnn_url ) .'" title="'. esc_attr( $btnn_txt ) .'">'. esc_html( $btnn_txt ) .'</a>';
									$output .= '</div><!-- .feature-box-btn -->';
								endif;
								
							$output .= '</div>';
						$output .= '</div>';
					$output .= '</div>';
				
				elseif( $list_layout == 'list-2' ):
				
					$output .= '<div class="fbox-list">';
					
						$output .= '<div class="media fbox-list-head clearfix">';
							if( $list_head == 'icon' ){
								$output .= '<div class="feature-box-icon text-center'. esc_attr( $icon_class ) .'">';
									$output .= '<span class="'. esc_attr( $icon ) .'"></span>';
								$output .= '</div><!-- .feature-box-icon -->';
							}else{
								if( $fbox_image ){
									$img_attr = wp_get_attachment_image_src( absint( $fbox_image ), 'full', true );
									$output .= '<div class="feature-box-thumb">';
										$image_alt = get_post_meta( absint( $fbox_image ), '_wp_attachment_image_alt', true);
										$image_alt = $image_alt != '' ? $image_alt : $title;
										$output .= isset( $img_attr[0] ) ? '<img class="img-fluid'. esc_attr( $img_class ) .'" src="'. esc_url( $img_attr[0] ) .'" width="'. esc_attr( $img_attr[1] ) .'" height="'. esc_attr( $img_attr[2] ) .'"  alt="'. esc_attr( $image_alt ) .'" />' : '';
									$output .= '</div><!-- .feature-box-thumb -->';
								}
							}
							
							$output .= '<div class="media-body align-self-center feature-box-title">';
								$output .= $number_opt ? '<h6 class="invisible-number">'. esc_html( $number_opt ) .'</h6>' : '';
								$output .= '<' . esc_attr( $title_head ) . ' class="section-title">';
									$output .= pixzlo_feature_box_title( $title_url_opt, $tit_url, $title );
								$output .= '</' . esc_attr( $title_head ) . '>';
							$output .= '</div><!-- .feature-box-title -->';
						$output .= '</div><!-- .fbox-list-head -->';
						if( $content != '' ):
							$output .= '<div class="fbox-list-body">';
								$output .= '<div class="feature-box-content">';
									$output .= wp_kses_post( $content );
								$output .= '</div><!-- .feature-box-content -->';
							$output .= '</div>';
						endif;
						if( $btnn_txt != '' ):
							$output .= '<div class="feature-box-btn">';
								$output .= '<a class="btn '. esc_attr( $btnn_type ) .'" href="'. esc_url( $btnn_url ) .'" title="'. esc_attr( $btnn_txt ) .'">'. esc_html( $btnn_txt ) .'</a>';
							$output .= '</div><!-- .feature-box-btn -->';
						endif;
					$output .= '</div><!-- .fbox-list -->';
				elseif( $list_layout == 'list-3' ):
				
					$output .= '<div class="fbox-list">';
						$output .= '<div class="media">';
							
							$output .= '<div class="media-body">';
							
								$output .= '<div class="feature-box-title">';
									$output .= $number_opt ? '<h6 class="invisible-number">'. esc_html( $number_opt ) .'</h6>' : '';
									$output .= '<' . esc_attr( $title_head ) . ' class="section-title">';
										$output .= pixzlo_feature_box_title( $title_url_opt, $tit_url, $title );
									$output .= '</' . esc_attr( $title_head ) . '>';
								$output .= '</div><!-- .feature-box-title -->';
								
								if( $content != '' ):
									$output .= '<div class="feature-box-content">';
										$output .= wp_kses_post( $content );
									$output .= '</div><!-- .feature-box-content -->';
								endif;
								if( $btnn_txt != '' ):
									$output .= '<div class="feature-box-btn">';
										$output .= '<a class="btn '. esc_attr( $btnn_type ) .'" href="'. esc_url( $btnn_url ) .'" title="'. esc_attr( $btnn_txt ) .'">'. esc_html( $btnn_txt ) .'</a>';
									$output .= '</div><!-- .feature-box-btn -->';
								endif;
								
							$output .= '</div>';
							
							if( $list_head == 'icon' ){
								$output .= '<div class="feature-box-icon ml-3 text-center'. esc_attr( $icon_class ) .'">';
									$output .= '<span class="'. esc_attr( $icon ) .'"></span>';
								$output .= '</div><!-- .feature-box-icon -->';
							}else{
								if( $fbox_image ){
									$img_attr = wp_get_attachment_image_src( absint( $fbox_image ), 'full', true );
									$output .= '<div class="feature-box-thumb ml-3">';
										$image_alt = get_post_meta( absint( $fbox_image ), '_wp_attachment_image_alt', true);
										$image_alt = $image_alt != '' ? $image_alt : $title;
										$output .= isset( $img_attr[0] ) ? '<img class="img-fluid'. esc_attr( $img_class ) .'" src="'. esc_url( $img_attr[0] ) .'" width="'. esc_attr( $img_attr[1] ) .'" height="'. esc_attr( $img_attr[2] ) .'"  alt="'. esc_attr( $image_alt ) .'" />' : '';
									$output .= '</div><!-- .feature-box-thumb -->';
								}
							}
							
						$output .= '</div>';
					$output .= '</div>';
				endif;
				
			endif;
			
		$output .= '</div><!-- .feature-box-wrapper -->';
		
		return $output;
	}
}
function pixzlo_feature_box_title( $tit_opt, $tit_url, $title ){
	$output = '';
	if( $tit_opt == 'yes' && $tit_url != '' )
		$output .= '<a href="'. esc_url( $tit_url ) .'" title="'. esc_attr( $title ) .'" >'. esc_html( $title ) .'</a>';
	else
		$output .= esc_html( $title );
		
	return $output;
}
function pixzlo_feature_box_shortcode_elements( $element, $opts ){
	$output = '';
	switch( $element ){
	
		case "title":
			$output .= '<div class="feature-box-title">';
				$output .= isset( $opts['number_opt'] ) && $opts['number_opt'] != '' ? '<h6 class="invisible-number">'. esc_html( $opts['number_opt'] ) .'</h6>' : '';
				$output .= '<' . esc_attr( $opts['title_head'] ) . ' class="section-title">';
					if( $opts['title_url'] == '' )
						$output .= esc_html( $opts['title'] );
					else
						$output .= '<a href="'. esc_url( $opts['title_url'] ) .'" title="'. esc_attr( $opts['title'] ) .'" >'. esc_html( $opts['title'] ) .'</a>';
				$output .= '</' . esc_attr( $opts['title_head'] ) . '>';
			$output .= '</div><!-- .feature-box-title -->';		
		break;
		
		case "icon":
			$icon_class = $opts['icon_class'];
			$icon = $opts['icon'];
			if( $icon ):
				$output .= '<div class="feature-box-icon text-center'. esc_attr( $icon_class ) .'">';
					$output .= '<span class="'. esc_attr( $icon ) .'"></span>';
				$output .= '</div><!-- .feature-box-icon -->';
			endif;
		break;
		
		case "image":
			$img_id = $opts['img_id'];
			$img_class = $opts['img_class'];
			$img_attr = wp_get_attachment_image_src( absint( $img_id ), 'full', true );
			if( isset( $img_attr ) ):
				$output .= '<div class="feature-box-thumb">';
					$image_alt = get_post_meta( absint( $img_id ), '_wp_attachment_image_alt', true);
					$image_alt = $image_alt != '' ? $image_alt : esc_html( $opts['title'] );
					$output .= isset( $img_attr[0] ) ? '<img class="img-fluid'. esc_attr( $img_class ) .'" src="'. esc_url( $img_attr[0] ) .'" width="'. esc_attr( $img_attr[1] ) .'" height="'. esc_attr( $img_attr[2] ) .'" alt="'. esc_attr( $image_alt ) .'" />' : '';
				$output .= '</div><!-- .feature-box-thumb -->';
			endif;
		break;
		
		case "content":
			if( $opts['content'] != '' ):
				$output .= '<div class="feature-box-content">';
					$output .= wp_kses_post( $opts['content'] );
				$output .= '</div><!-- .feature-box-content -->';
			endif;
		break;
		
		case "btn":
			if( $opts['btn_text'] != '' ):
				$output .= '<div class="feature-box-btn">';
					$output .= '<a class="btn '. esc_attr( $opts['btn_type'] ) .'" href="'. esc_url( $opts['btn_url'] ) .'" title="'. esc_attr( $opts['btn_text'] ) .'">'. esc_html( $opts['btn_text'] ) .'</a>';
				$output .= '</div><!-- .feature-box-btn -->';
			endif;
		break;
		
		case "video":
			if( isset( $opts['video'] ) ) :
				$output .= '<div class="feature-box-video">';
					$output .= do_shortcode( '[videoframe url="'. esc_url( $opts['video'] ) .'" width="100%" height="100%" params="byline=0&portrait=0&badge=0" /]' );
				$output .= '</div><!-- .feature-box-video -->';
			endif;
		break;
		
	}
	return $output; 
}
if ( ! function_exists( "pixzlo_vc_feature_box_shortcode_map" ) ) {
	function pixzlo_vc_feature_box_shortcode_map() {
				
		vc_map( 
			array(
				"name"					=> esc_html__( "Feature Box", "pixzlo" ),
				"description"			=> esc_html__( "Ultimate feature box.", "pixzlo" ),
				"base"					=> "pixzlo_vc_feature_box",
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
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Title", "pixzlo" ),
						"param_name"	=> "title",
						"value" 		=> "",
						"group"			=> esc_html__( "Title", "pixzlo" )
					),
					array(
						"type"			=> "dropdown",
						"heading"		=> esc_html__( "Set Title as Link", "pixzlo" ),
						"description"	=> esc_html__( "This is option for feature box title as link. Enable yes to set title url.", "pixzlo" ),
						"param_name"	=> "title_url_opt",
						"value"			=> array(
							esc_html__( "No", "pixzlo" )	=> "no",
							esc_html__( "Yes", "pixzlo" )	=> "yes"
						),
						"group"			=> esc_html__( "Title", "pixzlo" )
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Title External Link", "pixzlo" ),
						"param_name"	=> "title_url",
						"value" 		=> "",
						'dependency' => array(
							'element' => 'title_url_opt',
							'value' => 'yes',
						),
						"group"			=> esc_html__( "Title", "pixzlo" )
					),
					array(
						"type"			=> "dropdown",
						"heading"		=> esc_html__( "Title Heading Tag", "pixzlo" ),
						"description"	=> esc_html__( "This is option for title heading tag", "pixzlo" ),
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
						"type"			=> "colorpicker",
						"heading"		=> esc_html__( "Title Color", "pixzlo" ),
						"description"	=> esc_html__( "Here you can put the font color.", "pixzlo" ),
						"param_name"	=> "title_color",
						"group"			=> esc_html__( "Title", "pixzlo" )
					),
					array(
						"type"			=> "dropdown",
						"heading"		=> esc_html__( "Title Heading Tag", "pixzlo" ),
						"description"	=> esc_html__( "This is option for title heading tag", "pixzlo" ),
						"param_name"	=> "title_text_trans",
						"value"			=> array(
							esc_html__( "Default", "pixzlo" )=> "default",
							esc_html__( "Capitalized", "pixzlo" )=> "capitalize",
							esc_html__( "Upper Case", "pixzlo" )=> "uppercase",
							esc_html__( "Lower Case", "pixzlo" )=> "lowercase"
						),
						"group"			=> esc_html__( "Title", "pixzlo" )
					),
					array(
						"type"			=> "img_select",
						"heading"		=> esc_html__( "Feature Box Layout", "pixzlo" ),
						"param_name"	=> "feature_layout",
						"img_lists" => array ( 
							"1"	=> PIXZLO_ADMIN_URL . "/assets/images/feature-box/1.png",
							"2"	=> PIXZLO_ADMIN_URL . "/assets/images/feature-box/2.png",
							"3"	=> PIXZLO_ADMIN_URL . "/assets/images/feature-box/3.png",
							"4"	=> PIXZLO_ADMIN_URL . "/assets/images/feature-box/4.png"
						),
						"default"		=> "1",
						"group"			=> esc_html__( "Layouts", "pixzlo" )
					),
					array(
						"type"			=> "dropdown",
						"heading"		=> esc_html__( "Text Align", "pixzlo" ),
						"description"	=> esc_html__( "This is option for feature box text align", "pixzlo" ),
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
						"heading"		=> esc_html__( "Feature Box Layout", "pixzlo" ),
						"description"	=> esc_html__( "This is option for feature box layout.", "pixzlo" ),
						"param_name"	=> "layout",
						"value"			=> array(
							esc_html__( "Normal", "pixzlo" )	=> "normal",
							esc_html__( "List Style", "pixzlo" )	=> "list"
						),
						"group"			=> esc_html__( "Layouts", "pixzlo" )
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Ribbon Values", "pixzlo" ),
						"description"	=> esc_html__( "This is option for corner rounded number like ribbon. This option working only when active feature box layout 4.", "pixzlo" ),
						"param_name"	=> "ribbon_value",
						"value" 		=> "",
						"group"			=> esc_html__( "Layouts", "pixzlo" )
					),
					array(
						'type'			=> 'drag_drop',
						'heading'		=> esc_html__( 'Feature Box Items', 'pixzlo' ),
						"description"	=> esc_html__( "This is settings for feature box custom layout. here you can set your own layout. Drag and drop needed feature items to Enabled part.", "pixzlo" ),
						'param_name'	=> 'fbox_items',
						'dd_fields' => array ( 
							'Enabled' => array( 
								'icon'	=> esc_html__( 'Icon', 'pixzlo' ),
								'title'	=> esc_html__( 'Title', 'pixzlo' ),
								'content'	=> esc_html__( 'Content', 'pixzlo' )					
							),
							'disabled' => array(
								'image'	=> esc_html__( 'Image', 'pixzlo' ),
								'btn'	=> esc_html__( 'Button', 'pixzlo' ),
								'video'	=> esc_html__( 'Video', 'pixzlo' )
							)
						),
						'dependency' => array(
							'element' => 'layout',
							'value' => 'normal',
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
						"type"			=> "dropdown",
						"heading"		=> esc_html__( "Gradient Background", "pixzlo" ),
						"description"	=> esc_html__( "This is option for enable gradient background. You must give three colors.", "pixzlo" ),
						"param_name"	=> "gradient_opt",
						"value"			=> array(
							esc_html__( "Disable", "pixzlo" )	=> "0",
							esc_html__( "Enable", "pixzlo" )	=> "1"
						),
						"group"			=> esc_html__( "Layouts", "pixzlo" )
					),
					array(
						"type"			=> "colorpicker",
						"heading"		=> esc_html__( "Gradient Color 1", "pixzlo" ),
						"description"	=> esc_html__( "Here you can choose gradient start color.", "pixzlo" ),
						"param_name"	=> "gradient_color_1",
						'dependency' => array(
							'element' => 'gradient_opt',
							'value' => '1',
						),
						"group"			=> esc_html__( "Layouts", "pixzlo" )
					),
					array(
						"type"			=> "colorpicker",
						"heading"		=> esc_html__( "Gradient Color 2", "pixzlo" ),
						"description"	=> esc_html__( "Here you can choose gradient middle color.", "pixzlo" ),
						"param_name"	=> "gradient_color_2",
						'dependency' => array(
							'element' => 'gradient_opt',
							'value' => '1',
						),
						"group"			=> esc_html__( "Layouts", "pixzlo" )
					),
					array(
						"type"			=> "colorpicker",
						"heading"		=> esc_html__( "Gradient Color 3", "pixzlo" ),
						"description"	=> esc_html__( "Here you can choose gradient end color.", "pixzlo" ),
						"param_name"	=> "gradient_color_3",
						'dependency' => array(
							'element' => 'gradient_opt',
							'value' => '1',
						),
						"group"			=> esc_html__( "Layouts", "pixzlo" )
					),
					array(
						"type"			=> "dropdown",
						"heading"		=> esc_html__( "Feature Box List Head", "pixzlo" ),
						"description"	=> esc_html__( "This is option for feature box list head item.", "pixzlo" ),
						"param_name"	=> "list_head",
						"value"			=> array(
							esc_html__( "Icon", "pixzlo" )	=> "icon",
							esc_html__( "Image", "pixzlo" )	=> "img",
							esc_html__( "Number", "pixzlo" )	=> "invis_num"
						),
						'dependency' => array(
							'element' => 'layout',
							'value' => 'list',
						),
						"group"			=> esc_html__( "Layouts", "pixzlo" )
					),
					array(
						"type"			=> "dropdown",
						"heading"		=> esc_html__( "Feature Box List Layout", "pixzlo" ),
						"description"	=> esc_html__( "This is option for feature box list layout.", "pixzlo" ),
						"param_name"	=> "list_layout",
						"value"			=> array(
							esc_html__( "List Style 1", "pixzlo" )	=> "list-1",
							esc_html__( "List Style 2", "pixzlo" )	=> "list-2",
							esc_html__( "List Style 3", "pixzlo" )	=> "list-3"
						),
						'dependency' => array(
							'element' => 'layout',
							'value' => 'list',
						),
						"group"			=> esc_html__( "Layouts", "pixzlo" )
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Icon Size", "pixzlo" ),
						"description" 	=> esc_html__( "This is option for set icon size. Example 30", "pixzlo" ),
						"param_name"	=> "icon_size",
						"value" 		=> "24",
						"group"			=> esc_html__( "Icon", "pixzlo" )
					),
					array(
						"type"			=> "dropdown",
						"heading"		=> esc_html__( "Icon Vertical Middle", "pixzlo" ),
						"description"	=> esc_html__( "This is option for feature box icon set vertically middle.", "pixzlo" ),
						"param_name"	=> "icon_midd",
						"value"			=> array(
							esc_html__( "Yes", "pixzlo" )	=> "1",
							esc_html__( "No", "pixzlo" )	=> "0"
						),
						"group"			=> esc_html__( "Icon", "pixzlo" )
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Numbered Option", "pixzlo" ),
						"description"	=> esc_html__( "Enter text for feature box number option. Example 01.", "pixzlo" ),
						"param_name"	=> "number_opt",
						"value"			=> "",
						"group"			=> esc_html__( "Layouts", "pixzlo" )
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
							esc_html__( "Themify Icons", "pixzlo" ) => "themifyicons",
							esc_html__( "Flat Icons", "pixzlo" ) => "flaticons",
							
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
						'type' => 'iconpicker',
						'heading' => esc_html__( 'Icon', 'pixzlo' ),
						'param_name' => 'icon_flaticons',
						"value" 	=> "vc_li vc_li-star",
						'settings' => array(
							'emptyIcon' => false,
							'type' => 'flaticons',
							'iconsPerPage' => 500,
						),
						'dependency' => array(
							'element' => 'icon_type',
							'value' => 'flaticons',
						),
						'description' => esc_html__( 'Select icon from library.', 'pixzlo' ),
						"group"			=> esc_html__( "Icon", "pixzlo" )
					),
					array(
						'type' => 'iconpicker',
						'heading' => esc_html__( 'Icon', 'pixzlo' ),
						'param_name' => 'icon_themifyicons',
						"value" 		=> "ti-star",
						'settings' => array(
							'emptyIcon' => false,
							'type' => 'themifyicons',
							'iconsPerPage' => 100,
						),
						'dependency' => array(
							'element' => 'icon_type',
							'value' => 'themifyicons',
						),
						'description' => esc_html__( 'Select icon from library.', 'pixzlo' ),
						"group"			=> esc_html__( "Icon", "pixzlo" )
					),
					array(
						"type"			=> "dropdown",
						"heading"		=> esc_html__( "Icon Style", "pixzlo" ),
						"description"	=> esc_html__( "This is option for feature box icon style.", "pixzlo" ),
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
							esc_html__( "None", "pixzlo" ) => "none",
							esc_html__( "Theme Color", "pixzlo" ) => "theme-color-bg",
							esc_html__( "Transparent", "pixzlo" ) => "t",
							esc_html__( "Custom Color", "pixzlo" )=> "c"
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
							esc_html__( "None", "pixzlo" ) => "none",
							esc_html__( "Theme Color", "pixzlo" ) => "theme-hcolor-bg",
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
						"type"			=> "colorpicker",
						"heading"		=> esc_html__( "Hover Border Color", "pixzlo" ),
						"description"	=> esc_html__( "Here you can put the hover border color.", "pixzlo" ),
						"param_name"	=> "border_hcolor",
						"group"			=> esc_html__( "Icon", "pixzlo" )
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Border Size", "pixzlo" ),
						"description"	=> esc_html__( "Here you can put the border size in value. Example 2", "pixzlo" ),
						"param_name"	=> "border_size",
						"value" 		=> "",
						"group"			=> esc_html__( "Icon", "pixzlo" )
					),
					array(
						"type" => "attach_image",
						"heading" => esc_html__( "Feature Box Image", "pixzlo" ),
						"description" => esc_html__( "Choose feature box image.", "pixzlo" ),
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
						"type"			=> "dropdown",
						"heading"		=> esc_html__( "Image Hover Effects", "pixzlo" ),
						"description"	=> esc_html__( "This is effects option for image hover.", "pixzlo" ),
						"param_name"	=> "img_effects",
						"value"			=> array(
							esc_html__( "None", "pixzlo" )=> "none",
							esc_html__( "Overlay", "pixzlo" )=> 'overlay',
							esc_html__( "Zoom In", "pixzlo" )=> 'zoomin',
							esc_html__( "Grayscale", "pixzlo" )=> 'grayscale',
							esc_html__( "Blur", "pixzlo" )=> 'blur'
						),
						"group"			=> esc_html__( "Image", "pixzlo" )
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__( "Feature Box Video", "pixzlo" ),
						"param_name" => "fbox_video",
						"value" => '',
						"description" => esc_html__( "Choose feature box video. This url maybe youtube or vimeo video. Example https://www.youtube.com/embed/qAHRvrrfGC4", "pixzlo" ),
						"group"			=> esc_html__( "Video", "pixzlo" )
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
						"type"			=> "textarea_html",
						"heading"		=> esc_html__( "Content", "pixzlo" ),
						"description" 	=> esc_html__( "You can give the feature box content here. HTML allowed here.", "pixzlo" ),
						"param_name"	=> "content",
						"value" 		=> "",
						"group"			=> esc_html__( "Content", "pixzlo" )
					),
					array(
						"type"			=> "textarea",
						"heading"		=> esc_html__( "Items Spacing", "pixzlo" ),
						"description"	=> esc_html__( "Enter custom bottom space for each item on main wrapper. Your space values will apply like nth child method. If you leave this empty, default theme space apply for each child. If you want default value for any child, just type \"default\". It will take default value for that child. Example 10px 12px 8px", "pixzlo" ),
						"param_name"	=> "sc_spacing",
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
add_action( "vc_before_init", "pixzlo_vc_feature_box_shortcode_map" );