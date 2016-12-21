<?php
$setting = new Custom_Post_Type();
$setting->create('Theme Color Setting');
$setting->add_post_type_support(array('thumbnail'));
//$event->add_taxonomy( 'category' );
//$event->add_taxonomy( 'author' );
/* remove editor from post */
add_action('init',function(){
	remove_post_type_support('theme_color_setting','editor');
});

/* add meta fields to post */
$setting->add_meta_box( 
    'Theme Collor Setting', 
    array(
	'Default theme' =>array(
				'name'=>'default_theme',
				'class'=>' test test',
				'type'=>"radio",
				'options'=>array(
						'no'=>'No',
						'yes'=>'Yes',
					)
				),
	
		'Header Background Color' =>array(
			'name'=>'header_background_color',
			'id'=>'header_background_color',
			'class'=>' test test',
			'type'=>"text",
			'placeholder'=>"Please select",
			'show_in_admin_table'=>true,
			),
		'Footer Background Color' =>array(
			'name'=>'footer_background_color',
			'id'=>'footer_background_color',
			'class'=>' test test',
			'type'=>"text",
			'placeholder'=>"Please select",
			'show_in_admin_table'=>true,
			),
	
        'Primary Color' =>array(
			'name'=>'primary_color',
			'id'=>'primary_color',
			'class'=>' test test',
			'type'=>"text",
			'placeholder'=>"Please select",
			'show_in_admin_table'=>true,
			),
		'Secondary Color' =>array(
			'name'=>'seconday_color',
			'id'=>'seconday_color',
			'class'=>' test test',
			'type'=>"text",
			'placeholder'=>"Please select",
			'show_in_admin_table'=>true,
			),
		'Font Color' =>array(
			'name'=>'font_color',
			'id'=>'font_color',
			'class'=>' test test',
			'type'=>"text",
			'placeholder'=>"Please select",
			'show_in_admin_table'=>true,
			),
		'Font Link Color' =>array(
			'name'=>'font_link_color',
			'id'=>'font_link_color',
			'class'=>' test test',
			'type'=>"text",
			'placeholder'=>"Please select",
			'show_in_admin_table'=>true,
			),
		'Button Color' =>array(
			'name'=>'button_color',
			'id'=>'button_color',
			'class'=>' test test',
			'type'=>"text",
			'placeholder'=>"Please select",
			'show_in_admin_table'=>true,
			),
		'Button Secondary Color' =>array(
			'name'=>'button_secondary_color',
			'id'=>'button_secondary_color',
			'class'=>' test test',
			'type'=>"text",
			'placeholder'=>"Please select",
			'show_in_admin_table'=>true,
			),
    )
);