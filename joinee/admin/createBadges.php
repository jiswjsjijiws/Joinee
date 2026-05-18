<?php
    include("../config.php");
    include("topBar.php");
    $getBadges="SELECT * FROM badges";
    $badges=mysqli_query($conn,$getBadges);
    $count=mysqli_num_rows($badges);

    function checkTier($tier){
        if($tier=='gold'){
            $badgeIcon='gold.png';
        }
        else if($tier=='silver'){
            $badgeIcon='silver.png';
        }
        else if($tier=='bronze'){
            $badgeIcon='bronze.png';
        }
        return $badgeIcon;
    }

    if(isset($_POST['create'])){
        $tier=$_POST['tier'];
        $badgeTitle=$_POST['badgeTitle'];
        $badgePoints=$_POST['badgePoints'];
        $badgeDescription=$_POST['badgeDescription'];
        $badgeIcon=checkTier($tier);

        $createBadge="INSERT INTO badges(badgeIcon,points,description,title) VALUES('$badgeIcon',$badgePoints,'$badgeDescription','$badgeTitle')";
        mysqli_query($conn,$createBadge);
        header("Location: /admin/badges.php");
        exit();
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
    <div class="createBadge">
        <form method="post">
            <div class="badgeTier">
                <h2>Select tier</h2><br>
                <select name="tier" class="tier">
                    <option value="gold">gold</option>
                    <option value="silver">silver</option>
                    <option value="bronze">bronze</option>
                </select>
            </div>
            <div class="badgeTitle">
                <h2>Enter Badge Title:</h2><br>
                <input class="badgeT" name="badgeTitle" type="text">
            </div>

            <div class="badgePoints">
                <h2>Enter Badge Points:</h2><br>
                <input class="badgeP" name="badgePoints" type="number">
            </div>

            <div class="badgeDescription">
                <h2>Enter Badge Description:</h2><br>
                <textarea name="badgeDescription" class="badgeD"></textarea>
            </div>
            <input type="submit" name="create" class="submit" value="create">
        </form>
        <div class="errorspace"></div>
    </div>
   
    
</body>
<script src="../javascript/badges.js"></script>
</html>