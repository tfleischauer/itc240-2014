<!doctype html>
<html>
	<head>
    	<title>ITC 240 A2 - Mad Lib</title>
        <style>
		
			body {
				font-family:"Century Gothic", Helvetica, "Trebuchet MS", Arial, sans-serif;
				font-size:100%;
			}
			
			.page-wrapper {
				width:70%;
				margin:auto;
			}
			
			form {
				width:48%;
				margin:2% auto 2% auto;	
			}
			
			button {
				float:right;	
			}
			
			.form-labels  {
				text-align:right;
				vertical-align:top;	
			}
			
			legend {
				font-size: 125%; /* 20px /16px */
				padding:0px 8px 0px 8px;
				font-style:oblique;
			}
			
			fieldset {
				-moz-box-shadow: 4px 4px 4px #777777;
				-webkit-box-shadow: 4px 4px 4px #777777;
				box-shadow: 4px 4px 4px #777777;	
			}
			
			th, td {
				padding: 5px;	
			}
			
			p,
			#p1 {
				width:47%;
				margin:auto;	
			}
			
			#p1 {
				font-size: 125%; /* 20px /16px */
				padding-bottom:.375em; /* 6px / 16px */;
				font-style:oblique;
			}
			
		</style>
    </head>
	<body>
    
    <?php 
		$method = $_SERVER['REQUEST_METHOD'];
	?>
    
    <div id="page-wrapper">
        
	<form method="post">
         <fieldset>
           <legend>Mad Lib</legend>
           <table>       
              <tr>
                  <td class="form-labels"><label for="verb">An action towards a person (ex. kiss, hit, etc):</label></td>
                  <td><input name="verb" placeholder="present tense verb" ></td>
              </tr>
              <tr>
                  <td class="form-labels"><label for="movie">Movie from a series (ex. Rocky, Star Wars, etc):</label></td>
                  <td><input name="movie" placeholder="noun" ></td>
              </tr>
              <tr>
                  <td class="form-labels"><label for="bodypart">Name a body part:</label></td>
                  <td><input name="bodypart" placeholder="noun"></td>
              </tr>
              <tr>
                  <td class="form-labels"><label for="emotion">Name an emotion:</label></td>
                  <td><input name="emotion" placeholder="adjective" ></td>
              </tr>
              <tr>
                  <td class="form-labels"><label for="number">Enter a number:</label></td>
                  <td><input name="number" placeholder="number" ></td>
              </tr>
              <tr>
                  <td class="form-labels"><label for="anothernumber">Enter another number:</label></td>
                  <td><input name="anothernumber" placeholder="another number" ></td>
              </tr>
               <tr>
                  <td class="form-labels"><label for="relative">Enter a type of relative (ex. mom, uncle, etc):</label></td>
                  <td><label><input name="relative" placeholder="noun" ></label></td>
               </tr>
               <tr>
                  <td></td>
                  <td><button>SUBMIT</button> <!-- post form --></td>
               </tr>		
               </table>
               
            </fieldset>      
	</form>
    
    <?php
		
		if($method == "POST") {
	
		$verb = htmlentities($_REQUEST["verb"]); // not using htmlentities is dangerous because javaScript could be injected (or CSS).
		$relative = htmlentities($_REQUEST["relative"]);
		$movie = htmlentities($_REQUEST["movie"]);
		$bodypart = htmlentities($_REQUEST["bodypart"]);
		$emotion = htmlentities($_REQUEST["emotion"]);
		$number = htmlentities($_REQUEST["number"]);
		$anothernumber = htmlentities($_REQUEST["anothernumber"]);
	?>
	
    <p id="p1">Your Mad Lib ...</p>
	<p>Today, I went to see the latest <?= $movie ?> movie with my <?= $relative ?>. We were <?= $emotion ?> and held hands at one point. The person sitting behind us thought it would be hilarious to abruptly scream into my <?= $relative ?>'s <?= $bodypart ?>. 
    
    <?php if ($number == 5) { ?>
    Then... urinated in their pants.
     <?php } else { ?> 
    In fact, that person screamed <?= $number ?> times.
    <?php } ?>
        
    <?php if ($anothernumber < 10) {?> 
    	It was hilarious... yet it made me want to <?= $verb ?> everyone around me.</p>
    <?php } elseif ($anothernumber > 10 && $anothernumber < 75) { ?>
        It was kind-of awkward... yet it made me want to <?= $verb ?> everyone around me.</p>
    <?php } else { ?>
         We were pissed! Yet it made me want to <?= $verb ?> everyone around me.</p>
    <?php } ?>
    
    <?php } ?>
    
    </div> <!-- end page-wrapper -->

	</body>
</html>