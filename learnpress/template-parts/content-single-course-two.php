<?php
/**
 * Template for displaying course content within the loop.
 *
 * This template can be overridden by copying it to yourtheme/learnpress/content-single-course.php
 *
 * @author  ThimPress
 * @package LearnPress/Templates
 * @version 3.0.0
 */

/**
 * Prevent loading this file directly
 */
defined( 'ABSPATH' ) || exit();

if ( post_password_required() ) {
	echo get_the_password_form();

	return;
}

/**
 * @deprecated
 */
do_action( 'learn_press_before_main_content' );
do_action( 'learn_press_before_single_course' );
do_action( 'learn_press_before_single_course_summary' ); ?>

<div class="lpcourse-course-wapper-2">

		<div class="lpcourse-top-2">

			<div class="<?php if ( has_post_thumbnail() ) : echo "col-md-6";  endif;  ?> less-padding-two">
				<?php 
					if ( has_post_thumbnail() ) { ?>
				<div class="course-thumbnail"> 
					<?php the_post_thumbnail(); ?>
				</div>
				<?php } ?>
			</div>

			<div class="<?php if ( has_post_thumbnail() ) : echo "col-md-6"; else : echo "col-md-12"; endif;  ?>">
				<div class="course-info">
					<?php the_title( '<h1 class="entry-title" itemprop="name">', '</h1>' ); ?>
					<div class="course-meta">
						<i class="fa fa-folder-open" aria-hidden="true"></i><?php learn_press_course_categories(); ?>
					</div>
					<div class="single-excerpt">
						<?php echo wp_trim_words( get_the_excerpt(),25, ''); ?>
					</div>

					<div class="lpcourse-top-button">
						<div class="single-price">
							<?php learn_press_courses_loop_item_price(); ?>
						</div>
						<?php learn_press_course_buttons(); ?>
					</div>
				</div> 
			</div>
			
		</div>

		<div class="lpcourse-main-2">
			<div class="col-md-8"> 
				<?php
				/**
				 * @since 3.0.0
				 */
				//do_action( 'learn-press/before-main-content' );

				do_action( 'learn-press/before-single-course' );

				?>
				<div id="learn-press-course" class="course-summary">
					<?php
					/**
					 * @since 3.0.0
					 *
					 * @see learn_press_single_course_summary()
					 */
					do_action( 'learn-press/single-course-summary' );
					?>
				</div>

				<?php
					/**
					 * @since 3.0.0
					 */
					//do_action( 'learn-press/after-main-content' );

					//do_action( 'learn-press/after-single-course' ); 
				?>

			</div>
			<div class="col-md-4"> 
				<?php edumodo_course_info(); ?>
				<?php edumodo_related_courses(); ?>
			</div>
		</div>
</div>


<?php
/**
 * @deprecated
 */
do_action( 'learn_press_after_single_course_summary' );
do_action( 'learn_press_after_single_course' );
do_action( 'learn_press_after_main_content' );