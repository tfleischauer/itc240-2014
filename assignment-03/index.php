<?php

$albums = [
		[ "artist" => "The Afghan Wigs", "title" => "Do the Beast", "year" => "2014" ], 
		[ "artist" => "Broken Bells", "title" => "After the Disco", "year" => "2014" ], 
		[ "artist" => "St. Vincent", "title" => "St. Vincent (self-titled)", "year" => "2014" ],
		[ "artist" => "Band of Skulls", "title" => "Himalayan", "year" => "2014" ],
		[ "artist" => "War On Drugs", "title" => "Lost in the Dream", "year" => "2014" ],
		[ "artist" => "Future Islands", "title" => "Singles", "year" => "2014" ],
		[ "artist" => "Jack White", "title" => "Lazaretto", "year" => "2014" ],
		[ "artist" => "Black Keys", "title" => "Turn Blue", "year" => "2014" ],
		[ "artist" => "Augustines", "title" => "Augustines (self-titled)", "year" => "2014" ],
		[ "artist" => "First Aid Kit", "title" => "Stay Gold", "year" => "2014" ],
		[ "artist" => "Pokey LaFarge", "title" => "Pokey LaFarge (self-titled)", "year" => "2013" ],
		[ "artist" => "Nine Inch Nails", "title" => "Hestitation Marks", "year" => "2013" ],
		[ "artist" => "David Bowie", "title" => "The Next Day", "year" => "2013" ],
		[ "artist" => "Burial", "title" => "Rival Dealer", "year" => "2013" ],
		[ "artist" => "Macklemore", "title" => "The Heist", "year" => "2012" ],
		[ "artist" => "First Aid Kit", "title" => "The Lion's Roar", "year" => "2012" ],
		[ "artist" => "Maroon 5", "title" => "Overexposed", "year" => "2012" ],
		[ "artist" => "Lumineers", "title" => "The Lumineers", "year" => "2012" ],
];

// initialize $show with a string
$show = "default_value";
// if show has any value
if (isset($_REQUEST["show"])) {
	// request the value of show from the server, 
	// this value will be generated in page.php,
	// then put that returned value in the request variable.
	$show = $_REQUEST["show"];
}

include("page.php");
