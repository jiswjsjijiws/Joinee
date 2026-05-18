<?php
    include("../config.php");
    include("topBar.php");
    $eventID=$_GET['eventID'];
    $getMetrics="SELECT * FROM metrics WHERE eventID=$eventID";
    $queryGetMetrics=mysqli_query($conn,$getMetrics);

    $getParticipants="SELECT COUNT(attendanceID) AS numParticipants FROM attendance WHERE eventID=$eventID";
    $query=mysqli_query($conn,$getParticipants);
    $numParticipants=mysqli_fetch_assoc($query);

    if(isset($_POST['submit'])){
        $water=$_POST['water'];
        $waste=$_POST['waste'];
        $totalWaste=$_POST['totalWaste'];
        $electricity=$_POST['electricity'];

        $wasteRecycled=($waste/$totalWaste)*100;
        $ltrPerPerson=($water/$numParticipants['numParticipants']);
        $kWhPerPerson=($electricity/$numParticipants['numParticipants']);
    
        $setImpact="INSERT INTO metrics(eventID,waste,water,electricity) VALUES($eventID,$wasteRecycled,$ltrPerPerson,$kWhPerPerson)";
        mysqli_query($conn,$setImpact);
        header("Location: /organizer/trackImpactp2.php?eventID=$eventID&totalWaste=$totalWaste&totalWater=$water&totalElectricity=$electricity");
        exit();
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/createEvent.css">
    <title>Track Metrics</title>
</head>
<body>
    <?php if($numParticipants['numParticipants']!=0):?>
        <?php if(mysqli_num_rows($queryGetMetrics)==0):?>
            <p class="metricsTitle">Track Enviromental Metrics</p>
            <div>
                <form method="post">
                    <div class="impactContent">
                        <label>Waste</label><br>
                        <input name="waste" class="waste" type="number" placeholder="Enter total waste collected (kg)"><br>
                        <input name="totalWaste" class="totalWaste" type="number" placeholder="Enter total waste recycled (kg)">
                        <label>Electricity</label><br>
                        <input name="electricity" class="electricity" type="number" placeholder="Enter total electricity used (kWh)">
                        <label>Water</label><br>
                        <input name="water" class="water" type="number" placeholder="Enter water used (litre)">
                        <button name="submit" class="submit">submit</button>
                </form>
                <div class="errorspace"></div>
            </div>
        <?php else:?>
           <?php header("Location: /organizer/trackImpactp2.php?eventID=$eventID&totalWaste=$totalWaste&totalWater=$water&totalElectricity=$electricity");
                exit();
            ?>
        <?php endif;?>
    <?php else:?>
        <div class="noAttendees">
            <img class="placeholder" src="../img/noEvents.png" alt="">
            <h3>Unable to track impact due to no attendees</h3>
        </div>
    <?php endif;?>

   
    
</body>
<script src="../javascript/trackImpact.js"></script>
</html>