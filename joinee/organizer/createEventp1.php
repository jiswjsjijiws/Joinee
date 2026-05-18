<?php
    include("../config.php");
    include("topBar.php");
    if(isset($_POST['next'])){
        $category=urlencode($_POST['category']);
        $title=urlencode(mysqli_real_escape_string($conn,$_POST['eventTitle']));
        $description=urlencode(mysqli_real_escape_string($conn,$_POST['description']));
        header("Location: /organizer/createEventp2.php?category=$category&title=$title&description=$description");
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
                <p class="categoryLabel" for="category">Select category</p>
                <select class="category" name="category">
                    <option value='Waste and Recycling'>Waste and Recycling</option>
                    <option value='Food and Entertainment'>Food and Entertainment</option>
                    <option value='Education'>Education</option>
                    <option value='Green Businesses'>Green Businesses</option>
                    <option value='Community and Nature'>Community and Nature</option>
                    <option value='Other'>Other</option>
                </select>
                <label for="eventTitle">Enter title</label><br>
                <input name="eventTitle" class="eventTitle" type="text">
                <label for="description">Enter description</label><br>
                <textarea name="description" class="description"></textarea><br>
                <button name="next" class="next">next</button>
        </form>
        <div class="errorspace"></div>
    </div>
   
    
</body>
<script src="../javascript/createEvent.js"></script>
</html>