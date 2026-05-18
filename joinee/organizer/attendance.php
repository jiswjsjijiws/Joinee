<?php
    include("../config.php");
    include("topBar.php");

    $getEvent="SELECT * FROM events WHERE userID=$userID AND status='accepted'";
    $event=mysqli_query($conn,$getEvent);
    $numEvents=mysqli_num_rows($event);
    $code='';
    $errormessage='';
    $numParticipants=0;
    if(!isset($_SESSION['code'])||!isset($_SESSION['eventID'])){
        $_SESSION['code']=0;
        $_SESSION['eventID']=0;
    }

    
    if(isset($_POST['submit'])){
        $titleSelected=$_POST['eventTitle'];
        $getEventID="SELECT eventID FROM events WHERE title='$titleSelected'";
        $eventIDdata=mysqli_query($conn,$getEventID);

        $eventIDrow=mysqli_fetch_assoc($eventIDdata);
        $eventID=$eventIDrow['eventID'];
        $code=rand(100,999);
        $_SESSION['code']=$code;
        $_SESSION['eventID']=$eventID;
        $insertCode="INSERT INTO attendance_code(code,eventID) VALUES($code,$eventID)";
        mysqli_query($conn,$insertCode);

        $getParticipants="SELECT users.username FROM signups INNER JOIN users ON users.userID=signups.userID WHERE signups.eventID=$eventID";
        $participantsData=mysqli_query($conn,$getParticipants);
        $numParticipants=mysqli_num_rows($participantsData);
    }
    
    if(isset($_POST['end'])){
        $codeTodelete=$_SESSION['code'];
        $eventIDtoDelete=$_SESSION['eventID'];
        $deleteCode="DELETE FROM attendance_code WHERE code=$codeTodelete AND eventID=$eventIDtoDelete";
        mysqli_query($conn,$deleteCode);
        unset($_SESSION['code']);
        unset($_SESSION['code']);
    }



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/attendance.css">
    <link rel="stylesheet" href="../css/sidebar.css">
    <title>Home</title>
</head>
<body>    
    <div class="attendanceContent">
        <?php if($numEvents==0):?>
            <div class="noEvents">
                <img class="placeholder" src="../img/noEvents.png" alt="">
                <h3>No events hosted</h3>
            </div>
        <?php else:?>
            <form method="post">
                <div class="takeAttendance">
                    <label for="">Select event</label>
                    <select class="eventTitle" name="eventTitle">
                        <?php while($eventData=mysqli_fetch_assoc($event)):?>
                            <option value='<?php echo $eventData['title'];?>'><?php echo $eventData['title'];?></option>
                        <?php endwhile;?>
                    </select>
                </div>
                <div class="attendanceCode">
                    <?php if($code):?>
                        <?php echo $code;?>
                    <?php else:?>
                        <img class="placeholder" src="../img/attendance.png" alt="">
                    <?php endif;?>
                    
                </div>
                <div class="buttons">
                    <input class="submit" name="submit" type="submit" value="Generate Code">
                    <?php if($code):?>
                        <input class="end" name="end" type="submit" value="End">
                    <?php endif;?>
                </div>
            </form>

        <?php endif;?>       
    </div>
    <div class="signups">
        <table class="signupsList">
            <thead>
                <tr>
                    <th>Participants</th>
                </tr>
            </thead>
            <tbody>
                <?php if($numParticipants>=1):?>
                    <?php while($participants=mysqli_fetch_assoc($participantsData)):?>
                        <tr>
                            <td class="signupUsername"><?php echo $participants['username']?></td>
                        </tr>
                    <?php endwhile;?>
                <?php else:?>
                    <tr>
                        <td class="noParticipants">
                            <?php
                                $errormessage="No participants yet";
                                echo $errormessage;
                            ?>
                        </td>
                    </tr>


                <?php endif;?>
            </tbody>
        </table>
    </div>

   
    
</body>
</html>