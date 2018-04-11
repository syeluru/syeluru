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
    // Sidebar position
    $social_enable   = edumodo_array_get($edumodo_options, 'social-share') ? $edumodo_options['social-share'] : '';
    $post_formats = array('audio', 'image', 'video', 'link', 'gallery');
    $post_id = edumodo_get_id();
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('single-post single-notice'); ?>>
   <?php
		// Must be inside a loop.	
		if (!in_array(get_post_format(), $post_formats)) {
			if ( has_post_thumbnail() ):?>			
		   	<figure class="post-thumbnail">
				<?php 
					if ( has_post_thumbnail() ) {
					 the_post_thumbnail();
					}
				?>
			</figure>
			<?php else: ?>
		<?php endif; }	 ?>



		<header class="entry-header">
			<h2 class="entry-title">
				<?php the_title(); ?>
			</h2>		
		</header><!-- .entry-header -->

	<?php if ( 'notice' === get_post_type() ) : ?>
		<div class="entry-meta">

			<span class="post-date">
				<?php esc_html_e( 'Date', 'edumodo' ); ?> <br>
				<?php 
					$archive_year  = get_the_time('Y'); 
					$archive_month = get_the_time('m'); 
					$archive_day   = get_the_time('d'); 
				?>
				<a href="<?php echo get_day_link( $archive_year, $archive_month, $archive_day); ?>"><?php echo get_the_date('M j, Y'); ?></a>   
			</span>

			<span class="post-author">
				<?php esc_html_e( 'Posted By', 'edumodo' ); ?> <br>
				<a href="<?php get_the_author_link(); ?>"><?php the_author(); ?></a>
			</span>

			<?php $terms = get_the_terms( get_the_ID() , 'notice_category' ); if ($terms) : ?>
			<div class="post-cat">
				<?php esc_html_e( 'Categories', 'edumodo' ); ?> <br>

                <?php 
                    foreach ( $terms as $term ) {
                        $term_link = get_term_link( $term );
                        if ( is_wp_error( $term_link ) ) {
                            continue;
                        }
                        echo '<a href="' . esc_url( $term_link ) . '">' . $term->name . '</a>';
                     }
                  ?> 
              </div>
              <?php endif; ?>
		</div><!-- .entry-meta -->
	<?php endif; ?>
	<div class="entry-content">
		<?php the_content(); ?>
	</div>
<!-- .entry-content -->

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






		
		
