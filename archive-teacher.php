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

            <?php  do_action('edumodo-enable-or-disable-header-section'); ?>
          
			<div class="container">
				<div class="row">
                     	
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
									get_template_part( 'template-parts/content', 'teacher');

								endwhile;

								the_posts_navigation();

							else :

								get_template_part( 'template-parts/content', 'none' );

							endif;
						?>

				</div><!-- .row -->
			</div><!-- .container -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
