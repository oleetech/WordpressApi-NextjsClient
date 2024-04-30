<?php get_header(); ?>

<!-- <?php get_template_part('template_part/slider-theme-option');?> -->
<!-- <?php get_template_part('template_part/video-banner');?> -->
<!-- <?php get_template_part('template_part/slider-project');?> -->

<!-- <?php get_template_part('template_part/tabs-portfolio');?> -->


<!-- Services Start -->
<div class="container-fluid service py-5">
    <div class="container py-5">
        <div class="section-title mb-5 wow fadeInUp" data-wow-delay="0.2s">
            <div class="sub-style">
                <h4 class="sub-title px-3 mb-0">What We Do</h4>
            </div>
            <h1 class="display-3 mb-4">Our Service Given Physio Therapy By Expert.</h1>
            <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat deleniti amet at atque sequi quibusdam cumque itaque repudiandae temporibus, eius nam mollitia voluptas maxime veniam necessitatibus saepe in ab? Repellat!</p>
        </div>
        <div class="row g-4 justify-content-center">
            <?php
            // Start the WordPress loop
            if (have_posts()) :
                while (have_posts()) :
                    the_post();
            ?>
            <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="<?php echo rand(1, 7) / 10; ?>s">
                <div class="service-item rounded">
                    <div class="service-img rounded-top">
                        <a href="<?php the_permalink(); ?>">
                            <?php
                            if (has_post_thumbnail()) {
                                the_post_thumbnail('medium', ['class' => 'img-fluid rounded-top w-100', 'alt' => get_the_title()]);
                            }
                            ?>
                        </a>
                    </div>
                    <div class="service-content rounded-bottom bg-light p-4">
                        <div class="service-content-inner">
                            <h5 class="mb-4"><?php the_title(); ?></h5>
                            <p class="mb-4"><?php the_excerpt(); ?></p>
                            <a href="<?php the_permalink(); ?>" class="btn btn-primary rounded-pill text-white py-2 px-4 mb-2">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                endwhile;
            endif;
            ?>
        </div>
        <?php if ($wp_query->max_num_pages > 1) : ?>
        <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.2s">
            <?php next_posts_link('Services More', $wp_query->max_num_pages); ?>
        </div>
        <?php endif; ?>
    </div>
</div>
<!-- Services End -->







<?php get_footer(); ?>
