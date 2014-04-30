<?php

$albums = [
		[ "artist" => "The Afghan Wigs", "album" => "Do the Beast", "year" => "2014" ], 
		[ "artist" => "Broken Bells", "album" => "After the Disco", "year" => "2014" ], 
		[ "artist" => "St. Vincent", "album" => "St. Vincent (self-titled)", "year" => "2014" ],
		[ "artist" => "Band of Skulls", "album" => "Himalayan", "year" => "2014" ],
		[ "artist" => "War On Drugs", "album" => "Lost in the Dream", "year" => "2014" ],
		[ "artist" => "Future Islands", "album" => "Singles", "year" => "2014" ],
		[ "artist" => "Jack White", "album" => "Lazaretto", "year" => "2014" ],
		[ "artist" => "Black Keys", "album" => "Turn Blue", "year" => "2014" ],
		[ "artist" => "Augustines", "album" => "Augustines (self-titled)", "year" => "2014" ],
		[ "artist" => "First Aid Kit", "album" => "Stay Gold", "year" => "2014" ],
		[ "artist" => "Pokey LaFarge", "album" => "Pokey LaFarge (self-titled)", "year" => "2013" ],
		[ "artist" => "Nine Inch Nails", "album" => "Hestitation Marks", "year" => "2013" ],
		[ "artist" => "David Bowie", "album" => "The Next Day", "year" => "2013" ],
		[ "artist" => "Burial", "album" => "Rival Dealer", "year" => "2013" ],
		[ "artist" => "Macklemore", "album" => "The Heist", "year" => "2012" ],
		[ "artist" => "First Aid Kit", "album" => "The Lion's Roar", "year" => "2012" ],
		[ "artist" => "Maroon 5", "album" => "Overexposed", "year" => "2012" ],
		[ "artist" => "Lumineers", "album" => "The Lumineers", "year" => "2012" ],
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
