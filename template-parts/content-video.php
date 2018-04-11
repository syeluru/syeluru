<?php
/**
 * Template part for displaying posts
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

    $video_link = get_post_meta(get_the_id(), $prefix . 'video_format', true);
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('main-post video-formate'); ?>>

	<div class="entry-content video-content embed-responsive embed-responsive-16by9">
		<?php if ($video_link):?>
			<?php echo wp_oembed_get($video_link);?>	
		<?php else: ?>
	<div class="content-body-video">	
		<?php the_content(); ?>
	</div>	
		<?php endif; ?>	
	</div><!-- .entry-content -->
	<div class="content-body">	
		<header class="entry-header">
			<h2 class="entry-title">
				<a href="<?php the_permalink();?>"><?php the_title(); ?></a>
			</h2>		
		</header><!-- .entry-header -->
	</div>
	<footer class="entry-footer">
		<span class="readmore"><a class="btn" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More', 'edumodo');?><i class="fa fa-angle-right"></i></a></span>			
		
		<div class="edit pull-right">	
		<span class="post-date">
		    <i class="fa fa-clock-o"></i> 
				<?php 
					$archive_year  = get_the_time('Y'); 
					$archive_month = get_the_time('m'); 
					$archive_day   = get_the_time('d'); 
				?>
				<a href="<?php echo get_day_link( $archive_year, $archive_month, $archive_day); ?>"><?php echo get_the_date(); ?></a>  
		</span>
			<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						esc_html__( 'Edit %s', 'edumodo' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
	    </div>
	</footer> 
</article>
