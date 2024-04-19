// pages/pages/[id].js
import React from 'react';
import { useRouter } from 'next/router';

const Page = () => {
    const router = useRouter();
    const { id } = router.query;

    // Fetch page details based on `id` or display them here if passed via state/context
    return (
        <div>
            <h1>Page Details for ID: {id}</h1>
            {/* Additional page content */}
        </div>
    );
};

export default Page;
