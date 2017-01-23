<?php
/**
 * Template Name: Contact Template
 *
 * @package GSN
 * @since GSN 1.0
 */
get_header();?>

<main class="main main-content about-page contact-page">
	<section class="page-hero page-top">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 page__top-info">
					<h1>Contact Us</h1>
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
	<section class="page-top">
		<div class="container">
			<form name="contact_store_form" id="contact_store_form" class="col-md-8 offset-md-2">
				<!-- Row start -->
				<div class="form-group row">
					<label for="fullName" class="col-sm-6 col-form-label col-form-label-sm">Full Name<abbr class="required" title="required">*</abbr></label>
					
					<div class="col-sm-12">
						<input type="text" class="form-control form-control-sm" name="fullName" id="fullName">
					</div>
				</div>
				<!-- Row end --> 
				<!-- Row start -->
				<div class="form-group row">
					<label for="emailAddress" class="col-sm-6 col-form-label col-form-label-sm">Email Address<abbr class="required" title="required">*</abbr></label>
					<div class="col-sm-12">
						<input type="text" class="form-control form-control-sm" name="emailAddress" id="emailAddress">
					</div>
				</div>
				<!-- Row end --> 
				
				<!-- Row start -->
				<div class="form-group row">
					<label for="phoneNumber" class="col-sm-6 col-form-label col-form-label-sm">Phone Number</label>
					<div class="col-sm-12">
						<input type="text" class="form-control form-control-sm" name="phoneNumber" id="phoneNumber">
					</div>
				</div>
				<!-- Row end --> 
				<!-- Row start -->
				<div class="form-group row">
					<label for="message" class="col-sm-6 col-form-label col-form-label-sm">Messsage<abbr class="required" title="required">*</abbr></label>
					<div class="col-sm-12">
						<textarea class="form-control form-control-sm" name="message" id="message" rows="15"></textarea>
					</div>
				</div>
				<!-- Row end -->
				<div class="contact-btn-wrap text-xs-right"><button type="submit" class="btn btn-primary">Submit</button></div>
			</form>
		</div>
	</section>
</main>
<?php get_footer();?>
<script>
  /* Store Setting jQuery validation Procress */
	jQuery("#contact_store_form").validate({
		rules: {
		  fullName:"required",
		  emailAddress:{
			 required:true, 
			email: true  
		  },
		  phoneNumber: {
			minlength:9,
			maxlength:10,
			number: true
		  },
		  message:"required"
		},
	  submitHandler: function(form) {
		  var formdata=jQuery(form).serialize();
		  var data= {action: "gsn_store_contact_action", formdata : formdata};
		  var response=ajax_call_post(data,"#gsn_store_contact_action",'',function(response){
			// window.location.href=response.redirectUrl;
				 jQuery(form)[0].reset();
				 jQuery('.parent_dropdown_cntr').html(response.dropdown);
				 jQuery('<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong>'+response.msg+'</div>').insertBefore(form);
		 });
	  }
	}); 
</script>