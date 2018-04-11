<?php
/**
 * The template for displaying all single posts
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
	// sidebar position
	$sidebar_details   = edumodo_array_get($edumodo_options, 'details-sidebar-select') ? $edumodo_options['details-sidebar-select'] : '';
	// view counter
	setPostViews(get_the_ID());

get_header(); ?>
    	
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		  <div class="page-details-blank"></div>
			<div class="container">
				<div class="row">

					<?php if ('sidebar_left' == $sidebar_details): ?>
                        <div class="col-md-4">
                            <?php get_sidebar(); ?>
                        </div> 
                    <?php endif; ?>

					<?php if ('no_sidebar' == $sidebar_details): ?>
                    	<div class="col-md-12">
                    <?php else: ?>
                        <div class="col-md-8 content-wrapper">
                    <?php endif; ?>

						<?php
							while ( have_posts() ) : the_post();

								get_template_part( 'template-parts/content', 'single' );

								the_post_navigation( );
								
							endwhile; // End of the loop.

						?>
						<?php
							$related = new WP_Query( ( 
								array( 
									'category__in' => wp_get_post_categories($post->ID), 
									'post__not_in' => array($post->ID) ,
									'orderby' => 'post_date',
      								'order' => 'DESC',
      								'posts_per_page' => 2,

									) 
								)
							);
						?>	

						<?php if ($related):?>				
						
								<div class="related-post clearfix"> 
									  <?php if( $related->have_posts() ) { ?>
									<h3 class="related-post-title">
										<?php esc_html_e('You Might Also Like', 'edumodo');?>
									</h3>
							  		<?php
							  			while( $related->have_posts() ) { $related->the_post(); ?>

							  			<div class="col-md-6">
							  				<div class="related-post-body">
										  	 	<figure>
												    <a href="<?php the_permalink();?>">
												    	<?php the_post_thumbnail();?>
												    </a>
												</figure><!-- .figure -->

												<header class="entry-header">	
													<h5 class="entry-title">
														<a href="<?php the_permalink();?>">
															<?php the_title(); ?>	
														</a>
													</h5>
												    <span class="entry-meta">
															<?php 
																$archive_year  = get_the_time('Y'); 
																$archive_month = get_the_time('m'); 
																$archive_day   = get_the_time('d'); 
															?>
															<a href="<?php echo get_day_link( $archive_year, $archive_month, $archive_day); ?>"><?php echo get_the_date(); ?></a>
												  	</span>					  		

												</header><!-- .header -->
											</div>
										</div>
										<?php }
											}
											wp_reset_postdata();
										?>
								</div><!-- .row -->
						
						<?php endif;?>	

						<?php 
								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;
						?>
					</div> 

					<?php if ('sidebar_right' == $sidebar_details): ?>
					    <div class="col-md-4">
					        <?php get_sidebar(); ?>
					    </div>

					<?php elseif('no_sidebar' == $sidebar_details): ?>
						
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
