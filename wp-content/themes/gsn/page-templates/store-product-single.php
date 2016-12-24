<?php
/**
 * Template Name: Store Product Single
 *
 * @package GSN
 * @since GSN 1.0
 */
 get_header();
 $prodClass=new gsnProduct();
 $product=$prodClass->get_store_product();
 $attachment_ids = $product->get_gallery_attachment_ids();
 $stock_in=$prodClass->stock_in_list($product->id);
 $stock_out=$prodClass->stock_out_list($product->id);
 $available_stock=$product->get_stock_quantity();
 $attributes=get_post_meta($product->id,"_product_attributes",true);
 
//echo "<pre>";
//var_dump(get_post_meta($product->id));
 ?>
 
 <section>
 <h1><?php echo $product->post->post_title; ?> <a href="<?php echo site_url("/dashboard/?pid=".$product->id."&action=edit");?>" class="btn btn-default">Edit</a> 
 <?php if($product->is_featured()){?>
 <button class="btn btn-danger remove_product_feature" data-product_id="<?php echo $product->id;?>">Remove Feature</button>
 <?php }else{ ?>
 <button class="btn btn-primary make_product_feature" data-product_id="<?php echo $product->id;?>">Make Feature</button>
 <?php } ?>
 </h1>
 <div><?php echo apply_filters('the_content',$product->post->post_content);?></div>
 <div> Price : <?php echo $product->get_price();?></div>
 <div> Available Stock : <?php echo $product->get_stock_quantity();?></div>
 <div> Total Sales : <?php echo get_post_meta($product->post->ID,'total_sales',true);?></div>
 <div>
 	<?php
	 if(has_post_thumbnail($product->post->ID)){
		echo get_the_post_thumbnail( $product->post->ID, 'thumbnail' );
	}?>

 </div>
 </section>
 
 
 <section>
 <h3>Sales Product</h3>
 
 <form name="set_sale_product_form" id="set_sale_product_form">
  <!-- Row start -->
    <div class="form-group row">
      <label for="qty" class="col-sm-2 col-form-label col-form-label-sm">Product Price:</label>
      <div class="col-sm-10"><?php echo get_woocommerce_currency_symbol();?> <?php echo $product->regular_price;?></div>
    </div>
    <!-- Row end -->
    <!-- Row start -->
    <div class="form-group row">
      <label for="qty" class="col-sm-2 col-form-label col-form-label-sm">Product Sales Price:</label>
      <div class="col-sm-10">
      <?php echo get_woocommerce_currency_symbol();?> 
        <input type="text" class="form-control form-control-sm" value="<?php echo $product->sale_price;?>" name="sale_price" id="sale_price" placeholder="Sales Price">
      </div>
    </div>
    <!-- Row end -->
    <!-- Row start -->
    
    <!-- Row start -->
    <div class="form-group row">
      <label for="qty" class="col-sm-2 col-form-label col-form-label-sm">Sales Start:</label>
      <div class="input-daterange input-group col-sm-8" id="datepicker">
      <?php 
	  $start_date=get_post_meta($product->id, '_sale_price_dates_from', true);
	  $end_date=get_post_meta($product->id, '_sale_price_dates_to', true);
	  ?>
            <input type="text" class="input-sm form-control" value="<?php echo (!empty($start_date))?date('Y-m-d',$start_date):"";?>" name="sale_start" />
            <span class="input-group-addon">to</span>
            <input type="text" class="input-sm form-control" value="<?php echo (!empty($end_date))?date('Y-m-d',$end_date):"";?>"  name="sale_end" />
        </div>
    </div>
    <!-- Row end -->
    <input type="hidden" name="product_id" value="<?php echo $product->id;?>">
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
 
 </section>
 
 
 
 
 
 <section>
 <h2>Specification</h2>
 <?php foreach($attributes as $attribute){
	 $att_name=explode('_',$attribute['name']);
	 array_shift($att_name);
	 $att_name=ucfirst(trim(implode(" ",$att_name)));
	 ?>
	 <div><?php echo $att_name; ?>: <?php echo $attribute['value']; ?></div>
 <?php }?>
 </section>
 
 
 <section>
  <h3>Add Stock</h3>
   <div class="container">
   <form name="stock_add_form" id="stock_add_form">
  <!-- Row start -->
    <div class="form-group row">
      <label for="qty" class="col-sm-2 col-form-label col-form-label-sm">Quantity :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-sm" name="qty" id="qty" placeholder="Qty">
      </div>
    </div>
    <!-- Row end -->
    <input type="hidden" name="product_id" id="product_id" value="<?php echo $product->id;?>">
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
   </div>
 
 </section>
 
  <section>
  <h3>Stock Out</h3>
   <div class="container">
   <form name="stock_out_form" id="stock_out_form">
  <!-- Row start -->
    <div class="form-group row">
      <label for="qty" class="col-sm-2 col-form-label col-form-label-sm">Quantity :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-sm" name="qty" id="stock_out_qty" placeholder="Qty">
      </div>
    </div>
    <!-- Row end -->
    <input type="hidden" name="product_id" id="stock_out_product_id" value="<?php echo $product->id;?>">
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
   </div>
 
 </section>
 

 <section>
 	<p>Image gallery</p>
   <?php  foreach( $attachment_ids as $attachment_id ) 
	{
	  echo wp_get_attachment_image($attachment_id, 'thumbnail');

	} ?>
 </section>
 
 <section>
 <p>Stock In</p>
 <?php 
 if(count($stock_in)>0){
 	foreach($stock_in as $list){?>
		<div>Qty : <?php echo $list->qty; ?>, Date : <?php echo $list->transaction_date; ?></div>
		
	<?php }
 }
 ?>
 </section>
 
  <section>
 <p>Stock out</p>
 <?php 
 if(count($stock_out)>0){
 	foreach($stock_out as $list){?>
		<div>Qty : <?php echo $list->qty; ?>, Date : <?php echo $list->transaction_date; ?></div>
		
	<?php }
 }else{
	 echo "We are so tired searching list for stock out";
	 
 }
 ?>
 </section>
 <?php get_footer();?>
 <script>
 
 /* datepicker */
 jQuery('.input-daterange').datepicker({
	 format: "yyyy-mm-dd",
});
 /* Add Stock Process */
jQuery("#set_sale_product_form").validate({
	ignore: ['product_id'],
	rules: {
      product_id: "required",
	  sale_price :{
		  required:true,
		  digits : true,
	  }
    },
  submitHandler: function(form) {
	  var formdata=jQuery(form).serialize();
	   var data= {action: "gsn_set_sale_product_price", formdata : formdata};
	  var response=ajax_call_post(data,'#set_sale_product_form','',function(response){
		  // window.location.href=response.redirectUrl;
			 // location.reload();
			   return false;
	 });
  }
	
});

 /* Add Stock Process */
jQuery("#stock_add_form").validate({
	ignore: ['product_id'],
	rules: {
      product_id: "required",
	  qty :{
		  required:true,
		  digits : true,
		  min :1
	  }
    },
  submitHandler: function(form) {
	  var formdata=jQuery(form).serialize();
	   var data= {action: "gsn_add_stock", formdata : formdata};
	  var response=ajax_call_post(data,'#stock_out_form','',function(response){
		  // window.location.href=response.redirectUrl;
			  location.reload();
			   return false;
	 });
  }
	
});




 /* Add Stock Process */
jQuery("#stock_out_form").validate({
	ignore: ['product_id'],
	rules: {
      product_id: "required",
	  qty :{
		  required:true,
		  digits : true,
		  min :1
	  }
    },
  submitHandler: function(form) {
	  var formdata=jQuery(form).serialize();
	  var data= {action: "gsn_out_stock", formdata : formdata};
	  var response=ajax_call_post(data,'#stock_out_form','',function(response){
		  // window.location.href=response.redirectUrl;
			  location.reload();
			   return false;
	 });
  }
	
});
 </script>