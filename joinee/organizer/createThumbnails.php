<?php
    include("../config.php");
    include("topBar.php");
    if(isset($_POST['submit'])){
        $capacity=$_GET['capacity'];
        $location=mysqli_real_escape_string($conn,$_GET['location']);
        $time=$_GET['time'];
        $date=$_GET['date'];
        $category=$_GET['category'];
        $title=mysqli_real_escape_string($conn,$_GET['title']);
        $description=mysqli_real_escape_string($conn,$_GET['description']);
        $points=$_GET['points'];
        $checklist=$_GET['checklist'];
        $filecount=count($_FILES['thumbnails']['name']);
        $createEvent="INSERT INTO events(userID,title,description,category,capacity,location,time,date,points,checklist,status) VALUES($userID,'$title','$description','$category',$capacity,'$location','$time','$date',$points,'$checklist','pending')";
        mysqli_query($conn,$createEvent);
        $eventID=mysqli_insert_id($conn);

        for($i=0;$i<$filecount;$i++){
            $filename=$_FILES['thumbnails']['name'][$i];
            $tempname=$_FILES['thumbnails']['tmp_name'][$i];
            $folder='../thumbnails/'.$filename;
            if(move_uploaded_file($tempname,$folder)){
                $insert_thumbnails="INSERT INTO thumbnails(eventID,thumbnail) VALUES('$eventID','$filename')";
                mysqli_query($conn,$insert_thumbnails);
            }
        }
        header("Location: /organizer/home.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/createEvent.css">
    <title>Home</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
        <div class="eventContent">
            <input id="thumbnails" type="file" name="thumbnails[]" class="thumbnails" accept="image/*" multiple hidden>
            
            <label for="thumbnails" class="upload">
                <i class="fa-solid fa-download"></i>
                <h3>Upload Your Thumbnails</h3>
            </label>
            <h3>Uploaded Thumbnails:</h3>
            <div class="preview"></div>
            <input class="submit" name="submit" type="submit" value="submit">
            <div class="errorspace"></div>
        </div>

    </form>
   
    
</body>
<script src="../javascript/createThumbnails.js"></script>
</html>