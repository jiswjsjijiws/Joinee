<?php
    include("config.php");
    $errormessage='';
    if(isset($_POST['submit'])){
        $username=$_POST['username'];
        $password=$_POST['password'];
        
        if(empty($username)||empty($password)){
            $errormessage='All fields are required';
        }
        else{
            $getCreds="SELECT * FROM users WHERE username='$username' AND password='$password'";
            $creds=mysqli_query($conn,$getCreds);
            $data=mysqli_fetch_assoc($creds);
            $count=mysqli_num_rows($creds);

            if($count==1){
                if($data['role']=='organizer'){
                    session_start();
                    $_SESSION['userID']=$data['userID'];
                    $_SESSION['username']=$data['username'];
                    $_SESSION['role']=$data['role'];
                    header("Location: /organizer/home.php");
                    exit();
                }
                else if($data['role']=='admin'){
                    session_start();
                    $_SESSION['userID']=$data['userID'];
                    $_SESSION['username']=$data['username'];
                    $_SESSION['role']=$data['role'];
                    header("Location: /admin/home.php");
                    exit();
                }
                else if($data['role']=='participant'){
                    session_start();
                    $_SESSION['userID']=$data['userID'];
                    $_SESSION['username']=$data['username'];
                    $_SESSION['role']=$data['role'];
                    header("Location: /participant/home.php");
                    exit();
                }
            }
            else{
                $errormessage="Incorrect password or username";
            }           
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/login.css">
    <title>Login</title>
</head>
<body>
    <div class="title">
        <div class="logo"><img width="150" src="img/logo.png" alt=""></div>
    </div>
    <div class="login">
       <h1 class="loginTitle">Login</h1>
       <h3 class="tagline">Search.Participate.Impact</h3>
       <form method="post">
            <input class="username" placeholder="Username" name="username" type="text"><br>
            <input class="password" placeholder="Password" name="password" type="text"><br>
            <input name="submit" class="submit" type="submit" value="Login">
            <p onclick="window.location.href='/signup.php'" name="createAcc" class="createAcc">Create Account</p>
       </form>
       <div class="errorspace">
            <?php echo $errormessage;?>
       </div>
    </div>
</body>
</html>
