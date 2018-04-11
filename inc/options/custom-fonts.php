<?php

// -> START Basic Fields
Redux::setSection( $opt_name, array(
    'title'  => esc_html__( 'Custom Fonts', 'edumodo' ),
    'id'     => 'edumodo-fonts',
    'icon'   => 'el el-adjust ',
    'fields' => array(

        array(
            'id'       => 'enable-edumodo-custom-fonts',
            'type'     => 'switch',
            'title'    => esc_html__('Enable or disable custom font options', 'edumodo'),
            'default'  => false,

        ),
        array(
            'id' => 'body_font',
            'type' => 'typography',
            'title' => esc_html__('Body Typography', 'edumodo'),
            'compiler' => true, // Use if you want to hook in your own CSS compiler
            'google' => true, // Disable google fonts. Won't work if you haven't defined your google the page
            'output' => array('body'), // An array of CSS selectors to apply this font style to dynamically
            'compiler' => array('body'), // An array of CSS selectors to apply this font style to dynamically
            'units' => 'px', // Defaults to px
            'default' => array(
            'font-family' => 'Roboto',
            'google' => true),
            'required' => array('enable-edumodo-custom-fonts','=', 1)
        ),

        array(
            'id' => 'heading_font',
            'type' => 'typography',
            'title' => esc_html__('Heading Typography', 'edumodo'),
            'google' => true, // Disable google fonts. Won't work if you haven't defined your google api key
            'font-backup' => false, // Select a backup non-google font in addition to a google font
            'font-style' => false, // Includes font-style and weight. Can use font-style or font-weight to declare
            'subsets' => false, // Only appears if google is true and subsets not set to false
            'font-size' => false,
            'line-height' => false,
            'color' => false,
            'preview' => false, // Disable the previewer
            'all_styles' => false, // Enable all Google Font style/weight variations to be added to the page
            'output' => array('h1,h2,h3,h4,h5,h6, .btn, .content-btn, .btn-border, .btn-modal'), // An array of CSS selectors to apply this font style to dynamically
            'compiler' => array('h1,h2,h3,h4,h5,h6,.btn, .content-btn, .btn-border, .btn-modal'), // An array of CSS selectors to apply this font style to dynamically
            'units' => 'px', // Defaults to px
            'default' => array(
            'font-family' => 'Montserrat',
            'google' => true),
            'required' => array('enable-edumodo-custom-fonts','=', 1)
        ),


        array(
            'id' => 'menu_font',
            'type' => 'typography',
            'title' => esc_html__('Menu Typography', 'edumodo'),
            'google' => true, // Disable google fonts. Won't work if you haven't defined your google api key
            'font-backup' => false, // Select a backup non-google font in addition to a google font
            'font-style' => false, // Includes font-style and weight. Can use font-style or font-weight to declare
            'subsets' => false, // Only appears if google is true and subsets not set to false
            'font-size' => false,
            'line-height' => false,
            'color' => false,
            'preview' => false, // Disable the previewer
            'all_styles' => false, // Enable all Google Font style/weight variations to be added to the page
            'output' => array('.navbar-nav > li > a'), // An array of CSS selectors to apply this font style to dynamically
            'compiler' => array('.navbar-nav > li > a'), // An array of CSS selectors to apply this font style to dynamically
            'units' => 'px', // Defaults to px
            'default' => array(
            'font-family' => 'Roboto',
            'google' => true),
            'required' => array('enable-edumodo-custom-fonts','=', 1)
        ),
    )
) );
