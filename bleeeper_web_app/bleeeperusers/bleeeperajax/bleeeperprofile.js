// JavaScript Document
function change(dat , fld , id) {
    var profiletab = false;
try {
    profiletab = new ActiveXObject('Msxml2.XMLHTTP');
} catch (e) {
    try {
        profiletab = new ActiveXObject('Microsoft.XMLHTTP');
    } catch (E) {
        profiletab = false;
    }
}
if (!profiletab && typeof XMLHttpRequest != 'undefined') {
    profiletab = new XMLHttpRequest();
}
    var datastr = 'data=' + dat + '&field=' + fld + '&id=' + id;
    if (dat != null) {
        var loadbarr=document.getElementById('loadbar');
        loadbarr.innerHTML="<img class='icoload'src='./bleeeperimg/load1.gif' width='30px' height='30px'/>";
        var url = './tabprofile/profileedit.php';
        profiletab.open('POST', url, true);
        profiletab.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
        profiletab.send(datastr);
        profiletab.onreadystatechange = function () {
            if (profiletab.readyState == 4) {
                alert("Update was successfull");
                loadseg('./profile.php', 'contentpane');
                pscreen();
                return false;
            }
        }
        return false;
    }
}
function firstname(dat,field,id){
    var profiletab = false;
try {
    profiletab = new ActiveXObject('Msxml2.XMLHTTP');
} catch (e) {
    try {
        profiletab = new ActiveXObject('Microsoft.XMLHTTP');
    } catch (E) {
        profiletab = false;
    }
}
if (!profiletab && typeof XMLHttpRequest != 'undefined') {
    profiletab = new XMLHttpRequest();
}
             var pscrn=document.getElementById('purplescreen');
             pscrn.style.display="block"
             var msg=document.getElementById('msgdialog');
             msg.style.display="block"
             msg.innerHTML="<div id='profile_input_1'>"+
             "<div class='title'><strong>Change!</strong> First name</div>"+
             "<div class='dialogmessage'>You are changing first name from '"+dat+"' to :<br/>"+
             "<input type='text' id='profupdate' autofocus placeholder='First name...'></div>"+
             "<div class='dialogmsgbuttons'>"+
             "<button style='width:130px;height:30px;border-style:none;' id='changeupdate'>OK</button>"+
             "<button style='width:130px;height:30px;border-style:none;'onclick='pscreen();return false;'>Cancel</button>"+
             "</div></div>";
             var proceed=document.getElementById('changeupdate');
             proceed.onclick=function(){
                 var dat=document.getElementById('profupdate').value;
                 change(dat,field,id);
                 } 
    }
function middlename(dat,field,id){
    var profiletab = false;
try {
    profiletab = new ActiveXObject('Msxml2.XMLHTTP');
} catch (e) {
    try {
        profiletab = new ActiveXObject('Microsoft.XMLHTTP');
    } catch (E) {
        profiletab = false;
    }
}
if (!profiletab && typeof XMLHttpRequest != 'undefined') {
    profiletab = new XMLHttpRequest();
}
             var pscrn=document.getElementById('purplescreen');
             pscrn.style.display="block"
             var msg=document.getElementById('msgdialog');
             msg.style.display="block"
             msg.innerHTML="<div id='profile_input_1'>"+
             "<div class='title'><strong>Change!</strong> Middle name</div>"+
             "<div class='dialogmessage'>You are changing your Middle name from '"+dat+"' to :<br/>"+
             "<input type='text' id='profupdate' placeholder='Middle name...' autofocus></div>"+
             "<div class='dialogmsgbuttons'>"+
             "<button style='width:130px;height:30px;border-style:none;' id='changeupdate'>OK</button>"+
             "<button style='width:130px;height:30px;border-style:none;'onclick='pscreen();return false;'>Cancel</button>"+
             "</div></div>";
             var proceed=document.getElementById('changeupdate');
             proceed.onclick=function(){
                 var dat=document.getElementById('profupdate').value;
                 change(dat,field,id);
                 } 
    }
function lastname(dat,field,id){
    var profiletab = false;
try {
    profiletab = new ActiveXObject('Msxml2.XMLHTTP');
} catch (e) {
    try {
        profiletab = new ActiveXObject('Microsoft.XMLHTTP');
    } catch (E) {
        profiletab = false;
    }
}
if (!profiletab && typeof XMLHttpRequest != 'undefined') {
    profiletab = new XMLHttpRequest();
}
             var pscrn=document.getElementById('purplescreen');
             pscrn.style.display="block"
             var msg=document.getElementById('msgdialog');
             msg.style.display="block"
             msg.innerHTML="<div id='profile_input_1'>"+
             "<div class='title'><strong>Change!</strong> Last name</div>"+
             "<div class='dialogmessage'>You are changing your Last name from '"+dat+"' to :<br/>"+
             "<input type='text' id='profupdate' placeholder='Last name...' autofocus></div>"+
             "<div class='dialogmsgbuttons'>"+
             "<button style='width:130px;height:30px;border-style:none;' id='changeupdate'>OK</button>"+
             "<button style='width:130px;height:30px;border-style:none;'onclick='pscreen();return false;'>Cancel</button>"+
             "</div></div>";
             var proceed=document.getElementById('changeupdate');
             proceed.onclick=function(){
                 var dat=document.getElementById('profupdate').value;
                 change(dat,field,id);
                 } 
    }
function gender(dat,field,id){
    var profiletab = false;
try {
    profiletab = new ActiveXObject('Msxml2.XMLHTTP');
} catch (e) {
    try {
        profiletab = new ActiveXObject('Microsoft.XMLHTTP');
    } catch (E) {
        profiletab = false;
    }
}
if (!profiletab && typeof XMLHttpRequest != 'undefined') {
    profiletab = new XMLHttpRequest();
}
             var pscrn=document.getElementById('purplescreen');
             pscrn.style.display="block"
             var msg=document.getElementById('msgdialog');
             msg.style.display="block"
             msg.innerHTML="<div id='profile_input_1'>"+
             "<div class='title'><strong>Change!</strong> Gender</div>"+
             "<div class='dialogmessage'>You want to change your gender from '"+dat+"' to :<br/>"+
             "<input type='radio' name='gen' id='male' value='Male' checked='true'>Male</input>"+
             "<input type='radio' name='gen' id='female' value='Female'>Female</input></div>"+
             "<div class='dialogmsgbuttons'>"+
             "<button style='width:130px;height:30px;border-style:none;' id='changeupdate'>OK</button>"+
             "<button style='width:130px;height:30px;border-style:none;'onclick='pscreen();return false;'>Cancel</button>"+
             "</div></div>"
             var proceed=document.getElementById('changeupdate');
             proceed.onclick=function(){
                 if (document.getElementById('female').checked==true)
                 {
                 dat='Female';
                 change(dat,field,id);
                 }
                 else if (document.getElementById('male').checked==true)
                 {
                 dat='Male';
                 change(dat,field,id);
                 }
                 else
                 alert("Error");
                 
                 } 
    }
function dob(dat,field,id){
    var profiletab = false;
try {
    profiletab = new ActiveXObject('Msxml2.XMLHTTP');
} catch (e) {
    try {
        profiletab = new ActiveXObject('Microsoft.XMLHTTP');
    } catch (E) {
        profiletab = false;
    }
}
if (!profiletab && typeof XMLHttpRequest != 'undefined') {
    profiletab = new XMLHttpRequest();
}
             var x=1985;
             var pscrn=document.getElementById('purplescreen');
             pscrn.style.display="block"
             var msg=document.getElementById('msgdialog');
             msg.style.display="block"
             msg.innerHTML="<div id='profile_input_1'><div class='title'><strong>Change!</strong> Date of birth</div><div class='dialogmessage'>You are changing your Date of Birth from '"+dat+"' to :<br/>"+
             "<select id='yyyy'>"+
             "<option value=''>Year"+
             "<option value='2003'>2003"+
             "<option value='2002'>2002"+
             "<option value='2001'>2001"+
             "<option value='1999'>1999"+
             "<option value='1998'>1998"+
             "<option value='1997'>1997"+
             "<option value='1996'>1996"+
             "<option value='1995'>1995"+
             "<option value='1994'>1994"+
             "<option value='1993'>1993"+
             "<option value='1992'>1992"+
             "<option value='1991'>1991"+
             "<option value='1990'>1990"+
             "<option value='1989'>1989"+
             "<option value='1988'>1988"+
             "<option value='1987'>1987"+
             "<option value='1986'>1986"+
             "<option value='1985'>1985"+
             "<option value='1984'>1984"+
             "<option value='1983'>1983"+
             "<option value='1982'>1982"+
             "<option value='1981'>1981"+
             "<option value='1980'>1980"+
             "<option value='1979'>1979"+
             "<option value='1978'>1978"+
             "<option value='1977'>1977"+
             "<option value='1976'>1976"+
             "<option value='1975'>1975"+
             "<option value='1974'>1974"+
             "<option value='1973'>1973"+
             "<option value='1972'>1972"+
             "<option value='1971'>1971"+
             "<option value='1970'>1970"+
             "<option value='1969'>1969"+
             "<option value='1968'>1968"+
             "<option value='1967'>1967"+
             "<option value='1966'>1966"+
             "<option value='1965'>1965"+
             "<option value='1964'>1964"+
             "<option value='1963'>1963"+
             "</select>"+
             "<select id='mm'>"+
             "<option value=''>Month"+
             "<option value='01'>January"+
             "<option value='02'>February"+
             "<option value='03'>March"+
             "<option value='04'>April"+
             "<option value='05'>May"+
             "<option value='06'>June"+
             "<option value='07'>July"+
             "<option value='08'>August"+
             "<option value='09'>September"+
             "<option value='10'>October"+
             "<option value='11'>November"+
             "<option value='12'>December"+
             "</select>"+
             "<select id='dd'>"+
             "<option value=''>Date"+
             "<option value='01'>01"+
             "<option value='02'>02"+
             "<option value='03'>03"+
             "<option value='04'>04"+
             "<option value='05'>05"+
             "<option value='06'>06"+
             "<option value='07'>07"+
             "<option value='08'>08"+
             "<option value='09'>09"+
             "<option value='10'>10"+
             "<option value='11'>11"+
             "<option value='12'>12"+
             "<option value='13'>13"+
             "<option value='14'>14"+
             "<option value='15'>15"+
             "<option value='16'>16"+
             "<option value='17'>17"+
             "<option value='18'>18"+
             "<option value='19'>19"+
             "<option value='20'>20"+
             "<option value='21'>21"+
             "<option value='22'>22"+
             "<option value='23'>23"+
             "<option value='24'>24"+
             "<option value='25'>25"+
             "<option value='26'>26"+
             "<option value='27'>27"+
             "<option value='28'>28"+
             "<option value='29'>29"+
             "<option value='30'>30"+
             "<option value='31'>31"+
             "</select>"+
             "</div><div class='dialogmsgbuttons'><button style='width:130px;height:30px;border-style:none;' id='changeupdate'>OK</button><button style='width:130px;height:30px;border-style:none;'onclick='pscreen();return false;'>Cancel</button></div></div>";
             var proceed=document.getElementById('changeupdate');
             proceed.onclick=function(){
                 var profyear=document.getElementById('yyyy').value;
                 var profmonth=document.getElementById('mm').value;
                 var profdate=document.getElementById('dd').value;
                 if(profyear=='' || profmonth=='' || profdate=='')
                 {
                 alert('Ensure all fields are selected');
                 }
                 else
                 {
                 dat=profyear+"-"+profmonth+"-"+profdate;
                 change(dat,field,id);
                 }
                 } 
    }
function country(dat,field,id){
    var profiletab = false;
try {
    profiletab = new ActiveXObject('Msxml2.XMLHTTP');
} catch (e) {
    try {
        profiletab = new ActiveXObject('Microsoft.XMLHTTP');
    } catch (E) {
        profiletab = false;
    }
}
if (!profiletab && typeof XMLHttpRequest != 'undefined') {
    profiletab = new XMLHttpRequest();
}
             var pscrn=document.getElementById('purplescreen');
             pscrn.style.display="block"
             var msg=document.getElementById('msgdialog');
             msg.style.display="block"
             msg.innerHTML='<div id="profile_input_1">'+
             '<div class="title"><strong>Change!</strong> Country</div>'+
             '<div class="dialogmessage">You are changing your country from "'+dat+'" to :<br/>'+
             '<select id="profupdate" style="width:250px">'+
			'<option value="Afghanistan">Afghanistan</option><option value="Åland Islands">Åland Islands</option><option value="Albania">Albania</option><option value="Algeria">Algeria</option><option value="American Samoa">American Samoa</option><option value="Andorra">Andorra</option><option value="Angola">Angola</option><option value="Anguilla">Anguilla</option><option value="Antarctica">Antarctica</option><option value="Antigua and Barbuda">Antigua and Barbuda</option><option value="Argentina">Argentina</option><option value="Armenia">Armenia</option><option value="Aruba">Aruba</option><option value="Australia">Australia</option><option value="Austria">Austria</option><option value="Azerbaijan">Azerbaijan</option><option value="Bahamas">Bahamas</option><option value="Bahrain">Bahrain</option><option value="Bangladesh">Bangladesh</option><option value="Barbados">Barbados</option><option value="Belarus">Belarus</option><option value="Belgium">Belgium</option><option value="Belize">Belize</option><option value="Benin">Benin</option><option value="Bermuda">Bermuda</option><option value="Bhutan">Bhutan</option><option value="Bolivia">Bolivia</option><option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option><option value="Botswana">Botswana</option><option value="Bouvet Island">Bouvet Island</option><option value="Brazil">Brazil</option><option value="British Indian Ocean Territory">British Indian Ocean Territory</option><option value="Brunei Darussalam">Brunei Darussalam</option><option value="Bulgaria">Bulgaria</option><option value="Burkina Faso">Burkina Faso</option><option value="Burundi">Burundi</option><option value="Cambodia">Cambodia</option><option value="Cameroon">Cameroon</option><option value="Canada">Canada</option><option value="Cape Verde">Cape Verde</option><option value="Cayman Islands">Cayman Islands</option><option value="Central African Republic">Central African Republic</option><option value="Chad">Chad</option><option value="Chile">Chile</option><option value="China">China</option><option value="Christmas Island">Christmas Island</option><option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option><option value="Colombia">Colombia</option><option value="Comoros">Comoros</option><option value="Congo">Congo</option><option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option><option value="Cook Islands">Cook Islands</option><option value="Costa Rica">Costa Rica</option><option value="Cote Divoire">Cote Divoire</option><option value="Croatia">Croatia</option><option value="Cuba">Cuba</option><option value="Cyprus">Cyprus</option><option value="Czech Republic">Czech Republic</option><option value="Denmark">Denmark</option><option value="Djibouti">Djibouti</option><option value="Dominica">Dominica</option><option value="Dominican Republic">Dominican Republic</option><option value="Ecuador">Ecuador</option><option value="Egypt">Egypt</option><option value="El Salvador">El Salvador</option><option value="Equatorial Guinea">Equatorial Guinea</option><option value="Eritrea">Eritrea</option><option value="Estonia">Estonia</option><option value="Ethiopia">Ethiopia</option><option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option><option value="Faroe Islands">Faroe Islands</option><option value="Fiji">Fiji</option><option value="Finland">Finland</option><option value="France">France</option><option value="French Guiana">French Guiana</option><option value="French Polynesia">French Polynesia</option><option value="French Southern Territories">French Southern Territories</option><option value="Gabon">Gabon</option><option value="Gambia">Gambia</option><option value="Georgia">Georgia</option><option value="Germany">Germany</option><option value="Ghana">Ghana</option><option value="Gibraltar">Gibraltar</option><option value="Greece">Greece</option><option value="Greenland">Greenland</option><option value="Grenada">Grenada</option><option value="Guadeloupe">Guadeloupe</option><option value="Guam">Guam</option><option value="Guatemala">Guatemala</option><option value="Guernsey">Guernsey</option><option value="Guinea">Guinea</option>		<option value="Guinea-bissau">Guinea-bissau</option><option value="Guyana">Guyana</option><option value="Haiti">Haiti</option><option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option><option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option><option value="Honduras">Honduras</option><option value="Hong Kong">Hong Kong</option><option value="Hungary">Hungary</option><option value="Iceland">Iceland</option><option value="India">India</option><option value="Indonesia">Indonesia</option><option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option><option value="Iraq">Iraq</option><option value="Ireland">Ireland</option><option value="Isle of Man">Isle of Man</option><option value="Israel">Israel</option><option value="Italy">Italy</option><option value="Jamaica">Jamaica</option><option value="Japan">Japan</option><option value="Jersey">Jersey</option><option value="Jordan">Jordan</option><option value="Kazakhstan">Kazakhstan</option><option value="Kenya">Kenya</option><option value="Kiribati">Kiribati</option><option value="Korea, Democratic Peoples Republic of">Korea, Democratic Peoples Republic of</option><option value="Korea, Republic of">Korea, Republic of</option><option value="Kuwait">Kuwait</option><option value="Kyrgyzstan">Kyrgyzstan</option>	<option value="Lao Peoples Democratic Republic">Lao Peoples Democratic Republic</option><option value="Latvia">Latvia</option><option value="Lebanon">Lebanon</option><option value="Lesotho">Lesotho</option><option ="Liberia">Liberia</option><option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option><option value="Liechtenstein">Liechtenstein</option><option value="Lithuania">Lithuania</option><option value="Luxembourg">Luxembourg</option><option value="Macao">Macao</option><option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option><option value="Madagascar">Madagascar</option><option value="Malawi">Malawi</option><option value="Malaysia">Malaysia</option><option value="Maldives">Maldives</option><option value="Mali">Mali</option><option value="Malta">Malta</option><option value="Marshall Islands">Marshall Islands</option><option value="Martinique">Martinique</option><option value="Mauritania">Mauritania</option><option value="Mauritius">Mauritius</option><option value="Mayotte">Mayotte</option><option value="Mexico">Mexico</option><option value="Micronesia, Federated States of">Micronesia, Federated States of</option><option value="Moldova, Republic of">Moldova, Republic of</option><option value="Monaco">Monaco</option><option value="Mongolia">Mongolia</option><option value="Montenegro">Montenegro</option><option value="Montserrat">Montserrat</option><option value="Morocco">Morocco</option><option value="Mozambique">Mozambique</option><option value="Myanmar">Myanmar</option><option value="Namibia">Namibia</option><option value="Nauru">Nauru</option><option value="Nepal">Nepal</option><option value="Netherlands">Netherlands</option>	<option value="Netherlands Antilles">Netherlands Antilles</option><option value="New Caledonia">New Caledonia</option>			<option value="New Zealand">New Zealand</option><option value="Nicaragua">Nicaragua</option><option value="Niger">Niger</option><option value="Nigeria">Nigeria</option><option value="Niue">Niue</option><option value="Norfolk Island">Norfolk Island</option><option value="Northern Mariana Islands">Northern Mariana Islands</option><option value="Norway">Norway</option><option value="Oman">Oman</option><option value="Pakistan">Pakistan</option>option value="Palau">Palau</option><option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option><option value="Panama">Panama</option><option value="Papua New Guinea">Papua New Guinea</option><option value="Paraguay">Paraguay</option><option value="Peru">Peru</option><option value="Philippines">Philippines</option><option value="Pitcairn">Pitcairn</option><option value="Poland">Poland</option><option value="Portugal">Portugal</option><option value="Puerto Rico">Puerto Rico</option><option value="Qatar">Qatar</option><option value="Reunion">Reunion</option><option value="Romania">Romania</option><option value="Russian Federation">Russian Federation</option><option value="Rwanda">Rwanda</option><option value="Saint Helena">Saint Helena</option><option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option><option value="Saint Lucia">Saint Lucia</option><option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option><option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option><option value="Samoa">Samoa</option><option value="San Marino">San Marino</option><option value="Sao Tome and Principe">Sao Tome and Principe</option><option value="Saudi Arabia">Saudi Arabia</option><option value="Senegal">Senegal</option><option value="Serbia">Serbia</option><option value="Seychelles">Seychelles</option><option value="Sierra Leone">Sierra Leone</option><option value="Singapore">Singapore</option><option value="Slovakia">Slovakia</option><option value="Slovenia">Slovenia</option><option value="Solomon Islands">Solomon Islands</option><option value="Somalia">Somalia</option><option value="South Africa">South Africa</option><option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option><option value="Spain">Spain</option><option value="Sri Lanka">Sri Lanka</option><option value="Sudan">Sudan</option><option value="Suriname">Suriname</option><option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option><option value="Swaziland">Swaziland</option><option value="Sweden">Sweden</option><option value="Switzerland">Switzerland</option><option value="Syrian Arab Republic">Syrian Arab Republic</option><option value="Taiwan, Province of China">Taiwan, Province of China</option><option value="Tajikistan">Tajikistan</option><option value="Tanzania, United Republic of">Tanzania, United Republic of</option><option value="Thailand">Thailand</option><option value="Timor-leste">Timor-leste</option><option value="Togo">Togo</option><option value="Tokelau">Tokelau</option><option value="Tonga">Tonga</option><option value="Trinidad and Tobago">Trinidad and Tobago</option><option value="Tunisia">Tunisia</option><option value="Turkey">Turkey</option><option value="Turkmenistan">Turkmenistan</option><option value="Turks and Caicos Islands">Turks and Caicos Islands</option><option value="Tuvalu">Tuvalu</option><option value="Uganda">Uganda</option><option value="Ukraine">Ukraine</option><option value="United Arab Emirates">United Arab Emirates</option><option value="United Kingdom">United Kingdom</option><option value="United States">United States</option><option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option><option value="Uruguay">Uruguay</option><option value="Uzbekistan">Uzbekistan</option><option value="Vanuatu">Vanuatu</option><option value="Venezuela">Venezuela</option><option value="Viet Nam">Viet Nam</option><option value="Virgin Islands, British">Virgin Islands, British</option><option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option><option value="Wallis and Futuna">Wallis and Futuna</option><option value="Western Sahara">Western Sahara</option><option value="Yemen">Yemen</option><option value="Zambia">Zambia</option><option value="Zimbabwe">Zimbabwe</option>'+
			'</select></div>'+
             '<div class="dialogmsgbuttons"><button style="width:130px;height:30px;border-style:none;" id="changeupdate">OK</button>'+
             '<button style="width:130px;height:30px;border-style:none;"onclick="pscreen();return false;">Cancel</button>'+
             '</div></div>';
             var proceed=document.getElementById('changeupdate');
             proceed.onclick=function(){
                 var dat=document.getElementById('profupdate').value;
                 change(dat,field,id);
                 } 
}
function proffesion(dat,field,id){
    var profiletab = false;
try {
    profiletab = new ActiveXObject('Msxml2.XMLHTTP');
} catch (e) {
    try {
        profiletab = new ActiveXObject('Microsoft.XMLHTTP');
    } catch (E) {
        profiletab = false;
    }
}
if (!profiletab && typeof XMLHttpRequest != 'undefined') {
    profiletab = new XMLHttpRequest();
}
             var pscrn=document.getElementById('purplescreen');
             pscrn.style.display="block"
             var msg=document.getElementById('msgdialog');
             msg.style.display="block"
             msg.innerHTML="<div id='profile_input_1'>"+
             "<div class='title'><strong>Change!</strong> Proffesion</div>"+
             "<div class='dialogmessage'>You are changing your proffesion from '"+dat+"' to :<br/>"+
             "<input type='text' id='profupdate' placeholder='Proffesion...' maxlength='70' autofocus></div>"+
             "<div class='dialogmsgbuttons'>"+
             "<button style='width:130px;height:30px;border-style:none;' id='changeupdate'>OK</button>"+
             "<button style='width:130px;height:30px;border-style:none;'onclick='pscreen();return false;'>Cancel</button>"+
             "</div></div>";
             var proceed=document.getElementById('changeupdate');
             proceed.onclick=function(){
                 var dat=document.getElementById('profupdate').value;
                 change(dat,field,id);
                 } 
}

function proffesion(dat,field,id){
    var profiletab = false;
try {
    profiletab = new ActiveXObject('Msxml2.XMLHTTP');
} catch (e) {
    try {
        profiletab = new ActiveXObject('Microsoft.XMLHTTP');
    } catch (E) {
        profiletab = false;
    }
}
if (!profiletab && typeof XMLHttpRequest != 'undefined') {
    profiletab = new XMLHttpRequest();
}
             var pscrn=document.getElementById('purplescreen');
             pscrn.style.display="block"
             var msg=document.getElementById('msgdialog');
             msg.style.display="block"
             msg.innerHTML="<div id='profile_input_1'>"+
             "<div class='title'><strong>Change!</strong> Proffesion</div>"+
             "<div class='dialogmessage'>You are changing your proffesion from '"+dat+"' to :<br/>"+
             "<input type='text' id='profupdate' placeholder='Proffesion...' maxlength='70' autofocus></div>"+
             "<div class='dialogmsgbuttons'>"+
             "<button style='width:130px;height:30px;border-style:none;' id='changeupdate'>OK</button>"+
             "<button style='width:130px;height:30px;border-style:none;'onclick='pscreen();return false;'>Cancel</button>"+
             "</div></div>";
             var proceed=document.getElementById('changeupdate');
             proceed.onclick=function(){
                 var dat=document.getElementById('profupdate').value;
                 change(dat,field,id);
                 } 
}




