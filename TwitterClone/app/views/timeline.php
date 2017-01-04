<div class="container-fluid">
  <div class="row margin-top-20px">
    <div class="col-md-8">
      <h2>Your Timeline</h2>
      <?php displayTweets('isFollowing'); ?>
    </div> <!-- col-md-8 -->
    <div class="col-md-4">
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
