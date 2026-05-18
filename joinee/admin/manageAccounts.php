<?php
    include("../config.php");
    include("topBar.php");
    $manageuserID=$_GET['userID'];
    $getAccount="SELECT * FROM users WHERE userID=$manageuserID";
    $queryAccount=mysqli_query($conn,$getAccount);

    if(isset($_POST['saveChanges'])){
        $pic=$_FILES['pic'];
        $newUsername=$_POST['usernameInput'];
        $newPassword=$_POST['passwordInput'];
        if(!empty($pic)){
            $picname=$_FILES['pic']['name'];
            $tempname=$_FILES['pic']['tmp_name'];
            $folder='../img/'.$picname;
            if(move_uploaded_file($tempname,$folder)){
                $insert_profilePic="UPDATE users SET profilePic='$picname' WHERE userID=$manageuserID";
                mysqli_query($conn,$insert_profilePic);
            }
        }
        $saveChanges="UPDATE users SET username='$newUsername',password='$newPassword' WHERE userID=$manageuserID";
        mysqli_query($conn,$saveChanges);
        header("Location: /admin/viewAccounts.php");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/viewAccounts.css">
    <title>Home</title>
</head>
<body>
    <div class="userCreds">
        <?php while($account=mysqli_fetch_assoc($queryAccount)):?>
            <form method="post" enctype="multipart/form-data">  
                <div class="changeProfile">
                    <label for="">Profile Picture</label>
                    <img src="../img/<?php echo $account['profilePic']?>" alt="">
                    <input type="file" name="pic" accept="image/*" id="pic" hidden>
                    <label name="pic" for="pic" class="change">change</label>
                </div>
                <div class="username">
                    <label class="fieldTitle">Username</label>
                    <input name="usernameInput" class="usernameInput" type="text" value="<?php echo $account['username'];?>">
                </div>
                <div class="password">
                    <label class="fieldTitle">Password</label>
                    <input class="passwordInput" name="passwordInput" type="text" value="<?php echo $account['password'];?>">
                </div>
                <button name="saveChanges" class="saveChanges">Save Changes</button>
            </form>
            <div class="errorspace"></div>
        <?php endwhile;?>
    </div>
   
    
</body>
<script src="../javascript/manageAccounts.js"></script>
</html>