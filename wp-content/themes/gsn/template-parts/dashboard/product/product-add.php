<?php
global $gsnProduct, $store;
$storeProducts=$gsnProduct->get_new_product_list(-1);
$product_limit_flag=$store->get_product_limit_status();//check product add limit status

$product_edit=false;
  if(!empty($_GET['id']) && !empty($_GET['action']) &&  $_GET['action']==sanitize_text_field("edit")){
  	$product= new WC_product(sanitize_text_field($_GET['id']));
  	$product_price=get_post_meta($product->id,'_regular_price',true);
  	$product_edit=true;
  }
if($product_limit_flag && !$product_edit){
?>
<section>
	<h3>You limitation has been exceed to add product.</h3>
	<div class="container">
    	<div class="limit-exceed-cntr">
        	<p>
            	<a class="btn btn-primary" href="<?php echo site_url("/dashboard/settings/profile/");?>">Upgrade you package plan</a> Or
                <a  class="btn btn-primary"  href="<?php echo site_url("dashboard/product/");?>">Delete product</a>
             </p>
        </div>
    </div>
</section>
<?php }else{ ?>
<section class="product-add-edit-cntr">
    <h3>Product</h3>
     <div class="container">
     <?php if($product_edit){ ?>
     <div class="row">
    	<div class="col-sm-4 float-sm-right">
            <div>
             <?php if(!$product->is_in_stock()){?>
               <div class="alert alert-warning">
                  <strong>Notice!</strong> This Product is ran out. You can delete this product or add some Stock. 
                </div>
               <?php }?>
               <?php if($store->get_product_limit_status() && $product->post->post_status=="draft"){?>
               <div class="alert alert-warning">
                  <strong>Notice!</strong>Product publishing limitation was exceed. If you want to publish this project, you can draft another published project and publish it. Or upgrade you package plan. 
                </div>
               <?php }?>
            
           		<p>Post Status : <?php echo $product->post->post_status;?></p>
            	<p>Stock Available : <?php echo $product->get_total_stock();?></p>
                
                <?php  if($product->post->post_status=="publish"){ ?>
                <button class="btn btn-danger make_product_draft" data-product_id="<?php echo $product->id;?>">Draft</button>
                <?php }else if($product->post->post_status=="draft" && !$store->get_product_limit_status()){?>
				<button class="btn btn-primary make_product_publish" data-product_id="<?php echo $product->id;?>">Publish</button>
				<?php }?>
				
             <!--div class="product-feature-setting"></div>-->
             <button class="btn btn-danger trash_product" data-product_id="<?php echo $product->id;?>">Delete Product</button>
               <?php if($product->is_featured()){?>
               <button class="btn btn-danger remove_product_feature" data-product_id="<?php echo $product->id;?>">Remove Feature</button>
               <?php }else{ ?>
               <button class="btn btn-primary make_product_feature" data-product_id="<?php echo $product->id;?>">Make Feature</button>
               <?php } ?>
               
               <?php if ( $product->is_on_sale() ) { ?>
                <button class="btn btn-danger remove_product_from_sale" data-product_id="<?php echo $product->id;?>">Remove from sale</button>
               <?php }?>
            </div>
        
        </div>
     
     	<div class="col-sm-8">
     <?php }?>
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
        <?php 
		$storeParentCatName=$store->storeName." ".$store->user_id;
		$storeParentCat=get_term_by( 'name', $storeParentCatName,'product_cat'); 
  	  		$selected_term= wp_get_post_terms( $product->id, 'product_cat' );
  			if(is_array($selected_term)){
  				$selected_term=array_shift($selected_term);
  			}
  	  ?>
          <?php 
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
					'class'              => 'form-control form-control-sm',
					'show_option_none'    => 'None',
					'selected'           => $selected_term->term_id,
				);
				wp_dropdown_categories( $args );
			}
  		?>
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
        <input type="button" class="btn btn-info upload-image-button" value="Upload Image" />
          <input id="image_id" class="image_id" type="hidden" name="image_id" value="<?php echo (!empty($post_thumbnail_id))?$post_thumbnail_id:"";?>" />
          <img class="image_src" width="150" src="<?php echo (!empty($post_thumnail_url))?$post_thumnail_url:"";?>">
           
   		 
           
           </div>
        </div>
      </div>
      <!-- Row end -->
      <!-- Row start -->
      <div class="form-group row">
        <label for="description" class="col-sm-2 col-form-label col-form-label-sm">Short Description</label>
        <div class="col-sm-10">
          <textarea class="form-control form-control-sm" name="short_description" id="short_description"><?php echo (!empty($product->post->post_excerpt))?$product->post->post_excerpt:"";?></textarea>
        </div>
      </div>
      <!-- Row end -->
      
      <!-- Row start -->
      <div class="form-group row">
        <label for="description" class="col-sm-2 col-form-label col-form-label-sm">Description</label>
        <div class="col-sm-10">
          <?php
		  $description=(!empty($product->post->post_content))?$product->post->post_content:"";
  	        echo wp_editor($description,'description');
  	      ?>
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
					if(!empty($pic_id)){
  					$post_thumnail_url=wp_get_attachment_image_src( $pic_id, 'thumbnail' );
  			?>
           		<span class="attachment-span"><img src="<?php echo $post_thumnail_url[0]; ?>"><i class="remove_attachment_gallery" data-pic-id="<?php echo $pic_id;?>" >remove</i></span>
           <?php } } }?>
           </div>
           
           <input  type="button" class="btn btn-info upload-button-multiple add-image-btn" value="Add Image" />
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
    
    <?php if($product_edit){ ?>
    </div>
    
     
        
     </div>
     <?php }?>
     </div>
   </section>
   <input type="hidden" id="product_image_gallery_limit" value="<?php echo $store->get_product_image_limit();?>">
  <?php } ?> 
<script>
/*
*Function To make Product Publish
*/
jQuery('.make_product_publish').on('click',function(){
	var r = confirm("Are you sure! ");
	if (r == true) {
		var product_id=jQuery(this).data('product_id');
		var data= {action: "gsn_publish_product", product_id : product_id};
		  var response=ajax_call_post(data,'.make_product_publish','',function(response){
		  // window.location.href=response.redirectUrl;
			location.reload();
			  // return false;
		 });
	} 	
});

/*
*Function To make Product Publish
*/
jQuery('.make_product_draft').on('click',function(){
	var r = confirm("Are you sure! ");
	if (r == true) {
		var product_id=jQuery(this).data('product_id');
		var data= {action: "gsn_draft_product", product_id : product_id};
		  var response=ajax_call_post(data,'.make_product_publish','',function(response){
		  // window.location.href=response.redirectUrl;
			location.reload();
			  // return false;
		 });
	} 	
});


/*
*Function Remove image from gallery
*/
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
 

 /*
 *Function Remove attribute row
 */
 jQuery(document).on('click','.remove-attribute-row',function(){
	 jQuery(this).parents('.attribute-row').remove();
 });

/*
*Function Add product Attributes
*/
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
 
/*
*Function Product from validate and submit
*/
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
	  var product_content =tinyMCE.activeEditor.getContent();
	  var data= {action: "gsn_add_product", formdata : formdata,product_content:product_content};
	  var response=ajax_call_post(data,"#product_create_form",'',function(response){
		  
		  window.location.reload();
				/*jQuery(form)[0].reset();
				jQuery('.image_src').attr('src','')
				jQuery('.gallery_image_cntr').html('');
				jQuery('.product_attribute').html('');
				/*jQuery('<div class="alert alert-success alert-dismissible"><a class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success!</strong> '+response.msg+'</div>').insertBefore(form);*/
	 },function(){
		  jQuery('html, body').animate({
				scrollTop: jQuery("body").offset().top
			}, 500);
	 });
  }
	
});
</script>