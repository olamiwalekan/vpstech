<?php
/**
 * ReduxFramework Barebones Sample Config File
 * For full documentation, please visit: http://docs.reduxframework.com/
 */
if ( ! class_exists( 'Redux' ) ) {
	return;
}

require_once( PIXZLO_CORE_DIR . 'admin/theme-config/config-fun.php' );
$acf = new PixzloConfigFun; 
// This is your option name where all the Redux data is stored.
$opt_name = "pixzlo_options";
/**
 * ---> SET ARGUMENTS
 * All the possible arguments for Redux.
 * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
 * */
$theme = wp_get_theme(); // For use with some settings. Not necessary.
$args = array(
	// TYPICAL -> Change these values as you need/desire
	'opt_name'             => $opt_name,
	// This is where your data is stored in the database and also becomes your global variable name.
	'display_name'         => $theme->get( 'Name' ),
	// Name that appears at the top of your panel
	'display_version'      => $theme->get( 'Version' ),
	// Version that appears at the top of your panel
	'menu_type'            => 'menu',
	//Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
	'allow_sub_menu'       => true,
	// Show the sections below the admin menu item or not
	'menu_title'           => __( 'Theme Options', 'redux-framework-demo' ),
	'page_title'           => __( 'Pixzlo Theme Options', 'redux-framework-demo' ),
	// You will need to generate a Google API key to use this feature.
	// Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
	'google_api_key'       => '',
	// Set it you want google fonts to update weekly. A google_api_key value is required.
	'google_update_weekly' => false,
	// Must be defined to add google fonts to the typography module
	'async_typography'     => true,
	// Use a asynchronous font on the front end or font string
	//'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
	'admin_bar'            => true,
	// Show the panel pages on the admin bar
	'admin_bar_icon'       => 'dashicons-portfolio',
	// Choose an icon for the admin bar menu
	'admin_bar_priority'   => 50,
	// Choose an priority for the admin bar menu
	'global_variable'      => '',
	// Set a different name for your global variable other than the opt_name
	'dev_mode'             => false,
	// Show the time the page took to load, etc
	'update_notice'        => true,
	// If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
	'customizer'           => true,
	// Enable basic customizer support
	//'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
	//'disable_save_warn' => true,                    // Disable the save warning when a user changes a field
	// OPTIONAL -> Give you extra features
	'page_priority'        => null,
	// Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
	'page_parent'          => 'themes.php',
	// For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
	'page_permissions'     => 'manage_options',
	// Permissions needed to access the options panel.
	'menu_icon'            => '',
	// Specify a custom URL to an icon
	'last_tab'             => '',
	// Force your panel to always open to a specific tab (by id)
	'page_icon'            => 'icon-themes',
	// Icon displayed in the admin panel next to your menu_title
	'page_slug'            => '_options',
	// Page slug used to denote the panel
	'save_defaults'        => true,
	// On load save the defaults to DB before user clicks save or not
	'default_show'         => false,
	// If true, shows the default value next to each field that is not the default value.
	'default_mark'         => '',
	// What to print by the field's title if the value shown is default. Suggested: *
	'show_import_export'   => true,
	// Shows the Import/Export panel when not used as a field.
	// CAREFUL -> These options are for advanced use only
	'transient_time'       => 60 * MINUTE_IN_SECONDS,
	'output'               => true,
	// Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
	'output_tag'           => true,
	// Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
	// 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.
	// FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
	'database'             => '',
	// possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
	'use_cdn'              => true,
	// If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.
	//'compiler'             => true,
	// HINTS
	'hints'                => array(
		'icon'          => 'el el-question-sign',
		'icon_position' => 'right',
		'icon_color'    => 'lightgray',
		'icon_size'     => 'normal',
		'tip_style'     => array(
			'color'   => 'light',
			'shadow'  => true,
			'rounded' => false,
			'style'   => '',
		),
		'tip_position'  => array(
			'my' => 'top left',
			'at' => 'bottom right',
		),
		'tip_effect'    => array(
			'show' => array(
				'effect'   => 'slide',
				'duration' => '500',
				'event'    => 'mouseover',
			),
			'hide' => array(
				'effect'   => 'slide',
				'duration' => '500',
				'event'    => 'click mouseleave',
			),
		),
	)
);
// Panel Intro text -> before the form
if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
	if ( ! empty( $args['global_variable'] ) ) {
		$v = $args['global_variable'];
	} else {
		$v = str_replace( '-', '_', $args['opt_name'] );
	}
	$args['intro_text'] = sprintf( __( '<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'redux-framework-demo' ), $v );
}
Redux::setArgs( $opt_name, $args );
/*
 * ---> END ARGUMENTS
 */
/*
 * ---> START HELP TABS
 */
//General Tab
Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'General', 'pixzlo-core' ),
	'id'               => 'general',
	'desc'             => esc_html__( 'These are the general settings of Pixzlo theme', 'pixzlo-core' ),
	'customizer_width' => '400px',
	'icon'             => 'el el-home'
) );

//General -> Layout
Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Layout', 'pixzlo-core' ),
	'id'         => 'general-layout',
	'desc'       => esc_html__( 'This is the setting for theme layouts', 'pixzlo-core' ),
	'subsection' => true,
	'fields'     => array(
		array(
			'id'       => 'page-layout',
			'type'     => 'button_set',
			'title'    => esc_html__( 'Page Layout', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'Choose page layout', 'pixzlo-core' ),
			'options' => array(
				'boxed' => esc_html__( 'Boxed', 'pixzlo-core' ),
				'wide'  => esc_html__( 'Wide', 'pixzlo-core' )
			),
			'default'  => 'wide'
		),
		array(
			'id'			=> 'site-width',
			'type'			=> 'dimensions',
			'units'			=> array( 'px' ),
			'units_extended'=> 'false',
			'title'			=> esc_html__( 'Site Width', 'pixzlo-core' ),
			'subtitle'		=> esc_html__( 'Set the site width here.', 'pixzlo-core' ),
			'height'		=> false,
			'default'		=> array(
				'width'	=> 1200,
				'units'=> 'px'
			),
			'required' 		=> array('page-layout', '!=', 'full')
		),
		array(
			'id'       => 'page-content-padding',
			'type'     => 'spacing',
			'mode'     => 'padding',
			'all'      => false,
			'units'    => array( 'px' ),
			'units_extended'=> 'false',
			'title'    => esc_html__( 'Page Content Padding', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'Set the top/right/bottom/left padding of page content.', 'pixzlo-core' ),
			'default'  => array(
				'padding-top'    => '',
				'padding-right'  => '',
				'padding-bottom' => '',
				'padding-left'   => ''
			)
		),
	)
) );

//General -> Loaders
Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Loaders', 'pixzlo-core' ),
	'id'         => 'general-loadres',
	'desc'       => esc_html__( 'This is the setting for Page Loader', 'pixzlo-core' ),
	'subsection' => true,
	'fields'     => array(
		array(
			'id'       => 'page-loader',
			'type'     => 'button_set',
			'title'    => esc_html__( 'Page Loader', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'Enable/Disable Page Loader', 'pixzlo-core' ),
			'options' => array(
				'yes' => esc_html__( 'Yes', 'pixzlo-core' ),
				'no'  => esc_html__( 'No', 'pixzlo-core' ),
			),
			'default'  => 'no'
		),
		array(
			'id'       => 'page-loader-img',
			'type'     => 'media',
			'library_filter'  => array('gif'),
			'url'      => true,
			'title'    => esc_html__( 'Page Loader Image', 'pixzlo-core' ),
			'compiler' => 'true',
			'subtitle' => esc_html__( 'Upload Page Loader Image', 'pixzlo-core' ),
			'required' 		=> array('page-loader', '=', 'yes')
		),
		array(
			'id'       => 'infinite-loader-img',
			'type'     => 'media',
			'library_filter'  => array('gif'),
			'url'      => true,
			'title'    => esc_html__( 'Infinite Scroll Image', 'pixzlo-core' ),
			'compiler' => 'true',
			'subtitle' => esc_html__( 'Upload Infinite Scroll Image', 'pixzlo-core' ),
		)
	)
) );

//General -> Theme Logo
Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Logo', 'pixzlo-core' ),
	'id'         => 'general-logo',
	'desc'       => esc_html__( 'This is the setting for Theme Logo', 'pixzlo-core' ),
	'subsection' => true,
	'fields'     => array(
		array(
			'id'       => 'logo',
			'type'     => 'media',
			'url'      => true,
			'preview'  => true,
			'title'    => esc_html__( 'Logo', 'pixzlo-core' ),
			'compiler' => 'true',
			'subtitle' => esc_html__( 'Upload theme logo', 'pixzlo-core' ),
		),
		array(
			'id'       => 'logo-height',
			'type'     => 'dimensions',
			'units'			=> array( 'px' ),
			'units_extended'=> 'false',
			'width'    => false,
			'title'    => esc_html__( 'Logo Height (Optional)', 'pixzlo-core' ),
			'desc'     => esc_html__( 'Mention here logo max height (Optional). Ex: 80', 'pixzlo-core' ),
			'default'  => array(
				'height'  => '',
				'units'=> 'px'
			),
		),
		array(
			'id'       => 'sticky-logo',
			'type'     => 'media',
			'url'      => true,
			'preview'  => true,
			'title'    => esc_html__( 'Sticky Logo', 'pixzlo-core' ),
			'compiler' => 'true',
			'subtitle' => esc_html__( 'Upload theme sticky logo', 'pixzlo-core' ),
		),
		array(
			'id'       => 'sticky-logo-height',
			'type'     => 'dimensions',
			'units'			=> array( 'px' ),
			'units_extended'=> 'false',
			'width'    => false,
			'title'    => esc_html__( 'Sticky Logo Height (Optional)', 'pixzlo-core' ),
			'desc'     => esc_html__( 'Mention here sticky logo max height (Optional). Ex: 80', 'pixzlo-core' ),
			'default'  => array(
				'height'  => '',
				'units'=> 'px'
			),
		),
		array(
			'id'       => 'mobile-logo',
			'type'     => 'media',
			'url'      => true,
			'preview'  => true,
			'title'    => esc_html__( 'Mobile Logo', 'pixzlo-core' ),
			'compiler' => 'true',
			'subtitle' => esc_html__( 'Upload theme mobile logo', 'pixzlo-core' ),
		),
		array(
			'id'       => 'mobile-logo-height',
			'type'     => 'dimensions',
			'units'			=> array( 'px' ),
			'units_extended'=> 'false',
			'width'    => false,
			'title'    => esc_html__( 'Mobile Logo Height (Optional)', 'pixzlo-core' ),
			'desc'     => esc_html__( 'Mention here mobile logo max height (Optional). Ex: 80', 'pixzlo-core' ),
			'default'  => array(
				'height'  => '',
				'units'=> 'px'
			),
		)
	)
) );

//General -> API's
Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'API', 'pixzlo-core' ),
	'id'         => 'general-api',
	'desc'       => esc_html__( 'This is the setting for API', 'pixzlo-core' ),
	'subsection' => true,
	'fields'     => array(
		array(
			'id'       => 'mailchimp-api',
			'type'     => 'password',
			'title'    => esc_html__( 'Mailchimp API Key', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'Place here your registered mailchimp API key.', 'pixzlo-core' ),
		),
		array(
			'id'       => 'google-api',
			'type'     => 'password',
			'title'    => esc_html__( 'Google Map API Key', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'Place here your registered google map API key.', 'pixzlo-core' ),
		)
	)
) );

//General -> Comments
Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Comments', 'pixzlo-core' ),
	'id'         => 'general-comments',
	'desc'       => esc_html__( 'This is the setting for comments', 'pixzlo-core' ),
	'subsection' => true,
	'fields'     => array(
		array(
			'id'       => 'comments-type',
			'type'     => 'select',
			'title'    => esc_html__( 'Comments Type', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'This option will be showing comment like facebook or default wordpress.', 'pixzlo-core' ),
			'options'  => array(
				'wp' => esc_html__( 'WordPress Comment', 'pixzlo-core' ),
				'fb' => esc_html__( 'Facebook Comment', 'pixzlo-core' ),
			),
			'default'  => 'wp'
		),
		array(
			'id'       => 'comments-like',
			'type'     => 'switch',
			'title'    => esc_html__( 'Comments Like', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'Enable/Disable to show or hide comments likes to single post comments.', 'pixzlo-core' ),
			'default'  => 0,
			'on'       => esc_html__( 'Enable', 'pixzlo-core' ),
			'off'      => esc_html__( 'Disable', 'pixzlo-core' ),
			'required' 		=> array('comments-type', '=', 'wp')
		),
		array(
			'id'       => 'comments-share',
			'type'     => 'switch',
			'title'    => esc_html__( 'Comments Share', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'Enable/Disable to show or hide comments share to single post comments.', 'pixzlo-core' ),
			'default'  => 0,
			'on'       => esc_html__( 'Enable', 'pixzlo-core' ),
			'off'      => esc_html__( 'Disable', 'pixzlo-core' ),
			'required' 		=> array('comments-type', '=', 'wp')
		),
		array(
			'id'       => 'fb-developer-key',
			'type'     => 'password',
			'title'    => esc_html__( 'Facebook Developer API', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'Enter facebook developer API key.', 'pixzlo-core' ),
			'required' 		=> array('comments-type', '=', 'fb')
		),
		array(
			'id'       => 'fb-comments-number',
			'type'     => 'text',
			'title'    => esc_html__( 'Number of Comments', 'pixzlo-core' ),
			'subtitle'     => esc_html__( 'Enter number of comments to display.', 'pixzlo-core' ),
			'default'  => '',
			'required' 		=> array('comments-type', '=', 'fb')
		),
		array(
			'id'       => 'fb-comments-width',
			'type'     => 'dimensions',
			'units'    => array( 'px' ),
			'units_extended'=> 'false',
			'height'    => false,
			'title'    => esc_html__( 'Facebook Comments Width', 'pixzlo-core' ),
			'subtitle'     => esc_html__( 'Increase or decrease facebook comments wrapper width.', 'pixzlo-core' ),
			'default'  => array(
				'width'  => 500,
				'units'=> 'px'
			),
			'required' 		=> array('comments-type', '=', 'fb')
		),
	)
) );

//General -> Smooth Scroll
Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Smooth Scroll', 'pixzlo-core' ),
	'id'         => 'general-smooth',
	'desc'       => esc_html__( 'This is the setting for page smooth scroll', 'pixzlo-core' ),
	'subsection' => true,
	'fields'     => array(
		array(
			'id'       => 'smooth-opt',
			'type'     => 'switch',
			'title'    => esc_html__( 'Smooth Scroll Option', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'Enable/Disable to append smooth scroll js to website.', 'pixzlo-core' ),
			'default'  => 0,
			'on'       => esc_html__( 'Enable', 'pixzlo-core' ),
			'off'      => esc_html__( 'Disable', 'pixzlo-core' )
		),
		array(
			'id'       => 'scroll-time',
			'type'     => 'text',
			'title'    => esc_html__( 'Scroll Time', 'pixzlo-core' ),
			'subtitle'     => esc_html__( 'Enter smooth scroll time in milliseconds. Example 600', 'pixzlo-core' ),
			'default'  => '600',
			'required' 		=> array('smooth-opt', '=', '1')
		),
		array(
			'id'       => 'scroll-distance',
			'type'     => 'text',
			'title'    => esc_html__( 'Scroll Distance', 'pixzlo-core' ),
			'subtitle'     => esc_html__( 'Enter smooth scroll distance in value. Example 40', 'pixzlo-core' ),
			'default'  => '40',
			'required' 		=> array('smooth-opt', '=', '1')
		)
	)
) );

//General -> Media Settings
Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Media Settings', 'pixzlo-core' ),
	'id'         => 'general-media',
	'desc'       => esc_html__( 'This is the setting for media sizes', 'pixzlo-core' ),
	'subsection' => true,
	'fields'     => array(
		array(
			'id'       => 'pixzlo_grid_large',
			'type'     => 'dimensions',
			'title'    => esc_html__('Pixzlo Grid Large Size', 'pixzlo-core'),
			'desc'       => esc_html__( 'This image used in gallery large grid. If you don\'t want this size means just leave this empty. Default 440 x 260', 'pixzlo-core' ),
			'default'  => array(
				'width'   => '440', 
				'height'  => '260'
			),
		),
		array(
			'id'       => 'pixzlo_grid_medium',
			'type'     => 'dimensions',
			'title'    => esc_html__('Pixzlo Grid Medium Size', 'pixzlo-core'),
			'desc'       => esc_html__( 'This image used in gallery medium grid. If you don\'t want this size means just leave this empty. Default 390 x 231', 'pixzlo-core' ),
			'default'  => array(
				'width'   => '370', 
				'height'  => '324'
			),
		),
		array(
			'id'       => 'pixzlo_grid_small',
			'type'     => 'dimensions',
			'title'    => esc_html__('Pixzlo Grid Small Size', 'pixzlo-core'),
			'desc'       => esc_html__( 'This image used in gallery small grid. If you don\'t want this size means just leave this empty. Default 220 x 130', 'pixzlo-core' ),
			'default'  => array(
				'width'   => '220', 
				'height'  => '130'
			),
		),
		array(
			'id'       => 'pixzlo_team_medium',
			'type'     => 'dimensions',
			'title'    => esc_html__('Pixzlo Team Medium Size', 'pixzlo-core'),
			'desc'       => esc_html__( 'This image used in team shorcode. If you don\'t want this size means just leave this empty. Default 300 x 300', 'pixzlo-core' ),
			'default'  => array(
				'width'   => '600', 
				'height'  => '600'
			),
		)
	)
) );

//General -> RTL
Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'RTL', 'pixzlo-core' ),
	'id'         => 'general-rtl',
	'desc'       => esc_html__( 'This is the setting for theme view RTL', 'pixzlo-core' ),
	'subsection' => true,
	'fields'     => array(
		array(
			'id'       => 'rtl',
			'type'     => 'switch',
			'title'    => esc_html__( 'RTL', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'Enable/Disable RTL to change theme right to left view.', 'pixzlo-core' ),
			'default'  => 0,
			'on'       => esc_html__( 'Enabled', 'pixzlo-core' ),
			'off'      => esc_html__( 'Disabled', 'pixzlo-core' ),
		),
	)
) );

//ADS
Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'ADS', 'pixzlo-core' ),
	'id'               => 'ads',
	'desc'             => esc_html__( 'These are the ads settings of pixzlo Theme', 'pixzlo-core' ),
	'customizer_width' => '400px',
	'icon'             => 'fa fa-television'
) );
//ADS -> Header Ads
Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Header Ads', 'pixzlo-core' ),
	'id'         => 'ads-header',
	'desc'       => esc_html__( 'These are header ads settings of pixzlo Theme', 'pixzlo-core' ),
	'subsection' => true,
	'fields'     => $acf->themeAdsFields('header')
) );
//ADS -> Footer Ads
Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Footer Ads', 'pixzlo-core' ),
	'id'         => 'ads-footer',
	'desc'       => esc_html__( 'These are footer ads settings of pixzlo Theme', 'pixzlo-core' ),
	'subsection' => true,
	'fields'     => $acf->themeAdsFields('footer')
) );
//ADS -> Sidebar Ads
Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Sidebar Ads', 'pixzlo-core' ),
	'id'         => 'ads-sidebar',
	'desc'       => esc_html__( 'These are sidebar ads settings of pixzlo Theme', 'pixzlo-core' ),
	'subsection' => true,
	'fields'     => $acf->themeAdsFields('sidebar')
) );
//ADS -> Artical Top Ads
Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Artical Top Ads', 'pixzlo-core' ),
	'id'         => 'ads-artical-top',
	'desc'       => esc_html__( 'These are artical top ads settings of pixzlo Theme', 'pixzlo-core' ),
	'subsection' => true,
	'fields'     => $acf->themeAdsFields('artical-top')
) );
//ADS -> Artical Inline Ads
Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Artical Inline Ads', 'pixzlo-core' ),
	'id'         => 'ads-artical-inline',
	'desc'       => esc_html__( 'These are artical inline ads settings of pixzlo Theme', 'pixzlo-core' ),
	'subsection' => true,
	'fields'     => $acf->themeAdsFields('artical-inline')
) );
//ADS -> Artical Bottom Ads
Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Artical Bottom Ads', 'pixzlo-core' ),
	'id'         => 'ads-artical-bottom',
	'desc'       => esc_html__( 'These are artical bottom ads settings of pixzlo Theme', 'pixzlo-core' ),
	'subsection' => true,
	'fields'     => $acf->themeAdsFields('artical-bottom')
) );
//ADS -> Custom1 Ads
Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Custom1 Ads', 'pixzlo-core' ),
	'id'         => 'ads-custom1',
	'desc'       => esc_html__( 'These are custom1 ads settings of pixzlo Theme', 'pixzlo-core' ),
	'subsection' => true,
	'fields'     => $acf->themeAdsFields('custom1')
) );
//ADS -> Custom2 Ads
Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Custom2 Ads', 'pixzlo-core' ),
	'id'         => 'ads-custom2',
	'desc'       => esc_html__( 'These are custom2 ads settings of pixzlo Theme', 'pixzlo-core' ),
	'subsection' => true,
	'fields'     => $acf->themeAdsFields('custom2')
) );
//ADS -> Custom3 Ads
Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Custom3 Ads', 'pixzlo-core' ),
	'id'         => 'ads-custom3',
	'desc'       => esc_html__( 'These are custom3 ads settings of pixzlo Theme', 'pixzlo-core' ),
	'subsection' => true,
	'fields'     => $acf->themeAdsFields('custom3')
) );
//ADS -> Custom4 Ads
Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Custom4 Ads', 'pixzlo-core' ),
	'id'         => 'ads-custom4',
	'desc'       => esc_html__( 'These are custom4 ads settings of pixzlo Theme', 'pixzlo-core' ),
	'subsection' => true,
	'fields'     => $acf->themeAdsFields('custom4')
) );
//ADS -> Custom5 Ads
Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Custom5 Ads', 'pixzlo-core' ),
	'id'         => 'ads-custom5',
	'desc'       => esc_html__( 'These are custom5 ads settings of pixzlo Theme', 'pixzlo-core' ),
	'subsection' => true,
	'fields'     => $acf->themeAdsFields('custom5')
) );

//Skin Tab
Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'Skin', 'pixzlo-core' ),
	'id'               => 'skin',
	'desc'             => esc_html__( 'These are theme skin/color options', 'pixzlo-core' ),
	'customizer_width' => '400px',
	'icon'             => 'fa fa-paint-brush'
) );

//Skin -> Theme Skin
Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Theme Skin', 'pixzlo-core' ),
	'id'         => 'skin-general',
	'desc'       => esc_html__( 'This is the setting for theme skin', 'pixzlo-core' ),
	'subsection' => true,
	'fields'     => array(
		array(
			'id'       => 'theme-color',
			'type'     => 'color',
			'title'    => esc_html__( 'Theme Color', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'Choose theme color.', 'pixzlo-core' ),
			'validate' => 'color',
			'default'  => '#11caff'
		),
		array(
			'id'       => 'secondary-color',
			'type'     => 'color',
			'title'    => esc_html__( 'Secondary Color', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'Choose secondary color. This option for switch theme to gradient mode. If leave this color to empty, Single color will appear as theme color.', 'pixzlo-core' ),
			'validate' => 'color',
			'default'  => '#fc7837'
		),
		array(
			'id'       => 'theme-link-color',
			'type'     => 'link_color',
			'title'    => esc_html__( 'General Links Color', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'Choose general link color for theme.', 'pixzlo-core' ),
			'default'  => array(
				'regular' => '#000000',
				'hover'   => '#11caff',
				'active'  => '#11caff',
			)
		),
	)
) );

//Skin -> Body Background
Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Body Background', 'pixzlo-core' ),
	'id'         => 'skin-body',
	'desc'       => esc_html__( 'This is the setting for theme body background.', 'pixzlo-core' ),
	'subsection' => true,
	'fields'     => array(
		array(         
			'id'       => 'body-background',
			'type'     => 'background',
			'title'    => __( 'Body Background Settings', 'pixzlo-core'),
			'subtitle' => __( 'This is settings for body background with image, color, etc.', 'pixzlo-core' ),
			'default'  => array(
				'background-color' => '',
			)
		),
	)
) );

//Typography Tab
Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'Typography', 'pixzlo-core' ),
	'id'               => 'typography',
	'desc'             => esc_html__( 'These are the theme typograhpy options', 'pixzlo-core' ),
	'customizer_width' => '400px',
	'icon'             => 'fa fa-font'
) );

//Typography -> Theme General Typography
Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'General Typography', 'pixzlo-core' ),
	'id'         => 'typography-general',
	'desc'       => esc_html__( 'This is the setting for theme general typograhpy', 'pixzlo-core' ),
	'subsection' => true,
	'fields'     => array(
		array(
			'id'       => 'body-typography',
			'type'     => 'typography',
			'title'    => __( 'Body Fonts', 'pixzlo-core' ),
			'subtitle' => __( 'Specify the body font properties.', 'pixzlo-core' ),
			'google'   => true,
			'letter-spacing'=> true,
			'line-height'=> true,
			'default'  => array(
				'color'       => 'rgba(0,0,0,0.6)',
				'font-size'   => '16px',
				'font-family' => 'Source Sans Pro',
				'font-weight' => '400',
				'line-height' => '28px'
			),
		),
		array(
			'id'       => 'h1-typography',
			'type'     => 'typography',
			'title'    => __( 'H1 Fonts', 'pixzlo-core' ),
			'subtitle' => __( 'Specify the h1 font properties.', 'pixzlo-core' ),
			'google'   => true,
			'letter-spacing'=> true,
			'line-height'=> true,
			'default'  => array(
				'color'       => '#151515',
				'font-size'   => '60px',
				'font-family' => 'Noto Sans',
				'line-height' => '66px'
			),
		),
		array(
			'id'       => 'h2-typography',
			'type'     => 'typography',
			'title'    => __( 'H2 Fonts', 'pixzlo-core' ),
			'subtitle' => __( 'Specify the h2 font properties.', 'pixzlo-core' ),
			'google'   => true,
			'letter-spacing'=> true,
			'line-height'=> true,
			'default'  => array(
				'color'       => '#151515',
				'font-size'   => '35px',
				'font-family' => 'Noto Sans',
				'font-weight' => '700',
				'line-height' => '38px'
			),
		),
		array(
			'id'       => 'h3-typography',
			'type'     => 'typography',
			'title'    => __( 'H3 Fonts', 'pixzlo-core' ),
			'subtitle' => __( 'Specify the h3 font properties.', 'pixzlo-core' ),
			'google'   => true,
			'letter-spacing'=> true,
			'line-height'=> true,
			'default'  => array(
				'color'       => '#151515',
				'font-size'   => '25px',
				'font-family' => 'Noto Sans',
				'font-weight' => '700',
				'line-height' => '28px'
			),
		),
		array(
			'id'       => 'h4-typography',
			'type'     => 'typography',
			'title'    => __( 'H4 Fonts', 'pixzlo-core' ),
			'subtitle' => __( 'Specify the h4 font properties.', 'pixzlo-core' ),
			'google'   => true,
			'letter-spacing'=> true,
			'line-height'=> true,
			'default'  => array(
				'color'       => '#151515',
				'font-size'   => '22px',
				'font-family' => 'Noto Sans',
				'font-weight' => '700',
				'line-height' => '22px'
			),
		),
		array(
			'id'       => 'h5-typography',
			'type'     => 'typography',
			'title'    => __( 'H5 Fonts', 'pixzlo-core' ),
			'subtitle' => __( 'Specify the h5 font properties.', 'pixzlo-core' ),
			'google'   => true,
			'letter-spacing'=> true,
			'line-height'=> true,
			'default'  => array(
				'color'       => '#151515',
				'font-size'   => '18px',
				'font-family' => 'Noto Sans',
				'font-weight' => '700',
				'line-height' => '20px'
			),
		),
		array(
			'id'       => 'h6-typography',
			'type'     => 'typography',
			'title'    => __( 'H6 Fonts', 'pixzlo-core' ),
			'subtitle' => __( 'Specify the h6 font properties.', 'pixzlo-core' ),
			'google'   => true,
			'letter-spacing'=> true,
			'line-height'=> true,
			'default'  => array(
				'color'       => '#151515',
				'font-size'   => '15px',
				'font-family' => 'Noto Sans',
				'font-weight' => '700',
				'line-height' => '16px'
			),
		),
	)
) );

//Typography -> Theme Widgets Typography
Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Widgets Typography', 'pixzlo-core' ),
	'id'         => 'typography-widgets',
	'desc'       => esc_html__( 'This is the setting for theme widgets typograhpy', 'pixzlo-core' ),
	'subsection' => true,
	'fields'     => array(
		array(
			'id'       => 'widgets-title',
			'type'     => 'typography',
			'title'    => __( 'Widgets Title Typography', 'pixzlo-core' ),
			'subtitle' => __( 'Specify the widget title typography properties.', 'pixzlo-core' ),
			'google'   => true,
			'letter-spacing'=> true,
			'line-height'=> true,
			'default'  => array(
				'color'       => '',
				'font-size'   => '18px',
				'font-family' => 'Noto Sans',
				'font-weight' => '',
				'line-height' => '19px'
			),
		),
		array(
			'id'       => 'widgets-content',
			'type'     => 'typography',
			'title'    => __( 'Widgets Content Typography', 'pixzlo-core' ),
			'subtitle' => __( 'Specify the widget content typography properties.', 'pixzlo-core' ),
			'google'   => true,
			'letter-spacing'=> true,
			'line-height'=> true,
			'default'  => array(
				'color'       => '',
				'font-size'   => '16px',
				'font-family' => 'Open Sans',
				'font-weight' => '400',
				'line-height' => '26px'
			),
		),
	)
) );

//Header Tab
Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'Header', 'pixzlo-core' ),
	'id'               => 'header',
	'desc'             => esc_html__( 'These are header general settings of pixzlo theme', 'pixzlo-core' ),
	'customizer_width' => '400px',
	'icon'             => 'fa fa-credit-card-alt'
) );

//Header -> Header General
$header_mainmenu_skin = $acf->themeSkinSettings('main-menu');
$secondary_space_skin = $acf->themeSkinSettings('secondary-space', array( 'line_height' => true )); 
$header_dropdown_skin = $acf->themeSkinSettings('dropdown-menu', array( 'line_height' => true ));
$header_top_slide_skin = $acf->themeSkinSettings('top-sliding', array( 'line_height' => true ));

Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Header General', 'pixzlo-core' ),
	'id'         => 'header-general',
	'desc'       => esc_html__( 'This is the setting for Header General', 'pixzlo-core' ),
	'subsection' => true,
	'fields'     => array(
		array(
			'id'       => 'header-layout',
			'type'     => 'button_set',
			'title'    => esc_html__( 'Header Layout', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'Choose header layout boxed or wide.', 'pixzlo-core' ),
			'options' => array(
				'boxed' => esc_html__( 'Boxed', 'pixzlo-core' ),
				'wide'  => esc_html__( 'Wide', 'pixzlo-core' ),
			),
			'default'  => 'wide',
			'required' 		=> array('page-layout', '=', 'wide')
		),
		array(
			'id'       => 'header-type',
			'type'     => 'select',
			'title'    => esc_html__( 'Header Type', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'Select header type for matching your site.', 'pixzlo-core' ),
			'options'  => array(
				'default'		=> esc_html__( 'Default', 'pixzlo-core' ),
				'left-sticky'	=> esc_html__( 'Left Sticky', 'pixzlo-core' ),
				'right-sticky'	=> esc_html__( 'Right Stikcy', 'pixzlo-core' ),
			),
			'default'  => 'default'
		),
		array(         
			'id'       => 'header-background',
			'type'     => 'background',
			'title'    => __( 'Header Background Settings', 'pixzlo-core'),
			'subtitle' => __( 'This is settings for header background with image, color, etc.', 'pixzlo-core' ),
			'default'  => array(
				'background-color' => '#ffffff',
			),
			'required' 		=> array('header-type', '=', 'default')
		),
		array(
			'id'      => 'header-items',
			'type'    => 'sorter',
			'title'   => esc_html__( 'Header Items', 'pixzlo-core' ),
			'desc'    => esc_html__( 'Needed items for header, drag from disabled and put enabled.', 'pixzlo-core' ),
			'options' => array(
				'Normal' => array(
					
					'header-topbar'	=> esc_html__( 'Top Bar', 'pixzlo-core' )											
											
				),
				'Sticky' => array(
					
					'header-nav'	=> esc_html__( 'Nav Bar', 'pixzlo-core' )
					
				),
				'disabled' => array(
					
					'header-logo'	=> esc_html__( 'Logo Section', 'pixzlo-core' )
											
				)
			),
			'required' 		=> array('header-type', '=', 'default')
		),
		array(
			'id'       => 'header-fields-custom-start',
			'type'     => 'section',
			'title'    => esc_html__( 'Header Custom Fields Settings', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'This is settings for header custom fields.', 'pixzlo-core' ),
			'indent'   => true, 
		),
		array(
			'id'		=>'header-phone-text',
			'type' 		=> 'textarea',
			'title' 	=> esc_html__( 'Phone Number Custom Text', 'pixzlo-core' ), 
			'desc'		=> esc_html__( 'This is the phone number field, you can assign here any custom text. Few HTML allowed here.', 'pixzlo-core' ),
			'default' 	=> '1234567890',
		),
		array(
			'id'		=>'header-address-text',
			'type' 		=> 'textarea',
			'title' 	=> esc_html__( 'Address Custom Text', 'pixzlo-core' ), 
			'desc'		=> esc_html__( 'This is the address field, you can assign here any custom text. Few HTML allowed here.', 'pixzlo-core' ),
			'default' 	=> 'No. 12, Wales street, Australia.',
		),
		array(
			'id'		=>'header-email-text',
			'type' 		=> 'textarea',
			'title' 	=> esc_html__( 'Email Custom Text', 'pixzlo-core' ), 
			'desc'		=> esc_html__( 'This is the email field, you can assign here any email id. Example companyname@yourdomain.com', 'pixzlo-core' ),
			'default' 	=> 'info@example.com',
		),
		array(
			'id'     => 'header-fields-custom-end',
			'type'   => 'section',
			'indent' => false, 
		),
		array(
			'id'       => 'header-slider-setting-start',
			'type'     => 'section',
			'title'    => esc_html__( 'Header Slider Settings', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'This is settings for header slider.', 'pixzlo-core' ),
			'indent'   => true, 
			'required' 		=> array('header-type', '=', 'default')
		),
		array(
			'id'       => 'header-slider-position',
			'type'     => 'select',
			'title'    => esc_html__( 'Header Slider Position', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'Select header slider position matching your page.', 'pixzlo-core' ),
			'options'  => array(
				'bottom'		=> esc_html__( 'Below Header', 'pixzlo-core' ),
				'top'	=> esc_html__( 'Above Header', 'pixzlo-core' ),
				'none'	=> esc_html__( 'None', 'pixzlo-core' ),
			),
			'default'  => 'none'
		),
		array(
			'id'     => 'header-slider-setting-end',
			'type'   => 'section',
			'indent' => false, 
		),
		array(
			'id'       => 'header-sticky-setting-start',
			'type'     => 'section',
			'title'    => esc_html__( 'Header Sticky/Transparent Settings', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'This is settings for sticky part.', 'pixzlo-core' ),
			'indent'   => true, 
			'required' 		=> array('header-type', '=', 'default')
		),
		array(
			'id'       => 'header-absolute',
			'type'     => 'switch',
			'title'    => esc_html__( 'Header Absolute', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'Enable/Disable header absolute option to show transparent header for page.', 'pixzlo-core' ),
			'default'  => 0,
			'on'       => esc_html__( 'Enabled', 'pixzlo-core' ),
			'off'      => esc_html__( 'Disabled', 'pixzlo-core' ),
		),
		array(
			'id'       => 'sticky-part',
			'type'     => 'switch',
			'title'    => esc_html__( 'Header Sticky Part', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'Enable/Disable stciky part to sticky which items are placed in Sticky Part at Header Items.', 'pixzlo-core' ),
			'default'  => 0,
			'on'       => esc_html__( 'Enabled', 'pixzlo-core' ),
			'off'      => esc_html__( 'Disabled', 'pixzlo-core' ),
		),
		array(
			'id'       => 'sticky-part-scrollup',
			'type'     => 'switch',
			'title'    => esc_html__( 'Sticky Scroll Up', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'Enable/Disable stciky part to sticky only scroll up. This also only sticky which items are placed in Sticky Part at Header Items.', 'pixzlo-core' ),
			'default'  => 0,
			'on'       => esc_html__( 'Enabled', 'pixzlo-core' ),
			'off'      => esc_html__( 'Disabled', 'pixzlo-core' ),
			'required' 		=> array('sticky-part', '!=', 0)
		),
		array(
			'id'     => 'header-sticky-setting-end',
			'type'   => 'section',
			'indent' => false, 
		),
		array(
			'id'       => 'header-mainmenu-setting-start',
			'type'     => 'section',
			'title'    => esc_html__( 'Header Main Menu Settings', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'This is settings for mainmenu.', 'pixzlo-core' ),
			'indent'   => true, 
			'required' 		=> array('header-type', '=', 'default')
		),
		array(
			'id'       => 'mainmenu-menutype',
			'type'     => 'select',
			'title'    => esc_html__( 'Menu Type', 'pixzlo-core' ),
			'options'  => array(
				'advanced' => esc_html__( 'Advanced Menu', 'pixzlo-core' ),
				'normal' => esc_html__( 'Normal Menu', 'pixzlo-core' ),
			),
			'default'  => 'normal'
		),
		array(
			'id'       => 'menu-tag',
			'type'     => 'switch',
			'title'    => esc_html__( 'Menu Tag', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'Enable/Disable menu tag for menu items like Hot, Trend, New.', 'pixzlo-core' ),
			'default'  => 0,
			'on'       => esc_html__( 'Enabled', 'pixzlo-core' ),
			'off'      => esc_html__( 'Disabled', 'pixzlo-core' ),
			'required' 		=> array('mainmenu-menutype', '=', 'advanced')
		),
		array(
			'id'       => 'menu-tag-hot-text',
			'type'     => 'text',
			'title'    => esc_html__('Hot Menu Tag Text', 'pixzlo-core'),
			'subtitle' => esc_html__('Set this text to show hot menu tag.', 'pixzlo-core'),
			'default'  => esc_html__( 'Hot', 'pixzlo-core' ),
			'required' 		=> array('menu-tag', '!=', 0)
		),
		array(
			'id'       => 'menu-tag-hot-bg',
			'type'     => 'color',
			'title'    => esc_html__('Hot Menu Tag Background', 'pixzlo-core'),
			'subtitle' => esc_html__('Set hot menu tag background color.', 'pixzlo-core'),
			'default'  => '#ff0000',
			'validate' => 'color',
			'required' 		=> array('menu-tag', '!=', 0)
		),
		array(
			'id'       => 'menu-tag-new-text',
			'type'     => 'text',
			'title'    => esc_html__('New Menu Tag Text', 'pixzlo-core'),
			'subtitle' => esc_html__('Set this text to show new menu tag.', 'pixzlo-core'),
			'default'  => esc_html__( 'New', 'pixzlo-core' ),
			'required' 		=> array('menu-tag', '!=', 0)
		),
		array(
			'id'       => 'menu-tag-new-bg',
			'type'     => 'color',
			'title'    => esc_html__('New Menu Tag Background', 'pixzlo-core'),
			'subtitle' => esc_html__('Set new menu tag background color.', 'pixzlo-core'),
			'default'  => '#3940ff',
			'validate' => 'color',
			'required' 		=> array('menu-tag', '!=', 0)
		),
		array(
			'id'       => 'menu-tag-trend-text',
			'type'     => 'text',
			'title'    => esc_html__('Trend Menu Tag Text', 'pixzlo-core'),
			'subtitle' => esc_html__('Set this text to show trend menu tag.', 'pixzlo-core'),
			'default'  => esc_html__( 'Trend', 'pixzlo-core' ),
			'required' 		=> array('menu-tag', '!=', 0)
		),
		array(
			'id'       => 'menu-tag-trend-bg',
			'type'     => 'color',
			'title'    => esc_html__('Trend Menu Tag Background', 'pixzlo-core'),
			'subtitle' => esc_html__('Set trend menu tag background color.', 'pixzlo-core'),
			'default'  => '#7d0fcc',
			'validate' => 'color',
			'required' 		=> array('menu-tag', '!=', 0)
		),
		array(
			'id'     => 'header-mainmenu-setting-end',
			'type'   => 'section',
			'indent' => false, 
		),
		array(
			'id'       => 'header-mainmenu-start',
			'type'     => 'section',
			'title'    => esc_html__( 'Header Main Menu Skin', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'This is individual skin settings for mainmenu. Here you can set mainmenu font color, link color, etc..', 'pixzlo-core' ),
			'indent'   => true, 
		),
		$header_mainmenu_skin[0],
		array(
			'id'     => 'header-mainmenu-end',
			'type'   => 'section',
			'indent' => false, 
		),
		array(
			'id'       => 'secondary-menu-setting-start',
			'type'     => 'section',
			'title'    => esc_html__( 'Header Secondary Menu Space Settings', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'This is settings for secondary.', 'pixzlo-core' ),
			'indent'   => true, 
			'required' 		=> array('header-type', '=', 'default')
		),
		array(
			'id'       => 'secondary-menu',
			'type'     => 'switch',
			'title'    => esc_html__( 'Secondary Menu', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'Enable/Disable secondary menu.', 'pixzlo-core' ),
			'default'  => 0,
			'on'       => esc_html__( 'Enabled', 'pixzlo-core' ),
			'off'      => esc_html__( 'Disabled', 'pixzlo-core' ),
		),
		array(
			'id'       => 'secondary-menu-type',
			'type'     => 'select',
			'title'    => esc_html__( 'Secondary Menu Type', 'pixzlo-core' ),
			'options'  => array(
				'left-push'		=> esc_html__( 'Left Push', 'pixzlo-core' ),
				'left-overlay'	=> esc_html__( 'Left Overlay', 'pixzlo-core' ),
				'right-push'		=> esc_html__( 'Right Push', 'pixzlo-core' ),
				'right-overlay'	=> esc_html__( 'Right Overlay', 'pixzlo-core' ),
				'full-overlay'	=> esc_html__( 'Full Page Overlay', 'pixzlo-core' ),
			),
			'default'  => 'right-overlay',
			'required' 		=> array('secondary-menu', '!=', 0)
		),
		array(
			'id'       => 'secondary-menu-space-width',
			'type'     => 'dimensions',
			'units'		=> array( 'px' ),
			'units_extended'=> 'false',
			'height'    => false,
			'title'    => esc_html__( 'Secondary Menu Space Width', 'pixzlo-core' ),
			'desc'     => esc_html__( 'Increase or decrease secondary menu space width. this options only use if you enable secondary menu.', 'pixzlo-core' ),
			'default'  => array(
				'width'  => 350,
				'units'=> 'px'
			),
			'required' 		=> array(
				array( 'secondary-menu', '!=', 0),
				array( 'secondary-menu-type', '!=', 'full-overlay')
			)
		),
		array(
			'id'     => 'secondary-menu-setting-end',
			'type'   => 'section',
			'indent' => false, 
		),
		array(
			'id'       => 'header-secondary-start',
			'type'     => 'section',
			'title'    => esc_html__( 'Header Secondary Menu Space Skin', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'This is individual skin settings for secondary menu space. Here you can set secondary menu space font color, link color, etc..', 'pixzlo-core' ),
			'indent'   => true, 
			'required' 		=> array(
				array( 'header-type', '=', 'default' ),
				array( 'secondary-menu', '=', 1 )
			)
		),
		$secondary_space_skin[0],
		$secondary_space_skin[2],
		$secondary_space_skin[3],
		$secondary_space_skin[4],
		array(         
			'id'       => 'secondary-space-background',
			'type'     => 'background',
			'title'    => __('Secondary Space Background', 'pixzlo-core'),
			'subtitle' => __('Secondary space background with image, color, etc.', 'pixzlo-core'),
			'default'  => array(
				'background-color' => '',
			)
		),
		array(
			'id'     => 'header-secondary-end',
			'type'   => 'section',
			'indent' => false, 
		),
		array(
			'id'       => 'header-dropdown-start',
			'type'     => 'section',
			'title'    => esc_html__( 'Header Dropdown Menu Skin', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'This is individual skin settings for dropdown menu. Here you can set dropdown menu font color, link color, etc..', 'pixzlo-core' ),
			'indent'   => true, 
			'required' 		=> array('header-type', '=', 'default')
		),
		$header_dropdown_skin[0],
		$header_dropdown_skin[1],
		$header_dropdown_skin[2],
		$header_dropdown_skin[3],
		array(
			'id'     => 'header-dropdown-end',
			'type'   => 'section',
			'indent' => false, 
		),
		array(
			'id'       => 'header-top-sliding-switch',
			'type'     => 'switch',
			'title'    => esc_html__( 'Top Sliding Bar Enable', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'Enable/Disable top sliding bar. Here you can show you sidebars width column based.', 'pixzlo-core' ),
			'default'  => 0,
			'on'       => esc_html__( 'Enabled', 'pixzlo-core' ),
			'off'      => esc_html__( 'Disabled', 'pixzlo-core' ),
		),
		array(
			'id'       => 'header-top-sliding-device',
			'type'     => 'button_set',
			'title'    => esc_html__( 'Show on Devices', 'pixzlo-core' ),
			'desc'     => esc_html__( 'Enable or disable top sliding bar for mobile, tab or desktop. This option from big devices. If desktop not enable and tab enable means it\'s hide sliding bar all the devices.', 'pixzlo-core' ),
			'multi'    => true,
			'options'  => array(
				'desktop' => 'Desktop',
				'tab' => 'Tablet',
				'mobile' => 'Mobile'
			),
			'default'  => array( 'desktop', 'tab' ),
			'required' 		=> array('header-top-sliding-switch', '=', 1 )
		),
		array(
			'id'       => 'header-top-slide-settings-start',
			'type'     => 'section',
			'title'    => esc_html__( 'Header Top Slide Settings', 'pixzlo-core' ),
			'indent'   => true, 
			'required' 		=> array( 
				array('header-type', '=', 'default' ),
				array('header-top-sliding-switch', '=', 1 )
			)
		),
		array(
			'id'       => 'header-top-sliding-cols',
			'type'     => 'select',
			'title'    => esc_html__( 'Secondary Menu Type', 'pixzlo-core' ),
			'options'  => array(
				'3'		=> esc_html__( '4 Columns', 'pixzlo-core' ),
				'4'		=> esc_html__( '3 Columns', 'pixzlo-core' ),
				'6'		=> esc_html__( '2 Columns', 'pixzlo-core' ),
				'12'	=> esc_html__( '1 Column', 'pixzlo-core' ),
			),
			'default'  => '3'
		),
		array(
			'id'       => 'header-top-sliding-sidebar-1',
			'type'     => 'select',
			'title'    => esc_html__( 'Choose First Column', 'pixzlo-core' ),
			'desc'     => esc_html__( 'Select widget area for showing first column of top sliding bar.', 'pixzlo-core' ),
			'data'     => 'sidebars',
			'required' 		=> array('header-top-sliding-cols', '<=', '12')
		),
		array(
			'id'       => 'header-top-sliding-sidebar-2',
			'type'     => 'select',
			'title'    => esc_html__( 'Choose Second Column', 'pixzlo-core' ),
			'desc'     => esc_html__( 'Select widget area for showing second column of top sliding bar.', 'pixzlo-core' ),
			'data'     => 'sidebars',
			'required' 		=> array('header-top-sliding-cols', '<=', '6')
		),
		array(
			'id'       => 'header-top-sliding-sidebar-3',
			'type'     => 'select',
			'title'    => esc_html__( 'Choose Third Column', 'pixzlo-core' ),
			'desc'     => esc_html__( 'Select widget area for showing third column of top sliding bar.', 'pixzlo-core' ),
			'data'     => 'sidebars',
			'required' 		=> array('header-top-sliding-cols', '<=', '4')
		),
		array(
			'id'       => 'header-top-sliding-sidebar-4',
			'type'     => 'select',
			'title'    => esc_html__( 'Choose Fourth Column', 'pixzlo-core' ),
			'desc'     => esc_html__( 'Select widget area for showing fourth column of top sliding bar.', 'pixzlo-core' ),
			'data'     => 'sidebars',
			'required' 		=> array('header-top-sliding-cols', '<=', '3')
		),
		array(
			'id'     => 'header-top-slide-settings-end',
			'type'   => 'section',
			'indent' => false, 
		),
		array(
			'id'       => 'header-top-sliding-start',
			'type'     => 'section',
			'title'    => esc_html__( 'Header Top Sliding Bar Skin', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'This is individual skin settings for header top sliding bar. Here you can set top sliding bar font color, link color, etc..', 'pixzlo-core' ),
			'indent'   => true, 
			'required' 		=> array( 
				array('header-type', '=', 'default' ),
				array('header-top-sliding-switch', '=', 1 )
			)
		),
		$header_top_slide_skin[0],
		$header_top_slide_skin[1],
		$header_top_slide_skin[2],
		$header_top_slide_skin[3],
		$header_top_slide_skin[4],
		array(
			'id'     => 'header-top-sliding-end',
			'type'   => 'section',
			'indent' => false, 
		),
		array(
			'id'       => 'search-toggle-form',
			'type'     => 'select',
			'title'    => esc_html__( 'Toggle Search Modal', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'Select serach box toggle modal.', 'pixzlo-core' ),
			'options'  => array(
				'1' => esc_html__( 'Full Screen Search', 'pixzlo-core' ),
				'2' => esc_html__( 'Text Box Toggle Search', 'pixzlo-core' ),
				'3' => esc_html__( 'Full Bar Toggle Search', 'pixzlo-core' ),
				'4' => esc_html__( 'Bottom Seach Box Toggle', 'pixzlo-core' ),
			),
			'default'  => '1'
		),
	)
) );

//Header -> Header Top Bar
$header_topbar_skin = $acf->themeSkinSettings('header-topbar');
$header_topbar_ads = $acf->themeAdsList('header-topbar', 'top bar');
Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Header Top Bar', 'pixzlo-core' ),
	'id'         => 'header-topbar',
	'desc'       => esc_html__( 'This is the setting for Header top bar', 'pixzlo-core' ),
	'subsection' => true,
	'fields'     => array(
		array(
			'id'       => 'header-topbar-height',
			'type'     => 'dimensions',
			'units'		=> array( 'px' ),
			'units_extended'=> 'false',
			'width'    => false,
			'title'    => esc_html__( 'Header Top Bar Height', 'pixzlo-core' ),
			'desc'     => esc_html__( 'Increase or decrease header topbar height.', 'pixzlo-core' ),
			'default'  => array(
				'height'  => '58',
				'units'=> 'px'
			),
		),
		array(
			'id'       => 'header-topbar-sticky-height',
			'type'     => 'dimensions',
			'units'			=> array( 'px' ),
			'units_extended'=> 'false',
			'width'    => false,
			'title'    => esc_html__( 'Header Top Bar Sticky Height', 'pixzlo-core' ),
			'desc'     => esc_html__( 'Increase or decrease header topbar sticky height.', 'pixzlo-core' ),
			'default'  => array(
				'height'  => '50',
				'units'=> 'px'
			),
		),
		array(
			'id'       => 'header-topbar-start',
			'type'     => 'section',
			'title'    => esc_html__( 'Header Topbar Skin', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'This is individual skin settings for header topbar. Here you can set header topbar font color, link color, etc..', 'pixzlo-core' ),
			'indent'   => true, 
		),
		$header_topbar_skin[0],
		$header_topbar_skin[1],
		$header_topbar_skin[2],
		$header_topbar_skin[3],
		$header_topbar_skin[4],
		array(
			'id'     => 'header-topbar-end',
			'type'   => 'section',
			'indent' => false, 
		),
		array(
			'id'       => 'header-topbar-text-1',
			'type'     => 'text',
			'title'    => esc_html__( 'Custom Text 1', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'Custom text shows header topbar. Here, you can place shortcode.', 'pixzlo-core' )
		),
		array(
			'id'       => 'header-topbar-text-2',
			'type'     => 'text',
			'title'    => esc_html__( 'Custom Text 2', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'One more custom text shows header topbar. Here, you can place shortcode.', 'pixzlo-core' )
		),
		array(
			'id'       => 'header-topbar-date',
			'type'     => 'text',
			'title'    => esc_html__( 'Date Format', 'pixzlo-core' ),
			'desc'     => esc_html__( 'Enter date format like: l, F j, Y', 'pixzlo-core' ),
			'default'  => 'l, F j, Y',
		),
		$header_topbar_ads,
		array(
			'id'      => 'header-topbar-items',
			'type'    => 'sorter',
			'title'   => esc_html__( 'Header Top Bar Items', 'pixzlo-core' ),
			'desc'    => esc_html__( 'Needed header topbar items drag from disabled and put enabled.', 'pixzlo-core' ),
			'options' => array(
				'disabled' => array(
					'header-topbar-text-1'	=> esc_html__( 'Custom Text 1', 'pixzlo-core' ),
					'header-topbar-text-2'	=> esc_html__( 'Custom Text 2', 'pixzlo-core' ),
					'header-topbar-menu'    => esc_html__( 'Top Bar Menu', 'pixzlo-core' ),
					'header-topbar-social'	=> esc_html__( 'Social', 'pixzlo-core' ),
					'header-topbar-search'	=> esc_html__( 'Search', 'pixzlo-core' ),
					'header-topbar-ads-list'    => esc_html__( 'Ads', 'pixzlo-core' ),
					'header-topbar-date' => esc_html__( 'Date', 'pixzlo-core' ),
					'header-phone'   		=> esc_html__( 'Phone Number', 'pixzlo-core' ),
					'header-address'  		=> esc_html__( 'Address Text', 'pixzlo-core' ),
					'header-email'   		=> esc_html__( 'Email', 'pixzlo-core' )
				),
				'Left'  => array(												
				),
				'Center' => array(
				),
				'Right' => array(
					
				)
			),
		),
	)
) );

//Header -> Header Logo Section
$header_logobar_skin = $acf->themeSkinSettings('header-logobar');
$sticky_header_logobar_skin = $acf->themeSkinSettings('sticky-header-logobar');
$header_logobar_ads = $acf->themeAdsList('header-logobar', 'logo bar');
Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Header Logo Section', 'pixzlo-core' ),
	'id'         => 'header-logobar',
	'desc'       => esc_html__( 'This is the setting for header logo section.', 'pixzlo-core' ),
	'subsection' => true,
	'fields'     => array(
		array(
			'id'       => 'header-logobar-height',
			'type'     => 'dimensions',
			'units'			=> array( 'px' ),
			'units_extended'=> 'false',
			'width'    => false,
			'title'    => esc_html__( 'Header Logo Section Height', 'pixzlo-core' ),
			'desc'     => esc_html__( 'Increase or decrease header logo section height.', 'pixzlo-core' ),
			'default'  => array(
				'height'  => 120,
				'units'=> 'px'
			),
		),
		array(
			'id'       => 'header-logobar-sticky-height',
			'type'     => 'dimensions',
			'units'			=> array( 'px' ),
			'units_extended'=> 'false',
			'width'    => false,
			'title'    => esc_html__( 'Header Logo Section Sticky Height', 'pixzlo-core' ),
			'desc'     => esc_html__( 'Increase or decrease header logo section sticky height.', 'pixzlo-core' ),
			'default'  => array(
				'height'  => 90,
				'units'=> 'px'
			),
		),
		array(
			'id'       => 'header-logobar-start',
			'type'     => 'section',
			'title'    => esc_html__( 'Header Logo Section Skin', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'This is individual skin settings for header logo section. Here you can set header logo section font color, link color, etc..', 'pixzlo-core' ),
			'indent'   => true, 
		),
		$header_logobar_skin[0],
		$header_logobar_skin[1],
		$header_logobar_skin[2],
		$header_logobar_skin[3],
		$header_logobar_skin[4],
		array(
			'id'     => 'header-logobar-end',
			'type'   => 'section',
			'indent' => false, 
		),
		array(
			'id'       => 'header-logobar-text-1',
			'type'     => 'text',
			'title'    => esc_html__( 'Custom Text 1', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'Custom text shows header logo section. Here, you can place shortcode.', 'pixzlo-core' )
		),
		array(
			'id'       => 'header-sticky-logobar-start',
			'type'     => 'section',
			'title'    => esc_html__( 'Sticky Header Logo Section Skin', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'This is individual skin settings for sticky header logo section. Here you can set sticky header logo section font color, link color, etc..', 'pixzlo-core' ),
			'indent'   => true, 
		),
		array(
			'id'       => 'sticky-header-logobar-color',
			'type'     => 'color',
			'title'    => __('Font Color', 'pixzlo-core'), 
			'subtitle' => __('Pick a font color for sticky header logo section.', 'pixzlo-core'),
			'validate' => 'color',
		),
		$sticky_header_logobar_skin[1],
		$sticky_header_logobar_skin[2],
		$sticky_header_logobar_skin[3],
		$sticky_header_logobar_skin[4],
		array(
			'id'     => 'header-sticky-logobar-end',
			'type'   => 'section',
			'indent' => false, 
		),
		array(
			'id'       => 'header-logobar-text-1',
			'type'     => 'text',
			'title'    => esc_html__( 'Custom Text 1', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'Custom text shows header logo section. Here, you can place shortcode.', 'pixzlo-core' )
		),
		array(
			'id'       => 'header-logobar-text-2',
			'type'     => 'text',
			'title'    => esc_html__( 'Custom Text 2', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'One more custom text shows header logo section. Here, you can place shortcode.', 'pixzlo-core' )
		),
		$header_logobar_ads,
		array(
			'id'      => 'header-logobar-items',
			'type'    => 'sorter',
			'title'   => esc_html__( 'Header Logo Section Items', 'pixzlo-core' ),
			'desc'    => esc_html__( 'Needed header logo section items drag from disabled and put enabled.', 'pixzlo-core' ),
			'options' => array(
				'disabled' => array(
					'header-logobar-text-1'	=> esc_html__( 'Custom Text 1', 'pixzlo-core' ),
					'header-logobar-text-2'	=> esc_html__( 'Custom Text 2', 'pixzlo-core' ),						
					'header-logobar-ads-list'    => esc_html__( 'Ads', 'pixzlo-core' ),
					'header-logobar-social'	=> esc_html__( 'Social', 'pixzlo-core' ),
					'header-logobar-search'	=> esc_html__( 'Search', 'pixzlo-core' ),
					'header-logobar-secondary-toggle'	=> esc_html__( 'Secondary Toggle', 'pixzlo-core' ),	
					'header-logobar-sticky-logo'	=> esc_html__( 'Sticky Logo', 'pixzlo-core' ),					
					'header-phone'   		=> esc_html__( 'Phone Number', 'pixzlo-core' ),
					'header-address'  		=> esc_html__( 'Address Text', 'pixzlo-core' ),
					'header-email'   		=> esc_html__( 'Email', 'pixzlo-core' )
				),
				'Left'  => array(
					'header-logobar-logo'	=> esc_html__( 'Logo', 'pixzlo-core' ),											
				),
				'Center' => array(
					
				),
				'Right' => array(
					'header-logobar-menu'    => esc_html__( 'Main Menu', 'pixzlo-core' ),
					'header-logobar-search-toggle'	=> esc_html__( 'Search Toggle', 'pixzlo-core' )						
				)
			),
		),
	)
) );

//Header -> Header Navbar
$header_navbar_skin = $acf->themeSkinSettings('header-navbar');
$sticky_header_navbar_skin = $acf->themeSkinSettings('sticky-header-navbar');
$header_navbar_ads = $acf->themeAdsList('header-navbar', 'navbar');
Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Header Navbar', 'pixzlo-core' ),
	'id'         => 'header-navbar',
	'desc'       => esc_html__( 'This is the setting for header navbar section.', 'pixzlo-core' ),
	'subsection' => true,
	'fields'     => array(
		array(
			'id'       => 'header-navbar-float',
			'type'     => 'switch',
			'title'    => esc_html__( 'Floating Navbar', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'Enable/Disable floating navbar.', 'pixzlo-core' ),
			'desc'     => esc_html__( 'This option only for default header not for absolute header', 'pixzlo-core' ),
			'default'  => 1,
			'on'       => esc_html__( 'Enabled', 'pixzlo-core' ),
			'off'      => esc_html__( 'Disabled', 'pixzlo-core' ),
		),
		array(
			'id'       => 'header-navbar-height',
			'type'     => 'dimensions',
			'units'			=> array( 'px' ),
			'units_extended'=> 'false',
			'width'    => false,
			'title'    => esc_html__( 'Header Navbar Height', 'pixzlo-core' ),
			'desc'     => esc_html__( 'Increase or decrease header Navbar height.', 'pixzlo-core' ),
			'default'  => array(
				'height'  => 137,
				'units'=> 'px'
			),
		),
		array(
			'id'       => 'header-navbar-sticky-height',
			'type'     => 'dimensions',
			'units'			=> array( 'px' ),
			'width'    => false,
			'title'    => esc_html__( 'Header Navbar Sticky Height', 'pixzlo-core' ),
			'desc'     => esc_html__( 'Increase or decrease header navbar stikcy height.', 'pixzlo-core' ),
			'default'  => array(
				'height'  => 82,
				'units'=> 'px'
			),
		),
		array(
			'id'       => 'header-navbar-start',
			'type'     => 'section',
			'title'    => esc_html__( 'Header Navbar Section Skin', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'This is individual skin settings for header navbar section. Here you can set header navbar font color, link color, etc..', 'pixzlo-core' ),
			'indent'   => true, 
		),
		$header_navbar_skin[0],
		$header_navbar_skin[1],
		$header_navbar_skin[2],
		$header_navbar_skin[3],
		$header_navbar_skin[4],
		array(
			'id'     => 'header-navbar-end',
			'type'   => 'section',
			'indent' => false, 
		),
		array(
			'id'       => 'header-sticky-navbar-start',
			'type'     => 'section',
			'title'    => esc_html__( 'Sticky Header Navbar Section Skin', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'This is individual skin settings for sticky header navbar section. Here you can set sticky header navbar section font color, link color, etc..', 'pixzlo-core' ),
			'indent'   => true, 
		),
		array(
			'id'       => 'sticky-header-navbar-color',
			'type'     => 'color',
			'title'    => __('Font Color', 'pixzlo-core'), 
			'subtitle' => __('Pick a font color for sticky header navbar section.', 'pixzlo-core'),
			'validate' => 'color',
		),
		$sticky_header_navbar_skin[1],
		$sticky_header_navbar_skin[2],
		$sticky_header_navbar_skin[3],
		$sticky_header_navbar_skin[4],
		array(
			'id'     => 'header-sticky-navbar-end',
			'type'   => 'section',
			'indent' => false, 
		),
		array(
			'id'       => 'header-navbar-text-1',
			'type'     => 'text',
			'title'    => esc_html__( 'Custom Text 1', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'Custom text shows header navbar section. Here, you can place shortcode.', 'pixzlo-core' )
		),
		array(
			'id'       => 'header-navbar-text-2',
			'type'     => 'text',
			'title'    => esc_html__( 'Custom Text 2', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'One more custom text shows header navbar section. Here, you can place shortcode.', 'pixzlo-core' )
		),
		$header_navbar_ads,
		array(
			'id'      => 'header-navbar-items',
			'type'    => 'sorter',
			'title'   => esc_html__( 'Header Navbar Section Items', 'pixzlo-core' ),
			'desc'    => esc_html__( 'Needed header navbar section items drag from disabled and put enabled.', 'pixzlo-core' ),
			'options' => array(
				'disabled' => array(
					'header-navbar-menu'    => esc_html__( 'Main Menu', 'pixzlo-core' ),
					'header-navbar-text-1'	=> esc_html__( 'Custom Text 1', 'pixzlo-core' ),
					'header-navbar-text-2'	=> esc_html__( 'Custom Text 2', 'pixzlo-core' ),
					'header-navbar-logo'	=> esc_html__( 'Logo', 'pixzlo-core' ),
					'header-navbar-search-toggle'	=> esc_html__( 'Search Toggle', 'pixzlo-core' ),
					'header-navbar-social'	=> esc_html__( 'Social', 'pixzlo-core' ),
					'header-navbar-secondary-toggle'	=> esc_html__( 'Secondary Toggle', 'pixzlo-core' ),
					'header-navbar-sticky-logo'	=> esc_html__( 'Sticky Logo', 'pixzlo-core' ),
					'header-navbar-search'	=> esc_html__( 'Search', 'pixzlo-core' ),
					'header-navbar-ads-list'    => esc_html__( 'Ads', 'pixzlo-core' ),
					'header-phone'   		=> esc_html__( 'Phone Number', 'pixzlo-core' ),
					'header-address'  		=> esc_html__( 'Address Text', 'pixzlo-core' ),
					'header-email'   		=> esc_html__( 'Email', 'pixzlo-core' ),
					'header-cart'   		=> esc_html__( 'Cart', 'pixzlo-core' )
				),
				'Left'  => array(						
				),
				'Center' => array(
				),
				'Right' => array(						
				)
			),
		),
	)
) );

//Header -> Header Left
$header_left_skin = $acf->themeSkinSettings('header-fixed');
Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Header Sticky/Fixed', 'pixzlo-core' ),
	'id'         => 'header-fixed',
	'desc'       => esc_html__( 'This is the setting for fixed header left/right in body.', 'pixzlo-core' ),
	'subsection' => true,
	'fields'     => array(
		array(
			'id'       => 'header-fixed-width',
			'type'     => 'dimensions',
			'units'		=> array( 'px' ),
			'units_extended'=> 'false',
			'height'    => false,
			'title'    => esc_html__( 'Sticky Header Width', 'pixzlo-core' ),
			'desc'     => esc_html__( 'Increase or decrease left sticky header width.', 'pixzlo-core' ),
			'default'  => array(
				'width'  => 350,
				'units'=> 'px'
			)
		),
		array(
			'id'       => 'header-fixed-start',
			'type'     => 'section',
			'title'    => esc_html__( 'Sticky Header Skin', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'This is individual skin settings for sticky header. Here you can set sticky header font color, link color, etc..', 'pixzlo-core' ),
			'indent'   => true, 
		),
		$header_left_skin[0],
		$header_left_skin[2],
		$header_left_skin[3],
		$header_left_skin[4],
		array(
			'id'       => 'header-fixed-background',
			'type'     => 'background',
			'title'    => esc_html__( 'Background', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'This is settings for sticky header background.', 'pixzlo-core' ),
			'default'   => '',
		),
		array(
			'id'     => 'header-fixed-end',
			'type'   => 'section',
			'indent' => false, 
		),
		array(
			'id'       => 'header-fixed-text-1',
			'type'     => 'text',
			'title'    => esc_html__( 'Custom Text 1', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'Custom text shows on sticky header. Here, you can place shortcode.', 'pixzlo-core' )
		),
		array(
			'id'       => 'header-fixed-text-2',
			'type'     => 'text',
			'title'    => esc_html__( 'Custom Text 2', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'One more custom text shows on sticky header. Here, you can place shortcode.', 'pixzlo-core' )
		),
		array(
			'id'      => 'header-fixed-items',
			'type'    => 'sorter',
			'title'   => esc_html__( 'Sticky/Fixed Header Items', 'pixzlo-core' ),
			'desc'    => esc_html__( 'Needed stciky header items drag from disabled and put enabled.', 'pixzlo-core' ),
			'options' => array(
				'disabled' => array(
					'header-fixed-text-1'	=> esc_html__( 'Custom Text 1', 'pixzlo-core' ),
					'header-fixed-text-2'	=> esc_html__( 'Custom Text 2', 'pixzlo-core' ),
					'header-fixed-search'	=> esc_html__( 'Search Form', 'pixzlo-core' ),
					'header-fixed-logo' => esc_html__( 'Logo', 'pixzlo-core' ),
					'header-fixed-menu'	=> esc_html__( 'Menu', 'pixzlo-core' ),
					'header-fixed-social'	=> esc_html__( 'Social', 'pixzlo-core' )
				),
				'Top'  => array(						
				),
				'Middle'  => array(											
				),
				'Bottom'  => array(											
				)
			),
		),
	)
) );

//Header -> Mobile Menu Space
$mobile_menu_skin = $acf->themeSkinSettings('mobile-menu');
Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Mobile Menu', 'pixzlo-core' ),
	'id'         => 'mobile-menu',
	'desc'       => esc_html__( 'This is the setting for mobile menu', 'pixzlo-core' ),
	'subsection' => true,
	'fields'     => array(
		array(
			'id'       => 'mobile-header-start',
			'type'     => 'section',
			'title'    => esc_html__( 'Mobile Header Settings', 'pixzlo-core' ),
			'indent'   => true, 
		),
		array(
			'id'       => 'mobile-header-from',
			'type'     => 'select',
			'title'    => esc_html__( 'Mobile Header From', 'pixzlo-core' ),
			'desc' => esc_html__( 'Choose your mobile header shows from tablet, tablet landscape or mobile', 'pixzlo-core' ),
			'options'  => array(
				'mobile' => esc_html__( 'Mobile', 'pixzlo-core' ),
				'tab-port' => esc_html__( 'Tablet (portrait)', 'pixzlo-core' ),
				'tab-land' => esc_html__( 'Tablet (landscape)', 'pixzlo-core' ),
			),
			'default'  => 'tab-land'
		),
		array(
			'id'       => 'mobile-header-height',
			'type'     => 'dimensions',
			'units'		=> array( 'px' ),
			'units_extended'=> 'false',
			'width'    => false,
			'title'    => esc_html__( 'Mobile Header Height', 'pixzlo-core' ),
			'desc'     => esc_html__( 'Increase or decrease mobile header width.', 'pixzlo-core' ),
			'default'  => array(
				'height'  => 80,
				'units'=> 'px'
			)
		),
		array(
			'id'       => 'mobile-header-background',
			'type'     => 'color_rgba',
			'title'    => esc_html__( 'Background', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'Choose mobile header background color.', 'pixzlo-core' ),
			'default'  => array(
				'color' => '#ffffff',
				'alpha' => ''
			),
			'mode'     => 'background',
		),
		array(
			'id'       => 'mobile-header-link-color',
			'type'     => 'link_color',
			'title'    => esc_html__( 'Links Color', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'Choose mobile header link color options.', 'pixzlo-core' ),
			'default'  => array(
				'regular' => '#11caff',
				'hover'   => '#11caff',
				'active'  => '#11caff',
			)
		),
		array(
			'id'       => 'mobile-header-sticky',
			'type'     => 'switch',
			'title'    => esc_html__( 'Mobile Header Sticky', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'Enable/Disable this option to sticky mobile header.', 'pixzlo-core' ),
			'default'  => 0,
			'on'       => esc_html__( 'Enabled', 'pixzlo-core' ),
			'off'      => esc_html__( 'Disabled', 'pixzlo-core' ),
		),
		array(
			'id'       => 'mobile-header-sticky-scrollup',
			'type'     => 'switch',
			'title'    => esc_html__( 'Sticky Scroll Up', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'Enable/Disable this option to sticky mobile header only scroll up.', 'pixzlo-core' ),
			'default'  => 0,
			'on'       => esc_html__( 'Enabled', 'pixzlo-core' ),
			'off'      => esc_html__( 'Disabled', 'pixzlo-core' ),
			'required' 		=> array('mobile-header-sticky', '!=', 0)
		),
		array(
			'id'       => 'mobile-header-sticky-height',
			'type'     => 'dimensions',
			'units'		=> array( 'px' ),
			'units_extended'=> 'false',
			'width'    => false,
			'title'    => esc_html__( 'Mobile Header Sticky Height', 'pixzlo-core' ),
			'desc'     => esc_html__( 'Increase or decrease mobile header sticky height.', 'pixzlo-core' ),
			'default'  => array(
				'height'  => 60,
				'units'=> 'px'
			),
			'required' 		=> array('mobile-header-sticky', '!=', 0)
		),
		array(
			'id'       => 'mobile-header-sticky-background',
			'type'     => 'color_rgba',
			'title'    => esc_html__( 'Sticky Background', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'Choose mobile header sticky background color.', 'pixzlo-core' ),
			'default'  => array(
				'color' => '',
				'alpha' => ''
			),
			'mode'     => 'background',
			'required' 		=> array('mobile-header-sticky', '!=', 0)
		),
		array(
			'id'       => 'mobile-header-sticky-link-color',
			'type'     => 'link_color',
			'title'    => esc_html__( 'Sticky Links Color', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'Choose mobile header sticky link color options.', 'pixzlo-core' ),
			'default'  => array(
				'regular' => '',
				'hover'   => '',
				'active'  => '',
			),
			'required' 		=> array('mobile-header-sticky', '!=', 0)
		),
		array(
			'id'      => 'mobile-header-items',
			'type'    => 'sorter',
			'title'   => esc_html__( 'Mobile Header Items', 'pixzlo-core' ),
			'desc'    => esc_html__( 'Needed mobile header items drag from disabled and put enabled parts like left, center or right.', 'pixzlo-core' ),
			'options' => array(
				'disabled' => array(
					'mobile-header-cart'	=> esc_html__( 'Cart Icon', 'pixzlo-core' ),
					'mobile-header-search'	=> esc_html__( 'Search Icon', 'pixzlo-core' )
				),
				'Left'  => array(
					'mobile-header-logo' => esc_html__( 'Logo', 'pixzlo-core' )		
				),
				'Center'  => array(
					
				),
				'Right'  => array(
					'mobile-header-menu'	=> esc_html__( 'Menu Icon', 'pixzlo-core' )
				)
			),
		),
		array(
			'id'     => 'mobile-header-end',
			'type'   => 'section',
			'indent' => false, 
		),
		array(
			'id'       => 'mobile-menu-start',
			'type'     => 'section',
			'title'    => esc_html__( 'Mobile Menu Skin', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'This is individual skin settings for mobile menu area. Here you can set mobile menu space font color, link color, etc..', 'pixzlo-core' ),
			'indent'   => true, 
		),
		array(
			'id'       => 'mobile-menu-max-width',
			'type'     => 'dimensions',
			'units'		=> array( 'px' ),
			'units_extended'=> 'false',
			'height'    => false,
			'title'    => esc_html__( 'Mobile Menu Max Width', 'pixzlo-core' ),
			'desc'     => esc_html__( 'Increase or decrease mobile menu maximum width. If you need full width means just leave this empty.', 'pixzlo-core' ),
			'default'  => array(
				'width'  => '',
				'units'=> 'px'
			)
		),
		$mobile_menu_skin[0],
		$mobile_menu_skin[2],
		$mobile_menu_skin[3],
		$mobile_menu_skin[4],
		array(
			'id'       => 'mobile-menu-background',
			'type'     => 'background',
			'title'    => esc_html__( 'Background', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'This is settings for mobile menu background.', 'pixzlo-core' ),
			'default'   => '',
		),
		array(
			'id'       => 'mobile-menu-animate-from',
			'type'     => 'select',
			'title'    => esc_html__( 'Mobile Header Animate From', 'pixzlo-core' ),
			'desc' => esc_html__( 'Choose your mobile header animate from left, right, top or bottom.', 'pixzlo-core' ),
			'options'  => array(
				'left' => esc_html__( 'Left', 'pixzlo-core' ),
				'right' => esc_html__( 'Right', 'pixzlo-core' ),
				'top' => esc_html__( 'Top', 'pixzlo-core' ),
				'bottom' => esc_html__( 'Bottom', 'pixzlo-core' ),
			),
			'default'  => 'left'
		),
		array(
			'id'     => 'mobile-menu-end',
			'type'   => 'section',
			'indent' => false, 
		),
		array(
			'id'       => 'mobile-menu-text-1',
			'type'     => 'text',
			'title'    => esc_html__( 'Custom Text 1', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'Custom text shows on mobile menu space. Here, you can place shortcode.', 'pixzlo-core' )
		),
		array(
			'id'       => 'mobile-menu-text-2',
			'type'     => 'text',
			'title'    => esc_html__( 'Custom Text 2', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'One more custom text shows on mobile menu space. Here, you can place shortcode.', 'pixzlo-core' )
		),
		array(
			'id'      => 'mobile-menu-items',
			'type'    => 'sorter',
			'title'   => esc_html__( 'Mobile Menu Items', 'pixzlo-core' ),
			'desc'    => esc_html__( 'Needed mobile menu items drag from disabled and put enabled.', 'pixzlo-core' ),
			'options' => array(
				'disabled' => array(
					'mobile-menu-text-2'	=> esc_html__( 'Custom Text 2', 'pixzlo-core' ),
					'mobile-menu-search'	=> esc_html__( 'Search Form', 'pixzlo-core' ),
					'mobile-menu-social'	=> esc_html__( 'Social', 'pixzlo-core' )
				),
				'Top'  => array(
					
				),
				'Middle'  => array(
					'mobile-menu-logo' => esc_html__( 'Logo', 'pixzlo-core' ),
					'mobile-menu-mainmenu'	=> esc_html__( 'Menu', 'pixzlo-core' ),
					'mobile-menu-text-1'	=> esc_html__( 'Custom Text 1', 'pixzlo-core' )
				),
				'Bottom'  => array(						
				)
			),
		),
	)
) );

//Footer Tab
Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'Footer', 'pixzlo-core' ),
	'id'               => 'footer',
	'desc'             => esc_html__( 'These are footer general settings of pixzlo theme', 'pixzlo-core' ),
	'customizer_width' => '400px',
	'icon'             => 'fa fa-credit-card'
) );

//Footer -> Footer General
$footer_skin = $acf->themeSkinSettings('footer');
$footer_ads = $acf->themeAdsList('footer', 'footer');
Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Footer General', 'pixzlo-core' ),
	'id'         => 'footer-general',
	'desc'       => esc_html__( 'This is the setting for Footer General', 'pixzlo-core' ),
	'subsection' => true,
	'fields'     => array(
		array(
			'id'       => 'footer-layout',
			'type'     => 'button_set',
			'title'    => esc_html__( 'Footer Layout', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'Choose footer layout boxed or wide.', 'pixzlo-core' ),
			'options' => array(
				'boxed' => esc_html__( 'Boxed', 'pixzlo-core' ),
				'wide'  => esc_html__( 'Wide', 'pixzlo-core' ),
			),
			'default'  => 'wide',
			'required' 		=> array('page-layout', '=', 'wide')
		),
		array(
			'id'       => 'back-to-top',
			'type'     => 'switch',
			'title'    => esc_html__( 'Back To Top', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'Enable/Disable back to top icon.', 'pixzlo-core' ),
			'default'  => 1,
			'on'       => esc_html__( 'Enabled', 'pixzlo-core' ),
			'off'      => esc_html__( 'Disabled', 'pixzlo-core' ),
		),
		array(
			'id'       => 'hidden-footer',
			'type'     => 'switch',
			'title'    => esc_html__( 'Hidden Footer', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'Enable/Disable hidden footer.', 'pixzlo-core' ),
			'default'  => 0,
			'on'       => esc_html__( 'Enabled', 'pixzlo-core' ),
			'off'      => esc_html__( 'Disabled', 'pixzlo-core' ),
		),
		array(
			'id'       => 'footer-settings-start',
			'type'     => 'section',
			'title'    => esc_html__( 'Footer Skin', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'This is individual skin settings for footer. Here you can set footer font color, link color, etc..', 'pixzlo-core' ),
			'indent'   => true, 
		),
		$footer_skin[0],
		$footer_skin[2],
		$footer_skin[3],
		$footer_skin[4],
		array(
			'id'       => 'footer-background',
			'type'     => 'background',
			'title'    => esc_html__( 'Background', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'This is settings for footer background.', 'pixzlo-core' ),
			'default'   => '',
		),
		array(
			'id'       => 'footer-background-overlay',
			'type'     => 'color_rgba',
			'title'    => esc_html__( 'Background Overlay', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'Choose background overlay color.', 'pixzlo-core' ),
			'default'  => array(
				'color' => '',
				'alpha' => ''
			),
			'mode'     => 'background',
		),
		array(
			'id'     => 'footer-settings-end',
			'type'   => 'section',
			'indent' => false, 
		),
		$footer_ads,
		array(
			'id'      => 'footer-items',
			'type'    => 'sorter',
			'title'   => esc_html__( 'Footer Items', 'pixzlo-core' ),
			'desc'    => esc_html__( 'Needed footer items drag from disabled and put enabled.', 'pixzlo-core' ),
			'options' => array(
				'Enabled'  => array(
					'footer-middle'	=> esc_html__( 'Footer Middle', 'pixzlo-core' ),
					'footer-bottom'	=> esc_html__( 'Footer Bottom', 'pixzlo-core' )
				),
				'disabled' => array(
					'footer-top' => esc_html__( 'Footer Top', 'pixzlo-core' )
				)
			),
		),
	)
) );

//Footer -> Footer Top
$footer_skin = $acf->themeSkinSettings('footer-top');
$footer_top_sidebars = $acf->themeSidebarsList( 'footer-top', array( 'title' => esc_html__( 'Footer Top Columns', 'pixzlo-core' ), 'default' => '4' ) );
Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Footer Top', 'pixzlo-core' ),
	'id'         => 'footer-top',
	'desc'       => esc_html__( 'This is the setting for footer top.', 'pixzlo-core' ),
	'subsection' => true,
	'fields'     => array(
		array(
			'id'       => 'footer-top-start',
			'type'     => 'section',
			'title'    => esc_html__( 'Footer Top Skin', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'This is individual skin settings for footer top. Here you can set footer top font color, link color, etc..', 'pixzlo-core' ),
			'indent'   => true, 
		),
		array(
			'id'       => 'footer-top-container',
			'type'     => 'button_set',
			'title'    => esc_html__( 'Footer Top Inner Layout', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'Choose footer top layout boxed or wide.', 'pixzlo-core' ),
			'options' => array(
				'boxed' => esc_html__( 'Boxed', 'pixzlo-core' ),
				'wide'  => esc_html__( 'Wide', 'pixzlo-core' ),
			),
			'default'  => 'boxed'
		),
		$footer_skin[0],
		$footer_skin[1],
		$footer_skin[2],
		$footer_skin[3],
		$footer_skin[4],
		$footer_skin[6],
		array(
			'id'       => 'footer-top-title-color',
			'type'     => 'color',
			'title'    => esc_html__( 'Widget Title Color', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'Choose footer top widgets title color.', 'pixzlo-core' ),
			'validate' => 'color'
		),
		array(
			'id'     => 'footer-top-end',
			'type'   => 'section',
			'indent' => false, 
		),
		array(
			'id'       => 'footer-sidebars-start',
			'type'     => 'section',
			'title'    => esc_html__( 'Footer Top Columns and Sidebars Settings', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'This is settings for footer top columns and sidebars. Choose number of columns and set needed widgets to selected sidebars.', 'pixzlo-core' ),
			'indent'   => true, 
		),
		$footer_top_sidebars[0],
		$footer_top_sidebars[1],
		$footer_top_sidebars[2],
		$footer_top_sidebars[3],
		$footer_top_sidebars[4],
		array(
			'id'     => 'footer-sidebars-end',
			'type'   => 'section',
			'indent' => false, 
		),
	)
) );

//Footer -> Footer Middle
$footer_skin = $acf->themeSkinSettings('footer-middle');
$footer_top_sidebars = $acf->themeSidebarsList( 'footer-middle', array( 'title' => esc_html__( 'Footer Middle Columns', 'pixzlo-core' ), 'default' => '12' ) );
Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Footer Middle', 'pixzlo-core' ),
	'id'         => 'footer-middle',
	'desc'       => esc_html__( 'This is the setting for footer middle.', 'pixzlo-core' ),
	'subsection' => true,
	'fields'     => array(
		array(
			'id'       => 'footer-middle-start',
			'type'     => 'section',
			'title'    => esc_html__( 'Footer Middle Skin', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'This is individual skin settings for footer middle. Here you can set footer middle font color, link color, etc..', 'pixzlo-core' ),
			'indent'   => true, 
		),
		array(
			'id'       => 'footer-middle-container',
			'type'     => 'button_set',
			'title'    => esc_html__( 'Footer Middle Inner Layout', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'Choose footer middle layout boxed or wide.', 'pixzlo-core' ),
			'options' => array(
				'boxed' => esc_html__( 'Boxed', 'pixzlo-core' ),
				'wide'  => esc_html__( 'Wide', 'pixzlo-core' ),
			),
			'default'  => 'boxed'
		),
		$footer_skin[0],
		$footer_skin[1],
		$footer_skin[2],
		$footer_skin[3],
		$footer_skin[4],
		$footer_skin[6],
		array(
			'id'       => 'footer-middle-title-color',
			'type'     => 'color',
			'title'    => esc_html__( 'Widget Title Color', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'Choose footer middle widgets title color.', 'pixzlo-core' ),
			'validate' => 'color'
		),
		array(
			'id'     => 'footer-middle-end',
			'type'   => 'section',
			'indent' => false, 
		),
		array(
			'id'       => 'footer-middle-sidebars-start',
			'type'     => 'section',
			'title'    => esc_html__( 'Footer Middle Columns and Sidebars Settings', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'This is settings for footer middle columns and sidebars. Choose number of columns and set needed widgets to selected sidebars.', 'pixzlo-core' ),
			'indent'   => true, 
		),
		$footer_top_sidebars[0],
		$footer_top_sidebars[1],
		$footer_top_sidebars[2],
		$footer_top_sidebars[3],
		$footer_top_sidebars[4],
		array(
			'id'     => 'footer-middle-sidebars-end',
			'type'   => 'section',
			'indent' => false, 
		),
	)
) );

//Footer -> Footer Bottom
$footer_skin = $acf->themeSkinSettings('footer-bottom');
$footer_top_sidebars = $acf->themeSidebarsList( 'footer-bottom', array( 'title' => esc_html__( 'Footer Bottom Columns', 'pixzlo-core' ), 'default' => '12' ) );
Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Footer Bottom', 'pixzlo-core' ),
	'id'         => 'footer-bottom',
	'desc'       => esc_html__( 'This is the setting for footer bottom.', 'pixzlo-core' ),
	'subsection' => true,
	'fields'     => array(
		array(
			'id'       => 'footer-bottom-container',
			'type'     => 'button_set',
			'title'    => esc_html__( 'Footer Bottom Inner Layout', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'Choose footer bottom layout boxed or wide.', 'pixzlo-core' ),
			'options' => array(
				'boxed' => esc_html__( 'Boxed', 'pixzlo-core' ),
				'wide'  => esc_html__( 'Wide', 'pixzlo-core' ),
			),
			'default'  => 'boxed'
		),
		array(
			'id'	=>'copyright-text',
			'type'	=> 'textarea',
			'title'	=> esc_html__( 'Copyright Text', 'pixzlo-core' ), 
			'desc'	=> esc_html__( 'This is the copyright text. Shown on footer bottom if enable footer bottom in footer items', 'pixzlo-core' ),
			'default'	=> '&copy; Copyright 2018. All Rights Reserved. Designed by <a href="http://zozothemes.com/">Zozo Themes</a>',
		),
		array(
			'id'       => 'footer-bottom-fixed',
			'type'     => 'switch',
			'title'    => esc_html__( 'Footer Bottom Fixed', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'Enable/Disable footer bottom to fixed at bottom of page.', 'pixzlo-core' ),
			'default'  => 0,
			'on'       => esc_html__( 'Enabled', 'pixzlo-core' ),
			'off'      => esc_html__( 'Disabled', 'pixzlo-core' ),
		),
		array(
			'id'       => 'footer-bottom-start',
			'type'     => 'section',
			'title'    => esc_html__( 'Footer Bottom Skin', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'This is individual skin settings for footer bottom. Here you can set footer bottom font color, link color, etc..', 'pixzlo-core' ),
			'indent'   => true, 
		),
		$footer_skin[0],
		$footer_skin[1],
		$footer_skin[2],
		$footer_skin[3],
		$footer_skin[4],
		$footer_skin[6],
		array(
			'id'       => 'footer-bottom-title-color',
			'type'     => 'color',
			'title'    => esc_html__( 'Widget Title Color', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'Choose footer bottom widgets title color.', 'pixzlo-core' ),
			'validate' => 'color'
		),
		array(
			'id'     => 'footer-bottom-end',
			'type'   => 'section',
			'indent' => false, 
		),
		array(
			'id'       => 'footer-bottom-widget',
			'type'     => 'select',
			'title'    => esc_html__( 'Footer Bottom Widget', 'pixzlo-core' ),
			'desc'     => esc_html__( 'Select widget area for showing on footer copyright section.', 'pixzlo-core' ),
			'data'     => 'sidebars',
		),
		array(
			'id'      => 'footer-bottom-items',
			'type'    => 'sorter',
			'title'   => esc_html__( 'Footer Bottom Items', 'pixzlo-core' ),
			'desc'    => esc_html__( 'Needed footer bottom items drag from disabled and put enabled.', 'pixzlo-core' ),
			'options' => array(
				'disabled' => array(
					'social'	=> esc_html__( 'Footer Social Links', 'pixzlo-core' ),
					'widget'	=> esc_html__( 'Custom Widget', 'pixzlo-core' )
				),
				'Left'  => array(
					'copyright' => esc_html__( 'Copyright Text', 'pixzlo-core' )
				),
				'Center'  => array(
				),
				'Right'  => array(
					'menu'	=> esc_html__( 'Footer Menu', 'pixzlo-core' )
				)
			),
		),
	)
) );

//Page Template
Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'Page Template', 'pixzlo-core' ),
	'id'               => 'template',
	'desc'             => esc_html__( 'These is the template settings for page.', 'pixzlo-core' ),
	'customizer_width' => '400px',
	'icon'             => 'fa fa-newspaper-o'
) );

//Templates -> Page
$template = 'page'; $template_cname = 'Page'; $template_sname = 'page';
$template_t = $acf->themeSkinSettings('template-'.$template);
$page_title_items = $acf->themePageTitleItems('template-'.$template);
$color = $acf->themeFontColor('template-'.$template);

Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Page Template', 'pixzlo-core' ),
	'id'         => 'template-page',
	'desc'       => esc_html__( 'This is the setting for page template', 'pixzlo-core' ),
	'subsection' => true,
	'fields'     => array(
		array(
			'id'       => $template.'-page-title-opt',
			'type'     => 'switch',
			'title'    => sprintf( esc_html__( '%1$s Title', 'pixzlo-core' ), $template_cname ),
			'subtitle' => sprintf( esc_html__( 'Enable/Disable %1$s page title.', 'pixzlo-core' ), $template_sname ),
			'default'  => 0,
			'on'       => esc_html__( 'Enabled', 'pixzlo-core' ),
			'off'      => esc_html__( 'Disabled', 'pixzlo-core' ),
		),
		array(
			'id'       => $template.'-pagetitle-settings-start',
			'type'     => 'section',
			'title'    => esc_html__( 'Page Title Settings', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'This is page title style settings for this template', 'pixzlo-core' ),
			'indent'   => true, 
			'required' 		=> array($template.'-page-title-opt', '=', 1)
		),
		$color[0],
		$template_t[2],
		$template_t[3],
		$template_t[4],
		$template_t[5],
		array(
			'id'       => $template.'-page-title-parallax',
			'type'     => 'switch',
			'title'    => esc_html__( 'Background Parallax', 'pixzlo-core' ),
			'subtitle' => sprintf( esc_html__( 'Enable/Disable %1$s page title background parallax.', 'pixzlo-core' ), $template_sname ),
			'default'  => 0,
			'on'       => esc_html__( 'Enabled', 'pixzlo-core' ),
			'off'      => esc_html__( 'Disabled', 'pixzlo-core' ),
		),
		array(
			'id'       => $template.'-page-title-bg',
			'type'     => 'switch',
			'title'    => esc_html__( 'Background Video', 'pixzlo-core' ),
			'subtitle' => sprintf( esc_html__( 'Enable/Disable %1$s page title background video.', 'pixzlo-core' ), $template_sname ),
			'default'  => 0,
			'on'       => esc_html__( 'Enabled', 'pixzlo-core' ),
			'off'      => esc_html__( 'Disabled', 'pixzlo-core' ),
		),
		array(
			'id'       => $template.'-page-title-video',
			'type'     => 'text',
			'title'    => sprintf( esc_html__( '%1$s Page Title Background Video', 'pixzlo-core' ), $template_cname ),
			'subtitle' => sprintf( esc_html__( 'Set page title background video for %1$s page. Only allowed youtube video id. Example: UWF7dZTLW4c', 'pixzlo-core' ), $template_sname ),
			'required' => array($template.'-page-title-bg', '=', 1),
			'default'  => ''
		),
		array(
			'id'       => $template.'-page-title-overlay',
			'type'     => 'color_rgba',
			'title'    => esc_html__( 'Page Title Overlay', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'Choose page title overlay rgba color.', 'pixzlo-core' ),
			'default'  => array(
				'color' => '',
				'alpha' => ''
			),
			'mode'     => 'background',
		),
		array(
			'id'		=> $template.'-page-desc',
			'type'		=> 'textarea',
			'title'		=> esc_html__( 'Page Description', 'pixzlo-core' ),
			'subtitle'	=> esc_html__( 'This is description for page. HTML code allowed here.', 'pixzlo-core' ),
			'default'	=> '',
		),
		array(
			'id'       => $template.'-float-video-option',
			'type'     => 'switch',
			'title'    => esc_html__( 'Float Video Option', 'pixzlo-core' ),
			'subtitle' => sprintf( esc_html__( 'Enable/Disable %1$s float video option.', 'pixzlo-core' ), $template_sname ),
			'default'  => 0,
			'on'       => esc_html__( 'Enabled', 'pixzlo-core' ),
			'off'      => esc_html__( 'Disabled', 'pixzlo-core' ),
		),
		array(
			'id'		=> $template.'-float-video',
			'type'		=> 'text',
			'title'		=> esc_html__( 'Float Video ID', 'pixzlo-core' ),
			'subtitle'	=> esc_html__( 'This is a option for floating video in page title bar. Only allowed youtube video id. Example: UWF7dZTLW4c', 'pixzlo-core' ),
			'required' => array($template.'-float-video-option', '=', 1),	
			'default'	=> '',
		),
		array(
			'id'		=> $template.'-float-video-title',
			'type'		=> 'textarea',
			'title'		=> esc_html__( 'Float Video Title', 'pixzlo-core' ),
			'subtitle'	=> esc_html__( 'This is a option for floating video in page title.', 'pixzlo-core' ),
			'required' => array($template.'-float-video-option', '=', 1),
			'default'	=> '',
		),
		$page_title_items[0],
		array(
			'id'     => $template.'-pagetitle-settings-end',
			'type'   => 'section',
			'indent' => false, 
		),
		array(
			'id'       => $template.'-settings-start',
			'type'     => 'section',
			'title'    => sprintf( esc_html__( '%1$s Settings', 'pixzlo-core' ), $template_cname ),
			'subtitle' => sprintf( esc_html__( 'This is settings for %1$s', 'pixzlo-core' ), $template_sname ),
			'indent'   => true
		),
		array(
			'id'       => $template.'-page-template',
			'type'     => 'image_select',
			'title'    => sprintf( esc_html__( '%1$s Template', 'pixzlo-core' ), $template_cname ),
			'desc'     => sprintf( esc_html__( 'Choose your current %1$s page template.', 'pixzlo-core' ), $template_sname ),
			'options'  => array(
				'no-sidebar' => array(
					'alt' => esc_html__( 'No Sidebar', 'pixzlo-core' ),
					'img' => get_template_directory_uri() . '/assets/images/page-layouts/1.png'
				),
				'right-sidebar' => array(
					'alt' => esc_html__( 'Right Sidebar', 'pixzlo-core' ),
					'img' => get_template_directory_uri() . '/assets/images/page-layouts/2.png'
				),
				'left-sidebar' => array(
					'alt' => esc_html__( 'Left Sidebar', 'pixzlo-core' ),
					'img' => get_template_directory_uri() . '/assets/images/page-layouts/3.png'
				),
				'both-sidebar' => array(
					'alt' => esc_html__( 'Both Sidebar', 'pixzlo-core' ),
					'img' => get_template_directory_uri() . '/assets/images/page-layouts/4.png'
				)
			),
			'default'  => 'right-sidebar'
		),
		array(
			'id'       => $template.'-left-sidebar',
			'type'     => 'select',
			'title'    => esc_html__( 'Choose Left Sidebar', 'pixzlo-core' ),
			'desc'     => sprintf( esc_html__( 'Select widget area for showing %1$s on left sidebar.', 'pixzlo-core' ), $template_sname ),
			'data'     => 'sidebars',
			'required' 		=> array($template.'-page-template', '=', array( 'left-sidebar', 'both-sidebar' ))
		),
		array(
			'id'       => $template.'-right-sidebar',
			'type'     => 'select',
			'title'    => esc_html__( 'Choose Right Sidebar', 'pixzlo-core' ),
			'desc'     => sprintf( esc_html__( 'Select widget area for showing %1$s on right sidebar.', 'pixzlo-core' ), $template_sname ),
			'data'     => 'sidebars',
			'default'  => 'sidebar-1',
			'required' 		=> array($template.'-page-template', '=', array( 'right-sidebar', 'both-sidebar' ))
		),
		array(
			'id'       => $template.'-sidebar-sticky',
			'type'     => 'switch',
			'title'    => esc_html__( 'Sidebar Sticky', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'Enable/Disable sidebar sticky.', 'pixzlo-core' ),
			'default'  => 1,
			'on'       => esc_html__( 'Enable', 'pixzlo-core' ),
			'off'      => esc_html__( 'Disable', 'pixzlo-core' ),
			'required' => array($template.'-page-template', '!=', 'no-sidebar')
		),
		array(
			'id'       => $template.'-page-hide-sidebar',
			'type'     => 'switch',
			'title'    => esc_html__( 'Sidebar on Mobile', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'Enable/Disable to show or hide sidebar on mobile.', 'pixzlo-core' ),
			'default'  => 1,
			'on'       => esc_html__( 'Show', 'pixzlo-core' ),
			'off'      => esc_html__( 'Hide', 'pixzlo-core' ),
			'required' => array($template.'-page-template', '!=', 'no-sidebar')
		),
		array(
			'id'     => $template.'-settings-end',
			'type'   => 'section',
			'indent' => false, 
		)
	)
) );

//Templates Tab
Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'Theme Templates', 'pixzlo-core' ),
	'id'               => 'templates',
	'desc'             => esc_html__( 'These are the template settings for theme like blog, archive, etc..', 'pixzlo-core' ),
	'customizer_width' => '400px',
	'icon'             => 'fa fa-th-large'
) );

//Templates -> General
$categories_array = $acf->themeCategories();	
Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Template General', 'pixzlo-core' ),
	'id'         => 'templates-general',
	'desc'       => esc_html__( 'This is the setting for template general', 'pixzlo-core' ),
	'subsection' => true,
	'fields'     => array(
		array(
			'id'       => 'theme-templates',
			'type'     => 'button_set',
			'title'    => esc_html__( 'Theme Templates', 'pixzlo-core' ),
			'desc'     => esc_html__( 'Active needed theme templates. Actived theme templates are show once save and refresh theme option page. Unselected templates choosing archive template if enabled archive otherwise choosing blog template for default layout.', 'pixzlo-core' ),
			'multi'    => true,
			'options' => array(
				'archive'	=> esc_html__( 'Archive', 'pixzlo-core' ),
				'category'	=> esc_html__( 'Category', 'pixzlo-core' ),
				'tag'		=> esc_html__( 'Tag', 'pixzlo-core' ),
				'search'	=> esc_html__( 'Search', 'pixzlo-core' ),
				'author'	=> esc_html__( 'Author', 'pixzlo-core' )
			),
			'default' => 'Archive',
		),
		array(
			'id'       => 'theme-categories',
			'type'     => 'button_set',
			'title'    => esc_html__( 'Theme Categories Template', 'pixzlo-core' ),
			'desc'     => esc_html__( 'Active needed category templates. Actived category templates are show once save and refresh theme option page. Unselected templates choosing order category/archive/blog template for default layout.', 'pixzlo-core' ),
			'multi'    => true,
			'options' => $categories_array
		),
		array(
			'id'       => 'search-content',
			'type'     => 'select',
			'title'    => esc_html__( 'Search Content', 'pixzlo-core' ),
			'desc'	   => esc_html__( 'Choose this option for search content from site.', 'pixzlo-core' ),
			'options'  => array(
				'all'	=> esc_html__( 'All', 'pixzlo-core' ),
				'post'	=> esc_html__( 'Post Content Only', 'pixzlo-core' ),
				'page'	=> esc_html__( 'Page Content Only', 'pixzlo-core' )
			),
			'default'  => 'post'
		),
	)
) );

//Templates -> Single Post
$template = 'single-post'; $template_cname = 'Single Post'; $template_sname = 'single post';
$template_t = $acf->themeSkinSettings('template-'.$template);
$template_article = $acf->themeSkinSettings($template.'-article');
$template_article_overlay = $acf->themeSkinSettings($template.'-article-overlay');
$page_title_items = $acf->themePageTitleItems('template-'.$template);
$color = $acf->themeFontColor('template-'.$template);
$template_article_color = $acf->themeFontColor($template.'-article');
$template_article_overlay_color = $acf->themeFontColor($template.'-article-overlay');
$overlay_margin = $acf->themeMarginFields( $template.'-article-overlay' );

$article_top_ads = $acf->themeAdsList('article-top', 'article top', 'Article Top');
$article_inline_ads = $acf->themeAdsList('article-inline', 'article inline', 'Article Inline');
$article_bottom_ads = $acf->themeAdsList('article-bottom', 'article bottom', 'Article Bottom');

Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Single Post Template', 'pixzlo-core' ),
	'id'         => 'templates-single-post',
	'desc'       => esc_html__( 'This is the setting for single post template', 'pixzlo-core' ),
	'subsection' => true,
	'fields'     => array(
		array(
			'id'       => $template.'-page-title-opt',
			'type'     => 'switch',
			'title'    => sprintf( esc_html__( '%1$s Page Title', 'pixzlo-core' ), $template_cname ),
			'subtitle' => sprintf( esc_html__( 'Enable/Disable %1$s page title.', 'pixzlo-core' ), $template_sname ),
			'default'  => 0,
			'on'       => esc_html__( 'Enabled', 'pixzlo-core' ),
			'off'      => esc_html__( 'Disabled', 'pixzlo-core' ),
		),
		array(
			'id'       => $template.'-pagetitle-settings-start',
			'type'     => 'section',
			'title'    => esc_html__( 'Page Title Settings', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'This is page title style settings for this template', 'pixzlo-core' ),
			'indent'   => true, 
			'required' 		=> array($template.'-page-title-opt', '=', 1)
		),
		$color[0],
		$template_t[2],
		$template_t[3],
		$template_t[4],
		$template_t[5],
		array(
			'id'       => $template.'-page-title-parallax',
			'type'     => 'switch',
			'title'    => esc_html__( 'Background Parallax', 'pixzlo-core' ),
			'subtitle' => sprintf( esc_html__( 'Enable/Disable %1$s page title background parallax.', 'pixzlo-core' ), $template_sname ),
			'default'  => 0,
			'on'       => esc_html__( 'Enabled', 'pixzlo-core' ),
			'off'      => esc_html__( 'Disabled', 'pixzlo-core' ),
		),
		array(
			'id'       => $template.'-page-title-bg',
			'type'     => 'switch',
			'title'    => esc_html__( 'Background Video', 'pixzlo-core' ),
			'subtitle' => sprintf( esc_html__( 'Enable/Disable %1$s page title background video.', 'pixzlo-core' ), $template_sname ),
			'default'  => 0,
			'on'       => esc_html__( 'Enabled', 'pixzlo-core' ),
			'off'      => esc_html__( 'Disabled', 'pixzlo-core' ),
		),
		array(
			'id'       => $template.'-page-title-video',
			'type'     => 'text',
			'title'    => sprintf( esc_html__( '%1$s Page Title Background Video', 'pixzlo-core' ), $template_cname ),
			'subtitle' => sprintf( esc_html__( 'Set page title background video for %1$s page. Only allowed youtube video id. Example: UWF7dZTLW4c', 'pixzlo-core' ), $template_sname ),
			'required' => array($template.'-page-title-bg', '=', 1),
			'default'  => ''
		),
		array(
			'id'       => $template.'-page-title-overlay',
			'type'     => 'color_rgba',
			'title'    => esc_html__( 'Page Title Overlay', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'Choose page title overlay rgba color.', 'pixzlo-core' ),
			'default'  => array(
				'color' => '',
				'alpha' => ''
			),
			'mode'     => 'background',
		),
		array(
			'id'       => $template.'-float-video-option',
			'type'     => 'switch',
			'title'    => esc_html__( 'Float Video Option', 'pixzlo-core' ),
			'subtitle' => sprintf( esc_html__( 'Enable/Disable %1$s float video option.', 'pixzlo-core' ), $template_sname ),
			'default'  => 0,
			'on'       => esc_html__( 'Enabled', 'pixzlo-core' ),
			'off'      => esc_html__( 'Disabled', 'pixzlo-core' ),
		),
		array(
			'id'		=> $template.'-float-video',
			'type'		=> 'text',
			'title'		=> esc_html__( 'Float Video ID', 'pixzlo-core' ),
			'subtitle'	=> esc_html__( 'This is a option for floating video in page title bar. Only allowed youtube video id. Example: UWF7dZTLW4c', 'pixzlo-core' ),
			'required' => array($template.'-float-video-option', '=', 1),	
			'default'	=> '',
		),
		array(
			'id'		=> $template.'-float-video-title',
			'type'		=> 'textarea',
			'title'		=> esc_html__( 'Float Video Title', 'pixzlo-core' ),
			'subtitle'	=> esc_html__( 'This is a option for floating video in page title.', 'pixzlo-core' ),
			'required' => array($template.'-float-video-option', '=', 1),
			'default'	=> '',
		),
		$page_title_items[0],
		array(
			'id'     => $template.'-pagetitle-settings-end',
			'type'   => 'section',
			'indent' => false, 
		),
		array(
			'id'       => $template.'-featured-slider',
			'type'     => 'switch',
			'title'    => sprintf( esc_html__( '%1$s Featured Slider', 'pixzlo-core' ), $template_cname ),
			'subtitle' => sprintf( esc_html__( 'Enable/Disable %1$s featured slider.', 'pixzlo-core' ), $template_sname ),
			'default'  => 0,
			'on'       => esc_html__( 'Enable', 'pixzlo-core' ),
			'off'      => esc_html__( 'Disable', 'pixzlo-core' ),
		),
		array(
			'id'       => $template.'-article-settings-start',
			'type'     => 'section',
			'title'    => esc_html__( 'Article Skin', 'pixzlo-core' ),
			'subtitle' => sprintf( esc_html__( 'This is skin settings for each %1$s article', 'pixzlo-core' ), $template_sname ),
			'indent'   => true
		),
		$template_article_color[0],
		$template_article[2],
		$template_article[3],
		$template_article[4],
		$template_article[1],
		array(
			'id'     => $template.'-article-settings-end',
			'type'   => 'section',
			'indent' => false, 
		),
		array(
			'id'       => $template.'-article-overlay-settings-start',
			'type'     => 'section',
			'title'    => esc_html__( 'Article Overlay Skin', 'pixzlo-core' ),
			'subtitle' => sprintf( esc_html__( 'This is skin settings for each %1$s article overlay.', 'pixzlo-core' ), $template_sname ),
			'indent'   => true,
		),
		$template_article_overlay_color[0],
		$template_article_overlay[2],
		$template_article_overlay[3],
		$template_article_overlay[4],
		$overlay_margin,
		$template_article_overlay[1],
		array(
			'id'     => $template.'-article-overlay-settings-end',
			'type'   => 'section',
			'indent' => false, 
		),
		array(
			'id'       => $template.'-post-formats-start',
			'type'     => 'section',
			'title'    => esc_html__( 'Post Format Settings', 'pixzlo-core' ),
			'subtitle' => sprintf( esc_html__( 'This is post format settings for %1$s', 'pixzlo-core' ), $template_sname ),
			'indent'   => true
		),
		array(
			'id'       => $template.'-video-format',
			'type'     => 'select',
			'title'    => esc_html__( 'Video Format', 'pixzlo-core' ),
			'desc'	   => sprintf( esc_html__( 'Choose %1$s page video post format settings.', 'pixzlo-core' ), $template_sname ),
			'options'  => array(
				'onclick' => esc_html__( 'On Click Run Video', 'pixzlo-core' ),
				'overlay' => esc_html__( 'Modal Box Video', 'pixzlo-core' ),
				'direct' => esc_html__( 'Direct Video', 'pixzlo-core' )
			),
			'default'  => 'onclick'
		),
		array(
			'id'       => $template.'-quote-format',
			'type'     => 'select',
			'title'    => esc_html__( 'Quote Format', 'pixzlo-core' ),
			'desc'     => sprintf( esc_html__( 'Choose %1$s page quote post format settings.', 'pixzlo-core' ), $template_sname ),
			'options'  => array(
				'featured' => esc_html__( 'Dark Overlay', 'pixzlo-core' ),
				'theme-overlay' => esc_html__( 'Theme Overlay', 'pixzlo-core' ),
				'theme' => esc_html__( 'Theme Color Background', 'pixzlo-core' ),
				'none' => esc_html__( 'None', 'pixzlo-core' )
			),
			'default'  => 'featured'
		),
		array(
			'id'       => $template.'-link-format',
			'type'     => 'select',
			'title'    => esc_html__( 'Link Format', 'pixzlo-core' ),
			'desc'     => sprintf( esc_html__( 'Choose %1$s page link post format settings.', 'pixzlo-core' ), $template_sname ),
			'options'  => array(
				'featured' => esc_html__( 'Dark Overlay', 'pixzlo-core' ),
				'theme-overlay' => esc_html__( 'Theme Overlay', 'pixzlo-core' ),
				'theme' => esc_html__( 'Theme Color Background', 'pixzlo-core' ),
				'none' => esc_html__( 'None', 'pixzlo-core' )
			),
			'default'  => 'featured'
		),
		array(
			'id'       => $template.'-gallery-format',
			'type'     => 'select',
			'title'    => esc_html__( 'Gallery Format', 'pixzlo-core' ),
			'desc'     => sprintf( esc_html__( 'Choose %1$s page gallery post format settings.', 'pixzlo-core' ), $template_sname ),
			'options'  => array(
				'default' => esc_html__( 'Default Gallery', 'pixzlo-core' ),
				'popup' => esc_html__( 'Popup Gallery', 'pixzlo-core' ),
				'grid' => esc_html__( 'Grid Popup Gallery', 'pixzlo-core' )
			),
			'default'  => 'default'
		),
		array(
			'id'     => $template.'-post-formats-end',
			'type'   => 'section',
			'indent' => false, 
		),
		array(
			'id'       => $template.'-settings-start',
			'type'     => 'section',
			'title'    => sprintf( esc_html__( '%1$s Settings', 'pixzlo-core' ), $template_cname ),
			'subtitle' => sprintf( esc_html__( 'This is settings for %1$s', 'pixzlo-core' ), $template_sname ),
			'indent'   => true
		),
		array(
			'id'       => $template.'-page-template',
			'type'     => 'image_select',
			'title'    => sprintf( esc_html__( '%1$s Template', 'pixzlo-core' ), $template_cname ),
			'desc'     => sprintf( esc_html__( 'Choose your current %1$s page template.', 'pixzlo-core' ), $template_sname ),
			'options'  => array(
				'no-sidebar' => array(
					'alt' => esc_html__( 'No Sidebar', 'pixzlo-core' ),
					'img' => get_template_directory_uri() . '/assets/images/page-layouts/1.png'
				),
				'right-sidebar' => array(
					'alt' => esc_html__( 'Right Sidebar', 'pixzlo-core' ),
					'img' => get_template_directory_uri() . '/assets/images/page-layouts/2.png'
				),
				'left-sidebar' => array(
					'alt' => esc_html__( 'Left Sidebar', 'pixzlo-core' ),
					'img' => get_template_directory_uri() . '/assets/images/page-layouts/3.png'
				),
				'both-sidebar' => array(
					'alt' => esc_html__( 'Both Sidebar', 'pixzlo-core' ),
					'img' => get_template_directory_uri() . '/assets/images/page-layouts/4.png'
				)
			),
			'default'  => 'right-sidebar'
		),
		array(
			'id'       => $template.'-left-sidebar',
			'type'     => 'select',
			'title'    => esc_html__( 'Choose Left Sidebar', 'pixzlo-core' ),
			'desc'     => sprintf( esc_html__( 'Select widget area for showing %1$s page on left sidebar.', 'pixzlo-core' ), $template_sname ),
			'data'     => 'sidebars',
			'required' 		=> array($template.'-page-template', '=', array( 'left-sidebar', 'both-sidebar' ))
		),
		array(
			'id'       => $template.'-right-sidebar',
			'type'     => 'select',
			'title'    => esc_html__( 'Choose Right Sidebar', 'pixzlo-core' ),
			'desc'     => sprintf( esc_html__( 'Select widget area for showing %1$s page on right sidebar.', 'pixzlo-core' ), $template_sname ),
			'data'     => 'sidebars',
			'default'  => 'sidebar-1',
			'required' 		=> array($template.'-page-template', '=', array( 'right-sidebar', 'both-sidebar' ))
		),
		array(
			'id'       => $template.'-sidebar-sticky',
			'type'     => 'switch',
			'title'    => esc_html__( 'Sidebar Sticky', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'Enable/Disable sidebar sticky.', 'pixzlo-core' ),
			'default'  => 0,
			'on'       => esc_html__( 'Enable', 'pixzlo-core' ),
			'off'      => esc_html__( 'Disable', 'pixzlo-core' ),
			'required' => array($template.'-page-template', '!=', 'no-sidebar')
		),
		array(
			'id'       => $template.'-page-hide-sidebar',
			'type'     => 'switch',
			'title'    => esc_html__( 'Sidebar on Mobile', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'Enable/Disable to show or hide sidebar on mobile.', 'pixzlo-core' ),
			'default'  => 1,
			'on'       => esc_html__( 'Show', 'pixzlo-core' ),
			'off'      => esc_html__( 'Hide', 'pixzlo-core' ),
			'required' => array($template.'-page-template', '!=', 'no-sidebar')
		),
		array(
			'id'       => $template.'-full-wrap',
			'type'     => 'switch',
			'title'    => esc_html__( 'Full Width Wrap', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'Enable/Disable to show or hide full width post wrapper.', 'pixzlo-core' ),
			'default'  => 0,
			'on'       => esc_html__( 'Show', 'pixzlo-core' ),
			'off'      => esc_html__( 'Hide', 'pixzlo-core' )
		),
		$article_top_ads,
		$article_inline_ads,
		$article_bottom_ads,
		array(
			'id'      => $template.'-topmeta-items',
			'type'    => 'sorter',
			'title'   => sprintf( esc_html__( '%1$s Top Meta Items', 'pixzlo-core' ), $template_cname ),
			'desc'    => sprintf( esc_html__( 'Needed %1$s top meta items drag from disabled and put enabled part. ie: Left or Right.', 'pixzlo-core' ), $template_sname ),
			'options' => array(
				'Left'  => array(
					'author'	=> esc_html__( 'Author', 'pixzlo-core' )						
				),
				'Right'  => array(
					'date'	=> esc_html__( 'Date', 'pixzlo-core' )
				),
				'disabled' => array(
					'social'	=> esc_html__( 'Social Share', 'pixzlo-core' ),						
					'likes'	=> esc_html__( 'Likes', 'pixzlo-core' ),
					'author'	=> esc_html__( 'Author', 'pixzlo-core' ),
					'views'	=> esc_html__( 'Views', 'pixzlo-core' ),
					'tag'	=> esc_html__( 'Tags', 'pixzlo-core' ),
					'favourite'	=> esc_html__( 'Favourite', 'pixzlo-core' ),						
					'comments'	=> esc_html__( 'Comments', 'pixzlo-core' ),
					'category'	=> esc_html__( 'Category', 'pixzlo-core' )
				)
			),
		),
		array(
			'id'      => $template.'-bottommeta-items',
			'type'    => 'sorter',
			'title'   => sprintf( esc_html__( '%1$s Bottom Meta Items', 'pixzlo-core' ), $template_cname ),
			'desc'    => sprintf( esc_html__( 'Needed %1$s bottom meta items drag from disabled and put enabled part. ie: Left or Right.', 'pixzlo-core' ), $template_sname ),
			'options' => array(
				'Left'  => array(
					'category'	=> esc_html__( 'Category', 'pixzlo-core' ),
				),
				'Right'  => array(						
				),
				'disabled' => array(
					'social'	=> esc_html__( 'Social Share', 'pixzlo-core' ),
					'date'	=> esc_html__( 'Date', 'pixzlo-core' ),						
					'social'	=> esc_html__( 'Social Share', 'pixzlo-core' ),						
					'likes'	=> esc_html__( 'Likes', 'pixzlo-core' ),
					'author'	=> esc_html__( 'Author', 'pixzlo-core' ),
					'views'	=> esc_html__( 'Views', 'pixzlo-core' ),
					'favourite'	=> esc_html__( 'Favourite', 'pixzlo-core' ),
					'comments'	=> esc_html__( 'Comments', 'pixzlo-core' ),
					'tag'	=> esc_html__( 'Tags', 'pixzlo-core' )
				)
			),
		),
		array(
			'id'      => $template.'-items',
			'type'    => 'sorter',
			'title'   => sprintf( esc_html__( '%1$s Items', 'pixzlo-core' ), $template_cname ),
			'desc'    => sprintf( esc_html__( 'Needed %1$s items drag from disabled and put enabled part.', 'pixzlo-core' ), $template_sname ),
			'options' => array(
				'Enabled'  => array(
					'title'	=> esc_html__( 'Title', 'pixzlo-core' ),
					'top-meta'	=> esc_html__( 'Top Meta', 'pixzlo-core' ),
					'thumb'	=> esc_html__( 'Thumbnail', 'pixzlo-core' ),
					'content'	=> esc_html__( 'Content', 'pixzlo-core' ),
					'bottom-meta'	=> esc_html__( 'Bottom Meta', 'pixzlo-core' ),
				),
				'disabled' => array(
					
				)
			),
		),
		array(
			'id'       => $template.'-overlay-opt',
			'type'     => 'switch',
			'title'    => sprintf( esc_html__( '%1$s Overlay', 'pixzlo-core' ), $template_cname ),
			'subtitle' => sprintf( esc_html__( 'Enable/Disable %1$s post overlay.', 'pixzlo-core' ), $template_sname ),
			'default'  => 0,
			'on'       => esc_html__( 'Enabled', 'pixzlo-core' ),
			'off'      => esc_html__( 'Disabled', 'pixzlo-core' ),
		),
		array(
			'id'      => $template.'-overlay-items',
			'type'    => 'sorter',
			'title'   => sprintf( esc_html__( '%1$s Overlay Items', 'pixzlo-core' ), $template_cname ),
			'desc'    => sprintf( esc_html__( 'Needed %1$s overlay items drag from disabled and put enabled part.', 'pixzlo-core' ), $template_sname ),
			'options' => array(
				'Enabled'  => array(
					'title'	=> esc_html__( 'Title', 'pixzlo-core' ),
				),
				'disabled' => array(
					'top-meta'	=> esc_html__( 'Top Meta', 'pixzlo-core' ),
					'bottom-meta'	=> esc_html__( 'Bottom Meta', 'pixzlo-core' )
				)
			),
			'required' 		=> array($template.'-overlay-opt', '=', 1)
		),
		array(
			'id'      => $template.'-page-items',
			'type'    => 'sorter',
			'title'   => sprintf( esc_html__( '%1$s Page Items', 'pixzlo-core' ), $template_cname ),
			'desc'    => sprintf( esc_html__( 'Needed %1$s items drag from disabled and put enabled part.', 'pixzlo-core' ), $template_sname ),
			'options' => array(
				'Enabled'  => array(
					'post-items'	=> esc_html__( 'Post Items', 'pixzlo-core' ),
					'author-info'	=> esc_html__( 'Author Info', 'pixzlo-core' ),
					'post-nav'	=> esc_html__( 'Post Navigation', 'pixzlo-core' ),
					'related-slider'	=> esc_html__( 'Related Slider', 'pixzlo-core' ),
					'comment'	=> esc_html__( 'Comment', 'pixzlo-core' )
				),
				'disabled' => array(
					'article-inline-ads-list'	=> esc_html__( 'Article Inline Ads', 'pixzlo-core' )
				)
			),
		),
		array(
			'id'       => 'related-max-posts',
			'type'     => 'text',
			'title'    => esc_html__('Related Post Max Limit', 'pixzlo-core'),
			'desc'     => esc_html__('Enter related post maximum limit for get from posts query. Example 5.', 'pixzlo-core'),
			'default'  => '3'
		),
		array(
			'id'       => 'related-posts-filter',
			'type'     => 'select',
			'title'    => esc_html__( 'Related Posts From', 'pixzlo-core' ),
			'desc'     => esc_html__( 'Choose related posts from category or tag.', 'pixzlo-core' ),
			'options'  => array(
				'category'	=> esc_html__( 'Category', 'pixzlo-core' ),
				'tag'		=> esc_html__( 'Tag', 'pixzlo-core' )
			),
			'default'  => 'category'
		),
		array(
			'id'     => $template.'-settings-end',
			'type'   => 'section',
			'indent' => false, 
		)
	)
) );

//Templates -> Blog
$blog_array = $acf->pixzloThemeOptTemplate( 'blog', esc_html__( 'Blog', 'pixzlo-core' ), esc_html__( 'blog', 'pixzlo-core' ) );
Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Blog Template', 'pixzlo-core' ),
	'id'         => 'templates-blog',
	'desc'       => esc_html__( 'This is the setting for blog template', 'pixzlo-core' ),
	'subsection' => true,
	'fields'     => $blog_array
) );

$theme_templates = $acf->pixzloGetThemeTemplatesKey();
if( !empty( $theme_templates ) && in_array( "archive", $theme_templates ) ):
	//Templates -> Archive
	$archive_array = $acf->pixzloThemeOptTemplate( 'archive', esc_html__( 'Archive', 'pixzlo-core' ), esc_html__( 'archive', 'pixzlo-core' ) );
	Redux::setSection( $opt_name, array(
		'title'      => esc_html__( 'Archive Template', 'pixzlo-core' ),
		'id'         => 'templates-archive',
		'desc'       => esc_html__( 'This is the setting for archive template', 'pixzlo-core' ),
		'subsection' => true,
		'fields'     => $archive_array
	) );
endif;

if( !empty( $theme_templates ) && in_array( "category", $theme_templates ) ):
	//Templates -> Category
	$category_array = $acf->pixzloThemeOptTemplate( 'category', esc_html__( 'Category', 'pixzlo-core' ), esc_html__( 'category', 'pixzlo-core' ) );
	Redux::setSection( $opt_name, array(
		'title'      => esc_html__( 'Category Template', 'pixzlo-core' ),
		'id'         => 'templates-category',
		'desc'       => esc_html__( 'This is the setting for category template', 'pixzlo-core' ),
		'subsection' => true,
		'fields'     => $category_array
	) );
endif;

if( !empty( $theme_templates ) && in_array( "tag", $theme_templates ) ):
	//Templates -> Tag
	$tag_array = $acf->pixzloThemeOptTemplate( 'tag', esc_html__( 'Tag', 'pixzlo-core' ), esc_html__( 'tag', 'pixzlo-core' ) );
	Redux::setSection( $opt_name, array(
		'title'      => esc_html__( 'Tag Template', 'pixzlo-core' ),
		'id'         => 'templates-tag',
		'desc'       => esc_html__( 'This is the setting for tag template', 'pixzlo-core' ),
		'subsection' => true,
		'fields'     => $tag_array
	) );
endif;

if( !empty( $theme_templates ) && in_array( "author", $theme_templates ) ):
	//Templates -> Author
	$author_array = $acf->pixzloThemeOptTemplate( 'author', esc_html__( 'Author', 'pixzlo-core' ), esc_html__( 'author', 'pixzlo-core' ) );
	Redux::setSection( $opt_name, array(
		'title'      => esc_html__( 'Author Template', 'pixzlo-core' ),
		'id'         => 'templates-author',
		'desc'       => esc_html__( 'This is the setting for author template', 'pixzlo-core' ),
		'subsection' => true,
		'fields'     => $author_array
	) );
endif;

if( !empty( $theme_templates ) && in_array( "search", $theme_templates ) ):
	//Templates -> Search
	$search_array = $acf->pixzloThemeOptTemplate( 'search', esc_html__( 'Search', 'pixzlo-core' ), esc_html__( 'search', 'pixzlo-core' ) );
	Redux::setSection( $opt_name, array(
		'title'      => esc_html__( 'Search Template', 'pixzlo-core' ),
		'id'         => 'templates-search',
		'desc'       => esc_html__( 'This is the setting for search template', 'pixzlo-core' ),
		'subsection' => true,
		'fields'     => $search_array
	) );
endif;

//Templates -> All Categories
$cat_templates = $acf->pixzloGetAdminThemeOpt( 'theme-categories' );
if( !empty( $cat_templates ) ){
	
	Redux::setSection( $opt_name, array(
		'title'            => esc_html__( 'Categories Templates', 'pixzlo-core' ),
		'id'               => 'templates-categories',
		'desc'             => esc_html__( 'This is the template setting for all theme categories.', 'pixzlo-core' ),
		'customizer_width' => '400px',
		'icon'             => 'fa fa-newspaper-o'
	) );
	
	// Show only enabled category templates
	foreach( $cat_templates as $cat_name ){
		
		$cat_key = str_replace( "category-", "", $cat_name );
		$cat_name = get_cat_name( absint( $cat_key ) );
		
		$cat_key = "category-" . $cat_key;
		$cat_sname = strtolower( $cat_name );
		//Templates -> Dynamic Categories
		$cat_array = $acf->pixzloThemeOptTemplate( $cat_key, $cat_name, $cat_sname );
		Redux::setSection( $opt_name, array(
			'title'      => sprintf( esc_html__( '%1$s Template', 'pixzlo-core' ), $cat_name ),
			'id'         => 'templates-' . $cat_key,
			'desc'       => sprintf( esc_html__( 'This is the setting for %1$s category template', 'pixzlo-core' ), $cat_name ),
			'subsection' => true,
			'fields'     => $cat_array
		) );
		
	} // Categories foreach
	
} // All categories template if condition
	
//Sliders Tab
Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'Sliders', 'pixzlo-core' ),
	'id'               => 'sliders',
	'desc'             => esc_html__( 'These are the sliders settings of Pixzlo Theme', 'pixzlo-core' ),
	'customizer_width' => '400px',
	'icon'             => 'fa fa-film'
) );

// Featured Slider
$featured_slider = $acf->themeSliders('featured');
Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Featured Slider', 'pixzlo-core' ),
	'id'         => 'sliders-featured',
	'desc'       => esc_html__( 'This is the setting for featured slider', 'pixzlo-core' ),
	'subsection' => true,
	'fields'     => $featured_slider
) );

// Related Slider
$related_slider = $acf->themeSliders('related');
Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Related Slider', 'pixzlo-core' ),
	'id'         => 'sliders-related',
	'desc'       => esc_html__( 'This is the setting for related slider', 'pixzlo-core' ),
	'subsection' => true,
	'fields'     => $related_slider
) );

// Blog Post Slider
$blog_slider = $acf->themeSliders('blog');
Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Blog Post Slider', 'pixzlo-core' ),
	'id'         => 'sliders-blog',
	'desc'       => esc_html__( 'This is the setting for blog post slider', 'pixzlo-core' ),
	'subsection' => true,
	'fields'     => $blog_slider
) );

// Single Post Slider
$single_slider = $acf->themeSliders('single');
Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Single Post Slider', 'pixzlo-core' ),
	'id'         => 'sliders-single',
	'desc'       => esc_html__( 'This is the setting for single post slider', 'pixzlo-core' ),
	'subsection' => true,
	'fields'     => $single_slider
) );

//Social Tab
Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'Social', 'pixzlo-core' ),
	'id'               => 'social',
	'desc'             => esc_html__( 'These are the Social settings of Pixzlo Theme', 'pixzlo-core' ),
	'customizer_width' => '400px',
	'icon'             => 'fa fa-users'
) );

//Social -> Links
Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Social Settings', 'pixzlo-core' ),
	'id'         => 'social-links',
	'desc'       => esc_html__( 'This is the setting for social links', 'pixzlo-core' ),
	'subsection' => true,
	'fields'     => array(
		array(
			'id'       => 'social-icons-type',
			'type'     => 'image_select',
			'title'    => esc_html__( 'Social Iocns Type', 'pixzlo-core' ),
			'desc'     => esc_html__( 'Choose your social icons type.', 'pixzlo-core' ),
			//Must provide key => value(array:title|img) pairs for radio options
			'options'  => array(
				'squared' => array(
					'alt' => esc_html__( 'Squared', 'pixzlo-core' ),
					'img' => ReduxFramework::$_url . 'assets/img/social-icons/1.png'
				),
				'rounded' => array(
					'alt' => esc_html__( 'Rounded', 'pixzlo-core' ),
					'img' => ReduxFramework::$_url . 'assets/img/social-icons/2.png'
				),
				'circled' => array(
					'alt' => esc_html__( 'Circled', 'pixzlo-core' ),
					'img' => ReduxFramework::$_url . 'assets/img/social-icons/3.png'
				),
				'transparent' => array(
					'alt' => esc_html__( 'Nothing', 'pixzlo-core' ),
					'img' => ReduxFramework::$_url . 'assets/img/social-icons/4.png'
				)
			),
			'default'  => 'transparent'
		),
		array(
			'id'       => 'social-icons-type-footer',
			'type'     => 'image_select',
			'title'    => esc_html__( 'Footer Bottom Social Iocns Type', 'pixzlo-core' ),
			'desc'     => esc_html__( 'Choose your social icons type.', 'pixzlo-core' ),
			//Must provide key => value(array:title|img) pairs for radio options
			'options'  => array(
				'squared' => array(
					'alt' => esc_html__( 'Squared', 'pixzlo-core' ),
					'img' => ReduxFramework::$_url . 'assets/img/social-icons/1.png'
				),
				'rounded' => array(
					'alt' => esc_html__( 'Rounded', 'pixzlo-core' ),
					'img' => ReduxFramework::$_url . 'assets/img/social-icons/2.png'
				),
				'circled' => array(
					'alt' => esc_html__( 'Circled', 'pixzlo-core' ),
					'img' => ReduxFramework::$_url . 'assets/img/social-icons/3.png'
				),
				'transparent' => array(
					'alt' => esc_html__( 'Nothing', 'pixzlo-core' ),
					'img' => ReduxFramework::$_url . 'assets/img/social-icons/4.png'
				)
			),
			'default'  => 'squared'
		),
		array(
			'id'       => 'social-icons-fore',
			'type'     => 'select',
			'title'    => esc_html__( 'Social Icons Fore', 'pixzlo-core' ),
			'desc'     => esc_html__( 'Social icons fore color settings.', 'pixzlo-core' ),
			'options'  => array(
				'black'		=> esc_html__( 'Black', 'pixzlo-core' ),
				'white'		=> esc_html__( 'White', 'pixzlo-core' ),
				'own'		=> esc_html__( 'Own Color', 'pixzlo-core' ),
			),
			'default'  => 'black'
		),
		array(
			'id'       => 'social-icons-hfore',
			'type'     => 'select',
			'title'    => esc_html__( 'Social Icons Fore Hover', 'pixzlo-core' ),
			'desc'     => esc_html__( 'Social icons fore hover color settings.', 'pixzlo-core' ),
			'options'  => array(
				'h-black'		=> esc_html__( 'Black', 'pixzlo-core' ),
				'h-white'		=> esc_html__( 'White', 'pixzlo-core' ),
				'h-own'		=> esc_html__( 'Own Color', 'pixzlo-core' ),
			),
			'default'  => 'h-own'
		),
		array(
			'id'       => 'social-icons-bg',
			'type'     => 'select',
			'title'    => esc_html__( 'Social Icons Background', 'pixzlo-core' ),
			'desc'     => esc_html__( 'Social icons background color settings.', 'pixzlo-core' ),
			'options'  => array(
				'bg-black'		=> esc_html__( 'Black', 'pixzlo-core' ),
				'bg-white'		=> esc_html__( 'White', 'pixzlo-core' ),
				'bg-light'		=> esc_html__( 'RGBA Light', 'pixzlo-core' ),
				'bg-dark'		=> esc_html__( 'RGBA Dark', 'pixzlo-core' ),
				'bg-own'		=> esc_html__( 'Own Color', 'pixzlo-core' ),
			),
			'default'  => ''
		),
		array(
			'id'       => 'social-icons-hbg',
			'type'     => 'select',
			'title'    => esc_html__( 'Social Icons Background Hover', 'pixzlo-core' ),
			'desc'     => esc_html__( 'Social icons background hover color settings.', 'pixzlo-core' ),
			'options'  => array(
				'hbg-black'		=> esc_html__( 'Black', 'pixzlo-core' ),
				'hbg-white'		=> esc_html__( 'White', 'pixzlo-core' ),
				'hbg-light'		=> esc_html__( 'RGBA Light', 'pixzlo-core' ),
				'hbg-dark'		=> esc_html__( 'RGBA Dark', 'pixzlo-core' ),
				'hbg-own'		=> esc_html__( 'Own Color', 'pixzlo-core' ),
			),
			'default'  => ''
		),
		array(
			'id'       => 'social-fb',
			'type'     => 'text',
			'title'    => esc_html__( 'Facebook', 'pixzlo-core' ),
			'desc'     => esc_html__( 'Enter the facebook link. If no link means just leave it blank', 'pixzlo-core' ),
			'default'  => '',
		),
		array(
			'id'       => 'social-twitter',
			'type'     => 'text',
			'title'    => esc_html__( 'Twitter', 'pixzlo-core' ),
			'desc'     => esc_html__( 'Enter the twitter link. If no link means just leave it blank', 'pixzlo-core' ),
			'default'  => '',
		),
		array(
			'id'       => 'social-instagram',
			'type'     => 'text',
			'title'    => esc_html__( 'Instagram', 'pixzlo-core' ),
			'desc'     => esc_html__( 'Enter the instagram link. If no link means just leave it blank', 'pixzlo-core' ),
			'default'  => '',
		),
		array(
			'id'       => 'social-pinterest',
			'type'     => 'text',
			'title'    => esc_html__( 'Pinterest', 'pixzlo-core' ),
			'desc'     => esc_html__( 'Enter the pinterest link. If no link means just leave it blank', 'pixzlo-core' ),
			'default'  => '',
		),
		array(
			'id'       => 'social-youtube',
			'type'     => 'text',
			'title'    => esc_html__( 'Youtube', 'pixzlo-core' ),
			'desc'     => esc_html__( 'Enter the Youtube link. If no link means just leave it blank', 'pixzlo-core' ),
			'default'  => '',
		),
		array(
			'id'       => 'social-vimeo',
			'type'     => 'text',
			'title'    => esc_html__( 'Vimeo', 'pixzlo-core' ),
			'desc'     => esc_html__( 'Enter the Vimeo link. If no link means just leave it blank', 'pixzlo-core' ),
			'default'  => '',
		),
		array(
			'id'       => 'social-soundcloud',
			'type'     => 'text',
			'title'    => esc_html__( 'Soundcloud', 'pixzlo-core' ),
			'desc'     => esc_html__( 'Enter the Soundcloud link. If no link means just leave it blank', 'pixzlo-core' ),
			'default'  => '',
		),
		array(
			'id'       => 'social-yahoo',
			'type'     => 'text',
			'title'    => esc_html__( 'Yahoo', 'pixzlo-core' ),
			'desc'     => esc_html__( 'Enter the Yahoo link. If no link means just leave it blank', 'pixzlo-core' ),
			'default'  => '',
		),
		array(
			'id'       => 'social-tumblr',
			'type'     => 'text',
			'title'    => esc_html__( 'Tumblr', 'pixzlo-core' ),
			'desc'     => esc_html__( 'Enter the Tumblr link. If no link means just leave it blank', 'pixzlo-core' ),
			'default'  => '',
		),
		array(
			'id'       => 'social-paypal',
			'type'     => 'text',
			'title'    => esc_html__( 'Paypal', 'pixzlo-core' ),
			'desc'     => esc_html__( 'Enter the Paypal link. If no link means just leave it blank', 'pixzlo-core' ),
			'default'  => '',
		),
		array(
			'id'       => 'social-mailto',
			'type'     => 'text',
			'title'    => esc_html__( 'Mailto', 'pixzlo-core' ),
			'desc'     => esc_html__( 'Enter the Mailto link. If no link means just leave it blank', 'pixzlo-core' ),
			'default'  => '',
		),
		array(
			'id'       => 'social-flickr',
			'type'     => 'text',
			'title'    => esc_html__( 'Flickr', 'pixzlo-core' ),
			'desc'     => esc_html__( 'Enter the Flickr link. If no link means just leave it blank', 'pixzlo-core' ),
			'default'  => '',
		),
		array(
			'id'       => 'social-dribbble',
			'type'     => 'text',
			'title'    => esc_html__( 'Dribbble', 'pixzlo-core' ),
			'desc'     => esc_html__( 'Enter the Dribbble link. If no link means just leave it blank', 'pixzlo-core' ),
			'default'  => '',
		),
		array(
			'id'       => 'social-linkedin',
			'type'     => 'text',
			'title'    => esc_html__( 'LinkedIn', 'pixzlo-core' ),
			'desc'     => esc_html__( 'Enter the linkedin link. If no link means just leave it blank', 'pixzlo-core' ),
			'default'  => '',
		),
		array(
			'id'       => 'social-rss',
			'type'     => 'text',
			'title'    => esc_html__( 'RSS', 'pixzlo-core' ),
			'desc'     => esc_html__( 'Enter the rss link. If no link means just leave it blank', 'pixzlo-core' ),
			'default'  => '',
		),
	)
) );

//Social -> Share
Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Social Share', 'pixzlo-core' ),
	'id'         => 'social-share',
	'desc'       => esc_html__( 'This is the setting for social share', 'pixzlo-core' ),
	'subsection' => true,
	'fields'     => array(
		array(
			'id'       => 'post-social-shares',
			'type'     => 'button_set',
			'title'    => esc_html__( 'Post Social Shares', 'pixzlo-core' ),
			'desc'     => esc_html__( 'Actived social items only showing post share list.', 'pixzlo-core' ),
			'multi'    => true,
			'options' => array(
				'fb'	=> esc_html__( 'Facebook', 'pixzlo-core' ),
				'twitter'	=> esc_html__( 'Twitter', 'pixzlo-core' ),
				'linkedin'		=> esc_html__( 'Linkedin', 'pixzlo-core' ),
				'pinterest'	=> esc_html__( 'Pinterest', 'pixzlo-core' )
			),
			'default' => '',
		),
		array(
			'id'       => 'comments-social-shares',
			'type'     => 'button_set',
			'title'    => esc_html__( 'Comments Social Shares', 'pixzlo-core' ),
			'desc'     => esc_html__( 'Actived social items only showing comments share list.', 'pixzlo-core' ),
			'multi'    => true,
			'options' => array(
				'fb'	=> esc_html__( 'Facebook', 'pixzlo-core' ),
				'twitter'	=> esc_html__( 'Twitter', 'pixzlo-core' ),
				'linkedin'		=> esc_html__( 'Linkedin', 'pixzlo-core' ),
				'pinterest'	=> esc_html__( 'Pinterest', 'pixzlo-core' )
			),
			'default' => '',
		),
	)
) );

//WooCommerce
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	Redux::setSection( $opt_name, array(
		'title'            => esc_html__( 'Woo', 'pixzlo-core' ),
		'id'               => 'woo',
		'desc'             => esc_html__( 'These are the WooCommerce settings of Pixzlo Theme', 'pixzlo-core' ),
		'customizer_width' => '400px',
		'icon'             => 'fa fa-shopping-cart'
	) );
	
	//WooCommerce -> General
	Redux::setSection( $opt_name, array(
		'title'      => esc_html__( 'General Settings', 'pixzlo-core' ),
		'id'         => 'woo-general',
		'desc'       => esc_html__( 'This is general WooCommerce setting.', 'pixzlo-core' ),
		'subsection' => true,
		'fields'     => array(
			array(
				'id'       => 'woo-page-template',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Woocommerce Shop Template', 'pixzlo-core' ),
				'desc'     => esc_html__( 'Choose your current woocommerce shop page template.', 'pixzlo-core' ),
				'options'  => array(
					'no-sidebar' => array(
						'alt' => esc_html__( 'No Sidebar', 'pixzlo-core' ),
						'img' => get_template_directory_uri() . '/assets/images/page-layouts/1.png'
					),
					'right-sidebar' => array(
						'alt' => esc_html__( 'Right Sidebar', 'pixzlo-core' ),
						'img' => get_template_directory_uri() . '/assets/images/page-layouts/2.png'
					),
					'left-sidebar' => array(
						'alt' => esc_html__( 'Left Sidebar', 'pixzlo-core' ),
						'img' => get_template_directory_uri() . '/assets/images/page-layouts/3.png'
					),
					'both-sidebar' => array(
						'alt' => esc_html__( 'Both Sidebar', 'pixzlo-core' ),
						'img' => get_template_directory_uri() . '/assets/images/page-layouts/4.png'
					)
				),
				'default'  => 'right-sidebar'
			),
			array(
				'id'       => 'woo-left-sidebar',
				'type'     => 'select',
				'title'    => esc_html__( 'Choose Left Sidebar', 'pixzlo-core' ),
				'desc'     => esc_html__( 'Select widget area for showing woocommerce shop template on left sidebar.', 'pixzlo-core' ),
				'data'     => 'sidebars',
				'required' 		=> array('woo-page-template', '=', array( 'left-sidebar', 'both-sidebar' ))
			),
			array(
				'id'       => 'woo-right-sidebar',
				'type'     => 'select',
				'title'    => esc_html__( 'Choose Right Sidebar', 'pixzlo-core' ),
				'desc'     => esc_html__( 'Select widget area for showing woocommerce shop template on right sidebar.', 'pixzlo-core' ),
				'data'     => 'sidebars',
				'default'  => 'sidebar-1',
				'required' 		=> array('woo-page-template', '=', array( 'right-sidebar', 'both-sidebar' ))
			),
			array(
				'id'       => 'woo-shop-columns',
				'type'     => 'select',
				'title'    => esc_html__( 'Shop Columns', 'pixzlo-core' ),
				'desc'     => esc_html__( 'This is column settings woocommerce shop page products.', 'pixzlo-core' ),
				'options'  => array(
					'2'		=> esc_html__( '2 Columns', 'pixzlo-core' ),
					'3'		=> esc_html__( '3 Columns', 'pixzlo-core' ),
					'4'		=> esc_html__( '4 Columns', 'pixzlo-core' ),
					'5'		=> esc_html__( '5 Columns', 'pixzlo-core' ),
					'6'		=> esc_html__( '6 Columns', 'pixzlo-core' ),
				),
				'default'  => '3'
			),
			array(
				'id'       => 'woo-shop-ppp',
				'type'     => 'text',
				'title'    => esc_html__( 'Shop Product Per Page', 'pixzlo-core' ),
				'desc'     => esc_html__( 'This is column settings woocommerce related products per page.', 'pixzlo-core' ),
				'default'  => '12'
			),
			array(
				'id'       => 'woo-single-page-template',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Woocommerce Single Template', 'pixzlo-core' ),
				'desc'     => esc_html__( 'Choose your current woocommerce single page template.', 'pixzlo-core' ),
				'options'  => array(
					'no-sidebar' => array(
						'alt' => esc_html__( 'No Sidebar', 'pixzlo-core' ),
						'img' => get_template_directory_uri() . '/assets/images/page-layouts/1.png'
					),
					'right-sidebar' => array(
						'alt' => esc_html__( 'Right Sidebar', 'pixzlo-core' ),
						'img' => get_template_directory_uri() . '/assets/images/page-layouts/2.png'
					),
					'left-sidebar' => array(
						'alt' => esc_html__( 'Left Sidebar', 'pixzlo-core' ),
						'img' => get_template_directory_uri() . '/assets/images/page-layouts/3.png'
					)
				),
				'default'  => 'right-sidebar'
			),
			array(
				'id'       => 'woo-single-left-sidebar',
				'type'     => 'select',
				'title'    => esc_html__( 'Choose Single Left Sidebar', 'pixzlo-core' ),
				'desc'     => esc_html__( 'Select widget area for showing woocommerce single template on left sidebar.', 'pixzlo-core' ),
				'data'     => 'sidebars',
				'required' 		=> array('woo-single-page-template', '=', array( 'left-sidebar' ))
			),
			array(
				'id'       => 'woo-single-right-sidebar',
				'type'     => 'select',
				'title'    => esc_html__( 'Choose Single Right Sidebar', 'pixzlo-core' ),
				'desc'     => esc_html__( 'Select widget area for showing woocommerce single template on right sidebar.', 'pixzlo-core' ),
				'data'     => 'sidebars',
				'default'  => 'sidebar-1',
				'required' 		=> array('woo-single-page-template', '=', array( 'right-sidebar' ))
			),
			array(
				'id'       => 'woo-related-ppp',
				'type'     => 'text',
				'title'    => esc_html__( 'Related Product Per Page', 'pixzlo-core' ),
				'desc'     => esc_html__( 'This is column settings woocommerce related products per page.', 'pixzlo-core' ),
				'default'  => '3'
			),
		)
	) );
	
	Redux::setSection( $opt_name, array(
		'title'      => esc_html__( 'Archive Template', 'pixzlo-core' ),
		'id'         => 'woo-archive-page',
		'desc'       => esc_html__( 'This is the setting for woocommerce archive page template', 'pixzlo-core' ),
		'subsection' => true,
		'fields'     => array(
			array(
				'id'       => 'wooarchive-page-template',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Woocommerce Archive Template', 'pixzlo-core' ),
				'desc'     => esc_html__( 'Choose your current Woocommerce Archive page template.', 'pixzlo-core' ),
				'options'  => array(
					'no-sidebar' => array(
						'alt' => esc_html__( 'No Sidebar', 'pixzlo-core' ),
						'img' => get_template_directory_uri() . '/assets/images/page-layouts/1.png'
					),
					'right-sidebar' => array(
						'alt' => esc_html__( 'Right Sidebar', 'pixzlo-core' ),
						'img' => get_template_directory_uri() . '/assets/images/page-layouts/2.png'
					),
					'left-sidebar' => array(
						'alt' => esc_html__( 'Left Sidebar', 'pixzlo-core' ),
						'img' => get_template_directory_uri() . '/assets/images/page-layouts/3.png'
					),
					'both-sidebar' => array(
						'alt' => esc_html__( 'Both Sidebar', 'pixzlo-core' ),
						'img' => get_template_directory_uri() . '/assets/images/page-layouts/4.png'
					)
				),
				'default'  => 'right-sidebar'
			),
			array(
				'id'       => 'wooarchive-left-sidebar',
				'type'     => 'select',
				'title'    => esc_html__( 'Choose Left Sidebar', 'pixzlo-core' ),
				'desc'     => esc_html__( 'Select widget area for showing woocommerce archive template on left sidebar.', 'pixzlo-core' ),
				'data'     => 'sidebars',
				'required' 		=> array('wooarchive-page-template', '=', array( 'left-sidebar', 'both-sidebar' ))
			),
			array(
				'id'       => 'wooarchive-right-sidebar',
				'type'     => 'select',
				'title'    => esc_html__( 'Choose Right Sidebar', 'pixzlo-core' ),
				'desc'     => esc_html__( 'Select widget area for showing woocommerce archive template on right sidebar.', 'pixzlo-core' ),
				'data'     => 'sidebars',
				'default'  => 'sidebar-1',
				'required' 		=> array('wooarchive-page-template', '=', array( 'right-sidebar', 'both-sidebar' ))
			),
			array(
				'id'       => 'woo-shop-archive-columns',
				'type'     => 'select',
				'title'    => esc_html__( 'Product Archive Columns', 'pixzlo-core' ),
				'desc'     => esc_html__( 'This is column settings woocommerce product archive columns.', 'pixzlo-core' ),
				'options'  => array(
					'2'		=> esc_html__( '2 Columns', 'pixzlo-core' ),
					'3'		=> esc_html__( '3 Columns', 'pixzlo-core' ),
					'4'		=> esc_html__( '4 Columns', 'pixzlo-core' ),
					'5'		=> esc_html__( '5 Columns', 'pixzlo-core' ),
					'6'		=> esc_html__( '6 Columns', 'pixzlo-core' ),
				),
				'default'  => '4'
			),
		)
	) );
	
	// Woo Related Slider
	$woo_related_slider = $acf->themeSliders('woo-related');
	Redux::setSection( $opt_name, array(
		'title'      => esc_html__( 'Woo Related Slider', 'pixzlo-core' ),
		'id'         => 'woo-related-slider',
		'desc'       => esc_html__( 'This is the setting for woocommerce related slider', 'pixzlo-core' ),
		'subsection' => true,
		'fields'     => $woo_related_slider
	) );
	
}

//Custom Post Types
Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'Custom Post Types', 'pixzlo-core' ),
	'id'               => 'cpt',
	'desc'             => esc_html__( 'These are the CPT settings of Pixzlo Theme', 'pixzlo-core' ),
	'customizer_width' => '400px',
	'icon'             => 'fa fa-bolt'
) );

//General -> Custom Post Types
Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'General Settings', 'pixzlo-core' ),
	'id'         => 'cpt-general',
	'desc'       => esc_html__( 'This is general CPT setting.', 'pixzlo-core' ),
	'subsection' => true,
	'fields'     => array(
		array(
			'id'       => 'cpt-opts',
			'type'     => 'button_set',
			'title'    => esc_html__('Custom Post Types', 'pixzlo-core'),
			'desc'     => esc_html__('Enable needed custom post types here and save theme options. After refresh page CPT options are showing sub level and go to settings, resave permalinks settings.', 'pixzlo-core'),
			'multi'    => true,
			'options' => array(
				'portfolio' 	=> esc_html__( 'Portfolio', 'pixzlo-core' ),
				'team' 			=> esc_html__( 'Team', 'pixzlo-core' ),
				'testimonial' 	=> esc_html__( 'Testimonial', 'pixzlo-core' ),
				'event' 	=> esc_html__( 'Events', 'pixzlo-core' ),
				'service' 	=> esc_html__( 'Services', 'pixzlo-core' ),
			 ), 
			'default' => '',
		)
	)
) );

//Custom Post Types -> Options like portfolio, team, etc..
$cpt_opts = $acf->pixzloGetAdminThemeOpt( 'cpt-opts' );
$cpt_all = array( 'portfolio' => esc_html__( 'Portfolio', 'pixzlo-core' ), 'team' => esc_html__( 'Team', 'pixzlo-core' ), 'testimonial' => esc_html__( 'Testimonial', 'pixzlo-core' ), 'event' => esc_html__( 'Events', 'pixzlo-core' ), 'service' => esc_html__( 'Services', 'pixzlo-core' ) );
if( !empty( $cpt_opts ) ){

	foreach( $cpt_opts as $cpt ){
		
		if( !isset( $cpt_all[$cpt] ) ) continue;
		$cpt_name = $cpt_all[$cpt];
		
		$cpt_array = array();
		
		if( $cpt == 'portfolio' ){
		
			$related_slider = $acf->themeSliders('portfolio-related');
			$single_slider = $acf->themeSliders('portfolio-single');
			
			$t_array = array(
				array(
					'id'       => 'portfolio-title-opt',
					'type'     => 'switch',
					'title'    => esc_html__( 'Portfolio Title', 'pixzlo-core' ),
					'subtitle' => esc_html__( 'Enable/Disable portfolio title on single portfolio( not page title ).', 'pixzlo-core' ),
					'default'  => 1,
					'on'       => esc_html__( 'Enable', 'pixzlo-core' ),
					'off'      => esc_html__( 'Disable', 'pixzlo-core' ),
				),
				array(
					'id'       => 'cpt-portfolio-slug',
					'type'     => 'text',
					'title'    => esc_html__( 'Portfolio Slug', 'pixzlo-core' ),
					'desc'     => esc_html__( 'Enter portfolio slug for register custom post type.', 'pixzlo-core' ),
					'default'  => 'portfolio'
				),
				array(
					'id'       => 'cpt-portfolio-category-slug',
					'type'     => 'text',
					'title'    => esc_html__( 'Portfolio Category Slug', 'pixzlo-core' ),
					'desc'     => esc_html__( 'Enter category slug for portfolio custom post type.', 'pixzlo-core' ),
					'default'  => 'portfolio-category'
				),
				array(
					'id'       => 'cpt-portfolio-tag-slug',
					'type'     => 'text',
					'title'    => esc_html__( 'Portfolio Tag Slug', 'pixzlo-core' ),
					'desc'     => esc_html__( 'Enter portfolio slug for portfolio custom post type.', 'pixzlo-core' ),
					'default'  => 'portfolio-tag'
				),
				array(
					'id'      => 'portfolio-meta-items',
					'type'    => 'sorter',
					'title'   => esc_html__( 'Portfolio Meta Items', 'pixzlo-core' ),
					'desc'    => esc_html__( 'Needed portfolio meta items drag from disabled and put enabled part.', 'pixzlo-core' ),
					'options' => array(
						'Enabled'  => array(
							'type'		=> esc_html__( 'Type', 'pixzlo-core' ),
							'date'		=> esc_html__( 'Date', 'pixzlo-core' ),
							'client'	=> esc_html__( 'Client', 'pixzlo-core' ),
							'category'	=> esc_html__( 'Category', 'pixzlo-core' ),
							'share'		=> esc_html__( 'Share', 'pixzlo-core' ),
						),
						'disabled' => array(
							'tag'		=> esc_html__( 'Tags', 'pixzlo-core' ),
							'duration'	=> esc_html__( 'Duration', 'pixzlo-core' ),
							'url'		=> esc_html__( 'URL', 'pixzlo-core' ),
							'place'		=> esc_html__( 'Place', 'pixzlo-core' ),
							'estimation'=> esc_html__( 'Estimation', 'pixzlo-core' ),
						)
					)
				),
				array(
					'id'       => 'portfolio-details-labels-start',
					'type'     => 'section',
					'title'    => esc_html__( 'Portfolio Details Labels', 'pixzlo-core' ),
					'subtitle' => esc_html__( 'This is portfolio details labels settings for', 'pixzlo-core' ),
					'indent'   => true,
				),
				array(
					'id'       => 'portfolio-client-label',
					'type'     => 'text',
					'title'    => esc_html__( 'Client', 'pixzlo-core' ),
					'desc'     => esc_html__( 'Enter portfolio client label.', 'pixzlo-core' ),
					'default'  => esc_html__( 'Client', 'pixzlo-core' )
				),
				array(
					'id'       => 'portfolio-type-label',
					'type'     => 'text',
					'title'    => esc_html__( 'Type', 'pixzlo-core' ),
					'desc'     => esc_html__( 'Enter portfolio type label.', 'pixzlo-core' ),
					'default'  => esc_html__( 'Portfolio Type', 'pixzlo-core' )
				),
				array(
					'id'       => 'portfolio-date-label',
					'type'     => 'text',
					'title'    => esc_html__( 'Date', 'pixzlo-core' ),
					'desc'     => esc_html__( 'Enter portfolio date label.', 'pixzlo-core' ),
					'default'  => esc_html__( 'Date', 'pixzlo-core' )
				),
				array(
					'id'       => 'portfolio-duration-label',
					'type'     => 'text',
					'title'    => esc_html__( 'Duration', 'pixzlo-core' ),
					'desc'     => esc_html__( 'Enter portfolio duration label.', 'pixzlo-core' ),
					'default'  => esc_html__( 'Duration', 'pixzlo-core' )
				),
				array(
					'id'       => 'portfolio-estimation-label',
					'type'     => 'text',
					'title'    => esc_html__( 'Estimation', 'pixzlo-core' ),
					'desc'     => esc_html__( 'Enter portfolio estimation label.', 'pixzlo-core' ),
					'default'  => esc_html__( 'Estimation', 'pixzlo-core' )
				),
				array(
					'id'       => 'portfolio-place-label',
					'type'     => 'text',
					'title'    => esc_html__( 'Place', 'pixzlo-core' ),
					'desc'     => esc_html__( 'Enter portfolio place label.', 'pixzlo-core' ),
					'default'  => esc_html__( 'Place', 'pixzlo-core' )
				),
				array(
					'id'       => 'portfolio-url-label',
					'type'     => 'text',
					'title'    => esc_html__( 'URL', 'pixzlo-core' ),
					'desc'     => esc_html__( 'Enter portfolio URL label.', 'pixzlo-core' ),
					'default'  => esc_html__( 'URL', 'pixzlo-core' )
				),
				array(
					'id'       => 'portfolio-category-label',
					'type'     => 'text',
					'title'    => esc_html__( 'Category', 'pixzlo-core' ),
					'desc'     => esc_html__( 'Enter portfolio category label.', 'pixzlo-core' ),
					'default'  => esc_html__( 'Category', 'pixzlo-core' )
				),
				array(
					'id'       => 'portfolio-tags-label',
					'type'     => 'text',
					'title'    => esc_html__( 'Tags', 'pixzlo-core' ),
					'desc'     => esc_html__( 'Enter portfolio tags label.', 'pixzlo-core' ),
					'default'  => esc_html__( 'Tags', 'pixzlo-core' )
				),
				array(
					'id'       => 'portfolio-share-label',
					'type'     => 'text',
					'title'    => esc_html__( 'Share', 'pixzlo-core' ),
					'desc'     => esc_html__( 'Enter portfolio share label.', 'pixzlo-core' ),
					'default'  => esc_html__( 'Share', 'pixzlo-core' )
				),
				array(
					'id'     => 'portfolio-details-labels-end',
					'type'   => 'section',
					'indent' => false, 
				),
				array(
					'id'       => 'portfolio-layout-settings-start',
					'type'     => 'section',
					'title'    => esc_html__( 'Portfolio Layouts', 'pixzlo-core' ),
					'subtitle' => esc_html__( 'This is layout settings for portfolio single.', 'pixzlo-core' ),
					'indent'   => true
				),
				array(
					'id'       => 'portfolio-layout',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Portfolio Single Layouts', 'pixzlo-core' ),
					'desc'     => esc_html__( 'This is layout settings for portfolio single.', 'pixzlo-core' ),
					'options'  => array(
						'1' => array(
							'alt' => esc_html__( 'Left Thumb', 'pixzlo-core' ),
							'img' => ReduxFramework::$_url . 'assets/img/portfolio-layouts/1.png'
						),
						'2' => array(
							'alt' => esc_html__( 'Bottom Thumb', 'pixzlo-core' ),
							'img' => ReduxFramework::$_url . 'assets/img/portfolio-layouts/2.png'
						),
						'3' => array(
							'alt' => esc_html__( 'Right Thumb', 'pixzlo-core' ),
							'img' => ReduxFramework::$_url . 'assets/img/portfolio-layouts/3.png'
						),
						'4' => array(
							'alt' => esc_html__( 'Full Width', 'pixzlo-core' ),
							'img' => ReduxFramework::$_url . 'assets/img/portfolio-layouts/4.png'
						)
					),
					'default'  => '1'
				),
				array(
					'id'     => 'portfolio-layout-settings-end',
					'type'   => 'section',
					'indent' => false, 
				),
				array(
					'id'       => 'portfolio-archive-settings-start',
					'type'     => 'section',
					'title'    => esc_html__( 'Portfolio Archive Layouts', 'pixzlo-core' ),
					'subtitle' => esc_html__( 'This is layout settings for portfolio archive.', 'pixzlo-core' ),
					'indent'   => true
				),
				array(
					'id'       => 'portfolio-grid-cols',
					'type'     => 'select',
					'title'    => esc_html__( 'Grid Columns', 'pixzlo-core' ),
					'desc'     => esc_html__( 'Select grid columns.', 'pixzlo-core' ),
					'options'  => array(
						'4'		=> esc_html__( '4 Columns', 'pixzlo-core' ),
						'3'		=> esc_html__( '3 Columns', 'pixzlo-core' ),
						'2'		=> esc_html__( '2 Columns', 'pixzlo-core' ),
					),
					'default'  => '2'
				),
				array(
					'id'       => 'portfolio-grid-gutter',
					'type'     => 'text',
					'title'    => esc_html__( 'Portfolio Grid Gutter', 'pixzlo-core' ),
					'subtitle' => esc_html__( 'Enter grid gutter size. Example 20.', 'pixzlo-core' ),
					'default'  => '20'
				),
				array(
					'id'       => 'portfolio-grid-type',
					'type'     => 'select',
					'title'    => esc_html__( 'Grid Type', 'pixzlo-core' ),
					'desc'     => esc_html__( 'Select grid type normal or isotope.', 'pixzlo-core' ),
					'options'  => array(
						'normal'		=> esc_html__( 'Normal Grid', 'pixzlo-core' ),
						'isotope'		=> esc_html__( 'Isotope Grid', 'pixzlo-core' ),
					),
					'default'  => 'isotope'
				),
				array(
					'id'     => 'portfolio-archive-settings-end',
					'type'   => 'section',
					'indent' => false, 
				),
				array(
					'id'       => 'portfolio-related-opt',
					'type'     => 'switch',
					'title'    => esc_html__( 'Related Slider', 'pixzlo-core' ),
					'subtitle' => esc_html__( 'Enable/Disable portfolio related slider.', 'pixzlo-core' ),
					'default'  => 0,
					'on'       => esc_html__( 'Enable', 'pixzlo-core' ),
					'off'      => esc_html__( 'Disable', 'pixzlo-core' ),
				),
				array(
					'id'       => 'portfolio-related-settings-start',
					'type'     => 'section',
					'title'    => esc_html__( 'Related Sliders Settings', 'pixzlo-core' ),
					'subtitle' => esc_html__( 'This is settings for portfolio related slider.', 'pixzlo-core' ),
					'indent'   => true,
					'required' 		=> array( 'portfolio-related-opt', '=', 1 )
				),
			);
			
			$t_array = array_merge( $t_array, $related_slider );
			
			$t1_array = array(
				array(
					'id'     => 'portfolio-related-settings-end',
					'type'   => 'section',
					'indent' => false, 
				)
			);
			
			$t_array = array_merge( $t_array, $t1_array );
			$t1_array = array(
				array(
					'id'       => 'portfolio-single-slider-opt',
					'type'     => 'switch',
					'title'    => esc_html__( 'Portfolio Single Slider Option', 'pixzlo-core' ),
					'subtitle' => esc_html__( 'Enable/Disable portfolio single page slider.', 'pixzlo-core' ),
					'default'  => 0,
					'on'       => esc_html__( 'Enable', 'pixzlo-core' ),
					'off'      => esc_html__( 'Disable', 'pixzlo-core' ),
				),
				array(
					'id'       => 'portfolio-single-settings-start',
					'type'     => 'section',
					'title'    => esc_html__( 'Portfolio Single Sliders Settings', 'pixzlo-core' ),
					'subtitle' => esc_html__( 'This is settings for portfolio single page slider.', 'pixzlo-core' ),
					'indent'   => true,
					'required' 		=> array( 'portfolio-single-slider-opt', '=', 1)
				),
			);
			
			$t_array = array_merge( $t_array, $t1_array );
			$t_array = array_merge( $t_array, $single_slider );
			
			$t1_array = array(
				array(
					'id'     => 'portfolio-single-settings-end',
					'type'   => 'section',
					'indent' => false, 
				)
			);
			
			$t_array = array_merge( $t_array, $t1_array );
			
			$cpt_array = array_merge( $cpt_array, $t_array );
		}elseif( $cpt == 'testimonial' ){
			$t_array = array(
				array(
					'id'       => 'testimonial-title-opt',
					'type'     => 'switch',
					'title'    => esc_html__( 'Testimonial Title', 'pixzlo-core' ),
					'subtitle' => esc_html__( 'Enable/Disable testimonial title on single testimonial( not page title ).', 'pixzlo-core' ),
					'default'  => 1,
					'on'       => esc_html__( 'Enable', 'pixzlo-core' ),
					'off'      => esc_html__( 'Disable', 'pixzlo-core' ),
				),
				array(
					'id'       => 'cpt-testimonial-slug',
					'type'     => 'text',
					'title'    => esc_html__( 'Testimonial Slug', 'pixzlo-core' ),
					'desc'     => esc_html__( 'Enter testimonial slug for register custom post type.', 'pixzlo-core' ),
					'default'  => 'testimonial'
				)
			);
			$cpt_array = array_merge( $cpt_array, $t_array );
		}elseif( $cpt == 'team' ){
			$t_array = array(
				array(
					'id'       => 'team-title-opt',
					'type'     => 'switch',
					'title'    => esc_html__( 'Team Title', 'pixzlo-core' ),
					'subtitle' => esc_html__( 'Enable/Disable team title on single team( not page title ).', 'pixzlo-core' ),
					'default'  => 1,
					'on'       => esc_html__( 'Enable', 'pixzlo-core' ),
					'off'      => esc_html__( 'Disable', 'pixzlo-core' ),
				),
				array(
					'id'       => 'cpt-team-slug',
					'type'     => 'text',
					'title'    => esc_html__( 'Team Slug', 'pixzlo-core' ),
					'desc'     => esc_html__( 'Enter team slug for register custom post type.', 'pixzlo-core' ),
					'default'  => 'team'
				)
			);
			$cpt_array = array_merge( $cpt_array, $t_array );
		}elseif( $cpt == 'event' ){
			$t_array = array(
				array(
					'id'       => 'event-title-opt',
					'type'     => 'switch',
					'title'    => esc_html__( 'Event Title', 'pixzlo-core' ),
					'subtitle' => esc_html__( 'Enable/Disable event title on single event( not page title ).', 'pixzlo-core' ),
					'default'  => 1,
					'on'       => esc_html__( 'Enable', 'pixzlo-core' ),
					'off'      => esc_html__( 'Disable', 'pixzlo-core' ),
				),
				array(
					'id'       => 'cpt-event-slug',
					'type'     => 'text',
					'title'    => esc_html__( 'Event Slug', 'pixzlo-core' ),
					'desc'     => esc_html__( 'Enter event slug for register custom post type.', 'pixzlo-core' ),
					'default'  => 'event'
				),
				array(
					'id'       => 'cpt-event-layout',
					'type'     => 'select',
					'title'    => esc_html__( 'Event Layout', 'pixzlo-core' ),
					'desc'     => esc_html__( 'Select single event layout model.', 'pixzlo-core' ),
					'options'  => array(
						'1'		=> esc_html__( 'Model 1', 'pixzlo-core' ),
						'2'		=> esc_html__( 'Model 2', 'pixzlo-core' )
					),
					'default'  => '1'
				),
			);
			$cpt_array = array_merge( $cpt_array, $t_array );
		}elseif( $cpt == 'service' ){
			$t_array = array(
				array(
					'id'       => 'service-title-opt',
					'type'     => 'switch',
					'title'    => esc_html__( 'Service Title', 'pixzlo-core' ),
					'subtitle' => esc_html__( 'Enable/Disable service title on single service( not page title ).', 'pixzlo-core' ),
					'default'  => 1,
					'on'       => esc_html__( 'Enable', 'pixzlo-core' ),
					'off'      => esc_html__( 'Disable', 'pixzlo-core' ),
				),
				array(
					'id'       => 'cpt-service-slug',
					'type'     => 'text',
					'title'    => esc_html__( 'Service Slug', 'pixzlo-core' ),
					'desc'     => esc_html__( 'Enter service slug for register custom post type.', 'pixzlo-core' ),
					'default'  => 'service'
				)
			);
			$cpt_array = array_merge( $cpt_array, $t_array );
		}
		
		Redux::setSection( $opt_name, array(
			'title'      => sprintf( esc_html__( '%1$s', 'pixzlo-core' ), $cpt_name ),
			'id'         => 'cpt-'.$cpt,
			'desc'       => sprintf( esc_html__( 'This is CPT %1$s setting.', 'pixzlo-core' ), $cpt_name ),
			'subsection' => true,
			'fields'     => $cpt_array
		) );
		
	}
}

//Minifier Tab
Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'Minifier', 'pixzlo-core' ),
	'id'               => 'minifier',
	'desc'             => esc_html__( 'These are minifier general settings of pixzlo theme', 'pixzlo-core' ),
	'customizer_width' => '400px',
	'icon'             => 'fa fa-file-archive-o'
) );
		
Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Minifier General', 'pixzlo-core' ),
	'id'         => 'minifier-general',
	'desc'       => esc_html__( 'This is the setting for minifier general', 'pixzlo-core' ),
	'subsection' => true,
	'fields'     => array(
		array(
			'id'       => 'js-minify',
			'type'     => 'switch',
			'title'    => esc_html__( 'JS Minify', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'Enable/Disable minify js for website.', 'pixzlo-core' ),
			'default'  => 1,
			'on'       => esc_html__( 'Enabled', 'pixzlo-core' ),
			'off'      => esc_html__( 'Disabled', 'pixzlo-core' ),
		),
		array(
			'id'       => 'css-minify',
			'type'     => 'switch',
			'title'    => esc_html__( 'CSS Minify', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'Enable/Disable minify css for website.', 'pixzlo-core' ),
			'default'  => 1,
			'on'       => esc_html__( 'Enabled', 'pixzlo-core' ),
			'off'      => esc_html__( 'Disabled', 'pixzlo-core' ),
		),
	)
) );

//Maintenance Tab
Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'Maintenance', 'pixzlo-core' ),
	'id'               => 'maintenance',
	'desc'             => esc_html__( 'These are the maintenance settings of Pixzlo theme', 'pixzlo-core' ),
	'customizer_width' => '400px',
	'icon'             => 'fa fa-sliders'
) );

Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Maintenance General', 'pixzlo-core' ),
	'id'         => 'maintenance-general',
	'desc'       => esc_html__( 'This is the setting for maintenance general', 'pixzlo-core' ),
	'subsection' => true,
	'fields'     => array(
		array(
			'id'       => 'maintenance-mode',
			'type'     => 'switch',
			'title'    => esc_html__( 'Maintenance Mode Option', 'pixzlo-core' ),
			'subtitle' => esc_html__( 'Enable/Disable maintenance mode.', 'pixzlo-core' ),
			'default'  => 0,
			'on'       => esc_html__( 'Enable', 'pixzlo-core' ),
			'off'      => esc_html__( 'Disable', 'pixzlo-core' ),
		),
		array(
			'id'       => 'maintenance-type',
			'type'     => 'select',
			'title'    => esc_html__( 'Maintenance Type', 'pixzlo-core' ),
			'desc'     => esc_html__( 'Select maintenance mode page coming soon or maintenance.', 'pixzlo-core' ),
			'options'  => array(
				'cs'		=> esc_html__( 'Coming Soon Default', 'pixzlo-core' ),
				'mn'		=> esc_html__( 'Maintenance Default', 'pixzlo-core' ),
				'cus'		=> esc_html__( 'Custom', 'pixzlo-core' )
			),
			'required' 		=> array( 'maintenance-mode', '=', 1)
		),
		array(
			'id'       => 'maintenance-custom',
			'type'     => 'select',
			'title'    => esc_html__( 'Maintenance Custom Page', 'pixzlo-core' ),
			'desc'     => esc_html__( 'Enter service slug for register custom post type.', 'pixzlo-core' ),
			'data'  => 'pages',
			'required' 		=> array( 'maintenance-type', '=', "cus")
		),
		array(
			'id'       => 'maintenance-phone',
			'type'     => 'text',
			'title'    => esc_html__( 'Phone Number', 'pixzlo-core' ),
			'desc'     => esc_html__( 'Enter phone number shown on when maintenance mode actived.', 'pixzlo-core' ),
			'default'  => ''
		),
		array(
			'id'       => 'maintenance-email',
			'type'     => 'text',
			'title'    => esc_html__( 'Email Id', 'pixzlo-core' ),
			'desc'     => esc_html__( 'Enter email id shown on when maintenance mode actived.', 'pixzlo-core' ),
			'default'  => ''
		),
		array(
			'id'		=>'maintenance-address',
			'type'		=> 'textarea',
			'title'		=> esc_html__( 'Address', 'pixzlo' ), 
			'desc'		=> esc_html__( 'Place here your address and info.', 'pixzlo' ),
			'validate'	=> 'html_custom',
			'allowed_html'	=> array(
				'a' => array(
				'href' => array(),
					'title' => array()
				),
				'br' => array(),
				'em' => array(),
				'strong' => array(),
				'p' => array()
			)
		)
	)
) );

/*
 * <--- END SECTIONS
 */

/*
*
* --> Action hook examples
*
*/
// If Redux is running as a plugin, this will remove the demo notice and links
add_action( 'redux/loaded', 'remove_demo' );
/**
 * Removes the demo link and the notice of integrated demo from the redux-framework plugin
 */
if ( ! function_exists( 'remove_demo' ) ) {
	function remove_demo() {
		// Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
		if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
			remove_filter( 'plugin_row_meta', array(
				ReduxFrameworkPlugin::instance(),
				'plugin_metalinks'
			), null, 2 );
			// Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
			remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
		}
	}
}