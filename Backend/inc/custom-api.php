<?php


// Callback function to retrieve post by slug
function get_post_by_slug_callback( $request ) {
    $slug = $request['slug'];

    // Query the post by slug
    $post = get_page_by_path( $slug, OBJECT, 'post' );

    if ( ! $post ) {
        return new WP_Error( 'post_not_found', 'Post not found', array( 'status' => 404 ) );
    }

    // Get post data
    $post_data = array(
        'id'            => $post->ID,
        'title'         => get_the_title( $post->ID ),
        'content'       => apply_filters( 'the_content', $post->post_content ),
        // Add more fields as needed
    );

    // Return post data
    return rest_ensure_response( $post_data );
}

// Register custom REST API endpoint
function register_post_by_slug_endpoint() {
    register_rest_route( 'custom/v1', '/post-by-slug/(?P<slug>[a-zA-Z0-9-]+)', array(
        'methods'             => 'GET',
        'callback'            => 'get_post_by_slug_callback',
        'permission_callback' => '__return_true', // Adjust permissions as needed
    ) );
}

add_action( 'rest_api_init', 'register_post_by_slug_endpoint' );