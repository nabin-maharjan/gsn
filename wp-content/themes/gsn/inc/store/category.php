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
						global $wpdb, $store;						
						$storeParentCat=get_term_by( 'name', $store->storeName,'product_cat');
						$parent_id=($datas['parent']=="-1")?$storeParentCat->term_id:sanitize_text_field($datas['parent']);						
						$cid = wp_insert_term(
							sanitize_text_field($datas['name']), // the term 
							'product_cat', // the taxonomy
							array(
								'description'=> sanitize_text_field($datas['description']),
								'slug' => sanitize_title($datas['name']),
								'parent' =>$parent_id
							)
						);
						//if(empty($cid
						if(empty($cid->errors)){
							$args = array(
							//'show_count'   => 1,
							'hierarchical' => 1,
							'child_of' =>$storeParentCat->term_id,
							'taxonomy'     => 'product_cat',
							'hide_empty' => false,
							'name'               => 'parent',
							'id'                 => 'parent',
							'class'              => 'form-control form-control-sm',
							'show_option_none'    => 'None',
							'echo'				=>false
						);
						
						$dropdow_cat=wp_dropdown_categories( $args );						
							
							$response['status']="success";
							$response['code']='200';
							$response['msg']="Category successfully added";
							$response['dropdown']=$dropdow_cat;
							//$response['redirectUrl']=site_url("/dashboard/");
						}else{
							throw new Exception("Name provided Category already exists");
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
		
}
global $gsnCategory;
$gsnCategory=new GsnCategory();