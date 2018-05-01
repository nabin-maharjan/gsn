<?php 
/* Initialize setting page Class */
$gsn_settings= new addSettingsSection();
/* Add Settings page */
$gsn_settings->create_settings_page(array(
	'page_title' => 'GSN Package Settings',
	'menu_title' => 'GSN Package Settings',
	'capability' => 'manage_options',
	'slug' => 'package_settings',
	'icon' => 'dashicons-admin-plugins',
	'position = 100'
));
global $gsnSettingsClass;
$packages=$gsnSettingsClass->store_packages();// all gsn packages

foreach($packages as $package){
	$package_slug= $package['slug'];
	$gsn_settings->id=$package_slug."_package";
	$gsn_settings->setting_title=$package['name']." Package";
	$gsn_settings->section="package_settings";
	$gsn_settings->information=$package['backend_info'];
	$gsn_settings->fields=array(
		array(
				'uid' => $package_slug.'_package_product',
				'label' => 'Product Number',
				'section' => $package_slug.'_package',
				'type' => 'text',
				'options' => false,
				//'placeholder' => 'DD/MM/YYYY',
				//'helper' => 'Does this help?',
				//'supplemental' => 'I am underneath!',
				//'default' => '01/01/2015'
			),
			array(
				'uid' => $package_slug.'_package_product_image',
				'label' => 'Product Image Number',
				'section' => $package_slug.'_package',
				'type' => 'text',
				'options' => false,
				//'placeholder' => 'DD/MM/YYYY',
				//'helper' => 'Does this help?',
				//'supplemental' => 'I am underneath!',
				//'default' => '01/01/2015'
			),
			array(
				'uid' => $package_slug.'_package_sale_product',
				'label' => 'Sale Product Number',
				'section' => $package_slug.'_package',
				'type' => 'text',
				'options' => false,
				//'placeholder' => 'DD/MM/YYYY',
				//'helper' => 'Does this help?',
				//'supplemental' => 'I am underneath!',
				//'default' => '01/01/2015'
			),
			array(
				'uid' => $package_slug.'_package_gsn_ad',
				'label' => 'Gsn Add Enable',
				'section' => $package_slug.'_package',
				'type' => 'select',
				'options' => array(
					'yes'=>"Yes",
					'no'=>"No"
				),
				//'placeholder' => 'DD/MM/YYYY',
				//'helper' => 'Does this help?',
				//'supplemental' => 'I am underneath!',
				//'default' => '01/01/2015'
			),
			array(
				'uid' => $package_slug.'_package_theme_number',
				'label' => 'Theme selection Number',
				'section' => $package_slug.'_package',
				'type' => 'text',
				'options' =>false,
				//'placeholder' => 'DD/MM/YYYY',
				//'helper' => 'Does this help?',
				//'supplemental' => 'I am underneath!',
				//'default' => '01/01/2015'
			),
			array(
				'uid' => $package_slug.'_package_gsn_feature_shop',
				'label' => 'Gsn Feature Shop',
				'section' => $package_slug.'_package',
				'type' => 'select',
				'options' => array(
					'yes'=>"Yes",
					'no'=>"No"
				),
				//'placeholder' => 'DD/MM/YYYY',
				//'helper' => 'Does this help?',
				//'supplemental' => 'I am underneath!',
				//'default' => '01/01/2015'
			)
	);
	$gsn_settings->add_setting_section();

}