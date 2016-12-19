<?php
$book = new Custom_Post_Type();
$book->create('Book');
//$event->add_taxonomy( 'category' );
//$event->add_taxonomy( 'author' );
$book->add_taxonomy( 'Book Type' );
$book->add_meta_box( 
    'event Info', 
    array(
        'Name' =>array(
			'name'=>'book_name',
			'id'=>'book_name',
			'class'=>' test test',
			'type'=>"text",
			'placeholder'=>"Please select",
			'show_in_admin_table'=>true,
			),
        'Type' =>array(
			'name'=>'book_type',
			'id'=>'book_type',
			'class'=>' test test',
			'type'=>"text",
			'placeholder'=>"Please select"
			),
		'Description' =>array(
			'name'=>'book_desc',
			'id'=>'book_desc',
			'class'=>' test test',
			'type'=>"textarea",
			'placeholder'=>"Please select"
		),

				
    )
);