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
	// sidebar position
	$select_sidebar_notice_single_page   = edumodo_array_get($edumodo_options, 'select-sidebar-notice-single-page') ? $edumodo_options['select-sidebar-notice-single-page'] : '';
	// view counter
	setPostViews(get_the_ID());

get_header(); 
?>
	<div id="primary" class="content-area notice tx-notice-single">
		<main id="main" class="site-main">
		     <?php do_action('edumodo-enable-or-disable-header-section'); ?>
		    <div class="container">
			    <div class="row">

					<?php if ('sidebar_left' == $select_sidebar_notice_single_page): ?>
                        <div class="col-md-4">
                            <?php get_sidebar(); ?>
                        </div> 
                    <?php endif; ?>

					<?php if ('no_sidebar' == $select_sidebar_notice_single_page): ?>
                    	<div class="col-md-12">
                    <?php else: ?>
                        <div class="col-md-8 content-wrapper">
                    <?php endif; ?>

						<?php 
				             $notice = array(
				                'post_type'         => 'notice',
				                'post_status'       => 'publish',
				                'ignore_sticky_posts' => 1
				            );
				        ?>
				    		
				 
						<?php
							while ( have_posts() ) : the_post();

								get_template_part( 'template-parts/content-single', 'notice');

									// If comments are open or we have at least one comment, load up the comment template.
									if ( comments_open() || get_comments_number() ) :
										comments_template();
									endif;

							endwhile; // End of the loop.
						?>		
   	
		   			</div>

					<?php if ('sidebar_right' == $select_sidebar_notice_single_page): ?>
					    <div class="col-md-4">
					        <?php get_sidebar(); ?>
					    </div>
					    
					<?php elseif('no_sidebar' == $select_sidebar_notice_single_page): ?>

					<?php else: ?>
					    <div class="col-md-4 sidebar-wrapper-2">
					        <?php get_sidebar(); ?>
					    </div> 
					<?php endif; ?>

		       	</div><!-- /.row -->
	    	</div><!-- /.container -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
