<?php 
/**
 * Pixzlo Image Grid
 */
if ( ! function_exists( "pixzlo_vc_image_grid_shortcode" ) ) {
	function pixzlo_vc_image_grid_shortcode( $atts, $content = NULL ) {
		
		$atts = vc_map_get_attributes( "pixzlo_vc_image_grid", $atts );
		extract( $atts );
		$output = '';
	
		//Defined Variable
		$class_names = isset( $extra_class ) && $extra_class != '' ? ' ' . $extra_class : '';
		$class_names .= isset( $image_grid_layout ) ? ' image-grid-' . $image_grid_layout : ' image-grid-1';
		$cols = isset( $grid_cols ) ? $grid_cols : 12;
		$slide_opt = isset( $slide_opt ) && $slide_opt == 'on' ? true : false;
		$grids = '';
		
		$gal_atts = $data_atts = '';
		if( isset( $image_grid_images ) ){ 
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
			$grids = isset( $slide_item ) && $slide_item != '' ? absint( $slide_item ) : 2;
		}
		
		if( $grids === 1 ){
			$thumb_size = 'large';
		}elseif( $grids == 2 ){
			$thumb_size = 'medium';
		}elseif( $grids == 3 ){
			$thumb_size = 'pixzlo-grid-large';
		}else{
			$thumb_size = 'pixzlo-grid-medium';
		}
		
		$col_class = "col-lg-". absint( $cols );
		$col_class .= " " . ( $cols == 3 ? "col-md-6" : "col-md-". absint( $cols ) );
			
		if( isset( $image_grid_images ) ){
			
			$output .= '<div class="image-grid-wrapper'. esc_attr( $class_names ) .'">';
				$row_stat = 0;
				
				//Image Grid Slide
				if( $slide_opt ) $output .= '<div class="owl-carousel" '. ( $data_atts ) .'>';
				
					$image_ids = explode( ',', $image_grid_images );
					foreach( $image_ids as $image_id ){
					
						if( $row_stat == 0 && !$slide_opt ) :
							$output .= '<div class="row">';
						endif;
					
						//Image Grid Slide
						if( $slide_opt ) $output .= '<div class="item">';
						
							$output .= '<div class="'. esc_attr( $col_class ) .'">';
								$output .= '<div class="image-grid-inner">';
					
									$images = wp_get_attachment_image_src( $image_id, $thumb_size, true );
									$image_alt = get_post_meta( absint( $image_id ), '_wp_attachment_image_alt', true);
									$image_alt = $image_alt == '' ? esc_html__( 'Image', 'pixzlo' ) : $image_alt;
									$output .='<img class="img-fluid" src="'. esc_url( $images[0] ) .'" data-mce-src="'. esc_url( $images[0] ) .'" alt="'. esc_attr( $image_alt ) .'" />';
									
								$output .= '</div><!-- .image-grid-inner -->';
							$output .= '</div><!-- .cols -->';
						
						//Team Slide Item End
						if( $slide_opt ) $output .= '</div><!-- .item -->';		
						
						$row_stat++;
						if( $row_stat == ( 12/ $cols ) && !$slide_opt ) :
							$output .= '</div><!-- .row -->';
							$row_stat = 0;
						endif;
						
					}
					//Unexpected row close
					if( $row_stat != 0 && !$slide_opt ){
						$output .= '</div><!-- .row -->';
					}	
					
				//Image Grid Slide End
				if( $slide_opt ) $output .= '</div><!-- .owl-carousel -->';
				
			$output .= '</div><!-- .image-grid-wrapper -->';
			
		}
		
		return $output;
	}
}
if ( ! function_exists( "pixzlo_vc_image_grid_shortcode_map" ) ) {
	function pixzlo_vc_image_grid_shortcode_map() {
				
		vc_map( 
			array(
				"name"					=> esc_html__( "Image Grid", "pixzlo" ),
				"description"			=> esc_html__( "Image Grid custom post type.", "pixzlo" ),
				"base"					=> "pixzlo_vc_image_grid",
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
						"type"			=> "dropdown",
						"heading"		=> esc_html__( "Image Grid Columns", "pixzlo" ),
						"description"	=> esc_html__( "This grid option using to divide columns as per given numbers. This option active only when slide inactive otherwise slide columns only focus to divide.", "pixzlo" ),
						"param_name"	=> "grid_cols",
						"value"			=> array(
							esc_html__( "1 Column", "pixzlo" )	=> "12",
							esc_html__( "2 Columns", "pixzlo" )	=> "6",
							esc_html__( "3 Columns", "pixzlo" )	=> "4",
							esc_html__( "4 Columns", "pixzlo" )	=> "3",
						)
					),
					array(
						"type"			=> "img_select",
						"heading"		=> esc_html__( "Image Grid Layout", "pixzlo" ),
						"param_name"	=> "image_grid_layout",
						"img_lists" => array ( 
							"1"	=> PIXZLO_ADMIN_URL . "/assets/images/image-grid/1.png",
							"2"	=> PIXZLO_ADMIN_URL . "/assets/images/image-grid/2.png"
						),
						"default"		=> "1"
					),
					array(
						"type" => "attach_images",
						"heading" => esc_html__( "Attach Images", "pixzlo" ),
						"description" => esc_html__( "Choose image grid images.", "pixzlo" ),
						"param_name" => "image_grid_images",
						"value" => '',
						"group"			=> esc_html__( "Image", "pixzlo" ),
					),
					array(
						"type"			=> "switch_bit",
						"heading"		=> esc_html__( "Slide Enable", "pixzlo" ),
						"description"	=> esc_html__( "This is option for enable or disable slide.", "pixzlo" ),
						"param_name"	=> "slide_opt",
						"value"			=> "off",
						"group"			=> esc_html__( "Slide", "pixzlo" )
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Items", "pixzlo" ),
						"description"	=> esc_html__( "This is option for image gird shortcode slide items shown on large devices.", "pixzlo" ),
						"param_name"	=> "slide_item",
						"value" 		=> "3",
						"group"			=> esc_html__( "Slide", "pixzlo" )
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Items on Tab", "pixzlo" ),
						"description"	=> esc_html__( "This is option for image gird shortcode slide items shown on tab.", "pixzlo" ),
						"param_name"	=> "slide_item_tab",
						"value" 		=> "2",
						"group"			=> esc_html__( "Slide", "pixzlo" )
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Items on Mobile", "pixzlo" ),
						"description"	=> esc_html__( "This is option for image gird shortcode slide items shown on mobile.", "pixzlo" ),
						"param_name"	=> "slide_item_mobile",
						"value" 		=> "1",
						"group"			=> esc_html__( "Slide", "pixzlo" )
					),
					array(
						"type"			=> "switch_bit",
						"heading"		=> esc_html__( "Auto Play", "pixzlo" ),
						"description"	=> esc_html__( "This is option for image gird shortcode slider auto play.", "pixzlo" ),
						"param_name"	=> "slide_item_autoplay",
						"value"			=> "off",
						"group"			=> esc_html__( "Slide", "pixzlo" )
					),
					array(
						"type"			=> "switch_bit",
						"heading"		=> esc_html__( "Loop", "pixzlo" ),
						"description"	=> esc_html__( "This is option for image gird shortcode slider loop.", "pixzlo" ),
						"param_name"	=> "slide_item_loop",
						"value"			=> "off",
						"group"			=> esc_html__( "Slide", "pixzlo" )
					),
					array(
						"type"			=> "switch_bit",
						"heading"		=> esc_html__( "Items Center", "pixzlo" ),
						"description"	=> esc_html__( "This is option for image gird shortcode center, for this option must active loop and minimum items 2.", "pixzlo" ),
						"param_name"	=> "slide_center",
						"value"			=> "off",
						"group"			=> esc_html__( "Slide", "pixzlo" )
					),
					array(
						"type"			=> "switch_bit",
						"heading"		=> esc_html__( "Navigation", "pixzlo" ),
						"description"	=> esc_html__( "This is option for image gird shortcode navigation.", "pixzlo" ),
						"param_name"	=> "slide_nav",
						"value"			=> "off",
						"group"			=> esc_html__( "Slide", "pixzlo" )
					),
					array(
						"type"			=> "switch_bit",
						"heading"		=> esc_html__( "Pagination", "pixzlo" ),
						"description"	=> esc_html__( "This is option for image gird shortcode pagination.", "pixzlo" ),
						"param_name"	=> "slide_dots",
						"value"			=> "off",
						"group"			=> esc_html__( "Slide", "pixzlo" )
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Items Margin", "pixzlo" ),
						"description"	=> esc_html__( "This is option for image gird shortcode margin space.", "pixzlo" ),
						"param_name"	=> "slide_margin",
						"value" 		=> "",
						"group"			=> esc_html__( "Slide", "pixzlo" )
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Items Duration", "pixzlo" ),
						"description"	=> esc_html__( "This is option for image gird shortcode duration.", "pixzlo" ),
						"param_name"	=> "slide_duration",
						"value" 		=> "5000",
						"group"			=> esc_html__( "Slide", "pixzlo" )
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Items Smart Speed", "pixzlo" ),
						"description"	=> esc_html__( "This is option for image gird shortcode smart speed.", "pixzlo" ),
						"param_name"	=> "slide_smart_speed",
						"value" 		=> "250",
						"group"			=> esc_html__( "Slide", "pixzlo" )
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Items Slideby", "pixzlo" ),
						"description"	=> esc_html__( "This is option for image gird shortcode scroll by.", "pixzlo" ),
						"param_name"	=> "slide_slideby",
						"value" 		=> "1",
						"group"			=> esc_html__( "Slide", "pixzlo" )
					),
				)
			) 
		);
	}
}
add_action( "vc_before_init", "pixzlo_vc_image_grid_shortcode_map" );