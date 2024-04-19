<?php
$redux_options = get_option('olee'); // Replace 'your_theme_options' with your actual opt_name.
$slides = isset($redux_options['opt-slides']) ? $redux_options['opt-slides'] : [];

if (!empty($slides)) {
  echo '<div class="slider">'; // Start of your slider container
  foreach ($slides as $slide) {
      echo '<div class="slide">'; // Start of a single slide
      if (!empty($slide['image'])) {
          echo '<img src="' . esc_url($slide['image']) . '" alt="' . esc_attr($slide['title']) . '">'; // Slide image
      }
      if (!empty($slide['title'])) {
          echo '<h3>' . esc_html($slide['title']) . '</h3>'; // Slide title
      }
      if (!empty($slide['description'])) {
          echo '<p>' . esc_html($slide['description']) . '</p>'; // Slide description
      }
      echo '</div>'; // End of a single slide
  }
  echo '</div>'; // End of your slider container
}
?>