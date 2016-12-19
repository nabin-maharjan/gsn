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
 $stock_in=$prodClass->stock_in_list($product->post->ID);
 $stock_out=$prodClass->stock_out_list($product->post->ID);
 echo "<pre>";
 var_dump(get_post_meta($product->id)); die;
 ?>
 <section>
 <h1><?php echo $product->post->post_title; ?></h1>
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