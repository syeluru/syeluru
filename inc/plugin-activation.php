<?php

/**
 * Register the required plugins for this theme.
 *
 */
function edumodo_tgm_init() {

    $template_directory = get_template_directory();

    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
        
        // Edumodo Cor activation
        array(
            'name'               => esc_html__('Edumodo Core', 'edumodo'), // The plugin name.
            'slug'               => 'edumodo-core', // The plugin slug (typically the folder name).
            'source'             => get_template_directory() . '/plugin/edumodo-core.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '1.3', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
        ),

        // Elementor Page Builder activation
        array(
            'name'     => esc_html__('Elementor Page Builder', 'edumodo'),
            'slug'     => 'elementor',
            'required' => true,
        ),

        // One Click Demo Import
        array(
            'name'     => esc_html__('One Click Demo Import', 'edumodo'),
            'slug'     => 'one-click-demo-import',
            'required' => true,
        ),
        // One Click Demo Import
        array(
            'name'     => esc_html__('Widget Importer & Exporter', 'edumodo'),
            'slug'     => 'widget-importer-exporter',
            'required' => false,
        ),

        // Redux Framework activation
        array(
            'name'     => esc_html__('Redux FrameWork', 'edumodo'),
            'slug'     => 'redux-framework',
            'required' => true,
        ),

        // CMB2 Meta box activation
        array(
            'name'     => esc_html__('CMB2', 'edumodo'),
            'slug'     => 'cmb2',
            'required' => true,
        ),

        // LearnPress
        array(
            'name'     => esc_html__('LearnPress', 'edumodo'),
            'slug'     => 'learnpress',
            'required' => false,
            'version'  => '3.0.1',

        ),

        // LearnPress Course Review
        array(
            'name'     => esc_html__('LearnPress - Course Review', 'edumodo'),
            'slug'     => 'learnpress-course-review',
            'required' => false,
        ),

        // Contact form 7 activation
        array(
            'name'     => esc_html__('Contact Form 7', 'edumodo'),
            'slug'     => 'contact-form-7',
            'required' => false,
        ),

        // weForms activation
        array(
            'name'     => esc_html__('weForms', 'edumodo'),
            'slug'     => 'weforms',
            'required' => true,
        ),
        
        // Woocommerce
        array(
            'name'     => esc_html__('Woocommerce', 'edumodo'),
            'slug'     => 'woocommerce',
            'required' => false,
        ),

        // instagram widget
        array(
            'name'     => esc_html__('Instagram Gallery', 'edumodo'),
            'slug'     => 'insta-gallery',
            'required' => false,
        ),

        // Mailchimp activation
        array(
            'name'     => esc_html__('MailChimp', 'edumodo'),
            'slug'     => 'mailchimp-for-wp',
            'required' => false,
        ),

    );


    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'default_path' => '',
        'menu'         => 'tgmpa-install-plugins',
        'has_notices'  => true,
        'dismissable'  => true,
        'dismiss_msg'  => '',
        'is_automatic' => false,
        'message'      => '',
        'strings'      => array(
            'page_title'                      => esc_html__( 'Install Required Plugins', 'edumodo' ),
            'menu_title'                      => esc_html__( 'Install Plugins', 'edumodo' ),
            'installing'                      => esc_html__( 'Installing Plugin: %s', 'edumodo' ), // %s = plugin name.
            'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'edumodo' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'edumodo' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'edumodo' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'edumodo' ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'edumodo' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'edumodo' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'edumodo' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'edumodo' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'edumodo' ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'edumodo' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'edumodo' ),
            'return'                          => esc_html__( 'Return to Required Plugins Installer', 'edumodo' ),
            'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'edumodo' ),
            'complete'                        => esc_html__( 'All plugins installed and activated successfully. %s', 'edumodo' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );

    tgmpa( $plugins, $config );
}

add_action( 'tgmpa_register', 'edumodo_tgm_init' );