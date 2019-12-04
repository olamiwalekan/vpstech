<?php 
/**
 * Pixzlo Events
 */
if ( ! function_exists( "pixzlo_vc_events_shortcode" ) ) {
	function pixzlo_vc_events_shortcode( $atts, $content = NULL ) {
		
		$atts = vc_map_get_attributes( "pixzlo_vc_events", $atts );
		extract( $atts );
		$output = '';
	
		//Defined Variable
		$class_names = isset( $extra_class ) && $extra_class != '' ? ' ' . $extra_class : '';
		$post_per_page = isset( $post_per_page ) && $post_per_page != '' ? $post_per_page : '';
		$excerpt_length = isset( $excerpt_length ) && $excerpt_length != '' ? $excerpt_length : 0;
		$class_names .= isset( $events_layout ) ? ' events-' . $events_layout : '';
		$class_names .= isset( $event_style ) && $event_style != '' ? ' event-style-' . $event_style : '';
		$class_names .= isset( $text_align ) && $text_align != 'default' ? ' text-' . $text_align : '';
		$class_names .= isset( $variation ) ? ' events-' . $variation : '';
		$more_text = isset( $more_text ) && $more_text != '' ? $more_text : '';
		$title_head = isset( $title_head ) ? $title_head : 'h4';
		
		$shortcode_css = '';
		$shortcode_rand_id = $rand_class = 'shortcode-rand-'. pixzlo_shortcode_rand_id();
		
		//Spacing
		if( isset( $sc_spacing ) && !empty( $sc_spacing ) ){
			$sc_spacing = preg_replace( '!\s+!', ' ', $sc_spacing );
			$space_arr = explode( " ", $sc_spacing );
			$i = 1;
			$space_class_name = '.' . esc_attr( $rand_class ) . '.events-wrapper .events-inner >';
			foreach( $space_arr as $space ){
				$shortcode_css .= $space != 'default' ? $space_class_name .' *:nth-child('. esc_attr( $i ) .') { margin-bottom: '. esc_attr( $space ) .'; }' : '';
				$i++;
			}
		}
		
		//Shortcode css ccde here
		$shortcode_css .= isset( $font_color ) && $font_color != '' ? '.' . esc_attr( $rand_class ) . '.events-wrapper.events-dark .events-inner, .' . esc_attr( $rand_class ) . '.events-wrapper .events-inner, .' . esc_attr( $rand_class ) . '.events-dark .media-body, .' . esc_attr( $rand_class ) . ' .media-body { color: '. esc_attr( $font_color ) .'; }' : '';
		$args = array(
			'post_type' => 'pixzlo-event',
			'posts_per_page' => absint( $post_per_page ),
			'ignore_sticky_posts' => 1
		);
		
		// Events Grid Layout
		if( isset( $events_layout ) && $events_layout != 'list' ){
			
			$cols = isset( $event_cols ) ? $event_cols : 1;
			$gal_atts = '';
			if( isset( $slide_opt ) && $slide_opt == 'on' ){
				$gal_atts = array(
					'data-loop="'. ( isset( $slide_item_loop ) && $slide_item_loop == 'on' ? 1 : 0 ) .'"',
					'data-margin="'. ( isset( $slide_margin ) && $slide_margin != '' ? absint( $slide_margin ) : 0 ) .'"',
					'data-center="'. ( isset( $slide_center ) && $slide_center == 'on' ? 1 : 0 ) .'"',
					'data-nav="'. ( isset( $slide_nav ) && $slide_nav == 'on' ? 1 : 0 ) .'"',
					'data-dots="'. ( isset( $slide_dots ) && $slide_dots == 'on' ? 1 : 0 ) .'"',
					'data-autoplay="'. ( isset( $slide_item_autoplay ) && $slide_item_autoplay == 'on' ? 1 : 0 ) .'"',
					'data-items="'. ( isset( $slide_item ) && $slide_item != '' ? absint( $slide_item ) : 1 ) .'"',
					'data-items-tab="'. ( isset( $slide_item_tab ) && $slide_item_tab != '' ? absint( $slide_item_tab ) : 1 ) .'"',
					'data-items-mob="'. ( isset( $slide_item_mobile ) && $slide_item_mobile != '' ? absint( $slide_item_mobile ) : 1 ) .'"',
					'data-duration="'. ( isset( $slide_duration ) && $slide_duration != '' ? absint( $slide_duration ) : 5000 ) .'"',
					'data-smartspeed="'. ( isset( $slide_smart_speed ) && $slide_smart_speed != '' ? absint( $slide_smart_speed ) : 250 ) .'"',
					'data-scrollby="'. ( isset( $slide_slideby ) && $slide_slideby != '' ? absint( $slide_slideby ) : 1 ) .'"',
					'data-autoheight="false"',
				);
				$data_atts = implode( " ", $gal_atts );
			}
			
			$thumb_size = 'large';
			if( ( 12 / absint( $cols ) ) > 3 ){
				$thumb_size = 'pixzlo-grid-medium';
			}elseif( ( 12 / absint( $cols ) ) > 2 ){
				$thumb_size = 'pixzlo-grid-large';
			}elseif( ( 12 / absint( $cols ) ) > 1 ){
				$thumb_size = 'medium';
			}else{
				$thumb_size = 'large';
			}
			
			$query = new WP_Query( $args );
			if ( $query->have_posts() ) {
				if( $shortcode_css ) $class_names .= ' ' . $shortcode_rand_id . ' pixzlo-inline-css';
				
				$output .= '<div class="events-wrapper'. esc_attr( $class_names ) .'" data-css="'. htmlspecialchars( json_encode( $shortcode_css ), ENT_QUOTES, 'UTF-8' ) .'">';
					$row_stat = 0;
					
						//Events Slide
						if( isset( $slide_opt ) && $slide_opt == 'on' ) $output .= '<div class="owl-carousel" '. ( $data_atts ) .'>';	
						
						// Start the Loop
						while ( $query->have_posts() ) : $query->the_post();
						
							if( $row_stat == 0 && $slide_opt != 'on' ) :
								$output .= '<div class="row">';
							endif;
						
							//Events Slide Item
							if( isset( $slide_opt ) && $slide_opt == 'on' ) $output .= '<div class="item">';	
						
							$col_class = "col-lg-". absint( $cols );
							$col_class .= " " . ( $cols == 3 ? "col-md-6" : "col-md-". absint( $cols ) );
							$output .= '<div class="'. esc_attr( $col_class ) .'">';
								$output .= '<div class="events-inner">';
								
								$post_id = get_the_ID();
								
								//Check Event Exists or Not
								$event_date = get_post_meta( $post_id, 'pixzlo_event_start_date', true );
								$end_date = get_post_meta( $post_id, 'pixzlo_event_end_date', true );
								$date_exist = !empty( $end_date ) ? $end_date : $event_date;
								if( $date_exist ):
									if( ( time() -( 60*60*24 ) ) > strtotime( $date_exist ) ): 
										$output .= '<span class="event-status">'. apply_filters( 'pixzlo_archive_event_close', esc_html( 'Event closed.', 'pixzlo' ) ) .'</span>';
									endif;
								endif;
								
								$event_array = array(
									'post_id' => $post_id,
									'excerpt_length' => $excerpt_length,
									'thumb_size' => $thumb_size,
									'more_text' => $more_text,
									'grid' => 1, 
									'title_head' => $title_head
								);
	
								$elemetns = isset( $events_items ) ? pixzlo_drag_and_drop_trim( $events_items ) : array( 'Enabled' => '' );
	
								if( isset( $elemetns['Enabled'] ) ) :
									foreach( $elemetns['Enabled'] as $element => $value ){
										$output .= pixzlo_events_shortcode_elements( $element, $event_array );
									}
								endif;
								
								$output .= '</div><!-- .events-inner -->';
							$output .= '</div><!-- .cols -->';
							
							//Events Slide Item End
							if( isset( $slide_opt ) && $slide_opt == 'on' ) $output .= '</div><!-- .item -->';	
							
							$row_stat++;
							if( $row_stat == ( 12/ $cols ) && $slide_opt != 'on' ) :
								$output .= '</div><!-- .row -->';
								$row_stat = 0;
							endif;
							
						endwhile;
						
						if( $row_stat != 0 && $slide_opt != 'on' ){
							$output .= '</div><!-- .row -->'; // Unexpected row close
						}
						
						//Events Slide End
						if( isset( $slide_opt ) && $slide_opt == 'on' ) $output .= '</div><!-- .owl-carousel -->';
	
				$output .= '</div><!-- .events-wrapper -->';
				
			}// query exists
			
			// use reset postdata to restore orginal query
			wp_reset_postdata();
		
		}else{ 
		
			if( $shortcode_css ) $class_names .= ' ' . $shortcode_rand_id . ' pixzlo-inline-css';
		
			// Events List Layout
			$thumb_size = 'thumbnail';
			
			$query = new WP_Query( $args );
			if ( $query->have_posts() ) {
				
				$output .= '<div class="events-wrapper'. esc_attr( $class_names ) .'" data-css="'. htmlspecialchars( json_encode( $shortcode_css ), ENT_QUOTES, 'UTF-8' ) .'">';
				
					// Start the Loop
					while ( $query->have_posts() ) : $query->the_post();
							
						$post_id = get_the_ID();
										
						$event_array = array(
							'post_id' => $post_id,
							'excerpt_length' => $excerpt_length,
							'thumb_size' => $thumb_size,
							'more_text' => $more_text,
							'grid' => 1,
							'title_head' => $title_head
						);
						
							$output .= '<div class="media event-list-item">';
								$output .= pixzlo_events_shortcode_elements( 'thumb', $event_array );
								$output .= '<div class="media-body">';
								
									//Check Event Exists or Not
									$event_date = get_post_meta( $post_id, 'pixzlo_event_start_date', true );
									$end_date = get_post_meta( $post_id, 'pixzlo_event_end_date', true );
									$date_exist = !empty( $end_date ) ? $end_date : $event_date;
									if( $date_exist ):
										if( ( time() -( 60*60*24 ) ) > strtotime( $date_exist ) ): 
											$output .= '<span class="event-status">'. apply_filters( 'pixzlo_archive_event_close', esc_html( 'Event closed.', 'pixzlo' ) ) .'</span>';
										endif;
									endif;
									
									$event_array['grid'] = 0;
									$elemetns = isset( $events_items ) ? pixzlo_drag_and_drop_trim( $events_items ) : array( 'Enabled' => '' );
									if( isset( $elemetns['Enabled'] ) ) :
										foreach( $elemetns['Enabled'] as $element => $value ){
											$output .= pixzlo_events_shortcode_elements( $element, $event_array );
										}
									endif;
									
								$output .= '</div><!-- .media-body -->';
							$output .= '</div><!-- .media -->';
	
					endwhile;
				
				$output .= '</div><!-- .events-wrapper -->';
				
			} // Wp Query have posts
			// use reset postdata to restore orginal query
			wp_reset_postdata();
		}
		
		return $output;
	}
}
function pixzlo_events_shortcode_elements( $element, $opts = array() ){
	$output = '';
	switch( $element ){
	
		case "title":
			$title_head = isset( $opts['title_head'] ) ? $opts['title_head'] : 'h4';
			$output .= '<div class="events-title">';
				$output .= '<'. esc_attr( $title_head ) .'><a href="'. esc_url( get_the_permalink() ) .'" class="entry-title">'. get_the_title() .'</a></'. esc_attr( $title_head ) .'>';
			$output .= '</div><!-- .events-title -->';		
		break;
		case "thumb":
			if( $opts['grid'] ){
				if ( has_post_thumbnail() ) {
					$output .= '<div class="events-thumb">';
						$output .= get_the_post_thumbnail( $opts['post_id'], $opts['thumb_size'], array( 'class' => 'img-fluid' ) );
					$output .= '</div><!-- .events-thumb -->';
				}
			}
		break;
		
		case "excerpt":
			$excerpt = isset( $opts['excerpt_length'] ) && $opts['excerpt_length'] != '' ? $opts['excerpt_length'] : 20;
			$output .= '<div class="events-excerpt">';
				add_filter( 'excerpt_length', __return_value( $excerpt ) );
				ob_start();
				the_excerpt();
				$excerpt_cont = ob_get_clean();
				$output .= $excerpt_cont;
			$output .= '</div><!-- .events-excerpt -->';	
		break;
		
		case "date":
		
			$event_date = get_post_meta( get_the_ID(), 'pixzlo_event_start_date', true );
			if( $event_date ):
				$output .= '<div class="events-date">';
					$date_format = get_post_meta( $opts['post_id'], 'pixzlo_event_date_format', true );
					$output .= !empty( $date_format ) ? date( $date_format, strtotime( $event_date ) ) : esc_html( $event_date );
					$event_time = get_post_meta( get_the_ID(), 'pixzlo_event_time', true );
					if( $event_time ) : 
						$output .= '<span class="event-time">'. esc_html( $event_time ) .'</span>';
					endif;
				$output .= '</div><!-- .events-date -->';
			endif;
			
		break;
		
		case "more":
			$read_more_text = isset( $opts['more_text'] ) ? $opts['more_text'] : esc_html__( 'Read more', 'pixzlo' );
			$output = '<div class="post-more"><a class="read-more" href="'. esc_url( get_permalink( get_the_ID() ) ) . '">'. esc_html( $read_more_text ) .'</a></div>';
		break;
		
	}
	return $output; 
}
if ( ! function_exists( "pixzlo_vc_events_shortcode_map" ) ) {
	function pixzlo_vc_events_shortcode_map() {
				
		vc_map( 
			array(
				"name"					=> esc_html__( "Events", "pixzlo" ),
				"description"			=> esc_html__( "Events custom post type.", "pixzlo" ),
				"base"					=> "pixzlo_vc_events",
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
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Read More Text", "pixzlo" ),
						"description"	=> esc_html__( "Here you can enter read more text instead of default text.", "pixzlo" ),
						"param_name"	=> "more_text",
						"value" 		=> esc_html__( "Read More", "pixzlo" ),
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
						"heading"		=> esc_html__( "Events Style", "pixzlo" ),
						"param_name"	=> "event_style",
						"img_lists" => array ( 
							"1"	=> PIXZLO_ADMIN_URL . "/assets/images/event/1.png",
							"2"	=> PIXZLO_ADMIN_URL . "/assets/images/event/2.png",
							"3"	=> PIXZLO_ADMIN_URL . "/assets/images/event/3.png"
						),
						"default"		=> "1",
						"group"			=> esc_html__( "Layouts", "pixzlo" )
					),
					array(
						"type"			=> "dropdown",
						"heading"		=> esc_html__( "Events Layout", "pixzlo" ),
						"description"	=> esc_html__( "This is an option for events layout either grid or list.", "pixzlo" ),
						"param_name"	=> "events_layout",
						"value"			=> array(
							esc_html__( "Grid", "pixzlo" )	=> "grid",
							esc_html__( "List", "pixzlo" )		=> "list",
						),
						"group"			=> esc_html__( "Layouts", "pixzlo" )
					),
					array(
						"type"			=> "dropdown",
						"heading"		=> esc_html__( "Events Variation", "pixzlo" ),
						"description"	=> esc_html__( "This is an option for events variation either dark or light.", "pixzlo" ),
						"param_name"	=> "variation",
						"value"			=> array(
							esc_html__( "Light", "pixzlo" )	=> "light",
							esc_html__( "Dark", "pixzlo" )		=> "dark",
						),
						"group"			=> esc_html__( "Layouts", "pixzlo" )
					),
					array(
						"type"			=> "dropdown",
						"heading"		=> esc_html__( "Events Columns", "pixzlo" ),
						"description"	=> esc_html__( "This is an option for events columns.", "pixzlo" ),
						"param_name"	=> "event_cols",
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
						'heading'		=> esc_html__( 'Drag and Drop', 'pixzlo' ),
						"description"	=> esc_html__( "This is settings for events custom layout. here you can set your own layout. Drag and drop needed events items to Enabled part.", "pixzlo" ),
						'param_name'	=> 'events_items',
						'dd_fields' => array ( 
							'Enabled' => array( 
								'thumb'	=> esc_html__( 'Image', 'pixzlo' ),
								'title'	=> esc_html__( 'Title', 'pixzlo' ),
								'excerpt'	=> esc_html__( 'Excerpt', 'pixzlo' ),
								'date'	=> esc_html__( 'Date and Time', 'pixzlo' )
							),
							'disabled' => array(
								'more'	=> esc_html__( 'Read More', 'pixzlo' )
							)
						),
						"group"			=> esc_html__( "Layouts", "pixzlo" )
					),
					array(
						"type"			=> "dropdown",
						"heading"		=> esc_html__( "Text Align", "pixzlo" ),
						"description"	=> esc_html__( "This is an option for events text align", "pixzlo" ),
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
						"type"			=> "switch_bit",
						"heading"		=> esc_html__( "Slide Option", "pixzlo" ),
						"description"	=> esc_html__( "This is an option for events slider option only for events grid not for events list.", "pixzlo" ),
						"param_name"	=> "slide_opt",
						"value"			=> "off",
						"group"			=> esc_html__( "Layouts", "pixzlo" )
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Items", "pixzlo" ),
						"description"	=> esc_html__( "This is an option for events slide items shown on large devices.", "pixzlo" ),
						"param_name"	=> "slide_item",
						"value" 		=> "2",
						"group"			=> esc_html__( "Slide", "pixzlo" )
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Items on Tab", "pixzlo" ),
						"description"	=> esc_html__( "This is an option for events slide items shown on tab.", "pixzlo" ),
						"param_name"	=> "slide_item_tab",
						"value" 		=> "2",
						"group"			=> esc_html__( "Slide", "pixzlo" )
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Items on Mobile", "pixzlo" ),
						"description"	=> esc_html__( "This is an option for events slide items shown on mobile.", "pixzlo" ),
						"param_name"	=> "slide_item_mobile",
						"value" 		=> "1",
						"group"			=> esc_html__( "Slide", "pixzlo" )
					),
					array(
						"type"			=> "switch_bit",
						"heading"		=> esc_html__( "Auto Play", "pixzlo" ),
						"description"	=> esc_html__( "This is an option for events slider auto play.", "pixzlo" ),
						"param_name"	=> "slide_item_autoplay",
						"value"			=> "off",
						"group"			=> esc_html__( "Slide", "pixzlo" )
					),
					array(
						"type"			=> "switch_bit",
						"heading"		=> esc_html__( "Loop", "pixzlo" ),
						"description"	=> esc_html__( "This is an option for events slider loop.", "pixzlo" ),
						"param_name"	=> "slide_item_loop",
						"value"			=> "off",
						"group"			=> esc_html__( "Slide", "pixzlo" )
					),
					array(
						"type"			=> "switch_bit",
						"heading"		=> esc_html__( "Items Center", "pixzlo" ),
						"description"	=> esc_html__( "This is an option for events slider center, for this option must active loop and minimum items 2.", "pixzlo" ),
						"param_name"	=> "slide_center",
						"value"			=> "off",
						"group"			=> esc_html__( "Slide", "pixzlo" )
					),
					array(
						"type"			=> "switch_bit",
						"heading"		=> esc_html__( "Navigation", "pixzlo" ),
						"description"	=> esc_html__( "This is an option for events slider navigation.", "pixzlo" ),
						"param_name"	=> "slide_nav",
						"value"			=> "off",
						"group"			=> esc_html__( "Slide", "pixzlo" )
					),
					array(
						"type"			=> "switch_bit",
						"heading"		=> esc_html__( "Pagination", "pixzlo" ),
						"description"	=> esc_html__( "This is an option for events slider pagination.", "pixzlo" ),
						"param_name"	=> "slide_dots",
						"value"			=> "off",
						"group"			=> esc_html__( "Slide", "pixzlo" )
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Items Margin", "pixzlo" ),
						"description"	=> esc_html__( "This is an option for events slider margin space.", "pixzlo" ),
						"param_name"	=> "slide_margin",
						"value" 		=> "",
						"group"			=> esc_html__( "Slide", "pixzlo" )
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Items Duration", "pixzlo" ),
						"description"	=> esc_html__( "This is an option for events slider duration.", "pixzlo" ),
						"param_name"	=> "slide_duration",
						"value" 		=> "5000",
						"group"			=> esc_html__( "Slide", "pixzlo" )
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Items Smart Speed", "pixzlo" ),
						"description"	=> esc_html__( "This is an option for events slider smart speed.", "pixzlo" ),
						"param_name"	=> "slide_smart_speed",
						"value" 		=> "250",
						"group"			=> esc_html__( "Slide", "pixzlo" )
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Items Slideby", "pixzlo" ),
						"description"	=> esc_html__( "This is an option for events slider scroll by.", "pixzlo" ),
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
add_action( "vc_before_init", "pixzlo_vc_events_shortcode_map" );