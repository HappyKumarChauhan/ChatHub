<?php
$sender=$_POST['sender'];
$message=$_POST['message'];
$roomName=$_POST['roomName'];
$ip=$_POST['ip'];
include 'partials/dbconnect.php';
$sql="INSERT INTO `messages` (`Sender`, `Message`, `roomName`, `ip`, `timestamp`) VALUES ('$sender', '$message', '$roomName', '$ip', current_timestamp());";
$result=mysqli_query($conn,$sql);
?>