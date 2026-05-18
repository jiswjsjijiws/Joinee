<?php
    include("config.php");
    session_start();
    $username=$_SESSION['username'];
    $userID=$_SESSION['userID'];

    $deleteAcc="DELETE FROM users WHERE userID=$userID";
    mysqli_query($conn,$deleteAcc);
    header("Location: /index.php");
    exit();
?>
</body>
</html>