<!DOCTYPE html>
<html>
<head>

</head>
<body>

 <?php  require_once("../db_connection.php"); ?>

<?php


$tag = strtolower($_GET['tag']);
$songid = $_GET['songid'];





// first we need to create the new tag, unless it has already been created

 $sqlquery  = "INSERT IGNORE INTO moods (mood) ";
 $sqlquery .= "VALUES ('{$tag}') ";


$last_id = 0;

//check if worked and get the last insert id
    if(!$db->query($sqlquery)){
    echo "error [" . $db->error . "]";
    } elseif ($db->insert_id == 0){
        echo "this mood already exists in the database.";
        // now write the sql query to add 1 to that mapping in the database

        $sqlquery  = "UPDATE moods";
        $sqlquery .= " INNER JOIN map";
        $sqlquery .= " ON moods.tagid = map.tagid";
        $sqlquery .= " INNER JOIN songs";
        $sqlquery .= " ON songs.songid = map.songid";
        $sqlquery .= " SET rating = rating + 1 WHERE songs.songid = \"{$songid}\" AND moods.mood = \"{$tag}\";";
        if(!$db->query($sqlquery)){
        echo "error [" . $db->error . "]";
            } else {
        echo "updated rating. added 1 for " . $tag;
            }
    } else {
    $last_id = $db->insert_id;
    echo "New record created successfully. Last inserted ID is: " . $last_id;

    // now need to add the tag to song mapping. this is the sql query

    $sqlquery  = " INSERT INTO map (songid, tagid)";
    $sqlquery .= " VALUES ('{$songid}', '{$last_id}');";


//check if worked. if not tell the user the song is already tagged to the mood
    if(!$db->query($sqlquery)){
    echo "Error: " . $sqlquery . "<br>" . "this song is already tagged with this mood";
    

    }

}
    


//close the sql connection
$db->close();


?>
</body>
</html>