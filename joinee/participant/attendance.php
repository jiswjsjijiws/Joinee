<?php
    include("../config.php");
    include("topBar.php");
    $errormessage="";
    if(isset($_POST['submit'])){
        $first=$_POST['first'];
        $second=$_POST['second'];
        $third=$_POST['third'];
        $code=(int)($first.$second.$third);
        

        $checkCode="SELECT signups.eventID FROM signups INNER JOIN attendance_code ON signups.eventID=attendance_code.eventID WHERE attendance_code.code=$code AND signups.userID=$userID";
        $queryCheckCode=mysqli_query($conn,$checkCode);
        $check=mysqli_num_rows($queryCheckCode);

            if($check==1){
                $rowCheckCode=mysqli_fetch_assoc($queryCheckCode);
                $eventID=$rowCheckCode['eventID'];
                $checkAttendance="SELECT * FROM attendance WHERE userID=$userID AND eventID=$eventID";
                $queryCheckAttendance=mysqli_query($conn,$checkAttendance);
                $rowCheckAttendance=mysqli_fetch_assoc($queryCheckAttendance);
                if($rowCheckAttendance>=1){
                    $errormessage="Code is invalid";

                }
                else{
                    $getPoints="SELECT * FROM events WHERE eventID=$eventID";
                    $queryGetPoints=mysqli_query($conn,$getPoints);
                    $rowPoints=mysqli_fetch_assoc($queryGetPoints);
                    $points=$rowPoints['points'];

                    $takeAttendance="INSERT INTO attendance(userID,eventID) VALUES($userID,$eventID)";
                    mysqli_query($conn,$takeAttendance);

                    $increasePoints="UPDATE participant_points SET points=points+$points WHERE userID=$userID";
                    mysqli_query($conn,$increasePoints);
                    header("Location: /participant/succesful.php?message=Attendance+was+taken+succesfully");
                    exit();
                }
            }
            else{
                $errormessage="Code is invalid";
            }
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
    <form method="post">
        <div class="partAttendance">
            <h2>Enter Code</h2>
            <div class="code">
                <input class="first" name="first" type="number">
                <input class="second" name="second" type="number">
                <input class="third" name="third" type="number">
            </div>
            <input class="submit" type="submit" name="submit" value="submit">
            <p class="errormessage"><?php echo $errormessage;?></p>
        </div>
    </form>

</body>
<script src="../javascript/attendance.js"></script>
</html>