
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
 <script> 
  /* Store Setting jQuery validation Procress */
jQuery("#profile_setting_form").validate({
  submitHandler: function(form) {
	  var formdata=jQuery(form).serialize();
	  var data= {action: "gsn_store_profile_setting", formdata : formdata};
	  var response=ajax_call_post(data,"#profile_setting_form",'',function(response){
		// window.location.href=response.redirectUrl;
			 jQuery(form)[0].reset();
			 jQuery('.parent_dropdown_cntr').html(response.dropdown);
			 jQuery('<div class="alert alert-success alert-dismissible"><a class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success!</strong> '+response.msg+'</div>').insertBefore(form);
			  
	 },function(){
		jQuery('html, body').animate({
				scrollTop: jQuery("body").offset().top
			}, 500); 
	 });
  }
}); 
 
 
  /* Store Setting jQuery validation Procress */
jQuery("#store_setting_form").validate({
	rules: {
      facebook:{
		url: true  
	  },
	  googleplus:{
		url: true  
	  },
	  twitter: {
		url: true  
	  },
    },
  submitHandler: function(form) {
	  var formdata=jQuery(form).serialize();
	 // console.log(formdata);

	  var about_content =tinyMCE.activeEditor.getContent();
//	  console.log(escaped);
	  var data= {action: "gsn_add_store_setting", formdata : formdata, aboutStore:about_content};
	  var response=ajax_call_post(data,"#store_setting_form",'',function(response){
		 //  window.location.href=response.redirectUrl;
			 jQuery(form)[0].reset();
			 jQuery('.parent_dropdown_cntr').html(response.dropdown);
			 jQuery('.alert-success').remove();
			 
			 jQuery('<div class="alert alert-success alert-dismissible"><a class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success!</strong> '+response.msg+'</div>').insertBefore(form);
			 
	 },function(){
		 jQuery('html, body').animate({
				scrollTop: jQuery("body").offset().top
			}, 500);
		 
	 });
	 
  }
});
 

 
 

 
 /* Login jQuery validation Procress */
jQuery("#category_create_form").validate({
	rules: {
      name:"required",
    },
  submitHandler: function(form) {
	  var formdata=jQuery(form).serialize();
	  var data= {action: "gsn_saveCategory", formdata : formdata};
	  var response=ajax_call_post(data,"#category_create_form",'',function(response){
			 //  window.location.href=response.redirectUrl;
			 jQuery(form)[0].reset();
			 jQuery('.parent_dropdown_cntr').html(response.dropdown);
			 
			 jQuery('<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong>'+response.msg+'</div>').insertBefore(form);
	 });
  }
	
});
 </script>