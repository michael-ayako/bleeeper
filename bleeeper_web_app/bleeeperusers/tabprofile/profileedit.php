<?php
include('../bleeeperphp/conn.php');
$field=$_POST['field'];
$data=$_POST['data'];
$id=$_POST['id'];
if($data!="null"){
$sql="UPDATE profiling_tb SET $field='$data' WHERE id='$id'";
$query=mysqli_query($con,$sql);
}




?>