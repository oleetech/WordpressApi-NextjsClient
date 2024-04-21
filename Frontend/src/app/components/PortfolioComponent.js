import React, { useEffect, useState } from 'react';
import axios from 'axios';

const PortfolioComponent = () => {
    const [items, setItems] = useState([]);
    const [categories, setCategories] = useState([]);
    const [activeCategory, setActiveCategory] = useState('all');
    const [isLoading, setIsLoading] = useState(true);
    const [error, setError] = useState(null);
    const baseUrl = process.env.NEXT_PUBLIC_API_BASE_URL; // Ensure this is defined in your .env file

    // Function to get the URL of the featured image
    const fetchImage = async (mediaId) => {
        if (!mediaId) return '/path/to/default/image.png'; // Provide a default image path
        try {
            const response = await axios.get(`${baseUrl}/wp-json/wp/v2/media/${mediaId}`);
            return response.data.source_url;
        } catch (error) {
            console.error('Error fetching image:', error);
            return '/path/to/default/image.png'; // Fallback image path
        }
    };

    useEffect(() => {
        const fetchData = async () => {
            try {
                const [portfolioResponse, categoriesResponse] = await Promise.all([
                    axios.get(`${baseUrl}/wp-json/wp/v2/portfolio`),
                    axios.get(`${baseUrl}/wp-json/wp/v2/portfolio_categories`)  // Assuming 'portfolio_categories' is the rest_base
                ]);

                const portfolioWithImages = await Promise.all(portfolioResponse.data.map(async item => {
                    const imageUrl = item.featured_media ? await fetchImage(item.featured_media) : null;
                    return {...item, imageUrl};
                }));

                setItems(portfolioWithImages);
                setCategories(categoriesResponse.data);
                setIsLoading(false);
            } catch (error) {
                console.error('Failed to fetch data:', error);
                setError('Failed to load data.');
                setIsLoading(false);
            }
        };
        fetchData();
    }, [baseUrl]);

    const handleCategoryClick = (categoryId) => {
        setActiveCategory(categoryId);
    };

    if (isLoading) return <p>Loading...</p>;
    if (error) return <p>Error: {error}</p>;

    return (
        <div>
            <h1>Portfolio</h1>
            <div>
                <button onClick={() => handleCategoryClick('all')}>All</button>
                {categories.map(category => (
                    <button key={category.id} onClick={() => handleCategoryClick(category.id)}>
                        {category.name}
                    </button>
                ))}
            </div>
            <div style={{ display: 'flex', flexWrap: 'wrap' }}>
                {items.filter(item => activeCategory === 'all' || item.portfolio_categories && item.portfolio_categories.includes(activeCategory)).map(item => (
                    <div key={item.id} style={{ margin: '10px', width: '300px' }}>
                        <h2>{item.title.rendered}</h2>
                        {item.imageUrl && (
                            <img src={item.imageUrl} alt={item.title.rendered} style={{ width: '100%', height: 'auto' }} />
                        )}
                        <div dangerouslySetInnerHTML={{ __html: item.excerpt.rendered }} />
                    </div>
                ))}
            </div>
        </div>
    );
};

export default PortfolioComponent;
