<?php










include get_template_directory() . '/inc/theme-setup.php';
include get_template_directory() . '/inc/enque.php';
include get_template_directory() . '/inc/custom-post.php';
include get_template_directory() . '/inc/custom-settings.php';
include get_template_directory() . '/inc/menu.php';
include get_template_directory() . '/inc/widget.php';

if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/redux-framework/redux-core/framework.php' ) ) {
    require_once( dirname( __FILE__ ) . '/redux-framework/redux-core/framework.php' );
}
include get_template_directory() . '/inc/theme-options.php';
