<?php 
/**
 * Enqueue styles.
 *link vendor css file  on top
 */
function enquee_style_css(){
	// Enqueue custom stylesheet//
	wp_enqueue_style( 'style-min-css', get_template_directory_uri() . '/assets/css/style.min.css', array(), '1.0.0', 'all' );
}
add_action( 'wp_enqueue_scripts', 'enquee_style_css' );

/**
 * Enqueue Scripts.
 * link vendor javascript file  on top
 */
function enquee_scripts(){

	// Enqueue custom all js//
	wp_enqueue_script( 'all-js', get_template_directory_uri() . '/assets/js/custom/all.js', array(), '1.0.0', true );
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