<?php
    include("../config.php");
    include("topBar.php");
    $userID=$_SESSION['userID'];
    $eventID=$_GET['eventID'];

    $getEvent="SELECT * FROM events WHERE eventID=$eventID";
    $event=mysqli_query($conn,$getEvent);

    $getThumbnails="SELECT * FROM thumbnails WHERE eventID=$eventID";
    $thumbnails=mysqli_query($conn,$getThumbnails);

    $checkJoin="SELECT * FROM signups INNER JOIN users ON signups.userID=users.userID INNER JOIN events ON signups.eventID=events.eventID WHERE signups.userID=$userID AND signups.eventID=$eventID";
    $queryCheckJoin=mysqli_query($conn,$checkJoin);


    if(isset($_POST['join'])){
        $joinEvent="INSERT INTO signups(userID,eventID) VALUES($userID,$eventID)";
        mysqli_query($conn,$joinEvent);
        header("Location: /participant/displayEventsPart.php?eventID=$eventID");
        exit();
    }

    if(isset($_POST['remove'])){
        $removeSignup="DELETE FROM signups WHERE userID=$userID AND eventID=$eventID";
        mysqli_query($conn,$removeSignup);
        header("Location: /participant/myEvents.php");
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
                <div class="eventBottom">
                    <?php if(mysqli_num_rows($queryCheckJoin)>=1):?>  
                        <?php if($eventRow['date']>date("Y-m-d")):?>
                            <form method="post">
                                <input class="remove" name="remove" type="submit" value="Remove">
                            </form> 
                        <?php endif;?>
                        <button class="join">Joined</button>
                        <button class="points"><i class="fa-solid fa-coins"></i>&nbsp<?php echo $eventRow['points'];?></button>              
                    <?php else:?>
                        <form method="post">
                            <input class="join" name="join" type="submit" value="Join">
                        </form>
                        <button class="points"><i class="fa-solid fa-coins"></i>&nbsp<?php echo $eventRow['points'];?></button>
                    <?php endif;?>                        
                </div>
            <?php endwhile;?>
        </div>
    </div>


    
   
</body>
<script src="../javascript/displayEventsPart.js"></script>
</html>