<?php 
global $store;
$store->check_access_store();
//echo "<pre>";
//var_dump($store); die;
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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
	<script>
        var ajaxUrl="<?php echo admin_url( 'admin-ajax.php' ); ?>";
        var location_Lat=0;
		var location_Lan=0;
        <?php if($store->id!=NULL){?>
       	 location_Lat=<?php echo $store->latitute;?>;
		 location_Lan=<?php echo $store->lognitute; ?>;
        <?php } ?>
    </script>

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header>
<?php if($store->id!=NULL){?>  
  <button type="button" id="logoutBtn" class="btn btn-secondary btn-sm">Logout<i class="fa fa-sign-out" aria-hidden="true"></i></button>
<?php } ?>

<?php wp_nav_menu( array( 
'theme_location' => 'store-header-menu',
'walker'=>new wp_bootstrap_navwalker ()
 ) ); ?>
</header>