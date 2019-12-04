<?php 
/**
 * Pixzlo Services
 */
if ( ! function_exists( "pixzlo_vc_services_shortcode" ) ) {
	function pixzlo_vc_services_shortcode( $atts, $content = NULL ) {
		
		$atts = vc_map_get_attributes( "pixzlo_vc_services", $atts ); 
		extract( $atts );
		$output = '';
	
		//Defined Variable
		$class_names = isset( $extra_class ) && $extra_class != '' ? ' ' . $extra_class : '';
		$post_per_page = isset( $post_per_page ) && $post_per_page != '' ? $post_per_page : '';
		$excerpt_length = isset( $excerpt_length ) && $excerpt_length != '' ? $excerpt_length : 0;
		$class_names .= isset( $services_layout ) ? ' services-' . $services_layout : ' services-1';
		$class_names .= isset( $text_align ) && $text_align != 'default' ? ' text-' . $text_align : '';
		$class_names .= isset( $variation ) ? ' services-' . $variation : '';
		$cols = isset( $service_cols ) ? $service_cols : 1;
		$read_more = isset( $read_more ) ? $read_more : '';
		$button_type = isset( $button_type ) && $button_type == 'button' ? ' btn btn-default' : '';
		$title_head = isset( $title_head ) ? $title_head : 'h4';
		
		$thumb_size = isset( $image_size ) ? $image_size : '';
		$cus_thumb_size = '';
		if( $thumb_size == 'custom' ){
			$cus_thumb_size = isset( $custom_image_size ) && $custom_image_size != '' ? $custom_image_size : '';
		}
		
		$service_overlay_opt = isset( $service_overlay_opt ) && $service_overlay_opt == 'yes' ? true : false;
		$service_overlay_items = isset( $services_overlay_items ) ? pixzlo_drag_and_drop_trim( $services_overlay_items ) : array( 'Enabled' => array() );
		$service_pagi_items = isset( $service_pagi_items ) ? pixzlo_drag_and_drop_trim( $service_pagi_items ) : array( 'Enabled' => array() );
		$pagi_position = isset( $service_pagi_position ) ? $service_pagi_position : 'bottom';
		$pagi_class_names = isset( $pagi_text_align ) && $pagi_text_align != 'default' ? ' text-' . $pagi_text_align : '';
		
		// This is custom css options for main shortcode warpper
		$shortcode_css = '';
		$shortcode_rand_id = $rand_class = 'shortcode-rand-'. pixzlo_shortcode_rand_id();
		
		//Spacing
		if( isset( $sc_spacing ) && !empty( $sc_spacing ) ){
			$sc_spacing = preg_replace( '!\s+!', ' ', $sc_spacing );
			$space_arr = explode( " ", $sc_spacing );
			$i = 1;
			$space_class_name = '.' . esc_attr( $rand_class ) . '.services-wrapper .services-inner >';
			foreach( $space_arr as $space ){
				$shortcode_css .= $space != 'default' ? $space_class_name .' *:nth-child('. esc_attr( $i ) .') { margin-bottom: '. esc_attr( $space ) .'; }' : '';
				$i++;
			}
		}
		
		//Shortcode css ccde here
		$shortcode_css .= isset( $font_color ) && $font_color != '' ? '.' . esc_attr( $rand_class ) . '.services-wrapper, .' . esc_attr( $rand_class ) . '.services-wrapper.services-dark .services-inner { color: '. esc_attr( $font_color ) .'; }' : '';
		
		if( $shortcode_css ) $class_names .= ' ' . $shortcode_rand_id . ' pixzlo-inline-css';
		
		//Number
		$number_opt = isset( $number_opt ) && $number_opt == 'on' ? true : false;
		$icon_opt = isset( $icon_opt ) && $icon_opt == 'on' ? true : false;   
		
		$gal_atts = '';
		if( isset( $slide_opt ) && $slide_opt == 'on' ){
			if( isset( $slide_dots_type ) && $slide_dots_type == 'content' ){
				$gal_atts = array(
					'data-loop="0"',
					'data-margin="0"',
					'data-center="0"',
					'data-nav="'. ( isset( $slide_nav ) && $slide_nav == 'on' ? 1 : 0 ) .'"',
					'data-dots="0"',
					'data-autoplay="'. ( isset( $slide_item_autoplay ) && $slide_item_autoplay == 'on' ? 1 : 0 ) .'"',
					'data-items="1"',
					'data-items-tab="1"',
					'data-items-mob="1"',
					'data-duration="'. ( isset( $slide_duration ) && $slide_duration != '' ? absint( $slide_duration ) : 5000 ) .'"',
					'data-smartspeed="'. ( isset( $slide_smart_speed ) && $slide_smart_speed != '' ? absint( $slide_smart_speed ) : 250 ) .'"',
					'data-scrollby="1"',
					'data-autoheight="false"',
				); 
			}else{
				$gal_atts = array(
					'data-loop="'. ( isset( $slide_item_loop ) && $slide_item_loop == 'on' ? 1 : 0 ) .'"',
					'data-margin="'. ( isset( $slide_margin ) && $slide_margin != '' ? absint( $slide_margin ) : 0 ) .'"',
					'data-center="'. ( isset( $slide_center ) && $slide_center == 'on' ? 1 : 0 ) .'"',
					'data-nav="'. ( isset( $slide_nav ) && $slide_nav == 'on' ? 1 : 0 ) .'"',
					'data-dots="'. ( isset( $slide_opt ) && $slide_opt == 'on' ? 1 : 0 ) .'"',
					'data-autoplay="'. ( isset( $slide_item_autoplay ) && $slide_item_autoplay == 'on' ? 1 : 0 ) .'"',
					'data-items="'. ( isset( $slide_item ) && $slide_item != ''  ? absint( $slide_item ) : 1 ) .'"',
					'data-items-tab="'. ( isset( $slide_item_tab ) && $slide_item_tab != '' ? absint( $slide_item_tab ) : 1 ) .'"',
					'data-items-mob="'. ( isset( $slide_item_mobile ) && $slide_item_mobile != '' ? absint( $slide_item_mobile ) : 1 ) .'"',
					'data-duration="'. ( isset( $slide_duration ) && $slide_duration != '' ? absint( $slide_duration ) : 5000 ) .'"',
					'data-smartspeed="'. ( isset( $slide_smart_speed ) && $slide_smart_speed != '' ? absint( $slide_smart_speed ) : 250 ) .'"',
					'data-scrollby="'. ( isset( $slide_slideby ) && $slide_slideby != '' ? absint( $slide_slideby ) : 1 ) .'"',
					'data-autoheight="false"',
				); 
			}
			$data_atts = implode( " ", $gal_atts );
		}
		
		$pagination_atts = $thumb_data_atts = '';
		if( isset( $slide_opt ) && $slide_opt == 'on' ){
			$pagination_atts = array(
				'data-loop="0"',
				'data-margin="10"',
				'data-center="false"',
				'data-nav="false"',
				'data-dots="false"',
				'data-autoplay="false"',
				'data-items="'. ( isset( $slide_pagi_item ) && $slide_pagi_item != '' ? absint( $slide_pagi_item ) : 3 ) .'"',
				'data-items-tab="2"',
				'data-items-mob="1"',
				'data-duration=""',
				'data-smartspeed="'. ( isset( $slide_smart_speed ) && $slide_smart_speed != '' ? absint( $slide_smart_speed ) : 250 ) .'"',
				'data-scrollby=""',
				'data-autoheight="false"',
			);
			$thumb_data_atts = implode( " ", $pagination_atts );
		}		
		
		
		$args = array(
			'post_type' => 'pixzlo-service',
			'posts_per_page' => absint( $post_per_page ),
			'ignore_sticky_posts' => 1
		);
		
		$elemetns = isset( $services_items ) ? pixzlo_drag_and_drop_trim( $services_items ) : array( 'Enabled' => '' );
		
		$page_slide_out = '';
		$pagi_opt = isset( $slide_opt ) && $slide_opt == 'on' && isset( $slide_dots_type ) && $slide_dots_type == 'content' ? true : false;
		
		$query = new WP_Query( $args );
		if ( $query->have_posts() ) {
		
			$services_array = array(
				'excerpt_length' => $excerpt_length,
				'thumb_size' => $thumb_size,
				'cus_thumb_size' => $cus_thumb_size,
				'more' => $read_more,
				'button_type' => $button_type,
				'number_opt' => $number_opt,
				'icon_opt' => $icon_opt,
				'title_head' => $title_head,
				'overlay_opt' => $service_overlay_opt,
				'overlay_items' => $service_overlay_items				 
			);
			
			$cnt = 1;
			$class_names .= $pagi_opt ? ' pixzlo-pagination-slide-actived pixzlo-pagi-slide-'. $pagi_position : '';
			
			$output .= '<div class="services-wrapper'. esc_attr( $class_names ) .'" data-css="'. htmlspecialchars( json_encode( $shortcode_css ), ENT_QUOTES, 'UTF-8' ) .'">';
				$row_stat = 0;
				
					$main_out = '';
					
					//Services Slide
					if( isset( $slide_opt ) && $slide_opt == 'on' ) $main_out .= '<div class="pixzlo-page-carousel owl-carousel" '. ( $data_atts ) .'>';	
					
					// Start the Loop
					while ( $query->have_posts() ) : $query->the_post();
					
						if( $row_stat == 0 && $slide_opt != 'on' ) :
							$main_out .= '<div class="row">';
						endif;
					
						//Services Slide Item
						if( isset( $slide_opt ) && $slide_opt == 'on' ) $main_out .= '<div class="item">';	
					
					
						$col_class = "col-lg-". absint( $cols );
						$col_class .= " " . ( $cols == 3 ? "col-md-6" : "col-md-". absint( $cols ) );
						$main_out .= '<div class="'. esc_attr( $col_class ) .'">';
							$main_out .= '<div class="services-inner">';
							
							$post_id = get_the_ID();
							
							$services_array['post_id'] = $post_id;
							$services_array['cnt'] = $cnt++;
							if( isset( $elemetns['Enabled'] ) ) :
								foreach( $elemetns['Enabled'] as $element => $value ){
									$main_out .= pixzlo_services_shortcode_elements( $element, $services_array );
								}
							endif;
							
							$main_out .= '</div><!-- .services-inner -->';
						$main_out .= '</div><!-- .cols -->';
						
						//Services Slide Item End
						if( isset( $slide_opt ) && $slide_opt == 'on' ) $main_out .= '</div><!-- .item -->';	
						
						$row_stat++;
						if( $row_stat == ( 12/ $cols ) && $slide_opt != 'on' ) :
							$main_out .= '</div><!-- .row -->';
							$row_stat = 0;
						endif;
						
						if( $pagi_opt ){
							$page_slide_out .= '<div class="pixzlo-pagi-item'. esc_attr( $pagi_class_names ) .'">';
								if( isset( $service_pagi_items['Enabled'] ) ) :
									foreach( $service_pagi_items['Enabled'] as $element => $value ){
										$page_slide_out .= pixzlo_services_shortcode_elements( $element, $services_array );
									}
								endif;
							$page_slide_out .= '</div><!-- .pixzlo-pagi-item -->';
						}
						
					endwhile;
					
					if( $row_stat != 0 && $slide_opt != 'on' ){
						$main_out .= '</div><!-- .row -->'; // Unexpected row close
					}
					
					//Services Slide End
					if( isset( $slide_opt ) && $slide_opt == 'on' ) $main_out .= '</div><!-- .owl-carousel -->';
					
					//Service Pagination Slide
					if( $pagi_opt && $pagi_position == 'top' ){
						if( isset( $slide_opt ) && $slide_opt == 'on' ) $output .= '<div class="pixzlo-pagination-carousel pixzlo-pagination-'. esc_attr( $pagi_position ) .' owl-carousel" '. ( $thumb_data_atts ) .'>';	
							$output .= $page_slide_out;	
						if( isset( $slide_opt ) && $slide_opt == 'on' ) $output .= '</div><!-- .pixzlo-pagination-carousel -->';
					}
					
					$output .= $main_out;	
					
					//Service Pagination Slide
					if( $pagi_opt && $pagi_position == 'bottom' ){
						if( isset( $slide_opt ) && $slide_opt == 'on' ) $output .= '<div class="pixzlo-pagination-carousel pixzlo-pagination-'. esc_attr( $pagi_position ) .' owl-carousel" '. ( $thumb_data_atts ) .'>';	
							$output .= $page_slide_out;	
						if( isset( $slide_opt ) && $slide_opt == 'on' ) $output .= '</div><!-- .pixzlo-pagination-carousel -->';
					}

			$output .= '</div><!-- .services-wrapper -->';
			
		}// query exists
		
		// use reset postdata to restore orginal query
		wp_reset_postdata();
		
		return $output;
	}
}
function pixzlo_services_shortcode_elements( $element, $opts = array() ){
	$output = '';
	switch( $element ){
	
		case "title":
			$title_head = isset( $opts['title_head'] ) ? $opts['title_head'] : 'h4';
			$output .= '<div class="services-title">';
				$post_id = get_the_ID();
				
				if( isset( $opts['icon_opt'] ) && $opts['icon_opt'] ){
					$icon_out = get_post_meta( $post_id, 'pixzlo_service_title_icon', true );
					$output .= '<span class="abs-title-icon">'. wp_kses_post( $icon_out ) .'</span>';
				}
				
				if( isset( $opts['number_opt'] ) && $opts['number_opt'] ){
					$num_out = absint( $opts['cnt'] ) >= 10 ? $opts['cnt'] : '0' . $opts['cnt'];
					$output .= '<h3 class="invisible-number">'. esc_html( $num_out ) .'</h3>';
				}
				$output .= '<'. esc_attr( $title_head ) .'><a href="'. esc_url( get_the_permalink() ) .'" class="entry-title">'. esc_html( get_the_title() ) .'</a></'. esc_attr( $title_head ) .'>';
			$output .= '</div><!-- .services-title -->';		
		break;
		case "thumb":
			if ( has_post_thumbnail() ) {
			
				// Custom Thumb Code
				$thumb_size = $thumb_cond = $opts['thumb_size'];
				$cus_thumb_size = $opts['cus_thumb_size'];
				$custom_opt = $img_prop = '';
				if( $thumb_cond == 'custom' ){
					$custom_opt = $cus_thumb_size != '' ? explode( "x", $cus_thumb_size ) : array();
					$img_prop = pixzlo_custom_image_size_chk( $thumb_size, $custom_opt );
					$thumb_size = array( $img_prop[1], $img_prop[2] );
				}
				// Custom Thumb Code End
			
				$output .= '<div class="services-thumb">';
				
					if( $thumb_cond == 'custom' ){
						$output .= '<img height="'. esc_attr( $img_prop[2] ) .'" width="'. esc_attr( $img_prop[1] ) .'" class="img-fluid" alt="'. esc_attr( get_the_title() ) .'" src="' . esc_url( $img_prop[0] ) . '"/>';
					}else{
						$output .= get_the_post_thumbnail( $opts['post_id'], $thumb_size, array( 'class' => 'img-fluid' ) );
					}
					
					if( isset( $opts['overlay_opt'] ) && $opts['overlay_opt'] ){
						$elemetns = isset( $opts['overlay_items'] ) && !empty( $opts['overlay_items'] ) ? $opts['overlay_items'] : array( 'Enabled' => '' );
						if( isset( $elemetns['Enabled'] ) ) :
							$output .= '<div class="service-overlay-wrap pixzlo-overlay-wrap">';
								foreach( $elemetns['Enabled'] as $element => $value ){
									$output .= pixzlo_services_shortcode_elements( $element, $opts );
								}
							$output .= '</div><!-- .pixzlo-overlay-wrap -->';
						endif;
					}
					
				$output .= '</div><!-- .services-thumb -->';
			}
		break;
		
		case "excerpt":
			$excerpt = isset( $opts['excerpt_length'] ) && $opts['excerpt_length'] != '' ? $opts['excerpt_length'] : 20;
			$output .= '<div class="services-excerpt">';
				add_filter( 'excerpt_length', __return_value( $excerpt ) );
				ob_start();
				the_excerpt();
				$excerpt_cont = ob_get_clean();
				$output .= $excerpt_cont;
			$output .= '</div><!-- .services-excerpt -->';	
		break;
		
		case "more":
			$more = $opts['more'];
			if( $more ) :
				$output .= '<div class="services-read-more">';
					$output .= '<a href="'. esc_url( get_the_permalink() ) .'" class="read-more'. esc_attr( $opts['button_type'] ) .'">'. esc_html( $more ) .'</a>';
				$output .= '</div><!-- .services-read-more -->';		
			endif;
		break;
		
		case "icon":
			$service_icon = get_post_meta( $opts['post_id'], 'pixzlo_service_title_icon', true );
			if( $service_icon ){
				$output .= '<div class="service-icon-wrap">';	
					$output .= stripslashes( $service_icon );
				$output .= '</div><!-- .service-icon-wrap -->';
			}
		break;
		
	}
	return $output; 
}
if ( ! function_exists( "pixzlo_vc_services_shortcode_map" ) ) {
	function pixzlo_vc_services_shortcode_map() {
				
		vc_map( 
			array(
				"name"					=> esc_html__( "Services", "pixzlo" ),
				"description"			=> esc_html__( "Services custom post type.", "pixzlo" ),
				"base"					=> "pixzlo_vc_services",
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
						"heading"		=> esc_html__( "Post Per Page", "pixzlo" ),
						"description"	=> esc_html__( "Here you can define post limits per page. Example 10", "pixzlo" ),
						"param_name"	=> "post_per_page",
						"value" 		=> "",
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Excerpt Length", "pixzlo" ),
						"param_name"	=> "excerpt_length",
						"value" 		=> "15"
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
						"type"			=> "img_select",
						"heading"		=> esc_html__( "Services Layout", "pixzlo" ),
						"param_name"	=> "services_layout",
						"img_lists" => array ( 
							"1"	=> PIXZLO_ADMIN_URL . "/assets/images/services/1.png",
							"2"	=> PIXZLO_ADMIN_URL . "/assets/images/services/2.png",
							"3"	=> PIXZLO_ADMIN_URL . "/assets/images/services/3.png"
						),
						"default"		=> "1",
						"group"			=> esc_html__( "Layouts", "pixzlo" )
					),
					array(
						"type"			=> "dropdown",
						"heading"		=> esc_html__( "Services Variation", "pixzlo" ),
						"description"	=> esc_html__( "This is an option for services variation either dark or light.", "pixzlo" ),
						"param_name"	=> "variation",
						"value"			=> array(
							esc_html__( "Light", "pixzlo" )	=> "light",
							esc_html__( "Dark", "pixzlo" )		=> "dark",
						),
						"group"			=> esc_html__( "Layouts", "pixzlo" )
					),
					array(
						"type"			=> "dropdown",
						"heading"		=> esc_html__( "Services Columns", "pixzlo" ),
						"description"	=> esc_html__( "This is an option for services columns.", "pixzlo" ),
						"param_name"	=> "service_cols",
						"value"			=> array(
							esc_html__( "1 Column", "pixzlo" )	=> "12",
							esc_html__( "2 Columns", "pixzlo" )	=> "6",
							esc_html__( "3 Columns", "pixzlo" )	=> "4",
							esc_html__( "4 Columns", "pixzlo" )	=> "3",
						),
						"group"			=> esc_html__( "Layouts", "pixzlo" )
					),
					array(
						'type'			=> 'drag_drop',
						'heading'		=> esc_html__( 'Service Items', 'pixzlo' ),
						"description"	=> esc_html__( "This is settings for services custom layout. here you can set your own layout. Drag and drop needed services items to Enabled part.", "pixzlo" ),
						'param_name'	=> 'services_items',
						'dd_fields' => array ( 
							'Enabled' => array( 
								'thumb'	=> esc_html__( 'Image', 'pixzlo' ),
								'title'	=> esc_html__( 'Title', 'pixzlo' ),
								'excerpt'	=> esc_html__( 'Excerpt', 'pixzlo' ),
								'more'	=> esc_html__( 'Read More', 'pixzlo' )
							),
							'disabled' => array()
						),
						"group"			=> esc_html__( "Layouts", "pixzlo" )
					),
					array(
						"type"			=> "dropdown",
						"heading"		=> esc_html__( "Services Overlay Option", "pixzlo" ),
						"description"	=> esc_html__( "This is an option for enable service image overlay items show.", "pixzlo" ),
						"param_name"	=> "service_overlay_opt",
						"value"			=> array(
							esc_html__( "No", "pixzlo" )	=> "no",
							esc_html__( "Yes", "pixzlo" )	=> "yes"
						),
						"group"			=> esc_html__( "Layouts", "pixzlo" )
					),
					array(
						'type'			=> 'drag_drop',
						'heading'		=> esc_html__( 'Service Overlay Items', 'pixzlo' ),
						"description"	=> esc_html__( "This is settings for services overlay custom layout. here you can set your own layout. Drag and drop needed services overlay items to Enabled part.", "pixzlo" ),
						'param_name'	=> 'services_overlay_items',
						'dd_fields' => array ( 
							'Enabled' => array( 
								'title'	=> esc_html__( 'Title', 'pixzlo' ),
								'more'	=> esc_html__( 'Read More', 'pixzlo' )
							),
							'disabled' => array(
								'excerpt'	=> esc_html__( 'Excerpt', 'pixzlo' )
							)
						),
						"dependency" => array(
							"element" => "service_overlay_opt",
							"value"	=> array( "yes" )
						),
						"group"			=> esc_html__( "Layouts", "pixzlo" )
					),
					array(
						"type"			=> "dropdown",
						"heading"		=> esc_html__( "Text Align", "pixzlo" ),
						"description"	=> esc_html__( "This is an option for services text align", "pixzlo" ),
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
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Read More Text", "pixzlo" ),
						"param_name"	=> "read_more",
						"value" 		=> esc_html__( "Read More", "pixzlo" ),
						"group"			=> esc_html__( "Layouts", "pixzlo" )
					),
					array(
						"type"			=> "dropdown",
						"heading"		=> esc_html__( "Read More Button Style", "pixzlo" ),
						"description"	=> esc_html__( "This is an option for services read more button style.", "pixzlo" ),
						"param_name"	=> "button_type",
						"value"			=> array(
							esc_html__( "Link Style", "pixzlo" )	=> "link",
							esc_html__( "Button Style", "pixzlo" )	=> "button"
						),
						"group"			=> esc_html__( "Layouts", "pixzlo" )
					),
					array(
						"type"			=> "switch_bit",
						"heading"		=> esc_html__( "Numbered Option", "pixzlo" ),
						"description"	=> esc_html__( "Enter text for feature box number option.", "pixzlo" ),
						"param_name"	=> "number_opt",
						"value"			=> "off",
						"group"			=> esc_html__( "Layouts", "pixzlo" )
					),
					array(
						"type"			=> "switch_bit",
						"heading"		=> esc_html__( "Icon Option", "pixzlo" ),
						"description"	=> esc_html__( "Enable Or Diable Icon.", "pixzlo" ),
						"param_name"	=> "icon_opt",
						"value"			=> "off",
						"group"			=> esc_html__( "Layouts", "pixzlo" )
					),
					array(
						"type"			=> 'dropdown',
						"heading"		=> esc_html__( "Image Size", "pixzlo" ),
						"param_name"	=> "image_size",
						'description'	=> esc_html__( 'Choose thumbnail size for display different size image.', 'pixzlo' ),
						"value"			=> array(
							esc_html__( "Grid Large", "pixzlo" )=> "pixzlo-grid-large",
							esc_html__( "Grid Medium", "pixzlo" )=> "pixzlo-grid-medium",
							esc_html__( "Grid Small", "pixzlo" )=> "pixzlo-grid-small",
							esc_html__( "Medium", "pixzlo" )=> "medium",
							esc_html__( "Large", "pixzlo" )=> "large",
							esc_html__( "Thumbnail", "pixzlo" )=> "thumbnail",
							esc_html__( "Custom", "pixzlo" )=> "custom",
						),
						'std'			=> 'newsz_grid_2',
						'group'			=> esc_html__( 'Image', 'pixzlo' )
					),
					array(
						'type'			=> 'textfield',
						'heading'		=> esc_html__( 'Custom Image Size', "pixzlo" ),
						'param_name'	=> 'custom_image_size',
						'description'	=> esc_html__( 'Enter custom image size. eg: 200x200', 'pixzlo' ),
						'value' 		=> '',
						"dependency"	=> array(
								"element"	=> "image_size",
								"value"		=> "custom"
						),
						'group'			=> esc_html__( 'Image', 'pixzlo' )
					),
					array(
						"type"			=> "switch_bit",
						"heading"		=> esc_html__( "Slide Option", "pixzlo" ),
						"description"	=> esc_html__( "This is an option for services slider option.", "pixzlo" ),
						"param_name"	=> "slide_opt",
						"value"			=> "off",
						"group"			=> esc_html__( "Slide", "pixzlo" )
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Items", "pixzlo" ),
						"description"	=> esc_html__( "This is an option for services slide items shown on large devices.", "pixzlo" ),
						"param_name"	=> "slide_item",
						"value" 		=> "2",
						"group"			=> esc_html__( "Slide", "pixzlo" )
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Items on Tab", "pixzlo" ),
						"description"	=> esc_html__( "This is an option for services slide items shown on tab.", "pixzlo" ),
						"param_name"	=> "slide_item_tab",
						"value" 		=> "2",
						"group"			=> esc_html__( "Slide", "pixzlo" )
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Items on Mobile", "pixzlo" ),
						"description"	=> esc_html__( "This is an option for services slide items shown on mobile.", "pixzlo" ),
						"param_name"	=> "slide_item_mobile",
						"value" 		=> "1",
						"group"			=> esc_html__( "Slide", "pixzlo" )
					),
					array(
						"type"			=> "switch_bit",
						"heading"		=> esc_html__( "Auto Play", "pixzlo" ),
						"description"	=> esc_html__( "This is an option for services slider auto play.", "pixzlo" ),
						"param_name"	=> "slide_item_autoplay",
						"value"			=> "off",
						"group"			=> esc_html__( "Slide", "pixzlo" )
					),
					array(
						"type"			=> "switch_bit",
						"heading"		=> esc_html__( "Loop", "pixzlo" ),
						"description"	=> esc_html__( "This is an option for services slider loop.", "pixzlo" ),
						"param_name"	=> "slide_item_loop",
						"value"			=> "off",
						"group"			=> esc_html__( "Slide", "pixzlo" )
					),
					array(
						"type"			=> "switch_bit",
						"heading"		=> esc_html__( "Items Center", "pixzlo" ),
						"description"	=> esc_html__( "This is an option for services slider center, for this option must active loop and minimum items 2.", "pixzlo" ),
						"param_name"	=> "slide_center",
						"value"			=> "off",
						"group"			=> esc_html__( "Slide", "pixzlo" )
					),
					array(
						"type"			=> "switch_bit",
						"heading"		=> esc_html__( "Navigation", "pixzlo" ),
						"description"	=> esc_html__( "This is an option for services slider navigation.", "pixzlo" ),
						"param_name"	=> "slide_nav",
						"value"			=> "off",
						"group"			=> esc_html__( "Slide", "pixzlo" )
					),
					array(
						"type"			=> "dropdown",
						"heading"		=> esc_html__( "Pagination", "pixzlo" ),
						"description"	=> esc_html__( "This is option for services slider pagination.", "pixzlo" ),
						"param_name"	=> "slide_dots",
						"value"			=> array(
							esc_html__( "Off", "pixzlo" )	=> "off",
							esc_html__( "On", "pixzlo" )	=> "on"
						),
						"group"			=> esc_html__( "Slide", "pixzlo" )
					),
					array(
						"type"			=> "dropdown",
						"heading"		=> esc_html__( "Pagination Type", "pixzlo" ),
						"description"	=> esc_html__( "This is option for services slide pagination dots or content", "pixzlo" ),
						"param_name"	=> "slide_dots_type",
						"value"			=> array(
							esc_html__( "Default", "pixzlo" )	=> "default",
							esc_html__( "Content", "pixzlo" )	=> "content"
						),
						"group"			=> esc_html__( "Slide", "pixzlo" ),
						"dependency" => array(
							"element" => "slide_dots",
							"value"	=> array( "on" )
						),
					),
					array(
						'type'			=> 'drag_drop',
						'heading'		=> esc_html__( 'Service Pagination Items', 'pixzlo' ),
						"description"	=> esc_html__( "This is settings for services pagenation slide item custom layout. here you can set your own layout. Drag and drop needed services items to Enabled part.", "pixzlo" ),
						'param_name'	=> 'service_pagi_items',
						'dd_fields' => array ( 
							'Enabled' => array( 
								'icon'	=> esc_html__( 'Service Icon', 'pixzlo' ),
								'title'	=> esc_html__( 'Title', 'pixzlo' )								
							),
							'disabled' => array(
								'more'	=> esc_html__( 'Read More', 'pixzlo' ),
								'excerpt'	=> esc_html__( 'Excerpt', 'pixzlo' )
							)
						),
						"dependency" => array(
							"element" => "slide_dots_type",
							"value"	=> array( "content" )
						),
						"group"			=> esc_html__( "Slide", "pixzlo" )
					),
					array(
						"type"			=> "dropdown",
						"heading"		=> esc_html__( "Services Pagination Slide Position", "pixzlo" ),
						"description"	=> esc_html__( "This is an option for set service pagination slide position.", "pixzlo" ),
						"param_name"	=> "service_pagi_position",
						"value"			=> array(
							esc_html__( "Top", "pixzlo" )		=> "top",
							esc_html__( "Bottom", "pixzlo" )	=> "bottom"
						),
						"dependency" => array(
							"element" => "slide_dots_type",
							"value"	=> array( "content" )
						),
						"group"			=> esc_html__( "Slide", "pixzlo" )
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Pagination Slide Items", "pixzlo" ),
						"description"	=> esc_html__( "This is an option for services pagination slide items shown on devices.", "pixzlo" ),
						"param_name"	=> "slide_pagi_item",
						"value" 		=> "3",
						"dependency" => array(
							"element" => "slide_dots_type",
							"value"	=> array( "content" )
						),
						"group"			=> esc_html__( "Slide", "pixzlo" )
					),
					array(
						"type"			=> "dropdown",
						"heading"		=> esc_html__( "Pagination Slide Items Text Align", "pixzlo" ),
						"description"	=> esc_html__( "This is option for services pagination slide items text align.", "pixzlo" ),
						"param_name"	=> "pagi_text_align",
						"value"			=> array(
							esc_html__( "Default", "pixzlo" )	=> "default",
							esc_html__( "Left", "pixzlo" )		=> "left",
							esc_html__( "Center", "pixzlo" )	=> "center",
							esc_html__( "Right", "pixzlo" )		=> "right"
						),
						"group"			=> esc_html__( "Slide", "pixzlo" )
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Items Margin", "pixzlo" ),
						"description"	=> esc_html__( "This is an option for services slider margin space.", "pixzlo" ),
						"param_name"	=> "slide_margin",
						"value" 		=> "",
						"group"			=> esc_html__( "Slide", "pixzlo" )
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Items Duration", "pixzlo" ),
						"description"	=> esc_html__( "This is an option for services slider duration.", "pixzlo" ),
						"param_name"	=> "slide_duration",
						"value" 		=> "5000",
						"group"			=> esc_html__( "Slide", "pixzlo" )
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Items Smart Speed", "pixzlo" ),
						"description"	=> esc_html__( "This is an option for services slider smart speed.", "pixzlo" ),
						"param_name"	=> "slide_smart_speed",
						"value" 		=> "250",
						"group"			=> esc_html__( "Slide", "pixzlo" )
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Items Slideby", "pixzlo" ),
						"description"	=> esc_html__( "This is an option for services slider scroll by.", "pixzlo" ),
						"param_name"	=> "slide_slideby",
						"value" 		=> "1",
						"group"			=> esc_html__( "Slide", "pixzlo" )
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
add_action( "vc_before_init", "pixzlo_vc_services_shortcode_map" );