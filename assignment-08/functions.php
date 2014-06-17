<?php

include("passwords.php");

function TalkToDatabase() {
	// why does this need to be global?
	global $mysql_password;
	$mysql = new mysqli("localhost","tfleis02",$mysql_password, "tfleis02");
	return $mysql;
}

function allResults() {
	$mysqlConnection = TalkToDatabase();
    $album_query = 'SELECT * FROM albums;'; 
    $prepared_album_table_query = $mysqlConnection->prepare($album_query);
    $prepared_album_table_query->execute();
    return $prepared_album_table_query->get_result();
}

function paginate($num_results) {
	$mysqlConnection = TalkToDatabase();
	$paginate_query = 'SELECT * FROM albums ORDER BY artist_name DESC LIMIT ?;';
	$prepared = $mysqlConnection->prepare($paginate_query);
	$prepared->bind_param("i", $num_results); // bind the placeholder
    $prepared->execute();
    return $prepared->get_result();
}

function paginateNext($num_results) {	
	echo $num_results;
	$mysqlConnection = TalkToDatabase();
	$query = 'SELECT * FROM albums LIMIT ? OFFSET ?;';
	$prepared = $mysqlConnection->prepare($query);
	$prepared->bind_param("ii", $num_results, $num_results);
	$prepared->execute();
    return $prepared->get_result();
}

function paginatePrevious($num_results) {
	echo $num_results;
	$mysqlConnection = TalkToDatabase();
	// Does not work in command line:
	// $query = 'SELECT * FROM albums LIMIT ? OFFSET ? - ?;';
	// $query = 'SELECT * FROM albums LIMIT ?,?;';
	$prepared = $mysqlConnection->prepare($query);
	$prepared->bind_param("ii", $num_results, $num_results);
	$prepared->execute();
    return $prepared->get_result();
}



?>
