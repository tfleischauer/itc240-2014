<?php

include("passwords.php");

	if($id) {
			$updateQuery = 'UPDATE neko SET activity=?, calories=?, date=? WHERE ID=?';
			$update = $mysql->prepare($updateQuery);
			$update->bind_param("sisi", $activity, $calories, $date, $id);
			$update->execute();	
	} else {
			$defineInsertion = 'INSERT INTO neko (activity, calories, date) VALUES (?,?,?);';
			$preparedForBindingThenExecution = $mysqlConnection->prepare($defineInsertion);
			$preparedForBindingThenExecution->bind_param("sis", $_REQUEST["activity"], $_REQUEST["calories"], $_REQUEST["date"]);
			$preparedForBindingThenExecution->execute();
	}

header("Location: index.php");

?>