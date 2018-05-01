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

add_filter('admin_custom_theme_color_setting_meta_field_table',function($value,$column){
	echo "<span style='background-color:".$value."; width:50px; height:50px; display:block; border:1px solid #ececec;'></span>";
},10,2);

/* add meta fields to post */
$setting->add_meta_box( 
    'Theme Collor Setting', 
    array(
	'Default theme' =>array(
				'name'=>'default_theme',
				//'class'=>' color-picker',
				'type'=>"radio",
				'options'=>array(
						'no'=>'No',
						'yes'=>'Yes',
					)
				),
		'Header and footer strip' =>array(
			'name'=>'footer_background_color',
			'id'=>'footer_background_color',
			'class'=>'color-picker',
			'type'=>"text",
			'placeholder'=>"Please select",
			'show_in_admin_table'=>true,
			),
			
		'Header Background Color' =>array(
			'name'=>'header_background_color',
			'id'=>'header_background_color',
			'class'=>' color-picker',
			'type'=>"text",
			'placeholder'=>"Please select",
			'show_in_admin_table'=>true,
			),
		
		'Top Footer Background Color' =>array(
			'name'=>'top_footer_background_color',
			'id'=>'top_footer_background_color',
			'class'=>' color-picker',
			'type'=>"text",
			'placeholder'=>"Please select",
			'show_in_admin_table'=>true,
			),
	
        'Primary Color' =>array(
			'name'=>'primary_color',
			'id'=>'primary_color',
			'class'=>' color-picker',
			'type'=>"text",
			'placeholder'=>"Please select",
			'show_in_admin_table'=>true,
			),
		'Secondary Color' =>array(
			'name'=>'seconday_color',
			'id'=>'seconday_color',
			'class'=>' color-picker',
			'type'=>"text",
			'placeholder'=>"Please select",
			'show_in_admin_table'=>true,
			),
		'Font Color' =>array(
			'name'=>'font_color',
			'id'=>'font_color',
			'class'=>' color-picker',
			'type'=>"text",
			'placeholder'=>"Please select",
			'show_in_admin_table'=>true,
			),
		'Light Color' =>array(
			'name'=>'light_color',
			'id'=>'light_color',
			'class'=>' color-picker',
			'type'=>"text",
			'placeholder'=>"Please select",
			'show_in_admin_table'=>true,
			),
		'Lighter Color' =>array(
			'name'=>'lighter_color',
			'id'=>'lighter_color',
			'class'=>' color-picker',
			'type'=>"text",
			'placeholder'=>"Please select",
			'show_in_admin_table'=>true,
			),

    )
);