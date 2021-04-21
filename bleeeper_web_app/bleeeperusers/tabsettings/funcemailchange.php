<?php
include("../bleeeperphp/conn.php");
$email=$_POST['data'];
$field=$_POST['field'];
$id=$_POST['id'];
$cod=0;

$sql="SELECT * FROM profiling_tb WHERE email = '$email'";
$posta = mysqli_query($con,$sql);
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	$cod=1;
}else
{
while($row=mysqli_fetch_array($posta)){
if($email==($row['email']) ){
$cod=2;
break;
}
}
}
if($cod==0){
	if($email!="null"){
$sql="UPDATE profiling_tb SET $field='$email' WHERE id='$id'";
$query=mysqli_query($con,$sql);
$cod=3;
	}
	else
	{
		$cod=4;
	}
}
echo $cod;
?>