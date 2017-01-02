<?php
global $gsnProduct, $store;
$storeProducts=$gsnProduct->get_new_product_list(-1);

?>
<section class="products__list-cntr">
  <h3>Product list</h3>   
  <?php    
    $product=new gsnProduct();
  	$products=$product->get_all_store_product();
  	if($products->have_posts()) {
  ?>    
    <div class="product-list-cntr">
       <ul class="products clearfix">
		  <?php while( $products->have_posts() ) : $products->the_post();
             get_template_part( 'template-parts/dashboard/product/product-single','loop'); 
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
