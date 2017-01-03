<?php
global $gsnOrder, $store;
$storeOrders=$gsnOrder->get_all_order();
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
  		echo "Sorry! we are so tired to search for product.";
  	}
  ?>
</section>
