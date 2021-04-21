var xhr = false;
try {
    xhr = new ActiveXObject('Msxml2.XMLHTTP');
} catch (e) {
    try {
        xhr = new ActiveXObject('Microsoft.XMLHTTP');
    } catch (E) {
        xhr = false;
    }
}
if (!xhr && typeof XMLHttpRequest != 'undefined') {
    xhr = new XMLHttpRequest();
}
function loadseg(pag, objID) {
    var obj = document.getElementById(objID);
    var loadbarr=document.getElementById('loadbar');
    loadbarr.innerHTML="<img class='icoload'src='./bleeeperimg/load1.gif' width='30px' height='30px'/>" ;
    xhr.open('GET', pag, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            obj.innerHTML = xhr.responseText; 
            loadbarr.innerHTML="";
        }
    }
    xhr.send(null);
}
