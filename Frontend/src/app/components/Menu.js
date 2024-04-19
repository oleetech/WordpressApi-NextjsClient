"use client";
import React, { useEffect, useState } from 'react';
import axios from 'axios';

function Menu() {
    const [menuItems, setMenuItems] = useState([]);

    useEffect(() => {
        axios.get('https://blog.jrrecyclingsolutionsltd.com.bd/wp-json/wp/v2/menus/primary')
            .then(response => {
                const formattedMenu = formatMenu(response.data);
                setMenuItems(formattedMenu);
            })
            .catch(error => {
                console.error('Error fetching menu:', error);
            });
    }, []);

    // Function to transform the fetched menu data into the desired structure
    const formatMenu = (items) => {
        const rootItems = items.filter(item => !item.menu_item_parent || item.menu_item_parent === "0");
        const findChildren = (parent) => {
            return items
                .filter(item => item.menu_item_parent === parent.ID.toString())
                .map(child => ({
                    ...child,
                    name: child.title,
                    path: child.url,
                    subsections: findChildren(child)
                }));
        };

        return rootItems.map(rootItem => ({
            name: rootItem.title,
            path: rootItem.url,
            subsections: findChildren(rootItem)
        }));
    };

    return (
        <div>
            {menuItems.map((item, index) => (
                <div key={index}>
                    <h3>{item.name}</h3>
                    <ul>
                        {item.subsections && item.subsections.map((sub, idx) => (
                            <li key={idx}>{sub.name}</li>
                        ))}
                    </ul>
                </div>
            ))}
        </div>
    );
}

export default Menu;
