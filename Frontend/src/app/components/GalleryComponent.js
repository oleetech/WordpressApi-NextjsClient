import React, { useEffect, useState } from 'react';
import axios from 'axios';

const GalleryComponent = () => {
    const [galleries, setGalleries] = useState([]);
    const [isLoading, setIsLoading] = useState(true);
    const [error, setError] = useState(null);
    const baseUrl = process.env.NEXT_PUBLIC_API_BASE_URL; // Ensure this is defined in your .env file

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
        const fetchGalleries = async () => {
            try {
                const response = await axios.get(`${baseUrl}/wp-json/wp/v2/galleries`);
                const galleryData = await Promise.all(response.data.map(async gallery => {
                    const imageUrl = await fetchImage(gallery.featured_media);
                    return {
                        ...gallery,
                        imageUrl
                    };
                }));
                setGalleries(galleryData);
                setIsLoading(false);
            } catch (error) {
                console.error('Failed to fetch galleries:', error);
                setError('Failed to load galleries.');
                setIsLoading(false);
            }
        };

        fetchGalleries();
    }, [baseUrl]);

    if (isLoading) return <p>Loading...</p>;
    if (error) return <p>Error: {error}</p>;

    return (
        <div>
            <h1>Gallery</h1>
            <div style={{ display: 'flex', flexWrap: 'wrap', justifyContent: 'center' }}>
                {galleries.map((gallery, index) => (
                    <div key={index} style={{ margin: '10px' }}>
                        <h2>{gallery.title.rendered}</h2>
                        {gallery.imageUrl && (
                            <img src={gallery.imageUrl} alt={gallery.title.rendered} style={{ width: '300px', height: 'auto' }} />
                        )}
                        <p dangerouslySetInnerHTML={{ __html: gallery.excerpt.rendered }} />
                    </div>
                ))}
            </div>
        </div>
    );
};

export default GalleryComponent;
