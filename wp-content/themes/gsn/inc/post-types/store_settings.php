<?php 
$store_setting = new Custom_Post_Type();
$store_setting->create('Store Setting');

function my_cpt_support_author() {
    add_post_type_support( 'store_setting', 'author' );
}
add_action('init', 'my_cpt_support_author');


/* remove editor from post */
/*add_action('init',function(){
	remove_post_type_support('store_setting','editor');
});*/
global $gsnSettingsClass;
$gsn_themes=$gsnSettingsClass->available_theme();
$available_themes_options=array();
foreach($gsn_themes as $theme){
	$available_themes_options[$theme->ID]=$theme->post_title;
	
}
$store_setting->add_taxonomy( 'Shop Type' );

/* add meta fields to post */
$store_setting->add_meta_box( 
    'Store Setting Info', 
    array(
		'Logo' =>array(
			'name'=>'logo',
			'id'=>'logo',
			'class'=>' test test',
			'type'=>"image",
			),
		'Selected Theme' =>array(
				'name'=>'selected_theme',
				'class'=>' test test',
				'type'=>"radio",
				'options'=>$available_themes_options
				),
		)
		
	);
	

$packages=$gsnSettingsClass->store_packages();
$available_packages=array();
foreach($packages as $package){
	$available_packages[$package['slug']]=$package['name'];
	
}

/* add meta fields to post */
$store_setting->add_meta_box( 
    'Store Package Setting', 
    array(
	
		'Package' =>array(
				'name'=>'selected_package',
				'class'=>' test test',
				'type'=>"radio",
				'show_in_admin_table'=>true,
				'options'=>$available_packages
				),
	
	'Start Date' =>array(
				'name'=>'package_start_date',
				'id'=>'package_start_date',
				'class'=>' test test',
				'type'=>"datepicker",
				'placeholder'=>"",
				'show_in_admin_table'=>true,
				),
		
		'End Date' =>array(
				'name'=>'package_end_date',
				'id'=>'package_end_date',
				'class'=>' test test',
				'type'=>"datepicker",
				'placeholder'=>"",
				'show_in_admin_table'=>true,
				),
		)	
	);

/*
* function to convert date march 11, 2017  to 2017-03-11
*/
function normal_date_to_db_date($date){
	$date=date_create($date);
	return date_format($date,"Y-m-d");
}

/**
 * Save post metadata when a post is saved.
 *
 * @param int $post_id The post ID.
 * @param post $post The post object.
 * @param bool $update Whether this is an existing post being updated or not.
 */
function save_book_meta( $post_id, $post, $update ) {

    /*
     * In production code, $slug should be set only once in the plugin,
     * preferably as a class property, rather than in each function that needs it.
     */
    $post_type = get_post_type($post_id);

    // If this isn't a 'book' post, don't update it.
    if ( "store_setting" != $post_type ) return;
	
	// get previous post instance
	$prev_post_package=get_post_meta($post_id,'selected_package',true);
	$prev_post_package_start=get_post_meta($post_id,'package_start_date',true);
	$prev_post_package_end=get_post_meta($post_id,'package_end_date',true);
	
	// get current post instance
	$curr_post_package=$_POST['selected_package'];
	$curr_post_package_start=$_POST['package_start_date'];
	$curr_post_package_end=$_POST['package_end_date'];

	if(!empty($curr_post_package) &&  $curr_post_package_start &&  $curr_post_package_end){
		global $wpdb;
		if($prev_post_package!=$curr_post_package ||  
		   $prev_post_package_start!=$curr_post_package_start ||
		   $prev_post_package_end != $curr_post_package_end
		  ){
			$insert = $wpdb->insert(
				$wpdb->package_log,
				array(
					'package'=>$curr_post_package,
					'start_date' =>normal_date_to_db_date($curr_post_package_start),
					'end_date' =>normal_date_to_db_date($curr_post_package_end),
					'update_date' =>date('Y-m-d h:m:s'),
					'user_id'=>$_POST['post_author'],
					)
				);	
		}
		if($curr_post_package!=$prev_post_package){
			$wpdb->update(
				$wpdb->store,
				 array(
						'storePackage'=>$curr_post_package
				),
				array('user_id'=>$_POST['post_author'])
			);
		}
	}

}
add_action( 'save_post', 'save_book_meta', 1, 3 );





	
/* add meta fields to post */
/*$store_setting->add_meta_box( 
    'Payment Setting', 
    array(
		'esewa Id' =>array(
			'name'=>'esewaId',
			'id'=>'esewaId',
			'class'=>' test test',
			'type'=>"text",
			'placeholder'=>""
			),
		)
		
	);
	*/
	