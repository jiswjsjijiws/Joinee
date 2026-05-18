<?php
    include("../config.php");
    include("topBar.php");
    if(isset($_POST['next'])){
        $capacity=$_POST['capacity'];
        $location=$_POST['location'];
        $time=$_POST['time'];
        $date=$_POST['date'];
        $points=$_POST['points'];
        $category=$_GET['category'];
        $title=$_GET['title'];
        $description=$_GET['description'];

        header("Location: /organizer/createEventp3.php?category=".urlencode($category)."&title=".urlencode($title)."&description=".urlencode($description)."&capacity=$capacity&location=$location&time=$time&date=$date&points=$points");
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
    <div>
        <form method="post">
            <div class="eventContent">
                <label for="capacity">Enter capacity</label>
                <input type="number" name="capacity" class="capacity">
                <label for="location">Enter location</label>
                <input name="location" class="location" type="text">
                <label for="time">Select time</label>
                <input type="time" name="time" class="time" id="">
                <label for="date">Select date</label>
                <input type="date" name="date" class="date">
                <label for="points">Enter points</label>
                <input type="number" name="points" class="points">
                <button name="next" class="next">next</button>
        </form>
        <div class="errorspace"></div>
    </div>
   
    
</body>
<script src="../javascript/createEvent.js"></script>
</html>