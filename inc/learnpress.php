<?php
/*
 * Larnpress remove action
 * 
 */
remove_action( 'learn_press_after_courses_loop_item', 'learn_press_courses_loop_item_instructor', 15 );
remove_action( 'learn_press_before_main_content', 'learn_press_breadcrumb' );
remove_action( 'learn_press_before_main_content', 'learn_press_search_form' );
remove_action( 'learn_press_content_landing_summary', 'learn_press_course_price', 25 );
remove_action( 'learn_press_content_landing_summary', 'learn_press_course_students', 30 );
remove_action( 'learn_press_content_landing_summary', 'learn_press_course_buttons', 70 );

/**
 * Display course info
 */
if ( !function_exists( 'edumodo_course_info' ) ) {
	function edumodo_course_info() {

		// Global Options
		global $edumodo_options;
		// Prefix
		$prefix = '_edumodo_';

		$course_id = get_the_ID();
		$course = learn_press_get_the_course();

		$course_lesson = 2;
		$lp_duration = get_post_meta(get_the_ID(), '_lp_duration');
		$lp_max_students = get_post_meta(get_the_ID(), '_lp_max_students');
		$lp_students = get_post_meta(get_the_ID(), '_lp_students');
		$lp_retake_count = get_post_meta(get_the_ID(), '_lp_retake_count');
		$lp_curriculum = get_post_meta(get_the_ID(), '_lp_curriculum');


		?>

		<div class="edumodo-course-info">
			<h3 class="title"><?php esc_html_e( 'Course Features', 'edumodo' ); ?></h3>
			<ul class="course-info-list">

				<?php if ($lp_duration): ?>
				<li>
					<i class="fa fa-clock-o"></i>
					<span class="label"><?php esc_html_e( 'Duration', 'edumodo' ); ?></span>
					<span class="value"><?php echo esc_html($lp_duration[0]);  ?></span>
				</li>
				<?php endif ?>
				
				<?php if ($lp_max_students): ?>
				<li>
					<i class="fa fa-th-large"></i>
					<span class="label"><?php esc_html_e( 'Max Students', 'edumodo' ); ?></span>
					<span class="value"><?php echo esc_html($lp_max_students[0]);  ?></span>
				</li>
				<?php endif ?>

				<?php if ($lp_students): ?>
				<li>
					<i class="fa fa-users"></i>
					<span class="label"><?php esc_html_e( 'Enrolled', 'edumodo' ); ?></span>
					<span class="value"><?php echo esc_html($lp_students[0]);  ?></span>
				</li>
				<?php endif ?>

				<?php if ($lp_retake_count): ?>
				<li>
					<i class="fa fa-repeat"></i>
					<span class="label"><?php esc_html_e( 'Re-take Course', 'edumodo' ); ?></span>
					<span class="value"><?php echo esc_html($lp_retake_count[0]);  ?></span>
				</li>
				<?php endif ?>

				<?php 
					$edumodo_course_skill_level = esc_html( get_post_meta( $course_id, 'edumodo_course_skill_level', true ) );
				if ($edumodo_course_skill_level): ?>
				<li>
					<i class="fa fa-level-up"></i>
					<span class="label"><?php esc_html_e( 'Skill level', 'edumodo' ); ?></span>
					<span class="value"><?php echo esc_html( get_post_meta( $course_id, 'edumodo_course_skill_level', true ) ); ?></span>
				</li>
				<?php endif ?>
				<?php 
					$edumodo_course_language = esc_html( get_post_meta( $course_id, 'edumodo_course_language', true ) );
				if ($edumodo_course_language): ?>
				<li>
					<i class="fa fa-language"></i>
					<span class="label"><?php esc_html_e( 'Language', 'edumodo' ); ?></span>
					<span class="value"><?php echo esc_html( get_post_meta( $course_id, 'edumodo_course_language', true ) ); ?></span>
				</li>
				<?php endif ?>
				<?php if ($course_id): ?>
				<li>
					<i class="fa fa-check-square-o"></i>
					<span class="label"><?php esc_html_e( 'Assessments', 'edumodo' ); ?></span>
					<span class="value"><?php echo ( get_post_meta( $course_id, '_lpr_course_final', true ) == 'yes' ) ? esc_html__( 'Yes', 'edumodo' ) : esc_html__( 'Self', 'edumodo' ); ?></span>
				</li>
				<?php endif ?>
			</ul>
		</div>
		
		<?php
	}

}


/**
 * This section only for learnpress details layout 3 
 */
if(! function_exists('edumodo_lp_course_details_style_3_header')){
    function edumodo_lp_course_details_style_3_header(){
        global $edumodo_options;

	// Prefix
	$prefix = '_edumodo_';
	// course single image
	$course_single_page_header_img = get_post_meta( get_the_ID(), $prefix . 'course_single_page_header_img', true );
        ?>
			<div class="lp-course3-heading" style="background-image: url('<?php echo esc_url($course_single_page_header_img); ?>');"> 
				<div class="container">
					<div class="row">
						<div class="col-md-8">
							<h2 class="lp-title"><?php the_title(); ?></h2>
							<div class="lp_excerpt">
								<div class="single-excerpt">
									<?php echo wp_trim_words( get_the_excerpt(),20, ''); ?>
								</div>

								<div class="course-meta-top">
									<?php esc_html_e( 'Created by: ', 'edumodo' ); ?> 
										<span class="author-name">
											<?php echo get_the_author_meta( 'display_name' ); ?>
									  	</span>
									<span class="lp-update"><?php esc_html_e( 'Last updated: ', 'edumodo' ); ?> <?php the_modified_date(); ?></span>
								</div>
								<div class="course-meta-buttom">
									<i class="fa fa-folder-open" aria-hidden="true"></i><?php learn_press_course_categories(); ?>
									<i class="fa fa-users" aria-hidden="true"></i><?php echo learn_press_courses_loop_item_students(); ?>
								</div>
							</div>
						</div>
						<div class="col-md-4"></div>
					</div>
				</div>
			</div>

  <?php   }
}
add_action('edumodo_lp_course_header_style_3','edumodo_lp_course_details_style_3_header');



/**
 * Display course sidebar learnpress single style 3
 */
if ( !function_exists( 'edumodo_lp_course_sidebar_3' ) ) {
	function edumodo_lp_course_sidebar_3() { ?>
			<div class="lp-sidebar">
				<div class="course-video">
	       		 <?php 
					$url = esc_url( get_post_meta( get_the_ID(), 'lp_course_video', 1 ) ); 
						 if($url):
						echo wp_oembed_get( $url ); 
					else :
							the_post_thumbnail();
					endif; 
				 ?>

					<div class="lp-course-meta">
						<div class="single-price">
							<?php learn_press_courses_loop_item_price(); ?>
						</div>
						<?php learn_press_course_buttons(); ?>
					</div>
					<?php edumodo_course_info(); ?>
				</div>
			</div>
<?php      
	}
}


/**
 * Display related courses Grig
 */
if ( ! function_exists( 'edumodo_related_courses_grid' ) ) {
	function edumodo_related_courses_grid() { ?>
		<div class="related-course-heading">
			<h2><?php esc_html_e('Related Courses', 'edumodo') ?></h2>
		</div>

		<div class="row">
			<div class="lp-related-course">
			    <?php
			        $course = array(
			            'post_type'         => 'lp_course',
			            'posts_per_page'    => 3

			        );

			        $course_query = new WP_Query( $course );
			            if($course_query->have_posts()):
			                while($course_query->have_posts()): 
			                    $course_query->the_post(); 
			    ?>

			    <div class="course-content-wrapper col-md-4">
			        <article id="post-<?php the_ID(); ?>" <?php post_class('lp-course-1'); ?>>

			            <?php if ( has_post_thumbnail() ):?>
			                <figure class="lp-course-thumbnail">
			                    <a href="<?php the_permalink(); ?>">
			                        <?php  the_post_thumbnail();?>
			                    </a>
			                </figure>
			            <?php endif; ?>

			            <div class="course-content-body">

			                <header class="entry-header">
			                    <h4 class="course-entry-title">
			                        <a href="<?php the_permalink();?>">
			                            <?php echo wp_trim_words( get_the_title(),7, ''); ?>
			                         </a>
			                    </h4>       
			                </header>

			                <div class="entry-content">
			                    <p><?php echo wp_trim_words( get_the_content(),6, ''); ?></p>
			                </div>

			                <footer class="lp-entry-footer">
			                      <div class="footer-body">
			                        <span class="lp-enroll">
			                            <i class="fa fa-users" aria-hidden="true"></i> 
			                            <?php 
			                                $lp_students = get_post_meta(get_the_ID(), '_lp_students');
			                                echo esc_html($lp_students[0]); 
			                             ?>
			                             <i class="fa fa-comments" aria-hidden="true"></i> 
			                            <a href="<?php the_permalink();?>"><?php echo get_comments_number(); ?></a>   

			                        </span>
			           
			                        <span class="lp-enroll-btn">
			                            <a href="<?php the_permalink();?>"><?php esc_html_e('Enroll Now', 'edumodo') ?></a>   
			                        </span>
			                    </div>
			                </footer>
			            </div>
			        </article>
			    </div>
			<?php endwhile; wp_reset_postdata(); endif; ?>
			</div> 
		</div>
<?php	}
}		
/**
 * Display related courses sidebar
 */
if ( ! function_exists( 'edumodo_related_courses' ) ) {
	function edumodo_related_courses() {
		$related_courses = edumodo_get_related_courses( null, array( 'posts_per_page' => 3 ) );
		if ( $related_courses ) {
			$ids = wp_list_pluck( $related_courses, 'ID' );
			//_learn_press_count_users_enrolled_courses( $ids );



			?>
            <div class="learnp-ralated-course">
                <h3 class="title"><?php esc_html_e( 'You May Like', 'edumodo' ); ?></h3>

                <div class="learnp-ralated-course-wrapper">
					<?php foreach ( $related_courses as $course_item ) : ?>
						<?php
							$course      = LP_Course::get_course( $course_item->ID );
							$is_required = $course->is_required_enroll();
						?>
	                        <article class="learnp-ralated-item">

									<?php if(get_the_post_thumbnail($course_item->ID)): ?>
									    <div class="learnp-ralated-thumbnail">
											<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($course_item->ID), 'thumbnail', false, '' ); ?>
											<img src="<?php echo esc_url($src[0]); ?>" alt="<?php echo esc_html( $course_item->post_title ); ?>">
										</div>
									<?php endif; ?>

                          

                                <div class="learnp-ralated-content">

                                    <h3 class="learnp-course-title">
                                        <a rel="bookmark"
                                           href="<?php echo get_the_permalink( $course_item->ID ); ?>"><?php echo esc_html( $course_item->post_title ); ?></a>
                                    </h3> <!-- .entry-header -->
                                    <div class="course-meta">

										<?php if ( $price = $course->get_price_html() ) {

											$origin_price = $course->get_origin_price_html();
											$sale_price   = $course->get_sale_price();
											$sale_price   = isset( $sale_price ) ? $sale_price : '';
											$class        = '';
											if ( $course->is_free() || ! $is_required ) {
												$class .= ' free-course';
												$price = esc_html__( 'Free', 'edumodo' );
											}

											?>

                                            <div class="course-price" itemprop="offers" itemscope
                                                 itemtype="http://schema.org/Offer">
                                                <div class="value<?php echo esc_attr($class); ?>" itemprop="price">
													<?php
													if ( $sale_price !== '' ) {
														echo '<span class="course-origin-price">' . $origin_price . '</span>';
													}
													?>
													<?php echo esc_html($price); ?>
                                                </div>
                                                <meta itemprop="priceCurrency"
                                                      content="<?php echo esc_html(learn_press_get_currency_symbol()); ?>"/>
                                            </div>
											<?php
										}
										?>
                                    </div>
                                </div>
	                        </article>
					<?php endforeach; ?>
                </div>
            </div>
			<?php
		}
	}
}

if ( ! function_exists( 'edumodo_get_related_courses' ) ) {
	function edumodo_get_related_courses( $limit ) {
		if ( ! $limit ) {
			$limit = 3;
		}
		$course_id = get_the_ID();

		$tag_ids = array();
		$tags    = get_the_terms( $course_id, 'course_tag' );

		if ( $tags ) {
			foreach ( $tags as $individual_tag ) {
				$tag_ids[] = $individual_tag->slug;
			}
		}

		$args = array(
			'posts_per_page'      => $limit,
			'paged'               => 1,
			'ignore_sticky_posts' => 1,
			'post__not_in'        => array( $course_id ),
			'post_type'           => 'lp_course'
		);

		if ( $tag_ids ) {
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'course_tag',
					'field'    => 'slug',
					'terms'    => $tag_ids
				)
			);
		}
		$related = array();
		if ( $posts = new WP_Query( $args ) ) {
			global $post;
			while ( $posts->have_posts() ) {
				$posts->the_post();
				$related[] = $post;
			}
		}
		wp_reset_query();

		return $related;
	}
}



