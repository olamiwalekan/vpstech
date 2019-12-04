<?php
/**
 * Additional features to allow styling of the templates
 */
function pixzlo_custom_scripts() {
	
	global $pixzlo_custom_styles;
	
	if( pixzlo_po_exists() ):
		
		// Page Styles
		require_once PIXZLO_THEME_ELEMENTS . '/page-styles.php';
		ob_start();
		pixzlo_page_custom_styles();
		$pixzlo_custom_styles = ob_get_clean();
		wp_add_inline_style( 'pixzlo-theme-style', $pixzlo_custom_styles );
		
	elseif( is_single() && has_post_format( 'quote' ) ):
		$meta_opt = get_post_meta( get_the_ID(), 'pixzlo_post_quote_modal', true );
		if( $meta_opt != '' && $meta_opt != 'theme-default' ) :
			$aps = new PixzloPostSettings;
			$theme_color = $aps->pixzloThemeColor();
			$rgba_08 = $aps->pixzloHex2Rgba( $theme_color, '0.8' ); 
			$blockquote_bg_opt = $aps->pixzloCheckMetaValue( 'pixzlo_post_quote_modal', 'single-post-quote-format' );
			ob_start();
			$aps->pixzloQuoteDynamicStyle( 'single-post', $blockquote_bg_opt, $theme_color, $rgba_08 );
			$pixzlo_custom_styles .= ob_get_clean();
		endif;
	elseif( is_single() && has_post_format( 'link' ) ):
		$meta_opt = get_post_meta( get_the_ID(), 'pixzlo_post_link_modal', true );
		if( $meta_opt != '' && $meta_opt != 'theme-default' ) :
			$aps = new PixzloPostSettings;
			$theme_color = $aps->pixzloThemeColor();
			$rgba_08 = $aps->pixzloHex2Rgba( $theme_color, '0.8' ); 
			$blockquote_bg_opt = $aps->pixzloCheckMetaValue( 'pixzlo_post_link_modal', 'single-post-link-format' );
			ob_start();
			$aps->pixzloLinkDynamicStyle( 'single-post', $blockquote_bg_opt, $theme_color, $rgba_08 );
			$pixzlo_custom_styles .= ob_get_clean();
		endif;
	endif;
	
	if( is_single() ){
		// Page Styles
		require_once PIXZLO_THEME_ELEMENTS . '/page-styles.php';
		ob_start();
		pixzlo_post_custom_styles();
		$pixzlo_custom_styles .= ob_get_clean();
	}
	
	if( is_single() && !empty( $pixzlo_custom_styles ) ):
		wp_add_inline_style( 'pixzlo-theme-style', $pixzlo_custom_styles );
	endif;
	
}
add_action( 'wp_enqueue_scripts', 'pixzlo_custom_scripts' );
add_action('wp_ajax_pixzlo-custom-sidebar-export', 'pixzlo_custom_sidebar_export');
function pixzlo_custom_sidebar_export(){
	$nonce = sanitize_text_field($_POST['nonce']);
  
    if ( ! wp_verify_nonce( $nonce, 'pixzlo-sidebar-featured' ) )
        die ( esc_html__( 'Busted!', 'pixzlo' ) );
	
	$sidebar = get_option('pixzlo_custom_sidebars');
	echo ( ''. $sidebar );
	
	exit;
}
function pixzlo_ads_out( $field ){
	$ato = new PixzloThemeOpt;
	$output = '';
	if( $ato->pixzloThemeOpt( $field.'-ads-text' ) ){
		$ads_hide = '';
		if( $ato->pixzloThemeOpt( $field.'-ads-md' ) == 'no' ){
			$ads_hide .= 'hidden-xs-up ';
		}
		if( $ato->pixzloThemeOpt( $field.'-ads-sm' ) == 'no' ){
			$ads_hide .= 'hidden-md-down ';
		}
		if( $ato->pixzloThemeOpt( $field.'-ads-xs' ) == 'no' ){
			$ads_hide .= 'hidden-sm-down ';
		}
		$output = '<div class="adv-wrapper '. esc_attr( $ads_hide ) .'">'. $ato->pixzloThemeOpt( $field.'-ads-text' ) .'</div>';
	}
	return $output;
}
function pixzlo_po_exists( $post_id = '' ){
	$post_id = $post_id ? $post_id : get_the_ID();
	$stat = get_post_meta( $post_id, 'pixzlo_page_layout', true );
	
	if( $stat )
		return true;
	else
		return false;
}
if( ! function_exists('pixzlo_mailchimp') ) {
	function pixzlo_mailchimp(){
		$nonce = sanitize_text_field($_POST['nonce']);
	  
		if ( ! wp_verify_nonce( $nonce, 'pixzlo-mailchimp' ) )
			die ( esc_html__( 'Busted', 'pixzlo' ) );
		if( isset( $_POST['pixzlo_mc_number'] ) ) {
			
			$first_name = 'zozo-mc-first_name' . esc_attr( $_POST['pixzlo_mc_number'] );
			$last_name = 'zozo-mc-last_name' . esc_attr( $_POST['pixzlo_mc_number'] );
			$email = 'zozo-mc-email' . esc_attr( $_POST['pixzlo_mc_number'] );
			$success = 'pixzlo_mc_success' . esc_attr( $_POST['pixzlo_mc_number'] );
			$failure = 'pixzlo_mc_failure' . esc_attr( $_POST['pixzlo_mc_number'] );
			$listid = 'pixzlo_mc_listid' . esc_attr( $_POST['pixzlo_mc_number'] );
				
			$ato = new PixzloThemeOpt;
			$mc_key = $ato->pixzloThemeOpt( 'mailchimp-api' );
			$mcapi = new MCAPI( $mc_key );
			
			$merge_vars = array();
			$merge_vars['FNAME'] = isset($_POST[$first_name]) ? strip_tags($_POST[$first_name]) : '';
			$merge_vars['LNAME'] = isset($_POST[$last_name]) ? strip_tags($_POST[$last_name]) : '';
			$subscribed = $mcapi->listSubscribe(strip_tags($_POST[$listid]), strip_tags($_POST[$email]), $merge_vars);
			
			if ($subscribed != false) {
				echo stripslashes($_POST[$success]);
			}else{
				echo stripslashes($_POST[$failure]);
			}
		}
		die();
	}
	add_action('wp_ajax_nopriv_zozo-mc', 'pixzlo_mailchimp');
	add_action('wp_ajax_zozo-mc', 'pixzlo_mailchimp');
}
if( ! function_exists('pixzlo_star_rating') ) {
	function pixzlo_star_rating( $rate ){
		$out = '';
		for( $i=1; $i<=5; $i++ ){
			
			if( $i == round($rate) ){
				if ( $i-0.5 == $rate ) {
					$out .= '<i class="fa fa-star-half-o"></i>';
				}else{
					$out .= '<i class="fa fa-star"></i>';
				}
			}else{
				if( $i < $rate ){
					$out .= '<i class="fa fa-star"></i>';
				}else{
					$out .= '<i class="fa fa-star-o"></i>';
				}
			}
		}// for end
		
		return $out;
	}
}
/*Search Options*/
if( ! function_exists('pixzlo_search_post') ) {
	function pixzlo_search_post($query) {
		if ($query->is_search) {
			$query->set('post_type',array('post'));
		}
	return $query;
	}
}
if( ! function_exists('pixzlo_search_page') ) {
	function pixzlo_search_page($query) {
		if ($query->is_search) {
			$query->set('post_type',array('page'));
		}
	return $query;
	}
}
if( ! function_exists('pixzlo_search_setup') ) {
	function pixzlo_search_setup(){
		$ato = new PixzloThemeOpt;
		$search_cont = $ato->pixzloThemeOpt( 'search-content' );
		if( $search_cont == "post" ){
			add_filter('pre_get_posts','pixzlo_search_post');
		}elseif( $search_cont == "page" ){
			add_filter('pre_get_posts','pixzlo_search_page');
		}
	}
	add_action( 'after_setup_theme', 'pixzlo_search_setup' );
}
//Return same value for filter
if( ! function_exists('__return_value') ) {
	function __return_value( $value ) {
		return function () use ( $value ) {
			return $value; 
		};
	}
}
if( !function_exists( 'pixzloGetCSSAnimation' ) && class_exists( 'Vc_Manager' ) ) {
	function pixzloGetCSSAnimation( $css_animation ) {
		$output = '';
		if ( '' !== $css_animation && 'none' !== $css_animation ) {
			wp_enqueue_script( 'vc_waypoints' );
			wp_enqueue_style( 'vc_animate-css' );
			$output = ' wpb_animate_when_almost_visible wpb_' . $css_animation . ' ' . $css_animation;
		}
	
		return $output;
	}
}
/*Facebook Comments Code*/
if( ! function_exists('pixzlo_fb_comments_code') ) {
	function pixzlo_fb_comments_code(){
		$ato = new PixzloThemeOpt;
		$fb_width = $ato->pixzloThemeOpt( 'fb-comments-width' );
		$fb_width = isset( $fb_width['width'] ) && $fb_width['width'] != '' ? esc_attr( $fb_width['width'] ) : '300px';
		$comment_num = $ato->pixzloThemeOpt( 'fb-comments-number' );
		$fb_number = $comment_num != '' ? absint( $comment_num ) : '5';
?>
		<div class="fb-comments" data-href="<?php esc_url( the_permalink() ); ?>" data-width="<?php echo esc_attr( $fb_width ); ?>" data-numposts="<?php echo esc_attr( $fb_number ); ?>"></div>
	<?php
	}
}
if( !function_exists( 'pixzlo_shortcode_rand_id' ) ) {
	function pixzlo_shortcode_rand_id() {
		static $shortcode_rand = 1;
		return $shortcode_rand++;
	}
}
if( !function_exists( 'pixzlo_search_stat' ) ) {
	function pixzlo_search_stat() {
		static $search_stat = 0;
		return $search_stat++;
	}
}
/*Image Size Check*/
function pixzlo_custom_image_size_chk( $thumb_size, $custom_size = array(), $hardcrop = true ){
	$img_sizes = $img_width = $img_height = $src = '';
	$img_stat = 0;
	$custom_img_size = '';
		
	if( class_exists('Aq_Resize') ) {
		
		$src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), "full", false, '' );
		$img_width = $img_height = '';
		if( !empty( $custom_size ) ){
			$img_width = isset( $custom_size[0] ) ? $custom_size[0] : '';
			$img_height = isset( $custom_size[1] ) ? $custom_size[1] : '';
		}else{
			$custom_img_size = PixzloThemeOpt::pixzloStaticThemeOpt($thumb_size);
			$img_width = isset( $custom_img_size['width'] ) ? $custom_img_size['width'] : '';
			$img_height = isset( $custom_img_size['height'] ) ? $custom_img_size['height'] : '';
		}
		
		$cropped_img = aq_resize( $src[0], $img_width, $img_height, $hardcrop, false );
		if( $cropped_img ){
			$img_src = isset( $cropped_img[0] ) ? $cropped_img[0] : '';
			$img_width = isset( $cropped_img[1] ) ? $cropped_img[1] : '';
			$img_height = isset( $cropped_img[2] ) ? $cropped_img[2] : '';
		}else{
			$img_stat = 1;
		}
	}
	if( $img_stat ){
		$src = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), $thumb_size, false, '' );
		$img_src = $src[0];
		$img_width = isset( $src[1] ) ? $src[1] : '';
		$img_height = isset( $src[2] ) ? $src[2] : '';
	}
	
	return array( $img_src, $img_width, $img_height );
}
function pixzlo_get_custom_google_font_con( $google_fonts, $rand_id ){
	$google_fonts_obj = new Vc_Google_Fonts();
	$google_fonts_data = strlen( $google_fonts ) > 0 ? $google_fonts_obj->_vc_google_fonts_parse_attributes( array(), $google_fonts ) : '';
	
	$settings = get_option( 'wpb_js_google_fonts_subsets' );
	if ( is_array( $settings ) && ! empty( $settings ) ) {
		$subsets = '&subset=' . implode( ',', $settings );
	} else {
		$subsets = '';
	}
	
	wp_enqueue_style( 'pixzlo_vc_google_fonts_' . $rand_id, '//fonts.googleapis.com/css?family=' . $google_fonts_data['values']['font_family'] . $subsets );
	
	$styles = array();
	$google_fonts_family = explode( ':', $google_fonts_data['values']['font_family'] );
	$styles[] = 'font-family:' . $google_fonts_family[0];
	$google_fonts_styles = explode( ':', $google_fonts_data['values']['font_style'] );
	$styles[] = 'font-weight:' . $google_fonts_styles[1];
	$styles[] = 'font-style:' . $google_fonts_styles[2];
	
	if ( ! empty( $styles ) ) {
		$style = esc_attr( implode( ';', $styles ) );
	} else {
		$style = '';
	}
	
	return $style;
}
if( ! function_exists('pixzlo_hex2rgb') ) {
	function pixzlo_hex2rgb($hex,$lvl) {
		$hex = str_replace("#", "", $hex);
		if(strlen($hex) == 3) {
		$r = hexdec(substr($hex,0,1).substr($hex,0,1));
		$g = hexdec(substr($hex,1,1).substr($hex,1,1));
		$b = hexdec(substr($hex,2,1).substr($hex,2,1));
		} else {
		$r = hexdec(substr($hex,0,2));
		$g = hexdec(substr($hex,2,2));
		$b = hexdec(substr($hex,4,2));
		}
		$r = max(0,min(255,$r + $lvl));
		$g = max(0,min(255,$g + $lvl));
		$b = max(0,min(255,$b + $lvl));
		$rgb = $r.','.$g.','.$b;
		return $rgb; // returns an array with the rgb values
	}
}

/* Comments Textarea Moving */
function pixzlo_move_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
} 
add_filter( 'comment_form_fields', 'pixzlo_move_comment_field_to_bottom' );


/**
 * Get the upload URL/path in right way (works with SSL).
 *
 * @param $param string "basedir" or "baseurl"
 * @return string
 */
function pixzlo_fn_get_upload_dir_var( $param ) {
    $upload_dir = wp_upload_dir();
    $url = $upload_dir[ $param ];
 
    if ( $param === 'baseurl' && is_ssl() ) {
        $url = str_replace( 'http://', 'https://', $url );
    }
 
    return $url;
}