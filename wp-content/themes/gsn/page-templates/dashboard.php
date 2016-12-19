<?php
/**
 * Template Name: Dashboard
 *
 * @package GSN
 * @since GSN 1.0
 */
 get_header();
 global $store;
//var_dump(current_user_can( 'upload_files' ) );die;
 ?>
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
  <h3>Product</h3>
   <div class="container">
   <form name="product_create_form" id="product_create_form">
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
      <label for="category" class="col-sm-2 col-form-label col-form-label-sm">Category</label>
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
			'name'               => 'category',
			'id'                 => 'category',
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
      <label for="description" class="col-sm-2 col-form-label col-form-label-sm">Description</label>
      <div class="col-sm-10">
        <textarea class="form-control form-control-sm" name="description" id="description"></textarea>
      </div>
    </div>
    <!-- Row end -->
    <!-- Row start -->
    <div class="form-group row">
      <label for="price" class="col-sm-2 col-form-label col-form-label-sm">Price</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-sm" name="price" id="price">
      </div>
    </div>
    <!-- Row end -->
    
    <!-- Row start -->
    <div class="form-group row">
      <label for="price" class="col-sm-2 col-form-label col-form-label-sm">Available Quantity</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-sm" name="stock" id="stock">
      </div>
    </div>
    <!-- Row end -->
    
    
    <!-- Row start -->
    <div class="form-group row">
      <label for="upload-button" class="col-sm-2 col-form-label col-form-label-sm">Image</label>
      <div class="col-sm-10">
        <input id="image_id" type="hidden" name="image_id" />
 		 <input id="upload-button" type="button" class="button" value="Upload Image" />
         <img id="image_src" width="150">
         
      </div>
    </div>
    <!-- Row end -->
    
    <!-- Row start -->
    <div class="form-group row">
      <label for="upload-button-multiple" class="col-sm-2 col-form-label col-form-label-sm">Product image gallery</label>
      <div class="col-sm-10">
        <input id="image_ids" type="hidden" name="image_ids" />
 		 <input id="upload-button-multiple" type="button" class="button" value="Upload Image" />
         <div class="gallery_image_cntr"> </div>
      </div>
    </div>
    <!-- Row end -->
    
     
    
    
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
   </div>
 
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

 <?php get_footer(); ?>

 <script> 
  /* Login jQuery validation Procress */
jQuery("#product_create_form").validate({
	ignore: ['image_id'],
	rules: {
      name:"required",
	  category:"required",
	  description: "required",
	  price:{
		  required: true,
		  number :true
		  
	  },
	  stock:{
		  required: true,
		  number :true
	  },
	  image_id: "required"
	  
    },
  submitHandler: function(form) {
	  var formdata=jQuery(form).serialize();
		jQuery.ajax({
         type : "post",
         dataType : "json",
         url :"<?php echo admin_url( 'admin-ajax.php' ); ?>",
         data : {action: "gsn_add_product", formdata : formdata},
         success: function(response) {
            if(response.status == "success") {
             //  window.location.href=response.redirectUrl;
			 jQuery(form)[0].reset();
	  			jQuery('#image_src').attr('src','')
			 	jQuery('.gallery_image_cntr').html('');
			   return false;
            }else {
				// validation error occurs
				if(response.code=="406"){
					var data= jQuery.parseJSON(response.msg);		
					
					jQuery.each(data,function(index,value){
						 if(jQuery('#'+index+'-error').length){
							 jQuery('#'+index+'-error').html();
						 }else{
							 var error_html='<label id="#'+index+'-error" class="error" for="'+index+'">'+value[0]+'</label>';
							 jQuery(error_html).insertAfter('#'+index);
						 }
					});
				}else{
					 jQuery('<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong>'+response.msg+'</div>').insertBefore("#login_form");
					
				}
            }
         }
      })  
  }
	
});
 
 
 
 
 
 
 
 
 
 /* Login jQuery validation Procress */
jQuery("#category_create_form").validate({
	rules: {
      name:"required",
    },
  submitHandler: function(form) {
	  var formdata=jQuery(form).serialize();
		jQuery.ajax({
         type : "post",
         dataType : "json",
         url :"<?php echo admin_url( 'admin-ajax.php' ); ?>",
         data : {action: "gsn_saveCategory", formdata : formdata},
         success: function(response) {
            if(response.status == "success") {
             //  window.location.href=response.redirectUrl;
			 jQuery(form)[0].reset();
			 jQuery('.parent_dropdown_cntr').html(response.dropdown);
			 
			 jQuery('<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong>'+response.msg+'</div>').insertBefore(form);
			   return false;
            }else {
				// validation error occurs
				if(response.code=="406"){
					var data= jQuery.parseJSON(response.msg);		
					
					jQuery.each(data,function(index,value){
						 if(jQuery('#'+index+'-error').length){
							 jQuery('#'+index+'-error').html();
						 }else{
							 var error_html='<label id="#'+index+'-error" class="error" for="'+index+'">'+value[0]+'</label>';
							 jQuery(error_html).insertAfter('#'+index);
						 }
					});
				}else{
					 jQuery('<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong>'+response.msg+'</div>').insertBefore("#login_form");
					
				}
            }
         }
      })  
  }
	
});
 </script>