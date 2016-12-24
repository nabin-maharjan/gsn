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