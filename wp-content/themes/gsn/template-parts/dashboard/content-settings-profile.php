<?php global $store;?>
<section class="profile-setting-cntr">  	
  <div class="container">
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