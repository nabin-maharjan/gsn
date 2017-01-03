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
	public function get_all_order($count=-1,$post_status="any"){
		global $store;
		$args = array(
				'post_type'      => 'shop_order',
				'posts_per_page' => $count,
				'post_status' =>$post_status,
			    'author'=>$store->user_id,
			);
			return new WP_Query( $args );
	}
	/*
	*Function All  order count
	*/
	public function get_all_order_count(){
		$all_order=$this->get_all_order();
		return $all_order->found_posts;
	}
	/*
	*Function All  order count
	*/
	public function get_processing_order_count(){
		$processing_order=$this->get_all_order(-1,'wc-proccessing');
		return $processing_order->found_posts;
	}
	
	/*
	*Function All  order count
	*/
	public function get_completed_order_count(){
		$completed_order=$this->get_all_order(-1,'wc-completed');
		return $completed_order->found_posts;
	}
	
	
		
}
global $gsnOrder;
$gsnOrder =new GsnOrder();