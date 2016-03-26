</head>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

  <body>

    <header> <h77>  
    <a href="index.php"> <img src= "images/Liesig_logo_03.jpg" name="logo" width="117" height="48" id="logo" data-scroll> </a>
   
       <nav class="nav-collapse">
        <ul>
          <li class="menu-item active"><a href="about.php" data-scroll>About</a></li>
          <li class="menu-item"><a href="Dataism.php" data-scroll>Dataism</a></li>
          <li class="menu-item"><a href="sensation2.php" data-scroll>Sensations</a></li>
          <li class="menu-item"><a href="upload.php" data-scroll>Submit</a></li>
          <li class="menu-item"><a href="PlaceHolder.php" data-scroll>FAQ</a></li>
          <li class="menu-item"><a href="big_vid_play.php?query=random" data-scroll>Flight of Fancy</a></li>
</h77>

<div id= "forms">
<form form action="big_vid_play.php" method="get" accept-charset="UTF-8"
enctype="application/x-www-form-urlencoded" autocomplete="off" novalidate>
    <p>&nbsp;</p>

                                <input type="text" placeholder="Motivations..." name="query" id="query"  onkeyup="autoComplete2();" list="datalist" required>
                                 <datalist id="datalist">
</datalist>         
                                <input type="submit" value="Submit" id="input2">
                                    <label for="input2"><img src="images/searchsmall.png"></label>
                  
</form>
</div>




        </ul>
      </nav>
  </header>

   <script>

   function autoComplete2() { 
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
        xmlhttp3.open("GET","../includes/ajax/autoComplete.php?q="+$("#query").val(),true);
        xmlhttp3.send();
    }</script>

<!--

<form form action="resultstest3.php" method="get" accept-charset="UTF-8"
enctype="application/x-www-form-urlencoded" autocomplete="off" novalidate>
Search <input type="text" name="query" id="query">
<input type="submit" value="Submit">
</form>

-->