<?php
    include("../config.php");
    include("topBar.php");

    $getBadges="SELECT * FROM badges WHERE NOT EXISTS(SELECT 1 FROM participant_badges WHERE participant_badges.badgeID=badges.badgeID AND participant_badges.userID=$userID)";
    $badges=mysqli_query($conn,$getBadges);
    $count=mysqli_num_rows($badges);

    $getParticipantBadges="SELECT * FROM badges INNER JOIN participant_badges ON badges.badgeID=participant_badges.badgeID WHERE participant_badges.userID=$userID";
    $participantBadges=mysqli_query($conn,$getParticipantBadges);
    $badgesCount=mysqli_num_rows($participantBadges);
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
    <div class="category">
        <p class="all">All</p>
        <p class="claimedBadges">Claimed</p>
    </div>
    
    <div class="allBadges">
        <?php if($count==0):?>
            <div class="noBadges">
                <img class="placeholder" src="../img/noEvents.png" alt="">
                <h3>No badges created</h3>
            </div>
        <?php else:?>
            <?php while($data=mysqli_fetch_assoc($badges)):?>
                <div onclick="window.location.href='/participant/selectBadge.php?badgeID=<?php echo $data['badgeID'];?>'" class="badge">
                    <p><?php echo $data['title'];?></p>
                    <img src="../img/<?php echo $data['badgeIcon'];?>" alt="">
                    <p class="points"><?php echo $data['points'];?> <i class="fa-solid fa-coins"></i></p>
                </div>
            <?php endwhile;?>    
        <?php endif;?>
    </div>
    
    
    <div class="participantBadges">
        <?php if($badgesCount==0):?>
            <div class="noBadges">
                <img class="placeholder" src="../img/noEvents.png" alt="">
                <h3>No badges claimed</h3>
            </div>
        <?php else:?>
            <?php while($data=mysqli_fetch_assoc($participantBadges)):?>
                <div onclick="window.location.href='/participant/viewBadge.php?badgeID=<?php echo $data['badgeID'];?>'" class="badge">
                    <p><?php echo $data['title'];?></p>
                    <img src="../img/<?php echo $data['badgeIcon'];?>" alt="">
                    <p class="points"><?php echo $data['points'];?> <i class="fa-solid fa-coins"></i></p>
                </div>
            <?php endwhile;?>
        <?php endif;?>  
    </div>
    
   
</body>
<script src="../javascript/participantBadges.js"></script>
</html>