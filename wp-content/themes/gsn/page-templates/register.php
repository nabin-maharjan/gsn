<?php
/**
 * Template Name: Register Page
 *
 * @package GSN
 * @since GSN 1.0
 */
 get_header();
 ?>
<section class="landing">  
  <div class="container">
    <!-- LOGIN and REGISTER Form -->
    <div class="landing__form">      
      <!-- TAB NAV -->
      <ul id="landing__tab" class="nav nav-tabs clearfix" role="tablist">
        <li class="active" role="presentation">
          <a href="#login" role="tab" data-toggle="tab">Login</a>
        </li>
        <li role="presentation">
          <a href="#register" role="tab" data-toggle="tab">Register</a>
        </li>
      </ul>
      <!-- TAB NAV End -->
      <!-- TAB CONTENT -->
      <div class="landing__tab-content tab-content clearfix">
        <!-- Login Form -->
        <div id="login" class="tab-pane active tab-content__login" role="tabpanel">
          <h2>Login</h2>
          <form name="login_form" id="login_form">
            <!-- Row start -->
            <div class="form-group row">
              <label for="loginEmailAddress" class="col-sm-2 col-form-label col-form-label-sm">Email Address</label>
              <div class="col-sm-10">
                <input type="text" class="form-control form-control-sm" name="loginEmailAddress" id="loginEmailAddress" placeholder="Email Address">
              </div>
            </div>
            <!-- Row end -->
            
            <!-- Row start -->
            <div class="form-group row">
              <label for="login_password" class="col-sm-2 col-form-label col-form-label-sm">Password</label>
              <div class="col-sm-10">
                <input type="text" class="form-control form-control-sm" name="loginPassword" id="loginPassword" placeholder="Password">
              </div>
            </div>
            <!-- Row end -->
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
        <!-- Login Form End -->
        <!-- Register Form -->
        <div id="register" class="tab-pane tab-content__register" role="tabpanel">
          <h2>Register</h2>
          <form name="register_form" id="register_form">
            <!-- Row start -->
            <div class="form-group row">
              <label for="firstName" class="col-sm-2 col-form-label col-form-label-sm">First Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control form-control-sm" name="firstName" id="firstName" placeholder="First Name">
              </div>
            </div>
            <!-- Row end -->
            <!-- Row start -->
            <div class="form-group row">
              <label for="lastName" class="col-sm-2 col-form-label col-form-label-sm">Last Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control form-control-sm"  name="lastName"  id="lastName"  placeholder="Last Name">
              </div>
            </div>
            <!-- Row end -->
            <!-- Row start -->
            <div class="form-group row">
              <label for="emailAddress" class="col-sm-2 col-form-label col-form-label-sm">Email Address</label>
              <div class="col-sm-10">
                <input type="text" class="form-control form-control-sm" name="emailAddress" id="emailAddress" placeholder="Email Address">
              </div>
            </div>
            <!-- Row end -->
            
            <!-- Row start -->
            <div class="form-group row">
              <label for="password" class="col-sm-2 col-form-label col-form-label-sm">Password</label>
              <div class="col-sm-10">
                <input type="password" class="form-control form-control-sm" name="password" id="password" placeholder="Password">
              </div>
            </div>
            <!-- Row end -->

            <!-- Row start -->
            <div class="form-group row">
              <label for="cpassword" class="col-sm-2 col-form-label col-form-label-sm">Confirm Password</label>
              <div class="col-sm-10">
                <input type="password" class="form-control form-control-sm" name="cpassword" id="cpassword" placeholder="confirm Password">
              </div>
            </div>
            <!-- Row end -->

            <!-- Row start -->
            <div class="form-group row">
              <label for="mobileNumber" class="col-sm-2 col-form-label col-form-label-sm">Mobile Number</label>
              <div class="col-sm-10">
                <input type="text" class="form-control form-control-sm" name="mobileNumber" id="mobileNumber" placeholder="Mobile Location">
              </div>
            </div>
            <!-- Row end -->

            <!-- Row start -->
            <div class="form-group row">
              <label for="storeName" class="col-sm-2 col-form-label col-form-label-sm">Store Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control form-control-sm " name="storeName" id="storeName" placeholder="Store Name">
              </div>
            </div>
            <!-- Row end -->

            <!-- Row start -->
            <div class="form-group row">
              <label for="panNumber" class="col-sm-2 col-form-label col-form-label-sm">Pan Number</label>
              <div class="col-sm-10">
                <input type="text" class="form-control form-control-sm" name="panNumber"  id="panNumber" placeholder="Pan Number">
              </div>
            </div>
            <!-- Row end -->

            <!-- Row start -->
            <div class="form-group row">
              <label for="storeLocation" class="col-sm-2 col-form-label col-form-label-sm">Store Location</label>
              <div class="col-sm-10">
               <input id="pac-input" class="controls" type="text" placeholder="Search Box">
               <div id="map" style="width:100%;height:500px"></div>
                 Selected Location :<span id="selected_location_label"></span>
                <input type="hidden" class="form-control form-control-sm" name="storeFullAddress" id="storeFullAddress">
                <input type="hidden" class="form-control form-control-sm" name="latitute" id="latitute">
                <input type="hidden" class="form-control form-control-sm" name="lognitute" id="lognitute">                  
              </div>
            </div>
            <!-- Row end -->
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
        <!-- Register Form End -->
      </div>
      <!-- TAB CONTENT End -->
    </div>
    <!-- LOGIN and REGISTER Form End -->   
  </div> 
</section>

<?php get_footer(); ?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcldtJlaZ2nGXLR7OnH36zzZs1UEREDTU&libraries=places&callback=myMap"></script>
<script>
/* Login jQuery validation Procress */
jQuery("#login_form").validate({
	rules: {
      loginEmailAddress: {
        required: true,
        email: true
      },
      loginPassword: {
        required: true,
      },
    },
	// Specify validation error messages
    messages: {
      password: "Please provide a password",
      emailAddress: "Please enter a valid email address",
    },
  submitHandler: function(form) {
	  var formdata=jQuery(form).serialize();
		jQuery.ajax({
         type : "post",
         dataType : "json",
         url :"<?php echo admin_url( 'admin-ajax.php' ); ?>",
         data : {action: "store_login", formdata : formdata},
         success: function(response) {
            if(response.status == "success") {
               window.location.href=response.redirectUrl;
			   return false;
            }else {
				// validation error occurs
				if(response.code=="406"){
					var data= jQuery.parseJSON(response.msg);		
					
					jQuery.each(data,function(index,value){
						 if(jQuery('#'+index+'-error').length){
							 jQuery('#'+index+'-error').html();
						 }else{
							 var error_html='<label id="#'+index+'-error" class="error" for="'+index+'">'+value[0]+'</label>';
							 jQuery(error_html).insertAfter('#'+index);
						 }
					});
				}else{
					 jQuery('<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong>'+response.msg+'</div>').insertBefore("#login_form");
					
				}
            }
         }
      }); 
  }
	
});





/* Registration jQuery validation process */
jQuery("#register_form").validate({
	 ignore: ['storeFullAddress'],
	// Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      firstName: "required",
      lastName: "required",
      emailAddress: {
        required: true,
        email: true
      },
      password: {
        required: true,
        minlength: 5
      },
	  cpassword :{
		  minlength : 5,
          equalTo : "#password"  
		  
	  },
	  mobileNumber: {
		required: true,
		minlength:9,
		maxlength:10,
		number: true
      },
	  storeName : "required",
	  panNumber : "required",
	  storeFullAddress :  "required"
	
	  
    },
    // Specify validation error messages
    messages: {
      firstname: "Please enter your firstname",
      lastname: "Please enter your lastname",
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
	  cpassword: {
		  equalTo : "Comfirm password and password must be same."
	  },
      email: "Please enter a valid email address",
	  storeLocation : "Please mark your location on map",
    },
	onfocusout: function(element){
		if(jQuery(element).attr('name')==="emailAddress"){
			 if(jQuery(element).valid()){
				 check_email_exists(jQuery(element).val());
			 }
		}
	},
	
  submitHandler: function(form) {
	  var formdata=jQuery(form).serialize();
		jQuery.ajax({
         type : "post",
         dataType : "json",
         url :"<?php echo admin_url( 'admin-ajax.php' ); ?>",
         data : {action: "store_registration", formdata : formdata},
         success: function(response) {
            if(response.status == "success") {
               window.location.href=response.redirectUrl;
			   return false;
			}else {
				// validation error occurs
				if(response.code=="406"){
					var data= jQuery.parseJSON(response.msg);		
					
					jQuery.each(data,function(index,value){
						 if(jQuery('#'+index+'-error').length){
							 jQuery('#'+index+'-error').html();
						 }else{
							 var error_html='<label id="#'+index+'-error" class="error" for="'+index+'">'+value[0]+'</label>';
							 jQuery(error_html).insertAfter('#'+index);
						 }
					});
				}else{
					 jQuery('<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong>'+response.msg+'</div>').insertAfter('.btn-primary');
					
				}
            }
         }
      }); 
  }
 });
 
 function check_email_exists(email){
	jQuery.ajax({
         type : "post",
         dataType : "json",
         url :"<?php echo admin_url( 'admin-ajax.php' ); ?>",
         data : {action: "email_is_exists", email : email},
         success: function(response) {
            if(response.status == "success") {
            }
            else {
				// validation error occurs
				if(response.code=="406"){
					var data= jQuery.parseJSON(response.msg);		
					
					jQuery.each(data,function(index,value){
						 if(jQuery('#'+index+'-error').length){
							 jQuery('#'+index+'-error').html();
						 }else{
							 var error_html='<label id="#'+index+'-error" class="error" for="'+index+'">'+value[0]+'</label>';
							 jQuery(error_html).insertAfter('#'+index);
						 }
					});
				}else{
					 jQuery('<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong>'+response.msg+'</div>').insertAfter('.btn-primary');
					
				}
            }
         }
      });
	 
 }

 jQuery('#landing__tab a').on('click', function(e) {
  e.preventDefault();
  $(this).tab('show');
 });

</script>