<?php global $store;

global $gsnSettingsClass;
$packages=$gsnSettingsClass->store_packages();

$selected_package="normal";
if(!empty($store->storePackage)){
	$selected_package=$store->storePackage;
}
?>
<form name="store_package_setting_form" id="store_package_setting_form">
      <h3>Shop Package Settings</h3>
      <!-- Row start -->
      <div class="form-group clearfix">
        <div class="col-sm-12">
          <div class="package-types-cntr">
          <?php foreach($packages as $package){
			  $package_product=get_option($package['slug'].'_package_product');
			  $package_product_image=get_option($package['slug'].'_package_product_image');
			  $package_sale_product=get_option($package['slug'].'_package_sale_product');
			  $package_gsn_ad=get_option($package['slug'].'_package_gsn_ad');
			  $package_theme_number=get_option($package['slug'].'_package_theme_number');
			  $package_gsn_feature_shop=get_option($package['slug'].'_package_gsn_feature_shop');
			 ?>
			  <div class="package__type package__type-normal">
              <div class="package__detail-cntr">
                <div class="package__top">
                  <h4><?php echo $package['name']; ?> Package</h4>
                </div>
                <div class="package__info">
                  <ul>                
                    <li>
                      <span class="package__info-left">
                        Products
                      </span>
                      <span class="package__info-right">
                      	<?php echo $package_product;?>
                      </span>
                    </li>
                    <li>
                      <span class="package__info-left">
                        Product Image No.
                      </span>
                      <span class="package__info-right">
                        <?php echo $package_product_image; ?>
                      </span>
                    </li>
                    <li>
                      <span class="package__info-left">
                        Product on SALE
                      </span>
                      <span class="package__info-right">
                        <?php echo $package_sale_product; ?>
                      </span>
                    </li>
                    <li>
                      <span class="package__info-left">
                        GSN ADV
                      </span>
                      <span class="package__info-right">
                        <?php echo $package_gsn_ad; ?>
                      </span>
                    </li>
                    <li>
                      <span class="package__info-left">
                        Theme selection
                      </span>
                      <span class="package__info-right">
                        <?php echo $package_theme_number; ?>
                      </span>
                    </li>                 
                    <li>
                      <span class="package__info-left">
                        Feature on GSN
                      </span>
                      <span class="package__info-right">
                        <?php echo $package_gsn_feature_shop; ?>
                      </span>
                    </li>                
                  </ul>
                </div>
                <div class="package__update">
                  <input type="radio" name="package" value="<?php echo $package['slug'];?>" <?php echo ($selected_package==$package['slug'])?'checked':'';?>>  
                </div>              	
              </div>
            </div>
			  
		  <?php }?>          
          </div>
        </div>
        <div class="col-sm-12">
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </div>
      <!-- Row end -->
    </form>
<script>
/* Store Setting jQuery validation Procress */
jQuery("#store_package_setting_form").validate({
  submitHandler: function(form) {
	  var package=jQuery('input[name=package]:checked').val();
	  alert(package); 
	  
	  return false;
	  var data= {action: "gsn_update_store_package", package :package};
	  var response=ajax_call_post(data,"#store_domain_setting_form",'',function(response){
		// window.location.href=response.redirectUrl;
			// jQuery(form)[0].reset();
			 jQuery('<div class="alert alert-success alert-dismissible"><a class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success!</strong> '+response.msg+'</div>').insertBefore(form);
			
			  
	 });
  }
});
</script>