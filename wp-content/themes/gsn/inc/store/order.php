<?php
/*
Class GsnOrder

*/
class GsnOrder{
	public function __construct(){
		// add the action 
		add_action( 'woocommerce_new_order', array($this,'action_woocommerce_new_order'), 10, 1 ); 
	}
	/*
	*Function to set store id on new order
	*/
	public function action_woocommerce_new_order( $order_id ) { 
	global $store;
		$arg = array(
			'ID' => $order_id,
			'post_author' => $store->user_id,
		);
		wp_update_post( $arg );
	}
         
	/*
	* Function to get all Order
	*/
	public function get_all_order($count=-1){
		global $store;
		$args = array(
				'post_type'      => 'shop_order',
				'posts_per_page' => $count,
				'post_status' => 'any',
			    'author'=>$store->user_id,
			);
			return new WP_Query( $args );
	}
		
}
global $gsnOrder;
$gsnOrder =new GsnOrder();