<?php
include('../bleeeperphp/conn.php');
$mid=$_POST['sid'];
$gid=$_POST['gid'];
$date1=date("Y-m-d H:i:s");



$check="SELECT * FROM group_data_information_tb WHERE id='$gid' AND groups_admin_id='$mid'";
$qchck=mysqli_query($con,$check);
$state=mysqli_fetch_array($qchck);

if($state['groups_admin_id']==$mid){
    echo "<div id='error_friend_req_2'><div class='title'><strong>Oops!</strong>Error </div><div class='dialogmessage'>Your the administrator of this group.</div><div class='dialogmsgbuttons'><button style='width:130px;height:30px;border-style:none;'onclick='pscreen2();return false;'>OK</button></div></div>";
}
else
{

$sql="UPDATE group_member_rel_tb SET state='2' WHERE group_id='$gid' AND user_id='$mid' AND state='1'";
$query=mysqli_query($con,$sql);

$check1="SELECT * FROM group_data_information_tb WHERE id='$gid'";
$qchck1=mysqli_query($con,$check1);
$state1=mysqli_fetch_array($qchck1);
$admin_id=$state1['groups_admin_id'];


$sql33="INSERT INTO notificator_tb(id_sender,id_reciever,notification_type,notification_state,DATE_AND_TIME) VALUES('$mid','$admin_id','11','2','$date1')";
$query33=mysqli_query($con,$sql33); 



echo "<div id='success_friend_req_1'><div class='title'><strong>Success!</strong>Left group</div><div class='dialogmessage'>You have successfully left the group.</div><div class='dialogmsgbuttons'><button style='width:130px;height:30px;border-style:none;'onclick='pscreen2();return false;'>OK</button></div></div>";


////GCM//////
	$sql="SELECT * FROM group_member_rel_tb WHERE group_id='$gid' AND user_id='$mid'";
	$query=mysqli_query($con,$sql);
	while($res2=mysqli_fetch_array($query)){
	$id=$res2['id'];
	$gid=$res2['group_id'];
	$uid=$res2['user_id'];
	$state=$res2['state'];
	$date=$res2['date_and_time'];

	$output='[{"msgtype":"gmrl","id":"'.$id.'","gid":"'.$gid.'","uid":"'.$uid.'","state":"'.$state.'","date":"'.$date.'"}]';
	$sql="SELECT * FROM profiling_tb WHERE id = '".$admin_id."'";
	$res = mysqli_query($con,$sql);
	while($result=mysqli_fetch_array($res))
	{
	$dev=$result['userdevice_number'];

	$fields=array(
					'registration_ids'  => array($dev),
					'data'              => array( "message" => $output ),
					);
	$headers = array( 
						'Authorization: key=' .$api,
						'Content-Type: application/json'
					);
					
	$ch = curl_init();

	curl_setopt( $ch, CURLOPT_URL, $url );
	curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
	curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode( $fields ) );
	$result = curl_exec($ch);
	curl_close($ch);
	}

	$sql="SELECT * FROM profiling_tb WHERE id = '".$mid."'";
	$res = mysqli_query($con,$sql);
	while($result=mysqli_fetch_array($res))
	{
	$dev=$result['userdevice_number'];
	$fields=array(
					'registration_ids'  => array($dev),
					'data'              => array( "message" => $output ),
					);
	$headers = array( 
						'Authorization: key=' .$api,
						'Content-Type: application/json'
					);
	$ch = curl_init();

	curl_setopt( $ch, CURLOPT_URL, $url );
	curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
	curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode( $fields ) );
	$result = curl_exec($ch);
	curl_close($ch);
	}
	}
	
	//sending notifications
	$sql22="SELECT * FROM profiling_tb WHERE id = '$admin_id'";
	$res22 = mysqli_query($con,$sql22);
	while($result88=mysqli_fetch_array($res22))
	{
	$dev=$result88['userdevice_number'];
	if($dev!=""){

	$sql77="SELECT * FROM profiling_tb WHERE id='$mid'";
	$query77=mysqli_query($con,$sql77);    
	$res77=mysqli_fetch_array($query77);

	if($res77['first_name']==NULL && $res77['middle_name']==NULL && $res77['last_name']==NULL)
	$names=$res77['username'];
	else{
	$names=$res77['first_name']." ".$res77['middle_name']." ".$res77['last_name'];
	}
	$message='[{"msgtype":"notific","from":"'.$names.'","not":"has left your group"}]';

	$fields=array(
					'registration_ids'  => array($dev),
					'data'              => array( "message" =>$message ),
					);
	$headers = array( 
						'Authorization: key=' .$api,
						'Content-Type: application/json'
					);
	$ch = curl_init();

	curl_setopt( $ch, CURLOPT_URL, $url );
	curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
	curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode( $fields ) );
	$resultpostnot = curl_exec($ch);
	curl_close($ch);
	}
	} 
	///GCM////
}

?>