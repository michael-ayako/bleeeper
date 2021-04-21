<?php
ob_start();
session_start();
?>
<div id="groups-pane-content">
<?php
include('../bleeeperphp/conn.php');
include('../bleeeperphp/time.php');
$sid=base64_decode($_SESSION['id']);
$email=$uname=$fname=$mname=$lname=$count=$city=$resi=$id=$qid=$names=NULL;
$x=0;



$sql="SELECT * FROM group_invitation_tb WHERE reciever_id='$sid' AND state='1' ORDER BY DATE_AND_TIME DESC";
$query=mysqli_query($con,$sql);
while($res2=mysqli_fetch_array($query))
{
$date11=not_ago($res2["date_and_time"]);
$gid=$res2['group_id'];    
$sql="SELECT * FROM group_data_information_tb WHERE id='$gid' ORDER BY DATE_AND_TIME DESC";
$query33=mysqli_query($con,$sql);    
$res33=mysqli_fetch_array($query33);
$aid=$res33['groups_admin_id']; 
$grpnme=$res33['group_name']; 
$gid=$res33['id'];
$groupstate=$res33['state'];

if($groupstate==2)
continue;
else{

$sql="SELECT * FROM profiling_tb WHERE id='$aid'";
$query2=mysqli_query($con,$sql);
$res=mysqli_fetch_array($query2); 

$uname=$res['username'];
$fname=$res['first_name'];
$mname=$res['middle_name'];
$lname=$res['last_name'];
if($fname==NULL && $mname==NULL && $lname==NULL)
$names=$uname;
else
$names= $fname.' '.$mname.' '.$lname;




$x=$x+1;
  
echo '<div class="search-field"><img src="./bleeeperimg/blankuserimg.jpg"/><div class="details"><strong>Group name:</strong><br/>'.$grpnme.'<br/><strong>Group administrator:</strong><br/>'.$names.'<br/><strong>Sent:</strong><br/>'.$date11.'<br/><br/></div><div class="area"><strong>About the group:</strong><br/>'.$res33["about_group"].' </div>
<input type="button" id="invite_grp_user" value="Accept Invitation" onClick="funcacc_inv('.$sid.','.$gid.');return false;"/>
<input type="button" id="block" value="Deny invitation" onClick="funcref_inv('.$sid.','.$gid.');return false;"/>
</div>';
}

}


if($x==0)
echo "<div class='failed' >There are no group invites</div>";


?>
</div>