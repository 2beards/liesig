


<?php include("../includes/layouts/header.php"); ?>

<link href="css/BigPlay.css" rel="stylesheet" type="text/css">

<?php include("../includes/layouts/navbar.php"); ?>  





<form action="uploader.php" method="post" enctype="multipart/form-data">
    Select song to upload:
    <input type="file" name="fileToUpload" id="fileToUpload" required>*<br>
    tag the song with moods (1 or more)<br>
    <input type="text" name="tag1" placeholder="tag1" required>*<br>
    <input type="text" name="tag2" placeholder="tag2"><br>
    <input type="text" name="tag3" placeholder="tag3"><br>
    Artist Name
    <input type="text" name="artist" placeholder="Artist" required>*<br>
    Track Title
    <input type="text" name="title" placeholder="Title" required>*<br>
    <input type="submit" value="Upload Audio" name="submit">
    fields marked with * are required 
</form>


<?php include("../includes/layouts/footer.php"); ?>  
