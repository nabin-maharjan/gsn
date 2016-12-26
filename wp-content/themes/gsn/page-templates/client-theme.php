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
              <a class="half-image" href="#" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/new-1.jpg')">
                
              </a>
            </div>
            <div class="half-height latest-products">
              <a class="half-image" href="#" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/new-2.jpg')">
                
              </a>
            </div>
          </div>
          <!-- /.hero__left -->
          <div class="col-sm-6 hero-part hero__middle hero-slider">
            
          </div>
          <!-- /.hero__mmiddle -->
          <div class="col-sm-3 hero-part hero__right hero-sales">
            
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
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/custom/all.js"></script>
</body>
</html>