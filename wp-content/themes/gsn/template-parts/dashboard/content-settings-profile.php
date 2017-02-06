<?php global $store;?>
<section class="profile-setting-cntr">  	
  <div class="container">
  
  <form name="store_domain_setting_form" id="store_domain_setting_form">
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
    
    
    
    <form name="store_package_setting_form" id="store_package_setting_form">
      <h3>Shop Package Settings</h3>
      <!-- Row start -->
      <div class="form-group clearfix">
        <div class="col-sm-12">
          <div class="package-types-cntr">
           	<div class="package__type package__type-normal">
              <div class="package__detail-cntr">
                <div class="package__top">
                  <h4>Normal Package</h4>
                </div>
                <div class="package__info">
                  <ul>                
                    <li>
                      <span class="package__info-left">
                        Products
                      </span>
                      <span class="package__info-right">
                        5
                      </span>
                    </li>
                    <li>
                      <span class="package__info-left">
                        Product Image No.
                      </span>
                      <span class="package__info-right">
                        4
                      </span>
                    </li>
                    <li>
                      <span class="package__info-left">
                        Product on SALE
                      </span>
                      <span class="package__info-right">
                        8
                      </span>
                    </li>
                    <li>
                      <span class="package__info-left">
                        GSN ADV
                      </span>
                      <span class="package__info-right">
                        Yes
                      </span>
                    </li>
                    <li>
                      <span class="package__info-left">
                        Theme selection
                      </span>
                      <span class="package__info-right">
                        2
                      </span>
                    </li>                 
                    <li>
                      <span class="package__info-left">
                        Feature on GSN
                      </span>
                      <span class="package__info-right">
                        yes
                      </span>
                    </li>                
                  </ul>
                </div>
                <div class="package__update">
                  <input type="radio" name="package" value="normal" checked>  
                </div>              	
              </div>
            </div>
            <!-- ./package__type normal -->
            <div class="package__type package__type-bronze">
              <div class="package__detail-cntr">
                <div class="package__top">
                  <h4>Bronze Package</h4>
                </div>
                <div class="package__info">
                  <ul>                
                    <li>
                      <span class="package__info-left">
                        Products
                      </span>
                      <span class="package__info-right">
                        5
                      </span>
                    </li>
                    <li>
                      <span class="package__info-left">
                        Product Image No.
                      </span>
                      <span class="package__info-right">
                        4
                      </span>
                    </li>
                    <li>
                      <span class="package__info-left">
                        Product on SALE
                      </span>
                      <span class="package__info-right">
                        8
                      </span>
                    </li>
                    <li>
                      <span class="package__info-left">
                        GSN ADV
                      </span>
                      <span class="package__info-right">
                        Yes
                      </span>
                    </li>
                    <li>
                      <span class="package__info-left">
                        Theme selection
                      </span>
                      <span class="package__info-right">
                        2
                      </span>
                    </li>                 
                    <li>
                      <span class="package__info-left">
                        Feature on GSN
                      </span>
                      <span class="package__info-right">
                        yes
                      </span>
                    </li>                
                  </ul>
                </div>
                <div class="package__update">
                  <input type="radio" name="package" value="normal">  
                </div>                
              </div>
            </div>
            <!-- ./package__type bronze -->
            <div class="package__type package__type-silver">
              <div class="package__detail-cntr">
                <div class="package__top">
                  <h4>Silver Package</h4>
                </div>
                <div class="package__info">
                  <ul>                
                    <li>
                      <span class="package__info-left">
                        Products
                      </span>
                      <span class="package__info-right">
                        5
                      </span>
                    </li>
                    <li>
                      <span class="package__info-left">
                        Product Image No.
                      </span>
                      <span class="package__info-right">
                        4
                      </span>
                    </li>
                    <li>
                      <span class="package__info-left">
                        Product on SALE
                      </span>
                      <span class="package__info-right">
                        8
                      </span>
                    </li>
                    <li>
                      <span class="package__info-left">
                        GSN ADV
                      </span>
                      <span class="package__info-right">
                        Yes
                      </span>
                    </li>
                    <li>
                      <span class="package__info-left">
                        Theme selection
                      </span>
                      <span class="package__info-right">
                        2
                      </span>
                    </li>                 
                    <li>
                      <span class="package__info-left">
                        Feature on GSN
                      </span>
                      <span class="package__info-right">
                        yes
                      </span>
                    </li>                
                  </ul>
                </div>
                <div class="package__update">
                  <input type="radio" name="package" value="normal">  
                </div>                
              </div>
            </div>
            <!-- ./package__type silver -->
            <div class="package__type package__type-gold">
              <div class="package__detail-cntr">
                <div class="package__top">
                  <h4>Gold Package</h4>
                </div>
                <div class="package__info">
                  <ul>                
                    <li>
                      <span class="package__info-left">
                        Products
                      </span>
                      <span class="package__info-right">
                        5
                      </span>
                    </li>
                    <li>
                      <span class="package__info-left">
                        Product Image No.
                      </span>
                      <span class="package__info-right">
                        4
                      </span>
                    </li>
                    <li>
                      <span class="package__info-left">
                        Product on SALE
                      </span>
                      <span class="package__info-right">
                        8
                      </span>
                    </li>
                    <li>
                      <span class="package__info-left">
                        GSN ADV
                      </span>
                      <span class="package__info-right">
                        Yes
                      </span>
                    </li>
                    <li>
                      <span class="package__info-left">
                        Theme selection
                      </span>
                      <span class="package__info-right">
                        2
                      </span>
                    </li>                 
                    <li>
                      <span class="package__info-left">
                        Feature on GSN
                      </span>
                      <span class="package__info-right">
                        yes
                      </span>
                    </li>                
                  </ul>
                </div>
                <div class="package__update">
                  <input type="radio" name="package" value="normal">  
                </div>                
              </div>
            </div>
            <!-- ./package__type gold -->
            <div class="package__type package__type-platinum">
              <div class="package__detail-cntr">
                <div class="package__top">
                  <h4>Platinum Package</h4>
                </div>
                <div class="package__info">
                  <ul>                
                    <li>
                      <span class="package__info-left">
                        Products
                      </span>
                      <span class="package__info-right">
                        5
                      </span>
                    </li>
                    <li>
                      <span class="package__info-left">
                        Product Image No.
                      </span>
                      <span class="package__info-right">
                        4
                      </span>
                    </li>
                    <li>
                      <span class="package__info-left">
                        Product on SALE
                      </span>
                      <span class="package__info-right">
                        8
                      </span>
                    </li>
                    <li>
                      <span class="package__info-left">
                        GSN ADV
                      </span>
                      <span class="package__info-right">
                        Yes
                      </span>
                    </li>
                    <li>
                      <span class="package__info-left">
                        Theme selection
                      </span>
                      <span class="package__info-right">
                        2
                      </span>
                    </li>                 
                    <li>
                      <span class="package__info-left">
                        Feature on GSN
                      </span>
                      <span class="package__info-right">
                        yes
                      </span>
                    </li>                
                  </ul>
                </div>
                <div class="package__update">
                  <input type="radio" name="package" value="normal">  
                </div>                
              </div>
            </div>
            <!-- ./package__type platinum -->
          </div>
        </div>
        <div class="col-sm-12">
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </div>
      <!-- Row end -->
    </form>
  
    <form name="profile_setting_form" id="profile_setting_form">
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
        <div class="col-sm-10">
          <input type="text" readonly class="form-control form-control-sm" value="<?php echo (!empty($store->emailAddress))?$store->emailAddress:"";?>" name="emailAddress" id="emailAddress">
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
        <div class="col-sm-10">
          <input type="text" class="form-control form-control-sm" value="<?php echo (!empty($store->storeName))?$store->storeName:"";?>" name="storeName" id="storeName">
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
          <div class="form-input">
            <input id="pac-input" class="controls" type="text" placeholder="Search Box">
            <div id="map" style="width:100%;height:500px"></div>
             Selected Location :<span id="selected_location_label"><?php echo (!empty($store->storeFullAddress))?$store->storeFullAddress:"";?></span>
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
jQuery("#store_domain_setting_form").validate({
	rules: {
      domainName:{
		required: true ,
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