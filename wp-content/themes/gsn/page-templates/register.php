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
    <h1 class="page-title">Welcome to test</h1>
    <!-- LOGIN and REGISTER Form -->
    <div class="landing__form">      
      <!-- TAB NAV -->
      <div class="landing__nav">
        <ul id="landing__tab" class="nav nav-tabs clearfix landing__tab" role="tablist">
          <li class="active" role="presentation">
            <a href="#login" role="tab" data-toggle="tab">Login</a>
          </li>
          <li role="presentation">
            <a href="#register" role="tab" data-toggle="tab">Register</a>
          </li>
        </ul>
      </div>
      <!-- TAB NAV End -->
      <!-- TAB CONTENT -->
      <div class="landing__tab-content tab-content clearfix">
        <!-- Login Form -->
        <div id="login" class="tab-pane active tab-content__login" role="tabpanel">
          <form name="login_form" id="login_form">
            <!-- Row start -->
            <div class="form-group">
              <label for="loginEmailAddress" class="form-label">Email Address</label>
              <div class="form-input">
                <input type="text" class="form-control" name="loginEmailAddress" id="loginEmailAddress" placeholder="Enter your email address">
              </div>
            </div>
            <!-- Row end -->            
            <!-- Row start -->
            <div class="form-group">
              <label for="login_password" class="form-label">Password</label>
              <div class="form-input">
                <input type="text" class="form-control" name="loginPassword" id="loginPassword" placeholder="Enter your password">
              </div>
            </div>
            <!-- Row end -->
            <button type="submit" class="btn btn-submit">Login</button>
          </form>
        </div>
        <!-- Login Form End -->
        <!-- Register Form -->
        <div id="register" class="tab-pane tab-content__register" role="tabpanel">
          <form name="register_form" id="register_form">
		  	<div class="row">
            <!-- Row start -->
            <div class="form-group col-sm-6">
              <label for="firstName" class="form-label">First Name</label>
              <div class="form-input">
                <input type="text" class="form-control" name="firstName" id="firstName" placeholder="Enter your first name">
              </div>
            </div>
            <!-- Row end -->
            <!-- Row start -->
            <div class="form-group col-sm-6">
              <label for="lastName" class="form-label">Last Name</label>
              <div class="form-input">
                <input type="text" class="form-control"  name="lastName"  id="lastName"  placeholder="Enter your last name">
              </div>
            </div>
            <!-- Row end -->
            <!-- Row start -->
            <div class="form-group col-sm-12">
              <label for="emailAddress" class="form-label">Email Address</label>
              <div class="form-input">
                <input type="text" class="form-control" name="emailAddress" id="emailAddress" placeholder="Enter your email address">
              </div>
            </div>
            <!-- Row end -->
            
            <!-- Row start -->
            <div class="form-group col-sm-6">
              <label for="password" class="form-label">Password</label>
              <div class="form-input">
                <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password">
              </div>
            </div>
            <!-- Row end -->

            <!-- Row start -->
            <div class="form-group col-sm-6">
              <label for="cpassword" class="form-label">Confirm Password</label>
              <div class="form-input">
                <input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Confirm your password">
              </div>
            </div>
            <!-- Row end -->

            <!-- Row start -->
            <div class="form-group col-sm-6">
              <label for="mobileNumber" class="form-label">Mobile Number</label>
              <div class="form-input">
                <input type="text" class="form-control" name="mobileNumber" id="mobileNumber" placeholder="Enter your mobile number">
              </div>
            </div>
            <!-- Row end -->
			
			<!-- Row start -->
            <div class="form-group col-sm-6">
              <label for="landlineNumber" class="form-label">Mobile Number</label>
              <div class="form-input">
                <input type="text" class="form-control" name="landlineNumber" id="landlineNumber" placeholder="Enter your landline number">
              </div>
            </div>
            <!-- Row end -->

            <!-- Row start -->
            <div class="form-group col-sm-6">
              <label for="storeName" class="form-label">Store Name</label>
              <div class="form-input">
                <input type="text" class="form-control" name="storeName" id="storeName" placeholder="Enter your store name">
              </div>
            </div>
            <!-- Row end -->

            <!-- Row start -->
            <div class="form-group col-sm-6">
              <label for="panNumber" class="form-label">Pan Number</label>
              <div class="form-input">
                <input type="text" class="form-control" name="panNumber"  id="panNumber" placeholder="Enter your pan number">
              </div>
            </div>
            <!-- Row end -->
			</div>
            <!-- Row start -->
            <div class="form-group clearfix">
              <label for="storeLocation" class="form-label">Store Location</label>
              <div class="form-input">
               <input id="pac-input" class="controls" type="text" placeholder="Search Box">
               <div id="map" style="width:100%;height:500px"></div>
                 Selected Location :<span id="selected_location_label"></span>
                <input type="hidden" class="form-control" name="storeFullAddress" id="storeFullAddress">
                <input type="hidden" class="form-control" name="latitute" id="latitute">
                <input type="hidden" class="form-control" name="lognitute" id="lognitute">                  
              </div>
            </div>
            <!-- Row end -->
            <button type="submit" class="btn btn-submit">Register</button>
          </form>
        </div>
        <!-- Register Form End -->
      </div>
      <!-- TAB CONTENT End -->
    </div>
    <!-- LOGIN and REGISTER Form End -->   
  </div> 
</section>
<!-- LANDING FORM End -->

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