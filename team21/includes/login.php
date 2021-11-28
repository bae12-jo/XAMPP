<?php
    require "../../team21/header.php"
?>

<!doctype html>
<html lang="kr">
  <head>
    <meta charset="utf-8">

    <!-- Always force latest IE rendering engine or request Chrome Frame -->
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Use title if it's in the page YAML frontmatter -->

    <link href="/team21/stylesheets/normalize.css" rel="stylesheet" type="text/css" /><link href="/team21/stylesheets/all.css" rel="stylesheet" type="text/css" />
    <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/3.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <script src="/team21/javascripts/modernizr.js" type="text/javascript"></script>
    <link href="/team21/images/favicon.png" rel="icon" type="image/png" />


  </head>

  <body class="index">

    <div id="wrapper">
        <div class="row">
        <form action="../../team21/includes/login.inc.php" method="post">
            <input type="text" name="mailuid" placeholder="Username/E-mail">
            <input type="password" name="pwd" placeholder="Password">
            <button type="submit" name="login-submit">Login</button>
          </form>
          <a href="signup.php">Don't you have an account?</a>
        </div>
    </div>
    <!-- JS Libraries -->
    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="/team21/javascripts/all.js" type="text/javascript"></script>
 </body>
</html>


<?php
	require "../../team21/footer.php"
?>