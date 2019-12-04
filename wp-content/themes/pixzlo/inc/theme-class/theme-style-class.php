<?php
class PixzloThemeStyles {
   
   	private $pixzlo_options;
	private $exists_fonts = array();
   
    function __construct() {
		$this->pixzlo_options = get_option( 'pixzlo_options' );
    }
	
	function pixzloThemeColor(){
		$pixzlo_options = $this->pixzlo_options;
		return isset( $pixzlo_options['theme-color'] ) && $pixzlo_options['theme-color'] != '' ? $pixzlo_options['theme-color'] : '#54a5f8';
	}
	function pixzloSecondaryColor(){
		$pixzlo_options = $this->pixzlo_options;
		return isset( $pixzlo_options['secondary-color'] ) && $pixzlo_options['secondary-color'] != '' ? $pixzlo_options['secondary-color'] : '#95ce69';
	}
	function pixzlo_theme_opt($field){
		$pixzlo_options = $this->pixzlo_options;
		return isset( $pixzlo_options[$field] ) && $pixzlo_options[$field] != '' ? $pixzlo_options[$field] : '';
	}
	
	function pixzlo_check_meta_value( $meta_key, $default_key ){
		$meta_opt = get_post_meta( get_the_ID(), $meta_key, true );
		$final_opt = isset( $meta_opt ) && ( empty( $meta_opt ) || $meta_opt == 'theme-default' ) ? $this->pixzlo_theme_opt( $default_key ) : $meta_opt;
		return $final_opt;
	}
	
	function pixzlo_container_width(){
		$pixzlo_options = $this->pixzlo_options;
		return isset( $pixzlo_options['site-width'] ) && $pixzlo_options['site-width']['width'] != '' ? absint( $pixzlo_options['site-width']['width'] ) . $pixzlo_options['site-width']['units'] : '1140px';
	}
	
	function pixzlo_dimension_width($field){
		$pixzlo_options = $this->pixzlo_options;
		return isset( $pixzlo_options[$field] ) && absint( $pixzlo_options[$field]['width'] ) != '' ? absint( $pixzlo_options[$field]['width'] ) . $pixzlo_options[$field]['units'] : '';
	}
	
	function pixzlo_dimension_height($field){
		$pixzlo_options = $this->pixzlo_options;
		return isset( $pixzlo_options[$field] ) && absint( $pixzlo_options[$field]['height'] ) != '' ? absint( $pixzlo_options[$field]['height'] ) . $pixzlo_options[$field]['units'] : '';
	}
	
	function pixzlo_border_settings($field){
		$pixzlo_options = $this->pixzlo_options;
		if( isset( $pixzlo_options[$field] ) ):
		
			$boder_style = isset( $pixzlo_options[$field]['border-style'] ) && $pixzlo_options[$field]['border-style'] != '' ? $pixzlo_options[$field]['border-style'] : '';
			$border_color = isset( $pixzlo_options[$field]['border-color'] ) && $pixzlo_options[$field]['border-color'] != '' ? $pixzlo_options[$field]['border-color'] : '';
			
			if( isset( $pixzlo_options[$field]['border-top'] ) && $pixzlo_options[$field]['border-top'] != '' ):
				echo '
				border-top-width: '. $pixzlo_options[$field]['border-top'] .';
				border-top-style: '. $boder_style .';
				border-top-color: '. $border_color .';';
			endif;
			
			if( isset( $pixzlo_options[$field]['border-right'] ) && $pixzlo_options[$field]['border-right'] != '' ):
				echo '
				border-right-width: '. $pixzlo_options[$field]['border-right'] .';
				border-right-style: '. $boder_style .';
				border-right-color: '. $border_color .';';
			endif;
			
			if( isset( $pixzlo_options[$field]['border-bottom'] ) && $pixzlo_options[$field]['border-bottom'] != '' ):
				echo '
				border-bottom-width: '. $pixzlo_options[$field]['border-bottom'] .';
				border-bottom-style: '. $boder_style .';
				border-bottom-color: '. $border_color .';';
			endif;
			
			if( isset( $pixzlo_options[$field]['border-left'] ) && $pixzlo_options[$field]['border-left'] != '' ):
				echo '
				border-left-width: '. $pixzlo_options[$field]['border-left'] .';
				border-left-style: '. $boder_style .';
				border-left-color: '. $border_color .';';
			endif;
			
		endif;
	}
	
	function pixzlo_padding_settings($field){
		$pixzlo_options = $this->pixzlo_options;
	if( isset( $pixzlo_options[$field] ) ):
	
		echo isset( $pixzlo_options[$field]['padding-top'] ) && $pixzlo_options[$field]['padding-top'] != '' ? 'padding-top: '. $pixzlo_options[$field]['padding-top'] .';' : '';
		echo isset( $pixzlo_options[$field]['padding-right'] ) && $pixzlo_options[$field]['padding-right'] != '' ? 'padding-right: '. $pixzlo_options[$field]['padding-right'] .';' : '';
		echo isset( $pixzlo_options[$field]['padding-bottom'] ) && $pixzlo_options[$field]['padding-bottom'] != '' ? 'padding-bottom: '. $pixzlo_options[$field]['padding-bottom'] .';' : '';
		echo isset( $pixzlo_options[$field]['padding-left'] ) && $pixzlo_options[$field]['padding-left'] != '' ? 'padding-left: '. $pixzlo_options[$field]['padding-left'] .';' : '';
	endif;
	}
	
	function pixzlo_margin_settings( $field ){
		$pixzlo_options = $this->pixzlo_options;
	if( isset( $pixzlo_options[$field] ) ):
	
		echo isset( $pixzlo_options[$field]['margin-top'] ) && $pixzlo_options[$field]['margin-top'] != '' ? 'margin-top: '. $pixzlo_options[$field]['margin-top'] .';' : '';
		echo isset( $pixzlo_options[$field]['margin-right'] ) && $pixzlo_options[$field]['margin-right'] != '' ? 'margin-right: '. $pixzlo_options[$field]['margin-right'] .';' : '';
		echo isset( $pixzlo_options[$field]['margin-bottom'] ) && $pixzlo_options[$field]['margin-bottom'] != '' ? 'margin-bottom: '. $pixzlo_options[$field]['margin-bottom'] .';' : '';
		echo isset( $pixzlo_options[$field]['margin-left'] ) && $pixzlo_options[$field]['margin-left'] != '' ? 'margin-left: '. $pixzlo_options[$field]['margin-left'] .';' : '';
	endif;
	}
	
	function pixzlo_link_color($field, $fun){
		$pixzlo_options = $this->pixzlo_options;
	echo isset( $pixzlo_options[$field][$fun] ) && $pixzlo_options[$field][$fun] != '' ? '
	color: '. $pixzlo_options[$field][$fun] .';' : '';
	}
	
	function pixzlo_get_link_color($field, $fun){
		$pixzlo_options = $this->pixzlo_options;
		return isset( $pixzlo_options[$field][$fun] ) && $pixzlo_options[$field][$fun] != '' ? $pixzlo_options[$field][$fun] : '';
	}
	
	function pixzlo_bg_rgba($field){
		$pixzlo_options = $this->pixzlo_options;
	echo isset( $pixzlo_options[$field]['rgba'] ) && $pixzlo_options[$field]['rgba'] != '' ? 'background: '. $pixzlo_options[$field]['rgba'] .';' : '';
	}
	
	function pixzlo_bg_settings($field){
		$pixzlo_options = $this->pixzlo_options;
		if( isset( $pixzlo_options[$field] ) ):
	echo '
	'. ( isset( $pixzlo_options[$field]['background-color'] ) && $pixzlo_options[$field]['background-color'] != '' ?  'background-color: '. $pixzlo_options[$field]['background-color'] .';' : '' ) .'
	'. ( isset( $pixzlo_options[$field]['background-image'] ) && $pixzlo_options[$field]['background-image'] != '' ?  'background-image: url('. $pixzlo_options[$field]['background-image'] .');' : '' ) .'
	'. ( isset( $pixzlo_options[$field]['background-repeat'] ) && $pixzlo_options[$field]['background-repeat'] != '' ?  'background-repeat: '. $pixzlo_options[$field]['background-repeat'] .';' : '' ) .'
	'. ( isset( $pixzlo_options[$field]['background-position'] ) && $pixzlo_options[$field]['background-position'] != '' ?  'background-position: '. $pixzlo_options[$field]['background-position'] .';' : '' ) .'
	'. ( isset( $pixzlo_options[$field]['background-size'] ) && $pixzlo_options[$field]['background-size'] != '' ?  'background-size: '. $pixzlo_options[$field]['background-size'] .';' : '' ) .'
	'. ( isset( $pixzlo_options[$field]['background-attachment'] ) && $pixzlo_options[$field]['background-attachment'] != '' ?  'background-attachment: '. $pixzlo_options[$field]['background-attachment'] .';' : '' ) .'
	';
		endif;
	}
	
	function pixzlo_custom_font_face_create( $font_family, $cf_names ){
	
		$upload_dir = wp_upload_dir();
		$f_type = array('eot', 'otf', 'svg', 'ttf', 'woff');
		if ( in_array( $font_family, $cf_names ) ){
			$t_font_folder = $font_family;
			$t_font_name = sanitize_title( $font_family );
			$font_path = $upload_dir['baseurl'] . '/custom-fonts/' . str_replace( "'", "", $t_font_folder .'/'. $t_font_name );
			echo '@font-face { font-family: '. $t_font_folder .';';
			echo "src: url('". esc_url( $font_path ) .".eot'); /* IE9 Compat Modes */ src: url('". esc_url( $font_path ) .".eot') format('embedded-opentype'), /* IE6-IE8 */ url('". esc_url( $font_path ) .".woff2') format('woff2'), /* Super Modern Browsers */ url('". esc_url( $font_path ) .".woff') format('woff'), /* Pretty Modern Browsers */ url('". esc_url( $font_path ) .".ttf')  format('truetype'), /* Safari, Android, iOS */ url('". esc_url( $font_path ) .".svg') format('svg'); /* Legacy iOS */ }";
		}
		
	}
	
	function pixzlo_custom_font_check($field){
		$pixzlo_options = $this->pixzlo_options;
		$cf_names = get_option( 'pixzlo_custom_fonts_names' );
		if ( !empty( $cf_names ) && !in_array( $pixzlo_options[$field]['font-family'], $this->exists_fonts ) ){
			$this->pixzlo_custom_font_face_create( $pixzlo_options[$field]['font-family'], $cf_names );
			array_push( $this->exists_fonts, $pixzlo_options[$field]['font-family'] );
		}
	}
	
	function pixzlo_typo_generate($field){
		$pixzlo_options = $this->pixzlo_options;
		if( isset( $pixzlo_options[$field] ) ):
	echo '
	'. ( isset( $pixzlo_options[$field]['color'] ) && $pixzlo_options[$field]['color'] != '' ?  'color: '. $pixzlo_options[$field]['color'] .';' : '' ) .'
	'. ( isset( $pixzlo_options[$field]['font-family'] ) && $pixzlo_options[$field]['font-family'] != '' ?  'font-family: '. $pixzlo_options[$field]['font-family'] .';' : '' ) .'
	'. ( isset( $pixzlo_options[$field]['font-weight'] ) && $pixzlo_options[$field]['font-weight'] != '' ?  'font-weight: '. $pixzlo_options[$field]['font-weight'] .';' : '' ) .'
	'. ( isset( $pixzlo_options[$field]['font-style'] ) && $pixzlo_options[$field]['font-style'] != '' ?  'font-style: '. $pixzlo_options[$field]['font-style'] .';' : '' ) .'
	'. ( isset( $pixzlo_options[$field]['font-size'] ) && $pixzlo_options[$field]['font-size'] != '' ?  'font-size: '. $pixzlo_options[$field]['font-size'] .';' : '' ) .'
	'. ( isset( $pixzlo_options[$field]['line-height'] ) && $pixzlo_options[$field]['line-height'] != '' ?  'line-height: '. $pixzlo_options[$field]['line-height'] .';' : '' ) .'
	'. ( isset( $pixzlo_options[$field]['letter-spacing'] ) && $pixzlo_options[$field]['letter-spacing'] != '' ?  'letter-spacing: '. $pixzlo_options[$field]['letter-spacing'] .';' : '' ) .'
	'. ( isset( $pixzlo_options[$field]['text-align'] ) && $pixzlo_options[$field]['text-align'] != '' ?  'text-align: '. $pixzlo_options[$field]['text-align'] .';' : '' ) .'
	'. ( isset( $pixzlo_options[$field]['text-transform'] ) && $pixzlo_options[$field]['text-transform'] != '' ?  'text-transform: '. $pixzlo_options[$field]['text-transform'] .';' : '' ) .'
	';
		endif;
	}
	
	function pixzlo_hex2rgba($color, $opacity = 1) {
	 
		$default = '';
		//Return default if no color provided
		if(empty($color))
			  return $default; 
		//Sanitize $color if "#" is provided 
			if ($color[0] == '#' ) {
				$color = substr( $color, 1 );
			}
			//Check if color has 6 or 3 characters and get values
			if (strlen($color) == 6) {
					$hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
			} elseif ( strlen( $color ) == 3 ) {
					$hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
			} else {
					return $default;
			}
			//Convert hexadec to rgb
			$rgb =  array_map('hexdec', $hex);
	 
			//Check if opacity is set(rgba or rgb)
			if( $opacity == 'none' ){
				$output = implode(",",$rgb);
			}elseif( $opacity ){
				if(abs($opacity) > 1)
					$opacity = 1.0;
				$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
			}else {
				$output = 'rgb('.implode(",",$rgb).')';
			}
			//Return rgb(a) color string
			return $output;
	}
}