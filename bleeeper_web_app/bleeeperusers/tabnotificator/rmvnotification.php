<?php
if(!isset($con)){
include('../bleeeperphp/conn.php');
}
if(!isset ($_SESSION)){
session_start();
}
$nid=$_POST['nid'];
$sql="UPDATE notificator_tb SET notification_state='1' WHERE id='$nid'";
$query=mysqli_query($con,$sql);
?>