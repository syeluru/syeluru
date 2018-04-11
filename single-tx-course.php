<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
	// view counter
	setPostViews(get_the_ID());

get_header(); 
?>
	<div id="primary" class="content-area course tx-course-single">
		<main id="main" class="site-main">
			<?php if ('disable' !== $title_enable): ?>
				<?php do_action('edumodo-enable-or-disable-header-section'); ?>
			<?php endif;?>
		    <div class="container">
			    <div class="row">
			    	<div class="col-md-12">

						<?php 
				             $course = array(
				                'post_type'         => 'tx-course',
				                'post_status'       => 'publish',
				                'ignore_sticky_posts' => 1
				            );
				        ?>
						<?php
							while ( have_posts() ) : the_post();

								get_template_part( 'template-parts/content-single', 'tx-course');

									// If comments are open or we have at least one comment, load up the comment template.
									if ( comments_open() || get_comments_number() ) :
										comments_template();
									endif;

								endwhile; // End of the loop.
						?>	

	
		   			</div> <!-- /.col-md-8 -->

		       	</div><!-- /.row -->
	    	</div><!-- /.container -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
