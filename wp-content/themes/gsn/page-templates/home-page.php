<?php
/**
 * Template Name: Home Page
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

  <section class="ta-c gsn-section gsn-lmain__find__wrapper gsn-lmfind">
    <div class="container">
      <div class="gsn-lmfind__heading">
        <h1 class="gsn-section__title">Find a shop</h1>
      </div>
      <div class="gsn-lmfind__filter__wrapper">
        <span>Filter shop by type:</span>
        <div class="gsn-custom__select__wrap gsn-lmfind__filter">
          <div class="js-custom-select gsn-custom__select gsn-lmfind__select">
            <select id="shop-type" class="js-default-select visible-hidden">
              <option value="all" selected>All</option>
              <option value="food">Food</option>
              <option value="beverage">Beverage</option>
              <option value="clothing">Clothing</option>
              <option value="electronics">Electronics</option>
              <option value="handicraft">Handicraft</option>
              <option value="books">Books</option>
              <option value="retail">Retail</option>
            </select>

            <div class="js-custom-select-toggle gsn-custom__stoggle">
              <span class="js-custom-select-text gsn-custom__stotext"></span>
              <i class="js-gsn-custom-select-arrow gsn-custom__sarrow">
                <svg xmlns="http://www.w3.org/2000/svg" class="gsn-custom__saicon" viewBox="0 0 57.31 38.638"><path d="M28.66 30.91a1.51 1.51 0 0 1-1.08-.46L.42 2.55A1.52 1.52 0 0 1 .45.42a1.51 1.51 0 0 1 2.12 0l26.09 26.84L54.74.45a1.5 1.5 0 1 1 2.15 2.1l-27.16 27.9a1.5 1.5 0 0 1-1.07.46z"/></svg>
              </i>
            </div>

            <div class="js-custom-select-dropdown js-hidden gsn-custom__sdropdown">
              
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="ta-c gsn-section gsn-lmain__map__wrapper" style="background: #252525;">
      <div class="js-gsn-lmain-map gsn-lmain__map">
        <h1 style="color: white;">Drop Map Here</h1>
      </div>
    </div>
  </section>
</div>

<?php get_footer();?>