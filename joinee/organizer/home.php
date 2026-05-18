<?php
    include("../config.php");
    include("topBar.php");


    function getTotal($conn,$get){
        $query=mysqli_query($conn,$get);
        $count=mysqli_num_rows($query);
        return $count;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/home.css">
    <title>Home</title>

</head>
<body>
    <div class="homepage">
        <p class="dashboard">Organizer Dashboard</p>
        <div class="top">
            <p class="topTitle">Events posted</p>
            <p class="totalEvents"><?php echo getTotal($conn,"SELECT * FROM events WHERE userID=$userID AND status='accepted'");?> total events</p>
        </div>
        <div class="bottom">
            <div class="left">
                <p class="bottomTitle">Signups for most recent event</p>
                <p class="totalSignups"><?php echo getTotal($conn,"SELECT * FROM signups INNER JOIN events ON signups.eventID=events.eventID WHERE events.userID=$userID ORDER BY events.eventID DESC LIMIT 1");?> total signups</p>
            </div>
            <div class="right">
                <div class="rightTop">
                    <p class="rtTitle">Events pending</p>
                    <p class="totalEventsPending"><?php echo getTotal($conn,"SELECT * FROM events WHERE userID=$userID AND status='pending'");?> total events</p>
                </div>
                <div class="rightBottom">
                    <p class="rbTitle">Events rejected</p>
                    <p class="totalEventsRejected"><?php echo getTotal($conn,"SELECT * FROM events WHERE userID=$userID AND status='rejected'");?> total events</p>
                </div>
            </div>
        </div>
    </div>
    <div onclick="window.location.href='/organizer/createEventp1.php'" class="createEvent">create&nbsp&nbsp<i class="fa-solid fa-plus"></i></div>
</body>
</html>