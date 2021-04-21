<?php
ob_start();
session_start();
include('../bleeeperphp/conn.php');
include('../bleeeperphp/time.php');
$sen=base64_decode($_SESSION['id']);        
$rec=$_POST['id'];
$name=$_POST['name'];
$q=0;
$sql="SELECT * FROM msg_tb WHERE (id_sender= '$sen' AND id_reciever='$rec') OR (id_sender= '$rec' AND id_reciever='$sen') ORDER BY DATE DESC LIMIT 20";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result)){
$date11=not_ago($row['date']);
if($q>=mysqli_num_rows($result)){
    break;
    }
    else{
     if($row['id_sender']== $sen){?>
    <div id="msg_user_sent">
    <span style="font-size:16px;font-weight:lighter">Me, <br/></span>
    <span style="font-size:16px;font-weight:500;"><?php echo $row['message']?>,<br/></span>
    <span style="font-size:10px;font-weight:lighter"><?php echo $date11;?>.</span>
    </div>
    <?php 
    }else if($row['id_sender']== $rec){
    ?>
    <div id="msg_user_recieved">
    <span style="font-size:16px;font-weight:lighter"><?php echo $name?>, <br/></span>
    <span style="font-size:16px;font-weight:500;"><?php echo $row['message']?>,<br/></span>
    <span style="font-size:10px;font-weight:lighter"><?php echo $date11;?>.</span>
    </div>
    <?php
    $msg=$row['message'];
    $sql="UPDATE msg_tb SET msg_state_rec='2' WHERE id_reciever='$sen' AND id_sender='$rec' AND msg_state_rec='1' AND msg_state_send='2' AND message='$msg'";
    $query=mysqli_query($con,$sql);
    
    }
    }
}
?>