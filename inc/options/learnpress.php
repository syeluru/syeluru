<?php

Redux::setSection( $opt_name, array(
    'title'  => esc_html__( 'Learnpress', 'edumodo' ),
    'id'     => 'learnpress-options',
    'icon'   => 'el el-lines',
    'fields' => array(

        /**
         * learnpress Theme Options Goes here
         */
        array(
            'id'       => 'learnpress_select',
            'type'     => 'select',
            'title'    => esc_html__('Single Course Style', 'edumodo'),
            'options'  => array(
                'learnpress_single_one' => esc_html__('Style 1', 'edumodo'),
                'learnpress_single_two' => esc_html__('Style 2', 'edumodo'),
                'learnpress_single_three' => esc_html__('Style 3', 'edumodo'),
            ),
            'default'  => 'learnpress_single_three',
        ),
        
        array(
            'id'    => 'lp_single_page_bg',
            'type'  => 'color',
            'title' => esc_html__('Single Page Background Color', 'edumodo'),
            'desc' => esc_html__('Pick a color for theme secondary.', 'edumodo'),
            'compiler' => true,
            'default'   => "#fff",
            'output'    => array(
                'background' => '.single-lp_course',
            ),
              'required' => array('learnpress_select','=','learnpress_single_three'),
        ),

       // array(
       //      'id'       => 'enable_instructors_single',
       //      'type'     => 'switch',
       //      'title'    => esc_html__('Instructors Course Details Page', 'edumodo'),
       //      'default'  => true,
       //  ),

       // array(
       //      'id'       => 'enable_course_single_page3_heading',
       //      'type'     => 'switch',
       //      'title'    => esc_html__('Course Single Page Header', 'edumodo'),
       //      'desc' => esc_html__('Enable or disable single learnpress heading', 'edumodo'),
       //      'default'  => false,
       //  ),


    )
) 
);
