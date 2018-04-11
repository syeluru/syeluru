<?php
/**
 * Single Event Template
 * A single event. This displays the event title, description, meta, and
 * optionally, the Google map for the event.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/single-event.php
 *
 * @package TribeEventsCalendar
 * @version  4.3
 *
 */


if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$events_label_singular = tribe_get_event_label_singular();
$events_label_plural = tribe_get_event_label_plural();
$event_id = get_the_ID();

?>

<div id="tribe-events-content" class="tribe-events-single">

	<!-- Notices -->
    <div class="container upper-part-of-single-event-featured-image">
        <?php tribe_the_notices() ?>

        <?php the_title( '<h1 class="tribe-events-single-event-title">', '</h1>' ); ?>

        <div class="tribe-events-schedule tribe-clearfix">
            <?php echo tribe_events_event_schedule_details( $event_id, '<h2>', '</h2>' ); ?>
            <p class="event-cost-header">
                <?php if ( tribe_get_cost() ) : ?>

                    <a class="tribe-events-cost" href="<?php esc_url('#'); ?>">
                        <span><?php echo tribe_get_cost( null, true ) ?></span>
                        <span><?php esc_html_e('|', 'edumodo'); ?></span>
                        <span><?php esc_html_e('Book Now', 'edumodo'); ?></span>
                    </a>
                <?php endif; ?>
            </p>

        </div>
    </div>
    <!-- #container -->

	<?php while ( have_posts() ) :  the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<!-- Event featured image, but exclude link -->
            <div class="single-event-featured-image container">
			    <?php echo tribe_event_featured_image( $event_id, 'full', false ); ?>
            </div>

        <!-- featured image-->
            <div class="container">

                <!-- Event content -->
                <?php do_action( 'tribe_events_single_event_before_the_content' ) ?>

                    <div class="tribe-events-single-event-description tribe-events-content">
                        <?php the_content(); ?>
                    </div>
                    <!--Event speaker-->
                    <?php do_action('edumodo-event-speaker-list'); ?>
                    <!-- Event Organizer -->
                    <?php do_action('edumodo-event-organizer'); ?>
                    <!-- Event Organizer -->
                    <?php do_action('edumodo-event-venue'); ?>

                <?php do_action( 'tribe_events_single_event_after_the_content' ) ?>

            </div>
        <!-- container-->
		</div>
        <!-- #post-x -->

		<?php if ( get_post_type() == Tribe__Events__Main::POSTTYPE && tribe_get_option( 'showComments', false ) ) comments_template() ?>
	<?php endwhile; ?>

	<!-- Event footer -->
	<div id="tribe-events-footer">
        <div class="container">
            <!-- Navigation -->
            <h3 class="tribe-events-visuallyhidden"><?php printf( esc_html__( '%s Navigation', 'edumodo' ), $events_label_singular ); ?></h3>
            <ul class="tribe-events-sub-nav">
                <li class="tribe-events-nav-previous"><?php tribe_the_prev_event_link( '<span>&laquo;</span> %title%' ) ?></li>
                <li class="tribe-events-nav-next"><?php tribe_the_next_event_link( '%title% <span>&raquo;</span>' ) ?></li>
            </ul>
            <!-- .tribe-events-sub-nav -->
        </div>
	</div>
	<!-- #tribe-events-footer -->
</div><!-- #tribe-events-content -->
