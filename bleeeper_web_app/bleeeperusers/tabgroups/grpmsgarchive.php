<?php
ob_start();
session_start();
?>
<div style="width: 66%;margin-left: 15%;overflow-y: scroll;margin-top: 12px;">
<?php
include('../bleeeperphp/conn.php');
include('../bleeeperphp/time.php');
$sid=base64_decode($_SESSION['id']);        
$gid=$_POST['grpid'];
$q=0;

$sql="SELECT * FROM grp_msg_tb WHERE group_id='$gid' ORDER BY DATE_AND_TIME DESC LIMIT 20";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result)){
if($q>=mysqli_num_rows($result)){
    break;
    }
    else{  
    $q++;  
    $msgsnder=$row['sender_id'];
	$sql="SELECT * FROM profiling_tb WHERE id = '$msgsnder'";
	$query=mysqli_query($con,$sql);
	$res=mysqli_fetch_array($query);




	if($res['first_name']==NULL && $res['middle_name']==NULL && $res['last_name']==NULL)
	$nm=$res['username'];
	else{
	$nm=$res['first_name']." ".$res['middle_name']." ".$res['last_name'];
	}
	$date11=not_ago($row['date_and_time']);

	if($row['message_type']=='text'){
    if($row['sender_id']== $sid){?>
    <div id="msg_user_sent">
    <span style="font-size:16px;font-weight:lighter">Me,<br/></span>
    <span style="font-size:16px;font-weight:500;"><?php echo $row['context_message']?>,<br/></span>
    <span style="font-size:10px;font-weight:lighter"><?php echo $date11;?>.</span>
    </div>
    <?php 
    }else if($row['sender_id']!= $sid){
    ?>
    <div id="msg_user_recieved">
    <span style="font-size:16px;font-weight:lighter"><?php echo $nm?>, <br/></span>
    <span style="font-size:16px;font-weight:500;"><?php echo $row['context_message']?>,<br/></span>
    <span style="font-size:10px;font-weight:lighter"><?php echo $date11;?>.</span>
    </div>
    <?php
}
}if($row['message_type']=='file'){
    if($row['sender_id']== $sid){?>
    <div id="msg_user_sent">
    <span style="font-size:16px;font-weight:lighter">Me,<br/></span>
    <span style="font-size:16px;font-weight:500;">just uploaded a file named "<?php echo$row['file_share']?>" please head on to the shared filesection if you want to download it ,<br/></span>
    <span style="font-size:10px;font-weight:lighter"><?php echo $date11;?>.</span>
    </div>
    <?php 
    }else if($row['sender_id']!= $sid){
    ?>
    <div id="msg_user_recieved">
    <span style="font-size:16px;font-weight:lighter"><?php echo $nm?>, <br/></span>
    <span style="font-size:16px;font-weight:500;">just uploaded a file named "<?php echo$row['file_share']?>" please head on to the shared filesection if you want to download it ,<br/></span>
    <span style="font-size:10px;font-weight:lighter"><?php echo $date11;?>.</span>
    </div>
    <?php
}
}
}
}
?>
</div>