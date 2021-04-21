<?php
include("../bleeeperphp/conn.php");
$oldpass=MD5($_POST['dat']);
$newpass=$_POST['dat1'];
$id=$_POST['id'];
$cod=0;

$sql1="SELECT * FROM profiling_tb WHERE id = '$id'";
$res1 = mysqli_query($con,$sql1);
$fetch1=mysqli_fetch_array($res1);
$chkpass=$fetch1['password'];
if($oldpass!=$chkpass){
	$cod=1;
}
if(strlen($newpass) < 5){
$cod=2;
}
if($cod==0){
$newpassencoded=MD5($newpass);
$sql="UPDATE profiling_tb SET password='$newpassencoded' WHERE id='$id'";
$query=mysqli_query($con,$sql);
$cod=3;
}
echo $cod;


?>