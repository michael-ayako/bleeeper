// JavaScript Document
function loadmessages(pag, objID) {
    var msg = false;
try {
    msg = new ActiveXObject('Msxml2.XMLHTTP');
} catch (e) {
    try {
        msg = new ActiveXObject('Microsoft.XMLHTTP');
    } catch (E) {
        msg = false;
    }
}
if (!msg && typeof XMLHttpRequest != 'undefined') {
    msg = new XMLHttpRequest();
}
    var obj = document.getElementById(objID);
    var loadbarr=document.getElementById('loadbar');
    loadbarr.innerHTML="<img class='icoload'src='./bleeeperimg/load1.gif' width='30px' height='30px'/>";
    msg.open('GET', pag, true);
    msg.onreadystatechange = function () {
        if (msg.readyState == 4 && msg.status == 200) {
            obj.innerHTML = msg.responseText; 
            loadbarr.innerHTML="";
            loadsegmessages('./tabmessages/msgarchive.php' ,'message-content');
        }
    }
    msg.send(null);
}

function loadsegmessages(pag, objID) {
    var msg = false;
try {
    msg = new ActiveXObject('Msxml2.XMLHTTP');
} catch (e) {
    try {
        msg = new ActiveXObject('Microsoft.XMLHTTP');
    } catch (E) {
        msg = false;
    }
}
if (!msg && typeof XMLHttpRequest != 'undefined') {
    msg = new XMLHttpRequest();
}
    var obj = document.getElementById(objID);
    msg.open('GET', pag, true);
    msg.onreadystatechange = function () {
        if (msg.readyState == 4 && msg.status == 200) {
            obj.innerHTML = msg.responseText; 
            setTimeout(function(){loadsegmessages('./tabmessages/msgarchive.php' ,'message-content')},5000);
        }

        
    }
    msg.send(null);
}

function loadthread(pag, objID,id,name) {
    var msg = false;
try {
    msg = new ActiveXObject('Msxml2.XMLHTTP');
} catch (e) {
    try {
        msg = new ActiveXObject('Microsoft.XMLHTTP');
    } catch (E) {
        msg = false;
    }
}
if (!msg && typeof XMLHttpRequest != 'undefined') {
    msg = new XMLHttpRequest();
}
    var obj = document.getElementById(objID);
    var loadbarr=document.getElementById('loadbar');
    loadbarr.innerHTML="<img class='icoload'src='./bleeeperimg/load1.gif' width='30px' height='30px'/>";
    msg.open('POST', pag, true);
    msg.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
    msg.send("id="+id+"&name="+name);
    msg.onreadystatechange = function () {
        if (msg.readyState == 4 && msg.status == 200) {
            obj.innerHTML = msg.responseText; 
            loadbarr.innerHTML="";
            
            reloadthread('./tabmessages/thread.php','msg_user_thread',id,name);
        }
    }
    
}
function reloadthread(pag, objID,id,name) {
    var rel = false;
try {
    rel = new ActiveXObject('Msxml2.XMLHTTP');
} catch (e) {
    try {
       rel = new ActiveXObject('Microsoft.XMLHTTP');
    } catch (E) {
       rel = false;
    }
}
if (!rel && typeof XMLHttpRequest != 'undefined') {
    rel = new XMLHttpRequest();
}
    var obj = document.getElementById(objID);
    rel.open('POST', pag, true);
    rel.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
    rel.send("id="+id+"&name="+name);
    rel.onreadystatechange = function () {
        if (rel.readyState == 4 && rel.status == 200) {
            obj.innerHTML = rel.responseText; 
            reloadthread(pag, objID,id,name);
            
        }
    }
}
function msgcompose(){
    
var msgcomp = false;
try {
    msgcomp = new ActiveXObject('Msxml2.XMLHTTP');
} catch (e) {
    try {
        msgcomp = new ActiveXObject('Microsoft.XMLHTTP');
    } catch (E) {
        msg = false;
    }
}
if (!msgcomp && typeof XMLHttpRequest != 'undefined') {
    msgcomp = new XMLHttpRequest();
}
    var pscrn=document.getElementById('purplescreen');
    pscrn.style.display="block"
    var msg=document.getElementById('tabmessages');
    msg.style.display="block"
    var loadbarr=document.getElementById('loadbar');
    loadbarr.innerHTML="<img class='icoload'src='./bleeeperimg/load1.gif' width='30px' height='30px'/>";
    pag="./tabmessages/composemsg.php";
    
    msgcomp.open('GET', pag, true);
    msgcomp.onreadystatechange = function () {
        if (msgcomp.readyState == 4 && msgcomp.status == 200) {
            var obj=document.getElementById('tabmessages-content');
            obj.innerHTML = msgcomp.responseText; 
            loadbarr.innerHTML="";
        }
    }
    msgcomp.send(null);
    }
    
    
function unload_scripts(){
        var rel = false;
try {
    rel = new ActiveXObject('Msxml2.XMLHTTP');
} catch (e) {
    try {
       rel = new ActiveXObject('Microsoft.XMLHTTP');
    } catch (E) {
       rel = false;
    }
}
if (!rel && typeof XMLHttpRequest != 'undefined') {
    rel = new XMLHttpRequest();
}
    var pscrn=document.getElementById('purplescreen');
    pscrn.style.display="none"
    var msg=document.getElementById('tabmessages');
    msg.style.display="none";
    var msgthread=document.getElementById('tabmessages-content');
    msgthread.innerHTML="";
    rel.abort();
    
    }
    
    
function searchlist(){
    var msg = false;
try {
    msg = new ActiveXObject('Msxml2.XMLHTTP');
} catch (e) {
    try {
        msg = new ActiveXObject('Microsoft.XMLHTTP');
    } catch (E) {
        msg = false;
    }
}
if (!msg && typeof XMLHttpRequest != 'undefined') {
    msg = new XMLHttpRequest();
}    
    var loadbarr=document.getElementById('loadbar');
    loadbarr.innerHTML="<img class='icoload'src='./bleeeperimg/load1.gif' width='30px' height='30px'/>";
    var elementbutt=document.getElementById('rec').value;
    var url = './tabmessages/searchlist.php';
    datastr="element="+elementbutt;
    msg.open('POST',url,true);
    msg.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
    msg.send(datastr);
    msg.onreadystatechange=function(){
        if (msg.readyState == 4 && msg.status == 200) {
            loadbarr.innerHTML="";
            var slist=document.getElementById('searchfriendlist');
            slist.style.display="Block";
            slist.innerHTML=msg.responseText;

            }
    
    }
    }
function addlist(id,names){
    var textbox=document.getElementById('rec');
    textbox.setAttribute('data',id);
    textbox.value=names;
    textbox.disabled=true;
    var slist=document.getElementById('searchfriendlist');
    slist.style.display="none";
    var msgcancel=document.getElementById('msgcancel');
    msgcancel.style.width="50px";
    }
    
function msgactivate(){
    var textbox=document.getElementById('rec');
    textbox.disabled=false;
    var msgcancel=document.getElementById('msgcancel');
    msgcancel.style.width="0px";
    textbox.value=null;
    textbox.setAttribute('data',"");
    }
function send_message(sender_id){
    var msg = false;
try {
    msg = new ActiveXObject('Msxml2.XMLHTTP');
} catch (e) {
    try {
        msg = new ActiveXObject('Microsoft.XMLHTTP');
    } catch (E) {
        msg = false;
    }
}
if (!msg && typeof XMLHttpRequest != 'undefined') {
    msg = new XMLHttpRequest();
}
    var textbox=document.getElementById('rec');
    rec_id=textbox.getAttribute('data');
    rec_name=textbox.value;
    var msgscript= document.getElementById('msgscript').value;
    if(rec_id=="")
    alert("Ensure all fields are fields"); 
    else if(rec_id==null)
    alert("Ensure all fields are fields"); 
    else if(msgscript=="")
    alert("Ensure all fields are fields");
    else if(msgscript==null)
    alert("Ensure all fields are fields");
    else{     
    datastr="send_id="+sender_id+"&rec_id="+rec_id+"&msg="+msgscript;
    var url = './tabmessages/messagesend.php';
    msg.open('POST', url, true);
    msg.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
    msg.send(datastr);
    msg.onreadystatechange = function () {
    if (msg.readyState == 4 && msg.status == 200) {
    loadthread('./tabmessages/msgthread.php' ,'tabmessages-content',rec_id,rec_name);
    }
    }
    }
    return false;
    }

function chat_message(sender_id,rec_id,name){
    var msg = false;
try {
    msg = new ActiveXObject('Msxml2.XMLHTTP');
} catch (e) {
    try {
        msg = new ActiveXObject('Microsoft.XMLHTTP');
    } catch (E) {
        msg = false;
    }
}
if (!msg && typeof XMLHttpRequest != 'undefined') {
    msg = new XMLHttpRequest();
}
    
    var msgscript= document.getElementById('msg_throw').value;
    if(rec_id=="")
    alert("Ensure all fields are fields"); 
    else if(rec_id==null)
    alert("Ensure all fields are fields"); 
    else if(msgscript=="")
    alert("Ensure all fields are fields");
    else if(msgscript==null)
    alert("Ensure all fields are fields");
    else{    
    datastr="send_id="+sender_id+"&rec_id="+rec_id+"&msg="+msgscript;
    var url = './tabmessages/messagesend.php';
    msg.open('POST', url, true);
    msg.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
    msg.send(datastr);
    msg.onreadystatechange = function () {
    if (msg.readyState == 4 && msg.status == 200) {
    var msgscript= document.getElementById('msg_throw');
    msgscript.value="";
    reloadthread('./tabmessages/thread.php','msg_user_thread',rec_id,name)

 
    }
    }
    }
    return false;
    }
function viewthread(rec_id,rec_name){
    var pscrn=document.getElementById('purplescreen');
    pscrn.style.display="block"
    var msg=document.getElementById('tabmessages');
    msg.style.display="block"
    loadthread('./tabmessages/msgthread.php' ,'tabmessages-content',rec_id,rec_name);
    }