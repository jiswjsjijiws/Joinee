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
</head>
<body>
    <div class="title">
        <i class="fa-solid fa-bars"></i>
        <div onclick="window.location.href='/admin/home.php'" class="logo"><img src="../img/logo.png" alt=""></div>
        <div><img class="userPic" src="../img/<?php echo $profilePic['profilePic']?>" alt=""></div>
    </div>
    <div class="sidebar">
        <i class="fa-solid fa-xmark"></i>
        <div class="profile">
            <div class="greeting"><?php echo "Hi," . $username;?></div>
        </div>
        <div class="home"><i class="fa-solid fa-house"></i>&nbsp;&nbsp;Home</div>
        <div class="requests"><i class="fa-solid fa-envelope"></i>&nbsp;&nbsp;Requests</div>
        <div class="myevents"><i class="fa-solid fa-calendar"></i>&nbsp;&nbsp;Events</div>
        <div class="accounts"><i class="fa-solid fa-user"></i>&nbsp;&nbsp;Accounts</div>
        <div class="settings"><i class="fa-solid fa-gear"></i>&nbsp;&nbsp;Settings</div>
        <div class="badges"><i class="fa-solid fa-medal"></i>&nbsp;&nbsp;Badges</div>
        <div class="analytics"><i class="fa-solid fa-chart-area"></i>&nbsp;&nbsp;Analytics</div>
        <div class="logout"><i class="fa-solid fa-right-from-bracket"></i>&nbsp;&nbspLogout</div>
    </div>
</body>
<script src="../javascript/adminSidebar.js"></script>
</html>