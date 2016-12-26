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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
<script>var ajaxUrl="<?php echo admin_url( 'admin-ajax.php' ); ?>";</script>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

  <header class="header gsn-header">
    <div class="header__top">
      <div class="container">
        <div class="row">
          <div class="top top-icons clearfix p15">
            <div class="top__left-icons fl">
              <ul>
                <li><a href="tel:014444444"><i class="fa fa-phone"></i> 014444444</a></li>
                <li><i class="fa fa-map-marker"></i>Somwhere</li>
              </ul>
            </div>
            <!-- /.top__left-icons -->
            <div class="top__right-icons fr">
              <ul>
                <li><a href="#"><i class="fa fa-sign-in"></i> Login</a></li>
                <li><a href="#"><i class="fa fa-user-plus"></i> Register</a></li>
              </ul>
            </div>
            <!-- /.top__right-icons -->
          </div>
          <!-- /.top-icons -->
        </div>
      </div>
    </div>
    <!-- /.header__top -->
    <div class="header__bottom clearfix">
      <div class="container">
        <div class="row">
          <div class="col-md-3 header__logo">
            <h1 class="logo">Logo</h1>
          </div>
          <!-- /.header__logo -->
          <div class="col-md-9 header__main-items">
            <div class="item__nav fl">
              <!-- <div class="navbar-toggle nav__mobile-trigger">
                <button></button>
              </div> -->
              <nav class="main-nav">
                <ul class="nav navbar-nav nav__links">
                  <li class="active">
                    <a href="#">Home</a>
                  </li>
                  <li class="dropdown nav__dropdown">
                    <a class="dropdown__link" href="#">
                      <span>Categories</span>                      
                    </a>
                    <div class="dropdown__menu">
                      <ul>
                        <li>
                          <a href="#">Test</a>
                        </li>
                        <li>
                          <a class="dropdown__link" href="#">Test</a>
                          <div class="dropdown__menu">
                            <ul>
                              <li><a href="#">Test 2</a></li>
                              <li><a href="#">Test 2</a></li>
                              <li><a href="#">Test 2</a></li>
                            </ul>
                          </div>
                        </li>
                        <li>
                          <a href="#">Test</a>
                        </li>
                        <li>
                          <a href="#">Test</a>
                        </li>
                        <li>
                          <a href="#">Test</a>
                        </li>
                      </ul>
                    </div>
                  </li>
                  <li class="dropdown nav__dropdown">
                    <a class="dropdown__link" href="#">
                      <span>Accessories</span>                      
                    </a>
                    <div class="dropdown__menu">
                      <ul>
                        <li>
                          <a href="#">Test</a>
                        </li>
                        <li>
                          <a href="#">Test</a>
                        </li>
                        <li>
                          <a href="#">Test</a>
                        </li>
                        <li>
                          <a href="#">Test</a>
                        </li>
                        <li>
                          <a href="#">Test</a>
                        </li>
                      </ul>
                    </div>
                  </li>
                  <li>
                    <a href="#">Services</a>
                  </li>
                  <li>
                    <a href="#">Contact</a>
                  </li>
                </ul>
              </nav>
            </div>
            <!-- /.item__nav -->
            <!-- <div class="item-search">
              
            </div> -->
            <!-- /.item-search -->
            <div class="item__cart fr">
              <div class="cart cart-cntr">
                <div class="cart__icon">
                  <a href="#"><i class="fa fa-shopping-cart"></i><span class="cart-indicator">1</span></a>
                </div>                
                <div class="cart__content">
                  <div class="cart__block">
                    <div class="cart__list-cntr">
                      <ul class="cart__list">
                        <li class="cart-item clearfix">
                          <a href="#" class="cart-image">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/1.jpg" alt="">
                          </a>
                          <div class="cart-product-info">
                            <div class="product__name">
                              <span class="product__quantity">
                                <span class="quantity">1</span>X
                              </span>
                              <a href="#">Product</a>
                            </div>
                            <div class="product__attributes">
                              <a href="#">Attribute</a>
                              <span class="product__price">
                                $30.50
                              </span>
                            </div>
                          </div>
                          <div class="cart-product-remove">
                            <a href="#" class="remove-link">
                              <i class="fa fa-trash-o"></i>
                            </a>
                          </div>
                        </li>
                        <!-- /.cart__item -->
                        <li class="cart-item clearfix">
                          <a href="#" class="cart-image">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/2.jpg" alt="">
                          </a>
                          <div class="cart-product-info">
                            <div class="product__name">
                              <span class="product__quantity">
                                <span class="quantity">1</span>X
                              </span>
                              <a href="#">Product</a>
                            </div>
                            <div class="product__attributes">
                              <a href="#">Attribute</a>
                              <span class="product__price">
                                $30.50
                              </span>
                            </div>
                          </div>
                          <div class="cart-product-remove">
                            <a href="#" class="remove-link">
                              <i class="fa fa-trash-o"></i>
                            </a>
                          </div>
                        </li>
                        <!-- /.cart__item -->
                      </ul>
                      <!-- /.cart__list -->
                      <p class="cart__no-products hidden">No Products</p>
                      <div class="cart__prices">
                        <div class="cart-price price-shipping clearfix">
                          <span class="price shipping__cost">
                            $5.00
                          </span>
                          <span>Shipping</span>
                        </div>
                        <div class="cart-price price-total clearfix">
                          <span class="price total__cost">
                            $15.00
                          </span>
                          <span>Total</span>
                        </div>
                      </div>
                      <!-- /.cart__prices -->
                      <div class="cart__buttons clearfix">
                        <a href="#" class="btn btn-submit red-btn checkout-btn">Checkout</a>
                      </div>
                    </div>
                  </div>
                  <!-- /.cart__block -->  
                </div>
                <!-- /.cart__content -->
              </div>
            </div>
            <!-- /.item-cart -->
          </div>
          <!-- /.header__main-items -->
        </div>
      </div>
    </div>
    <!-- /.header__bottom -->
  </header>
  <!-- /.header -->