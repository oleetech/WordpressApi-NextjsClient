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

    // Add support for custom header with a beautiful header image
    $header_defaults = array(
        'default-image'          => '',
        'width'                  => 1920,
        'height'                 => 1080,
        'flex-height'            => true,
        'flex-width'             => true,
        'header-text'            => false,
        'unlink-homepage-logo'   => true, // Keep this true if you want to unlink logo from homepage
    );
    add_theme_support( 'custom-header', $header_defaults );
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
        'title'             => get_bloginfo('name'),
        'description'       => get_bloginfo('description'),
        'logo'              => wp_get_attachment_image_url( get_theme_mod( 'custom_logo' ), 'full' ), // Fetch logo URL
        'header_image'      => get_header_image(), // Fetch header image URL
        'posts_per_page'    => get_option('posts_per_page', 10), // Retrieve the number of posts per page setting
    );

    return new WP_REST_Response($settings, 200);
}



