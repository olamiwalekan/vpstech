<?php 
/**
 * Pixzlo Tabs
 */
if ( ! function_exists( "pixzlo_vc_tabs_shortcode" ) ) {
	function pixzlo_vc_tabs_shortcode( $atts, $content = NULL ) {
		
		$atts = vc_map_get_attributes( "pixzlo_vc_tabs", $atts );
		extract( $atts );
		
		//Define Variables
		$class = isset( $extra_class ) && $extra_class != '' ? ' '. $extra_class : '';
		$class .= isset( $tabs_variation ) && $tabs_variation != '' ? ' pixzlo-tab-'.$tabs_variation : '';
		$class .= isset( $tabs_content_align ) && $tabs_content_align != '' ? ' pixzlo-tab-content-'. $tabs_content_align : '';		
		$class .= isset( $tabs_list_align ) && $tabs_list_align != '' ? ' pixzlo-tab-list-'. $tabs_list_align : '';	
		
		$output = '';
		$output .= '<div class="pixzlo-tabs-wrapper'. esc_attr( $class ) .'">';
			$tab_content = $content ? do_shortcode( $content ) : '';
			$output .= '<ul class="nav nav-tabs" id="nav-tab" role="tablist">';
				$output .= pixzlo_tabs_shortcode_list_collect( '', true );
			$output .= '</ul><!-- .nav-tabs -->';
			$output .= '<div class="tab-content">';
				$output .= pixzlo_tabs_shortcode_content_collect( '', true );
			$output .= '</div><!-- .tab-content -->';	
		$output .= '</div><!-- .pixzlo-tabs-wrapper -->';
		
		return $output;
	}
}
if ( ! function_exists( "pixzlo_vc_tabs_shortcode_map" ) ) {
	function pixzlo_vc_tabs_shortcode_map() {
				
		vc_map( 
			array(
				"name"					=> esc_html__( "Tabs", "pixzlo" ),
				"description"			=> esc_html__( "Default tabs.", "pixzlo" ),
				"base"					=> "pixzlo_vc_tabs",
				'allowed_container_element' => 'pixzlo_vc_tab',
				'as_parent'               => array('only' => 'pixzlo_vc_tab'),
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
						"type"			=> "dropdown",
						"heading"		=> esc_html__( "Tab Style", "pixzlo" ),
						"description"	=> esc_html__( "This is option for make the tabs looks modern/classic variations.", "pixzlo" ),
						"param_name"	=> "tabs_variation",
						"value"			=> array(
							esc_html__( "Default", "pixzlo" )		=> "default",
							esc_html__( "Classic", "pixzlo" )		=> "classic",
							esc_html__( "Modern", "pixzlo" )		=> "modern"
						)
					),
					array(
						"type"			=> "dropdown",
						"heading"		=> esc_html__( "Tab List Text Align", "pixzlo" ),
						"description"	=> esc_html__( "This is option for align tab list.", "pixzlo" ),
						"param_name"	=> "tabs_list_align",
						"value"			=> array(
							esc_html__( "Default", "pixzlo" )		=> "",
							esc_html__( "Left", "pixzlo" )		=> "left",
							esc_html__( "Center", "pixzlo" )	=> "center",
							esc_html__( "Right", "pixzlo" )		=> "right"
						)
					),
					array(
						"type"			=> "dropdown",
						"heading"		=> esc_html__( "Tab Content Text Align", "pixzlo" ),
						"description"	=> esc_html__( "This is option for align tab content.", "pixzlo" ),
						"param_name"	=> "tabs_content_align",
						"value"			=> array(
							esc_html__( "Default", "pixzlo" )		=> "",
							esc_html__( "Left", "pixzlo" )		=> "left",
							esc_html__( "Center", "pixzlo" )	=> "center",
							esc_html__( "Right", "pixzlo" )		=> "right"
						)
					)	
				)
			) 
		);
	}
}
add_action( "vc_before_init", "pixzlo_vc_tabs_shortcode_map" );
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_Pixzlo_Vc_Tabs extends WPBakeryShortCodesContainer {
    }
}

if( !function_exists( 'pixzlo_tabs_shortcode_list_collect' ) ) {
	function pixzlo_tabs_shortcode_list_collect( $list_cont = '', $set_empty = false ) {
		static $tabs_shortcode_list_collect = '';
		if( $set_empty == true ){
			$returnout = $tabs_shortcode_list_collect;
			$tabs_shortcode_list_collect = '';
			return $returnout;
		}else{
			if( $tabs_shortcode_list_collect == '' ){
				$list_cont = str_replace( "nav-link", "nav-link active", $list_cont );
			}
			$tabs_shortcode_list_collect .= $list_cont;
		}
		return $tabs_shortcode_list_collect;
	}
}

if( !function_exists( 'pixzlo_tabs_shortcode_content_collect' ) ) {
	function pixzlo_tabs_shortcode_content_collect( $tab_cont = '', $set_empty = false ) {
		static $tabs_shortcode_content_collect = '';
		if( $set_empty == true ){
			$returnout = $tabs_shortcode_content_collect;
			$tabs_shortcode_content_collect = '';
			return $returnout;
		}else{
			if( $tabs_shortcode_content_collect == '' ){
				$tab_cont = str_replace( "tab-pane fade", "tab-pane fade show active", $tab_cont );
			}
			$tabs_shortcode_content_collect .= $tab_cont;
		}
		return $tabs_shortcode_content_collect;
	}
}