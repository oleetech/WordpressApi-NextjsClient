const Post = ({ params }) => {
  const post = params.slug;

  async function fetchPosts() {
    const res = await fetch(`https://blog.jrrecyclingsolutionsltd.com.bd/wp-json/custom/v1/${post}`);
    const posts = await res.json();
    return posts;
  }
  const posts = await fetchPosts();

  return (
    <div>

    </div>
  );
}

// This assumes that the slug is passed to the component as a prop
export default Post;


import React from 'react'

function page() {
  return (
    <div>page</div>
  )
}

export default page