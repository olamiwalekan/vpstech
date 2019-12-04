<?php
load_theme_textdomain( 'exponent', get_template_directory() . '/languages' );
add_filter( 'auto_update_theme', '__return_true' );
if ( ! isset( $content_width ) ) {
	$content_width = 1160;
}
add_editor_style('css/custom-editor-style.css'); 


/* -------------------------------------------
			Theme Setup
---------------------------------------------  */

if ( ! function_exists( 'exponent_theme_setup' ) ) {
	function exponent_theme_setup() {
		register_nav_menu( 'main_nav', 'Main Menu' );
		register_nav_menu( 'footer_nav', 'Footer Menu' );	
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'post-formats', array( 'gallery', 'image', 'quote', 'video', 'audio','link' ) );
		add_theme_support( 'tatsu-global-sections' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'custom-header' );
		add_theme_support( 'custom-background' );
		add_theme_support( 'tatsu-header-builder' );
		add_theme_support( 'tatsu-footer-builder' );
		add_theme_support( 'custom-logo', array(
			'height'      => 100,
			'width'       => 400,
			'flex-width' => true,
		) );
	}
	add_action( 'after_setup_theme', 'exponent_theme_setup' );
}


/* ---------------------------------------------  */
// Welcome Screen
/* ---------------------------------------------  */

require_once( get_template_directory().'/lib/start-page/ExponentRegister.php');
require_once( get_template_directory().'/lib/start-page/ExponentAdminMenu.php');
require_once( get_template_directory().'/lib/start-page/ExponentInstallPlugins.php');
require_once( get_template_directory().'/lib/start-page/ExponentRedirect.php');
require_once( get_template_directory().'/lib/admin-tpl/extra.php');

if( !function_exists( 'exponent_config' ) ) {
	function exponent_config($ExponentCore) {
		$ExponentCore->offsetSet('themeName','Exponent');
		$ExponentCore->offsetSet('documentation','https://exponentwptheme.com/documentation');
		$ExponentCore->offsetSet('themePath', get_stylesheet_directory());
		$ExponentCore->offsetSet('themeUri', get_stylesheet_directory_uri());
		$ExponentCore['exponent_admin_menu'] = new ExponentAdminMenu($ExponentCore);
		$ExponentCore['exponent_register'] = new ExponentRegister($ExponentCore);
		$ExponentCore['exponent_plugins'] = new ExponentInstallPlugins($ExponentCore);
		$ExponentCore['exponent_redirect'] = new ExponentRedirect($ExponentCore);
	}
	add_filter( 'exponent_demos_config', 'exponent_config', 10, 1 );
}


if( !function_exists( 'exponent_core' ) ) {
	function exponent_core() {
		if(!class_exists('ExponentDemosCore')) {
			$ExponentCore = array();
			global $ExponentCore;
			$ExponentCore['themeName'] = 'Exponent';
			$ExponentCore['themePath'] = get_stylesheet_directory();
			$ExponentCore['documentation'] = 'https://exponentwptheme.com/documentation';
			$start_menu = new ExponentAdminMenu($ExponentCore);
			$updater = new ExponentRegister($ExponentCore);
			$default_plugins = new ExponentInstallPlugins($ExponentCore);
			$redirect = new ExponentRedirect($ExponentCore);
			$start_menu->run();
			$updater->run();
			$default_plugins->run();
			$redirect->run();
		}
	}
	add_action( 'init', 'exponent_core', 10, 1 );
}


/* ---------------------------------------------  */
// Includes
/* ---------------------------------------------  */

//Core Helpers
require_once trailingslashit( get_template_directory() ) . 'inc/helpers/theme-helpers.php';
require_once trailingslashit( get_template_directory() ) . 'inc/helpers/be-helpers.php';
require_once trailingslashit( get_template_directory() ) . 'inc/helpers/helpers.php';

//Admin Options
require_once trailingslashit( get_template_directory() ) . 'inc/admin/init.php';

//Widgets
require_once trailingslashit( get_template_directory() ) . 'inc/widgets/init.php';

//Integrations
include_once trailingslashit( get_template_directory() ) . 'inc/integrations/init.php';

//WooCommerce
if ( be_themes_is_woocommerce_activated() ) {
	require_once trailingslashit( get_template_directory() ) . 'woocommerce/exponent-woo-functions.php';
}


/* ---------------------------------------------  */
// Specifying the various image sizes for theme
/* ---------------------------------------------  */

if ( ! function_exists( 'be_themes_image_sizes' ) ) {
	function be_themes_image_sizes( $sizes ) {
		global $_wp_additional_image_sizes;
		if ( empty( $_wp_additional_image_sizes ) )
			return $sizes;
		foreach ( $_wp_additional_image_sizes as $id => $data ) {
			if ( !isset($sizes[$id]) )
				$sizes[$id] = ucfirst( str_replace( '-', ' ', $id ) );
		}
		return $sizes;
	}
}
if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'exponent-blog-image', 1160, 700, true);
	add_image_size( 'exponent-blog-image-with-aspect-ratio', 1160, 0, true);
	add_image_size( 'exponent-carousel-thumb', 0, 50, true );

	add_filter( 'image_size_names_choose', 'be_themes_image_sizes' );
}


/* ---------------------------------------------  */
// Enqueue Stylesheets
/* ---------------------------------------------  */

if ( ! function_exists( 'be_themes_add_styles' ) ) {
	function be_themes_add_styles() {		
		
		$theme_version = be_themes_get_theme_info( 'Version' );
		$theme_name = be_themes_get_theme_info( 'name' );
		$theme_name = lcfirst( $theme_name );
		$suffix =  be_themes_should_minify_assets() ? '.min' : '';
		$cdn_address = be_themes_get_option( 'cdn_address' );
		$template_directory_url = get_template_directory_uri();
		$stylesheet_url = get_stylesheet_uri();
		if( !empty( $cdn_address ) ) {
			$site_url = get_site_url();
			if( false !== strpos( $template_directory_url, $site_url ) ) {
				$template_directory_url = str_replace( $site_url, $cdn_address, $template_directory_url );
			}
			if( false !== strpos( $stylesheet_url, $site_url ) ) {
				$stylesheet_url = str_replace( $site_url, $cdn_address, $stylesheet_url );
			}
		}

		wp_enqueue_style( 'exponent-core-icons', trailingslashit( $template_directory_url ) . 'fonts/icons.css', array(), $theme_version );
		wp_enqueue_style( 'exponent-vendor', trailingslashit( $template_directory_url ) . 'css/vendor/vendor' . $suffix . '.css', array(), $theme_version );
		wp_enqueue_style( 'exponent-main-css', trailingslashit( $template_directory_url ) . 'css/main' . $suffix . '.css', array( 'exponent-vendor' ), $theme_version );		
		wp_register_style( 'exponent-style-css', $stylesheet_url, array( 'exponent-main-css' ), $theme_version );
		wp_enqueue_style( 'exponent-style-css' );

	}
	add_action( 'wp_enqueue_scripts', 'be_themes_add_styles');
}


/* ---------------------------------------------  */
// Enqueue scripts
/* ---------------------------------------------  */

if ( ! function_exists( 'be_themes_add_scripts' ) ) {
	function be_themes_add_scripts() {

		$theme_info = be_themes_get_theme_info();
		$theme_name = lcfirst( $theme_info[ 'name' ] );
		$main_script_name = $theme_name . '-main-js';
		$theme_version = $theme_info[ 'version' ];
		$query_string = '?ver=' . $theme_version; 
		$suffix =  be_themes_should_minify_assets() ? '.min' : '';
		$cdn_address = be_themes_get_option( 'cdn_address' );
		$template_directory_url = get_template_directory_uri();
		$vendor_scripts_url = trailingslashit( $template_directory_url ) . 'js/vendor/';
		if( !empty( $cdn_address ) ) {
			$site_url = get_site_url();
			if( false !== strpos( $template_directory_url, $site_url ) ) {
				$template_directory_url = str_replace( $site_url, $cdn_address, $template_directory_url );
				$vendor_scripts_url 	= trailingslashit( $template_directory_url ) . 'js/vendor/';
			}
		}

		wp_enqueue_script( 'asyncloader', trailingslashit( $template_directory_url ) . 'js/vendor/asyncloader' . $suffix . '.js', array( 'jquery' ), $theme_version , true );
		wp_enqueue_script( 'be-script-helpers', trailingslashit( $template_directory_url ) . 'js/helpers' . $suffix . '.js', array( 'jquery' ), $theme_version, true );
		wp_enqueue_script( 'debouncedresize', trailingslashit( $template_directory_url ) . 'js/vendor/debouncedresize' . $suffix . '.js', array( 'jquery' ), $theme_version, true );
		wp_enqueue_script( 'modernizr', trailingslashit( $template_directory_url ) . 'js/vendor/modernizr' . $suffix . '.js', $theme_version, false );
		wp_enqueue_script( $main_script_name, trailingslashit( $template_directory_url ) . 'js/main' . $suffix . '.js', array( 'jquery', 'be-script-helpers', 'asyncloader', 'debouncedresize' ), $theme_version, true );
		
		

		$script_dependencies = array();
		foreach( glob( get_template_directory() . '/js/vendor/*' . $suffix . '.js' ) as $dependency ) {
			if( '.min' === $suffix || false === strpos( $dependency, '.min.js' ) ) { 
				$current_index = basename( $dependency, $suffix.'.js' );
				$cur_dep = add_query_arg( 'ver',  $theme_version, $vendor_scripts_url . basename( $dependency ) );
				$script_dependencies[ $current_index ] = esc_url( $cur_dep );
			}
		}
		
		wp_localize_script(
			$main_script_name, 
			$theme_name . 'ThemeConfig', 
			array(
				'vendorScriptsUrl' => $vendor_scripts_url,
				'dependencies' => $script_dependencies,
				'ajaxurl'	=> esc_url( admin_url( 'admin-ajax.php' ) ),
				'version'	=> $theme_version
			) 
		);
		
	}
	add_action( 'wp_enqueue_scripts', 'be_themes_add_scripts' );
}


/* ---------------------------------------------  */
// Register Custom Font - Metropolis
/* ---------------------------------------------  */

if( !function_exists( 'exponent_register_custom_font' ) ) {
	function exponent_register_custom_font() {
		$metropolis = array(
			'name' => 'Metropolis',
			'src' => get_template_directory_uri().'/fonts/metropolis.css',
			'variants' => array(
				'300' 		=> 'Book 300',
				'400' 		=> 'Normal 400',
				'500' 		=> 'Medium 500',
				'600' 		=> 'Semi Bold 600',
				'700' 		=> 'Bold 700',
			)
		);
		typehub_register_font( $metropolis );
	}
	add_action( 'typehub_register_font', 'exponent_register_custom_font' );
}


/* ---------------------------------------------  */
// Default Typography when Typehub isn't active
/* ---------------------------------------------  */

if( !function_exists( 'exponent_default_typography' ) ) {
    function exponent_default_typography() {
		$typehub_store = get_option('typehub_data');
        if( !class_exists( 'Typehub' ) || empty( $typehub_store ) ) {
            $typehub_config = array();
            $css = '';
            foreach( glob( trailingslashit( get_template_directory() ) . 'inc/integrations/typehub/*.php' ) as $config_path ){
                $file_name = basename( $config_path, '.php' );
                if( 'typehub' === $file_name ) {
                    continue;
                }
                $new_config = include $config_path;
                $typehub_config = array_merge( $typehub_config, $new_config );
            }
            
            foreach( $typehub_config as $category => $fields ) {
                foreach( $fields as $key => $field ) {
					$selector = $field['selector'].', .'.$key;
                    $css .= $selector.' {';
                    foreach( $field['options'] as $property => $value ) {
                        if( 'font-family' === $property ) {
                            $value = '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif';
						} 
						if( 'letter-spacing' === $property  ) {
							continue;
						}
						if( 'font-variant' === $property ) {
							$css .= 'font-weight:'.be_extract_font_weight( $value ).';';
							$css .= 'font-style:'.be_extract_font_style( $value ).';';
						} else {
							$css .= $property.':'.$value.';';
						}
                    }
                    $css .= '}';
                }
            }
			wp_add_inline_style( 'exponent-main-css', $css );
        }
    }
    add_action( 'wp_enqueue_scripts', 'exponent_default_typography' );
}

/* ---------------------------------------------  */
// Automatic Theme Updates
/* ---------------------------------------------  */

require_once( get_template_directory().'/inc/classes/theme-update-checker.php' );
$exponent_update_checker = new ThemeUpdateChecker(
    'exponent',
    'https://brandexponents.com/be-plugins/exponent-purchase-verifier.php'
);

if( !function_exists( 'exponent_autoupdate_verify' ) ) {
	function exponent_autoupdate_verify( $query_args ) {
		$exponent_purchase_data = get_option('exponent_purchase_data', '' );
		if(is_array($exponent_purchase_data) && array_key_exists('theme_purchase_code', $exponent_purchase_data)){
			$query_args['purchase_key'] = $exponent_purchase_data['theme_purchase_code'];
		}else{
			$query_args['purchase_key'] = '';
		}

		return $query_args;
	}
	add_filter ('tuc_request_update_query_args-exponent','exponent_autoupdate_verify');
}



add_action('template_redirect', 'exponent_maintenance_mode');
function exponent_maintenance_mode() {
	$is_maintenance_mode_on = !empty( be_themes_get_option('maintenance_mode_on') ) ? true : false;
    if ( $is_maintenance_mode_on && (!current_user_can('edit_themes') || !is_user_logged_in())) {
		include(TEMPLATEPATH . '/maintenance-mode.php');
        die();
    }
}


add_action( 'admin_notices', 'exponent_maintenance_mode_notice' );
function exponent_maintenance_mode_notice() {
	$is_maintenance_mode_on = !empty( be_themes_get_option('maintenance_mode_on') ) ? true : false;
	if( $is_maintenance_mode_on ){
		?>
		<div class="exponent-maintenance-mode notice notice-warning">
			<p><?php _e( 'Maintenance Mode is <strong>turned on</strong>. Please don\'t forget to <a href="'.admin_url( '/customize.php?autofocus[section]=global_theme_options' ).'">turn it off</a> once you are done.', 'exponent' ); ?></p>
		</div>
		<?php
	}
}


add_action('admin_print_styles', 'be_themes_metabox_remove_notices');
if ( !function_exists('be_themes_metabox_remove_notices') ) {
	function be_themes_metabox_remove_notices(){
		echo '<style>';
		echo '#meta-box-conditional-logic-update,#meta-box-show-hide-update,#meta-box-tabs-update,#meta-box-notification,.rwmb-activate-license{
			display:none;
		}';
		echo '</style>';
	}
}

add_action ( 'admin_print_footer_scripts' , 'be_print_custom_admin_side_scripts' );
if( !function_exists('be_print_custom_admin_side_scripts') ) {
	function be_print_custom_admin_side_scripts(){
		$current_screen = get_current_screen()->base;
		if( $current_screen == 'plugins' ){
			echo '<script>';
				echo "jQuery('.wp-list-table.plugins #the-list').find('tr[data-slug = meta-box-show-hide] td span a:contains(Activate License)').css('display','none');";
				echo "jQuery('.wp-list-table.plugins #the-list').find('tr[data-slug = meta-box-conditional-logic] td span a:contains(Activate License)').css('display','none');";
				echo "jQuery('.wp-list-table.plugins #the-list').find('tr[data-slug = meta-box-tabs] td span a:contains(Activate License)').css('display','none');";
				echo "jQuery('.wp-list-table.plugins #the-list').find('tr[data-slug = meta-box] td span a:contains(Go Pro)').css('display','none');";
			echo '</script>';
		}
	}
}

?>