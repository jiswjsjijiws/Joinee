<?php
    include("../config.php");
    session_start();
    $username=$_SESSION['username'];
    $userID=$_SESSION['userID'];

    $getPoints="SELECT points FROM participant_points WHERE userID=$userID";
    $queryGetPoints=mysqli_query($conn,$getPoints);
    $points=mysqli_fetch_assoc($queryGetPoints);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../css/sidebar.css">
</head>
<body>
    <div class="title">
        <i class="fa-solid fa-bars"></i>
        <div onclick="window.location.href='/participant/home.php'" class="logo"><img width="150" src="../img/logo.png" alt=""></div>
        <div class="participantPoints"><i class="fa-solid fa-coins"></i>&nbsp<?php echo $points['points'];?></div>
    </div>
    <div class="sidebar">
        <i class="fa-solid fa-xmark"></i>
        <div class="profile">
            <div class="greeting"><?php echo "Hi," . $username;?></div>
        </div>
        <div class="home"><i class="fa-solid fa-house"></i>&nbsp;&nbsp;Home</div>
        <div class="about"><i class="fa-solid fa-circle-info"></i></i>&nbsp;&nbsp;About</div>
        <div class="myevents"><i class="fa-solid fa-calendar"></i>&nbsp;&nbsp;MyEvents</div>
        <div class="attendance"><i class="fa-solid fa-clock"></i>&nbsp;&nbsp;Attendance</div>
        <div class="badges"><i class="fa-solid fa-medal"></i>&nbsp;&nbsp;Badges</div>
        <div class="settings"><i class="fa-solid fa-gear"></i>&nbsp;&nbsp;Settings</div>
        <div class="analytics"><i class="fa-solid fa-chart-area"></i>&nbsp;&nbsp;Impact</div>
        <div class="leaderboard"><i class="fa-solid fa-ranking-star"></i>&nbsp;&nbsp;Leaderboard</div>
        <div class="logout"><i class="fa-solid fa-right-from-bracket"></i>&nbsp;&nbspLogout</div>
    </div>
</body>
<script src="../javascript/participantSidebar.js"></script>
</html>