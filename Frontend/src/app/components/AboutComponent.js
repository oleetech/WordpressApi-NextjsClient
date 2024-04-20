import React, { useEffect, useState } from 'react';
import axios from 'axios';

const AboutComponent = () => {
    const [aboutData, setAboutData] = useState(null);
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
        const fetchAbout = async () => {
            try {
                const response = await axios.get(`${baseUrl}/wp-json/wp/v2/about`); // Fetch data from the "about" post type
                const data = response.data[0]; // Assuming there is at least one "about" post
                if (data.featured_media) {
                    const imageUrl = await fetchImage(data.featured_media);
                    data.imageUrl = imageUrl; // Add image URL to the data object
                }
                setAboutData(data);
                setIsLoading(false);
            } catch (error) {
                console.error('Failed to fetch about data:', error);
                setError('Failed to load about data.');
                setIsLoading(false);
            }
        };

        fetchAbout();
    }, [baseUrl]);

    if (isLoading) return <p>Loading...</p>;
    if (error) return <p>Error: {error}</p>;
    if (!aboutData) return <p>No about data found.</p>;

    return (
        <div>
            <h1>{aboutData.title.rendered}</h1>
            {aboutData.imageUrl && (
                <img src={aboutData.imageUrl} alt="About Us" style={{ width: '100%', height: 'auto' }} />
            )}
            <div dangerouslySetInnerHTML={{ __html: aboutData.content.rendered }} />
        </div>
    );
};

export default AboutComponent;
