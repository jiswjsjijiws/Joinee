<?php
    include("../config.php");
    include("topBar.php");
    $getUsers="SELECT * FROM users";
    $queryUsers=mysqli_query($conn,$getUsers);
    $count=1;

    function checkCount($username){
        $numUsernames=mysqli_num_rows($username);
        return $numUsernames;
    } 

    if(isset($_POST['submit'])){
        $role=$_POST['roles'];
        $usernameSearch=$_POST['username'];
        $getUsers="SELECT * FROM users WHERE role='$role'";
        $getUsersByUsername="SELECT * FROM users WHERE role='$role' AND username='$usernameSearch'";
        if(empty($usernameSearch)){
            $queryUsers=mysqli_query($conn,$getUsers);
        }
        else{
            $queryUsers=mysqli_query($conn,$getUsersByUsername);
        }
        
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
    <div class="displayAccounts">
        <form method="post">
            <div class="selectRole">
                <h2>Select a role</h2>
                <select class="roles" name="roles" id="">
                    <option value="admin">Admin</option>
                    <option value="participant">participant</option>
                    <option value="organizer">organizer</option>
                </select>
                
            </div>

            <div class="usernameSearch">
                <h2>Search by username</h2>
                <input type="text" name="username">
            </div>
            <input class="submit" name="submit" type="submit" value="submit">
        </form>

        <table class="userList">
            <thead>
                <tr>
                    <th></th>
                    <th class="userTH">Username</th>
                    <th>Role</th>
                    <th>&nbsp</th>
                    <th>&nbsp</th>
                </tr>
            </thead>
            <tbody>
                <?php if(checkCount($queryUsers)!=0):?>
                    <?php while($usernames=mysqli_fetch_assoc($queryUsers)):?>
                        <tr>
                            <td><img class="profilePic" src="../img/<?php echo $usernames['profilePic']?>" alt=""></td>
                            <td class="usernames"><?php echo $usernames['username']?></td>
                            <td class="role"><?php echo $usernames['role']?></td>
                            <td><button onclick="window.location.href='/admin/manageAccounts.php?userID=<?php echo urlencode($usernames['userID']);?>'" class="edit">edit</button></td>
                            <td class="delete"><i onclick="window.location.href='/admin/deleteAccount.php?userID=<?php echo urlencode($usernames['userID']);?>'" class="fa-solid fa-trash"></i></td>
                        </tr>
                    <?php endwhile;?>
                <?php else:?>
                    <tr>
                        <td class="count"></td>
                        <td class="signupUsername">No users yet</td>
                    </tr>
                <?php endif;?>
            </tbody>
        </table>
</body>
</html>