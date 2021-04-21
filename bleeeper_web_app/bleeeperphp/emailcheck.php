<?php
include('./conn.php');
$email=$_POST['email'];
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
echo $cod;
?>