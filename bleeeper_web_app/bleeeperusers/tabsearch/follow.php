<?php
include('../bleeeperphp/conn.php');
$_send=$_POST['id_sender'];
$_rec=$_POST['id_rec'];
$date1=date("Y-m-d H:i:s");
$ids=array();
array_push($ids,$_send);
array_push($ids,$_rec);

$x=0;
$check="SELECT * FROM freind_req_tb WHERE id_sender='$_send' AND id_reciever='$_rec' AND state='5'";
$qchck=mysqli_query($con,$check);
$state=mysqli_fetch_array($qchck);
    if($state['state']=='5'){
        echo "<div id='error_friend_req_2'><div class='title'><strong>Oops!</strong></div><div class='dialogmessage'>You are already following this person</div><div class='dialogmsgbuttons'><button style='width:130px;height:30px;border-style:none;'onclick='pscreen2();return false;'>OK</button></div></div>";        
        }
        else if($state['state']!='5')
        {
$check1="SELECT * FROM freind_req_tb WHERE id_sender='$_rec' AND id_reciever='$_send' AND state='3'";
$qchck1=mysqli_query($con,$check1);
$state1=mysqli_fetch_array($qchck1);
    if($state1['state']=='3'){
        echo "<div id='error_friend_req_1'><div class='title'><strong>HAHA!</strong></div><div class='dialogmessage'>You were blocked by this user</div><div class='dialogmsgbuttons'><button style='width:130px;height:30px;border-style:none;'onclick='pscreen2();return false;'>OK</button></div></div>";
        }
        else if($state1['state']!='3'){
$check2="SELECT * FROM freind_req_tb WHERE id_sender='$_send' AND id_reciever='$_rec' AND state='3' ";
$qchck2=mysqli_query($con,$check2);
$state2=mysqli_fetch_array($qchck2);
    if($state2['state']=='3'){
        echo "<div id='error_friend_req_1'><div class='title'><strong>Oops!</strong></div><div class='dialogmessage'>This person is on your blocked persons list. To fix this go to your settings</div><div class='dialogmsgbuttons'><button style='width:130px;height:30px;border-style:none;'onclick='pscreen2();return false;'>OK</button></div></div>";
        }
        else if($state2['state']!='3'){
//indication of following in frend req_tb
$sql="INSERT INTO freind_req_tb(id_sender,id_reciever,state,date_of_req) VALUES('$_send','$_rec','5','$date1')";
$query=mysqli_query($con,$sql);
//indication of follower in frend rel tb
$sql2="INSERT INTO freind_rel_tb(id_sender,id_reciever,state,date_and_time) VALUES('$_send','$_rec','2','$date1')";
$query2=mysqli_query($con,$sql2);

$sql3="INSERT INTO notificator_tb(id_sender,id_reciever,notification_type,notification_state,date_and_time) VALUES('$_send','$_rec','3','2','$date1')";
$query3=mysqli_query($con,$sql3);



echo "<div id='success_friend_req_1'><div class='title'><strong>Success!</strong></div><div class='dialogmessage'>You are now following this person.</div><div class='dialogmsgbuttons'><button style='width:130px;height:30px;border-style:none;'onclick='pscreen2();return false;'>OK</button></div></div>";
    
//frl update
$sql2="SELECT * FROM freind_rel_tb WHERE (id_reciever='$_send' AND id_sender='$_rec') OR (id_reciever='$_rec' AND id_sender='$_send')";
$query2=mysqli_query($con,$sql2);

while($res2=mysqli_fetch_array($query2)){
$id=$res2['id'];
$id_sender=$res2['id_sender'];
$id_reciever=$res2['id_reciever'];
$state=$res2['state'];
$date_and_time = $res2['date_and_time'];
$output='[{"msgtype":"frrl","id":"'.$id.'","id_sender":"'.$id_sender.'","id_reciever":"'.$id_reciever.'","state":"'.$state.'","date_and_time":"'.$date_and_time.'"}]';

$ar=count($ids);
for($i=0;$i<$ar;$i++)
{
$sql22="SELECT * FROM profiling_tb WHERE id = '".$ids[$i]."'";
$res22 = mysqli_query($con,$sql22);
while($result88=mysqli_fetch_array($res22))
{
$dev=$result88['userdevice_number'];
if($dev!=""){
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
$resultpostfollow = curl_exec($ch);
curl_close($ch);

}
}
}
}
//sending notifications
$sql22="SELECT * FROM profiling_tb WHERE id = '$_rec'";
$res22 = mysqli_query($con,$sql22);
while($result88=mysqli_fetch_array($res22))
{
$dev=$result88['userdevice_number'];
if($dev!=""){

$sql77="SELECT * FROM profiling_tb WHERE id='$_send'";
$query77=mysqli_query($con,$sql77);    
$res77=mysqli_fetch_array($query77);

if($res77['first_name']==NULL && $res77['middle_name']==NULL && $res77['last_name']==NULL)
$names=$res77['username'];
else{
$names=$res77['first_name']." ".$res77['middle_name']." ".$res77['last_name'];
}
$message='[{"msgtype":"notific","from":"'.$names.'","not":"is now following you"}]';

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
}
}
}
?>
