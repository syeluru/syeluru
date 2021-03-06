<?php
/**
 * over right
 */
/**
 * List View Single Event
 * This file contains one event in the list view
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list/single-event.php
 *
 * @version 4.5.11
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

// Setup an array of venue details for use later in the template
$venue_details = tribe_get_venue_details();

// The address string via tribe_get_venue_details will often be populated even when there's
// no address, so let's get the address string on its own for a couple of checks below.
$venue_address = tribe_get_address();

// Venue
$has_venue_address = ( ! empty( $venue_details['address'] ) ) ? ' location' : '';

// Organizer
$organizer = tribe_get_organizer();

?>
<div class="edumodo-event-image">
    <!-- Event Image -->
    <?php echo tribe_event_featured_image( null, 'full' ); ?>
    <!-- Event Cost -->
    <?php if ( tribe_get_cost() ) : ?>
        <div class="tribe-events-event-cost">
            <span class="ticket-cost"><?php echo tribe_get_cost( null, true ); ?></span>
            <?php
            /**
             * Runs after cost is displayed in list style views
             *
             * @since 4.5
             */
            do_action( 'tribe_events_inside_cost' )
            ?>
        </div>
    <?php endif; ?>
</div>

<div class="edumodo-event-loop-content">
    <!-- Event Title -->
    <?php do_action( 'tribe_events_before_the_event_title' ) ?>
    <h2 class="tribe-events-list-event-title">
        <a class="tribe-event-url" href="<?php echo esc_url( tribe_get_event_link() ); ?>" title="<?php the_title_attribute() ?>" rel="bookmark">
            <?php the_title() ?>
        </a>
    </h2>
    <?php do_action( 'tribe_events_after_the_event_title' ) ?>




    <!-- Event Meta -->
    <?php do_action( 'tribe_events_before_the_meta' ) ?>
    <div class="tribe-events-event-meta">
        <div class="author <?php echo esc_attr( $has_venue_address ); ?>">
            <!-- Schedule & Recurrence Details -->
            <div class="tribe-event-schedule-details">
                <?php echo tribe_events_event_schedule_details() ?>
            </div>
        </div>
    </div><!-- .tribe-events-event-meta -->
    <?php do_action( 'tribe_events_after_the_meta' ) ?>



    <div class="edumodo-event-content-wrapper">
        <!-- Event Content -->
        <?php do_action( 'tribe_events_before_the_content' ); ?>
            <div class="tribe-events-list-event-description tribe-events-content description entry-summary">
                <p class="edumodo-event-excerpt">
                    <?php echo wp_trim_words(tribe_events_get_the_excerpt( null, wp_kses_allowed_html( 'post' ) ), 20); ?>
                </p>
                <a href="<?php echo esc_url( tribe_get_event_link() ); ?>" class="tribe-events-read-more" rel="bookmark">
                    <?php esc_html_e( 'Find out more', 'edumodo' ) ?>
                </a>
            </div><!-- .tribe-events-list-event-description -->
        <?php do_action( 'tribe_events_after_the_content' ); ?>
    </div>
</div>
<!--edumodo-event-loop-content-->