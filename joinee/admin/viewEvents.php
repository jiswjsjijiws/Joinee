<?php
    include("../config.php");
    include("topBar.php");

    $getEvents="SELECT MIN(thumbnails.thumbnail) AS thumbnail,users.profilePic,users.username,events.points,events.eventID,events.title,events.status FROM events INNER JOIN thumbnails ON events.eventID=thumbnails.eventID INNER JOIN users ON events.userID=users.userID WHERE events.status='pending' GROUP BY events.eventID,events.title,events.status,users.profilePic,users.username,events.points";
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
                <div class="event" onclick="window.location.href='<?php echo '/admin/manageEvents.php?eventID='.$data['eventID']?>'">
                    <img class="thumbnails" src="<?php echo "../thumbnails/".$data['thumbnail'];?>" alt="">
                    <p class="eventTitle"><?php echo $data['title'];?></p>
                    <div class="viewParticipants">
                        <p class="orgInfo"><img class="orgPic" src="../img/<?php echo $data['profilePic'];?>" alt=""><?php echo $data['username'];?></p>
                        <p class="eventPoints"><i class="fa-solid fa-coins">&nbsp</i> <?php echo $data['points'];?></p>
                    </div>
                </div>
            <?php endwhile;?>
        </div>
    <?php endif;?>
    
   
    
</body>
<script src="../javascript/eventsOrg.js"></script>
</html>