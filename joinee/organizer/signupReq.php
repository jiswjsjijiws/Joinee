<?php
    include("../config.php");
    $errormessage='';
    if(isset($_POST['next'])){
        $username=urlencode($_POST['username']);
        $password=urlencode($_POST['password']);
        $name=urlencode($_POST['name']);
        $tpnumber=urlencode($_POST['tpnumber']);
        

        if(empty($username)||empty($password)||empty($name)||empty($tpnumber)){
            $errormessage='All fields are required';
        }
        else{
            $checkCreds="SELECT * FROM users WHERE username='$username'";
            $queryCheckCreds=mysqli_query($conn,$checkCreds);
            $credsExist=mysqli_num_rows($queryCheckCreds);
            if($credsExist>=1){
                $errormessage='Username exists. Choose another one';
            }
            else{
                header("Location: /organizer/signupReq2.php?username=$username&password=$password&name=$name&tpnumber=$tpnumber");
                exit();
            }
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
       <h1 class="loginTitle">Organizer Signup</h1>
       <h3 class="tagline">Search.Participate.Impact</h3>
       <form method="post">
            <input class="username" placeholder="Username" name="username" type="text"><br>
            <input class="password" placeholder="Password" name="password" type="password"><br>
            <input class="tpnumber" placeholder="tpnumber" name="tpnumber" type="text"><br>
            <input class="name" placeholder="Name" name="name" type="text"><br>
            <input name="next" class="submit" type="submit" value="next">
       </form>
       <div class="errorspace">
            <?php
                echo $errormessage;?>
       </div>
    </div> 
</body>
</html>