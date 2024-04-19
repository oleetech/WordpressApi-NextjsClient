# API Documentation

**for example use website**https://api.jrrecyclingsolutionsltd.com.bd

This API provides endpoints for managing various content on the JR Recycling Solutions website.
# WordPress API Endpoints

## Posts

1. **Retrieve all posts:**
   - URL: `/wp-json/wp/v2/posts`
   - Method: GET
   - No additional data needed.

2. **Retrieve a specific post by ID:**
   - URL: `/wp-json/wp/v2/posts/{id}`
   - Replace `{id}` with the actual ID of the post.
   - Method: GET
   - No additional data needed.

3. **Create a new post:**
   - URL: `/wp-json/wp/v2/posts`
   - Method: POST
   - Body: JSON with the data for the new post.
     ```json
     {
       "title": "New Post",
       "content": "Content of the new post",
       "status": "publish"
     }
     ```

4. **Update a specific post by ID:**
   - URL: `/wp-json/wp/v2/posts/{id}`
   - Replace `{id}` with the actual ID of the post.
   - Method: PUT
   - Body: JSON with the updated data for the post.
     ```json
     {
       "title": "Updated Post",
       "content": "Updated content of the post"
     }
     ```

5. **Delete a specific post by ID:**
   - URL: `/wp-json/wp/v2/posts/{id}`
   - Replace `{id}` with the actual ID of the post.
   - Method: DELETE
   - No addit

## Pages

1. **Retrieve all pages:**
   - URL: `/wp-json/wp/v2/pages`
   - Method: GET
   - No additional data needed.

2. **Retrieve a specific page by ID:**
   - URL: `/wp-json/wp/v2/pages/{id}`
   - Replace `{id}` with the actual ID of the page.
   - Method: GET
   - No additional data needed.

3. **Create a new page:**
   - URL: `/wp-json/wp/v2/pages`
   - Method: POST
   - Body: JSON with the data for the new page.
     ```json
     {
       "title": "New Page",
       "content": "Content of the new page",
       "status": "publish"
     }
     ```

4. **Update a specific page by ID:**
   - URL: `/wp-json/wp/v2/pages/{id}`
   - Replace `{id}` with the actual ID of the page.
   - Method: PUT
   - Body: JSON with the updated data for the page.
     ```json
     {
       "title": "Updated Page",
       "content": "Updated content of the page"
     }
     ```

5. **Delete a specific page by ID:**
   - URL: `/wp-json/wp/v2/pages/{id}`
   - Replace `{id}` with the actual ID of the page.
   - Method: DELETE
   - No additional data needed.

## Media

1. **Retrieve all media:**
   - URL: `/wp-json/wp/v2/media`
   - Method: GET
   - No additional data needed.

2. **Retrieve a specific media item by ID:**
   - URL: `/wp-json/wp/v2/media/{id}`
   - Replace `{id}` with the actual ID of the media item.
   - Method: GET
   - No additional data needed.

3. **Create a new media item:**
   - URL: `/wp-json/wp/v2/media`
   - Method: POST
   - Body: FormData or JSON with the data for the new media item.
     - Include the file as part of the FormData or provide the media URL in the JSON.
     - Example FormData: `media=@/path/to/file.jpg`
     - Example JSON:
       ```json
       {
         "file": "https://example.com/image.jpg"
       }
       ```

4. **Update a specific media item by ID:**
   - URL: `/wp-json/wp/v2/media/{id}`
   - Replace `{id}` with the actual ID of the media item.
   - Method: POST (with `_method=PUT` parameter) or PUT
   - Body: FormData or JSON with the updated data for the media item.
     - Include the file as part of the FormData or provide the media URL in the JSON.
     - Example FormData: `media=@/path/to/updated_file.jpg`
     - Example JSON:
       ```json
       {
         "file": "https://example.com/updated_image.jpg"
       }
       ```

5. **Delete a specific media item by ID:**
   - URL: `/wp-json/wp/v2/media/{id}`
   - Replace `{id}` with the actual ID of the media item.
   - Method: DELETE
   - No additional data needed.

## Categories

1. **Retrieve all categories:**
   - URL: `/wp-json/wp/v2/categories`
   - Method: GET
   - No additional data needed.

2. **Retrieve a specific category by ID:**
   - URL: `/wp-json/wp/v2/categories/{id}`
   - Replace `{id}` with the actual ID of the category.
   - Method: GET
   - No additional data needed.

3. **Create a new category:**
   - URL: `/wp-json/wp/v2/categories`
   - Method: POST
   - Body: JSON with the data for the new category.
     ```json
     {
       "name": "New Category",
       "description": "Description of the new category"
     }
     ```

4. **Update a specific category by ID:**
   - URL: `/wp-json/wp/v2/categories/{id}`
   - Replace `{id}` with the actual ID of the category.
   - Method: PUT
   - Body: JSON with the updated data for the category.
     ```json
     {
       "name": "Updated Category",
       "description": "Updated description of the category"
     }
     ```

5. **Delete a specific category by ID:**
   - URL: `/wp-json/wp/v2/categories/{id}`
   - Replace `{id}` with the actual ID of the category.
   - Method: DELETE
   - No additional data needed.

## Tags

1. **Retrieve all tags:**
   - URL: `/wp-json/wp/v2/tags`
   - Method: GET
   - No additional data needed.

2. **Retrieve a specific tag by ID:**
   - URL: `/wp-json/wp/v2/tags/{id}`
   - Replace `{id}` with the actual ID of the tag.
   - Method: GET
   - No additional data needed.

3. **Create a new tag:**
   - URL: `/wp-json/wp/v2/tags`
   - Method: POST
   - Body: JSON with the data for the new tag.
     ```json
     {
       "name": "New Tag",
       "description": "Description of the new tag"
     }
     ```

4. **Update a specific tag by ID:**
   - URL: `/wp-json/wp/v2/tags/{id}`
   - Replace `{id}` with the actual ID of the tag.
   - Method: PUT
   - Body: JSON with the updated data for the tag.
     ```json
     {
       "name": "Updated Tag",
       "description": "Updated description of the tag"
     }
     ```

5. **Delete a specific tag by ID:**
   - URL: `/wp-json/wp/v2/tags/{id}`
   - Replace `{id}` with the actual ID of the tag.
   - Method: DELETE
   - No additional data needed.

## Users

1. **Retrieve all users:**
   - URL: `/wp-json/wp/v2/users`
   - Method: GET
   - No additional data needed.

2. **Retrieve a specific user by ID:**
   - URL: `/wp-json/wp/v2/users/{id}`
   - Replace `{id}` with the actual ID of the user.
   - Method: GET
   - No additional data needed.

3. **Create a new user:**
   - URL: `/wp-json/wp/v2/users`
   - Method: POST
   - Body: JSON with the data for the new user.
     ```json
     {
       "username": "newuser",
       "email": "newuser@example.com",
       "password": "password123",
       "name": "New User"
     }
     ```

4. **Update a specific user by ID:**
   - URL: `/wp-json/wp/v2/users/{id}`
   - Replace `{id}` with the actual ID of the user.
   - Method: PUT
   - Body: JSON with the updated data for the user.
     ```json
     {
       "username": "updateduser",
       "email": "updateduser@example.com",
       "name": "Updated User"
     }
     ```

5. **Delete a specific user by ID:**
   - URL: `/wp-json/wp/v2/users/{id}`
   - Replace `{id}` with the actual ID of the user.
   - Method: DELETE
   - No additional data needed.

## Comments

1. **Retrieve all comments:**
   - URL: `/wp-json/wp/v2/comments`
   - Method: GET
   - No additional data needed.

2. **Retrieve a specific comment by ID:**
   - URL: `/wp-json/wp/v2/comments/{id}`
   - Replace `{id}` with the actual ID of the comment.
   - Method: GET
   - No additional data needed.

3. **Create a new comment:**
   - URL: `/wp-json/wp/v2/comments`
   - Method: POST
   - Body: JSON with the data for the new comment.
     ```json
     {
       "post": 123,
       "content": "New comment content",
       "author_name": "New Commenter"
     }
     ```

4. **Update a specific comment by ID:**
   - URL: `/wp-json/wp/v2/comments/{id}`
   - Replace `{id}` with the actual ID of the comment.
   - Method: PUT
   - Body: JSON with the updated data for the comment.
     ```json
     {
       "content": "Updated comment content"
     }
     ```

5. **Delete a specific comment by ID:**
   - URL: `/wp-json/wp/v2/comments/{id}`
   - Replace `{id}` with the actual ID of the comment.
   - Method: DELETE
   - No additional data needed.

## Taxonomies

1. **Retrieve all taxonomies:**
   - URL: `/wp-json/wp/v2/taxonomies`
   - Method: GET
   - No additional data needed.

2. **Retrieve a specific taxonomy by name:**
   - URL: `/wp-json/wp/v2/taxonomies/{taxonomy}`
   - Replace `{taxonomy}` with the name of the taxonomy (e.g., `category`).
   - Method: GET
   - No additional data needed.

3. **Retrieve terms for a specific taxonomy:**
   - URL: `/wp-json/wp/v2/{taxonomy}`
   - Replace `{taxonomy}` with the name of the taxonomy (e.g., `category`).
   - Method: GET
   - No additional data needed.

4. **Retrieve a specific term from a taxonomy by ID:**
   - URL: `/wp-json/wp/v2/{taxonomy}/{id}`
   - Replace `{taxonomy}` with the name of the taxonomy (e.g., `category`) and `{id}` with the ID of the term.
   - Method: GET
   - No additional data needed.

## Settings

1. **Retrieve general site settings:**
   - URL: `/wp-json/`
   - Method: GET
   - No additional data needed.

2. **Retrieve site title and description:**
   - URL: `/wp-json/`
   - Method: GET
   - No additional data needed.

3. **Retrieve permalink settings:**
   - URL: `/wp-json/`
   - Method: GET
   - No additional data needed.

## Menus

1. **Retrieve menu locations:**
   - URL: `/wp-json/wp-api-menus/v2/menu-locations`
   - Method: GET
   - No additional data needed.

2. **Retrieve menu items for a specific menu location:**
   - URL: `/wp-json/wp-api-menus/v2/menus/{location}`
   - Replace `{location}` with the name of the menu location (e.g., `primary`).
   - Method: GET
   - No additional data needed.



## Custom Post Endpoints

1. **GET all Projects:**
   - URL: `https://api.jrrecyclingsolutionsltd.com.bd/wp-json/wp/v2/projects`
   - Method: GET
   - No additional data needed.

2. **GET a specific Project by ID:**
   - URL: `https://api.jrrecyclingsolutionsltd.com.bd/wp-json/wp/v2/projects/:id`
   - Replace `:id` with the actual ID you want to retrieve.
   - Method: GET
   - No additional data needed.

3. **Create a new Project:**
   - URL: `https://api.jrrecyclingsolutionsltd.com.bd/wp-json/wp/v2/projects`
   - Method: POST
   - Body: JSON with the data for the new project.
     ```json
     {
       "title": "New Project",
       "content": "Description of the new project",
       "status": "publish",
       "featured_media": 123 // ID of the featured image media
     }
     ```

4. **Update a specific Project by ID:**
   - URL: `https://api.jrrecyclingsolutionsltd.com.bd/wp-json/wp/v2/projects/:id`
   - Replace `:id` with the actual ID you want to update.
   - Method: PUT
   - Body: JSON with the updated data for the project.
     ```json
     {
       "title": "Updated Project",
       "content": "Updated description of the project",
       "status": "publish",
       "featured_media": 123 // ID of the updated featured image media
     }
     ```

5. **DELETE a specific Project by ID:**
   - URL: `https://api.jrrecyclingsolutionsltd.com.bd/wp-json/wp/v2/projects/:id`
   - Replace `:id` with the actual ID you want to delete.
   - Method: DELETE
   - No additional data needed.

6. **GET all Software:**
   - URL: `https://api.jrrecyclingsolutionsltd.com.bd/wp-json/wp/v2/software`
   - Method: GET
   - No additional data needed.

7. **GET a specific Software by ID:**
   - URL: `https://api.jrrecyclingsolutionsltd.com.bd/wp-json/wp/v2/software/:id`
   - Replace `:id` with the actual ID you want to retrieve.
   - Method: GET
   - No additional data needed.

8. **Create a new Software:**
   - URL: `https://api.jrrecyclingsolutionsltd.com.bd/wp-json/wp/v2/software`
   - Method: POST
   - Body: JSON with the data for the new software.
     ```json
     {
       "title": "New Software",
       "content": "Description of the new software",
       "status": "publish",
       "download_link": "https://example.com/download"
     }
     ```

9. **Update a specific Software by ID:**
   - URL: `https://api.jrrecyclingsolutionsltd.com.bd/wp-json/wp/v2/software/:id`
   - Replace `:id` with the actual ID you want to update.
   - Method: PUT
   - Body: JSON with the updated data for the software.
     ```json
     {
       "title": "Updated Software",
       "content": "Updated description of the software",
       "status": "publish",
       "download_link": "https://example.com/updated-download"
     }
     ```

10. **DELETE a specific Software by ID:**
    - URL: `https://api.jrrecyclingsolutionsltd.com.bd/wp-json/wp/v2/software/:id`
    - Replace `:id` with the actual ID you want to delete.
    - Method: DELETE
    - No additional data needed.

11. **GET all Social Media Icons:**
    - URL: `https://api.jrrecyclingsolutionsltd.com.bd/wp-json/wp/v2/social_media`
    - Method: GET
    - No additional data needed.

12. **GET a specific Social Media Icon by ID:**
    - URL: `https://api.jrrecyclingsolutionsltd.com.bd/wp-json/wp/v2/social_media/:id`
    - Replace `:id` with the actual ID you want to retrieve.
    - Method: GET
    - No additional data needed.

13. **Create a new Social Media Icon:**
    - URL: `https://api.jrrecyclingsolutionsltd.com.bd/wp-json/wp/v2/social_media`
    - Method: POST
    - Body: JSON with the data for the new social media icon.
      ```json
      {
        "title": "New Social Media Icon",
        "content": "Description of the new social media icon",
        "status": "publish",
        "featured_media": 123 // ID of the featured image media
      }
      ```

14. **Update a specific Social Media Icon by ID:**
    - URL: `https://api.jrrecyclingsolutionsltd.com.bd/wp-json/wp/v2/social_media/:id`
    - Replace `:id` with the actual ID you want to update.
    - Method: PUT
    - Body: JSON with the updated data for the social media icon.
      ```json
      {
        "title": "Updated Social Media Icon",
        "content": "Updated description of the social media icon",
        "status": "publish",
        "featured_media": 123 // ID of the updated featured image media
      }
      ```

15. **DELETE a specific Social Media Icon by ID:**
    - URL: `https://api.jrrecyclingsolutionsltd.com.bd/wp-json/wp/v2/social_media/:id`
    - Replace `:id` with the actual ID you want to delete.
    - Method: DELETE
    - No additional data needed.

16. **GET all Galleries:**
    - URL: `https://api.jrrecyclingsolutionsltd.com.bd/wp-json/wp/v2/galleries`
    - Method: GET
    - No additional data needed.

17. **GET a specific Gallery by ID:**
    - URL: `https://api.jrrecyclingsolutionsltd.com.bd/wp-json/wp/v2/galleries/:id`
    - Replace `:id` with the actual ID you want to retrieve.
    - Method: GET
    - No additional data needed.

18. **Create a new Gallery:**
    - URL: `https://api.jrrecyclingsolutionsltd.com.bd/wp-json/wp/v2/galleries`
    - Method: POST
    - Body: JSON with the data for the new gallery.
      ```json
      {
        "title": "New Gallery",
        "content": "Description of the new gallery",
        "status": "publish",
        "featured_media": 123 // ID of the featured image media
      }
      ```

19. **Update a specific Gallery by ID:**
    - URL: `https://api.jrrecyclingsolutionsltd.com.bd/wp-json/wp/v2/galleries/:id`
    - Replace `:id` with the actual ID you want to update.
    - Method: PUT
    - Body: JSON with the updated data for the gallery.
      ```json
      {
        "title": "Updated Gallery",
        "content": "Updated description of the gallery",
        "status": "publish",
        "featured_media": 123 // ID of the updated featured image media
      }
      ```

20. **DELETE a specific Gallery by ID:**
    - URL: `https://api.jrrecyclingsolutionsltd.com.bd/wp-json/wp/v2/galleries/:id`
    - Replace `:id` with the actual ID you want to delete.
    - Method: DELETE
    - No additional data needed.

21. **GET all Team Members:**
    - URL: `https://api.jrrecyclingsolutionsltd.com.bd/wp-json/wp/v2/team-members`
    - Method: GET
    - No additional data needed.

22. **GET a specific Team Member by ID:**
    - URL: `https://api.jrrecyclingsolutionsltd.com.bd/wp-json/wp/v2/team-members/:id`
    - Replace `:id` with the actual ID you want to retrieve.
    - Method: GET
    - No additional data needed.

23. **Create a new Team Member:**
    - URL: `https://api.jrrecyclingsolutionsltd.com.bd/wp-json/wp/v2/team-members`
    - Method: POST
    - Body: JSON with the data for the new team member.
      ```json
      {
        "title": "New Team Member",
        "content": "Description of the new team member",
        "status": "publish",
        "featured_media": 123 // ID of the featured image media
      }
      ```

24. **Update a specific Team Member by ID:**
    - URL: `https://api.jrrecyclingsolutionsltd.com.bd/wp-json/wp/v2/team-members/:id`
    - Replace `:id` with the actual ID you want to update.
    - Method: PUT
    - Body: JSON with the updated data for the team member.
      ```json
      {
        "title": "Updated Team Member",
        "content": "Updated description of the team member",
        "status": "publish",
        "featured_media": 123 // ID of the updated featured image media
      }
      ```

25. **DELETE a specific Team Member by ID:**
    - URL: `https://api.jrrecyclingsolutionsltd.com.bd/wp-json/wp/v2/team-members/:id`
    - Replace `:id` with the actual ID you want to delete.
    - Method: DELETE
    - No additional data needed.

26. **GET all About Pages:**
    - URL: `https://api.jrrecyclingsolutionsltd.com.bd/wp-json/wp/v2/about`
    - Method: GET
    - No additional data needed.

27. **GET a specific About Page by ID:**
    - URL: `https://api.jrrecyclingsolutionsltd.com.bd/wp-json/wp/v2/about/:id`
    - Replace `:id` with the actual ID you want to retrieve.
    - Method: GET
    - No additional data needed.

28. **Create a new About Page:**
    - URL: `https://api.jrrecyclingsolutionsltd.com.bd/wp-json/wp/v2/about`
    - Method: POST
    - Body: JSON with the data for the new about page.
      ```json
      {
        "title": "New About Page",
        "content": "Description of the new about page",
        "status": "publish",
        "featured_media": 123 // ID of the featured image media
      }
      ```

29. **Update a specific About Page by ID:**
    - URL: `https://api.jrrecyclingsolutionsltd.com.bd/wp-json/wp/v2/about/:id`
    - Replace `:id` with the actual ID you want to update.
    - Method: PUT
    - Body: JSON with the updated data for the about page.
      ```json
      {
        "title": "Updated About Page",
        "content": "Updated description of the about page",
        "status": "publish",
        "featured_media": 123 // ID of the updated featured image media
      }
      ```

30. **DELETE a specific About Page by ID:**
    - URL: `https://api.jrrecyclingsolutionsltd.com.bd/wp-json/wp/v2/about/:id`
    - Replace `:id` with the actual ID you want to delete.
    - Method: DELETE
    - No additional data needed.

These are the available endpoints for managing various content types on the JR Recycling Solutions website. You can use these endpoints to interact with the WordPress site programmatically.
