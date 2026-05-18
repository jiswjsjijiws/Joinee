<?php
    include("../config.php");
    include("topBar.php");
    $getRequests="SELECT * FROM requests";
    $query_requests=mysqli_query($conn,$getRequests);
    $count=mysqli_num_rows($query_requests);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/requests.css">
    <title>Home</title>
</head>
<body>
    <?php if($count==0):?>
        <div class="noRequests">
            <img src="../img/noEvents.png" alt="">
            <p>No requests</p>
        </div>
    <?php else:?>
        <?php while($requests=mysqli_fetch_assoc($query_requests)):?>
            <div class="requestCard">
                <div class="requestContent">
                    <p class="profileIcon"><i class="fa-solid fa-circle-user"></i></p>
                    <p class="name"><?php echo $requests['name'];?></p>
                </div>
                <div class="right">
                    <div class="userInfo">
                        <p class="username">Username: <?php echo $requests['username'];?></p>
                        <p class="password">Password: <?php echo $requests['password'];?></p>
                        <p class="tpnumber">TP Number:<?php echo $requests['tpnumber'];?></p>
                    </div>
                    <div class="purpose"><?php echo $requests['purpose'];?></div>
                    <div class="decision">
                        <input onclick="window.location.href='/admin/approveAccount.php?requestID=<?php echo urlencode($requests['requestID']);?>'" name="approve" class="approve" type="submit" value="approve">
                        <input onclick="window.location.href='/admin/rejectAccount.php?requestID=<?php echo urlencode($requests['requestID']);?>'" name="reject" class="reject" type="submit" value="reject">
                    </div>
                </div>
            </div>
        <?php endwhile;?>
    <?php endif?>
   
    
</body>
</html>