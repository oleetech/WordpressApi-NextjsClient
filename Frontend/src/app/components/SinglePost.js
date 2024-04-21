import React, { useState, useEffect } from 'react';
import axios from 'axios';

const SinglePost = ({ postId }) => {
    const [post, setPost] = useState(null);
    const [isLoading, setIsLoading] = useState(true);
    const [error, setError] = useState(null);
    const baseUrl = process.env.NEXT_PUBLIC_API_BASE_URL; // Ensure this is defined in your .env file

    useEffect(() => {
        const fetchPost = async () => {
            try {
                const response = await axios.get(`${baseUrl}/wp-json/wp/v2/posts/${postId}`);
                setPost(response.data);
                setIsLoading(false);
            } catch (error) {
                console.error('Failed to fetch post:', error);
                setError('Failed to load post.');
                setIsLoading(false);
            }
        };

        fetchPost();
    }, [baseUrl, postId]);

    if (isLoading) return <p>Loading...</p>;
    if (error) return <p>Error: {error}</p>;

    return (
        <div>
            <h1>{post.title.rendered}</h1>
            <div dangerouslySetInnerHTML={{ __html: post.content.rendered }} />
        </div>
    );
};

export default SinglePost;
