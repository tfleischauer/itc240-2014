<!doctype html>
<html>
	<body>
    	<form action="insert.php" method="POST">
        	<textarea name="activity" placeholder="Description of Activity"></textarea>
        	<input name="calories" placeholder="Calories Exerted">
        	<input name="date" placeholder="Date Ex: 2014-05-27">
        	<button>Submit</button>
        </form>
<?php

include("passwords.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_REQUEST["activity"]) && isset($_REQUEST["calories"]) && isset($_REQUEST["date"])) {
	include("insert.php");
}

$definedAndPreparedQuery = $mysqlConnection->prepare('SELECT * FROM neko ORDER BY calories DESC;');
$definedAndPreparedQuery->execute();
$returnedResults = $definedAndPreparedQuery->get_result();

foreach ($returnedResults as $row) {
?>	
	<div>
    	<?= htmlentities($row["activity"]) ?>
        <?= htmlentities($row["calories"]) ?>
		<?= htmlentities($row["date"]) ?>
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
    	Total Calories: <?= $sumRowResult["Total_Calories"] ?> <br />
        Max Calories: <?= $sumRowResult["Max_Calories"] ?>
    </div>

  </body>
</html>