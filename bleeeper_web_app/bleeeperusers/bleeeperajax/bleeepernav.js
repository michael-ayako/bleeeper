function loadseg(pag, objID) {
    var navigationtab = false;
try {
    navigationtab = new ActiveXObject('Msxml2.XMLHTTP');
} catch (e) {
    try {
        navigationtab = new ActiveXObject('Microsoft.XMLHTTP');
    } catch (E) {
        navigationtab = false;
    }
}
if (!navigationtab && typeof XMLHttpRequest != 'undefined') {
    navigationtab = new XMLHttpRequest();
}
    var obj = document.getElementById(objID);
    var loadbarr=document.getElementById('loadbar');
    loadbarr.innerHTML="<img class='icoload'src='./bleeeperimg/load1.gif' width='30px' height='30px'/>";
    navigationtab.open('GET', pag, true);
    navigationtab.onreadystatechange = function () {
        if (navigationtab.readyState == 4 && navigationtab.status == 200) {
            obj.innerHTML = navigationtab.responseText; 
            loadbarr.innerHTML="";
        }
    }
    navigationtab.send(null);
}
function pscreen(){
         var msg=document.getElementById('msgdialog');
         msg.style.display="none"
         var vscreen=document.getElementById('purplescreen');
         vscreen.style.display="none";
         var loadbarr=document.getElementById('loadbar');
         loadbarr.innerHTML=null;

    }
function pscreen2(){
         var msg=document.getElementById('msgdialog');
         msg.style.display="none"
		 var loadbarr=document.getElementById('loadbar');
         loadbarr.innerHTML=null;
    }
function pscreen3(){
		 var loadbarr=document.getElementById('loadbar');
         loadbarr.innerHTML=null;
    }
function loadstatus(pag, objID) {
    var navigationtab = false;
try {
    navigationtab = new ActiveXObject('Msxml2.XMLHTTP');
} catch (e) {
    try {
        navigationtab = new ActiveXObject('Microsoft.XMLHTTP');
    } catch (E) {
        navigationtab = false;
    }
}
if (!navigationtab && typeof XMLHttpRequest != 'undefined') {
    navigationtab = new XMLHttpRequest();
}
    var obj = document.getElementById(objID);
    var loadbarr=document.getElementById('loadbar');
    loadbarr.innerHTML="<img class='icoload'src='./bleeeperimg/load1.gif' width='30px' height='30px'/>";
    navigationtab.open('GET', pag, true);
    navigationtab.onreadystatechange = function () {
        if (navigationtab.readyState == 4 && navigationtab.status == 200) {
            obj.innerHTML = navigationtab.responseText; 
            loadbarr.innerHTML="";
            setTimeout(function(){shoutoutload('./tabboinkerz/shoutouts.php','shoutouts')},0000);
            setTimeout(function(){updates('./tabboinkerz/boinkerz.php','others')},0000);
        }
    }
    navigationtab.send(null);
}

function loadsects(){
    loadstatus('./status.php' ,'contentpane');
    loadsidebar('./homefunc/friendstab.php' ,'freinds');
    loadnotificator('./tabnotificator/fetchnotificator.php' ,'notificator');
    }

function loadsidebar(pag, objID) {
    var loadfriends = false;
    try {
    loadfriends = new ActiveXObject('Msxml2.XMLHTTP');
    } catch (e) {
    try {
    loadfriends = new ActiveXObject('Microsoft.XMLHTTP');
    } catch (E) {
    loadfriends = false;
    }
}
if (!loadfriends && typeof XMLHttpRequest != 'undefined') {
    loadfriends= new XMLHttpRequest();
}
    var obj = document.getElementById(objID);
    loadfriends.open('GET', pag, true);
    loadfriends.onreadystatechange = function () {
        if (loadfriends.readyState == 4 && loadfriends.status == 200) {
            obj.innerHTML = loadfriends.responseText; 
            setTimeout(function(){loadsidebar('./homefunc/friendstab.php' ,'freinds')},3000);
        }
    }
    loadfriends.send(null);
}
function loadnotificator(pag, objID) {
    var loadnotifier = false;
    try {
    loadnotifier  = new ActiveXObject('Msxml2.XMLHTTP');
    } catch (e) {
    try {
    loadnotifier  = new ActiveXObject('Microsoft.XMLHTTP');
    } catch (E) {
    loadnotifier  = false;
    }
}
if (!loadnotifier  && typeof XMLHttpRequest != 'undefined') {
    loadnotifier = new XMLHttpRequest();
}
    var obj = document.getElementById(objID);
    loadnotifier .open('GET', pag, true);
    loadnotifier .onreadystatechange = function () {
        if (loadnotifier .readyState == 4 && loadnotifier .status == 200) {
            obj.innerHTML = loadnotifier.responseText; 
            setTimeout(function(){loadnotificator('./tabnotificator/fetchnotificator.php' ,'notificator')},1000);
        }
    }
    loadnotifier .send(null);
}


