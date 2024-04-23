<div class="p-5">
    <ul id="portfolio-tabs" class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="all-tab" data-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="true">All</a>
        </li>
        <?php
        $terms = get_terms('portfolio_category');
        if ($terms) :
            foreach ($terms as $index => $term) :
        ?>
                <li class="nav-item">
                    <a class="nav-link" id="<?php echo esc_attr($term->slug); ?>-tab" data-toggle="tab" href="#<?php echo esc_attr($term->slug); ?>" role="tab" aria-controls="<?php echo esc_attr($term->slug); ?>" aria-selected="false"><?php echo esc_html($term->name); ?></a>
                </li>
        <?php
            endforeach;
        endif;
        ?>
    </ul>

    <div class="tab-content mt-3">
        <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
            <div class="row">
                <?php
                $portfolio_query = new WP_Query(array(
                    'post_type' => 'portfolio',
                    'posts_per_page' => -1,
                ));
                if ($portfolio_query->have_posts()) :
                    while ($portfolio_query->have_posts()) :
                        $portfolio_query->the_post();
                ?>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="portfolio-item">
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="portfolio-thumbnail">
                                        <?php the_post_thumbnail('medium', array('class' => 'img-fluid')); ?>
                                    </div>
                                <?php endif; ?>
                                <h2><?php the_title(); ?></h2>
                                <div class="portfolio-content">
                                    <?php the_content(); ?>
                                </div>
                            </div>
                        </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p>No portfolio items found.</p>';
                endif;
                ?>
            </div>
        </div>

        <?php
        if ($terms) :
            foreach ($terms as $index => $term) :
        ?>
                <div class="tab-pane fade" id="<?php echo esc_attr($term->slug); ?>" role="tabpanel" aria-labelledby="<?php echo esc_attr($term->slug); ?>-tab">
                    <div class="row">
                        <?php
                        $portfolio_query = new WP_Query(array(
                            'post_type' => 'portfolio',
                            'posts_per_page' => -1,
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'portfolio_category',
                                    'field' => 'slug',
                                    'terms' => $term->slug,
                                ),
                            ),
                        ));
                        if ($portfolio_query->have_posts()) :
                            while ($portfolio_query->have_posts()) :
                                $portfolio_query->the_post();
                        ?>
                                <div class="col-lg-4 col-md-6 mb-4">
                                    <div class="portfolio-item">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <div class="portfolio-thumbnail">
                                                <?php the_post_thumbnail('medium', array('class' => 'img-fluid')); ?>
                                            </div>
                                        <?php endif; ?>
                                        <h2><?php the_title(); ?></h2>
                                        <div class="portfolio-content">
                                            <?php the_content(); ?>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            endwhile;
                            wp_reset_postdata();
                        else :
                            echo '<p>No portfolio items found for this category.</p>';
                        endif;
                        ?>
                    </div>
                </div>
        <?php
            endforeach;
        endif;
        ?>
    </div>
</div>