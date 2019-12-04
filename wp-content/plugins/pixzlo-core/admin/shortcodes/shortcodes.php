<?php
class PixzloShortcodes {

	public static function pixzloSoundcloud( $atts ) {
		$atts = shortcode_atts( array(
			'url' => 'https://api.soundcloud.com/tracks/',
			'height' => '',
			'width' => '',
			'params' => ''
		), $atts );

		return '<iframe width="'. esc_attr( $atts['width'] ) .'" height="'. esc_attr( $atts['height'] ) .'" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url='. esc_url( $atts['url'] ) .'&amp;'. esc_url( $atts['params'] ) .'"></iframe>';
	}
	
	public static function pixzloVideoIframe( $atts ) {
		$atts = shortcode_atts( array(
			'url' => '',
			'height' => '',
			'width' => '',
			'params' => ''
		), $atts );
		
		$params = isset( $params ) && !empty( $params ) ? '?'. $params : '';

		return '<iframe width="'. esc_attr( $atts['width'] ) .'" height="'. esc_attr( $atts['height'] ) .'" src="'. esc_url( $atts['url'] ) .'?'. esc_attr( $atts['params'] ) .'"></iframe>';
	}
	
	
	public static function pixzloVideoIframeNonParam( $atts ) {

		$atts = shortcode_atts( array(

			'url' => '',

			'height' => '',

			'width' => '',

			'params' => '',
			'allowfullscreen' => ''

		), $atts );



		return '<iframe width="'. esc_attr( $atts['width'] ) .'" height="'. esc_attr( $atts['height'] ) .'" src="'. esc_url( $atts['url'] ) .'?'. esc_attr( $atts['params'] ) .'" '. esc_attr( $atts['allowfullscreen'] ) .'></iframe>';

	}

	

	public static function pixzloVideo( $atts ) {
		$atts = shortcode_atts( array(
			'url' => '',
			'height' => '',
			'width' => '',
		), $atts );
		
		return '<video class="pixzlo-custom-video" width="'. esc_attr( $atts['width'] ) .'" height="'. esc_attr( $atts['height'] ) .'" preload="true" style="max-width:100%;">
                    <source src="'. esc_url( $atts['url'] ) .'" type="video/mp4">
                </video>';
	}
 }
add_shortcode( 'soundcloud', array( 'PixzloShortcodes', 'pixzloSoundcloud' ) );
add_shortcode( 'videoframe', array( 'PixzloShortcodes', 'pixzloVideoIframe' ) );
add_shortcode( 'video', array( 'PixzloShortcodes', 'pixzloVideo' ) );
add_shortcode( 'videoframenon', array( 'PixzloShortcodes', 'pixzloVideoIframeNonParam' ) );