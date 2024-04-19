import React, { useEffect, useState } from 'react';
import axios from 'axios';
import Link from 'next/link';

const PageList = () => {
    const [pages, setPages] = useState([]);
    const [isLoading, setIsLoading] = useState(true);
    const [error, setError] = useState(null);
    const baseUrl = process.env.NEXT_PUBLIC_API_BASE_URL; // Ensure this is defined in your .env file

    useEffect(() => {
        axios.get(`${baseUrl}/wp-json/wp/v2/pages`)
            .then(response => {
                setPages(response.data);
                setIsLoading(false);
            })
            .catch(error => {
                console.error('Failed to fetch pages:', error);
                setError('Failed to load pages.');
                setIsLoading(false);
            });
    }, [baseUrl]);

    if (isLoading) return <p>Loading...</p>;
    if (error) return <p>Error: {error}</p>;

    return (
        <div>
            <h1>Pages</h1>
            <ul>
                {pages.map(page => (
                    <li key={page.id}>
                        <Link href={`/pages/${page.id}`}>
                            <i>{page.title.rendered}</i>
                        </Link>
                    </li>
                ))}
            </ul>
        </div>
    );
};

export default PageList;

