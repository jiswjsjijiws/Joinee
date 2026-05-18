<?php
    $today=date('Y-m-d');
    include("../config.php");
    include("topBar.php");
    function checkCategory($conn,$category,$today){
        $getEvents="SELECT MIN(thumbnails.thumbnail) AS thumbnail,users.username,events.eventID,events.category,events.points,events.title,events.status FROM events INNER JOIN thumbnails ON events.eventID=thumbnails.eventID INNER JOIN users ON events.userID=users.userID LEFT JOIN signups ON events.eventID=signups.eventID WHERE events.status='accepted' AND events.date>='$today' AND events.category='$category' GROUP BY events.eventID,events.title,events.points,events.category,users.username,events.capacity HAVING COUNT(DISTINCT(signups.signupID))<events.capacity";
        $events=mysqli_query($conn,$getEvents);
        $count=mysqli_num_rows($events);
        return[$events,$count];
    }

    if(!empty($_POST['filter'])){
        $category=$_POST['filter'];
        [$events,$count]=checkCategory($conn,$category,$today);
    }
    else{
        $getEvents="SELECT MIN(thumbnails.thumbnail) AS thumbnail,users.username,events.eventID,events.category,events.points,events.title,events.status FROM events INNER JOIN thumbnails ON events.eventID=thumbnails.eventID INNER JOIN users ON events.userID=users.userID LEFT JOIN signups ON events.eventID=signups.eventID WHERE events.status='accepted' AND events.date>='$today' GROUP BY events.eventID,events.title,events.points,events.category,users.username,events.capacity HAVING COUNT(DISTINCT(signups.userID))<events.capacity";
        $events=mysqli_query($conn,$getEvents);
        $events=mysqli_query($conn,$getEvents);
        $count=mysqli_num_rows($events);
    }
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
    <div class="filterCategory">
        <h2>Category</h2>
        <form method="post">
            <select name="filter" class="filter" onchange="this.form.submit()">
                <option selected disabled>Select a category</option>
                <option value="Waste and Recycling">Waste and Recycling</option>
                <option value="Food and Entertainment">Food and Entertainment</option>
                <option value="Education">Education</option>
                <option value="Green Businesses">Green Businesses</option>
                <option value="Community and Nature">Community and Nature</option>
                <option value="Other">Other</option>
            </select>
        </form>
    </div>
    <?php if($count==0):?>
        <div class="noEvents">
            <img class="placeholder" src="../img/noEvents.png" alt="">
            <h3>No events available</h3>
        </div>
    <?php else:?>
        <div class="events">
            <?php while($data=mysqli_fetch_assoc($events)):?>
                <div class="event" onclick="window.location.href='<?php echo '/participant/displayEventsPart.php?eventID='.$data['eventID']?>'">
                    <img class="thumbnails" src="<?php echo "../thumbnails/".$data['thumbnail'];?>" alt="">
                    <p class="eventTitle"><?php echo $data['title'];?></p>
                    <p class="eventCategory"><?php echo $data['category'];?></p>
                    <div class="eventBottom">
                        <div class="organizer">
                            <p>Organized By: </p>
                            <p class="orgName">&nbsp<?php echo $data['username'];?></p>
                        </div>
                        <form method="post">
                            <button class="points"><?php echo $data['points'];?> points</button>
                        </form>
                    </div>
                </div>
            <?php endwhile;?>     
        </div>
    <?php endif;?>  
    
   
    
</body>
<script src="../javascript/eventsOrg.js"></script>
</html>