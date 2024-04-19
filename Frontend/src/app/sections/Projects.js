"use client";
import React, { useEffect, useState } from 'react';
import axios from 'axios';

const Projects = () => {
    const [projects, setProjects] = useState([]);
    const [hovered, setHovered] = useState(false);
    const [hoveredIndex, setHoveredIndex] = useState(null);
    const [imageUrls, setImageUrls] = useState({});

    const getImageUrl = async (mediaId) => {
        try {
            const response = await axios.get(`${process.env.NEXT_PUBLIC_API_BASE_URL}/wp-json/wp/v2/media/${mediaId}`);
            return response.data.source_url;
        } catch (error) {
            console.error("Error fetching image URL:", error);
            return '/path/to/default/image.png'; // Fallback image path in case of error
        }
    };

    useEffect(() => {
        const fetchProjects = async () => {
            try {
                const response = await axios.get(`${process.env.NEXT_PUBLIC_API_BASE_URL}/wp-json/wp/v2/projects`);
                const tempProjects = response.data;
                const urls = {};

                for (const project of tempProjects) {
                    if (project.featured_media) {
                        const imageUrl = await getImageUrl(project.featured_media);
                        urls[project.featured_media] = imageUrl; // Store image URL in an object with media ID as key
                    }
                }

                // Map projects to include image URLs from the urls object
                const projectsWithImages = tempProjects.map(project => ({
                    ...project,
                    title: project.title.rendered,
                    description: project.content.rendered,
                    imageUrl: urls[project.featured_media] || '/path/to/default/image.png' // Use fetched image URL or a default
                }));

                setProjects(projectsWithImages);
                setImageUrls(urls);
            } catch (error) {
                console.error('Error fetching projects:', error);
            }
        };

        fetchProjects();
    }, []);

    return (
        <div className="mt-[60px] flex flex-wrap justify-between">
            {projects.map((project, index) => (
                <div
                    key={index}
                    onMouseEnter={() => {
                        setHovered(true);
                        setHoveredIndex(index);
                    }}
                    onMouseLeave={() => {
                        setHovered(false);
                        setHoveredIndex(null);
                    }}
                    className="w-[48%] mb-[4%] overflow-hidden relative"
                >
                    <img src={project.imageUrl} alt="Project Feature" className="w-full object-cover h-[300px]" />
                    {hovered && hoveredIndex === index && (
                        <div className="absolute overflow-hidden top-0 left-0 w-full h-full bg-black/70 flex justify-center items-center">
                            <div className="text-white px-[2%] text-center">
                                <p className="text-lg font-semibold">{project.title}</p>
                                <p>{project.description}</p>
                            </div>
                        </div>
                    )}
                </div>
            ))}
        </div>
    );
};

export default Projects;
