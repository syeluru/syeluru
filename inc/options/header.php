<?php

    /// -> Header Settings
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__('Header options', 'edumodo' ),
        'icon'   => 'el el-credit-card',
        'fields' => array(

            array(
                'id'       => 'select_header',
                'type'     => 'select',
                'title'    => __('Select Header', 'edumodo'),
                'desc'     => __('Please select your header.', 'edumodo'),
                'options'  => Array(
                    'header_1' => esc_html__('Header V1', 'edumodo'),
                    'header_2' => esc_html__('Header V2', 'edumodo'),
                ),
                'default'  => 'header_1',
            ),

             array(
                    'id'       => 'header_position_1',
                    'type'     => 'select',
                    'title'    => __('Header Style', 'edumodo'),
                    'options'  => Array(
                        'static'    => esc_html__('Static', 'edumodo'),
                        'fixed'    => esc_html__('Fixed', 'edumodo'),
                        'absolute' => esc_html__('Transparent', 'edumodo'),
                    ),
                    'default'  => 'static',
                    'required' => array('select_header','=','header_1'),
            ),

             array(
                    'id'       => 'header_position_2',
                    'type'     => 'select',
                    'title'    => __('Header Position', 'edumodo'),
                    'options'  => Array(
                        'static'    => esc_html__('Static', 'edumodo'),
                        'fixed'    => esc_html__('Fixed', 'edumodo'),
                        'absolute' => esc_html__('Transparent', 'edumodo'),
                    ),
                    'default'  => 'static',
                    'required' => array('select_header','=','header_2'),
            ),

            array(
                'id'       => 'edumodo_logo',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Logo', 'edumodo' ),
                'required' => array('select_header','=','header_1'),
            ),
            array(
                'id'       => 'edumodo_logo_2',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Logo', 'edumodo' ),
                'required' => array('select_header','=','header_2'),
            ),
            
            array(
                'id'        => 'nav_bg_color',
                'type'      => 'color',
                'title'     => esc_html__('Menu Background Color', 'edumodo'),
                'default'   => 'transparent',
                'output'    => array(
                    'background' => '.navbar-default',
                ),
            ),

            array(
                'id'        => 'fixed_scroll_nav_bg_color',
                'type'      => 'color',
                'title'     => esc_html__('Sticky Background Color', 'edumodo'),
                'default'   => '#fff',
                'output'    => array(
                    'background' => '.edumodo-header-1.sticky .navbar-default',
                ),
                'required' => array('header_position_1','=','fixed'),
            ),

            array(
                'id'        => 'fixed_scroll_nav_bg_color_header_v2',
                'type'      => 'color',
                'title'     => esc_html__('Sticky Background Color', 'edumodo'),
                'default'   => '#fff',
                'output'    => array(
                    'background' => '.edumodo-header-2.sticky .navbar-default',
                ),
                'required' => array('header_position_2','=','fixed'),
            ),

            array(
                'id'        => 'absolute_scroll_nav_bg_color',
                'type'      => 'color',
                'title'     => esc_html__('Sticky Background Color', 'edumodo'),
                'default'   => '#fff',
                'output'    => array(
                    'background' => '.edumodo-header-1.sticky .navbar-default',
                ),
                'required' => array('header_position_1','=','absolute'),
            ),

            array(
                'id'        => 'absolute_scroll_nav_bg_color_header_v2',
                'type'      => 'color',
                'title'     => esc_html__('Sticky Background Color', 'edumodo'),
                'default'   => '#fff',
                'output'    => array(
                    'background' => '.edumodo-header-2.sticky .navbar-default',
                ),
                'required' => array('header_position_2','=','absolute'),
            ),

            array(
                'id'    => 'menu_color',
                'type'  => 'color',
                'title' => esc_html__('Menu Text Color', 'edumodo'),
                'default'  => '#787f88',
                'output'    => array(
                    'color' => '.navbar-default .navbar-nav > li > a, .edumodo-header-2 .login-reg span a',
                ),
            ),

            array(
                'id'    => 'absolute_transperent_menu_color_text_innerpage_header_1',
                'type'  => 'color',
                'title' => esc_html__('Inner Page Menu Text Color', 'edumodo'),
                'default'  => '#787f88',
                'output'    => array(
                    'color' => '.inner-page-class .navbar-default .navbar-nav > li > a, edumodo-header-1  .login-reg span a',
                ),
                'required' => array('header_position_1','=','absolute'),
            ),

            array(
                'id'    => 'absolute_transperent_menu_color_text_innerpage_header_2',
                'type'  => 'color',
                'title' => esc_html__('Inner Page Menu Text Color', 'edumodo'),
                'default'  => '#787f88',
                'output'    => array(
                    'color' => '.inner-page-class .navbar-default .navbar-nav > li > a, edumodo-header-2  .login-reg span a',
                ),
                'required' => array('header_position_2','=','absolute'),
            ),

            array(
                'id'    => 'fixed_scrool_menu_text_color_header_1',
                'type'  => 'color',
                'title' => esc_html__('Sticky Menu Text Color', 'edumodo'),
                'default'  => '#787f88',
                'output'    => array(
                    'color' => '.sticky .navbar-default .navbar-nav > li > a, .sticky .edumodo-header-2 .login-reg span a',
                ),
                'required' => array('header_position_1','=','fixed'),
            ),

            array(
                'id'    => 'fixed_scrool_menu_text_color_header_2',
                'type'  => 'color',
                'title' => esc_html__('Sticky Menu Text Color', 'edumodo'),
                'default'  => '#787f88',
                'output'    => array(
                    'color' => '.sticky .navbar-default .navbar-nav > li > a, .sticky .edumodo-header-2 .login-reg span a',
                ),
                'required' => array('header_position_2','=','fixed'),
            ),

            array(
                'id'    => 'absolute_scrool_menu_text_color_header_1',
                'type'  => 'color',
                'title' => esc_html__('Sticky Menu Text Color', 'edumodo'),
                'default'  => '#787f88',
                'output'    => array(
                    'color' => '.sticky .navbar-default .navbar-nav > li > a, .sticky .edumodo-header-1 .login-reg span a',
                ),
                'required' => array('header_position_1','=','absolute'),
            ),

            array(
                'id'    => 'absolute_scrool_menu_text_color_header_2',
                'type'  => 'color',
                'title' => esc_html__('Sticky Menu Text Color', 'edumodo'),
                'default'  => '#787f88',
                'output'    => array(
                    'color' => '.sticky .navbar-default .navbar-nav > li > a, .sticky .edumodo-header-2 .login-reg span a',
                ),
                'required' => array('header_position_2','=','absolute'),
            ),


            array(
                'id'    => 'menu_active_color',
                'type'  => 'color',
                'title' => esc_html__('Menu Hover/Active Color', 'edumodo'),
                'default'  => '#ecb101',
            ),

            array(
                'id'    => 'signin_link_header_2',
                'type'  => 'text',
                'title' => esc_html__('Sign In Link', 'edumodo'),
                'default'  => '#',
                'required' => array('select_header','=','header_2'),
            ),

            array(
                'id'    => 'register_link_header_2',
                'type'  => 'text',
                'title' => esc_html__('Register Link', 'edumodo'),
                'default'  => '#',
                'required' => array('select_header','=','header_2'),
            ),
        )
  ));
