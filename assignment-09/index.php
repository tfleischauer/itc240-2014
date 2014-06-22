<?php
include("bus.php");
?>

<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>ITC 240 A9: Classes</title>
    <style>
      body { font-family: Helvetica, Arial, sans-serif; }
    </style>
  </head>

  <body>
    <h1>Pop Quiz, Hotshot</h1>
    <h2><i>Based of the movie 'Speed'</i></h2>

<?php
$bus = new Bus();
?>

<h3>Test 1 - Bus starts at a speed of 20 mph...</h3>
<?php
$bus->setSpeed(20);
echo $bus->speed . " mph is the speed"; ?><br><?php
echo boolToString($bus->armed) . " is the armed status"; ?><br><?php
echo boolToString($bus->exploded) . " is the exploded status";
?>

<h3>Test 2 - Bus speeds up to 55 mph...</h3>
<?php
$bus->setSpeed(55);
echo $bus->speed . " mph is the speed"; ?><br><?php
echo boolToString($bus->armed) . " is the armed status"; ?><br><?php 
echo boolToString($bus->exploded) . " is the exploded status";
?>

<h3>Test 3 - Bus speeds up to 80 mph...</h3>
<?php

$bus->setSpeed(80);
echo $bus->speed . " mph is the speed"; ?><br><?php
echo boolToString($bus->armed) . " is the armed status"; ?><br><?php 
echo boolToString($bus->exploded) . " is the exploded status";
?>

<h3>Test 4 - Bus slows from 80 mph to 30 mph...</h3>
<?php
$bus->setSpeed(30);
echo $bus->speed . " mph is the speed"; ?><br><?php
echo boolToString($bus->armed) . " is the armed status"; ?><br><?php 
echo boolToString($bus->exploded) . " is the exploded status";
?>

<h3>Test 5a - Rewrite to a happy ending (no exploding bus.)</h3>
<?php
$bus->exploded = false;
echo boolToString($bus->exploded) . " is the exploded status";
?>

<h3>Test 5b - Rewrite to an ending where a bitter mad man blows up the bus.</h3>
<?php 
$bus->trigger();
echo boolToString($bus->exploded) . " is the exploded status";
?>

<h3>The End</h3>

  </body>
</html>