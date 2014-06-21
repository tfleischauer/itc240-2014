<?php
include("passwords.php");
$mysqlConnection = new mysqli("localhost", "tfleis02", $mysql_password, "tfleis02");
include("bus.php");
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
$bus = new Bus();
?>
<h3>Test 1</h3>
<?php
// Test 1: Speed is at 20 mph
$bus->setSpeed(20);
?>
 
<?php echo $bus->speed . " mph is the speed"; ?><br>
<?php echo $bus->armed . " is the armed status"; ?><br>
<?php $var1 = $bus->exploded ?><br>
<?php $var2 = boolToString($var1) ?>
<?php echo $var2 . " is the exploded status"; ?>

<?php
// Test 2: Speed is at 55 mph
$bus->setSpeed(55);
?>
<h3>Test 2</h3>

<?php echo $bus->speed . " mph is the speed"; ?><br>
<?php echo $bus->armed . " is the armed status"; ?><br>
<?php echo $bus->exploded . " is the exploded statuss"; ?><br>

<?php
// Test 3: Speed is at 80 mph
$bus->setSpeed(80);
?>
<h3>Test 3</h3>

<?php echo $bus->speed. " mph is the speed"; ?><br>
<?php echo $bus->armed . " is the armed status"; ?><br>
<?php echo $bus->exploded . " is the exploded statuss"; ?><br>

<?php
// Test 4: Speed is at 30 mph
$bus->setSpeed(30);
?>
<h3>Test 4</h3>
<?php echo $bus->getSpeed(); ?><br>
<?php echo $bus->setSpeed(30); ?>
<?php echo $bus->armed . " is the armed status"; ?><br>
<?php echo $bus->exploded . " is the exploded statuss"; ?><br>
 

<?php
// Test 5: Manually set exploded to false,
// check value, call trigger
$bus->exploded = "false";
?>
<h3>Test 5</h3>
<?php echo $bus->exploded . " is the exploded status"; ?><br>
<?php $bus->trigger(); ?>
<?php echo $bus->exploded . " is the exploded status"; ?><br>



</body>
</html>