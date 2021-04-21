// JavaScript Document
function removenotificator(notificatorid){
    var notificatortab = false;
try {
    notificatortab = new ActiveXObject('Msxml2.XMLHTTP');
} catch (e) {
    try {
        notificatortab = new ActiveXObject('Microsoft.XMLHTTP');
    } catch (E) {
        notificatortab = false;
    }
}
if (!notificatortab && typeof XMLHttpRequest != 'undefined') {
    notificatortab = new XMLHttpRequest();
}
var datastr = 'nid=' + notificatorid;   
var url = './tabnotificator/rmvnotification.php'; 
notificatortab.open('POST', url, true);
notificatortab.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
notificatortab.send(datastr);   
}