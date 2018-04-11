<?php
/**
   Template Name: Full Width Page
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
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
	// Page title enable
	$title_enable = get_post_meta($post_id, $prefix . 'title_enable', true);

get_header(); ?>


	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<?php if(class_exists( 'CMB2_Bootstrap_230')): ?>
				<?php if ('disable' !== $title_enable): ?>
					<?php do_action('edumodo-enable-or-disable-header-section'); ?>
				<?php endif;?>
			<?php else: if(! is_front_page()):?>
				<div class="page-details">
					<div class="container">
						<div class="row">
							<h2 class="page-title">
								<?php the_title(); ?>
							</h2>
						</div>
					</div>
				</div>
			<?php endif; endif; ?>

				<?php
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
				?>						

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
