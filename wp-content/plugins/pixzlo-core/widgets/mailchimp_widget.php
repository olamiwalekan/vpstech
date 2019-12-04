<?php

add_action( 'widgets_init', 'pixzlo_mailchimp_load_widget' );
function pixzlo_mailchimp_load_widget() {
	
	register_widget( 'pixzlo_mailchimp_widget' );
}
class pixzlo_mailchimp_widget extends WP_Widget {
	private $default_failure_message;
	private $default_signup_text;
	private $default_success_message;
	private $default_title;
	private $successful_signup = false;
	private $subscribe_errors;
	private $api_key;
	
	/**
	 * Widget setup.
	 */
	function __construct() {
		/* Widget settings. */
		
		$widget_ops = array( 'classname' => 'pixzlo_mailchimp_widget', 'description' => esc_html__('Mailchimp Widget', 'pixzlo-core') );
		/* Widget control settings. */
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'pixzlo_mailchimp_widget' );
		
		$this->default_failure_message = esc_html__('There was a problem processing your submission.', 'pixzlo-core');
		$this->default_signup_text = esc_html__('Join now!', 'pixzlo-core');
		$this->default_success_message = esc_html__('Thank you for joining our mailing list. Please check your email for a confirmation link.', 'pixzlo-core');
		$this->default_title = esc_html__('Sign up for our mailing list.', 'pixzlo-core');
		$pixzlo_option = get_option( 'pixzlo_options' );
		$this->api_key = isset( $pixzlo_option['mailchimp-api'] ) ? $pixzlo_option['mailchimp-api'] : '';
		
		/* Create the widget. */
		parent::__construct( 'pixzlo_mailchimp_widget', esc_html__('pixzlo Mailchimp', 'pixzlo-core'), $widget_ops, $control_ops );
	}
	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract($args);
		
		//$mcapi = new MCAPI($this->api_key);
		echo wp_kses_post( $before_widget );
		echo ( $instance['title'] != '' ? wp_kses_post( $before_title . $instance['title'] . $after_title ) : '' );
			?>	
			
			<form class="zozo-mc-form" id="<?php echo 'zozo-mc-form' . $this->number; ?>" method="post">
				<?php	
					if ($instance['subtitle']) {
				?>	
				<p class="zozo-mc-subtitle"><?php echo stripslashes($instance['subtitle']); ?></p>
				<p class="mc-aknowlegement" id="<?php echo 'zozo-mc-err' . $this->number; ?>"></p>
				<?php	
					}
					if ($instance['collect_first']) {
				?>
				<div class="form-group">
					<input type="text" placeholder="<?php esc_html_e('First Name', 'pixzlo-core'); ?>" class="form-control first-name" name="<?php echo 'zozo-mc-first_name' . $this->number; ?>" />
				</div>
				<?php
					}
					if ($instance['collect_last']) {
				?>	
				<div class="form-group">
					<input type="text" placeholder="<?php esc_html_e('Last Name', 'pixzlo-core'); ?>" class="form-control last-name" name="<?php echo 'zozo-mc-last_name' . $this->number; ?>" />
				</div>
				<?php	
					}
					$options = get_option($this->option_name);
				?>
					<input type="hidden" name="pixzlo_mc_number" value="<?php echo esc_attr( $this->number ); ?>" />
					<input type="hidden" name="pixzlo_mc_listid<?php echo esc_attr( $this->number ); ?>" value="<?php echo stripslashes($options[$this->number]['current_mailing_list']); ?>" />
					<input type="hidden" name="pixzlo_mc_success<?php echo esc_attr( $this->number ); ?>" value="<?php echo stripslashes($instance['success_message']); ?>" />
					<input type="hidden" name="pixzlo_mc_failure<?php echo esc_attr( $this->number ); ?>" value="<?php echo stripslashes($instance['failure_message']); ?>" />
					
					<div class="form-group" data-toggle="tooltip" data-placement="top">
					  <input type="text" class="form-control zozo-mc-email" id="zozo-mc-email-<?php echo esc_attr( $this->number ); ?>" placeholder="<?php esc_html_e('Email Address', 'pixzlo-core'); ?>" name="<?php echo 'zozo-mc-email' . esc_attr( $this->number ); ?>">
					</div>

					<input class="zozo-mc btn btn-default btn-block" data-id="<?php echo esc_attr( $this->number ); ?>" type="button" name="<?php echo stripslashes($instance['signup_text']); ?>" value="<?php echo stripslashes($instance['signup_text']); ?>" />
				</form>
				<!--Mailchimp Custom Script-->
				<?php
			echo wp_kses_post( $after_widget );
		}
	/**
	 * Update the widget settings.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		
		$instance['collect_first'] = ! empty($new_instance['collect_first']);
		
		$instance['collect_last'] = ! empty($new_instance['collect_last']);
		
		$instance['current_mailing_list'] = esc_attr($new_instance['current_mailing_list']);
		
		$instance['failure_message'] = esc_attr(stripslashes_deep($new_instance['failure_message']));
		
		$instance['signup_text'] = esc_attr(stripslashes_deep($new_instance['signup_text']));
		
		$instance['success_message'] = esc_attr(stripslashes_deep($new_instance['success_message']));
		
		$instance['subtitle'] = esc_attr(stripslashes_deep($new_instance['subtitle']));
		
		$instance['title'] = esc_attr(stripslashes_deep($new_instance['title']));
		return $instance;
	}
	function form( $instance ) {
	
		$defaults = array( 'title' => '', 'current_mailing_list' => '', 'signup_text' => '', 'collect_first' => '', 'collect_last' => '', 'subtitle' => '', 'success_message' => esc_html__('Success.', 'pixzlo-core'), 'failure_message' => esc_html__('Failure.', 'pixzlo-core'));
		$instance = wp_parse_args( (array) $instance, $defaults );
		
		//$mcapi = new MCAPI($this->api_key);
		
		$api_key = $this->api_key;
		
		if ($api_key){

			?>
			<h3><?php echo  esc_html__('General Settings', 'pixzlo-core');?></h3>
			<!-- Widget Title: Text Input -->
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'zozo-mc-title' ) ); ?>"><?php esc_html_e('Title:', 'pixzlo-core'); ?></label>
				<input  class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" type="text" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id('current_mailing_list') ); ?>"><?php echo esc_html__('Select a Mailing List :', 'pixzlo-core'); ?></label>				
				<?php
					$data = array(
						'fields' => 'lists'
					);					
					$url = 'https://' . substr($api_key,strpos($api_key,'-')+1) . '.api.mailchimp.com/3.0/lists/';
					$list_result = json_decode( pixzlo_mailchimp_list_curl_connect( $url, 'GET', $api_key, $data) );
				?>
				<select class="widefat" id="<?php echo esc_attr( $this->get_field_id('current_mailing_list') );?>" name="<?php echo esc_attr( $this->get_field_name('current_mailing_list') ); ?>">
					<?php	
					if( !empty( $list_result->lists ) ) {
						foreach( $list_result->lists as $list ){
							$selected = ( isset($instance['current_mailing_list']) && $instance['current_mailing_list'] == $list->id ) ? '1' : '';
							?>	
									<option <?php echo ( $selected == '1' ? ' selected="selected" ' : '' ); ?>value="<?php echo esc_attr( $list->id ); ?>"><?php echo esc_attr( $list->name ); ?></option>
							<?php
						}
					}
	?>
				</select>
			</p>
					<p>
						<label for="<?php echo esc_attr( $this->get_field_id('signup_text') ); ?>"><?php echo esc_html__('Sign Up Button Text :', 'pixzlo-core'); ?></label>
						<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('signup_text') ); ?>" name="<?php echo esc_attr( $this->get_field_name('signup_text') ); ?>" value="<?php echo esc_attr( $instance['signup_text'] ); ?>" type="text"  />
					</p>
					<h3><?php echo esc_html__('Personal Information', 'pixzlo-core'); ?></h3>
					<p>
						<input type="checkbox" class="checkbox" id="<?php echo esc_attr( $this->get_field_id('collect_first') ); ?>" name="<?php echo esc_attr( $this->get_field_name('collect_first') ); ?>" <?php echo checked($instance['collect_first'], true, false); ?> />
						<label for="<?php echo esc_attr( $this->get_field_id('collect_first') ); ?>"><?php echo esc_html__('Collect first name.', 'pixzlo-core'); ?></label>
						<br />
						<input type="checkbox" class="checkbox" id="<?php echo esc_attr( $this->get_field_id('collect_last') ); ?>" name="<?php echo esc_attr( $this->get_field_name('collect_last') ); ?>" <?php echo checked($instance['collect_last'], true, false); ?> />
						<label><?php echo esc_html__('Collect last name.', 'pixzlo-core'); ?></label>
					</p>
					<h3><?php echo esc_html__('Notifications', 'pixzlo-core'); ?></h3>
					<p>
						<label for="<?php echo esc_attr( $this->get_field_id('subtitle') ); ?>"><?php echo esc_html__('Sub Title:', 'pixzlo-core'); ?></label>
						<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id('subtitle') ); ?>" name="<?php echo esc_attr( $this->get_field_name('subtitle') ); ?>"><?php echo esc_attr( $instance['subtitle'] ); ?></textarea>
					</p>
					<p>
						<label for="<?php echo esc_attr( $this->get_field_id('success_message') ); ?>"><?php echo esc_html__('Success Message:', 'pixzlo-core'); ?></label>
						<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id('success_message') ); ?>" name="<?php echo esc_attr( $this->get_field_name('success_message') ); ?>"><?php echo esc_attr( $instance['success_message'] ); ?></textarea>
					</p>
					<p>
						<label for="<?php echo esc_attr( $this->get_field_id('failure_message') ); ?>"><?php echo esc_html__('Failure Message:', 'pixzlo-core'); ?></label>
						<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id('failure_message') ); ?>" name="<?php echo esc_attr( $this->get_field_name('failure_message') ); ?>"><?php echo esc_attr( $instance['failure_message'] ); ?></textarea>
					</p>
			<?php
			
		}
	}
		
}

if( ! function_exists('pixzlo_mailchimp') ) {
	function pixzlo_mailchimp(){
		$nonce = $_POST['nonce'];
		
		
	  
		if ( ! wp_verify_nonce( $nonce, 'pixzlo-mailchimp' ) )
			die ( esc_html__( 'Busted', 'pixzlo' ) );
		if( isset( $_POST['pixzlo_mc_number'] ) ) {
			
			$first_name = 'zozo-mc-first_name' . esc_attr( $_POST['pixzlo_mc_number'] );
			$last_name = 'zozo-mc-last_name' . esc_attr( $_POST['pixzlo_mc_number'] );
			$email = 'zozo-mc-email' . esc_attr( $_POST['pixzlo_mc_number'] );
			$success = 'pixzlo_mc_success' . esc_attr( $_POST['pixzlo_mc_number'] );
			$failure = 'pixzlo_mc_failure' . esc_attr( $_POST['pixzlo_mc_number'] );
			$listid = 'pixzlo_mc_listid' . esc_attr( $_POST['pixzlo_mc_number'] );
				
			/*$ato = new pixzloThemeOpt;
			$mc_key = $ato->pixzloThemeOpt( 'mailchimp-api' );
			$mcapi = new MCAPI( $mc_key );*/
			
			/*$merge_vars = array();
			$merge_vars['FNAME'] = isset($_POST[$first_name]) ? strip_tags($_POST[$first_name]) : '';
			$merge_vars['LNAME'] = isset($_POST[$last_name]) ? strip_tags($_POST[$last_name]) : '';*/
			
			$fname = isset($_POST[$first_name]) ? strip_tags($_POST[$first_name]) : '';
			$lname = isset($_POST[$last_name]) ? strip_tags($_POST[$last_name]) : '';
			$list_id = isset($_POST[$listid]) ? strip_tags($_POST[$listid]) : '';
			$uemail = isset($_POST[$email]) ? strip_tags($_POST[$email]) : '';

			$pixzlo_option = get_option( 'pixzlo_options' );
			$mc_key = isset( $pixzlo_option['mailchimp-api'] ) ? $pixzlo_option['mailchimp-api'] : '';
			
			$api_key = $mc_key;
			$list_id = $list_id;
			$email = $uemail;
			$memberID = md5(strtolower($email));
			
			$data = json_encode( array(
					'email_address' => esc_attr( $email ),
					'status' => 'subscribed',
					'merge_fields'  => [
						'FNAME'     => esc_attr( $fname ),
						'LNAME'     => esc_attr( $lname )
					]		
				)
			);
			
			$url = 'https://' . substr($api_key,strpos($api_key,'-')+1) . '.api.mailchimp.com/3.0/lists/'. esc_attr( $list_id ) .'/members/'. esc_attr( $memberID );
			$result = pixzlo_mailchimp_subscribe_curl_connect( $url, $api_key, $data);
			
			/*$subscribed = $mcapi->listSubscribe(strip_tags($_POST[$listid]), strip_tags($_POST[$email]), $merge_vars);
			if ($subscribed != false) {
				echo stripslashes($_POST[$success]);
			}else{
				echo stripslashes($_POST[$failure]);
			}*/
			
			if( $result == 200 ){
				echo stripslashes($_POST[$success]);
			}elseif( $result == 214 ){
				echo esc_html__( 'Already Subscribed', 'pixzlo' );
			}else{
				echo stripslashes($_POST[$failure]);
			}
			
		}
		die();
	}
	add_action('wp_ajax_nopriv_zozo-mc', 'pixzlo_mailchimp');
	add_action('wp_ajax_zozo-mc', 'pixzlo_mailchimp');
}

function pixzlo_mailchimp_subscribe_curl_connect( $url, $apiKey, $json = '' ) {
	
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $apiKey);
	curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
	$result = curl_exec($ch);
	
	$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	curl_close($ch);
	
	return $httpCode;
	
}

function pixzlo_mailchimp_list_curl_connect( $url, $request_type, $api_key, $data = array() ) {
	if( $request_type == 'GET' )
		$url .= '?' . http_build_query($data);
 
	$mch = curl_init();
	$headers = array(
		'Content-Type: application/json',
		'Authorization: Basic '. base64_encode( 'user:'. $api_key )
	);
	curl_setopt($mch, CURLOPT_URL, $url );
	curl_setopt($mch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($mch, CURLOPT_RETURNTRANSFER, true); // do not echo the result, write it into variable
	curl_setopt($mch, CURLOPT_CUSTOMREQUEST, $request_type); // according to MailChimp API: POST/GET/PATCH/PUT/DELETE
	curl_setopt($mch, CURLOPT_TIMEOUT, 10);
	curl_setopt($mch, CURLOPT_SSL_VERIFYPEER, false); // certificate verification for TLS/SSL connection
 
	if( $request_type != 'GET' ) {
		curl_setopt($mch, CURLOPT_POST, true);
		curl_setopt($mch, CURLOPT_POSTFIELDS, json_encode($data) ); // send data in json
	}
 
	return curl_exec($mch);
}