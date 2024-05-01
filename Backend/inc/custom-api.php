<?php



// Callback function to retrieve post by slug
function get_post_by_slug_callback( $request ) {
    $slug = $request['slug'];

    // Query the post by its slug
    $post = get_page_by_path( $slug, OBJECT, 'post' );

    if ( ! $post ) {
        return new WP_Error( 'post_not_found', 'Post not found', array( 'status' => 404 ) );
    }

    // Get author data
    $author = get_userdata($post->post_author);

    // Get post data
    $post_data = array(
        'id'             => $post->ID,
        'title'          => get_the_title($post->ID),
        'content'        => apply_filters('the_content', $post->post_content),
        'date'           => get_the_date('c', $post),  // ISO 8601 format
        'author'         => array(
            'id'            => $author->ID,
            'name'          => $author->display_name,
            'url'           => get_author_posts_url($author->ID),
        ),
        'categories'     => wp_get_post_categories($post->ID, array('fields' => 'names')),
        'tags'           => wp_get_post_terms($post->ID, 'post_tag', array('fields' => 'names')),
    );

    // Check if there's a featured image associated with the post
    if (has_post_thumbnail($post->ID)) {
        $image_id = get_post_thumbnail_id($post->ID);
        $image_url = wp_get_attachment_image_url($image_id, 'full');  // Change 'full' to another size if necessary
        $post_data['featured_image'] = $image_url;
    } else {
        $post_data['featured_image'] = null;  // Or specify a default image URL
    }

    // Return post data
    return rest_ensure_response($post_data);
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
