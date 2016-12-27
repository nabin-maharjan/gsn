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
                  <a href="#" class="label-top label-new">New</a>
                </div>
                <div class="product-info-cntr">
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
                  <a href="#" class="label-top label-new">New</a>
                </div>
                <div class="product-info-cntr">
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
                  <a href="#" class="label-top label-sale">Sale</a>
                </div>
                <div class="product-info-cntr">
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
                  <a href="#" class="label-top label-sale">Sale</a>
                </div>
                <div class="product-info-cntr">
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
    <section>
       <h3>New Products</h3>
       
       <ul class="products">
        <?php
          $args = array(
            'post_type' => 'product',
            'posts_per_page' => 12,
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
      </ul><!--/.products-->
       
    </section>
  </main>
  <!-- /.main -->

  <footer class="footer gsn-footer">
    
  </footer>
  <!-- /.footer -->

  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/vendor/jquery-3.1.1.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/vendor/slick.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/custom/all.js"></script>

  <script>
    $(document).ready(function() {
      $('.slider-cntr').slick();
    });
  </script>
</body>
</html>