<?php 
$store_setting = new Custom_Post_Type();
$store_setting->create('Store Setting');

/* remove editor from post */
add_action('init',function(){
	remove_post_type_support('store_setting','editor');
});
global $gsnSettingsClass;
$gsn_themes=$gsnSettingsClass->available_theme();
$available_themes_options=array();
foreach($gsn_themes as $theme){
	$available_themes_options[$theme->ID]=$theme->post_title;
	
}
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