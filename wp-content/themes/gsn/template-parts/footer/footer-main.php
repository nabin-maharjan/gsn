</main>
<!-- /.main -->
<footer class="gsn-landing__footer gsn-footer">
  <div class="gsn-footer__top" style="background: #a1a1a1;">
    <div class="container">
      <div class="f-w neg-m gsn-footer__tcontent">
        <div class="d-6 gsn-lfooter__tleft">
          <div class="gsn-footer__logo">
            <a href="<?php echo site_url(); ?>">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/main-logo.svg" alt="GSN Logo" class="gsn-footer__logo__img">
            </a>
          </div>

          <div class="gsn-footer__info">
            A place where you can have you own <br>
            <b>e-Commerce Site.</b>
          </div>

          <div class="gsn-footer__social">
            
          </div>
        </div>

        <div class="d-6 gsn-lfooter__tright">
          This is top right
        </div>
      </div>
    </div>
  </div>

  <div class="gsn-footer__bottom">
    <div class="container">
      <div class="f-w neg-m gsn-footer__bcontent">
        <div class="d-6 gsn-lfooter__bleft">
          This is bottom left
        </div>

        <div class="d-6 gsn-footer__bright">
          This is bottom right
        </div>
      </div>
    </div>
  </div>
</footer>

<div class="fb-messengermessageus" 
  messenger_app_id="838219992986201" 
  page_id="358436614540954"
  color="blue"
  size="large">
</div> 
<!-- /.back-to-top -->
<?php wp_footer(); ?>
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
