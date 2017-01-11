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
var_dump($gsn_settings);die;

/* Normal Package Settings */
$package_slug="normal";
$gsn_settings->id=$package_slug."_package";
$gsn_settings->setting_title="Normal Package";
$gsn_settings->section="package_settings";
$gsn_settings->information="This is normal package information.";
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


/* bronze Package Settings */
$package_slug="bronze";
$gsn_settings=new addSettingsSection();
$gsn_settings->id=$package_slug."_package";
$gsn_settings->setting_title="Bronze Package";
$gsn_settings->section="package_settings";
$gsn_settings->information="This is bronze package information.";
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


/* Silver Package Settings */
$package_slug="silver";
$gsn_settings=new addSettingsSection();
$gsn_settings->id=$package_slug."_package";
$gsn_settings->setting_title="Silver Package";
$gsn_settings->section="package_settings";
$gsn_settings->information="This is silver package information.";
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


/* Gold Package Settings */
$package_slug="gold";
$gsn_settings=new addSettingsSection();
$gsn_settings->id=$package_slug."_package";
$gsn_settings->setting_title="Gold Package";
$gsn_settings->section="package_settings";
$gsn_settings->information="This is gold package information.";
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

/* platinium Package Settings */
$package_slug="platinium";
$gsn_settings=new addSettingsSection();
$gsn_settings->id=$package_slug."_package";
$gsn_settings->setting_title="Platinium Package";
$gsn_settings->section="package_settings";
$gsn_settings->information="This is platinium package information.";
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







/*
*Add Setting Section on backend
*/
class addSettingsSection{
	public $id, $setting_title, $fields, $section,$information,$page_args;
	
	public function addSettingsSection(){
			add_action('admin_init', 'my_general_section'); 
		}
		
	public function create_settings_page($page_args) {
		$this->page_args=$page_args;
	// Add the menu item and page
	$page_title = $page_args['page_title'];
	$menu_title = $page_args['menu_title'];
	$capability = $page_args['capability'];
	$slug = $page_args['slug'];
	$callback = array( $this, 'settings_page_content' );
	$icon = $page_args['icon'];
	$position = $page_args['position'];

	//add_menu_page( $page_title, $menu_title, $capability, $slug, $callback, $icon, $position );
	add_submenu_page( 'options-general.php', $page_title, $menu_title, $capability, $slug, $callback );
}	
/*
*Function to initialize setting page content
*/		
public function settings_page_content() {
	 ?>
	<div class="wrap">
    <h1><?php echo $this->page_args['page_title'];?></h1>
		<form method="post" action="options.php">
            <?php
                settings_fields($this->section );
                do_settings_sections($this->section);
                submit_button();
            ?>
		</form>
	</div> <?php
}
		
		
	/*
	*Function to add Setting section
	*/
	
	public function add_setting_section(){
		add_settings_section(  
			$this->id, // Section ID 
			$this->setting_title, // Section Title
			array($this,'setting_callback'), // Callback
			$this->section // What Page?  This makes the section show up on the General Settings Page
		);
		
		/* register all fields */
		foreach( $this->fields as $field ){
			add_settings_field( $field['uid'], $field['label'],array($this,'setting_input_callback'), $this->section, $this->id, $field );
			register_setting( $this->section, $field['uid'] );
		}
		
	}
	
	/*
	*Function for setting description callback
	*/
	public function setting_callback(){
		echo '<p>'.$this->information.'</p>'; 
		
	}
	
	/*
	*Function to Print setting fields
	*/
	public function  setting_input_callback( $arguments ) {
		$value = get_option( $arguments['uid'] ); // Get the current value, if there is one
		if( ! $value ) { // If no value exists
			$value = $arguments['default']; // Set to our default
		}
	
		// Check which type of field we want
		switch( $arguments['type'] ){
			case 'text': // If it is a text field
				printf( '<input name="%1$s" id="%1$s" type="%2$s" placeholder="%3$s" value="%4$s" />', $arguments['uid'], $arguments['type'], $arguments['placeholder'], $value );
				break;
			case 'textarea': // If it is a textarea
			printf( '<textarea name="%1$s" id="%1$s" placeholder="%2$s" rows="5" cols="50">%3$s</textarea>', $arguments['uid'], $arguments['placeholder'], $value );
			break;
		case 'select': // If it is a select dropdown
			if( ! empty ( $arguments['options'] ) && is_array( $arguments['options'] ) ){
				$options_markup = '';
				foreach( $arguments['options'] as $key => $label ){
					$options_markup .= sprintf( '<option value="%s" %s>%s</option>', $key, selected( $value, $key, false ), $label );
				}
				printf( '<select name="%1$s" id="%1$s">%2$s</select>', $arguments['uid'], $options_markup );
			}
			break;
		}
	
		// If there is help text
		if( $helper = $arguments['helper'] ){
			printf( '<span class="helper"> %s</span>', $helper ); // Show it
		}
	
		// If there is supplemental text
		if( $supplimental
		 = $arguments['supplemental'] ){
			printf( '<p class="description">%s</p>', $supplimental ); // Show it
		}
		
	}
}
