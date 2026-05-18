<?php
    include("../config.php");
    $userID=$_GET['userID'];
    $deleteUsers="DELETE FROM users WHERE userID=$userID";
    mysqli_query($conn,$deleteUsers);
    header("Location: /admin/viewAccounts.php");
    exit();
?>