<?php
/**
 * The template for displaying 404 pages (not found)
 *
 */
 
get_header();
$ahe = new PixzloHeaderElements;
$template = 'page'; // template id
?>
<div class="wrap pixzlo-page">
	
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<section class="error-404 not-found text-center">
				<div class="container">
					<header class="page-header">
						
						<div class="404-image-wrap">
							<img src="<?php echo esc_url( PIXZLO_ASSETS . '/images/404.jpg' ); ?>">
							
						</div>	
						
						<div class="relative mb-2">
							<h3 class="page-title"><?php esc_html_e( 'Page Not Found', 'pixzlo' ); ?></h3>
						</div>
						<?php 
							$home_url = home_url( '/' ); 
						?>
							<p class="error-description">
								<?php esc_html_e( 'Go Back to ', 'pixzlo' ); ?>
								<a href="<?php echo esc_url( $home_url ); ?>">
									<?php esc_html_e( 'Home Page', 'pixzlo' ); ?>
								</a>
							</p>
					</header><!-- .page-header -->
				</div><!-- .container -->
			</section><!-- .error-404 -->
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->
<?php get_footer();