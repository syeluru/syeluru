<?php
/**
 * Created by PhpStorm.
 * User: txmm1
 * Date: 10/26/17
 * Time: 2:54 PM
 */
/**
 * customize default course class
 * that comes from sensei
 * ===============================
 */
$customize_course_class=[];
$default_course_class_comes_form_sensei = WooThemes_Sensei_Course::get_course_loop_content_class();
foreach($default_course_class_comes_form_sensei as $course_class):
    array_push($customize_course_class, $course_class);
endforeach;
/**
 * Add featured class
 * if course is featured
 * from admin panel
 * while create an course
 * =======================
 */
$featured_course = get_post_meta( get_the_ID(), '_course_featured', true );
$customize_course_class[] = $featured_course;
$customize_course_class[] = Sensei()->settings->settings[ 'edumodo-archive-style-checkbox' ] ? 'grid-enable col-md-4' : 'list-enable col-md-12';
/**
 * get the loop counter
 */
global $sensei_course_loop;
$sensei_course_loop['counter'];
/**
 * get the price
 * check if it is free or not
 */
$price_data = get_post_meta(get_the_ID(), '_course_woocommerce_product', true);
$value_of_course = '';
if($price_data == '-'){
    $value_of_course = 'Free';
}elseif($price_data){
    $value_of_course = '';
}else{
    $value_of_course = 'Free';
}

?>

<li <?php post_class( $customize_course_class  ); ?> >
<?php
/**
 * This action runs before the sensei course content. It runs inside the sensei
 * content-course.php template.
 *
 * @since 1.9
 *
 * @param integer $course_id
 */
do_action( 'sensei_course_content_before', get_the_ID() );
/**
 * Custom added
 * add below code while
 * there is any major update
 */
?>

<?php if(! empty(get_the_post_thumbnail())): ?>
    <div class="thumbnail col-md-12">
        <div class="thumb-wrapper">
            <?php the_post_thumbnail('full'); ?>
        </div>
        <?php if($price_data == '-'): ?>
            <div class="free-tag"><?php echo esc_html($value_of_course); ?></div>
        <?php endif; ?>
    </div>
    <?php
else:
    if($price_data == '-'): ?>
        <div class="free-tag"><?php echo esc_html($value_of_course); ?></div>
    <?php
    endif;
endif;
/**
 * end of custom code
 * also update below section
 * class logic
 */
?>
<section class="grid-course-content">
    <section class="entry">
        <?php
        /**
         * Fires just before the course content in the content-course.php file.
         *
         * @since 1.9
         *
         * @param integer $course_id
         *
         * @hooked Sensei_Templates::the_title          - 5
         * @hooked Sensei()->course->course_image       - 10
         * @hooked Sensei()->course->the_course_meta    - 20
         */
        do_action('sensei_course_content_inside_before', get_the_ID() );
        ?>

        <p class="course-excerpt">
            <?php echo wp_trim_words(get_the_excerpt(), 20, ''); ?>
        </p>
        <div class="link-to-the-full-course">
            <a href="<?php the_permalink(); ?>">
                <?php esc_html_e('Enroll Course', 'edumodo') ?>
            </a>
        </div>

        <?php
        /**
         * Fires just after the course content in the content-course.php file.
         *
         * @since 1.9
         *
         * @param integer $course_id
         *
         * @hooked  Sensei()->course->the_course_free_lesson_preview - 20
         */
        do_action('sensei_course_content_inside_after', get_the_ID() );
        ?>

    </section> <!-- section .entry -->

</section> <!-- section .course-content -->

<?php
/**
 * Fires after the course block in the content-course.php file.
 *
 * @since 1.9
 *
 * @param integer $course_id
 *
 * @hooked  Sensei()->course->the_course_free_lesson_preview - 20
 */
do_action('sensei_course_content_after', get_the_ID() );
?>

</li>
<?php if($sensei_course_loop['counter'] % 3 == 0): ?>
    <span class="clearfix"></span>
<?php endif; ?>