<?php 
$page = new Custom_Post_Type();
$page->create('Page');
$page->add_meta_box( 
    'Page Settings', 
    array(
		'Store Page' =>array(
				'name'=>'store_page',
				'class'=>'',
				'type'=>"radio",
				'show_in_admin_table'=>true,
				'options'=>array(
						'no'=>'No',
						'yes'=>'Yes',
					)
				),
	)
);