<?php
session_start();
include('../bleeeperphp/conn.php');
$_send=$_POST['id_sender'];
$_rec=$_POST['id_rec'];
$date1=date("Y-m-d H:i:s");

$check="SELECT * FROM freind_req_tb WHERE id_sender='$_send' AND id_reciever='$_rec' AND state='4'";
$qchck=mysqli_query($con,$check);
$state=mysqli_fetch_array($qchck);
    if($state['state']=='4'){
        echo "<div id='error_friend_req_2'><div class='title'><strong>Oops!</strong></div><div class='dialogmessage'>You already sent a friend request.</div><div class='dialogmsgbuttons'><button style='width:130px;height:30px;border-style:none;'onclick='pscreen2();return false;'>OK</button></div></div>";
        }
        else if($state['state']!='4')
        {
$check="SELECT * FROM freind_req_tb WHERE id_sender='$_rec' AND id_reciever='$_send' AND state='4'";
$qchck=mysqli_query($con,$check);
$state=mysqli_fetch_array($qchck);
    if($state['state']=='4'){
        echo "<div id='error_friend_req_2'><div class='title'><strong>Oops!</strong></div><div class='dialogmessage'>This person already sent you a friend request. Check your friend requests.</div><div class='dialogmsgbuttons'><button style='width:130px;height:30px;border-style:none;'onclick='pscreen2();return false;'>OK</button></div></div>";
        }
        else if($state['state']!='4'){   
$check="SELECT * FROM freind_rel_tb WHERE id_sender='$_send' AND id_reciever='$_rec' AND state='1'";
$qchck=mysqli_query($con,$check);
$state=mysqli_fetch_array($qchck);
    if($state['state']=='1'){
        echo "<div id='error_friend_req_2'><div class='title'><strong>Oops!</strong></div><div class='dialogmessage'>This person is already your friend.</div><div class='dialogmsgbuttons'><button style='width:130px;height:30px;border-style:none;'onclick='pscreen2();return false;'>OK</button></div></div>";
        }
        else if($state['state']!='1'){
$check="SELECT * FROM freind_rel_tb WHERE id_sender='$_rec' AND id_reciever='$_send' AND state='1'";
$qchck=mysqli_query($con,$check);
$state=mysqli_fetch_array($qchck);
    if($state['state']=='1'){
        echo "<div id='error_friend_req_2'><div class='title'><strong>Oops!</strong></div><div class='dialogmessage'>This person is already your friend.</div><div class='dialogmsgbuttons'><button style='width:130px;height:30px;border-style:none;'onclick='pscreen2();return false;'>OK</button></div></div>";
        }
        else if($state['state']!='1'){
$check1="SELECT * FROM freind_req_tb WHERE id_sender='$_rec' AND id_reciever='$_send' AND state='3' ";
$qchck1=mysqli_query($con,$check1);
$state1=mysqli_fetch_array($qchck1);
    if($state1['state']=='3'){
        echo "<div id='error_friend_req_1'><div class='title'><strong>HAHA!</strong></div><div class='dialogmessage'>You are not able to connect with the user because you are blocked. Thank you</div><div class='dialogmsgbuttons'><button style='width:130px;height:30px;border-style:none;'onclick='pscreen2();return false;'>OK</button></div></div>";
        }
        else if($state1['state']!='3'){
$check2="SELECT * FROM freind_req_tb WHERE id_sender='$_send' AND id_reciever='$_rec' AND state='3' ";
$qchck2=mysqli_query($con,$check2);
$state2=mysqli_fetch_array($qchck2);
    if($state2['state']=='3'){
        echo "<div id='error_friend_req_1'><div class='title'><strong>Oops!</strong>Error</div><div class='dialogmessage'>You are not able to connect with the user because you blocked them. In order to connect remove the user from your blocked list</div><div class='dialogmsgbuttons'><button style='width:130px;height:30px;border-style:none;'onclick='pscreen2();return false;'>OK</button></div></div>";
        }
        else if($state2['state']!='3'){
$sql="INSERT INTO freind_req_tb(id_sender,id_reciever,state,date_of_req) VALUES('$_send','$_rec','4','$date1')";
$query=mysqli_query($con,$sql);
echo "<div id='success_friend_req_1'><div class='title'><strong>Success!</strong>Friend Request sent</div><div class='dialogmessage'>Your friend request was sent successfully. Wait for a reply</div><div class='dialogmsgbuttons'><button style='width:130px;height:30px;border-style:none;'onclick='pscreen2();return false;'>OK</button></div></div>";

$sql3="INSERT INTO notificator_tb(id_sender,id_reciever,notification_type,notification_state,date_and_time) VALUES('$_send','$_rec','2','2','$date1')";
$query3=mysqli_query($con,$sql3);


//frq update
$sql2="SELECT * FROM freind_req_tb WHERE id_reciever='$_rec' AND id_sender='$_send' AND state='4'";
$query2=mysqli_query($con,$sql2);

while($res2=mysqli_fetch_array($query2)){
$id=$res2['id'];
$id_sender=$res2['id_sender'];
$state=$res2['state'];
$date_and_time = $res2['date_of_req'];
$output='[{"msgtype":"frql","id":"'.$id.'","id_sender":"'.$id_sender.'","state":"'.$state.'","date_of_req":"'.$date_and_time.'"}]';

$sql22="SELECT * FROM profiling_tb WHERE id = '".$_rec."'";
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
$message='[{"msgtype":"notific","from":"'.$names.'","not":"has sent you a bleeeper buddy request"}]';

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

//catching user data
$sql="SELECT * FROM profiling_tb WHERE id = '".$_rec."'";
$res = mysqli_query($con,$sql);
while($result=mysqli_fetch_array($res))
{
$siddev=$result['userdevice_number'];
}

//sending data to the sid
$sql="SELECT * FROM profiling_tb WHERE id = '".$_send."'";
$res = mysqli_query($con,$sql);
while($result=mysqli_fetch_array($res))
{
$id=$result['id'];
$email=$result['email'];
$username=$result['username'];
$dob=$result['date_of_birth'];
$fname=$result['first_name'];
$mname=$result['middle_name'];
$lname=$result['last_name'];
$gen=$result['gender'];
$count=$result['country'];
$proff=$result['proffesion'];

$output='[{"msgtype":"frdd","id":"'.$id.'","email":"'.$email.'","username":"'.$username.'","dob":"'.$dob.'","fname":"'.$fname.'","mname":"'.$mname.'","lname":"'.$lname.'","gen":"'.$gen.'","count":"'.$count.'","proff":"'.$proff.'"}]';

$fields=array(
                'registration_ids'  => array($siddev),
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


		/**/}
        }
        }
        }
        }
        }
?>