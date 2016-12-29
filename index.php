<?php

  $link = mysqli_connect("localhost", "cl25-users-6tr", "Mr-/EGFRY",  "cl25-users-6tr");
  if (mysqli_connect_error()) {
    die ("There was an error connecting to the database.");
  }

  $query = "INSERT INTO `users` (`email`, `password`) VALUES('eric@example.com', 'password')";

  $query = "SELECT * FROM users";

  if ($result = mysqli_query($link, $query)) {
    $row = mysqli_fetch_array($result);
    print_r($row);
    echo "Your email is ".$row['email'];
    echo "Your password is ".$row['password'];
  }
?>
