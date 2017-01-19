<?php
	global $gsnProduct, $store, $gsnCategory, $gsnOrder;
	$storeProducts=$gsnProduct->get_new_product_list(-1);
	$count_category=$gsnCategory->get_count_store_category();
	$count_sale_product=$gsnProduct->get_sale_product_count();
	$count_feature_product=$gsnProduct->get_feature_product_count(-1);
	$count_out_of_stock=$gsnProduct->get_out_of_stock_product_count();
	$count_draft_products=$gsnProduct->get_draft_product_count();
	
	/* order */
	$count_all_order=$gsnOrder->get_all_order_count();
	$count_processing_order=$gsnOrder->get_all_order_count('wc-processing');
	$count_completed_order=$gsnOrder->get_all_order_count('wc-completed');
	$count_on_hold_order=$gsnOrder->get_all_order_count('wc-on-hold');
	$count_pending_order=$gsnOrder->get_all_order_count('wc-pending');
	$count_cancelled_order=$gsnOrder->get_all_order_count('wc-cancelled');
	$count_failed_order=$gsnOrder->get_all_order_count('wc-failed');
	$count_pending_order=$gsnOrder->get_all_order_count('wc-pending');
	
?>
<section class="dashboard-landing-cntr">
  <div class="container">
    <div class="row">
      <div class="dashboard-top">
        <h1 class="dashboard-title">Summary of your store.</h1>
      </div>
      <!-- /.dashboard-top -->
      <div class="summary-cards-cntr clearfix">
        <div class="col-sm-3 summary__card">
      <a href="<?php echo site_url("/dashboard/product/");?>" class="summary-info">
        <div class="">
          <span class="summary-number"><?php echo $storeProducts->found_posts;?></span>
          <h2>Published Products</h2>
        </div>
      </a>
    </div>
        <!-- /.summary__card -->
        
        <div class="col-sm-3 summary__card">
          <a href="<?php echo site_url("/dashboard/product/?type=category");?>" class="summary-info">
            <div class="">
              <span class="summary-number"><?php echo $count_category;?></span>
              <h2>Category</h2>
            </div>
          </a>
        </div>
        <!-- /.summary__card -->
    
        <div class="col-sm-3 summary__card">
          <a href="<?php echo site_url("/dashboard/product/?action=view&type=feature");?>" class="summary-info">
            <div class="">
              <span class="summary-number"><?php echo $count_feature_product;?></span>
              <h2>Feature Product</h2>
            </div>
          </a>
        </div>
        <!-- /.summary__card -->
        
        <!-- /.summary__card -->
        <div class="col-sm-3 summary__card">
          <a href="<?php echo site_url("/dashboard/product/?action=view&type=sale");?>" class="summary-info">
            <div class="">
              <span class="summary-number"><?php echo $count_sale_product;?></span>
              <h2>Product on Sale</h2>
            </div>
          </a>
        </div>
        <!-- /.summary__card -->
        <div class="col-sm-2 summary__card">
      <a href="<?php echo site_url("/dashboard/product/?action=view&type=sale");?>" class="summary-info">
        <div class="">
          <span class="summary-number"><?php echo $count_out_of_stock;?></span>
          <h2>Product out of stock</h2>
        </div>
      </a>
    </div>
   		 <!-- /.summary__card --> 
         <div class="col-sm-2 summary__card">
          <a href="<?php echo site_url("/dashboard/product/?action=view&type=draft");?>" class="summary-info">
            <div class="">
              <span class="summary-number"><?php echo $count_draft_products;?></span>
              <h2>Draft Products</h2>
            </div>
          </a>
        </div>
        <!-- /.summary__card -->
         
         
         
             <div class="col-sm-2 summary__card">
      <a href="<?php echo site_url("/dashboard/order/");?>" class="summary-info">
        <div class="">
          <span class="summary-number"><?php echo $count_all_order;?></span>
          <h2>Order(s)</h2>
        </div>
      </a>
    </div>
            <!-- /.summary__card -->
            <div class="col-sm-2 summary__card">
              <a href="<?php echo site_url("/dashboard/order/?action=view&status=completed");?>" class="summary-info">
                <div class="">
                  <span class="summary-number"><?php echo $count_completed_order;?></span>
                  <h2>Completed Order(s)</h2>
                </div>
              </a>
            </div>
            <!-- /.summary__card -->
            <div class="col-sm-2 summary__card">
              <a href="<?php echo site_url("/dashboard/order/?action=view&status=processing");?>" class="summary-info">
                <div class="">
                  <span class="summary-number"><?php echo $count_processing_order;?></span>
                  <h2>Processing Order(s)</h2>
                </div>
              </a>
            </div>
            <!-- /.summary__card -->
            <div class="col-sm-2 summary__card">
              <a href="<?php echo site_url("/dashboard/order/?action=view&status=pending");?>" class="summary-info">
                <div class="">
                  <span class="summary-number"><?php echo $count_pending_order;?></span>
                  <h2>Pending Order(s)</h2>
                </div>
              </a>
            </div>
            <!-- /.summary__card -->
            
            <div class="col-sm-2 summary__card">
              <a href="<?php echo site_url("/dashboard/order/?action=view&status=on-hold");?>" class="summary-info">
                <div class="">
                  <span class="summary-number"><?php echo $count_on_hold_order;?></span>
                  <h2>On-hold Order(s)</h2>
                </div>
              </a>
            </div>
            <!-- /.summary__card -->
            <div class="col-sm-2 summary__card">
              <a href="<?php echo site_url("/dashboard/order/?action=view&status=cancelled");?>" class="summary-info">
                <div class="">
                  <span class="summary-number"><?php echo $count_cancelled_order;?></span>
                  <h2>Cancelled Order(s)</h2>
                </div>
              </a>
            </div>
            <!-- /.summary__card -->
            <div class="col-sm-2 summary__card">
              <a href="<?php echo site_url("/dashboard/order/?action=view&status=failed");?>" class="summary-info">
                <div class="">
                  <span class="summary-number"><?php echo $count_failed_order;?></span>
                  <h2>Failed Order(s)</h2>
                </div>
              </a>
            </div>
            <!-- /.summary__card -->
         
         

      </div>
      <!-- /.dashboard-summary-cntr -->
    </div>
  </div>
</section>
<!-- /.dashboard-landing-cntr -->
