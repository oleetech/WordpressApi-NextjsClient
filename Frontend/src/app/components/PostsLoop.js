"use client";
import React, { useEffect, useState } from 'react';
import axios from 'axios';

const PostsLoop = () => {
    const [posts, setPosts] = useState([]);
    const [currentPage, setCurrentPage] = useState(1);
    const [totalPages, setTotalPages] = useState(1);
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
                // Fetch WordPress settings to get the number of posts per page
                const settingsResponse = await axios.get(`${baseUrl}/wp-json/wp/v2/settings`);
                const postsPerPage = settingsResponse.data.posts_per_page || 2; // Default to 2 if not set

                // Fetch posts with the retrieved posts per page value
                const response = await axios.get(`${baseUrl}/wp-json/wp/v2/posts`, {
                    params: {
                        page: currentPage,
                        per_page: postsPerPage
                    }
                });
    
                const postData = await Promise.all(response.data.map(async post => {
                    const imageUrl = await fetchImage(post.featured_media);
                    return {
                        ...post,
                        imageUrl
                    };
                }));
                setPosts(postData);
                setTotalPages(response.headers['x-wp-totalpages']);
                setIsLoading(false);
            } catch (error) {
                console.error('Failed to fetch posts:', error);
                setError('Failed to load posts.');
                setIsLoading(false);
            }
        };
    
        fetchPosts();
    }, [baseUrl, currentPage]);
    
    const handlePrevPage = () => {
        setCurrentPage(prevPage => prevPage - 1);
    };

    const handleNextPage = () => {
        setCurrentPage(prevPage => prevPage + 1);
    };

    if (isLoading) return <p>Loading...</p>;
    if (error) return <p>Error: {error}</p>;

    return (
        <>
            <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                {posts.map(post => (
                    <a key={post.id} href={`/blog/${post.slug}`}>
                        <div className="flex-col group mb-8 md:mb-0">
                            <div className="relative h-64 w-full overflow-clip">
                                <img
                                    loading="lazy"
                                    src={post.imageUrl}
                                    alt={post.title.rendered}
                                    className="object-cover object-center rounded-t-lg w-full"
                                />
                            </div>
                            <div className="bg-gray-100 p-8 border-2 border-t-0 rounded-b-lg">
                                <div className="uppercase text-primary-500 text-xs font-bold tracking-widest leading-loose">
                                    {post.categories.map(category => category.name).join(', ')}
                                </div>
                                <div className="border-b-2 border-primary-500 w-8" />
                                <div className="mt-4 uppercase text-gray-600 italic font-semibold text-xs">
                                    {post.date}
                                </div>
                                <h2 className="text-secondary-500 mt-1 font-black text-2xl group-hover:text-primary-500 transition duration-300">
                                    {post.title.rendered}
                                </h2>
                            </div>
                        </div>
                    </a>
                ))}
            </div>
            <div className="pagination">
                <button onClick={handlePrevPage} disabled={currentPage === 1}>Previous</button>
                <span>{currentPage} / {totalPages}</span>
                <button onClick={handleNextPage} disabled={currentPage === totalPages}>Next</button>
            </div>
        </>
    );
};

export default PostsLoop;
