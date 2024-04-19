// pages/api/menu.js

export default async function handler(req, res) {
    try {
        const response = await fetch('https://blog.jrrecyclingsolutionsltd.com.bd/wp-json/wp-api-menus/v2/menus/primary-menu', {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
            },
        });
        if (!response.ok) {
            throw new Error('Failed to fetch menu data');
        }
        const data = await response.json();
        const primaryMenu = data.find(menu => menu.name === 'Primary');
        if (primaryMenu) {
            res.status(200).json(primaryMenu.items);
        } else {
            throw new Error('Primary menu not found');
        }
    } catch (error) {
        console.error('Error fetching menu data:', error);
        res.status(500).json({ message: 'Internal server error' });
    }
}
