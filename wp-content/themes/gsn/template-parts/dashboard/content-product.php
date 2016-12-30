<?php
global $gsnProduct, $store, $gsnCategory;
$storeProducts=$gsnProduct->get_new_product_list(-1);
$count_category=$gsnCategory->get_count_store_category();
?>
<section>
    <a href="<?php echo site_url("/dashboard/product/?action=add");?>" class="btn btn-primary">Add New Product</a>  
    <a href="<?php echo site_url("/dashboard/product/");?>" class="btn btn-primary">View All Product</a>
    <a href="<?php echo site_url("/dashboard/product/?type=category");?>" class="btn btn-primary">View All Category</a>
    <!-- /.dashboard-top -->
      <div class="summary-cards-cntr clearfix">
        <div class="col-sm-3 summary__card">
          <a href="<?php echo site_url("/dashboard/product/");?>" class="summary-info">
            <div class="">
              <span class="summary-number"><?php echo $storeProducts->found_posts;?></span>
              <h2>Products</h2>
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
      </div>
      <!-- /.dashboard-summary-cntr -->
</section>
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
		get_template_part( 'template-parts/dashboard/product/product'.$slug,$name);  
	?>






   
   