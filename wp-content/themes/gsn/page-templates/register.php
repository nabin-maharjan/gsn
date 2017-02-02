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
              <label for="login_password" class="form-label" type="password">Password</label>
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
			<!-- Row start -->
			<div class="bd-example bd-example-padded-bottom col-sm-6 location_cntr">
			<label for="location" class="form-label">Set Your Store Location</label>
				<button type="button" class="btn btn-primary col-sm-12 brick_red" id="set_location_btn" data-toggle="modal" data-target="#gridSystemModal"> Location </button>
                <button type="button" style="display:none" class="btn btn-success col-sm-12"  id="change_location_btn"data-toggle="modal" data-target="#gridSystemModal">
                	<span>Your location</span>
                    <p class="btn_location_text"></p>
                </button>
			</div>
			<!-- Row end -->
			</div>
            <!-- Row start -->
			
			<div id="gridSystemModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="gridModalLabel">Find Your Store Location</h4>
						</div>
						<div class="modal-body">
						<div class="form-group clearfix">
						  
						  <div class="form-input">
						   <input id="pac-input" class="controls" type="text" placeholder="Search Box">
						   <div id="map" style="width:100%;height:400px"></div>
							 Selected Location :<span id="selected_location_label"></span>
							<input type="hidden" class="form-control" name="storeFullAddress" id="storeFullAddress">
							<input type="hidden" class="form-control" name="latitute" id="latitute">
							<input type="hidden" class="form-control" name="lognitute" id="lognitute">                  
						  </div>
                          
						</div>
						</div>
						<div class="modal-footer">
                        
						<button type="button" class="btn btn-primary btn-set-location" >Set location</button>
						</div>
					</div>
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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcldtJlaZ2nGXLR7OnH36zzZs1UEREDTU&libraries=places"></script>
<script>
/*
* event trigger when set location click
*/
jQuery('.btn-set-location').on('click',function(){
	var location_selected=jQuery('#storeFullAddress').val().trim();
	if(location_selected==""){
		if(!jQuery('.alert.alert-danger').length){
			jQuery(this).parent().prepend('<span class="alert alert-danger alert-dismissible"> Please select location</span>');
		}
			}else{
				jQuery('#set_location_btn').hide();
				jQuery('#change_location_btn').show();
				jQuery(this).parent().find('.alert').remove();
		$('#gridSystemModal').modal('hide');	
	}
});


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
	  var data= {action: "store_login", formdata : formdata};
	 var response=ajax_call_post(data,'#login_form','',function(response){
		  window.location.href=response.redirectUrl;
		return false;
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
	  var data= {action: "store_registration", formdata : formdata};
	 var response=ajax_call_post(data,'#register_form','',function(response){
		 window.location.href=response.redirectUrl;
		 return false;
		 
	 });
  }
 });
 
 function check_email_exists(email){
	 var data= {action: "email_is_exists", email : email};
	 var response=ajax_call_post(data,'.btn-primary','after',function(response){
		 console.log(response);
	 });	 
 }

 jQuery('#landing__tab a').on('click', function(e) {
  e.preventDefault();
  $(this).tab('show');
 });

</script>