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
  // Display Tweets
  function displayTweets($type) {
    global $link;

    if ($type == 'public') {
      $whereClause = "";
    }

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
        echo "<p><a class='toggleFollow' data-userId='".$row['user_id']."'>Follow</a></p>";
        echo "</div>";
      }
    }
  }

  // Display Search
  function displaySearch() {
    echo "<div class='form-group form-inline'>
            <input type='text' placeholder='Search Tweets' class='form-control'>
            <button class='btn btn-primary'>SEARCH</button>
          </div>";
  }

  // Display Post Tweet
  function displayTweetBox() {
    echo "<form method='POST'>
            <textarea class='form-control' rows='6'></textarea>
            <br>
            <button class='btn btn-primary btn-block'>POST TWEET</button>
          </form>";
  }
?>
