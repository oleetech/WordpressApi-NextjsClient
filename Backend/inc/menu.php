
<?php
class WP_Custom_Navwalker extends Walker_Nav_Menu {
    // Start Element
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $class_names = $value = '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $id = apply_filters('nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';

        // Adding additional classes to the anchor tag
        $anchor_classes = 'class="px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:w-auto md:inline md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"';
        
        // Check if the item has children
        $has_children = !empty($args->has_children) ? 'has-submenu' : '';

        $output .= $indent . '<div' . $id . $value . $class_names . $has_children .'>';
        $output .= $indent . '<button' . $anchor_classes .'>';
        $output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $output .= $item->description; // Add the description after the link title
        $output .= '<svg fill="currentColor" viewBox="0 0 20 20" id="dropdownArrow" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>';
        $output .= '</button>';

        // If the item has children, add dropdown menu
        if ($has_children) {
            $output .= '<div id="dropdownMenu" style="display: none;" class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48">';
            $output .= '<div class="px-2 py-2 bg-white rounded-md shadow dark-mode:bg-gray-800">';
        }
    }

    // End Element
    public function end_el(&$output, $item, $depth = 0, $args = null) {
        // Check if the item has children
        $has_children = !empty($args->has_children) ? 'has-submenu' : '';

        // If the item has children, close dropdown menu and container div
        if ($has_children) {
            $output .= '</div>'; // Closing dropdown content div
            $output .= '</div>'; // Closing dropdownMenu div
        }

        $output .= "</div>\n"; // Closing container div
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

