<?php
/**
 * Template Name: Landing Documentation Template
 * 
 * labout => landing > documentation
 *
 * @package GSN
 * @since GSN 1.0
 */
get_header();
?>

<div class="gsn-ldocs__wrapper">
  <div class="container">
    <div class="gsn-ldocs__steps__wrapper">
      <div class="gsn-ldocs__steps">
        <div class="neg-m f-w gsn-ldocs__step">
          <div class="d-6 gsn-ldocs__sleft">
            <div class="gsn-ldocs__simg__wrap">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/bg.jpg" alt="">
            </div>
          </div>

          <div class="d-6 gsn-ldocs__sright">
            <div class="gsn-ldocs__scontent__wrap">
              <div class="gsn-ldocs__scontent">
                <h2 class="gsn-ldocs__stitle">Step 1: <span>Register</span></h2>
                <div class="gsn-ldocs__sdesc">

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