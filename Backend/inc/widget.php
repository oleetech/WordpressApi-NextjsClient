<?php


 function theme_register_widgets() {
    register_sidebar(
        array(
            'name'          => 'Primary Sidebar',
            'id'            => 'primary-sidebar',
            'description'   => 'Widgets added here will appear in the primary sidebar.',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
}
add_action('widgets_init', 'theme_register_widgets');


