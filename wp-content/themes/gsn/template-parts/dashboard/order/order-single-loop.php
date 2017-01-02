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
$store_order=new WC_Order(get_the_ID());
/*$billing_address = $order->get_billing_address();
$billing_address_html = $order->get_formatted_billing_address(); // for printing or displaying on web page
$shipping_address = $order->get_shipping_address();
$shipping_address_html = $order->get_formatted_shipping_address();
*/
/*
echo $order->billing_address_1;
    echo $order->billing_address_2;
    echo $order->billing_city;
    echo $order->billing_company;
    echo $order->billing_country;
    echo $order->billing_email;
    echo $order->billing_first_name;
    echo $order->billing_last_name;
    echo $order->billing_phone;
    echo $order->billing_postcode;
    echo $order->billing_state;
    echo $order->cart_discount;
    echo $order->cart_discount_tax;
    echo $order->customer_ip_address;
    echo $order->customer_user;
    echo $order->customer_user_agent;
    echo $order->order_currency;
    echo $order->order_discount;
    echo $order->order_key;
    echo $order->order_shipping;
    echo $order->order_shipping_tax;
    echo $order->order_tax;
    echo $order->order_total;
    echo $order->payment_method;
    echo $order->payment_method_title;
    echo $order->shipping_address_1;
    echo $order->shipping_address_2;
    echo $order->shipping_city;
    echo $order->shipping_company;
    echo $order->shipping_country;
    echo $order->shipping_first_name;
    echo $order->shipping_last_name;
    echo $order->shipping_method_title;
    echo $order->shipping_postcode;
    echo $order->shipping_state;
*/
?>

<li <?php post_class('order-list-item dashboard-order dashboard-order-list col-sm-4'); ?>>
  <div class="order-details-list">
    <p><span>Order ID:</span> #<?php the_ID();?> </p>
    <p><span>Order Date:</span> <?php echo $store_order->order_date; ?> </p>
    <p><span>Order by:</span> <?php echo $store_order->billing_first_name;?> <?php echo $store_order->billing_last_name;?></p>
    <p><span>Email Address:</span> <br> <?php echo $store_order->billing_email;?></p>
    <p><span>Pruchase Item(s):</span> <?php echo count($store_order->get_items());?> </p>
    <a href="<?php echo site_url("/dashboard/order/?action=edit&id=".get_the_ID());?> " class="btn btn-primary view-order-detail">View Detail</a>
  </div>
</li>
