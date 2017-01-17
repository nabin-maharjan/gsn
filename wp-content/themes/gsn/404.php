<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
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
</head>

<body>
<div class="fb-messengermessageus" 
  messenger_app_id="838219992986201" 
  page_id="160434827334615"
  color="blue"
  size="standard" >
</div>  
<?php 

require("messenger.php");
?>

404 page
</body>
</html>