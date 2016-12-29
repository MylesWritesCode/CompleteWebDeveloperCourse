<?php
include ("database.php");

?>

<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,700" rel="stylesheet">
    <title>Sessions</title>
  </head>
  <body>
    <nav class="nav navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <div class="row">
          <a class="navbar-brand" href="#">Secret Diary</a>
        </div> <!-- row -->
      </div> <!-- container-fluid -->
    </nav>
    <div id="background-overlay">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <div class="sign-in-form">
              <form class="form-group text-center" id="signUpForm" method="POST">
                <h1><b>Secret Diary</b></h1>
                <h3><b>Store your thoughts securely.</b></h3>
                <br>
                <h4>Interested? Sign up now.</h4>
                <br>
                <div class="form-group has-feedback" id="emailFormGroup">
                  <input class="form-control input-lg color" type="text" placeholder="Email Address" id="email" name="email">
                  <span class="glyphicon form-control-feedback" aria-hidden="true" id="emailSpan"></span>
                  <span id="helpBlock1" class="help-block">Enter an email address.</span>
                </div>
                <div class="form-group has-feedback" id="passwordFormGroup">
                  <input class="form-control input-lg color" type="password" placeholder="Password" id="password" name="password">
                  <span class="glyphicon form-control-feedback" aria-hidden="true" id="passwordSpan"></span>
                  <span id="helpBlock2" class="help-block">Enter your password.</span>
                </div>
                <div class="checkbox">
                  <label class="checkbox-text">
                    <input type="checkbox" id="stayLoggedIn" value="option1">
                    &nbsp Stay logged in
                  </label>
                </div> <!-- checkbox -->
                <div class="alert text-center notices" id="alerts">
                </div>
                <button class="btn btn-success btn-lg center-block" id="submitBtn">Sign Up</button>
                <br>
                <a href="#">Log In</a>
              </form>
            </div> <!-- well sign-in-form -->
          </div> <!-- col-md-6 col-md-offset-3 -->
        </div> <!-- row -->
      </div> <!-- container -->
    </div> <!-- background-overlay -->
    <script type="text/javascript" src="script.js"></script>
  </body>
</html>
