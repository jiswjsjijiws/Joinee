<?php
    include("../config.php");
    include("topBar.php");
    $eventID=$_GET['eventID'];
    $getSignups="SELECT users.username FROM signups INNER JOIN users ON signups.userID=users.userID WHERE signups.eventID=$eventID";
    $signups=mysqli_query($conn,$getSignups);
    $numSignups=mysqli_num_rows($signups);
    $count=1;


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/displayEventsOrg.css">
    <title>Home</title>
</head>
<body>
    <div class="signups">
        <table class="signupsList">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Participants</th>
                </tr>
            </thead>
            <tbody>
                <?php if($numSignups>=1):?>
                    <?php while($signupsData=mysqli_fetch_assoc($signups)):?>
                        <tr>
                            <td class="count"><?php echo $count++?></td>
                            <td class="signupUsername"><?php echo $signupsData['username']?></td>
                        </tr>
                    <?php endwhile;?>
                <?php else:?>
                    <tr>
                        <td class="count"></td>
                        <td class="signupUsername">No signups yet</td>
                    </tr>
                <?php endif;?>
            </tbody>
        </table>
    </div>

    
   
    
</body>
</html>