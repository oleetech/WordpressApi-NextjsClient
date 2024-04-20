
import React, { useEffect, useState } from 'react';
import axios from 'axios';

const SlidersLoop = () => {
    const [sliders, setSliders] = useState([]);
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
        const fetchSliders = async () => {
            try {
                const response = await axios.get(`${baseUrl}/wp-json/wp/v2/slider`); // Adjusted for 'slider' post type
                const sliderData = await Promise.all(response.data.map(async slider => {
                    const imageUrl = await fetchImage(slider.featured_media);
                    return {
                        ...slider,
                        imageUrl
                    };
                }));
                setSliders(sliderData);
                setIsLoading(false);
                console.log(sliders);
            } catch (error) {
                console.error('Failed to fetch sliders:', error);
                setError('Failed to load sliders.');
                setIsLoading(false);
            }
        };

        fetchSliders();
    }, [baseUrl]);

    if (isLoading) return <p>Loading...</p>;
    if (error) return <p>Error: {error}</p>;

    return (
        <div>
            <h1>Slider Entries</h1>
            {sliders.map(slider => (
                <div key={slider.id}>
                    <h2>{slider.title.rendered}</h2>
                    {slider.imageUrl && (
                        <>
                            <img src={slider.imageUrl} alt={slider.title.rendered} style={{ width: '100%', height: 'auto' }} />
                            <ul>
                                <li>Image URL: <a href={slider.imageUrl} target="_blank" rel="noopener noreferrer">{slider.imageUrl}</a></li>
                            </ul>
                        </>
                    )}
                    {/* <div dangerouslySetInnerHTML={{ __html: slider.excerpt.rendered }} /> */}
                </div>
            ))}
        </div>
    );
};

export default SlidersLoop;
