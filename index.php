<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Edumodo
 */
    $post_id = edumodo_get_id();
	// Global Options
	global $edumodo_options;
    // Prefix
    $prefix = '_edumodo_';
	// Sidebar position
	$sidebar_position   = edumodo_array_get($edumodo_options, 'default-sidebar-select') ? $edumodo_options['default-sidebar-select'] : '';

 	$query_args = array(
		'posts_per_page' => 1,
		'post__in'  => get_option( 'sticky_posts' ),
		'ignore_sticky_posts' => 1
    );


get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		   <?php do_action('edumodo-enable-or-disable-header-section'); ?>
			<div class="container">
				<div class="row">
					<?php if ('sidebar_left' == $sidebar_position): ?>
						
                        <div class="col-md-4">
                            <?php get_sidebar(); ?>
                        </div> 
                       
                    <?php endif; ?>

					<?php if ('no_sidebar' == $sidebar_position): ?>
                    	<div class="col-md-12">
                    <?php else: ?>
                        <div class="col-md-8 content-wrapper">
                    <?php endif; ?>

                     	
							<div class="row">
							<?php
								if ( have_posts() ) :

								if ( is_home() && ! is_front_page() ) : ?>
									<header>
										<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
									</header>

								<?php
								endif; ?>


				                        <?php
											/* Start the Loop */
											while ( have_posts() ) : the_post();

											?>
											<div class="col-md-12 col-sm-12 col-xs-12"> 
												<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
											</div>

											<?php

											endwhile;
											
										?>
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
									else :

											get_template_part( 'template-parts/content', 'none' );

									endif; 
								?>
							</div>
		
						</div> 
						
					<?php if ('sidebar_right' == $sidebar_position): ?>
					<div class="col-md-4">
					    <?php get_sidebar(); ?>
					</div> 

					<?php elseif('no_sidebar' == $sidebar_position): ?>

					<?php else: ?>
					    <div class="col-md-4 sidebar-wrapper-2">
					        <?php get_sidebar(); ?>
					    </div>
					<?php endif; ?>

				</div><!-- .row -->
			</div><!-- .container -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
