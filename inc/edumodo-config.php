<?php

if ( ! class_exists( 'Redux' ) ) {
    return;
}

include get_template_directory() . '/inc/options/settings.php';
include get_template_directory() . '/inc/options/general.php';
include get_template_directory() . '/inc/options/header.php';
include get_template_directory() . '/inc/options/image.php';
include get_template_directory() . '/inc/options/blog.php';
include get_template_directory() . '/inc/options/custom-style.php';
include get_template_directory() . '/inc/options/custom-fonts.php';
include get_template_directory() . '/inc/options/notice.php';
include get_template_directory() . '/inc/options/learnpress.php';
include get_template_directory() . '/inc/options/footer.php';

if(class_exists('sensei_course')){
	include get_template_directory() . '/inc/sensei.php';
}
if(class_exists('LearnPress')){
	include get_template_directory() . '/inc/learnpress.php';
}
