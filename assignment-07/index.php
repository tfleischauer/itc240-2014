<?php
	include("passwords.php");
?>

<!doctype html>
<html>
	<head>
    	<title>A7: Books</title>
    	<style>
			body {
				font-family:"Century Gothic", "Trebuchet MS",  Helvetica, Arial, sans-serif;
			}
			
			img {
				width:150px;
			}
			
			tr,
			td {
				border:2px solid lightgrey;
				padding:15px;
				border-collapse:collapse;	
			}
			
			th {
				text-align:center;
				background-color:grey;
				color:#FFF;	
				padding:10px;
				font-size:24px;
			}
			
			table {
				border-spacing:5px;	
				text-align:left;
				border-collapse:collapse;
				margin:auto;	
				margin-bottom:20px;
			}
			
			a {
				text-decoration:none;
				color:#FFF;
				border-bottom:3px dotted lightgrey;
				
			}
			
			a:hover {
				text-decoration:underline;	
				border-bottom:none;
			}
			
			#buttons {
				width:200px;
				text-align:center;
				margin:auto;	
			}
			
			.dark-theme {
				color:#FFF;
				background-color:grey;
			}
			
			.light-theme {
				color:#000;
				background-color:#FFF;
			}
			
			.dark-theme a {
				color:#FFF;
				background-color:grey;
				border-bottom:none;
			}
			
			.light-theme a {
				color:#000;
				border-bottom:none;
			}
		</style>
    </head>
	<body>
<?php	
	// if the browser is storing a key of 'sort' as a cookie, get that value
	if (isset($_COOKIE["sortKey"])) {
		$sortValue = $_COOKIE["sortKey"];	
	}
	
	// if the sort is specified in the URL, use that instead
	if (isset($_REQUEST["sortKey"])) {
		$sortValue = $_REQUEST["sortKey"];
		setcookie("sortKey", $sortValue, time() + 60 * 10, "/");	
	}
	
	
	if (isset($_COOKIE["viewKey"])) {
		$viewValue = $_COOKIE["viewKey"];	
	}
	
	if (isset($_REQUEST["viewKey"])) {
		$viewValue = $_REQUEST["viewKey"];
		setcookie("viewKey", $viewValue, time() + 60 * 10, "/");	
	}
	
	
	if (isset($_COOKIE["themeKey"])) {
		$themeValue = $_COOKIE["themeKey"];	
	}
	
	if (isset($_REQUEST["themeKey"])) {
		$themeValue = $_REQUEST["themeKey"];
		setcookie("themeKey", $themeValue, time() + 60 * 10, "/");	
	}

	// use white list to allow / control column names (safe list)
	$sortingWhiteList = [
		"author" => true,
		"title" => true,
		"light" => true,
		"dark" => true
	];
	
	
	// if the value to the $sortBy key is not in $sortingWhiteList 
	// assign  a default value
	if (!isset($sortingWhiteList[$sortValue])) {
		$sortKey = "title";	
	}
	
	$sortQuery = $mysqlConnection->prepare("SELECT * FROM books ORDER BY $sortValue DESC;");
	$sortQuery->execute();
	$sorted = $sortQuery->get_result();
	
	$booksAll = ("SELECT * FROM books");
	$prepared = $mysqlConnection->prepare($booksAll);
	// no input, no bind
	$prepared->execute();
	$results = $prepared->get_result();
	
	?>

<table>
	<tr>
    	<th>Cover</th>
        <th><a href="?sortKey=title">Title</a></th>
        <th><a href="?sortKey=author">Author</a></th>
        <th>Description</th>
    </tr>
	
<?php
	foreach($results as $result) {
?>
    
    <tr> <!-- do I need htmlentities for displaying from the database? -->
    	<td><img src="<?= htmlentities($result["cover_art"]) ?>" /></td>
        <td><?= htmlentities($result["title"]) ?></td>
        <td><?= htmlentities($result["author"]) ?></td>
        <td><?= htmlentities($result["description"]) ?></td>
    </tr>

<?php
	}
	?>
</table>   

	<div id="buttons">
    	<button class="dark-theme"><a href="?viewKey=cover">Cover View</a></button>
    	<button class="dark-theme"><a href="?viewKey=listing">Listing View</a></button>
        <hr>
		<button class="light-theme"><a href="?themeKey=light">Light Theme</a></button>
		<button class="dark-theme"><a href="?themeKey=dark">Dark Theme</a></button>
    </div>	
	
</body>
</html>