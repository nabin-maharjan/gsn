<?php
/**
 * Template Name: Client Theme
 *
 * @package GSN
 * @since GSN 1.0
 */
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Theme</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/style.min.css">
</head>
<body>
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
                  
                </div>
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

  <main class="main main-content">
    
  </main>
  <!-- /.main -->

  <footer class="footer gsn-footer">
    
  </footer>
  <!-- /.footer -->
</body>
</html>