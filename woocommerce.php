<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Switch_Pro
 */
$post_id = edumodo_get_id();
// Global Options
global $edumodo_options;
// Prefix
$prefix = '_edumodo_';

get_header(); ?>


	<div id="primary" class="content-area">
		<main id="main" class="site-main">

           <?php do_action('edumodo-enable-or-disable-header-section'); ?>
			<div class="container i-can-override-default-shop-page-style <?php echo is_single() ? 'shop-single-page-template' : ''; ?>">
				<div class="shop-row <?php echo is_archive() ? 'shop-archive' : ''; ?>">
                        <?php woocommerce_content(); ?>
				</div><!-- .row -->
			</div><!-- .container -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
