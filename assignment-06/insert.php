<?php

include("passwords.php");

$activity = $_REQUEST["activity"];
$calories = $_REQUEST["calories"];
$date = $_REQUEST["date"];
$id = $_REQUEST["id"];

  if (isset($id)) { // or if (isset($_REQUEST["id"]))
		  $updateQuery = 'UPDATE neko SET activity=?, calories=?, date=? WHERE id=?';
		  $update = $mysqlConnection->prepare($updateQuery);
		  $update->bind_param("sisi", $activity, $calories, $date, $id);
		  $update->execute();	
  } else {
		  $defineInsertion = 'INSERT INTO neko (activity, calories, date) VALUES (?,?,?);';
		  $preparedForBindingThenExecution = $mysqlConnection->prepare($defineInsertion);
		  // $preparedForBindingThenExecution->bind_param("sis", $_REQUEST["activity"], $_REQUEST["calories"], $_REQUEST["date"]);
		  $preparedForBindingThenExecution->bind_param("sis", $activity, $calories, $date);
		  $preparedForBindingThenExecution->execute();
  }

header("Location: index.php");

?>