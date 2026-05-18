<?php
    include("../config.php");
    include("topBar.php");
    $getTotalEvents="SELECT COUNT(eventID) AS totalEvents FROM events";
    $queryTotalEvents=mysqli_query($conn,$getTotalEvents);
    $totalEvents=mysqli_fetch_assoc($queryTotalEvents);

    function getTotal($status,$conn){
        $getTotalEvent="SELECT COUNT(eventID) AS total FROM events WHERE status='$status'";
        $queryGetTotalEvent=mysqli_query($conn,$getTotalEvent);
        $totalEvent=mysqli_fetch_assoc($queryGetTotalEvent);
        return $totalEvent['total'];
    }

    function getPercentage($status,$conn,$totalEvents){
        $getTotalEvent="SELECT COUNT(eventID) AS total FROM events WHERE status='$status'";
        $queryGetTotalEvent=mysqli_query($conn,$getTotalEvent);
        $totalEvent=mysqli_fetch_assoc($queryGetTotalEvent);
        return ($totalEvent['total']/$totalEvents['totalEvents'])*100;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/analytics.css">
    
    <title>Event Analytics</title>
</head>
<body>
    <div class="analyticsType">
        <p onclick="window.location.href='/admin/userAnalytics.php'">Users</p>
        <p onclick="window.location.href='/admin/eventAnalytics.php'" class="typeEvents">Events</p>
    </div>
    <div class="allAnalytics">
        <div class="top">
            <div class="totalUsers">
                <h4>Total Event</h4>
                <p><?php echo $totalEvents['totalEvents']?></p>
            </div>
            <div class="select">
                <div class="selections">
                    <p class="participants">accepted</p>
                    <p class="organizers">pending</p>
                    <p class="admins">rejected</p>
                </div>
                <div class="content">
                    <div class="totalP">
                        <h4>Total Accepted</h4>
                        <p><?php echo getTotal('accepted',$conn);?></p>
                    </div>
                    <div class="totalO">
                        <h4>Total Pending</h4>
                        <p><?php echo getTotal('pending',$conn);?></p>
                    </div>
                    <div class="totalA">
                        <h4>Total Rejected</h4>
                        <p><?php echo getTotal('rejected',$conn);?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom">
            <div class="categories">
                <div class="percent">
                    <label for="file">Accepted</label>
                    <div class="progress">
                        <div class="progressBar" style="width:<?php echo getPercentage('accepted',$conn,$totalEvents);?>%"></div>
                        <div class="percentage"><?php echo round(getPercentage('accepted',$conn,$totalEvents),2);?>%</div>
                    </div>
                </div>
                <div class="percent">
                    <label for="file">Pending</label>
                    <div class="progress">
                        <div class="progressBar" style="width:<?php echo getPercentage('pending',$conn,$totalEvents);?>%"></div>
                        <div class="percentage"><?php echo round(getPercentage('pending',$conn,$totalEvents),2);?>%</div>
                    </div>
                </div>
                <div class="percent">
                    <label for="file">Rejected</label>
                    <div class="progress">
                        <div class="progressBar" style="width:<?php echo getPercentage('rejected',$conn,$totalEvents);?>%"></div>
                        <div class="percentage"><?php echo round(getPercentage('rejected',$conn,$totalEvents),2);?>%</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="../javascript/userAnalytics.js"></script>
</html>