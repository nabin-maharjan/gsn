<?php
global $gsnProduct, $store;
$storeProducts=$gsnProduct->get_new_product_list(-1);

?>
<section>
    <a href="<?php echo site_url("/dashboard/product/?action=add");?>" class="btn btn-primary">Add New Product</a>
    <div>Products: <?php echo $storeProducts->found_posts;?></div>
</section>


<section>
   <?php
  $product_edit=false;
  if(!empty($_GET['pid']) && !empty($_GET['action']) &&  $_GET['action']==sanitize_text_field("edit")){
  	$product= new WC_product(sanitize_text_field($_GET['pid']));
  	$product_price=get_post_meta($product->id,'_regular_price',true);
  	$product_edit=true;
  }
   ?>
    <h3>Product</h3>
     <div class="container">
     <form name="product_create_form" id="product_create_form">
    <!-- Row start -->
      <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label col-form-label-sm">Name</label>
        <div class="col-sm-10">
          <input type="text" value="<?php echo (!empty($product->post->post_title))?$product->post->post_title:"";?>" class="form-control form-control-sm" name="name" id="name" placeholder="Name">
        </div>
      </div>
      <!-- Row end -->
      
       <!-- Row start -->
      <div class="form-group row">
        <label for="category" class="col-sm-2 col-form-label col-form-label-sm">Category</label>
        <div class="col-sm-10 parent_dropdown_cntr" >
        <?php $storeParentCat=get_term_by( 'name', $store->storeName,'product_cat'); 
  	  		$selected_term= wp_get_post_terms( $product->id, 'product_cat' );
  			if(is_array($selected_term)){
  				$selected_term=array_shift($selected_term);
  			}
  	  ?>
          
          <?php 
  		//var_dump($storeParentCat); die;
  		$args = array(
  			//'show_count'   => 1,
  			'hierarchical' => 1,
  			'child_of' =>$storeParentCat->term_id,
  			'taxonomy'     => 'product_cat',
  			'hide_empty' => false,
  			'name'               => 'category',
  			'id'                 => 'category',
  			'class'              => 'form-control form-control-sm',
  			'show_option_none'    => 'None',
  			'selected'           => $selected_term->term_id,
  		);
  		
  		wp_dropdown_categories( $args );
  		
  		?>
        </div>
      </div>
      <!-- Row end -->
      
      <!-- Row start -->
      <div class="form-group row">
        <label for="description" class="col-sm-2 col-form-label col-form-label-sm">Description</label>
        <div class="col-sm-10">
          <textarea class="form-control form-control-sm" name="description" id="description"><?php echo (!empty($product->post->post_content))?$product->post->post_content:"";?></textarea>
        </div>
      </div>
      <!-- Row end -->
      <!-- Row start -->
      <div class="form-group row">
        <label for="price" class="col-sm-2 col-form-label col-form-label-sm">Price</label>
        <div class="col-sm-10">
          <input type="text" class="form-control form-control-sm" value="<?php echo (!empty($product_price))?$product_price:"";?>" name="price" id="price">
        </div>
      </div>
      <!-- Row end -->
      <?php if(!$product_edit){ ?>
      <!-- Row start -->
      <div class="form-group row">
        <label for="price" class="col-sm-2 col-form-label col-form-label-sm">Available Quantity</label>
        <div class="col-sm-10">
          <input type="text" class="form-control form-control-sm" name="stock" id="stock">
        </div>
      </div>
      <!-- Row end -->
      
      <?php } ?>
      <!-- Row start -->
      <div class="form-group row">
        <label for="upload-button" class="col-sm-2 col-form-label col-form-label-sm">Image</label>
        <div class="col-sm-10">
         <div class="upload_cntr">
        <?php
  	  $post_thumnail_url="";
  		 if(has_post_thumbnail($product->id)){
  			 $post_thumbnail_id = get_post_thumbnail_id( $product->id );
  			$post_thumnail_url=get_the_post_thumbnail_url( $product->id, 'thumbnail' );
  		}?>
        
          <input id="image_id" class="image_id" type="hidden" name="image_id" value="<?php echo (!empty($post_thumbnail_id))?$post_thumbnail_id:"";?>" />
          <img class="image_src" width="150" src="<?php echo (!empty($post_thumnail_url))?$post_thumnail_url:"";?>">
           
   		 <input type="button" class="btn btn-info upload-image-button" value="Upload Image" />
           
           </div>
        </div>
      </div>
      <!-- Row end -->
      
      <!-- Row start -->
      <div class="form-group row">
        <label for="upload-button-multiple" class="col-sm-2 col-form-label col-form-label-sm">Product image gallery</label>
        <div class="col-sm-10">
         <div class="upload_cntr">
        <?php 
  	  	if(!empty($product)){
  			$pic_galleries=get_post_meta($product->id,'_product_image_gallery',true);
  			$pic_galleries_ids=explode(",",$pic_galleries);
  		}?>

          <input id="image_ids" class="image_ids" type="hidden" name="image_ids" value="<?php echo (!empty($pic_galleries))?$pic_galleries:"";?>" />
   		 
           <div class="gallery_image_cntr">
           	<?php if(!empty($pic_galleries_ids)){ 
  				foreach($pic_galleries_ids as $pic_id){
  					$post_thumnail_url=wp_get_attachment_url( $pic_id, 'thumbnail' );
  			?>
           		<span class="attachment-span"><img src="<?php echo $post_thumnail_url; ?>"><i class="remove_attachment_gallery" data-pic-id="<?php echo $pic_id;?>" >remove</i></span>
           <?php } }?>
           </div>
           
           <input  type="button" class="btn btn-info upload-button-multiple" value="Add Image" />
           </div>
           
           
        </div>
      </div>
      <!-- Row end -->
      
      
      <!-- Row start -->
      <div class="form-group row">
        <label class="col-sm-2 col-form-label col-form-label-sm">Specifications</label>
      </div>
      <!-- Row end -->
      <!-- Row product Attributes cntr start -->
      <div class="product_attribute">
      <?php
  	if(!empty($product)){
  		$product_attributes=get_post_meta($product->id,'_product_attributes',true);
  		foreach($product_attributes as $attribute){
  		 $att_name=explode('_',$attribute['name']);
  		 array_shift($att_name);
  		 $att_name=ucfirst(trim(implode(" ",$att_name)));
  	 ?>
      	<!-- Row start -->
      	<div class="form-group row attribute-row">
              <div class="col-sm-4">
                  <label class="col-form-label col-form-label-sm">Name</label>
                  <input type="text" class="form-control form-control-sm" value="<?php echo (!empty($att_name))?$att_name:"";?>" name="attribute_name[]">
              </div>
              <div class="col-sm-7">
                  <label class=" col-form-label col-form-label-sm">Value</label>
                  <textarea class="form-control form-control-sm" name="attribute_value[]"><?php echo (!empty($attribute['value']))?$attribute['value']:"";?></textarea>
              </div>
              <div class="col-sm-1">
                  <label class=" col-form-label col-form-label-sm">&nbsp;</label>
                  <button class="btn btn-danger remove-attribute-row">Remove</button>
              </div>
          </div>
       	<!-- Row end -->
          <?php } } ?>
      </div>
   	<!-- Row product Attributes cntr end -->
      
      <!-- Row start -->
      <div class="form-group row">
        <div class="col-sm-10">
   		 <button type="button" id="add_product_attributes" class="btn btn-success" >Add Attributes</button>
        </div>
      </div>
      <!-- Row end -->
      <?php if($product_edit){ ?>
      <input type="hidden" name="product_id" value="<?php echo $product->id;?>">
      <input type="hidden" name="action" value="edit">
      <?php }?>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
     </div>
   
   </section>
   
<section>
     <h3>Product list</h3>   
     <?php    
     	$product=new gsnProduct();
  	$products=$product->get_all_store_product();
  	if($products->have_posts()){
  	while( $products->have_posts() ) : $products->the_post();
  		$slug = basename(get_permalink());
  		$product_url=site_url('/store-product/'.$slug );
  	 ?>
  	<?php the_post_thumbnail('thumbnail');?>
  	<h2><a href="<?php echo $product_url;?>"><?php the_title();?></a></h2>
     
      <?php wp_reset_postdata(); 
  	endwhile; 
  	}else{
  		echo "Sorry! we are so tired to search for product.";
  	}
     ?>
   </section>
   
   <section>
    <h3>Cateory</h3>
     <div class="container">
     <form name="category_create_form" id="category_create_form">
    <!-- Row start -->
      <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label col-form-label-sm">Name</label>
        <div class="col-sm-10">
          <input type="text" class="form-control form-control-sm" name="name" id="name" placeholder="Name">
        </div>
      </div>
      <!-- Row end -->
      
       <!-- Row start -->
      <div class="form-group row">
        <label for="login_password" class="col-sm-2 col-form-label col-form-label-sm">Parent</label>
        <div class="col-sm-10 parent_dropdown_cntr" >
        <?php $storeParentCat=get_term_by( 'name', $store->storeName,'product_cat'); ?>
          
          <?php 
  		//var_dump($storeParentCat); die;
  		$args = array(
  			//'show_count'   => 1,
  			'hierarchical' => 1,
  			'child_of' =>$storeParentCat->term_id,
  			'taxonomy'     => 'product_cat',
  			'hide_empty' => false,
  			'name'               => 'parent',
  			'id'                 => 'parent',
  			'class'              => 'form-control form-control-sm',
  			'show_option_none'    => 'None'
  		);
  		
  		wp_dropdown_categories( $args );
  		
  		?>
        </div>
      </div>
      <!-- Row end -->
      
      <!-- Row start -->
      <div class="form-group row">
        <label for="login_password" class="col-sm-2 col-form-label col-form-label-sm">Description</label>
        <div class="col-sm-10">
          <textarea class="form-control form-control-sm" name="description" id="description"></textarea>
        </div>
      </div>
      <!-- Row end -->
      
      
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
     </div>
   
   </section>