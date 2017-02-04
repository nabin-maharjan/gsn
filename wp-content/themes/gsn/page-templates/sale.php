<?php
/**
 * Template Name: Sale
 *
 * @package GSN
 * @since GSN 1.0
 */
get_header();
global $gsnProduct;
global $gsnSettingsClass;
$gsn_settings=$gsnSettingsClass->get(); // get store Settings
$package=$gsn_settings->storePackageSettings;//get store package settings
$sale_product_list=$gsnProduct->get_sale_product_list($package['sale_product']);
//// Middle section Left ad
$middle_section_left_ad=get_option("sale_page_middle_section_left_ad");
$middle_section_left_ad_link="";
$middle_section_left_ad_flag=false;
if(!empty($middle_section_left_ad)){
		$middle_section_left_ad_url=wp_get_attachment_url($middle_section_left_ad);
		$middle_section_left_ad_link=get_option("sale_page_middle_section_left_ad_link");
		$middle_section_left_ad_flag=true;
}

//// Middle section Right ad
$middle_section_right_ad=get_option("sale_page_middle_section_right_ad");
$middle_section_right_ad_link="";
$middle_section_right_ad_flag=false;
if(!empty($middle_section_right_ad)){
		$middle_section_right_ad_url=wp_get_attachment_url($middle_section_right_ad);
		$middle_section_right_ad_link=get_option("sale_page_middle_section_right_ad_link");
		$middle_section_right_ad_flag=true;
}
?>
  <main class="main main-content inner-page sale-page">  
  
  <section class="page-hero page-top">
		<div
         class="container">
			<div class="row">
				<div class="col-sm-12 page__top-info">
					<h1>On sale products</h1>
					<?php	
						/**
						 * woocommerce_before_main_content hook.
						 *
						 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
						 * @hooked woocommerce_breadcrumb - 20
						 */
						
						do_action( 'woocommerce_before_main_content' );
						
					?>
				</div>
			</div>
		</div>
	</section>
   <!-- Ad Container -->
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
    <!-- / Ad Container -->
  
  
  <section class="sales-section">
      <div class="container">
        <div class="row">   
		  <?php
            if ( $sale_product_list->have_posts() ) {?>
                  <div class="product-list-cntr woocommerce">
                        <ul class="products clearfix">
                          <?php while ( $sale_product_list->have_posts() ) : $sale_product_list->the_post();
                            wc_get_template_part( 'content', 'product' );
                          endwhile;?>
                           </ul>
                     </div>
                     
                     <?php
						/**
						 * woocommerce_after_main_content hook.
						 *
						 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
						 */
						do_action( 'woocommerce_after_main_content' );
					?>
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