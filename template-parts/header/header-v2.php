<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Edumodo
 */
    $post_id = edumodo_get_id();
    // Global Options
    global $edumodo_options;
    // Prefix
    $prefix = '_edumodo_';
    // logo option
    $edumodo_logo_2   = edumodo_array_get($edumodo_options, 'edumodo_logo_2') ? $edumodo_options['edumodo_logo_2']['url'] : '';
    // Header position
    $header_position_2   = edumodo_array_get($edumodo_options, 'header_position_2') ? $edumodo_options['header_position_2'] : '';
    // Custom sign in link
    $signin_link_header_2   = edumodo_array_get($edumodo_options, 'signin_link_header_2') ? $edumodo_options['signin_link_header_2'] : '';
    // Custom register link
    $register_link_header_2   = edumodo_array_get($edumodo_options, 'register_link_header_2') ? $edumodo_options['register_link_header_2'] : '';


?>

    <header class="edumodo-header-2 <?php if ($header_position_2 == 'fixed'):?>fixed-menu-header <?php endif; ?> <?php if ($header_position_2 == 'absolute'):?>absolute-menu-header <?php endif; ?>">

        <nav id="edumodo-mainnav" class="wrap navbar navbar-default navbar-v2 edumodo-mainnav <?php if ($header_position_2 == 'fixed'):?>fixed-header <?php endif; ?> <?php if ($header_position_2 == 'absolute'):?>absolute-header <?php endif; ?>">
            <div class="container" data-hover="dropdown" data-animations="fadeInUp none none none">
                <div class="row">
                   <div class="col-md-3 col-sm-8 col-xs-8 logo">
                        <div class="navbar-header">                           
                            <div class="site-logo">
                                <?php 

                                    if ($edumodo_logo_2 ) : ?>
                                        <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">

                                            <img src="<?php echo esc_url($edumodo_logo_2); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
                                        </a>
                                    <?php else:?>
                                    <h2 class="site-title">
                                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                            <?php bloginfo( 'name' ); ?>
                                            
                                        </a>
                                    </h2>
                                    <h6 class="site-description"><?php bloginfo( 'description' ); ?></h6>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="col-md-6 col-sm-4 col-xs-4">
                        <div id="tx-trigger-effects" class="visible-xs visible-sm">
                            <button data-effect="tx-effect-1"><i class="fa fa-bars"></i></button>
                        </div>

                        <?php
                            wp_nav_menu( array(
                                'menu'              => 'primary',
                                'theme_location'    => 'primary',
                                'depth'             => 0,
                                'container'         => 'div',
                                'container_class'   => 'edumodo-navbar navbar-right navbar-collapse collapse hidden-sm',
                                'container_id'      => 'edumodo-main-nav',
                                'menu_class'        => 'nav navbar-nav  hidden-sm',
                                'fallback_cb'       => 'edumodo_link_to_menu_editor',
                            ));
                        ?>
                    </div>
                    <div class="col-md-3 text-right hidden-sm hidden-xs"> 
                          <div class="login-reg">
                              <span class="login"><a href="<?php echo esc_url($signin_link_header_2); ?>"><?php esc_html_e('Sign In', 'edumodo');?></a></span>
                              <span class="register"><a href="<?php echo esc_url($register_link_header_2); ?>"><?php esc_html_e('Register', 'edumodo');?></a></span>
                          </div>
                    </div>
                </div>
            </div>
        </nav>
    </header><!-- #masthead -->

