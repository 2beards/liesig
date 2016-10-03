<!DOCTYPE html>
<html>
<head>

</head>
<body>

  <?php  require_once("../db_connection.php"); ?>

<?php
$q = $_GET['q'];



// 2. Perform Database query
        $sqlquery = "UPDATE map SET rating = rating + 1 WHERE mapid = {$q};";
        



//check if worked
    if(!$db->query($sqlquery)){
    echo "Unable to find right thing [" . $db->error . "]";
} else {
    $last_id = $db->insert_id;
    echo "thanks for voting! you chose " . $last_id;
}
    



// close the sql connection
$db->close();
?>
</body>
</html>