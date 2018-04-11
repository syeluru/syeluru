<?php
/**
 * Declaring widgets
 *
 *
 * @package Edumodo
 */
function edumodo_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Main Sidebar', 'edumodo' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Main Widget Area.', 'edumodo' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
     
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget 1', 'edumodo' ),
		'id'            => 'footer-sidebar-1',
		'description'   => 'Footer Widget Area 1',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
	) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Widget 2', 'edumodo' ),
        'id'            => 'footer-sidebar-2',
        'description'   => 'Footer Widget Area 2',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Widget 3', 'edumodo' ),
        'id'            => 'footer-sidebar-3',
        'description'   => 'Footer Widget Area 3',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Widget 4', 'edumodo' ),
        'id'            => 'footer-sidebar-4',
        'description'   => 'Footer Widget Area 4',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Course Single Widget', 'edumodo' ),
        'id'            => 'course-sidebar-1',
        'description'   => 'Course Single Page Widget',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Notice Single Widget', 'edumodo' ),
        'id'            => 'notice-sidebar-1',
        'description'   => 'Notice Single Page Widget',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

}
add_action( 'widgets_init', 'edumodo_widgets_init' );