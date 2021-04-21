<?php
//this defines the people following the user

if(!isset($_SESSION['id']))
{
    session_start();
}

include('../bleeeperphp/conn.php');
include('../bleeeperphp/time.php');
//get list of friends
$x=0;
$q=0;

$_id=array();
$sid[]=NULL;
$fname[]=$mname[]=$lname[]=NULL;
$user_id=base64_decode($_SESSION['id']);
$sql="SELECT * FROM freind_rel_tb WHERE id_sender='$user_id' AND state='2'";
$query=mysqli_query($con,$sql);

while($res1=mysqli_fetch_array($query))
{
$sid[]=$res1['id_reciever'];
if($q>=mysqli_num_rows($query))
{break;
}else if($sid[$x]==$user_id){
    continue;
    }
else
{
    $q++;
    $x++;
    $sql1="SELECT * FROM profiling_tb WHERE id='$sid[$q]'";
    $query1=mysqli_query($con,$sql1);
    $res=mysqli_fetch_array($query1);
    $_id[$res['id']]=$res['id'];
    $fname[$res['id']]=$res['first_name'];
    $mname[$res['id']]=$res['middle_name'];
    $lname[$res['id']]=$res['last_name'];
    $username[$res['id']]=$res['username'];
}
}
    $q++;
    $x++;
    $sql1="SELECT * FROM profiling_tb WHERE id='$user_id'";
    $query1=mysqli_query($con,$sql1);
    $res=mysqli_fetch_array($query1);
    $_id[$res['id']]=$res['id'];
    $fname[$res['id']]=$res['first_name'];
    $mname[$res['id']]=$res['middle_name'];
    $lname[$res['id']]=$res['last_name'];
    $username[$res['id']]=$res['username'];






//Creates a list of shoutouts sent by people who you are following

if($x==0){
   echo "<div class='failed' >Your have go to the search bar and request or follow</div>"; 
    }
else
{
    $ids = join("' OR id_user= '",$_id);
    $sql="SELECT * FROM shoutouts_tb WHERE id_user = '$ids' ORDER BY DATE DESC LIMIT 10";
    
    $query=mysqli_query($con,$sql);
    $q=0;
    while($res=mysqli_fetch_array($query)){
		/*Pic fetch*/
			$idz=$_id[$res['id_user']];
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
	
	
        if($q>=mysqli_num_rows($query))
        break;
        else{
		
		/*Pic fetch*/
			$idz=$_id[$res['id_user']];
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
		$date11=status_ago($res['date']);
            if( $lname[$res['id_user']]=="" && $mname[$res['id_user']]=="" && $fname[$res['id_user']]== ""){
            ?>
            <div id="_shoutout_content">
            <img src="<?php echo $dir;?>" width="50px" height="50px" class="image"/>
            <div class="names"><span class="_shoutout_from">Shout out from </span><?php echo $username[$res['id_user']]." "; ?></div>
            <div class="boinkstatement"><?php echo $res['shoutout'] ?></div>
            <div class="boinktime"><?php echo $date11; ?></div>
            </div>
            
            
            <?php
            }
            else{
            ?>
            <div id="_shoutout_content">
            <img src="<?php echo $dir;?>" width="50px" height="50px" class="image"/>
            <div class="names"><span class="_shoutout_from">Shout out from </span><?php echo $fname[$res['id_user']]." ".$mname[$res['id_user']]." ".$lname[$res['id_user']]." "; ?></div>
            <div class="boinkstatement"><?php echo $res['shoutout'] ?></div>
            <div class="boinktime"><?php echo $date11;  ?></div>
            </div>
            
            
            <?php
            }
            $q++;
            }
        }
    
    

}


 ?>
