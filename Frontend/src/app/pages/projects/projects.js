import React from 'react';
import Projects from '@/app/components/Projects';
import Head from 'next/head';

const ProjectsPage = () => {
    const baseUrl = process.env.NEXT_PUBLIC_API_BASE_URL;
  return (
    <div>
      <Head>
        <title>Our Projects - JR Recycling Solutions</title>
        <meta name="description" content="Explore our projects showcasing our commitment to environmental sustainability and recycling innovations." />
        <meta property="og:title" content="Our Projects - JR Recycling Solutions" />
        <meta property="og:description" content="Explore our projects showcasing our commitment to environmental sustainability and recycling innovations." />
        <meta property="og:type" content="website" />
        <meta property="og:url" content={`${baseUrl}/projects`} />  {/* Use the base URL dynamically */}
        <meta property="og:image" content={`${baseUrl}/default-og-image.jpg`} />  {/* Assume a default image stored at the root */}
        <link rel="canonical" href={`${baseUrl}/projects`} />
      </Head>
      <h1>Our Projects</h1>
      <Projects />
    </div>
  );
};

export default ProjectsPage;
