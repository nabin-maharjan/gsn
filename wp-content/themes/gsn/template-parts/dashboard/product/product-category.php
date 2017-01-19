<?php
	global $store;
	$storeParentCat=get_term_by( 'name', $store->storeName,'product_cat');
	if(!empty($_GET['action']) &&  $_GET['action']=="edit" && !empty($_GET['id'])){
		$selected_cat=sanitize_text_field($_GET['id']);
		$current_cat= get_term( $selected_cat, 'product_cat' ) ;
	}
?>
<section class="dashboard-category-cntr">
  <div class="container">
    <div class="row">
      <div class="col-sm-6 category__list-cntr">
        <h3>Cateory List</h3>
        <ul class="category-lists">
          <?php 
      			$args = array(
  						'hierarchical' => true,
  						'child_of' =>$storeParentCat->term_id,
  						'taxonomy'     => 'product_cat',
  						'hide_empty' => false,
  						'title_li' =>'',
  						//'show_count' => 1,
  						'walker' => new gsn_category_walker_dashboard()
  					);
      			wp_list_categories($args );
      		?>
        </ul>
      </div>
      <!-- /.category__list-cntr -->
      <div class="col-sm-6 category__add-form">
        <h3>Cateory Form</h3>
        <form name="category_create_form" id="category_create_form" class="category_create_form">
          <!-- Row start -->
          <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label col-form-label-sm">Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control form-control-sm" value="<?php echo (!empty($current_cat->name))?$current_cat->name:"";?>" name="name" id="name" placeholder="Name">
            </div>
          </div>
          <!-- Row end --> 
          
          <!-- Row start -->
          <div class="form-group row">
            <label for="login_password" class="col-sm-2 col-form-label col-form-label-sm">Parent</label>
            <div class="col-sm-10 parent_dropdown_cntr" >
              <?php 
      					$args = array(
      						//'show_count'   => 1,
      						'hierarchical' => 1,
      						'child_of' =>$storeParentCat->term_id,
      						'taxonomy'     => 'product_cat',
      						'hide_empty' => false,
      						'name'               => 'parent',
      						'id'                 => 'parent',
      						'class'              => 'form-control form-control-sm',
      						'show_option_none'    => 'None',
      						'selected'           => $current_cat->parent,
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
              <textarea class="form-control form-control-sm" name="description" id="description"><?php echo (!empty($current_cat->description))?$current_cat->description:"";?></textarea>
            </div>
          </div>
          <!-- Row end -->
          <?php if(!empty($_GET['action']) &&  $_GET['action']=="edit" && !empty($_GET['id']) && !empty($current_cat->term_id)){?>
			        <input type="hidden" value="<?php echo $current_cat->term_id;?>" id="term_id" name="term_id">
              <input type="hidden" name="action" value="edit">
              <button type="submit" class="btn btn-primary">Update</button>
		      <?php }else{?>
            <button type="submit" class="btn btn-primary">Submit</button>
          <?php } ?>          
        </form>
        <!-- /.category_create_form -->
      </div>
      <!-- /.category__add-form -->
    </div>
  </div>
</section>
<!-- /.dashboard-category-cntr -->
<script>
 /* Category  jQuery validation Procress */
jQuery("#category_create_form").validate({
	rules: {
      name:"required",
    },
  submitHandler: function(form) {
	  var formdata=jQuery(form).serialize();
	  var data= {action: "gsn_saveCategory", formdata : formdata};
	  var response=ajax_call_post(data,"#category_create_form",'',function(response){
			 //  window.location.href=response.redirectUrl;
			 jQuery(form)[0].reset();
			 jQuery('.parent_dropdown_cntr').html(response.dropdown);
			 
			 jQuery('<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong>'+response.msg+'</div>').insertBefore(form);
	 });
  }
	
});
/*
* Delete category
*/
jQuery('.gsn-delete-category').on('click',function(){
	if(confirm("Are you sure?")==true){
		var data= {action: "gsn_deleteCategory", id : jQuery(this).data('category-id')};
		  var response=ajax_call_post(data,".category-lists",'',function(response){
				 //  window.location.href=response.redirectUrl;
				 location.reload();
		 });
	}
});
</script>
