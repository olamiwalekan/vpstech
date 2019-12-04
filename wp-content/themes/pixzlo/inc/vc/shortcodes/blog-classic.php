<?php 
/**
 * Pixzlo Blog Classic
 */
if ( ! function_exists( "pixzlo_vc_blog_classic_shortcode" ) ) {
	function pixzlo_vc_blog_classic_shortcode( $atts, $content = NULL ) {
		
		$atts = vc_map_get_attributes( "pixzlo_vc_blog_classic", $atts );
		extract( $atts );
		$output = '';
	
		//Defined Variable
		$class_names = isset( $extra_class ) && $extra_class != '' ? ' ' . $extra_class : '';
		$post_per_page = isset( $post_per_page ) && $post_per_page != '' ? $post_per_page : '';
		$excerpt_length = isset( $excerpt_length ) && $excerpt_length != '' ? $excerpt_length : 0;
		$more_text = isset( $more_text ) && $more_text != '' ? $more_text : '';
		$blog_pagination = isset( $blog_pagination ) && $blog_pagination == 'on' ? 'true' : 'false';
		$title_head = isset( $title_head ) ? $title_head : 'h4';
		
		$thumb_size = isset( $image_size ) ? $image_size : '';
		$cus_thumb_size = '';
		if( $thumb_size == 'custom' ){
			$cus_thumb_size = isset( $custom_image_size ) && $custom_image_size != '' ? $custom_image_size : '';
		}
		$list_thumb_size = isset( $list_image_size ) ? $list_image_size : '';
		$cus_list_thumb_size = '';
		if( $list_thumb_size == 'custom' ){
			$cus_list_thumb_size = isset( $custom_list_image_size ) && $custom_list_image_size != '' ? $custom_list_image_size : '';
		}
		
		$top_meta = isset( $top_meta ) && $top_meta != '' ? $top_meta : array( 'Enabled' => '' );
		$bottom_meta = isset( $bottom_meta ) && $bottom_meta != '' ? $bottom_meta : array( 'Enabled' => '' );

		$class_names .= isset( $text_align ) && $text_align != 'default' ? ' text-' . $text_align : '';
		$class_names .= isset( $variation ) ? ' blog-' . $variation : '';

		
		// This is custom css options for main shortcode warpper
		$shortcode_css = '';
		$shortcode_rand_id = $rand_class = 'shortcode-rand-'. pixzlo_shortcode_rand_id();
		
		//Grid Spacing
		if( isset( $sc_grid_spacing ) && !empty( $sc_grid_spacing ) ){
			$sc_grid_spacing = preg_replace( '!\s+!', ' ', $sc_grid_spacing );
			$space_arr = explode( " ", $sc_grid_spacing );
			$i = 1;
			$space_class_name = '.' . esc_attr( $rand_class ) . '.blog-classic-wrapper .blog-grid >';
			foreach( $space_arr as $space ){
				$shortcode_css .= $space != 'default' ? $space_class_name .' *:nth-child('. esc_attr( $i ) .') { margin-bottom: '. esc_attr( $space ) .'; }' : '';
				$i++;
			}
		}
		//List Spacing
		if( isset( $sc_list_spacing ) && !empty( $sc_list_spacing ) ){
			$sc_list_spacing = preg_replace( '!\s+!', ' ', $sc_list_spacing );
			$space_arr = explode( " ", $sc_list_spacing );
			$i = 1;
			$space_class_name = '.' . esc_attr( $rand_class ) . '.blog-classic-wrapper .blog-list > .media > .media-body >';
			foreach( $space_arr as $space ){
				$shortcode_css .= $space != 'default' ? $space_class_name .' *:nth-child('. esc_attr( $i ) .') { margin-bottom: '. esc_attr( $space ) .'; }' : '';
				$i++;
			}
		}
		
		//Cats In
		$cats_in = array();
		if( isset( $include_cats ) && $include_cats != '' ){
			$filter = preg_replace( '/\s+/', '', $include_cats );
			$filter = explode( ',', rtrim( $filter, ',' ) );
			foreach( $filter as $cat ){
				if( term_exists( $cat, 'category' ) ){
					$cat_term = get_term_by( 'slug', $cat, 'category' );	
					//post in array push
					if( isset( $cat_term->term_id ) )
						array_push( $cats_in, absint( $cat_term->term_id ) );	
				}
			}
		}
		
		//Cats Not In
		$cats_not_in = array();
		if( isset( $exclude_cats ) && $exclude_cats != '' ){
			$filter = preg_replace( '/\s+/', '', $exclude_cats );
			$filter = explode( ',', rtrim( $filter, ',' ) );
			foreach( $filter as $cat ){
				if( term_exists( $cat, 'category' ) ){
					$cat_term = get_term_by( 'slug', $cat, 'category' );	
					//post not in array push
					if( isset( $cat_term->term_id ) )
						array_push( $cats_not_in, absint( $cat_term->term_id ) );	
				}
			}
		}
		
		//Query Start
		global $wp_query;
		$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
		
		$ppp = isset( $post_per_page ) && $post_per_page != '' ? $post_per_page : 2;
		$inc_cat_array = $cats_in ? array( 'taxonomy' => 'category', 'field' => 'id', 'terms' => $cats_in ) : '';
		$exc_cat_array = $cats_not_in ? array( 'taxonomy' => 'category', 'field' => 'id', 'terms' => $cats_not_in, 'operator' => 'NOT IN' ) : '';
		$args = array(
			'post_type' => 'post',
			'posts_per_page' => absint( $ppp ),
			'paged' => $paged,
			'ignore_sticky_posts' => 1,
			'tax_query' => array(
				$inc_cat_array,
				$exc_cat_array
			)
			
		);
		$query = new WP_Query( $args );
			
		if ( $query->have_posts() ) {
			
			$blog_array = array(
				'excerpt_length' => $excerpt_length,
				'thumb_size' => $thumb_size,
				'cus_thumb_size' => $cus_thumb_size,
				'more_text' => $more_text,
				'top_meta' => $top_meta,
				'bottom_meta' => $bottom_meta,
				'title_head' => $title_head 
			);
			
			//Shortcode css ccde here
			$shortcode_css .= isset( $font_color ) && $font_color != '' ? '.' . esc_attr( $rand_class ) . '.blog-classic-wrapper { color: '. esc_attr( $font_color ) .'; }' : '';
			
			if( $shortcode_css ) $class_names .= ' ' . $shortcode_rand_id . ' pixzlo-inline-css';
			$elemetns = isset( $blog_items ) ? pixzlo_drag_and_drop_trim( $blog_items ) : array( 'Enabled' => '' );
			$list_elemetns = isset( $blog_list_items ) ? pixzlo_drag_and_drop_trim( $blog_list_items ) : array( 'Enabled' => '' );
			
			$output .= '<div class="blog-classic-wrapper'. esc_attr( $class_names ) .'" data-css="'. htmlspecialchars( json_encode( $shortcode_css ), ENT_QUOTES, 'UTF-8' ) .'">';
				$output .= '<div class="row">';
				$list_layout = 0; 
				$grid_stat = 1;
				// Start the Loop
				while ( $query->have_posts() ) : $query->the_post();
					
					$post_id = get_the_ID();
					$blog_array['post_id'] = $post_id;
				
					if( $grid_stat == 2 ) $output .= '<div class="col-md-5 blog-list">';
					if( $list_layout ){
						$elemetns = $list_elemetns;
						$blog_array['thumb_size'] = $list_thumb_size;
						$blog_array['cus_thumb_size'] = $cus_list_thumb_size;
			
						$output .= '<div class="media">';
							$blog_array['list_layout'] = 0;
							if( isset( $elemetns['Enabled']['thumb'] ) ) {
								$output .= pixzlo_blog_classic_shortcode_elements('thumb', $blog_array);
							}	
							$output .= '<div class="ml-3 media-body">';
					}
					
					if( $grid_stat == 1 ) $output .= '<div class="col-md-7 blog-grid">';
					if( isset( $elemetns['Enabled'] ) ) :
						foreach( $elemetns['Enabled'] as $element => $value ){
							$blog_array['list_layout'] = $list_layout; // set list layout 1
							$output .= pixzlo_blog_classic_shortcode_elements( $element, $blog_array );
						}
					endif;
					if( $grid_stat == 1 ) $output .= '</div> <!-- .blog-grid -->';
					
					if( $list_layout ){
							$output .= '</div><!-- .media-body -->';
						$output .= '</div><!-- .media -->';
					}	
					
					
					//From the second post layout will be change as list 
					$list_layout = 1; 
					$grid_stat++;
					
				endwhile;
				
				if( $grid_stat != 1 ) $output .= '</div> <!-- .blog-list -->';
				
				$output .= '</div> <!-- .row -->';
				
				if( $blog_pagination == 'true' ):
					$output .= '<div class="blog-pagination">';
						$aps = new PixzloPostSettings;
						$output .= $aps->pixzloWpBootstrapPagination( $args, $query->max_num_pages, false );
					$output .= '</div><!-- blog-pagination -->';
				endif;
				
			$output .= '</div><!-- .blog-classic-wrapper -->';
			
		}// query exists
		
		// use reset postdata to restore orginal query
		wp_reset_postdata();
		
		return $output;
	}
}
function pixzlo_blog_classic_shortcode_elements( $element, $opts = array() ){
	$output = '';
	switch( $element ){
	
		case "title":
			$title_head = isset( $opts['title_head'] ) ? $opts['title_head'] : 'h4';
			$output .= '<div class="entry-title">';
				$output .= '<'. esc_attr( $title_head ) .'><a href="'. esc_url( get_the_permalink() ) .'" class="post-title">'. get_the_title() .'</a></'. esc_attr( $title_head ) .'>';
			$output .= '</div><!-- .entry-title -->';		
		break;
		
		case "thumb":
			if(	!$opts['list_layout'] ) {
				if ( has_post_thumbnail() ) {
					// Custom Thumb Code
					$thumb_size = $thumb_cond = $opts['thumb_size'];
					$cus_thumb_size = $opts['cus_thumb_size'];
					$custom_opt = $img_prop = '';
					if( $thumb_cond == 'custom' ){
						$custom_opt = $cus_thumb_size != '' ? explode( "x", $cus_thumb_size ) : array();
						$img_prop = pixzlo_custom_image_size_chk( $thumb_size, $custom_opt );
						$thumb_size = array( $img_prop[1], $img_prop[2] );
					} 
					// Custom Thumb Code End
										
					$output .= '<div class="post-thumb">';
						$output .= '<div class="post-thumb-overlay"><a href="'. esc_url( get_permalink( get_the_ID() ) ).'" class="post-link"></a></div>';
						if( $thumb_cond == 'custom' ){
							$output .= '<img height="'. esc_attr( $img_prop[2] ) .'" width="'. esc_attr( $img_prop[1] ) .'" class="img-fluid" alt="'. esc_attr( get_the_title() ) .'" src="' . esc_url( $img_prop[0] ) . '"/>';
						}else{
							$output .= get_the_post_thumbnail( $opts['post_id'], $thumb_size, array( 'class' => 'img-fluid' ) );
						}
					$output .= '</div><!-- .post-thumb -->';
				}
			}	
		break;
		
		case "category":
			$categories = get_the_category(); 
			if ( ! empty( $categories ) ){
				$coutput = '<div class="post-category">';
					foreach ( $categories as $category ) {
						$coutput .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a>,';
					}
					$output .= rtrim( $coutput, ',' );
				$output .= '</div>';
			}
		break;
		
		case "author":
			$output .= '<div class="post-author">';
				$output .= '<a href="'. get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) .'">';
					$output .= '<span class="author-name"><i class="fa fa-user mr-2"></i>'. get_the_author() .'</span>';
				$output .= '</a>';
			$output .= '</div>';
		break;
		
		case "date":
			$archive_year  = get_the_time('Y');
			$archive_month = get_the_time('m'); 
			$archive_day   = get_the_time('d');
			$output = '<div class="post-date"><a href="'. esc_url( get_day_link( $archive_year, $archive_month, $archive_day ) ) .'" >'. get_the_time( get_option( 'date_format' ) ) .'</a></div>';
		break;
		
		case "more":
			$read_more_text = isset( $opts['more_text'] ) ? $opts['more_text'] : esc_html__( 'Read more', 'pixzlo' );
			$output = '<div class="post-more"><a class="read-more" href="'. esc_url( get_permalink( get_the_ID() ) ) . '">'. esc_html( $read_more_text ) .'</a></div>';
		break;
		
		case "comment":
			$comments_count = wp_count_comments(get_the_ID());
			$cmt_txt = esc_html__( 'Comments', 'pixzlo' );
			if( $comments_count->total_comments == 1 ){
				$cmt_txt = esc_html__( 'Comment', 'pixzlo' );
			}
			$output = '<div class="post-comment"><a href="'. esc_url( get_comments_link( get_the_ID() ) ) .'" rel="bookmark" class="comments-count"><i class="fa fa-comments mr-2"></i> '. esc_html( $comments_count->total_comments .' '. $cmt_txt ).'</a></div>';
		break;
		
		case "excerpt":
			$output = '';
			$excerpt = isset( $opts['excerpt_length'] ) && $opts['excerpt_length'] != '' ? $opts['excerpt_length'] : 20;
			$output .= '<div class="post-excerpt">';
				add_filter( 'excerpt_length', __return_value( $excerpt ) );
				ob_start();
				the_excerpt();
				$excerpt_cont = ob_get_clean();
				$output .= $excerpt_cont;
			$output .= '</div><!-- .post-excerpt -->';	
		break;		
		
		case "top-meta":
			$output = '';
			$top_meta = $opts['top_meta'];
			$elemetns = isset( $top_meta ) ? pixzlo_drag_and_drop_trim( $top_meta ) : array( 'Enabled' => '' );
			if( isset( $elemetns['Enabled'] ) ) :
				$output .= '<div class="top-meta clearfix"><ul class="top-meta-list">';
					foreach( $elemetns['Enabled'] as $element => $value ){
						$blog_array = array( 'more_text' => $opts['more_text'] );
						$output .= '<li>'. pixzlo_blog_classic_shortcode_elements( $element, $blog_array ) .'</li>';
					}
				$output .= '</ul></div>';
			endif;
		break;
		
		case "bottom-meta":
			$output = '';
			$bottom_meta = $opts['bottom_meta'];
			$elemetns = isset( $bottom_meta ) ? pixzlo_drag_and_drop_trim( $bottom_meta ) : array( 'Enabled' => '' );
			if( isset( $elemetns['Enabled'] ) ) :
				$output .= '<div class="bottom-meta clearfix"><ul class="bottom-meta-list">';
					foreach( $elemetns['Enabled'] as $element => $value ){
						$blog_array = array( 'more_text' => $opts['more_text'] );
						$output .= '<li>'. pixzlo_blog_classic_shortcode_elements( $element, $blog_array ) .'</li>';
					}
				$output .= '</ul></div>';
			endif;
		break;
	}
	return $output; 
}
if ( ! function_exists( "pixzlo_vc_blog_classic_shortcode_map" ) ) {
	function pixzlo_vc_blog_classic_shortcode_map() {
				
		vc_map( 
			array(
				"name"					=> esc_html__( "Blog Classic", "pixzlo" ),
				"description"			=> esc_html__( "Blog custom post type.", "pixzlo" ),
				"base"					=> "pixzlo_vc_blog_classic",
				"category"				=> esc_html__( "Shortcodes", "pixzlo" ),
				"icon"					=> "zozo-vc-icon",
				"params"				=> array(
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Extra Class", "pixzlo" ),
						"param_name"	=> "extra_class",
						"value" 		=> "",
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Post Per Page", "pixzlo" ),
						"description"	=> esc_html__( "Here you can define post limits per page. Example 10", "pixzlo" ),
						"param_name"	=> "post_per_page",
						"value" 		=> "",
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Excerpt Length", "pixzlo" ),
						"description"	=> esc_html__( "Here you can define post excerpt length. Example 10", "pixzlo" ),
						"param_name"	=> "excerpt_length",
						"value" 		=> "15"
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Include Categories", "pixzlo" ),
						"description"	=> esc_html__( "This is filter categories. If you don't want portfolio filter, then leave this empty. Example slug: travel, web", "pixzlo" ),
						"param_name"	=> "include_cats",
						"value" 		=> "",
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Exclude Categories", "pixzlo" ),
						"description"	=> esc_html__( "Here you can mention unwanted categories. Example slug: travel, web", "pixzlo" ),
						"param_name"	=> "exclude_cats",
						"value" 		=> "",
					),
					array(
						"type"			=> "textarea",
						"heading"		=> esc_html__( "Read More Text", "pixzlo" ),
						"description"	=> esc_html__( "Here you can enter read more text instead of default text.", "pixzlo" ),
						"param_name"	=> "more_text",
						"value" 		=> esc_html__( "Read More", "pixzlo" ),
					),
					array(
						"type"			=> "dropdown",
						"heading"		=> esc_html__( "Title Heading Tag", "pixzlo" ),
						"description"	=> esc_html__( "This is an option for title heading tag", "pixzlo" ),
						"param_name"	=> "title_head",
						"value"			=> array(
							esc_html__( "H1", "pixzlo" )=> "h1",
							esc_html__( "H2", "pixzlo" )=> "h2",
							esc_html__( "H3", "pixzlo" )=> "h3",
							esc_html__( "H4", "pixzlo" )=> "h4",
							esc_html__( "H5", "pixzlo" )=> "h5",
							esc_html__( "H6", "pixzlo" )=> "h6"
						),
						"group"			=> esc_html__( "Layouts", "pixzlo" )
					),
					array(
						"type"			=> "colorpicker",
						"heading"		=> esc_html__( "Font Color", "pixzlo" ),
						"description"	=> esc_html__( "Here you can put the font color.", "pixzlo" ),
						"param_name"	=> "font_color",
						"group"			=> esc_html__( "Layouts", "pixzlo" )
					),
					array(
						'type'			=> 'drag_drop',
						'heading'		=> esc_html__( 'Post Items', 'pixzlo' ),
						"description"	=> esc_html__( "This is settings for blog custom layout. here you can set your own layout. Drag and drop needed blog items to Enabled part.", "pixzlo" ),
						'param_name'	=> 'blog_items',
						'dd_fields' => array ( 
							'Enabled' => array( 
								'thumb'	=> esc_html__( 'Feature Image', 'pixzlo' ),
								'title'	=> esc_html__( 'Title', 'pixzlo' ),
								'category'	=> esc_html__( 'Category', 'pixzlo' ),
								'author'	=> esc_html__( 'Author', 'pixzlo' ),
								'excerpt'	=> esc_html__( 'Excerpt', 'pixzlo' )
							),
							'disabled' => array(
								'top-meta'	=> esc_html__( 'Top Meta', 'pixzlo' ),
								'bottom-meta'	=> esc_html__( 'Bottom Meta', 'pixzlo' )
							)
						),
						"group"			=> esc_html__( "Layouts", "pixzlo" )
					),
					array(
						'type'			=> 'drag_drop',
						'heading'		=> esc_html__( 'List Post Items', 'pixzlo' ),
						"description"	=> esc_html__( "This is settings for blog custom list layout. here you can set your own list layout. Drag and drop needed blog list items to Enabled part.", "pixzlo" ),
						'param_name'	=> 'blog_list_items',
						'dd_fields' => array ( 
							'Enabled' => array( 
								'thumb'	=> esc_html__( 'Feature Image', 'pixzlo' ),
								'title'	=> esc_html__( 'Title', 'pixzlo' ),
								'category'	=> esc_html__( 'Category', 'pixzlo' ),
								'author'	=> esc_html__( 'Author', 'pixzlo' )								
							),
							'disabled' => array(
								'excerpt'	=> esc_html__( 'Excerpt', 'pixzlo' ),
								'top-meta'	=> esc_html__( 'Top Meta', 'pixzlo' ),
								'bottom-meta'	=> esc_html__( 'Bottom Meta', 'pixzlo' )
							)
						),
						"group"			=> esc_html__( "Layouts", "pixzlo" )
					),
					array(
						'type'			=> 'drag_drop',
						'heading'		=> esc_html__( 'Post Top Meta', 'pixzlo' ),
						"description"	=> esc_html__( "This is settings for blog shortcode post top meta.", "pixzlo" ),
						'param_name'	=> 'top_meta',
						'dd_fields' => array ( 
							'Enabled' => array(),
							'disabled' => array(
								'category'	=> esc_html__( 'Category', 'pixzlo' ),
								'author'	=> esc_html__( 'Author', 'pixzlo' ),
								'more'	=> esc_html__( 'Read More', 'pixzlo' ),
								'date'	=> esc_html__( 'Date', 'pixzlo' ),
								'comment'	=> esc_html__( 'Comment', 'pixzlo' )
							)
						),
						"group"			=> esc_html__( "Layouts", "pixzlo" )
					),
					array(
						'type'			=> 'drag_drop',
						'heading'		=> esc_html__( 'Post Bottom Meta', 'pixzlo' ),
						"description"	=> esc_html__( "This is settings for blog shortcode post bottom meta.", "pixzlo" ),
						'param_name'	=> 'bottom_meta',
						'dd_fields' => array ( 
							'Enabled' => array(),
							'disabled' => array(
								'category'	=> esc_html__( 'Category', 'pixzlo' ),
								'author'	=> esc_html__( 'Author', 'pixzlo' ),
								'more'	=> esc_html__( 'Read More', 'pixzlo' ),
								'date'	=> esc_html__( 'Date', 'pixzlo' ),
								'comment'	=> esc_html__( 'Comment', 'pixzlo' )
							)
						),
						"group"			=> esc_html__( "Layouts", "pixzlo" )
					),
					array(
						"type"			=> "dropdown",
						"heading"		=> esc_html__( "Text Align", "pixzlo" ),
						"description"	=> esc_html__( "This is an option for blog text align", "pixzlo" ),
						"param_name"	=> "text_align",
						"value"			=> array(
							esc_html__( "Default", "pixzlo" )	=> "default",
							esc_html__( "Left", "pixzlo" )		=> "left",
							esc_html__( "Center", "pixzlo" )	=> "center",
							esc_html__( "Right", "pixzlo" )		=> "right"
						),
						"group"			=> esc_html__( "Layouts", "pixzlo" )
					),
					array(
						"type"			=> "switch_bit",
						"heading"		=> esc_html__( "Blog Pagination", "pixzlo" ),
						"description"	=> esc_html__( "This is an option for blog pagination enable or disable. This option working when blog slide not enabled.", "pixzlo" ),
						"param_name"	=> "blog_pagination",
						"value"			=> "off",						
						"group"			=> esc_html__( "Layouts", "pixzlo" )
					),
					array(
						"type"			=> 'dropdown',
						"heading"		=> esc_html__( "Grid Image Size", "pixzlo" ),
						"param_name"	=> "image_size",
						'description'	=> esc_html__( 'Choose thumbnail size for display different size image.', 'pixzlo' ),
						"value"			=> array(
							esc_html__( "Grid Large", "pixzlo" )=> "pixzlo-grid-large",
							esc_html__( "Grid Medium", "pixzlo" )=> "pixzlo-grid-medium",
							esc_html__( "Grid Small", "pixzlo" )=> "pixzlo-grid-small",
							esc_html__( "Medium", "pixzlo" )=> "medium",
							esc_html__( "Large", "pixzlo" )=> "large",
							esc_html__( "Thumbnail", "pixzlo" )=> "thumbnail",
							esc_html__( "Custom", "pixzlo" )=> "custom",
						),
						'std'			=> 'newsz_grid_2',
						'group'			=> esc_html__( 'Image', 'pixzlo' )
					),
					array(
						'type'			=> 'textfield',
						'heading'		=> esc_html__( 'Grid Custom Image Size', "pixzlo" ),
						'param_name'	=> 'custom_image_size',
						'description'	=> esc_html__( 'Enter custom image size. eg: 200x200', 'pixzlo' ),
						'value' 		=> '',
						"dependency"	=> array(
								"element"	=> "image_size",
								"value"		=> "custom"
						),
						'group'			=> esc_html__( 'Image', 'pixzlo' )
					),
					array(
						"type"			=> 'dropdown',
						"heading"		=> esc_html__( "List Image Size", "pixzlo" ),
						"param_name"	=> "list_image_size",
						'description'	=> esc_html__( 'Choose thumbnail size for display different size image.', 'pixzlo' ),
						"value"			=> array(
							esc_html__( "Grid Large", "pixzlo" )=> "pixzlo-grid-large",
							esc_html__( "Grid Medium", "pixzlo" )=> "pixzlo-grid-medium",
							esc_html__( "Grid Small", "pixzlo" )=> "pixzlo-grid-small",
							esc_html__( "Medium", "pixzlo" )=> "medium",
							esc_html__( "Large", "pixzlo" )=> "large",
							esc_html__( "Thumbnail", "pixzlo" )=> "thumbnail",
							esc_html__( "Custom", "pixzlo" )=> "custom",
						),
						'std'			=> 'newsz_grid_2',
						'group'			=> esc_html__( 'Image', 'pixzlo' )
					),
					array(
						'type'			=> 'textfield',
						'heading'		=> esc_html__( 'List Custom Image Size', "pixzlo" ),
						'param_name'	=> 'custom_list_image_size',
						'description'	=> esc_html__( 'Enter custom image size. eg: 200x200', 'pixzlo' ),
						'value' 		=> '',
						"dependency"	=> array(
								"element"	=> "list_image_size",
								"value"		=> "custom"
						),
						'group'			=> esc_html__( 'Image', 'pixzlo' )
					),
					array(
						"type"			=> "textarea",
						"heading"		=> esc_html__( "Grid Items Spacing", "pixzlo" ),
						"description"	=> esc_html__( "This is options for grid layout spacing, Enter custom bottom space for each item on main wrapper. Your space values will apply like nth child method. If you leave this empty, default theme space apply for each child. If you want default value for any child, just type \"default\". It will take default value for that child. Example 10px 12px 8px", "pixzlo" ),
						"param_name"	=> "sc_grid_spacing",
						"value" 		=> "",
						"group"			=> esc_html__( "Spacing", "pixzlo" ),
					),
					array(
						"type"			=> "textarea",
						"heading"		=> esc_html__( "List Items Spacing", "pixzlo" ),
						"description"	=> esc_html__( "This is options for list layout spacing, Enter custom bottom space for each item on main wrapper. Your space values will apply like nth child method. If you leave this empty, default theme space apply for each child. If you want default value for any child, just type \"default\". It will take default value for that child. Example 10px 12px 8px", "pixzlo" ),
						"param_name"	=> "sc_list_spacing",
						"value" 		=> "",
						"group"			=> esc_html__( "Spacing", "pixzlo" ),
					)
				)
			) 
		);
	}
}
add_action( "vc_before_init", "pixzlo_vc_blog_classic_shortcode_map" );