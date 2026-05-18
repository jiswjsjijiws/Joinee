<?php
    include("../config.php");
    session_start();
    $username=$_SESSION['username'];
    $thumbnailToDelete=json_decode(urldecode($_GET['thumbnailToDelete']),true);
    $thumbnail= "'".implode("','",$thumbnailToDelete)."'";
   

    if(!empty($thumbnailToDelete)){
        $deleteThumbnail="DELETE FROM thumbnails WHERE thumbnail IN($thumbnail)";
        mysqli_query($conn,$deleteThumbnail);
        for($i=0;$i<count($thumbnailToDelete);$i++){
            $filepath='../thumbnails/'.$thumbnailToDelete[$i];
            unlink($filepath);
        }
        header("Location: /organizer/home.php");
        exit();
    }
?>

</body>
<script src="../javascript/editEvent.js"></script>
</html>