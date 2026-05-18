<?php
    include("config.php");
    session_start();
    $username=$_SESSION['username'];
    $userID=$_SESSION['userID'];
    $role=$_SESSION['role'];
    $errormessage='';
    function getCreds(){
        global $conn,$userID;
        $getCreds="SELECT * FROM users WHERE userID=$userID";
        $queryGetCreds=mysqli_query($conn,$getCreds);
        $creds=mysqli_fetch_assoc($queryGetCreds);

        return $creds;
    }

    if(isset($_POST['save'])){
        $pic=$_FILES['pic'];
        $newUsername=$_POST['newUsername'];
        $newPassword=$_POST['newPassword'];

        if(!empty($pic)){
            $picname=$_FILES['pic']['name'];
            $tempname=$_FILES['pic']['tmp_name'];
            $folder='img/'.$picname;
            if(move_uploaded_file($tempname,$folder)){
                $insert_profilePic="UPDATE users SET profilePic='$picname' WHERE userID=$userID";
                mysqli_query($conn,$insert_profilePic);
            }
        }
        $changeCreds="UPDATE users SET username='$newUsername',password='$newPassword' WHERE userID=$userID";
        mysqli_query($conn,$changeCreds);
        header("Location: /logout.php");
        exit();
    }

    if(isset($_POST['deleteBtn'])){
        $confirmPassword=$_POST['confirmPassword'];
        $checkPassword="SELECT * FROM users WHERE password='$confirmPassword' AND userID=$userID";
        $queryCheck=mysqli_query($conn,$checkPassword);
        
        if(mysqli_num_rows($queryCheck)==1){
            $deleteAcc="DELETE FROM users WHERE userID=$userID";
            mysqli_query($conn,$deleteAcc);
            header("Location: /index.php");
            exit();
        }
        else{
            header("Location: /settings.php");
            exit();
        }
    }

    if(isset($_POST['back'])){
        if($role=='admin'){
            header("Location: /admin/home.php");
            exit();
        }
        else if($role=='organizer'){
            header("Location: /organizer/home.php");
            exit();
        }
        else if($role=='participant'){
            header("Location: /participant/home.php");
            exit();
        }
    }

    $creds=getCreds();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/settings.css">
    <title>Home</title>
</head>
<body>
    <div class="title">
        <div class="logo"><img width="150" src="img/logo.png" alt=""></div>
    </div>
    <p class="settings">Settings</p>
    <div class="grid">
        <div class="userSettings">
            <div class="accountDetails">Account Details</div>
            <div class="editAccount">Edit Account</div>
            <div class="deleteAccount">Delete Account</div>
        </div>
        <div class="content">
            <div class="profilePic">
                <h2>Profile Picture</h2>
                <img src="img/<?php echo $creds['profilePic']?>" alt="">
                <div class="username">
                    <h2>Username</h2>
                    <input readonly class="readUsername" name="username" type="text" value="<?php echo $creds['username'];?>">
                </div>
                <div class="password">
                    <h2>Password</h2>
                    <input readonly class="readPassword" name="password" type="password" value="<?php echo $creds['password'];?>">
                </div>
                <label for=""><input type="checkbox" class="reveal"> Show Password</label>
            </div>
        </div>
        <div class="changeContent">
            <form method="post" enctype="multipart/form-data">
                <div class="profilePic">
                    <h2>Profile Picture</h2>
                    <img src="img/<?php echo $creds['profilePic']?>" alt=""><br>
                    <input type="file" name="pic" accept="image/*" id="pic" hidden>
                    <label name="pic" for="pic" class="change">change</label>
                </div>

                <div class="username">
                    <h2>Username</h2>
                    <input class="newUsername" name="newUsername" type="text" value="<?php echo $creds['username'];?>">
                </div>
                <div class="password">
                    <h2>Password</h2>
                    <input class="newPassword" name="newPassword" type="password" value="<?php echo $creds['password'];?>">
                </div>
                <input class="save" name="save" type="submit" value="save">
            </form>
            <div class="errorspace"></div>
        </div>

        <div class="deleteAcc">
            <form method="post">
                <h2>Account Deletion</h2>
                <ul class="disclaimer">
                    <h3>Disclaimer</h3>
                    <li>Deleting your account will result in all your data being permanently deleted</li>
                    <li>You will lose access to services that are associated with this account</li>
                    <li>This action is irreversible</li>
                    <li>Make sure to consider before deleting your account</li>
                </ul>
                <h2>Password</h2>
                <input type="password" name="confirmPassword" class="confirmPassword"><br>
                <input type="submit" name="deleteBtn" class="deleteBtn" value="delete">
            </form>
            <div class="dltErrorspace"><?php echo $errormessage;?></div>
        </div>
    </div>
    <form method="post">
        <button name="back" class="back">back</button>
    </form>
</body>
<script src="javascript/orgSidebar.js"></script>
<script src="javascript/settings.js"></script>
</html>