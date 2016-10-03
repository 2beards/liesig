function shuffleArray(array) {
    for (var i = array.length - 1; i > 0; i--) {
        var j = Math.floor(Math.random() * (i + 1));
        var temp = array[i];
        array[i] = array[j];
        array[j] = temp;
    }
    return array;
}


        // okay he're we're gonna try to do the ajax stuff. this is the function to get return 5 tags based on the current song that is playing


function getTags(str) { 
    var xmlhttp = null;
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("tags").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","../includes/ajax/getTags.php?q="+str,true);
        xmlhttp.send();
    }



        // here we are going to submit the rating when the user clicks on the tag

function submitRating(str) { 
     var xmlhttp1 = null;
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp1 = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp1 = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp1.onreadystatechange = function() {
            if (xmlhttp1.readyState == 4 && xmlhttp1.status == 200) {
                document.getElementById("success").innerHTML = xmlhttp1.responseText;
                console.log("success");
            }
        };
        xmlhttp1.open("GET","../includes/ajax/submitRating.php?q="+str,true);
        xmlhttp1.send();
    }


        // here we are going to submit the rating when the user clicks on the tag

function addTag() { 
    var xmlhttp2 = null;
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp2 = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp2 = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp2.onreadystatechange = function() {
            if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
                document.getElementById("tagAdded").innerHTML = xmlhttp2.responseText;
                console.log("tag added");
            }
        };
        xmlhttp2.open("GET","../includes/ajax/addTag.php?tag="+$("#addTag").val()+"&songid="+trackID,true);
        xmlhttp2.send();
    }

    // this creates the on click event that triggers the function addTag()

document.getElementById("tagbutton").addEventListener("click",function() {addTag()});

// function that makes the ajax call and inputs the data into the datalist html element


function autoComplete() { 
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
        xmlhttp3.open("GET","../includes/ajax/autoComplete.php?q="+$("#addTag").val(),true);
        xmlhttp3.send();
    }