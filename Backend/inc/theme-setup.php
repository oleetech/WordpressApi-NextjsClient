<?php

function theme_setup() {
	add_theme_support( 'title-tag' );



	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

    add_theme_support( 'custom-logo' );
	add_theme_support( 'post-thumbnails' );

	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );

	add_theme_support( 'editor-styles' );
	add_editor_style( 'css/editor-style.css' );
}

add_action( 'after_setup_theme', 'theme_setup' );


function register_custom_api_endpoints() {
    // Register a REST route
    register_rest_route('wp/v2', '/settings', array(
        'methods'  => 'GET',
        'callback' => 'get_custom_settings',
        'permission_callback' => '__return_true' // Make it publicly accessible
    ));
}

add_action('rest_api_init', 'register_custom_api_endpoints');

function get_custom_settings() {
    // Fetch settings data
    $settings = array(
        'title'       => get_bloginfo('name'),
        'description' => get_bloginfo('description'),
        'logo'        => get_custom_logo_url(), // Ensure this function exists or implement it
    );

    return new WP_REST_Response($settings, 200);
}

// Function to get custom logo URL, implement if not existing
function get_custom_logo_url() {
    $custom_logo_id = get_theme_mod('custom_logo');
    $logo = wp_get_attachment_image_src($custom_logo_id, 'full');

    return $logo ? $logo[0] : '';
}
