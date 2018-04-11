<?php
/**
 * Template part for displaying course
  posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Edumodo
 */

?>

    <div class="edumodo-course-1">
        <div class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
            <article id="post-<?php the_ID(); ?>" <?php post_class('custom-post'); ?>>

                <?php if ( has_post_thumbnail() ):?>
                    <figure class="post-thumbnail">
                        <a href="<?php the_permalink(); ?>">
                            <?php  the_post_thumbnail();?>
                        </a>
                    </figure>
                <?php endif; ?>

                <div class="course-details">
     
                    <?php if ( 'tx-course' === get_post_type() ) : ?>

                        <header class="entry-header">
                            <h4 class="course-entry-title">
                                  <a href="<?php the_permalink();?>"><?php echo wp_trim_words( get_the_title(),6, ''); ?></a> 
                            </h4>       
                        </header><!-- .entry-header -->
                        
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
                        </div><!-- .entry-meta -->
                    <?php endif; ?>
                
                    <?php  
                    $post_formats = array('audio', 'image', 'video', 'link', 'gallery'); 
                    if (!in_array(get_post_format(), $post_formats)):?>
                        <div class="entry-content">
                            <p><?php echo wp_trim_words( get_the_content(),15, ''); ?></p>
                        </div><!-- .entry-content -->
                    <?php endif; ?>

                </div><!-- .course details -->
            </article><!-- #post-## -->
        </div> <!-- /.col-md-4 -->

    </div> <!-- /.section -->


		
		
