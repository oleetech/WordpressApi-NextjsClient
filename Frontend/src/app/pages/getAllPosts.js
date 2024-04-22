// lib/getAllPosts.js

const getAllPosts = async () => {
    const response = await fetch('https://jsonplaceholder.typicode.com/posts?_limit=10');
    const posts = await response.json();
    return posts;
  }
  
  export default getAllPosts;
  