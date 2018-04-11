<?php

Redux::setSection( $opt_name, array(
    'title'  => esc_html__( 'Footer', 'edumodo' ),
    'id'     => 'switch-pro-footer',
    'icon'   => 'el el-hand-down',
    'fields' => array(

        array(
            'id'       => 'edumodo-footer-layout',
            'type'     => 'select',
            'title'    => esc_html__('Footer Columns', 'edumodo'),
            'options'  => array(
                'column-1'      => esc_html__('Column 1', 'edumodo'),
                'column-2'      => esc_html__('Column 2', 'edumodo'),
                'column-3'      => esc_html__('Column 3', 'edumodo'),
                'column-4'      => esc_html__('Column 4', 'edumodo'),
            ),
            'default' => 'column-4'
        ),
        array(
            'id'    => 'footer-text-color',
            'type'  => 'color',
            'title' => esc_html__('Text Color', 'edumodo'),
            'default'  => '#e1e1e1',
            'validate' => 'color',
        ),
        array(
            'id'    => 'footer-background-color',
            'type'  => 'color',
            'title' => esc_html__('Footer Background Color', 'edumodo'),
            'default'  => '#313131',
            'validate' => 'color',
        ),
  
        array(
            'id'       => 'edumodo-credit-switcher',
            'type'     => 'switch',
            'title'    => esc_html__('Show ThemeXpert Credit?', 'edumodo'),
            'subtitle' => esc_html__('Show or hide ThemeXpert credit in footer.', 'edumodo'),
            'default'  => true,
        ),

        array(
            'id'=>'edumodo-user-copyright-text',
            'type' => 'textarea',
            'title' => esc_html__('Copyright Text', 'edumodo'),
            'subtitle' => esc_html__('Allow html is a, br, em, strong tag', 'edumodo'),
            'validate' => 'html_custom',
            'allowed_html' => array(
                'a' => array(
                    'href' => array(),
                    'title' => array()
                ),
                'br' => array(),
                'em' => array(),
                'strong' => array()
            ),
            'required' => array( 'edumodo-credit-switcher' , '=' , 0 )
        ),

        array(
            'id'       => 'enable-social',
            'type'     => 'switch',
            'title'    => esc_html__('Enable Social Icon', 'edumodo'),
            'default'  => true,
        ),

        array(
             'id'      => 'facebook',
             'title'   => 'Facebook',
             'type'    => 'text',
             'icon'    => 'fa fa-facebook',
             'default' => '#',
             'required' => array('enable-social','=', 1)
         ),

        array(
             'id'      => 'twitter',
             'title'   => 'Twitter',
             'type'    => 'text',
             'icon'    => 'fa fa-twitter',
             'default' => '#',
             'required' => array('enable-social','=', 1)
         ),

        array(
             'id'      => 'instagram',
             'title'   => 'Instagram',
             'type'    => 'text',
             'icon'    => 'fa fa-instagram',
             'default' => '#',
             'required' => array('enable-social','=', 1)
         ),

         array(
             'id'      => 'linkedin',
             'title'   => 'Linkedin',
             'type'    => 'text',
             'icon'    => 'fa fa-linkedin',
             'default' => '#',
             'required' => array('enable-social','=', 1)
         ),        
    )
) );
