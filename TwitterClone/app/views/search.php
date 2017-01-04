<div class="container-fluid">
  <div class="row margin-top-20px">
    <div class="col-md-6 col-md-offset-2">
      <h2>Tweet Search</h2>
      <?php displayTweets('searchTweets'); ?>
    </div> <!-- col-md-6 col-md-offset-2 -->
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
