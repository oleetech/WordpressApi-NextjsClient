<?php
class My_Custom_Nav_Walker extends Walker_Nav_Menu {
    // Starts the list before the elements are added.
    function start_lvl( &$output, $depth = 0, $args = null ) {
        $indent = str_repeat("\t", $depth);
        if ($depth === 0) {
            $output .= "\n$indent<div class=\"hori-selector\"><div class=\"left\"></div><div class=\"right\"></div></div>\n";
        }
        $output .= "\n$indent<ul class=\"sub-menu\">\n";
    }

    // Ends the list of after the elements are added.
    function end_lvl( &$output, $depth = 0, $args = null ) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }

    // Start the element output.
    function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $indent = ( $depth ) ? str_repeat("\t", $depth) : '';
        $class_names = join(' ', $item->classes);
        $class_names = $class_names ? ' class="nav-item ' . esc_attr($class_names) . '"' : ' class="nav-item"';

        $output .= $indent . '<li' . $class_names . '>';

        $atts = array();
        $atts['title']  = ! empty($item->attr_title) ? $item->attr_title : '';
        $atts['target'] = ! empty($item->target)     ? $item->target     : '';
        $atts['rel']    = ! empty($item->xfn)        ? $item->xfn        : '';
        $atts['href']   = ! empty($item->url)        ? $item->url        : '';

        $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args, $depth);

        $attributes = '';
        foreach($atts as $attr => $value) {
            if(! empty($value)) {
                $value = esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $item_output = $args->before;
        $item_output .= '<a class="nav-link"' . $attributes . '>';
        $item_output .= $args->link_before . '<i class="' . esc_attr($item->description) . '"></i>' . $item->title . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    // End the element output.
    function end_el( &$output, $item, $depth = 0, $args = null ) {
        $output .= "</li>\n";
    }
}


// Theme support
function my_theme_setup() {
    // Register custom navigation menu
    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'my-theme'),
    ));
}
add_action('after_setup_theme', 'my_theme_setup');

function my_theme_menu() {
    wp_nav_menu(array(
        'theme_location' => 'primary', // or your specific theme location
        'menu_class'     => 'navbar-nav ml-auto px-4',
        'container'      => false, // no container wrapping the ul
        'walker'         => new My_Custom_Nav_Walker()
    ));
}


function register_menu_routes() {
    register_rest_route('wp/v2', '/menus/(?P<menu_name>[a-zA-Z0-9-]+)', array(
        'methods' => 'GET',
        'callback' => 'get_menu_items_by_name',
        'permission_callback' => '__return_true',  // This allows public access
        'args' => array(
            'menu_name' => array(
                'validate_callback' => function($param, $request, $key) {
                    return is_string($param);
                }
            ),
        ),
    ));
}

function get_menu_items_by_name($request) {
    $menu_name = $request['menu_name'];
    $menu = wp_get_nav_menu_object($menu_name);
    if (!$menu) {
        return new WP_Error('not_found', 'Menu not found', array('status' => 404));
    }

    $menu_items = wp_get_nav_menu_items($menu->term_id);
    return $menu_items ? $menu_items : new WP_Error('no_items', 'No items in this menu', array('status' => 404));
}

add_action('rest_api_init', 'register_menu_routes');


// import React, { useEffect, useState } from 'react';
// import axios from 'axios';

// function Menu() {
//     const [menuItems, setMenuItems] = useState([]);

//     useEffect(() => {
//         axios.get('https://yourdomain.com/wp-json/wp/v2/menus/primary')
//             .then(response => {
//                 const formattedMenu = formatMenu(response.data);
//                 setMenuItems(formattedMenu);
//             })
//             .catch(error => {
//                 console.error('Error fetching menu:', error);
//             });
//     }, []);

//     // Function to transform the fetched menu data into the desired structure
//     const formatMenu = (items) => {
//         const rootItems = items.filter(item => !item.menu_item_parent || item.menu_item_parent === "0");
//         const findChildren = (parent) => {
//             return items
//                 .filter(item => item.menu_item_parent === parent.ID.toString())
//                 .map(child => ({
//                     ...child,
//                     name: child.title,
//                     path: child.url,
//                     subsections: findChildren(child)
//                 }));
//         };

//         return rootItems.map(rootItem => ({
//             name: rootItem.title,
//             path: rootItem.url,
//             subsections: findChildren(rootItem)
//         }));
//     };

//     return (
//         <div>
//             {menuItems.map((item, index) => (
//                 <div key={index}>
//                     <h3>{item.name}</h3>
//                     <ul>
//                         {item.subsections && item.subsections.map((sub, idx) => (
//                             <li key={idx}>{sub.name}</li>
//                         ))}
//                     </ul>
//                 </div>
//             ))}
//         </div>
//     );
// }

// export default Menu;

