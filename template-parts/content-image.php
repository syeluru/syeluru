<?php
/**
 * Template part for displaying image posts
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
    // image format
	$image_list = get_post_meta(get_the_id(), $prefix . 'image_format', true);
	
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('main-post image-formate'); ?>>
	<div class="image-content">

		<?php 
			$content = apply_filters( 'the_content', get_the_content() );
			$image = false;

			// Only get image from the content if a playlist isn't present.
			if ( false === strpos( $content, 'wp-playlist-script' ) ) {
				$image = get_media_embedded_in_content( $content, array('image' ) );
			}
			//var_dump($image);
		 ?>
		
		<?php if ($image_list):?>
			<div class="image-content-metabox">
				<img alt="<?php the_title(); ?>" src="<?php echo esc_url($image_list);?>">
			</div>
		<?php elseif(has_post_thumbnail()) : ?>
			<div class="image-content-feature">
				<?php the_post_thumbnail();	 ?>
			</div>
		<?php else : ?>
			<?php 
			if ( ! empty( $image )) :
				foreach ( $image as $image_html ) {
					echo '<div class="image-content-desc only-content-image">';
					echo wp_kses($image_html, array(
						'img'	=> array(
							'src' => array(),
						),
					));
					echo '</div>';
				}
			endif;

			 ?>
		
		<?php endif; ?>

            <div class="post-triangle">
              <span>
              		<i class="fa fa-image"></i>
              </span>
            </div>
	</div>

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