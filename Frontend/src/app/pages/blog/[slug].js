import axios from 'axios';

export default function BlogPost({ post }) {
  return (
    <article>
      <h1>{post.title.rendered}</h1>
      <div dangerouslySetInnerHTML={{ __html: post.content.rendered }} />
    </article>
  );
}

export async function getStaticPaths() {
  return {
    paths: [],
    fallback: 'blocking' // Generate pages on-demand if not generated at build time
  };
}

export async function getStaticProps({ params }) {
  const baseUrl = process.env.NEXT_PUBLIC_API_BASE_URL;
  const response = await axios.get(`${baseUrl}/wp-json/wp/v2/posts?slug=${params.slug}`);
  const post = response.data[0] || null;

  if (!post) {
    return {
      notFound: true,
    };
  }

  return {
    props: {
      post
    },
    revalidate: 10
  };
}
