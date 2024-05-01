import axios from 'axios';

const wooApi = axios.create({
  baseURL: process.env.NEXT_PUBLIC_API_BASE_URL + '/wp-json/wc/v3/', 
  auth: {
    username: process.env.NEXT_PUBLIC_WOO_CONSUMER_KEY,
    password: process.env.NEXT_PUBLIC_WOO_CONSUMER_SECRET
  }
});

export default wooApi;
