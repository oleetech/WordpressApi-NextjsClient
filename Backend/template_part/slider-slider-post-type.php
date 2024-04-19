<div class="relative">
<?php
$args = array(
    'post_type' => 'slider', // Make sure this matches the post type key
    'posts_per_page' => -1 // Fetch all posts
);
$projects = new WP_Query($args);
if ($projects->have_posts()) :
?>
    <div class="projects-slider">
        <?php while ($projects->have_posts()) : $projects->the_post(); ?>
            <div>
                <?php if (has_post_thumbnail()) : ?>
                    <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
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
<!-- Tabs -->

<div class="p-5">
    <div id="tabs" class="flex flex-wrap -mb-px text-sm font-medium text-center" role="tablist">
        <div class="mr-2">
            <button class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300" role="tab" onclick="openTab(event, 'Tab1')">Tab 1</button>
        </div>
        <div class="mr-2">
            <button class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300" role="tab" onclick="openTab(event, 'Tab2')">Tab 2</button>
        </div>
        <div class="mr-2">
            <button class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300" role="tab" onclick="openTab(event, 'Tab3')">Tab 3</button>
        </div>
    </div>

    <div id="Tab1" class="hidden p-4 bg-gray-50 rounded-lg tab-content" role="tabpanel">
        <p>Content for Tab 1</p>
    </div>
    <div id="Tab2" class="hidden p-4 bg-gray-50 rounded-lg tab-content" role="tabpanel">
        <p>Content for Tab 2</p>
    </div>
    <div id="Tab3" class="hidden p-4 bg-gray-50 rounded-lg tab-content" role="tabpanel">
        <p>Content for Tab 3</p>
    </div>
</div>