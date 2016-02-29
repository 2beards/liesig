<?php include("../includes/layouts/header.php"); ?>


<link href="css/BigPlay.css" rel="stylesheet" type="text/css">


<?php include("../includes/layouts/navbar.php"); ?>  
    

	

    <section id="home">























<script src="respond.min.js"></script>
<div class="wrapper">
    <canvas class="visualizer" width="1024" height="768"></canvas>
  </div>

 <script src="js/fastclick.js"></script>
  <script src="js/scroll.js"></script>
  <script src="js/fixed-responsive-nav.js"></script>



 <!--  <audio controls id="player" src="Beautiful.mp3"></audio> -->

   <?php require_once("../includes/db_connection.php"); ?>







<?php

// basically we need to figure out how to write a query, where it returns an array of arrays corresponding to all of the rows in the song table, for which the song was tagged with the get_request query. E.g. if the user searches happy, it should be an array of all the songs that are tagged 'happy'.

	if (isset($_GET["query"])) {
		$searchquery = $_GET["query"];
	}
	else {
		$searchquery = "";
	} ?>

<?php require_once("../includes/functions.php"); ?>
<?php

// this first takes the junction table and joins it with the moods table. then it takes the songs table and joins it to the other two joined tables where the searchquery matches the user's input. 

	// 2. Perform Database query
	$sqlquery  = "SELECT * FROM moods";
	$sqlquery .= " INNER JOIN map";
    $sqlquery .= " ON moods.tagid = map.tagid";
    $sqlquery .= " INNER JOIN songs";
    $sqlquery .= " ON songs.songid = map.songid";
    $sqlquery .= " WHERE mood = '{$searchquery}'";
   if(isset($_POST["songid"])){
    	$sqlquery .= "AND songs.songid = ".$_POST["songid"];
    } else {
    if(isset($_POST["ratingid"])){
    	$sqlquery .= "AND songs.songid = ".$_POST["ratingid"];
    }}


    // SELECT * FROM moods INNER JOIN map ON moods.tagid = map.tagid INNER JOIN songs ON songs.songid = map.songid WHERE moods = '{$searchquery}'

	$dbresult = mysqli_query($connection, $sqlquery);
	// test if query succeeded./ if there was a query error
	if (!$dbresult){
		die("Database query failed.");
	}
	

//3. Use returned data (if any)
	// get the first row from that result set and asign it to row, store all of those rows in an array of arrays called $dbarray, which can be used to compare to the original one
	$dbArray = array();
	while($row = mysqli_fetch_assoc($dbresult)){
  		$dbArray[] = $row;
		}

//initialize a variable that will asign to the id of the song that will be selected
$song_returned_id = 0;
//initialize variable that counts how many moods there are
$number_of_moods = 0;

// plays a random track from the $results array of the search function. This is for the version where we just randomly play a track based on the query. See below for some code that simply shuffles the contents of the array, in order to be used in the playlist version
// DONE!: need to add the functionality that it plays a random track of any mood if the search query is not in our database.
play_song($dbArray);

//echo "test: ".$song_returned_id


// allow users to add tags
?>


<form form action="big_vid_play.php?query=<?php echo $searchquery;?>" method="post" accept-charset="UTF-8"
enctype="application/x-www-form-urlencoded" autocomplete="off" novalidate>
Add Tag <input type="text" name="tag" id="tag">
<input type="hidden" name="songid" value="<?php echo $song_returned_id ?>">
<input type="submit" value="Submit" name="submit">
</form>

<?php
// still user tagging stuff

$lastinsertid = 0;


if (isset($_POST["submit"])) {
    	//$sqlquery  = "SELECT * FROM moods";
		//$sqlquery .= " INNER JOIN map";
    	//$sqlquery .= " ON moods.tagid = map.tagid;";
    	$sqlquery = " INSERT INTO moods (mood)";
    	$sqlquery .= " VALUES ('{$_POST["tag"]}');";

		$dbresult = mysqli_query($connection, $sqlquery);

		$lastinsertid = mysqli_insert_id($connection);

		//echo $lastinsertid;
		//echo "song".$song_returned_id;

    	$sqlquery = " INSERT INTO map (songid, tagid)";
    	$sqlquery .= " VALUES ('{$_POST["songid"]}', '{$lastinsertid}');";

    	//$dbresult = mysqli_query($connection, $sqlquery);

    	//$sqlquery .= " INSERT INTO moods (b, e, f)";
    	//$sqlquery .= " VALUES ('{$_POST["tag"]}', '{$song_returned_id}', '20'";
    	//print_r($_POST);
    	//echo $song_returned_id;

    	$dbresult = mysqli_query($connection, $sqlquery);
	// test if query succeeded./ if there was a query error
	if (!$dbresult){
		die("Database query failed.");
	}
	
}



// user tagging system
?>
<form form action="big_vid_play.php?query=<?php echo $searchquery;?>" method="post" accept-charset="UTF-8"
enctype="application/x-www-form-urlencoded" autocomplete="off" novalidate>
Rate the accuracy of this tag: 
  <input type="radio" name="1" value="1" checked> 1
  <input type="radio" name="2" value="2"> 2
  <input type="radio" name="3" value="3"> 3  
  <input type="radio" name="4" value="4"> 4
  <input type="radio" name="5" value="5"> 5
  <input type="submit" value="Submit Rating" name="rating">
  <input type="hidden" name="ratingid" value="<?php echo $song_returned_id ?>">
</form> 

<?php
// the song rating formula 
if (isset($_POST['rating'])){
	//initialize song rating
	$songrating = 0;
	//get the rating
	$songrating = $_POST['rating']; 

}
?>

   <script src="scripts/appx.js"></script>

    
    
    <?php include("../includes/layouts/footer.php"); ?>  
