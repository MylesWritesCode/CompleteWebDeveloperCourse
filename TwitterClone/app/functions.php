<?php
  session_start();
  if (array_key_exists("function", $_GET)) {
    if ($_GET["function"] == "logout") {
      $_SESSION = array();
      session_destroy();
      header("Location: index.php");
    }
  }
?>
