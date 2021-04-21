<?php
include('../bleeeperphp/conn.php');
$date1=date("Y-m-d H:i:s");
$email=$_POST['email'];
$subj=$_POST['subj'];
$txt=$_POST['txtdata'];
$cod=NULL;
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	$cod=1;
	}
if ($subj=="") {
	$cod=2;
	}
if ($txt=="") {
	$cod=3;
	}
if($cod==1 || $cod==3 ||$cod==2 )
echo $cod;
else{
$sql="INSERT INTO faq_table (email,subject,complaint,date_and_time)VALUES('$email','$subj','$txt','$date1')";
$res = mysqli_query($con2,$sql);
if(! $res )
{
  die('<br/>Could not enter data:'.mysqli_error($con2));
};
echo "4";
}
?>