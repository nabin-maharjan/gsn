<?php
/**
 * Template Name: Sale
 *
 * @package GSN
 * @since GSN 1.0
 */
get_header();
global $gsnProduct;
$sale_product_list=$gsnProduct->get_sale_product_list(-1);
?>
  <main class="main main-content">  
  <section class="sales-section">
      <div class="container">
        <div class="section-divider"></div>
        <div class="row">   
		  <?php
            if ( $sale_product_list->have_posts() ) {?>
                  <h3 class="section-title">On sale products</h3>
                  <div class="product-list-cntr">
                        <ul class="products clearfix">
                          <?php while ( $sale_product_list->have_posts() ) : $sale_product_list->the_post();
                            wc_get_template_part( 'content', 'product' );
                          endwhile;?>
                           </ul>
                     </div>
            <?php  }else{?>
                There is no product on sale.
            <?php }
            wp_reset_postdata();
          ?>
          </div>
      </div>         
    </section>
    <!-- /.sales-section -->
    <!-- /.new-section -->
  </main>
  <!-- /.main -->
  <?php get_footer('store') ?>