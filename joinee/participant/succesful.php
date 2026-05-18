<?php
    $message=$_GET['message']
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../css/attendance.css">
    <link rel="stylesheet" href="../css/sidebar.css">
    <title>Home</title>
</head>
<body>
    <div class="succesfulAttendance">
        <h2 class="message"><?php echo $message;?></h2>
        <img src="../img/greencheck.png" alt="">
        <button onclick="window.location.href='/participant/home.php'" class="submit">Back to Homepage</button>
    </div>
</body>
</html>