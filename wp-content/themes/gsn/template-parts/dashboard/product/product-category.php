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