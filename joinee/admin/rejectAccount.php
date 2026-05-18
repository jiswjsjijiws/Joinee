<?php
    include("../config.php");
    $requestID=$_GET['requestID'];
    $getDetails="SELECT * FROM requests WHERE requestID=$requestID";
    $query=mysqli_query($conn,$getDetails);
    $details=mysqli_fetch_assoc($query);
    $username=$details['username'];
    $password=$details['password'];

    $removeFromrequest="DELETE FROM requests WHERE requestID=$requestID";
    mysqli_query($conn,$removeFromrequest);
    header("Location: /admin/requests.php");
    exit()
?>


