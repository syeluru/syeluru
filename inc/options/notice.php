<?php

Redux::setSection( $opt_name, array(
    'title'  => esc_html__( 'Notice', 'edumodo' ),
    'id'     => 'edumodo-notice-options',
    'icon'   => 'el el-volume-off',
    'fields' => array(

        array(
            'id'       => 'select-sidebar-notice-single-page',
            'type'     => 'select',
            'title'    => esc_html__('Single Page Sidebar Position', 'edumodo'),
            'options'  => array(
                'sidebar_left' => esc_html__('Left Sidebar', 'edumodo'),
                'sidebar_right' => esc_html__('Right Sidebar', 'edumodo'),
                'no_sidebar' => esc_html__('No Sidebar', 'edumodo'),
            ),
            'default'  => 'sidebar_right',
        ),

    )
) );
