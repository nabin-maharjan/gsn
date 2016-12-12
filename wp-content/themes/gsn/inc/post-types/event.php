<?php
$event = new Custom_Post_Type();
$event->create('Event');
$event->add_post_type_support(array('thumbnail','excerpt'));
$event->add_taxonomy( 'category' );
//$event->add_taxonomy( 'author' );
$event->add_taxonomy( 'Event Type' );
$event->add_meta_box( 
    'event Info', 
    array(
	
		'Event Image' =>array(
			'name'=>'event_image',
			'id'=>'event_image',
			'class'=>' test test',
			'type'=>"image",
			),
			
		'Password' =>array(
			'name'=>'password_field',
			'id'=>'event_image',
			'class'=>' test test',
			'type'=>"password",
			),
		
        'Year' =>array(
			'name'=>'year',
			'id'=>'year',
			'class'=>' test test',
			'type'=>"text",
			'placeholder'=>"Please select",
			'show_in_admin_table'=>true,
			),
        'Genre' =>array(
			'name'=>'genre',
			'id'=>'year',
			'class'=>' test test',
			'type'=>"text",
			'placeholder'=>"Please select"
			),
		'Description' =>array(
			'name'=>'description',
			'id'=>'description',
			'class'=>' test test',
			'type'=>"textarea",
			'placeholder'=>"Please select"
		),
		'Description type 2' =>array(
			'name'=>'description_2',
			'id'=>'description_2',
			'type'=>"editor",
			'placeholder'=>"Enter desc"
			),
		'Features' =>array(
				'name'=>'feature',
				'class'=>' test test',
				'type'=>"checkbox",
				'options'=>array(
						'1'=>'One',
						'2'=>'Two',
						'3'=>'Three',
					)
				),
		'Gender' =>array(
				'name'=>'gender',
				'class'=>' test test',
				'type'=>"radio",
				'options'=>array(
						'male'=>'Male',
						'female'=>'Female',
					)
				),
		'Country' =>array(
			'name'=>'country',
			'id'=>'country',
			'class'=>' test test',
				'type'=>"dropdown",
				'options'=>array(
						'nepal'=>'Nepal',
						'india'=>'india',
						'china'=>'china',
					),
				'placeholder'=>"Please select",
				'multiple'=>true
				),
		'Repeater fields' =>array(
				'name'=>'repeater_fields',
				'type'=>"repeater",
				'fieldset'=>array(
						'year'=>array(
								'name'=>'genre',
								'type'=>"text",
								'placeholder'=>"Please select"
								),
						'Features' =>array(
								'name'=>'feature',
								'type'=>"checkbox",
								'options'=>array(
										'1'=>'One',
										'2'=>'Two',
										'3'=>'Three',
									)
								),
						'Gender' =>array(
								'name'=>'gender',
								'class'=>' test test',
								'type'=>"radio",
								'options'=>array(
										'male'=>'Male',
										'female'=>'Female',
									)
								),
						'Description' =>array(
								'name'=>'description',
								'id'=>'description',
								'class'=>' test test',
								'type'=>"textarea",
								'placeholder'=>"Please select"
							),
							
						'Country' =>array(
								'name'=>'country',
								'id'=>'country',
								'class'=>' test test',
								'type'=>"dropdown",
								'options'=>array(
											'nepal'=>'Nepal',
											'india'=>'india',
											'china'=>'china',
										),
								'placeholder'=>"Please select",
								'multiple'=>false
							),
						'Event Image' =>array(
								'name'=>'event_image',
								'id'=>'event_image',
								'class'=>' test test',
								'type'=>"image",
								),
		
					)
				),
				
    )
);

