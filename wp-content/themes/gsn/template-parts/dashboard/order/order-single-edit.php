<?php
$id=$_GET['id'];
global $store;
$store_order=new WC_Order($id);
if(empty($store_order->post)){
echo "We can not found orderd which id is ".$id;	
	return;	
}
if($store->user_id!=$store_order->post->post_author){
echo "We can not found orderd which id is ".$id;	
return;	
}
$store_order_items=$store_order->get_items();
?>
<section class="order-summary-detail-cntr">
  <div class="container">
	  <div class="row">
      <h3 class="heading20">Order #<?php echo $store_order->get_order_number();?> Details</h3>
    	<div class="col-sm-6 order__summary order-summary-basic-info">
        <h4>Basic Information</h4>
        <p>Payment via <?php echo get_post_meta( $store_order->id,'_payment_method_title',true);?> on <?php echo $store_order->order_date;?> </p>
        <p>Order Status:</p>
        <form name="order_status_change_form" id="order_status_change_form" class="order_status_change_form">
         	<select id="order_status" name="order_status" class="">
            <option value="wc-pending" <?php echo ($store_order->post_status=="wc-pending")?"selected":"";?>>Pending Payment</option>
            <option value="wc-processing" <?php echo ($store_order->post_status=="wc-processing")?"selected":"";?>>Processing</option>
            <option value="wc-on-hold" <?php echo ($store_order->post_status=="wc-on-hold")?"selected":"";?>>On Hold</option>
            <option value="wc-completed" <?php echo ($store_order->post_status=="wc-completed")?"selected":"";?>>Completed</option>
            <option value="wc-cancelled" <?php echo  ($store_order->post_status=="wc-cancelled")?"selected":"";?>>Cancelled</option>
            <option value="wc-refunded" <?php echo ($store_order->post_status=="wc-refunded")?"selected":"";?>>Refunded</option>
            <option value="wc-failed" <?php echo  ($store_order->post_status=="wc-failed")?"selected":"";?>>Failed</option>
          </select>
          <input type="hidden" name="order_id" value="<?php echo $store_order->id;?>">
          <button type="submit" class="btn btn-primary btn-sm">Update</button>
        </form>
        <!-- /.order_status_change_form -->
      </div> 
      <!-- /.order-summary-basic-info -->       
      <div class="col-sm-6 order__summary order-summary-billing-info">
        <h4>Billing Information</h4>
		    <p><?php echo $store_order->get_formatted_billing_address();?></p>
      </div>
      <!-- /.order-summary-billing-info -->
    </div>
  </div>
</section>
<!-- /.order-summary-detail-cntr -->
<section class="products__list-cntr order-purchased-items-cntr">
  <h3 class="heading20">Purchased Item(s)</h3>
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
	<h3 class="heading20">Payment Information</h3>
  <div class="container">
    <p>Discount: <?php echo woocommerce_price($store_order->get_total_discount());?></p>
    <p>Shipping: <?php echo woocommerce_price($store_order->get_total_shipping());?></p>
    <p>Order Total: <?php echo woocommerce_price($store_order->get_total());?></p>
  </div>
</section>
<!-- /.order-payment-info-cntr -->
<script>
 /* Add Stock Process */
jQuery("#order_status_change_form").validate({
  submitHandler: function(form) {
	  var formdata=jQuery(form).serialize();
	   var data= {action: "gsn_update_order_status", formdata : formdata};
	  var response=ajax_call_post(data,'#order_status_change_form','',function(response){
			 if(jQuery("div.alert.alert-danger").length){
					jQuery("div.alert.alert-danger").remove();
				}
				if(jQuery("div.alert.alert-success").length){
					jQuery("div.alert.alert-success").remove();
				}
			 jQuery('<div class="alert alert-success alert-dismissible"><a class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success!</strong> '+response.msg+'</div>').insertBefore(form);
			   return false;
	 });
  }
	
});

</script>