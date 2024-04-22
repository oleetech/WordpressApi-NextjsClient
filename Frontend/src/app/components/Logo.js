import React, { useEffect, useState } from 'react';
import axios from 'axios';

const Logo = () => {
    const [logoUrl, setLogoUrl] = useState('');
    const [isLoading, setIsLoading] = useState(true);
    const [error, setError] = useState(null);
    const baseUrl = process.env.NEXT_PUBLIC_API_BASE_URL; // Ensure this is set in your .env file

    useEffect(() => {
        axios.get(`${baseUrl}/wp-json/wp/v2/settings`)
            .then(response => {
                // Assuming the response has a property `logo` that contains the logo URL
                setLogoUrl(response.data.logo);
                setIsLoading(false);
            })
            .catch(error => {
                console.error('Failed to fetch logo:', error);
                setError('Failed to load logo.');
                setIsLoading(false);
            });
    }, [baseUrl]);

    if (isLoading) return <p>Loading...</p>;
    if (error) return <p>Error: {error}</p>;
    if (!logoUrl) return <p>No logo found.</p>;

    return (
        <div>
            <a href='/'>
            <img src={logoUrl} alt="Site Logo" style={{ width: '100px', height: '50px' }} />
            </a>
        </div>
    );
};

export default Logo;

