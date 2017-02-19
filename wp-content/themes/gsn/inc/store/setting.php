<?php 
/*
Class GsnProduct

*/
class GsnSetting{
	public $id,$logo,$selected_theme,$storePackageSettings;
	public function __construct(){
		// add ajax function for out product stock process
		add_action( 'wp_ajax_gsn_add_store_setting', array($this,'add_store_setting') );
		add_action( 'wp_ajax_nopriv_gsn_add_store_setting', array($this,'add_store_setting') );
		
		/* add custom menu to store header menu */
		// add the filter 
		add_filter( 'wp_get_nav_menu_items', array($this,'filter_customize_nav_menu_available_items'), 10, 3 );	
		
		// Set page template for all dashboard page
		add_action('template_redirect',array($this,'gsn_switch_page_template'));
		
		// Add action to color input 
		add_action( 'admin_enqueue_scripts', array($this,'gsn_add_color_picker'));
	}
	
	
	/* 
	* Store package list
	*/
	public function store_packages(){
		
		$packages=array();
		
		/* Normal Package */
		$packages[]=array(
				'slug'=>'normal',
				'name'=>'Normal',
				'backend_info'=>'This is normal package information.'
		);
		
		/* Bronze Package */
		$packages[]=array(
				'slug'=>'bronze',
				'name'=>'Bronze',
				'backend_info'=>'This is bronze package information.'
		);
		
		/* Silver Package */
		$packages[]=array(
				'slug'=>'silver',
				'name'=>'Silver',
				'backend_info'=>'This is silver package information.'
		);
		
		/* Gold Package */
		$packages[]=array(
				'slug'=>'gold',
				'name'=>'Gold',
				'backend_info'=>'This is gold package information.'
		);
		/* Platinium Package */
		$packages[]=array(
				'slug'=>'platinium',
				'name'=>'Platinium',
				'backend_info'=>'This is platinium package information.'
		);
		
		return $packages;
	}
	
	
public function gsn_add_color_picker( $hook ) {
        // Add the color picker css file       
        wp_enqueue_style( 'wp-color-picker' ); 
		wp_enqueue_script( 'wp-color-picker' );
         
}
	
	
	
function gsn_switch_page_template() {
    global $post;
    // Checks if current post type is a page, rather than a post
	if (is_page())
	{	
			$store_page=get_post_meta($post->ID,'store_page',true);
			if($store_page=="dashboard"){
				$template = TEMPLATEPATH . "/page-templates/dashboard.php";
				if (file_exists($template)) {
					load_template($template);
					exit;
				}
				
			}
	}
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
		$this->facebook=array_shift($post_metas['facebook']);
		$this->twitter=array_shift($post_metas['twitter']);
		$this->googleplus=array_shift($post_metas['googleplus']);
		$this->aboutStore=$post->post_content;
		$this->esewaId=array_shift($post_metas['esewaId']); // esewa ID
		$this->storePackageSettings=$this->get_store_settings(); //get store package settings
		$this->fbPageId=array_shift($post_metas['fbPageId']); //get facebook page Id
		$this->fbAppId=array_shift($post_metas['fbAppId']); //get facebook App ID
		return $this;
	}
	/*
	*Function get store package name
	*Return package array
	*/
	public function get_store_settings(){
		global $store;
		$packageName=$store->storePackage;
		if(empty($packageName)){
			$packageName="normal";	
		}
		$package=array(
			'product'=>get_option($packageName.'_package_product'),
			'product_image'=>get_option($packageName.'_package_product_image'),
			'sale_product'=>get_option($packageName.'_package_sale_product'),
			'gsn_ad'=>get_option($packageName.'_package_gsn_ad'),
			'theme'=>get_option($packageName.'_package_theme_number'),
			'gsn_featured'=>get_option($packageName.'_package_gsn_feature_shop'),
		);
		return $package;
	}
	
	/*
	*function for get available theme 
	*/
	public function available_theme($limit=-1){
		$args = array(
		  'posts_per_page' =>$limit,
		  'post_type'   => 'theme_color_setting',
		  'order'=>'ASC',
		  'orderby'=>'date'
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
						// Update post 37
						  $my_post = array(
							  'ID'           =>$post_id ,
							  'post_content' => $_POST['aboutStore'],
						  );
						
						// Update the post into the database
						  wp_update_post( $my_post );
					}else{
						$post_id = wp_insert_post( array(
							'post_author' => $store->user_id,
							'post_title' => $store->storeName,
							'post_status' => 'publish',
							'post_type' => "store_setting",
							 'post_content' =>$_POST['aboutStore']
						) );
					}
					foreach($datas as $key=>$value){
						update_post_meta($post_id,$key,$value);
						
					}
					//update_post_meta($post_id,$key,$value);
					$response['status']="success";
					$response['code']='200';
					$response['msg']="Successfully Updated";
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