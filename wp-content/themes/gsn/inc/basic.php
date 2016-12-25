<?php 
/**
 * Enqueue styles.
 *link vendor css file  on top
 */
function enquee_style_css(){
	
	if( is_page_template('page-templates/store-product-single.php') ){
		wp_enqueue_style( 'style-min-css', get_template_directory_uri() . '/assets/css/style.min.css', array(), '1.0.0', 'all' );
	}
	
	// Enqueue custom stylesheet//
	wp_enqueue_style( 'style-min-css', get_template_directory_uri() . '/assets/css/style.min.css', array(), '1.0.0', 'all' );
}
add_action( 'wp_enqueue_scripts', 'enquee_style_css' );

/**
 * Enqueue Scripts.
 * link vendor javascript file  on top
 */
function enquee_scripts(){
    wp_enqueue_script( 'jquery-min', get_template_directory_uri() . '/assets/js/vendor/jquery-3.1.1.min.js', array('jquery'), '1.0.0', false ); 
    wp_enqueue_script( 'jquery-validate-min', get_template_directory_uri() . '/assets/js/vendor/jquery.validate.min.js', array('jquery'), '1.0.0', false );
    wp_enqueue_script( 'tether-js', get_template_directory_uri() . '/assets/js/vendor/tether.min.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/js/vendor/bootstrap.min.js', array('jquery'), '1.0.0', true );
	
if( is_page_template('page-templates/store-product-single.php') ){
	wp_enqueue_script( 'bootstrap-datepicker-js', get_template_directory_uri() . '/assets/js/vendor/bootstrap-datepicker.min.js', array('jquery'), '1.0.0', true );
	
	}
	
	// Enqueue custom all js//    
	wp_enqueue_script( 'all-js', get_template_directory_uri() . '/assets/js/custom/all.js', array('jquery'), '1.0.0', true );
	
	
}
add_action( 'wp_enqueue_scripts', 'enquee_scripts' );

/**
 * Enqueue Scripts for admin.
 * link vendor javascript file  on top
 */
function my_enqueue($hook) {
   wp_enqueue_script( 'all-admin-js', get_template_directory_uri() . '/assets/js/admin/all-admin.js', array('jquery','media-upload','thickbox'), '1.0.0', true );
}
add_action( 'admin_enqueue_scripts', 'my_enqueue' );

/*
* Register navigation menu
*/

function gsn_register_my_menus() {
  register_nav_menus(
    array(
      'store-header-menu' => __( 'Store Header Menu' ),
    )
  );
}
add_action( 'init', 'gsn_register_my_menus' );


/*  session */
add_action('init', 'myStartSession', 1);
function myStartSession() {
    if(!session_id()) {
        session_start();
    }
}


// Add custom query variables
add_action('init',function(){
	global $wp;
	$wp->add_query_var('store_product_slug');
	//add_query_arg( 'store_product_slug' );
});

// Add rewrites rules
function gsn_rewrite_basic() {
  add_rewrite_rule('^store-product/([^/]*)/?', 'index.php?pagename=store-product&store_product_slug=$matches[1]', 'top');
}
add_action('init', 'gsn_rewrite_basic');




add_filter('term_link', 'term_link_filter', 10, 3);
function term_link_filter( $url, $term, $taxonomy ) {
	$top_level_category=get_term_top_most_parent($term->term_id,$taxonomy);
    return str_replace($top_level_category->slug."/","",$url );
}


// determine the topmost parent of a term
function get_term_top_most_parent($term_id, $taxonomy){
    // start from the current term
    $parent  = get_term_by( 'id', $term_id, $taxonomy);
    // climb up the hierarchy until we reach a term with parent = '0'
    while ($parent->parent != '0'){
        $term_id = $parent->parent;
        $parent  = get_term_by( 'id', $term_id, $taxonomy);
    }
    return $parent;
}



function _custom_nav_menu_item( $title, $url, $order, $parent = 0 ){
  $item = new stdClass();
  $item->ID = 1000000 + $order + parent;
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

// define the customize_nav_menu_available_items callback 
function filter_customize_nav_menu_available_items( $items, $menu, $arg ) {
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
			$new_item_array[]=_custom_nav_menu_item('Categories','', $order,0);
				foreach ( $terms as $new_item_data ) {
				
				$order=$new_item_data->term_id;
				if($storeParentCat->term_id==$new_item_data->parent){
					$order_parent=1000000 + $new_item_data->parent;
				}else{
				
					$order_parent=1000000 + $new_item_data->parent;
				}
				
				$term_link=get_term_link($new_item_data->term_id,'product_cat');
				$item = _custom_nav_menu_item($new_item_data->name, $term_link,$order,$order_parent );
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
	
	
	};
// add the filter 
add_filter( 'wp_get_nav_menu_items', 'filter_customize_nav_menu_available_items', 10, 3 );








// Encrypt Function
function mc_encrypt($encrypt, $key){
    $encrypt = serialize($encrypt);
    $iv = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC), MCRYPT_DEV_URANDOM);
    $key = pack('H*', $key);
    $mac = hash_hmac('sha256', $encrypt, substr(bin2hex($key), -32));
    $passcrypt = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $encrypt.$mac, MCRYPT_MODE_CBC, $iv);
    $encoded = base64_encode($passcrypt).'|'.base64_encode($iv);
    return $encoded;
}
// Decrypt Function
function mc_decrypt($decrypt, $key){
    $decrypt = explode('|', $decrypt.'|');
    $decoded = base64_decode($decrypt[0]);
    $iv = base64_decode($decrypt[1]);
    if(strlen($iv)!==mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)){ return false; }
    $key = pack('H*', $key);
    $decrypted = trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, $decoded, MCRYPT_MODE_CBC, $iv));
    $mac = substr($decrypted, -64);
    $decrypted = substr($decrypted, 0, -64);
    $calcmac = hash_hmac('sha256', $decrypted, substr(bin2hex($key), -32));
    if($calcmac!==$mac){ return false; }
    $decrypted = unserialize($decrypted);
    return $decrypted;
}