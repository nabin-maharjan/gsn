<?php
global $gsnOrder, $store;
$post_per_page=20;
$order_status="any";
if(!empty($_GET['action']) && $_GET['action']=="view"){
	if(!empty($_GET['status'])){
		$status_array=array('completed','on-hold','failed','processing','cancelled','pending');
		if(in_array($_GET['status'],$status_array)){
			$order_status="wc-".$_GET['status'];
		}
	}
}


 if(!empty($_GET['search'])){
	$storeOrders=$gsnOrder->get_search_order(sanitize_text_field($_GET['search']),$post_per_page,$order_status);
}else{
	$storeOrders=$gsnOrder->get_all_order($post_per_page,$order_status);
}
?>
<section class="products__order-cntr">
<h3>Orders list</h3>    
  <div class="filter-container">
    <div class="container">
      <div class="filter__items clearfix">
        <form action="<?php echo site_url('/dashboard/order/'); ?>" class="order-search-form fr"  method="get">
          <input type="text" name="id"  class="form-control form-control-sm" placeholder="Search order">
          <input type="hidden" name="action"  class="form-control form-control-sm" value="edit">
          <button type="submit" class="btn btn-primary product-search-btn">Search</button>
        </form>
        <!-- /.product-search-form -->
      </div>
    </div> 
  </div> 
  <!-- /.filter-container -->  
  <?php    
  	if($storeOrders->have_posts()) {
  ?> 
   
  <div class="order-list-cntr">
    <ul class="orders clearfix">
		  <?php while( $storeOrders->have_posts() ) : $storeOrders->the_post();
		  
        get_template_part( 'template-parts/dashboard/order/order-single','loop'); 
      ?>
      <?php wp_reset_postdata(); 
      endwhile; ?>
    </ul>
    <?php if(function_exists(gsn_pagination_link)){
				gsn_pagination_link($storeOrders->max_num_pages,$post_per_page);
			}
		?>
  </div>
  <?php  
  	} else {
  		echo "Sorry! we are so tired to search for order which status is ".$_GET['status'];
  	}
  ?>
</section>
<!-- /.products__order-cntr -->
