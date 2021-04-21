<?php
ob_start();
session_start();
include('../bleeeperphp/conn.php');
$gid=$_POST['grpid'];
$sid=base64_decode($_SESSION['id']);
$sql="SELECT * FROM group_data_information_tb WHERE id='$gid'";
$query=mysqli_query($con,$sql);
$res2=mysqli_fetch_array($query);
if($res2['state']==2){
	?>
    <script>
	alert("This group is already deactivated");
	funcclose_tabgroupspopup();
	</script>
    <?php
	}

?>
<div id="groupmsgtoggle">

<ol>
<a href="#"><li class="degroup" onClick="funcinleavegrp_inv('<?php echo $sid;?>','<?php echo $gid;?>')">Leave group</li></a>
<a href="#"><li onclick="view_reloadmanage_grp('<?php echo $_POST['grpid']?>','./tabgroups/grpmsghomepg.php','groupmsgentity')">Home</li></a>
<a href="#"><li onclick="view_manage_grp('<?php echo $_POST['grpid']?>','./tabgroups/usermember.php','groupmsgentity')">Members</li></a>
<a href="#"><li onclick="view_manage_grp('<?php echo $_POST['grpid']?>','./tabgroups/filegroups.php','groupmsgentity')">Shared Files</li></a>
<a href="#"><li onClick="funcclose_tabgroupspopup();return false;" class="shutpane">Close</li></a>
</ol>

</div>


<div id="groupmsgentity">
</div>