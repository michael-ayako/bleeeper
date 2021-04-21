// JavaScript Document
function _unblock(_send,_rec){
    var settingsstab = false;
try {
    settingsstab = new ActiveXObject('Msxml2.XMLHTTP');
} catch (e) {
    try {
        settingsstab = new ActiveXObject('Microsoft.XMLHTTP');
    } catch (E) {
        settingsstab = false;
    }
}
if (!settingsstab && typeof XMLHttpRequest != 'undefined') {
    settingsstab = new XMLHttpRequest();
}
            var loadbarr=document.getElementById('loadbar');
            loadbarr.innerHTML="<img class='icoload'src='./bleeeperimg/load1.gif' width='30px' height='30px'/>";
            url="./tabsettings/funcunblock.php"
            var datastr="id_sender="+_send+"&id_rec="+_rec;
			
            settingsstab.open('POST',url,true);
            settingsstab.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
            settingsstab.send(datastr);
			
            settingsstab.onreadystatechange = function () {
            if (settingsstab.readyState == 4 && settingsstab.status == 200) {
            var msg=document.getElementById('msgdialog');
            msg.style.display="block"
            msg.innerHTML=settingsstab.responseText;
            loadseg('./settings.php' ,'contentpane');
            setTimeout(function(){pscreen()},10000);
            }
            }
            return false;
            
            }
function emailchange(dat,field,id){
    var profiletab = false;
try {
    profiletab = new ActiveXObject('Msxml2.XMLHTTP');
} catch (e) {
    try {
        profiletab = new ActiveXObject('Microsoft.XMLHTTP');
    } catch (E) {
        profiletab = false;
    }
}
if (!profiletab && typeof XMLHttpRequest != 'undefined') {
    profiletab = new XMLHttpRequest();
}
             var pscrn=document.getElementById('purplescreen');
             pscrn.style.display="block"
             var msg=document.getElementById('msgdialog');
             msg.style.display="block"
             msg.innerHTML="<div id='profile_input_1'>"+
             "<div class='title'><strong>Change!</strong> Email address</div>"+
             "<div class='dialogmessage'>You are changing Email address from '"+dat+"' to :<br/>"+
             "<input type='text' id='profupdate' autofocus placeholder='Email address...'></div>"+
             "<div class='dialogmsgbuttons'>"+
             "<button style='width:130px;height:30px;border-style:none;' id='changeupdate'>OK</button>"+
             "<button style='width:130px;height:30px;border-style:none;'onclick='pscreen();return false;'>Cancel</button>"+
             "</div></div>";
             var proceed=document.getElementById('changeupdate');
             proceed.onclick=function(){
                 var dat=document.getElementById('profupdate').value;
                 changeemail(dat,field,id);
                 } 
    }
function changeemail(dat,field,id){
	  var profiletab = false;
try {
    profiletab = new ActiveXObject('Msxml2.XMLHTTP');
} catch (e) {
    try {
        profiletab = new ActiveXObject('Microsoft.XMLHTTP');
    } catch (E) {
        profiletab = false;
    }
}
if (!profiletab && typeof XMLHttpRequest != 'undefined') {
    profiletab = new XMLHttpRequest();
}
    var datastr = 'data=' + dat + '&field=' + field + '&id=' + id;
    if (dat != null) {
        var loadbarr=document.getElementById('loadbar');
        loadbarr.innerHTML="<img class='icoload'src='./bleeeperimg/load1.gif' width='30px' height='30px'/>";
        var url = './tabsettings/funcemailchange.php';
        profiletab.open('POST', url, true);
        profiletab.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
        profiletab.send(datastr);
        profiletab.onreadystatechange = function () {
            if (profiletab.readyState == 4) {
				if(profiletab.responseText==1){
				alert("Invalid email address, the email address format should be: xxxxxx@xxxxx.xxx");
				pscreen3();	
				}
				else if(profiletab.responseText==2){
				alert("That email address is already present in the system");	
				pscreen3();
				}else if(profiletab.responseText==4){
				alert("Ensure you fill in something in order to change your Email address");	
				pscreen3();
				}
				else if(profiletab.responseText==3){
				loadseg('./settings.php', 'contentpane');
                pscreen();
                return false;
				}
				else{
					alert("Oops! There seems to be an error try again later");	
					pscreen3();
					}
            }
        }
        return false;
    }
	
	
	}

function usernamechange(dat,field,id){
    var profiletab = false;
try {
    profiletab = new ActiveXObject('Msxml2.XMLHTTP');
} catch (e) {
    try {
        profiletab = new ActiveXObject('Microsoft.XMLHTTP');
    } catch (E) {
        profiletab = false;
    }
}
if (!profiletab && typeof XMLHttpRequest != 'undefined') {
    profiletab = new XMLHttpRequest();
}
             var pscrn=document.getElementById('purplescreen');
             pscrn.style.display="block"
             var msg=document.getElementById('msgdialog');
             msg.style.display="block"
             msg.innerHTML="<div id='profile_input_1'>"+
             "<div class='title'><strong>Change!</strong> Username</div>"+
             "<div class='dialogmessage'>You are changing Username from '"+dat+"' to :<br/>"+
             "<input type='text' id='profupdate' autofocus placeholder='Username...'></div>"+
             "<div class='dialogmsgbuttons'>"+
             "<button style='width:130px;height:30px;border-style:none;' id='changeupdate'>OK</button>"+
             "<button style='width:130px;height:30px;border-style:none;'onclick='pscreen();return false;'>Cancel</button>"+
             "</div></div>";
             var proceed=document.getElementById('changeupdate');
             proceed.onclick=function(){
                 var dat=document.getElementById('profupdate').value;
                 changeusername(dat,field,id);
                 } 
    }
function changeusername(dat,field,id){
	  var profiletab = false;
try {
    profiletab = new ActiveXObject('Msxml2.XMLHTTP');
} catch (e) {
    try {
        profiletab = new ActiveXObject('Microsoft.XMLHTTP');
    } catch (E) {
        profiletab = false;
    }
}
if (!profiletab && typeof XMLHttpRequest != 'undefined') {
    profiletab = new XMLHttpRequest();
}
    var datastr = 'data=' + dat + '&field=' + field + '&id=' + id;
    if (dat != null) {
        var loadbarr=document.getElementById('loadbar');
        loadbarr.innerHTML="<img class='icoload'src='./bleeeperimg/load1.gif' width='30px' height='30px'/>";
        var url = './tabsettings/funcusernamechange.php';
        profiletab.open('POST', url, true);
        profiletab.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
        profiletab.send(datastr);
        profiletab.onreadystatechange = function () {
            if (profiletab.readyState == 4) {
				if(profiletab.responseText==1){
				alert("Invalid username, it should contain only letters and numbers");
				pscreen3();	
				}
				else if(profiletab.responseText==2){
				alert("That username is already present in the system");	
				pscreen3();
				}else if(profiletab.responseText==4){
				alert("Ensure you fill in something in order to change your Username");	
				pscreen3();
				}
				else if(profiletab.responseText==3){
				loadseg('./settings.php', 'contentpane');
                pscreen();
                return false;
				}
				else{
					alert("Oops! There seems to be an error try again later");	
					pscreen3();
					}
            }
        }
        return false;
    }
	}
function passwordchange(field,id){
    var profiletab = false;
try {
    profiletab = new ActiveXObject('Msxml2.XMLHTTP');
} catch (e) {
    try {
        profiletab = new ActiveXObject('Microsoft.XMLHTTP');
    } catch (E) {
        profiletab = false;
    }
}
if (!profiletab && typeof XMLHttpRequest != 'undefined') {
    profiletab = new XMLHttpRequest();
}
             var pscrn=document.getElementById('purplescreen');
             pscrn.style.display="block"
             var msg=document.getElementById('msgdialog');
             msg.style.display="block"
             msg.innerHTML="<div id='profile_input_3'>"+
             "<div class='title'><strong>Change!</strong> Password</div>"+
             "<div class='dialogmessage'>"+
             "<input type='password' id='profupdate' autofocus placeholder='Old password...' style='margin-top:0px;margin-bottom:2px;'>"+
			 "<input type='password' id='profupdate1' placeholder='New password...' style='margin-top:0px;margin-bottom:2px;'>"+
			 "<input type='password' id='profupdate2' placeholder='Confirm new password...' style='margin-top:0px;margin-bottom:2px;'></div>"+
             "<div class='dialogmsgbuttons'>"+
             "<button style='width:130px;height:30px;border-style:none;' id='changeupdate'>OK</button>"+
             "<button style='width:130px;height:30px;border-style:none;'onclick='pscreen();return false;'>Cancel</button>"+
             "</div></div>";
             var proceed=document.getElementById('changeupdate');
             proceed.onclick=function(){
                 var dat=document.getElementById('profupdate').value;
				 var dat1=document.getElementById('profupdate1').value;
				 var dat2=document.getElementById('profupdate2').value;
                 changepassword(dat,dat1,dat2,field,id);
                 } 
    }
function changepassword(dat,dat1,dat2,field,id){
	if(dat1!=dat2){
		alert("Your new password doesn't match");
		}
	else if(dat1=="" || dat2=="" /*|| dat==""*/){
		alert("Ensure all fields are filled then click ok");
		}
	else{
	
	  var profiletab = false;
try {
    profiletab = new ActiveXObject('Msxml2.XMLHTTP');
} catch (e) {
    try {
        profiletab = new ActiveXObject('Microsoft.XMLHTTP');
    } catch (E) {
        profiletab = false;
    }
}
if (!profiletab && typeof XMLHttpRequest != 'undefined') {
    profiletab = new XMLHttpRequest();
}
    var datastr = 'dat=' + dat +'&id=' + id+ '&dat1=' + dat1;
    if (dat != null) {
        var loadbarr=document.getElementById('loadbar');
        loadbarr.innerHTML="<img class='icoload'src='./bleeeperimg/load1.gif' width='30px' height='30px'/>";
        var url = './tabsettings/funcpasswordchange.php';
        profiletab.open('POST', url, true);
        profiletab.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
        profiletab.send(datastr);
        profiletab.onreadystatechange = function () {
            if (profiletab.readyState == 4) {
				if(profiletab.responseText==1){
				alert("Invalid old password entry");
				pscreen3();	
				}
				else if(profiletab.responseText==2){
				alert("Your new password should be 5 characters and above!");
				pscreen3();	
				}
				else if(profiletab.responseText==3){
				alert("Password change was successfull!");
				pscreen();	
				}
            }
        }
        return false;
    }
	}	
}
	