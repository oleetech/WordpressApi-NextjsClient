<div class="relative container-fluid">
<?php
$args = array(
    'post_type' => 'projects_item', // Make sure this matches the post type key
    'posts_per_page' => -1 // Fetch all posts
);
$projects = new WP_Query($args);
if ($projects->have_posts()) :
?>
    <div class="projects-slider">
        <?php while ($projects->have_posts()) : $projects->the_post(); ?>
            <div>
                <?php if (has_post_thumbnail()) : ?>
                    <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title();?>" width="200px"  height="200px" >
                <?php endif; ?>
                <h2><?php the_title(); ?></h2>
            </div>
        <?php endwhile; ?>
    </div>
<?php
endif;
wp_reset_postdata();
?>
</div>


