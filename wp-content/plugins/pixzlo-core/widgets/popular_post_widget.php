<?php
add_action( 'widgets_init', 'pixzlo_popular_post_load_widget' );
function pixzlo_popular_post_load_widget() {
	register_widget( 'pixzlo_popular_post_widget' );
}
class pixzlo_popular_post_widget extends WP_Widget {
	/**
	 * Widget setup.
	 */
	function __construct() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'pixzlo_popular_post_widget', 'description' => esc_html__( 'A widget that displays your popular posts from all categories or a certain', 'pixzlo' ) );
		/* Widget control settings. */
		$control_ops = array( 'id_base' => 'pixzlo_popular_post_widget' );
		/* Create the widget. */
		parent::__construct( 'pixzlo_popular_post_widget', esc_html__( 'Popular Posts', 'pixzlo' ), $widget_ops, $control_ops );
	}
	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );
		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$categories = $instance['categories'];
		$pnumber = $instance['pnumber'];
		
		$query = array( 'posts_per_page' => $pnumber ? $pnumber : 6, 'meta_key' => 'pixzlo_post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC'  );		
		
		$loop = new WP_Query($query);
		if ($loop->have_posts()) :
		
		/* Before widget (defined by themes). */
		echo $before_widget;
		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;
		?>
			<div class="widget-content">
				<ul class="post-ul">
				
				<?php  while ($loop->have_posts()) : $loop->the_post(); ?>
					<?php 
						$format = get_post_format( get_the_ID() );
					?>
					<li>					
						<div class="side-item">
							<div class="side-image">
							<?php if( $format == "quote" || $format == "link" ) : ?>
								<a href="<?php echo get_permalink(); ?>" rel="bookmark"><div class="side-noimg themebg-color"><span class="<?php echo $format == "quote" ? 'fa fa-quote-left' : 'fa fa-anchor' ;?>"></span></div></a>
							<?php elseif (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) : ?>
								<a href="<?php echo get_permalink(); ?>" rel="bookmark"><?php the_post_thumbnail('thumbnail', array('class' => 'img-fluid')); ?></a>
							<?php endif; ?>
							</div>
							<div class="side-item-text">
								<a class="themeh-color" href="<?php echo get_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
								<p class="side-item-meta"><span><?php $comments_count = wp_count_comments(get_the_ID()); echo $comments_count->total_comments; ?> Comments</span><span> on <?php the_time( get_option('date_format') ); ?></span></p>
							</div>
						</div>					
					</li>
				
				<?php endwhile; ?>
				<?php wp_reset_query(); ?>
				<?php endif; ?>
				
				</ul>
			</div>
			
		<?php
		/* After widget (defined by themes). */
		echo $after_widget;
	}
	/**
	 * Update the widget settings.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['categories'] = $new_instance['categories'];
		$instance['pnumber'] = strip_tags( $new_instance['pnumber'] );
		return $instance;
	}
	function form( $instance ) {
		/* Set up some default widget settings. */
		$defaults = array( 'title' => esc_html__( 'Popular Posts', 'pixzlo' ), 'pnumber' => 5, 'categories' => '');
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php echo esc_html__('Title:', 'pixzlo'); ?></label>
			<input  type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>"  />
		</p>
		
		<!-- Category -->
		<p>
		<label for="<?php echo $this->get_field_id('categories'); ?>"><?php echo esc_html__( 'Filter by Category:', 'pixzlo' ); ?></label> 
		<select id="<?php echo $this->get_field_id('categories'); ?>" name="<?php echo $this->get_field_name('categories'); ?>" class="widefat categories" style="width:100%;">
			<option value='all' <?php if ('all' == $instance['categories']) echo 'selected="selected"'; ?>><?php echo esc_html__( 'All categories', 'pixzlo' ); ?></option>
			<?php $categories = get_categories('hide_empty=1&depth=1&type=post'); ?>
			<?php foreach($categories as $category) { ?>
			<option value='<?php echo $category->term_id; ?>' <?php if ($category->term_id == $instance['categories']) echo 'selected="selected"'; ?>><?php echo $category->cat_name; ?></option>
			<?php } ?>
		</select>
		</p>
		
		<!-- Number of posts -->
		<p>
			<label for="<?php echo $this->get_field_id( 'pnumber' ); ?>"><?php echo esc_html__('Number of posts to show:', 'pixzlo'); ?></label>
			<input  type="text" class="widefat" id="<?php echo $this->get_field_id( 'pnumber' ); ?>" name="<?php echo $this->get_field_name( 'pnumber' ); ?>" value="<?php echo $instance['pnumber']; ?>" size="3" />
		</p>
	<?php
	}
}
?>