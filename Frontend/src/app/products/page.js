// app/blog/[slug]/page.tsx
import Head from 'next/head';

export async function getServerData(context) {
  // Replace with the actual URL to your WordPress blog API
  const res = await fetch(`${process.env.NEXT_PUBLIC_API_BASE_URL}/wp-json/wp/v2/posts`);
  const postDetails = await res.json();
  const post = postDetails.length > 0 ? postDetails[0] : null;

  return {
    props: { post },
  };
}

export default function PostPage({ post }) {
 


  return (
      <>
      <Head>
        <title>{post.title.rendered} | My Awesome Website</title>
        <meta name="description" content={`Read this post: ${post.title.rendered} on My Awesome Website.`} />
        {/* Other SEO tags */}
      </Head>
    <article>
      <h1>{post.title.rendered}</h1>
      <div dangerouslySetInnerHTML={{ __html: post.content.rendered }} />
    </article>
     </>
  );
}
