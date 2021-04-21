<?php
session_start();
if(isset ($_SESSION['username'])  && isset ($_SESSION['id']) && isset ($_SESSION['email']))
{
header ("location: ./bleeeperusers/home.php");
}


$pg="Welcome to Bleeeper";
if(!isset( $_GET['page'])){
    $pg="Welcome to Bleeeper";
    }
else{
    $pg=$_GET['page'];
    }
?>
<html>
<head>
<title><?php echo $pg?></title>
<link type="text/css" href="bleeepercss/bleeeperstruct.css" rel="stylesheet" media="screen"/>
<script src="bleeeperajax/bleeepernav.js" language="javascript" async type="text/javascript"></script>
<script src="bleeeperajax/bleeeperreg.js" language="javascript" async type="text/javascript"></script>
<script src="bleeeperajax/bleeeperlogin.js" language="javascript" async type="text/javascript"></script>
<link rel="shortcut icon" href="bleeeperimg/bleeeper.ico">
<style>
#content{
    width: 800px;
    postion: relative;
    height: auto;
    margin-left: 150px;
    -webkit-transition: all 3s ease-in-out 3s;
    -o-transition: all 3s ease-in-out 3s;
    transition: all 3s ease-in-out 3s;
    }
#loginpane{
    width:auto;
    position:fixed;
    height:auto;
    margin-left:78%;
    margin-top:52px;
    padding:10px;
    }
#loginpane legend{margin-left:10px;margin-top:10px;}
#loginpane label{margin-left:10px;margin-top:10px;}
#loginpane input[type=email]{margin-left:10px;margin-top:10px;}
#loginpane input[type=submit]{margin-left:10px;margin-top:10px;}
#loginpane input[type=text]{margin-left:10px;margin-top:10px;}
#loginpane input[type=password]{margin-left:10px;margin-top:10px;}
#loginpane button{margin-left:10px;margin-top:10px;}
#loginpane textarea{margin-left:10px;margin-top:10px;}
#content:active {
    top: 1000px;
}
</style>
</head>

<body>
<div id="header">
</div><div class="bleeepertitle"><img src="./bleeeperimg/bleeepertitle.png" height="50px" </div>
<div id="loadbar"></div>
<nav>
<ul>
</a></li>
<li><a href="./index.php?page=Welcome to Anect" onClick="loadseg('./home.php' ,'hw');return false;">Home</a></li>
<li><a href="./index.php?page=Sign up" onClick="loadseg('./register.php' ,'hw');return false;">Sign Up</a></li>
<li><a href="./index.php?page=About us" onClick="loadseg('./about.php' ,'hw');return false;">About us</a></li>
<li><a href="./index.php?page=FAQ" onClick="loadseg('help.php' ,'hw');return false;">Help</a></li>
<li><a href="./index.php?page=FAQ" onClick="loadseg('FAQ.php' ,'hw');return false;">FAQ</a></li>
<li><a href="./index.php?page=Contacts" onClick="loadseg('./contacts.php' ,'hw');return false;">Contacts</a></li>
</ul>
</nav>
</div> 

<div id="hw"> 
		<?php
		$page = @$_GET['page'];
			switch($page){
				case 'Welcome to bleeeper':
				    include('./home.php');
				    break;
				
				case 'Sign up':
				    include('./register.php');
					break;
                    
				case 'Help':
					include('./help.php');
					break;
					
					case 'FAQ':
					include('./FAQ.php');
					break;
                    
             case 'About us':
                    include('./about.php');
                    break;
                    
                case 'Contacts':
                    include('./contacts.php');
                    break;
                
                    
				default:
					include('./home.php');
					break;
            }
		?>



</div>

</body>
<html>