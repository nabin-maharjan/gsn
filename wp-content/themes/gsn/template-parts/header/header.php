<?php 
global $store;
$store->check_access_store();
/*echo "<pre>";
var_dump($store); die;*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head profile="http://www.w3.org/2005/10/profile">
<title>
<?php //wp_title(); ?>
Goshopnepal :: Boost your sale with your own website.
</title>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="icon"  type="image/ico"  href="<?php echo get_template_directory_uri(); ?>/favicn.ico">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">

<!-- Place this data between the <head> tags of your website -->
<meta name="description" content="Experience new way of online shopping. Create your own website with Goshopnepal and boost your sale." />
<!-- Schema.org markup for Google+ -->
<meta itemprop="name" content="Goshopnepal :: Boost your sale with your own website.">
<meta itemprop="description" content="Experience new way of online shopping. Create your own website with Goshopnepal and boost your sale.">
<meta itemprop="image" content="<?php echo get_template_directory_uri(); ?>/assets/images/goshopnepal_banner.png">
<!-- Twitter Card data -->
<meta name="twitter:card" content="product">
<meta name="twitter:site" content="@goshopnepal">
<meta name="twitter:title" content="Goshopnepal :: Boost your sale with your own website.">
<meta name="twitter:description" content="Experience new way of online shopping. Create your own website with Goshopnepal and boost your sale.">
<meta name="twitter:creator" content="@goshopnepal">
<meta name="twitter:image" content="<?php echo get_template_directory_uri(); ?>/assets/images/goshopnepal_banner.png">

<!-- Open Graph data -->
<meta property="og:title" content="Goshopnepal :: Boost your sale with your own website." />
<meta property="og:type" content="article" />
<meta property="og:url" content="<?php echo site_url();?>" />
<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/assets/images/goshopnepal_banner.png" />
<meta property="og:description" content="Experience new way of online shopping. Create your own website with Goshopnepal and boost your sale." />
<meta property="og:site_name" content="GoShopNepal" />

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
<?php if(!is_page("Register")){
	get_template_part( 'template-parts/header/header','style');
	}   ?>
</head>

<body <?php body_class(); ?>>
<svg class="hidden">
	<filter id="shadow" x="-150%" y="-150%" width="300%" height="300%" color-interpolation-filters="sRGB">
    	<feOffset result="offOut" in="SourceGraphic" dx="0" dy="5"></feOffset>
    	<feGaussianBlur result="blurOut" in="offOut" stdDeviation="6"></feGaussianBlur>
        <feComponentTransfer>
          <feFuncA type="linear" slope="0.1"></feFuncA>
        </feComponentTransfer>
    </filter>
	<symbol id="icon-cross" viewBox="0 0 10.2 10.2">
		<title>cross</title>
		<path d="M5.8,5.1l4.4,4.4l-0.7,0.7L5.1,5.8l-4.4,4.4L0,9.5l4.4-4.4L0,0.7L0.7,0l4.4,4.4L9.5,0l0.7,0.7L5.8,5.1z"></path>
	</symbol>
</svg>
<?php if(!is_page("Register") && !is_page("Activate") && $store->activated!=0){ ?>
<header class="dashboard-header clearfix">
	<div class="dashboard__header-right fr">
		<?php if(!empty($store->domainName)){ ?><a target="_blank" class="go-to-shop-link" href="http://<?php echo $store->domainName;?>.goshopnepal.com">Veiw my shop</a><?php }?>
		<div class="fr header-profile-cntr"> <a href="#" class="profile-info"> <i class="fa fa-user"></i> <span class="desktop-inline"><?php echo $store->firstName ." " . $store->lastName;?></span> </a>
			<!-- <div class="profile__links">
				<ul>
					<li><a href="javascript:void(0)"  id="logoutBtn">Log out</a></li>
				</ul>
			</div> -->
		</div>
		<?php /* if($store->id!=NULL){?>  
        <button type="button" id="logoutBtn" class="btn btn-secondary btn-sm">Logout<i class="fa fa-sign-out" aria-hidden="true"></i></button>
      <?php }  */?>
	</div>
	<!-- /.dashboard__header-right -->
	<div class="dashboard__header-left fl">
		<!-- <div class="dashboard-hamburger"> <span></span> </div> -->
    <div class="navbar-toggle nav__mobile-trigger dashboard-hamburger">
      <a id="hamburger-icon" class="hamburger-icon dashboard__hamburger--icon" href="#" title="Menu">
        <span class="line line-1"></span>
        <span class="line line-2"></span>
        <span class="line line-3"></span>
      </a>
    </div>
		<h1><a href="<?php echo site_url(); ?>/dashboard"> <span class="fa fa-home mobile"></span> <span class="desktop">Dashboard</span></a> </h1>
	</div>
	<!-- /.dashboard__header-left -->
	
	<nav class="dashboard__nav" id="dashboard-nav">		
		<ul>
			<li> <a href="<?php echo site_url("/dashboard/settings/shop/");?>">
				<div class="dashboard-tooltip"><span>Store Setting</span></div>
				<i class="fa fa-dashboard dashboard-icons"></i> <span class="nav-text">Store Setting</span> </a> </li>
			<li> <a href="<?php echo site_url("/dashboard/settings/profile/");?>">
				<div class="dashboard-tooltip"><span>Profile Setting</span></div>
				<i class="fa fa-dashboard dashboard-icons"></i> <span class="nav-text">Profile Setting</span> </a> </li>
			<li> <a href="<?php echo site_url("/dashboard/product/");?>">
				<div class="dashboard-tooltip"><span>Product</span></div>
				<i class="fa fa-dashboard dashboard-icons"></i> <span class="nav-text">Product</span> </a> </li>
			<li> <a href="<?php echo site_url("/dashboard/order/");?>">
				<div class="dashboard-tooltip"><span>Order</span></div>
				<i class="fa fa-dashboard dashboard-icons"></i> <span class="nav-text">Order</span> </a> </li>
      <li> <a href="javascript:void(0)" id="logoutBtn">
        <div class="dashboard-tooltip"><span>Log Out</span></div>
        <i class="fa fa-sign-out dashboard-icons"></i> <span class="nav-text">Log Out</span> </a> </li>
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