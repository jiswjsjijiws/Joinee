<?php
    include("../config.php");
    include("topBar.php");
    $currentUser=$_SESSION['username'];
    $getLeaderboard="SELECT users.profilePic,users.username,COUNT(attendance.userID) AS userAttendance FROM users INNER JOIN attendance ON users.userID=attendance.userID GROUP BY users.username ORDER BY userAttendance DESC";
    $queryUsers=mysqli_query($conn,$getLeaderboard);
    $count=1;

    $getPosition = "SELECT position FROM(SELECT users.username,ROW_NUMBER() OVER (ORDER BY COUNT(attendance.eventID) DESC) AS position FROM users INNER JOIN attendance ON users.userID = attendance.userID GROUP BY users.userID)AS leaderboard WHERE username='$currentUser';";
    $queryGetPosition=mysqli_query($conn,$getPosition);
    $positionRow=mysqli_fetch_assoc($queryGetPosition);
    $position=$positionRow['position']??"Not Ranked";

    function checkCount($username){
        $numUsernames=mysqli_num_rows($username);
        return $numUsernames;
    } 

    function getRank($conn,$currentUser,$category){
        if($category=='all'){
            global $positionRow;
            return $positionRow['position']??"Not Ranked";;
        }
        else{
            $getLeaderboardByCategory="SELECT users.profilePic,users.username,COUNT(attendance.userID) AS userAttendance FROM users INNER JOIN attendance ON users.userID=attendance.userID INNER JOIN events ON attendance.eventID=events.eventID WHERE events.category='$category' GROUP BY users.username ORDER BY userAttendance DESC";
            $queryUsers=mysqli_query($conn,$getLeaderboardByCategory);

            $getPositionByCategory= "SELECT position FROM(SELECT users.username,ROW_NUMBER() OVER (ORDER BY COUNT(attendance.eventID) DESC) AS position FROM users INNER JOIN attendance ON users.userID = attendance.userID INNER JOIN events On attendance.eventID=events.eventID WHERE events.category='$category' GROUP BY users.userID)AS leaderboard WHERE username='$currentUser';";
            $queryGetPositionByCategory=mysqli_query($conn,$getPositionByCategory);
            $positionRowByCategory=mysqli_fetch_assoc($queryGetPositionByCategory);
            
            return $positionRowByCategory['position']??"Not Ranked";
        }
    }


    if(isset($_POST['submit'])){
        $category=$_POST['category'];
        $position=getRank($conn,$currentUser,$category);

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
                <h2>Select a category</h2>
                <select class="roles" name="category" id="">
                    <option value="all">All</option>
                    <option value="Waste and Recycling">Waste and Recycling</option>
                    <option value="Food and Entertainment">Food and Entertainment</option>
                    <option value="Education">Education</option>
                    <option value="Green Businesses">Green Businesses</option>
                    <option value="Community and Nature">Community and Nature</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <input class="submit" name="submit" type="submit" value="submit">
        </form>
        

        <table class="userList">
            <h2 class="rank">Your Rank: <?php echo $position;?></h2>
            <thead>
                <tr>
                    <th class="no">No.</th>
                    <th class="a">Username</th>
                </tr>
            </thead>
            <tbody>
                <?php if(checkCount($queryUsers)!=0):?>
                    <?php while($usernames=mysqli_fetch_assoc($queryUsers)):?>
                        <tr>
                            <td><?php echo $count++?></td>
                            <td class="userDetails"><img class="profilePic" src="../img/<?php echo $usernames['profilePic']?>" alt=""><?php echo $usernames['username']?></td>
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