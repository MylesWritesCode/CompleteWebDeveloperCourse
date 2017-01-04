<?php
  include "functions.php";
  include "database.php";

  if ($_GET['action'] == 'loginSignUp') {
    $error = "";
    $email = mysqli_real_escape_string($link, $_POST['email']);
    $password = password_hash(mysqli_real_escape_string($link, $_POST['password']), PASSWORD_BCRYPT);
    if (empty($email)) {
      $error = "An email address is required.";
    } else if (empty($password)) {
      $error = "A password is required.";
    } else if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
      $error = "Please enter a valid email address.";
    }

    // If signup form is active:
    if ($_POST['loginActive'] == "0") {
      $query = "SELECT * FROM `users` WHERE `email`='".$email."' LIMIT 1";
      $result = mysqli_query($link, $query);
      if (mysqli_num_rows($result) > 0) {
        $error = "That email address is already registered.";
      } else {
        $query = "INSERT INTO `users` (`email`, `password`) VALUES ('$email', '$password')";
        if (mysqli_query($link, $query)) {
          // User is signed up.
          echo 1;
          $_SESSION['id'] = mysqli_insert_id($link);
        } else {
          $error = "Couldn't create user. Please try again later.";
        }
      }
    // If login form is active:
    } else {
      $query = "SELECT `id` FROM `users` WHERE `email`='".$email."' LIMIT 1";
      $result = mysqli_query($link, $query);
      if (!empty($result)) {
        $query = "SELECT * FROM `users` WHERE `email` ='".$email."'";
        $result = mysqli_query($link, $query);
        $row = mysqli_fetch_array($result);
        if (password_verify($_POST['password'], $row[2])) {
          // User is logged in.
          echo 1;
          $_SESSION['id'] = $row['id'];
        } else {
          $error = "There are no records with this username/password combination.";
        }
      }
    }
  }
  if (!empty($error)) {
    echo $error;
  }
  // Toggle Follow/Unfollow
  if ($_GET['action'] == 'toggleFollow') {
    $follower = mysqli_real_escape_string($link, $_SESSION['id']);
    $isFollowing = mysqli_real_escape_string($link, $_POST['userId']);
    $query = "SELECT * FROM `isFollowing` WHERE `follower`='".$follower."' AND `isFollowing`='".$isFollowing."' LIMIT 1";
    $result = mysqli_query($link, $query);
    if (mysqli_num_rows($result) > 0) {
      // User is following the user_id in post.
      $row = mysqli_fetch_assoc($result);
      mysqli_query($link, "DELETE FROM `isFollowing` WHERE `id` = '".mysqli_real_escape_string($link, $row['id'])."' LIMIT 1");
      echo "1";
    } else {
      // User is not following user_id in post.
      $query = "INSERT INTO `isFollowing` (`follower`, `isFollowing`) VALUES ('$follower', '$isFollowing')";
      mysqli_query($link, $query);
      echo "2";
    }
  }
?>
