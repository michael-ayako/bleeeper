<?php 
//Login
session_start();
include('./conn.php');
$code=$_POST['code'];
$pass=MD5($_POST['pass']);
$cod=NULL;

    
if(strlen($_POST['pass']) < 5){
                    $cod=1;
                    echo $cod;
                    
                     }
else{
                    $sql="SELECT * FROM profiling_tb WHERE username = '$code' AND password='$pass'";
                    $res = mysqli_query($con,$sql);
                    
                    $sql1="SELECT * FROM profiling_tb WHERE email = '$code' AND password='$pass'";
                    $res1 = mysqli_query($con,$sql1);



if($res){
         $fetch=mysqli_fetch_array($res);
         if($code==($fetch["username"]) && $pass==($fetch["password"]))
                    {
                        $_SESSION['id']=base64_encode($fetch["id"]);
						$_SESSION['dev']=base64_encode($fetch["userdevice_number"]);
						$_SESSION['username']=base64_encode($fetch["username"]);
                        $cod = 2;
                        echo $cod;
                       
                    }
else if($res1)
                    { 
                         $fetch=mysqli_fetch_array($res1);
                     
                         if($code==($fetch["email"]) && $pass==($fetch["password"]))
                                    {
                                    $_SESSION['id']=base64_encode($fetch["id"]);
									$_SESSION['username']=base64_encode($fetch["username"]);
                                    $_SESSION['dev']=base64_encode($fetch["userdevice_number"]);
                                    $cod = 2;
                                    echo $cod;
                                    }
else       {
                    $cod=1;
                    echo $cod;
           }
                    }
}
}

?>