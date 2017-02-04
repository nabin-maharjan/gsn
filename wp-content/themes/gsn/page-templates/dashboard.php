<?php
/**
 * Template Name: Dashboard
 *
 * @package GSN
 * @since GSN 1.0
 */
 get_header();
 global $store,$post;
?>
<main class="dashboard-main-cntr">
  <div class="container">
  	<div class="row">
			<?php 
				$dashboard_page=get_page_by_path('dashboard');
				$name="";
				$slug="";
				if($post->ID==$dashboard_page->ID){
					$name="";
					$slug="";
				}else if($post->post_parent==$dashboard_page->ID){
					$name="";
					$slug="-".$post->post_name;
				}else{
					$parent_page=get_post($post->post_parent);
					$name=$post->post_name;
					$slug="-".$parent_page->post_name;
				}
				get_template_part( 'template-parts/dashboard/content'.$slug,$name);  
			?>
		</div>
  </div>
</main>
 <?php get_footer(); ?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcldtJlaZ2nGXLR7OnH36zzZs1UEREDTU&libraries=places&callback=myMap"></script>
