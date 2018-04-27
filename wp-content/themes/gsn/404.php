<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Oops!! 404</title>

  <style>
    html {
      -webkit-box-sizing: border-box;
      box-sizing: border-box;
    }

    * {
      -webkit-box-sizing: inherit;
      box-sizing: inherit;
    }

    body {
      margin: 0;
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen-Sans, Ubuntu, Cantarell, 'Helvetica Neue', Helvetica, Arial, sans-serif;
    }

    .gsn-404 {
      display: -webkit-box;
      display: -webkit-flex;
      display: -ms-flexbox;
      display: flex;
      -webkit-box-pack: center;
      -webkit-justify-content: center;
      -ms-flex-pack: center;
      justify-content: center;
      -webkit-box-align: center;
      -webkit-align-items: center;
      -ms-flex-align: center;
      align-items: center;
      -webkit-box-orient: vertical;
      -webkit-box-direction: normal;
      -webkit-flex-direction: column;
      -ms-flex-direction: column;
      flex-direction: column;
      height: 100vh;
    }

    .gsn-404 .error-content {
      text-align: center;
      font-weight: 700;
    }

    .gsn-404 h1 {
      font-size: 36px;
      color: #e1e1e1;
      z-index: -1;
      font-weight: 700;
      margin: 0;
      line-height: 1.2;
    }

    .gsn-404 h1 span {
      display: inline-block;
      position: relative;
      top: -20px;
    }

    .gsn-404 p {
      margin: 0;
      font-size: 18px;
      font-weight: 700;
    }

    .gsn-404 .go-to-home-link {
      margin-top: 30px;
    }

    .gsn-404 .go-to-home-link a {
      padding: 15px 25px;
      background: #e74f4a;
      color: #fff;
      text-transform: uppercase;
      text-decoration: none;
      display: inline-block;
    }
    
    @media (min-width: 801px) {
      .gsn-404 h1 {
        font-size: 200px;
      }

      .gsn-404 p {
        font-size: 26px;
      }

      .gsn-404 .go-to-home-link a:hover {
        background: #68bd74;
      }
    }

  </style>
</head>
<body>
  <main class="gsn-404">
    <h1>404 <span>:(</span></h1>
    <p>Oops! too tried to search what you are looking for. <br> Please try something else.</p>
    <div class="go-to-home-link">
      <a href="<?php echo site_url(); ?>">Go to home</a>
    </div>
  </main>
</body>
</html>