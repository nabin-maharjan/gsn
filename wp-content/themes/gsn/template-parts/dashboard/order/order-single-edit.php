<?php
$id=$_GET['id'];
$store_order=new WC_Order($id);
if(empty($store_order->post)){
	return;	
}
?>
<section class="products__list-cntr">
<div class="container">
	<div class="row">
    <h3>Order #<?php echo $store_order->get_order_number();?> Details</h3>
    	<div class="col-sm-6">
            <h4>Basic Information </h4>
            <p>Payment via <?php echo get_post_meta( $store_order->id,'_payment_method_title',true);?> on <?php echo $store_order->order_date;?> </p>
    <p>Order Status : <?php echo $store_order->get_status();?></p>
        </div>
        
        <div class="col-sm-6">
        <h4>Billing Information</h4>
		<p><?php echo $store_order->get_formatted_billing_address();?></p>
        </div>
    </div>
</div>

</section>
<?php echo "<pre>"; var_dump($store_order); ?>
