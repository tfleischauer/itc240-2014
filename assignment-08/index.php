<?php
  include("passwords.php");
  include("functions.php");

  // paramaters are: server, username, password, database, account name
  $mysql = new mysqli("localhost","tfleis02",$mysql_password, "tfleis02");
  
  $paginate_number = "";
  
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
    
    <a href="?directionKey=backValue">Last Page</a>
    <a href="?directionKey=nextValue">Next Page</a>
    
    <?php	
	
	  // if the form has been submitted
	  if ($_SERVER["REQUEST_METHOD"] == "POST") {
		 // if the number of results was inputted by the user
		if (isset($_REQUEST["paginate_amount"])) {
			$all_results = paginate($_REQUEST["paginate_amount"]);
		// otherwise show everything
		} else if (!isset($_REQUEST["paginate_amount"])) {
			$all_results = allResults();
		}  
	  }
	
    
	  if(isset($_REQUEST["directionKey"])) {
		  $directionValue = ($_REQUEST["directionKey"]);
	  }
	  
	  if ($directionValue == "backValue")  {
		  echo $directionValue; // // works
		  paginatePrevious ($paginate_number);
	  } 

	  if ($directionValue == "nextValue")  {
		  echo $directionValue; // // works
		  paginateNext ($paginate_number);
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
    
<?php

	// $order_year ='SELECT * FROM albums ORDER BY release_year ASC;'   
?> 
      
  </body>
</html>