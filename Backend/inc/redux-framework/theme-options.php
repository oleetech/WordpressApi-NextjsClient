<?php
if ( !class_exists( 'Redux' ) ) {
    return;
}

// Set the opt_name argument to a unique identifier for your theme options.
$opt_name = "olee";

$theme_options = array(
    'opt_name' => $opt_name,
    'dev_mode' => false,
    'use_cdn' => true,
    'display_name' => 'Theme Options',
    'display_version' => '1.0.0',
    // Add more settings fields as needed
);

Redux::setArgs( $opt_name, $theme_options );

Redux::setSection( $opt_name, array(
    'title'  => __('Basic Settings', 'your-textdomain'),
    'id'     => 'basic',
    'desc'   => __('Basic settings for our theme.', 'your-textdomain'),
    'icon'   => 'el el-home',
    'fields' => array(
        array(
            'id'        => 'text-logo-url',
            'type'      => 'text',
            'title'     => __('Site Logo URL', 'your-textdomain'),
            'desc'      => __('Enter the URL of your site logo.', 'your-textdomain'),
            'default'   => 'Default Text'
        ),
        array(
            'id'        => 'media-logo',
            'type'      => 'media',
            'title'     => __('Upload Logo', 'your-textdomain'),
            'desc'      => __('Upload or select a media item to be used as the site logo.', 'your-textdomain'),
            'subtitle'  => __('Upload using the native media uploader, or define the URL directly', 'your-textdomain'),
            'url'       => true,
            'default'   => array(
                'url' => 'path_to_your_default_logo_if_any'
            )
        ),
        array(
            'id'        => 'opt-color-primary',
            'type'      => 'color',
            'title'     => __('Primary Color', 'your-textdomain'),
            'subtitle'  => __('Pick a primary color for the theme (default: #3173c7).', 'your-textdomain'),
            'default'   => '#3173c7',
            'transparent' => false,
        ),
        array(
            'id'        => 'site-description',
            'type'      => 'textarea',
            'title'     => __('Site Description', 'your-textdomain'),
            'subtitle'  => __('Enter a brief description of your site.', 'your-textdomain'),
            'desc'      => __('This will be used in the meta description tag.', 'your-textdomain'),
            'default'   => 'This is a description for your site.'
        ),
        array(
            'id'        => 'background-body',
            'type'      => 'background',
            'title'     => __('Body Background', 'your-textdomain'),
            'subtitle'  => __('Pick a background color or image for the body.', 'your-textdomain'),
            'default'   => array(
                'background-color' => '#FFFFFF',
                'background-image' => 'path_to_your_default_background_image_if_any',
                'background-position' => 'center center',
                'background-size' => 'cover',
                'background-repeat' => 'no-repeat'
            )
        ),
        // Add more fields as needed
    )
));

// Adding Slides Options Section
Redux::setSection( $opt_name, array(
    'title'  => __('Slides Options', 'your-textdomain'),
    'id'     => 'slides_options',
    'desc'   => __('Manage slides for your theme.', 'your-textdomain'),
    'icon'   => 'el el-picture',
    'fields' => array(
        array(
            'id'          => 'opt-slides',
            'type'        => 'slides',
            'title'       => esc_html__('Slides Options', 'your-textdomain'),
            'subtitle'    => esc_html__('Unlimited slides with drag and drop sortings.', 'your-textdomain'),
            'desc'        => esc_html__('This field will store all slides values into a multidimensional array to use into a foreach loop.', 'your-textdomain'),
            'placeholder' => array(
                'title'       => esc_html__('This is a title', 'your-textdomain'),
                'description' => esc_html__('Description Here', 'your-textdomain'),
                'url'         => esc_html__('Give us a link!', 'your-textdomain'),
            )
        )
    )
));

Redux::setSection($opt_name, array(
    'title'  => __('Social Media Icons', 'your-textdomain'),
    'id'     => 'social_media_icons',
    'desc'   => __('Upload custom social media icons and add their links.', 'your-textdomain'),
    'icon'   => 'el el-globe',
    'fields' => array(
        array(
            'id'          => 'social_icons',
            'type'        => 'repeater',
            'title'       => __('Social Icons', 'your-textdomain'),
            'bind_title'  => 'title', // Bind title to display field
            'fields'      => array(
                array(
                    'id'        => 'title',
                    'type'      => 'text',
                    'title'     => __('Social Network Name', 'your-textdomain'),
                    'default'   => 'Facebook'
                ),
                array(
                    'id'        => 'icon_image',
                    'type'      => 'media',
                    'title'     => __('Social Icon', 'your-textdomain'),
                    'subtitle'  => __('Upload a custom icon.', 'your-textdomain'),
                    'desc'      => __('Recommended size: 32x32 pixels.', 'your-textdomain'),
                    'default'   => array('url' => 'path_to_default_icon_if_any'),
                    'url'       => true
                ),
                array(
                    'id'        => 'link',
                    'type'      => 'text',
                    'title'     => __('Social Link', 'your-textdomain'),
                    'default'   => 'http://'
                ),
            )
        ),
    )
));
// Fetch the Redux options
// $redux_options = get_option('your_theme_options');
// $social_icons = isset($redux_options['social_icons']) ? $redux_options['social_icons'] : [];

// // HTML for displaying custom social icons
// echo '<ul class="custom-social-icons">';
// foreach ($social_icons as $icon) {
//     if (!empty($icon['icon_image']['url']) && !empty($icon['link'])) {
//         echo '<li><a href="' . esc_url($icon['link']) . '" target="_blank" rel="noopener noreferrer">';
//         echo '<img src="' . esc_url($icon['icon_image']['url']) . '" alt="' . esc_attr($icon['title']) . '" style="width: 32px; height: 32px;">';
//         echo '</a></li>';
//     }
// }
// echo '</ul>';
