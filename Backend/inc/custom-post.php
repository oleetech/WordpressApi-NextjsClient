<?php
// https://chat.openai.com/share/a4833dd5-d637-46b8-9409-16310d13587c
function register_Projects_post_type() {
    $labels = array(
        'name'               => 'Projects Items',
        'singular_name'      => 'Projects Item',
        'menu_name'          => 'Projects',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Projects Item',
        'edit_item'          => 'Edit Projects Item',
        'new_item'           => 'New Projects Item',
        'view_item'          => 'View Projects Item',
        'search_items'       => 'Search Projects Items',
        'not_found'          => 'No Projects Items found',
        'not_found_in_trash' => 'No Projects Items found in Trash',
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'has_archive'         => false,
        'menu_icon'           => 'dashicons-images-alt',
        'supports'           => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'author', 'excerpt', 'comments', 'revisions', 'page-attributes' ),
        'show_in_rest' => true, // This enables REST API support
    );

    register_post_type('projects', $args);
}
add_action('init', 'register_Projects_post_type');



function my_flush_rewrite_rules() {
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'my_flush_rewrite_rules');


function custom_portfolio_post_type() {
    $args = array(
        'labels' => array(
            'name' => __('Portfolio'),
            'singular_name' => __('Portfolio Item'),
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields', 'author', 'excerpt', 'comments', 'revisions', 'page-attributes'),
        'show_in_rest' => true, // This enables REST API support
        'rest_base' => 'portfolio', // Custom REST API endpoint
    );
    register_post_type('portfolio', $args);
}
add_action('init', 'custom_portfolio_post_type');
function custom_portfolio_taxonomy() {
    $args = array(
        'labels' => array(
            'name' => __('Portfolio Categories'),
            'singular_name' => __('Portfolio Category'),
        ),
        'public' => true,
        'hierarchical' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => false,
        'show_in_rest' => true, // Enable REST API support
        'rest_base' => 'portfolio_categories', // Customize the REST API base
    );
    register_taxonomy('portfolio_category', 'portfolio', $args);
}
add_action('init', 'custom_portfolio_taxonomy');








// Add custom post type for Social Media Icons
function create_social_media_post_type() {
    $labels = array(
        'name'               => 'Social Media Icons',
        'singular_name'      => 'Social Media Icon',
        'menu_name'          => 'Social Media Icons',
        'name_admin_bar'     => 'Social Media Icon',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Social Media Icon',
        'new_item'           => 'New Social Media Icon',
        'edit_item'          => 'Edit Social Media Icon',
        'view_item'          => 'View Social Media Icon',
        'all_items'          => 'All Social Media Icons',
        'search_items'       => 'Search Social Media Icons',
        'parent_item_colon'  => 'Parent Social Media Icons:',
        'not_found'          => 'No social media icons found.',
        'not_found_in_trash' => 'No social media icons found in Trash.'
    );

    $args = array(
        'labels'             => $labels,
        'description'        => 'Manage Social Media Icons and URLs',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'social-media' ),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'supports'           => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'author', 'excerpt', 'comments', 'revisions', 'page-attributes' ),
        'show_in_rest'       => true, // Enable REST API support
        'rest_base'          => 'social-media-icons', // Custom REST API endpoint
    );

    register_post_type( 'social_media', $args );
}
add_action( 'init', 'create_social_media_post_type' );


function custom_gallery_post_type() {
    $args = array(
        'labels' => array(
            'name' => __('Galleries'),
            'singular_name' => __('Gallery'),
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields', 'author', 'excerpt', 'comments', 'revisions', 'page-attributes'),
        'show_in_rest' => true, // This enables REST API support
        'rest_base' => 'gallery', // Custom REST API endpoint
    );
    register_post_type('gallery', $args);
}
add_action('init', 'custom_gallery_post_type');

function custom_gallery_taxonomies() {
    // Register custom taxonomy for categories
    $category_args = array(
        'labels' => array(
            'name' => __('Gallery Categories'),
            'singular_name' => __('Gallery Category'),
        ),
        'public' => true,
        'hierarchical' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => false,
        'show_in_rest' => true, // Enable REST API support
        'rest_base' => 'gallery_categories', // Customize the REST API base
    );
    register_taxonomy('gallery_category', 'gallery', $category_args);

    // Register custom taxonomy for tags
    $tag_args = array(
        'labels' => array(
            'name' => __('Gallery Tags'),
            'singular_name' => __('Gallery Tag'),
        ),
        'public' => true,
        'hierarchical' => false,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
        'show_in_rest' => true, // Enable REST API support
        'rest_base' => 'gallery_tags', // Customize the REST API base
    );
    register_taxonomy('gallery_tag', 'gallery', $tag_args);
}
add_action('init', 'custom_gallery_taxonomies');







// Add custom post type for Team
function create_team_post_type() {
    $labels = array(
        'name'               => 'Team',
        'singular_name'      => 'Team Member',
        'menu_name'          => 'Team',
        'name_admin_bar'     => 'Team Member',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Team Member',
        'new_item'           => 'New Team Member',
        'edit_item'          => 'Edit Team Member',
        'view_item'          => 'View Team Member',
        'all_items'          => 'All Team Members',
        'search_items'       => 'Search Team Members',
        'parent_item_colon'  => 'Parent Team Members:',
        'not_found'          => 'No team members found.',
        'not_found_in_trash' => 'No team members found in Trash.'
    );

    $args = array(
        'labels'             => $labels,
        'description'        => 'Manage Team Members',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'team' ),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'supports'           => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'author', 'excerpt', 'comments', 'revisions', 'page-attributes' ),
        'show_in_rest'       => true, // Enable REST API support
        'rest_base'          => 'team-members', // Custom REST API endpoint
        'taxonomies'         => array( 'category', 'post_tag' ), // Add support for categories and tags

    );

    register_post_type( 'team', $args );
}
add_action( 'init', 'create_team_post_type' );

// Add custom post type for About
function create_about_post_type() {
    $labels = array(
        'name'               => 'About',
        'singular_name'      => 'About',
        'menu_name'          => 'About',
        'name_admin_bar'     => 'About',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New About',
        'new_item'           => 'New About',
        'edit_item'          => 'Edit About',
        'view_item'          => 'View About',
        'all_items'          => 'All About',
        'search_items'       => 'Search About',
        'parent_item_colon'  => 'Parent About:',
        'not_found'          => 'No about found.',
        'not_found_in_trash' => 'No about found in Trash.'
    );

    $args = array(
        'labels'             => $labels,
        'description'        => 'Manage About Pages',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'about' ),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'supports'           => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'author', 'excerpt', 'comments', 'revisions', 'page-attributes' ),
        'show_in_rest'       => true, // Enable REST API support
        'rest_base'          => 'about', // Custom REST API endpoint
    );

    register_post_type( 'about', $args );
}
add_action( 'init', 'create_about_post_type' );


function create_software_post_type() {
    register_post_type('software',
        array(
            'labels' => array(
                'name' => __('Software'),
                'singular_name' => __('Software')
            ),
            'public' => true,
            'has_archive' => true,
            'supports'           => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'author', 'excerpt', 'comments', 'revisions', 'page-attributes' ),
            'rewrite' => array('slug' => 'software'),
            'show_in_rest' => true  // This enables the Gutenberg editor and REST API support
        )
    );
}

add_action('init', 'create_software_post_type');

function create_slider_post_type() {
    register_post_type('slider',
        array(
            'labels' => array(
                'name' => __('Sliders'),
                'singular_name' => __('Slider')
            ),
            'public' => true,
            'has_archive' => false,
            'supports'           => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'author', 'excerpt', 'comments', 'revisions', 'page-attributes' ),
            'rewrite' => array('slug' => 'sliders'),
            'show_in_rest' => true  // Enable Gutenberg editor and REST API support
        )
    );
}

add_action('init', 'create_slider_post_type');