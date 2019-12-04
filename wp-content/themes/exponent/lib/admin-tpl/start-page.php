<?php
global $ExponentCore;
?>
<header class="be-start-header">
   <div class="header-wrapper clearfix">
    <div class="c-3">
    	<?php $themeinfo = wp_get_theme(); ?>
    	<div class="theme_preview">
    	<img height="180" src="<?php echo esc_url( $themeinfo->get_screenshot() ); ?>">
    	<span class="ves"><?php echo esc_html( $themeinfo->get('Version') ); ?></span>
    	</div>
    </div>
    <div class="c-9"><h1><?php esc_html_e( 'Welcome to ', 'exponent' ); ?><?php echo esc_html($ExponentCore['themeName']); ?></h1>
<p>Thank you for purchasing and using <?php echo esc_html($ExponentCore['themeName']); ?>. To get started quickly, please install all the required and recommended plugins and import a demo of your choice. Register your license and enjoy automatic theme updates. For information regarding the usage of the theme, please refer our <a href="<?php echo esc_url( $ExponentCore['documentation'] ); ?>" target="_blank">online documentation.</a></p>
	<span id="exponent-home-url" style="display:none;">
	<?php 
		echo esc_url( home_url() );		 
	?>
	</span>
    </div>
   </div>
	
</header>

<section class="be-start-content">

	<h2 class="nav-tab-wrapper">
		<a href="#" data-tab="be-news" class="nav-tab nav-tab-active"><?php esc_html_e( 'Getting Started', 'exponent' ); ?></a>
		<a href="#" data-tab="be-welcome" class="nav-tab"><?php esc_html_e( 'License', 'exponent' ); ?></a>
		<a href="#" data-tab="be-plugins" class="nav-tab"><?php esc_html_e( 'Install Plugins', 'exponent' ); ?></a>
		<a href="#" data-tab="be-import" class="nav-tab"><?php esc_html_e( 'Import', 'exponent' ); ?></a>
		<a href="#" class="nav-tab" data-tab="be-system-stat"><?php esc_html_e( 'System Status', 'exponent' ); ?></a>
		<?php do_action( 'be_start_tabs' ); ?>
	</h2>
	<div class="notifyjs"></div>
	<div class="nav-content current" id="be-news">
	<h2>Thank you for choosing <strong><?php echo esc_html( $ExponentCore['themeName'] ); ?>!</strong></h2>
	<p><?php esc_html_e( 'Getting started with Exponent is pretty simple just follow the below steps:', 'exponent' ); ?>
	<ol>
		<li><?php esc_html_e( 'Register your purchase by going to ', 'exponent' ); ?><a data-tab="be-welcome" href="#"><?php esc_html_e('License Tab', 'exponent' ) ?></a></li>
		<li><?php esc_html_e( 'Install & Activate Recommended and Required Plugins ', 'exponent' ); ?><a href="#" data-tab="be-plugins">Install Plugins</a></li>
		<li><?php esc_html_e( 'Import any of the demo content by going to ', 'exponent' ) ?><a data-tab="be-import" href="#">Import</a></li>
		<li><?php esc_html_e( 'That\'s it! Start Building your Website', 'exponent' ); ?></li>
	</ol>
	</p>
	<?php do_action( 'be_welcome_content' ); ?>
	</div>


	<div class="nav-content" id="be-welcome">
		<div class="token_check"></div>
		<form id="be_start_updater" method="post" action="options.php">
			<?php 
			$be_purchase_data = get_option('exponent_purchase_data', '');
			$be_purchase_code = '';
			if( !empty($be_purchase_data) && !empty( $be_purchase_data['theme_purchase_code'] ) ) {
				$be_purchase_code = $be_purchase_data['theme_purchase_code'];
			}		
			?>
			<p class=""><strong><?php esc_html_e( 'Please enter your theme purchase code to allow automatic updates', 'exponent' ); ?></strong></p>

			<input type="text" id="be_purchase_code" size="30" name="be_purchase_code" value="<?php echo esc_attr($be_purchase_code); ?>" class="widefat" />
			<?php echo wp_nonce_field('be_save_purchase_code', 'purchase_nonce', true, false); ?>
			<?php
			submit_button( esc_html__( 'Submit', 'exponent' ), 'primary', 'submit', true, null );
			?>
		</form>
		
		<h3>Where can I find the purchase code ?</h3>
		<p>To locate your purchase code you need to log into the ThemeForest account from which you purchase the theme and go to your "Downloads" page.

		Click on the Download button next to the theme and then on the "License Certificate & Purchase code" link. You can find the purchase code inside the downloaded license certificate.</p>
		<div class="be-newsletter">
			<h2>Subscribe</h2>
			<p>We constantly update our products with new features and bug fixes. We need a way to reach out to you regarding these updates. Get update notifications with details on what was changed or added. Know how to use the new features and learn about special instructions for certain updates. A smoother experience for you and less support for us. Occasionally we send mailers about our product promotions that helps you save money on new licenses or support renewals.  We hate spam as much as you do and your details are never shared with any 3rd party.
			</p>
			<form id="be-newsletter-form" method="post" action="options.php">
				<div class="clearfix">
				<?php 
					$be_newsletter_email = get_option('exponent_newsletter_email', '');	
				?>
				<input type="text" id="be-newsletter-email" size="30" name="be-newsletter-email" value="<?php echo esc_attr($be_newsletter_email); ?>" class="widefat" />
				<?php wp_nonce_field( 'subscribe_checker', 'be-newsletter-email-nonce', true ); ?>
				<div class="be-newsletter-submit-wrap">
					<div class="be-newsletter-spinner">
					</div>
					<?php
					submit_button( esc_html__( 'Submit', 'exponent' ), 'primary', 'submit', true, null );
					?>
				</div>
				</div>
			</form>
		</div>
		<?php do_action( 'exp_license_tpl' ); ?>
	</div>

	<div class="nav-content" id="be-import">
		<?php
	
		do_action( 'exp_import_tpl' );
		?>
	</div>


	<div class="nav-content" id="be-system-stat">
		<?php
		do_action( 'exp_systatus_tpl' );
		?>
	</div>

	<div class="nav-content" id="be-plugins">
	<?php exponent_get_plugins()->envato_setup_default_plugins(); ?>
	</div>
	<?php do_action( 'exp_tabs_content' ); ?>
</section>
<div class="loader"><span class="circle"></span></div>