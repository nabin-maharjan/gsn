<?php
global $gsnProduct, $store;
$post_per_page=20;
$storeProducts=$gsnProduct->get_new_product_list($post_per_page);
$category=0;
if(!empty($_GET['category'])){
	$category=$_GET['category'];
}
$title="Product list";
if(!empty($_GET['action']) && $_GET['action']=="view"){
	if(!empty($_GET['type']) && $_GET['type']=="sale"){
		$title="Sale Product list";
		$products=$gsnProduct->get_sale_product_list($post_per_page,$category);
	}else if(!empty($_GET['type']) && $_GET['type']=="feature"){
		$title="Featured Product list";
		$products=$gsnProduct->get_feature_product($post_per_page,$category);
	}else if(!empty($_GET['type']) && $_GET['type']=="draft"){
		$title="Draft Product list";
		$products=$gsnProduct->get_draft_product($post_per_page);
	}else{
		
		$products=NULL;
	}
}else if(!empty($_GET['search'])){
	$products=$gsnProduct->get_search_products(sanitize_text_field($_GET['search']),$post_per_page);
}
if($products==NULL){
	$products=$gsnProduct->get_all_store_product($post_per_page,$category);
}

?>
<section class="products__list-cntr product__landing--list">
  <h3 class="heading20"><?php echo $title;?></h3>
  <div class="filter-container">
    <div class="container">
      <div class="filter__items clearfix">
        <form method="get" class="product-filter-form fl">
         <input type="hidden" name="action" value="view">
         <?php if(!empty($_GET['type'])){ ?>
         <input type="hidden" name="type" value="<?php echo sanitize_text_field($_GET['type']);?>">
         <?php } ?>
            <label>Filter by:</label>
            <?php
			$storeParentCatName=$store->storeName." ".$store->user_id;
			 $storeParentCat=get_term_by( 'name',$storeParentCatName,'product_cat'); 
              //  $selected_term= wp_get_post_terms( $product->id, 'product_cat' );
                $selected_term="";
                //var_dump($storeParentCat); die;
				if($storeParentCat){
					$args = array(
						//'show_count'   => 1,
						'hierarchical' => 1,
						'child_of' =>$storeParentCat->term_id,
						'taxonomy'     => 'product_cat',
						'hide_empty' => false,
						'name'               => 'category',
						'id'                 => 'category',
						'class'              => '',
						'show_option_none'    => 'Category',
						'selected'           => $selected_term->term_id,
					);
					wp_dropdown_categories( $args );
				}
            ?>
           
            <button type="submit" class="btn btn-primary product__filter-btn">Filter</button>
        </form>
        <!-- /.product-filter-form -->
        <form action="<?php echo site_url('/dashboard/product/'); ?>" class="product-search-form fr"  method="get">
          <input type="text" name="search"  class="form-control form-control-sm" placeholder="Search product">
          <button type="submit" class="btn btn-primary product-search-btn">Search</button>
        </form>
        <!-- /.product-search-form -->
      </div>
    </div> 
  </div> 
  <!-- /.filter-container --> 
  <?php
  	if($products->have_posts()) {
  ?>    
    <div class="product-list-cntr">
       <ul class="products clearfix">
		  <?php while( $products->have_posts() ) : $products->the_post();
             get_template_part( 'template-parts/dashboard/product/product-single','loop'); 
           ?>
          <?php wp_reset_postdata(); 
        endwhile; 
		?>
        </ul>
        <?php if(function_exists(gsn_pagination_link)){
				gsn_pagination_link($products->max_num_pages,$post_per_page);
			}
		?>
    </div>
    <!-- /.product-list-cntr -->
  <?php  
  	} else {
  		echo "Sorry! we are so tired to search for product.";
  	}
  ?>
</section>
<!-- /.products__list-cntr -->