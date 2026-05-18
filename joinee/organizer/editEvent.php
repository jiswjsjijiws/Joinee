<?php
    include("../config.php");
    include("topBar.php");

    $eventID=$_GET['eventID'];
    $getEvent="SELECT * FROM events WHERE eventID=$eventID";
    $event=mysqli_query($conn,$getEvent);
    $eventData=mysqli_fetch_assoc($event);

    $getThumbnails="SELECT * FROM thumbnails WHERE eventID=$eventID";
    $thumbnails=mysqli_query($conn,$getThumbnails);

    $checked=explode(", ",$eventData['checklist']);

    function showChecked($value,$checked){
        if(in_array($value,$checked)){
            return "checked";
        }
        else{
            return "";
        }
    }

    if(isset($_POST['submit'])){
        $capacity=$_POST['capacity'];
        $location=mysqli_real_escape_string($conn,$_POST['location']);
        $time=$_POST['time'];
        $date=$_POST['date'];
        $category=$_POST['category'];
        $title=mysqli_real_escape_string($conn,$_POST['eventTitle']);
        $description=mysqli_real_escape_string($conn,$_POST['description']);
        $points=$_POST['points'];
        if(empty($_POST['checklist'])){
            $checklist = '';    
        }
        else{
            $checklist = implode(", ", $_POST['checklist']);
        }
        $filecount=count($_FILES['thumbnails']['name']);


        for($i=0;$i<$filecount;$i++){
            $filename=$_FILES['thumbnails']['name'][$i];
            $tempname=$_FILES['thumbnails']['tmp_name'][$i];
            $folder='../thumbnails/'.$filename;
            if(move_uploaded_file($tempname,$folder)){
                $insert_thumbnails="INSERT INTO thumbnails(eventID,thumbnail) VALUES('$eventID','$filename')";
                mysqli_query($conn,$insert_thumbnails);
            }
        }
        $makechanges="UPDATE events SET capacity='$capacity',location='$location',time='$time',date='$date',category='$category',title='$title',description='$description',points=$points,checklist='$checklist' WHERE eventID=$eventID";
        mysqli_query($conn,$makechanges);
        header("Location: /organizer/displayEventsOrg.php?eventID=$eventID");
        exit();
    
    }

    if(isset($_POST['deleteEvent'])){
        $deleteEvent="DELETE FROM events WHERE eventID=$eventID";
        mysqli_query($conn,$deleteEvent);
        header("Location: /organizer/eventsOrg.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/createEvent.css">
    <link rel="stylesheet" href="../css/sidebar.css">
    <title>Home</title>
</head>
<body>
    <div>
        <form method="post" enctype="multipart/form-data">
            <div class="eventContent">
                <p class="categoryLabel">Select category</p>
                <select class="category" name="category">
                    <option value='Waste and Recycling'>Waste and Recycling</option>
                    <option value='Food and Entertainment'>Food and Entertainment</option>
                    <option value='Education'>Education</option>
                    <option value='Green Businesses'>Green Businesses</option>
                    <option value='Community and Nature'>Community and Nature</option>
                    <option value='Other'>Other</option>
                </select>
                <label for="eventTitle">Enter title</label><br>
                <input name="eventTitle" class="eventTitle" type="text" value='<?php echo $eventData['title'];?>'>
                <label for="description">Enter description</label><br>
                <textarea name="description" class="description"><?php echo $eventData['description'];?></textarea>
                <label for="capacity">Enter capacity</label>
                <input type="number" name="capacity" class="capacity" value=<?php echo $eventData['capacity'];?>>
                <label for="location">Enter location</label>
                <input name="location" class="location" type="text" value='<?php echo $eventData['location'];?>'>
                <label for="time">Select time</label>
                <input type="time" name="time" class="time" value='<?php echo $eventData['time'];?>'>
                <label for="date">Select date</label>
                <input type="date" name="date" class="date" value='<?php echo $eventData['date'];?>'>
                <label for="points">Enter points</label>
                <input type="number" name="points" class="points" value=<?php echo $eventData['points'];?>>
                <input id="thumbnails" type="file" name="thumbnails[]" class="thumbnails" accept="image/*" multiple hidden>

                <div class="checkboxes">
                    <label for=""><p>There will be recycling bins placed at the event venue</p><input type="checkbox" name="checklist[]" <?php echo showChecked("There will be recycling bins placed at the event venue",$checked);?> value="There will be recycling bins placed at the event venue"></label>
                    <label for=""><p>Plastics will be replaced with reusable or biodegradable materials(If used)</p><input type="checkbox" name="checklist[]" <?php echo showChecked("Plastics will be replaced with reusable or biodegradable materials",$checked);?> value="Plastics will be replaced with reusable or biodegradable materials" id=""></label>
                    <label for=""><p>Waste or food leftover will be composted(If provided)</p><input type="checkbox" name="checklist[]" <?php echo showChecked("Waste or food leftover will be composted",$checked);?> value="Waste or food leftover will be composted"></label>
                    <label for=""><p>Electronics used during the event will be turned off when not in use</p><input type="checkbox" name="checklist[]" <?php echo showChecked("Electronics used during the event will be turned off when not in use",$checked);?> value="Electronics used during the event will be turned off when not in use"></label>
                    <label for=""><p>Equipment used at the event is energy efficient</p><input type="checkbox" name="checklist[]" <?php echo showChecked("Equipment used at the event is energy efficient",$checked);?> value="Equipment used at the event is energy efficient"></label>
                    <label for=""><p>This event is a sustainable event</p><input type="checkbox" name="checklist[]" <?php echo showChecked("This event is a sustainable event",$checked);?> value="This event is a sustainable event"></label>
                </div>
                
                <label for="thumbnails" class="upload">
                    <i class="fa-solid fa-download"></i>
                    <p>Upload new thumbnails</p>
                </label>
                <h3>Uploaded Thumbnails:</h3>
                
                <?php while($thumbnailData=mysqli_fetch_assoc($thumbnails)):?>
                    <div class="uploadedThumbnails">
                        <img class="uploadedThumbnail" src="../thumbnails/<?php echo $thumbnailData['thumbnail']?>" alt=""><br>
                        <div class="deleteIcon">
                            <p class="thumbnailName"><?php echo $thumbnailData['thumbnail'];?></p>
                            <i class="fa-solid fa-trash"></i>
                        </div>
                    </div>
                <?php endwhile;?>
                

                <div class="preview"></div>
                <input class="submit" name="submit" type="submit" value="Save Changes">
                <input class="deleteEvent" name="deleteEvent" type="submit" value="Delete">
            </div>
        </form>
        
        <div class="errorspace"></div>
    </div>   
</body>
<script src="../javascript/editEvent.js"></script>
</html>