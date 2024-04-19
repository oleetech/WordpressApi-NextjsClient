<?php
// Get the header
get_header(); ?>

<div class="container mx-auto px-4 py-6">
    <h1 class="text-3xl font-bold mb-4"><?php post_type_archive_title(); ?></h1>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div id="post-<?php the_ID(); ?>" <?php post_class('mb-4 p-4 shadow-lg rounded-lg'); ?>>
            <header class="entry-header">
                <?php the_title(sprintf('<h2 class="entry-title text-xl"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>
            </header>
            
            <?php if (has_post_thumbnail()) : ?>
                <div class="mb-4">
                    <?php the_post_thumbnail('full', ['class' => 'rounded']); ?>
                </div>
            <?php endif; ?>

            <div class="entry-content">
                <?php the_excerpt(); ?>
                <a href="<?php the_permalink(); ?>" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Read More</a>
            </div>
        </div>
    <?php endwhile; else : ?>
        <p><?php _e('Sorry, no software found.', 'textdomain'); ?></p>
    <?php endif; ?>
</div>

<?php
// Get the footer
get_footer();
