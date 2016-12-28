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
		// add the filter 
		add_filter( 'wp_get_nav_menu_items', array($this,'filter_customize_nav_menu_available_items'), 10, 3 );	
	}
	
	/*
	*Fucntion to add custom item to store header menu
	*/
	
public function _custom_nav_menu_item( $title, $url, $order, $parent = 0 ){
  $item = new stdClass();
  $item->ID = 1000000 + $order;
  $item->db_id = $item->ID;
  $item->title = $title;
  $item->url = $url;
  $item->menu_order = $order;
  $item->menu_item_parent = $parent;
  $item->type = '';
  $item->object = '';
  $item->object_id = '';
  $item->classes = array();
  $item->target = '';
  $item->attr_title = '';
  $item->description = '';
  $item->xfn = '';
  $item->status = '';
  return $item;
}

/* 
*define the customize_nav_menu_available_items callback 
*/
public function filter_customize_nav_menu_available_items( $items, $menu, $arg ) {
	global $store;
	$storeParentCat=get_term_by( 'name', $store->storeName,'product_cat');
		$sub_term=get_term_children($storeParentCat->term_id, 'product_cat'); 
		if(count($sub_term)>0){
			$term_args = array(
							'taxonomy'     => 'product_cat',
							'depth' =>0,
							'pad_counts'   => false,
							'hierarchical' => true,
							'title_li'     => false,
							'hide_empty' => false,
							'child_of' =>$storeParentCat->term_id,
							'echo' =>false,
			);
			
			$terms=get_terms($term_args);
			$new_item_array=array();
			$order=$storeParentCat->term_id;
			$new_item_array[]=$this->_custom_nav_menu_item('Categories','', $order,0);
			foreach ( $terms as $new_item_data ) {
				$order=$new_item_data->term_id;
				if($storeParentCat->term_id==$new_item_data->parent){
					$order_parent=1000000 + $new_item_data->parent;
				}else{
				
					$order_parent=1000000 + $new_item_data->parent;
				}
				
				$term_link=get_term_link($new_item_data->term_id,'product_cat');
				$item = $this->_custom_nav_menu_item($new_item_data->name, $term_link,$order,$order_parent );
				$new_item_array[] = $item;
					//$menu_order++;
				}
				foreach($items as $item){
					$new_item_array[]=$item;
				}
			return $new_item_array;
		}else{
			return $items;
		}
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
		  'author' =>$author_id,
		);
		$posts=get_posts($args);
		$post=array_shift($posts);
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
				$edit_flag=false;
				if(!empty($datas['action']) && $datas['action']=="edit"){
					$edit_flag=true;
				}
				$v = new Valitron\Validator($datas);
				//$v->rule('required', 'name');
				if($v->validate()) {
					global $store;	
					if($edit_flag){
						$post_id =$datas['gsn_settings_id'];
					}else{
						$post_id = wp_insert_post( array(
							'post_author' => $store->user_id,
							'post_title' => $store->storeName,
							'post_status' => 'publish',
							'post_type' => "store_setting",
						) );
					}
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