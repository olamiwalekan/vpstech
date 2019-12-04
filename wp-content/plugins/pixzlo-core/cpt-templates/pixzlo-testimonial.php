<?php



// Testimonial Content

$t = new PixzloCPTElements();

$title_opt = $t->pixzloGetThemeOpt('testimonial-title-opt');



while ( have_posts() ) : the_post();

?>

	

	<div class="testimonial">

		<div class="testimonial-content-wrap">

			<div class="testimonial-content">

				<?php the_content(); ?>

			</div>

			<?php 

				$rate = get_post_meta( get_the_ID(), 'pixzlo_testimonial_rating', true ); 

				if( $rate ) :

			?>

			<div class="testimonial-rating">

				<?php echo pixzlo_star_rating( $rate );	?>

			</div>

			<?php endif; // if put rate  ?>	

		</div> <!-- .testimonial-content-wrap -->

		

		<div class="testimonial-info">

			<?php if( has_post_thumbnail( get_the_ID() ) ): ?>

			<div class="testimonial-img">

				<?php the_post_thumbnail( 'thumbnail', array( 'class' => 'img-fluid' ) ); ?>

			</div>

			<?php endif; // if thumb exists ?>

			

			<div class="testimonial-title">

				<?php if( $title_opt ) : ?>

					<h2><?php the_title(); ?></h2>

				<?php endif; // desg exists ?>

			</div>

			

			<?php

				$desg = get_post_meta( get_the_ID(), 'pixzlo_testimonial_designation', true ); 

				if( $desg ):

			?>

				<div class="testimonial-designation-wrap">

					<span class="testimonial-designation"><?php echo esc_html( $desg ); ?></span>				

					<?php

						$company = get_post_meta( get_the_ID(), 'pixzlo_testimonial_company_name', true ); 

						if( $company ):

							$url = get_post_meta( get_the_ID(), 'pixzlo_testimonial_company_url', true ); 

							if( $url ):

						?>

							<a href="<?php echo esc_url( $url ); ?>" title="<?php echo esc_html( $company ); ?>"><?php echo esc_html( $company ); ?></a>

						<?php else: ?>

							<span class="company-name"><?php echo esc_html( $company ); ?></span>

						<?php endif; // if has url

						endif; // if set company name 

					?>

				</div><!-- .testimonial-designation -->

			<?php endif; // desg exists ?>

			

			<?php $t->pixzloCPTNav(); ?>

			

		</div> <!-- .testimonial-info --> 

	</div><!-- .testimonial -->



<?php

endwhile; // End of the loop.