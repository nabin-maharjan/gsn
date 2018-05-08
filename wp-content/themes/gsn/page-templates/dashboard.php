<?php
/**
 * Template Name: Dashboard
 *
 * @package GSN
 * @since GSN 1.0
 */
  get_header();
  global $store,$post;
  if($store->activated==0){?>
    <section class="flex-center">
      <div class="dashboard-info">
        Activation link was sent to you email address. Please open your email and click on link.
        <br>
        Didn't get activation email? <br> <button class="btn btn-primary send-activation-link" id="send_activation_link">Send Activation link</button></a>
				or contact us on goshopnepal@gmail.com
      </div>
    </section>
    
    
  <?php get_footer(); ?>  
    
  <script>
  	jQuery('#send_activation_link').on('click',function(){		
  		 var data= {action: "gsn_send_activation_code"};
  		 var response=ajax_call_post(data,'.btn-primary','after',function(response){
  			 if(response.code=="200"){
  				 jQuery("<div class='alert alert-success'>"+response.msg+"</div>").insertAfter('#send_activation_link');
  			 }
  		 });	
  	});
  </script>
<?php } else { ?>
<main class="dashboard-main-cntr">
  <div class="container dashboard__main-content">
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
<?php } ?>


 