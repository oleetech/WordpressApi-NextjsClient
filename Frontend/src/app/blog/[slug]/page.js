"use client"
import { useSearchParams } from "next/navigation";
const Post = () => {
  
  const searchParams = useSearchParams();
  const title = searchParams.get("title");
  const description = searchParams.get("description");
  const image = searchParams.get("image");
  const excerpt = searchParams.get("excerpt");

  return (
    <div>
      <h1>{title}</h1>
      <div dangerouslySetInnerHTML={{ __html: description }} />
    </div>
  );
}

// This assumes that the slug is passed to the component as a prop
export default Post;
