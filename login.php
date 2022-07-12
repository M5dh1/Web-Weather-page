<?php 
  session_start();
  ob_start();
  include('db-connection.php');

  if(isset($_POST["validateButton"])){
    $email = $_POST["textField"];
    $pass = $_POST["conPassField"];
    $emailError = 0; $passError = 0;

    if($email != "" and $pass != ""){
      $query = "SELECT * FROM user WHERE email = '$email' AND pass = '$pass'";
      $result = mysqli_query($con, $query);

      if(mysqli_num_rows($result) == 1){

        $authCode = session_id();
        $_SESSION["email"] = $email;

        $authQuery = "UPDATE user SET access_token = '$authCode' WHERE email = '$email'";
        $authResult = mysqli_query($con, $authQuery);

        if($authResult){
          header("location: main.php");
        }

      } else {
        $error = 1;
      }
    } else if($email == ""){
      $emailError = 1;
    } else if($pass == ""){
      $passError = 1;
    }
  }

  if(isset($_POST['backToMain'])){
    header("Location: main.php");
  }

?>

<!DOCTYPE html>
<html>
  <head>
    <title>login</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <link href="resources/css/axure_rp_page.css" type="text/css" rel="stylesheet"/>
    <link href="data/styles.css" type="text/css" rel="stylesheet"/>
    <link href="files/login/styles.css" type="text/css" rel="stylesheet"/>
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
    <script src="files/login/data.js"></script>
    <script type="text/javascript">
      $axure.utils.getTransparentGifPath = function() { return 'resources/images/transparent.gif'; };
      $axure.utils.getOtherPath = function() { return 'resources/Other.html'; };
      $axure.utils.getReloadPath = function() { return 'resources/reload.html'; };
    </script>

    <link href="regStyle.css" type="text/css" rel="stylesheet"/>
      
      
  </head>
  <body>

    <form method="POST" action="">

      <script>

        function checkForBlank() {

          /*let email = document.getElementById('textField').value;
          let password = document.getElementById('conPassField').value;

          if(email != "" && password != ""){
            alert("Email: " + email + " & Password: " + password);
            window.location.href = "main.php";
          } else {
            alert("please enter your email and password");
            if(email == ""){
              document.getElementById('textField').style.borderColor = "red";
            }
            if(password == ""){
              document.getElementById('conPassField').style.borderColor = "red";
            }
            if(email != ""){
              document.getElementById('textField').style.borderColor = "black";
            }
            if(password != ""){
              document.getElementById('conPassField').style.borderColor = "black";
            }
          }*/

        }

      </script>

      <div id="base" class="">

        <!-- back log (Rectangle) -->
        <div id="u0" class="ax_default box_3" data-label="back log">
          <div id="u0_div" class=""></div>
          <div id="u0_text" class="text " style="display:none; visibility: hidden">
            <p></p>
          </div>
        </div>

        <!-- Email Text Field -->
        <input type="text" id="textField" class="textField" name="textField" placeholder="email@email.com">

        <!-- Password Text Field -->
        <input type="password" id="conPassField" class="conPassField" name="conPassField" placeholder="***************">

        <!-- Register Button -->
        <button class="validateButton" name="validateButton" onclick="checkForBlank()">LoginNow</button>

        <!-- Back to Main -->
        <button class="backToMain" name="backToMain">BackToMain</button>
          
        <!-- head log (Rectangle) -->
        <div id="u4" class="ax_default heading_1" data-label="head log">
          <div id="u4_div" class=""></div>
          <div id="u4_text" class="text ">
            <p><span>Login in</span></p>
          </div>
        </div>

        <!-- lname (Rectangle) -->
        <div id="u5" class="ax_default label" data-label="lname">
          <div id="u5_div" class=""></div>
          <div id="u5_text" class="text ">
            <p><span>Email</span></p>
          </div>
        </div>

        <!-- lname (Rectangle) -->
        <div id="u6" class="ax_default label" data-label="lname">
          <div id="u6_div" class=""></div>
          <div id="u6_text" class="text ">
            <p><span>Password</span></p>
          </div>
        </div>

        <!-- logo log (Image) -->
        <div id="u7" class="ax_default image" data-label="logo log">
          <img id="u7_img" class="img " src="images/login/logo_log_u7.svg"/>
          <div id="u7_text" class="text " style="display:none; visibility: hidden">
            <p></p>
          </div>
        </div>
      </div>

      <script src="resources/scripts/axure/ios.js"></script>

    </form>

    <?php if(isset($error) and $error == 1){ ?>
      <p class="para">Incorrect Username or Password</p>
    <?php } ?>

    <?php if(isset($emailError) and $emailError == 1){ ?>
      <p class="emailPara" id="emailPara">* Please Enter your email</p>
    <?php } else if(isset($passError) and $passError == 1){ ?>
      <p class="conPara" id="conPara">* Please Enter your Password</p>
    <?php } ?>

  </body>
</html>
