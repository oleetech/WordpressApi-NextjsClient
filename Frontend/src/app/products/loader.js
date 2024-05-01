// app/products/loader.js
import axios from 'axios';

export async function loader() {
    const apiUrl = `${process.env.NEXT_PUBLIC_API_BASE_URL}/wp-json/wc/v3/products`;
    const params = {
        consumer_key: process.env.NEXT_PUBLIC_WOO_CONSUMER_KEY,
        consumer_secret: process.env.NEXT_PUBLIC_WOO_CONSUMER_SECRET
    };

    try {
        const response = await axios.get(apiUrl, { params });
        return {
            props: {
                products: response.data
            },
        };
    } catch (error) {
        console.error('Failed to fetch products:', error);
        return {
            props: {
                products: []
            },
        };
    }
}
