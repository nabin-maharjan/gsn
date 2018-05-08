<?php
$header_name="";
global $store;
 if((is_page()|| is_archive() || is_tax() || is_shop() || is_product()) && $store->is_shop==true){
	global $post;
	$store_page=get_post_meta($post->ID,'store_page',true);
	if((!empty($store_page) && $store_page=="store")|| is_archive() || is_tax()|| is_product() ){
		$header_name="store";
	}else if((!empty($store_page) && $store_page=="main")){
		$header_name="main";
	}

}
get_template_part( 'template-parts/header/header',$header_name); 	

