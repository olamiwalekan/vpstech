<?php

/**

 * Template coming soon default

 */

 

 //get maintenance header

 require_once( PIXZLO_CORE_DIR . 'maintenance/header.php' );

 

 $pixzlo_option = get_option( 'pixzlo_options' );

 $address = isset( $pixzlo_option['maintenance-address'] ) ? $pixzlo_option['maintenance-address'] : '';

 $email = isset( $pixzlo_option['maintenance-email'] ) ? $pixzlo_option['maintenance-email'] : '';

 $phone = isset( $pixzlo_option['maintenance-phone'] ) ? $pixzlo_option['maintenance-phone'] : '';

 

?>



<div class="container text-center maintenance-wrap">



	<div class="row">

		<div class="col-md-12">

			<h1 class="maintenance-title"><?php esc_html_e( 'Under Maintenance', 'pixzlo' ); ?></h1>

		</div>

	</div>



	<div class="row">

		<div class="col-md-4">

			<h4><?php esc_html_e( 'Phone', 'pixzlo' ); ?></h4>

			<div class="maintenance-phone">

				<?php echo esc_html(  $phone ); ?>

			</div>

		</div>

		<div class="col-md-4">

			<h4><?php esc_html_e( 'Address', 'pixzlo' ); ?></h4>

			<div class="maintenance-address">

				<?php echo wp_kses_post( $address ); ?>

			</div>

		</div>

		<div class="col-md-4">

			<h4><?php esc_html_e( 'Email', 'pixzlo' ); ?></h4>

			<div class="maintenance-email">

				<?php echo esc_html(  $email ); ?>

			</div>

		</div>

	</div>

	

	<div class="row">

		<div class="col-md-12 maintenance-footer">

			<p><?php esc_html_e( 'We are currently in maintenance mode. We will be back soon.', 'pixzlo' ); ?></p>

		</div>

	</div>

	

</div>



<?php

 //get maintenance header

 require_once( PIXZLO_CORE_DIR . 'maintenance/footer.php' );

?>