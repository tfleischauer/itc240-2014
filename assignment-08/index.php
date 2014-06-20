<?php
  include("passwords.php");
  include("functions.php");

  // paramaters are: server, username, password, database, account name
  $mysql = new mysqli("localhost","tfleis02",$mysql_password, "tfleis02");
  
  $paginate_number = "";
  $directionValue = "";
  $all_results = array(); // PHP 5.4 [ ]
  $page = 1;
  $paginate_amount = 4;
  
  /*
index.php?page=2&num_results=4
  */
  
  if (isset($_REQUEST["page"])) {
	$page = $_REQUEST["page"];  
  }
  
    // if the form has been submitted
  if (isset($_REQUEST["num_items"])) {
	  
	  $paginate_amount = ($_REQUEST["num_items"]);
	  
	 // if the pagination number was inputted by the user
	if (isset($_REQUEST["num_items"])) {
		if ($_REQUEST["num_items"] != "") {
			$all_results = paginate($paginate_amount);
			// echo $paginate_amount;
			
			 // otherwise show everything
		} else {
			$all_results = allResults();
		} 
   }
  }
  
?>

<!doctype html>
<html>
    <head>
      <meta charset="UTF-8">
      <title>ITC 240 A8: Functions</title>
    </head>
  <body>
  
  <h1>Fun with Functions</h1>
  <h2><i>Album Covers</i></h2>

    <form action="index.php" method="POST">
    	<label>How many results would you like to see at a time?</label>
        <input name="num_items" placeholder="Enter Number" value="" />
        <button>Submit</button>
    </form>
  
    
    <a href="?page=<?= $page + 1 ?>&num_items=<?= $paginate_amount ?>">Next Page</a> <br>
    <a href="?page=<?= $page - 1 ?>&num_items=<?= $paginate_amount ?>">Previous Page</a> <br>
       
    
<?php	

	if(isset($_REQUEST["page"])) {
		$all_results = paginateNext($paginate_amount, $page);
		// print_r($all_results);
	} 
 
?>

	<table>
<?php
foreach ($all_results as $single_row_results) {
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
      
  </body>
</html>