<?php 
/* Initialize setting page Class */
$gsn_settings= new addSettingsSection();
/* Add Settings page */
$gsn_settings->create_settings_page(array(
	'page_title' => 'Ad Settings',
	'menu_title' => 'Ad Settings',
	'capability' => 'manage_options',
	'slug' => 'ad_settings',
	'icon' => 'dashicons-admin-plugins',
	'position = 101'
));

/* Normal Package Settings */
$gsn_settings->id="home_page_ad";
$gsn_settings->setting_title="Home Page Ad Settings";
$gsn_settings->section="ad_settings";
$gsn_settings->information="This is home page ad setting.";
$gsn_settings->fields=array(
	array(
			'uid' => 'home_page_newproduct_section_ad',
			'label' => 'New Product section Ad',
			'section' => 'home_page_ad',
			'type' => 'image',
			'options' => false,
			//'placeholder' => 'DD/MM/YYYY',
			//'helper' => 'Does this help?',
			//'supplemental' => 'I am underneath!',
			//'default' => '01/01/2015'
		),
		array(
			'uid' => 'home_page_saleproduct_section_ad',
			'label' => 'Sale Product section Ad',
			'section' => 'home_page_ad',
			'type' => 'image',
			'options' => false,
			//'placeholder' => 'DD/MM/YYYY',
			//'helper' => 'Does this help?',
			//'supplemental' => 'I am underneath!',
			//'default' => '01/01/2015'
		),

);
$gsn_settings->add_setting_section();