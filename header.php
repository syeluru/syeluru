<?php

/**
 * Getting Option values for Header
 * @package Edumodo
 */

$post_id = edumodo_get_id();
// Global Options
global $edumodo_options;
// Prefix
$prefix = '_edumodo_';
// Header variation
$header_variation   = edumodo_array_get($edumodo_options, 'select_header') ? $edumodo_options['select_header'] : '';
// Header position
$navbar_position_1   = edumodo_array_get($edumodo_options, 'header_position_2') ? $edumodo_options['header_position_2'] : '';
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<!-- <script>if ( top !== self ) top.location.replace( self.location.href );</script> -->

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="tx-site-container" class="tx-site-container <?php if(! is_home() && ! is_front_page()) : echo "inner-page-class"; else : endif; ?>">

    <nav class="tx-menu tx-effect-1" id="menu-1">
        <button class="close-button" id="close-button"></button>
        
        <?php
        wp_nav_menu(array(
            'menu' => 'primary',
            'theme_location' => 'primary',
           'container_id'      => 'mobile-menu',
        ));
        ?>
    </nav>


    <div class="tx-site-pusher">
        <div class="tx-site-content"><!-- this is the wrapper for the content -->
            <div class="tx-site-content-inner">
                <div id="page" class="site">
                <?php 
                    if( isset($_GET['head']) && $_GET['head'] == 'v1' ) {
                        get_template_part( 'template-parts/header/header', 'v1' );
                    }
                    elseif( isset($_GET['head']) && $_GET['head'] == 'v2' ) {
                        get_template_part( 'template-parts/header/header', 'v2' );
                    }
                     else {
                        switch ( $header_variation ) {
                            case 'header_1':
                                get_template_part( 'template-parts/header/header', 'v1' );
                                break;
                            case 'header_2':
                                get_template_part( 'template-parts/header/header', 'v2' );
                                break;
                            default:
                                get_template_part( 'template-parts/header/header', 'v1' );
                        }
                    }
                ?>
            <div id="content" class="site-content <?php if ($navbar_position_1 == 'fixed'):?> fixed-header-margin <?php endif; ?>">
