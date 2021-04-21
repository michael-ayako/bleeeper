// JavaScript Document
function logincheck() {
var xhr = false;
try {
    xhr = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
    try {
        xhr = new ActiveXObject("Microsoft.XMLHTTP");
    } catch (E) {
        xhr = false;
    }
}
if (!xhr && typeof XMLHttpRequest != 'undefined') {
    xhr = new XMLHttpRequest();
}


    var objID = document.getElementById('err');
    objID.style.display = 'block';
    objID.innerHTML="<img class='icoload'src='./bleeeperimg/load.gif' style='margin-left:100px;'>" ; 
    var codeajax = document.getElementById('code') .value;
    var passajax = document.getElementById('pass') .value;
    var datastr = 'code=' + codeajax + '& pass=' + passajax;
    var url = './bleeeperphp/funclogin.php';
    xhr.open('POST', url, true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
    xhr.send(datastr);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 1) {
            var objID = document.getElementById('err');
            objID.style.display = 'block';
            objID.innerHTML="<img class='icoload'src='./bleeeperimg/load.gif' style='margin-left:100px;'>" ;           
       }
        
        
        if (xhr.readyState == 4 ) {
            var obj = xhr.responseText;
            if (obj == 1) {
                var objID = document.getElementById('err');
               objID.innerHTML = "<div class='failed'>Incorrect credentials. Please try again!</div>";
               objID.style.display = 'block';
            } 
            else if (obj == 2) {
                window.location = './bleeeperusers/home.php';
            }
        }

    }
    return false;
}


function faq() {
var xhr = false;
try {
    xhr = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
    try {
        xhr = new ActiveXObject("Microsoft.XMLHTTP");
    } catch (E) {
        xhr = false;
    }
}
if (!xhr && typeof XMLHttpRequest != 'undefined') {
    xhr = new XMLHttpRequest();
}
    var email= document.getElementById('email') .value;
    var subj = document.getElementById('subj') .value;
	var txtdata = document.getElementById('txtdata') .value;
    var datastr = 'email=' + email + '& subj=' + subj+'& txtdata=' + txtdata;
    var url = './bleeepermisc/FAQfunc.php';
    xhr.open('POST', url, true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
    xhr.send(datastr);
    xhr.onreadystatechange = function () {    
        
        if (xhr.readyState == 4 ) {
		var q=xhr.responseText
		if(q==1)
        alert("Invalid Email address") ;
		else if(q==2)
        alert("You have not stated the subject") ;
		else if(q==3)
        alert("You have not stated the complaint you are forwarding") ;
		else if(q==4){
        alert("Your complaint has been forwarded, thank you") ;
		loadseg('FAQ.php' ,'hw');
		}
        }

    }
    return false;
}
