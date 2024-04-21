<?php
//  Add custom options page to the admin menu

function my_custom_options_page() {
    add_menu_page(
        'Custom Settings', // Page title
        'Custom Settings', // Menu title
        'manage_options', // Capability required to access
        'custom-settings', // Menu slug
        'my_custom_options_page_content', // Callback function to render page content
        'dashicons-admin-generic' // Icon
    );
}
add_action('admin_menu', 'my_custom_options_page');

// Register settings and fields
function my_custom_settings_init() {
    // Register a settings group
    register_setting('my_custom_options_group', 'my_custom_options');

    // Add a section to the settings page for General Settings
    add_settings_section(
        'my_custom_general_section', // Section ID
        'General Settings', // Section title
        'my_custom_general_section_callback', // Callback function to render section content
        'custom-settings' // Page slug
    );

    // Add fields to the General Settings section
    add_settings_field(
        'footer_text_field', // Field ID
        'Footer Text', // Field title
        'footer_text_field_callback', // Callback function to render field content
        'custom-settings', // Page slug
        'my_custom_general_section' // Section ID
    );

    add_settings_field(
        'about_text_field', // Field ID
        'About Text', // Field title
        'about_text_field_callback', // Callback function to render field content
        'custom-settings', // Page slug
        'my_custom_general_section' // Section ID
    );

    add_settings_field(
        'address_field', // Field ID
        'Address', // Field title
        'address_field_callback', // Callback function to render field content
        'custom-settings', // Page slug
        'my_custom_general_section' // Section ID
    );
}
add_action('admin_init', 'my_custom_settings_init');

// Render options page content
function my_custom_options_page_content() {
    ?>
    <div class="wrap">
        <h2>Custom Settings</h2>
        <form method="post" action="options.php">
            <?php settings_fields('my_custom_options_group'); ?>
            <?php do_settings_sections('custom-settings'); ?>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

// Render General Settings section content
function my_custom_general_section_callback() {
    echo '<p>Customize your general settings below:</p>';
}

// Render footer text field
function footer_text_field_callback() {
    $options = get_option('my_custom_options');
    $footer_text = isset($options['footer_text']) ? $options['footer_text'] : '';
    echo '<input type="text" name="my_custom_options[footer_text]" value="' . esc_attr($footer_text) . '" />';
}

// Render about text field
function about_text_field_callback() {
    $options = get_option('my_custom_options');
    $about_text = isset($options['about_text']) ? $options['about_text'] : '';
    echo '<textarea name="my_custom_options[about_text]" rows="5" cols="50">' . esc_textarea($about_text) . '</textarea>';
}

// Render address field
function address_field_callback() {
    $options = get_option('my_custom_options');
    $address = isset($options['address']) ? $options['address'] : '';
    echo '<input type="text" name="my_custom_options[address]" value="' . esc_attr($address) . '" />';
}

// Register REST API endpoint for custom settings
function my_custom_rest_api_endpoint() {
    register_rest_route('custom-settings/v1', '/options', array(
        'methods' => 'GET',
        'callback' => 'my_custom_get_options',
        'permission_callback' => function () {
            return current_user_can('manage_options');
        }
    ));
}
add_action('rest_api_init', 'my_custom_rest_api_endpoint');

// Callback function to get custom options via REST API
function my_custom_get_options() {
    return get_option('my_custom_options');
}
