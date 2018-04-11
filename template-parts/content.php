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

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('main-post'); ?>>
	<?php if ( has_post_thumbnail() ):?>
		<div class="edumodo-post-img">
				<figure class="post-thumbnail">
					<a href="<?php the_permalink(); ?>">
						<?php  the_post_thumbnail();?>
					</a>

					<?php if(is_sticky()): ?>
		                <div class="post-triangle">
		                  <span>
		                  		<i class="fa fa-star"></i>
		                  </span>
		                </div>
		        	<?php endif; ?>	

			       	<h2 class="entry-title">
						<a href="<?php the_permalink();?>"><?php the_title(); ?></a>
					</h2>
				</figure>
			<?php if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<div class="post-cat">
						<?php the_category(); ?>
					</div>
				</div>
			<?php endif; ?>
		</div>


		<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta-mobile">
				<?php the_category(); ?>
			</div>
		<?php endif; ?>

	<div class="content-body">
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

			<h2 class="entry-title-content">
				<a href="<?php the_permalink();?>">
					<?php the_title(); ?>
				</a>
			</h2>

		</header>

		<div class="entry-content">
	       <p><?php echo wp_trim_words( get_the_content(),30, ''); ?></p> 
	       <?php
		        wp_link_pages( array(
		            'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'edumodo' ),
		            'after'       => '</div>',
		            'next_or_number'   => 'number',
		            'link_before' => '<span class="page-number">',
		            'link_after'  => '</span>',
		        ) );
	        ?>
		</div>
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
	<?php else: ?>

	<div class="content-body">
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
				<a href="<?php the_permalink();?>">
					<?php the_title(); ?>
				</a>
			</h2>

		</header>

			<?php if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<span class="post-cat">
						<?php the_category(); ?>
					</span>
				</div>
			<?php endif; ?>

		<div class="entry-content">
	       <p><?php echo wp_trim_words( get_the_content(),30, ''); ?></p> 
	       <?php
		        wp_link_pages( array(
		            'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'edumodo' ),
		            'after'       => '</div>',
		            'next_or_number'   => 'number',
		            'link_before' => '<span class="page-number">',
		            'link_after'  => '</span>',
		        ) );
	        ?>
		</div>
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
	<?php endif; ?>	
</article>
