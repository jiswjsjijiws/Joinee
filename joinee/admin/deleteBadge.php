<?php
    include("../config.php");
    $badgeID=$_GET['badgeID'];
    $deleteBadge="DELETE FROM badges WHERE badgeID=$badgeID";
    mysqli_query($conn,$deleteBadge);
    header("Location: /admin/badges.php");
    exit();
?>