<?php

    // -> General Settings
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'General Settings', 'edumodo' ),
        'icon'   => 'el-icon-home',
        'fields' => array(

            array(
                'id'       => 'enable-header',
                'type'     => 'switch',
                'title'    => esc_html__('Enable Header', 'edumodo'),
                'default'  => true,
            ),

            array(
                'id'       => 'enable-breadcrumb',
                'type'     => 'switch',
                'title'    => esc_html__('Enable Breadcrumb', 'edumodo'),
                'default'  => true,
            ),

            array(
                'id'    => 'enable-header-single-posts-and-custom-post',
                'type'  => 'switch',
                'title'    => esc_html__('Enable Header in Single Post', 'edumodo'),
                'default'  => true,
                'required' => array('enable-breadcrumb','=', 1)
            ),

    )
) );
