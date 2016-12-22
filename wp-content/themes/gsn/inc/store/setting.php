<?php 
/*
Class GsnProduct

*/
class GsnSetting{
	public $id,$logo,$selected_theme;
	public function __construct(){
		// add ajax function for out product stock process
		add_action( 'wp_ajax_gsn_add_store_setting', array($this,'add_store_setting') );
		add_action( 'wp_ajax_nopriv_gsn_add_store_setting', array($this,'add_store_setting') );
	}
	/*
	*function for get store settings 
	*/
	public function get($author_id=""){
		global $store;
		if($author_id==""){
			$author_id=$store->user_id;
		}
		$args = array(
		  'numberposts' =>1,
		  'post_type'   => 'store_setting',
		  'post_author' =>$author_id,
		);
		$post=array_shift(get_posts($args));
		$post_metas=get_post_meta($post->ID);
		$this->id=$post->ID;
		$this->logo=array_shift($post_metas['logo']);
		$this->selected_theme=array_shift($post_metas['selected_theme']);
		return $this;
	}
	
	/*
	*function for get available theme 
	*/
	public function available_theme(){
		$args = array(
		  'posts_per_page' => -1,
		  'post_type'   => 'theme_color_setting'
		);
		return get_posts($args);
	}
	/*
	*function for add store Settings
	*/
	public function add_store_setting(){
		$response=array();
		try{
			if(!empty($_POST['formdata'])){
				parse_str($_POST['formdata'], $datas);
				
				$v = new Valitron\Validator($datas);
				//$v->rule('required', 'name');
				if($v->validate()) {
					global $store;					
					$post_id = wp_insert_post( array(
							'post_author' => $store->user_id,
							'post_title' => $store->storeName,
							'post_status' => 'publish',
							'post_type' => "store_setting",
						) );
						
					foreach($datas as $key=>$value){
						update_post_meta($post_id,$key,$value);
						
					}
					$response['status']="success";
					$response['code']='200';
					$response['msg']="successfully added";
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
}
global $gsnSettingsClass;
$gsnSettingsClass =new GsnSetting();