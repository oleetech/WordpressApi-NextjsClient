import React, { useEffect, useState } from 'react';
import axios from 'axios';

const SoftwareList = () => {
    const [softwares, setSoftwares] = useState([]);
    const [isLoading, setIsLoading] = useState(true);
    const [error, setError] = useState(null);
    const baseUrl = process.env.NEXT_PUBLIC_API_BASE_URL; // Make sure this is set in your .env file

    // Function to get the URL of the featured image
    const fetchImage = async (mediaId) => {
        if (!mediaId) return '/path/to/default/image.png'; // Provide a default image path
        try {
            const result = await axios.get(`${baseUrl}/wp-json/wp/v2/media/${mediaId}`);
            return result.data.source_url;
        } catch (error) {
            console.error('Error fetching image:', error);
            return '/path/to/default/image.png'; // Fallback image path
        }
    };

    useEffect(() => {
        const fetchSoftware = async () => {
            try {
                const response = await axios.get(`${baseUrl}/wp-json/wp/v2/software`);
                const softwareData = await Promise.all(response.data.map(async software => {
                    const imageUrl = await fetchImage(software.featured_media);
                    return {
                        ...software,
                        imageUrl
                    };
                }));
                setSoftwares(softwareData);
                setIsLoading(false);
            } catch (error) {
                console.error('Failed to fetch software:', error);
                setError('Failed to load software.');
                setIsLoading(false);
            }
        };

        fetchSoftware();
    }, [baseUrl]);

    if (isLoading) return <p>Loading...</p>;
    if (error) return <p>Error: {error}</p>;

    return (
        <div>
            <h1>Software List</h1>
            {softwares.map(software => (
                <div key={software.id}>
                    <h2>{software.title.rendered}</h2>
                    <p dangerouslySetInnerHTML={{ __html: software.content.rendered }}></p>
                    {software.imageUrl && (
                        <img src={software.imageUrl} alt={software.title.rendered} style={{ width: '100%', height: 'auto' }} />
                    )}
                </div>
            ))}
        </div>
    );
};

export default SoftwareList;
