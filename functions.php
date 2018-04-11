<?php
/**
 * Edumodo functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Edumodo
 */


define( 'EDUMODO_VERSION', '1.4' );

if ( ! function_exists( 'edumodo_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function edumodo_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on edumodo, use a find and replace
	 * to change 'edumodo' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'edumodo', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'edumodo' ),
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'image',
		'video',
		'audio',
		'gallery',
		'link',
		'quote',
	) );

	/*
	 * edumodo default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'edumodo_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'edumodo_setup' );




/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function edumodo_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'edumodo_content_width', 640 );
}
add_action( 'after_setup_theme', 'edumodo_content_width', 0 );


/**
 * Enqueue scripts and styles.
 */
function edumodo_scripts() {

	// Stytlesheet 
	wp_enqueue_style( 'roboto-fonts',  get_template_directory_uri() . '/dist/fonts/robotot.css', array(), EDUMODO_VERSION, 'all' );
	wp_enqueue_style( 'montserrat-fonts',  get_template_directory_uri() . '/dist/fonts/montserrat.css', array(), EDUMODO_VERSION, 'all' );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/dist/css/bootstrap.css', array(), '3.3.7', 'all' );
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/dist/css/animate.css', array(), '3.5.1', 'all' );
	wp_enqueue_style( 'owl', get_template_directory_uri() . '/dist/css/owl.carousel.min.css', array(), '2.2.1', 'all' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/dist/css/font-awesome.min.css', array(), '4.7.0', 'all' );
	wp_enqueue_style( 'atvimg', get_template_directory_uri() . '/dist/css/atvImg.css', array(), EDUMODO_VERSION, 'all' );
	wp_enqueue_style( 'magnific-popup', get_template_directory_uri() . '/dist/css/magnific-popup.css', array(), EDUMODO_VERSION, 'all' );
	wp_enqueue_style( 'edumodo-style', get_stylesheet_uri() );
	wp_enqueue_style( 'edumodo-main-style', get_template_directory_uri() . '/dist/css/style.css', array(), EDUMODO_VERSION, 'all' );

	// Script Load
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/dist/js/bootstrap.min.js', array('jquery'), EDUMODO_VERSION, true );
	wp_enqueue_script( 'classie', get_template_directory_uri() . '/dist/js/classie.js', array( ), EDUMODO_VERSION, true );
	wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/dist/js/owl.carousel.min.js', array('jquery'), EDUMODO_VERSION, true );
	wp_enqueue_script( 'atvimg', get_template_directory_uri() . '/dist/js/atvImg-min.js', array( ), EDUMODO_VERSION, true );
	wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/dist/js/jquery.magnific-popup.js', array('jquery'), EDUMODO_VERSION, true );
	wp_enqueue_script( 'edumodos', get_template_directory_uri() . '/dist/js/edumodo.js', array('jquery'), EDUMODO_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'edumodo_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load edumodo widgets
 */
require get_template_directory() . '/inc/widgets/widgets.php';

/**
 * Load Redux framework
 */

require_once get_template_directory() . '/inc/edumodo-config.php';


/**
 * Edumodo theme support
 */
require get_template_directory() . '/inc/theme-support.php';

/**
 * theme primary style 
 */
require get_template_directory() . '/inc/style.php';

/*
 * tgm plugin class
 * */
require get_template_directory() . '/plugin/class-tgm-plugin-activation.php';

/*
 * tgm plugin activation
 * */
require get_template_directory() . '/inc/plugin-activation.php';

/*
 * One click demo
 * */
require get_template_directory() . '/inc/one-click-demo.php';


add_filter('wp_title', 'edumodo_archive_titles');

/**
* Modify <title> if on an archive page.
*
* @author Philip Downer <philip@manifestbozeman.com>
* @link http://manifestbozeman.com
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* @version v1.0
*
* @param string $orig_title Original page title
* @return string New page title
*/
function edumodo_archive_titles($orig_title) {
	
	global $post;
	$post_type = $post->post_type;
	
	$types = array(
		array( //Create an array for each post type you wish to control.
			'post_type' => 'tx-course', //Your custom post type name
			'title' => 'Course' //The title tag you'd like displayed
		),
	);
	if ( is_archive() ) { //FIRST CHECK IF IT'S AN ARCHIVE
		
		//CHECK IF THE POST TYPE IS IN THE ARRAY
		foreach ( $types as $k => $v) {
			if ( in_array($post_type, $types[$k])) {
			return $types[$k]['title'];
			}
		}
		
	} else { //NOT AN ARCHIVE, RETURN THE ORIGINAL TITLE
		return $orig_title;
	}
}

