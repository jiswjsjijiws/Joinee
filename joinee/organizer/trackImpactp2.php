<?php
    include("../config.php");
    include("topBar.php");
    $eventID=$_GET['eventID'];
    $totalWaste=$_GET['totalWaste'];
    $totalWater=$_GET['totalWater'];
    $totalElectricity=$_GET['totalElectricity'];

    $getMetrics="SELECT * FROM metrics WHERE eventID=$eventID";
    $queryGetMetrics=mysqli_query($conn,$getMetrics);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/createEvent.css">
    <title>Home</title>
</head>
<body>
    <div class="metrics">
        <?php while($metrics=mysqli_fetch_assoc($queryGetMetrics)):?>
            <div class="wasteMetric">
                <p class="metricTitle">Waste Recycled</p>
                <p class="metricPercentage"><?php echo $metrics['waste'];?> %</p>
            </div>

            <div class="others">
                <div class="waterMetric">
                    <p class="metricTitle">Water litres/person</p>
                    <p class="metricPercentage"><?php echo $metrics['water'];?> %</p>
                </div>
                
                <div class="electricityMetric">
                    <p class="metricTitle">kWh/person</p>
                    <p class="metricPercentage"><?php echo $metrics['electricity'];?> %</p>
                </div>
            </div>
        <?php endwhile;?>
    </div>

   
    
</body>
<script src="../javascript/trackImpact.js"></script>
</html>