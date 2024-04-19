import axios from 'axios';
import { useRouter } from 'next/router';
import { useEffect, useState } from 'react';
import Image from 'next/image';
import Layout from '@/components/Layout';

const SingleProject = () => {
  const router = useRouter();
  const { id } = router.query;
  const [project, setProject] = useState(null);
  const [loading, setLoading] = useState(false);
  const [error, setError] = useState('');

  useEffect(() => {
    if (id) {
      setLoading(true);
      axios.get(`${process.env.NEXT_PUBLIC_API_BASE_URL}/wp-json/wp/v2/projects/${id}`)
        .then(response => {
          setProject(response.data);
          setLoading(false);
        })
        .catch(error => {
          console.error('Error fetching project:', error);
          setError('Failed to load project.');
          setLoading(false);
        });
    }
  }, [id]);

  if (loading) return <p>Loading...</p>;
  if (error) return <p>{error}</p>;

  return (
    <Layout title={project?.title?.rendered || 'Project'}>
      <div className="container mx-auto p-4">
        {project && (
          <div>
            <h1 className="text-2xl font-bold mb-2">{project.title.rendered}</h1>
            {project.featured_media_url && (
              <div className="mb-4">
                <Image src={project.featured_media_url} alt={project.title.rendered} width={600} height={400} />
              </div>
            )}
            <div dangerouslySetInnerHTML={{ __html: project.content.rendered }} />
          </div>
        )}
      </div>
    </Layout>
  );
};

export default SingleProject;
