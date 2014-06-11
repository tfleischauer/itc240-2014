<?php
	include("passwords.php");
	
	$sortValue = "";
	$themeValue = "";
	$viewValue = "";
	
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
	
?>

<!doctype html>
<html>
	<head>
    	<title>A7: Books</title>
    	<link rel="stylesheet" href="style.css" type="text/css">
    </head>
	<body class="<?= $themeValue ?>-theme">
    <div class="theme-container">
    
    <div id="buttons">
        <a href="?viewKey=cover">Cover View</a> |
        <a href="?viewKey=listing">Listing View</a> |

		<a href="?themeKey=light">Light Theme</a> |
        <a href="?themeKey=dark">Dark Theme</a>
    </div>	
    
<?php		

	// use white list to allow / control column names (safe list)
	$sortingWhiteList = array (
		"author" => true,
		"title" => true,
		"light" => true,
		"dark" => true,
		"cover" => true,
		"listing" => true
	);
	
	
	// if the value to the $sortBy key is not in $sortingWhiteList 
	// assign  a default value
	
	if (!isset($sortingWhiteList[$sortValue])) {
		$sortValue = "title";
	}
	
	if (!isset($sortingWhiteList[$themeValue])) {
		$themeValue = "light";
	}
	
	if (!isset($sortingWhiteList[$viewValue])) {
		$viewValue = "cover";	
	}
	
	$sortQuery = $mysqlConnection->prepare("SELECT * FROM books ORDER BY $sortValue ASC");
	$sortQuery->execute();
	$sorted = $sortQuery->get_result();	
	
	?>

    <table>
        <tr>
            <th>Cover</th>
            <th><a href="?sortKey=title">Title</a></th>
            <th><a href="?sortKey=author">Author</a></th>
            <?php if ($viewValue == "cover")  { ?>
            	<th>Description</th>
            <?php } ?>
            <th>Check Out</th>
        </tr>
     
     
    <?php
        foreach($sorted as $row) {
    ?>
        
        <tr> <!-- htmlentities is needed to protect us against content that is benign to the database
        	 but dangerous to the browser, like cross-site scripting attacks. -->
            <td><img src="<?= htmlentities($row["cover_art"]) ?>" /></td>
            <td><?= htmlentities($row["title"]) ?></td>
            <td><?= htmlentities($row["author"]) ?></td>
            <!-- cover view is the same as listing but also includes a description -->
            <?php if($viewValue == "cover")  { ?>
            	<td><?= htmlentities($row["description"]) ?></td>
            <?php } ?>
            <td><button>Check Out</button></td>
        </tr>
    
    <?php
        }
        ?>
    </table>   
    </div> <!-- end theme-container -->	
    </body>
</html>