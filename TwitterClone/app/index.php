<?php
  include "functions.php";
  include "views/header.php";
  if (array_key_exists("page", $_GET)) {
    if ($_GET['page'] == 'timeline') {
      include "views/timeline.php";
    } else if ($_GET['page'] == 'tweets') {
      include "views/tweets.php";
    }
  } else {
    include "views/home.php";
  }
  include "views/footer.php";
 ?>
