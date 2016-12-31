<?php
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
          <table class="table table-striped table-hover">
            <tr>
              <th>#</th>
              <th>Title</th>
              <th>Date</th>
            </tr>
            <tbody>
              <tr>
                <td>1</td>
                <td>First Post</td>
                <td>12-1-2016</td>
              </tr>
            </tbody>
          </table>
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
