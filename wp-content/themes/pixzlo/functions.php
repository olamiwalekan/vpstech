<?php
/**
 * Pixzlo functions and definitions
 *
 */
/**
 * Pixzlo predifined vars
 */
define('PIXZLO_ADMIN', get_template_directory().'/admin');
define('PIXZLO_INC', get_template_directory().'/inc');
define('PIXZLO_THEME_ELEMENTS', get_template_directory().'/admin/theme-elements');
define('PIXZLO_ADMIN_URL', get_template_directory_uri().'/admin');
define('PIXZLO_INC_URL', get_template_directory_uri().'/inc');
define('PIXZLO_ASSETS', get_template_directory_uri().'/assets');
/* Custom Inline Css */
$pixzlo_custom_styles = "";
//Theme Default
require_once PIXZLO_ADMIN . '/theme-default/theme-default.php';
require_once PIXZLO_THEME_ELEMENTS . '/theme-options.php';
require_once PIXZLO_INC . '/theme-class/theme-class.php';
require_once PIXZLO_INC . '/walker/wp_bootstrap_navwalker.php';
require_once PIXZLO_ADMIN . '/mega-menu/custom_menu.php';
//CUSTOM SIDEBAR
require_once PIXZLO_ADMIN . '/custom-sidebar/sidebar-generator.php';
//TGM
require_once PIXZLO_ADMIN . '/tgm/tgm-init.php'; 
require_once PIXZLO_ADMIN . '/welcome-page/welcome.php';
//ZOZO IMPORTER
if( class_exists( 'Pixzlo_Zozo_Admin_Page' ) ){
	require_once PIXZLO_ADMIN . '/welcome-page/importer/zozo-importer.php'; 	
}
//VC SHORTCODES
if ( class_exists( 'Vc_Manager' ) ) {
	require_once PIXZLO_INC . '/vc/vc-init.php'; 	
}
//Woo
if ( class_exists( 'WooCommerce' ) ) {
	require_once PIXZLO_INC . "/woo-functions.php";
}
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function pixzlo_setup() {
	/* Pixzlo Text Domain */
	load_theme_textdomain( 'pixzlo', get_template_directory() . '/languages' );
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	
	/* Custom background */
	$defaults = array(
		'default-color'          => '',
		'default-image'          => '',
		'wp-head-callback'       => '_custom_background_cb',
		'admin-head-callback'    => '',
		'admin-preview-callback' => ''
	);
	add_theme_support( 'custom-background', $defaults );
	
	/* Custom header */
	$defaults = array(
		'default-image'          => '',
		'random-default'         => false,
		'width'                  => 0,
		'height'                 => 0,
		'flex-height'            => false,
		'flex-width'             => false,
		'default-text-color'     => '',
		'header-text'            => true,
		'uploads'                => true,
		'wp-head-callback'       => '',
		'admin-head-callback'    => '',
		'admin-preview-callback' => '',
	);
	add_theme_support( 'custom-header', $defaults );
	
	/* Content width */
	if ( ! isset( $content_width ) ) $content_width = 640;
	
	$ao = new PixzloThemeOpt;
	$grid_large = $ao->pixzloThemeOpt('pixzlo_grid_large');
	$grid_medium = $ao->pixzloThemeOpt('pixzlo_grid_medium');
	$grid_small = $ao->pixzloThemeOpt('pixzlo_grid_small');
	$port_masonry = $ao->pixzloThemeOpt('pixzlo_portfolio_masonry');
	
	if( !empty( $grid_large ) && is_array( $grid_large ) ) add_image_size( 'pixzlo-grid-large', $grid_large['width'], $grid_large['height'], true );
	if( !empty( $grid_medium ) && is_array( $grid_medium ) ) add_image_size( 'pixzlo-grid-medium', $grid_medium['width'], $grid_medium['height'], true );
	if( !empty( $grid_small ) && is_array( $grid_small ) ) add_image_size( 'pixzlo-grid-small', $grid_small['width'], $grid_small['height'], true );
	
	//Team
	$team_medium = $ao->pixzloThemeOpt('pixzlo_team_medium');
	if( !empty( $team_medium ) && is_array( $team_medium ) ) add_image_size( 'pixzlo-team-medium', $team_medium['width'], $team_medium['height'], true );
	update_option( 'large_size_w', 1170 );
	update_option( 'large_size_h', 694 );
	update_option( 'large_crop', 1 );
	update_option( 'medium_size_w', 768 );
	update_option( 'medium_size_h', 456 );
	update_option( 'medium_crop', 1 );
	update_option( 'thumbnail_size_w', 80 );
	update_option( 'thumbnail_size_h', 80 );
	update_option( 'thumbnail_crop', 1 );
	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'top-menu'		=> esc_html__( 'Top Bar Menu', 'pixzlo' ),
		'primary-menu'	=> esc_html__( 'Primary Menu', 'pixzlo' ),
		'footer-menu'	=> esc_html__( 'Footer Menu', 'pixzlo' ),
	) );
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	/*
	 * Enable support for Post Formats.
	 *
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'audio',
	) );
	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo' );
	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
	
	// Add support for Block Styles.
	add_theme_support( 'wp-block-styles' );

	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );

	// Add support for editor styles.
	add_theme_support( 'editor-styles' );

	// Enqueue editor styles.
	add_editor_style( 'style-editor.css' );

	// Editor color palette.
	add_theme_support(
		'editor-color-palette',
		array(
			array(
				'name'  => __( 'Dark Gray', 'pixzlo' ),
				'slug'  => 'dark-gray',
				'color' => '#111',
			),
			array(
				'name'  => __( 'Light Gray', 'pixzlo' ),
				'slug'  => 'light-gray',
				'color' => '#767676',
			),
			array(
				'name'  => __( 'White', 'pixzlo' ),
				'slug'  => 'white',
				'color' => '#FFF',
			),
		)
	);

	// Add support for responsive embedded content.
	add_theme_support( 'responsive-embeds' );
	
}
add_action( 'after_setup_theme', 'pixzlo_setup' );
/**
 * Register widget area.
 *
 */
function pixzlo_widgets_init() {
	
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'pixzlo' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here to appear in your sidebar.', 'pixzlo' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Secondary Menu Sidebar', 'pixzlo' ),
		'id'            => 'secondary-menu-sidebar',
		'description'   => esc_html__( 'Add widgets here to appear in your secondary menu area.', 'pixzlo' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'pixzlo' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'pixzlo' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'pixzlo' ),
		'id'            => 'sidebar-3',
		'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'pixzlo' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 3', 'pixzlo' ),
		'id'            => 'sidebar-4',
		'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'pixzlo' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
}
add_action( 'widgets_init', 'pixzlo_widgets_init' );
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 *
 * @since Pixzlo 1.0
 *
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function pixzlo_excerpt_more( $link ) {
	return '';
}
add_filter( 'excerpt_more', 'pixzlo_excerpt_more' );
/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function pixzlo_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
	}
}
add_action( 'wp_head', 'pixzlo_pingback_header' );
/**
 * Admin Enqueue scripts and styles.
 */
function pixzlo_enqueue_admin_script() { 
	wp_enqueue_style( 'pixzlo-admin-style', get_theme_file_uri( '/admin/assets/css/admin-style.css' ), array(), '1.0' );
    wp_enqueue_style( 'font-awesome', get_theme_file_uri( '/assets/css/font-awesome.min.css' ), array(), '4.7.0' );
	
	// Meta Drag and Drop Script
	wp_enqueue_script( 'pixzlo-admin-scripts', get_theme_file_uri( '/admin/assets/js/admin-scripts.js' ), array( 'jquery' ), '1.0', true ); 
	
	//Admin Localize Script
	wp_localize_script('pixzlo-admin-scripts', 'pixzlo_admin_ajax_var', array(
		'admin_ajax_url' => esc_url( admin_url('admin-ajax.php') ),
		'featured_nonce' => wp_create_nonce('pixzlo-post-featured'), 
		'sidebar_nounce' => wp_create_nonce('pixzlo-sidebar-featured'), 
		'redux_themeopt_import' => wp_create_nonce('pixzlo-redux-import'),
		'unins_confirm' => esc_html__('Please backup your files and database before uninstall. Are you sure want to uninstall current demo?.', 'pixzlo'),
		'yes' => esc_html__('Yes', 'pixzlo'),
		'no' => esc_html__('No', 'pixzlo'),
		'proceed' => esc_html__('Proceed', 'pixzlo'),
		'cancel' => esc_html__('Cancel', 'pixzlo'),
		'process' => esc_html__( 'Processing', 'pixzlo' ),
		'uninstalling' => esc_html__('Uninstalling...', 'pixzlo'),
		'uninstalled' => esc_html__('Uninstalled.', 'pixzlo'),
		'unins_pbm' => esc_html__('Uninstall Problem!.', 'pixzlo'),
		'downloading' => esc_html__('Downloading Demo Files...', 'pixzlo'), 
		'import_xml' => esc_html__('Importing Xml...', 'pixzlo'),
		'import_theme_opt' => esc_html__('Importing Theme Option...', 'pixzlo'),
		'import_widg' => esc_html__('Importing Widgets...', 'pixzlo'),
		'import_sidebars' => esc_html__('Importing Sidebars...', 'pixzlo'),
		'import_revslider' => esc_html__('Importing Revolution Sliders...', 'pixzlo'),
		'imported' => esc_html__('Successfully Imported, Check Above Message.', 'pixzlo'),
		'import_pbm' => esc_html__('Import Problem.', 'pixzlo'),
		'access_pbm' => esc_html__('File access permission problem.', 'pixzlo')
	));
	
}
add_action( 'admin_enqueue_scripts', 'pixzlo_enqueue_admin_script' );
/**
 * Enqueue scripts and styles.
 */
function pixzlo_scripts() { 
	/*Visual Composer CSS*/
	if ( class_exists( 'Vc_Manager' ) ) {
		wp_enqueue_style( 'js_composer_front' );
		wp_enqueue_style( 'js_composer_custom_css' );
	}
	/* Pixzlo Theme Styles */
	// Pixzlo Style Libraries
	
	$rto = new PixzloThemeOpt;
	$minify_js = $rto->pixzloThemeOpt('js-minify');
	$minify_css = $rto->pixzloThemeOpt('css-minify');
	
	if( $minify_css ){
		wp_enqueue_style( 'pixzlo-min', get_theme_file_uri( '/assets/css/theme.min.css' ), array(), '1.0' );
	}else{
		wp_enqueue_style( 'bootstrap', get_theme_file_uri( '/assets/css/bootstrap.min.css' ), array(), '4.1.1' );
		wp_enqueue_style( 'font-awesome', get_theme_file_uri( '/assets/css/font-awesome.min.css' ), array(), '4.7.0' );
		wp_enqueue_style( 'themify-icons', get_theme_file_uri( '/assets/css/themify-icons.css' ), array(), '1.0.1' );
		wp_enqueue_style( 'flaticon', get_theme_file_uri( '/assets/css/flaticon.css' ), array(), '1.0' );
		wp_enqueue_style( 'simple-line-icons', get_theme_file_uri( '/assets/css/simple-line-icons.min.css' ), array(), '1.0' );
		wp_enqueue_style( 'owl-carousel', get_theme_file_uri( '/assets/css/owl-carousel.min.css' ), array(), '2.2.1' );
		wp_enqueue_style( 'magnific-popup', get_theme_file_uri( '/assets/css/magnific-popup.min.css' ), array(), '1.0' );
		wp_enqueue_style( 'image-hover', get_theme_file_uri( '/assets/css/image-hover.min.css' ), array(), '1.0' );
		wp_enqueue_style( 'ytplayer', get_theme_file_uri( '/assets/css/ytplayer.min.css' ), array(), '1.0' );
		wp_enqueue_style( 'animate', get_theme_file_uri( '/assets/css/animate.min.css' ), array(), '3.5.1' );
	}
	// Theme stylesheet.
	wp_enqueue_style( 'pixzlo-style', get_template_directory_uri() . '/style.css', array(), '1.0' );
	
	// Shortcode Styles
	wp_enqueue_style( 'pixzlo-shortcode', get_theme_file_uri( '/assets/css/shortcode.css' ), array(), '1.0' );
	
	/* Pixzlo theme script files */
	
	// Load the html5 shiv.
	wp_enqueue_script( 'html5', get_theme_file_uri( '/assets/js/html5.js' ), array(), '3.7.3' );
	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );
	
	// Pixzlo JS Libraries
		// Megtory JS Libraries
	wp_enqueue_script( 'popper', get_theme_file_uri( '/assets/js/popper.min.js' ), array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'bootstrap', get_theme_file_uri( '/assets/js/bootstrap.min.js' ), array( 'jquery' ), '4.1.1', true );
	wp_enqueue_script( 'smart-resize', get_theme_file_uri( '/assets/js/smart-resize.min.js' ), array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'owl-carousel', get_theme_file_uri( '/assets/js/owl.carousel.min.js' ), array( 'jquery' ), '2.2.1', true );
	wp_enqueue_script( 'isotope', get_theme_file_uri( '/assets/js/isotope.pkgd.min.js' ), array( 'jquery' ), '3.0.3', true );
	wp_enqueue_script( 'infinite-scroll', get_theme_file_uri( '/assets/js/infinite-scroll.pkgd.min.js' ), array( 'jquery' ), '2.0', true );
	wp_enqueue_script( 'imagesloaded' );
	wp_enqueue_script( 'jquery-stellar', get_theme_file_uri( '/assets/js/jquery.stellar.min.js' ), array( 'jquery' ), '0.6.2', true );
	wp_enqueue_script( 'sticky-kit', get_theme_file_uri( '/assets/js/sticky-kit.min.js' ), array( 'jquery' ), '1.1.3', true );
	wp_enqueue_script( 'jquery-mb-ytplayer', get_theme_file_uri( '/assets/js/jquery.mb.YTPlayer.min.js' ), array( 'jquery' ), '1.0', true );	
	wp_enqueue_script( 'jquery-magnific', get_theme_file_uri( '/assets/js/jquery.magnific.popup.min.js' ), array( 'jquery' ), '1.1.0', true );
	wp_enqueue_script( 'jquery-easy-ticker', get_theme_file_uri( '/assets/js/jquery.easy.ticker.min.js' ), array( 'jquery' ), '2.0', true );
	wp_enqueue_script( 'jquery-easing', get_theme_file_uri( '/assets/js/jquery.easing.min.js' ), array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'jquery-countdown', get_theme_file_uri( '/assets/js/jquery.countdown.min.js' ), array( 'jquery' ), '2.2.0', true );
	wp_enqueue_script( 'jquery-circle-progress', get_theme_file_uri( '/assets/js/jquery.circle.progress.min.js' ), array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'jquery-appear', get_theme_file_uri( '/assets/js/jquery.appear.min.js' ), array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'smoothscroll', get_theme_file_uri( '/assets/js/smoothscroll.min.js' ), array( 'jquery' ), '1.20.2', true );

	//Timeline Slide
	wp_register_script( 'pixzlo-timeline', get_theme_file_uri( '/assets/js/timeline.min.js' ), array( 'jquery' ), '1.0', true );
	
	// Theme Js
	wp_enqueue_script( 'pixzlo-theme', get_theme_file_uri( '/assets/js/theme.js' ), array( 'jquery' ), '1.0', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	// Theme option stylesheet.
	$upload_dir = pixzlo_fn_get_upload_dir_var('baseurl');
	$pixzlo = wp_get_theme();
	$theme_style = $upload_dir . '/pixzlo/theme_'.get_current_blog_id().'.css';
	wp_enqueue_style( 'pixzlo-theme-style', esc_url( $theme_style ), array(), $pixzlo->get( 'Version' ) );
	
	$pixzlo_option = get_option( 'pixzlo_options' );
	
	//Google Map Script
	if( isset( $pixzlo_option['google-api'] ) && $pixzlo_option['google-api'] != '' ){
		wp_register_script( 'pixzlo-gmaps', '//maps.googleapis.com/maps/api/js?key='. esc_attr( $pixzlo_option['google-api'] ) , array('jquery'), null, true );
	}
		
	$infinite_image = isset( $pixzlo_option['infinite-loader-img']['url'] ) && $pixzlo_option['infinite-loader-img']['url'] != '' ? $pixzlo_option['infinite-loader-img']['url'] : get_theme_file_uri( '/assets/images/infinite-loder.gif' );
	
	//Localize Script
	wp_localize_script('pixzlo-theme', 'pixzlo_ajax_var', array(
		'admin_ajax_url' => esc_url( admin_url('admin-ajax.php') ),
		'like_nonce' => wp_create_nonce('pixzlo-post-like'), 
		'fav_nonce' => wp_create_nonce('pixzlo-post-fav'),
		'infinite_loader' => $infinite_image,
		'load_posts' => apply_filters( 'infinite_load_msg', esc_html__( 'Loading next set of posts.', 'pixzlo' ) ),
		'no_posts' => apply_filters( 'infinite_finished_msg', esc_html__( 'No more posts to load.', 'pixzlo' ) ),
		'cmt_nonce' => wp_create_nonce('pixzlo-comment-like'),
		'mc_nounce' => wp_create_nonce('pixzlo-mailchimp'), 
		'wait' => esc_html__('Wait..', 'pixzlo'),
		'must_fill' => esc_html__('Must Fill Required Details.', 'pixzlo'),
		'valid_email' => esc_html__('Enter Valid Email ID.', 'pixzlo'),
		'cart_update_pbm' => esc_html__('Cart Update Problem.', 'pixzlo')		
	));
	
}
add_action( 'wp_enqueue_scripts', 'pixzlo_scripts' );
/**
 * Enqueue supplemental block editor styles.
 */
function pixzlo_editor_customizer_styles() {
	wp_enqueue_style( 'google-fonts', pixzlo_redux_fonts_url(), array(), null, 'all' );
	wp_enqueue_style( 'pixzlo-editor-customizer-styles', get_theme_file_uri( '/style-editor-customizer.css' ), false, '1.0', 'all' );
	
	ob_start();
	require_once PIXZLO_THEME_ELEMENTS . '/theme-customizer-styles.php';
	$custom_styles = ob_get_clean();
	
	wp_add_inline_style( 'pixzlo-editor-customizer-styles', $custom_styles );
}
add_action( 'enqueue_block_editor_assets', 'pixzlo_editor_customizer_styles' );

/**

 * Additional features to allow styling of the templates.
 */
require get_parent_theme_file_path( '/inc/template-functions.php' );
/*Theme Code*/
/*Search Form Filter*/
if( ! function_exists('pixzlo_zozo_search_form') ) {
	function pixzlo_zozo_search_form( $form ) {
		
		$search_out = '
		<form method="get" class="search-form" action="'. esc_url( home_url( '/' ) ) .'">
			<div class="input-group">
				<input type="text" class="form-control" name="s" value="'. get_search_query() .'" placeholder="'. esc_attr__('Search for...', 'pixzlo') .'">
				<span class="input-group-btn">
					<button class="btn btn-secondary" type="submit"><i class="fa fa-search"></i></button>
				</span>
			</div>
		</form>';
		return $search_out;
	}
	add_filter( 'get_search_form', 'pixzlo_zozo_search_form' );
}
$aps = new PixzloPostSettings;
add_action( 'wp_ajax_post_like_act', array( &$aps, 'pixzloMetaLikeCheck' ) );
add_action( 'wp_ajax_nopriv_post_like_act', array( &$aps, 'pixzloMetaLikeCheck' ) ); 
add_action( 'wp_ajax_post_fav_act', array( &$aps, 'pixzloMetaFavouriteCheck' ) );
add_action( 'wp_ajax_nopriv_post_fav_act', array( &$aps, 'pixzloMetaFavouriteCheck' ) );
if( $aps->pixzloGetThemeOpt( 'comments-like' ) ){
	add_action('wp_ajax_nopriv_comment_like', array( &$aps, 'pixzloCommentsLike' ) );
	add_action('wp_ajax_comment_like', array( &$aps, 'pixzloCommentsLike' ) );
}
if( ! function_exists('pixzloPostComments') ) {
	function pixzloPostComments( $comment, $args, $depth ) {
	
		$GLOBALS['comment'] = $comment;
		
		$aps = new PixzloPostSettings;		
		
		$allowed_html = array(
			'a' => array(
				'href' => array(),
				'title' => array()
			)
		);
		
		?>
		<li <?php comment_class('clearfix'); ?> id="comment-<?php comment_ID() ?>">
			
			<div class="media thecomment">
						
				<div class="media-left author-img">
					<?php echo get_avatar($comment,$args['avatar_size']); ?>
				</div>
				
				<div class="media-body comment-text">
					<p class="comment-meta">
					<span class="author"><?php echo get_comment_author_link(); ?></span>
					<span class="date"><?php printf( wp_kses( __( '%1$s at %2$s', 'pixzlo' ), $allowed_html ), get_comment_date(), get_comment_time( 'g:i a' )) ?></span>
					<?php if ( $comment->comment_approved == '0' ) : ?>
						<em><i class="icon-info-sign"></i> <?php esc_html_e( 'Comment awaiting approval', 'pixzlo' ); ?></em>
						<br />
					<?php endif; ?>
					<?php if( $depth < $args['max_depth'] ) : ?>
					<span class="reply">
						<?php 	
						comment_reply_link( array_merge( $args, array('reply_text' => esc_html__('Reply ', 'pixzlo'), 'depth' => $depth, 'max_depth' => $args['max_depth'])), $comment->comment_ID ); 
						?>
					</span>
					<?php endif; ?>
					</p>
					<?php comment_text(); ?>
					<!-- Custom Comments Meta -->
					<?php if( $aps->pixzloGetThemeOpt( 'comments-like' ) || $aps->pixzloGetThemeOpt( 'comments-share' ) ) : ?>
						<div class="comment-meta-wrapper clearfix">
							<ul class="list-inline">
								<?php if( $aps->pixzloGetThemeOpt( 'comments-like' ) ) : ?>
								<li class="comment-like-wrapper"><?php echo do_shortcode( $aps->pixzloCommentLikeOut( $comment->comment_ID ) ); ?></li>
								<?php endif; ?>
								<?php if( $aps->pixzloGetThemeOpt( 'comments-social-shares' )) : ?>
								<li class="comment-share-wrapper pull-right"><?php echo do_shortcode( $aps->pixzloCommentShare( $comment->comment_ID ) ); ?></li>
								<?php endif; ?>
							</ul>
						</div>
					<?php endif; // if comment meta need ?>
				</div>
						
			</div>
			
			
		</li>
		<?php
		
	} 
}
