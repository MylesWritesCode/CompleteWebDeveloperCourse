<?php
// GET variables
// print_r($_GET);
echo "Hi there ".$_GET['name']."!";

echo $_GET["value"];
?>

<p>What's your name?</p>
<form>
  <input name="name" type="text">
  <input type="submit" value="Submit">
</form>

<?php
echo "<h1>Hello there ".$_GET["name"]."!</h1>";
?>

<form>
  <h3>Please enter a whole number</h3>
  <input name="number" type="text">
  <input type="submit" value="Submit">
</form>

<?php
  if (is_numeric($_GET["number"]) && $_GET["number"] > 0 && $_GET["number"] == round($_GET["number"], 0)){
    $isPrime = true;
    if ($_GET) {
      $i = 2;
      while ($i < $_GET["number"]) {
        if ($_GET["number"] % $i == 0) {
          $isPrime = false;
        }
        $i++;
      }
      if ($isPrime) {
        echo "<p>$i is a prime number.</p>";
      } else {
        echo "<p>$i is not a prime number.</p>";
      }
    }
  } else {
    echo "Please enter a positive whole number.";
  }
?>

<form method="POST">
  <h3>What is your name? (POST)</h3>
  <input name="postName" type="text">
  <input type="submit" value="Submit">
</form>

<?php
  // echo $_POST["postName"];
  // echo $nameToCheck;
  if ($_POST) {
    $names = array("Myles", "Mel", "Nobody");
    $nameToCheck = $_POST["postName"];
    // echo $_POST["postName"];
    $isKnown = false;
    foreach ($names as $value) {
      if ($value == $nameToCheck) {
        $isKnown = true;
      }
    }
    if ($isKnown) {
      echo "<h3>Hello there ".$nameToCheck."</h3>";
    } else {
      echo "I don't know you.";
    }
    // for ($j = 0; $j > sizeof($names); $j++) {
    //   if ($names[$j] == $nameToCheck) {
    //     echo "<h3>Hello ".$names[$j]."</h3>";
    //   } else {
    //     echo "I don't know you.";
    //   }
    // }
  }
?>
