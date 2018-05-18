  <div class="gsn-landing__form__wrapper clearfix" id="js-landing-form-cntr">
		<div id="login" class="js-gsn-landing-tab-content gsn-landing__tab__content tab-content__login">
			<h2 class="gsn-landing__tab__title">Login</h2>
			<form name="login_form" id="login_form" class="ta-c">
				<!-- Row start -->
				<div class="gsn-landing__form__item">
					<label for="loginEmailAddress" class="gsn-landing__form__label">Email Address</label>
					<div class="gsn-landing__form__input">
						<input type="text" class="gsn-landing__form__field gsn-landing__form__field--input" name="loginEmailAddress" id="loginEmailAddress" placeholder="Enter your email address">
					</div>
				</div>
				<!-- Row end -->
				<!-- Row start -->
				<div class="gsn-landing__form__item">
					<label for="login_password" class="gsn-landing__form__label" type="password">Password</label>
					<div class="gsn-landing__form__input">
						<input type="password" class="gsn-landing__form__field gsn-landing__form__field--input" name="loginPassword" id="loginPassword" placeholder="Enter your password">
					</div>
				</div>
				<!-- Row end -->
				<div class="ta-c gsn-landing__form__bwrap">
					<button type="submit" class="btn-submit gsn-custom__btn gsn-custom__btn--grey gsn-custom__btn--big">Login</button>
				</div>
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
		    <div class="neg-m gsn-landing__form__items">
		      <!-- Row start -->
		      <div class="gsn-landing__form__item">
		        <label for="firstName" class="gsn-landing__form__label">First Name</label>
		        <div class="gsn-landing__form__input">
		          <input type="text" class="gsn-landing__form__field gsn-landing__form__field--input" name="firstName" id="firstName" placeholder="Enter your first name">
		        </div>
		      </div>
		      <!-- Row end -->

		      <!-- Row start -->
		      <div class="gsn-landing__form__item">
		        <label for="lastName" class="gsn-landing__form__label">Last Name</label>
		        <div class="gsn-landing__form__input">
		          <input type="text" class="gsn-landing__form__field gsn-landing__form__field--input"  name="lastName"  id="lastName"  placeholder="Enter your last name">
		        </div>
		      </div>
		      <!-- Row end -->

		      <!-- Row start -->
		      <div class="gsn-landing__form__item">
		        <label for="emailAddress" class="gsn-landing__form__label">Email Address</label>
		        <div class="gsn-landing__form__input">
		          <input type="text" class="gsn-landing__form__field gsn-landing__form__field--input" name="emailAddress" id="emailAddress" placeholder="Enter your email address">
		        </div>
		      </div>
		      <!-- Row end -->

		      <!-- Row start -->
		      <div class="gsn-landing__form__item">
		        <label for="shopType" class="gsn-landing__form__label">Shop Type</label>
		        <div class="gsn-landing__form__input">
							<?php global $store;
								$shop_types = $store->shop_types();
							?>
							<select class="gsn-landing__form__field gsn-landing__form__field--select" name="shopType" id="shopType">
								<option value="">Choose shop type</option>
								<?php foreach ($shop_types as $type) {?>
									<option value="<?php echo $type->term_id; ?>"><?php echo $type->name; ?></option>
								<?php }?>
							</select>
		        </div>
		      </div>
		      <!-- Row end -->
		      
		      <!-- Row start -->
		      <div class="gsn-landing__form__item">
		        <label for="password" class="gsn-landing__form__label">Password</label>
		        <div class="gsn-landing__form__input">
		          <input type="password" class="gsn-landing__form__field gsn-landing__form__field--input" name="password" id="password" placeholder="Enter your password">
		        </div>
		      </div>
		      <!-- Row end -->
					<!-- Row start -->
					<div class="gsn-landing__form__item">
						<label for="cpassword" class="gsn-landing__form__label">Confirm Password</label>
						<div class="gsn-landing__form__input">
							<input type="password" class="gsn-landing__form__field gsn-landing__form__field--input" name="cpassword" id="cpassword" placeholder="Confirm your password">
						</div>
					</div>
					<!-- Row end -->
		      
					<!-- Row start -->
					<div class="gsn-landing__form__item">
						<label for="mobileNumber" class="gsn-landing__form__label">Mobile Number</label>
						<div class="gsn-landing__form__input">
							<input type="text" class="gsn-landing__form__field gsn-landing__form__field--input" name="mobileNumber" id="mobileNumber" placeholder="Enter your mobile number">
						</div>
					</div>
					<!-- Row end -->

					<!-- Row start -->
					<div class="gsn-landing__form__item">
						<label for="storeName" class="gsn-landing__form__label">Store Name</label>
						<div class="gsn-landing__form__input">
							<input type="text" class="gsn-landing__form__field gsn-landing__form__field--input" name="storeName" id="storeName" placeholder="Enter your store name">
						</div>
					</div>
					<!-- Row end -->

					<!-- Row start -->
					<div class="gsn-landing__form__item">
						<label for="panNumber" class="gsn-landing__form__label">Pan Number</label>
						<div class="gsn-landing__form__input">
							<input type="text" class="gsn-landing__form__field gsn-landing__form__field--input" name="panNumber"  id="panNumber" placeholder="Enter your pan number">
						</div>
					</div>
					<!-- Row end -->

		      <!-- Row start -->
		      <div class="gsn-landing__form__item location_cntr">
		        <label for="location" class="gsn-landing__form__label">
							Set Your Store Location
						</label>

		        <button type="button" style="width: 100%;" class="js-gsn-landing-location-btn gsn-custom__btn gsn-custom__btn--blue gsn-custom__btn--small" id="js-gsn-landing-set-lbtn">
							Set your Location
						</button>

						<button type="button" style="display:none; width: 100%;" class="js-gsn-landing-location-btn gsn-custom__btn gsn-custom__btn--green gsn-custom__btn--small"  id="js-gsn-landing-change-lbtn">
							<!-- <span>Your location</span> -->
							<p class="js-gsn-selected-location-text gsn-landing__location__btn__text"></p>
		        </button>

		        <input type="hidden" class="gsn-landing__form__field gsn-landing__form__field--input" name="storeFullAddress" id="storeFullAddress">
		        <input type="hidden" class="gsn-landing__form__field gsn-landing__form__field--input" name="latitute" id="latitute">
		        <input type="hidden" class="gsn-landing__form__field gsn-landing__form__field--input" name="lognitute" id="lognitute">
		      </div>
		      <!-- Row end -->

				</div>
				<div class="ta-r gsn-landing__form__bwrap">
					<button type="submit" class="btn-submit gsn-custom__btn gsn-custom__btn--grey gsn-custom__btn--big">Register</button>
				</div>
		  </form>
		  <div class="gsn-landing__form__message register-message">
				<span>Already registered? <a href="#login" class="js-gsn-landing-form-link">Login Here</a></span>
		  </div>
			<!-- /.gsn-landing__form__message -->
		</div>
		<!-- Register Form End -->

		<div class="gsn-landing__close__fwrap">
			<a href="#" class="js-close-form-anchor gsn-landing__close__flink close__btn">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 90 90" fill="#000"><path d="M90 3.7L86.5.2 45.1 41.6 3.5 0 0 3.5l41.6 41.6L.2 86.5 3.7 90l41.4-41.4 41.2 41.2 3.5-3.5-41.2-41.2L90 3.7z"></path></svg>
				<span>Close</span>
			</a>
		</div>
		<!-- /.gsn-landing__close__fwrap -->

		<!-- Location Modal -->
		<div id="js-gsn-grid-system-modal" class="gsn-landing__location__modal gsn-landing-lmodal">
			<div class="gsn-landing-lmodal__content">
				<div class="gsn-landing-lmodal__heading clearfix">					
					<h4 class="modal--text fl" id="gridModalLabel">Find your store location</h4>

					<a href="#" class="modal--close" id="js-gsn-landing-close-lmodal">
						<span>
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 90 90" fill="#000"><path d="M90 3.7L86.5.2 45.1 41.6 3.5 0 0 3.5l41.6 41.6L.2 86.5 3.7 90l41.4-41.4 41.2 41.2 3.5-3.5-41.2-41.2L90 3.7z"></path></svg>
						</span>
					</a>
				</div>
				<div class="gsn-landing-lmodal__body">
					<div class="clear">
						<div class="gsn-landing__form__input">
							<input id="pac-input" class="controls" type="text" placeholder="Search Box">
							<div id="map" style="width:100%;height:400px; margin-bottom: 10px;"></div>
							Selected Location:<span id="selected_location_label"></span>
						</div>
					</div>
				</div>
				<div class="gsn-landing-lmodal__footer clear">
					<button type="button" class="js-gsn-set-lbtn fr gsn-custom__btn gsn-custom__btn--blue gsn-custom__btn--small" >Set location</button>
				</div>
			</div>
		</div>
		<!-- Location Modal end -->
	</div>
	<!-- /.gsn-landing__form__wrapper -->
  
  <div class="gsn-landing__wipe__block" id="js-wipe-block"></div>
  <!-- /.wipe-block -->
</main>
<!-- /.main -->
<footer class="gsn-landing__footer gsn-footer">
  <div class="gsn-footer__top">
    <div class="container">
      <div class="f-w neg-m gsn-footer__tcontent">
        <div class="gsn-footer__col">
          <div class="gsn-footer__logo">
            <a href="<?php echo site_url(); ?>">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/main-logo.svg" alt="GSN Logo" class="gsn-footer__logo__img">
            </a>
          </div>          
        </div>

        <div class="gsn-footer__col gsn-footer__col--info" style="border:none">
          <div class="gsn-footer__blurb">
            A place where you can have your own <br>
            <b>e-Commerce Site.</b>
          </div>
          <div class="gsn-footer__qinfo">
            <b>SALES AND MARKETING</b>
						<a href="mailto:goshopnepal@gmail.com">goshopnepal@gmail.com</a>
            <!--a href="tel:0123647589">0123647589</a-->
            <span>Mon-Fri 10am - 5pm</span>
          </div>
          <div class="gsn-footer__social">
            <ul class="gsn-footer__social__items">
              <li class="gsn-footer__social__item">
                <a href="#" class="gsn-footer__social__link gsn-footer__social__link--fb">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 11.56 24" class="gsn-footer__social__icon"><path d="M7.52 9.33V5.4a.72.72 0 0 1 0-.08.92.92 0 0 1 .92-.92h3.12V0H7a4.6 4.6 0 0 0-4.28 4.6v4.73H0v4.4h2.72V24h4.8V13.2h3.12l.49-3.87H7.52z"/></svg>
                </a>
              </li>
              <li class="gsn-footer__social__item">
                <a href="#" class="gsn-footer__social__link gsn-footer__social__link--insta">
                  <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="gsn-footer__social__icon"><path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913a5.885 5.885 0 0 0 1.384 2.126A5.868 5.868 0 0 0 4.14 23.37c.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558a5.898 5.898 0 0 0 2.126-1.384 5.86 5.86 0 0 0 1.384-2.126c.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913a5.89 5.89 0 0 0-1.384-2.126A5.847 5.847 0 0 0 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227a3.81 3.81 0 0 1-.899 1.382 3.744 3.744 0 0 1-1.38.896c-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421a3.716 3.716 0 0 1-1.379-.899 3.644 3.644 0 0 1-.9-1.38c-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678a6.162 6.162 0 1 0 0 12.324 6.162 6.162 0 1 0 0-12.324zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405a1.441 1.441 0 0 1-2.88 0 1.44 1.44 0 0 1 2.88 0z"/></svg>
                </a>
              </li>
              <li class="gsn-footer__social__item">
                <a href="#" class="gsn-footer__social__link gsn-footer__social__link--twi">
                  <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="gsn-footer__social__icon"><path d="M23.954 4.569a10 10 0 0 1-2.825.775 4.958 4.958 0 0 0 2.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 0 0-8.384 4.482C7.691 8.094 4.066 6.13 1.64 3.161a4.822 4.822 0 0 0-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 0 1-2.228-.616v.061a4.923 4.923 0 0 0 3.946 4.827 4.996 4.996 0 0 1-2.212.085 4.937 4.937 0 0 0 4.604 3.417 9.868 9.868 0 0 1-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 0 0 7.557 2.209c9.054 0 13.999-7.496 13.999-13.986 0-.209 0-.42-.015-.63a9.936 9.936 0 0 0 2.46-2.548l-.047-.02z"/></svg>
                </a>
              </li>
            </ul>
          </div>
        </div>

        <!--div class="gsn-footer__col gsn-footer__col--links">
          <div class="gsn-footer__links">
            <ul class="gsn-footer__litems">
              <li class="gsn-footer__litem">
                <a href="#" class="gsn-footer__llink">
                  Home
                </a>
              </li>
              <li class="gsn-footer__litem">
                <a href="#" class="gsn-footer__llink">
                  About
                </a>
              </li>
              <li class="gsn-footer__litem">
                <a href="#" class="gsn-footer__llink">
                  Pricing
                </a>
              </li>
              <li class="gsn-footer__litem">
                <a href="#" class="gsn-footer__llink">
                  Documentation
                </a>
              </li>
              <li class="gsn-footer__litem">
                <a href="#" class="gsn-footer__llink">
                  Contact Us
                </a>
              </li>
              <li class="gsn-footer__litem">
                <a href="#" class="gsn-footer__llink">
                  FAQs
                </a>
              </li>
            </ul>
          </div>
        </div-->
      </div>
    </div>
  </div>

  <div class="gsn-footer__bottom">
    <div class="container">
      <div class="gsn-footer__bcontent">
        <ul class="gsn-footer__bitems">
          <li class="gsn-footer__bitem">
            <span>©2018 GoShopNepal. All Rights Super Duper Reserved.</span>
          </li>
          <li class="gsn-footer__bitem">
            <a href="#" class="gsn-footer__blink">
              <span>Terms and Conditions</span>
            </a>
          </li>
          <li class="gsn-footer__bitem">
            <a href="#" class="gsn-footer__blink">
              <span>Privacy Policy</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <div class="fb-messengermessageus gsn-messenger__btn" 
    messenger_app_id="838219992986201" 
    page_id="358436614540954"
    color="blue"
    size="large">
  </div>
</footer>

<?php wp_footer(); ?>

<script>
	window.sr = ScrollReveal();
	
	sr.reveal('.js-scroll-visible-step', {
		container: $('.js-scroll-visible-step-cntr'),
		duration: 500,
		reset: false,
		distance: '50px',
		scale: 0.8
	});
</script>
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
  <script>
    window.fbAsyncInit = function() {
      FB.init({
        appId: "838219992986201",
        xfbml: true,
        version: "v2.6"
      });
    };

    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) { return; }
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
	</script>
	
	
</body>
</html>
