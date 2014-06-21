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
<h2><i>Based of the movie 'Speed'</i></h2>

<?php
$bus = new Bus();
?>


<?php
// Test 1: Speed is at 20 mph
$bus->setSpeed(20);
?>
<h3>Test 1 - Bus starts at a speed of 20 mph</h3>
 
<?php echo $bus->speed . " mph is the speed"; ?><br>

<?php $var_c = $bus->armed ?>
<?php $var_d = boolToString($var_c) ?>
<?php echo $var_d . " is the armed status"; ?><br>

<?php $explodedReturn = $bus->exploded ?>
<?php $explodedString = boolToString($explodedReturn) ?>
<?php echo $explodedString . " is the exploded status"; ?>

<?php
// Test 2: Speed is at 55 mph
$bus->setSpeed(55);
?>
<h3>Test 2 - Bus speeds up to 55 mph</h3>

<?php echo $bus->speed . " mph is the speed"; ?><br>

<?php $armedReturn = $bus->armed ?>
<?php $armedString = boolToString($armedReturn) ?>
<?php echo $armedString . " is the armed status"; ?><br>

<?php $explodedReturn = $bus->exploded ?>
<?php $explodedString = boolToString($explodedReturn) ?>
<?php echo $explodedString . " is the exploded status"; ?>

<?php
// Test 3: Speed is at 80 mph
$bus->setSpeed(80);
?>
<h3>Test 3 - Bus speeds up to 80 mph</h3>

<?php echo $bus->speed. " mph is the speed"; ?><br>

<?php $armedReturn = $bus->armed ?>
<?php $armedString= boolToString($armedReturn) ?>
<?php echo $armedString . " is the armed status"; ?><br>

<?php $explodedReturn = $bus->exploded ?>
<?php $explodedString = boolToString($explodedReturn) ?>
<?php echo $explodedString . " is the exploded status"; ?>

<?php
// Test 4: Speed is at 30 mph
$bus->setSpeed(30);
?>
<h3>Test 4 - Bus slows from 80 mph to 30 mph</h3>
<?php echo $bus->speed. " mph is the speed"; ?><br>

<?php $armedReturn = $bus->armed ?>
<?php $armedString= boolToString($armedReturn) ?>
<?php echo $armedString . " is the armed status"; ?><br>

<?php $explodedReturn = $bus->exploded ?>
<?php $explodedString = boolToString($explodedReturn) ?>
<?php echo $explodedString . " is the exploded status"; ?> 

<?php
// Test 5: Manually set exploded to false,
// check value, call trigger
$bus->exploded = "false";
?>
<h3>Test 5a - Rewrite to a happy ending (no exploding bus.)</h3>
<?php echo $bus->exploded . " is the exploded status"; ?><br>

<h3>Test 5b - Rewrite to an ending where a bitter mad man blows up the bus</h3>
<?php $bus->trigger(); ?>

<?php $explodedReturn = $bus->exploded ?>
<?php $explodedString = boolToString($explodedReturn) ?>
<?php echo $explodedString . " is the exploded status"; ?>

<h3>The End</h3>

</body>
</html>