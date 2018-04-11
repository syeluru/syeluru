<?php
/**
 * Declare that your theme now supports Sensei
 */
add_action( 'after_setup_theme', 'sensei_support' );
function sensei_support() {
    add_theme_support( 'sensei' );
}

/**
 * Remove the default Sensei wrappers
 */
global $woothemes_sensei;
remove_action( 'sensei_before_main_content', array( $woothemes_sensei->frontend, 'sensei_output_content_wrapper' ), 10 );
remove_action( 'sensei_after_main_content', array( $woothemes_sensei->frontend, 'sensei_output_content_wrapper_end' ), 10 );

/**
 * Add edumodo wrapper
 * specific custom
 * Sensei content  wrappers
 */
add_action('sensei_before_main_content', 'edumodo_sensei_wrapper_start', 10);
add_action('sensei_after_main_content', 'edumodo_sensei_wrapper_end', 10);

function edumodo_sensei_wrapper_start() {
    if ( is_singular( 'course' ) ){
        remove_action( 'woocommerce_before_single_product', 'x_woocommerce_before_single_product', 10 );
        remove_action( 'woocommerce_after_single_product', 'x_woocommerce_after_single_product', 10 );
    }
    do_action('edumodo-enable-or-disable-header-section');
    ?>
    <div class="row sensei-main-content <?php echo is_single() ? 'single-course-main-content' : ''; ?>">
        <div class="container sensei-container">
            <div class="entry-wrap">
    <?php
}

function edumodo_sensei_wrapper_end() {
    echo ' </div> <!-- .entry-wrap -->'
        . '</div> <!-- end container sensei-container -->';
    /**
     * if you need sidebar the
     * uncomment the below code
     * get_sidebar();
     */
    echo'</div> <!-- end row sensei-main-content -->';
}

/**
 * remove default sensei titles
 */
remove_action( 'sensei_course_single_title', array( $woothemes_sensei->frontend , 'sensei_single_title' ), 10 );
remove_action( 'sensei_lesson_single_title', array( $woothemes_sensei->frontend , 'sensei_single_title' ), 10 );
remove_action( 'sensei_quiz_single_title', array( $woothemes_sensei->frontend, 'sensei_single_title' ), 10 );
remove_action( 'sensei_message_single_title', array( $woothemes_sensei->frontend, 'sensei_single_title' ), 10 );


/**
 * Add custom theme title:
 */
add_action( 'sensei_course_single_title', 'edumodo_sensei_single_title', 10 );
add_action( 'sensei_lesson_single_title', 'edumodo_sensei_single_title', 10 );
add_action( 'sensei_quiz_single_title', 'edumodo_sensei_single_title', 10 );
add_action( 'sensei_message_single_title', 'edumodo_sensei_single_title' , 10 );

function edumodo_sensei_single_title() {
    global $post;

    if( is_singular( 'sensei_message' ) ) {
        $content_post_id = get_post_meta( $post->ID, '_post', true );
        if( $content_post_id ) {
            $title = sprintf( __( 'Re: %1$s', 'edumodo' ), '<a href="' . get_permalink( $content_post_id ) . '">' . get_the_title( $content_post_id ) . '</a>' );
        } else {
            $title = get_the_title( $post->ID );
        }
    } else {
        $title = get_the_title();
    }
}

/**
 * Remove sensei default hook
 * ==========================
 * @1.9.0
 * hook the single course title on the single course page
 */
/* Course Remove hook */
$sensi_message = new WooThemes_Sensei_Messages();
//sensei_course_single_title
remove_action( 'sensei_single_course_content_inside_before', array( 'Sensei_Course', 'the_title' ), 10 );
remove_action( 'sensei_single_course_content_inside_before', array( Sensei()->course , 'course_image'), 20 );
remove_action( 'sensei_single_course_content_inside_before', array( 'Sensei_Course', 'the_course_enrolment_actions' ), 30 );
remove_action( 'sensei_single_course_content_inside_before', array( 'Sensei_Course' , 'the_course_video' ), 40 );
remove_action( 'sensei_single_course_content_inside_before', array( $sensi_message, 'send_message_link' ), 35 );
remove_action('sensei_single_course_content_inside_before', array( 'Sensei_Templates', 'deprecated_single_course_inside_before_hooks' ), 80);
remove_action( 'sensei_single_lesson_content_inside_before', array( 'Sensei_Templates', 'deprecate_sensei_lesson_single_title' ), 15 );
/* Lesson Remove hook */
remove_action( 'sensei_single_lesson_content_inside_before', array( 'Sensei_Lesson', 'the_lesson_image' ), 17 );
remove_action( 'sensei_single_lesson_content_inside_before', array( $sensi_message, 'send_message_link' ), 30, 2 );

/**
 * Add edumodo hook
 * for sensei
 * ==================
 */
add_action( 'edumodo_single_course_content_inside_before', array( 'Sensei_Course' , 'course_image'), 20 );
add_action( 'edumodo_single_course_enrolment_actions', array( 'Sensei_Course', 'the_course_enrolment_actions' ), 30 );
add_action( 'edumodo_single_course_send_message', array( $sensi_message, 'send_message_link' ) );
add_action( 'edumodo_single_course_content_inside_before', array( 'Sensei_Course' , 'the_course_video' ), 40 );
add_action( 'edumodo_single_lesson_send_message', array( $sensi_message, 'send_message_link' ), 30, 2 );

/**
 * Add settings in the sensei setting tab
 */
if( class_exists( 'Sensei_Main' ) ) {
    add_filter( 'sensei_settings_tabs', 'edumodo_sensei_style_setting' );
    add_filter( 'sensei_settings_fields', 'edumodo_sensei_setting_fields');
}
/**
 * add a section in the setting tab
 * of sensei settings
 */
if(! function_exists('edumodo_sensei_style_setting')){
    function edumodo_sensei_style_setting( $settingss ) {
        $settingss['edumodo-archive-style'] = array(
            'name' => esc_html__( 'Archive Style', 'edumodo' ),
            'description' => '',
        );
        return $settingss;
    }
}
/**
 * add a field of setting
 * to a specific tab
 */
if(! function_exists('edumodo_sensei_setting_fields')){
    function edumodo_sensei_setting_fields($fields){
        $fields['edumodo-archive-style-checkbox'] = array(
            'name' => __( 'Grid', 'edumodo' ),
            'description' => __( 'Enable Grid', 'edumodo' ),
            'type' => 'checkbox',
            'default' => false,
            'section' => 'edumodo-archive-style'
        );
        return $fields;
    }
}


