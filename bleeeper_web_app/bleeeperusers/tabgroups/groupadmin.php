<?php
if(!isset($_SESSION))
{
session_start();
}
include('../bleeeperphp/conn.php');
$sid=base64_decode($_SESSION['id']);
$gid=$_POST['grpid'];
$sql="SELECT * FROM group_data_information_tb WHERE id='$gid'";
$query=mysqli_query($con,$sql);
$res2=mysqli_fetch_array($query);
?>

<div id="groupadmintoggle">

<ol>
<?php
if($res2['state']==1){
?>
<a href="#"><li class="degroup" onclick="grpactivation('<?php echo $_POST['grpid']?>','2')">Deactivate</li></a>
<?php
}else if($res2['state']==2){
?>
<a href="#"><li class="degroup" onclick="grpactivation('<?php echo $_POST['grpid']?>','1')">Activate</li></a>
<?php
}
?>
<a href="#"><li onclick="load_manage_grpedit('<?php echo $_POST['grpid']?>','./tabgroups/groupeditinfo.php','groupadminentity')">Group info and activity</li></a>
<a href="#"><li onclick="load_manage_grp('<?php echo $_POST['grpid']?>','./tabgroups/invitesend.php','groupadminentity')">Invite new member</li></a>
<a href="#"><li onclick="load_manage_grp('<?php echo $_POST['grpid']?>','./tabgroups/members.php','groupadminentity')">Members</li></a>
<a href="#"><li onclick="load_manage_grp('<?php echo $_POST['grpid']?>','./tabgroups/requeststojoin.php','groupadminentity')">Requests to join</li></a>
<a href="#"><li onClick="funcclose_tabgroupspopup();return false;" class="shutpane">Close</li></a>
</ol>

</div>
<div id="groupadminentity">
</div>
