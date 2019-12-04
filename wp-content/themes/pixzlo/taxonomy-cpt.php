<?php
/**
 * The template for displaying all custom post types
 */
 
get_header(); 
$ahe = new PixzloHeaderElements;
$aps = new PixzloPostSettings;
$template = 'blog'; // template id
if( $aps->pixzloCheckTemplateExists( 'archive' ) ){
	$template = 'archive';
}
$aps->pixzloSetPostTemplate( $template );
$template_class = $aps->pixzloTemplateContentClass();

$full_width_class = '';
$acpt = new PixzloCPT;
?>
<div class="pixzlo-content <?php echo esc_attr( 'pixzlo-' . $template ); ?>">
		
		<?php $ahe->pixzloHeaderSlider('bottom'); ?>
		
		<?php $ahe->pixzloPageTitle( $template ); ?>
		<div class="pixzlo-content-inner">
			<div class="container">
	
				<div class="row">
					
					<div class="<?php echo esc_attr( $template_class['content_class'] ); ?>">
						<div id="primary" class="content-area">
							<?php
								$q_object = get_queried_object();
								$taxonomy = '';
								if( isset($q_object->taxonomy) )
									$taxonomy = $q_object->taxonomy;
								
								$acpt->pixzloCPTCallTaxTemplate( $taxonomy );
							?>				
						</div><!-- #primary -->
					</div><!-- main col -->
					
					<?php if( $template_class['lsidebar_class'] != '' ) : ?>
					<div class="<?php echo esc_attr( $template_class['lsidebar_class'] ); ?>">
						<aside class="widget-area left-widget-area<?php echo esc_attr( $template_class['sticky_class'] ); ?>">
							<?php dynamic_sidebar( $template_class['left_sidebar'] ); ?>
						</aside>
					</div><!-- sidebar col -->
					<?php endif; ?>
					
					<?php if( $template_class['rsidebar_class'] != '' ) : ?>
					<div class="<?php echo esc_attr( $template_class['rsidebar_class'] ); ?>">
						<aside class="widget-area right-widget-area<?php echo esc_attr( $template_class['sticky_class'] ); ?>">
							<?php dynamic_sidebar( $template_class['right_sidebar'] ); ?>
						</aside>
					</div><!-- sidebar col -->
					<?php endif; ?>
					
				</div><!-- row -->
			
		</div><!-- .container -->
	</div><!-- .pixzlo-content-inner -->
</div><!-- .pixzlo-content -->
<?php get_footer();