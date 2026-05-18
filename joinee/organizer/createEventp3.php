<?php
    include("../config.php");
    include("topBar.php");
    if(isset($_POST['next'])){
        $capacity=$_GET['capacity'];
        $location=mysqli_real_escape_string($conn,$_GET['location']);
        $time=$_GET['time'];
        $date=$_GET['date'];
        $category=$_GET['category'];
        $title=mysqli_real_escape_string($conn,$_GET['title']);
        $description=mysqli_real_escape_string($conn,$_GET['description']);
        $points=$_GET['points'];
        if(empty($_POST['checklist'])){
            $checkboxes='';
        }
        else{
            $checkboxes=$_POST['checklist'];
            $checklist=urlencode(implode(", ",$checkboxes));
        }

        header("Location: /organizer/createThumbnails.php?category=".urlencode($category)."&title=".urlencode($title)."&description=".urlencode($description)."&capacity=$capacity&location=$location&time=$time&date=$date&points=$points&checklist=$checklist");
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
    <div class="checklist">
        <form method="post">
            <h2 class="checklistTitle">Sustainability Checklist</h2>
            <div class="info">
                <p class="infoTitle">What is this? <i class="fa-solid fa-circle-info"></i></p>
                <p class="infoContent">This is a checkilist of to help you plan out your event and make it sustainable. If applicable, all boxes should be checked. This will also help determine whether your event will be approved</p>
            </div>
            <div class="checkboxes">
                <label for=""><p>There will be recycling bins placed at the event venue</p><input type="checkbox" name="checklist[]" value="There will be recycling bins placed at the event venue"></label>
                <label for=""><p>Plastics will be replaced with reusable or biodegradable materials(If used)</p><input type="checkbox" name="checklist[]" value="Plastics will be replaced with reusable or biodegradable materials" id=""></label>
                <label for=""><p>Waste or food leftover will be composted(If provided)</p><input type="checkbox" name="checklist[]" value="Waste or food leftover will be composted"></label>
                <label for=""><p>Electronics used during the event will be turned off when not in use</p><input type="checkbox" name="checklist[]" value="Electronics used during the event will be turned off when not in use"></label>
                <label for=""><p>Equipment used at the event is energy efficient</p><input type="checkbox" name="checklist[]" value="Equipment used at the event is energy efficient"></label>
                <label for=""><p>This event is a sustainable event</p><input type="checkbox" name="checklist[]" value="This event is a sustainable event"></label>
            </div>
            <input class="next" name="next" type="submit" value="next">
        </form>
    </div>
   
    
</body>
<script src="../javascript/createEvent.js"></script>
</html>