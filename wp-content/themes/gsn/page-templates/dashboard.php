
<?php
/**
 * Template Name: Dashboard
 *
 * @package GSN
 * @since GSN 1.0
 */
 get_header();
 global $store;
 //echo "<pre>";
 //var_dump($store);die;
?>
<section>
<?php
	global $gsnSettingsClass;
	$gsn_themes=$gsnSettingsClass->available_theme();
	$gsn_settings=$gsnSettingsClass->get();

?>
	<h3>Settings</h3>
    <div class="container">
   <form name="store_setting_form" id="store_setting_form">
   <!-- Row start -->
    <div class="form-group row">
      <label for="upload-button" class="col-sm-2 col-form-label col-form-label-sm">Logo</label>
      <div class="col-sm-10">
          <div class="upload_cntr">
          <?php
             if($gsn_settings->logo!=NULL){
                $post_thumnail_url=wp_get_attachment_url($gsn_settings->logo, 'thumbnail' );
            }?>
            <input id="logo" class="image_id" type="hidden" name="logo" value="<?php echo (!empty($gsn_settings->logo))?$gsn_settings->logo:"";?>" />
            <img class="image_src" width="150" src="<?php echo (!empty($post_thumnail_url))?$post_thumnail_url:"";?>">
             <input type="button" class="btn btn-info upload-image-button" value="Upload Image" />
             </div>
          </div>
    </div>
    <!-- Row end -->
   
    <!-- Row start -->
    <div class="form-group row">
      <label  class="col-sm-2 col-form-label col-form-label-sm">Themes</label>
      <div class="col-sm-10">
      <?php 
	  
	   $selected_theme_id=($gsn_settings->selected_theme!=NULL)?$gsn_settings->selected_theme:"";
	  foreach($gsn_themes as $gsn_theme){
		  $theme_image=get_the_post_thumbnail_url($gsn_theme->ID);
		  $default_theme=get_post_meta($gsn_theme->ID,'default_theme',true);// get default theme  check
		  
		  /* theme checked proccess */
		  $theme_checked="";
		  if(!empty($selected_theme_id) && $selected_theme_id==$gsn_theme->ID){
			  $theme_checked="checked";
		  }else if(empty($selected_theme_id) && $default_theme=="yes" ){
			  $theme_checked="checked";
			  
		  }
		?>
      	<label class="checkbox-inline"><input type="radio" name="selected_theme" value="<?php echo $gsn_theme->ID;?>" <?php echo $theme_checked ?>><img src="<?php echo $theme_image; ?>" alt="<?php echo $gsn_theme->post_title;?>" width="150"></label>
      <?php } ?>
      </div>
    </div>
    <!-- Row end -->
    
    <?php if($gsn_settings->id!=NULL){?>
    	<input type="hidden" name="gsn_settings_id"  value="<?php echo $gsn_settings->id;?>">
    <?php }?>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  </div>
</section>





<section>
	<h3>Profile Settings</h3>
    <div class="container">
   <form name="profile_setting_form" id="profile_setting_form">
   
   <!-- Row start -->
    <div class="form-group row">
      <label for="firstName" class="col-sm-2 col-form-label col-form-label-sm">First Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-sm" value="<?php echo (!empty($store->firstName))?$store->firstName:"";?>" name="firstName" id="firstName">
      </div>
    </div>
    <!-- Row end -->
    <!-- Row start -->
    <div class="form-group row">
      <label for="lastName" class="col-sm-2 col-form-label col-form-label-sm">Last Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-sm" value="<?php echo (!empty($store->lastName))?$store->lastName:"";?>" name="lastName" id="lastName">
      </div>
    </div>
    <!-- Row end -->
    <!-- Row start -->
    <div class="form-group row">
      <label for="emailAddress" class="col-sm-2 col-form-label col-form-label-sm">Email Address</label>
      <div class="col-sm-10">
        <input type="text" readonly class="form-control form-control-sm" value="<?php echo (!empty($store->emailAddress))?$store->emailAddress:"";?>" name="emailAddress" id="emailAddress">
      </div>
    </div>
    <!-- Row end -->
    <!-- Row start -->
    <div class="form-group row">
      <label for="mobileNumber" class="col-sm-2 col-form-label col-form-label-sm">Mobile Number</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-sm" value="<?php echo (!empty($store->mobileNumber))?$store->mobileNumber:"";?>" name="mobileNumber" id="mobileNumber">
      </div>
    </div>
    <!-- Row end -->
     <!-- Row start -->
    <div class="form-group row">
      <label for="storeName" class="col-sm-2 col-form-label col-form-label-sm">Store Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-sm" value="<?php echo (!empty($store->storeName))?$store->storeName:"";?>" name="storeName" id="storeName">
      </div>
    </div>
    <!-- Row end -->
    <!-- Row start -->
    <div class="form-group row">
      <label for="panNumber" class="col-sm-2 col-form-label col-form-label-sm">Pan Number</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-sm" value="<?php echo (!empty($store->panNumber))?$store->panNumber:"";?>" name="panNumber" id="panNumber">
      </div>
    </div>
    <!-- Row end -->
    
    <!-- Row start -->
    <div class="form-group row">
      <label class="col-sm-2 col-form-label col-form-label-sm">Location</label>
      <div class="col-sm-10">
        <div class="form-input">
               <input id="pac-input" class="controls" type="text" placeholder="Search Box">
               <div id="map" style="width:100%;height:500px"></div>
                 Selected Location :<span id="selected_location_label"><?php echo (!empty($store->storeFullAddress))?$store->storeFullAddress:"";?></span>
                <input type="hidden" class="form-control" value="<?php echo (!empty($store->storeFullAddress))?$store->storeFullAddress:"";?>" name="storeFullAddress" id="storeFullAddress">
                <input type="hidden" class="form-control" value="<?php echo (!empty($store->latitute))?$store->latitute:"";?>" name="latitute" id="latitute">
                <input type="hidden" class="form-control" value="<?php echo (!empty($store->lognitute))?$store->lognitute:"";?>" name="lognitute" id="lognitute">                  
              </div>
      </div>
    </div>
    <!-- Row end -->
    <?php if($store->id!=NULL){?>
    	<input type="hidden" name="gsn_store_id"  value="<?php echo $store->id;?>">
        <input type="hidden" name="action" value="edit">
    <?php }?>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  </div>
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
	  		$selected_term= (empty($product->post->post_title))?$product->post->post_title:"";
	  
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
 
 
<section>
 <h3>Featured Product</h3>
    <ul class="products">
	<?php
		$args = array(
			'post_type' => 'product',
			'meta_key' => '_featured',
			'meta_value' => 'yes', 
			'posts_per_page' => 6,
			'author'=>$store->user_id
			);
		$loop = new WP_Query( $args );
		if ( $loop->have_posts() ) {
			while ( $loop->have_posts() ) : $loop->the_post();
				wc_get_template_part( 'content', 'product' );
			endwhile;
		} else {
			echo __( 'No products found' );
		}
		wp_reset_postdata();
	?>
</ul>
    
    
    
    
 </section>
 
 <section>
 <h3>New Products</h3>
 
 <ul class="products">
	<?php
		$args = array(
			'post_type' => 'product',
			'posts_per_page' => 12,
			'author'=>$store->user_id
			);
		$loop = new WP_Query( $args );
		if ( $loop->have_posts() ) {
			while ( $loop->have_posts() ) : $loop->the_post();
				wc_get_template_part( 'content', 'product' );
			endwhile;
		} else {
			echo __( 'No products found' );
		}
		wp_reset_postdata();
	?>
</ul><!--/.products-->
 
 </section>

 <?php get_footer(); ?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcldtJlaZ2nGXLR7OnH36zzZs1UEREDTU&libraries=places&callback=myMap"></script>
 <script> 
 
 
  /* Store Setting jQuery validation Procress */
jQuery("#profile_setting_form").validate({
  submitHandler: function(form) {
	  var formdata=jQuery(form).serialize();
	  var data= {action: "gsn_store_profile_setting", formdata : formdata};
	  var response=ajax_call_post(data,"#profile_setting_form",'',function(response){
		 window.location.href=response.redirectUrl;
			 jQuery(form)[0].reset();
			 jQuery('.parent_dropdown_cntr').html(response.dropdown);
			 jQuery('<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong>'+response.msg+'</div>').insertBefore(form);
	 });
  }
}); 
 
 
  /* Store Setting jQuery validation Procress */
jQuery("#store_setting_form").validate({
  submitHandler: function(form) {
	  var formdata=jQuery(form).serialize();
	  var data= {action: "gsn_add_store_setting", formdata : formdata};
	  var response=ajax_call_post(data,"#store_setting_form",'',function(response){
		 //  window.location.href=response.redirectUrl;
			 jQuery(form)[0].reset();
			 jQuery('.parent_dropdown_cntr').html(response.dropdown);
			 jQuery('<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong>'+response.msg+'</div>').insertBefore(form);
	 });
  }
});
 
 jQuery(document).on('click','.remove_attachment_gallery',function(){
	 var galleries_id=jQuery('#image_ids').val();
	 var galleries_ids=galleries_id.split(',');
	 var item_to_remove=jQuery(this).data('pic-id');
	 // Find and remove item from an array
		var i = galleries_ids.indexOf(String(item_to_remove));
		if(i != -1) {
			galleries_ids.splice(i, 1);
		}
	 jQuery('#image_ids').val(galleries_ids);
	 jQuery(this).parent('.attachment-span').remove();
 });
 
 jQuery('#add_product_attributes').on('click',function(){
	var attribute_html= "";
	attribute_html+="<div class=\"form-group row attribute-row\">";
		attribute_html+="<div class=\"col-sm-4\">";
			attribute_html+="<label class=\"col-form-label col-form-label-sm\">Name</label>";
			attribute_html+="<input type=\"text\" class=\"form-control form-control-sm\" name=\"attribute_name[]\">";
		attribute_html+="</div>";
		
		attribute_html+="<div class=\"col-sm-7\">";
			attribute_html+="<label class=\" col-form-label col-form-label-sm\">Value</label>";
			attribute_html+="<textarea class=\"form-control form-control-sm\" name=\"attribute_value[]\"></textarea>";
		attribute_html+="</div>";
		attribute_html+="<div class=\"col-sm-1\">";
			attribute_html+="<label class=\" col-form-label col-form-label-sm\">&nbsp;</label>";
			attribute_html+="<button class=\"btn btn-danger remove-attribute-row\">Remove</button>";
		attribute_html+="</div>";
	attribute_html+="</div>";
	jQuery(attribute_html).appendTo('.product_attribute');
	 
 });
 
 jQuery(document).on('click','.remove-attribute-row',function(){
	 jQuery(this).parents('.attribute-row').remove();
 });
 
 
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
	  var data= {action: "gsn_add_product", formdata : formdata};
	  var response=ajax_call_post(data,"#product_create_form",'',function(response){
				//  window.location.href=response.redirectUrl;
				jQuery(form)[0].reset();
				jQuery('#image_src').attr('src','')
				jQuery('.gallery_image_cntr').html('');
	 });
  }
	
});
 
 /* Login jQuery validation Procress */
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
 </script>