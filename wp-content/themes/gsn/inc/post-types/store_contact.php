<?php
$store_contact = new Custom_Post_Type();
$store_contact->create('Store Contact');
/* remove editor from post */
add_action('init',function(){
	remove_post_type_support('store_contact','editor');
});
$store_contact->add_meta_box( 
    'Information', 
		array(
			'Full Name' =>array(
				'name'=>'fullName',
				'id'=>'fullName',
				'class'=>' test test',
				'type'=>"text",
				'placeholder'=>""
			),
			'Email' =>array(
				'name'=>'emailAddress',
				'id'=>'emailAddress',
				'class'=>' test test',
				'type'=>"text",
				'placeholder'=>""
			),
			'Phone' =>array(
				'name'=>'phoneNumber',
				'id'=>'phoneNumber',
				'class'=>' test test',
				'type'=>"text",
				'placeholder'=>""
			),
			'Message' =>array(
				'name'=>'message',
				'id'=>'message',
				'class'=>' test test',
				'type'=>"textarea",
				'placeholder'=>""
			),
			
		) 
	);