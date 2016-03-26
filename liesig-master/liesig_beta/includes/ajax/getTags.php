<!DOCTYPE html>
<html>
<head>

</head>
<body>

 <?php  require_once("../db_connection.php"); ?>


<?php
$q = $_GET['q'];


// 2. Perform Database query
    $sqlquery  = "SELECT * FROM moods";
    $sqlquery .= " INNER JOIN map";
    $sqlquery .= " ON moods.tagid = map.tagid";
    $sqlquery .= " INNER JOIN songs";
    $sqlquery .= " ON songs.songid = map.songid";
    $sqlquery .= " WHERE songs.name = '{$q}'";


    
//check if worked
    if(!$dbresult= $db->query($sqlquery)){
    echo 'Unable to find right thing [' . $db->error . ']';
}
    

//3. Use returned data (if any)

 $dbArray = array();
    while($row = $dbresult->fetch_assoc()){
        $dbArray[] = $row;
        }


   // PRINT_R($dbArray); 



// create a new array of only the tag names AND THEIR ASSOCIATED ID FOR THAT SONG

// $moodArray = array();
//     foreach ($dbArray as $key => $sub_array) {
       
//     $moodArray[] = $sub_array['mood'];
// }
   




  // shuffle the data

shuffle($dbArray);

//print_r($dbArray);

//choose 5 from the array
for ($i = 1; $i <= 5; $i++){
  echo  "<label onmouseup=\"submitRating(". $dbArray[$i]["mapid"] . ");\" id=\"mood" . $i . "\" >" . $dbArray[$i]["mood"] . " </label>";
}


// close the sql connection
$db->close();
?>
</body>
</html>