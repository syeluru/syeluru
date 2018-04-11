<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Edumodo
 */
	// Global Options
	global $edumodo_options;

	$prefix = '_edumodo_';

	$start_date = get_post_meta( $post->ID, $prefix . 'course_start_date', true );
	$end_date = get_post_meta( $post->ID, $prefix . 'course_end_date', true );
	$total_hours = get_post_meta( $post->ID, $prefix . 'course_hours', true );
	$total_student = get_post_meta( $post->ID, $prefix . 'course_students', true );
	$course_time = get_post_meta( $post->ID, $prefix . 'course_time', true );
	$course_Levels = get_post_meta( $post->ID, $prefix . 'course_levels', true );
	$course_cost = get_post_meta( $post->ID, $prefix . 'course_cost', true );
	$course_teacher = get_post_meta(  $post->ID, $prefix . 'select_course_teacher', true );

?>

    <article id="post-<?php the_ID(); ?>"  <?php post_class('single-course-post'); ?>>

		<div class="row">
			<div class="col-md-8 col-lg-8 col-xs-12 col-sm-12">
				
				<div class="weforms-popup">
				    <div class="weforms-popup-wrapper">
				        <span class="popup-dismiss"><i class="fa fa-times"></i></span>
				        <h2><?php the_title(); ?></h2>
				        
				        <?php 
							  echo do_shortcode('[weforms id="3751"]')
				        ?>
				    </div>
				</div>

				<figure class="course-thumbnail">
					<?php 
						// check if the post has a Post Thumbnail assigned to it.
						if ( has_post_thumbnail() ) {
							the_post_thumbnail();
						}
					?>
				</figure>

				<div class="course-content entry-content">

                    <?php if ( 'tx-course' === get_post_type() ) : ?>
                        <div class="entry-meta course-meta">
							<span class="post-date">
								<i class="fa fa-calendar"></i> 
								<?php 
									$archive_year  = get_the_time('Y'); 
									$archive_month = get_the_time('m'); 
									$archive_day   = get_the_time('d'); 
								?>
								<a href="<?php echo get_day_link( $archive_year, $archive_month, $archive_day); ?>"><?php echo get_the_date(); ?></a>   
							</span>
                            <span class="post-view">
                            	<i class="fa fa-eye"></i> 
                            	<?php echo getPostViews(get_the_ID()); ?>
                            </span>
                            <div class="post-cat"><?php 
                                 $terms = get_the_terms( get_the_ID() , 'tx-course-category' );
                                 if ($terms) { ?>
                                <i class="fa fa-folder-open-o"></i>
                                <?php 
                                    foreach ( $terms as $term ) {
                                        $term_link = get_term_link( $term );
                                        if ( is_wp_error( $term_link ) ) {
                                            continue;
                                        }
                                        echo '<a href="' . esc_url( $term_link ) . '"> ' . $term->name. '</a>';
                                     }
                                  }
                                ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    
					<h2 class="course-title">
						<?php the_title(); ?>
					</h2>

					<p>
						<?php the_content(); 
							wp_link_pages( array(
								'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'edumodo' ),
								'after'  => '</div>',
							) );
						?>
					</p>
					
				</div><!-- .entry-content -->
				  	
			</div>
	
			<div class="col-md-4 col-lg-4 col-xs-12 col-sm-12 widget-area course-sidebar">
				<!-- Sideber -->
				<?php if ( ! dynamic_sidebar( 'course-sidebar-1' ) ) : ?>
					<?php dynamic_sidebar( 'course-sidebar-1' ); ?> 
				<?php endif; ?>
			</div>
		</div>

    </article><!-- #post-## -->
