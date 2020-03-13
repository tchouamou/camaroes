/****************************************************************************
 *                              java_script.js
 *                                ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2006, Tchouamou Eric Herve <tchouamou@gmail.com>
All rights reserved.

Redistribution and use in source and binary forms, with or without
modification, are permitted provided that the following conditions
are met:

1. Redistributions of source code must retain the above copyright
 notice, this list of conditions and the following disclaimer.
2. Redistributions in binary form must reproduce the above copyright
 notice, this list of conditions and the following disclaimer in the
 documentation and/or other materials provided with the distribution.
3. The names of the authors may not be used to endorse or promote products
 derived from this software without specific prior written permission.

THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS AS IS AND
ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED.
IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT,
INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING,
BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY
OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING
NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE,
EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.

This code cannot simply be copied and put under the GNU Public License or
any other GPL-like (LGPL, GPL2) License.*/



/**
 * getElement
 */
 
function getElement(e){
    if(document.all){
        return document.all[e];
    }
    return document.getElementById(e);
}

/**
  * Checks/unchecks all options of a <select> element
  *
  * @param   string   the option_id name
  * @param   string   the check_id name
  *
  * @return  boolean  always true
  */
function set_select_all(option_id, check_id)
{
    var selectObject = document.getElementById(option_id);
    var check_value = document.getElementById(check_id).checked;
    var selectCount  = selectObject.length;

    for (var i = 0; i < selectCount; i++){
        selectObject.options[i].selected = check_value;
    } 

    return true;
}




/* BEGIN SCRIPT */
function echo_div(div_id, str)
     {
try{
     document.getElementById(div_id).innerHTML = str;
     }
	catch(e){
		}
return(false);
}
/* END SCRIPT */


/* BEGIN SCRIPT*/
function runclock(){
 today = new Date();
 hours = today.getHours() + 'h';
 minutes = today.getMinutes();
 seconds = today.getSeconds();
 timevalue = hours;
 timeValue += ((minutes < 10) ? ":0" : ":") + minutes + 'mn';
 timeValue += ((seconds < 10) ? ":0" : ":") + seconds + 's';
 try{document.getElementById("time").value = timeValue;	}
	catch(e){};
//  timerID1 = setTimeout("ajax_event(" + param + "," + ajax_div + ")",5000);
 timerID2 = setTimeout("runclock()",1000);
 timerRunning = true;
return(false);
}
/* END SCRIPT */


 /* BEGIN SCRIPT */
function ajax_event(url, param, ajax_div)
{
  	//========================================
	if(window.XMLHttpRequest){
	// ---- mozilla firefox----
	  xhr_object = new XMLHttpRequest();
	}else{
		if(window.ActiveXObject){
		//---- Internet Explorer----
		  xhr_object = new ActiveXObject("Microsoft.XMLHTTP");
		}else{
		  return(false);
		 }
	}
  	//========================================
// 	xhr_object.onreadystatechange = State_Changed;
	xhr_object.open("GET", url + "?sid=" + Math.random() + "&" + param, true);//userName, password) -- (true) -- assinchrone --
	xhr_object.send(null);
  	//========================================


//  timerID = setTimeout("ajax_event(" + param + "," + ajax_div + ")",5000);
//  timerRunning = false;
return(false);
}
/* END SCRIPT */
  	//========================================
	function State_Changed()
	{
	    if(xhr_object.readyState == 4){//0 = no init, 1 = open, 2 = sended, 3 = receving e 4 = receved.
			echo_div(ajax_div, xhr_object.responseText);
		}else{
// 			// ajax_status=xhr_object.statusText;//--status---
// 			// echo_div(ajax_div, ajax_status);
// 			echo_div(ajax_div, 'unknown Error !!! see javascript errors.');
// 			return(false);
		}
	}  	
  	//========================================



 /* BEGIN SCRIPT */
function print_id(text_id)
{
text=document.getElementById(text_id).innerHTML;

winId = window.open('','new_print','width=700,height=500,location=no,status=no,toolbar=no,scrollbars=yes,resizable=yes');
winId.document.write('<html><head><link href="css/cmr.css" rel="stylesheet" type="text/css" /><title>Print</title></head>');
winId.document.write('<body onLoad="window.focus();window.print()">'+ text +'</body></html>');
winId.document.close();
return(false);
}
/* END SCRIPT */


 /* BEGIN SCRIPT */
function email_id(text_id)
{
text = document.getElementById(text_id).innerHTML;
email_text = "<a href='mailto:localhost?subject=email " + encodeURI(text_id) + "&body=" + encodeURI(text) + "'>Email</a>";
winId = window.open('', 'new_email', 'width=700,height=500,location=no,status=no,toolbar=no,scrollbars=yes,resizable=yes');
winId.document.write('<html><head><link href="css/cmr.css" rel="stylesheet" type="text/css" /><title>Print</title></head>');
winId.document.write('<body onLoad="window.focus()">' + email_text + '</body></html>');
winId.document.close();
return(false);
}
/* END SCRIPT */


 /* BEGIN SCRIPT */
function zoom_id(elt_text, elt_id)
{
text = document.getElementById(elt_id).innerHTML;
winId = window.open('', elt_text, 'width=700,height=500,location=no,status=no,toolbar=no,scrollbars=yes,resizable=yes');
winId.document.write('<html><head><link href="css/cmr.css" rel="stylesheet" type="text/css" /><title>Print</title></head>');
winId.document.write('<body onLoad="window.focus();">' + text + '</body></html>');
return(false);
}
/* END SCRIPT */

 /* BEGIN SCRIPT */
function large_id(elt_id)
{
// text=document.getElementById(elt_id).innerHTML;
// alert(text);
// document.getElementById(elt_id).options[document.getElementById(elt_id).selectedIndex].value;
return(false);
}
/* END SCRIPT */


 /* BEGIN SCRIPT */
function pdf_id(text_id)
{
text = document.getElementById(text_id).innerHTML;
winId = window.open('','new_print','width=700,height=500,location=no,status=no,toolbar=no,scrollbars=yes,resizable=yes');
winId.document.write('<html><head><link href="css/cmr.css" rel="stylesheet" type="text/css" /><title>Print</title></head>');
winId.document.write('<body onLoad="window.focus();">' + text + '</body></html>');
return(false);
}
/* END SCRIPT */




 /* BEGIN SCRIPT */
function print_val(text_name)
{
text1 = document.getElementById(text_name).value;
text = text1.replace(/\n/gi, "<br />");
winId = window.open('','new_print','width=700,height=500,location=no,status=no,toolbar=no,scrollbars=yes,resizable=yes');
winId.document.write('<html><head><link href="css/cmr.css" rel="stylesheet" type="text/css" /><title>Print</title></head>');
winId.document.write('<body onLoad="window.focus();window.print()"><pre>' + text + '</pre></body></html>');
winId.document.close();

return(false);
}
/* END SCRIPT */


 /* BEGIN SCRIPT */
function call_log_group_changed(f)
{
f.mail_to.value = "";
// f.mail_cc.value = "";

ind1 = "_" + f.call_log_group.options[f.call_log_group.selectedIndex].text;
ind2 = "_" + f.call_log_group.options[f.call_log_group.selectedIndex].text + "_cc";
ind3 = "_" + f.call_log_group.options[f.call_log_group.selectedIndex].text + "_bcc";
// alert("ind1=" + ind1 + "\nind2=" + ind2);
f.mail_to.value =  document.getElementById(ind1).value;
f.mail_cc.value =  document.getElementById(ind2).value;
f.mail_bcc.value =  document.getElementById(ind3).value;
// alert("ind1=" + ind1 + "\nind2=" + ind2);

// f.call_log_user.value =  document.getElementById(ind1).value;
// document.getElementById('list_group_impact').value = f.call_log_group.options[f.call_log_group.selectedIndex].text;
// document.getElementById('list_user_impact').value =  document.getElementById(ind1).value;
// f.mail_cc.value =  document.getElementById(ind2).value;



num = document.getElementById('call_log_user').length;
for(i = 0; i < num; i++){
	try{
        document.getElementById('call_log_user').options[0] = null;
	}
	catch(e){;
	}
}

list_mail = document.getElementById(ind1).value;
array_mail = list_mail.split(",");


for(i = 0; i < array_mail.length; i++){
	try{
	add_string(array_mail[i], 'call_log_user');
	
	}catch(e){;
	}
}



return(false);
}
/* END SCRIPT */




 /* BEGIN SCRIPT */
function call_log_user_changed(f)
{
emails = f.mail_cc.value;
email1 = "," + f.call_log_user.options[f.call_log_user.selectedIndex].text;
f.mail_cc.value = emails + email1;
return(false);
}
/* END SCRIPT */



 /* BEGIN SCRIPT */
function assign_to_changed(f)
{
emails = f.mail_bcc.value;
email1 = "," + f.assign_to.options[f.assign_to.selectedIndex].text;
if(email1.length < 2){
	}
else if(email1.match('@')){
f.mail_bcc.value = emails + email1;
}
else{
	ind1="_" + f.call_log_group.options[f.assign_to_changed.selectedIndex].text;
	ind2="_" + f.call_log_group.options[f.call_log_group.selectedIndex].text + "_bcc";
	try{
	list_email1 = document.getElementById(ind1).value;
	list_email2 = document.getElementById(ind2).value;
	f.mail_bcc.value = list_email1 + "," + list_email2;
	}catch(e){;
	}
	
	}
return(false);
}
/* END SCRIPT */



/* BEGIN SCRIPT */
function insert_text(f,select_id,text_name)
{
	text0 = document.getElementById(select_id).options[document.getElementById(select_id).selectedIndex].value;
// 	text1 = document.getElementById('text_name').value;
// 	document.getElementById('text_name').value = text1 + text0;

// 	text1 = document.document.getElementsByName(text_name)[0];
// 	document.getElementsByName(text_name)[0]=text1 + text0;

	if(text_name=='text'){
	text1 = f.text.value;
	f.text.value = text1 + text0;
		}
		else{
	text1=f.mail_text.value;
	f.mail_text.value = text1 + text0;
try{
	val = tinyMCE.getContent() + text0;
//  	alert(val);
    tinyMCE.setContent(val);
}catch(e){
	}
		}
	return(false);
}
/* END SCRIPT */



 /* BEGIN SCRIPT*/
function common_change(elt_id1,elt_id2){
	val=document.getElementById(elt_id2).value;
	document.getElementById(elt_id1).value = val;
// 	if(elt_id1=='text'){
// 		document.getElementById(elt_id1).value = tinyMCE.getContent();
// 		}
// 		else{
// // 			alert(elt_id1 + ' & ' + elt_id2 + ' => ' + val);
// 		tinyMCE.setContent(val);
// 			}
return(false);
}
/* END SCRIPT */


/* BEGIN SCRIPT*/
function confirm_check_action(f,in_confirm,in_id,in_val){
if(confirm(in_confirm)){
    f.check_action.value = in_val;
	f.submit();
	in_id='';
    }
return(false);
}
/* END SCRIPT */


/* BEGIN SCRIPT*/
function submit_form(f, message){

if(message.length < 2){
message[1] = 'Group Verify? ?';
message[2] = 'You have choosed group -->[';
message[3] = ']--, OK ????!!!!!\\n for ticket[';
message[4] = '] type  --[';
message[5] = '] \\n\\n\\n\\n TICKET TEXT: \\n\\n ';
message[6] = ' \\n\\n\\n ......etc ]--, OK ????!!!!!';
message[7] = 'LAST CONFERM(Click to cancel if you dont want to send the ticket)\\n\\n\\n Group : ---';
message[8] = '--- \\n\\n Ticket title: ';
message[9] = ' \\n\\n\\n\\n EMAIL BODY: \\n\\n ';
message[10] = ' \\n\\n\\n ......etc';
message[11] = 'LAST CONFERM (Click to cancel if you dont want to send the ticket)\\n\\n\\n Group : ---';
message[12] = '--- \\n\\n Titolo Body: ';
message[13] = ' \\n\\n\\n\\n Email Body: \\n\\n ';
message[14] = ' \\n\\n\\n ......etc';
message[15] = 'Inser Ticket title!!!!!\\n Title is absolutly needed';
message[16] = 'Inser Ticket Body!!!!!\\n Body is absolutly needed';
message[17] = 'You have choosed email to:  --[';
message[18] = ']--, OK ????!!!!!\\n  to cc: --[';
message[19] = ']--,\\n OK ????!!!!!';
message[20] = 'Inser Email title!!!!!\\n Title is absolutly needed';
message[21] = 'Inser Email Body!!!!!\\n Body is absolutly needed';
message[22] = 'LAST CONFERM (Click to cancel if you dont want to send the Email)\\n\\n\\n Group : ---';
message[23] = '--- \\n\\n Email title: ';
message[24] = ' \\n\\n  EMAIL Body: \\n\\n ';
message[25] = ' \\n\\n  ......etc';
message[26] = ' \\n  FROM: ';
message[27] = ' \\n TO: ';
message[28] = ' \\n CC: ';
message[29] = ' \\n  BCC: ';
}
	
try{
	text0 = document.getElementById('call_log_group').options[document.getElementById('call_log_group').selectedIndex].value;
	text0 = f.call_log_group.options[f.call_log_group.selectedIndex].text;
	number = f.number.value;
}catch(e){
// 	alert(e.message);
	text0 = message[1];
	number = '';
}finally{
	}

text1= message[2] + text0 + message[3] + number  + message[4]+ f.type.value + message[5] + f.text.value.substr(0, 500) + message[6];


try{
if(document.getElementById('html_zone').style.visibility == 'visible'){
text2 = message[7]+ text0.toUpperCase() + message[8] + f.title.value;
text2 += message[26] + f.mail_from.value + message[27] + f.mail_to.value + message[28] + f.mail_cc.value + message[29] + f.mail_bcc.value;
text2 += message[9] + f.back_text.value.substr(0, 50) + message[10];
}else{
text2 = message[11]+ text0.toUpperCase() + message[12] + f.title.value;
text2 += message[26] + f.mail_from.value + message[27] + f.mail_to.value + message[28] + f.mail_cc.value + message[29] + f.mail_bcc.value;
text2 += message[13] + f.mail_text.value.substr(0, 500) + message[14];
}
}catch(e){
text2 = message[11];
}



if(confirm(text1)){
if((f.title.value) == ""){
 confirm(message[15]);
 }
 else if((f.text.value) == ""){
 confirm(message[16]);
}else{
    if(confirm(text2)){
	    try{

			if(document.getElementById('html_zone').style.visibility == 'visible'){
			f.mail_text.value = document.getElementById('back_text').value;
			}
		}catch(e){
		}
	
			
	    f.submit();
	    }
}
}


return(false);
}
/* END SCRIPT */





/* BEGIN SCRIPT*/
function pos_mouse(e){
// 	mouse_x = (navigator.appName.substring(0,3) == "Net") ? e.pageX : event.x+document.body.scrollLeft;
// 	mouse_y = (navigator.appName.substring(0,3) == "Net") ? e.pageY : event.y+document.body.scrollTop;
return(false);
	}
/* END SCRIPT */
/* BEGIN SCRIPT*/
function menu_open(e){
// 	mouse_x = (navigator.appName.substring(0,3) == "Net") ? e.pageX : event.x+document.body.scrollLeft;
// 	mouse_y = (navigator.appName.substring(0,3) == "Net") ? e.pageY : event.y+document.body.scrollTop;
return(false);
	}
/* END SCRIPT */



/* BEGIN SCRIPT*/
function move_element(elt_id){
//  document.getElementById(elt_id).style.position = "absolute";
//  document.getElementById(elt_id).style.top = mouse_y;
//  document.getElementById(elt_id).style.left = mouse_x;
//  document.getElementById(elt_id).style.visibility = "visible";
 /*document.getElementById(elt_id).style.display = "block";*/
return(false);
}
/* END SCRIPT */




/* BEGIN SCRIPT*/
function hide_element(elt_id){
 document.getElementById(elt_id).style.top = 0;
 document.getElementById(elt_id).style.left = 0;
 document.getElementById(elt_id).style.visibility = "hidden";
 /*document.getElementById(elt_id).style.display = "none";*/
return(false);
}
/* END SCRIPT */


/* BEGIN SCRIPT*/
function hide(elt_id){
try{
document.getElementById(elt_id).style.visibility = "hidden";
document.getElementById(elt_id).style.display = "none";
// alert("hided -> " + elt_id);
}catch(e){;}
return(false);
}
/* END SCRIPT */


/* BEGIN SCRIPT*/
function show(elt_id){
try{
document.getElementById(elt_id).style.visibility = "visible";
document.getElementById(elt_id).style.display = "block";
// alert("show -> " + elt_id);
}catch(e){;}
return(false);
}
/* END SCRIPT */




/* BEGIN SCRIPT*/
function hide_group_value(elt_id, val, id_true, id_false){
select_val = document.getElementById(elt_id).options[document.getElementById(elt_id).selectedIndex].value;

var array_id_true = id_true.split(",");
var array_id_false = id_false.split(",");


if(val == ''){
var result = 1;
}else{
var result = val.search(select_val);
}

// alert(result);
if(result >= 0){
	if(val[0] != '!'){
		for(x in array_id_false)
		hide(array_id_false[x]);
		for(x in array_id_true)
		show(array_id_true[x]);
	}
}else{
	if(val[0] == '!') {
		for(x in array_id_false)
		hide(array_id_false[x]);
		for(x in array_id_true)
		show(array_id_true[x]);
	}
}


return(false);
}
/* END SCRIPT */


/* BEGIN SCRIPT*/
function check_hide(check_id, elt_id, action_type){
	
var to_do = (document.getElementById(check_id).checked == 1);

if(action_type == "inverse") to_do =! (to_do);


if(to_do){
	show(elt_id);
}else{
	hide(elt_id);
	}
	
	
	return(false);
}
/* END SCRIPT */



 /* BEGIN SCRIPT */
function check_uncheck_div(div_id)
{
// var x = document.getElementById(div_id);
// var text = x.firstChild.nodeValue; 
x = document.getElementsByTagName("input");
for (i = 0; i < x.length; i++)
{
if(match(x[i].name, div_id)){
if(x[i].checked == 1){
		try{
			x[i].checked = 1;
		}
		catch(e){;
		}
	}
	else{
			try{
			x[i].checked = 0;
			}
			catch(e){;
			}
		}
  }
}
		
return(false);
}
/* END SCRIPT */



 /* BEGIN SCRIPT */
function check_uncheck(f, check_id)
{

// theStr = '';

// for (i = 0; i < f.elements.length; i++){
// try{
// ele = f.elements[i];
// theStr += ele.name + ' : ' + ele.value + "\n";
// }
// catch(e){;
// }
// }

// alert (theStr);


if(document.getElementById(check_id).checked == 1){
		for (i = 0; i < f.elements.length; i++){
		try{
			ele = f.elements[i].checked = 1;
		}
		catch(e){;
		}
		}
	}
	else{
			for (i = 0; i < f.elements.length; i++){
			try{
			ele = f.elements[i].checked = 0;
			}
			catch(e){;
			}
			}
		}
return(false);
}
/* END SCRIPT */




/* BEGIN SCRIPT*/
function only_email(action_id){
	val = document.getElementById(action_id).options[document.getElementById(action_id).selectedIndex].value;
if(val == 'only_email'){

	hide('model_extra');
	hide('type_zone');
	hide('hide_type');
	hide('show_type');
	hide('hide_email');
	hide("number_zone");
	hide("ticket_zone");
	hide('extra_code');
	hide('show_code');
	hide('extra_sla');
	hide('hide_sla');
	hide('show_sla');
	hide('sla_text');
	hide('show_header');
// hide("extra_header");
// hide("extra_sla");
// hide("extra_email");
// hide("extra_attach");


	show('extra_email');
	show('show_email');
	show('hide_code');
	show('extra_header');
	show('hide_header');

	}else{


if((val == 'new_model')||(val == 'update_model')){

	show('model_extra');
	show("number_zone");
	show("ticket_zone");
	show('extra_email');
	show('show_email');
	show('extra_sla');
	show('show_sla');
	show('sla_text');
	show('extra_header');
	show('hide_header');
	show('type_zone');
	show('show_type');
	show('extra_code');
	show('show_code');


	hide('hide_email');
	hide('hide_sla');
	hide('show_header');
	hide('hide_type');
	hide('hide_code');


	}
else{
if(val == 'normal'){


	show("number_zone");
	show("ticket_zone");
	show('hide_email');
	show('hide_sla');
	show('sla_text');
	show('extra_header');
	show('hide_header');
	show('hide_code');
	show('type_zone');
	show('show_type');


	hide('extra_email');
	hide('show_email');
	hide('model_extra');
	hide('extra_sla');
	hide('show_sla');
	hide('show_header');
	hide('extra_code');
	hide('show_code');
	hide('hide_type');
}else{//--only_db--


	show('hide_sla');
	show('sla_text');
	show('hide_email');
	show("number_zone");
	show("ticket_zone");
	show('show_header');
	show('hide_code');
	show('type_zone');
	show('show_type');


	hide('model_extra');
	hide('extra_email');
	hide('show_email');
	hide('extra_sla');
	hide('show_sla');
	hide('extra_header');
	hide('hide_header');
	hide('extra_code');
	hide('show_code');
	hide('hide_type');
}

	}


}
return(false);
}
/* END SCRIPT */








/*
ELEMENT_NODE 1
ATTRIBUTE_NODE  2
TEXT_NODE  3
CDATA_SECTION_NODE  4
ENTITY_REFERENCE_NODE  5
ENTITY_NODE  6
PROCESSING_INSTRUCTION_NODE  7
COMMENT_NODE  8
DOCUMENT_NODE  9
DOCUMENT_TYPE_NODE  10
DOCUMENT_FRAGMENT_NODE  11
NOTATION_NODE 12
*/





/* BEGIN SCRIPT*/
function load_model(f, select_id, prefix){

sel_elt_id = '';
sel_elt_value = '';
model_value = '';
//@@@@@@@@@@@@@@@@@@@@@@@@@
// to correct an internet explorer model bug 
try{number1 = document.getElementById('number1').value;}catch(e){};
try{model1 = document.getElementById('model1').value;}catch(e){};
try{comment1 = document.getElementById('comment1').value;}catch(e){};
try{call_log_group1 = document.getElementById('call_log_group1').value;}catch(e){};
try{assign_to1 = document.getElementById('assign_to1').value;}catch(e){};
try{mail_bcc1 = document.getElementById('mail_bcc1').value;}catch(e){};
// end to correct an internet explorer model bug 
//@@@@@@@@@@@@@@@@@@@@@@@@@


//@@@@@@@@@@@@@@@@@@@@@@@@@
try{
// model_id = f.model.options[f.model.selectedIndex].value;
	model_id = document.getElementById(select_id).options[document.getElementById(select_id).selectedIndex].value;
	model_value = document.getElementById(prefix + model_id).value;
}catch(e){
	model_value = '';
}

var array_model = model_value.split(":.:");
//@@@@@@@@@@@@@@@@@@@@@@@@@


//@@@@@@@@@@@@@@@@@@@@@@@@@
for(x in array_model){
var array_row_model = array_model[x].split(":,:");
try{
sel_elt_id = array_row_model[0];
sel_elt_value = array_row_model[1];
// sel_type = document.getElementById(sel_elt_id).nodeName;
sel_type = '';

}
catch(e){
}


//@@@@@@@@@@@@@@@@@@@@@@@@@
// '[Segnalazione Ticket Normal]',
// '[Aggiornamento Ticket Normale]',
// '[Chiusura Ticket Normale]',
// '[Segnalazione Ticket IDS]',
// '[Aggiornamento Ticket IDS]',
// '[Chiusura Ticket IDS]',

if(sel_elt_id=='title'){
	if((sel_elt_value.indexOf('[')==0) && (sel_elt_value.lastIndexOf(']')==(sel_elt_value.length-1))){
		sel_elt_value = '';
	}
}
//@@@@@@@@@@@@@@@@@@@@@@@@@
good1 = false;
good2 = false;
//@@@@@@@@@@@@@@@@@@@@@@@@@
try{
good1 = ((sel_elt_value.indexOf('|') != 0) || (sel_elt_value.lastIndexOf('|')!= (sel_elt_value.length-1)));
good2 = ((sel_elt_id != 'number')&&(sel_elt_id != 'model')&&(sel_elt_id != 'comment'));
}catch(e){
}
// if((sel_elt_id!='number')&&(sel_elt_id!='model')&&(sel_elt_id!='comment')&&(sel_elt_id!='call_log_group')&&(sel_elt_id!='assign_to')&&(sel_elt_id!='mail_bcc'))

if(good1 && good2){
if(((sel_elt_value != 'NULL')&&(sel_elt_value != '2000-01-01 01:01:01')&&(sel_elt_value != '0'))||(document.getElementById('model').options[document.getElementById('model').selectedIndex].text=='NULL')){
try{
document.getElementById(sel_elt_id).value = sel_elt_value;
}catch(e){
	try{
    var exist_item = 0;
        for(i = 0; i < document.getElementById(sel_elt_id).length; i++){
            if(document.getElementById(sel_elt_id).options[i].text == document.getElementById(sel_elt_id).options[document.getElementById(sel_elt_id).selectedIndex].text){
                exist_item = 1;
            }
        }
        if(exist_item == 1){
// 		document.getElementById(sel_elt_id).options[i].selected;
	        ;}
        else{
		var new_option = new Option(sel_elt_value, sel_elt_value);
		document.getElementById(sel_elt_id).options[document.getElementById(sel_elt_id).selectedIndex] = new_option;
	     }
		}catch(e){
// 		window.status = 'event:' + e.type + ' : ' + e.message;
		}
}
finally{
	    }
}



//@@@@@@@@@@@@@@@@@@@@@@@@@
if(sel_elt_id == 'text'){
try{
	f.text.value = sel_elt_value;
}catch(e){
		}
}
//@@@@@@@@@@@@@@@@@@@@@@@@@


//@@@@@@@@@@@@@@@@@@@@@@@@@
if(sel_elt_id == 'mail_text'){
var d = new Date();
// date_add= '------[' + d.toLocaleString() + ']------\n';
date_add = '';
//--  testo ricavato dal ticket esistente ---
try{
old_text = '\n' + document.getElementById('old_text').value;
}catch(e){
	old_text = '';
	}
finally{
//--------------
sel_elt_value = date_add + sel_elt_value + old_text;
// alert('eric \n' + sel_elt_value);
// document.getElementById('text').value = sel_elt_value;
try{
f.mail_text.value = sel_elt_value;
}catch(e){
	}

try{
tinyMCE.setContent(sel_elt_value.replace(/\n/gi, "<br />").replace(/<br \/><br \/>/gi, "<br />"));
}catch(e){
	}
}
}
//@@@@@@@@@@@@@@@@@@@@@@@@@



//@@@@@@@@@@@@@@@@@@@@@@@@@
// if(sel_elt_id=='number'){
// 	if(sel_elt_value = =''){
// 	document.getElementById('check_number').value = 0;
// // 	document.getElementById('number').value = document.getElementById('dump_number').value;
// }else{
// // 	document.getElementById('check_number').value = 1;
// // 	document.getElementById('number').value = 'No Number';
// 	}
// }
//@@@@@@@@@@@@@@@@@@@@@@@@@



}
//@@@@@@@@@@@@@@@@@@@@@@@@@


}
//@@@@@@@@@@@@@@@@@@@@@@@@@
// to correct an internet explorer model bug 
try{document.getElementById('number1').value = number1;}catch(e){};
try{document.getElementById('model1').value = model1;}catch(e){};
try{document.getElementById('comment1').value = comment1;}catch(e){};
// try{document.getElementById('call_log_group1').value = call_log_group1;}catch(e){};
// try{document.getElementById('assign_to1').value = assign_to1;}catch(e){};
// try{document.getElementById('mail_bcc1').value = mail_bcc1;}catch(e){};

// end to correct an internet explorer model bug 
//@@@@@@@@@@@@@@@@@@@@@@@@@

try{
f.my_master.value = f.title.value;
}catch(e){};


//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

return(false);
}
/* END SCRIPT */





/* BEGIN SCRIPT*/
/* locate to url with a compose data and value */
function link_conf(list_select, list_var)
{
var array_select = list_select.split(",");
var array_var = list_var.split(",");
var select_val = '';
var the_select = '';
var val_url = '';


for(x in array_select){
try{
	the_select=array_select[x];
	select_val = document.getElementById(the_select).options[document.getElementById(the_select).selectedIndex].value;
	val_url = val_url + array_var[x] + '=' + select_val  + '&';
}catch(e){
}
}
window.location='index.php?conf=' + the_select + '&' + val_url;
	
return(false);
}
/* END SCRIPT */







/* BEGIN SCRIPT*/
function load_selected(select_id1, select_id2){
	value1 = document.getElementById(select_id1).options[document.getElementById(select_id1).selectedIndex].value;
	text1 = document.getElementById(select_id1).options[document.getElementById(select_id1).selectedIndex].text;
		var new_option = new Option(value1, text1);
		document.getElementById(select_id2).options[document.getElementById(select_id2).selectedIndex] = new_option;
return(false);
}
/* END SCRIPT */



/* BEGIN SCRIPT*/
function change_id(f,send_text,send_id){
// if(f.text_area_type.options[f.text_area_type.selectedIndex].value == send_text){
// f.text.id = send_id;
// }else{
// f.text.id = "tmp_" + send_id;
// }
return(false);
}
/* END SCRIPT */







/* BEGIN SCRIPT*/
function show_extend(send_id,elmt_id1,elmt_id2){

val = document.getElementById(send_id).options[document.getElementById(send_id).selectedIndex].value;

if(val == 'extend'){
hide(elmt_id1);
show(elmt_id2);
// hide('text_zone');
// show('html_zone');
}else{
hide(elmt_id2);
show(elmt_id1);
// hide('html_zone');
// show('text_zone');
}

return(false);
}
/* END SCRIPT */




/* BEGIN SCRIPT*/
function show_id(f,send_text,send_id1,send_id2){
if(f.text_area_type.options[f.text_area_type.selectedIndex].value == send_text){
hide(send_id1);
show(send_id2);

// 	val=document.getElementById('text').value;
// 	tinyMCE.setContent(val);

								// hide('ticket_text');
								// show('message_text');
}else{
hide(send_id2);
show(send_id1);

// 	val=tinyMCE.getContent();

// 	document.getElementById('text').value = val;

								// hide('message_text');
								// show('ticket_text');
}

return(false);
}
/* END SCRIPT */






/* BEGIN SCRIPT*/
function radio_select(elt_id){
 document.getElementById(elt_id).checked = 1;
return(false);
}
/* END SCRIPT */



/* BEGIN SCRIPT*/
function empty_list(list_id){
while(document.getElementById(list_id).length > 0){
document.getElementById(list_id).options[document.getElementById(list_id).length-1] = null;
    }
return(false);
}
/* END SCRIPT */





/* BEGIN SCRIPT*/
function add_option(f){
//  alert('funzione chiamata');
var select_elem=document.getElementById('table').options[document.getElementById('table').selectedIndex].value;
//  alert(select_elem);

var list_elem=document.getElementById(select_elem).value;
//  alert('list_elem=' + list_elem);
var array_elem=list_elem.split(",");
//  alert('array_elem1=' + array_elem[1]);




empty_list('column');




for( x in array_elem){
// alert('val=' + array_elem[x]);
var new_option = new Option(array_elem[x], array_elem[x]);
document.getElementById('column').options[x] = new_option;
}


return(false);
}
/* END SCRIPT */







/* BEGIN SCRIPT*/
function move_one(f,list1,text1,separate){//to be work for new message
// 		confirm('Add Item?');
    var exist_item = 0;
        for(i = 0; i < document.getElementById(list2_id).length ; i++){
            if(document.getElementById(list2_id).options[i].text == document.getElementById(list1_id).options[document.getElementById(list1_id).selectedIndex].text){
                exist_item = 1;
            }
        }

        if(exist_item == 1){
	        ;}
        else{
            var new_option = new Option(document.getElementById(list1_id).options[document.getElementById(list1_id).selectedIndex].text,document.getElementById(list1_id).options[document.getElementById(list1_id).selectedIndex].value);
            document.getElementById(list2_id).options[(document.getElementById(list2_id).length)] = new_option;
        }
return(false);
}
/* END SCRIPT */






/* BEGIN SCRIPT*/
function move_all(f,list1,text1,separate){//to be work for new message
// 	confirm('Export?');
    var exist_item = 0;

    for(j = 0; j < document.getElementById(list1_id).length; j++){
        for(i = 0; i < document.getElementById(list2_id).length; i++){
            if(document.getElementById(list2_id).options[i].text == document.getElementById(list1_id).options[j].text){
                exist_item = 1;
            }
        }

        if(exist_item == 1){
	        exist_item = 0;
	        }
        else{
            var new_option = new Option(document.getElementById(list1_id).options[j].text,document.getElementById(list1_id).options[j].value);
            document.getElementById(list2_id).options[(document.getElementById(list2_id).length)] = new_option;
        };
}
return(false);
}
/* END SCRIPT */






/* BEGIN SCRIPT*/
function add_item(list1_id, list2_id){
// 		confirm('Add Item?');
    var exist_item = 0;
        for(i = 0; i < document.getElementById(list2_id).length; i++){
            if(document.getElementById(list2_id).options[i].text == document.getElementById(list1_id).options[document.getElementById(list1_id).selectedIndex].text){
                exist_item = 1;
            }
        }

        if(exist_item == 1){
	        ;}
        else{
            var new_option = new Option(document.getElementById(list1_id).options[document.getElementById(list1_id).selectedIndex].text,document.getElementById(list1_id).options[document.getElementById(list1_id).selectedIndex].value);
            document.getElementById(list2_id).options[(document.getElementById(list2_id).length)] = new_option;
        }
return(false);
}
/* END SCRIPT */







/* BEGIN SCRIPT*/
function add_to_textarea(text_id, list1_id){
text1 = document.getElementById(list1_id).options[document.getElementById(list1_id).selectedIndex].value;
// confirm('Add Text?');
text = '';//document.getElementById(text_id).value;
try{radio_select('sql_on');
}
catch(e){
	};
document.getElementById(text_id).value = text + text1 + ';';
return(false);
}
/* END SCRIPT */



/* BEGIN SCRIPT*/
function select_to_textarea(list1_id, text_id){
text1 = document.getElementById(text_id).value;
text2 = document.getElementById(list1_id).options[document.getElementById(list1_id).selectedIndex].value;
 if(!(text1.match('\n' + text2))){
  document.getElementById(text_id).value = text1 + '\n' + text2;
 }
return(false);
}
/* END SCRIPT */


/* BEGIN SCRIPT*/
function export_to_textarea(list1_id, text_id){
    for(j = 0; j < document.getElementById(list1_id).length; j++){
            text1 = document.getElementById(text_id).value;
            text2 = document.getElementById(list1_id).options[j].value;
            if(!(text1.match('\n' + text2))){
            document.getElementById(text_id).value = text1 + '\n' + text2;
        	}
        };
return(false);
}
/* END SCRIPT */



/* BEGIN SCRIPT*/
function add_text(text_id, list2_id){
// 		confirm('Add Text?');
var string_text = '';
string_text = document.getElementById(text_id).value;
add_string(string_text, list2_id);
return(false);
}
/* END SCRIPT */


/* BEGIN SCRIPT*/
function add_string(string_text, list2_id){
    var exist_item = 0;
        for(i = 0; i < document.getElementById(list2_id).length; i++){
            if(document.getElementById(list2_id).options[i].text == string_text){
                exist_item = 1;
            }
        }

        if(exist_item == 1){
	        ;}
        else{
            var new_option = new Option(string_text,string_text);
            document.getElementById(list2_id).options[(document.getElementById(list2_id).length)] = new_option;
        }
return(false);
}
/* END SCRIPT */




/* BEGIN SCRIPT*/
function delete_item(list1_id){
// 		confirm('Remove Item?');
        document.getElementById(list1_id).options[document.getElementById(list1_id).selectedIndex] = null;
return(false);
}
/* END SCRIPT */


/* BEGIN SCRIPT*/
function export1(list1_id, list2_id){
// 	confirm('Export?');
    var exist_item = 0;

    for(j = 0; j < document.getElementById(list1_id).length; j++){
        for(i = 0; i < document.getElementById(list2_id).length; i++){
            if(document.getElementById(list2_id).options[i].text == document.getElementById(list1_id).options[j].text){
                exist_item = 1;
            }
        }

        if(exist_item == 1){
	        exist_item = 0;
	        }
        else{
            var new_option = new Option(document.getElementById(list1_id).options[j].text,document.getElementById(list1_id).options[j].value);
            document.getElementById(list2_id).options[(document.getElementById(list2_id).length)] = new_option;
        };
};

}
/* END SCRIPT */