<div class="container-fluid">
  <div class="row margin-top-20px">
    <div class="col-md-8">
      <h2>Recent Tweets</h2>
      <?php displayTweets('public'); ?>
    </div> <!-- col-md-8 -->
    <div class="col-md-4">
      <?php displaySearch(); ?>
      <hr>
      <?php displayTweetBox(); ?>
    </div> <!-- col-md-4 -->
  </div> <!-- row -->
</div> <!-- container-fluid -->
