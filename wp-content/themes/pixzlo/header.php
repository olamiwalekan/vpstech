<?php
/*
 * The header for pixzlo theme
 */
$ahe = new PixzloHeaderElements;
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php endif; ?>
<?php wp_head(); ?>
</head>
<?php
	$smooth_scroll = $ahe->pixzloThemeOpt('smooth-opt');
	$scroll_time = $scroll_dist = '';
	if( $smooth_scroll ){
		$scroll_time = $ahe->pixzloThemeOpt('scroll-time');
		$scroll_dist = $ahe->pixzloThemeOpt('scroll-distance');
	}
?>
<body <?php body_class(); ?> data-scroll-time="<?php echo esc_attr( $scroll_time ); ?>" data-scroll-distance="<?php echo esc_attr( $scroll_dist ); ?>">
<?php
	/*
	 * Mobile Header - pixzloMobileHeader - 10
	 * Mobile Bar - pixzloMobileBar - 20
	 * Secondary Menu Space - pixzloHeaderSecondarySpace - 30
	 * Top Sliding Bar - pixzloHeaderTopSliding - 40
	 */
	do_action('pixzlo_body_action');
?>
<?php if( $ahe->pixzloPageLoader() ) : ?>
	<div class="page-loader"></div>
<?php endif; ?>
<div id="page" class="pixzlo-wrapper<?php $ahe->pixzloThemeLayout(); ?>">
	<?php $ahe->pixzloHeaderSlider('top'); ?>
	<header class="pixzlo-header<?php $ahe->pixzloHeaderLayout(); ?>">
		
			<?php $ahe->pixzloHeaderBar(); ?>
		
	</header>
	<div class="pixzlo-content-wrapper">