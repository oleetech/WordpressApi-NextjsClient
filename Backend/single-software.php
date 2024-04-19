<?php
// Get the header
get_header(); ?>

<div class="container mx-auto px-4 py-6">
    <?php while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
                <?php the_title('<h1 class="entry-title text-3xl font-bold">', '</h1>'); ?>
            </header>

            <div class="entry-content">
                <?php if (has_post_thumbnail()) : ?>
                    <img src="<?php the_post_thumbnail_url('full'); ?>" class="rounded-lg mb-4">
                <?php endif; ?>

                <?php the_content(); ?>

                <?php
                $download_link = get_post_meta(get_the_ID(), '_download_link', true);
                if (!empty($download_link)) : ?>
                    <a href="<?php echo esc_url($download_link); ?>" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Download</a>
                <?php endif; ?>
            </div>
        </article>
    <?php endwhile; ?>
</div>

<?php
// Get the footer
get_footer();
