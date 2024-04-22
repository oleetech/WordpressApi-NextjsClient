<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/>

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<?php get_template_part('template_part/navbaranimated');?>
<?php get_template_part('template_part/slider-slider-post-type');?>




