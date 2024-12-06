<?php
include 'partials/dbconnect.php';
$roomName=$_POST['roomName'];
$sql="SELECT * FROM `messages` WHERE roomName='$roomName'";
$messages="";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_assoc($result)){
        $messages=$messages.'<div class="message">
                <span class="username">'.$row['Sender'].':</span>
                <div class="message-content">'.$row['Message'].'</div>
                <div class="meta">
                    <span class="ip-address">ip address: '.$row['ip'].'</span>
                    <span class="message-time">'.$row['timestamp'].'</span>
                </div>
            </div>';
    }
}
echo $messages;
?>