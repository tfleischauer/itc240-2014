<?php
  include("passwords.php");

  // make a variable that represents the components to logging on and a connection to the database
  // paramaters are: server, username, password, database account name
  $mysql = new mysqli("localhost","tfleis02",$mysql_password, "tfleis02");
  
?>
<!doctype html>
<html>
    <head>
      <meta charset="UTF-8">
      <title>ITC 240 A4</title>
    </head>
  <body>
  <?php
	
	// get the table results from the database and store in a variable
	// open the connection ($mysql), and use "->query" to store the query syntax in the album_table variable
	
	// wrong way
	// don't do the following line generally speaking unless the values are not being inserted by a user. 
	// Do not use double quotes because that is how SQL injection occurs.
	// $album = $mysql->query('SELECT * FROM albums;');
	// $album->execute();
	// $all_row_results = $album->get_result();
	
			
	// right way
	// to get values from the database, we want to:
	// 1. prepare 
	// 2. bind
	// 3. execute the query request
	
	// 0. put query in a variable
	$album_query = 'SELECT * FROM albums;'; 
	//'SELECT * FROM albums ORDER BY release_year ASC;';
	
	// 1. this step sends the query to the database to create a state of preparation (a safety measure) for the query
	$prepared_album_table_query = $mysql->prepare($album_query);
	
	// 2. bind
	// no user input to bind
	// $prepared_album_table_query->bind_param("ssssi");
	
	// 3. now execute the prepared results (send the query to be executed)
	$prepared_album_table_query->execute();
	 
	// get the rows that resulted from the query of the entire table
	// $row_result behaves like an array but is not an array
	$all_row_results = $prepared_album_table_query->get_result();
	
	// loop through all the row results and output them in a table as single rows.
	// leave php - go back and forth from html to php for to create markup that interacts with php
	?>
	<table>
	<?php
	foreach ($all_row_results as $single_row_results) {
	?>
	<tr>
    	<td><?= $single_row_results["id"] ?></td>
		<td><?= $single_row_results["artist_name"] ?>&nbsp;&nbsp;&nbsp;</td>
		<td><?= $single_row_results["album_name"] ?></td>
        <td><?= $single_row_results["release_year"] ?>&nbsp;&nbsp;&nbsp;</td>
		<td><img src=" <?= $single_row_results["cover_image"] ?> " width="210px" height="210px"></td>
	</tr>
	<?php
	}
	?>
	</table> 
    
    <?php
    	$order_year ='SELECT * FROM albums ORDER BY release_year ASC;'   
	?> 
      
  </body>
</html>