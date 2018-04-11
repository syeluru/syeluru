<?php
/**
 * 
 *
 * @package WordPress
 * @subpackage Edumodo Stylesheet..
 * @since edumodo 1.0.0
 */


if(class_exists( 'ReduxFrameworkInstances')):
	add_action( 'wp_head', 'edumodo_stylesheet' );
endif;




function edumodo_stylesheet() {

	// Global Options
	global $edumodo_options;

	// Theem color
	$theme_primary_color   = edumodo_array_get($edumodo_options, 'primary_color') ? $edumodo_options['primary_color'] : '';
	$theme_secondary_color   = edumodo_array_get($edumodo_options, 'secondary_color') ? $edumodo_options['secondary_color'] : '';
	$body_font   = edumodo_array_get($edumodo_options, 'body_font') ? $edumodo_options['body_font'] : '';
	$heading_font   = edumodo_array_get($edumodo_options, 'heading_font') ? $edumodo_options['heading_font'] : '';
	$menu_active_color   = edumodo_array_get($edumodo_options, 'menu_active_color') ? $edumodo_options['menu_active_color'] : '';

	// Footer color
	$footer_text_color   = edumodo_array_get($edumodo_options, 'footer-text-color') ? $edumodo_options['footer-text-color'] : '';
	// Footer Bg color
	$footer_bg_color   = edumodo_array_get($edumodo_options, 'footer-background-color') ? $edumodo_options['footer-background-color'] : '';
	
?>


<style >
		<?php if(!empty($body_font)) :?>
			body, .navbar-nav > li > a{
			 	font-family: 'robotoregular';
				font-size: 16px;
			}
		<?php endif; ?>
		<?php if(!empty($heading_font)) :?>
			.h1,.h2,.h3,.h4,.h5,.h5, .h6, h1, h2, h3, h4, h5, h6{
				font-family: 'montserratbold';
			}
		<?php endif; ?>
		<?php if(!empty($menu_active_color)) :?>
			#menu-primary-1 > li.current-menu-parent > a, #menu-primary-2 > li.current-menu-parent > a, .navbar-default .navbar-nav > li > a:hover, .edumodo-current-menu-item > a{
				color: <?php echo esc_attr($menu_active_color);?> !important;
			}
		<?php endif; ?>
		.edumodo-top-search input[type="submit"]{
			color: <?php echo esc_attr($theme_primary_color);?>;
			border-color: white;
		}
		.edumodo-top-search input[type="submit"]:hover{
			border-color: <?php echo esc_attr($theme_primary_color);?>;
		}
		<?php if ($theme_primary_color):?> 
		.site-title{color: <?php echo esc_attr($theme_primary_color);?>;}
		button,
		input[type="button"], input[type="reset"], input[type="submit"]{
		    background: <?php echo esc_attr($theme_primary_color);?>;
		    border-color: <?php echo esc_attr($theme_primary_color);?>;
		}
		.btn{
			background: <?php echo esc_attr($theme_primary_color);?>;
			border-color: <?php echo esc_attr($theme_primary_color);?>;
		}
		span.post-date a:hover{
			color: <?php echo esc_attr($theme_primary_color);?>;
		}
		.search-form label > input:focus{
			border-color: <?php echo esc_attr($theme_primary_color);?>;
		}
		.edumodo-course-1 article.tx-course .course-details .course-meta .post-date a:hover{
			color: <?php echo esc_attr($theme_primary_color);?>;
		}
		.comment-author.vcard a:hover{
			color: <?php echo esc_attr($theme_primary_color);?>;
		}
		.comments-area .comment-metadata a:hover{
		color: <?php echo esc_attr($theme_primary_color);?>;	
		}
		.enter-related-course .edumodo-related-course-1 article.tx-course .course-details .course-meta span.course-cost{
			color: <?php echo esc_attr($theme_primary_color);?>;
		}
		.archive .entry-header a:hover{
			color: <?php echo esc_attr($theme_primary_color);?> !important;
		}
		.single-notice .post-cat a:hover{
			color: <?php echo esc_attr($theme_primary_color);?>;
		}
		.main-post.has-post-thumbnail .edumodo-post-img .entry-meta .post-cat a:hover{
			color: <?php echo esc_attr($theme_primary_color);?> 
		}
		.main-post.link-formate .link-content .icon-link{
			color: <?php echo esc_attr($theme_primary_color);?> 
		}
		.quote-format .entry-content.quote-content.quote:before{
			color: <?php echo esc_attr($theme_primary_color);?> 
		}
		.main-post .edit span.edit-link a:hover{
			color: <?php echo esc_attr($theme_primary_color);?> 
		}
		.main-post .content-body .entry-meta .post-cat a:hover{
			color: <?php echo esc_attr($theme_primary_color);?> 
		}
		.site-main .comment-navigation .nav-previous a:hover{
			color: <?php echo esc_attr($theme_primary_color);?> 
		}
		.single-post .entry-meta span.post-author a:hover, 
		.single-post ul.post-categories li a:hover, 
		.site-main .post-navigation .nav-next a:hover, 
		.site-main .posts-navigation .nav-next a:hover, 
		.site-main .comment-navigation .nav-next a:hover, 
		.site-main .post-navigation .nav-previous a:hover, 
		.site-main .posts-navigation .nav-previous a:hover{
			color: <?php echo esc_attr($theme_primary_color);?> 
		}
		#mc_embed_signup #tx-subscribe{
			border-color: <?php echo esc_attr($theme_primary_color);?> 
		}
		.widget-area .widget .tagcloud > a:hover{
			color: <?php echo esc_attr($theme_primary_color);?> 
		}
		.widget_calendar div.calendar_wrap table thead tr th, .widget_calendar div.calendar_wrap table tbody tr td#today{
			background-color: <?php echo esc_attr($theme_primary_color);?>;
		}
		.widget_calendar div.calendar_wrap table thead tr th, .widget_calendar div.calendar_wrap table tbody tr td {
			border-color: <?php echo esc_attr($theme_primary_color);?>;
		}
		.widget_calendar div.calendar_wrap table thead tr th{
			border-color: <?php echo esc_attr($theme_primary_color);?>90;
		}
		.single-post .entry-meta span a:hover{
			color: <?php echo esc_attr($theme_primary_color);?> 
		}
		.post-tags a:hover{
			color: <?php echo esc_attr($theme_primary_color);?> 
		}
		.single-post .edit a.post-edit-link:hover{
			color: <?php echo esc_attr($theme_primary_color);?> 
		}
		.single-post .post-tags a:hover{
			color: <?php echo esc_attr($theme_primary_color);?> 
		}
		.edumodo-pagination .page-numbers:hover{
			border-left-color: <?php echo esc_attr($theme_primary_color);?>;
		}
		.edumodo-pagination .page-numbers:hover{
			color: <?php echo esc_attr($theme_primary_color);?>;
		}
		.edumodo-pagination .page-numbers.current:hover{
			color: white;
		}
		.edumodo-top-search input[type="submit"]:hover{
			background-color: <?php echo esc_attr($theme_primary_color);?>;
		}
		.copyright a:hover, .copyright .social-icon a:hover{
			color: <?php echo esc_attr($theme_primary_color);?>;
		}
		.post-password-form input[type="submit"]{
			background-color: <?php echo esc_attr($theme_primary_color);?>;
			border-color: <?php echo esc_attr($theme_primary_color);?>;
		}

		.edumodo-teacher-1 .teacher-person .overlay .person-info .social-links-teacher a:hover, 
		.edumodo-teacher-1 .teacher-person .overlay .person-info .teacher-title a:hover{
			color: <?php echo esc_attr($theme_primary_color);?>;
		}
		.widget-area .edumodo-social a{
			background-color: <?php echo esc_attr($theme_primary_color);?>;
		}
		.single-course-post .course-content .course-meta span a:hover{
			color:<?php echo esc_attr($theme_primary_color);?>;
		}
		.widget-area .widget a:hover{
			color:<?php echo esc_attr($theme_primary_color);?>;
		}
		.footer .tagcloud a:hover, .footer .widget ul li a:hover{
			color:<?php echo esc_attr($theme_primary_color);?>;
		}
		.footer .widget_calendar div.calendar_wrap table tfoot #prev a:hover, .widget_calendar td#next a:hover{
			color:<?php echo esc_attr($theme_primary_color);?>;
		}
		.widget-area .edumodo-recent-post .recent-post .recent-entry-header .recent-entry-title a:hover{
			color: <?php echo esc_attr($theme_primary_color);?>;
		}
		.course-teacher-carousel .owl-nav div, .content-list .owl-nav div{
			 background-color: <?php echo esc_attr($theme_primary_color);?>;
		}
		.single-course-post .course-content .course-meta .post-cat a:hover{
			color: <?php echo esc_attr($theme_primary_color);?>;
		}
		.pingback .edit-link a:hover{
			 background-color: <?php echo esc_attr($theme_primary_color);?>;
			 border-color: <?php echo esc_attr($theme_primary_color);?>;
		}
		.woocommerce .woocommerce-message:before, 
		.woocommerce-cart .woocommerce-message:before, 
		.woocommerce-checkout .woocommerce-message:before, 
		.woocommerce-account .woocommerce-message:before, 
		.woocommerce .woocommerce-info:before, 
		.woocommerce-cart .woocommerce-info:before, 
		.woocommerce-checkout .woocommerce-info:before, 
		.woocommerce-account .woocommerce-info:before, .woocommerce .woocommerce-breadcrumb a:hover, nav.woocommerce-breadcrumb a:hover{
			color: <?php echo esc_attr($theme_primary_color);?> !important;
		}

		.woocommerce .woocommerce-message, .woocommerce-cart .woocommerce-message, .woocommerce-checkout .woocommerce-message, .woocommerce-account .woocommerce-message, .woocommerce .woocommerce-info, .woocommerce-cart .woocommerce-info, .woocommerce-checkout .woocommerce-info, .woocommerce-account .woocommerce-info{
		 		border-top-color: <?php echo esc_attr($theme_primary_color);?> !important;
		}
		.woocommerce .woocommerce-MyAccount-navigation ul li.is-active{
			border-left-color: <?php echo esc_attr($theme_primary_color);?> !important;
		}
		.woocommerce main#main .price, .woocommerce-cart main#main .price, .woocommerce-checkout main#main .price, .woocommerce-account main#main .price{
			color: <?php echo esc_attr($theme_primary_color);?>;
		}
		.tribe-events-read-more, 
		.tribe-events-day .type-tribe_events .edumodo-day-view .day-event-contant .tribe-events-list-event-title a:hover, 
		#tribe-events-footer a:hover, 
		.sensei-main-content .course-container .grid-enable .grid-course-content .link-to-the-full-course a, 
		.sensei-main-content .sensei-course-filters a.active, 
		.sensei-main-content .sensei-course-filters a:hover, 
		.sensei-main-content .sensei-course-filters a.active:hover, 
		.sensei-main-content a:hover, 
		.lesson.type-lesson.status-publish.has-post-thumbnail.hentry.post h2 a{
			color: <?php echo esc_attr($theme_primary_color);?> !important;
		}
		.sensei-main-content .course-container .sensei-course-meta .course-price .woocommerce-Price-amount{
			 background-color: <?php echo esc_attr($theme_primary_color);?>;
		}

		.course .weforms-popup .weforms-popup-wrapper .popup-dismiss{
			background-color: <?php echo esc_attr($theme_primary_color);?>;
		}
		.course .weforms-popup .weforms-popup-wrapper .wpuf-form input[type="submit"]{
			background-color: <?php echo esc_attr($theme_primary_color);?>;
		}
		.single-course .i-am-single-course-header-row .edumodo-sensi-course-header .header-meta-wrapper .single-course-enroll-and-send-message-wrapper input[type="submit"]:hover, .single-course .i-am-single-course-header-row .edumodo-sensi-course-header .header-meta-wrapper .sensei-course-meta a:hover, .single-lesson .i-am-single-course-header-row .edumodo-sensi-course-header .header-meta-wrapper .sensei-course-meta a:hover{
			color: <?php echo esc_attr($theme_primary_color);?> !important;
		}

		input[type="text"]:focus, input[type="email"]:focus, input[type="url"]:focus, input[type="password"]:focus, input[type="search"]:focus, input[type="number"]:focus, input[type="tel"]:focus, input[type="range"]:focus, input[type="date"]:focus, input[type="month"]:focus, input[type="week"]:focus, input[type="time"]:focus, input[type="datetime"]:focus, input[type="datetime-local"]:focus, input[type="color"]:focus, textarea:focus{
			    border-color: <?php echo esc_attr($theme_primary_color);?>;
		}
		ul.wpuf-form li .wpuf-fields input[type=text]:focus, ul.wpuf-form li .wpuf-fields input[type=password]:focus, ul.wpuf-form li .wpuf-fields input[type=email]:focus, ul.wpuf-form li .wpuf-fields input[type=url]:focus, ul.wpuf-form li .wpuf-fields input[type=number]:focus, ul.wpuf-form li .wpuf-fields textarea:focus{
			outline-color: <?php echo esc_attr($theme_primary_color);?>;
    		border-color: <?php echo esc_attr($theme_primary_color);?>;
		}
		.comments-area .comment-respond textarea:focus{
			outline-color: <?php echo esc_attr($theme_primary_color);?>; 
			border-color:  <?php echo esc_attr($theme_primary_color);?>; 
		}
		.single-post .related-post .entry-header .entry-title a:hover{
			color: <?php echo esc_attr($theme_primary_color);?> !important;
		}
		.main-post .content-body .entry-header .entry-title a:hover{
			color: <?php echo esc_attr($theme_primary_color);?> !important;
		}
		.related-post-body .entry-header a:hover{
			color: <?php echo esc_attr($theme_primary_color);?> !important;
		}
		.single-post.format-gallery .owl-nav div, .woocommerce .checkout .place-order input.button.alt, .woocommerce-cart .checkout .place-order input.button.alt, .woocommerce-checkout .checkout .place-order input.button.alt, .woocommerce-account .checkout .place-order input.button.alt, .i-am-course-lesson-wrapper .sticky a:after{
			background-color: <?php echo esc_attr($theme_primary_color);?> !important;
		}
		.sensei-main-content button[type="submit"], .sensei-main-content a.send-message-button, .sensei-main-content input[type="submit"], .sensei-main-content .view-results, .sensei-main-content a.button{
			background-color: <?php echo esc_attr($theme_primary_color);?> !important;
		}
		 .teacher-info .teachers-bio .teachers-name, .teacher-info .social a, .sensei-main-content .course-container .grid-enable .free-tag, .sensei-main-content .featured .course-title:before, .sensei-main-content .featured .header-meta-wrapper h1:before{
			background-color:<?php echo esc_attr($theme_primary_color);?> !important;
		}
		.single-post .post-thumbnail .post-triangle,
		.main-post .post-triangle{
			 border-right-color: <?php echo esc_attr($theme_primary_color);?>;
		}
		.comments-area .comment-content:before, .main-post.sticky .entry-header .sticky-post .post-round, 
		.widget-area .widget .widget-title:before, 
		.edumodo-header-2 .login-reg .register, .tribe-events-day .type-tribe_events .edumodo-day-view .day-event-contant .title-price .tribe-events-event-cost{
			background: <?php echo esc_attr($theme_primary_color);?> ;
		}

		.lp-archive-courses .tx-course-list .tx-couse-title a:hover{
		    color: <?php echo esc_attr($theme_primary_color);?>;
		}
		.learn-press-message {
		    border-left: 5px solid <?php echo esc_attr($theme_primary_color);?> !important;
		}
		.learn-press-tabs .learn-press-nav-tabs .learn-press-nav-tab.active a {
		    color: <?php echo esc_attr($theme_primary_color);?> !important;
		}
		.learn-press-tabs .learn-press-nav-tabs .learn-press-nav-tab.active {
		    border-bottom: 4px solid <?php echo esc_attr($theme_primary_color);?> !important;
		}
		#learn-press-course-curriculum .section-header .meta .collapse{
			background-color: <?php echo esc_attr($theme_primary_color);?> !important;
		}
		#learn-press-course-curriculum .course-item .item-status{
			color: <?php echo esc_attr($theme_primary_color);?> !important;
		}
		#course-curriculum-popup #popup-main #popup-header{
			background:<?php echo esc_attr($theme_primary_color);?> !important;
	    	border-bottom: 1px solid <?php echo esc_attr($theme_primary_color);?> !important
		}
		.learnpress .learn-press-pagination ul li span.page-numbers.current{
			background:<?php echo esc_attr($theme_primary_color);?> !important;
		}
		.learnpress .learn-press-pagination ul li a:hover{
			color: <?php echo esc_attr($theme_primary_color);?> !important;
		}
		.single-lp_course .lpcourse-course-wapper-2 .edumodo-course-info .title:before, .lp-single-course .tx-course-main .edumodo-course-info .title:before, 
		.learnp-ralated-course .title:before, 
		.lpcourse-sidebar .edumodo-course-info .title:before, .lp-single-course .tx-course-main .edumodo-course-author .title:before{
			background:<?php echo esc_attr($theme_primary_color);?> !important;
		}
		.lp-single-course .course-top .course-info .learn-press-course-buttons .purchase-course button.button.purchase-button, 
		.lp-single-course .course-top .course-info .learn-press-course-buttons .purchase-course button.button.enroll-button{
			    border-color: <?php echo esc_attr($theme_primary_color);?>;
	    		color: <?php echo esc_attr($theme_primary_color);?>;
		}
		.entry-header a:hover, .lpcourse-sidebar .edumodo-course-info ul.course-info-list li i, .lpcourse-top-button .lp-button, .learnp-ralated-course .learnp-ralated-course-wrapper article.learnp-ralated-item .learnp-ralated-content .learnp-course-title a:hover{
				color: <?php echo esc_attr($theme_primary_color);?> !important;
		}
		.woocommerce main#main button[type="submit"], .woocommerce-cart main#main button[type="submit"], .woocommerce-checkout main#main button[type="submit"], .woocommerce-account main#main button[type="submit"], .woocommerce main#main a.button, .woocommerce-cart main#main a.button, .woocommerce-checkout main#main a.button, .woocommerce-account main#main a.button, .woocommerce main#main input[name="submit"], .woocommerce-cart main#main input[name="submit"], .woocommerce-checkout main#main input[name="submit"], .woocommerce-account main#main input[name="submit"], .woocommerce .woocommerce-cart-form input[type="submit"], .woocommerce-cart .woocommerce-cart-form input[type="submit"], .woocommerce-checkout .woocommerce-cart-form input[type="submit"], .woocommerce-account .woocommerce-cart-form input[type="submit"]{
			background-color: <?php echo esc_attr($theme_primary_color);?>;
		}
		.edumodo-from ul.wpuf-form .wpuf-submit input[type=submit]{
			border-color: <?php echo esc_attr($theme_primary_color);?> !important;
			background-color:<?php echo esc_attr($theme_primary_color);?> !important;
		}		
		.i-override-default-template a.tribe-events-button, .post-type-archive-tribe_events #tribe-events-content .tribe-events-loop .type-tribe_events .edumodo-event-loop-content-wrapper .edumodo-event-loop-content .edumodo-event-content-wrapper a:after, .post-type-archive-tribe_events input[type="submit"]{
			background-color:<?php echo esc_attr($theme_primary_color);?> !important;
		}		
		#menu-1, #menu-1 .menu-item-has-children .sub-menu, #menu-1 ul li a{
			background-color:<?php echo esc_attr($theme_primary_color);?> !important;
		}

	 <?php endif;?>

	<?php if ($theme_secondary_color):?> 
	button:hover, input[type="button"]:hover, 
	input[type="reset"]:hover, 
	input[type="submit"]:hover{
  		background: <?php echo esc_attr($theme_secondary_color);?>;
	    border-color: <?php echo esc_attr($theme_secondary_color);?>;
	}
	.btn:hover{
		background: <?php echo esc_attr($theme_secondary_color);?>;
		border-color: <?php echo esc_attr($theme_secondary_color);?>;
	}
	.btn:hover, .btn:focus, .btn.focus{
		background: <?php echo esc_attr($theme_secondary_color);?>;
	}
	.btn:hover, .btn:focus, .btn.focus{
		border-color: <?php echo esc_attr($theme_secondary_color);?>;
	}
	.main-post .entry-meta{
		background:<?php echo esc_attr($theme_secondary_color);?>;
	}
	.enter-related-course .edumodo-related-course-1 article.tx-course figure a:before, .edumodo-course-1 article.tx-course figure a:before {
	    background-color: <?php echo esc_attr($theme_secondary_color);?>80;
	}
	.course-teacher-carousel .owl-nav .owl-prev:hover, .content-list .owl-nav .owl-next:hover, {
		background-color: <?php echo esc_attr($theme_secondary_color);?> !important;
	}
	.edumodo-course-1 article.tx-course figure a:after{
		color: <?php echo esc_attr($theme_secondary_color);?>;
	}

	#course-curriculum-popup #popup-main #popup-header .popup-close:hover, #course-curriculum-popup #popup-main #popup-header .sidebar-hide-btn:hover, #course-curriculum-popup #popup-main #popup-header .sidebar-show-btn:hover{
		background:<?php echo esc_attr($theme_secondary_color);?> !important;
	}
	.lpcourse-course-wapper-3 .lp-related-course .lp-course-1 .lp-course-thumbnail a:before, .lp-course3-heading:before, #learn-press-course-curriculum .course-item .item-status.item-status-completed, #learn-press-course-curriculum .course-item .item-status.item-status-passed{
		background:<?php echo esc_attr($theme_secondary_color);?> !important;
	}
	.lp-single-course .course-top .course-info .learn-press-course-buttons .purchase-course button.button.purchase-button:hover, .lp-single-course .course-top .course-info .learn-press-course-buttons .purchase-course button.button.enroll-button:hover{
		  border-color: <?php echo esc_attr($theme_secondary_color);?>;
		  background:<?php echo esc_attr($theme_secondary_color);?>;
	}
	.woocommerce main#main button[type="submit"]:hover, .woocommerce-cart main#main button[type="submit"]:hover, .woocommerce-checkout main#main button[type="submit"]:hover, .woocommerce-account main#main button[type="submit"]:hover, .woocommerce main#main a.button:hover, .woocommerce-cart main#main a.button:hover, .woocommerce-checkout main#main a.button:hover, .woocommerce-account main#main a.button:hover, .woocommerce main#main input[name="submit"]:hover, .woocommerce-cart main#main input[name="submit"]:hover, .woocommerce-checkout main#main input[name="submit"]:hover, .woocommerce-account main#main input[name="submit"]:hover, .woocommerce .woocommerce-cart-form input[type="submit"]:hover, .woocommerce-cart .woocommerce-cart-form input[type="submit"]:hover, .woocommerce-checkout .woocommerce-cart-form input[type="submit"]:hover, .woocommerce-account .woocommerce-cart-form input[type="submit"]:hover, .woocommerce .checkout .place-order input.button.alt:hover, .woocommerce-cart .checkout .place-order input.button.alt:hover, .woocommerce-checkout .checkout .place-order input.button.alt:hover, .woocommerce-account .checkout .place-order input.button.alt:hover{
		 background:<?php echo esc_attr($theme_secondary_color);?> !important;
	}
		.edumodo-from ul.wpuf-form .wpuf-submit input[type=submit]:hover, .edumodo-from ul.wpuf-form .wpuf-submit input[type=submit]:focus, .edumodo-from ul.wpuf-form .wpuf-submit input[type=submit].focus{
			border-color: <?php echo esc_attr($theme_secondary_color);?> !important;
			background-color:<?php echo esc_attr($theme_secondary_color);?> !important;
		}
		.edumodo-header-2 .login-reg .register:hover{
			background-color:<?php echo esc_attr($theme_secondary_color);?>;
		}
		.i-override-default-template a.tribe-events-button:hover, .post-type-archive-tribe_events input[type="submit"]:hover{
			background-color:<?php echo esc_attr($theme_secondary_color);?> !important;
		}
		.sensei-main-content button[type="submit"]:hover, .sensei-main-content a.send-message-button:hover, .sensei-main-content input[type="submit"]:hover{
			background-color: <?php echo esc_attr($theme_secondary_color);?>!important;
		}
		.edumodo-lesson-send-message .button.send-message-button:hover{
			color: white !important;
		}
		.course-teacher-carousel .owl-nav .owl-prev:hover, .content-list .owl-nav .owl-prev:hover{
			background-color:<?php echo esc_attr($theme_secondary_color);?>;
		}
		.widget-area .edumodo-social a:hover{
			background-color:<?php echo esc_attr($theme_secondary_color);?>;
		}
		.course-teacher-carousel .owl-nav .owl-next:hover, .content-list .owl-nav .owl-next:hover{
			background-color:<?php echo esc_attr($theme_secondary_color);?>;
		}
		.enter-related-course .edumodo-related-course-1 article.tx-course figure a:after{
			color: <?php echo esc_attr($theme_secondary_color);?>;
		}
		.edumodo-notice-1 article.notice figure a:before{
			 background-color: <?php echo esc_attr($theme_secondary_color);?>80;
		}
		.edumodo-notice-1 article.notice figure a:after{
			color: <?php echo esc_attr($theme_secondary_color);?>;
		}
		.edumodo-top-search input[type="search"]{
			background-color: <?php echo esc_attr($theme_secondary_color);?>50;
		}
		.content-field .owl-nav .owl-prev:hover{
			 background-color: <?php echo esc_attr($theme_secondary_color);?>;
		}
		.post-password-form input[type="submit"]:hover{
			background-color: <?php echo esc_attr($theme_secondary_color);?>;
			border-color: <?php echo esc_attr($theme_secondary_color);?>;
		}
	 <?php endif;?>
	<?php if ($footer_bg_color):?> 
		.footer{
			background-color:<?php echo esc_attr($footer_bg_color);?>;
			color:<?php echo esc_attr($footer_text_color);?>;
			padding: 50px 0 30px;
		}
	<?php endif;?>
    .site-info{
	    padding: 30px 0 0px;
	}
</style>
<?php 
}
