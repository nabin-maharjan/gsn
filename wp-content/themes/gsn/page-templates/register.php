<?php
/**
 * Template Name: Register Page
 *
 * @package GSN
 * @since GSN 1.0
 */
 
 get_header();
 ?>
 <div class="container">
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
        <input type="hidden" class="form-control form-control-sm" name="latitute" id="latitute">
        <input type="hidden" class="form-control form-control-sm" name="lognitue" id="lognitue">
        
      </div>
    </div>
    <!-- Row end -->
    
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

<?php get_footer(); ?>
<script src="https://maps.googleapis.com/maps/api/js?libraries=places&callback=myMap"></script>
<script>
jQuery("#register_form").validate({
	 ignore: ['storeLocation'],
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
	  storeLocation :  "required"
	  
	  
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
  submitHandler: function(form) {
    alert('hi');
  }
 });

</script>