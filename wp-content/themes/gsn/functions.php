<?php
include("vendor/autoload.php");
include("inc/basic.php");
include("inc/input-fields.php");
////////////////////////////////////
/*  Store Register pages */
include("inc/store/register.php");
include("inc/store/category.php");
/////////////////////////////////////////
/* for custom post type loads */
include("inc/custom-post-type.php");
$custom_post_types=new Custom_Post_Type();
$custom_post_types->include_all_cpts();
$custom_post_types->add_column_admin();
$custom_post_types->agile_admin_scripts();
//////////////////////////////////
add_theme_support( 'post-thumbnails' );