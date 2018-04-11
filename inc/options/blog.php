<?php

Redux::setSection( $opt_name, array(
    'title'  => esc_html__( 'Blog', 'edumodo' ),
    'id'     => 'edumodo-blog-options',
    'icon'   => 'el el-book',
    'fields' => array(
        array(
            'id'       => 'enable-related-post',
            'type'     => 'switch',
            'title'    => esc_html__('Related Post', 'edumodo'),
            'default'  => true,
        ),

         array(
                'id'       => 'social-share',
                'type'     => 'switch',
                'title'    => esc_html__('Single Page Social Share', 'edumodo'),
                'default'  => true,
        ),

        array(
            'id'       => 'default-sidebar-select',
            'type'     => 'select',
            'title'    => esc_html__('Blog Page Sidebar', 'edumodo'),
            'options'  => array(
                'sidebar_left' => esc_html__('Left Sidebar', 'edumodo'),
                'sidebar_right' => esc_html__('Right Sidebar', 'edumodo'),
                'no_sidebar' => esc_html__('No Sidebar', 'edumodo'),
            ),
            'default'  => 'sidebar_right',
        ),

        array(
            'id'       => 'details-sidebar-select',
            'type'     => 'select',
            'title'    => esc_html__('Single Page Sidebar', 'edumodo'),
            'options'  => array(
                'sidebar_left' => esc_html__('Left Sidebar', 'edumodo'),
                'sidebar_right' => esc_html__('Right Sidebar', 'edumodo'),
                'no_sidebar' => esc_html__('No Sidebar', 'edumodo'),
            ),
            'default'  => 'sidebar_right',
        ),

    )
) );
