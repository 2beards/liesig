<!DOCTYPE html>
<html>
<head>

</head>
<body>

<?php  require_once("../db_connection.php"); ?>

<?php


$q = strtolower($_GET['q']);





// we will create an array of the moods that contain the characters typed into the search bar. 

// 2. Perform Database query
    $sqlquery  = "SELECT mood from moods where mood like '%".$q."'";
    
 


//check if worked
    if(!$dbResult = $db->query($sqlquery)){
    echo 'Unable to find right thing [' . $db->error . ']';
} 
    

//3. Use returned data (if any)

     $dbArray = array();
    while($row = $dbResult->fetch_assoc()){
        $dbArray[] = $row;
        }
   
// echo the value of these moods
    foreach ($dbArray as $value) {
        echo "<option value=\"" . $value['mood'] ."\"></option>";
    }
    
  



//close the sql connection
$db->close();


?>

</body>
</html>