<?php
global $gsnOrder, $store;
$order_status="any";
if(!empty($_GET['action']) && $_GET['action']=="view"){
	if(!empty($_GET['status'])){
		$status_array=array('completed','on-hold','failed','processing','cancelled','pending');
		if(in_array($_GET['status'],$status_array)){
			$order_status="wc-".$_GET['status'];
		}
	}
}
$storeOrders=$gsnOrder->get_all_order(-1,$order_status);
?>
<section class="products__order-cntr">
  <?php    
  	if($storeOrders->have_posts()) {
  ?> 
  <h3>Orders list</h3>      
  <div class="order-list-cntr">
    <ul class="orders clearfix">
		  <?php while( $storeOrders->have_posts() ) : $storeOrders->the_post();
        get_template_part( 'template-parts/dashboard/order/order-single','loop'); 
      ?>
      <?php wp_reset_postdata(); 
      endwhile; ?>
    </ul>
  </div>
  <?php  
  	} else {
  		echo "Sorry! we are so tired to search for order which status is ".$_GET['status'];
  	}
  ?>
</section>
<!-- /.products__order-cntr -->
