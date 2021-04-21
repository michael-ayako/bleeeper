// JavaScript Document
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
function reg() {
    var objID = document.getElementById('crr');
    objID.innerHTML ="<img class='icoload'src='./bleeeperimg/load.gif' style='margin-left:100px;margin-top:10px' width='40px' height='40px'/>" ;;
    objID.style.display = 'block';
    var emailajax = document.getElementById('email') .value;
    var unameajax = document.getElementById('uname') .value;
    var passajax = document.getElementById('pass') .value;
    var cpassajax = document.getElementById('cpass') .value;
    var datastr = 'email=' + emailajax + '& uname=' + unameajax + '& pass=' + passajax + '& cpass=' + cpassajax;
    var url = './bleeeperphp/funcregister.php';
    xhr.open('POST', url, true);
    xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded;");
    xhr.send(datastr);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) {
            var obj = xhr.responseText;
            if (obj == 4) {
                var objID = document.getElementById('err3');
                objID.innerHTML = "<div class='failed'>Your password should be 5 and above!</div>";
                objID.style.display = 'block';
            } 
            else if (obj == 3) {
                var objID = document.getElementById('crr');
                objID.innerHTML = "<div class='failed'>Ensure you have corrected the below indicated errors!</div>";
                objID.style.display = 'block';
            } 
            else if (obj == 5) {
                var objID = document.getElementById('registerform');
                objID.innerHTML = "<div class='success'>You have been succesfully registered. <a href='./index.php' style='color:ffffff;'>Login here</a><br/></div>";
            } 
            else if (obj == 1) {
            }
        }
    }
    return false;
}
//live email check

function liveemailcheck() {
    var objID = document.getElementById('err1');
    objID.innerHTML="<img class='icoload'src='./bleeeperimg/load.gif' style='margin-left:100px; margin-top:10px' width='40px' height='40px'/>" ;
    objID.style.display = 'block';
    var emailajax = document.getElementById('email') .value;
    var datastr = 'email=' + emailajax;
    var url = './bleeeperphp/emailcheck.php';
    xhr.open('POST', url, true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;");
    xhr.send(datastr);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) {
            var obj = xhr.responseText;
            if (obj == 1) {
                var objID = document.getElementById('err1');
                objID.innerHTML = "<div class='failed'>Invalid email, it should be: xxxxxxx@xxxx.xxx</div>";
                objID.style.display = 'block';
            } 
            else if (obj == 2) {
               var objID = document.getElementById('err1');
                objID.innerHTML = "<div class='failed'>Email address is already in use!</div>";
                objID.style.display = 'block'
            }else{
				var objID = document.getElementById('err1');
                objID.style.display = 'none';
				}
        }

    }
    return false;
}
//live username check

function liveunamecheck() {
    var objID = document.getElementById('err2');
    objID.style.display = 'block';
    objID.innerHTML="<img class='icoload'src='./bleeeperimg/load.gif' style='margin-left:100px; margin-top:10px' width='40px' height='40px'/>" ;
    
    var unameajax = document.getElementById('uname') .value;
    var datastr = 'uname=' + unameajax;
    var url = './bleeeperphp/unamecheck.php';
    xhr.open('POST', url, true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;");
    xhr.send(datastr);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) {
            var obj = xhr.responseText;
            if (obj == 2) {
                var objID = document.getElementById('err2');
                objID.innerHTML = "<div class='failed'>Username is already in use!</div>";
                objID.style.display = 'block';
            }
			else if (obj == 1) {
                var objID = document.getElementById('err2');
                objID.innerHTML = "<div class='failed'>Ensure your username only has characters and alphabets and has no spacing in between</div>";
                objID.style.display = 'block';
            }
			else if (obj == 3) {
                var objID = document.getElementById('err2');
                objID.innerHTML = "<div class='failed'>Ensure your username has 5 characters and above!</div>";
                objID.style.display = 'block';
            }
            else {
                var objID = document.getElementById('err2');
                objID.style.display = 'none';
            }
        }

    }
    return false;
}
function livepasswordcheck() {
    var passajax = document.getElementById('pass') .value;
    var cpassajax = document.getElementById('cpass') .value;
    if (passajax != cpassajax) {
        var objID = document.getElementById('err4');
        objID.innerHTML = "<div class='failed'>Passwords do not match!</div>";
        objID.style.display = 'block';
    } else if (passajax == cpassajax) {
        var objID = document.getElementById('err4');
        objID.style.display = 'none';
    }
}
