<?php global $store;?>
<section class="profile-setting-cntr">  	
  <div class="container">
  
  <form name="store_domain_setting_form" id="store_domain_setting_form" class="dashboard-forms-main-cntr">
      <h3>Shop Domain Settings</h3>
      <!-- Row start -->
      <div class="form-group clearfix">
        <label for="domainName" class="col-sm-2 col-form-label col-form-label-sm">Domain</label>
        <div class="col-sm-6 domainName_cntr">
        <?php if(empty($store->domainName)){?>
          <input type="text"  class="form-control form-control-sm" value="<?php echo (!empty($store->domainName))?$store->domainName:"";?>" name="domainName" id="domainName">
          <?php }else{?>
          	<label><?php echo $store->domainName;?></label>
          <?php }?>
        </div>
        <div class="col-sm-4">
			<?php if(empty($store->domainName)){?>
                <button type="submit" class="btn btn-primary">Update</button>
             <?php }?>
        </div>
      </div>
      <!-- Row end -->
    </form>
    
    
    
    <?php //get_template_part( 'template-parts/dashboard/content','package-form'); ?>
  
    <form name="profile_setting_form" id="profile_setting_form" class="dashboard-forms-main-cntr">
      <h3>Profile Settings</h3>
      <!-- Row start -->
      <div class="form-group clearfix">
        <label for="firstName" class="col-sm-2 col-form-label col-form-label-sm">First Name</label>
        <div class="col-sm-10">
          <input type="text" class="form-control form-control-sm" value="<?php echo (!empty($store->firstName))?$store->firstName:"";?>" name="firstName" id="firstName">
        </div>
      </div>
      <!-- Row end -->

      <!-- Row start -->
      <div class="form-group clearfix">
        <label for="lastName" class="col-sm-2 col-form-label col-form-label-sm">Last Name</label>
        <div class="col-sm-10">
          <input type="text" class="form-control form-control-sm" value="<?php echo (!empty($store->lastName))?$store->lastName:"";?>" name="lastName" id="lastName">
        </div>
      </div>
      <!-- Row end -->

      <!-- Row start -->
      <div class="form-group clearfix">
        <label for="emailAddress" class="col-sm-2 col-form-label col-form-label-sm">Email Address</label>
        <div class="col-sm-10"><?php echo (!empty($store->emailAddress))?$store->emailAddress:"";?>
        </div>
      </div>
      <!-- Row end -->
      
      <!-- Row start -->
      <div class="form-group clearfix">
        <label for="emailAddress" class="col-sm-2 col-form-label col-form-label-sm">Shop Type</label>
        <div class="col-sm-10">
		<?php
		  $shop_types=$store->shop_types();
		  ?>
		  <select class="form-control" name="shopType" id="shopType">
			  <option value="">Choose shop type</option>
			<?php foreach($shop_types as $type){ ?>
			  <option value="<?php echo $type->term_id;?>" <?php echo ($store->shopType==$type->term_id)?'selected':'';?>><?php echo $type->name;?></option>
			<?php }?>
			</select>
        </div>
      </div>
      <!-- Row end -->
      
     

      <!-- Row start -->
      <div class="form-group clearfix">
        <label for="mobileNumber" class="col-sm-2 col-form-label col-form-label-sm">Mobile Number</label>
        <div class="col-sm-10">
          <input type="text" class="form-control form-control-sm" value="<?php echo (!empty($store->mobileNumber))?$store->mobileNumber:"";?>" name="mobileNumber" id="mobileNumber">
        </div>
      </div>
      <!-- Row end -->

       <!-- Row start -->
      <div class="form-group clearfix">
        <label for="storeName" class="col-sm-2 col-form-label col-form-label-sm">Store Name</label>
        <div class="col-sm-10"><?php echo (!empty($store->storeName))?$store->storeName:""; ?>
        </div>
      </div>
      <!-- Row end -->

      <!-- Row start -->
      <div class="form-group clearfix">
        <label for="panNumber" class="col-sm-2 col-form-label col-form-label-sm">Pan Number</label>
        <div class="col-sm-10">
          <input type="text" class="form-control form-control-sm" value="<?php echo (!empty($store->panNumber))?$store->panNumber:"";?>" name="panNumber" id="panNumber">
        </div>
      </div>
      <!-- Row end -->

      <!-- Row start -->
      <div class="form-group clearfix">
        <label class="col-sm-2 col-form-label col-form-label-sm">Location</label>
        <div class="col-sm-10">
          <div class="form-input profile-map__wrapper">
            <input id="pac-input" class="controls profile-map__input" type="text" placeholder="Search Box">
            <div id="map" style="width:100%;height:500px"></div>
             Selected Location:<span id="selected_location_label" class="profile-map__selected"><?php echo (!empty($store->storeFullAddress))?$store->storeFullAddress:"";?></span>
            <input type="hidden" class="form-control" value="<?php echo (!empty($store->storeFullAddress))?$store->storeFullAddress:"";?>" name="storeFullAddress" id="storeFullAddress">
            <input type="hidden" class="form-control" value="<?php echo (!empty($store->latitute))?$store->latitute:"";?>" name="latitute" id="latitute">
            <input type="hidden" class="form-control" value="<?php echo (!empty($store->lognitute))?$store->lognitute:"";?>" name="lognitute" id="lognitute">                  
          </div>
        </div>
      </div>
      <!-- Row end -->

      <?php if($store->id!=NULL){?>
      	<input type="hidden" name="gsn_store_id"  value="<?php echo $store->id;?>">
        <input type="hidden" name="action" value="edit">
      <?php }?>
      <button type="submit" class="btn btn-primary profile-update-btn">Update</button>
    </form>
  </div>
</section>
  <!-- /.profile-setting-cntr -->
  
 <script>
 
/* Store Setting jQuery validation Procress */
jQuery.validator.addMethod("noSpace", function(value, element) { 
  return value.indexOf(" ") < 0 && value != ""; 
}, "No space please and don't leave it empty");
jQuery.validator.addMethod("alphanumeric", function(value, element) {
    return this.optional(element) || /^[a-z0-9\-]+$/i.test(value);
}, "Letters, numbers, and dashes only please");
jQuery("#store_domain_setting_form").validate({
	rules: {
    domainName:{
    required: true ,
    noSpace: true,
    alphanumeric: true,
		remote:{
         	url :ajaxUrl,
			type: "post",
			data: {action: "gsn_check_domain_name_unique", 
				domainName : function(){
					return jQuery('#domainName').val();
				},
				jquery : 'jquery'
			}
		}
	  },
	},
	messages: { 
    	domainName: { remote: "This domain name was already taken."}
  },
  submitHandler: function(form) {

	  var formdata=jQuery(form).serialize();
	  var data= {action: "gsn_update_store_domain", domainName :jQuery('#domainName').val()};
	  var response=ajax_call_post(data,"#store_domain_setting_form",'',function(response){
		// window.location.href=response.redirectUrl;
			// jQuery(form)[0].reset();
			 jQuery('<div class="alert alert-success alert-dismissible"><a class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success!</strong> '+response.msg+'</div>').insertBefore(form);
			
			  
	 },function(){
		 jQuery('.domainName_cntr').html("<label>"+jQuery('#domainName').val()+"</label>");
		jQuery('#store_domain_setting_form .btn-primary').remove();
		jQuery('html, body').animate({
				scrollTop: jQuery("body").offset().top
			}, 500); 
	 });

  }
});
  /* Profile Setting jQuery validation Procress */
jQuery("#profile_setting_form").validate({
	 rules: {
	  shopType:"required",
	 },
  submitHandler: function(form) {
	  var formdata=jQuery(form).serialize();
	  var data= {action: "gsn_store_profile_setting", formdata : formdata};
	  var response=ajax_call_post(data,"#profile_setting_form h3",'after',function(response){
		// window.location.href=response.redirectUrl;
			 jQuery(form)[0].reset();
			 jQuery('.parent_dropdown_cntr').html(response.dropdown);
			 jQuery('<div class="alert alert-success alert-dismissible"><a class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success!</strong> '+response.msg+'</div>').insertAfter(form);
			  
	 },function(){
		jQuery('html, body').animate({
				scrollTop: jQuery("#profile_setting_form").offset().top
			}, 500); 
	 });
  }
}); 
 </script>