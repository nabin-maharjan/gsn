<?php 
$page = new Custom_Post_Type();
$page->create('Page');
$page->add_meta_box( 
    'Page Settings', 
    array(
		'Page for' =>array(
				'name'=>'store_page',
				'class'=>'',
				'type'=>"radio",
				'show_in_admin_table'=>true,
				'options'=>array(
						'store'=>'Store',
						'dashboard'=>'Dashboard',
					)
				),
	)
);