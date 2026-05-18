<?php
    include("../config.php");
    include("topBar.php");

    $getBadges="SELECT * FROM badges";
    $badges=mysqli_query($conn,$getBadges);
    $count=mysqli_num_rows($badges);

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
    <?php if($count==0):?>
        <div class="noBadges">
            <img class="placeholder" src="../img/noEvents.png" alt="">
            <h3>No badges created</h3>
        </div>
    <?php else:?>
        <div class="allBadges">
            <?php while($data=mysqli_fetch_assoc($badges)):?>
                <div class="badge">
                    <img src="../img/<?php echo $data['badgeIcon'];?>" alt="">
                    <p><?php echo $data['title'];?></p>
                    <p class="points"><?php echo $data['points'];?> <i class="fa-solid fa-coins"></i></p>
                    <div class="actions">
                        <i onclick="window.location.href='/admin/deleteBadge.php?badgeID=<?php echo $data['badgeID'];?>'" class="fa-solid fa-trash"></i>
                        <i onclick="window.location.href='/admin/editBadge.php?badgeID=<?php echo $data['badgeID'];?>'" class="fa-solid fa-pen-to-square"></i>
                    </div>
                </div>
            <?php endwhile;?>    
        </div>
    <?php endif;?>
    <button onclick="window.location.href='/admin/createBadges.php'" class="createBtn">create&nbsp&nbsp<i class="fa-solid fa-plus"></i></button>
   
   
    
</body>
</html>