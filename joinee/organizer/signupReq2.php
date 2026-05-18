<?php
    include("../config.php");
    $errormessage='';
    if(isset($_POST['submit'])){
        $username=$_GET['username'];
        $password=$_GET['password'];
        $name=$_GET['name'];
        $tpnumber=$_GET['tpnumber'];
        $purpose=$_POST['purpose'];
        

        if(empty($purpose)){
            $errormessage='All fields are required';
        }
        else{
            $sendRequest="INSERT INTO requests(username,password,name,tpnumber,purpose) VALUES('$username','$password','$name','$tpnumber','$purpose')";
            mysqli_query($conn,$sendRequest);
            header("Location: /organizer/requestConfirmation.php");
            exit();
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../css/login.css">
    <title>Login</title>
</head>
<body>
    <div class="title">
        <div class="logo"><img width="150" src="../img/logo.png" alt=""></div>
       
    </div>
    <div class="login">
       <form method="post">
            <h3>Why do you want to be an organizer?</h3>
            <textarea name="purpose" class="purpose"></textarea><br>
            <input name="submit" class="submit" type="submit" value="submit">
       </form>
       <div class="errorspace">
            <?php
                echo $errormessage;
            ?>
       </div>
    </div>


   
    
</body>
</html>