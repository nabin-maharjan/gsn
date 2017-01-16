<?php
/*
Class GsnOrder

*/
class GsnOrder{
	public function __construct(){
		// add the action 
		add_action( 'woocommerce_new_order', array($this,'action_woocommerce_new_order'), 10, 1 ); 
		
		//add ajax function for make product feature
		add_action( 'wp_ajax_gsn_update_order_status', array($this,'update_order_status') );
		add_action( 'wp_ajax_nopriv_gsn_update_order_status', array($this,'update_order_status') );
	}
	
	public function update_order_status(){
		try{
			if(!empty($_POST['formdata'])){
				parse_str($_POST['formdata'], $datas);
				$v = new Valitron\Validator($datas);
				$v->rule('required', array('order_id','order_status'));
				if($v->validate()) {
				//	var_dump($datas); die;
					$store_order=new WC_Order($datas['order_id']);
					$new_status=apply_filters( 'woocommerce_order_get_status', 'wc-' === substr($datas['order_status'], 0, 3 ) ? substr( $datas['order_status'], 3 ) : $datas['order_status']);;
					if($store_order->get_status()=="$new_status"){
						 throw new Exception("Please change status and click update button.");
					}; 
					$note="Manually, ";
					// update order status
					$update_status=$store_order->update_status( $datas['order_status'],$note, true);
					if($update_status){
						$response['status']="success";
						$response['code']='200';
						$response['msg']="Order status changed to ". $new_status;
						//$response['redirectUrl']=site_url("/dashboard/");
					}else{
						 throw new Exception("Error while updating status");
					}
				} else {
						// Errors
						$err_msg=json_encode($v->errors());
					    throw new Exception($err_msg,'406');
					}
			}
			
			}catch(Exception $e){
				$response['status']="error";
				$response['code']=$e->getCode();
				$response['msg']=$e->getMessage();
			}
			echo json_encode($response);die();
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
	public function get_search_order($search){
		global $store;
		$args = array(
				'p'=>$search,
				'post_type'      => 'shop_order',
				//'post_status' =>$post_status,
			    'author'=>$store->user_id,
			);
			return new WP_Query( $args );
	}
	
         
	/*
	* Function to get all Order
	*/
	public function get_all_order($count=-1,$post_status="any"){
		global $store;
		$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
		$args = array(
				'post_type'      => 'shop_order',
				'posts_per_page' => $count,
				'post_status' =>$post_status,
			    'author'=>$store->user_id,
				'paged' => $paged,
     			  'page' => $paged,
			);
			return new WP_Query( $args );
	}
	/*
	*Function All  order count
	*/
	public function get_all_order_count($status='any'){
		$all_order=$this->get_all_order(-1,$status);
		return $all_order->found_posts;
	}
	
		
}
global $gsnOrder;
$gsnOrder =new GsnOrder();