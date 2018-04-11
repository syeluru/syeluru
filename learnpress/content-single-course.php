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

	// Global Options
	global $edumodo_options;
	// Learnpress single course page
	$learnpress_select = $edumodo_options['learnpress_select']; ?>

		<?php if ('learnpress_single_two' == $learnpress_select):

			get_template_part( 'learnpress/template-parts/content-single-course-two', 'course');

		 elseif('learnpress_single_three' == $learnpress_select): 

			get_template_part( 'learnpress/template-parts/content-single-course-three', 'course');

		 else: 

		  	get_template_part( 'learnpress/template-parts/content-single', 'course');

		 endif; 