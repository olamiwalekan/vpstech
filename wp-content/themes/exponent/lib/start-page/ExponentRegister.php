<?php
/**
 * This class will save the purchase code to the database
 *
 * @since 1.0
 *
 * @package Exponent
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
if( !class_exists( 'ExponentRegister' ) ) {
	class ExponentRegister {
		private static $option_group_slug = 'exponent_register';

		private static $option_name = 'exponent_register';

		private static $option_section = 'be_start';

		private static $token;

		private static $theme_found = false;

		protected $core;

		function __construct($core)
		{
			$this->core = $core;
		}

		public function run() {		
			add_action('admin_init',array($this,'settings_field'));
			add_action('wp_ajax_be_save_purchase_code',array($this, 'save_purchase_code'));
			add_action('wp_ajax_be_newsletter_subscribe',array($this, 'be_newsletter_subscribe'));
			add_action( 'wp_ajax_BS_set_memory', array($this, 'ajax_set_memory_limit'), 10, 1 );
		}

		public function settings_field() {
			register_setting(self::$option_group_slug, self::$option_name,
				array($this, 'check_token')
			);

			add_settings_field('token',
				esc_html__( 'Token', 'exponent' ),
				array($this, 'render_token_field'),
				self::$option_group_slug
			);

		}


		public static function options_group_name() {
			return self::$option_group_slug;
		}

		public static function set_token($val) {
			self::$token = $val;
		}

		public static function get_token() {
			return self::$token;
		}


		public static function save_purchase_code() {
			if ( ! check_ajax_referer( 'be_save_purchase_code', 'security' ) || !isset( $_POST['token'] ) ) {
				echo '<div class="notic notic-warning ">Invalid Nonce</div>';
				wp_die();
			}		
			$purchase_code_data = array(
				'theme_purchase_code' => $_POST['token']
			);
            echo update_option('exponent_purchase_data', $purchase_code_data );
			wp_die();
		}	

		public function be_newsletter_subscribe() {
			if ( ! check_ajax_referer( 'subscribe_checker', 'security' ) ) {
				echo '<div class="notic notic-warning ">Invalid Nonce</div>';
				wp_die();
			}
			$email = $_POST['email'];
			$list_name = $_POST['list_name'];
			if( empty( $email ) ) {
				echo '<div class="notic notic-error ">Email cannot be empty</div>';
				wp_die();
			}		
			if( !is_email( $email ) ) {
				echo '<div class="notic notic-error ">Not a valid email</div>';
				wp_die();
			}
			$response = wp_remote_get( "https://www.brandexponents.com/subscribe/be-subscribe.php?email=$email&list_name=$list_name" );
			if( $response ) {
				if( update_option('exponent_newsletter_email', $email ) ) {
					echo '<div class="notic notic-success ">Email Saved Successfully</div>';
				} else {
					echo '<div class="notic notic-warning ">Unable to Save Email</div>';
				}
			}else {
				echo '<div class="notic notic-warning ">Unable to Save Email or Email Already in use</div>';
			}
			wp_die();
		}

	}
}
?>