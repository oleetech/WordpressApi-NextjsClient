import React, { useEffect, useState } from 'react';
import axios from 'axios';

const Tags = () => {
    const [tags, setTags] = useState([]);
    const [isLoading, setIsLoading] = useState(true);
    const [error, setError] = useState(null);
    const baseUrl = process.env.NEXT_PUBLIC_API_BASE_URL; // This should be defined in your .env file

    useEffect(() => {
        axios.get(`${baseUrl}/wp-json/wp/v2/tags`)
            .then(response => {
                setTags(response.data);
                setIsLoading(false);
            })
            .catch(error => {
                console.error('Failed to fetch tags:', error);
                setError('Failed to load tags.');
                setIsLoading(false);
            });
    }, [baseUrl]); // Re-fetch if baseUrl changes

    if (isLoading) return <p>Loading...</p>;
    if (error) return <p>Error: {error}</p>;

    return (
        <div>
            <h1>Tags</h1>
            <ul>
                {tags.map(tag => (
                    <li key={tag.id}>
                        {tag.name} ({tag.count} posts)
                    </li>
                ))}
            </ul>
        </div>
    );
};

export default Tags;
