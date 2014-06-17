<?php
  include("passwords.php");
  include("functions.php");

  // paramaters are: server, username, password, database, account name
  $mysql = new mysqli("localhost","tfleis02",$mysql_password, "tfleis02");
  
  $paginate_number = "";
  // $directionKey = "";
  $directionValue = "";
  $all_results = array(); // PHP 5.4 [ ]
  // $pageNumber = 0;
  $paginate_amount = "";
  
?>

<!doctype html>
<html>
    <head>
      <meta charset="UTF-8">
      <title>ITC 240 A8</title>
    </head>
  <body>

    <form action="index.php" method="POST">
    	<label>How many results would you like to see at a time?</label>
        <input name="paginate_amount" placeholder="Enter Number" value="">
        <button>Submit</button>
        <!-- Do I need a clear input button? -->
    </form>
    
    <!-- <a href="?directionKey=backValue">Last Page</a> -->
    <a href="?directionKey=nextValue">Next Page</a>
    
<?php	

  // if the form has been submitted
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	  
	  $paginate_amount = $_REQUEST["paginate_amount"];
	  
	 // if the pagination number was inputted by the user
	if (isset($_REQUEST["paginate_amount"])) {
		$all_results = paginate($_REQUEST["paginate_amount"]);
		echo $paginate_amount;
	// otherwise show everything
	} elseif (!isset($_REQUEST["paginate_amount"])) {
		$all_results = allResults();
    } 

	if(isset($_REQUEST["directionKey"])) {
		$directionValue = ($_REQUEST["directionKey"]);
	}
  
	if ($directionValue == "nextValue")  {
		// $paginate_amount = $_REQUEST["paginate_amount"];
		echo $directionValue; // no longer echoes
		// $pageNumber++;
		echo $pageNumber;
		$all_results = paginateNext($paginate_amount, $pageNumber);
	}
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