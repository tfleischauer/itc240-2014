<?php

include("passwords.php");

	$defineInsertion = 'INSERT INTO neko (activity, calories, date) VALUES (?,?,?);';
	$preparedForBindingThenExecution = $mysqlConnection->prepare($defineInsertion);
	$preparedForBindingThenExecution->bind_param("sis", $_REQUEST["activity"], $_REQUEST["calories"], $_REQUEST["date"]);
	$preparedForBindingThenExecution->execute();

header("Location: index.php");

?>