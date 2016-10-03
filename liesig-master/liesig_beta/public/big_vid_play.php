<?php include("../includes/layouts/header.php"); ?>


<link href="css/BigPlay.css" rel="stylesheet" type="text/css">


<?php include("../includes/layouts/navbar.php"); ?>  
    

	

    <section id="home">























<script src="respond.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<div class="wrapper">
    <canvas class="visualizer" width="1024" height="768"></canvas>
  </div>

 <script src="js/fastclick.js"></script>
  <script src="js/scroll.js"></script>
  <script src="js/fixed-responsive-nav.js"></script>



 <!--  <audio controls id="player" src="Beautiful.mp3"></audio> -->

  <?php  require_once("../includes/db_connection.php"); ?>


<div id="cwrap">
    <div id="nowPlay">
        <h3 id="npAction">Paused:</h3>
        <div id="npTitle"></div>
    </div>
    <div id="audiowrap">
        <div id="audio0">
            <audio id="audio1" controls="controls" width="300" class="audio">
                Your browser does not support the HTML5 Audio Tag.
            </audio>
        </div>
        <div id="extraControls">
            <button id="btnPrev" class="ctrlbtn">|&lt;&lt; Prev Track</button> <button id="btnNext" class="ctrlbtn">Next Track &gt;&gt;|</button>
        </div>
    </div>

<div id="tagform">


Click on a tag that most adequately fits the mood of the song:
<div id="tags"> </div>
<div id="success"></div>
<div id="tagAdded"> </div>
</div>


How does this song make you feel? <input type="text" onkeypress="if (event.keyCode==13){ addTag();}" name="addTag" id="addTag" list="datalist" placeholder="I feel..." onkeyup="autoComplete();" >
<button type="button" id="tagbutton">Submit Tag</button>

<datalist id="datalist">
</datalist>



<script src="scripts/functions.js" ></script>

<?php require_once("../includes/functions.php"); ?>


<?php


// // Instantiate database connection
// $db = new mysqli('playground.eca.ed.ac.uk', 's1131656', 'P1M7PNJ0g1', 's1131656');

// // Check that the connection worked
// if($db->connect_errno > 0){
//     error('Unable to connect to database [' . $db->connect_error . ']');
// }


// sets $searchquery to the get request value or empty if not set

    if (isset($_GET["query"])) {
        $searchquery = test_input($_GET["query"]);
    }
    else {
        $searchquery = "";
    } 


// this first takes the junction table and joins it with the moods table. then it takes the songs table and joins it to the other two joined tables where the searchquery matches the user's input. 

    // 2. Perform Database query
    $sqlquery  = "SELECT * FROM moods";
    $sqlquery .= " INNER JOIN map";
    $sqlquery .= " ON moods.tagid = map.tagid";
    $sqlquery .= " INNER JOIN songs";
    $sqlquery .= " ON songs.songid = map.songid";
    $sqlquery .= " WHERE mood = '{$searchquery}'";
   // if(isset($_POST["songid"])){
   //      $sqlquery .= "AND songs.songid = ".$_POST["songid"];
   //  } else {
   //  if(isset($_POST["ratingid"])){
   //      $sqlquery .= "AND songs.songid = ".$_POST["ratingid"];
   //  }}


    // SELECT * FROM moods INNER JOIN map ON moods.tagid = map.tagid INNER JOIN songs ON songs.songid = map.songid WHERE moods = '{$searchquery}'


$dbresult = $db->query($sqlquery);
//check if worked
    if(!$db->query($sqlquery)){
    error('Unable to find right thing [' . $db->error . ']');
}
    

//3. Use returned data (if any)
    // get the first row from that result set and asign it to row, store all of those rows in an array of arrays called $dbarray, which can be used to compare to the original one

    $dbArray = array();
    while($row = $dbresult->fetch_assoc()){
        $dbArray[] = $row;
        }
    

    //$dbArray = $dbresult->fetch_all(MYSQLI_ASSOC);
   

//print_r($dbArray);
//print_r($_GET);


?>



        <script type="text/javascript">
          

           test =[<?php echo JSON_encode($dbArray);?>];
           console.log(test);

var trackName;
var trackID;


var trackLength = 0;


  // based on code by jon hall http://jonhall.info/how_to/create_a_playlist_for_html5_audio
            jQuery(function($) {
                var supportsAudio = !!document.createElement('audio').canPlayType;
                 if(supportsAudio) {
                    var index = 0,
                    playing = false;
                    // make sure to delete this thing here
                    mediaPath = '',
                    extension = '',
                    tracks = shuffleArray(<?php echo JSON_encode($dbArray);?>),
                    trackCount = tracks.length,
                    npAction = $('#npAction'),
                    npTitle = $('#npTitle'),
                    audio = $('#audio1').bind('play', function() {
                        playing = true;
                        npAction.text('Now Playing:');
                    }).bind('pause', function() {
                        playing = false;
                        npAction.text('Paused:');
                    }).bind('ended', function() {
                        npAction.text('Paused:');
                        if((index + 1) < trackCount) {
                            index++;
                            loadTrack(index);
                            audio.play();
                        } else {
                            audio.pause();
                            index = 0;
                            loadTrack(index);
                        }
                    }).get(0),  
                    btnPrev = $('#btnPrev').click(function() {
                        if((index - 1) > -1) {
                            index--;
                            loadTrack(index);
                            if(playing) {
                                audio.play();
                            }
                        } else {
                            audio.pause();
                            index = 0;
                            loadTrack(index);
                        }
                    }),
                    btnNext = $('#btnNext').click(function() {
                        if((index + 1) < trackCount) {
                            index++;
                            loadTrack(index);
                            if(playing) {
                                audio.play();
                            }
                        } else {
                            audio.pause();
                            index = 0;
                            loadTrack(index);
                        }
                    }),
                         li = $('#plUL li').click(function() {
                        var id = parseInt($(this).index());
                        if(id !== index) {
                            playTrack(id);
                        }
                    }),
                    loadTrack = function(id) {
                        $('.plSel').removeClass('plSel');
                        $('#plUL li:eq(' + id + ')').addClass('plSel');
                        npTitle.text(tracks[id].name);

                        trackName=tracks[id].name;
                        trackID=tracks[id].songid;
                        index = id;
                        audio.src = mediaPath + tracks[id].path + extension;
                        getTags(trackName);
                        console.log(trackID);
                        document.getElementById("audio1").onloadedmetadata = function() {
                            trackLength = document.getElementById("audio1").duration; 
                    
                        };


                    },
                    playTrack = function(id) {
                        loadTrack(id);
                        audio.play();
                    };
                    if(audio.canPlayType('audio/ogg')) {
                        extension = '.ogg';
                    }
                    if(audio.canPlayType('audio/mpeg')) {
                        extension = '.mp3';
                    }
                    loadTrack(index);

                }
                });
             




// fade in and out based on http://stackoverflow.com/questions/29213216/fading-in-fading-out-audio-towards-the-beginning-and-end-of-a-song

$(function() {
    $(".audio").prop("volume", 0.0);
    $(".audio").on("timeupdate", function() {
        console.log(this.currentTime);
      if (this.currentTime < 2) {
        $(this).stop().animate({volume: 1.0}, 1000);
      } else if (trackLength - this.currentTime < 10) {
        $(this).stop().animate({volume: 0.0}, 1000);
      }
    });
});


        </script>


   <script src="scripts/appx.js"></script>

    
    
    <?php include("../includes/layouts/footer.php"); ?>  
