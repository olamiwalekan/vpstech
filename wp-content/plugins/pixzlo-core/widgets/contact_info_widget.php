<?php

add_action( 'widgets_init', 'pixzlo_zozo_contact_info_widget' );

function pixzlo_zozo_contact_info_widget() {

	register_widget( 'pixzlo_zozo_contact_infos_widget' );

}

class pixzlo_zozo_contact_infos_widget extends WP_Widget {

	/**

	 * Widget setup.

	 */

	function __construct() {

		/* Widget settings. */

		$widget_ops = array( 'classname' => 'zozo_contact_info_widget', 'description' => esc_html__('A widget that displays an About widget', 'pixzlo-core') );

		/* Widget control settings. */

		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'zozo_contact_info_widget' );

		/* Create the widget. */

		parent::__construct( 'zozo_contact_info_widget', esc_html__('Pixzlo Contact Info', 'pixzlo-core'), $widget_ops, $control_ops );

		

	}

	/**

	 * How to display the widget on the screen.

	 */

	function widget( $args, $instance ) {

		extract( $args );

		/* Our variables from the widget settings. */

		$title = apply_filters('widget_title', $instance['title'] );

		$ctext = $instance['ctext'];

		$caddress = $instance['caddress'];

		$cphone = $instance['cphone'];

		$cmail = $instance['cmail'];

		

		/* Before widget (defined by themes). */

		echo wp_kses_post( $before_widget );

		/* Display the widget title if one was input (before and after defined by themes). */

		if ( $title )

			echo ( $title != '' ? wp_kses_post( $before_title . $title . $after_title ) : '' );

		?>

			

			<div class="contact-widget widget-content">

			

				<?php if($ctext) : ?>

				<p class="contact-text"><?php echo wp_kses_post($ctext); ?></p>

				<?php endif; ?>	

				

				<?php if( $caddress || $cphone || $cmail ) : ?>

				<div class="contact-widget-info">
				
					<?php if($cphone) : ?>

					<p class="contact-phone"><span class="icon-call-out icons theme-color"></span><span><?php echo esc_attr($cphone); ?></span></p>

					<?php endif; ?>	

					<?php if($caddress) : ?>

					<p class="contact-address"><span class="ti-location-pin theme-color"></span><span><?php echo wp_kses_post($caddress); ?></span></p>

					<?php endif; ?>	


					<?php if($cmail) : ?>

					<p class="contact-email"><span class="ti-email theme-color"></span><span><a href="mailto:<?php echo esc_attr($cmail); ?>"><?php echo esc_attr($cmail); ?></a></span></p>

					<?php endif; ?>	

				</div><!-- .contact-widget-info -->

				<?php endif; ?>	

			

			</div>

			

		<?php

		/* After widget (defined by themes). */

		echo wp_kses_post( $after_widget );

	}

	/**

	 * Update the widget settings.

	 */

	function update( $new_instance, $old_instance ) {

		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */

		$instance['title'] = sanitize_text_field( $new_instance['title'] );

		$instance['ctext'] = wp_kses_post( $new_instance['ctext'] );

		$instance['caddress'] = wp_kses_post( $new_instance['caddress'] );

		$instance['cphone'] = sanitize_text_field( $new_instance['cphone'] );

		$instance['cmail'] = is_email( $new_instance['cmail'] );

		return $instance;

	}

	function form( $instance ) {

		/* Set up some default widget settings. */

		$defaults = array( 'title' => esc_html__( 'Contact Info', 'pixzlo-core' ), 'ctext' => '', 'caddress' => '', 'cphone' => '', 'cmail' => '');

		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->

		<p>

			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title', 'pixzlo-core' ); ?></label>

			<input id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" style="width:96%;" type="text" />

		</p>

		

		<!-- Contact Text Message -->

		<p>

			<label for="<?php echo esc_attr( $this->get_field_id( 'ctext' ) ); ?>"><?php esc_html_e( 'Text Message', 'pixzlo-core' ); ?></label>

			<textarea id="<?php echo esc_attr( $this->get_field_id( 'ctext' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'ctext' ) ); ?>" style="width:96%;" type="text" rows="6"><?php echo esc_textarea( $instance['ctext'] ); ?></textarea>

		</p>

		

		<!-- Address -->

		<p>

			<label for="<?php echo esc_attr( $this->get_field_id( 'caddress' ) ); ?>"><?php esc_html_e( 'Address', 'pixzlo-core' ); ?></label>

			<textarea id="<?php echo esc_attr( $this->get_field_id( 'caddress' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'caddress' ) ); ?>" style="width:96%;" type="text" rows="6"><?php echo esc_textarea( $instance['caddress'] ); ?></textarea>

		</p>

		

		<!-- Phone Numbers -->

		<p>

			<label for="<?php echo esc_attr( $this->get_field_id( 'cphone' ) ); ?>"><?php esc_html_e( 'Phone Numbers', 'pixzlo-core' ); ?></label>

			<input id="<?php echo esc_attr( $this->get_field_id( 'cphone' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'cphone' ) ); ?>" value="<?php echo esc_attr( $instance['cphone'] ); ?>" style="width:96%;" type="text" />

		</p>

		

		<!-- Email -->

		<p>

			<label for="<?php echo esc_attr( $this->get_field_id( 'cmail' ) ); ?>"><?php esc_html_e( 'Email', 'pixzlo-core' ); ?></label>

			<input id="<?php echo esc_attr( $this->get_field_id( 'cmail' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'cmail' ) ); ?>" value="<?php echo esc_attr( $instance['cmail'] ); ?>" style="width:96%;" type="text" />

		</p>

	<?php

	}

}

?>