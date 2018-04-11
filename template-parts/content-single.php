<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Edumodo
 */
    $post_formats = array('audio', 'image', 'video', 'link', 'gallery');
    $post_id = edumodo_get_id();
    // Global Options
    global $edumodo_options;
    // Prefix
    $prefix = '_edumodo_';
    // enavle social shear
    $social_enable   = edumodo_array_get($edumodo_options, 'social-share') ? $edumodo_options['social-share'] : '';
    // Audio format
	$audio_link = get_post_meta(get_the_id(), $prefix . 'audio_format', true);
	// Video format
	$video_link = get_post_meta(get_the_id(), $prefix . 'video_format', true);
	// Gallery format
	$gallery_list = get_post_meta(get_the_id(), $prefix . 'gallery_format', true);
	 // image format
	$image_list = get_post_meta(get_the_id(), $prefix . 'image_format', true);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('single-post'); ?>>

   <?php if (!in_array(get_post_format(), $post_formats)) : ?>

		<?php if ( has_post_thumbnail() ) : ?>
			   	<figure class="post-thumbnail">
					<?php the_post_thumbnail(); ?>
					<?php if(is_sticky()): ?>
		                <div class="post-triangle">
		                  <span>
		                  		<i class="fa fa-star"></i>
		                  </span>
		                </div>
		            <?php endif; ?>	
				</figure>
			<?php  endif; ?>

   <?php endif; ?> <!-- End Standerd Post image Only -->

   <?php if (in_array(get_post_format(), $post_formats)) : ?> <!--Start Post Formate -->
		<?php if ($audio_link):?>
				<div class="audio-content">	
					<?php if ($audio_link):?>
						<?php echo wp_oembed_get($audio_link);?>	
					<?php else: ?>

					<?php 
						the_content();
					endif; ?>	
				</div>
			<?php elseif($video_link): ?>
					<div class="video-content embed-responsive embed-responsive-16by9">
					<?php if ($video_link):?>
						<?php echo wp_oembed_get($video_link);?>	
					<?php else: ?>

					<?php 
						the_content();
					endif; ?>	
				</div>

			<?php elseif($gallery_list): ?>
				<div class="gallery-content-single">

				<?php 
					if ($gallery_list):?>
					<div class="content-list">
						<?php	foreach ( (array) $gallery_list as $attachment_id => $attachment_url ) {
							echo wp_get_attachment_image( $attachment_id, 'full');
						}?>
					</div>
			
					<?php else:?>
						<div class="content-field">
							<?php the_content();?>
						</div>
					<?php endif;?>
				
				</div>

			<?php elseif($image_list or has_post_thumbnail()): ?>
				<div class="image-content">
					<?php if ($image_list):?>

						
						   	<figure class="post-thumbnail">
								<img src="<?php echo esc_url($image_list);?>">
				                <div class="post-triangle">
				                  <span>
				                  		<i class="fa fa-image"></i>
				                  </span>
				                </div>
							</figure>

					<?php else: ?>
						<?php if ( has_post_thumbnail() and !$image_list ) : ?>
						   	<figure class="post-thumbnail">
								<?php the_post_thumbnail(); ?>
				                <div class="post-triangle">
				                  <span>
				                  		<i class="fa fa-image"></i>
				                  </span>
				                </div>
							</figure>
						<?php endif; ?>

						<?php endif; ?>

				</div>
			<?php else: ?>

		<?php endif; ?>

		<?php endif;  ?> <!-- End All Post Formate -->


		<header class="entry-header">
			<?php if(is_sticky() && ! has_post_thumbnail()): ?>
				<div class="sticky-post">		
		              <div class="post-round">
		                  <span>
		                  		<i class="fa fa-star"></i>
		                  </span>
		              </div>
				</div>
		     <?php endif; ?>

			<h2 class="entry-title">
				<?php the_title(); ?>
			</h2>

		</header>

	<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">

			<span class="post-date">
				<?php esc_html_e( 'Date', 'edumodo' ); ?> <br>
				<?php 
						$archive_year  = get_the_time('Y'); 
						$archive_month = get_the_time('m'); 
						$archive_day   = get_the_time('d'); 
					?>
					<a href="<?php echo get_day_link( $archive_year, $archive_month, $archive_day); ?>"><?php echo get_the_date(); ?></a>
			</span>

			<span class="post-author">
				<?php esc_html_e( 'Posted By', 'edumodo' ); ?> <br>
				<a href="<?php get_the_author_link(); ?>"><?php the_author(); ?></a>
			</span>
			<div class="post-cat">
				<?php esc_html_e( 'Categories', 'edumodo' ); ?> <br>
				<?php the_category(); ?>
			</div>	
		</div><!-- .entry-meta -->
	<?php endif; ?>

	<div class="entry-content">
        <?php the_content(); 


	        wp_link_pages( array(
	            'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'edumodo' ),
	            'after'       => '</div>',
	            'next_or_number'   => 'number',
	            'link_before' => '<span class="page-number">',
	            'link_after'  => '</span>',
	        ) );
        ?>
	</div>

	<footer class="entry-footer">
		<div class="post-meta pull-left"> 
			<?php if(has_tag()):?>
				<!-- Post tag -->
				<span class="post-tags-title"><?php esc_html_e( 'Tags:', 'edumodo' ); ?></span>
				<span class="post-tags"><?php the_tags('', ', ', '<br />'); ?></span>
		    <?php endif;?>
		</div>

		<div class="edit pull-left">	
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

		<?php if(class_exists( 'ReduxFramework')): ?>
        <?php if ($social_enable == '1'): ?>
	        <div class="pull-right">
			<?php echo edumodo_social_share(); ?>
			</div>
		<?php endif; else : ?>
			<div class="pull-right">
			<?php echo edumodo_social_share(); ?>
			</div>
		<?php  endif; ?>
	</footer> <!-- .entry-footer -->
</article><!-- #post-## -->




