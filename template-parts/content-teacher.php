<?php
/**
 * Template part for displaying teacher
  posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Edumodo
 */
    // Global Options
    global $edumodo_options;

    $prefix = '_edumodo_';

    $teacher_img_links = get_post_meta( $post->ID, $prefix . 'teacher_img', true );
    $designation = get_post_meta( $post->ID, $prefix . 'teacher_designation', true );
    $email = get_post_meta( $post->ID, $prefix . 'teacher_email', true );
    $phone = get_post_meta( $post->ID, $prefix . 'teacher_phone', true );
    $website = get_post_meta( $post->ID, $prefix . 'teacher_website', true );
    $teacher_facebook = get_post_meta( $post->ID, $prefix . 'teacher_facebook_link', true );
    $teacher_twitter = get_post_meta( $post->ID, $prefix . 'teacher_twitter_link', true );
    $teacher_google_plus = get_post_meta( $post->ID, $prefix . 'teacher_google_plus_link', true );
    $teacher_linkedin = get_post_meta( $post->ID, $prefix . 'teacher_linkedin_link', true );

?>

    <section class="edumodo-teacher-1">
        <div class="col-md-3 col-sm-6">
             <div class="teacher-person">
                <?php if ($teacher_img_links) : ?>
                    <div class="person-img">
                        <img class="img-responsive" src="<?php echo esc_url($teacher_img_links); ?>" alt="<?php the_title(); ?>">
                    </div>
                <?php endif; ?>

                <div class="overlay">
                   <div class="person-info">
                      <h4 class="teacher-title">
                         <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                         </a>
                      </h4>

                    <?php if ($designation) : ?>
                          <p class="teacher-position"><?php echo esc_html($designation); ?></p>
                    <?php endif; ?>

                      <div class="social-links-teacher">
                        <?php if ($teacher_facebook) : ?>
                                <a class="teacher-facebook" href="<?php echo esc_url($teacher_facebook); ?>"><i class="fa fa-facebook"></i></a>
                        <?php endif; ?>

                        <?php if ($teacher_twitter) : ?>
                                <a class="teacher-teitter" href="<?php echo esc_url($teacher_twitter); ?>"><i class="fa fa-twitter"></i> </a>
                        <?php endif; ?>

                        <?php if ($teacher_google_plus) : ?>
                                <a class="teacher-gplus" href="<?php echo esc_url($teacher_google_plus); ?>"><i class="fa fa-google-plus-square"></i> </a>
                        <?php endif; ?>

                        <?php if ($teacher_linkedin) : ?>
                                 <a class="teacher-linkedin" href="<?php echo esc_url($teacher_linkedin); ?>"><i class="fa fa-linkedin"></i> </a>
                        <?php endif; ?>
                      </div>
                   </div>
                </div>
             </div>
        </div>
    </section> <!-- /.section -->


		
		
