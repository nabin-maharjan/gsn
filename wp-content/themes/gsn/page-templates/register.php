<?php
/**
 * Template Name: Register Page
 *
 * @package GSN
 * @since GSN 1.0
 */
get_header();
?>

<div class="js-gsn-landing-hero gsn-landing__hero"  style=" background-image:url('<?php echo get_template_directory_uri(); ?>/assets/images/bg.jpg');">
	<div class="gsn-landing__form__wrapper clearfix" id="js-landing-form-cntr">
		<div id="login" class="js-gsn-landing-tab-content gsn-landing__tab__content tab-content__login">
			<h2 class="gsn-landing__tab__title">Login</h2>
			<form name="login_form" id="login_form">
				<!-- Row start -->
				<div class="gsn-landing__form__group form-group">
					<label for="loginEmailAddress" class="gsn-landing__form__label form-label">Email Address</label>
					<div class="form-input">
						<input type="text" class="form-control" name="loginEmailAddress" id="loginEmailAddress" placeholder="Enter your email address">
					</div>
				</div>
				<!-- Row end -->
				<!-- Row start -->
				<div class="gsn-landing__form__group form-group">
					<label for="login_password" class="gsn-landing__form__label form-label" type="password">Password</label>
					<div class="form-input">
						<input type="password" class="form-control" name="loginPassword" id="loginPassword" placeholder="Enter your password">
					</div>
				</div>
				<!-- Row end -->
				<button type="submit" class="btn btn-submit">Login</button>
			</form>
			<div class="gsn-landing__form__message login-message">
				<span>Haven't registered yet? <a href="#register" class="js-gsn-landing-form-link">Register Here</a></span>
			</div>
			<!-- /.gsn-landing__form__message -->
		</div>
		<!-- Register Form -->

		<div id="register" class="js-gsn-landing-tab-content gsn-landing__tab__content tab-content__register">
			<h2 class="gsn-landing__tab__title">Register</h2>
		  <form name="register_form" id="register_form">
		    <div class="row">
		      <!-- Row start -->
		      <div class="gsn-landing__form__group form-group col-sm-6">
		        <label for="firstName" class="gsn-landing__form__label form-label">First Name</label>
		        <div class="form-input">
		          <input type="text" class="form-control" name="firstName" id="firstName" placeholder="Enter your first name">
		        </div>
		      </div>
		      <!-- Row end -->
		      <!-- Row start -->
		      <div class="gsn-landing__form__group form-group col-sm-6">
		        <label for="lastName" class="gsn-landing__form__label form-label">Last Name</label>
		        <div class="form-input">
		          <input type="text" class="form-control"  name="lastName"  id="lastName"  placeholder="Enter your last name">
		        </div>
		      </div>
		      <!-- Row end -->
		      <!-- Row start -->
		      <div class="gsn-landing__form__group form-group col-sm-6">
		        <label for="emailAddress" class="gsn-landing__form__label form-label">Email Address</label>
		        <div class="form-input">
		          <input type="text" class="form-control" name="emailAddress" id="emailAddress" placeholder="Enter your email address">
		        </div>
		      </div>
		      <!-- Row end -->
		      <!-- Row start -->
		      <div class="gsn-landing__form__group form-group col-sm-6">
		        <label for="shopType" class="gsn-landing__form__label form-label">Shop Type</label>
		        <div class="form-input">
							<?php global $store;
								$shop_types = $store->shop_types();
							?>
							<select class="form-control" name="shopType" id="shopType">
								<option value="">Choose shop type</option>
								<?php foreach ($shop_types as $type) {?>
									<option value="<?php echo $type->term_id; ?>"><?php echo $type->name; ?></option>
								<?php }?>
							</select>
		        </div>
		      </div>
		      <!-- Row end -->
		      <div class="clearfix">
		      <!-- Row start -->
		      <div class="gsn-landing__form__group form-group col-sm-6">
		        <label for="password" class="gsn-landing__form__label form-label">Password</label>
		        <div class="form-input">
		          <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password">
		        </div>
		      </div>
		      <!-- Row end -->
					<!-- Row start -->
					<div class="gsn-landing__form__group form-group col-sm-6">
						<label for="cpassword" class="gsn-landing__form__label form-label">Confirm Password</label>
						<div class="form-input">
							<input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Confirm your password">
						</div>
					</div>
					<!-- Row end -->
		      </div>
		          <!-- Row start -->
		          <div class="gsn-landing__form__group form-group col-sm-6">
		            <label for="mobileNumber" class="gsn-landing__form__label form-label">Mobile Number</label>
		            <div class="form-input">
		              <input type="text" class="form-control" name="mobileNumber" id="mobileNumber" placeholder="Enter your mobile number">
		            </div>
		          </div>
		          <!-- Row end -->


		          <!-- Row start -->
		          <div class="gsn-landing__form__group form-group col-sm-6">
		            <label for="storeName" class="gsn-landing__form__label form-label">Store Name</label>
		            <div class="form-input">
		              <input type="text" class="form-control" name="storeName" id="storeName" placeholder="Enter your store name">
		            </div>
		          </div>
		          <!-- Row end -->

		          <!-- Row start -->
		          <div class="gsn-landing__form__group form-group col-sm-6">
		            <label for="panNumber" class="gsn-landing__form__label form-label">Pan Number</label>
		            <div class="form-input">
		              <input type="text" class="form-control" name="panNumber"  id="panNumber" placeholder="Enter your pan number">
		            </div>
		          </div>
		          <!-- Row end -->

		      <!-- Row start -->
		      <div class="bd-example bd-example-padded-bottom col-sm-6 location_cntr">
		        <label for="location" class="gsn-landing__form__label form-label">Set Your Store Location</label>
		        <button type="button" class="js-gsn-landing-location-btn btn btn-primary col-sm-12 brick_red gsn-landing__location__btn" id="js-gsn-landing-set-lbtn"> Location </button>
		        <button type="button" style="display:none" class="js-gsn-landing-location-btn btn btn-success col-sm-12 gsn-landing__location__btn"  id="js-gsn-landing-change-lbtn"> <span>Your location</span>
		        <p class="gsn-landing__location__btn__text"></p>
		        </button>
		        <input type="hidden" class="form-control" name="storeFullAddress" id="storeFullAddress">
		                <input type="hidden" class="form-control" name="latitute" id="latitute">
		                <input type="hidden" class="form-control" name="lognitute" id="lognitute">
		      </div>
		      <!-- Row end -->
		    </div>
		    <button type="submit" class="btn btn-submit">Register</button>
		  </form>
		  <div class="gsn-landing__form__message register-message">
				<span>Already registered? <a href="#login" class="js-gsn-landing-form-link">Login Here</a></span>
		  </div>
			<!-- /.gsn-landing__form__message -->
		</div>
		<!-- Register Form End -->

		<div class="gsn-landing__close__fwrap">
			<a href="#" class="js-close-form-anchor gsn-landing__close__flink close__btn">
				<svg>
					<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-cross"></use>
				</svg>
				<span>Close</span>
			</a>
		</div>
		<!-- /.gsn-landing__close__fwrap -->
		<!-- Row start -->
		<div id="js-gsn-grid-system-modal" class="gsn-landing__location__modal gsn-landing-lmodal">
				<div class="gsn-landing-lmodal__content">
					<div class="gsn-landing-lmodal__heading clearfix" id="js-gsn-landing-close-lmodal">
						<a href="#" class="modal--close fr">
							<span>
								<svg>
						<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-cross"></use>
					</svg>
				</span>
			</a>
						<h4 class="modal--text fl" id="gridModalLabel">Find Your Store Location</h4>
					</div>
					<div class="gsn-landing-lmodal__body">
						<div class="gsn-landing__form__group form-group clearfix">
							<div class="form-input">
								<input id="pac-input" class="controls" type="text" placeholder="Search Box">
								<div id="map" style="width:100%;height:400px; margin-bottom: 10px;"></div>
								Selected Location:<span id="selected_location_label"></span>
							</div>
						</div>
					</div>
					<div class="gsn-landing-lmodal__footer clearfix">
						<button type="button" class="js-gsn-set-lbtn btn btn-primary fr" >Set location</button>
					</div>
				</div>
		</div>
		<!-- Row end -->
	</div>
	<!-- /.gsn-landing__form__wrapper -->

	<div class="js-landing-about-link gsn-landing__about__lwrap">
		<a id="js-about-btn" class="about-section gsn-landing__about__link" href="#about">About us?</a>
	</div>
	<!-- /.landing-about-link -->

	<div class="js-landing-buttons gsn-landing__access__btns">
		<ul class="nav nav-tabs clearfix gsn-landing__access__items">
			<li class="gsn-landing__access__item">
				<a href="#login" class="js-gsn-landing-access-link gsn-landing__access__link">Login</a>
			</li>
			<li class="gsn-landing__access__item">
				<a href="#register" class="js-gsn-landing-access-link gsn-landing__access__link">Register</a>
			</li>
		</ul>

		<div style="color:#fff; margin-top:5px">This site is in under testing phase. All data will be wiped out before we go live.</div>
	</div>
	<!-- /.gsn-landing__access__btns -->	
</div>

<?php get_footer();?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcldtJlaZ2nGXLR7OnH36zzZs1UEREDTU&libraries=places"></script>
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
			shopType:"required",
				emailAddress: {
					required: true,
					email: true,
			remote:{
						url :ajaxUrl,
				type: "post",
				data: {
					action: "email_is_exists",
					email : function(){
						return jQuery('#emailAddress').val();
					},
					jquery : 'jquery'
				}
			}
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
			number: true,
			remote:{
						url :ajaxUrl,
				type: "post",
				data: {
					action: "gsn_check_mobile_exists",
					mobileNumber : function(){
						return jQuery('#mobileNumber').val();
					},
					jquery : 'jquery'
				}
			}
				},
			storeName : "required",
			panNumber : "required",
			storeFullAddress :  "required"


			},
			// Specify validation error messages
			messages: {
				firstname: "Please enter your firstname",
				lastname: "Please enter your lastname",
			shopType:"Please select shop type",
				password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long"
				},
			cpassword: {
				equalTo : "Comfirm password and password must be same."
			},
				emailAddress: {
					required: "Please enter a valid email address",
					email:"Please enter a valid email address",
			remote: "This email is already registered.",

			},
			mobileNumber: {
				remote: "This mobile number is already registered.",
			},
			storeLocation : "Please mark your location on map",
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

</script>