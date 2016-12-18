<?php
/*
Class GsnProduct

*/
class GsnProduct{
	
	public function __construct(){
		global $wpdb;
		
		/*
		 creating table  stock in
		*/
		$tablename=$wpdb->prefix."stock_in";
		//$wpdb->show_errors(); 
		//check if there are any tables of that name already
		if($wpdb->get_var("show tables like '$tablename'") !== $tablename) 
		{
			$sql = '
			  CREATE TABLE '.$tablename.' (
				id int(11) NOT NULL auto_increment,
				productID BIGINT NOT NULL,
				qty int NOT NULL,
				user_id bigint,
				transaction_date datetime,
				PRIMARY KEY  (id)
			  )';
			dbDelta($sql);
		}
		//register the new table with the wpdb object
		if (!isset($wpdb->stock_in)) 
		{
			$wpdb->stock_in = $tablename; 
			//add the shortcut so you can use $wpdb->stats
			$wpdb->tables[] = str_replace($wpdb->prefix, '', $tablename); 
		}
		
		
		
		/*
		 creating table  stock out
		*/
		$tablename=$wpdb->prefix."stock_out";
		//$wpdb->show_errors(); 
		//check if there are any tables of that name already
		if($wpdb->get_var("show tables like '$tablename'") !== $tablename) 
		{
			$sql = '
			  CREATE TABLE '.$tablename.' (
				id int(11) NOT NULL auto_increment,
				productID BIGINT NOT NULL,
				qty int NOT NULL,
				user_id bigint,
				transaction_date datetime,
				PRIMARY KEY  (id)
			  )';
			dbDelta($sql);
		}
		//register the new table with the wpdb object
		if (!isset($wpdb->stock_out)) 
		{
			$wpdb->stock_out = $tablename; 
			//add the shortcut so you can use $wpdb->stats
			$wpdb->tables[] = str_replace($wpdb->prefix, '', $tablename); 
		}
		
		
		// add ajax function for add product process
			add_action( 'wp_ajax_gsn_add_product', array($this,'add') );
			add_action( 'wp_ajax_nopriv_gsn_add_product', array($this,'add') );
			
			
		}
	
	public function add(){
		//var_dump($_POST); die;
		try{
			if(!empty($_POST['formdata'])){
				parse_str($_POST['formdata'], $datas);
				$v = new Valitron\Validator($datas);
				$v->rule('required', array('name','description','price','stock','image_id'));
				$v->rule('numeric',array('price','stock'));
				if($v->validate()) {
				
					//string(82) "name=product1&category=-1&description=tst&price=1&stock=1&image_id=20&image_ids=22"
					global $store, $wpdb;
					$post_id = wp_insert_post( array(
						'post_author' => $store->user_id,
						'post_title' => sanitize_text_field($datas['name']),
						'post_content' => sanitize_text_field($datas['description']),
						'post_status' => 'publish',
						'post_type' => "product",
					) );
					
					
					set_post_thumbnail( $post_id, $datas['image_id'] );
					/* set category */
					$storeParentCat=get_term_by( 'name', $store->storeName,'product_cat');
					$cat_id=($datas['category']=="-1")?$storeParentCat->term_id:sanitize_text_field($datas['category']);				
					wp_set_object_terms( $post_id, $cat_id, 'product_cat' );
					
					/* add images gallery */
					update_post_meta($post_id,'_product_image_gallery',$datas['image_ids']);
					
					
					wp_set_object_terms( $post_id, 'simple', 'product_type' );
					update_post_meta( $post_id, '_visibility', 'visible' );
					update_post_meta( $post_id, '_stock_status', 'instock');
					update_post_meta( $post_id, 'total_sales', '0' );
					update_post_meta( $post_id, '_downloadable', 'no' );
					update_post_meta( $post_id, '_virtual', 'yes' );
					update_post_meta( $post_id, '_regular_price', '' );
					update_post_meta( $post_id, '_sale_price', $datas['price'] );
					update_post_meta( $post_id, '_purchase_note', '' );
					update_post_meta( $post_id, '_featured', 'no' );
					update_post_meta( $post_id, '_weight', '' );
					update_post_meta( $post_id, '_length', '' );
					update_post_meta( $post_id, '_width', '' );
					update_post_meta( $post_id, '_height', '' );
					update_post_meta( $post_id, '_sku', '' );
					update_post_meta( $post_id, '_product_attributes', array() );
					update_post_meta( $post_id, '_sale_price_dates_from', '' );
					update_post_meta( $post_id, '_sale_price_dates_to', '' );
					update_post_meta( $post_id, '_price',  $datas['price'] );
					update_post_meta( $post_id, '_sold_individually', '' );
					update_post_meta( $post_id, '_manage_stock', 'yes' );
					update_post_meta( $post_id, '_backorders', 'no' );
					update_post_meta( $post_id, '_stock',  $datas['stock'] );
					
					
					/* insert to stock in table */
					$stock_in_args=array(
						'productID' =>$post_id,
						'qty'=>$datas['stock'],
						'user_id'=>$store->user_id,
						'transaction_date'=> date('Y-m-d H:i:s')
					);
					$insert_stock = $wpdb->insert($wpdb->stock_in, $stock_in_args);
					
					
					
					
					$response['status']="success";
					$response['code']='200';
					$response['msg']="weldone !!!!";
					//$response['redirectUrl']=site_url("/dashboard/");

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
	* list of all stock in of specifi product
	* @param : product id
	*/
	public function stock_in_list($product_id,$user_id=""){
		global $wpdb,$store;
		if($user_id==""){
			$user_id=$store->user_id;
		}
		$query=$wpdb->prepare("select * from ".$wpdb->stock_in ." where productID=%s and user_id=%s",$product_id,$user_id); // Prepare query
		return $wpdb->get_results($query );	
	}
	
	/*
	* list of all stock in of specifi product
	* @param : product id
	*/
	public function stock_out_list($product_id,$user_id=""){
		global $wpdb,$store;
		if($user_id==""){
			$user_id=$store->user_id;
		}
		$query=$wpdb->prepare("select * from ".$wpdb->stock_out ." where productID=%s and user_id=%s",$product_id,$user_id); // Prepare query
		return $wpdb->get_results($query );	
	}
	
	
	
	
	
	public function get_all_store_product(){
		
		global $store;
		$args=array( 
				'post_type' => array('product', ),
				 'posts_per_page' => -1 ,
				 'author'=>$store->user_id
				 );
		return new WP_Query($args);
	}
	
	public function get_store_product(){
		
		$product_slug=get_query_var('store_product_slug');
		global $store;
		$args=array( 
				'post_type' => array('product', ),
				 'posts_per_page' => 1 ,
				 'author'=>$store->user_id,
				 'name'=>$product_slug
				 );
		 $products=new WP_Query($args);
		 if(!empty($products->posts[0])){
			 return  new WC_product($products->posts[0]->ID);
		 }
		 return false;
	}
	
	
}
new GsnProduct();