<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product )) {
	return;
}

?>

<li <?php post_class('product-list-item dashboard-product dashboard-product-list'); ?>>
	<div class="product-block">
		<div class="product-image-cntr">
		<?php		
			$post_thumnail_url="";
		 	if(has_post_thumbnail($product->id)){
				$post_thumbnail_id = get_post_thumbnail_id( $product->id );
				$post_thumnail_url=get_the_post_thumbnail_url( $product->id, 'medium' );
			}
 		?>
      <a class="half-image product-image" href="<?php the_permalink();?>" style="background-image: url('<?php echo $post_thumnail_url;?>')"></a>
      <?php if($product->is_on_sale()){?>
        <span class="label-top label-sale">Sale</span>
      <?php } ?>
		<?php
		/**
		 * woocommerce_before_shop_loop_item hook.
		 *
		 * @hooked woocommerce_template_loop_product_link_open - 10
		 */
		do_action( 'woocommerce_before_shop_loop_item' );

		/**
		 * woocommerce_before_shop_loop_item_title hook.
		 *
		 * @hooked woocommerce_show_product_loop_sale_flash - 10
		 * @hooked woocommerce_template_loop_product_thumbnail - 10
		 */
		
		//remove_action('woocommerce_template_loop_product_thumbnail');
		//do_action( 'woocommerce_before_shop_loop_item_title' );

		/**
		 * woocommerce_after_shop_loop_item hook.
		 *
		 * @hooked woocommerce_template_loop_product_link_close - 5
		 * @hooked woocommerce_template_loop_add_to_cart - 10
		 */
		//do_action( 'woocommerce_after_shop_loop_item' );
$product_url=site_url('/dashboard/product/?action=edit&id='.get_the_ID() );
		?>
        <div class="cart-btn"><a rel="nofollow" href="<?php echo $product_url;?>" class="button product_type_simple edit_product  ajax_add_to_cart">Edit</a></div>
		</div>
		<div class="product-info-cntr">
		<?php
		/**
		 * woocommerce_shop_loop_item_title hook.
		 *
		 * @hooked woocommerce_template_loop_product_title - 10
		 */
		//do_action( 'woocommerce_shop_loop_item_title' );
		
		?>
		<h4><a href="<?php echo $product_url; ?>"><?php the_title(); ?></a></h4>
		<?php

		/**
		 * woocommerce_after_shop_loop_item_title hook.
		 *
		 * @hooked woocommerce_template_loop_rating - 5
		 * @hooked woocommerce_template_loop_price - 10
		 */
		do_action( 'woocommerce_after_shop_loop_item_title' );
		?>
		</div>
	</div>
</li>
