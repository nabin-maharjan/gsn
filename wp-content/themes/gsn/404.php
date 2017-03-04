<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>404</title>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/style.min.css">
</head>
<body <?php body_class('main-error') ?>>
  <div class="error-content">
    <h1>404 <span>:(</span></h1>
    <p>Oops! too tried to search what you are looking for. <br> Please try something else.</p>
    <div class="go-to-home-link">
      <a href="<?php echo site_url(); ?>">Go to home</a>
    </div>
  </div>
</body>
</html>