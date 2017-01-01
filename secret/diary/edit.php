<?php
include "../database.php";
session_start();
$message = "";
$postId = $_GET['pid'];
$userId = $_SESSION['id'];
$editTitle = mysqli_real_escape_string($link, $_POST['title']);
echo $editTitle;
$editSecret = mysqli_real_escape_string($link, $_POST['secret']);
echo $editSecret;
$query = "SELECT `user_id` FROM `secrets` WHERE `id` = '".$postId."'";
if ($result = mysqli_query($link, $query)) {
  $row = mysqli_fetch_row($result);
  $testUserId = $row[0];
  if ($testUserId == $userId) {
    // Code to allow you to edit.
    $query = "SELECT `title`, `secret` FROM `secrets` WHERE `id` ='".$postId."'";
    if ($result = mysqli_query($link, $query)) {
      $row = mysqli_fetch_row($result);
      $title = $row[0];
      $secret = $row[1];
      // Add code to check if button was pushed, and update values after.
    }
  } else {
    mysqli_close();
    header("Location: view.php");
  }
}

if (array_key_exists("id", $_SESSION)) {
  // Code to bring up the posts you've created.
} else {
  header("Location: login.php");
}
// If $title and $secret aren't empty
if (!empty($title) || !empty($secret)) {
    $message = " $('#alerts').addClass('alert-info').html('After you make changes, just press the submit edit button!'); ";
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
            <h1 class="text-center">Edit Your Post!</h1>
            <div class="alert text-center" id="alerts">
              <?php
                echo " <script type='text/javascript'> ";
                echo ' $(document).ready(function(){ ';
                echo $message;
                echo ' }); ';
                echo " </script> ";
              ?>
            </div>
            <div class="form-group has-feedback" id="titleFormGroup">
              <input type="text" class="form-control color" placeholder="Title" name="title" id="title" value="<?php echo empty($title)? '' : $title; ?>">
              <span class="glyphicon form-control-feedback" aria-hidden="true" id="titleSpan"></span>
            </div>
            <br>
            <div class="form-group has-feedback" id="secretFormGroup">
              <textarea class="form-control" name="secret" id="secret"><?php echo empty($secret)? '' : $secret;?></textarea>
              <span class="glyphicon form-control-feedback" aria-hidden="true" id="secretSpan"></span>
            </div>
            <br>
            <input type="hidden" value="0" name="edited" id="edited">
            <button class="btn btn-primary btn-block btn-lg" name="btnEdit">Submit Edit</button>
          </form>
        </div> <!-- col-md-6 col-md-offset-3 -->
      </div> <!-- row -->
    </div> <!-- container-fluid -->
    <script type="text/javascript">
      $(document).ready(function() {
        $('#createMenu').addClass('active').html('CREATE : EDIT').siblings().removeClass('active');
      });
    </script>
    <script type="text/javascript" src="diary.js"></script>
  </body>
</html>
