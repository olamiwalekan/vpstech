<?php 



/*



	Plugin Name: Pixzlo Core



	Plugin URI: http://zozothemes.com/



	Description: Core plugin for pixzlo theme.



	Version: 1.0.3



	Author: zozothemes



	Author URI: http://zozothemes.com/



*/



if ( ! defined( 'ABSPATH' ) ) {



	exit; // Exit if accessed directly.



}







$cur_theme = wp_get_theme();	



if ( $cur_theme->get( 'Name' ) != 'Pixzlo' && $cur_theme->get( 'Name' ) != 'Pixzlo Child' ){



	return;



}







define( 'PIXZLO_CORE_DIR', plugin_dir_path( __FILE__ ) );



define('PIXZLO_CORE_URL', plugin_dir_url( __FILE__ ) );







load_plugin_textdomain( 'pixzlo-core', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );







//Maintenance 



require_once( PIXZLO_CORE_DIR . 'maintenance/maintenance.php' );







require_once( PIXZLO_CORE_DIR . 'pixzlo-redux.php' );



require_once( PIXZLO_CORE_DIR . 'admin/metabox/metaboxes/meta_box.php' );



require_once( PIXZLO_CORE_DIR . 'admin/metabox/inc/pixzlo-metabox.php' );







// Pixzlo Shortcode



require_once( PIXZLO_CORE_DIR . 'admin/shortcodes/shortcodes.php' );







// Pixzlo Theme Custom Font Upload Option



require_once( PIXZLO_CORE_DIR . 'custom-font-code/custom-fonts.php' );







// Pixzlo AQ Resizer



require_once( PIXZLO_CORE_DIR . 'inc/aq_resizer.php' );







// Pixzlo Widgets



require_once( PIXZLO_CORE_DIR . 'widgets/about_widget.php' );



require_once( PIXZLO_CORE_DIR . 'widgets/ads_widget.php' );



require_once( PIXZLO_CORE_DIR . 'widgets/latest_post_widget.php' );



require_once( PIXZLO_CORE_DIR . 'widgets/popular_post_widget.php' );



require_once( PIXZLO_CORE_DIR . 'widgets/tab_post_widget.php' );



require_once( PIXZLO_CORE_DIR . 'widgets/author_widget.php' );



require_once( PIXZLO_CORE_DIR . 'widgets/contact_info_widget.php' );



require_once( PIXZLO_CORE_DIR . 'widgets/instagram_widget.php' );



require_once( PIXZLO_CORE_DIR . 'widgets/social_widget.php' );



require_once( PIXZLO_CORE_DIR . 'widgets/tweets_widget.php' );



require_once( PIXZLO_CORE_DIR . 'widgets/mailchimp_widget.php' );







// Custom Post Types



require_once( PIXZLO_CORE_DIR . 'cpt/cpt-class.php' );







// Category Meta Field



require_once( PIXZLO_CORE_DIR . 'inc/pixzlo-category-meta.php' );







function pixzlo_core_admin_scripts_method() {







	wp_enqueue_style( 'font-awesome', get_theme_file_uri( '/assets/css/font-awesome.css' ), array(), '4.7.0' );



	wp_enqueue_style( 'simple-line-icons', get_theme_file_uri( '/assets/css/simple-line-icons.css' ), array(), '1.0' );







	wp_enqueue_style( 'pixzlo-core-custom-style', plugins_url( '/admin/assets/css/theme-custom.css' , __FILE__ ), false, '1.0.0' );



    wp_enqueue_script( 'pixzlo-core-custom', plugins_url( '/admin/assets/js/theme-custom.js' , __FILE__ ), array( 'jquery' ) );



	



	//Admin Localize Script



	wp_localize_script('pixzlo-core-custom', 'pixzlo_core_admin_ajax_var', array(



		'admin_ajax_url' => admin_url('admin-ajax.php'),



		'font_nonce' => wp_create_nonce('pixzlo-font-nounce'), 



		'process' => esc_html__( 'Processing', 'pixzlo-core' ),



		'font_del_pbm' => esc_html__( 'Font Deletion Problem', 'pixzlo-core' )



	));



		



}



add_action( 'admin_enqueue_scripts', 'pixzlo_core_admin_scripts_method' );







/*Author Social Links*/



if( ! function_exists('pixzlo_author_contactmethods') ) {



	function pixzlo_author_contactmethods( $contactmethods ) {



		$contactmethods['twitter'] = esc_html__('Twitter URL', 'pixzlo-core');



		$contactmethods['facebook'] = esc_html__('Facebook URL', 'pixzlo-core');



		$contactmethods['vimeo'] = esc_html__('Vimeo URL', 'pixzlo-core');



		$contactmethods['youtube'] = esc_html__('Youtube URL', 'pixzlo-core');



		



		return $contactmethods;



	}



	add_filter('user_contactmethods','pixzlo_author_contactmethods',10,1);



}







/*Facebook Comments JS*/



if( ! function_exists('pixzlo_fb_comments_js') ) {



	function pixzlo_fb_comments_js(){



		$ato = new PixzloThemeOpt;



		$comment_type = $ato->pixzloThemeOpt( 'comments-type' );



		if( $comment_type == 'fb' && is_single() ) :



			$fb_dev_api = $ato->pixzloThemeOpt( 'fb-developer-key' );



		?>



			<div id="fb-root"></div>



			<script>(function(d, s, id) {



			  var js, fjs = d.getElementsByTagName(s)[0];



			  if (d.getElementById(id)) return;



			  js = d.createElement(s); js.id = id;



			  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=<?php echo esc_attr( $fb_dev_api ); ?>";



			  fjs.parentNode.insertBefore(js, fjs);



			}(document, 'script', 'facebook-jssdk'));</script>



		<?php



		endif;



	}



	add_action( 'pixzlo_body_action', 'pixzlo_fb_comments_js', 50 );



}







/* Add Admin Table Columns Head */



function pixzlo_columns_head( $defaults ) {



	if ( current_user_can( 'manage_options' ) ) {



		$defaults['pixzlo_post_featured_stat'] = esc_html__( 'Featured', 'pixzlo-core' );



	}



    return $defaults;



}



add_filter('manage_post_posts_columns', 'pixzlo_columns_head');







/* Add Admin Table Coulmn */



function pixzlo_columns_content( $column_name, $post_ID ) {



	if ( current_user_can( 'manage_options' ) ) {



		if ( $column_name == 'pixzlo_post_featured_stat' ) {



			$meta = get_post_meta( $post_ID, 'pixzlo_post_featured_stat', true );



			$out = '<label class="pixzlo-switch">



						<input type="checkbox" data-post="'.$post_ID.'" class="pixzlo-post-featured-status" '. ( $meta == 1 ? 'checked' : '' ) .'>



						<div class="pixzlo-slider round"></div>



					</label><br />



					<span id="post-featured-stat-msg-'.$post_ID.'"></span>';



			echo ( $out );



		}



	}



}



add_action('manage_post_posts_custom_column', 'pixzlo_columns_content', 10, 2);







/* Active Featured Status */



add_action('wp_ajax_pixzlo-post-featured-active', 'pixzlo_post_featured_active');



function pixzlo_post_featured_active(){







	$nonce = $_POST['nonce'];



  



    if ( ! wp_verify_nonce( $nonce, 'pixzlo-post-featured' ) )



        die ( esc_html__( 'Busted!', 'pixzlo-core' ) );



	



	update_post_meta( esc_attr( $_POST['postid'] ), 'pixzlo_post_featured_stat', esc_attr($_POST['featured-stat']) );



	exit;



}







//Get server software



function pixzlo_get_server_software(){



	return $_SERVER['SERVER_SOFTWARE'];



}







//Get remote address



function pixzlo_get_remote_ip(){



	return $_SERVER['REMOTE_ADDR'];



}







//RTL Check



$pixzlo_option = get_option( 'pixzlo_options' );



$rtl = isset( $pixzlo_option['rtl'] ) && $pixzlo_option['rtl'] ? true : false;



if( $rtl ) add_filter( 'body_class','pixzlo_rtl_body_classes' );



function pixzlo_rtl_body_classes( $classes ) {



    $classes[] = 'rtl';



    return $classes;



}







// Facebook Share Code



//Adding the Open Graph in the Language Attributes



function pixzlo_add_opengraph_doctype( $output ) {



	return $output . ' prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#"';



}



add_filter('language_attributes', 'pixzlo_add_opengraph_doctype');







function pixzlo_insert_fb_in_head() {



    global $post;



    if ( !is_singular()) //if it is not a post or a page



        return;



	



	ob_start();



	the_excerpt();



	$excerpt = ob_get_clean();	



	



	echo '<meta property="og:title" content="' . get_the_title() . '"/>



<meta property="og:type" content="article"/>



<meta property="og:url" content="' . esc_url( get_permalink() ) . '"/>



<meta property="og:site_name" content="'. get_bloginfo( 'name' ) .'"/>



<meta property="og:description" content="'. $excerpt .'"/>';



	



	if( has_post_thumbnail( $post->ID ) ) {



		$thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );



		echo '



<meta property="og:image" content="' . esc_attr( $thumbnail_src[0] ) . '"/>



<meta property="og:image:width" content="' . esc_attr( $thumbnail_src[1] ) . '"/>



<meta property="og:image:height" content="' . esc_attr( $thumbnail_src[2] ) . '"/>



';



	}



	



    echo "";



}



add_action( 'wp_head', 'pixzlo_insert_fb_in_head', 5 );







/* VC Shortcodes */



add_shortcode( 'pixzlo_vc_circle_progress', 'pixzlo_vc_circle_progress_shortcode' );



add_shortcode( 'pixzlo_vc_compare_pricing', 'pixzlo_vc_compare_pricing_shortcode' );



add_shortcode( 'pixzlo_vc_content_carousel', 'pixzlo_vc_content_carousel_shortcode' );



add_shortcode( 'pixzlo_vc_counter', 'pixzlo_vc_counter_shortcode' );



add_shortcode( 'pixzlo_vc_day_counter', 'pixzlo_vc_day_counter_shortcode' );



add_shortcode( 'pixzlo_vc_events', 'pixzlo_vc_events_shortcode' );



add_shortcode( 'pixzlo_vc_feature_box', 'pixzlo_vc_feature_box_shortcode' );



add_shortcode( 'pixzlo_vc_flip_box', 'pixzlo_vc_flip_box_shortcode' );



add_shortcode( 'pixzlo_vc_google_map', 'pixzlo_vc_google_map_shortcode' );



add_shortcode( 'pixzlo_vc_icons', 'pixzlo_vc_icons_shortcode' );



add_shortcode( 'pixzlo_vc_mailchimp', 'pixzlo_vc_mailchimp_shortcode' );



add_shortcode( 'pixzlo_vc_modal_popup', 'pixzlo_vc_modal_popup_shortcode' );



add_shortcode( 'pixzlo_vc_portfolio', 'pixzlo_vc_portfolio_shortcode' );



add_shortcode( 'pixzlo_vc_blog', 'pixzlo_vc_blog_shortcode' );



add_shortcode( 'pixzlo_vc_blog_classic', 'pixzlo_vc_blog_classic_shortcode' );



add_shortcode( 'pixzlo_vc_pricing_table', 'pixzlo_vc_pricing_table_shortcode' );



add_shortcode( 'pixzlo_vc_section_title', 'pixzlo_vc_section_title_shortcode' );



add_shortcode( 'pixzlo_vc_services', 'pixzlo_vc_services_shortcode' );



add_shortcode( 'pixzlo_vc_social_icons', 'pixzlo_vc_social_icons_shortcode' );



add_shortcode( 'pixzlo_vc_team', 'pixzlo_vc_team_shortcode' );



add_shortcode( 'pixzlo_vc_testimonial', 'pixzlo_vc_testimonial_shortcode' );



add_shortcode( 'pixzlo_vc_timeline', 'pixzlo_vc_timeline_shortcode' );



add_shortcode( 'pixzlo_vc_timeline_slide', 'pixzlo_vc_timeline_slide_shortcode' );



add_shortcode( 'pixzlo_vc_twitter', 'pixzlo_vc_twitter_shortcode' );



add_shortcode( 'pixzlo_vc_image_grid', 'pixzlo_vc_image_grid_shortcode' );



add_shortcode( 'pixzlo_vc_contact_form', 'pixzlo_vc_contact_form_shortcode' );



add_shortcode( 'pixzlo_vc_contact_info', 'pixzlo_vc_contact_info_shortcode' );



add_shortcode( 'pixzlo_vc_list_item', 'pixzlo_vc_list_item_shortcode' );



add_shortcode( 'pixzlo_vc_portfolio_single', 'pixzlo_vc_portfolio_single_shortcode' );



add_shortcode( 'pixzlo_vc_button', 'pixzlo_vc_button_shortcode' );



add_shortcode( 'pixzlo_vc_tab', 'pixzlo_vc_tab_shortcode' );



add_shortcode( 'pixzlo_vc_tabs', 'pixzlo_vc_tabs_shortcode' );





// Enable shortcodes in text widgets



add_filter('widget_text','do_shortcode');