<?php
/**
 * Template part for displaying teacher.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Edumodo
 */
	// Global Options
	global $edumodo_options;

	$prefix = '_edumodo_';

	$teacher_img_links = get_post_meta( $post->ID, $prefix . 'teacher_img', true );
	$designation = get_post_meta( $post->ID, $prefix . 'teacher_designation', true );
	$email = get_post_meta( $post->ID, $prefix . 'teacher_email', true );
	$phone = get_post_meta( $post->ID, $prefix . 'teacher_phone', true );
	$website = get_post_meta( $post->ID, $prefix . 'teacher_website', true );
	$teacher_facebook = get_post_meta( $post->ID, $prefix . 'teacher_facebook_link', true );
	$teacher_twitter = get_post_meta( $post->ID, $prefix . 'teacher_twitter_link', true );
	$teacher_google_plus = get_post_meta( $post->ID, $prefix . 'teacher_google_plus_link', true );
	$teacher_linkedin = get_post_meta( $post->ID, $prefix . 'teacher_linkedin_link', true );

?>

    <article id="post-<?php the_ID(); ?>"  <?php post_class('single-teacher-post'); ?>>

		<div class="row">

			<div class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
				<div class="teacher-info">
					 <?php if ($teacher_img_links) : ?>
						<div class="teacher-img">
						   <div class="entry-image intro-image">
						      <a href="<?php echo esc_url($teacher_img_links); ?>">
						      <img src="<?php echo esc_url($teacher_img_links); ?>" alt="<?php the_title(); ?>">
						      </a>
						   </div>
						</div>
					 <?php endif; ?>

					<div class="teachers-bio">
					   <h3 class="teachers-name"><?php the_title(); ?></h3>

					  <?php if ($designation) : ?>
					  	 <p><i class="fa fa-graduation-cap" aria-hidden="true"></i><?php echo esc_html($designation); ?></p> 
					  <?php endif; ?>

					  <?php if ($email) : ?>
					   	 <p><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="mailto:<?php echo esc_html($email); ?>"><?php echo esc_html($email); ?></a></p>
					  <?php endif; ?>

					  <?php if ($phone) : ?>
					  	 <p><i class="fa fa-phone" aria-hidden="true"></i> <a href="tel:<?php echo esc_html($phone); ?>"><?php echo esc_html($phone); ?></a></p>
					  <?php endif; ?>

					  <?php if ($website) : ?>
					   	 <p><i class="fa fa-location-arrow" aria-hidden="true"></i> <a href="http://<?php echo esc_url($website); ?>"><?php echo esc_url($website); ?></a></p>
					  <?php endif; ?>

					</div>
					<div class="social">
					  <?php if ($teacher_facebook) : ?>
					  	 <a href="<?php echo esc_url($teacher_facebook); ?>"><i class="fa fa-facebook"></i></a>
					  <?php endif; ?>

					  <?php if ($teacher_twitter) : ?>
					   <a href="<?php echo esc_url($teacher_twitter); ?>"><i class="fa fa-twitter"></i> </a>
					  <?php endif; ?>

					  <?php if ($teacher_google_plus) : ?>
					   <a href="<?php echo esc_url($teacher_google_plus); ?>"><i class="fa fa-google-plus-square"></i> </a>
					  <?php endif; ?>

					  <?php if ($teacher_linkedin) : ?>
					   <a href="<?php echo esc_url($teacher_linkedin); ?>"><i class="fa fa-linkedin"></i> </a>
					  <?php endif; ?>
					</div>
				</div>

			</div>
			<div class="col-md-8 col-lg-8 col-xs-12 col-sm-12">

				<div class="teacher-content entry-content">

						<?php the_content(); 

							wp_link_pages( array(
								'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'edumodo' ),
								'after'  => '</div>',
							) );
						?>
					
				</div><!-- .entry-content -->
			</div>
		</div>

    </article><!-- #post-## -->

		
		
