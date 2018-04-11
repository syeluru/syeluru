<?php

Redux::setSection( $opt_name, array(
    'title'  => esc_html__( 'Sensei', 'edumodo' ),
    'id'     => 'sensei-options',
    'icon'   => 'el el-indent-left',
    'fields' => array(
        /**
         * Sensei Theme Options Goes here
        */
        array(
            'id'       => 'sensei_select',
            'type'     => 'select',
            'title'    => esc_html__('Sensei Archive Template', 'edumodo'),
            'options'  => array(
                'sensei_archive_one' => esc_html__('Style 1', 'edumodo'),
                'sensei_archive_two' => esc_html__('Style 2', 'edumodo'),
            ),
            'default'  => 'sensei_archive_one',
        ),


    )
) 
);
