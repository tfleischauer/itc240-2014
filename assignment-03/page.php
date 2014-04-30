<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>ITC 240: A3</title>
</head>

<body>
	<h1>Albums</h1>
    <ul>
    	<li><a href="?show=all">List All Albums</a></li>
    	<li><a href="?show=alph">Sort Albums Alphabetically</a></li>
    	<li><a href="?show=year">Sort by Release Date</a></li>
    </ul>
    
       
<ul>

<?php
          
  foreach ($albums as $album) {
	  if ($show == "year") {
		  include("year.php");
  } else if ($show == "alph") {
		  include("alph.php");
	  } else {
		  include("list.php");
	  }
  }   
?>

</ul> 
    
</body>
</html>
