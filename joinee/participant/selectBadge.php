<?php
    include("../config.php");
    include("topBar.php");
    $errormessage="";
    $badgeID=$_GET['badgeID'];
    $getBadge="SELECT * FROM badges WHERE badgeID=$badgeID";
    $queryGetBadge=mysqli_query($conn,$getBadge);
    $data=mysqli_fetch_assoc($queryGetBadge);

    $checkBadge="SELECT * FROM participant_badges INNER JOIN badges ON participant_badges.badgeID=badges.badgeID WHERE participant_badges.userID=$userID AND participant_badges.badgeID=$badgeID";
    $queryCheckBadge=mysqli_query($conn,$checkBadge);
    $count=mysqli_num_rows($queryCheckBadge);

    if(isset($_POST['selectedBadgePoints'])){
        $getPoints="SELECT * FROM participant_points WHERE userID=$userID";
        $queryGetPoints=mysqli_query($conn,$getPoints);
        $rowPoints=mysqli_fetch_assoc($queryGetPoints);
        $points=$rowPoints['points'];

        if($points<$data['points']){
            $errormessage="Not enough points";
        }
        else{
            $badgePoints=$data['points'];
            $claimBadge="INSERT INTO participant_badges(userID,badgeID) VALUES($userID,$badgeID)";
            $minusPoints="UPDATE participant_points SET points=points-$badgePoints WHERE userID=$userID";

            mysqli_query($conn,$claimBadge);
            mysqli_query($conn,$minusPoints);
            header("Location: /participant/badges.php");
            exit();
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/badges.css">
    <title>Home</title>
</head>
<body>
    <div class="selectedBadge">
        <p><?php echo $data['title'];?></p>
        <img src="../img/<?php echo $data['badgeIcon'];?>" alt="">
        <?php if($count==1):?>
            <p class="selectedBadgePoints">Claimed</p>
        <?php else:?>
            <form method="post">
                <button name="selectedBadgePoints" class="selectedBadgePoints"><?php echo $data['points'];?> <i class="fa-solid fa-coins"></i></button>
            </form>
        <?php endif;?>
        <div class="description">
            <p class="badgeDescription">
                <p class="descriptionTitle">Description</p><br>
                <?php echo $data['description'];?>
            </p>
        </div>
        <p class="errormessage"><?php echo $errormessage;?></p>
    </div>
</body>
</html>