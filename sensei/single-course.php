<?php
/**
 * over right
 * ============
 */
/**
 * The Template for displaying all single courses.
 *
 * Override this template by copying it to yourtheme/sensei/single-course.php
 *
 * @author 		Automattic
 * @package 	Sensei
 * @category    Templates
 * @version     1.9.0
 */
?>

<?php  get_sensei_header();  ?>

<article <?php post_class( array( 'course', 'post' ) ); ?>>

    <?php

    /**
     * Hook inside the single course post above the content
     *
     * @since 1.9.0
     *
     * @param integer $course_id
     *
     * @hooked Sensei()->frontend->sensei_course_start     -  10
     * @hooked Sensei_Course::the_title                    -  10
     * @hooked Sensei()->course->course_image              -  20
     * @hooked Sensei_WC::course_in_cart_message           -  20
     * @hooked Sensei_Course::the_course_enrolment_actions -  30
     * @hooked Sensei()->message->send_message_link        -  35
     * @hooked Sensei_Course::the_course_video             -  40
     * do_action( 'sensei_single_course_content_inside_before', get_the_ID() )
     */
    ?>
    <?php
    /**
     * From the default tempalte
     * do_action( 'sensei_single_course_content_inside_before', get_the_ID() );
     */
    $enable_image_in_single_course_page = Sensei()->settings->settings[ 'course_single_image_enable' ];
    $course_image_url = get_the_post_thumbnail_url();
    $course_embed_video = get_post_meta( get_the_ID(), '_course_video_embed', true );
    $category_output = get_the_term_list( get_the_ID(), 'course-category', '', ', ', '' );
    /**
     * get the courser
     * author and other data
     */
    $course_data = get_post( get_the_ID() );
    $course =  apply_filters( 'sensei_courses_shortcode_course_data', $course_data );
    $author_data = get_user_by( 'ID', $course->post_author );
    $author_display_name = $author_data->user_nicename;
    /**
     * Check if any course
     * is featured
     */
    $featured_course = get_post_meta( get_the_ID(), '_course_featured', true );
    global $post;
    ?>

    <div class="row i-am-single-course-header-row <?php echo esc_html($featured_course) ? esc_html($featured_course) : ''; ?>">
        <div class="container">
            <div class="edumodo-sensi-course-header">
                <div class="<?php echo !($enable_image_in_single_course_page && get_the_post_thumbnail_url(get_the_ID())) ? 'col-md-12' :'col-md-7' ?> header-meta-wrapper">
                    <h2 class="course-title"><?php the_title(); ?></h2>
                    <p class="sensei-course-meta">
                        <span class="course-author">
                            <?php esc_html_e( 'by', 'edumodo' ); ?>
                            <?php echo esc_html( $author_display_name ); ?>
                        </span>
                        <span class="course-lesson-count">
                            <?php echo Sensei()->course->course_lesson_count( get_the_ID() ) . '&nbsp;' . esc_html__( 'Lessons', 'edumodo' ); ?>
                        </span>
                        <?php if ( '' != $category_output ) : ?>
                            <span class="course-category">
                                <?php echo sprintf( esc_html__( 'in %s', 'edumodo' ), $category_output ); ?>
                            </span>
                        <?php endif; ?>
                    </p>
                    <!--  Appear when enroll in a course -->
                    <div class="edumodo-course-progress">
                        <?php do_action( 'sensei_single_course_content_inside_before', get_the_ID() ); ?>
                    </div>
                    <div class="single-course-excerpt-wrapper">
                        <?php
                        if ( $_post = get_post( get_the_ID() ) ) {
                            echo esc_html($_post->post_excerpt);
                            wp_reset_postdata();
                        }
                        ?>
                    </div>
                    <div class="single-course-enroll-and-send-message-wrapper">

                        <div class="<?php echo ! ( (current_user_can('editor') || current_user_can('administrator')) && is_user_logged_in() ) ? 'col-md-12 user-not-logged-in' : 'col-md-6'; ?>">
                            <?php
                            $woo_data = get_post_meta(get_the_ID(), '_course_woocommerce_product')[0];
                            /**
                             * Single Course
                             * enroll action
                             */
                             do_action('edumodo_single_course_enrolment_actions');

                            ?>
                            <?php if(! is_user_logged_in() && ($woo_data == '-')): ?>
                                <div class="sensei-message info">
                                    <span><?php esc_html_e('Or', 'edumodo'); ?></span>
                                    <a href="<?php echo esc_url('/wp-login.php'); ?>"><?php esc_html_e('log in', 'edumodo'); ?></a>
                                    <span><?php esc_html_e('to access this course', 'edumodo'); ?></span>
                                </div>
                            <?php endif; ?>
                        </div>
                        <?php if( is_user_logged_in('editor')): ?>
                        <div class="col-md-6 course-message">
                            <?php
                            /**
                             * Single course
                             * send message
                             */
                            if(! isset($_GET['contact'])):
                            do_action('edumodo_single_course_send_message');
                            endif;
                            ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php if($enable_image_in_single_course_page && get_the_post_thumbnail_url(get_the_ID())): ?>
                <div class="col-md-5 featured-image-wrapper">
                    <?php if(has_post_thumbnail()): ?>
                    <div class="course-featured-image">
                        <a class="featured-image-and-video" href="<?php echo esc_url($course_embed_video) ? esc_url($course_embed_video) : '#'; ?>">
                            <img src="<?php echo esc_url($course_image_url); ?>">
                            <?php if($course_embed_video): ?>
                                <span class="video-icon-wrapper">
                                    <i class="fa fa-play"></i>
                                </span>
                            <?php endif; ?>
                        </a>
                    </div>
                    <?php else: ?>
                        <?php if($course_embed_video): ?>
                            <?php
                            /**
                             * check its embed code
                             * if not then replace with embed
                             */
                            $if_exist_embed = strpos($course_embed_video, 'embed');
                            if(! $if_exist_embed):
                            $embed_video = str_replace('watch?v=', 'embed/' ,$course_embed_video);
                            endif;
                            ?>
                            <div class="embed-responsive embed-responsive-16by9 course-video-wrapper">
                                <iframe class="embed-responsive-item" src="<?php echo esc_url($embed_video); ?>" allowfullscreen></iframe>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
                <!-- end of /.featured-image-wrapper -->
            </div>

        </div>
    </div>


    <section class="i-am-course-content-wrapper entry fix">

        <?php the_content(); ?>

    </section>

    <?php

    /**
     * Hook inside the single course post above the content
     *
     * @since 1.9.0
     *
     * @param integer $course_id
     *
     */
    ?>
    <?php
    /**
     * check if any lesson
     * is assign in this course
     */
    $sensei_course = new Sensei_Course();
    $check_if_any_lesson_exist_in_this_course = $sensei_course->course_lessons(get_the_ID());
    if(! empty($check_if_any_lesson_exist_in_this_course)):
    ?>
    <div class="i-am-course-lesson-wrapper">
        <?php
            do_action( 'sensei_single_course_content_inside_after', get_the_ID() );
        ?>
    </div>
    <?php endif; ?>
</article><!-- .post .single-course -->

<?php get_sensei_footer(); ?>