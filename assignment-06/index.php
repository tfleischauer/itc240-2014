<!doctype html>
<html>
	<body>

<?php

	include("passwords.php");

	$form_activity = "";
	$form_calories = "";
	$form_date="";
	$form_id = "";
	
	if (isset($_REQUEST["update"])) {
		$update_request = 'SELECT * FROM neko WHERE id = ?';	
			$select = $mysqlConnection->prepare($update_request);
			$select->bind_param("i", $_REQUEST["update"]);
			$select->execute();
			$result = $select->get_result();
			$singleRow = $result->fetch_array();
			$form_activity = $singleRow["activity"];
			$form_calories = $singleRow["calories"];
			$form_date = $singleRow["date"];
			$form_id = $singleRow["id"];
	} else if (isset($_REQUEST["delete"])){
			$deleteQuery = 'DELETE FROM neko WHERE id = ?;';
			$delete = $mysqlConnection->prepare($deleteQuery);
			$delete->bind_param("i", $_REQUEST["delete"]);
			$delete->execute();
	}
?>

    	<form action="insert.php" method="POST">
        	<textarea name="activity" placeholder="Description of Activity" value=""><?= $form_activity ?></textarea>
        	<input name="calories" placeholder="Calories Exerted" value="<?= $form_calories ?>">
        	<input name="date" placeholder="Date Ex: 2014-05-27" value="<?= $form_date ?>">
            <input name="id" type="hidden" value="<?= $form_id ?>">
        	<button>Submit</button>
        </form>
<?php

	  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_REQUEST["activity"]) && isset($_REQUEST["calories"]) && isset($_REQUEST["date"]) && isset($_REQUEST["id"])) {
		  $id = $_REQUEST["id"];
		  echo $id;
		  print_r ($id);
		  $activity = $_REQUEST["activity"];
		  $calories = $_REQUEST["calories"];
		  $date = $_REQUEST["date"];
		  
		  include("insert.php");
	  }

$definedAndPreparedQuery = $mysqlConnection->prepare('SELECT * FROM neko ORDER BY calories DESC;'); // no matter what operation you've done via the form, ALWAYS show the list of existing rows
$definedAndPreparedQuery->execute();
$returnedResults = $definedAndPreparedQuery->get_result();


foreach ($returnedResults as $row) {
  ?>	
	  <div>
		  <?= htmlentities($row["activity"]) ?>
		  <?= htmlentities($row["calories"]) ?>
		  <?= htmlentities($row["date"]) ?>
		  <a href="?update=<?= $row["id"] ?>">&#9998;</a> 
		  <a href="?delete=<?= $row["id"] ?>">&#10005;</a> <!-- create a link where the query string includes a "delete=X", where X is the ID of the row in question. That's how we know which database row to delete or update. -->
	  </div>   
  <?php
}
?>

<?php
	$calorieSum = $mysqlConnection->prepare('SELECT SUM(calories) as Total_Calories, MAX(calories) as Max_Calories FROM neko;');
	$calorieSum->execute();
	$getSumResult_AllRowsAndStats = $calorieSum->get_result();
	$sumRowResult = $getSumResult_AllRowsAndStats->fetch_array();
?>

	<div>
    <hr>
    	<b>Max Calorie Activity: <?= $sumRowResult["Max_Calories"] ?></b> <br />
    	<b>Total Calories: <?= $sumRowResult["Total_Calories"] ?></b> 
        
    </div>

  </body>
</html>