<?php
ob_start();
session_start();
?>
<div style="overflow-y:scroll;max-height:40%;">
<?php
include('../bleeeperphp/conn.php');
$sid=base64_decode($_SESSION['id']);
$gid=$_POST['grpid'];
$email=$uname=$fname=$mname=$lname=$count=$city=$resi=$id=$qid=NULL;
$x=0;
$q=0;


$sql="SELECT * FROM group_member_rel_tb WHERE group_id='$gid' AND state='1'";
$query=mysqli_query($con,$sql);
while($res2=mysqli_fetch_array($query))
{
$qid=$res2['user_id'];


$sql="SELECT * FROM profiling_tb WHERE id='$qid'";
$query2=mysqli_query($con,$sql);
$res=mysqli_fetch_array($query2); 
    
    
$id=$res['id'];
$email=$res['email'];
$uname=$res['username'];
$fname=$res['first_name'];
$mname=$res['middle_name'];
$lname=$res['last_name'];
$count=$res['country'];
$city=$res['proffesion'];

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



$x=$x+1;
  
echo '<div class="search-field"><img src="'.$dir.'"/><div class="details">'.$fname.' '.$mname.' '.$lname.'<br/><br/>'.$uname.'<br/><br/>'.$email.'<br/><br/></div><div class="area">Joined group on:<br/><br/>'.                $res2["date_and_time"].' </div>
"/> <input type="button" id="send_req" value="Friend Request" onClick="funcfrend_req('.$sid.','.$id.');return false;" style="margin-left:745px"/><input type="button" id="follow" value="Follow" onClick="funcfrend_follow('.$sid.','.$id.');return false;"/><input type="button" id="block" value="Block" onClick="funcfrend_block('.$sid.','.$id.');return false;"/></div>';


}


if($x==0)
echo "<div class='failed' >Your group has no members invite your friends</div>";


?>
</div>