<?php
/**
 * Template part for displaying link posts
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
  	// Link format
	$link_text = get_post_meta(get_the_id(), $prefix . 'link_format', true);

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('main-post link-formate'); ?>>
	<div class="content-body">	
		<div class="entry-content link-content">
				
					<i class="fa fa-external-link icon-link"></i>
				

				<?php 
					if (empty( get_the_content() ) ):?>
					<p class="link">
						<a  target="_blank" href="<?php echo esc_url($link_text);?>">
								<?php echo esc_url($link_text);?>			
						</a>
					</p>	
				<?php else: ?>
					<p class="link">
						<a  target="_blank" href="<?php echo esc_url($link_text);?>">
								<?php echo wp_trim_words( get_the_content(),4, ''); ?>				
						</a>
					</p>
				<?php endif; ?>
		</div><!-- .entry-content -->
	</div>
</article><!-- #post-## -->
