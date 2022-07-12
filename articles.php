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
  if (isset($_POST["backButton"])) {
    header('location: main.php');
  }
?>

<!DOCTYPE html>
<html>

<head>
  <title>articles</title>
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
  body {
    background-color: grey;
  }

  #backButton{
    left: 720px;
    top: 598px;
    background-color: cornflowerblue;
    padding: 5px 35px;
    position: absolute;
    border-radius: 15px;
  }

  #saveButton {
    left: 600px;
    top: 598px;
    background-color: cornflowerblue;
    padding: 5px 35px;
    position: absolute;
    border-radius: 15px;
  }

  select {
    left: 600px;
    top: 133px;
    padding: 5px 50px;
    position: absolute;
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


<body onload="deleteAllCookies()">

<!-- action="saved-article.php" -->
<form method="POST"> 
  <div id="base" class="">

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
      <textarea id="u31_input" class="u31_input"></textarea>

    </div>
    <select id="citys_list" name="dropDownList" onchange=" select();">
      <option value="temp value">select sity name</option>
      <option value="Riyadh">Riyadh</option>
      <option value="Mecca">Makkah</option>
      <option value="al ahsa">al ahsa</option>
      <option value="Dammam">Dammam</option>
      <option value="Madina">Madina</option>
      <option value="Jeddah">Jeddah</option>
    </select>

    
    <button id="saveButton" name="saveButton" id="saveButton">Save</button>
    <button id="backButton" name="backButton" id="backButton">Back</button>

  </div>


  <script src="resources/scripts/axure/ios.js"></script>
  <ol></ol>

  <script>
    
    function deleteAllCookies(){
      var cookies = document.cookie.split(";");
             for (var i = 0; i < cookies.length; i++) {
                 var cookie = cookies[i];
                 var eqPos = cookie.indexOf("=");
                 var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
                 document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
             }
    }

    function select() {

      var api = 'https://api.openweathermap.org/data/2.5/weather?q=';

      var city = document.getElementById("citys_list").value;

      var key = '&units=metric&appid=5fe8c1b8ffd3c7cb7cfaef8a96c5944b';
      var url = api + city + key;

      var ol = document.querySelector("ol");



      var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function () {

        if (xhr.readyState == 4 && xhr.status == 200) {
          var Current_weather = JSON.parse(xhr.responseText);

          ol.innerHTML += " city name: " + Current_weather.name + "<br>";
          document.cookie="cityName=" + Current_weather.name;

          ol.innerHTML += "ID: " + Current_weather.id + "<br>";
          document.cookie="currentWeatherId=" + Current_weather.id;

          ol.innerHTML += "timezone: " + Current_weather.timezone + "<br>";
          document.cookie="currentWeatherTimezone=" + Current_weather.timezone;

          ol.innerHTML += "weather" + "<br>" + "main weather: " + Current_weather.weather.main + "<br>";
          document.cookie="currentWeather=" + Current_weather.weather.main;

          ol.innerHTML += "description: " + Current_weather.weather.description + "<br>";
          document.cookie="currentWeatherDescription=" + Current_weather.weather.description;

          ol.innerHTML += "temperature: " + Current_weather.main.temp + "<br>";
          document.cookie="currentWeatherTemp=" + Current_weather.main.temp;

          ol.innerHTML += "min temperature: " + Current_weather.main.temp_min + "<br>";
          document.cookie="currentWeatherTemprature=" + Current_weather.main.temp_min;

          ol.innerHTML += "max temperature: " + Current_weather.main.temp_max + "<br>";
          document.cookie="currentWeatherMaxTemprature=" + Current_weather.main.temp_max;

          ol.innerHTML += "pressure: " + Current_weather.main.pressure + "<br>";
          document.cookie="currentWeatherMainPressure=" + Current_weather.main.pressure;

          ol.innerHTML += "humidity: " + Current_weather.main.humidity + "<br>";
          document.cookie="currentWeatherHumidity=" + Current_weather.main.humidity;

          ol.innerHTML += "visibility: " + Current_weather.visibility + "<br>";
          document.cookie="currentWeatherVisibility=" + Current_weather.visibility;

          ol.innerHTML += "wind" + "<br>" + "speed: " + Current_weather.wind.speed + "<br>";
          document.cookie="currentWeatherWindSpeed=" + Current_weather.wind.speed;

          ol.innerHTML += "Degree: " + Current_weather.wind.deg + "<br>";
          document.cookie="currentWeatherWindDegree=" + Current_weather.wind.deg;

          ol.innerHTML += "clouds: " + Current_weather.clouds.all + "<br>";
          document.cookie="currentWeatherClouds=" + Current_weather.clouds.all;

          //temp = ol.innerHTML

        }
      }
      xhr.open("GET", url, true);
      xhr.send();
      ol.innerHTML = "";
    }
    
  </script>

  <?php 
    if(isset($_POST["saveButton"])){
      $currentValues = array("", "", "", "", "", "", "", "", "", "", "", "", "", "");
      $counter = 0;
      foreach($_COOKIE as $v){
        $currentValues[$counter] = $v;
        $counter++;
      }

      include('db-connection.php');

      $query = "INSERT INTO article values ('$currentValues[0]', $currentValues[1], $currentValues[2], '$currentValues[3]', '$currentValues[4]', $currentValues[5], $currentValues[6], 
                                            $currentValues[7], $currentValues[8], $currentValues[9], $currentValues[10], $currentValues[11], $currentValues[12], $currentValues[13])";
      mysqli_query($con, $query);
      
      /*for($i=0; $i<14; $i++){
        echo ($i+1)."st index content: ". $currentValues[$i];
        echo "<br>";
      }*/

    }
  ?>

</form>
</body>

</html>