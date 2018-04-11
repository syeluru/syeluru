<?php 


// Single social share
function edumodo_social_share( ) {
    remove_filter( 'the_title', 'wptexturize' );
    $tx_title = urlencode(html_entity_decode(get_the_title()));
    add_filter( 'the_title', 'wptexturize' );
    remove_filter( 'the_excerpt', 'wptexturize' );
    $tx_excerpt = urlencode(html_entity_decode(get_the_excerpt()));
    add_filter( 'the_excerpt', 'wptexturize' );
    $tx_url = urlencode( get_permalink() );
    // Construct sharing URL without using any script
    $twitter_url = 'https://twitter.com/intent/tweet?text='.$tx_title.'&amp;url='.$tx_url;
    $facebook_url = 'https://www.facebook.com/sharer/sharer.php?u='.$tx_url;
    $google_url = 'https://plus.google.com/share?url='.$tx_url;
    $linked_url = 'https://www.linkedin.com/shareArticle?mini=true&url='.$tx_url.'&title='.$tx_title.'&summary='.$tx_excerpt;
    ob_start();
    ?>
    <div class="social-share">
        <a class="facebook" href="<?php echo esc_url($facebook_url); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
        <a class="twitter" href="<?php echo esc_url($twitter_url); ?>" target="_blank"><i class="fa fa-twitter"></i></a>
        <a  class="linkedin" href="<?php echo esc_url($linked_url); ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
        <a class="google" href="<?php echo esc_url($google_url); ?>" target="_blank"><i class="fa fa-google"></i></a>
    </div>
    <?php    $output = ob_get_clean();
    return $output;
}

// Header array get
if(!function_exists('edumodo_array_get')) {
    function edumodo_array_get($array, $key, $default=null){
        if(!is_array($array)) return $default;
        return array_key_exists($key, $array) ? $array[$key] : $default;
    }
}

if(!function_exists('edumodo_get_id')) {
    function edumodo_get_id() {
        global $wp_query;
        return $wp_query->get_queried_object_id();
    }
}

 
// function to display number of posts.
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        esc_html_e('0 View', 'edumodo');
    }
    echo esc_html($count . ' Views');
}
 
// function to count views.
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
 
 
// Add it to a column in WP-Admin
add_filter('manage_posts_columns', 'posts_column_views');
add_action('manage_posts_custom_column', 'posts_custom_column_views',5,2);
function posts_column_views($defaults){
    $defaults['post_views'] = esc_html_e('Views', 'edumodo');
    return $defaults;
}
function posts_custom_column_views($column_name, $id){
 if($column_name === 'post_views'){
        echo getPostViews(get_the_ID());
    }
}

/**
 * Add WooCommerce Support
 * ========================
 */
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
/**
 * event speaker list
 * ===================
 */
if(! function_exists('edumodo_event_speaker_list')){
    function edumodo_event_speaker_list(){
        $speaker = get_post_meta(get_the_ID(), 'speaker_group');
        ?>
        <div class="speaker-list">
            <div class="speaker-list-wrapper row">
                <?php if($speaker): ?>
                <h2 class="edumodo-section-title"><?php esc_html_e('Speakers', 'edumodo'); ?></h2>

                <?php foreach($speaker[0] as $s): ?>
                    <div class="col-md-4 single-speaker">
                        <div class="single-speaker-wrapper">
                            <div class="speaker-image">
                                <img src="<?php echo esc_url($s['speaker_image']); ?>" alt="">
                            </div>
                            <div class="speaker-name">
                                <h3><?php echo esc_html($s['speaker_name']); ?></h3>
                            </div>
                            <div class="speaker-role">
                                <span><?php echo esc_html($s['speaker_role']); ?></span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
        <!--    speaker-list-->
        <?php
    }
}
/**
 * event organizer list
 * ====================
 */
if(! function_exists('edumodo_event_organizer')){
    function edumodo_event_organizer(){
        $organaizer = get_post_meta(get_the_ID(), '_EventOrganizerID');
        $org_args = array(
            'post_type' => 'tribe_organizer',
            'post__in' => $organaizer,
        );
        $q_org = new WP_Query($org_args);
        ?>
        <div class="organizer-list">
            <div class="organizer-list-wrapper">
                <?php if($q_org->have_posts()): ?>
                <h2 class="edumodo-section-title"><?php esc_html_e('Organizer', 'edumodo'); ?></h2>

                    <?php while($q_org->have_posts()): ?>
                        <?php $q_org->the_post(); ?>
                        <div class="single-organizer">
                            <div class="organizer-image-wrapper col-md-4">
                                <img src="<?php echo esc_url(get_post_meta(get_the_ID(), '_edumodo_venue-or-organizer-featured-image')[0]); ?>">
                            </div>
                            <div class="organizer-meta-wrapper col-md-8">
                                <div class="row">
                                    <div class="col-md-4">
                                        <p class="org-phone">
                                            <label for=""><?php esc_html_e('Phone', 'edumodo'); ?></label>
                                            <span><?php echo get_post_meta(get_the_ID(), '_OrganizerPhone')[0]; ?></span>
                                        </p>
                                    </div>
                                    <div class="col-md-4">
                                        <p class="org-phone">
                                            <label for=""><?php esc_html_e('Email', 'edumodo'); ?></label>
                                            <span><?php echo get_post_meta(get_the_ID(), '_OrganizerEmail')[0]; ?></span>
                                        </p>
                                    </div>
                                    <div class="col-md-4">
                                        <p class="org-website">
                                            <label for=""><?php esc_html_e('Website', 'edumodo'); ?></label>
                                            <span><?php echo get_post_meta(get_the_ID(), '_OrganizerWebsite')[0]; ?></span>
                                        </p>
                                    </div>
                                </div>

                                <div class="row">
                                    <h3><?php the_title(); ?></h3>
                                    <div class="organizer-content">
                                        <?php the_content(); ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>
            </div>
        </div>
        <!--organizer-list-->
        <?php
    }
}
/**
 * event venue list
 * ====================
 */
if(! function_exists('edumodo_venue_organizer')){
    function edumodo_venue_organizer(){
        $map = tribe_get_embedded_map();
        $phone   = tribe_get_phone();
        $website = tribe_get_venue_website_link();
        $venue = get_post_meta(get_the_ID(), '_EventVenueID');
        $venue_args = array(
            'post_type' => 'tribe_venue',
            'post__in' => $venue,
        );
        $q_venue = new WP_Query($venue_args);
        ?>
        <div class="venue-list">
            <div class="venue-list-wrapper">
                <?php if($q_venue->have_posts()): ?>
                <h2 class="edumodo-section-title"><?php esc_html_e('Venue', 'edumodo'); ?></h2>

                    <?php while($q_venue->have_posts()): ?>
                        <?php $q_venue->the_post(); ?>
                        <div class="single-venue">
                            <div class="venue-image-wrapper col-md-12">
                                <img src="<?php echo esc_url(get_post_meta(get_the_ID(), '_edumodo_venue-or-organizer-featured-image')[0]); ?>">
                            </div>
                            <div class="venue-content">
                                <div class="venue-meta row">
                                    <p class="phone col-md-4">
                                        <?php if ( ! empty( $phone ) ): ?>
                                            <span class="tribe-venue-tel"> <?php echo esc_html($phone) ?> </span>
                                        <?php endif ?>
                                        <?php if ( ! empty( $website ) ): ?>
                                            <span class="url"> <?php echo esc_url($website) ?> </span>
                                        <?php endif ?>
                                    </p>
                                    <p class="address col-md-4">
                                        <?php echo tribe_get_full_address(); ?>
                                    </p>
                                    <p class="google-map-link col-md-4">
                                        <?php if ( tribe_show_google_map_link() ) : ?>
                                            <?php echo tribe_get_map_link_html(); ?>
                                        <?php endif; ?>
                                    </p>
                                </div>
                                <div class="venue-content-wrapper">
                                    <?php the_content(); ?>
                                </div>
                                <div class="tribe-events-venue-map">
                                    <?php
                                    //Display the map.
                                    do_action( 'tribe_events_single_meta_map_section_start' );
                                        echo wp_kses($map, wp_kses_allowed_html('post'));
                                    do_action( 'tribe_events_single_meta_map_section_end' );
                                    ?>
                                </div>
                            </div>
                        </div>

                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>
            </div>
        </div>
        <!--veneu-list-->
        <?php
    }
}

add_action('edumodo-event-speaker-list', 'edumodo_event_speaker_list');
add_action('edumodo-event-organizer','edumodo_event_organizer');
add_action('edumodo-event-venue','edumodo_venue_organizer');

if(! function_exists('edumodo_header_title_breadcrumb')){
    function edumodo_header_title_breadcrumb(){
        // Global Options
        global $edumodo_options;

        $post_id = edumodo_get_id();

        // Prefix
        $prefix = '_edumodo_';
        // Page Header image
        $img_category = edumodo_array_get($edumodo_options, 'category_page_bg_image') ? $edumodo_options['category_page_bg_image']['url'] : '';

        $page_header_img = get_post_meta($post_id, $prefix . 'header_img', true);

        // sensei course page archive header
        $sensei_course_archive_img = edumodo_array_get($edumodo_options, 'sensei_course_archive_header_img') ? $edumodo_options['sensei_course_archive_header_img']['url'] : '';
        // Learnpress course page archive header
        $learnpress_course_archive_img = edumodo_array_get($edumodo_options, 'learnpress_course_archive_header_img') ? $edumodo_options['learnpress_course_archive_header_img']['url'] : '';
        // Learnpress course page archive header
        $teacher_archive_header_img = edumodo_array_get($edumodo_options, 'teacher_archive_header_img') ? $edumodo_options['teacher_archive_header_img']['url'] : '';

        $event_archive_header_img = edumodo_array_get($edumodo_options, 'event_header_img') ? $edumodo_options['event_header_img']['url'] : '';
        // Shop page archive header
        $shop_archive_img = edumodo_array_get($edumodo_options, 'shop_header_img') ? $edumodo_options['shop_header_img']['url'] : '';
        // breadcrumb option
        $enable_breadcrumb = edumodo_array_get($edumodo_options, 'enable-breadcrumb')? $edumodo_options['enable-breadcrumb'] : '';
        // Add class for top Space absolute header
        $header_position_1  = $edumodo_options['header_position_1'];

        if(is_singular(array( 'course',  'tribe_events'))):
            $img_category = get_post_meta( get_the_ID(), '_edumodo_course_single_page_header_img', true );
        elseif(is_singular(array('tx-course', 'lp_course'))):
            $img_category = get_post_meta( get_the_ID(), '_edumodo_header_img', true );
            
        elseif (is_404()):
            $img_category = $edumodo_options['404_page_bg_image']['url'];
        elseif (is_search()):
            $img_category = $edumodo_options['search_page_bg_image']['url'];
        elseif (is_post_type_archive('course')):
            $img_category = $sensei_course_archive_img;
        elseif (is_post_type_archive('lp_course')):
            $img_category = $learnpress_course_archive_img;
        elseif (is_post_type_archive('teacher')):
            $img_category = $teacher_archive_header_img;
        elseif (is_post_type_archive('tribe_events')):
            $img_category = $event_archive_header_img;
        elseif (class_exists('WooCommerce')):
            if(is_shop()):
                $img_category = $shop_archive_img;
            elseif(is_page(get_the_ID()) && !is_front_page()):
                $img_category = $page_header_img;
            endif;
        endif;

        ?>
        <div class="page-details <?php if ($header_position_1 == 'absolute'):?>absolute-top-space<?php endif; ?>" style="<?php if ($img_category):?>background-image: url(<?php echo esc_url($img_category);?>); <?php else: ?><?php endif;?>">
            <div class="container">

                <div class="row">
                    <div class="page-wrapper">
                        <?php 
                        if (is_home()) : ?>
                            <div class="row">
                                <div class="col-md-8">                        
                                    <h2 class="page-title" >
                                        <?php
                                        $custom_post_type_title =  get_post_type_object(get_post_type(get_the_ID()));
                                        ?>
                                        <?php if(is_singular(array('tx-course', 'course', 'lp_course', 'tribe_events'))): ?>
                                            <?php if(is_single()): ?>
                                                <?php echo esc_html($custom_post_type_title->name); ?>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <?php echo esc_html(wp_title('')); ?>
                                        <?php endif; ?>
                                    </h2>
                                    <?php if($enable_breadcrumb):?>
                                        <?php if (function_exists('woocommerce_breadcrumb')) woocommerce_breadcrumb(); ?>
                                    <?php endif;?>
                                </div>

                                <div class="col-md-4">
                                    <div>
                                        <div class="edumodo-top-search">
                                            <form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
                                                <label>
                                                    <input type="search" class="search-field"
                                                        placeholder="<?php echo esc_attr( 'Search ...' ) ?>"
                                                        value="<?php echo get_search_query() ?>" name="s"
                                                        title="<?php echo esc_attr( 'Search for:' ) ?>" />
                                                </label>
                                                <input type="submit" class="search-submit"
                                                    value="<?php echo esc_attr( 'Search' ) ?>" />
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        <?php else : ?>

                        
                            <h2 class="page-title" >

                                <?php
                                $custom_post_type_title =  get_post_type_object(get_post_type(get_the_ID()));
                                $custom_page_title = get_post_meta(get_the_ID(), '  ', false);
                                $page_custom_title_for_page_and_course = get_post_meta($post_id, '_edumodo_page_title', true);
                                
                                
                                ?>
                                <?php if(is_singular(array('course', 'tribe_events'))): ?>
                                    <?php if(is_single()): ?>
                                        <?php echo esc_html($custom_post_type_title->name); ?>
                                    <?php endif; ?>

                                <?php elseif (is_singular('tx-course')) :?>
                                   <?php if($page_custom_title_for_page_and_course): ?>
                                        <?php echo esc_html($page_custom_title_for_page_and_course); ?>
                                   <?php else: ?>
                                        <?php echo esc_html($custom_post_type_title->name); ?>
                                    <?php endif ?>
                                    
                                <?php elseif (is_singular('lp_course')) :?>
                                    <?php if($page_custom_title_for_page_and_course): ?>
                                        <?php echo esc_html($page_custom_title_for_page_and_course); ?>
                                    <?php else: ?>
                                        <?php echo esc_html($custom_post_type_title->name); ?>
                                    <?php endif ?>

                                <?php else: ?>
                                    <?php if(! $page_custom_title_for_page_and_course): ?>
                                        <?php echo get_the_title(); ?>
                                    <?php else: ?>
                                        <?php echo esc_html($page_custom_title_for_page_and_course); ?>
                                    <?php endif; ?>
                                    
                                <?php endif; ?>
                            </h2>
                            <?php if($enable_breadcrumb):?>
                                <?php if (function_exists('woocommerce_breadcrumb')) woocommerce_breadcrumb(); ?>
                            <?php endif;?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php

    }
}

if(! function_exists('enable_header_breadcrumb_section')){
    function enable_header_breadcrumb_section(){
        global $edumodo_options;
        $enable_header = edumodo_array_get($edumodo_options, 'enable-header') ? $edumodo_options['enable-header'] : '';
        if($enable_header):
            add_action('edumodo-header-title-breadcrumb', 'edumodo_header_title_breadcrumb');
        endif;
    }
}
add_action('init', 'enable_header_breadcrumb_section');
/**
 * Enable or disable header section in single page
 */
if(! function_exists('edumodo_enable_or_disable_header_section')){
    function edumodo_enable_or_disable_header_section(){
        global $edumodo_options;
        $enable_header_section = edumodo_array_get($edumodo_options, 'enable-header') ? $edumodo_options['enable-header'] : '';
        $enable_breadcrumb_in_single_post_and_cpt_post = edumodo_array_get($edumodo_options, 'enable-header-single-posts-and-custom-post') ? $edumodo_options['enable-header-single-posts-and-custom-post'] : '';

        if( is_single() && ($enable_breadcrumb_in_single_post_and_cpt_post == '1') ):
            do_action('edumodo-header-title-breadcrumb');
        elseif(is_archive() && ($enable_header_section == '1')):
            do_action('edumodo-header-title-breadcrumb');
        elseif(is_archive() && !($enable_header_section == '1')):
            echo '<div class="page-details-blank"></div>';
        elseif(is_single() && !($enable_breadcrumb_in_single_post_and_cpt_post == '1')):
            echo '<div class="page-details-blank"></div>';
        elseif(is_page() && ! is_front_page()):
            do_action('edumodo-header-title-breadcrumb');
        elseif(is_home() && ($enable_header_section == '1')):
            do_action('edumodo-header-title-breadcrumb');
        elseif(is_home() && !($enable_header_section == '1')):
            echo '<div class="page-details-blank"></div>';
        endif;
    }
}
add_action('edumodo-enable-or-disable-header-section','edumodo_enable_or_disable_header_section');





/**
 * Allow input in wp_kses_allowed_html function
 */

if(!function_exists('edumodo_add_allowed_tags')) {
    function edumodo_add_allowed_tags($tags) {
        $tags['input'] = array(
            'type' => true,
            'name' => true,
            'style' => true,
            'id' => true,
            'value' => true,
            'placeholder' => true
        );
        return $tags;
    }
    add_filter('wp_kses_allowed_html', 'edumodo_add_allowed_tags');
}


/**
 * Menu fallback. Link to the menu editor if that is useful.
 *
 * @param  array $args
 * @return string
 */
function edumodo_link_to_menu_editor( $args )
{
    if ( ! current_user_can( 'manage_options' ) )
    {
        return;
    }

    // see wp-includes/nav-menu-template.php for available arguments
    extract( $args );

    $link = $link_before
        . '<a href="' .admin_url( 'nav-menus.php' ) . '">' . $before . 'Add a menu' . $after . '</a>'
        . $link_after;

    // We have a list
    if ( FALSE !== stripos( $items_wrap, '<ul' )
        or FALSE !== stripos( $items_wrap, '<ol' )
    )
    {
        $link = "<li>$link</li>";
    }

    $output = sprintf( $items_wrap, $menu_id, $menu_class, $link );
    if ( ! empty ( $container ) )
    {
        $output  = "<$container class='$container_class' id='$container_id'>$output</$container>";
    }

    if ( $echo )
    {
        echo wp_kses($output, wp_kses_allowed_html('post'));
    }

    return $output;
}
