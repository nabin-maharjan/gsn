<?php
class GsnCategory{
	
	public function __construct(){
		/* add ajax function for save category*/
			add_action( 'wp_ajax_gsn_saveCategory', array($this,'saveCategory') );
			add_action( 'wp_ajax_nopriv_gsn_saveCategory', array($this,'saveCategory') );
		
		}
		public function saveCategory(){
			$response=array();
			try{
				if(!empty($_POST['formdata'])){
					parse_str($_POST['formdata'], $datas);
					$v = new Valitron\Validator($datas);
					$v->rule('required', 'name');
					if($v->validate()) {
						/* insert to database */
						global $wpdb;
						
						/*
						
						object(WP_Error)#1038 (2) {
							  ["errors"]=>
							  array(1) {
								["term_exists"]=>
								array(1) {
								  [0]=>
								  string(62) "A term with the name provided already exists with this parent."
								}
							  }
							  ["error_data"]=>
							  array(1) {
								["term_exists"]=>
								int(6)
							  }
							}
						
						
						*/
						
						
						$cid = wp_insert_term(
							sanitize_text_field($datas['name']), // the term 
							'product_cat', // the taxonomy
							array(
								'description'=> sanitize_text_field($data['description']),
								'slug' => sanitize_title($datas['name']),
								'parent' =>($datas['parent']>0)?sanitize_text_field($datas['parent']):0
							)
						);
						var_dump($cid);die;
						
						$response['status']="success";
						$response['code']='200';
						$response['msg']="weldone !!!!";
						$response['redirectUrl']=site_url("/dashboard/");
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
		
}
global $gsnCategory;
$gsnCategory=new GsnCategory();