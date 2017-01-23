<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $store;
global $gsnSettingsClass;
$gsn_themes=$gsnSettingsClass->available_theme();
$gsn_settings=$gsnSettingsClass->get();


//// Middle section Left ad
$middle_section_left_ad=get_option("category_page_middle_section_left_ad");
$middle_section_left_ad_link="";
$middle_section_left_ad_flag=false;
if(!empty($middle_section_left_ad)){
		$middle_section_left_ad_url=wp_get_attachment_url($middle_section_left_ad);
		$middle_section_left_ad_link=get_option("category_page_middle_section_left_ad_link");
		$middle_section_left_ad_flag=true;
}


//// Middle section Right ad
$middle_section_right_ad=get_option("category_page_middle_section_right_ad");
$middle_section_right_ad_link="";
$middle_section_right_ad_flag=false;
if(!empty($middle_section_right_ad)){
		$middle_section_right_ad_url=wp_get_attachment_url($middle_section_right_ad);
		$middle_section_right_ad_link=get_option("category_page_middle_section_right_ad_link");
		$middle_section_right_ad_flag=true;
}
?>

<main class="main main-content">
	<section class="page-hero page-top">
		<div
         class="container">
			<div class="row">
				<div class="col-sm-12 page__top-info">
                <?php 
				if(is_shop()){
					$terms=get_term_by( 'name', $store->storeName,'product_cat');	?>
                    <h1><?php echo $store->storeName;?></h1>
					<div class="page__top-desc"></div>
                    <?php 
				}
				if ( is_tax()){ 
					$queried_object = get_queried_object();
					$term_id =  (int) $queried_object->term_id;
					$terms=get_term($term_id,'product_cat');
				?>
					<h1><?php echo $terms->name;?></h1>
					<div class="page__top-desc"><?php echo $terms->description;?></div>
				<?php }?>
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
	<!-- /.page-hero -->    
	<section class="item-list-cntr">
		<div class="container">
       		 <div class="row">
				<div class="list__items">
					<ul>
                    <?php 
					
						$args = array(
							'type'                     => 'post',
							'parent'                 => $terms->term_id,
							'orderby'                  => 'name',
							'order'                    => 'ASC',
							'hide_empty'               => FALSE,
							'hierarchical'             => 1,
							'taxonomy'                 => 'product_cat',
							); 
							$child_categories = get_categories($args );
						foreach($child_categories as $child){
					?>
						<li class="col-sm-2 list-item"><a href="<?php echo get_term_link($child->term_id);?>"><?php echo $child->name;?></a></li>
                        <?php } ?>
					</ul>
				</div>
        	 </div>
		</div>
	</section>
	<!-- /.item-list-cntr -->
    
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
</main>
<!-- /.main -->