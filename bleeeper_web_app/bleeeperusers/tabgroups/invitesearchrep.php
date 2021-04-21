<?php
ob_start();
session_start();
include('../bleeeperphp/conn.php');
$sid=base64_decode($_SESSION['id']);
$element=$_POST['data'];
$grpid=$_POST['grpid'];
$email[]=$uname[]=$fname[]=$mname[]=$lname[]=$count[]=$city[]=$resi[]=$id[]=NULL;
$x=0;
$q=0;
if($element!=NULL){
$sql="SELECT * FROM profiling_tb WHERE email LIKE '$element%' OR username LIKE '$element%' OR first_name LIKE '$element%' OR middle_name LIKE '$element%' OR last_name LIKE '$element%'";
$query=mysqli_query($con,$sql);
while($res=mysqli_fetch_array($query))
{
    
$id[]=$res['id'];
$email[]=$res['email'];
$uname[]=$res['username'];
$fname[]=$res['first_name'];
$mname[]=$res['middle_name'];
$lname[]=$res['last_name'];
$count[]=$res['country'];
$city[]=$res['proffesion'];

if($q>=mysqli_num_rows($query))
{break;}
else{
$q=$q+1;
$x=$x+1;

			/*Pic fetch*/
			$idz=$res['id'];
			$sql="SELECT * FROM  ppic_tb WHERE user_id='$idz' AND ppic_state='1'";
			$qchck=mysqli_query($con,$sql);
			$dir="./bleeeperimg/blankuserimg.jpg";
			$dircatch=NULL;
			while($qv=mysqli_fetch_array($qchck)){
			$ppic=$qv['ppic_link'];
			$dircatch="../file_data/".$idz."/".$ppic;
			}
			if($dircatch!=NULL){
			$dir=$dircatch;
			}
			/*Pic fetch*/
  
echo '<div class="search-field"><img src="'.$dir.'"/><div class="details">'.$fname[$x].' '.$mname[$x].' '.$lname[$x].'<br/><br/>'.$uname[$x].'<br/><br/>'.$email[$x].'<br/><br/></div><div class="area">'.$count[$x].'<br/> <br/>'.$city[$x].'<br/><br/<br/><br/></div>
<input type="button" id="invite_grp_user" value="Invite to Group" onClick="funcinvitegrp_req('.$sid.','.$id[$x].','.$grpid.');return false;"/></div>';

}
}
}
if($element==NULL)
echo "<div class='success' >Type a Username, E-mail Address or their name to find them</div>";
else{
if($x==0)
echo "<div class='failed' >The user you are searching for is not in the system</div>";
}


?>
