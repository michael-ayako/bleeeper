// JavaScript Document
function updates(pag, objID) {
    var statuspg = false;
try {
    statuspg = new ActiveXObject('Msxml2.XMLHTTP');
} catch (e) {
    try {
        statuspg = new ActiveXObject('Microsoft.XMLHTTP');
    } catch (E) {
        statuspg = false;
    }
}
if (!statuspg && typeof XMLHttpRequest != 'undefined') {
    statuspg = new XMLHttpRequest();
}
    var obj = document.getElementById(objID);
    statuspg.open('GET', pag, true);
    statuspg.onreadystatechange = function () {
        if (statuspg.readyState == 4 && statuspg.status == 200) {
            obj.innerHTML = statuspg.responseText; 
            setTimeout(function(){updates('./tabboinkerz/boinkerz.php','others')},2000);
            
        }
    }
    statuspg.send(null);
}



function shoutoutload(pag, objID) {
var shoutoutpg = false;
try {
    shoutoutpg  = new ActiveXObject('Msxml2.XMLHTTP');
} catch (e) {
    try {
        shoutoutpg  = new ActiveXObject('Microsoft.XMLHTTP');
    } catch (E) {
        shoutoutpg  = false;
    }
}
if (!shoutoutpg  && typeof XMLHttpRequest != 'undefined') {
    shoutoutpg  = new XMLHttpRequest();
}
    var obj = document.getElementById(objID);
    shoutoutpg.open('GET', pag, true);
    shoutoutpg.onreadystatechange = function () {
        if (shoutoutpg.readyState == 4 && shoutoutpg.status == 200) {
            obj.innerHTML = shoutoutpg.responseText;
            setTimeout(function(){shoutoutload('./tabboinkerz/shoutouts.php','shoutouts')},2000); 
            
        }
    }
    shoutoutpg.send(null);
}

 function _boinking(_id){
    var statuspg = false;
try {
    statuspg = new ActiveXObject('Msxml2.XMLHTTP');
} catch (e) {
    try {
        statuspg = new ActiveXObject('Microsoft.XMLHTTP');
    } catch (E) {
        statuspg = false;
    }
}
if (!statuspg && typeof XMLHttpRequest != 'undefined') {
    statuspg = new XMLHttpRequest();
}
    var loadbarr=document.getElementById('loadbar');
    loadbarr.innerHTML="<img class='icoload'src='./bleeeperimg/load1.gif' width='30px' height='30px'/>";
    var boink=document.getElementById('boink_update').value;
    if(boink == ""){
        alert("Write something in order to Boink!");
        loadbarr.innerHTML=null;
        
        }
     else{
   
            url="./tabboinkerz/boinking.php"
            var datastr="id="+_id+"& boink_update="+boink;
            statuspg.open('POST',url,true);
            statuspg.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
            statuspg.send(datastr);
            statuspg.onreadystatechange = function () {
            if (statuspg.readyState == 4 && statuspg.status == 200) {
            var msg=document.getElementById('boink_success');
            msg.style.display="block"
            var msg=document.getElementById('boink_success');
            var boink=document.getElementById('boink_update');
            boink.value="";
            setTimeout(function(){_boinkerz_screen()},3000);
            shoutoutload('./tabboinkerz/boinkerz.php','others');
                       
            }
            }
            return false;
     }
            }

 function _shoutout(_id){
    var statuspg = false;
try {
    statuspg = new ActiveXObject('Msxml2.XMLHTTP');
} catch (e) {
    try {
        statuspg = new ActiveXObject('Microsoft.XMLHTTP');
    } catch (E) {
        statuspg = false;
    }
}
if (!statuspg && typeof XMLHttpRequest != 'undefined') {
    statuspg = new XMLHttpRequest();
}
    var loadbarr=document.getElementById('loadbar');
    loadbarr.innerHTML="<img class='icoload'src='./bleeeperimg/load1.gif' width='30px' height='30px'/>";
    var boink=document.getElementById('_shoutout_update').value;
    if(boink == ""){
        alert("You must write something in order to send a shout out");
        loadbarr.innerHTML=null;
        
        }
     else{
   
            url="./tabboinkerz/_sending_shoutout.php"
            var datastr="id="+_id+"& shoutout_update="+boink;
            statuspg.open('POST',url,true);
            statuspg.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
            statuspg.send(datastr);
            statuspg.onreadystatechange = function () {
            if (statuspg.readyState == 4 && statuspg.status == 200) {
            var msg=document.getElementById('shoutout_success');
            msg.style.display="block"
            var msg=document.getElementById('shoutout_success');
            var boink=document.getElementById('_shoutout_update');
            boink.value="";
            setTimeout(function(){_shoutout_screen()},3000);
            updates('./tabboinkerz/shoutouts.php','shoutouts');             
            }
            }
            return false;
     }
            }
function _boinkerz_screen(){
         var boink_success=document.getElementById('boink_success');
         boink_success.style.display="none";
         var loadbarr=document.getElementById('loadbar');
         loadbarr.innerHTML=null;
    
    }
function _shoutout_screen(){
         var boink_success=document.getElementById('shoutout_success');
         boink_success.style.display="none";
         var loadbarr=document.getElementById('loadbar');
         loadbarr.innerHTML=null;
    
    }