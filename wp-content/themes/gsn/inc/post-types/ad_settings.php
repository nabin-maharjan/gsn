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

/*Home page AD  Settings */
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
			'supplemental' => '*( 263px width and 95px height )',
			//'default' => '01/01/2015'
		),
		array(
			'uid' => 'home_page_newproduct_section_ad_link',
			'label' => 'New Product section Ad Link',
			'section' => 'home_page_ad',
			'type' => 'text',
			'options' => false,
			//'placeholder' => 'DD/MM/YYYY',
			//'helper' => 'Url of ad. It will open on new tab.',
			'supplemental' => 'Url of ad. It will open on new tab.',
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
			'supplemental' => '*( 263px width and 95px height )',
			//'default' => '01/01/2015'
		),
		array(
			'uid' => 'home_page_saleproduct_section_ad_link',
			'label' => 'Sale Product section Ad Link',
			'section' => 'home_page_ad',
			'type' => 'text',
			'options' => false,
			//'placeholder' => 'DD/MM/YYYY',
			//'helper' => 'Url of ad. It will open on new tab.',
			'supplemental' => 'Url of ad. It will open on new tab.',
			//'default' => '01/01/2015'
		),
		
		array(
			'uid' => 'home_page_middle_section_left_ad',
			'label' => 'Home page middle section left Ad',
			'section' => 'home_page_ad',
			'type' => 'image',
			'options' => false,
			//'placeholder' => 'DD/MM/YYYY',
			//'helper' => 'Does this help?',
			'supplemental' => '*( 555px width and 70px height )',
			//'default' => '01/01/2015'
		),
		array(
			'uid' => 'home_page_middle_section_left_ad_link',
			'label' => 'Home page middle section left Ad link',
			'section' => 'home_page_ad',
			'type' => 'text',
			'options' => false,
			//'placeholder' => 'DD/MM/YYYY',
			//'helper' => 'Url of ad. It will open on new tab.',
			'supplemental' => 'Url of ad. It will open on new tab.',
			//'default' => '01/01/2015'
		),
		
		array(
			'uid' => 'home_page_middle_section_right_ad',
			'label' => 'Home page middle section right Ad',
			'section' => 'home_page_ad',
			'type' => 'image',
			'options' => false,
			//'placeholder' => 'DD/MM/YYYY',
			//'helper' => 'Does this help?',
			'supplemental' => '*( 555px width and 70px height )',
			//'default' => '01/01/2015'
		),
		array(
			'uid' => 'home_page_middle_section_right_ad_link',
			'label' => 'Home page middle section right Ad link',
			'section' => 'home_page_ad',
			'type' => 'text',
			'options' => false,
			//'placeholder' => 'DD/MM/YYYY',
			//'helper' => 'Url of ad. It will open on new tab.',
			'supplemental' => 'Url of ad. It will open on new tab.',
			//'default' => '01/01/2015'
		),

);
$gsn_settings->add_setting_section();



/*Category page AD Settings */
$gsn_settings->id="category_page_ad";
$gsn_settings->setting_title="Category Page Ad Settings";
$gsn_settings->section="ad_settings";
$gsn_settings->information="This is category page ad setting.";
$gsn_settings->fields=array(
		array(
			'uid' => 'category_page_middle_section_left_ad',
			'label' => 'Category page middle section left Ad',
			'section' => 'category_page_ad',
			'type' => 'image',
			'options' => false,
			//'placeholder' => 'DD/MM/YYYY',
			//'helper' => 'Does this help?',
			'supplemental' => '*( 555px width and 70px height )',
			//'default' => '01/01/2015'
		),
		array(
			'uid' => 'category_page_middle_section_left_ad_link',
			'label' => 'Category page middle section left Ad link',
			'section' => 'category_page_ad',
			'type' => 'text',
			'options' => false,
			//'placeholder' => 'DD/MM/YYYY',
			//'helper' => 'Url of ad. It will open on new tab.',
			'supplemental' => 'Url of ad. It will open on new tab.',
			//'default' => '01/01/2015'
		),
		
		array(
			'uid' => 'category_page_middle_section_right_ad',
			'label' => 'Category page middle section right Ad',
			'section' => 'category_page_ad',
			'type' => 'image',
			'options' => false,
			//'placeholder' => 'DD/MM/YYYY',
			//'helper' => 'Does this help?',
			'supplemental' => '*( 555px width and 70px height )',
			//'default' => '01/01/2015'
		),
		array(
			'uid' => 'category_page_middle_section_right_ad_link',
			'label' => 'Category page middle section right Ad link',
			'section' => 'category_page_ad',
			'type' => 'text',
			'options' => false,
			//'placeholder' => 'DD/MM/YYYY',
			//'helper' => 'Url of ad. It will open on new tab.',
			'supplemental' => 'Url of ad. It will open on new tab.',
			//'default' => '01/01/2015'
		),

);
$gsn_settings->add_setting_section();



/*Category page AD Settings */
$gsn_settings->id="sale_page_ad";
$gsn_settings->setting_title="Sale Page Ad Settings";
$gsn_settings->section="ad_settings";
$gsn_settings->information="This is sale page ad setting.";
$gsn_settings->fields=array(
		array(
			'uid' => 'sale_page_middle_section_left_ad',
			'label' => 'Sale page middle section left Ad',
			'section' => 'sale_page_ad',
			'type' => 'image',
			'options' => false,
			//'placeholder' => 'DD/MM/YYYY',
			//'helper' => 'Does this help?',
			'supplemental' => '*( 555px width and 70px height )',
			//'default' => '01/01/2015'
		),
		array(
			'uid' => 'sale_page_middle_section_left_ad_link',
			'label' => 'Sale page middle section left Ad link',
			'section' => 'sale_page_ad',
			'type' => 'text',
			'options' => false,
			//'placeholder' => 'DD/MM/YYYY',
			//'helper' => 'Url of ad. It will open on new tab.',
			'supplemental' => 'Url of ad. It will open on new tab.',
			//'default' => '01/01/2015'
		),
		
		array(
			'uid' => 'sale_page_middle_section_right_ad',
			'label' => 'Sale page middle section right Ad',
			'section' => 'sale_page_ad',
			'type' => 'image',
			'options' => false,
			//'placeholder' => 'DD/MM/YYYY',
			//'helper' => 'Does this help?',
			'supplemental' => '*( 555px width and 70px height )',
			//'default' => '01/01/2015'
		),
		array(
			'uid' => 'sale_page_middle_section_right_ad_link',
			'label' => 'Sale page middle section right Ad link',
			'section' => 'sale_page_ad',
			'type' => 'text',
			'options' => false,
			//'placeholder' => 'DD/MM/YYYY',
			//'helper' => 'Url of ad. It will open on new tab.',
			'supplemental' => 'Url of ad. It will open on new tab.',
			//'default' => '01/01/2015'
		),

);
$gsn_settings->add_setting_section();



/*Product Detail page AD Settings */
$gsn_settings->id="product_detail_page_ad";
$gsn_settings->setting_title="Sale Page Ad Settings";
$gsn_settings->section="ad_settings";
$gsn_settings->information="This is sale page ad setting.";
$gsn_settings->fields=array(
		array(
			'uid' => 'product_page_middle_section_left_ad',
			'label' => 'Product Detail page middle section left Ad',
			'section' => 'product_detail_page_ad',
			'type' => 'image',
			'options' => false,
			//'placeholder' => 'DD/MM/YYYY',
			//'helper' => 'Does this help?',
			'supplemental' => '*( 555px width and 70px height )',
			//'default' => '01/01/2015'
		),
		array(
			'uid' => 'product_page_middle_section_left_ad_link',
			'label' => 'Product Detail page middle section left Ad link',
			'section' => 'product_detail_page_ad',
			'type' => 'text',
			'options' => false,
			//'placeholder' => 'DD/MM/YYYY',
			//'helper' => 'Url of ad. It will open on new tab.',
			'supplemental' => 'Url of ad. It will open on new tab.',
			//'default' => '01/01/2015'
		),
		
		array(
			'uid' => 'product_page_middle_section_right_ad',
			'label' => 'Product Detail page middle section right Ad',
			'section' => 'product_detail_page_ad',
			'type' => 'image',
			'options' => false,
			//'placeholder' => 'DD/MM/YYYY',
			//'helper' => 'Does this help?',
			'supplemental' => '*( 555px width and 70px height )',
			//'default' => '01/01/2015'
		),
		array(
			'uid' => 'product_page_middle_section_right_ad_link',
			'label' => 'Product Detail page middle section right Ad link',
			'section' => 'product_detail_page_ad',
			'type' => 'text',
			'options' => false,
			//'placeholder' => 'DD/MM/YYYY',
			//'helper' => 'Url of ad. It will open on new tab.',
			'supplemental' => 'Url of ad. It will open on new tab.',
			//'default' => '01/01/2015'
		),

);
$gsn_settings->add_setting_section();