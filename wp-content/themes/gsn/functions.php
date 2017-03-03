<?php
include("vendor/autoload.php");
include("inc/basic.php");
include("inc/boostrap-walker.php");
include("inc/input-fields.php");
include("inc/settings.php");

////////////////////////////////////
/*  Store Register pages */
include("inc/store/register.php");
include("inc/store/category.php");
include("inc/store/product.php");
include("inc/store/order.php");
include("inc/store/cart.php");
include("inc/store/setting.php");
/////////////////////////////////////////
/* for custom post type loads */
include("inc/custom-post-type.php");
$custom_post_types=new Custom_Post_Type();
$custom_post_types->include_all_cpts();
$custom_post_types->add_column_admin();
$custom_post_types->agile_admin_scripts();
//////////////////////////////////
add_theme_support( 'post-thumbnails' );
show_admin_bar( false);
/*  image quality */
add_filter('jpeg_quality', function($arg){return 75;});

/* modify esewa merchant id */
add_filter('esewa_merchant_id_filter','modify_merchant_id',10,1);
function modify_merchant_id($merchant_id){
	global $gsnSettingsClass;
	$gsn_settings=$gsnSettingsClass->get();
	if(!empty($gsn_settings->esewaId)){
		return $gsn_settings->esewaId;	
	}
	return  $merchant_id;
};


/**
 * Hide shipping rates when free shipping is available.
 * Updated to support WooCommerce 2.6 Shipping Zones.
 *
 * @param array $rates Array of rates found for the package.
 * @return array
 */
function change_flat_shipping_rate_based_ongsn( $rates ) {
	foreach ( $rates as $rate_id => $rate ) {
		if ( 'flat_rate' === $rate->method_id ) {
			global $gsnSettingsClass;
			$gsn_settings=$gsnSettingsClass->get();
			$flat_rate=$gsn_settings->flat_rate;
			if(empty($flat_rate)){
				unset($rates[$rate_id]);
			}else{
				$rate->cost=$flat_rate;
			}
			break;
		}
	}
	return  $rates;
}
add_filter( 'woocommerce_package_rates', 'change_flat_shipping_rate_based_ongsn', 100 );
/*
*Add note to flate rate
*@param Object of shipping method
*/
function add_note_under_flat_rate($method){
	if($method->method_id=="flat_rate"){
		global $gsnSettingsClass;
			$gsn_settings=$gsnSettingsClass->get();		
		echo "<div class='flat_rate_note'>".$gsn_settings->flat_rate_note."</div>";
	}
}
add_filter( 'woocommerce_after_shipping_rate', 'add_note_under_flat_rate', 100 );



