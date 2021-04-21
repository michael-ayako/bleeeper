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
    var url = '../bleeepermisc/FAQfunc.php';
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
		loadseg('./FAQ.php' ,'contentpane');
        }
		}

    }
    return false;
}