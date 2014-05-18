<?php
	// connect to database
	include("passwords.php");
	$mysql = new mysqli("localhost","tfleis02",$mysql_password,"tfleis02");
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
              	foreach ($results AS $result) {
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
                $sumQuery = 'SELECT SUM(amount) FROM receipts;';
				$preparedSum = $mysql->prepare($sumQuery);
		  	 	$preparedSum->execute();
		  	
		     	$resultSum = $preparedSum->get_result();
				?>
				
                <tr>
                	<td><b>Total: $</b><?= $resultSum[amount] ?></td>
                </tr>
              
            </table> 
            </fieldset>
            
            <fieldset  class="sorting-fieldset">
            <legend>Sorting</legend>
              <table class-"sorting-table">
                  <tr>
                      <form>
                          <td>See receipts for the last month.</td>
                          <td><button>SUBMIT</button></td>
                      </form>
                  </tr>
             </table>
           </fieldset>
                	
            
            <?php
			 if ($_SERVER["REQUEST_METHOD"] == "POST") {
             $select = 'SELECT * FROM receipts WHERE DATED BETWEEN now() AND now() - 32;';
		 	 $prepared = $mysql->prepare($select);
		  	 $prepared->execute();
		  
		     $results = $prepared->get_result();
			 }
			 ?>
             
          
           </div> <!-- end page-wrapper -->
     </body>
</html>