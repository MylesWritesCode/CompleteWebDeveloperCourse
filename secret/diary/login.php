<?php
session_start();
include "../database.php";
// Check if a cookie exists
if (array_key_exists("id", $_COOKIE)) {
  // Set session id to whatever the cookie id is (really easy way to start a session)
  $_SESSION['id'] = $_COOKIE['id'];
}
// Check if a session exists
if (array_key_exists("id", $_SESSION)) {
  header("Location: view.php");
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
  // query to take $password where $email exists
  $query = "SELECT `id` FROM `users` WHERE `email` = '".$email."'";
  // store results of query in $result
  $result = mysqli_query($link, $query);
  // if $result rows > 0
  // Log in action
  if (mysqli_num_rows($result) > 0) {
    $query = "SELECT * FROM `users` WHERE `email` ='".$email."'";
    $result = mysqli_query($link, $query);
    // if the $query returns a result
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_array($result);
      $hashPass = $row['password'];
      // verify password and if the password is verified
      if (password_verify($password, $hashPass)) {
        // display logged in message
        $message = "<script type='text/javascript'> $('#alerts').removeClass('alert-warning alert-error alert-info').addClass('alert-success').html('Logged In!'); </script>";
        // create session

        // redirect to views.php
        header("Location: view.php");
      // if the password doesn't match
      } else {
        // display message that this is the wrong password
        $message = "<script type='text/javascript'> $('#alerts').removeClass('alert-warning alert-info alert-success').addClass('alert-error').html('Wrong Password'); </script>";
      }
    // if $query didn't return any results
    } else {
      // display message that they need to make an account
      $message = "<script type='text/javascript'> $('#alerts').removeClass('alert-warning alert-info alert-success').addClass('alert-error').html('This email address is not registered'); </script>";
    }
  }
} else {
  $message = "<script type='text/javascript'> $('#alerts').removeClass('alert-warning alert-error alert-success').addClass('alert-info').html('Enter your info to log in!'); </script>";
}
?>
<!DOCTYPE html>
<html>
<?php include "../header.php"; ?>
  <body>
    <?php include "../navbar.php"; ?>
    <div id="background-overlay">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <div class="sign-in-form">
              <form class="form-group text-center" id="signUpForm" method="POST">
                <h1><b>Secret Diary</b></h1>
                <h3><b>Store your thoughts securely.</b></h3>
                <br>
                <h4>Do you have an account? Log in here!</h4>
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
                <button class="btn btn-success btn-lg center-block" id="submitBtn">Log In</button>
                <br>
                <a href="index.php">Sign Up</a>
              </form>
            </div> <!-- well sign-in-form -->
          </div> <!-- col-md-6 col-md-offset-3 -->
        </div> <!-- row -->
      </div> <!-- container -->
    </div> <!-- background-overlay -->
    <script type="text/javascript" src="script.js"></script>
  </body>
</html>
