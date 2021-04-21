// JavaScript Document
function submitnewgroup(adminid){
    var newgrouptab = false;
try {
    newgrouptab = new ActiveXObject('Msxml2.XMLHTTP');
} catch (e) {
    try {
        newgrouptab = new ActiveXObject('Microsoft.XMLHTTP');
    } catch (E) {
        newgrouptab = false;
    }
}
if (!newgrouptab && typeof XMLHttpRequest != 'undefined') {
    newgrouptab = new XMLHttpRequest();
}
    var objID = document.getElementById('err');
    objID.style.display = 'block';
    objID.innerHTML="<img class='icoload'src='./bleeeperimg/load1.gif' style='margin-left:100px;width:25px;height:25px;'>" ;
    var grpname=document.getElementById('grpname').value;
    var abtgrp=document.getElementById('abtgrp').value;
    var url = './tabgroups/funccreategrp.php';
    datastr="grpname="+grpname+"&adminid="+adminid+"&abtgrp="+abtgrp;
    url="./tabgroups/funccreategrp.php"
    newgrouptab.open('POST',url,true);
    newgrouptab.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
    newgrouptab.send(datastr);
    newgrouptab.onreadystatechange = function () {
    if (newgrouptab.readyState == 4 && newgrouptab.status == 200) {
    if(newgrouptab.responseText=="1"){ 
    var objID = document.getElementById('err');
    objID.style.display = 'block';
    objID.innerHTML="<div class='failed'>Ensure you fill in your new group name</div>";
    }
    else if(newgrouptab.responseText=="2") {
    var objID = document.getElementById('err');
    objID.style.display = 'block';
    objID.innerHTML="<div class='failed'>Ensure you say something about your group</div>";
        
    }
    else if(newgrouptab.responseText=="3") {
    var objID = document.getElementById('err');
    objID.style.display = 'block';
    objID.innerHTML="<div class='failed'>Ensure your group name contains 5-16 characters</div>";
        
    }
    else if(newgrouptab.responseText=="4") {
    var objID = document.getElementById('err');
    objID.style.display = 'block';
    objID.innerHTML="<div class='failed'>Ensure you fill in something lengthier about your group between 40- 100 characters</div>";
        
    }else if(newgrouptab.responseText=="5") {
    var objID = document.getElementById('createnewgroupform');
    objID.innerHTML="<div class='success'>Group '"+grpname+"' has been successfully created</div>";
    setTimeout(function(){loadseg('./tabgroups/mygroups.php' ,'groups-pane');},3000);
    }
    

}
}
}
function funcgroupsearch(elementsearch,objID){
        var grpres = false;
try {
    grpres = new ActiveXObject('Msxml2.XMLHTTP');
} catch (e) {
    try {
        grpres = new ActiveXObject('Microsoft.XMLHTTP');
    } catch (E) {
        grpres = false;
    }
}
if (!grpres && typeof XMLHttpRequest != 'undefined') {
    grpres = new XMLHttpRequest();
}
    var element=document.getElementById('elementsearch').value;
    var url = './tabgroups/groupsearchres.php';
    datastr="grpnames="+element;
    grpres.open('POST',url,true);
    grpres.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
    grpres.send(datastr);
    grpres.onreadystatechange=function(){
        if (grpres.readyState == 4 && grpres.status == 200) {
            obj=document.getElementById(objID);
            obj.innerHTML=grpres.responseText;
        }

    }
 }
function funcgrp_req(sid,gid){
        var grpres = false;
try {
    grpres = new ActiveXObject('Msxml2.XMLHTTP');
} catch (e) {
    try {
        grpres = new ActiveXObject('Microsoft.XMLHTTP');
    } catch (E) {
        grpres = false;
    }
}
if (!grpres && typeof XMLHttpRequest != 'undefined') {
    grpres = new XMLHttpRequest();
} 
    var url = './tabgroups/groupjoinreq.php';
    datastr="sid="+sid+"&gid="+gid;
    grpres.open('POST',url,true);
    grpres.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
    grpres.send(datastr);
    grpres.onreadystatechange=function(){
        if (grpres.readyState == 4 && grpres.status == 200) {
            var msg=document.getElementById('msgdialog');
            msg.style.display="block"
            msg.innerHTML=grpres.responseText;
            //setTimeout(function(){pscreen()},3000);
            
        }

    }
 }
function funcmygroupsearch(elementsearch,objID){
        var grpres = false;
try {
    grpres = new ActiveXObject('Msxml2.XMLHTTP');
} catch (e) {
    try {
        grpres = new ActiveXObject('Microsoft.XMLHTTP');
    } catch (E) {
        grpres = false;
    }
}
if (!grpres && typeof XMLHttpRequest != 'undefined') {
    grpres = new XMLHttpRequest();
}
    var element=document.getElementById('elementsearch').value;
    var url = './tabgroups/resloadmygroup.php';
    datastr="grpnames="+element;
    grpres.open('POST',url,true);
    grpres.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
    grpres.send(datastr);
    grpres.onreadystatechange=function(){
        if (grpres.readyState == 4 && grpres.status == 200) {
            obj=document.getElementById(objID);
            obj.innerHTML=grpres.responseText;
        }

    }
 }
function manage_grp(grpid){
        var grpres = false;
try {
    grpres = new ActiveXObject('Msxml2.XMLHTTP');
} catch (e) {
    try {
        grpres = new ActiveXObject('Microsoft.XMLHTTP');
    } catch (E) {
        grpres = false;
    }
}
if (!grpres && typeof XMLHttpRequest != 'undefined') {
    grpres = new XMLHttpRequest();
} 
    var loadtabgrpmanagement=document.getElementById('tabgroupspopup');
    var pscreen=document.getElementById('purplescreen');
    loadtabgrpmanagement.style.display='block';
    pscreen.style.display='block';
    var url = './tabgroups/groupadmin.php';
    datastr="grpid="+grpid;
    grpres.open('POST',url,true);
    grpres.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
    grpres.send(datastr);
        grpres.onreadystatechange=function(){
        if (grpres.readyState == 4 && grpres.status == 200) {
            var slist=document.getElementById('tabgroupspopup-content');
            slist.innerHTML=grpres.responseText;
            load_manage_grpedit(grpid,'./tabgroups/groupeditinfo.php','groupadminentity');
            
            
            }
    }
    }
function funcclose_tabgroupspopup(){
    var loadtabgrpmanagement=document.getElementById('tabgroupspopup');
    var pscreen=document.getElementById('purplescreen');
    var slist=document.getElementById('tabgroupspopup-content');
    loadtabgrpmanagement.style.display='none';
    pscreen.style.display='none';
    slist.innerHTML="";
    pscreen2();
    
    }
function load_manage_grp(grpid,pag,obj){
        var grpres = false;
try {
    grpres = new ActiveXObject('Msxml2.XMLHTTP');
} catch (e) {
    try {
        grpres = new ActiveXObject('Microsoft.XMLHTTP');
    } catch (E) {
        grpres = false;
    }
}
if (!grpres && typeof XMLHttpRequest != 'undefined') {
    grpres = new XMLHttpRequest();
}   
    var url = pag;
    var objID=document.getElementById(obj);
    objID.innerHTML="";
    datastr="grpid="+grpid;
    grpres.open('POST',url,true);
    grpres.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
    grpres.send(datastr);
        grpres.onreadystatechange=function(){
        if (grpres.readyState == 4 && grpres.status == 200) {
            var objID=document.getElementById(obj);
            objID.innerHTML=grpres.responseText;
                        
            }
    }
}
function load_manage_grpedit(grpid,pag,obj){
        var grpres = false;
try {
    grpres = new ActiveXObject('Msxml2.XMLHTTP');
} catch (e) {
    try {
        grpres = new ActiveXObject('Microsoft.XMLHTTP');
    } catch (E) {
        grpres = false;
    }
}
if (!grpres && typeof XMLHttpRequest != 'undefined') {
    grpres = new XMLHttpRequest();
}   
    var url = pag;
    var objID=document.getElementById(obj);
    objID.innerHTML="";
    datastr="grpid="+grpid;
    grpres.open('POST',url,true);
    grpres.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
    grpres.send(datastr);
        grpres.onreadystatechange=function(){
        if (grpres.readyState == 4 && grpres.status == 200) {
            var objID=document.getElementById(obj);
            objID.innerHTML=grpres.responseText;
            view_reloadmanage_grp(grpid,'./tabgroups/grpmsgarchive.php','msgarchive');           
            }
    }
    }
function grpnamechange(grpid,col,dat){
             var pscrn=document.getElementById('purplescreen');
             pscrn.style.display="block"
             var msg=document.getElementById('msgdialog');
             msg.style.display="block"
             msg.innerHTML="<div id='profile_input_2'>"+
             "<div class='title'><strong>Change!</strong> The Group name</div>"+
             "<div class='dialogmessage'>You are changing the group's name from '"+dat+"' to :<br/>"+
             "<input type='text' id='profupdate' placeholder='Group name...' autofocus></div>"+
             "<div class='dialogmsgbuttons'>"+
             "<button style='width:130px;height:30px;border-style:none;' id='changeupdate'>OK</button>"+
             "<button style='width:130px;height:30px;border-style:none;'onclick='pscreen2();return false;'>Cancel</button>"+
             "</div></div>";
             var proceed=document.getElementById('changeupdate');
             proceed.onclick=function(){
                 var dat=document.getElementById('profupdate').value;
                 grpdatachange(dat,col,grpid);
                 } 
}
function abtgrpchange(grpid,col,dat){

             var msg=document.getElementById('msgdialog');
             msg.style.display="block"
             msg.innerHTML="<div id='profile_input_2'>"+
             "<div class='title'><strong>Change!</strong> About Group</div>"+
             "<div class='dialogmessage'>You are changing what you wrote about your group<br/>"+
             "<textarea id='profupdate' placeholder='About your group'></textarea></div>"+
             "<div class='dialogmsgbuttons'>"+
             "<button style='width:130px;height:30px;border-style:none;' id='changeupdate'>OK</button>"+
             "<button style='width:130px;height:30px;border-style:none;'onclick='pscreen2();return false;'>Cancel</button>"+
             "</div></div>";
             var proceed=document.getElementById('changeupdate');
             proceed.onclick=function(){
                 var dat=document.getElementById('profupdate').value;
                 grpdatachange(dat,col,grpid);
                 } 
}
function grpdatachange(dat,col,grpid){
        var grpdetalxx = false;
try {
    grpdetaxx = new ActiveXObject('Msxml2.XMLHTTP');
} catch (e) {
    try {
        grpdetalxx = new ActiveXObject('Microsoft.XMLHTTP');
    } catch (E) {
        grpdetaxxl = false;
    }
}
if (!grpdetalxx && typeof XMLHttpRequest != 'undefined') {
    grpdetalxx = new XMLHttpRequest();
}
    var datastr = 'data=' + dat + '&field=' + col + '&grpid=' + grpid;
    if (dat != null && dat != "") {
        var url = './tabgroups/funcgrpedit.php';
        grpdetalxx.open('POST', url, true);
        grpdetalxx.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
        grpdetalxx.send(datastr);
        grpdetalxx.onreadystatechange = function () {
            if (grpdetalxx.readyState == 4) {
            var msg=document.getElementById('msgdialog');
            msg.style.display="block"
            msg.innerHTML=grpdetalxx.responseText;
            load_manage_grpedit(grpid,'./tabgroups/groupeditinfo.php','groupadminentity');
            return false;
            }
        }
        return false;
    }
    else{
        pscreen2();
        }
}
function funcmyinvite(objID,repID,grpID){
            var grpdetalxx = false;
try {
    grpdetaxx = new ActiveXObject('Msxml2.XMLHTTP');
} catch (e) {
    try {
        grpdetalxx = new ActiveXObject('Microsoft.XMLHTTP');
    } catch (E) {
        grpdetaxxl = false;
    }
}
if (!grpdetalxx && typeof XMLHttpRequest != 'undefined') {
    grpdetalxx = new XMLHttpRequest();
}
        var obj=document.getElementById(objID).value;
        var rep=document.getElementById(repID);
        var url = './tabgroups/invitesearchrep.php';
        var datastr = 'data=' + obj+'&grpid='+grpID;
        grpdetalxx.open('POST', url, true);
        grpdetalxx.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
        grpdetalxx.send(datastr);
        grpdetalxx.onreadystatechange = function () {
            if (grpdetalxx.readyState == 4) {
            rep.innerHTML=grpdetalxx.responseText;
            
            }
        }
        return false;
    
    
    }
function funcinvitegrp_req(sID,rID,gID){
            var grpdetalxx = false;
try {
    grpdetaxx = new ActiveXObject('Msxml2.XMLHTTP');
} catch (e) {
    try {
        grpdetalxx = new ActiveXObject('Microsoft.XMLHTTP');
    } catch (E) {
        grpdetaxxl = false;
    }
}
if (!grpdetalxx && typeof XMLHttpRequest != 'undefined') {
    grpdetalxx = new XMLHttpRequest();
}

        var url = './tabgroups/funcinvite.php';
        var datastr = 'sid=' + sID+'&rid='+rID+'&gid='+gID;
        grpdetalxx.open('POST', url, true);
        grpdetalxx.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
        grpdetalxx.send(datastr);
        grpdetalxx.onreadystatechange = function () {
            if (grpdetalxx.readyState == 4) {
            var msg=document.getElementById('msgdialog');
            msg.style.display="block"
            msg.innerHTML=grpdetalxx.responseText;
            
            
            }
        }
        return false;
    
    
    }
function funcallow_req(mID,gID){
            var grpdetalxx = false;
try {
    grpdetaxx = new ActiveXObject('Msxml2.XMLHTTP');
} catch (e) {
    try {
        grpdetalxx = new ActiveXObject('Microsoft.XMLHTTP');
    } catch (E) {
        grpdetaxxl = false;
    }
}
if (!grpdetalxx && typeof XMLHttpRequest != 'undefined') {
    grpdetalxx = new XMLHttpRequest();
}

        var url = './tabgroups/funcallowreq.php';
        var datastr = 'mid=' + mID+'&gid='+gID;
        grpdetalxx.open('POST', url, true);
        grpdetalxx.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
        grpdetalxx.send(datastr);
        grpdetalxx.onreadystatechange = function () {
            if (grpdetalxx.readyState == 4) {
            var msg=document.getElementById('msgdialog');
            msg.style.display="block"
            msg.innerHTML=grpdetalxx.responseText;
            load_manage_grp(gID,'./tabgroups/requeststojoin.php','groupadminentity')
            
            }
        }
        return false;
    
    
    }
	
function funcdeny_req(mID,gID){
            var grpdetalxx = false;
try {
    grpdetaxx = new ActiveXObject('Msxml2.XMLHTTP');
} catch (e) {
    try {
        grpdetalxx = new ActiveXObject('Microsoft.XMLHTTP');
    } catch (E) {
        grpdetaxxl = false;
    }
}
if (!grpdetalxx && typeof XMLHttpRequest != 'undefined') {
    grpdetalxx = new XMLHttpRequest();
}

        var url = './tabgroups/funcdenyrequest.php';
        var datastr = 'mid=' + mID+'&gid='+gID;
        grpdetalxx.open('POST', url, true);
        grpdetalxx.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
        grpdetalxx.send(datastr);
        grpdetalxx.onreadystatechange = function () {
            if (grpdetalxx.readyState == 4) {
            var msg=document.getElementById('msgdialog');
            msg.style.display="block"
            msg.innerHTML=grpdetalxx.responseText;
            load_manage_grp(gID,'./tabgroups/requeststojoin.php','groupadminentity')
            
            }
        }
        return false;
    
    
    }	
	
function funckickout_req(mID,gID){
            var grpdetalxx = false;
try {
    grpdetaxx = new ActiveXObject('Msxml2.XMLHTTP');
} catch (e) {
    try {
        grpdetalxx = new ActiveXObject('Microsoft.XMLHTTP');
    } catch (E) {
        grpdetaxxl = false;
    }
}
if (!grpdetalxx && typeof XMLHttpRequest != 'undefined') {
    grpdetalxx = new XMLHttpRequest();
}

        var url = './tabgroups/funckickout.php';
        var datastr = 'mid=' + mID+'&gid='+gID;
        grpdetalxx.open('POST', url, true);
        grpdetalxx.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
        grpdetalxx.send(datastr);
        grpdetalxx.onreadystatechange = function () {
            if (grpdetalxx.readyState == 4) {
            var msg=document.getElementById('msgdialog');
            msg.style.display="block"
            msg.innerHTML=grpdetalxx.responseText;
            load_manage_grp(gID,'./tabgroups/members.php','groupadminentity')
            
            }
        }
        return false;
    
    
    }
function funcacc_inv(sID,gID){
            var grpdetalxx = false;
try {
    grpdetaxx = new ActiveXObject('Msxml2.XMLHTTP');
} catch (e) {
    try {
        grpdetalxx = new ActiveXObject('Microsoft.XMLHTTP');
    } catch (E) {
        grpdetaxxl = false;
    }
}
if (!grpdetalxx && typeof XMLHttpRequest != 'undefined') {
    grpdetalxx = new XMLHttpRequest();
}

        var url = './tabgroups/funcacceptgroupinvite.php';
        var datastr = 'sid=' + sID+'&gid='+gID;
        grpdetalxx.open('POST', url, true);
        grpdetalxx.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
        grpdetalxx.send(datastr);
        grpdetalxx.onreadystatechange = function () {
            if (grpdetalxx.readyState == 4) {
            var msg=document.getElementById('msgdialog');
            msg.style.display="block"
            msg.innerHTML=grpdetalxx.responseText;
            loadseg('./tabgroups/grpinvites.php' ,'groups-pane');return false;
            
            }
        }
        return false;
    
    
    }
function funcref_inv(sID,gID){
            var grpdetalxx = false;
try {
    grpdetaxx = new ActiveXObject('Msxml2.XMLHTTP');
} catch (e) {
    try {
        grpdetalxx = new ActiveXObject('Microsoft.XMLHTTP');
    } catch (E) {
        grpdetaxxl = false;
    }
}
if (!grpdetalxx && typeof XMLHttpRequest != 'undefined') {
    grpdetalxx = new XMLHttpRequest();
}

        var url = './tabgroups/funcrefusegroupinvite.php';
        var datastr = 'sid=' + sID+'&gid='+gID;
        grpdetalxx.open('POST', url, true);
        grpdetalxx.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
        grpdetalxx.send(datastr);
        grpdetalxx.onreadystatechange = function () {
            if (grpdetalxx.readyState == 4) {
            var msg=document.getElementById('msgdialog');
            msg.style.display="block"
            msg.innerHTML=grpdetalxx.responseText;
            loadseg('./tabgroups/grpinvites.php' ,'groups-pane');return false;
            
            }
        }
        return false;
    
    
    }

function funcleavegrp_inv(sID,gID){
            var grpdetalxx = false;
try {
    grpdetaxx = new ActiveXObject('Msxml2.XMLHTTP');
} catch (e) {
    try {
        grpdetalxx = new ActiveXObject('Microsoft.XMLHTTP');
    } catch (E) {
        grpdetaxxl = false;
    }
}
if (!grpdetalxx && typeof XMLHttpRequest != 'undefined') {
    grpdetalxx = new XMLHttpRequest();
}

        var url = './tabgroups/funcleavegrp.php';
        var datastr = 'sid=' + sID+'&gid='+gID;
        grpdetalxx.open('POST', url, true);
        grpdetalxx.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
        grpdetalxx.send(datastr);
        grpdetalxx.onreadystatechange = function () {
            if (grpdetalxx.readyState == 4) {
            var msg=document.getElementById('msgdialog');
            msg.style.display="block"
            msg.innerHTML=grpdetalxx.responseText;
            loadseg('./tabgroups/mygroups.php' ,'groups-pane');
            
            }
        }
        return false;
    
    
    }
function funcinleavegrp_inv(sID,gID){
            var grpdetalxx = false;
try {
    grpdetaxx = new ActiveXObject('Msxml2.XMLHTTP');
} catch (e) {
    try {
        grpdetalxx = new ActiveXObject('Microsoft.XMLHTTP');
    } catch (E) {
        grpdetaxxl = false;
    }
}
if (!grpdetalxx && typeof XMLHttpRequest != 'undefined') {
    grpdetalxx = new XMLHttpRequest();
}

        var url = './tabgroups/funcleavegrp.php';
        var datastr = 'sid=' + sID+'&gid='+gID;
        grpdetalxx.open('POST', url, true);
        grpdetalxx.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
        grpdetalxx.send(datastr);
        grpdetalxx.onreadystatechange = function () {
            if (grpdetalxx.readyState == 4) {
            var msg=document.getElementById('msgdialog');
            msg.style.display="block"
            msg.innerHTML=grpdetalxx.responseText;
            funcclose_tabgroupspopup();
            loadseg('./tabgroups/mygroups.php' ,'groups-pane');
            
            }
        }
        return false;
    
    
    }
function view_grp(grpid){
        var grpres = false;
try {
    grpres = new ActiveXObject('Msxml2.XMLHTTP');
} catch (e) {
    try {
        grpres = new ActiveXObject('Microsoft.XMLHTTP');
    } catch (E) {
        grpres = false;
    }
}
if (!grpres && typeof XMLHttpRequest != 'undefined') {
    grpres = new XMLHttpRequest();
} 
    var loadtabgrpmanagement=document.getElementById('tabgroupspopup');
    var pscreen=document.getElementById('purplescreen');
    loadtabgrpmanagement.style.display='block';
    pscreen.style.display='block';
    var url = './tabgroups/grpmsgplatform.php';
    datastr="grpid="+grpid;
    grpres.open('POST',url,true);
    grpres.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
    grpres.send(datastr);
        grpres.onreadystatechange=function(){
        if (grpres.readyState == 4 && grpres.status == 200) {
            var slist=document.getElementById('tabgroupspopup-content');
            slist.innerHTML=grpres.responseText;
            view_reloadmanage_grp(grpid,'./tabgroups/grpmsghomepg.php','groupmsgentity');
            
            
            
            }
    }
    }
function view_manage_grp(grpid,url,obj){
        var grpres = false;
try {
    grpres = new ActiveXObject('Msxml2.XMLHTTP');
} catch (e) {
    try {
        grpres = new ActiveXObject('Microsoft.XMLHTTP');
    } catch (E) {
        grpres = false;
    }
}
if (!grpres && typeof XMLHttpRequest != 'undefined') {
    grpres = new XMLHttpRequest();
} 
    
    datastr="grpid="+grpid;
    grpres.open('POST',url,true);
    grpres.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
    grpres.send(datastr);
        grpres.onreadystatechange=function(){
        if (grpres.readyState == 4 && grpres.status == 200) {
            var slist=document.getElementById(obj);
            slist.innerHTML=grpres.responseText;
            
            
            
            }
    }
    }
function view_reloadmanage_grp(grpid,url,obj){
        var grpreload = false;
try {
    grpreload  = new ActiveXObject('Msxml2.XMLHTTP');
} catch (e) {
    try {
        grpreload  = new ActiveXObject('Microsoft.XMLHTTP');
    } catch (E) {
        grpreload  = false;
    }
}
if (!grpreload && typeof XMLHttpRequest != 'undefined') {
    grpreload  = new XMLHttpRequest();
} 
    
    datastr="grpid="+grpid;
    grpreload .open('POST',url,true);
    grpreload .setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
    grpreload .send(datastr);
        grpreload .onreadystatechange=function(){
        if (grpreload .readyState == 4 && grpreload .status == 200) {
            var slist=document.getElementById(obj);
            slist.innerHTML=grpreload .responseText;
            view_reloadmanage_grp(grpid,'./tabgroups/grpmsgarchive.php','msgarchive');
            
            
            }
    }
    }
function grpsend_message(sid,gid,obj){
    var grpmsg = false;
try {
    grpmsg = new ActiveXObject('Msxml2.XMLHTTP');
} catch (e) {
    try {
        grpmsg = new ActiveXObject('Microsoft.XMLHTTP');
    } catch (E) {
        grpmsg = false;
    }
}
if (!grpmsg && typeof XMLHttpRequest != 'undefined') {
    grpmsg = new XMLHttpRequest();
}


    var msgscript= document.getElementById(obj).value;
    if(msgscript=="")
    alert("Ensure all fields are fields"); 
    else if(msgscript==null)
    alert("Ensure all fields are fields"); 
    else if(msgscript=="")
    alert("Ensure all fields are fields");
    else if(msgscript==null)
    alert("Ensure all fields are fields");
    else{     
    datastr="sid="+sid+"&gid="+gid+"&msg="+msgscript;
    var url = './tabgroups/funcgroupmessagesend.php';
    grpmsg.open('POST', url, true);
    grpmsg.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
    grpmsg.send(datastr);
    grpmsg.onreadystatechange = function () {
    if (grpmsg.readyState == 4 && grpmsg.status == 200) {
        var msgscript= document.getElementById(obj);
        msgscript.value="";
        
    }
    }
    }
    return false;
    }
function grpactivation(gid,state){
	        var grpstate = false;
try {
    grpstate = new ActiveXObject('Msxml2.XMLHTTP');
} catch (e) {
    try {
        grpstate  = new ActiveXObject('Microsoft.XMLHTTP');
    } catch (E) {
        grpstate  = false;
    }
}
if (!grpstate && typeof XMLHttpRequest != 'undefined') {
    grpstate  = new XMLHttpRequest();
}
var url = './tabgroups/funcdeactivategroup.php';
    datastr="gid="+gid+"&state="+state;
    grpstate.open('POST',url,true);
    grpstate.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
    grpstate.send(datastr);
        grpstate.onreadystatechange=function(){
        if (grpstate.readyState == 4 && grpstate.status == 200) {
			if(state==1){
			alert("You have successfully re-activated the group");
			funcclose_tabgroupspopup();
			manage_grp(gid);
			}
			else if(state==2){
			alert("You have successfully de-activated the group");
			funcclose_tabgroupspopup();
			manage_grp(gid);
			}
       }
    }
	}
	
	
	