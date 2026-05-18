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
        <p class="dashboard">Admin Dashboard</p>
        <div class="top">
            <p class="topTitle">Events to be approved</p>
            <p class="totalEvents"><?php echo getTotal($conn,"SELECT * FROM events WHERE status='pending'");?> total events</p>
        </div>
        <div class="bottom">
            <div class="left">
                <p class="bottomTitle">Account Requests</p>
                <p class="totalSignups"><?php echo getTotal($conn,"SELECT * FROM requests");?> total requests</p>
            </div>
            <div class="right">
                <div class="rightTop">
                    <p class="rtTitle">Organizers</p>
                    <p class="totalEventsPending"><?php echo getTotal($conn,"SELECT * FROM users WHERE role='organizer'");?> total organizers</p>
                </div>
                <div class="rightBottom">
                    <p class="rbTitle">Participants</p>
                    <p class="totalEventsRejected"><?php echo getTotal($conn,"SELECT * FROM users WHERE role='participant'");?> total participants</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>