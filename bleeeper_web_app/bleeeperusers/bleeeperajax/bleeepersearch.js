// JavaScript Document
function searchloadseg(pag, objID) {
    var searchtab = false;
try {
    searchtab = new ActiveXObject('Msxml2.XMLHTTP');
} catch (e) {
    try {
        searchtab = new ActiveXObject('Microsoft.XMLHTTP');
    } catch (E) {
        searchtab = false;
    }
}
if (!searchtab && typeof XMLHttpRequest != 'undefined') {
    searchtab = new XMLHttpRequest();
}
    var obj = document.getElementById(objID);
    var loadbarr=document.getElementById('loadbar');
    loadbarr.innerHTML="<img class='icoload'src='./bleeeperimg/load1.gif' width='30px' height='30px'/>";
    searchtab.open('GET', pag, true);
    searchtab.onreadystatechange = function () {
        if (searchtab.readyState == 4 && searchtab.status == 200) {

            obj.innerHTML = searchtab.responseText; 
            loadbarr.innerHTML="";
            }

    }
    searchtab.send(null);
}


function searchbutt(){
    var searchtab = false;
try {
    searchtab = new ActiveXObject('Msxml2.XMLHTTP');
} catch (e) {
    try {
        searchtab = new ActiveXObject('Microsoft.XMLHTTP');
    } catch (E) {
        searchtab = false;
    }
}
if (!searchtab && typeof XMLHttpRequest != 'undefined') {
    searchtab = new XMLHttpRequest();
}
    var elementbutt=document.getElementById('searchtab').value;
    var loadbarr=document.getElementById('loadbar');
    loadbarr.innerHTML="<img class='icoload'src='./bleeeperimg/load1.gif' width='30px' height='30px'/>";
    var url = './tabprofile/profileedit.php';
    datastr="element="+elementbutt;
    url="./tabsearch/tabsearch.php"
    searchtab.open('POST',url,true);
    searchtab.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
    searchtab.send(datastr);
    searchtab.onreadystatechange=function(){
        if (searchtab.readyState == 4 && searchtab.status == 200) {
            loadbarr.innerHTML=null;
            obj=document.getElementById('_load');
            obj.innerHTML=searchtab.responseText;
            if(searchtab.responseText!="")
            {
            objID=document.getElementById('searchstatus');
            objID.innerHTML="<div class='success'>Results</div>";
            
            }
            else{
            objID=document.getElementById('searchstatus');
            objID.innerHTML="<div class='failed' style='margin-left:100px;'>Your freind is not registered into the system</div>";;
                }
         
         }
        }
    return false;
    }
 function funcfrend_req(_send,_rec){
    var searchtab = false;
try {
    searchtab = new ActiveXObject('Msxml2.XMLHTTP');
} catch (e) {
    try {
        searchtab = new ActiveXObject('Microsoft.XMLHTTP');
    } catch (E) {
        searchtab = false;
    }
}
if (!searchtab && typeof XMLHttpRequest != 'undefined') {
    searchtab = new XMLHttpRequest();
} 
    var loadbarr=document.getElementById('loadbar');
    loadbarr.innerHTML="<img class='icoload'src='./bleeeperimg/load1.gif' width='30px' height='30px'/>";
        if(_send ==_rec){
         var msg=document.getElementById('msgdialog');
         msg.style.display="block"
         msg.innerHTML="<div id='error_friend_req_1'><div class='title'><strong>Oops!</strong>Error</div><div class='dialogmessage'>You cannot send yourself a friend    request</div><div class='dialogmsgbuttons'><button style='width:130px;height:30px;border-style:none;'onclick='pscreen2();return false;'>OK</button></div></div>"
         setTimeout(function(){pscreen2()},3000);
         }else if(_send !=_rec){
            url="./tabsearch/frend_req.php"
            var datastr="id_sender="+_send+"&id_rec="+_rec;
            searchtab.open('POST',url,true);
            searchtab.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
            searchtab.send(datastr);
            searchtab.onreadystatechange = function () {
            if (searchtab.readyState == 4 && searchtab.status == 200) {
            var msg=document.getElementById('msgdialog');
            msg.style.display="block"
            msg.innerHTML=searchtab.responseText;
            setTimeout(function(){pscreen2()},3000);
            }
            }
            return false;
            }
            }



 function funcfrend_follow(_send,_rec){
    var searchtab = false;
try {
    searchtab = new ActiveXObject('Msxml2.XMLHTTP');
} catch (e) {
    try {
        searchtab = new ActiveXObject('Microsoft.XMLHTTP');
    } catch (E) {
        searchtab = false;
    }
}
if (!searchtab && typeof XMLHttpRequest != 'undefined') {
    searchtab = new XMLHttpRequest();
}
    var loadbarr=document.getElementById('loadbar');
    loadbarr.innerHTML="<img class='icoload'src='./bleeeperimg/load1.gif' width='30px' height='30px'/>";
        if(_send ==_rec){
         var msg=document.getElementById('msgdialog');
         msg.style.display="block"
         msg.innerHTML="<div id='error_friend_req_1'><div class='title'><strong>Oops!</strong>Error</div><div class='dialogmessage'>You cannot follow yourself</div><div class='dialogmsgbuttons'><button style='width:130px;height:30px;border-style:none;'onclick='pscreen2();return false;'>OK</button></div></div>"
         setTimeout(function(){pscreen2()},3000);
         }else if(_send !=_rec){
            url="./tabsearch/follow.php"
            var datastr="id_sender="+_send+"&id_rec="+_rec;
            searchtab.open('POST',url,true);
            searchtab.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
            searchtab.send(datastr);
            searchtab.onreadystatechange = function () {
            if (searchtab.readyState == 4 && searchtab.status == 200) {
            var msg=document.getElementById('msgdialog');
            msg.style.display="block"
            msg.innerHTML=searchtab.responseText; 
            setTimeout(function(){pscreen2()},3000);   
            }
            }
            return false;
            }
            }
 function funcfrend_block(_send,_rec){
     var searchtab = false;
try {
    searchtab = new ActiveXObject('Msxml2.XMLHTTP');
} catch (e) {
    try {
        searchtab = new ActiveXObject('Microsoft.XMLHTTP');
    } catch (E) {
        searchtab = false;
    }
}
if (!searchtab && typeof XMLHttpRequest != 'undefined') {
    searchtab = new XMLHttpRequest();
}
     
    var loadbarr=document.getElementById('loadbar');
    loadbarr.innerHTML="<img class='icoload'src='./bleeeperimg/load1.gif' width='30px' height='30px'/>";
        if(_send ==_rec){
         var msg=document.getElementById('msgdialog');
         msg.style.display="block"
         msg.innerHTML="<div id='error_friend_req_1'><div class='title'><strong>Oops!</strong>Error</div><div class='dialogmessage'> You cannot block yourself</div><div class='dialogmsgbuttons'><button style='width:130px;height:30px;border-style:none;'onclick='pscreen2();return false;'>OK</button></div></div>"
         }else if(_send !=_rec){
            url="./tabsearch/_block.php"
            var datastr="id_sender="+_send+"&id_rec="+_rec;
            searchtab.open('POST',url,true);
            searchtab.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
            searchtab.send(datastr);
            searchtab.onreadystatechange = function () {
            if (searchtab.readyState == 4 && searchtab.status == 200) {
            var msg=document.getElementById('msgdialog');
            msg.style.display="block"
            msg.innerHTML=searchtab.responseText; 
            setTimeout(function(){pscreen2()},3000);                
            }
            }
            return false;
            }
            }
            