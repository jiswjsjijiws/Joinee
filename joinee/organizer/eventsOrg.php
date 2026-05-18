<?php
    include("../config.php");
    include("topBar.php");
    $getEvents="SELECT MIN(thumbnails.thumbnail) AS thumbnail,events.eventID,events.title,events.status FROM events INNER JOIN thumbnails ON events.eventID=thumbnails.eventID WHERE events.userID=$userID GROUP BY events.eventID,events.title,events.status;";
    $events=mysqli_query($conn,$getEvents);
    $count=mysqli_num_rows($events);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/eventsOrg.css">
    <title>Home</title>
</head>
<body>
    <?php if($count==0):?>
        <div class="noEvents">
            <img class="placeholder" src="../img/noEvents.png" alt="">
            <h3>No events hosted</h3>
        </div>
    <?php else:?>
        <div class="events">
            <?php while($data=mysqli_fetch_assoc($events)):?>
                <div class="event" onclick="window.location.href='<?php echo '/organizer/displayEventsOrg.php?eventID='.$data['eventID']?>'">
                    <img class="thumbnails" src="<?php echo "../thumbnails/".$data['thumbnail'];?>" alt="">
                    <p class="eventTitle"><?php echo $data['title'];?></p>
                    <div class="history">
                        <p onclick="event.stopPropagation(); window.location.href='/organizer/editEvent.php?eventID=<?php echo $data['eventID']?>'"class="editEvent">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </p>
                        <p class="eventStatus"><?php echo $data['status'];?></p>
                    </div>
                </div>
            <?php endwhile;?>
        </div>
        <?php endif;?>      


    
    
   
    
</body>
<script src="../javascript/eventsOrg.js"></script>
</html>