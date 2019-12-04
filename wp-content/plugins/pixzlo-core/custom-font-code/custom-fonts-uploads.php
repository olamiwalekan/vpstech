<?php

echo '<h2 class="fonts-page-title">'. esc_html__( 'Pixzlo Fonts Uploads.', 'pixzlo-core' ) .'</h2>';

?>

<form id="fonts_upload" method="post" action="#" enctype="multipart/form-data">

	<input type="file" name="pixzlo_font_upload" id="pixzlo_font_upload"  multiple="false" />

	<?php wp_nonce_field( 'pixzlo_image_upload', 'pixzlo_image_upload_nonce' ); ?>

	<input id="submit_font_upload" name="submit_font_upload" type="submit" value="<?php esc_html_e( 'Upload', 'pixzlo-core' ) ?>" />

</form>

<p><?php esc_html_e( 'Notes: Custom fonts should be in this following format. .eot, .otf, .svg, .ttf, .wof', 'pixzlo-core' ) ?></p>

<p><?php esc_html_e( 'Font folder name only show as font name in theme option. So make folder name and font name are should be the same but font name like slug type.' ) ?></p>

<p><?php printf( '%1$s <strong>%2$s</strong> %3$s <strong>%4$s</strong>', esc_html__( 'Eg: Font folder name is -', 'pixzlo-core' ), esc_html__( '28 Days Later', 'pixzlo-core' ), esc_html__( ' font name like', 'pixzlo-core' ), esc_html__( ' 28-days-later.eot, 28-days-later.otf ...', 'pixzlo-core' ) ); ?></p>

<?php 



// Check that the nonce is valid, and the user can edit this post.

if ( isset( $_POST['submit_font_upload'] ) && isset( $_FILES['pixzlo_font_upload'] ) ) {

	// The nonce was valid and the user has the capabilities, it is safe to continue.

	

	$accepted_types = array('application/zip', 'application/octet-stream');

	$file_type = $_FILES['pixzlo_font_upload']['type'];

	

	if( in_array( $file_type, $accepted_types ) ){

		// These files need to be included as dependencies when on the front end.

		

		require_once( ABSPATH . 'wp-admin/includes/image.php' ); 

		require_once( ABSPATH . 'wp-admin/includes/file.php' );

		require_once( ABSPATH . 'wp-admin/includes/media.php' );

		

		// Let WordPress handle the upload.

		//delete_option( 'pixzlo_custom_fonts_names' );

		// Remember, 'pixzlo_image_upload' is the name of our file input in our form above.

		$file_name = "'". pathinfo($_FILES['pixzlo_font_upload']['name'], PATHINFO_FILENAME) . "'";

		if ( get_option( 'pixzlo_custom_fonts_names' ) ) {

			$custom_fonts_names = get_option( 'pixzlo_custom_fonts_names' );

			$custom_fonts_names = array_merge( $custom_fonts_names, array( $file_name => $file_name ) );

		}else{

			$custom_fonts_names = array( $file_name => $file_name );

		}



		WP_Filesystem();

		$destination = wp_upload_dir();

		$destination_path = $destination['basedir'] . '/custom-fonts/';

		$unzipfile = unzip_file( $_FILES['pixzlo_font_upload']['tmp_name'], $destination_path);

		

		update_option( 'pixzlo_custom_fonts_names', $custom_fonts_names );

		

		echo esc_html__( 'Fonts Uploaded Successfully', 'pixzlo-core' );

		

	}else{

		echo esc_html__( 'Invalid File Type', 'pixzlo-core' );

	}



}



//showing Custom Fonts Table

pixzlo_custom_fonts_table();



