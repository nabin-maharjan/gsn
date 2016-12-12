<?php
include("inc/basic.php");
include("inc/input-fields.php");
new Agile_Input_Fields();

/////////////////////////////////////////
/* for custom post type loads */
include("inc/custom-post-type.php");
$custom_post_types=new Custom_Post_Type();
$custom_post_types->include_all_cpts();
$custom_post_types->add_column_admin();
$custom_post_types->agile_admin_scripts();


//////////////////////////////////
add_theme_support( 'post-thumbnails' );


//add_filter('admin_custom_book_meta_field_table','testint_meta',10,1);

