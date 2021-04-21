<?php
include('../bleeeperphp/conn.php');
$gid=$_POST['gid'];
$state=$_POST['state'];
$sql="UPDATE group_data_information_tb SET state='$state' WHERE id='$gid'";
$query=mysqli_query($con,$sql);
?>
