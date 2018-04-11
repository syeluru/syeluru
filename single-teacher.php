<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Edumodo
 */

	// Global Options
	global $edumodo_options;
	// Prefix
	$prefix = '_edumodo_';

get_header(); 
?>
	<div id="primary" class="content-area tx-teacher-single">
		<main id="main" class="site-main">
			<div class="page-details-blank"></div>
		    <div class="container">
			    <div class="row single-row">
			    	<div class="col-md-12">
				 
						<?php
							while ( have_posts() ) : the_post();

								get_template_part( 'template-parts/content-single', 'teacher');

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
