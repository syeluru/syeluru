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
<!-- This header section only for learnpress single page 3 style   -->

<?php 

// Global Options
global $edumodo_options;
// Prefix
$prefix = '_edumodo_';

 ?>

	<div class="row">
		<div class="lpcourse-course-wapper-3">
				<div class="lpcourse-main">
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
						
					<?php edumodo_related_courses_grid(); ?>

					</div>

					<div class="col-md-4"> 
						<div class="lpcourse-sidebar">
							<?php edumodo_lp_course_sidebar_3(); ?>
						</div>
					</div>

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