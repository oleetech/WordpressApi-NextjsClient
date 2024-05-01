// src/app/blog/page.js

import React from 'react';
import BlogPosts from './BlogPosts.server';

export default function BlogPage() {
  return (
    <div>
      <h1>Welcome to the Blog</h1>
      <BlogPosts />
    </div>
  );
}
