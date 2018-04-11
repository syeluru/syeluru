<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Edumodo
 */
	$post_id = edumodo_get_id();
	// Global Options
	global $edumodo_options;
    
	// sidebar position
	$sidebar_position   = edumodo_array_get($edumodo_options, 'default-sidebar-select') ? $edumodo_options['default-sidebar-select'] : '';
	// 404 image
   	$img_404   = edumodo_array_get($edumodo_options, '404_image') ? $edumodo_options['404_image']['url'] : '';
   
get_header(); ?>


	<div id="primary" class="content-area">
		<main id="main" class="site-main">

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

					<section class="error-404 not-found">

                    <?php if ($img_404):?> 
                        <div class="image-404">                          
                            <img src="<?php echo esc_url($img_404); ?>">
                        </div>
                    <?php else: ?>

						<header class="page-header">
							<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'edumodo' ); ?></h1>
						</header><!-- .page-header -->
                    <?php endif; ?>

						<div class="page-content">
							<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'edumodo' ); ?></p>

							<?php
								get_search_form();
							?>

						</div><!-- .page-content -->
					</section><!-- .error-404 -->
				</div>
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
