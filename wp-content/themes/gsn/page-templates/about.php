<?php
/**
 * Template Name: About Template
 *
 * @package GSN
 * @since GSN 1.0
 */
get_header();
global $gsnSettingsClass;
$gsn_settings=$gsnSettingsClass->get();
?>
<main class="main main-content about-page">
<section class="page-hero page-top">
		<div
         class="container">
			<div class="row">
				<div class="col-sm-12 page__top-info">
					<h1>About</h1>
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
	<section>
    <div class="container">
		<?php echo apply_filters('the_content',$gsn_settings->aboutStore); ?>
	</div>
</section>
</main>
<?php get_footer(); ?>