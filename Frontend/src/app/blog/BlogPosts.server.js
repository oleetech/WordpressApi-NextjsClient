// src/app/blog/BlogPosts.server.js

import React from 'react';

async function fetchPosts() {
  const response = await fetch('https://blog.jrrecyclingsolutionsltd.com.bd/wp-json/wp/v2/posts');
  return await response.json();
}

export default function BlogPosts() {
  const posts = fetchPosts();

  return (
    <div>
      <h1>Blog Posts</h1>
      {posts.map(post => (
        <div key={post.id}>
          <h2>{post.title.rendered}</h2>
          <div dangerouslySetInnerHTML={{ __html: post.content.rendered }} />
        </div>
      ))}
    </div>
  );
}
