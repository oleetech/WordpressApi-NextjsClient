import React, { useEffect, useState } from 'react';
import axios from 'axios';

const Users = () => {
    const [users, setUsers] = useState([]);
    const [isLoading, setIsLoading] = useState(true);
    const [error, setError] = useState(null);
    const baseUrl = process.env.NEXT_PUBLIC_API_BASE_URL; // Ensure this is defined in your .env file

    useEffect(() => {
        axios.get(`${baseUrl}/wp-json/wp/v2/users`)
            .then(response => {
                setUsers(response.data);
                setIsLoading(false);
            })
            .catch(error => {
                console.error('Failed to fetch users:', error);
                setError('Failed to load users.');
                setIsLoading(false);
            });
    }, [baseUrl]); // Dependency array includes baseUrl to re-run effect if baseUrl changes

    if (isLoading) return <p>Loading...</p>;
    if (error) return <p>Error: {error}</p>;

    return (
        <div>
            <h1>Users</h1>
            <ul>
                {users.map(user => (
                    <li key={user.id}>
                        {user.name} - {user.email}
                    </li>
                ))}
            </ul>
        </div>
    );
};

export default Users;
