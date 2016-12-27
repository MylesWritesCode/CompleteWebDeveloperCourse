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
            // Get city name and pull page from weather-forcast.com
            $city = str_replace(' ', '', $cityDisplay);
            // Get data from cityName ($_GET["cityName"])
            $file_headers = @get_headers("http://www.weather-forecast.com/locations/$city/forecasts/latest");
            if ($file_headers[0] == "HTTP/1.1 404 Not Found") {
              $errorMessage = "That city could not be found.";
            } else {
              if ($city) {
                $forecastPage = file_get_contents("http://www.weather-forecast.com/locations/$city/forecasts/latest");
                $pageArray = explode('3 Day Weather Forecast Summary:</b><span class="read-more-small"><span class="read-more-content"> <span class="phrase">', $forecastPage);
                $summaryArray = explode('</span></span></span>', $pageArray[1]);
              }
            }
            // Make sure string is a city name
            // Run through weather scraper api?
            // call id weatherDescriptor and echo html to the div
          ?>
          <div class="alert text-center" name="weatherDescription" id="weatherDescription">
            <!-- Placeholder for code that describes weather conditions -->
            <?php
              // Add or remove class based on if there's data in $summaryArray
              // Also, displays $summaryArray
              if ($cityDisplay) {
                $summaryArray = empty($summaryArray) ? "" : $summaryArray[0];
                if ($summaryArray) {
                  echo '<script type="text/javascript">';
                  echo '$("#weatherDescription").addClass("alert-info");';
                  echo '</script>';
                  echo $summaryArray;
                } elseif ($errorMessage) {
                  echo '<script type="text/javascript">';
                  echo '$("#weatherDescription").removeClass("alert-info");';
                  echo '$("#weatherDescription").addClass("alert-danger");';
                  echo '</script>';
                  echo $errorMessage;
                }
              }
            ?>
          </div>
        </div> <!-- col-md-6 col-md-offset-3 -->
      </div> <!-- row -->
    </div> <!-- container -->
    <script type="text/javascript" src="scripts.js"></script>
  </body>
</html>
