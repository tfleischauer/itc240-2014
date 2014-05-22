<?php
	// connect to database
	include("passwords.php");
	$mysql = new mysqli("localhost","tfleis02",$mysql_password,"tfleis02");
	
	// $months = [ ];
?>

<!doctype html>
<html>
	<head>
    	<title>ITC 240 A5</title>
        <meta charset="UTF-8">
    	<link rel="stylesheet" type="text/css" href="style.css" />
    </head>
	<body>
    	<div id="page-wrapper">
    	<form action="index.php" method="POST">
        	<fieldset>
            	<legend>Receipt Tracker - Input</legend>
                <table>
                	<tr>
                    	<td class="form-labels"><label for="amount">Enter amount spent:</label></td>
                        <td><input type="number" name="amount" placeholder="$ Dollar Amount" min="1" required/></td>
                    </tr>
                    <tr>
                    	<td class="form-labels"><label for="item">What was the purchase?:</label></td>
                        <td><input type="text" name="item" size="35" maxlength="40" placeholder="What did you buy?" required/></td>
                    </tr>
                    <tr>
                    	<td class="form-labels"><label for="vendor">Where was the purchase made?:</label></td>
                        <td><input type="text" name="vendor" size="35" maxlength="40" placeholder="Where was the purchase made?" required/></td>
                    </tr>
                    <!--<tr>
                    	<td class="form-labels"><label for="date">Purchase Date (default is today):</label></td>
                        <td><input type="date" name="date" size="10" maxlength="10" placeholder="2014-07-01" /></td>
                    </tr>-->
                    <tr>
                    	<td></td>
                        <td><button>SUBMIT</button></td>
                    </tr>
    			</table>
              </fieldset>
          </form>
         
          
          <?php 
          if ($_SERVER["REQUEST_METHOD"] == "POST") {
			  $query = 'INSERT INTO receipts (amount,item,vendor,date) VALUES (?,?,?,now());';
			  $prepared = $mysql->prepare($query);
			  $prepared->bind_param("iss",$_REQUEST["amount"], $_REQUEST["item"], $_REQUEST["vendor"]);
			  $prepared->execute();
		  }
		  
		  $select = 'SELECT amount,item,vendor,date FROM receipts;';
		  $prepared = $mysql->prepare($select);
		  $prepared->execute();
		  
		  $results = $prepared->get_result();
		  ?>
          
          
          <fieldset class="result-fieldset">
          	<legend>Recent Purchases</legend>
            <table class="result-table">
              <tr>
                  <th>Amount Spent</th>
                  <th>Item</th>
                  <th>Vendor</th>
                  <th>Date</th>
              </tr>
              
              <?php
              	foreach ($results as $result) {
			  ?>
              <tr>
                  <td>$<?= $result["amount"] ?></td>
                  <td><?= $result["item"] ?></td>
                  <td><?= $result["vendor"] ?></td>
                  <td><?= $result["date"] ?></td>
               </tr>
               <?php
				}
				?>
                
                <?php 
                $sumQuery = 'SELECT SUM(amount) AS amount FROM receipts;';
				$preparedSum = $mysql->prepare($sumQuery);
		  	 	$preparedSum->execute();
				
		  		// get the result (an array containing one row)
		     	$resultSum = $preparedSum->get_result();
				
				?>
                <!-- <pre>This is the contents of a call to get_results() on $preparedSum;
                 produces stats about the rows, and "fields" which are the columns, but doesn't call the columns by name -->
                <?php
				// print_r($resultSum);
				?>
				<!-- </pre> -->
				
				
				<?php
				// fetch array gets a single row at a time.
				// this gets the single amount row as requested in $sumQuery
				$wholeRow = $resultSum->fetch_array();
				?>
                
               <!--  <pre>This is the contents of a call to fetch_array();
               print_r($wholeRow) produces an array with the summed amount -->
                <?php
				// print_r($wholeRow);
				?>
				<!-- </pre> -->
				
				
                <tr>
                	<td><b>Total: $</b></td>
                    <td> <?= $wholeRow["amount"] ?></td>
                </tr>
              
            </table> 
            </fieldset>
            
            <!--
            <fieldset  class="sorting-fieldset">
            <legend>Sorting</legend>
              <table class-"sorting-table">
                  <tr>
                      <form>
                          <td>See receipts so far for this month.</td>
                          <td><button name="monthly">SUBMIT</button></td>
                      </form>
                  </tr>
             </table>
           </fieldset>
           -->
                	
            
            <?php
			 // if ($_SERVER["REQUEST_METHOD"] == "POST"  && isset($_REQUEST["monthly"])) {
             // $selectMonth = 'SELECT * FROM receipts WHERE MONTH(date) > now() - INTERVAL 32 DAYS;';
			 // simpler
			 $selectMonth = 'SELECT * FROM receipts WHERE MONTH(date) = MONTH(now());';
		 	 $preparedMonth = $mysql->prepare($selectMonth);
		  	 $preparedMonth->execute();
			 
		  	 // get_result() returns an array-like object that contains ALL the rows that resulted from a query
			 // don't use fetch_aray() for this because we want to several lines of purchases, not just one
		     $monthResults = $preparedMonth->get_result();
			 ?>
             
             <!-- <pre>This is the contents of a call to get_results() on $monthResults;
                 produces stats about the rows, and "fields" which are the columns, but doesn't call the columns by name
             
                <pre>This is the contents of a call to get_results() on $monthResults:  -->
                
                <?php
				// print_r($monthResults);
				?>
				<!-- </pre> -->
			 
                 <fieldset class="result-fieldset">
                    <legend>Purchases This Month</legend>
                    <table class="result-table">
                      <tr>
                          <th>Amount Spent</th>
                          <th>Item</th>
                          <th>Vendor</th>
                          <th>Date</th>
                      </tr>
                  
                  <?php
                    foreach ($monthResults as $month) {
                  ?>
                      <tr>
                          <td>$<?= $month["amount"] ?></td>
                          <td><?= $month["item"] ?></td>
                          <td><?= $month["vendor"] ?></td>
                          <td><?= $month["date"] ?></td>
                       </tr>
                   <?php
                    } // end foreach loop
	
                		// $sumQuery = 'SELECT SUM(amount) AS amount FROM receipts;';
						// $preparedSum = $mysql->prepare($sumQuery);
		  	 			// $preparedSum->execute();
		     			// $resultSum = $preparedSum->get_result();
						// $wholeRow = $resultSum->fetch_array();
        
                    ?>
                    
                    	<!-- <tr>
                			<td><b>Total: $</b></td>
                    		<td>
                           
							 $wholeRow["amount"]  -->
							
                            <!-- </td>
               			</tr>  -->
                    </table> 
                    </fieldset> 
                    
                    <?php
                    // } // end if statement
                    ?>        
          
           </div> <!-- end page-wrapper -->
     </body>
</html>