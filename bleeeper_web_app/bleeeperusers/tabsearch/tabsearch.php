<?php
session_start();
include('../bleeeperphp/conn.php');
$sid=base64_decode($_SESSION['id']);
$element=$_POST['element'];
$email[]=$uname[]=$fname[]=$mname[]=$lname[]=$count[]=$proff[]=$id[]=NULL;
$defaultname='Bleeeper user';
$defaultcount='Mother Earth';
$defaultproff='Still Searching';
$names=$proffs=$counts=NULL;

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
$proff[]=$res['proffesion'];
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
			while($q=mysqli_fetch_array($qchck)){
			$ppic=$q['ppic_link'];
			$dircatch="../file_data/".$idz."/".$ppic;
			}
			if($dircatch!=NULL){
			$dir=$dircatch;
			}
			/*Pic fetch*/

if($fname[$x]=="" AND $mname[$x]==""  AND $lname[$x]=="" ) 
{
$names=$defaultname;
}
else
{
$names=$fname[$x].' '.$mname[$x].' '.$lname[$x];
}

if($count[$x]=="" ) 
{
$counts=$defaultcount;
}
else
{
$counts=$count[$x];
}
if($proff[$x]=="" ) 
{
$proffs=$defaultproff;
}
else
{
$proffs=$proff[$x];
}
echo '<div class="search-field"><img src="'.$dir.'"/><div class="details"><strong>Name:</strong><br/>'.$names.'<br/><strong>Username:</strong><br/>'.$uname[$x].'<br/><strong>Email Address:</strong><br/>'.$email[$x].'<br/><br/></div><div class="area"><strong>Country:</strong><br/>'.$counts.'<br/><strong>Profession:</strong><br/>'.$proffs.'<br/><br/></div><input type="button" id="send_req" value="Friend Request" onClick="funcfrend_req('.$sid.','.$id[$x].');return false;"/><input type="button" id="follow" value="Follow" onClick="funcfrend_follow('.$sid.','.$id[$x].');return false;"/><input type="button" id="block" value="Block" onClick="funcfrend_block('.$sid.','.$id[$x].');return false;"/></div>';

}
}
}
if($element==NULL)
echo "<div class='success' >Type a Username, E-mail Address or their name to find them</div>";
else{
if($x==0)
echo "<div class='failed' >The group your searching for is not registered in the system</div>";
}


?>
