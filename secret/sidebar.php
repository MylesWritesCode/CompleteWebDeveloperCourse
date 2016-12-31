<?php
// // Login/Logout
if (array_key_exists("logout", $_GET)) {
  unset($_SESSION);
  setcookie("id", "", time() - 360);
  $_COOKIE["id"] = "";
} else if (array_key_exists("id", $_SESSION) || array_key_exists("id", $_COOKIE)) {
  header("Location: view.php");
}

?>

<div class="col-sm-2 element-ui" id="sidebar">
  <h1 class="text-center">MENU</h1>
  <div class="list-group" id="listMenu">
    <a href="create.php" class="list-group-item" id="createMenu">Create</a>
    <a href="view.php" class="list-group-item" id="viewMenu">View</a>
    <a href="#search" class="list-group-item" id="searchMenu">Search</a>
    <a href="index.php?logout=1" class="list-group-item" id="logoutMenu">Log Out</a>
  </div>
</div> <!-- col-md-2 sidebar -->
