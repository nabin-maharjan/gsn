<?php
/**
 * Template Name: Client Theme
 *
 * @package GSN
 * @since GSN 1.0
 */
get_header("store");
global $gsnProduct;
$feature_products=$gsnProduct->get_feature_product(5);
?>
  <main class="main main-content">
    <section class="hero-section">
      <div class="container">
        <div class="row">
          <div class="col-sm-3 hero-part hero__left hero-latest">
		   <?php
                $args = array(
                  'post_type' => 'product',
                  'posts_per_page' => 2,
                  'author'=>$store->user_id
                  );
                $loop = new WP_Query( $args );
                if ( $loop->have_posts() ) {
                  while ( $loop->have_posts() ) : $loop->the_post();
						$post_thumnail_url="";
						if(has_post_thumbnail(get_the_ID())){
							$post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
							$post_thumnail_url=get_the_post_thumbnail_url(get_the_ID(), 'medium' );
						}
				   ?>
                   <div class="half-height latest-products">
                      <div class="product-block">
                        <div class="product-image-cntr">
                          <a class="half-image product-image" href="<?php the_permalink();?>" style="background-image: url('<?php echo $post_thumnail_url; ?>')"></a>
                          <span class="label-top label-new">New</span>
                          <div class="cart-btn">
                            <a rel="nofollow" href="/gsn/?add-to-cart=<?php the_ID();?>" data-quantity="1" data-product_id="<?php the_ID();?>" data-product_sku="" class="button product_type_simple add_to_cart_button ajax_add_to_cart">Add to cart</a>
                          </div>
                        </div>
                      </div>
                      <!-- /.product-block -->
                    </div>                   
                <?php   endwhile;
                } else {
                  echo __( 'No products found' );
                }
                wp_reset_postdata();
              ?>
            
          </div>
          <!-- /.hero__left -->
          <div class="col-sm-6 hero-part hero__middle hero-slider">
            <div class="slider-cntr">
           <?php 
		    if ( $feature_products->have_posts() ) {
                  while ( $feature_products->have_posts() ) : $feature_products->the_post();
						$post_thumnail_url="";
						if(has_post_thumbnail(get_the_ID())){
							$post_thumbnail_id = get_post_thumbnail_id(get_the_ID() );
							$post_thumnail_url=get_the_post_thumbnail_url( get_the_ID(), 'full' );
						}
				   ?>
                   <div class="slider__slides">
                <a href="#" class="slider-image" style="background-image: url('<?php echo $post_thumnail_url;?>')"></a>
                <div class="slider-content">
                  <div class="slider-title">
                    <h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                  </div>
                  <div class="slider-desc">
                    <span><?php echo wp_trim_words( strip_tags( get_the_content()), $num_words = 8, $more = null );?></span>
                  </div>
                  <div class="slider-btn">
                    <a href="<?php the_permalink();?>" class="btn btn-submit shop-btn">Shop now</a>
                  </div>
                </div>
              </div>
                                      
                <?php   endwhile;
                } else {
                  echo __( 'No products found' );
                }
                wp_reset_postdata();
				?>
            
            
              

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
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/vendor/slick.min.js"></script>

  <script>
    $(document).ready(function() {
      $('.slider-cntr').slick({
        
      });
    });
  </script>
