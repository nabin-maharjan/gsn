  <?php
  	global $gsnSettingsClass;
  	$gsn_settings=$gsnSettingsClass->get();
	$package=$gsn_settings->storePackageSettings;
	$gsn_themes=$gsnSettingsClass->available_theme($package['theme']);
  ?>
<section class="store-setting-cntr">
  <div class="container clearfix">
    <form name="store_setting_form" id="store_setting_form">
      <h3>Shop Settings</h3>
      <!-- Row start -->
      <div class="form-group clearfix">
        <label for="upload-button" class="col-sm-2 col-form-label col-form-label-sm">Logo</label>
        <div class="col-sm-10">
          <div class="upload_cntr">
            <?php
              if($gsn_settings->logo!=NULL){
                $post_thumnail_url=wp_get_attachment_url($gsn_settings->logo, 'thumbnail' );
              }
            ?>
            <input id="logo" class="image_id" type="hidden" name="logo" value="<?php echo (!empty($gsn_settings->logo))?$gsn_settings->logo:"";?>" />
            <img class="image_src" width="150" src="<?php echo (!empty($post_thumnail_url))?$post_thumnail_url:"";?>">
            <input type="button" class="btn btn-info upload-image-button" value="Upload Image" />
          </div>
        </div>
      </div>
      <!-- Row end -->
     
      <!-- Row start -->
      <div class="form-group clearfix">
        <label  class="col-sm-2 col-form-label col-form-label-sm">Themes</label>
        <div class="col-sm-10">
          <?php   	  
  	        $selected_theme_id=($gsn_settings->selected_theme!=NULL)?$gsn_settings->selected_theme:"";
  	        foreach($gsn_themes as $gsn_theme){
        		  $theme_image=get_the_post_thumbnail_url($gsn_theme->ID);
        		  $default_theme=get_post_meta($gsn_theme->ID,'default_theme',true);// get default theme  check  		  
        		  /* theme checked proccess */
        		  $theme_checked="";
        		  if(!empty($selected_theme_id) && $selected_theme_id==$gsn_theme->ID){
        			  $theme_checked="checked";
        		  }else if(empty($selected_theme_id) && $default_theme=="yes" ){
        			  $theme_checked="checked";        			  
        		  }
  		    ?>
        	 <label class="checkbox-inline"><input type="radio" name="selected_theme" value="<?php echo $gsn_theme->ID;?>" <?php echo $theme_checked ?>><img src="<?php echo $theme_image; ?>" alt="<?php echo $gsn_theme->post_title;?>" width="150"></label>
          <?php 
            } 
          ?>
        </div>
      </div>
      <!-- Row end -->

      <div class="form-group clearfix">
        <div class="col-sm-12"><h3>About your Store</h3></div>
      </div>
      <!-- Row start -->
      
      <!-- Row start -->
      <div class="form-group clearfix">
        <div class="col-sm-12">
          <?php
  	        echo wp_editor($gsn_settings->aboutStore,'aboutStore');
  	      ?>
        </div>
      </div>
      <!-- Row end -->      
       
      <!-- Row start -->
      <div class="form-group clearfix">
        <div class="col-sm-12"><h3>Social Links</h3></div>
      </div>
      <!-- Row end -->

      <!-- Row start -->
      <div class="form-group clearfix">
        <label for="firstName" class="col-sm-2 col-form-label col-form-label-sm">Facebook Url</label>
        <div class="col-sm-10">
          <input type="text" class="form-control form-control-sm" value="<?php echo (!empty($gsn_settings->facebook))?$gsn_settings->facebook:"";?>" name="facebook" id="facebook">
        </div>
      </div>
      <!-- Row end -->

      <!-- Row start -->
      <div class="form-group clearfix">
        <label for="firstName" class="col-sm-2 col-form-label col-form-label-sm">Twitter Url</label>
        <div class="col-sm-10">
          <input type="text" class="form-control form-control-sm" value="<?php echo (!empty($gsn_settings->twitter))?$gsn_settings->twitter:"";?>" name="twitter" id="twitter">
        </div>
      </div>
      <!-- Row end -->

      <!-- Row start -->
      <div class="form-group clearfix">
        <label for="firstName" class="col-sm-2 col-form-label col-form-label-sm">Google+ Url</label>
        <div class="col-sm-10">
          <input type="text" class="form-control form-control-sm" value="<?php echo (!empty($gsn_settings->googleplus))?$gsn_settings->googleplus:"";?>" name="googleplus" id="googleplus">
        </div>
      </div>
      <!-- Row end -->

      <!-- Row end -->
      <div class="form-group clearfix">
        <div class="col-sm-12"><h3>Payment Information</h3></div>
      </div>
      <!-- Row start -->
    
      <!-- Row start -->
      <div class="form-group clearfix">
        <label for="firstName" class="col-sm-2 col-form-label col-form-label-sm">eSewa ID</label>
        <div class="col-sm-10">
          <input type="text" class="form-control form-control-sm" value="<?php echo (!empty($gsn_settings->esewaId))?$gsn_settings->esewaId:"";?>" name="esewaId" id="esewaId">
        </div>
      </div>
      <!-- Row end -->   
      <?php if($gsn_settings->id!=NULL){?>
      	<input type="hidden" name="gsn_settings_id"  value="<?php echo $gsn_settings->id;?>">
           <input type="hidden" name="action" value="edit">
      <?php }?>
      <button type="submit" class="btn btn-primary store-update-btn">Update</button>
    </form>
  </div>
</section>
<!-- /.store-setting-cntr -->