<?php
ob_start();
?>
<div id="groups-pane-content">
<?php
if(!isset($_SESSION)){
session_start();
}
include('../bleeeperphp/conn.php');
$sid=base64_decode($_SESSION['id']);
$email=$uname=$fname=$mname=$lname=$count=$city=$resi=$id=$qid=$names=NULL;
$x=0;



$sql="SELECT * FROM group_member_rel_tb WHERE user_id='$sid' AND state='1' ORDER BY DATE_AND_TIME DESC";
$query=mysqli_query($con,$sql);
while($res2=mysqli_fetch_array($query))
{

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
$sql="SELECT * FROM group_member_rel_tb WHERE group_id='$gid' AND state='1'";
$query55=mysqli_query($con,$sql);
$coun=mysqli_num_rows($query55);



$x=$x+1;
  
echo '<div class="search-field"><img src="./bleeeperimg/grpno.jpg"/><div class="details"><strong>Group name:</strong><br/>'.$grpnme.'<br/><strong>Group administrator:</strong><br/>'.$names.'<br/><strong>Started on:</strong><br/>'.$res2["date_and_time"].'<br/><br/></div><div class="area"><strong>About the group:</strong><br/>'.$res33["about_group"].'<br><strong> Number of members: </strong>'.$coun.' </div>
<input type="button" id="invite_grp_user" value="View group activity" onClick="view_grp('.$gid.');return false;"/>
<input type="button" id="block" value="Leave group" onClick="funcleavegrp_inv('.$sid.','.$gid.');return false;"/>
</div>';
}

}


if($x==0)
echo "<div class='failed' >You are not a member of any group</div>";


?>
</div>