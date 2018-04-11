<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Edumodo
 */

    // Global Options
    global $edumodo_options;
    // Prefix
    $prefix = '_edumodo_';
    $post_id = edumodo_get_id();

    // social enable
    $soical_enable = $edumodo_options['enable-social'];
    // Social url
    $facebook_url = $edumodo_options['facebook'];
    $twitter_url = $edumodo_options['twitter'];
    $instagram_url = $edumodo_options['instagram'];
    $linkedin_url = $edumodo_options['linkedin'];

    // footer copyright
    $footer_option   = edumodo_array_get($edumodo_options, 'edumodo-footer-layout') ? $edumodo_options['edumodo-footer-layout'] : '';
    $edumodo_credit_switcher   = edumodo_array_get($edumodo_options, 'edumodo-credit-switcher') ? $edumodo_options['edumodo-credit-switcher'] : '';
    $edumodo_user_copyright_text   = edumodo_array_get($edumodo_options, 'edumodo-user-copyright-text') ? $edumodo_options['edumodo-user-copyright-text'] : '';


?>

    </div><!-- #content -->

            <?php
            
            switch ( $footer_option ) {

                case 'column-1':
                    get_template_part( 'template-parts/footer/footer', 'col-1' );
                    break;

                case 'column-2':
                    get_template_part( 'template-parts/footer/footer', 'cols-2' );
                    break;

                case 'column-3':
                    get_template_part( 'template-parts/footer/footer', 'cols-3' );
                    break;

                case 'column-4':
                    get_template_part( 'template-parts/footer/footer', 'cols-4' );
                    break;

                default:
                    get_template_part( 'template-parts/footer/footer', 'cols-4' );
            }
          
        ?>
                 <?php  if (!class_exists( 'ReduxFrameworkPlugin', true ) ) : ?>
                    <div id="copyright" class="copyright">
                        <div class="container">
                                <div class="col-md-12 text-center">
                                    <div class="edumodo-credit-wrapper">
                                        <div class="copyright-info">
                                            <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'edumodo' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'edumodo' ), 'WordPress' ); ?></a>
                                            <span class="sep"> | </span>
                                            <?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'edumodo' ), 'edumodo', '<a href="https://themexpert.com/">ThemeXpert</a>' ); ?>
                                        </div><!-- .site-info -->
                                    </div> 
                                </div><!-- .site-info -->
                        </div>
                    </div>
                <?php else : ?>

                <div id="copyright" class="copyright">
                    <div class="container">
                            <div class=" <?php if ($soical_enable == '1'):?> col-md-6 col-sm-6  <?php else : ?> col-md-12 text-center<?php endif;  ?>">
                            <?php 
                                if ($edumodo_credit_switcher) : ?>

                                <div class="edumodo-credit-wrapper">
                                    <div class="copyright-info">
                                        <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'edumodo' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'edumodo' ), 'WordPress' ); ?></a>
                                        <span class="sep"> | </span>
                                        <?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'edumodo' ), 'edumodo', '<a href="https://themexpert.com/">ThemeXpert.com</a>' ); ?>
                                    </div><!-- .site-info -->
                                </div> 

                                <?php else : ?>
                                    <?php if ($edumodo_user_copyright_text): ?>
                                        <div class="user-credit">
                                            <?php echo wp_kses($edumodo_user_copyright_text, wp_kses_allowed_html('post')); ?>
                                        </div>       
                                    <?php endif ?>
                                <?php endif; ?>

                            </div><!-- .site-info -->

                            <div class="col-md-6 col-sm-6">

                            <?php if ($soical_enable == '1'):?>

                                <div class="social-icon text-right">
                                    <?php if ($facebook_url):?>
                                        <a target="_blank" href="<?php echo esc_url($facebook_url); ?>">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    <?php endif; ?>

                                    <?php if ($twitter_url):?>
                                        <a target="_blank" href="<?php echo esc_url($twitter_url); ?>">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    <?php endif; ?>

                                        
                                    <?php if ($instagram_url):?>
                                        <a target="_blank" href="<?php echo esc_url($instagram_url); ?>">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                    <?php endif; ?>

                                    <?php if ($linkedin_url):?>
                                        <a target="_blank" href="<?php echo esc_url($linkedin_url); ?>">
                                            <i class="fa fa-linkedin"></i>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                            </div>
                    </div>
                </div>
                <?php endif; ?>

                </div><!-- #page -->
                </div>  <!-- tx-site-content-inner -->
                </div>  <!-- tx-site-content -->
                </div>  <!-- tx-site-pusher -->
            </div>  <!-- tx-site-container -->
        <?php wp_footer(); ?>
    </body>
</html>
