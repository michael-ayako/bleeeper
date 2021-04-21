<?php
ob_start();
session_start();
?>
Click on a friend inorder to add them to the message list.<br/>
<?php
//this defines users friends
include('../bleeeperphp/conn.php');
$x=0;
$q=0;
$element=$_POST['element'];
$id[]=$rid[]=$date1[]=NULL;
$user_id=base64_decode($_SESSION['id']);

$sql="SELECT * FROM freind_rel_tb WHERE ( id_sender='$user_id' AND state='1') OR ( id_reciever='$user_id' AND state='1')";
$query=mysqli_query($con,$sql);
while($res1=mysqli_fetch_array($query))
{
if($res1['id_reciever']!=$user_id){$rid[]=$res1['id_reciever'];}
else if($res1['id_sender']!=$user_id){$rid[]=$res1['id_sender'];}

$date1[]=$res1['date_and_time'];
$id[$x]=$res1['id'];
if($q>=mysqli_num_rows($query))
{break;
}else if($rid[$x]==$user_id){
    continue;
    }
else
{
    $q++;
    $x++;
    $sql1="SELECT * FROM profiling_tb WHERE (id='$rid[$q]' AND email LIKE '$element%') OR (id='$rid[$q]' AND username LIKE '$element%') OR (id='$rid[$q]' AND first_name LIKE '$element%') OR (id='$rid[$q]' AND middle_name LIKE '$element%') OR (id='$rid[$q]' AND last_name LIKE '$element%') ";
    $query1=mysqli_query($con,$sql1);
    $res=mysqli_fetch_array($query1);
    $id=$res['id'];
    $email=$res['email'];
    $uname=$res['username'];
    $fname=$res['first_name'];
    $mname=$res['middle_name'];
    $lname=$res['last_name'];

    
    if($id!=NULL){
    if($fname!=NULL || $mname!=NULL || $lname!=NULL){
    ?>
    <div id="searchfound" onClick="addlist('<?php echo $id;?>','<?php echo $fname." ".$mname." ".$lname;?>');">
    <div id="names"><label>Name: </label><?php echo $fname." ".$mname." ".$lname;?></div>
    <div id="username"><label> Username: </label><?php echo $uname;?></div>
    <div id="email"><label> Email: </label><?php echo $email;?></div>
    </div>
    <?php
    }
    else{
        ?>
    <div id="searchfound" onClick="addlist('<?php echo $id;?>','<?php echo $uname?>');">
    <div id="names"><label>Name: </label><?php echo $fname." ".$mname." ".$lname;?></div>
    <div id="username"><label> Username: </label><?php echo $uname;?></div>
    <div id="email"><label> Email: </label><?php echo $email;?></div>
    </div>
    <?php
    }
    }else{
    continue;
    }
}
}

?>