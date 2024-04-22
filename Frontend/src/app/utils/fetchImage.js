import axios from 'axios';

const fetchImage = async (mediaId, baseUrl) => {
    if (!mediaId) return '/path/to/default/image.png'; // Provide a default image path
    try {
        const result = await axios.get(`${baseUrl}/wp-json/wp/v2/media/${mediaId}`);
        return result.data.source_url;
    } catch (error) {
        console.error('Error fetching image:', error);
        return '/path/to/default/image.png'; // Fallback image path
    }
};

export default fetchImage;
