<?php







// Team Content



$t = new PixzloCPTElements();



$title_opt = $t->pixzloGetThemeOpt('team-title-opt');







while ( have_posts() ) : the_post();



?>



	



	<div class="row team">



		<div class="col-md-12">



			<?php if( has_post_thumbnail( get_the_ID() ) ): ?>



			<div class="team-image-wrap alignleft">



				<div class="team-img">



					<?php the_post_thumbnail( 'medium', array( 'class' => 'img-fluid' ) ); ?>



				</div>



			</div> <!-- .team-content-wrap -->



			<?php endif; // if thumb exists ?>



			



			<div class="team-info">



				<div class="team-title">



					<?php if( $title_opt ) : ?>



						<h2><?php the_title(); ?></h2>



					<?php endif; // desg exists ?>



					<?php



						$desg = get_post_meta( get_the_ID(), 'pixzlo_team_designation', true ); 



						if( $desg ):



					?>



					<div class="team-designation-wrap">



						<span class="team-designation"><?php echo esc_html( $desg ); ?></span>				



					</div><!-- .team-designation -->



					<?php endif; // desg exists ?>



					



					<?php



						$email = get_post_meta( get_the_ID(), 'pixzlo_team_email', true ); 



						if( $email ):



					?>



					<div class="team-email-wrap">



						<span class="team-email"><?php echo esc_html( $email ); ?></span>				



					</div><!-- .team-email-wrap -->



					<?php endif; // desg exists ?>

					

					

					<?php

						$phone = get_post_meta( get_the_ID(), 'pixzlo_team_phone', true ); 

						if( $phone ):

					?>

					<div class="team-phone-wrap">

						<span class="team-phone"><?php echo esc_html( $phone ); ?></span>				

					</div><!-- .team-email-wrap -->



					<?php endif; // Phone exists ?>



					



				</div><!-- .team-title -->



				<div class="team-social-wrap">



					<ul class="nav social-icons team-social">



						<?php



						



							$taget = get_post_meta( get_the_ID(), 'pixzlo_team_link_target', true );



						



							$social_media = array( 



								'social-fb' => 'fa fa-facebook', 



								'social-twitter' => 'fa fa-twitter', 



								'social-instagram' => 'fa fa-instagram',



								'social-linkedin' => 'fa fa-linkedin', 



								'social-pinterest' => 'fa fa-pinterest-p',



								'social-youtube' => 'fa fa-youtube-play', 



								'social-vimeo' => 'fa fa-vimeo',



								'social-flickr' => 'fa fa-flickr', 



								'social-dribbble' => 'fa fa-dribbble'



							);



							



							$social_opt = array(



								'social-fb' => 'pixzlo_team_facebook', 



								'social-twitter' => 'pixzlo_team_twitter',



								'social-instagram' => 'pixzlo_team_instagram',



								'social-linkedin' => 'pixzlo_team_linkedin',



								'social-pinterest' => 'pixzlo_team_pinterest',



								'social-youtube' => 'pixzlo_team_youtube',



								'social-vimeo' => 'pixzlo_team_vimeo',



								'social-flickr' => 'pixzlo_team_flickr',



								'social-dribbble' => 'pixzlo_team_dribbble',



							);



						



						



							// Actived social icons from theme option output generate via loop



							foreach( $social_media as $key => $class ){



	



								$social_url = get_post_meta( get_the_ID(), $social_opt[$key], true );



								if( $social_url ): ?>



									<li>



										<a class="<?php echo esc_attr( $key ); ?>" href="<?php echo esc_url( $social_url ); ?>" target="<?php echo esc_attr( $taget ); ?>">



											<i class="<?php echo esc_attr( $class ); ?>"></i>



										</a>



									</li>



								<?php



								endif;



	



							}



						?>



					</ul>



				</div> <!-- .team-social-wrap -->



				



				<div class="team-content-wrap">



					<?php the_content(); ?>



				</div><!-- .team-content-wrap -->		



	



			</div> <!-- .team-info --> 



		</div>



	</div> <!-- .team -->



	



	<div class="row">



		<div class="col-md-12">



			<?php $t->pixzloCPTNav(); ?>



		</div><!-- .col -->



	</div><!-- .row -->







<?php



endwhile; // End of the loop.