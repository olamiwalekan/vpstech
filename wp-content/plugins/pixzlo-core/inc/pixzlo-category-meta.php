<?php

/**

 * Category Meta Field

 **/

if ( ! class_exists( 'PixzloCategoryMeta' ) ) {



class PixzloCategoryMeta {



	public function __construct() {

		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_media_scripts' ) );

	}

 

	public function admin_enqueue_media_scripts(){

		wp_enqueue_media();

	}

 

 /*

  * Initialize the class and start calling our hooks and filters

  * @since 1.0.0

 */

 public function init() {

	add_action( 'category_add_form_fields', array ( $this, 'add_category_image' ), 10, 2 );

	add_action( 'created_category', array ( $this, 'save_category_image' ), 10, 2 );

	add_action( 'category_edit_form_fields', array ( $this, 'update_category_image' ), 10, 2 );

	add_action( 'edited_category', array ( $this, 'updated_category_image' ), 10, 2 );

	add_action( 'admin_footer', array ( $this, 'add_script' ) );

	

	// Portfolio Custom Post Type

	add_action( 'portfolio-categories_add_form_fields', array ( $this, 'add_category_image' ), 10, 2 );

	add_action( 'created_portfolio-categories', array ( $this, 'save_category_image' ), 10, 2 );

	add_action( 'portfolio-categories_edit_form_fields', array ( $this, 'update_category_image' ), 10, 2 );

	add_action( 'edited_portfolio-categories', array ( $this, 'updated_category_image' ), 10, 2 );



 }

 

 /*

  * Add a form field in the new category page

  * @since 1.0.0

 */

 public function add_category_image ( $taxonomy ) { ?>

   <div class="form-field term-group">

     <label for="category-image-id"><?php esc_html_e('Image', 'pixzlo-core'); ?></label>

     <input type="hidden" id="category-image-id" name="category-image-id" class="custom_media_url" value="">

     <div id="category-image-wrapper"></div>

     <p>

       <input type="button" class="button button-secondary pixzlo_tax_media_button" id="pixzlo_tax_media_button" name="pixzlo_tax_media_button" value="<?php esc_html_e( 'Add Image', 'pixzlo-core' ); ?>" />

       <input type="button" class="button button-secondary pixzlo_tax_media_remove" id="pixzlo_tax_media_remove" name="pixzlo_tax_media_remove" value="<?php esc_html_e( 'Remove Image', 'pixzlo-core' ); ?>" />

    </p>

   </div>

 <?php

 }

 

 /*

  * Save the form field

  * @since 1.0.0

 */

 public function save_category_image ( $term_id, $tt_id ) {

   if( isset( $_POST['category-image-id'] ) && '' !== $_POST['category-image-id'] ){

     $image = $_POST['category-image-id'];

     add_term_meta( $term_id, 'category-image-id', $image, true );

   }

 }

 

 /*

  * Edit the form field

  * @since 1.0.0

 */

 public function update_category_image ( $term, $taxonomy ) { ?>

   <tr class="form-field term-group-wrap">

     <th scope="row">

       <label for="category-image-id"><?php esc_html_e( 'Image', 'pixzlo-core' ); ?></label>

     </th>

     <td>

	 	<div class="term-parent">

		   <?php $image_id = get_term_meta ( $term->term_id, 'category-image-id', true ); ?>

		   <input type="hidden" id="category-image-id" name="category-image-id" value="<?php echo $image_id; ?>">

		   <div id="category-image-wrapper">

			 <?php if ( $image_id ) { ?>

			   <?php echo wp_get_attachment_image ( $image_id, 'thumbnail' ); ?>

			 <?php } ?>

		   </div>

		   <p>

			 <input type="button" class="button button-secondary pixzlo_tax_media_button" id="pixzlo_tax_media_button" name="pixzlo_tax_media_button" value="<?php esc_html_e( 'Add Image', 'pixzlo-core' ); ?>" />

			 <input type="button" class="button button-secondary pixzlo_tax_media_remove" id="pixzlo_tax_media_remove" name="pixzlo_tax_media_remove" value="<?php esc_html_e( 'Remove Image', 'pixzlo-core' ); ?>" />

		   </p>

		</div>

     </td>

   </tr>

 <?php

 }



/*

 * Update the form field value

 * @since 1.0.0

 */

 public function updated_category_image ( $term_id, $tt_id ) {

   if( isset( $_POST['category-image-id'] ) && '' !== $_POST['category-image-id'] ){

     $image = $_POST['category-image-id'];

     update_term_meta ( $term_id, 'category-image-id', $image );

   } else {

     update_term_meta ( $term_id, 'category-image-id', '' );

   }

 }



/*

 * Add script

 * @since 1.0.0

 */

 public function add_script() { ?>

<script>

	jQuery(document).ready( function( $ ) {

		jQuery('body').on('click', '#pixzlo_tax_media_button', function(e){

			e.preventDefault();

				var button = $(this),

				custom_uploader = wp.media({

				title: 'Insert image',

				library : {

					// uncomment the next line if you want to attach image to the current post

					// uploadedTo : wp.media.view.settings.post.id, 

					type : 'image'

				},

				button: {

					text: 'Use this image' // button label text

				},

				multiple: false // for multiple image selection set to true

			}).on('select', function() { // it also has "open" and "close" events 

				var attachment = custom_uploader.state().get('selection').first().toJSON();

				//category-image-id

				$('#pixzlo_tax_media_button').parents('.term-parent, .form-field.term-group').find('#category-image-id').val(attachment.id);

				$('#pixzlo_tax_media_button').parents('.term-parent, .form-field.term-group').find('#category-image-wrapper').html('<img src="'+ attachment.url +'" style="height: 80px; width: 80px;" />');//attachment.url

			})

			.open();

		});

		

		//Remove Image

		jQuery('body').on('click', '#pixzlo_tax_media_remove', function(e){

			$('#pixzlo_tax_media_button').parents('.term-parent, .form-field.term-group').find('#category-image-id').val('');

			$('#pixzlo_tax_media_button').parents('.term-parent, .form-field.term-group').find('#category-image-wrapper').html('');

		});

	});

</script>

 <?php }



  }

 

$acm = new PixzloCategoryMeta();

$acm->init();

 

}