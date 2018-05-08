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
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">

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
	<header class="gsn-landing__header gsn-lheader">
    <div class="container">
      <div class="gsn-lheader__wrapper">
        <div class="gsn-lheader__logo">
          <a href="<?php echo site_url();?>" class="gsn-lheader__lolink">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/main-logo.svg" alt="Main GSN Logo" class="gsn-lheader__loimg">
          </a>
        </div>

        <div class="gsn-lheader__nav__wrapper">
          <div class="gsn-lheader__nav__wrap">
            <nav class="gsn-lheader__nav">
              <ul class="gsn-lheader__nitems">
                <li class="gsn-lheader__nitem">
                  <a href="" class="gsn-lheader__nlink">
                    <span class="gsn-lheader__ntext">About</span>
                  </a>
                </li>
                <li class="gsn-lheader__nitem">
                  <a href="" class="gsn-lheader__nlink">
                    <span class="gsn-lheader__ntext">Register</span>
                  </a>
                </li>
                <li class="gsn-lheader__nitem">
                  <a href="" class="gsn-lheader__nlink">
                    <span class="gsn-lheader__ntext">Documentation</span>
                  </a>
                </li>
                <li class="gsn-lheader__nitem">
                  <a href="" class="gsn-lheader__nlink">
                    <span class="gsn-lheader__ntext">Contact</span>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
	</header>

	<main class="main" role="presentation">