<?php
include('../bleeeperphp/conn.php');
$sid=$_POST['id_sender'];
$rid=$_POST['id_rec'];
$date1=date("Y-m-d H:i:s");

$sql="UPDATE freind_req_tb SET state='6' WHERE id_sender='$sid' AND id_reciever='$rid' AND state='3'";
$query=mysqli_query($con,$sql);

$sql3="INSERT INTO notificator_tb(id_sender,id_reciever,notification_type,notification_state,date_and_time) VALUES('$sid','$rid','595','2','$date1')";
$query3=mysqli_query($con,$sql3);

echo "<div id='success_friend_req_1'><div class='title'><strong>Success!</strong>Unblocked</div><div class='dialogmessage'>You have successfully unblocked this user</div><div class='dialogmsgbuttons'><button style='width:130px;height:30px;border-style:none;'onclick='pscreen2();return false;'>OK</button></div></div>";



//sending notifications
$sql22="SELECT * FROM profiling_tb WHERE id = '$rid'";
$res22 = mysqli_query($con,$sql22);
while($result88=mysqli_fetch_array($res22))
{
$dev=$result88['userdevice_number'];
if($dev!=""){

$sql77="SELECT * FROM profiling_tb WHERE id='$sid'";
$query77=mysqli_query($con,$sql77);    
$res77=mysqli_fetch_array($query77);

if($res77['first_name']==NULL && $res77['middle_name']==NULL && $res77['last_name']==NULL)
$names=$res77['username'];
else{
$names=$res77['first_name']." ".$res77['middle_name']." ".$res77['last_name'];
}
$message='[{"msgtype":"notific","from":"'.$names.'","not":"has just unblocked you"}]';

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
?>