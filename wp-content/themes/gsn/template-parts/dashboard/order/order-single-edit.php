<?php
$id=$_GET['id'];
$store_order=new WC_Order($id);
if(empty($store_order->post)){
	return;	
}
$store_order_items=$store_order->get_items();
?>
<section class="order-summary-detail-cntr">
  <div class="container">
	  <div class="row">
      <h3>Order #<?php echo $store_order->get_order_number();?> Details</h3>
    	<div class="col-sm-6">
        <h4>Basic Information</h4>
        <p>Payment via <?php echo get_post_meta( $store_order->id,'_payment_method_title',true);?> on <?php echo $store_order->order_date;?> </p>
        <p>Order Status: <?php echo $store_order->get_status();?></p>
      </div>        
      <div class="col-sm-6">
        <h4>Billing Information</h4>
		    <p><?php echo $store_order->get_formatted_billing_address();?></p>
      </div>
    </div>
  </div>
</section>
<!-- /.order-summary-detail-cntr -->
<section class="products__list-cntr order-purchased-items-cntr">
  <h3>Purchased Item(s)</h3>
  <div class="product-list-cntr">
    <ul class="products clearfix">
      <?php foreach($store_order_items as $item){
		    $product_url=site_url("/dashboard/product/?action=edit&id=".$item['product_id']);
		  ?>
      <li <?php post_class('product-list-item dashboard-product dashboard-product-list'); ?>>
        <div class="product-block">
          <div class="product-image-cntr">
            <?php		
              $post_thumnail_url="";
              if(has_post_thumbnail($item['product_id'])){
                $post_thumbnail_id = get_post_thumbnail_id( $item['product_id'] );
                $post_thumnail_url=get_the_post_thumbnail_url($item['product_id'], 'medium' );
              }
            ?>
            <a class="half-image product-image" href="<?php the_permalink();?>" style="background-image: url('<?php echo $post_thumnail_url;?>')"></a>
            <div class="cart-btn">
              <a rel="nofollow" href="<?php echo $product_url;?>" class="button product_type_simple edit_product  ajax_add_to_cart">Edit</a>
            </div>
          </div>
          <div class="product-info-cntr">
            <h4><a href="<?php echo $product_url; ?>"><?php echo $item['name']; ?></a></h4>
            <h4>Qty: <span><?php echo $item['qty'];?></span></h4>
            <h4>Price: <?php echo woocommerce_price($item['line_total']);?></h4>
          </div>
        </div>
      </li>
      <?php wp_reset_postdata(); }?>
    </ul>
  </div>
</section>
<!-- /.order-purchased-items-cntr -->
<section class="order-payment-info-cntr">
	<h3>Payment Information</h3>
  <div class="container">
    <p>Discount: <?php echo woocommerce_price($store_order->get_total_discount());?></p>
    <p>Shipping: <?php echo woocommerce_price($store_order->get_total_shipping());?></p>
    <p>Order Total: <?php echo woocommerce_price($store_order->get_total());?></p>
  </div>
</section>
<!-- /.order-payment-info-cntr -->