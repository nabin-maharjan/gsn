<?php
/**
 * Template Name: Client Theme
 *
 * @package GSN
 * @since GSN 1.0
 */
get_header("store");
?>

  <main class="main main-content">
    <section class="hero-section">
      <div class="container">
        <div class="row">
          <div class="col-sm-3 hero-part hero__left hero-latest">
            <div class="half-height latest-products">
              <div class="product-block">
                <div class="product-image-cntr">
                  <a class="half-image product-image" href="#" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/new-1.jpg')"></a>
                  <span class="label-top label-new">New</span>
                  <div class="cart-btn">
                    <a rel="nofollow" href="/gsn/?add-to-cart=43" data-quantity="1" data-product_id="43" data-product_sku="" class="button product_type_simple add_to_cart_button ajax_add_to_cart">Add to cart</a>
                  </div>
                </div>
              </div>
              <!-- /.product-block -->
            </div>
            <div class="half-height latest-products">
              <div class="product-block">
                <div class="product-image-cntr">
                  <a class="half-image product-image" href="#" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/new-2.jpg')"></a>
                  <span class="label-top label-new">New</span>
                  <div class="cart-btn">
                    <a rel="nofollow" href="/gsn/?add-to-cart=43" data-quantity="1" data-product_id="43" data-product_sku="" class="button product_type_simple add_to_cart_button ajax_add_to_cart">Add to cart</a>
                  </div>
                </div>
              </div>
              <!-- /.product-block -->
            </div>
          </div>
          <!-- /.hero__left -->
          <div class="col-sm-6 hero-part hero__middle hero-slider">
            <div class="slider-cntr">
              <div class="slider__slides">
                <a href="#" class="slider-image" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/sale-1.jpg')"></a>
                <div class="slider-content">
                  <div class="slider-title">
                    <h2><a href="#">Product 1</a></h2>
                  </div>
                  <div class="slider-desc">
                    <span>This is description of the product</span>
                  </div>
                  <div class="slider-btn">
                    <a href="#" class="btn btn-submit shop-btn">Shop now</a>
                  </div>
                </div>
              </div>
              <div class="slider__slides">
                <a href="#" class="slider-image" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/new-2.jpg')"></a>
                <div class="slider-content">
                  <div class="slider-title">
                    <h2><a href="#">Product 2</a></h2>
                  </div>
                  <div class="slider-desc">
                    <span>This is description of the product</span>
                  </div>
                  <div class="slider-btn">
                    <a href="#" class="btn btn-submit shop-btn">Shop now</a>
                  </div>
                </div>
              </div>
              <div class="slider__slides">
                <a href="#" class="slider-image" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/new-1.jpg')"></a>
                <div class="slider-content">
                  <div class="slider-title">
                    <h2><a href="#">Product 3</a></h2>
                  </div>
                  <div class="slider-desc">
                    <span>This is description of the product</span>
                  </div>
                  <div class="slider-btn">
                    <a href="#" class="btn btn-submit shop-btn">Shop now</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.hero__mmiddle -->
          <div class="col-sm-3 hero-part hero__right hero-sales">
            <div class="half-height latest-products">
              <div class="product-block">
                <div class="product-image-cntr">
                  <a class="half-image product-image" href="#" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/new-2.jpg')"></a>
                  <span class="label-top label-sale">Sale</span>
                  <div class="cart-btn">
                    <a rel="nofollow" href="/gsn/?add-to-cart=43" data-quantity="1" data-product_id="43" data-product_sku="" class="button product_type_simple add_to_cart_button ajax_add_to_cart">Add to cart</a>
                  </div>
                </div>
              </div>
              <!-- /.product-block -->
            </div>
            <div class="half-height latest-products">
              <div class="product-block">
                <div class="product-image-cntr">
                  <a class="half-image product-image" href="#" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/new-1.jpg')"></a>
                  <span class="label-top label-sale">Sale</span>
                  <div class="cart-btn">
                    <a rel="nofollow" href="/gsn/?add-to-cart=43" data-quantity="1" data-product_id="43" data-product_sku="" class="button product_type_simple add_to_cart_button ajax_add_to_cart">Add to cart</a>
                  </div>
                </div>
              </div>
              <!-- /.product-block -->
            </div>
          </div>
          <!-- /.hero__right -->
        </div>
      </div>
    </section>
    <!-- /.hero-section -->    
    <section class="sales-section">
      <div class="container">
        <div class="section-divider"></div>
        <div class="row">          
          <h3 class="section-title">On sale products</h3>
          
          <div class="home-product-list-cntr">
            <ul class="products clearfix">
              <?php
                $args = array(
                  'post_type' => 'product',
                  'posts_per_page' => 8,
                  'author'=>$store->user_id
                  );
                $loop = new WP_Query( $args );
                if ( $loop->have_posts() ) {
                  while ( $loop->have_posts() ) : $loop->the_post();
                    wc_get_template_part( 'content', 'product' );
                  endwhile;
                } else {
                  echo __( 'No products found' );
                }
                wp_reset_postdata();
              ?>
            </ul>
            <!--/.products-->     
          </div>
        </div>
      </div>         
    </section>
    <!-- /.sales-section -->

    <!-- /.hero-section -->    
    <section class="new-section">
      <div class="container">
        <div class="section-divider"></div>
        <div class="row">          
          <h3 class="section-title">New products</h3>
          
          <div class="home-product-list-cntr">
            <ul class="products clearfix">
              <?php
                $args = array(
                  'post_type' => 'product',
                  'posts_per_page' => 8,
                  'author'=>$store->user_id
                  );
                $loop = new WP_Query( $args );
                if ( $loop->have_posts() ) {
                  while ( $loop->have_posts() ) : $loop->the_post();
                    wc_get_template_part( 'content', 'product' );
                  endwhile;
                } else {
                  echo __( 'No products found' );
                }
                wp_reset_postdata();
              ?>
            </ul>
            <!--/.products-->     
          </div>
        </div>
      </div>         
    </section>
    <!-- /.new-section -->
  </main>
  <!-- /.main -->

  <?php get_footer('store') ?>

  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/vendor/jquery-3.1.1.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/vendor/slick.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/custom/all.js"></script>

  <script>
    $(document).ready(function() {
      $('.slider-cntr').slick({
        
      });
    });
  </script>
