<?php get_header(); ?>
<?php
/**
 * The template for displaying product content within loops.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */
defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>

        <div class="col-md-4 col-sm-6">
            <div class="card">
                <img src="<?php echo wp_get_attachment_url( $product->get_image_id() ); ?>" class="card-img-top" alt="<?php echo esc_attr($product->get_name()); ?>">
                <div class="card-body text-center">
                    <h5 class="card-title"><?php echo $product->get_name(); ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $product->get_price_html(); ?></h6>
                    <div class="product-icons">
                        <a href="<?php echo esc_url($product->add_to_cart_url()); ?>" class="card-link"><i class="fas fa-shopping-cart"></i></a>
                        <a href="#" class="card-link"><i class="fas fa-heart"></i></a>
                        <a href="#" class="card-link"><i class="fas fa-sync-alt"></i></a>
                    </div>
                </div>
            </div>
		</div>