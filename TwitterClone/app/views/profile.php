<div class="container-fluid">
  <div class="row margin-top-20px">
    <div class="col-md-6 col-md-offset-2">
      <?php
        if (array_key_exists('u', $_GET)) {
          displayTweets($_GET['u']);
        } else {
      ?>
        <h2>Profiles</h2>
        <?php
          displayUsers();
          }
        ?>

    </div> <!-- col-md-8 -->
    <div class="col-md-2">
      <?php displaySearch(); ?>
      <hr>
      <?php
        if (array_key_exists("id", $_SESSION)) {
          displayTweetBox();
        }
      ?>
    </div> <!-- col-md-4 -->
  </div> <!-- row -->
</div> <!-- container-fluid -->
