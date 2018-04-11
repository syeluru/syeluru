<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Edumodo
 */

	$post_id = edumodo_get_id();
	// Global Options
	global $edumodo_options;
	// sidebar position
	$sidebar_position   = edumodo_array_get($edumodo_options, 'default-sidebar-select') ? $edumodo_options['default-sidebar-select'] : '';

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">
            <?php do_action('edumodo-enable-or-disable-header-section'); ?>
			<div class="container">
				<div class="row">
					<?php if ('sidebar_left' == $sidebar_position): ?>
                        <div class="col-md-4">
                            <?php get_sidebar(); ?>
                        </div> <!-- end of /.col-md-4 -->                      
                    <?php endif; ?>

					<?php if ('no_sidebar' == $sidebar_position): ?>
                    	<div class="col-md-12">
                    <?php else: ?>
                        <div class="col-md-8">
                    <?php endif; ?>	
						
						<?php
							if ( have_posts() ) : ?>

								<?php
								/* Start the Loop */
								while ( have_posts() ) : the_post();

									/**
									 * Run the loop for the search to output the results.
									 * If you want to overload this in a child theme then include a file
									 * called content-search.php and that will be used instead.
									 */
									get_template_part( 'template-parts/content');

								endwhile;

								the_posts_navigation();

							else :

								get_template_part( 'template-parts/content', 'none' );

							endif; 
						?>
					</div><!-- .col-md-8 -->
                    <?php if ('sidebar_right' == $sidebar_position): ?>
                        <div class="col-md-4">
                            <?php get_sidebar(); ?>
                        </div>
                     <?php else: ?>
                        <div class="sidebar-wrapper-2">
                            <div class="col-md-4">
                                <?php get_sidebar(); ?>
                            </div>
                        </div>
                    <?php endif; ?><!-- .col-md-4 -->

				</div><!-- .row -->
			</div><!-- .container -->
		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
