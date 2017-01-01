<?php
include "../database.php";
session_start();
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
          <br>
          <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading"><h1 class="text-center">Your Secrets</h1></div>
            <div class="list-group">
              <?php
              if (array_key_exists("id", $_SESSION)) {
                // Start bringing up posts the user created
                $userId = $_SESSION['id'];
                // Query db for all posts created by user
                $query = "SELECT `date`, `title`, `id` FROM `secrets` WHERE `user_id` ='".$userId."'";
                if ($result = mysqli_query($link, $query)) {
                  while ($row = mysqli_fetch_row($result)) {
                    $date = $row [0];
                    $title = $row[1];
                    $id = $row[2];
                    echo "<a href='edit.php?pid=".$id."' class='list-group-item'>";
                    echo "<span class='badge'>".$date."</span>".$title;
                    echo "</a>";
                  }
                }
                // Close SQL connection
                mysqli_close($link);
              } else {
                header("Location: login.php");
              }
              ?>
            </div>
          </div>
        </div> <!-- col-md-6 col-md-offset-3 -->
      </div> <!-- row -->
    </div> <!-- container-fluid -->
    <script type="text/javascript">
      $(document).ready(function() {
        $('#viewMenu').addClass('active').siblings().removeClass('active');
      });
    </script>
  </body>
</html>
