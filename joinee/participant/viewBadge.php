<?php
    include("../config.php");
    include("topBar.php");
    $errormessage="";
    $badgeID=$_GET['badgeID'];
    $getBadge="SELECT * FROM badges WHERE badgeID=$badgeID";
    $queryGetBadge=mysqli_query($conn,$getBadge);
    $data=mysqli_fetch_assoc($queryGetBadge);
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
        <button name="selectedBadgePoints" class="selectedBadgePoints"><?php echo $data['points'];?> <i class="fa-solid fa-coins"></i></button>
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