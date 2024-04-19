<?php get_header(); ?>

<main id="main" class="site-main">
    <div class="container">
        <?php
        while (have_posts()) : the_post();
        ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                </header>
                <div class="entry-meta">
                    <span class="posted-on"><?php echo get_the_date(); ?></span>
                </div>
                <div class="entry-content">
                    <?php the_content(); ?>
                </div>
                <?php
                wp_link_pages(array(
                    'before'      => '<div class="page-links">' . __('Pages:', 'textdomain'),
                    'after'       => '</div>',
                    'link_before' => '<span class="page-number">',
                    'link_after'  => '</span>',
                ));
                ?>
            </article>
        <?php
        endwhile;
        ?>
    </div>
</main>

<?php get_footer(); ?>
