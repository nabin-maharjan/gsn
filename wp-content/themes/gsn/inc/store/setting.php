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
		/* add custom menu to store header menu */
		//add_filter( 'wp_nav_menu_items',array($this, 'gsn_custom_item_store_header_menu'), 1, 2 );
	}
	
	/*
	*Fucntion to add custom item to store header menu
	*/
function gsn_custom_item_store_header_menu ( $items, $args ) {
    if ($args->theme_location == 'store-header-menu') {
		
		global $store;
		$storeParentCat=get_term_by( 'name', $store->storeName,'product_cat');
		$sub_term=get_term_children($storeParentCat->term_id, 'product_cat'); 
		if(count($sub_term)>0){
			$item= '<li class="menu-item menu-item-has-children">Category <ul class="sub-menu">';
			//var_dump($storeParentCat); die;
			/*menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-6 current_page_item menu-item-has-children dropdown menu-item-106*/
				$args = array(
							'taxonomy'     => 'product_cat',
							'depth' =>0,
							'pad_counts'   => false,
							'hierarchical' => true,
							'title_li'     => false,
							'hide_empty' => false,
							'child_of' =>$storeParentCat->term_id,
							'echo' =>false,
			);
			$item.=wp_list_categories($args);
			$item.='</ul></li>';
			$items=$item.$items;
		}
    }
    return $items;
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