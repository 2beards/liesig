<?php include("../includes/layouts/header.php"); ?>

<link rel="stylesheet" href="http://fonts.typotheque.com/WF-026921-009001.css" type="text/css" />

<link href="css/Untitled-3.css" rel="stylesheet" type="text/css">


<?php include("../includes/layouts/navbar.php"); ?>  


    <section id="home">
    
      <!-- carosel set up begin -->


<div class="carousel-wrapper">

  <span id="target-item-1"></span>

  <span id="target-item-2"></span>

  <span id="target-item-3"></span>
  
    <!-- type-->
    
  <div class="carousel-item item-1">

    <h3> 

    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>


	Affective Synaesthesia</h3>   

    <h7>     
    <p>&nbsp;</p>
MOOD CONTROL 
    </h7> 
    
    <a class="arrow arrow-prev" href="#target-item-3"></a>

    <a class="arrow arrow-next" href="#target-item-2"></a>

  </div>
  
  <!-- type-->
  
  <div class="carousel-item item-2 light">

   
 
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
  
    
     
     <div><img src="images/liesigdiamondo.svg" style="height:400px"> </div>

    <h7>    
    <p>&nbsp;</p>
</h7>

    <a class="arrow arrow-prev" href="#target-item-1"></a>

    <a class="arrow arrow-next" href="#target-item-3"></a>

  </div>
  
  <!-- type-->

  <div class="carousel-item item-3">
  <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>


    
     <div><img src="images/liesigdiamondo.svg" style="height:400px"> </div>
    
    <a class="arrow arrow-prev" href="#target-item-2"></a>

    <a class="arrow arrow-next" href="#target-item-1"></a>
  </div>

</div>




  <!-- carosel set up end -->
  
  

    
    

  <script src="js/fastclick.js"></script>
  <script src="js/scroll.js"></script>
  <!-- <script src="js/fixed-responsive-nav.js"></script> -->
    
             
  




<div class="gridContainer clearfix">
  <div> <p>&nbsp;</p></div>
  <div id="LayoutDiv10">
    <p>&nbsp;</p>
      <h29>  Liesig<span style="color: red">.</span> is Mood control, mood control for creatives. Creatives who need to get into a specific mindset for their projects, their aesthesis, their characters, their audience's emotions. Transference is the aim. This is a tool, a tool to trigger emotions, to trigger sensations. The human condition, the human comedy, the human misery, call it what you will. We adapt, we play, we codify our emotions. As we understand your visceral triggers, we explore, experiment & play. This is liesig & this is mood control_</h29>
    <p>&nbsp;</p>
        <p>&nbsp;</p>

  </div>
  
  
  
  <div id="LayoutDiv11">
  <div id="bigform">
   <form form action="big_vid_play.php" method="get" accept-charset="UTF-8"
enctype="application/x-www-form-urlencoded" autocomplete="off" novalidate>
    <p>&nbsp;</p>

                                <input type="text" placeholder="Motivations..." name="query2" id="query2" onkeyup="autoComplete3();" list="datalist">
                                
                                <input type="submit" value="Submit" id="input2">
                                    <label for="input2"><img src="images/searchsmall.png"></label>
                            
</form>
  </div>   
  </div>
  

<datalist id="datalist">
                                                    </datalist>


  <script>

   function autoComplete3() { 
    var xmlhttp3 = null;
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp3 = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp3 = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp3.onreadystatechange = function() {
            if (xmlhttp3.readyState == 4 && xmlhttp3.status == 200) {
                console.log("result from php:", xmlhttp3.responseText);
                document.getElementById("datalist").innerHTML = xmlhttp3.responseText;
                console.log("sent ajax request");

            }
        };
        xmlhttp3.open("GET","../includes/ajax/autoComplete.php?q="+$("#query2").val(),true);
        xmlhttp3.send();
    }</script>
  
  <div id="LayoutDiv1">
    <p>TOP SEARCHES
</p>
    <p>&nbsp; </p>
    <div id="LayoutDiv2">
      <div title="Page 1">
        <div>
          <div>
            <div id=topMoods1>
              <p><img src="" id="img1" alt=""></p>
                <h66 id="tmh1">Love<h/66>
                <p>Gushing, fawning, twilight, uplifting, unicorn, oucha, heart beat<br><br>by Tom</p>
                  <p>&nbsp;</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="LayoutDiv3">
      <div title="Page 1">
        <div>
          <div>
            <div id=topMoods2>
              <p><img id="img2" src=""></p>
              <h66 id="tmh2">Strong</h66>
            <p>Uplift, pumpy, iron, spirit, soul, power, rise, alert, vigelliant, sure<br><br> by Tom</p>
              <p>&nbsp;</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="LayoutDiv4">
      <div title="Page 1">
        <div>
          <div>
            <div id=topMoods3>
              <p><img id="img3" src=""></p>
              <h66 id="tmh3">Sensual</h66>
                <p> Wanting, yearning, lust, seduction, sex, trouser snake, pom pom, <br><br> by Tom</p>
                <p>&nbsp;</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div id="LayoutDiv5">
      <p><img id="img4" src="" alt=""></p>
      <h66 id="tmh4"> Confused  </h66>
<p> Perplexed, stupified, lost, java, unsure, wtf. Mysql <br><br><br> by Tom</p>  <p>&nbsp;</p>

    </div>
    <div id="LayoutDiv6">
      <p><img id="img5" src="" alt=""></p>
      
      <h66 id="tmh5">Angry</h66>

      <p>Fight, arragant, ignorant, obnoxious, tattie  head, corteson, football chant <br> by Tom </p>  <p>&nbsp;</p>
    </div>
    
    <div id="LayoutDiv7">
    
             <p><img id="img6" src="" alt=""></p>
      
              <h66 id="tmh6">Indifferent </h66>
      
              <p>So, insensitive, dull, meh, nonchalance, but it's just fonts <br><br> by Tom</p>  <p>&nbsp;</p>
      
    </div>
    <div id="LayoutDiv8">
      <p><img id="img7" src="" alt=""></p>
      <h66 id="tmh7">Happy</h66>
      <p> Alergic to youth, teen, pop, blonde, airhead, cartoon <br><br>  by Tom </p>
    </div>
    
    
    <div id="LayoutDiv9">
      <p><img id="img8" src="" alt=""></p>
      <h66 id="tmh8" class="tm">Hurt</h66>
      <p>Meloncholic, Drawn, Board, Toil, Woe, Pensive <br><br> by Tom </p> </p>
    </div>
    
    <?php  require_once("../includes/db_connection.php"); ?>
    
    <?php 
      // Okay in this bit we are gonna make the top searches thing dynamic. Basically, using PHP, i'm gonna get the top 8 most rated tags in the database, then i'm gonna return an array with these moods and paths to pictures with that mood (based on category). This will be JSON encoded and used by javascript to dynamically change these values in the HTML.

      // query, get the top 8 highest rated 
    $sqlquery  = "SELECT * FROM moods INNER JOIN map ON moods.tagid = map.tagid ORDER BY rating DESC LIMIT 8";

      //check if worked
    if(!$dbresult = $db->query($sqlquery)){
    echo 'Unable to find right thing [' . $db->error . ']';
}
    //Use returned data (if any)

 $dbArray = array();
    while($row = $dbresult->fetch_assoc()){
        $dbArray[] = $row;
        }

        //add the tmh thing since i can't figure out how to do it in javascript

         for ($i = 1; $i<9; $i++)
        $dbArray[($i-1)]["tmh"] = "tmh{$i}";

      // need to do the same for img

      for ($i = 1; $i<9; $i++)
        $dbArray[($i-1)]["img"] = "img{$i}";

   // print_r($dbArray);

    // now make an array with the top moods and the path to the right picture in javascript. 


    ?>

<script src="scripts/functions.js"></script>


        <script>
          
        var topMoods  = shuffleArray(<?php echo JSON_encode($dbArray);?>);
var test2 = topMoods[1].img
var test = "img1";        
        for (var i = 0; i < topMoods.length ; i++) {
          document.getElementById(topMoods[i].tmh).innerHTML = "<a href=\"big_vid_play.php?query=" + topMoods[i].mood + "\">" + topMoods[i].mood + "</a></p>"



          topMoods[i].mood
          console.log(topMoods[i].mood);
          console.log(topMoods[i].img);
          var imgstring = topMoods[i].img.toString();
          console.log("imgstring "+ imgstring);
          document.getElementById(imgstring).src = "images/" + topMoods[i].category + ".jpg";

        }

        </script>
    
    
    <div id="LayoutDiv14">
      <h78>LOAD MORE</h78>
    </div>
    <div id="LayoutDiv15"></div>
  </div>
</div>




    
    
<?php include("../includes/layouts/grayfooter.php"); ?>