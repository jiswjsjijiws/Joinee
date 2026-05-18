<?php
    include("../config.php");
    include("topBar.php");
    $getTotalUsers="SELECT COUNT(userID) AS totalUsers FROM users";
    $queryTotalUsers=mysqli_query($conn,$getTotalUsers);
    $totalUsers=mysqli_fetch_assoc($queryTotalUsers);

    function getTotal($role,$conn){
        $getTotalUser="SELECT COUNT(userID) AS total FROM users WHERE role='$role'";
        $queryGetTotalUser=mysqli_query($conn,$getTotalUser);
        $totalUser=mysqli_fetch_assoc($queryGetTotalUser);
        return $totalUser['total'];
    }

    function getPercentage($role,$conn,$totalUsers){
        $getTotalUser="SELECT COUNT(userID) AS total FROM users WHERE role='$role'";
        $queryGetTotalUser=mysqli_query($conn,$getTotalUser);
        $totalUser=mysqli_fetch_assoc($queryGetTotalUser);
        return ($totalUser['total']/$totalUsers['totalUsers'])*100;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/analytics.css">
    
    <title>User Analytics</title>
</head>
<body>
    <div class="analyticsType">
        <p onclick="window.location.href='/admin/userAnalytics.php'" class="typeUsers">Users</p>
        <p onclick="window.location.href='/admin/eventAnalytics.php'">Events</p>
    </div>
    <div class="allAnalytics">
        <div class="top">
            <div class="totalUsers">
                <h4>Total Users</h4>
                <p><?php echo $totalUsers['totalUsers']?></p>
            </div>
            <div class="select">
                <div class="selections">
                    <p class="participants">participants</p>
                    <p class="organizers">organizers</p>
                    <p class="admins">admins</p>
                </div>
                <div class="content">
                    <div class="totalP">
                        <h4>Total Participants</h4>
                        <p><?php echo getTotal('participant',$conn);?></p>
                    </div>
                    <div class="totalO">
                        <h4>Total Organizers</h4>
                        <p><?php echo getTotal('organizer',$conn);?></p>
                    </div>
                    <div class="totalA">
                        <h4>Total Admins</h4>
                        <p><?php echo getTotal('admin',$conn);?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom">
            <div class="categories">
                <div class="percent">
                    <label for="file">Participants</label>
                    <div class="progress">
                        <div class="progressBar" style="width:<?php echo getPercentage('participant',$conn,$totalUsers);?>%"></div>
                        <div class="percentage"><?php echo round(getPercentage('participant',$conn,$totalUsers),2);?>%</div>
                    </div>
                </div>
                <div class="percent">
                    <label for="file">Organizers</label>
                    <div class="progress">
                        <div class="progressBar" style="width:<?php echo getPercentage('organizer',$conn,$totalUsers);?>%"></div>
                        <div class="percentage"><?php echo round(getPercentage('organizer',$conn,$totalUsers),2);?>%</div>
                    </div>
                </div>
                <div class="percent">
                    <label for="file">Admins</label>
                    <div class="progress">
                        <div class="progressBar" style="width:<?php echo getPercentage('admin',$conn,$totalUsers);?>%"></div>
                        <div class="percentage"><?php echo round(getPercentage('admin',$conn,$totalUsers),2);?>%</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="../javascript/userAnalytics.js"></script>
</html>