import React, { useEffect, useState } from 'react';
import axios from 'axios';

const PostsLoop = () => {
    const [posts, setPosts] = useState([]);
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
        const fetchPosts = async () => {
            try {
                const response = await axios.get(`${baseUrl}/wp-json/wp/v2/posts`);
                const postData = await Promise.all(response.data.map(async post => {
                    const imageUrl = await fetchImage(post.featured_media);
                    return {
                        ...post,
                        imageUrl
                    };
                }));
                setPosts(postData);
                setIsLoading(false);
            } catch (error) {
                console.error('Failed to fetch posts:', error);
                setError('Failed to load posts.');
                setIsLoading(false);
            }
        };

        fetchPosts();
    }, [baseUrl]);

    if (isLoading) return <p>Loading...</p>;
    if (error) return <p>Error: {error}</p>;

    return (
        <div>
            <h1>Blog Posts</h1>
            {posts.map(post => (
                <div key={post.id}>
                    <h2>{post.title.rendered}</h2>
                    {post.imageUrl && (
                        <img src={post.imageUrl} alt={post.title.rendered} style={{ width: '100%', height: 'auto' }} />
                    )}
                    <div dangerouslySetInnerHTML={{ __html: post.excerpt.rendered }} />
                </div>
            ))}
        </div>
    );
};

export default PostsLoop;
