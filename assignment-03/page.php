<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>ITC 240: A3</title>
</head>

<body>
	<h1>Albums</h1>
    <ul>
    	<li><a href="?show=a_a">List All Artist and Albums</a></li>
    	<li><a href="?show=lps">List All Albums</a></li>
        <li><a href="?show=artist">List All Artists</a></li>
        <li><a href="?show=count">Count All Artists</a></li>
    	<li><a href="?show=alph">Sort Albums Alphabetically</a></li>
    	<li><a href="?show=year">Sort by Release Date</a></li>
    </ul>
    
       
<ul>

<?php

  if ($show == "count") {
			include("count.php");
  }
	
  sort($albums);   
  foreach ($albums as $album) {  
	  if  ($show == "a_a") {
		  include("artist_album.php");
  	  } else if ($show == "lps") {
	  	   include("lps.php");
	  } else if ($show == "artist") {
		  include("artist.php");
	  } else if ($show == "year") {
		  include("year.php");
	  }
  }
  
  ksort($albums);
  foreach ($albums as $title => $value) {
	  if ($show == "alph") {
		  // include("alph.php"); 
		  echo "$title" . "$value";
	  }
  }
      	     
?>

</ul> 
    
</body>
</html>
