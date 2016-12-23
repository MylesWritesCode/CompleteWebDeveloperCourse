<?php
  $user = "Myles";

  if ($user == "Myles") {
    echo "Hello $user";
  } else {
    echo "You're not Myles, you're $user";
  }

echo "<br><br>";

// if conditions
  $age = 25;

  if ($age >= 18) {
    echo "You may proceed";
  } else {
    echo "You are too young";
  }

  echo "<h1>Loops</h1>";

// for loop
  for ($i = 10; $i >= 0; $i--) {
    echo "$i<br>";
  }

  $food = array("ice cream", "pizza", "chicken", "rice", "juice");
  for ($i = 0; $i < sizeof($food); $i++) {
    echo "$food[$i]<br>";
  }

// foreach loop
  foreach ($food as $key => $value){
    echo "Array item $key is $value<br>";
    $food[$key] = $value." is food<br>";
    echo $value;
  }

// while loop
  $i = 0;
  while ($i <= 10) {
    echo "$i<br>";
    $i++;
  }

  $food = array("ice cream", "pizza", "chicken", "juice", "rice", "pasta");
  $i = 0;
  while ($i < sizeof($food)) {
    echo "$food[$i]<br>";
    $i++;
  }

?>
