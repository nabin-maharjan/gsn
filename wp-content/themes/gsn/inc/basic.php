<?php 
/**
 * Enqueue styles.
 *link vendor css file  on top
 */
function enquee_style_css(){
	// Enqueue custom stylesheet//
	wp_enqueue_style( 'style-min-css', get_template_directory_uri() . '/assets/css/style.min.css', array(), '', 'all' );
}
add_action( 'wp_enqueue_scripts', 'enquee_style_css' );

/**
 * Enqueue Scripts.
 * link vendor javascript file  on top
 */
function enquee_scripts(){
    wp_enqueue_script( 'jquery-min', get_template_directory_uri() . '/assets/js/vendor/jquery-3.1.1.min.js', array('jquery'), '1.0.0', false ); 
	
	 wp_enqueue_script( 'jquery-ui',get_template_directory_uri() . '/assets/js/vendor/jquery-ui.js', array('jquery'), '1.0.0', false ); 
    wp_enqueue_script( 'jquery-validate-min', get_template_directory_uri() . '/assets/js/vendor/jquery.validate.min.js', array('jquery'), '1.0.0', false );
    wp_enqueue_script( 'tether-js', get_template_directory_uri() . '/assets/js/vendor/tether.min.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/js/vendor/bootstrap.min.js', array('jquery'), '1.0.0', true );
	

	wp_enqueue_script( 'bootstrap-datepicker-js', get_template_directory_uri() . '/assets/js/vendor/bootstrap-datepicker.min.js', array('jquery'), '1.0.0', true );
    // wp_enqueue_script( 'custom-scrollbar', get_template_directory_uri() . '/assets/js/vendor/jquery.mCustomScrollbar.concat.min.js', array('jquery'), '1.0.0', true );
	
	if(is_page_template( 'page-templates/register.php')){
		wp_enqueue_script( 'lazylinepainter-js', get_template_directory_uri() . '/assets/js/vendor/jquery.lazylinepainter-1.7.0.min.js', array('jquery'), '1.0.0', true );
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
   wp_enqueue_script( 'all-admin-js', get_template_directory_uri() . '/assets/js/admin/all-admin.js', array('jquery','media-upload','thickbox'), '', true );
   
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
	$exploded_slug=explode(' ',$top_level_category->name);
	$id=$exploded_slug[count($exploded_slug)-1];
    return str_replace($top_level_category->slug."/",$id."/",$url );
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



/**
* is_realy_woocommerce_page - Returns true if on a page which uses WooCommerce templates (cart and checkout are standard pages with shortcodes and which are also included)
*
* @access public
* @return bool
*/
function is_realy_woocommerce_page () {
        if(  function_exists ( "is_woocommerce" ) && is_woocommerce()){
                return true;
        }
        $woocommerce_keys   =   array ( "woocommerce_shop_page_id" ,
                                        "woocommerce_terms_page_id" ,
                                        "woocommerce_cart_page_id" ,
                                        "woocommerce_checkout_page_id" ,
                                        "woocommerce_pay_page_id" ,
                                        "woocommerce_thanks_page_id" ,
                                        "woocommerce_myaccount_page_id" ,
                                        "woocommerce_edit_address_page_id" ,
                                        "woocommerce_view_order_page_id" ,
                                        "woocommerce_change_password_page_id" ,
                                        "woocommerce_logout_page_id" ,
                                        "woocommerce_lost_password_page_id" ) ;
        foreach ( $woocommerce_keys as $wc_page_id ) {
                if ( get_the_ID () == get_option ( $wc_page_id , 0 ) ) {
                        return true ;
                }
        }
        return false;
}


/*
*Function to restrict admin page to  non admin user
*/
function gsn_restrict_admin_page() {
    if( ! current_user_can( 'manage_options' )  && ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) ) {
        wp_redirect( home_url() );
    }
}
add_action( 'admin_init', 'gsn_restrict_admin_page', 1 );
/* 
*Function GSN Pagination 
*/
function gsn_pagination_link($max_num_pages,$pagerRange=20,$paged=0){
			if($paged==0){
				$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
			}
			$big = 999999999; // need an unlikely integer
			$search_for   = array( $big, '#038;' );
			$replace_with = array( '%#%', '&' );
			$pagination_args = array(
				'base'            =>str_replace( $search_for, $replace_with, esc_url( get_pagenum_link( $big ) ) ),
				'format'          => '?paged=%#%',
				'total'           => $max_num_pages,
				'current'         => $paged,
				'show_all'        => False,
				'end_size'        => 1,
				'mid_size'        => $pagerRange,
				'prev_next'       => True,
				'prev_text'       => __('&laquo;'),
				'next_text'       => __('&raquo;'),
				'type'            => 'plain',
				'add_args'        => false,
				'add_fragment'    => ''
			  );
			
			  $paginate_links = paginate_links($pagination_args);
			  if ($paginate_links) {
				echo "<nav class='custom-pagination'>";
				  echo "<span class='page-numbers page-num'>Page " . $paged . " of " . $max_num_pages . "</span> ";
				  echo $paginate_links;
				echo "</nav>";
			  }
			
		}



/**
 * Hide shipping rates when free shipping is available.
 * Updated to support WooCommerce 2.6 Shipping Zones.
 *
 * @param array $rates Array of rates found for the package.
 * @return array
 */
function change_flat_shipping_rate_based_ongsn( $rates ) {
	foreach ( $rates as $rate_id => $rate ) {
		if ( 'flat_rate' === $rate->method_id ) {
			global $gsnSettingsClass;
			$gsn_settings=$gsnSettingsClass->get();
			$flat_rate=$gsn_settings->flat_rate;
			if(empty($flat_rate)){
				unset($rates[$rate_id]);
			}else{
				$rate->cost=$flat_rate;
			}
			break;
		}
	}
	return  $rates;
}
add_filter( 'woocommerce_package_rates', 'change_flat_shipping_rate_based_ongsn', 100 );
/*
*Add note to flate rate
*@param Object of shipping method
*/
function add_note_under_flat_rate($method){
	if($method->method_id=="flat_rate"){
		global $gsnSettingsClass;
			$gsn_settings=$gsnSettingsClass->get();		
		echo "<div class='flat_rate_note'>".$gsn_settings->flat_rate_note."</div>";
	}
}
add_filter( 'woocommerce_after_shipping_rate', 'add_note_under_flat_rate', 100 );


















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