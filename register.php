<?php 

  include('db-connection.php');

  if(isset($_POST["validateButton"])){
    $email = $_POST["textField"];
    $pass = $_POST["passField"];
    $conPass = $_POST["conPassField"];
    $emailError = 0; $passError = 0; $conPassError = 0; $passNotMatch = 0;

    if($email != "" and $pass != "" and $conPass != "" and $pass == $conPass){
      $query = "INSERT INTO user (email, pass) VALUES ('$email', '$pass')";
      mysqli_query($con, $query);

    
      header("location: login.php");
    } else if($email == ""){
      $emailError = 1;
    } else if($pass == ""){
      $passError = 1;
    } else if($conPass == ""){
      $conPassError = 1;
    } else if($pass != $conPass){
      $passNotMatch = 1;
    }
  }

  if(isset($_POST['backToMain'])){
    header("Location: main.php");
  }
  
?>

<!DOCTYPE html>
<html>
  <head>
    <title>register</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <link href="resources/css/axure_rp_page.css" type="text/css" rel="stylesheet"/>
    <link href="data/styles.css" type="text/css" rel="stylesheet"/>
    <link href="files/register/styles.css" type="text/css" rel="stylesheet"/>
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
    <script src="files/register/data.js"></script>
    <script type="text/javascript">
      $axure.utils.getTransparentGifPath = function() { return 'resources/images/transparent.gif'; };
      $axure.utils.getOtherPath = function() { return 'resources/Other.html'; };
      $axure.utils.getReloadPath = function() { return 'resources/reload.html'; };
    </script>

    <link href="regStyle.css" type="text/css" rel="stylesheet"/>

  </head>
  <body>

  <!-- onSubmit="return false" -->
    <form method="POST" action="">

      <script>
        function checkForBlank() {
          
          /*let email = document.getElementById('textField').value;
          let password = document.getElementById('passField').value;
          let conPassword = document.getElementById('conPassField').value;

          if(email != "" && password != "" && conPassword != "" && password == conPassword){
            //alert("Email: " + email + " & Password: " + password);
            document.getElementById('registerButton').style.visibility = "visible";
            //window.location.href = "login.php";
          } else {
            alert("please enter your email and password");
            if(email == ""){
              document.getElementById('textField').style.borderColor = "red";
            }
            if(password == ""){
              document.getElementById('passField').style.borderColor = "red";
            }
            if(conPassword == ""){
              document.getElementById('conPassField').style.borderColor = "red";
            }
            if(email != ""){
              document.getElementById('textField').style.borderColor = "black";
            }
            if(password != ""){
              document.getElementById('passField').style.borderColor = "black";
            }
            if(conPassword != ""){
              document.getElementById('conPassField').style.borderColor = "black";
            }
          }*/

        }
      </script>

      <div id="base" class="">

        <!-- back regpage (Rectangle) -->
        <div id="u8" class="ax_default box_3" data-label="back regpage">
          <div id="u8_div" class=""></div>
          <div id="u8_text" class="text " style="display:none; visibility: hidden">
            <p></p>
          </div>
        </div>

        <!-- Email Text Field -->
        <input type="text" id="textField" class="textField" name="textField" placeholder="email@email.com">

        <!-- Password Text Field -->
        <input type="password" id="passField" class="passField" name="passField" placeholder="***************">

        <!-- Password Confirm Text Field -->
        <input type="password" id="conPassField" class="conPassField" name="conPassField" placeholder="***************">

        <!-- Validate Button -->
        <button class="validateButton" id="validateButton" name="validateButton" onclick="checkForBlank()">Register</button>

        <!-- Back to Main -->
        <button class="backToMain" name="backToMain">BackToMain</button>

        <!-- head reg (Rectangle) -->
        <div id="u12" class="ax_default heading_1" data-label="head reg">
          <div id="u12_div" class=""></div>
          <div id="u12_text" class="text ">
            <p><span>Register</span></p>
          </div>
        </div>

        <!-- Lname (Rectangle) -->
        <div id="u13" class="ax_default label" data-label="Lname">
          <div id="u13_div" class=""></div>
          <div id="u13_text" class="text ">
            <p><span>Email</span></p>
          </div>
        </div>

        <!-- Lpassword (Rectangle) -->
        <div id="u14" class="ax_default label" data-label="Lpassword">
          <div id="u14_div" class=""></div>
          <div id="u14_text" class="text ">
            <p><span>ConPass</span></p>
          </div>
        </div>

        <!-- Lemail (Rectangle) -->
        <div id="u16" class="ax_default label" data-label="Lemail">
          <div id="u16_div" class=""></div>
          <div id="u16_text" class="text ">
            <p><span>Pass</span></p>
          </div>
        </div>

        <!-- logo reg (Image) -->
        <div id="u17" class="ax_default image" data-label="logo reg">
          <img id="u17_img" class="img " src="images/login/logo_log_u7.svg"/>
          <div id="u17_text" class="text " style="display:none; visibility: hidden">
            <p></p>
          </div>
        </div>
      </div>

      <script src="resources/scripts/axure/ios.js"></script>

    </form>

    <?php if(isset($emailError) and $emailError == 1){ ?>
      <p class="emailPara" id="emailPara">* Please Enter your email</p>
    <?php } else if(isset($passError) and $passError == 1){ ?>
      <p class="passPara" id="passPara">* Please Enter your Password</p>
    <?php } else if(isset($conPassError) and $conPassError == 1){ ?>
      <p class="conPara" id="conPara">* Please Enter your Confirm password</p>
    <?php } else if(isset($passNotMatch) and $passNotMatch == 1){ ?>
      <p class="notMatchPara" id="notMatchPara">Your passwords doesn't match</p>
    <?php } ?>

  </body>
</html>
