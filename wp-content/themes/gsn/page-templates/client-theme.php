<?php
/**
 * Template Name: Client Theme
 *
 * @package GSN
 * @since GSN 1.0
 */
 if(is_user_logged_in()){?>
	<script>
	location.href="<?php echo site_url('/dashboard');?>";
	</script>
<?php }
get_header("store");
global $gsnProduct,$gsnSettingsClass;
$gsn_settings=$gsnSettingsClass->get(); // get store Settings
$package=$gsn_settings->storePackageSettings;//get store package settings
$feature_products=$gsnProduct->get_feature_product(5);
$top_sale_list=$gsnProduct->get_sale_product_list(2);
$top_new_product_list=$gsnProduct->get_new_product_list(2);
$sale_product_list=$gsnProduct->get_sale_product_list($package['sale_product']);
$new_product_list=$gsnProduct->get_new_product_list(8);

//// new product section Ad
$new_product_ad=get_option("home_page_newproduct_section_ad");
$new_product_ad_link="";
$new_product_ad_flag=false;
if(!empty($new_product_ad)){
		$new_product_ad_url=wp_get_attachment_url($new_product_ad);
		$new_product_ad_link=get_option("home_page_newproduct_section_ad_link");
		$new_product_ad_flag=true;
}
//// sale product section Ad
$sale_product_ad=get_option("home_page_saleproduct_section_ad");
$sale_product_ad_link="";
$sale_product_ad_flag=false;
if(!empty($sale_product_ad)){
		$sale_product_ad_url=wp_get_attachment_url($sale_product_ad);
		$sale_product_ad_link=get_option("home_page_saleproduct_section_ad_link");
		$sale_product_ad_flag=true;
}

//// Middle section Left ad
$middle_section_left_ad=get_option("home_page_middle_section_left_ad");
$middle_section_left_ad_link="";
$middle_section_left_ad_flag=false;
if(!empty($middle_section_left_ad)){
		$middle_section_left_ad_url=wp_get_attachment_url($middle_section_left_ad);
		$middle_section_left_ad_link=get_option("home_page_middle_section_left_ad_link");
		$middle_section_left_ad_flag=true;
}


//// Middle section Right ad
$middle_section_right_ad=get_option("home_page_middle_section_right_ad");
$middle_section_right_ad_link="";
$middle_section_right_ad_flag=false;
if(!empty($middle_section_right_ad)){
		$middle_section_right_ad_url=wp_get_attachment_url($middle_section_right_ad);
		$middle_section_right_ad_link=get_option("home_page_middle_section_right_ad_link");
		$middle_section_right_ad_flag=true;
}

?>
  <main class="main main-content">
    <section class="hero-section">
      <div class="container">
        <div class="row">
          <div class="col-sm-3 hero-part hero__left hero-latest">
		   <?php                
                if ( $top_new_product_list->have_posts() ) {
                  while ( $top_new_product_list->have_posts() ) : $top_new_product_list->the_post();
						$post_thumnail_url="";
						if(has_post_thumbnail()){
							$post_thumnail_url=get_the_post_thumbnail_url(get_the_ID(), 'medium' );
						}
				   ?>
                   <div class="half-height latest-products <?php if($new_product_ad_flag){ ?>with-add<?php }?>">
                      <div class="product-block">
                        <div class="product-image-cntr">
                          <a class="half-image product-image" href="<?php the_permalink();?>" style="background-image: url('<?php echo $post_thumnail_url; ?>')"></a>
                          <span class="label-top label-new">New</span>
                          <div class="cart-btn">
                            <a rel="nofollow" href="/gsn/?add-to-cart=<?php the_ID();?>" data-quantity="1" data-product_id="<?php the_ID();?>" data-product_sku="" class="button product_type_simple add_to_cart_button ajax_add_to_cart">Add to cart</a>
                          </div>
													<p class="h-p-name"><a href="<?php the_permalink();?>"><?php the_title();?></a></p>
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
		<?php if($new_product_ad_flag){ ?>
            <a  <?php if(!empty($new_product_ad_link)){?> href="<?php echo $new_product_ad_link;?>"  target="_blank"<?php }?> class="home-top-add" style="background-image:url('<?php echo $new_product_ad_url; ?>')"></a>
                        <?php } ?>
          </div>
          <!-- /.hero__left -->
          <div class="col-sm-6 hero-part hero__middle hero-slider">
            <div class="slider-cntr">
           <?php 
		    if ( $feature_products->have_posts() ) {
                  while ( $feature_products->have_posts() ) : $feature_products->the_post();
						$post_thumnail_url="";
						if(has_post_thumbnail()){
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
                        <span><?php echo wp_trim_words( strip_tags( get_the_content()), $num_words = 10, $more = null );?></span>
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
          <?php                
                if ( $top_sale_list->have_posts() ) {
                  while ( $top_sale_list->have_posts() ) : $top_sale_list->the_post();
						$post_thumnail_url="";
						if(has_post_thumbnail()){
							$post_thumnail_url=get_the_post_thumbnail_url(get_the_ID(), 'medium' );
						}
				   ?>
            <div class="half-height latest-products <?php if($sale_product_ad_flag){ ?>with-add<?php } ?>">
              <div class="product-block">
                <div class="product-image-cntr">
                  <a class="half-image product-image" href="<?php the_permalink();?>" style="background-image: url('<?php echo $post_thumnail_url;?>')"></a>
                  <span class="label-top label-sale">Sale</span>
                  <div class="cart-btn">
                    <a rel="nofollow" href="/gsn/?add-to-cart=<?php  echo get_the_ID();?>" data-quantity="1" data-product_id="<?php echo get_the_ID();?>" data-product_sku="" class="button product_type_simple add_to_cart_button ajax_add_to_cart">Add to cart</a>										
                  </div>
					<p class="h-p-name"><a href="<?php the_permalink();?>"><?php the_title();?></a></p>
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
        <?php if($sale_product_ad_flag){ ?>
            <a <?php if(!empty($sale_product_ad_link)){?> href="<?php echo $sale_product_ad_link;?>" target="_blank"<?php }?> class="home-top-add" style="background-image:url('<?php echo  $sale_product_ad_url;?>');"></a>
            <?php } ?>
          </div>
          <!-- /.hero__right -->
        </div>
      </div>
    </section>
    <!-- /.hero-section -->                
  <?php
    if ( $sale_product_list->have_posts() ) {?>
    <section class="sales-section">
      <div class="container">
        <div class="section-divider"></div>
        <div class="row">          
          <h3 class="section-title">On sale products</h3>
          <div class="product-list-cntr woocommerce ">
                <ul class="products clearfix">
                  <?php while ( $sale_product_list->have_posts() ) : $sale_product_list->the_post();
                    wc_get_template_part( 'content', 'product' );
                  endwhile;?>
                   </ul>
									 <p class="text-xs-center load-more"><a href="<?php echo site_url("/sale/");?>" class="btn btn-primary">View More</a></p>
             </div>
        </div>
      </div>         
    </section>
	<?php  }
    wp_reset_postdata();
  ?>

    <!-- /.sales-section -->
    
    <?php if($middle_section_left_ad_flag || $middle_section_right_ad_flag){ ?>
    
    <section class="middle_ad_cntr">
    	<div class="container">
            <div class="row">
            <?php if($middle_section_left_ad_flag){ ?>
                <div class="col-sm-6"><a <?php if($middle_section_left_ad_link){ ?> href="<?php echo $middle_section_left_ad_link;?>" <?php } ?> class="home-mid-ad" style="background-image:url('<?php echo  $middle_section_left_ad_url; ?>');"></a></div>
             <?php } ?>   
               <?php if($middle_section_right_ad_flag){ ?>
                <div class="col-sm-6"><a <?php if($middle_section_right_ad_link){ ?> href="<?php echo $middle_section_right_ad_link;?>" <?php } ?> class="home-mid-ad" style="background-image:url('<?php echo  $middle_section_right_ad_url; ?>');"></a></div>
             <?php } ?> 
            </div>
 	   </div>
    </section>
    
    <?php } ?>

    <!-- /.hero-section -->    
<?php if ( $new_product_list->have_posts() ) { ?>
   <section class="new-section <?php if($middle_section_left_ad_flag || $middle_section_right_ad_flag){ ?>with-middle-section-ad <?php } ?>">
      <div class="container">
        <div class="section-divider"></div>
        <div class="row">          
          <h3 class="section-title">New products</h3>
          
          <div class="product-list-cntr woocommerce ">
            <ul class="products clearfix">
                 <?php  while ( $new_product_list->have_posts() ) : $new_product_list->the_post();
                    wc_get_template_part( 'content', 'product' );
                  endwhile; ?>
              </ul>
							<p class="text-xs-center load-more"><a href="<?php echo site_url("/shop/");?>" class="btn btn-primary">View More</a></p>
            <!--/.products-->     
          </div>
        </div>
      </div>         
    </section>
<?php  }
    wp_reset_postdata();
  ?>

    <!-- /.new-section -->
  </main>
  <!-- /.main -->

  <?php get_footer('store') ?>
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/vendor/slick.min.js"></script>

  <script>
    $(document).ready(function() {
      $('.slider-cntr').slick();
    });
  </script>
