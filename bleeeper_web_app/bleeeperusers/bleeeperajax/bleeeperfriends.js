// JavaScript Document
function _stop_follow(_send,_rec){
    var friendstab = false;
try {
    friendstab = new ActiveXObject('Msxml2.XMLHTTP');
} catch (e) {
    try {
        friendstab = new ActiveXObject('Microsoft.XMLHTTP');
    } catch (E) {
        friendstab = false;
    }
}
if (!friendstab && typeof XMLHttpRequest != 'undefined') {
    friendstab = new XMLHttpRequest();
}
            var loadbarr=document.getElementById('loadbar');
            loadbarr.innerHTML="<img class='icoload'src='./bleeeperimg/load1.gif' width='30px' height='30px'/>";
            url="./tabfriends/_stop_follow.php"
            var datastr="id_sender="+_send+"&id_rec="+_rec;
            friendstab.open('POST',url,true);
            friendstab.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
            friendstab.send(datastr);
            friendstab.onreadystatechange = function () {
            if (friendstab.readyState == 4 && friendstab.status == 200) {
            var msg=document.getElementById('msgdialog');
            msg.style.display="block"
            msg.innerHTML=friendstab.responseText;
            loadseg('./tabfriends/following.php' ,'friends-content');
            setTimeout(function(){pscreen()},3000);
            }
            }
            return false;
            
            }
            
 function _reject_req(_send,_rec){
     var friendstab = false;
try {
    friendstab = new ActiveXObject('Msxml2.XMLHTTP');
} catch (e) {
    try {
        friendstab = new ActiveXObject('Microsoft.XMLHTTP');
    } catch (E) {
        friendstab = false;
    }
}
if (!friendstab && typeof XMLHttpRequest != 'undefined') {
    friendstab = new XMLHttpRequest();
}
            var loadbarr=document.getElementById('loadbar');
            loadbarr.innerHTML="<img class='icoload'src='./bleeeperimg/load1.gif' width='30px' height='30px'/>";
              
            url="./tabfriends/_reject_req.php"
            var datastr="id_sender="+_send+"&id_rec="+_rec;
            friendstab.open('POST',url,true);
            friendstab.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
            friendstab.send(datastr);
            friendstab.onreadystatechange = function () {
            if (friendstab.readyState == 4 && friendstab.status == 200) {
            var msg=document.getElementById('msgdialog');
            msg.style.display="block"
            msg.innerHTML=friendstab.responseText;
            setTimeout(function(){pscreen()},3000);
            loadseg('./tabfriends/friendrequest.php' ,'friends-content');
            }
            }
            return false;
            }
function funcfrend_unfriend(_send,_rec){
     var friendstab = false;
try {
    friendstab = new ActiveXObject('Msxml2.XMLHTTP');
} catch (e) {
    try {
        friendstab = new ActiveXObject('Microsoft.XMLHTTP');
    } catch (E) {
        friendstab = false;
    }
}
if (!friendstab && typeof XMLHttpRequest != 'undefined') {
    friendstab = new XMLHttpRequest();
}
            var loadbarr=document.getElementById('loadbar');
            loadbarr.innerHTML="<img class='icoload'src='./bleeeperimg/load1.gif' width='30px' height='30px'/>";
              
            url="./tabfriends/_unfriend.php"
            var datastr="id_sender="+_send+"&id_rec="+_rec;
            friendstab.open('POST',url,true);
            friendstab.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
            friendstab.send(datastr);
            friendstab.onreadystatechange = function () {
            if (friendstab.readyState == 4 && friendstab.status == 200) {
            var msg=document.getElementById('msgdialog');
            msg.style.display="block"
            msg.innerHTML=friendstab.responseText;
            setTimeout(function(){pscreen()},3000);
            loadseg('./tabfriends/friendlist.php' ,'friends-content');
            }
            }
            return false;
            }			

 function _accept_req(_send,_rec){
     var friendstab = false;
try {
    friendstab = new ActiveXObject('Msxml2.XMLHTTP');
} catch (e) {
    try {
        friendstab = new ActiveXObject('Microsoft.XMLHTTP');
    } catch (E) {
        friendstab = false;
    }
}
if (!friendstab && typeof XMLHttpRequest != 'undefined') {
    friendstab = new XMLHttpRequest();
}
            var loadbarr=document.getElementById('loadbar');
            loadbarr.innerHTML="<img class='icoload'src='./bleeeperimg/load1.gif' width='30px' height='30px'/>";
      
            url="./tabfriends/_accept_req.php"
            var datastr="id_sender="+_send+"&id_rec="+_rec;
            friendstab.open('POST',url,true);
            friendstab.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
            friendstab.send(datastr);
            friendstab.onreadystatechange = function () {
            if (friendstab.readyState == 4 && friendstab.status == 200) {
            var msg=document.getElementById('msgdialog');
            msg.style.display="block"
            msg.innerHTML=friendstab.responseText;
            setTimeout(function(){pscreen()},3000);
            loadseg('./tabfriends/friendrequest.php' ,'friends-content');
            }
            }
            return false;
            }