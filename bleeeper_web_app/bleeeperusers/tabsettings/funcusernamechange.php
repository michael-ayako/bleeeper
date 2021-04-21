<?php
include("../bleeeperphp/conn.php");
$uname=$_POST['data'];
$field=$_POST['field'];
$id=$_POST['id'];
$cod=0;

if (!preg_match("/^[a-zA-Z0-9]*$/",$uname)) {
$cod=1;
}else
{
$sql="SELECT * FROM profiling_tb WHERE username = '$uname'";
$posta = mysqli_query($con,$sql);
while($row=mysqli_fetch_array($posta)){
if($uname==($row['username']) ){
$cod=2;
break;
}
}
}

if($cod==0){
	if($uname!="null"){
$sql="UPDATE profiling_tb SET $field='$uname' WHERE id='$id'";
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