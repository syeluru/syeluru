<?php
/**
 * over right
 * ============
 */
/**
 * The Template for displaying all single lessons.
 *
 * Override this template by copying it to yourtheme/sensei/single-lesson.php
 *
 * @author 		Automattic
 * @package 	Sensei
 * @category    Templates
 * @version     1.9.0
 */
$lesson_embed_video = get_post_meta( get_the_ID(), '_lesson_video_embed', true );
?>

<?php  get_sensei_header();  ?>

<?php the_post(); ?>

<article <?php post_class( array( 'lesson', 'post' ) ); ?>>

    <?php
    /**
     * get the featured
     * image of the lesson
     */
    $enable_image_in_single_lesson_page = Sensei()->settings->settings[ 'lesson_single_image_enable' ];
    $lesson_image_url = get_the_post_thumbnail_url();
    /**
     * Get the lesson
     * meta and author
     */
    $lesson_data = get_post( get_the_ID() );
    $lesson =  apply_filters( 'sensei_courses_shortcode_course_data', $lesson_data );
    $author_data = get_user_by( 'ID', $lesson->post_author );
    $author_display_name = $author_data->user_nicename;

        /**
         * Hook inside the single lesson above the content
         *
         * @since 1.9.0
         *
         * @param integer $lesson_id
         *
         * @hooked deprecated_lesson_image_hook - 10
         * @hooked deprecate_sensei_lesson_single_title - 15
         * @hooked Sensei_Lesson::lesson_image() -  17
         * @hooked deprecate_lesson_single_main_content_hook - 20
         */
    ?>
    <div class="row i-am-single-lesson-header-row">
        <div class="container">
            <div class="edumodo-sensi-lesson-header">
                <div class="<?php echo get_the_post_thumbnail_url(get_the_ID()) ? 'col-md-6' : 'col-md-12'; ?> header-meta-wrapper">
                    <div class="edumodo-lesson-header-meta-wrapper">
                        <?php do_action( 'sensei_single_lesson_content_inside_before', get_the_ID() ); ?>
                    </div>

                    <p class="sensei-lesson-meta">
                        <span class="lesson-author">
                            <?php esc_html_e( 'by', 'edumodo' ); ?>
                            <?php echo esc_html( $author_display_name ); ?>
                        </span>
                    </p>
                    <div class="single-lesson-excerpt-wrapper">
                        <?php
                        if ( $_post = get_post( get_the_ID() ) ) {
                            echo esc_html($_post->post_excerpt);
                            wp_reset_postdata();
                        }
                        ?>
                    </div>
                    <div class="edumodo-lesson-send-message">
                        <?php do_action('edumodo_single_lesson_send_message'); ?>
                    </div>
                </div>

                <?php if($enable_image_in_single_lesson_page && get_the_post_thumbnail_url(get_the_ID())): ?>
                    <div class="col-md-6 featured-image-wrapper">
                        <div class="lesson-featured-image">
                            <img src="<?php echo esc_url($lesson_image_url); ?>" alt="">
                        </div>
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </div>

    <section class="entry fix">
        <?php
        if ( sensei_can_user_view_lesson() ) {

            if( apply_filters( 'sensei_video_position', 'top', $post->ID ) == 'top' ) {
                if(! empty($lesson_embed_video)):
                ?>
                    <div class="col-md-12 lesson-video-container">
                        <div class="embed-responsive embed-responsive-16by9 lesson-video-wrapper">
                            <?php do_action( 'sensei_lesson_video', $post->ID ); ?>
                        </div>
                    </div>
                <?php
                endif;
            }
            ?>
            <div class="i-am-lesson-content-wrapper">
                <?php the_content(); ?>
            </div>
            <?php

        } else {
            ?>
                <p>
                    <?php echo get_the_excerpt(); ?>
                </p>
            <?php
        }
        ?>
    </section>
        <div class="i-am-lesson-meta-data">
            <?php
                /**
                 * Hook inside the single lesson template after the content
                 *
                 * @since 1.9.0
                 *
                 * @param integer $lesson_id
                 *
                 * @hooked Sensei()->frontend->sensei_breadcrumb   - 30
                 */
                do_action( 'sensei_single_lesson_content_inside_after', get_the_ID() );
            ?>
        </div>
</article><!-- .post -->

<?php get_sensei_footer(); ?>
