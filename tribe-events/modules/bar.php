<?php
/**
 * Events Navigation Bar Module Template
 * Renders our events navigation bar used across our views
 *
 * $filters and $views variables are loaded in and coming from
 * the show funcion in: lib/Bar.php
 *
 * Override this template in your own theme by creating a file at:
 *
 *     [your-theme]/tribe-events/modules/bar.php
 *
 * @package  TribeEventsCalendar
 * @version  4.3.5
 */
?>

<?php

$filters = tribe_events_get_filters();
$views   = tribe_events_get_views();
$current_url = tribe_events_get_current_filter_url();
?>

<?php do_action( 'tribe_events_bar_before_template' ) ?>
<div id="tribe-events-bar">

	<form id="tribe-bar-form" class="tribe-clearfix" name="tribe-bar-form" method="post" action="<?php echo esc_attr( $current_url ); ?>">

<!-- Mobile Filters Toggle -->

		<div id="tribe-bar-collapse-toggle" <?php if ( count( $views ) == 1 ) { ?> class="tribe-bar-collapse-toggle-full-width"<?php } ?>>
			<?php printf( esc_html__( 'Find %s', 'edumodo' ), tribe_get_event_label_plural() ); ?><span class="tribe-bar-toggle-arrow"></span>
		</div>
        <div class="bar-and-view-filter">
            <div class="bar-and-view-filter-wrapper">
<!-- filters -->
            <?php if ( ! empty( $filters ) ) { ?>
                <div class="tribe-bar-filters">
                    <div class="tribe-bar-filters-inner tribe-clearfix">
                        <?php foreach ( $filters as $filter ) : ?>
                            <div class="<?php echo esc_attr( $filter['name'] ) ?>-filte                                <label class="label-<?php echo esc_attr( $filter['name'] ) ?>" for="<?php echo esc_attr( $filter['name'] ) ?>"><?php echo esc_html($filter['caption']); ?></label>
                                <?php echo wp_kses($filter['html'], wp_kses_allowed_html('post')); ?>

                            </div>
                        <?php endforeach; ?>
                        <div class="tribe-bar-submit">
                            <input class="tribe-events-button tribe-no-param" type="submit" name="submit-bar" value="<?php printf( esc_attr__( 'Find %s', 'edumodo' ), tribe_get_event_label_plural() ); ?>" />
                        </div>
                        <!-- .tribe-bar-submit -->
                    </div>
                    <!-- .tribe-bar-filters-inner -->
                </div><!-- .tribe-bar-filters -->
            <?php } // if ( !empty( $filters ) ) ?>
<!-- Views -->
            <?php if ( count( $views ) > 1 ) { ?>
                <div id="tribe-bar-views">
                    <div class="tribe-bar-views-inner tribe-clearfix">
                        <h3 class="tribe-events-visuallyhidden"><?php esc_html_e( 'Event Views Navigation', 'edumodo' ) ?></h3>
                        <label><?php esc_html_e( 'View As', 'edumodo' ); ?></label>
                        <select class="tribe-bar-views-select tribe-no-param" name="tribe-bar-view">
                            <?php foreach ( $views as $view ) : ?>
                                <option <?php echo tribe_is_view( $view['displaying'] ) ? 'selected' : 'tribe-inactive' ?> value="<?php echo esc_attr( $view['url'] ); ?>" data-view="<?php echo esc_attr( $view['displaying'] ); ?>">
                                    <?php echo wp_kses($view['anchor'], wp_kses_allowed_html('post')) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <!-- .tribe-bar-views-inner -->
                </div><!-- .tribe-bar-views -->
            <?php } ?>

            </div>
        </div>
<!--   bar-and-view-filter-wrapper   -->

	</form>
	<!-- #tribe-bar-form -->

</div><!-- #tribe-events-bar -->
<?php
do_action( 'tribe_events_bar_after_template' );
