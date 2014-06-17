<?php

include("passwords.php");

function TalkToDatabase() {
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
	$pageNumber = 0;
	$pageNumber++;
	echo $num_results . " = num_results. ";
	echo $pageNumber . " = pageNumber. ";
	$offsetMath = (($pageNumber - 1) * $num_results);
	echo $offsetMath . " = offsetMath. "; 
	$mysqlConnection = TalkToDatabase();
	// Thamos says: if you had SELECT * FROM table WHERE some_column = ? LIMIT ?, you would $prepared->bind_params("si", $where, $limit). 
	$query = 'SELECT * FROM albums LIMIT ? OFFSET ?;';
	$prepared = $mysqlConnection->prepare($query);
	$prepared->bind_param("ii", $limit, $offset);
	$prepared->execute();
    return $prepared->get_result();
}

?>
