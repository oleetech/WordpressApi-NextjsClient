import Link from 'next/link';
import Head from 'next/head';
import RootLayout from '../layout';
// Function to fetch all posts from the API
async function fetchPosts() {
  const res = await fetch('https://blog.jrrecyclingsolutionsltd.com.bd/wp-json/wp/v2/posts');
  const posts = await res.json();
  return posts;
}

export default async function Posts() {
  const posts = await fetchPosts();
  
  return (
    <RootLayout pageTitle="Home Page" pageDescription="Welcome to our homepage!">

    <div>

            {/* SEO Metadata */}
            <Head>
        <title>All Posts - Your Website Name</title>
        <meta name="description" content="This is the description of all posts on your website." />
        {/* Add more meta tags for SEO */}
      </Head>

      <h1>All Posts</h1>
      <ul>
        {posts && posts.map(post => (
          <li key={post.id}>
            <Link
              href={`/blog/[slug]`} // Specify the dynamic route
              as={`/blog/${post.slug}`} // Specify the URL with the slug
              passHref
            >
                {/* Pass data as query parameters */}
                <span>{post.title.rendered}</span>
                {/* Add more data here if needed */}
            
            </Link>
          </li>
        ))}
      </ul>
    </div>
    </RootLayout>

  );
}
