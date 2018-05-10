<?php
  global $store;
  $featured_shops=$store->get_random_featured_shop(6);
?>
<section class="ta-c gsn-section gsn-lmain__slist__wrapper gsn-lmain__slist--featured" style="background: #f3f3f3">
    <div class="container">
      <div class="gsn-lmslist__heading">
        <h1 class="gsn-section__title">Random Shops</h1>
      </div>
      <div class="gsn-clist__wrapper gsn-lmslist__wrap">
        <ul class="gsn-clist__items gsn-lmslist__items">
        <?php foreach( $featured_shops as $shop){
         $shop_data= $store->get_store_data($shop->user_id,$shop->shopType);
         if( $shop->domainName){
          ?>
          <li class="gsn-clist__item gsn-lmslist__item">
            <a href="http://<?php echo $shop->domainName; ?>.goshopnepal.com" class="gsn-lmslist__link gsn-clist__link" target="_blank">
              <div class="gsn-card__wrapper">
              <?php if($shop_data['logo']){?>
                <div class="gsn-card__img">
                  <img src="<?php echo $shop_data['logo'] ; ?>" alt="<?php echo $shop->storeName; ?>" class="gsn-card__logo">
                </div>
              <?php } ?>
                <div class="gsn-card__info">
                  <h3 class="gsn-card__name"><?php echo $shop->storeName; ?></h3>
                  <h4 class="gsn-card__category"><?php echo $shop_data['shop_type']; ?></h4>
                  <h5 class="gsn-card__location"><?php echo $shop->storeFullAddress; ?></h5>
                  <span class="gsn-card__view">
                   View Shop
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 93 75.925"><path d="M0 30.37a1.5 1.5 0 0 1 1.5-1.5h86.31l-27-26.29a1.5 1.5 0 0 1 0-2.12 1.49 1.49 0 0 1 2.12 0l29.62 28.83a1.5 1.5 0 0 1 0 2.13L62.88 60.31a1.5 1.5 0 0 1-2.09-2.15l27-26.29H1.5a1.5 1.5 0 0 1-1.5-1.5z"/>
                  </span>
                </div>
              </div>
            </a>
          </li>
          <?php } ?>
        <?php } ?>
        </ul>
      </div>
    </div>
  </section>