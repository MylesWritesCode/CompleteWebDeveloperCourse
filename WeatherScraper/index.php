<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Weather Scraper</title>
    <?php
      $cityDisplay = empty($_GET["cityName"]) ? "" : $_GET["cityName"];
      $errorMessage = "";
      $message = "";
    ?>
  </head>
  <body>
    <nav class="nav navbar-default navbar-fixed">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Weather Scraper</a>
        </div> <!-- navbar-header -->
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#">Contact Us</a></li>
          <li><a href="#">About</a></li>
        </ul>
      </div> <!-- container-fluid -->
    </nav>
    <br><br><br><br><br><br><br><br><br><br>
    <div id="background">
    </div> <!-- background -->
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <form method="GET" class="form-group">
            <h1 class="text-center"><strong>The Weather App</strong></h1>
            <h4 class="text-center">Enter the name of a city below</h4>
            <br>
            <input class="form-control" type="text" name="cityName" placeholder="Eg. Honolulu, HI" value="<?php echo $cityDisplay ?>">
            <br>
            <button class="btn btn-primary btn-lg center-block">Submit</button>
          </form>
          <?php
              if ($_GET['cityName']) {
                $cityCall = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=".urlencode($cityDisplay)."&appid=4191b2734e9e19f38fbc139cbbb58f38");
                $forecastArray = json_decode($cityCall, true);
                $message = "Description: ".$forecastArray['weather'][0]['description'];
                $tempInCelcius = "Temp: ".$forecastArray['main']['temp'];
              }
          ?>
          <div class="alert text-center" name="weatherDescription" id="weatherDescription">
            <!-- Placeholder for code that describes weather conditions -->
            <?php
              // Add or remove class based on if there's data in $summaryArray
              // Also, displays $summaryArray
              if ($forecastArray['cod'] == 200) {
                if ($forecastArray) {
                  echo '<script type="text/javascript">';
                  echo '$("#weatherDescription").addClass("alert-info");';
                  echo '</script>';
                  echo $message."<br>";
                  echo $tempInCelcius."<br>";
                }
              } else {
                echo '<script type="text/javascript">';
                echo '$("#weatherDescription").removeClass("alert-info");';
                echo '$("#weatherDescription").addClass("alert-danger");';
                echo '</script>';
                echo "Could not find that city. Please try again.";
              }
            ?>
          </div>
        </div> <!-- col-md-6 col-md-offset-3 -->
      </div> <!-- row -->
    </div> <!-- container -->
    <script type="text/javascript" src="scripts.js"></script>
  </body>
</html>
