<?php global $store,$gsnSettingsClass;
$gsn_settings=$gsnSettingsClass->get();?>
 <footer class="footer gsn-footer">
  <div class="top-footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-3 footer__items footer-contact">
          <h3>Keep in touch</h3>
          <ul class="contact-info">
            <li><?php echo $store->storeFullAddress;?></li>
            <li><a href="tel:<?php echo $store->mobileNumber;?>"><?php echo $store->mobileNumber;?></a></li>
            <li><a href="mailto:<?php echo $store->emailAddress;?>"><?php echo $store->emailAddress;?></a></li>
          </ul>
        </div>
        <!-- /.footer__contact -->
        <div class="col-sm-6 footer__items footer-map">
          <div class="footer-map-cntr" id="storeMap" ></div>
        </div>
        <!-- /.footer__map -->
        <div class="col-sm-3 footer__items footer-social">
          <h3>Social links</h3>
          <ul>
          <?php if(!empty($gsn_settings->facebook)){?>
                <li><a href="<?php echo $gsn_settings->facebook;?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
            <?php }?>
            <?php if(!empty($gsn_settings->twitter)){?>
                <li><a href="<?php echo $gsn_settings->twitter;?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
            <?php }?>
            <?php if(!empty($gsn_settings->googleplus)){?>
                <li><a href="<?php echo $gsn_settings->googleplus;?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
            <?php }?>
          </ul>
        </div>
        <!-- /.footer__social -->
      </div>
    </div>
  </div>
  <!-- /.top-footer -->
  <!-- <div class="bottom-footer">
    <div class="container">
      <div class="bottom-links">
        <ul class="footer-links clearfix">
          <li><a href="#">Home</a></li>
          <li><a href="#">Category</a></li>
          <li><a href="#">About Us</a></li>
          <li><a href="#">Contact Us</a></li>
        </ul>
      </div>
    </div>
  </div> -->
  <!-- /.bottom-footer -->
</footer>
<!-- /.footer -->
<div class="back-to-top">
  <a href="#">
    <i class="fa fa-angle-up"></i>
  </a>
</div>
<!-- /.back-to-top -->

<div class="theme-nav-overlay"></div>
<!-- /.nav-overlay -->

<?php if(!empty($gsn_settings->fbAppId) && !empty($gsn_settings->fbAppId)){ ?>
<div class="fb-messengermessageus" 
  messenger_app_id="<?php echo $gsn_settings->fbAppId;?>" 
  page_id="<?php echo $gsn_settings->fbPageId;?>"
  color="blue"
  size="large" >
</div> 
<?php } ?>
<!-- /.back-to-top -->
<?php wp_footer(); ?>
<?php if(!empty($gsn_settings->fbAppId) && !empty($gsn_settings->fbAppId)){ ?>
<script>
    window.fbAsyncInit = function() {
      FB.init({
        appId: "<?php echo $gsn_settings->fbAppId;?>",
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
 <?php } ?>
<script>
function storemyMap(){
	var mapCanvas = document.getElementById("storeMap");
   var defaultLocation= new google.maps.LatLng(<?php echo $store->latitute;?>,<?php echo $store->lognitute;?>);
   var zoomlevel=14;
  var mapOptions = {
    center:defaultLocation, 
    zoom: zoomlevel
  };

  var map = new google.maps.Map(mapCanvas, mapOptions);
  //marker
  var marker = new google.maps.Marker({
          position: defaultLocation,
          map: map,
          title: 'Hello World!'
        });
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcldtJlaZ2nGXLR7OnH36zzZs1UEREDTU&libraries=places&callback=storemyMap"></script>
</body>
</html>
