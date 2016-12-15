<?php
/**
 * Template Name: Dashboard
 *
 * @package GSN
 * @since GSN 1.0
 */
 get_header();
 global $store;
 ?>
 
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
      <div class="col-sm-10">
      <?php $storeParentCat=get_term_by( 'name', $store->storeName,'product_cat');
	  	$args=array(
				'taxonomy' =>'product_cat',
				'child_of' =>$storeParentCat->term_id,
				'hide_empty' => false,
				'hierarchical'=> true,

		
		);
	  	$storeterms = get_terms($args);
	  ?>
        
        <?php 
		$args = array(
			'show_count'   => 1,
			'hierarchical' => 1,
			'child_of' =>$storeParentCat->term_id,
			'taxonomy'     => 'product_cat',
			'hide_empty' => false,
			'name'               => 'parent',
			'id'                 => 'parent',
			'class'              => 'form-control form-control-sm',
			'show_option_all'  =>'None'
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