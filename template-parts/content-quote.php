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
	// Quite format 
	$quote_text = get_post_meta(get_the_id(), $prefix . 'quote_format', true);

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('main-post quote-format'); ?>>

	<div class="entry-content quote-content quote">	

		<?php the_content(); ?>	
		<span><?php echo esc_html($quote_text); ?></span>
		
	</div>

</article><!-- #post-## -->
