<?php
  // Connect to SQL db using PHP
  $link = mysqli_connect("localhost", "randomUserName", "randomPass", "randomUserName");
  if (mysqli_connect_error()) {
    die ("There was an error connecting to the database.");
  }
  $message = "";

  $email = empty($_POST["email"]) ? "" : $_POST["email"];
  $password = empty($_POST["password"]) ? "" : $_POST["password"];

  if (array_key_exists('email', $_POST) OR array_key_exists('password', $_POST)) {
    $query = "SELECT `id` FROM `users` WHERE `email` = '".mysqli_real_escape_string($link, $email)."'";
    $result = mysqli_query($link, $query);
    if (mysqli_num_rows($result) > 0) {
      $message = "This email address is already in use.";
    } else {
      $email = mysqli_real_escape_string($link, $email);
      $password = mysqli_real_escape_string($link, $password);
      $push = "INSERT INTO `users` (`email`, `password`) VALUES ('$email', '$password')";
      mysqli_query($link, $push);
      $message = "Submitted!";
    }
  }

  // Inserts data into db
  // $query = "INSERT INTO `users` (`email`, `password`) VALUES('eric@example.com', 'password')";

  // Updates data in db
  // $query = "UPDATE `users` SET password = '123qwe' WHERE email = 'myles@email.com' LIMIT 1";

  // Need to run after setting a query
  // mysqli_query($link, $query);

  // Displays table data based on what's selected from what table
  // $query = "SELECT * FROM users";

  // Specifically select a user with an id of 1
  // $query = "SELECT * FROM `users` WHERE `id` = 1";

  // Using LIKE to find everyone @gmail.com
  // $query = "SELECT * FROM `users` WHERE email LIKE '%@gmail.com'";

  // if ($result = mysqli_query($link, $query)) {
  //   while ($row = mysqli_fetch_array($result)) {
  //     print_r($row);
  //     echo "<br>";
  //     echo "Your email is ".$row['email']."<br>";
  //     echo "Your password is ".$row['password']."<br><br>";
  //   }
  // }
?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Sign Up Form</title>
  </head>
  <body>
    <nav class="nav navbar-default navbar-fixed">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Sign Up Form</a>
        </div>
      </div>
    </nav>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <div class="alert text-center sign-up-form" id="alerts">
            <?php echo $message; ?>
          </div>
          <div class="well sign-up-form">
            <form class="form-group" method="POST" id="signUpForm">
              <h1 class="text-center">Sign Up Form</h1>
              <br>
              <div class="input-group input-group-lg">
                <span class="input-group-addon addon-width" id="emailAddon">E-Mail Address</span>
                <input type="text" name="email" id="email" class="form-control" placeholder="joe@example.com" value="<?php echo $email ?>">
              </div>
              <br>
              <div class="input-group input-group-lg">
                <span class="input-group-addon addon-width" id="passwordAddon">Password</span>
                <input type="password" name="password" id="password" class="form-control" placeholder="password" value="<?php echo $password ?>">
              </div>
              <br>
              <button class="btn btn-primary btn-lg center-block" id="submitBtn">Submit</button>
            </form>
            <script type="text/javascript" src="script.js"></script>
          </div> <!-- well -->
        </div> <!-- col-md-6 col-md-offset-3 -->
      </div> <!-- row -->
    </div> <!-- container-fluid -->
  </body>
</html>
