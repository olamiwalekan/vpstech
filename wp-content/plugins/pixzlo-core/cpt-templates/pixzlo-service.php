<?php
// Service Content
$t = new PixzloCPTElements();
$title_opt = $t->pixzloGetThemeOpt('service-title-opt');
while ( have_posts() ) : the_post();
?>
	
	<div class="service">
		<div class="service-info-wrap">
			<?php if( has_post_thumbnail( get_the_ID() ) ): ?>
			<div class="service-img">
				<?php the_post_thumbnail( 'large', array( 'class' => 'img-fluid' ) ); ?>
			</div>
			<?php endif; // if thumb exists ?>
			
			
			<div class="service-title">
				<?php if( $title_opt ) : ?>
					<h3><?php the_title(); ?></h3>
				<?php endif; // desg exists ?>
			</div>
		
			<div class="service-content">
				<?php the_content(); ?>
			</div>
			
			<?php $t->pixzloCPTNav(); ?>
		</div> <!-- .service-info-wrap -->
	</div><!-- .service -->
<?php
endwhile; // End of the loop.