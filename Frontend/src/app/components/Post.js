export async function getPosts() {
    try {
      const res = await fetch('https://blog.jrrecyclingsolutionsltd.com.bd/wp-json/wp/v2/posts');
      if (!res.ok) {
        throw new Error('Failed to fetch posts');
      }
      const posts = await res.json();
      return posts;
    } catch (error) {
      console.error('Error fetching posts:', error);
      return []; // Return empty array or handle the error as needed
    }
  }
  



  export async function getPostBySlug(slug) {
    try {
        const res = await fetch(`https://blog.jrrecyclingsolutionsltd.com.bd/wp-json/custom/v1/post-by-slug/${slug}`);
        if (!res.ok) {
            throw new Error('Failed to fetch post');
        }
        const post = await res.json(); // Remove array destructuring
        return post;
    } catch (error) {
        console.error('Error fetching post:', error);
        return null; // Return null or handle the error as needed
    }
}

  