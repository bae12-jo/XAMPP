<?php

    session_start();

?>

<!doctype html>
<html lang="kr">
  <head>
    <meta charset="utf-8">

    <!-- Always force latest IE rendering engine or request Chrome Frame -->
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Use title if it's in the page YAML frontmatter -->
    <title>Welcome to Team21 Page!</title>

    <meta name="description" content="XAMPP is an easy to install Apache distribution containing MariaDB, PHP and Perl." />
    <meta name="keywords" content="xampp, apache, php, perl, mariadb, open source distribution" />

    <link href="/team21/stylesheets/normalize.css" rel="stylesheet" type="text/css" /><link href="/team21/stylesheets/all.css" rel="stylesheet" type="text/css" />
    <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/3.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <script src="/team21/javascripts/modernizr.js" type="text/javascript"></script>
    <link href="/team21/images/favicon.png" rel="icon" type="image/png" />


  </head>

  <body class="index">
    <div id="fb-root"></div>
    <div class="contain-to-grid">
      <nav class="top-bar" data-topbar>
        <ul class="title-area">
          <li class="name">
            <h1><a href="/index.php">Home</a></h1>
          </li>
        </ul>

        <section class="top-bar-section">
          <!-- Right Nav Section -->
          <ul class="right">
              <?php
                if(isset($_SESSION['userId'])) {
              ?>
              <li class=""><a href="/team21/includes/logout.inc.php">Log out</a></li>
              <?php
                }
                else{
              ?>
              <li class=""><a href="/team21/includes/login.php">Log in</a></li>
              <li class=""><a href="/team21/includes/signup.php">Sign up</a></li>
              <?php
                }
              ?>
          </ul>
        </section>
      </nav>
    </div>
    <!-- JS Libraries -->
    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="/team21/javascripts/all.js" type="text/javascript"></script>
 </body>
</html>