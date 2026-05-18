<?php
    include("../config.php");
    include("topBar.php");


    function getTotal($conn,$get){
        $query=mysqli_query($conn,$get);
        $count=mysqli_num_rows($query);
        return $count;
    }

    $queryImpacts="SELECT * FROM metrics INNER JOIN signups ON metrics.eventID=signups.eventID WHERE signups.userID=$userID ORDER BY signups.eventID DESC LIMIT 1";
    $results=mysqli_query($conn,$queryImpacts);
    $data=mysqli_fetch_assoc($results);
    $waste=$data['waste']??0;
    $water=$data['water']??0;
    $electricity=$data['electricity']??0;
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
        <p class="dashboard">Impacts</p>
        <div class="top">
            <p class="topTitle">Events Participated</p>
            <p class="totalEvents"><?php echo getTotal($conn,"SELECT * FROM signups WHERE userID=$userID");?> total events</p>
        </div>
        <div class="bottom">
            <div class="left">
                <p class="bottomTitle">Waste metrics</p>
                <p class="totalSignups"><?php echo $waste;?>%</p>
            </div>
            <div class="right">
                <div class="rightTop">
                    <p class="rtTitle">Water Metrics</p>
                    <p class="totalEventsPending"><?php echo $water;?>%</p>
                </div>
                <div class="rightBottom">
                    <p class="rbTitle">Electricity Metrics</p>
                    <p class="totalEventsRejected"><?php echo $electricity;?>%</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>