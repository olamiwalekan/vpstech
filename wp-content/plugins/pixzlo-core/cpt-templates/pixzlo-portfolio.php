<?php
// Portfolio Content
$t = new PixzloCPTElements();
$p_layout = $t->pixzloCPTPortfolioLayout();
while ( have_posts() ) : the_post();
	$sticky_col = get_post_meta( get_the_ID(), 'pixzlo_portfolio_sticky', true );
	$sticky_lclass = $sticky_rclass = '';
	if( !empty( $sticky_col ) && $sticky_col != 'none' ){
		$sticky_lclass = $sticky_col == 'left' ? ' pixzlo-sticky-obj' : '';
		$sticky_rclass = $sticky_col == 'right' ? ' pixzlo-sticky-obj' : '';
	}
?>
	<?php if( $p_layout == '1' ) : ?>
		<div class="portfolio-single portfolio-model-1">
			<div class="row">
				
				<div class="col-sm-9">
					<div class="portfolio-format<?php echo esc_attr( $sticky_lclass ); ?>">
						<?php $t->pixzloCPTPortfolioFormat(); ?>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="portfolio-info<?php echo esc_attr( $sticky_rclass ); ?>">
						<?php $t->pixzloCPTMeta(); ?>
					</div>
				</div><!-- .col -->
		
			</div><!-- .row -->
			<div class="row">
				<div class="portfolio-info-wrap">
					<?php $t->pixzloCPTPortfolioTitle(); ?>
					<?php $t->pixzloCPTPortfolioContent(); ?>
					<?php $t->pixzloCPTNav(); ?>
				</div>
			</div><!-- .row -->
		</div><!-- .portfolio-single -->
	<?php elseif( $p_layout == '2' ) : ?>
		<div class="portfolio-single portfolio-model-2">
			<div class="row">
			
				<div class="col-sm-12">
					<div class="portfolio-format">
						<?php $t->pixzloCPTPortfolioFormat(); ?>
					</div>
				</div>
				
			</div><!-- .row -->
			<div class="row portfolio-details">
				<div class="col-sm-8">
					<div class="portfolio-content-wrap<?php echo esc_attr( $sticky_lclass ); ?>">
						<?php $t->pixzloCPTPortfolioTitle(); ?>
						<?php $t->pixzloCPTPortfolioContent(); ?>
					</div>
				</div>
				
				<div class="col-sm-4">
					<div class="portfolio-meta-wrap<?php echo esc_attr( $sticky_rclass ); ?>">
						<?php $t->pixzloCPTMeta(); ?>
					</div>
				</div>
				
			</div><!-- .row -->
			
			<div class="row">
				<?php $t->pixzloCPTNav(); ?>
			</div>
			
		</div><!-- .portfolio-single -->
	<?php elseif( $p_layout == '3' ) : ?>
		<div class="portfolio-single portfolio-model-3">
			<div class="row">
				
				<div class="col-sm-4">
					<div class="portfolio-info<?php echo esc_attr( $sticky_rclass ); ?>">
						<?php $t->pixzloCPTMeta(); ?>
						<?php $t->pixzloCPTNav(); ?>
					</div>
				</div><!-- .col -->
				<div class="col-sm-8">
					<div class="portfolio-format<?php echo esc_attr( $sticky_lclass ); ?>">
						<?php $t->pixzloCPTPortfolioFormat(); ?>
					</div>
					<div class="portfolio-info-wrap">
						<?php $t->pixzloCPTPortfolioTitle(); ?>
						<?php $t->pixzloCPTPortfolioContent(); ?>
					</div>
				</div>
		
			</div><!-- .row -->
		</div><!-- .portfolio-single -->
	<?php elseif( $p_layout == '4' ) : ?>
		<div class="portfolio-single portfolio-model-4">
			<div class="row">
				
				<div class="col-sm-12">
					<div class="portfolio-format<?php echo esc_attr( $sticky_lclass ); ?>">
						<?php $t->pixzloCPTPortfolioFormat(); ?>
					</div>
				</div>
				<div class="col-sm-12">
					<div class="portfolio-info<?php echo esc_attr( $sticky_rclass ); ?>">
						<?php $t->pixzloCPTPortfolioTitle(); ?>
						<?php $t->pixzloCPTPortfolioContent(); ?>
						<?php $t->pixzloCPTMeta(); ?>
						<?php $t->pixzloPortfolioNav(); ?>
					</div>
				</div><!-- .col -->
		
			</div><!-- .row -->
		</div><!-- .portfolio-single -->
	<?php endif; 
	
	//Portfolio Related Slider
	$t->pixzloCPTPortfolioRelated();
	
endwhile; // End of the loop.