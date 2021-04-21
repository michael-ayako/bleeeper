<?php
if(!isset($_SESSION))
{
session_start();
}
$groupid=$_POST['grpid'];
$names=$abt=NULL;


$sid=base64_decode($_SESSION['id']);

include('../bleeeperphp/conn.php');

$sql="SELECT * FROM group_data_information_tb WHERE  id='$groupid'";
$query=mysqli_query($con,$sql);
$res=mysqli_fetch_array($query);
$names=$res['group_name'];
$abt=$res['about_group'];
$gid=$res['groups_admin_id'];
?>
<div id="groupaboutpanel" style="margin-left:387px;">
<img src="./bleeeperimg/grpno.jpg" width="250px" height="200px" />
<div class="grpabtpaneltitlepane">Group Name</div>
<div class="grpabtpanelcontext" onClick="grpnamechange('<?php echo $groupid;?>','group_name','<?php echo $names;?>');return false;"><?php echo $names;?><span style="font-size:12px">(click to edit)</span></div>
<div class="grpabtpaneltitlepane">About group</div>
<div class="grpabtpanelcontext" onClick="abtgrpchange('<?php echo $groupid;?>','about_group');return false;"><?php echo $abt;?><span style="font-size:12px">(click to edit)</span></div>
</div>


