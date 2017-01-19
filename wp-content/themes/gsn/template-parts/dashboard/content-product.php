<?php
global $gsnProduct, $store, $gsnCategory;
$storeProducts=$gsnProduct->get_new_product_list(-1);
$count_category=$gsnCategory->get_count_store_category();
$count_sale_product=$gsnProduct->get_sale_product_count();
$count_feature_product=$gsnProduct->get_feature_product_count(-1);
$count_out_of_stock=$gsnProduct->get_out_of_stock_product_count();
$count_draft_products=$gsnProduct->get_draft_product_count();

//var_dump($out_stock); die;


?>
<section class="dashboard-product-summary-cntr">
  <div class="product-links-cntr clearfix">
    <a href="<?php echo site_url("/dashboard/product/?action=add");?>" class="btn btn-primary">Add New Product</a>  
    <a href="<?php echo site_url("/dashboard/product/");?>" class="btn btn-primary">View All Product</a>
    <a href="<?php echo site_url("/dashboard/product/?type=category");?>" class="btn btn-primary">View All Category</a>
  </div>
  <!-- /.product-links-cntr -->
  <div class="summary-cards-cntr clearfix">
    <div class="col-sm-2 summary__card">
      <a href="<?php echo site_url("/dashboard/product/");?>" class="summary-info">
        <div class="">
          <span class="summary-number"><?php echo $storeProducts->found_posts;?></span>
          <h2>Published Products</h2>
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
      <a href="<?php echo site_url("/dashboard/product/?type=category");?>" class="summary-info">
        <div class="">
          <span class="summary-number"><?php echo $count_category;?></span>
          <h2>Category</h2>
        </div>
      </a>
    </div>
    <!-- /.summary__card -->

    <div class="col-sm-2 summary__card">
      <a href="<?php echo site_url("/dashboard/product/?action=view&type=feature");?>" class="summary-info">
        <div class="">
          <span class="summary-number"><?php echo $count_feature_product;?></span>
          <h2>Feature Product</h2>
        </div>
      </a>
    </div>
    <!-- /.summary__card -->
    
    <!-- /.summary__card -->
    <div class="col-sm-2 summary__card">
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
    
  </div>
  <!-- /.dashboard-summary-cntr -->
</section>
<!-- /.dashboard-product-summary-cntr -->
<?php 
		$name="";
		$slug="";
		if(!empty($_GET['type']) && $_GET['type']=="category"){
			$name="category";
		}else if(!empty($_GET['action']) && $_GET['action']=="edit" && !empty($_GET['id'])){
			$name="edit";
			$slug="-single";
		}else if(!empty($_GET['action']) && $_GET['action']=="add"){
			$name="add";
		}
		get_template_part( 'template-parts/dashboard/product/product'.$slug,$name);  
	?>






   
   