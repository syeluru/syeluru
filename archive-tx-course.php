<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Edumodo
 */
    $post_id = edumodo_get_id();
    // Global Options
    global $edumodo_options;
    // sidebar position
    $sidebar_position = $edumodo_options['default-sidebar-select'];

get_header(); ?>


            <div id="primary" class="content-area">
                <main id="main" class="site-main">

                    <?php do_action('edumodo-enable-or-disable-header-section'); ?>

                    <div class="container">
                        <div class="row">

                              <?php 
                                  if ( have_posts() ) : 
                                  $temp = $wp_query; 
                                  $wp_query = null; 
                                  $wp_query = new WP_Query(); 
                                  $wp_query->query('showposts=6&post_type=tx-course'.'&paged='.$paged); 

                                      while ($wp_query->have_posts()) : $wp_query->the_post(); ?>

                                            <?php  get_template_part( 'template-parts/content', 'tx-course');  ?>
                                      <?php endwhile; wp_reset_postdata()?>

                                        <div class="edumodo-pagination">
                                              <?php
                                                the_posts_pagination( array(
                                                  'mid_size' => 1,
                                                  'prev_text'          =>  '<i class="fa fa-angle-left" aria-hidden="true"></i>',
                                                  'next_text'          =>  '<i class="fa fa-angle-right" aria-hidden="true"></i>',

                                                ) );
                                              ?>
                                        </div>

                                <?php 
                                  $wp_query = null; 
                                  $wp_query = $temp; 
                                ?>
  
                              <?php else:  ?>
                                      <?php get_template_part( 'template-parts/content', 'none' ); 
                              endif; ?>

                        </div><!-- .row -->
                    </div><!-- .container -->
                </main><!-- #main -->
            </div><!-- #primary -->

<?php
get_footer();
