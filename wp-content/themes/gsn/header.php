<?php
$header_name="";
 if(is_page()|| is_archive() || is_tax()){
	global $post;
	$store_page=get_post_meta($post->ID,'store_page',true);
	if((!empty($store_page) && $store_page=="yes")|| is_archive() || is_tax()){
		$header_name="store";
	}
}
get_template_part( 'template-parts/header/header',$header_name); 	

