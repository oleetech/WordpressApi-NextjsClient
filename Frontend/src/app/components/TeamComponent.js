import React, { useEffect, useState } from 'react';
import axios from 'axios';

const TeamComponent = () => {
    const [teamMembers, setTeamMembers] = useState([]);
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
        const fetchTeam = async () => {
            try {
                const response = await axios.get(`${baseUrl}/wp-json/wp/v2/team-members`); // Adjust endpoint to 'team'
                const teamData = await Promise.all(response.data.map(async member => {
                    const imageUrl = member.featured_media ? await fetchImage(member.featured_media) : null;
                    return {
                        ...member,
                        imageUrl
                    };
                }));
                setTeamMembers(teamData);
                setIsLoading(false);
            } catch (error) {
                console.error('Failed to fetch team members:', error);
                setError('Failed to load team members.');
                setIsLoading(false);
            }
        };

        fetchTeam();
    }, [baseUrl]);

    if (isLoading) return <p>Loading...</p>;
    if (error) return <p>Error: {error}</p>;

    return (
        <div>
            <h1>Meet Our Team</h1>
            <div style={{ display: 'flex', flexWrap: 'wrap', justifyContent: 'space-around' }}>
                {teamMembers.map((member, index) => (
                    <div key={index} style={{ margin: '10px', textAlign: 'center', maxWidth: '200px' }}>
                        <h2>{member.title.rendered}</h2>
                        {member.imageUrl && (
                            <img src={member.imageUrl} alt={member.title.rendered} style={{ width: '100%', height: 'auto', borderRadius: '50%' }} />
                        )}
                        <p>{member.content.rendered}</p>
                    </div>
                ))}
            </div>
        </div>
    );
};

export default TeamComponent;
