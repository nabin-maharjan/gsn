<?php
/**
 * Template Name: Home Page
 * 
 * Class Convention with BEM
 * l~ => landing > ~
 * lmain => landing > main
 * lmcta => landing > main > cta
 * lmfind => landing > main > find
 * lmslist => landing > main > store list
 * clist => card list
 * 
 * @package GSN
 * @since GSN 1.0
 */
get_header();
?>

<div class="gsn-lmain__wrapper">
  <section class="ta-c gsn-section gsn-lmain__cta__wrapper gsn-lmcta">
    <div class="container">
      <div class="gsn-lmcta__heading">
        <h1 class="gsn-section__title">Want to create your own <br> <span>Ecommerce Website?</span></h1>

        <h5 class="gsn-section__subtitle">By the way, it's free!!</h5>
      </div>

      <div class="gsn-lmcta__btns">
        <ul class="gsn-lmcta__bitems">
          <li class="gsn-lmcta__bitem">
            <a href="#" class="gsn-cta__btn gsn-cta__btn--green">
              Register
            </a>
          </li>
          <li class="gsn-lmcta__bitem">
            <a href="#" class="gsn-cta__btn gsn-cta__btn--white">
              View Docs
            </a>
          </li>
        </ul>
      </div>
    </div>
  </section>

  <?php get_template_part( 'template-parts/main/utility/featured-shop');  ?>
  <?php get_template_part( 'template-parts/main/utility/find-shop');  ?>
</div>
<?php get_footer();?>