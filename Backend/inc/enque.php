<?php

function mytheme_enqueue_styles() {
    // wp_enqueue_style( 'tailwind', get_template_directory_uri() . '/styles.css' );
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/src/bootstrap.min.css' );
    wp_enqueue_style( 'navbaranimated', get_template_directory_uri() . '/src/navbaranimated.css' );
    wp_enqueue_script('navbaranimated-js', get_template_directory_uri() . '/js/navbaranimated.js',array('jquery'), null, true);
    wp_enqueue_script('custom-js', get_template_directory_uri() . '/js/custom.js',array('jquery'), null, true);

    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css' );
    wp_enqueue_style( 'navbar1', get_template_directory_uri() . '/css/navbar1.css' );


    wp_enqueue_style( 'my_theme_style', get_stylesheet_uri() );


    
}

add_action('wp_enqueue_scripts', 'mytheme_enqueue_styles');


function enqueue_slick_slider() {
    // Slick CSS
    wp_enqueue_style('slick-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');

    // Slick Theme CSS
    wp_enqueue_style('slick-theme-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css');

    // jQuery (Slick Slider requires jQuery)
    wp_enqueue_script('jquery');

    // Slick JS
    wp_enqueue_script('slick-js', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), null, true);


    // Your custom script to initialize the slider
    wp_enqueue_script('slick-init', get_template_directory_uri() . '/js/slick-init.js', array('slick-js'), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_slick_slider');


function enqueue_owlcarousel_slider() {
    // owlcarousel CSS
    wp_enqueue_style('owlcarousel-css',  get_template_directory_uri() . '/lib/owlcarousel/assets/owl.carousel.min.css' );


    // // jQuery (Slick Slider requires jQuery)
    // wp_enqueue_script('jquery');

    // owlcarousel  JS
    wp_enqueue_script('owlcarousel-js', get_template_directory_uri() .'/lib/owlcarousel/owl.carousel.min.js', array('jquery'), null, true);


    // Your custom script to initialize the slider
    wp_enqueue_script('owl', get_template_directory_uri() . '/lib/slick-init.js', array('owl-js'), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_owlcarousel_slider');