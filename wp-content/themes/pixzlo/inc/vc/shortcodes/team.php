<?php 
/**
 * Pixzlo Team
 */
if ( ! function_exists( "pixzlo_vc_team_shortcode" ) ) {
	function pixzlo_vc_team_shortcode( $atts, $content = NULL ) {
		
		$atts = vc_map_get_attributes( "pixzlo_vc_team", $atts );
		extract( $atts );
		$output = '';
	
		//Defined Variable
		$class_names = isset( $extra_class ) && $extra_class != '' ? ' ' . $extra_class : '';
		$post_per_page = isset( $post_per_page ) && $post_per_page != '' ? $post_per_page : '';
		$excerpt_length = isset( $excerpt_length ) && $excerpt_length != '' ? $excerpt_length : 0;
		$class_names .= isset( $team_layout ) ? ' team-' . $team_layout : ' team-1';
		$class_names .= isset( $text_align ) && $text_align != 'default' ? ' text-' . $text_align : '';
		$class_names .= isset( $variation ) ? ' team-' . $variation : '';
		$cols = isset( $team_cols ) ? $team_cols : 12;
		$more_text = isset( $more_text ) && $more_text != '' ? $more_text : '';
		
		$team_model = isset( $team_model ) && $team_model != '' ? 'team-'.$team_model : 'team-grid'; 
		
		$sclass_name = isset( $social_style ) && !empty( $social_style ) ? ' social-' . $social_style : '';
		$sclass_name .= isset( $social_color ) && !empty( $social_color ) ? ' social-' . $social_color : '';
		$sclass_name .= isset( $social_hcolor ) && !empty( $social_hcolor ) ? ' social-' . $social_hcolor : '';
		$sclass_name .= isset( $social_bg ) && !empty( $social_bg ) ? ' social-' . $social_bg : '';
		$sclass_name .= isset( $social_hbg ) && !empty( $social_hbg ) ? ' social-' . $social_hbg : '';
		
		$overlay_class = '';
		$overlay_class .= isset( $team_overlay_position ) ? ' overlay-'.$team_overlay_position : ' overlay-center';
		
		// This is custom css options for main shortcode warpper
		$shortcode_css = '';
		$shortcode_rand_id = $rand_class = 'shortcode-rand-'. pixzlo_shortcode_rand_id();
		
		//Shortcode css ccde here
		$shortcode_css .= isset( $font_color ) && $font_color != '' ? '.' . esc_attr( $rand_class ) . '.team-wrapper, .' . esc_attr( $rand_class ) . '.team-wrapper.team-dark .team-inner { color: '. esc_attr( $font_color ) .'; }' : '';
		
		//Overlay Styles
		$overlay_class .= isset( $overlay_text_align ) && $overlay_text_align != 'default' ? ' text-' . $overlay_text_align : '';
		
		
		$shortcode_css .= isset( $team_overlay_font_color ) && $team_overlay_font_color != '' ? '.' . esc_attr( $rand_class ) . '.team-wrapper .team-overlay { color : '. esc_attr( $team_overlay_font_color ) .' ; }' : '';
		$rgba_from = isset( $team_overlay_custom_color_1 ) && $team_overlay_custom_color_1 != '' ? $team_overlay_custom_color_1 : '';
		$rgba_to = isset( $team_overlay_custom_color_2 ) && $team_overlay_custom_color_2 != '' ? $team_overlay_custom_color_2 : '';
		$shortcode_css .= $rgba_from != '' && $rgba_to != '' ? '.' . esc_attr( $rand_class ) . '.team-wrapper .team-thumb .overlay-custom { background : linear-gradient(to bottom, '. esc_attr( $rgba_from ) .' 0%, '. esc_attr( $rgba_to ) .' 75%); background : -webkit-linear-gradient(to bottom, '. esc_attr( $rgba_from ) .' 0%, '. esc_attr( $rgba_to ) .' 75%); background : -moz-linear-gradient(to bottom, '. esc_attr( $rgba_from ) .' 0%, '. esc_attr( $rgba_to ) .' 75%); }' : '';
		
		$overlay_link = isset( $team_overlay_link_colors ) ? $team_overlay_link_colors : '';
		if( $overlay_link ){
			$overlay_link = preg_replace('/\s+/', '', $overlay_link);
			$overlay_link_arr = explode(",",$overlay_link);
			if( isset( $overlay_link_arr[0] ) && $overlay_link_arr[0] != '' ){
				$shortcode_css .= '.' . esc_attr( $rand_class ) . '.team-wrapper .team-overlay a { color: '. esc_attr( $overlay_link_arr[0] ) .'; }';
			}
			if( isset( $overlay_link_arr[1] ) && $overlay_link_arr[1] != '' ){
				$shortcode_css .= '.' . esc_attr( $rand_class ) . '.team-wrapper .team-overlay a:hover { color: '. esc_attr( $overlay_link_arr[1] ) .'; }';
			}
		}
		
		//Spacing
		if( isset( $sc_spacing ) && !empty( $sc_spacing ) ){
			$sc_spacing = preg_replace( '!\s+!', ' ', $sc_spacing );
			$space_arr = explode( " ", $sc_spacing );
			$i = 1;
			$space_class_name = '';
			if( $team_model == 'team-list' ){
				$space_class_name = '.' . esc_attr( $rand_class ) . '.team-wrapper .team-inner .media-body >';
			}else{
				$space_class_name = '.' . esc_attr( $rand_class ) . '.team-wrapper .team-inner >';
			}
			foreach( $space_arr as $space ){
				$shortcode_css .= $space != 'default' ? $space_class_name .' *:nth-child('. esc_attr( $i ) .') { margin-bottom: '. esc_attr( $space ) .'; }' : '';
				$i++;
			}
		}
		
		$gal_atts = '';
		if( isset( $slide_opt ) && $slide_opt == 'on' ){
			$slide_item = isset( $slide_item ) && $slide_item != '' ? absint( $slide_item ) : 1;
			$gal_atts = array(
				'data-loop="'. ( isset( $slide_item_loop ) && $slide_item_loop == 'on' ? 1 : 0 ) .'"',
				'data-margin="'. ( isset( $slide_margin ) && $slide_margin != '' ? absint( $slide_margin ) : 0 ) .'"',
				'data-center="'. ( isset( $slide_center ) && $slide_center == 'on' ? 1 : 0 ) .'"',
				'data-nav="'. ( isset( $slide_nav ) && $slide_nav == 'on' ? 1 : 0 ) .'"',
				'data-dots="'. ( isset( $slide_dots ) && $slide_dots == 'on' ? 1 : 0 ) .'"',
				'data-autoplay="'. ( isset( $slide_item_autoplay ) && $slide_item_autoplay == 'on' ? 1 : 0 ) .'"',
				'data-items="'. ( $slide_item ) .'"',
				'data-items-tab="'. ( isset( $slide_item_tab ) && $slide_item_tab != '' ? absint( $slide_item_tab ) : 1 ) .'"',
				'data-items-mob="'. ( isset( $slide_item_mobile ) && $slide_item_mobile != '' ? absint( $slide_item_mobile ) : 1 ) .'"',
				'data-duration="'. ( isset( $slide_duration ) && $slide_duration != '' ? absint( $slide_duration ) : 5000 ) .'"',
				'data-smartspeed="'. ( isset( $slide_smart_speed ) && $slide_smart_speed != '' ? absint( $slide_smart_speed ) : 250 ) .'"',
				'data-scrollby="'. ( isset( $slide_slideby ) && $slide_slideby != '' ? absint( $slide_slideby ) : 1 ) .'"',
				'data-autoheight="false"',
			);
			$data_atts = implode( " ", $gal_atts );
		}
		
		$args = array(
			'post_type' => 'pixzlo-team',
			'posts_per_page' => absint( $post_per_page ),
			'ignore_sticky_posts' => 1
		);
		
		$query = new WP_Query( $args );
		if ( $query->have_posts() ) {
		
			if( $shortcode_css ) $class_names .= ' ' . $shortcode_rand_id . ' pixzlo-inline-css';
			
			$output .= '<div class="team-wrapper'. esc_attr( $class_names ) .'" data-css="'. htmlspecialchars( json_encode( $shortcode_css ), ENT_QUOTES, 'UTF-8' ) .'">';
				$row_stat = 0;
				
					//Team Slide
					if( isset( $slide_opt ) && $slide_opt == 'on' ) $output .= '<div class="owl-carousel" '. ( $data_atts ) .'>';	
					// Start the Loop
					while ( $query->have_posts() ) : $query->the_post();
						
						// Parameters Defined
						$post_id = get_the_ID();
						$team_array = array(
							'post_id' => $post_id,
							'excerpt_length' => $excerpt_length,
							'cols' => $cols,
							'more_text' => $more_text,
							'social_class' => $sclass_name,
							'list_stat' => true
						);
					
						//Overlay Output Formation
						$overlay_out = '';
						if( isset( $team_overlay_opt ) && $team_overlay_opt == 'enable' ) {
							if( isset( $team_overlay_type ) && $team_overlay_type != 'none' ){
								$overlay_out .= '<span class="overlay-bg overlay-'. esc_attr( $team_overlay_type ) .'"></span>';
							}
							$overlay_out .= '<div class="team-overlay'. esc_attr( $overlay_class ) .'">';
								
								$overlay_elemetns = isset( $overlay_team_items ) ? pixzlo_drag_and_drop_trim( $overlay_team_items ) : array( 'Enabled' => '' );
								if( isset( $overlay_elemetns['Enabled'] ) ) :
									foreach( $overlay_elemetns['Enabled'] as $element => $value ){
										$overlay_out .= pixzlo_team_shortcode_elements( $element, $team_array );
									}
								endif;
								
							$overlay_out .= '</div><!-- .team-overlay -->';
						}
					
						if( $row_stat == 0 && $slide_opt != 'on' ) :
							$output .= '<div class="row">';
						endif;
					
						//Team Slide Item
						if( isset( $slide_opt ) && $slide_opt == 'on' ) $output .= '<div class="item">';	
						$col_class = "col-lg-". absint( $cols );
						
						if( $team_model == 'team-list' )
							$col_class .= " col-md-12";
						else
							$col_class .= " " . ( $cols == 3 ? "col-md-6" : "col-md-". absint( $cols ) );
							
						if( isset( $slide_opt ) && $slide_opt == 'on' ) $team_array['cols'] = 12 / $slide_item;
							
						$output .= '<div class="'. esc_attr( $col_class ) .'">';
							$inner_class = $overlay_out ? ' team-overlay-actived' : '';
							$output .= '<div class="team-inner'. esc_attr( $inner_class ) .'">';
							$elemetns = isset( $team_items ) ? pixzlo_drag_and_drop_trim( $team_items ) : array( 'Enabled' => '' );
							if( isset( $elemetns['Enabled'] ) ) :
							
							
								if( $team_model == 'team-list' && array_key_exists( "thumb", $elemetns['Enabled'] ) ) {
									$output .= '<div class="media">';
										$output .= '<div class="team-left-wrap">';
										$team_array['list_stat'] = true;
										$output .= pixzlo_team_shortcode_elements( 'thumb', $team_array );
										$team_array['list_stat'] = false;
										$output .= '</div><!-- .team-left-wrap -->';
										$output .= '<div class="media-body team-right-wrap">';
								}
								foreach( $elemetns['Enabled'] as $element => $value ){
									if( $element == 'thumb' ){
										$team_array['overlay'] = $overlay_out;
									}
									$output .= pixzlo_team_shortcode_elements( $element, $team_array );
								}
								
								if( $team_model == 'team-list' && array_key_exists( "thumb", $elemetns['Enabled'] ) ) {
										$output .= '</div><!-- .media-body -->';
									$output .= '</div><!-- .media -->';							
								}
								
							endif;
							
							$output .= '</div><!-- .team-inner -->';
						$output .= '</div><!-- .cols -->';
						
						//Team Slide Item End
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
					
					//Team Slide End
					if( isset( $slide_opt ) && $slide_opt == 'on' ) $output .= '</div><!-- .owl-carousel -->';
			$output .= '</div><!-- .team-wrapper -->';
			
		}// query exists
		
		// use reset postdata to restore orginal query
		wp_reset_postdata();
		
		return $output;
	}
}
function pixzlo_team_shortcode_elements( $element, $opts = array() ){
	$output = '';
	switch( $element ){
	
		case "name":
			$output .= '<div class="team-name">';
				$output .= '<h6><a href="'. esc_url( get_the_permalink() ) .'" class="client-name">'. get_the_title() .'</a></h6>';
			$output .= '</div><!-- .team-name -->';		
		break;
		
		case "designation":
			$designation = get_post_meta( $opts['post_id'], 'pixzlo_team_designation', true );
			if( $designation ) :
				
				$output .= '<div class="team-designation">';
					$output .= '<p>'. esc_html( $designation ) .'</p>';
				$output .= '</div><!-- .team-designation -->';		
			endif;
		break;
		
		case "email":
			$email = get_post_meta( $opts['post_id'], 'pixzlo_team_email', true );
			if( $email ) :
				$output .= '<div class="team-email">';
					$output .= '<span>'. esc_html( "Email: ", "pixzlo" ) .'</span><a href="mailto:'. esc_url( $email ) .'">'. esc_html( $email ) .'</a>';
				$output .= '</div><!-- .team-email -->';		
			endif;
		break;
		
		case "phone":
			$phone = get_post_meta( $opts['post_id'], 'pixzlo_team_phone', true );
			if( $phone ) :
				$output .= '<div class="team-phone">';
					$output .= '<span>'. esc_html( "Phone: ", "pixzlo" ) .'</span><a href="tel://'. esc_attr( trim( $phone ) ) .'">'. esc_html( $phone ) .'</a>';
				$output .= '</div><!-- .team-phone -->';		
			endif;
		break;
		
		case "namedes":
			$output .= '<div class="team-name-designation">';
				$output .= '<p><a href="'. esc_url( get_the_permalink() ) .'" class="client-name">'. get_the_title() .'</a></p>';
				$designation = get_post_meta( $opts['post_id'], 'pixzlo_team_designation', true );
				if( $designation ) :
					$output .= '<p>'. esc_html( $designation ) .'</p>';
				endif;
			$output .= '</div><!-- .team-name-designation -->';		
		break;
		
		case "thumb":
			if ( has_post_thumbnail() && isset( $opts['list_stat'] ) && $opts['list_stat'] == true ) {
			
				$thumb_size = 'large';
				if( ( 12 / absint( $opts['cols'] ) ) >= 3 ){
					$thumb_size = 'pixzlo-team-medium';
				}else{
					$thumb_size = 'large';
				}
				
				$output .= '<div class="team-thumb">';
					$output .= isset( $opts['overlay'] ) ? $opts['overlay'] : '';
					$output .= get_the_post_thumbnail( $opts['post_id'], $thumb_size, array( 'class' => 'img-fluid' ) );
				$output .= '</div><!-- .team-thumb -->';
			}
		break;
		
		case "excerpt":
			$excerpt = isset( $opts['excerpt_length'] ) && $opts['excerpt_length'] != '' ? $opts['excerpt_length'] : 20;
			$output .= '<div class="team-excerpt">';
				add_filter( 'excerpt_length', __return_value( $excerpt ) );
				ob_start();
				the_excerpt();
				$excerpt_cont = ob_get_clean();
				$output .= $excerpt_cont;
			$output .= '</div><!-- .team-excerpt -->';	
		break;
		
		case "more":
			$read_more_text = isset( $opts['more_text'] ) ? $opts['more_text'] : esc_html__( 'Read more', 'pixzlo' );
			$output = '<div class="post-more"><a class="read-more" href="'. esc_url( get_permalink( get_the_ID() ) ) . '">'. esc_html( $read_more_text ) .'</a></div>';
		break;
		
		case "social":
			$output .= '<div class="team-social-wrap clearfix">';
				$output .= '<ul class="nav social-icons team-social'. esc_attr( $opts['social_class'] ) .'">';
					$taget = get_post_meta( get_the_ID(), 'pixzlo_team_link_target', true );
					$social_media = array( 
						'social-fb' => 'fa fa-facebook', 
						'social-twitter' => 'fa fa-twitter', 
						'social-instagram' => 'fa fa-instagram',
						'social-linkedin' => 'fa fa-linkedin', 
						'social-pinterest' => 'fa fa-pinterest-p',
						'social-youtube' => 'fa fa-youtube-play', 
						'social-vimeo' => 'fa fa-vimeo',
						'social-flickr' => 'fa fa-flickr', 
						'social-dribbble' => 'fa fa-dribbble'
					);
					$social_opt = array(
						'social-fb' => 'pixzlo_team_facebook', 
						'social-twitter' => 'pixzlo_team_twitter',
						'social-instagram' => 'pixzlo_team_instagram',
						'social-linkedin' => 'pixzlo_team_linkedin',
						'social-pinterest' => 'pixzlo_team_pinterest',
						'social-youtube' => 'pixzlo_team_youtube',
						'social-vimeo' => 'pixzlo_team_vimeo',
						'social-flickr' => 'pixzlo_team_flickr',
						'social-dribbble' => 'pixzlo_team_dribbble',
					);
					// Actived social icons from theme option output generate via loop
					foreach( $social_media as $key => $class ){
						$social_url = get_post_meta( get_the_ID(), $social_opt[$key], true );
						if( $social_url ):
							$output .= '<li>';
								$output .= '<a class="'. esc_attr( $key ) .'" href="'. esc_url( $social_url ) .'" target="'. esc_attr( $taget ) .'">';
									$output .= '<i class="'. esc_attr( $class ) .'"></i>';
								$output .= '</a>';
							$output .= '</li>';
						endif;
					}
				$output .= '</ul>';
			$output .= '</div> <!-- .team-social-wrap -->';
		break;
		
	}
	return $output; 
}
if ( ! function_exists( "pixzlo_vc_team_shortcode_map" ) ) {
	function pixzlo_vc_team_shortcode_map() {
				
		vc_map( 
			array(
				"name"					=> esc_html__( "Team", "pixzlo" ),
				"description"			=> esc_html__( "Team custom post type.", "pixzlo" ),
				"base"					=> "pixzlo_vc_team",
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
						"type"			=> "colorpicker",
						"heading"		=> esc_html__( "Font Color", "pixzlo" ),
						"description"	=> esc_html__( "Here you can put the font color.", "pixzlo" ),
						"param_name"	=> "font_color",
						"group"			=> esc_html__( "Layouts", "pixzlo" )
					),
					array(
						"type"			=> "img_select",
						"heading"		=> esc_html__( "Team Layout", "pixzlo" ),
						"param_name"	=> "team_layout",
						"img_lists" => array ( 
							"1"	=> PIXZLO_ADMIN_URL . "/assets/images/team/1.png",
							"2"	=> PIXZLO_ADMIN_URL . "/assets/images/team/2.png",
							"3"	=> PIXZLO_ADMIN_URL . "/assets/images/team/3.png"
						),
						"default"		=> "1",
						"group"			=> esc_html__( "Layouts", "pixzlo" )
					),
					array(
						"type"			=> "dropdown",
						"heading"		=> esc_html__( "Team Variation", "pixzlo" ),
						"description"	=> esc_html__( "This is an option for team variation either dark or light.", "pixzlo" ),
						"param_name"	=> "variation",
						"value"			=> array(
							esc_html__( "Light", "pixzlo" )	=> "light",
							esc_html__( "Dark", "pixzlo" )		=> "dark",
						),
						"group"			=> esc_html__( "Layouts", "pixzlo" )
					),
					array(
						"type"			=> "dropdown",
						"heading"		=> esc_html__( "Team Model", "pixzlo" ),
						"description"	=> esc_html__( "This is an option for team model either grid or list.", "pixzlo" ),
						"param_name"	=> "team_model",
						"value"			=> array(
							esc_html__( "Grid", "pixzlo" )	=> "grid",
							esc_html__( "List", "pixzlo" )	=> "list",
						),
						"group"			=> esc_html__( "Layouts", "pixzlo" )
					),
					array(
						"type"			=> "dropdown",
						"heading"		=> esc_html__( "Team Columns", "pixzlo" ),
						"description"	=> esc_html__( "This is an option for team columns.", "pixzlo" ),
						"param_name"	=> "team_cols",
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
						'heading'		=> esc_html__( 'Team Items', 'pixzlo' ),
						"description"	=> esc_html__( "This is settings for team custom layout. here you can set your own layout. Drag and drop needed team items to Enabled part.", "pixzlo" ),
						'param_name'	=> 'team_items',
						'dd_fields' => array ( 
							'Enabled' => array( 
								'thumb'	=> esc_html__( 'Image', 'pixzlo' ),
								'name'	=> esc_html__( 'Name', 'pixzlo' ),
								'designation'	=> esc_html__( 'Designation', 'pixzlo' ),
								'excerpt'	=> esc_html__( 'Excerpt', 'pixzlo' ),
								'social'	=> esc_html__( 'Social Links', 'pixzlo' ),
							),
							'disabled' => array(
								'more'	=> esc_html__( 'Read More', 'pixzlo' ),
								'email'	=> esc_html__( 'Email', 'pixzlo' ),
								'phone'	=> esc_html__( 'Phone Number', 'pixzlo' ),
								'namedes'	=> esc_html__( 'Name and Designation', 'pixzlo' )
							)
						),
						"group"			=> esc_html__( "Layouts", "pixzlo" )
					),
					array(
						"type"			=> "dropdown",
						"heading"		=> esc_html__( "Text Align", "pixzlo" ),
						"description"	=> esc_html__( "This is an option for team text align", "pixzlo" ),
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
						"description"	=> esc_html__( "This is an option for team slider option.", "pixzlo" ),
						"param_name"	=> "slide_opt",
						"value"			=> "off",
						"group"			=> esc_html__( "Layouts", "pixzlo" )
					),
					array(
						"type"			=> "dropdown",
						"heading"		=> esc_html__( "Image", "pixzlo" ),
						"description"	=> esc_html__( "This is an option for team image layout either normal, rounded, or circled", "pixzlo" ),
						"param_name"	=> "img_layout",
						"value"			=> array(
							esc_html__( "Default", "pixzlo" )	=> "",
							esc_html__( "Rounded", "pixzlo" )	=> "rounded",
							esc_html__( "Circle", "pixzlo" )	=> "circle",
						),
						"group"			=> esc_html__( "Layouts", "pixzlo" )
					),
					array(
						"type"			=> "dropdown",
						"heading"		=> esc_html__( "Overlay Team Option", "pixzlo" ),
						"description"	=> esc_html__( "This is an option for enable overlay team option.", "pixzlo" ),
						"param_name"	=> "team_overlay_opt",
						"value"			=> array(
							esc_html__( "Disable", "pixzlo" )	=> "disable",
							esc_html__( "Enable", "pixzlo" )	=> "enable"
						),
						"group"			=> esc_html__( "Overlay", "pixzlo" )
					),
					array(
						"type"			=> "colorpicker",
						"heading"		=> esc_html__( "Overlay Font Color", "pixzlo" ),
						"description"	=> esc_html__( "Here you can put team overlay font color.", "pixzlo" ),
						"param_name"	=> "team_overlay_font_color",
						'dependency' => array(
							'element' => 'team_overlay_opt',
							'value' => 'enable',
						),
						"group"			=> esc_html__( "Overlay", "pixzlo" )
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Overlay Link Colors", "pixzlo" ),
						"description"	=> esc_html__( "Here you can put team overlay link normal, hover colors. Example #ffffff, #cccccc", "pixzlo" ),
						"param_name"	=> "team_overlay_link_colors",
						'dependency' => array(
							'element' => 'team_overlay_opt',
							'value' => 'enable',
						),
						"group"			=> esc_html__( "Overlay", "pixzlo" )
					),
					array(
						'type'			=> 'drag_drop',
						'heading'		=> esc_html__( 'Overlay Team Items', 'pixzlo' ),
						"description"	=> esc_html__( "This is settings for team items(name, excerpt etc..) overlay on thumbnail. Drag and drop needed team items to Enabled part.", "pixzlo" ),
						'param_name'	=> 'overlay_team_items',
						'dd_fields' => array ( 
							'Enabled' => array( 
								'name'	=> esc_html__( 'Name', 'pixzlo' )
							),
							'disabled' => array(
								'designation'	=> esc_html__( 'Designation', 'pixzlo' ),
								'excerpt'	=> esc_html__( 'Excerpt', 'pixzlo' ),
								'social'	=> esc_html__( 'Social Links', 'pixzlo' ),
								'email'	=> esc_html__( 'Email', 'pixzlo' ),
								'phone'	=> esc_html__( 'Phone Number', 'pixzlo' ),
								'namedes'	=> esc_html__( 'Name and Designation', 'pixzlo' )
							)
						),
						'dependency' => array(
							'element' => 'team_overlay_opt',
							'value' => 'enable',
						),
						"group"			=> esc_html__( "Overlay", "pixzlo" )
					),
					array(
						"type"			=> "dropdown",
						"heading"		=> esc_html__( "Overlay Items Position", "pixzlo" ),
						"description"	=> esc_html__( "This is an option for overlay items position.", "pixzlo" ),
						"param_name"	=> "team_overlay_position",
						"value"			=> array(
							esc_html__( "Center", "pixzlo" )	=> "center",
							esc_html__( "Top Left", "pixzlo" )	=> "top-left",
							esc_html__( "Top Right", "pixzlo" )	=> "top-right",
							esc_html__( "Bottom Left", "pixzlo" )	=> "bottom-left",
							esc_html__( "Bottom Right", "pixzlo" )	=> "bottom-right",
							
							esc_html__( "Bottom Center", "pixzlo" )	=> "bottom-center",
						),
						'dependency' => array(
							'element' => 'team_overlay_opt',
							'value' => 'enable',
						),
						"group"			=> esc_html__( "Overlay", "pixzlo" )
					),
					array(
						"type"			=> "dropdown",
						"heading"		=> esc_html__( "Overlay Text Align", "pixzlo" ),
						"description"	=> esc_html__( "This is an option for team text align", "pixzlo" ),
						"param_name"	=> "overlay_text_align",
						"value"			=> array(
							esc_html__( "Default", "pixzlo" )	=> "default",
							esc_html__( "Left", "pixzlo" )		=> "left",
							esc_html__( "Center", "pixzlo" )	=> "center",
							esc_html__( "Right", "pixzlo" )		=> "right"
						),
						'dependency' => array(
							'element' => 'team_overlay_opt',
							'value' => 'enable',
						),
						"group"			=> esc_html__( "Overlay", "pixzlo" )
					),
					array(
						"type"			=> "dropdown",
						"heading"		=> esc_html__( "Overlay Type", "pixzlo" ),
						"description"	=> esc_html__( "This is an option for team overlay type.", "pixzlo" ),
						"param_name"	=> "team_overlay_type",
						"value"			=> array(
							esc_html__( "None", "pixzlo" ) => "none",
							esc_html__( "Overlay Dark", "pixzlo" ) => "dark",
							esc_html__( "Overlay White", "pixzlo" ) => "light",
							esc_html__( "Custom Color", "pixzlo" ) => "custom"
						),
						'dependency' => array(
							'element' => 'team_overlay_opt',
							'value' => 'enable',
						),
						"group"			=> esc_html__( "Overlay", "pixzlo" )
					),
					array(
						"type"			=> "colorpicker",
						"heading"		=> esc_html__( "Overlay Custom Gradient From", "pixzlo" ),
						"description"	=> esc_html__( "Here you can put team overlay custom gradient from color.", "pixzlo" ),
						"param_name"	=> "team_overlay_custom_color_1",
						'dependency' => array(
							'element' => 'team_overlay_type',
							'value' => 'custom',
						),
						"group"			=> esc_html__( "Overlay", "pixzlo" )
					),
					
					array(
						"type"			=> "colorpicker",
						"heading"		=> esc_html__( "Overlay Custom Gradient To", "pixzlo" ),
						"description"	=> esc_html__( "Here you can put team overlay custom gradient to color.", "pixzlo" ),
						"param_name"	=> "team_overlay_custom_color_2",
						'dependency' => array(
							'element' => 'team_overlay_type',
							'value' => 'custom',
						),
						"group"			=> esc_html__( "Overlay", "pixzlo" )
					),
					array(
						"type"			=> "dropdown",
						"heading"		=> esc_html__( "Social Icons Style", "pixzlo" ),
						"description"	=> esc_html__( "This is an option for team social icons style.", "pixzlo" ),
						"param_name"	=> "social_style",
						"value"			=> array(
							esc_html__( "Circled", "pixzlo" )	=> "circled",
							esc_html__( "Square", "pixzlo" )	=> "squared",
							esc_html__( "Rounded", "pixzlo" )	=> "rounded",
							esc_html__( "Transparent", "pixzlo" )		=> "transparent"
						),
						"group"			=> esc_html__( "Social", "pixzlo" )
					),
					array(
						"type"			=> "dropdown",
						"heading"		=> esc_html__( "Social Icons Color", "pixzlo" ),
						"description"	=> esc_html__( "This is an option for team social icons color.", "pixzlo" ),
						"param_name"	=> "social_color",
						"value"			=> array(
							esc_html__( "Black", "pixzlo" )		=> "black",
							esc_html__( "White", "pixzlo" )		=> "white",
							esc_html__( "Own Color", "pixzlo" )	=> "own"
						),
						"group"			=> esc_html__( "Social", "pixzlo" )
					),
					array(
						"type"			=> "dropdown",
						"heading"		=> esc_html__( "Social Icons Hover Color", "pixzlo" ),
						"description"	=> esc_html__( "This is an option for team social icons hover color.", "pixzlo" ),
						"param_name"	=> "social_hcolor",
						"value"			=> array(
							esc_html__( "White", "pixzlo" )		=> "h-white",
							esc_html__( "Black", "pixzlo" )		=> "h-black",
							esc_html__( "Own Color", "pixzlo" )	=> "h-own"
						),
						"group"			=> esc_html__( "Social", "pixzlo" )
					),
					array(
						"type"			=> "dropdown",
						"heading"		=> esc_html__( "Social Icons Background", "pixzlo" ),
						"description"	=> esc_html__( "This is an option for team social icons background.", "pixzlo" ),
						"param_name"	=> "social_bg",
						"value"			=> array(
							esc_html__( "White", "pixzlo" )		=> "bg-white",
							esc_html__( "Black", "pixzlo" )		=> "bg-black",
							esc_html__( "RGBA Light", "pixzlo" )=> "bg-light",
							esc_html__( "RGBA Dark", "pixzlo" )	=> "bg-dark",
							esc_html__( "Own Color", "pixzlo" )	=> "bg-own",
							
							esc_html__( "Transparent", "pixzlo" )	=> "bg-trans"
						),
						"group"			=> esc_html__( "Social", "pixzlo" )
					),
					array(
						"type"			=> "dropdown",
						"heading"		=> esc_html__( "Social Icons Hover Background Color", "pixzlo" ),
						"description"	=> esc_html__( "This is an option for team social icons hover background.", "pixzlo" ),
						"param_name"	=> "social_hbg",
						"value"			=> array(
							esc_html__( "Own Color", "pixzlo" )	=> "hbg-own",
							esc_html__( "Black", "pixzlo" )		=> "hbg-black",
							esc_html__( "White", "pixzlo" )		=> "hbg-white",
							esc_html__( "RGBA Light", "pixzlo" )=> "hbg-light",
							esc_html__( "RGBA Dark", "pixzlo" )	=> "hbg-dark",
							esc_html__( "Transparent", "pixzlo" )	=> "hbg-trans"						
						),
						"group"			=> esc_html__( "Social", "pixzlo" )
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Items", "pixzlo" ),
						"description"	=> esc_html__( "This is an option for team slide items shown on large devices.", "pixzlo" ),
						"param_name"	=> "slide_item",
						"value" 		=> "2",
						"group"			=> esc_html__( "Slide", "pixzlo" )
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Items on Tab", "pixzlo" ),
						"description"	=> esc_html__( "This is an option for team slide items shown on tab.", "pixzlo" ),
						"param_name"	=> "slide_item_tab",
						"value" 		=> "2",
						"group"			=> esc_html__( "Slide", "pixzlo" )
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Items on Mobile", "pixzlo" ),
						"description"	=> esc_html__( "This is an option for team slide items shown on mobile.", "pixzlo" ),
						"param_name"	=> "slide_item_mobile",
						"value" 		=> "1",
						"group"			=> esc_html__( "Slide", "pixzlo" )
					),
					array(
						"type"			=> "switch_bit",
						"heading"		=> esc_html__( "Auto Play", "pixzlo" ),
						"description"	=> esc_html__( "This is an option for team slider auto play.", "pixzlo" ),
						"param_name"	=> "slide_item_autoplay",
						"value"			=> "off",
						"group"			=> esc_html__( "Slide", "pixzlo" )
					),
					array(
						"type"			=> "switch_bit",
						"heading"		=> esc_html__( "Loop", "pixzlo" ),
						"description"	=> esc_html__( "This is an option for team slider loop.", "pixzlo" ),
						"param_name"	=> "slide_item_loop",
						"value"			=> "off",
						"group"			=> esc_html__( "Slide", "pixzlo" )
					),
					array(
						"type"			=> "switch_bit",
						"heading"		=> esc_html__( "Items Center", "pixzlo" ),
						"description"	=> esc_html__( "This is an option for team slider center, for this option must active loop and minimum items 2.", "pixzlo" ),
						"param_name"	=> "slide_center",
						"value"			=> "off",
						"group"			=> esc_html__( "Slide", "pixzlo" )
					),
					array(
						"type"			=> "switch_bit",
						"heading"		=> esc_html__( "Navigation", "pixzlo" ),
						"description"	=> esc_html__( "This is an option for team slider navigation.", "pixzlo" ),
						"param_name"	=> "slide_nav",
						"value"			=> "off",
						"group"			=> esc_html__( "Slide", "pixzlo" )
					),
					array(
						"type"			=> "switch_bit",
						"heading"		=> esc_html__( "Pagination", "pixzlo" ),
						"description"	=> esc_html__( "This is an option for team slider pagination.", "pixzlo" ),
						"param_name"	=> "slide_dots",
						"value"			=> "off",
						"group"			=> esc_html__( "Slide", "pixzlo" )
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Items Margin", "pixzlo" ),
						"description"	=> esc_html__( "This is an option for team slider margin space.", "pixzlo" ),
						"param_name"	=> "slide_margin",
						"value" 		=> "",
						"group"			=> esc_html__( "Slide", "pixzlo" )
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Items Duration", "pixzlo" ),
						"description"	=> esc_html__( "This is an option for team slider duration.", "pixzlo" ),
						"param_name"	=> "slide_duration",
						"value" 		=> "5000",
						"group"			=> esc_html__( "Slide", "pixzlo" )
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Items Smart Speed", "pixzlo" ),
						"description"	=> esc_html__( "This is an option for team slider smart speed.", "pixzlo" ),
						"param_name"	=> "slide_smart_speed",
						"value" 		=> "250",
						"group"			=> esc_html__( "Slide", "pixzlo" )
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Items Slideby", "pixzlo" ),
						"description"	=> esc_html__( "This is an option for team slider scroll by.", "pixzlo" ),
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
add_action( "vc_before_init", "pixzlo_vc_team_shortcode_map" );