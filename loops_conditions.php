<?php
  $user = "Myles";

  if ($user == "Myles") {
    echo "Hello $user";
  } else {
    echo "You're not Myles, you're $user";
  }

echo "<br><br>";

  $age = 25;

  if ($age >= 18) {
    echo "You may proceed";
  } else {
    echo "You are too young";
  }

  echo "<h1>Loops</h1>";

  for ($i = 10; $i >= 0; $i--) {
    echo "$i<br>";
  }

  $food = array("ice cream", "pizza", "chicken", "rice", "juice");
  for ($i = 0; $i < sizeof($food); $i++) {
    echo "$food[$i]<br>";
  }

  foreach ($food as $key => $value){
    echo "Array item $key is $value<br>";
    $food[$key] = $value." is food<br>";
    echo $value;
  }

?>
