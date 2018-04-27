<?php
global $gsnOrder;
$count_all_order=$gsnOrder->get_all_order_count();
$count_processing_order=$gsnOrder->get_all_order_count('wc-processing');
$count_completed_order=$gsnOrder->get_all_order_count('wc-completed');
$count_on_hold_order=$gsnOrder->get_all_order_count('wc-on-hold');
$count_pending_order=$gsnOrder->get_all_order_count('wc-pending');
$count_cancelled_order=$gsnOrder->get_all_order_count('wc-cancelled');
$count_failed_order=$gsnOrder->get_all_order_count('wc-failed');
$count_pending_order=$gsnOrder->get_all_order_count('wc-pending');
?>
<section class="dashboard-product-cntr">
  <!-- /.product-links-cntr -->
  <div class="summary-cards-cntr clearfix">
    <div class="col-sm-2 summary__card card--small">
      <a href="<?php echo site_url("/dashboard/order/");?>" class="summary-info">
        <div class="">
          <span class="summary-number"><?php echo $count_all_order;?></span>
          <h2>Order(s)</h2>
        </div>
      </a>
    </div>
    <!-- /.summary__card -->
    <div class="col-sm-2 summary__card card--small">
      <a href="<?php echo site_url("/dashboard/order/?action=view&status=completed");?>" class="summary-info">
        <div class="">
          <span class="summary-number"><?php echo $count_completed_order;?></span>
          <h2>Completed Order(s)</h2>
        </div>
      </a>
    </div>
    <!-- /.summary__card -->
    <div class="col-sm-2 summary__card card--small">
      <a href="<?php echo site_url("/dashboard/order/?action=view&status=processing");?>" class="summary-info">
        <div class="">
          <span class="summary-number"><?php echo $count_processing_order;?></span>
          <h2>Processing Order(s)</h2>
        </div>
      </a>
    </div>
    <!-- /.summary__card -->
    <div class="col-sm-2 summary__card card--small">
      <a href="<?php echo site_url("/dashboard/order/?action=view&status=pending");?>" class="summary-info">
        <div class="">
          <span class="summary-number"><?php echo $count_pending_order;?></span>
          <h2>Pending Order(s)</h2>
        </div>
      </a>
    </div>
    <!-- /.summary__card -->
    
    <div class="col-sm-2 summary__card card--small">
      <a href="<?php echo site_url("/dashboard/order/?action=view&status=on-hold");?>" class="summary-info">
        <div class="">
          <span class="summary-number"><?php echo $count_on_hold_order;?></span>
          <h2>On-hold Order(s)</h2>
        </div>
      </a>
    </div>
    <!-- /.summary__card -->
    <div class="col-sm-2 summary__card card--small">
      <a href="<?php echo site_url("/dashboard/order/?action=view&status=cancelled");?>" class="summary-info">
        <div class="">
          <span class="summary-number"><?php echo $count_cancelled_order;?></span>
          <h2>Cancelled Order(s)</h2>
        </div>
      </a>
    </div>
    <!-- /.summary__card -->
    <div class="col-sm-2 summary__card card--small">
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
</section>
<!-- /.dashboard-product-cntr -->
<?php 
		$name="";
		$slug="";
		if(!empty($_GET['type']) && !empty($_GET['type'])=="category"){
			$name="category";
		}else if(!empty($_GET['action']) && $_GET['action']=="edit" && !empty($_GET['id'])){
			$name="edit";
			$slug="-single";
		}else if(!empty($_GET['action'])){
			$name="add";
		}
		get_template_part( 'template-parts/dashboard/order/order'.$slug,$name);  
	?>