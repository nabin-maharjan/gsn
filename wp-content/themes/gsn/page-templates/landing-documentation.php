<?php
/**
 * Template Name: Landing Documentation Template
 * 
 * Classes Defs
 * 
 * linner / li => landing > inner
 * ldocs => landing > documentation
 * ldocs__s~ => landing > documentation > step > ~
 *
 * @package GSN
 * @since GSN 1.0
 */
get_header();
?>

<div class="ta-c gsn-linner__hero gsn-li__hero">
  <div class="container">
    <div class="gsn-li__hero__wrapper">
      <h1 class="gsn-section__title gsn-li__hero__title">Documentation</h1>
      <h5 class="gsn-section__subtitle">Follow the steps to create your online store.</h5>
    </div>
  </div>
</div>

<div class="gsn-ldocs__wrapper">
  <div class="container">
    <div class="gsn-ldocs__steps__wrapper">
      <div class="js-scroll-visible-step-cntr gsn-ldocs__steps">
        <div class="js-scroll-visible-step neg-m f-w gsn-ldocs__step">
          <div class="d-6 gsn-ldocs__sleft">
            <div class="gsn-ldocs__simg__wrap">
              <div class="gsn-ldocs__simg">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/landing-register.svg" alt="Register">
              </div>
            </div>
          </div>

          <div class="d-6 gsn-ldocs__sright">
            <div class="gsn-ldocs__scontent__wrap">
              <div class="gsn-ldocs__scontent">
                <h2 class="gsn-ldocs__stitle">1: <span>Register</span></h2>
                <div class="gsn-ldocs__sdesc">
                  <p>
                    This is the very first step to create your online store. So, take your time to do it correctly.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="js-scroll-visible-step neg-m f-w gsn-ldocs__step">
          <div class="d-6 gsn-ldocs__sleft">
            <div class="gsn-ldocs__simg__wrap">
              <div class="gsn-ldocs__simg">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/landing-domain.svg" alt="">
              </div>
            </div>
          </div>

          <div class="d-6 gsn-ldocs__sright">
            <div class="gsn-ldocs__scontent__wrap">
              <div class="gsn-ldocs__scontent">
                <h2 class="gsn-ldocs__stitle">2: <span>Domain setup</span></h2>
                <div class="gsn-ldocs__sdesc">
                  <p>
                    This is the very first step to create your online store. So, take your time to do it correctly.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="js-scroll-visible-step neg-m f-w gsn-ldocs__step">
          <div class="d-6 gsn-ldocs__sleft">
            <div class="gsn-ldocs__simg__wrap">
              <div class="gsn-ldocs__simg">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/landing-shop-setting.svg" alt="">
              </div>
            </div>
          </div>

          <div class="d-6 gsn-ldocs__sright">
            <div class="gsn-ldocs__scontent__wrap">
              <div class="gsn-ldocs__scontent">
                <h2 class="gsn-ldocs__stitle">3: <span>Store settings</span></h2>
                <div class="gsn-ldocs__sdesc">
                  <p>
                    This is the very first step to create your online store. So, take your time to do it correctly.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="js-scroll-visible-step neg-m f-w gsn-ldocs__step">
          <div class="d-6 gsn-ldocs__sleft">
            <div class="gsn-ldocs__simg__wrap">
              <div class="gsn-ldocs__simg">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/landing-product-manage.svg" alt="">
              </div>
            </div>
          </div>

          <div class="d-6 gsn-ldocs__sright">
            <div class="gsn-ldocs__scontent__wrap">
              <div class="gsn-ldocs__scontent">
                <h2 class="gsn-ldocs__stitle">4: <span>Manage Product</span></h2>
                <div class="gsn-ldocs__sdesc">
                  <p>
                    This is the very first step to create your online store. So, take your time to do it correctly.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php get_footer();?>