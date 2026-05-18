<?php
    include("../config.php");
    session_start();
    $username=$_SESSION['username'];
    $userID=$_SESSION['userID'];

    $getProfilePic="SELECT * FROM users WHERE userID=$userID";
    $queryGetProfilePic=mysqli_query($conn,$getProfilePic);
    $profilePic=mysqli_fetch_assoc($queryGetProfilePic);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../css/sidebar.css">
    <title>Home</title>
</head>
<body>
    <div class="title">
        <i class="fa-solid fa-bars"></i>
        <div onclick="window.location.href='/organizer/home.php'" class="logo"><img width="150" src="../img/logo.png" alt=""></div>
        <div><img class="userPic" src="../img/<?php echo $profilePic['profilePic']?>" alt=""></div>
    </div>
    <div class="sidebar">
        <i class="fa-solid fa-xmark"></i>
        <div class="profile">
            <div class="greeting"><?php echo "Hi," . $username?></div>
        </div>
        <div class="home"><i class="fa-solid fa-house"></i>&nbsp;&nbsp;Home</div>
        <div class="create"><i class="fa-solid fa-plus"></i>&nbsp;&nbsp;Create</div>
        <div class="myevents"><i class="fa-solid fa-calendar"></i>&nbsp;&nbsp;Events</div>
        <div class="attendance"><i class="fa-solid fa-clock"></i>&nbsp;&nbsp;Attendance</div>
        <div class="settings"><i class="fa-solid fa-gear"></i>&nbsp;&nbsp;Settings</div>
        <div class="logout"><i class="fa-solid fa-right-from-bracket"></i>&nbsp;&nbspLogout</div>
    </div>    
</body>
<script src="../javascript/orgSidebar.js"></script>
</html>