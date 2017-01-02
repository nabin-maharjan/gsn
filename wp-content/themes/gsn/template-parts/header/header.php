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
<?php if(!is_page("Register")){ ?>
  <header class="dashboard-header clearfix">
    <div class="dashboard__header-right fr">
      <div class="header-profile-cntr">
        <a href="#" class="profile-info">
          <i class="fa fa-user"></i>
          <span><?php echo $store->firstName ." " . $store->lastName;?></span>
        </a>
        <div class="profile__links">
          <ul>
            <li><a href="#">Your account</a></li>
            <li><a href="#">Account setting</a></li>
            <li><a href="javascript:void(0)"  id="logoutBtn">Log out</a></li>
          </ul>
        </div>
      </div>
      <?php /* if($store->id!=NULL){?>  
        <button type="button" id="logoutBtn" class="btn btn-secondary btn-sm">Logout<i class="fa fa-sign-out" aria-hidden="true"></i></button>
      <?php }  */?>
    </div>
    <!-- /.dashboard__header-right -->
    <div class="dashboard__header-left fl">
      <div class="dashboard-hamburger">
        <span></span>
      </div>
      <h1>Dashboard</h1>
    </div>
    <!-- /.dashboard__header-left -->

    <nav class="dashboard__nav" id="dashboard-nav">
      <ul>
        <li>
          <a href="<?php echo site_url("/dashboard/settings/shop/");?>">
            <div class="dashboard-tooltip"><span>Store Setting</span></div>
            <i class="fa fa-dashboard dashboard-icons"></i>
            <span class="nav-text">Store Setting</span>
          </a>
        </li>
        <li>
          <a href="<?php echo site_url("/dashboard/settings/profile/");?>">
            <div class="dashboard-tooltip"><span>Profile Setting</span></div>
            <i class="fa fa-dashboard dashboard-icons"></i>
            <span class="nav-text">Profile Setting</span>
          </a>
        </li>
        <li>
          <a href="<?php echo site_url("/dashboard/product/");?>">
            <div class="dashboard-tooltip"><span>Product</span></div>
            <i class="fa fa-dashboard dashboard-icons"></i>
            <span class="nav-text">Product</span>
          </a>
        </li>
         <li>
          <a href="<?php echo site_url("/dashboard/order/");?>">
            <div class="dashboard-tooltip"><span>Order</span></div>
            <i class="fa fa-dashboard dashboard-icons"></i>
            <span class="nav-text">Order</span>
          </a>
        </li>
        
      </ul>      
    </nav>
    <!-- /.dashboard__nav -->  
    <div class="dashboard-nav-overlay"></div>
    <!-- /.dashboard-nav-overlay -->  

    <?php /* wp_nav_menu( array( 
    'theme_location' => 'store-header-menu',
    'menu_class' => 'nav navbar-nav nav__links',
    'walker'=>new wp_bootstrap_navwalker ()
     ) ); */ ?>
  </header>
  <?php } ?>
<!-- /.dashboard-header -->