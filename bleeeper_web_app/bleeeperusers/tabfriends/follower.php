<?php
session_start();
?>
<div id="loadfriendcontentswipe">
<?php
//this defines the people following the user

include('../bleeeperphp/conn.php');
$q=0;
$id[]=$rid[]=$date1[]=NULL;
$sid=base64_decode($_SESSION['id']);
$sql="SELECT * FROM freind_rel_tb WHERE id_reciever='$sid' AND state='2'";
$query=mysqli_query($con,$sql);
while($res1=mysqli_fetch_array($query))
{

$rid[]=$res1['id_sender'];
$date1[]=$res1['date_and_time'];
$id[$q]=$res1['id'];
if($q>=mysqli_num_rows($query))
{break;}
else
{
    $q=$q+1;
    $sql1="SELECT * FROM profiling_tb WHERE id='$rid[$q]'";
    $query1=mysqli_query($con,$sql1);
    $res=mysqli_fetch_array($query1);
    $id=$res['id'];
    $email=$res['email'];
    $uname=$res['username'];
    $fname=$res['first_name'];
    $mname=$res['middle_name'];
    $lname=$res['last_name'];
    $count=$res['country'];
    $proffesion=$res['proffesion'];
	
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
    
    
    echo '<div class="search-field"><img src="'.$dir.'"/>
	<div class="details">
<strong>Name:</strong><br/>
'.$fname.' '.$mname.' '.$lname.'<br/>
<strong>Username:</strong><br/>
'.$uname.'<br/>
<strong>Email address:</strong><br/>
'.$email.'<br/><br/></div><div class="area">
<strong>Country:</strong><br/>
'.$count.'<br/>
<strong>Profession:</strong><br/>
'.$proffesion.'<br/><br/><br/><br/></div>
	<input type="button" id="send_req" value="Follow" style="margin-left:730px;width:150px;" onClick="funcfrend_follow('.$sid.','.$id.');return false;"/><input type="button" id="block" value="Block" style="width:150px;" onClick="funcfrend_block('.$sid.','.$id.');return false;"/></div>';
}
}


if($q==0){
   echo "<div class='failed' >Your have no Followers</div>"; 
    }
        else{
        echo "<br/><br/><br/><br/><br/><br/><br/><br/>";
        }
?>
</div>