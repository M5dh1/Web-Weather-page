﻿<?php 
  session_start();
  ob_start();
  include("db-connection.php");

  if(isset($_SESSION['email'])){
    $email = $_SESSION['email'];

    $verify = "SELECT access_token FROM user WHERE email = '$email'";
    $resu = mysqli_query($con, $verify);

    if(mysqli_num_rows($resu) == 1){
      $r = mysqli_fetch_assoc($resu);
      $authCode = $r['access_token'];

      if($authCode != $_COOKIE['PHPSESSID']){
        header("Location: main.php");
      }
    } else {
      header("Location: main.php");
    }
  } else {
    header("Location: main.php");
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>About us</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <link href="resources/css/axure_rp_page.css" type="text/css" rel="stylesheet"/>
    <link href="data/styles.css" type="text/css" rel="stylesheet"/>
    <link href="files/about_us/styles.css" type="text/css" rel="stylesheet"/>
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
    <script src="files/about_us/data.js"></script>
    <script type="text/javascript">
      $axure.utils.getTransparentGifPath = function() { return 'resources/images/transparent.gif'; };
      $axure.utils.getOtherPath = function() { return 'resources/Other.html'; };
      $axure.utils.getReloadPath = function() { return 'resources/reload.html'; };
    </script>
  </head>
  <body>
    <div id="base" class="">

      <!-- back about (Rectangle) -->
      <div id="u26" class="ax_default box_3" data-label="back about">
        <div id="u26_div" class=""></div>
        <div id="u26_text" class="text " style="display:none; visibility: hidden">
          <p></p>
        </div>
      </div>

      <!-- logo about (Image) -->
      <div id="u27" class="ax_default image" data-label="logo about">
        <img id="u27_img" class="img " src="images/login/logo_log_u7.svg"/>
        <div id="u27_text" class="text " style="display:none; visibility: hidden">
          <p></p>
        </div>
      </div>

      <!-- pic about (Image) -->
      <div id="u28" class="ax_default image" data-label="pic about">
        <img id="u28_img" class="img " src="images/about_us/pic_about_u28.png"/>
        <div id="u28_text" class="text " style="display:none; visibility: hidden">
          <p></p>
        </div>
      </div>
    </div>
    <script src="resources/scripts/axure/ios.js"></script>
  </body>
</html>
