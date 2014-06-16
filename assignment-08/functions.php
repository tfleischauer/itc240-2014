<?php

include("passwords.php");

function TalkToDatabase () {
	global $mysql_password;
	$mysql = new mysqli("localhost","tfleis02",$mysql_password, "tfleis02");
	return $mysql;
}

function allResults () {
	// why does this need to be global?
	global $mysql_password;
	$mysql = new mysqli("localhost","tfleis02",$mysql_password, "tfleis02");
	// TalkToDatabase ();
    $album_query = 'SELECT * FROM albums;'; 
    $prepared_album_table_query = $mysql->prepare($album_query);
    $prepared_album_table_query->execute();
    return $prepared_album_table_query->get_result();
}

function paginate ($num_results) {
	global $mysql_password;
	$mysql = new mysqli("localhost","tfleis02",$mysql_password, "tfleis02");
	$paginate_query = 'SELECT * FROM albums ORDER BY DESC LIMIT $num_results=?;';
	$prepared = $mysql->prepare($paginate_query);
	// Do I need to bind_params? Yes, because it's a user input... or no because it is just a LIMIT?
	// $prepared->bind_param("i", $artist_name, $album_name, $cover_image, $id, $release_year);
	// $prepared->bind_param("i");
    $prepared->execute();
    return $prepared->get_result();
}

function paginateNext ($num_results) {	
	TalkToDatabase ();
	$query = 'SELECT * FROM albums ORDER BY DESC LIMIT $num_results=? OFFSET $num_results=?;';
	$prepared = $mysql->prepare($query);
	$prepared->execute();
    return $prepared->get_result();
}

function paginatePrevious ($num_results) {
	// TalkToDatabase ();	
	// SELECT * FROM albums ORDER BY DESC LIMIT ? OFFSET ?;
}



?>
