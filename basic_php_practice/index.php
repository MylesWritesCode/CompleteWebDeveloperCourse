<?php
  echo "Hello World";
  // Declare a variable
  $name = "Myles";
  // Display variables
  echo "$name";
  echo $name;

  $string1 = "<p>This is the first part";
  $string2 = "of a variable.</p>";
  echo "$string1 $string2";

  $myNumber = 45;
  $calculation = $myNumber * 50;
  echo $calculation;

  $myBool = true;
  echo "<p>We can store boolean values in variables, like other languages.</p>";

  $variableName = "name";
  // Displays $name which is equal to "Myles" (up top)
  echo $$variableName;

  // Array
  $myArray = array("Myles", "Is", "Learning", "PHP");
  // The following just tells us that $myArray is an array
  // echo $myArray
  print_r($myArray);
  // prints the word "Is" in $myArray
  echo $myArray[1];

  // Another way to declare an array
  $anotherArray[0] = "pizza";
  $anotherArray[1] = "more pizza";
  $anotherArray[2] = "ice cream";
  $anotherArray[3] = "soda";
  // you can even set arrays like hashes in ruby
  $anotherArray[myFavoriteFood] = "steak";

  // Another way of setting up an array of a "hash" type
  $thirdArray = array(
    "France" => "French",
    "England" => "English",
    "Germany" => "German"
  );

  // Find the length of an Array
  sizeof($thirdArray);
  echo sizeof($thirdArray);

  // Add an item to an array
  $anotherArray[] = "chicken";

  // Remove an item from an array
  unset($thirdArray["France"]);




































?>
