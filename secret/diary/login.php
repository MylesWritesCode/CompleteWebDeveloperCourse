<?php
session_start();
include "../database.php";
// Check if a cookie exists
if ($_COOKIE['id']) {
  // Set session id to whatever the cookie id is (really easy way to start a session)
  $_SESSION['id'] = $_COOKIE['id'];
}
// Check if a session exists
if ($_SESSION['id']) {
  // Some code in to show that the person is logged in (ie. Logged In! text)
}
// take email and password
$email = empty($_POST["email"])? "" : $_POST["email"];
$password = empty($_POST["password"])? "" : $_POST["password"];
$message = "";
//if email and password are entered
if (!empty($email) && !empty($password)) {
  // mysqli_real_escape_string vars
  $email = mysqli_real_escape_string($link, $email);
  $password = mysqli_real_escape_string($link, $password);
  // query db for $email, set to $query
  $query = "SELECT `id` FROM `users` WHERE `email` = '".$email."'";
  // store results of query in $result
  $result = mysqli_query($link, $query);
  // if $result rows > 0
  if (mysqli_num_rows($result) > 0) {
    // warning: that email is already registered
    $message = "<script type='text/javascript'> $('#alerts').removeClass('alert-info').addClass('alert-warning').html('That email address is already in use.'); $('#emailFormGroup').removeClass('has-error').addClass('has-warning'); $('#emailSpan').addClass('glyphicon-warning-sign').removeClass('glyphicon-ok'); </script>";
  } else {
    // add user with password to db
    $query = "INSERT INTO `users` (`email`, `password`) VALUES ('$email', '$password')";
    mysqli_query($link, $query);
    echo $query;
    $message = "<script type='text/javascript'> $('#alerts').removeClass('alert-info alert-warning').addClass('alert-success').html('Submitted!'); </script>";
  }
} else {
  $message = "<script type='text/javascript'> $('#alerts').removeClass('alert-warning alert-error alert-success').addClass('alert-info').html('Fill out the form and click Sign Up!') </script>";
}
?>
<!DOCTYPE html>
<html>
<?php include "../header.html"; ?>
  <body>
    <?php include "../navbar.html"; ?>
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
                  <input class="form-control input-lg color" type="text" placeholder="Email Address" id="email" name="email" value="<?php echo empty($_POST['email']) ? '' : $_POST['email']; ?>">
                  <span class="glyphicon form-control-feedback" aria-hidden="true" id="emailSpan"></span>
                  <span id="helpBlock1" class="help-block">Enter an email address.</span>
                </div>
                <div class="form-group has-feedback" id="passwordFormGroup">
                  <input class="form-control input-lg color" type="password" placeholder="Password" id="password" name="password" value="<?php echo empty($_POST['password'])? '' : $_POST['password']; ?>">
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
                  <?php echo $message; ?>
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
