<?php
ob_start();
if(!isset($_SESSION)){
session_start();
}
$x=NULL;
$sid=base64_decode($_SESSION['id']);
include('../bleeeperphp/conn.php');
include('../bleeeperphp/time.php');
$sql="SELECT * FROM group_data_information_tb WHERE groups_admin_id='$sid' ORDER BY DATE_AND_TIME DESC";
$query=mysqli_query($con,$sql);
while($res=mysqli_fetch_array($query))
{
$date11=not_ago($res["date_and_time"]);


$x=$x+1;

$sql22="SELECT * FROM profiling_tb WHERE id = '$sid'";
$query22=mysqli_query($con,$sql22);
$res55=mysqli_fetch_array($query22);


if($res55['first_name']==NULL && $res55['middle_name']==NULL && $res55['last_name']==NULL)
{
$nm=base64_decode($_SESSION['username']);
}
else{
$nm=$res55['first_name']." ".$res55['middle_name']." ".$res55['last_name'];
}

echo '<div class="search-field">
<img src="./bleeeperimg/grpno.jpg"/>
<div class="details"><strong>Group name:</strong><br/>'.$res["group_name"].'<br/>
<strong>Group administrator:</strong><br/>You<br/>
<strong>You started this group:</strong><br/>'.$date11.'<br/><br/>
</div><div class="area"><strong>About group:</strong><br/>'.$res["about_group"].'<br/></div>
<input type="button" id="manage_grp" value="Manage this group" onClick="manage_grp('.$res["id"].');return false;"/></div>';

}

if($x==0)
echo "<div class='failed' >You haven't created any group yet.</div>";

?>