  <?php
  	global $gsnSettingsClass;
  	$gsn_settings=$gsnSettingsClass->get();
	$package=$gsn_settings->storePackageSettings;
	$gsn_themes=$gsnSettingsClass->available_theme($package['theme']);
  ?>
<section class="store-setting-cntr">
  <div class="container clearfix">
    <form name="store_setting_form" id="store_setting_form">
      <div class="form-group clearfix">
      	<div class="col-sm-6">
             <h3>Shop Settings</h3>
              <!-- Row start -->
              <div class="form-group clearfix">
                <label for="upload-button" class="col-sm-4 col-form-label col-form-label-sm">Logo</label>
                <div class="col-sm-8">
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
                <label  class="col-sm-4 col-form-label col-form-label-sm">Themes</label>
                <div class="col-sm-8">
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
          </div>
          <div class="col-sm-6">
              <!-- Row start -->
              <div class="form-group clearfix">
                <div class="col-sm-12"><h3>Facebook Messager Settings</h3></div>
                
                <div class="col-sm-12">Note : Create page on facebook and facebook App with category <strong>Apps for Messanger</strong> </div>
              </div>
               <!-- Row end -->
            
              <!-- Row start -->
              <div class="form-group clearfix">
                <label for="fbAppId" class="col-sm-4 col-form-label col-form-label-sm">Messenger App ID</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control form-control-sm" value="<?php echo (!empty($gsn_settings->fbAppId))?$gsn_settings->fbAppId:"";?>" name="fbAppId" id="fbAppId">
                </div>
              </div>
               <!-- Row end -->
               <!-- Row start -->
              <div class="form-group clearfix">
                <label for="fbPageId" class="col-sm-4 col-form-label col-form-label-sm">Page ID</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control form-control-sm" value="<?php echo (!empty($gsn_settings->fbPageId))?$gsn_settings->fbPageId:"";?>" name="fbPageId" id="fbPageId">
                </div>
              </div>
               <!-- Row end -->
          
          </div>
      
      </div>

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
        <div class="form-group clearfix">
           <div class="col-sm-6">
                 <h3>Payment Information</h3>
                 
			   <h6>Shipping information</h6>
                <!-- Row start -->
                  <div class="form-group clearfix">
                    <label for="flat_rate" class="col-sm-4 col-form-label col-form-label-sm">Shipping Charge (Rs)</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control form-control-sm" value="<?php echo (!empty($gsn_settings->flat_rate))?$gsn_settings->flat_rate:"";?>" name="flat_rate" id="flat_rate">
                    </div>
                  </div>
               <!-- Row start -->
                  <div class="form-group clearfix">
                    <label for="flat_rate" class="col-sm-4 col-form-label col-form-label-sm">Shipping Note</label>
                    <div class="col-sm-8">
						<textarea class="form-control form-control-sm" name="flat_rate_note" id="esewaId"><?php echo (!empty($gsn_settings->flat_rate_note))?$gsn_settings->flat_rate_note:"";?></textarea>
                    </div>
                  </div>
                
                
                
                 
                  <!-- Row start -->
                  <!--div class="form-group clearfix">
                    <label for="firstName" class="col-sm-4 col-form-label col-form-label-sm">eSewa ID</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control form-control-sm" value="<?php echo (!empty($gsn_settings->esewaId))?$gsn_settings->esewaId:"";?>" name="esewaId" id="esewaId">
                    </div>
                  </div-->
              </div>
           
           
           
           
            <div class="col-sm-6">
             <h3>Social Links</h3>
        
              <!-- Row start -->
              <div class="form-group clearfix">
                <label for="firstName" class="col-sm-4 col-form-label col-form-label-sm">Facebook Url</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control form-control-sm" value="<?php echo (!empty($gsn_settings->facebook))?$gsn_settings->facebook:"";?>" name="facebook" id="facebook">
                </div>
              </div>
              <!-- Row end -->
        
              <!-- Row start -->
              <div class="form-group clearfix">
                <label for="firstName" class="col-sm-4 col-form-label col-form-label-sm">Twitter Url</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control form-control-sm" value="<?php echo (!empty($gsn_settings->twitter))?$gsn_settings->twitter:"";?>" name="twitter" id="twitter">
                </div>
              </div>
              <!-- Row end -->
        
              <!-- Row start -->
              <div class="form-group clearfix">
                <label for="firstName" class="col-sm-4 col-form-label col-form-label-sm">Google+ Url</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control form-control-sm" value="<?php echo (!empty($gsn_settings->googleplus))?$gsn_settings->googleplus:"";?>" name="googleplus" id="googleplus">
                </div>
              </div>
              <!-- Row end -->
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
 <script> 
  /* Store Setting jQuery validation Procress */
jQuery("#store_setting_form").validate({
	rules: {
      facebook:{
		url: true  
	  },
	  googleplus:{
		url: true  
	  },
	  twitter: {
		url: true  
	  },
    },
  submitHandler: function(form) {
	  var formdata=jQuery(form).serialize();
	 // console.log(formdata);

	  var about_content =tinyMCE.activeEditor.getContent();
//	  console.log(escaped);
	  var data= {action: "gsn_add_store_setting", formdata : formdata, aboutStore:about_content};
	  var response=ajax_call_post(data,"#store_setting_form",'',function(response){
		  window.location.reload();
			/* jQuery(form)[0].reset();
			 jQuery('.parent_dropdown_cntr').html(response.dropdown);
			 jQuery('.alert-success').remove();
			 
			 jQuery('<div class="alert alert-success alert-dismissible"><a class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success!</strong> '+response.msg+'</div>').insertBefore(form);
			 */
			 
	 },function(){
		 jQuery('html, body').animate({
				scrollTop: jQuery("body").offset().top
			}, 500);
		 
	 });
	 
  }
});
 </script>