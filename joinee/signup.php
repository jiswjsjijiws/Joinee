<?php
    include("config.php");
    $errormessage='';
    if(isset($_POST['submit'])){
        $username=$_POST['username'];
        $password=$_POST['password'];
        $confirmPassword=$_POST['confirmPassword'];
        

        if(empty($username)||empty($password)||empty($confirmPassword)){
            $errormessage='All fields are required';
        }
        else{
            if($password==$confirmPassword){
                $checkCreds="SELECT * FROM users WHERE username='$username'";
                $queryCheckCreds=mysqli_query($conn,$checkCreds);
                $credsExist=mysqli_num_rows($queryCheckCreds);
                if($credsExist>=1){
                    $errormessage='Username exists';
                }
                else{
                    $setCreds="INSERT INTO users(username,password,role) VALUES('$username','$password','participant')";
                    if(mysqli_query($conn,$setCreds)){
                        $userID=mysqli_insert_id($conn);
                        $openPoints="INSERT INTO participant_points(userID) VALUES($userID)";
                        mysqli_query($conn,$openPoints);
                        header("Location: /index.php");
                        exit();
                    }
                }
            }
            else{
                $errormessage='Password fields dont match';
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/login.css">
    <title>Login</title>
</head>
<body>
    <div class="title">
        <div class="logo"><img width="150" src="img/logo.png" alt=""></div>
       
    </div>
    <div class="login">
       <h1 class="loginTitle">Signup</h1>
       <h3 class="tagline">Search.Participate.Impact</h3>
       <form method="post">
            <input class="username" placeholder="Username" name="username" type="text"><br>
            <input class="password" placeholder="Password" name="password" type="password"><br>
            <input class="password" placeholder="Confirm Password" name="confirmPassword" type="password"><br>
            <p onclick="window.location.href='/organizer/signupReq.php'" class="hyperlinks">Sign up as an Organizer</p>
            <input name="submit" class="signup" type="submit" value="Signup">
            <p onclick="window.location.href='/index.php'" class="hyperlinks">Already a user? log in</p>
       </form>
       <div class="errorspace">
            <?php
                echo $errormessage;
            ?>
       </div>
    </div>


   
    
</body>
</html>