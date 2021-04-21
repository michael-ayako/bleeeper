<?php
ob_start();
session_start();
include('../bleeeperphp/conn.php');
include('../bleeeperphp/time.php');
$x=0;
$q=0;
$id[]=$rid[]=$date1[]=NULL;
$user_id=base64_decode($_SESSION['id']);
$sid[]=$msgdate[]=$names[]=$chkid[]=NULL;
$_id=NULL;

	$sql7 = "SELECT * FROM msg_tb WHERE id_reciever='$user_id' OR id_sender='$user_id' ORDER BY DATE DESC";
	$query27=mysqli_query($con,$sql7);
 
    
    while($res3=mysqli_fetch_array($query27)){
	$date11=not_ago($res3['date']);
	
	
	
	if($res3['id_reciever']==$user_id)
	{$_id=$res3['id_sender'];}
	else
	{$_id=$res3['id_reciever'];}
	
	if(isset($chkid[$_id])){
	continue;
	}
	else{
	$chkid[$_id]=$_id;
	
	$sql1="SELECT * FROM profiling_tb WHERE id='$_id'";
    $query1=mysqli_query($con,$sql1);
    $res=mysqli_fetch_array($query1);
   
    $fname=$res['first_name'];
    $mname=$res['middle_name'];
    $lname=$res['last_name'];
    $username=$res['username'];
	
	/*Pic fetch*/
			$idz=$res['id'];
			$sql="SELECT * FROM  ppic_tb WHERE user_id='$idz' AND ppic_state='1'";
			$qchck=mysqli_query($con,$sql);
			$dir="./bleeeperimg/blankuserimg.jpg";
			$dircatch=NULL;
			while($qv=mysqli_fetch_array($qchck)){
			$ppic=$qv['ppic_link'];
			$dircatch="../file_data/".$idz."/".$ppic;
			}
			if($dircatch!=NULL){
			$dir=$dircatch;
			}
			/*Pic fetch*/
    
    if($fname == NULL && $mname == NULL && $lname == NULL)
    $names=$username;
    else
    $names=$fname." ".$mname." ".$lname;
	$state=NULL;
	
    if ($res3['id_sender']==$user_id){
    $state="(sent)";
    if($res3['msg_state_send']=="2"  ){?>
    <div id="msgread" onClick="viewthread('<?php echo $_id?>','<?php echo $names?>')">
    <div id="sender_image"><img src="<?php echo $dir;?>"  width="30px" height="30px"></div>
    <div id="sender_name"><?php echo $names.' '.$state; ?></div>
    <div id="sender_message"><?php echo substr($res3['message'],0,40)."....";?></div>
    <div id="sender_date"><?php echo $date11;?></div>
    </div>
    <?php
    }
    }
    else if ($res3['id_reciever']==$user_id){
    $state="(reply)";
    if($res3['msg_state_rec']=="1"  ){?>
    <div id="msgunread" onClick="viewthread('<?php echo $_id?>','<?php echo $names?>')">
    <div id="sender_image"><img src="<?php echo $dir;?>"  width="30px" height="30px"></div>
    <div id="sender_name"><?php echo $names.' '.$state; ?></div>
    <div id="sender_message"><?php echo substr($res3['message'],0,40)."....";?></div>
    <div id="sender_date"><?php echo $date11;?></div>
    </div>
    <?php
    }
    else{?>
    <div id="msgread" onClick="viewthread('<?php echo $_id?>','<?php echo $names?>')">
    <div id="sender_image"><img src="<?php echo $dir;?>"  width="30px" height="30px"></div>
    <div id="sender_name"><?php echo $names.' '.$state; ?></div>
    <div id="sender_message"><?php echo substr($res3['message'],0,40)."....";?></div>
    <div id="sender_date"><?php  echo $date11;?></div>
    </div>
    <?php
    }
    }
	}
    }
    
?>



