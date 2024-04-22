// pages/blog/page.js

import getAllPosts from "../getAllPosts"; // Adjust the path as necessary

export default function BlogPage({ posts }) {
  return (
    <div>
      <h1>Blog Posts</h1>
      {posts.map(post => (
        <div key={post.id}>
          <h2>{post.title}</h2>
          <p>{post.body}</p>
        </div>
      ))}
    </div>
  );
}

export async function getServerSideProps() {
  const posts = await getAllPosts();
  return {
    props: { posts },
  };
}
