<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * over right
 * ============
 */
/**
 * Content-course.php template file
 *
 * responsible for content on archive like pages. Only shows the course excerpt.
 *
 * For single course content please see single-course.php
 *
 * @author 		Automattic
 * @package 	Sensei
 * @category    Templates
 * @version     1.9.0
 */



if(Sensei()->settings->settings[ 'edumodo-archive-style-checkbox' ]){
    get_template_part('sensei/content', 'style-grid');
}else{
    get_template_part('sensei/content', 'style-list');
}