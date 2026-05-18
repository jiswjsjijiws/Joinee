<?php
    include("../config.php");
    include("topBar.php");
    $eventID=$_GET['eventID'];

    $getEvent="SELECT * FROM events WHERE eventID=$eventID";
    $event=mysqli_query($conn,$getEvent);

    $getThumbnails="SELECT * FROM thumbnails WHERE eventID=$eventID";
    $thumbnails=mysqli_query($conn,$getThumbnails);

    if(isset($_POST['approve'])){
        $approveEvent="UPDATE events SET status='accepted' WHERE eventID=$eventID";
        mysqli_query($conn,$approveEvent);
        header("Location: /admin/viewEvents.php");
        exit();
    }

    if(isset($_POST['reject'])){
        $rejectEvent="UPDATE events SET status='rejected' WHERE eventID=$eventID";
        mysqli_query($conn,$rejectEvent);
        header("Location: /admin/viewEvents.php");
        exit();
    }

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/displayEventsOrg.css">
    <title>Home</title>
</head>
<body>
    <div class="event">
        <div class="slider">
            <div class="thumbnailSlide">
                <?php while($thumbnailRow=mysqli_fetch_assoc($thumbnails)):?>         
                    <img class="thumbnails" src="<?php echo "../thumbnails/".$thumbnailRow['thumbnail'];?>" alt="">
                <?php endwhile;?>
            </div>
            <button class="previous">&#10094</button>
            <button class="next">&#10095</button>
        </div>
        <div class="eventContent">
            <?php while($eventRow=mysqli_fetch_assoc($event)):?>
                <p class="eventTitle">
                    <?php echo $eventRow['title'];?>
                </p>
                <p class="eventCategory">
                    <?php echo $eventRow['category'];?>
                </p>
                <div class="eventDescription">
                    <div class="showDescription">
                        <p class="descriptionTitle">Description</p>
                        <i class="fa-solid fa-angle-down"></i>
                    </div>
                    <p class="descriptionContent">
                        <?php echo $eventRow['description'];?>  
                    </p>
                </div>
                    
                </p>
                <p class="eventCapacity">
                    Capacity: <?php echo $eventRow['capacity'];?>
                </p>
                <p class="eventLocation">
                    Location: <?php echo $eventRow['location'];?>
                </p>
                <p class="eventTime">
                    Time: <?php echo date("g:i A",strtotime($eventRow['time']));?>
                </p>
                <p class="eventDate">
                    Date: <?php echo $eventRow['date'];?>
                </p>
                <div class="decision">
                    <form method="post">
                        <input class="approve" name="approve" type="submit" value="Approve">
                        <input class="reject" name="reject" type="submit" value="Reject">
                    </form>
                </div>

            <?php endwhile;?>
        </div>
    </div>


    
   
</body>
<script src="../javascript/displayEventsOrg.js"></script>
</html>