<?php
/**
 * The template for displaying the footer
 *
 */
$afe = new PixzloFooterElements;
?>
	</div><!-- .pixzlo-content-wrapper -->
	<footer class="site-footer<?php $afe->pixzloFooterLayout(); ?>">
		<?php echo do_shortcode( pixzlo_ads_out( $afe->pixzloThemeOpt( 'footer-ads-list' ) ) );	?>
		<?php $afe->pixzloFooterElements(); ?>
		
		<?php $afe->pixzloFooterBacktoTop(); ?>
	</footer><!-- #colophon -->
</div><!-- #page -->
<?php
	/*
	 * Full Search - pixzloFullSearchWrap - 10
	 */
	echo apply_filters( 'pixzlo_footer_search_filter', '' );
?>
<?php wp_footer(); ?>
</body>
</html>