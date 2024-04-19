<div class="p-5">
  <div id="tabs" class="flex flex-wrap -mb-px text-sm font-medium text-center" role="tablist">
      <?php
      $terms = get_terms('portfolio_category');
      if ($terms) :
          foreach ($terms as $index => $term) :
      ?>
              <div class="mr-2">
                  <button class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300" role="tab" onclick="openTab(event, 'Tab<?php echo $index + 1; ?>')"><?php echo $term->name; ?></button>
              </div>
      <?php
          endforeach;
      endif;
      ?>
  </div>

  <?php
  if ($terms) :
      foreach ($terms as $index => $term) :
  ?>
          <div id="Tab<?php echo $index + 1; ?>" class="hidden p-4 bg-gray-50 rounded-lg tab-content" role="tabpanel">
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
                      <div class="portfolio-item">
                        <?php if (has_post_thumbnail()) : ?>
                        <div class="portfolio-thumbnail">
                            <?php the_post_thumbnail('medium'); ?>
                        </div>
                    <?php endif; ?>
                          <h2><?php the_title(); ?></h2>
                          <div class="portfolio-content">
                              <?php the_content(); ?>
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
  <?php
      endforeach;
  endif;
  ?>
</div>