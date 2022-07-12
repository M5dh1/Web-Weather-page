﻿<?php 
  session_start();
  ob_start();

  include('db-connection.php');

    if(isset($_POST['logoutButton'])){
      $email = $_SESSION["email"];
      $deleteQuery = "UPDATE user SET access_token = ' ' WHERE email = '$email'";
      $result = mysqli_query($con, $deleteQuery);

      if($result){
        unset($_SESSION['email']);
        session_destroy();
        header("Location: login.php");
      }
    }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>main</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <link href="resources/css/axure_rp_page.css" type="text/css" rel="stylesheet"/>
    <link href="data/styles.css" type="text/css" rel="stylesheet"/>
    <link href="files/main/styles.css" type="text/css" rel="stylesheet"/>
    <script src="resources/scripts/jquery-3.2.1.min.js"></script>
    <script src="resources/scripts/axure/axQuery.js"></script>
    <script src="resources/scripts/axure/globals.js"></script>
    <script src="resources/scripts/axutils.js"></script>
    <script src="resources/scripts/axure/annotation.js"></script>
    <script src="resources/scripts/axure/axQuery.std.js"></script>
    <script src="resources/scripts/axure/doc.js"></script>
    <script src="resources/scripts/messagecenter.js"></script>
    <script src="resources/scripts/axure/events.js"></script>
    <script src="resources/scripts/axure/recording.js"></script>
    <script src="resources/scripts/axure/action.js"></script>
    <script src="resources/scripts/axure/expr.js"></script>
    <script src="resources/scripts/axure/geometry.js"></script>
    <script src="resources/scripts/axure/flyout.js"></script>
    <script src="resources/scripts/axure/model.js"></script>
    <script src="resources/scripts/axure/repeater.js"></script>
    <script src="resources/scripts/axure/sto.js"></script>
    <script src="resources/scripts/axure/utils.temp.js"></script>
    <script src="resources/scripts/axure/variables.js"></script>
    <script src="resources/scripts/axure/drag.js"></script>
    <script src="resources/scripts/axure/move.js"></script>
    <script src="resources/scripts/axure/visibility.js"></script>
    <script src="resources/scripts/axure/style.js"></script>
    <script src="resources/scripts/axure/adaptive.js"></script>
    <script src="resources/scripts/axure/tree.js"></script>
    <script src="resources/scripts/axure/init.temp.js"></script>
    <script src="resources/scripts/axure/legacy.js"></script>
    <script src="resources/scripts/axure/viewer.js"></script>
    <script src="resources/scripts/axure/math.js"></script>
    <script src="resources/scripts/axure/jquery.nicescroll.min.js"></script>
    <script src="data/document.js"></script>
    <script src="files/main/data.js"></script>
    <script type="text/javascript">
      $axure.utils.getTransparentGifPath = function() { return 'resources/images/transparent.gif'; };
      $axure.utils.getOtherPath = function() { return 'resources/Other.html'; };
      $axure.utils.getReloadPath = function() { return 'resources/reload.html'; };
    </script>

    <link href="ourStyle.css" type="text/css" rel="stylesheet"/>

  </head>
  <body>

      <script>

        function logout() {
          alert("you logged out");
        }

      </script>

      <div id="base" class="">

        <!-- back (Rectangle) -->
        <div id="u18" class="ax_default box_3" data-label="back">
          <div id="u18_div" class=""></div>
          <div id="u18_text" class="text " style="display:none; visibility: hidden">
            <p></p>
          </div>
        </div>

        <!-- logomain (Image) -->
        <div id="u19" class="ax_default image" data-label="logomain">
          <img id="u19_img" class="img " src="images/login/logo_log_u7.svg"/>
          <div id="u19_text" class="text " style="display:none; visibility: hidden">
            <p></p>
          </div>
        </div>

        <!-- menubar (Rectangle) -->
        <div id="u20" class="ax_default box_1" data-label="menubar">
          <div id="u20_div" class=""></div>
          <div id="u20_text" class="text " style="display:none; visibility: hidden">
            <p></p>
          </div>
        </div>

        <!-- Register Button -->
        <button class="regButton" onclick="location.href='register.php'">Register</button>

        <!-- Login Button -->
        <button class="logButton" onclick="location.href='login.php'">Login</button>

        <!-- About Button -->
        <button class="aboutUsButton" onclick="location.href='about_us.php'">About</button>

        <!-- Articles Button -->
        <button class="articleButton" onclick="location.href='articles.php'">Articles</button>
        
        <!-- Saved Articles Button -->
        <button class="savedArticleButton" onclick="location.href='saved-article.php'">SavedArticles</button>

        <form method="POST" action="">

          <!-- Logout Button -->
          <button class="logoutButton" name="logoutButton" onclick="logout();">Logout</button>

        </form>

        <!-- livevideo (Inline Frame) -->
        <div id="u24" class="ax_default" data-label="livevideo">
          <iframe id="u24_input" data-label="livevideo" scrolling="auto" frameborder="1" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
        </div>

      </div>

      <script src="resources/scripts/axure/ios.js"></script>

    

  </body>
</html>