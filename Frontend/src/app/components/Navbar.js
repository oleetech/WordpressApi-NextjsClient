"use client";
import React, { useEffect, useState } from 'react';
import Link from 'next/link';
import axios from 'axios';

const Navbar = () => {
    const [menuItems, setMenuItems] = useState([]);

    useEffect(() => {
        axios.get(`${process.env.NEXT_PUBLIC_API_BASE_URL}/wp-json/wp/v2/menus/primary`)
            .then(response => {
                const formattedMenu = formatMenu(response.data);
                setMenuItems(formattedMenu);
            })
            .catch(error => console.error('Error fetching menu:', error));
    }, []);

    const formatMenu = (items) => {
        const rootItems = items.filter(item => !item.menu_item_parent || item.menu_item_parent === "0");
        const findChildren = (parent) => items.filter(item => item.menu_item_parent === parent.ID.toString())
                                              .map(child => ({ ...child, name: child.title, path: child.url, subsections: findChildren(child) }));
        return rootItems.map(rootItem => ({ name: rootItem.title, path: rootItem.url, subsections: findChildren(rootItem) }));
    };

    return (
        <nav className="bg-gray-800 text-white p-3">
            <ul className="flex space-x-4">
                {menuItems.map((item, index) => (
                    <li key={index} className="hover:bg-gray-700 p-2 rounded">
                        <Link href={item.path}><i>{item.name}</i></Link>
                        {item.subsections && (
                            <ul className="absolute bg-gray-700 mt-2 rounded shadow-lg">
                                {item.subsections.map((sub, idx) => (
                                    <li key={idx} className="p-2 hover:bg-gray-600">
                                        <Link href={sub.path}><i>{sub.name}</i></Link>
                                    </li>
                                ))}
                            </ul>
                        )}
                    </li>
                ))}
            </ul>
        </nav>
    );
};

export default Navbar;
