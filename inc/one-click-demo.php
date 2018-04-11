<?php

function edumodo_import_files() {
    return array(
        array(
            'import_file_name'             => esc_html__('Edumodo Demo', 'edumodo'),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'libs/dummy-data/edumodo-demo-data.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'libs/dummy-data/widget-data.json',
            'local_import_redux'           => array(
                    array(
                        'file_path'   => trailingslashit( get_template_directory() ) . 'libs/dummy-data/redux-option.json',
                        'option_name' => 'edumodo_options',
                    ),
                ),
            'import_preview_image_url'     => trailingslashit( get_template_directory() ) . 'screenshot.png',
        ),
    );
}
add_filter( 'pt-ocdi/import_files', 'edumodo_import_files' );

function edumodo_after_import_setup() {
    // Assign menus to their locations.
    $main_menu = get_term_by( 'name', 'Primary', 'nav_menu' );

    set_theme_mod( 'nav_menu_locations', array(
            'primary' => $main_menu->term_id,
        )
    );

    // Assign front page and posts page (blog page).
    $front_page_id = get_page_by_title( 'Edumodo Home 1' );
    $blog_page_id  = get_page_by_title( 'Blog' );

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID );

}
add_action( 'pt-ocdi/after_import', 'edumodo_after_import_setup' );

function edumodo_demo_page_setup( $default_settings ) {
    $default_settings['parent_slug'] = 'themes.php';
    $default_settings['page_title']  = esc_html__( 'One Click Demo Import' , 'edumodo' );
    $default_settings['menu_title']  = esc_html__( 'Import Demo Data' , 'edumodo' );
    $default_settings['capability']  = 'import';
    $default_settings['menu_slug']   = 'ev-one-click-demo-import';

    return $default_settings;
}
add_filter( 'pt-ocdi/plugin_page_setup', 'edumodo_demo_page_setup' );
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );
