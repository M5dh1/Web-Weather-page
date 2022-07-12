<?php 
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

<?php

  include('db-connection.php');

  $query = "SELECT * FROM article";
  $result = mysqli_query($con, $query);
  $weather = mysqli_fetch_assoc($result);

  if (isset($_POST["deleteButton"])) {
    $query = "DELETE FROM article";
    $result = mysqli_query($con, $query);
  }

  if (isset($_POST["backButton"])) {
    header('location: main.php');
  }

?>

<!DOCTYPE html>
<head>

  <title>saved-article</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <link href="resources/css/axure_rp_page.css" type="text/css" rel="stylesheet" />
  <link href="data/styles.css" type="text/css" rel="stylesheet" />
  <link href="files/articles/styles.css" type="text/css" rel="stylesheet" />
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
  <script src="files/articles/data.js"></script>
  <script type="text/javascript">
    $axure.utils.getTransparentGifPath = function () { return 'resources/images/transparent.gif'; };
    $axure.utils.getOtherPath = function () { return 'resources/Other.html'; };
    $axure.utils.getReloadPath = function () { return 'resources/reload.html'; };
  </script>

</head>

<style>

  #backButton{
    left: 720px;
    top: 598px;
    background-color: cornflowerblue;
    padding: 5px 35px;
    position: absolute;
    border-radius: 15px;
  }

  body {
    background-color: grey;
  }

  #deleteButton {
    left: 600px;
    top: 598px;
    background-color: cornflowerblue;
    padding: 5px 35px;
    position: absolute;
    border-radius: 15px;
  }

  ol {
    border-width: 0px;
    position: absolute;
    left: 28px;
    top: 133px;
    width: 564px;
    height: 494px;
    display: flex;
    font-size: 24px;
  }

</style>

<body>

  <form method="POST">
    <div id="base">

      <!-- logo (Image) -->
      <div id="u30" class="ax_default image" data-label="logo">
        <img id="u30_img" class="img " src="images/login/logo_log_u7.svg" />
        <div id="u30_text" class="text " style="display:none; visibility: hidden">
          <p></p>
        </div>
      </div>


      <!-- Unnamed (Text Area)-->
      <div id="u31" class="ax_default text_area">
        <div id="u31_div" class=""></div>
        <textarea id="u31_input" class="u31_input" style="font-size: 24px">
            <?php
            echo "\n";
            foreach ($weather as $key => $i) {
              echo "      $key: $i";
              echo "\r";
            }?>
        </textarea>
      </div>

      <button id="deleteButton" name="deleteButton" id="deleteButton">Delete</button>
      <button id="backButton" name="backButton" id="backButton">Back</button>

    </div>

    <ol></ol>

  </form>

</body>