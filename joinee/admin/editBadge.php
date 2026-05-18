<?php
    include("../config.php");
    include("topBar.php");
    $badgeID=$_GET['badgeID'];
    $getBadges="SELECT * FROM badges WHERE badgeID=$badgeID";
    $badges=mysqli_query($conn,$getBadges);
    $badge=mysqli_fetch_assoc($badges);
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

    if(isset($_POST['save'])){
        $tier=$_POST['tier'];
        $badgeTitle=$_POST['badgeTitle'];
        $badgePoints=$_POST['badgePoints'];
        $badgeDescription=$_POST['badgeDescription'];
        $badgeIcon=checkTier($tier);

        $updateBadge="UPDATE badges SET badgeIcon='$badgeIcon',points=$badgePoints,description='$badgeDescription',title='$badgeTitle' WHERE badgeID=$badgeID";
        mysqli_query($conn,$updateBadge);
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
    <div class="createBadge">
        <form method="post">
            <div class="badgeTier">
                <h2>Select tier</h2><br>
                <select name="tier" class="tier">
                    <option value="<?php echo str_replace('.png', '', $badge['badgeIcon']);?>">Selected: <?php echo str_replace('.png', '', $badge['badgeIcon']);?></option>
                    <option value="gold">gold</option>
                    <option value="silver">silver</option>
                    <option value="bronze">bronze</option>
                </select>
            </div>
            <div class="badgeTitle">
                <h2>Enter Badge Title:</h2><br>
                <input class="badgeT" name="badgeTitle" type="text" value="<?php echo $badge['title']?>">
            </div>

            <div class="badgePoints">
                <h2>Enter Badge Points:</h2><br>
                <input class="badgeP" name="badgePoints" type="number" value="<?php echo $badge['points']?>">
            </div>

            <div class="badgeDescription">
                <h2>Enter Badge Description:</h2><br>
                <textarea name="badgeDescription" class="badgeD"><?php echo $badge['description']?></textarea>
            </div>
            <input type="submit" name="save" class="submit" value="save">
        </form>
        <div class="errorspace"></div>
    </div>
   
    
</body>
<script src="../javascript/badges.js"></script>
</html>