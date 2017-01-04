<?php
  session_start();
  include "database.php";
  if (array_key_exists("function", $_GET)) {
    if ($_GET["function"] == "logout") {
      $_SESSION = array();
      session_destroy();
      header("Location: index.php");
    }
  }
  // Show arbitrary text based on time passed since last tweet.
  function timeSince($since) {
    $chunks = array(
      array(60 * 60 * 24 * 365, 'year'),
      array(60 * 60 * 24 * 30, 'month'),
      array(60 * 60 * 24 * 7, 'week'),
      array(60 * 60 * 24, 'day'),
      array(60 * 60, 'hour'),
      array(60, 'minute'),
      array(1, 'second'),
    );
    for ($i = 0, $j = count($chunks); $i < $j; $i++) {
      $seconds = $chunks[$i][0];
      $name = $chunks[$i][1];
      if (($count = floor($since/$seconds)) != 0) {
        break;
      }
    }
    $print = ($count == 1) ? '1 '.$name : "$count {$name}s";
    return $print;
  }
  // END function timeSince
  // Display Tweets
  function displayTweets($type) {
    global $link;
    // Check if array key exists, then set $sessionUser
    if (array_key_exists("id", $_SESSION)){
      $sessionUser = mysqli_real_escape_string($link, $_SESSION['id']);
    }
    $whereClause = "";
    // START 'public' type
    if ($type == 'public') {
    // END 'public' type
    // START 'isFollowing' type
    } else if ($type == 'isFollowing') {
      $query = "SELECT * FROM `isFollowing` WHERE `follower` = '".$sessionUser."'";
      $result = mysqli_query($link, $query);
      // Only if there are more than 0 rows in query
      if (mysqli_num_rows($result) > 0) {
        // While there are rows, attach a where clause to our query below
        while ($row = mysqli_fetch_assoc($result)) {
          if (empty($whereClause)) {
            $whereClause = "WHERE";
          } else {
            $whereClause .= "OR";
          }
          $whereClause .= "`user_id`='".$row['isFollowing']."' OR `user_id`='".$sessionUser."'";
        }
      } else  if (mysqli_num_rows($result) <= 0 ) {
        $whereClause = "WHERE `user_id` = '".$sessionUser."'";
      }
    // END 'isFollowing' type
    // START 'userTweets' type
    } else if ($type == 'userTweets') {
      if (array_key_exists("id", $_SESSION)) {
        $whereClause = "WHERE `user_id` = '".$sessionUser."'";
      }
      // END 'userTweets' type
      // START 'searchTweets' type
    } else if ($type == 'searchTweets') {
      if (array_key_exists("q", $_GET)) {
        $searchTerm = mysqli_real_escape_string($link, $_GET['q']);
      }
      echo "<p>Showing results for ".$searchTerm." below:";
      $whereClause = "WHERE `tweet` LIKE '%".$searchTerm."%'";
    // END 'searchTweets' type
    // START profileSEARCH type
    } else if (is_numeric($type)) {
      if (array_key_exists('u', $_GET)) {
        $profileUser = mysqli_real_escape_string($link, $_GET['u']);
      }
      $whereClause = "WHERE `user_id` = '".$profileUser."'";
    }
    // END 'searchTweets' type
    // Main query for displaying tweets
    $query = "SELECT * FROM `tweets` ".$whereClause." ORDER BY `datetime` DESC LIMIT 10";
    $result = mysqli_query($link, $query);
    if (mysqli_num_rows($result) == 0) {
      echo "There are no tweets to display.";
    } else {
      while ($row = mysqli_fetch_assoc($result)) {
        $userQuery = "SELECT * FROM `users` WHERE `id` = '".mysqli_real_escape_string($link, $row['user_id'])."'LIMIT 1";
        $userQueryResult = mysqli_query($link, $userQuery);
        $user = mysqli_fetch_assoc($userQueryResult);
        echo "<div class='tweet'>";
        echo "<p>".$user['email']."<span class='time'> - ".timeSince(time() - strtotime($row['datetime']))." ago</span>:</p>";
        echo "<p>".$row['tweet']."</p>";
        echo "<p><a class='toggleFollow' data-userId='".$row['user_id']."'>";
        if (array_key_exists("id", $_SESSION)){
          if ($_SESSION['id'] != $row['user_id']) {
            $isFollowingQuery = "SELECT * FROM `isFollowing` WHERE `follower` = '".mysqli_real_escape_string($link, $_SESSION['id'])."' AND `isFollowing` = '".mysqli_real_escape_string($link, $row['user_id'])."' LIMIT 1";
            $isFollowingQueryResult = mysqli_query($link, $isFollowingQuery);
            if (mysqli_num_rows($isFollowingQueryResult) > 0) {
              echo "Unfollow";
            } else {
              echo "Follow";
            }
          } else {
            // Link under your own tweets.
          }
        }
        echo "</a></p></div>";
      }
    }
  }
  // end function displayTweets

  // Display Search
  function displaySearch() {
    echo "<form class='form-group form-inline'>
            <input type='hidden' name='page' value='search'>
            <input type='text' name='q' placeholder='Search Tweets' class='form-control'>
            <button class='btn btn-primary' type='submit'>SEARCH</button>
          </form>";
  }
  // END function displaySearch

  // Display Post Tweet
  function displayTweetBox() {
    echo "<div id='tweetSuccess' class='alert alert-success'>
            Your tweet was posted successfully.
          </div>
          <div id='tweetFail' class='alert alert-danger'>
          </div>
          <div class='form-group'>
            <textarea class='form-control' rows='6' id='tweetContent'></textarea>
            <br>
            <button class='btn btn-primary btn-block' id='postTweetBtn'>POST TWEET</button>
          </div>";
  }
  // END function displayTweetBox

  // Display Users
  function displayUsers() {
    global $link;
    $displayUsersQuery = "SELECT * FROM `users` LIMIT 10";
    $displayUsersQueryResult = mysqli_query($link, $displayUsersQuery);
    while ($row = mysqli_fetch_assoc($displayUsersQueryResult)) {
      echo "<p><a href='?page=profiles&u=".$row['id']."'>".$row['email']."</p><br>";
    }
  }
?>
