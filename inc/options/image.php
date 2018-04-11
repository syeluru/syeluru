<?php

Redux::setSection( $opt_name, array(
    'title'  => esc_html__( 'Background Image', 'edumodo' ),
    'id'     => 'switch-image',
    'icon'   => 'el el-smiley',
    'fields' => array(
        /**
         * Background Image Theme Options Goes here
         */

        array(
                'id'  => 'category_page_bg_image',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Category Page Header Background Image', 'edumodo' ),
                'default'  => array(
                    'url'=> get_stylesheet_directory_uri().  '/dist/images/header-img.jpg',
                ),
        ),

        /**
        Sensei Course page header image
        */
        array(
                'id'  => 'sensei_course_archive_header_img',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Sensei Archive Page Header Background Image', 'edumodo' ),
                'default'  => array(
                    'url'=> get_stylesheet_directory_uri().  '/dist/images/header-img.jpg',
                ),
        ),
        /**
        Learnpress Course page header image
        */
        array(
                'id'  => 'learnpress_course_archive_header_img',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'LearnPress Archive Page Header Background Image', 'edumodo' ),
                'default'  => array(
                    'url'=> get_stylesheet_directory_uri().  '/dist/images/header-img.jpg',
                ),
        ),
        /**
        Shop page header image
        */
        array(
                'id'  => 'shop_header_img',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Shop Page Header Background Image', 'edumodo' ),
                'default'  => array(
                    'url'=> get_stylesheet_directory_uri().  '/dist/images/header-img.jpg',
                ),
        ),
        /**
        Event page header image
        */
        array(
                'id'  => 'event_header_img',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Event Page Header Background Image', 'edumodo' ),
                'default'  => array(
                    'url'=> get_stylesheet_directory_uri().  '/dist/images/header-img.jpg',
                ),
        ),
        /**
        Teachers page header image
        */
        array(
                'id'  => 'teacher_archive_header_img',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Teachers Archive Page Header Background Image', 'edumodo' ),
                'default'  => array(
                    'url'=> get_stylesheet_directory_uri().  '/dist/images/header-img.jpg',
                ),
        ),
        /**
        Search page header image
        */
        array(
                'id' => 'search_page_bg_image',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Search Page Header Background Image', 'edumodo' ),
                'default'  => array(
                    'url'=> get_stylesheet_directory_uri().  '/dist/images/header-img.jpg',
                ),
        ),
        /**
        404 page image
        */
       array(
                'id' => '404_image',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( '404 Image', 'edumodo' ),
                'default'  => array(
                    'url'=> get_stylesheet_directory_uri().  '/dist/images/404.png',
                ),

        ),
    )
) 
);
