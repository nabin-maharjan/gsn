<?php
/**
 * Template Name: Contact Template
 *
 * @package GSN
 * @since GSN 1.0
 */
get_header();?>
<main class="main main-content">
	<section class="page-top">
    <div class="container">
    <h3>Contact</h3>
    <form name="contact_store_form" id="contact_store_form">
        <!-- Row start -->
        <div class="form-group row">
          <label for="fullName" class="col-sm-2 col-form-label col-form-label-sm">Full Name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control form-control-sm" name="fullName" id="fullName">
          </div>
        </div>
        <!-- Row end -->
        <!-- Row start -->
        <div class="form-group row">
          <label for="emailAddress" class="col-sm-2 col-form-label col-form-label-sm">Email Address</label>
          <div class="col-sm-10">
            <input type="text" class="form-control form-control-sm" name="emailAddress" id="emailAddress">
          </div>
        </div>
        <!-- Row end -->
        
        <!-- Row start -->
        <div class="form-group row">
          <label for="phoneNumber" class="col-sm-2 col-form-label col-form-label-sm">Phone Number</label>
          <div class="col-sm-10">
            <input type="text" class="form-control form-control-sm" name="phoneNumber" id="phoneNumber">
          </div>
        </div>
        <!-- Row end -->
         <!-- Row start -->
        <div class="form-group row">
          <label for="message" class="col-sm-2 col-form-label col-form-label-sm">Messsage</label>
          <div class="col-sm-10">
            <textarea class="form-control form-control-sm" name="message" id="message" rows="15"></textarea>
          </div>
        </div>
        <!-- Row end -->
        <button type="submit" class="btn btn-primary">Submit</button>
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