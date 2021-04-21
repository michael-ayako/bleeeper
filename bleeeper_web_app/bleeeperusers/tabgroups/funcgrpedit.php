<?php
include('../bleeeperphp/conn.php');
$field=$_POST['field'];
$data=$_POST['data'];
$grpid=$_POST['grpid'];

if($field=="group_name"){
if(strlen($data)<5 || strlen($data)>35)
{
echo "<div id='error_friend_req_2'><div class='title'><strong>Oops!</strong>Group Name</div><div class='dialogmessage'>Your group name has to be between 5-16 characters.</div><div class='dialogmsgbuttons'><button style='width:130px;height:30px;border-style:none;'onclick='pscreen2();return false;'>OK</button></div></div>";
}
else
{
$sql="UPDATE group_data_information_tb SET $field='$data' WHERE id='$grpid'";
$query=mysqli_query($con,$sql);
}
}else if($field=="about_group")
{
 if(strlen($data)<40 || strlen($data)>100)
{
echo "<div id='error_friend_req_2'><div class='title'><strong>Oops!</strong>About group</div><div class='dialogmessage'>Your information on the group has to be between 40-100 characters.</div><div class='dialogmsgbuttons'><button style='width:130px;height:30px;border-style:none;'onclick='pscreen2();return false;'>OK</button></div></div>";
}
else
{
$sql="UPDATE group_data_information_tb SET $field='$data' WHERE id='$grpid'";
$query=mysqli_query($con,$sql);
////GCM//////
$output=NULL;
$ids=array();
//Updating friends of new user join
$sql="SELECT * FROM group_member_rel_tb WHERE group_id='$grpid' AND state='1'";
$query=mysqli_query($con,$sql);
while($res2=mysqli_fetch_array($query))
{
$uid=$res2['user_id'];
array_push($ids,$uid);
}
//sending group data information
$sql="SELECT * FROM group_data_information_tb WHERE id='".$grpid."'";
$query=mysqli_query($con,$sql);
while($res2=mysqli_fetch_array($query)){
array_push($ids,$res2['groups_admin_id']);
$id=$res2['id'];
$gname=$res2['group_name'];
$gadmin=$res2['groups_admin_id'];
$gabt=$res2['about_group'];
$gstate=$res2['state'];
$gdt=$res2['date_and_time'];

$output='[{"msgtype":"grpd","id":"'.$id.'","gname":"'.$gname.'","gadmin":"'.$gadmin.'","gabt":"'.$gabt.'","gstate":"'.$gstate.'","gdt":"'.$gdt.'"}]';

$ar=count($ids);
for($i=0;$i<$ar;$i++)
{
$sql="SELECT * FROM profiling_tb WHERE id = '".$ids[$i]."'";
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
}

///GCM///
}   
} 
    


?>