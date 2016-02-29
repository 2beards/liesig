<?php include("../includes/layouts/header.php"); ?>
<link href="css/sensation2.css" rel="stylesheet" type="text/css">
<?php include("../includes/layouts/navbar.php"); ?>
    <section id="home">











<script src="respond.min.js"></script>
<div class="gridContainer clearfix">
  <div id="LayoutDiv1">
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <div id="placeholder"><h456>Pleasant Feelings</h456></div>
    
<?php require_once("../includes/db_connection.php") ?>

<?php require_once("../includes/functions.php") ?>

<?php // this page returns a list of all the tags we have in our database ?>



<?php

    $sqlquery  = "SELECT * FROM moods";
    

    $dbresult = mysqli_query($connection, $sqlquery);
    // test if query succeeded./ if there was a query error
    if (!$dbresult){
        die("Database query failed.");
    }


//3. Use returned data (if any)
    // get the first row from that result set and asign it to row, store all of those rows in an array of arrays called $dbArray, which can be used to compare to the original one
    $dbArray = array();
    while($row = mysqli_fetch_assoc($dbresult)){
        $dbArray[] = $row;
        }



// want to make another array where the categories are the headings, and the moods are organized by bullet points underneath them. so essentially we want it to behave like a series of ordered lists. we can output that in the form of echoing html. so what we need to do is go through the array of all the tunes and group them that way. 

$tmp = array();

foreach($dbArray as $arg)
{
    $tmp[$arg['category']][] = $arg['mood'];
}

$output = array();
//print_r($tmp);

foreach($tmp as $category => $mood)
{
    $output[] = array(
        'category' => $category,
        'mood' => $mood
    );
}


$number = 1;
    $class = 1;

foreach ($output as $value){
    
    echo "<div id=\"Number{$number}\" class=\"classCol{$class}\"><p>&nbsp;</p><p>&nbsp;</p><h102><a href=\"big_vid_play.php?query={$value['category']}\"> {$value['category']} </a></h102><p>&nbsp;</p>";
    // I DONT KNOW WHY THIS ISNT MAKING THE VALUES OF THE ARRAY UNIQUE but i need to figure out how to do it. 

    foreach($value['mood'] as $mood){
     echo   "<p><a href=\"big_vid_play.php?query={$mood}\"> {$mood} </a></p>";
    }
    echo "</div>";
    $number++;
    //echo "class is" . $class . " number is " . ($number -1) % 4 . " ";
    if (($number -1) % 4 == 0){
        $class++;
    }
   if ($number == 9){
        echo "<div id=\"Number9\"><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><h456>Difficult/Unpleasant Feelings</script></h456></div>";
      $number++;
  }
    if ($number > 17){
        break;

    }
}


?>



    <p>&nbsp;</p>
  </div>
</div>



 <script src="js/fastclick.js"></script>
  <script src="js/scroll.js"></script>
  <script src="js/fixed-responsive-nav.js"></script>
    
<?php include("../includes/layouts/footer.php"); ?> 