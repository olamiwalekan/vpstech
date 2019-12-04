<?php

add_action( 'widgets_init', 'pixzlo_zozo_fb_like_widget' );

function pixzlo_zozo_fb_like_widget() {

	register_widget( 'pixzlo_zozo_fb_widget' );

}

class pixzlo_zozo_fb_widget extends WP_Widget {

	/**

	 * Widget setup.

	 */

	function __construct() {

		/* Widget settings. */

		$widget_ops = array( 'classname' => 'zozo_fb_widget', 'description' => esc_html__('A widget that displays your latest posts from all categories or a certain', 'pixzlo-core') );

		/* Widget control settings. */

		$control_ops = array('id_base' => 'zozo_fb_widget' );

		/* Create the widget. */

		parent::__construct( 'zozo_fb_widget', esc_html__('Facebook Like', 'pixzlo-core'), $widget_ops, $control_ops );

		

	}

	//Category Widget with Count

	/**

	 * How to display the widget on the screen.

	 */

	function widget( $args, $instance ) {

		extract( $args );

		/* Our variables from the widget settings. */

		$title = apply_filters('widget_title', $instance['title'] );

		$fbname = $instance['fbname'];

		$fblink = $instance['fblink'];

		/* Before widget (defined by themes). */

		echo wp_kses_post( $before_widget );

		

		/* Display the widget title if one was input (before and after defined by themes). */

		if ( $title )

			echo ( $title != '' ? wp_kses_post( $before_title . $title . $after_title ) : '' );

			

			//show content

			?>

				

				<div class="fb-like widget-content">

					<div id="fb-root"></div>

					<script>(function(d, s, id) {

					  var js, fjs = d.getElementsByTagName(s)[0];

					  if (d.getElementById(id)) return;

					  js = d.createElement(s); js.id = id;

					  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";

					  fjs.parentNode.insertBefore(js, fjs);

					}(document, 'script', 'facebook-jssdk'));</script>

					<div class="fb-page" data-href="<?php echo esc_url($fblink); ?>" data-tabs="banner" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="<?php echo esc_url($fblink); ?>"><a href="<?php echo esc_url($fblink); ?>"><?php echo esc_attr($fbname); ?></a></blockquote></div></div>

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

		$instance['fblink'] = esc_url($new_instance['fblink']);

		$instance['fbname'] = sanitize_text_field( $new_instance['fbname'] );

		return $instance;

	}

	function form( $instance ) {

		/* Set up some default widget settings. */

		$defaults = array( 'title' => __('FB Like', 'pixzlo-core'), 'fblink' => '', 'fbname' => '');

		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->

		<p>

			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e('Title:', 'pixzlo-core'); ?></label>

			<input  type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" type="text"  /> 

		</p>

		

		<!-- Fb like Name -->

		<p>

			<label for="<?php echo esc_attr( $this->get_field_id( 'fbname' ) ); ?>"><?php esc_html_e('Facebook Profile Name:', 'pixzlo-core'); ?></label>

			<input  type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'fbname' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'fbname' ) ); ?>" value="<?php echo esc_attr( $instance['fbname'] ); ?>" type="text"  /> 

		</p>

		

		<!-- Fb like Link -->

		<p>

			<label for="<?php echo esc_attr( $this->get_field_id( 'fblike' ) ); ?>"><?php esc_html_e('Facebook Link:', 'pixzlo-core'); ?></label>

			<input  type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'fblink' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'fblink' ) ); ?>" value="<?php echo esc_url( $instance['fblink'] ); ?>" type="text"  /> 

		</p>

		

	<?php

	}

}

?>