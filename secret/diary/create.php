<!DOCTYPE HTML>
<html>
  <?php include "../header.html"; ?>
  <body>
    <?php include "../navbar.html"; ?>
    <div class="container-fluid">
      <div class="row">
        <?php include "../sidebar.html"; ?>
        <div class="col-sm-6 col-sm-offset-1 element-ui">
          <form method="POST" class="form-group">
            <h1 class="text-center">Create Your Post!</h1>
            <br>
            <input type="text" class="form-control" placeholder="title">
            <br>
            <textarea class="form-control">Today, I...</textarea>
            <br>
            <button class="btn btn-primary btn-block btn-lg">Submit</button>
          </form>
        </div> <!-- col-md-6 col-md-offset-3 -->
      </div> <!-- row -->
    </div> <!-- container-fluid -->
    <script type="text/javascript" src="diary.js"></script>
  </body>
</html>
