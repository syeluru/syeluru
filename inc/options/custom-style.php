<?php

// -> START Basic Fields
Redux::setSection( $opt_name, array(
    'title'  => esc_html__( 'Custom Style', 'edumodo' ),
    'id'     => 'valley-menu',
    'icon'   => 'el el-cc',
    'fields' => array(

        array(
            'id'       => 'enable-edumodo-custom-style',
            'type'     => 'switch',
            'title'    => esc_html__('Custom Theme Color', 'edumodo'),
            'default'  => false,

        ),
        array(
            'id'    => 'primary_color',
            'type'  => 'color',
            'title' => esc_html__('Primary Color', 'edumodo'),
            'default'  => '#ecb101',
            'required' => array('enable-edumodo-custom-style','=', 1),
             'output'    => array(
                'color' => '.site-info a:hover,
                            .site-info b,
                            .site-info .social-icon a:hover,
                            .site-info .list a:hover, 
                            .single-post .related-post .entry-header .entry-title a:hover, 
                            .single-post .edit a.post-edit-link:hover, 
                            .edumodo-pagination .page-numbers:hover,
                            .learnp-ralated-course .learnp-ralated-course-wrapper article.learnp-ralated-item .learnp-ralated-content .learnp-course-title a:hover, 
                            .lp-single-course .tx-course-main .course-summary span.course-author a, 
                            .lp-single-course .course-top .course-info .course-meta a:hover, .
                            site-main .comment-navigation .nav-previous a span:hover, 
                            .site-main .posts-navigation .nav-previous a span:hover, 
                            .site-main .post-navigation .nav-previous a span:hover, 
                            .site-main .comment-navigation .nav-next a span:hover, 
                            .site-main .posts-navigation .nav-next a span:hover, 
                            .site-main .post-navigation .nav-next a span:hover,
                            .single-post ul.post-categories li a:hover, 
                            .single-post .post-tags a:hover, 
                            .quote-format .entry-content.quote-content.quote:before, 
                            .main-post .entry-meta .post-cat a:hover, 
                            .main-post .edit span.edit-link a:hover, 
                            .widget-area .edumodo-recent-post .recent-post .recent-entry-header .recent-entry-title a:hover, 
                            .widget-area .widget a:hover, 
                            #wp-calendar tfoot tr a, 
                            #wp-calendar tbody td a, 
                            #wp-calendar caption, 
                            .edumodo-teacher-1 .teacher-person .overlay .person-info .teacher-title a:hover, 
                            .site-info p a, 
                            .footer .widget ul li a:hover',

                            'background' => '.edumodo-pagination .current, 
                            .main-post .entry-header .sticky-post .post-round, 
                            .content-field .owl-nav div, 
                            .single-post .sticky-post .post-round, 
                            #tx-trigger-effects button, 
                            .tx-menu',
            ),
        ),

        array(
            'id'    => 'secondary_color',
            'type'  => 'color',
            'title' => esc_html__('Secondary Color', 'edumodo'),
            'default'   => "#242c5e",
            'output'    => array(
                'background' => '.main-post .content-body .entry-meta, .page-details:before, .edumodo-teacher-1 .teacher-person .overlay, .main-post.has-post-thumbnail .edumodo-post-img .entry-meta, .content-field .owl-nav .owl-next:hover, .entry-meta-mobile ul.post-categories',

            ),
            'required' => array('enable-edumodo-custom-style','=', 1)
        ),
    )
) );
