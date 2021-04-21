<?php
ob_start();
?>
<div id="loadfriendcontentswipe">
<?php
//this defines users friends
if(!isset($_SESSION)){
session_start();
}
include('../bleeeperphp/conn.php');


$x=0;
$q=0;
$id=$rid=$date1=$proffesion=NULL;
$user_id=base64_decode($_SESSION['id']);

$sql="SELECT * FROM freind_rel_tb WHERE ( id_sender='$user_id' AND state='1') OR ( id_reciever='$user_id' AND state='1')";
$query=mysqli_query($con,$sql);
while($res1=mysqli_fetch_array($query))
{
if($res1['id_reciever']!=$user_id){$rid=$res1['id_reciever'];}
else if($res1['id_sender']!=$user_id){$rid=$res1['id_sender'];}

$date1=$res1['date_and_time'];
$id=$res1['id'];
if($q>=mysqli_num_rows($query))
{break;
}else if($rid==$user_id){
    continue;
    }
else
{
    $q++;
    $x++;
    $sql1="SELECT * FROM profiling_tb WHERE id='$rid'";
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
			while($q=mysqli_fetch_array($qchck)){
			$ppic=$q['ppic_link'];
			$dircatch="../file_data/".$idz."/".$ppic;
			}
			if($dircatch!=NULL){
			$dir=$dircatch;
			}
			/*Pic fetch*/
    
    
    
    echo '<div class="search-field"><img src="'.$dir.'"/><div class="details">
<strong>Name:</strong><br/>
'.$fname.' '.$mname.' '.$lname.'<br/>
<strong>Username:</strong><br/>
'.$uname.'<br/>
<strong>Email address:</strong><br/>
'.$email.'<br/><br/></div><div class="area">
<strong>Country:</strong><br/>
'.$count.'<br/>
<strong>Profession:</strong><br/>
'.$proffesion.'<br/><br/><br/><br/></div><input type="button" id="send_req" value="Follow" style="margin-left:730px;width:150px;" onClick="funcfrend_follow('.$user_id.','.$id.');return false;"/><input type="button" id="block" value="Unfriend" style="width:150px;" onClick="funcfrend_unfriend('.$user_id.','.$id.');return false;"/></div>';
}
}

if($x==0){
   echo "<div class='failed' >Your have go to the search bar and request or follow</div>"; 
    }
    else{
        echo "<br/><br/><br/><br/><br/><br/><br/><br/>";
        }
 ?>
</div>