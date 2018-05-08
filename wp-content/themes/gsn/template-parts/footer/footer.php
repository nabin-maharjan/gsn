</main>
<!-- /.main -->
<footer></footer>

<div class="fb-messengermessageus" 
  messenger_app_id="838219992986201" 
  page_id="358436614540954"
  color="blue"
  size="large" >
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
