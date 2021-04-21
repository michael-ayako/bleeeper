<span class="f_req">
<?php
include('../bleeeperphp/conn.php');
$_send=$_POST['id_sender'];
$_rec=$_POST['id_rec'];
$date1=date("Y-m-d H:i:s");

$ids=array();
array_push($ids,$_send);
array_push($ids,$_rec);

$check1="SELECT * FROM freind_req_tb WHERE id_sender='$_send' AND id_reciever='$_rec' AND state='3'";
$qchck1=mysqli_query($con,$check1);
$state1=mysqli_fetch_array($qchck1);
    if($state1['state']=='3'){
        echo "<div id='error_friend_req_2'><div class='title'><strong>Oops!</strong></div><div class='dialogmessage'>You have already blocked this person</div><div class='dialogmsgbuttons'><button style='width:130px;height:30px;border-style:none;'onclick='pscreen2();return false;'>OK</button></div></div>";
        }
        else if($state1['state']!='3'){
		
            
//nullify requests any friend request sent or follow  

$sql1="UPDATE freind_req_tb SET state='7' WHERE id_sender='$_send' AND id_reciever='$_rec' AND state NOT IN (3)";
$query1=mysqli_query($con,$sql1);

$sql11="UPDATE freind_req_tb SET state='7' WHERE id_sender='$_rec' AND id_reciever='$_send' AND state NOT IN (3)";
$query11=mysqli_query($con,$sql11);

//nullify friendships

$sql12="UPDATE freind_rel_tb SET state='7' WHERE id_sender='$_send' AND id_reciever='$_rec'";
$query1=mysqli_query($con,$sql12);

$sql112="UPDATE freind_rel_tb SET state='7' WHERE id_sender='$_rec' AND id_reciever='$_send'";
$query112=mysqli_query($con,$sql112);


//blocking the user by stating freindship as 3
$sql="INSERT INTO freind_req_tb(id_sender,id_reciever,state,date_of_req) VALUES('$_send','$_rec','3','$date1')";
$query=mysqli_query($con,$sql);

$sql3="INSERT INTO notificator_tb(id_sender,id_reciever,notification_type,notification_state,date_and_time) VALUES('$_send','$_rec','494','2','$date1')";
$query3=mysqli_query($con,$sql3);

echo "<div id='success_friend_req_1'><div class='title'><strong>Success!</strong></div><div class='dialogmessage'>You have successfully chased away that creep</div><div class='dialogmsgbuttons'><button style='width:130px;height:30px;border-style:none;'onclick='pscreen2();return false;'>OK</button></div></div>";
  
//update frq		
$sql1="SELECT * FROM freind_req_tb WHERE (id_reciever='$_send' AND id_sender='$_rec') OR (id_reciever='$_rec' AND id_sender='$_send')";
$query1=mysqli_query($con,$sql1);
while($res1=mysqli_fetch_array($query1)){

$id=$res1['id'];
$id_sender=$res1['id_sender'];
$state=$res1['state'];
$date_of_req=$res1['date_of_req'];


$output='[{"msgtype":"frql","id":"'.$id.'","id_sender":"'.$id_sender.'","state":"'.$state.'","date_of_req":"'.$date_of_req.'"}]';

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
//update frl
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
$message='[{"msgtype":"notific","from":"'.$names.'","not":"has just blocked from accessing their account"}]';

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
?>
