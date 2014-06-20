<?php
include("passwords.php");
$mysqlConnection = new mysqli("localhost", "tfleis02", $mysql_password, "tfleis02");
include("bus.php");

// Test 1: Speed is at 20 mph
$bus1_Object = new Bus();
$bus1_Object->setSpeed(20);

// Test 2: Speed is at 55 mph
$bus2_Object = new Bus();
$bus2_Object->setSpeed(55);

// Test 3: Speed is at 80 mph
$bus3_Object = new Bus();
$bus3_Object->setSpeed(80);

// Test 4: Speed is at 30 mph
$bus4_Object = new Bus();
$bus4_Object->setSpeed(30);

// Test 5: Manually set exploded to false,
// check value, call trigger
$bus5_Object = new Bus();
$bus5_Object->exploded = "false";
?>


<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>ITC 240 A9: Classes</title>
</head>

<body>
<h1>Pop Quiz, Hotshot</h1>
<?php

?><h3>Test 1</h3><?php
 echo $bus1_Object->showResults(); ?><br><?php
 
?><h3>Test 2</h3><?php
 echo $bus2_Object->showResults(); ?><br><?php
 
?><h3>Test 3</h3><?php
 echo $bus3_Object->showResults(); ?><br><?php
 
?><h3>Test 4</h3><?php
 echo $bus4_Object->getSpeed(); ?><br><?php
 echo $bus4_Object->armed(30); ?><br><?php
 echo $bus4_Object->exploded(30); ?><br><?php
 
?><h3>Test 5</h3><?php
 echo $bus5_Object->exploded . " is the exploded status"; ?><br><?php 
 $bus5_Object->trigger();
 echo $bus5_Object->exploded . " is the exploded status"; ?><br><?php
 
?>
</body>
</html>