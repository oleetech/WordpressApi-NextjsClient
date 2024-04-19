import React, { useEffect, useState } from 'react';
import axios from 'axios';

const Categories = () => {
    const [categories, setCategories] = useState([]);
    const [isLoading, setIsLoading] = useState(true);
    const [error, setError] = useState(null);
    const baseUrl = process.env.NEXT_PUBLIC_API_BASE_URL; // This should be defined in your .env file

    useEffect(() => {
        axios.get(`${baseUrl}/wp-json/wp/v2/categories`)
            .then(response => {
                setCategories(response.data);
                setIsLoading(false);
            })
            .catch(error => {
                console.error('Failed to fetch categories:', error);
                setError('Failed to load categories.');
                setIsLoading(false);
            });
    }, [baseUrl]); // Dependency array includes baseUrl to re-run effect if baseUrl changes

    if (isLoading) return <p>Loading...</p>;
    if (error) return <p>Error: {error}</p>;

    return (
        <div>
            <h1>Categories</h1>
            <ul>
                {categories.map(category => (
                    <li key={category.id}>
                        {category.name} - {category.count} posts
                    </li>
                ))}
            </ul>
        </div>
    );
};

export default Categories;
