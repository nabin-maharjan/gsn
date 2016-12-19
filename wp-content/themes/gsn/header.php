<?php 
global $store;
$store->check_access_store();
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head profile="http://www.w3.org/2005/10/profile">
	<title><?php wp_title(); ?></title>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">    
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link rel="icon"  type="image/ico"  href="<?php echo get_template_directory_uri(); ?>/favicn.ico">
<script>var ajaxUrl="<?php echo admin_url( 'admin-ajax.php' ); ?>";</script>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header>
<h1>GS<N/h1>
<?php if($store->id!=NULL){?>  
  <button type="button" id="logoutBtn" class="btn btn-secondary btn-sm">Logout</button>
<?php } ?>



</header>