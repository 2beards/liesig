<?php 
//functions

function confirm_query($result_set) {
	if (!$result_set) {
		die("Database query failed.");
	}
}

// plays a random track from the $results array of the search function. This is for the version where we just randomly play a track based on the query. See below for some code that simply shuffles the contents of the array, in order to be used in the playlist version
// DONE!: need to add the functionality that it plays a random track of any mood if the search query is not in our database.

function play_song($array){
	global $searchquery;
	global $song_returned_id, $number_of_moods;
	if ($array != NULL) {
	$randomnumber = rand(0, count($array)-1);
	//echo $randomnumber;
	//echo count($array);
	foreach ($array as $key => & $sub_array) {
		if ($key == $randomnumber) {
			echo "you are listening to {$sub_array["name"]} by {$sub_array["artist"]} tagged " . $GLOBALS['searchquery'] ."<br />";
			echo "<audio controls id=\"player\" src=" . $sub_array["path"] .">
			Your browser does not support the audio element.
			</audio>";  
			$song_returned_id = $sub_array["songid"];
			//echo "song".$song_returned_id;
		}
	}
		echo "tags: ";
		// echo the tags for the song
	foreach ($array as $key => & $sub_array) {
		if ($sub_array['songid'] == $song_returned_id) {
			echo $sub_array['mood'] . " ";
		}

	}
	} else { 
		if ($searchquery != "random"){
			echo "Sorry we don't have " . $searchquery . " in our database. ";
			echo "To see all the tagged moods, please check out <a href=\"sensation2.php\"> All the moods </a><br />";
		}
		// free mysqli result
		mysqli_free_result($GLOBALS['dbresult']);
		// make a new query to get all the songs in the database, and then to play a random one from that selection
		$sqlquery  = "SELECT * FROM moods";
		$sqlquery .= " INNER JOIN map";
    	$sqlquery .= " ON moods.tagid = map.tagid";
    	$sqlquery .= " INNER JOIN songs";
    	$sqlquery .= " ON songs.songid = map.songid";

		$dbresult = mysqli_query($GLOBALS['connection'], $sqlquery);
	// test if query succeeded./ if there was a query error
	if (!$dbresult){
		die("Database query failed.");
	}

		// get the first row from that result set and asign it to row, store all of those rows in an array of arrays called $dbarray, which can be used to compare to the original one
	$db_rand_song = array();
	while($row = mysqli_fetch_assoc($dbresult)){
  		$db_rand_song[] = $row;
		}

		// play a random song from the database
		if ($db_rand_song != NULL) {
	$randomnumber = rand(0, count($db_rand_song)-1);
	//echo $randomnumber;
	//echo count($array);
	//print_r($db_rand_song);
	foreach ($db_rand_song as $key => & $sub_array) {
		if ($key == $randomnumber) {

			echo "Now playing a random mood from our database: {$sub_array['name']} by {$sub_array['artist']}  <audio controls id=\"player\"  src=" . $sub_array["path"] .">
			Your browser does not support the audio element.
			</audio>";
			$song_returned_id = $sub_array["songid"];
	}}}}
	//mysqli_free_result($dbresult);
}



?>