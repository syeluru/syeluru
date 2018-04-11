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
    // Prefix
    $prefix = '_edumodo_';
	// sidebar position
	$sidebar_position = $edumodo_options['default-sidebar-select'];

get_header(); ?>



	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php if(class_exists( 'CMB2_Bootstrap_230')): ?>
					<?php do_action('edumodo-enable-or-disable-header-section'); ?>
			<?php else: ?>
				<div class="page-details">
					<div class="container">
						<div class="row">
							<h2 class="page-title">
								<?php the_archive_title(); ?>
							</h2>
						</div>
					</div>
				</div>
			<?php endif; ?>
          
			<div class="container">
				<div class="row">

					<?php if ('sidebar_left' == $sidebar_position): ?>
                        <div class="col-md-4 ">
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

									/*
									 * Include the Post-Format-specific template for the content.
									 * If you want to override this in a child theme, then include a file
									 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
									 */
								get_template_part( 'template-parts/content', get_post_format() );

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
	</div><!-- #primary -->

<?php
get_footer();
