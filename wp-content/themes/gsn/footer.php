<?php 
global $store;
$footer_name="";
$store_page=get_post_meta($post->ID,'store_page',true);
if(!empty($store->id) && $store->is_shop==true){
    	$footer_name="store";
    
}else if((!empty($store_page) && $store_page=="main")){
	$footer_name="main";
}else if((is_page()|| is_archive() || is_tax() || is_shop() || is_product()) &&  $store->is_shop==true){
	global $post;
	$store_page=get_post_meta($post->ID,'store_page',true);
	if((!empty($store_page) && $store_page=="store")|| is_archive() || is_tax()|| is_product()){
		$footer_name="store";
	}
}
get_template_part( 'template-parts/footer/footer',$footer_name);