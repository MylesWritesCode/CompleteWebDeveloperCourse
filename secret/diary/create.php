<?php
include "../database.php";
session_start();
if (array_key_exists("id", $_SESSION)) {
  // Code to bring up the posts you've created.
} else {
  header("Location: login.php");
}

if (!array_key_exists("id", $_SESSION)) {
  header("Location: login.php");
}
// define user_id, date, title, and secret
$userId = mysqli_real_escape_string($link, $_SESSION['id']);
$date = mysqli_real_escape_string($link, date("m.d.y"));
$title = mysqli_real_escape_string($link, empty($_POST['title'])? "" : $_POST['title']);
$secret = mysqli_real_escape_string($link, empty($_POST['secret'])? "" : $_POST['secret']);
$message = "";
echo $userId."<br>";
echo $date."<br>";
echo $title."<br>";
echo $secret."<br>";
// If $title and $secret are empty
if (empty($title) || empty($secret)) {
  // alert please fill out data
} else {
  // $query = insert data into table `secrets`
  $query = "INSERT INTO `secrets` (`user_id`, `date`, `title`, `secret`) VALUES('$userId', '$date', '$title', '$secret')";
  // Insert into `secrets` values
  mysqli_query($link, $query);
  $message = "$('#alerts').removeClass('alert-info alert-error').addClass('alert-success').html('Your secret is safe with us!');";
  // Redirect to view
  header("Location: view.php");
}
?>
<!DOCTYPE HTML>
<html>
  <?php include "../header.php"; ?>
  <body>
    <?php include "../navbar.php"; ?>
    <div class="container-fluid">
      <div class="row">
        <?php include "../sidebar.php"; ?>
        <div class="col-sm-6 col-sm-offset-1 element-ui">
          <form method="POST" class="form-group" id="createForm">
            <h1 class="text-center">Create Your Post!</h1>
            <div class="alert text-center" id="alerts">
              <?php
                echo "<script type='text/javascript'>";
                echo '$(document).ready(function(){ ';
                echo $message;
                echo ' });';
                echo "</script>";
              ?>
            </div>
            <div class="form-group has-feedback" id="titleFormGroup">
              <input type="text" class="form-control color" placeholder="Title" name="title" id="title">
              <span class="glyphicon form-control-feedback" aria-hidden="true" id="titleSpan"></span>
            </div>
            <br>
            <div class="form-group has-feedback" id="secretFormGroup">
              <textarea class="form-control" name="secret" id="secret">Today, I...</textarea>
              <span class="glyphicon form-control-feedback" aria-hidden="true" id="secretSpan"></span>
            </div>
            <br>
            <button class="btn btn-primary btn-block btn-lg">Submit</button>
          </form>
        </div> <!-- col-md-6 col-md-offset-3 -->
      </div> <!-- row -->
    </div> <!-- container-fluid -->
    <script type="text/javascript">
      $(document).ready(function() {
        $('#createMenu').addClass('active').siblings().removeClass('active');
      });
    </script>
    <script type="text/javascript" src="diary.js"></script>
  </body>
</html>
