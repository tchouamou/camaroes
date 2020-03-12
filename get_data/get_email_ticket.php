<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/********************************************************************
 *        get_email_ticket.php
 *       ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 *
 **************************************************************************/ 
/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.

 
 


 

 
 

 


 
 
 
 
 
 
 
 
 


 


get_email_ticket.php,Ver 3.0  2011-Nov-Thu 00:26:50  
*/


/**
* Information about
*$cmr->db["sql_query1"] Is used for keeping
*the query string you will be run in the module run_result.php
*
*$cmr->output[0] Is used for keeping
*the string value you will be see after running run_result.php
*
*$cmr->email["subject"] Is used for keeping
*the title off the message you will be send after running run_result.php
*
*$cmr->email["message"] Is used for keeping
*the text value off the message you will be send after running run_result.php
*/

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once("camaroes_class.php");
include_once("common_begin.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 
 // case "email_ticket":
$id = get_post("id_ticket"); //Getting variable [$id] sended by form [ticket]
$mail_from = get_post("mail_from"); //Getting variable [$mail_from] sended by form [ticket]
$mail_to = get_post("mail_to"); //Getting variable [$mail_to] sended by form [ticket]
$mail_cc = get_post("mail_cc"); //Getting variable [$mail_cc] sended by form [ticket]
$mail_bcc = get_post("mail_bcc"); //Getting variable [$mail_bcc] sended by form [ticket]
// $cmr->post_files["attachment"]= get_post("attach");//Getting variable [$cmr->post_files["attachment"]] sended by form [ticket]
$mail_text = get_post("mail_text"); //Getting variable [$mail_text] sended by form [ticket]
$mail_title = get_post("mail_title"); //Getting variable [$mail_text] sended by form [ticket]
$email_text = get_post("email_text");
// -----------------------------------------------------
$cmr->post_var["id_ticket"] = $id; // for email ticket
// -----------------------------------------------------

// §§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§
// *************************
	$cmr->post_files["attachment_location"] = $cmr->get_path("index") . "home/groups/" . strtolower(get_post("call_log_group")) . "/attach/";
	$cmr->post_files = get_post_files($cmr->config, $cmr->post_files);
// *************************
//     $mail_text = stripslashes($mail_text); //remove slashes from email_text
//     $mail_title = stripslashes($mail_title); //remove slashes from email_title
// §§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§
        $cmr->email["recipient"] = "";
//      $cmr->email["recipient"] = "" . $cmr->get_conf("cmr_admin_name") . " <" . $cmr->config["cmr_from_email"] . ">\r\n";

        $cmr->email["subject"] = cmr_unescape($mail_title);

        $cmr->email["message"] = cmr_unescape($mail_text) . " \n";
        $cmr->email["message"] .= "--\r\n"; // dlimiteur de signature
        $cmr->email["message"] .= $cmr->get_user("auth_sign") . "\r\n";
        
        
        /* intestazioni addizionali */
        $cmr->email["headers_severity"] = cmr_unescape($severity);
        $cmr->email["headers_to"] = cmr_unescape($mail_to) . "\r\n";
        $cmr->email["headers_from"] = cmr_unescape($mail_from) . "\r\n";
        $cmr->email["headers_cc"] = cmr_unescape($mail_cc) . "\r\n";
        $cmr->email["headers_bcc"] = cmr_unescape($mail_bcc) . "\r\n";
        $cmr->output[0] = "<b>" . $cmr->translate("Email Ticket sended successfully ") . "</b><br /><br />" . cmr_unescape(($mail_title)) . "<br /><pre>" . wordwrap(cmr_unescape(($mail_text)), 80) . "</pre> <br />";
// ----------------------------
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        // ************************************
if(($cmr->get_conf("cmr_save_email")) && ($cmr->conf["cmr_save_email"] .= "none")){
$cmr->query[2] = "INSERT INTO " . $cmr->get_conf("cmr_table_prefix") . "email (
id, encoding, lang, header, mail_title, mail_from, mail_to, mail_cc, mail_bcc, attach, text, my_master, allow_type, allow_email, allow_groups, comment, date_time
) VALUES (
'', '', '" . cmr_escape($lang) . "', '', '" . cmr_escape($mail_title) . "', '" . cmr_escape($mail_from) . "', '" . cmr_escape($mail_to) . "', '" . cmr_escape($mail_cc) . "', '" . cmr_escape($mail_bcc) . "', '" . $cmr->post_files["attachment"] . "', '" . cmr_escape($mail_text) . "', '" . cmr_escape($my_master) . "', '" . cmr_escape($allow_type) . "', '" . cmr_escape($allow_email) . "', '" . cmr_escape($allow_groups) . "', '" . cmr_escape($comment) . "',  NOW() 
)"; 
}
// ----------------------------
if(($cmr->get_conf("cmr_save_escalation"))){
$cmr->query[4] = "INSERT INTO " . $cmr->get_conf("cmr_table_prefix") . "escalation ( 
id , ticket_number , action , id_ticket , allow_type , allow_email , allow_groups , comment , date_time )
VALUES (
'' , '" . cmr_escape($number) . "' , 'Send by email to:" . cmr_escape($mail_to) . "' , '" . cmr_escape($id) . "' , '" . cmr_escape($allow_type) . "' , '" . cmr_escape($allow_email) . "' , '" . cmr_escape($allow_groups) . "' , '" . cmr_escape($comment) . "' ,  NOW()  )
);";
}
// ----------------------------
$attach= get_post("attach1").", ".get_post("attach2").", ".get_post("attach3").", ".get_post("attach4");

if(($cmr->get_conf("cmr_save_attachment")) && strlen($attach) > 6){
$cmr->query[3] = "INSERT INTO " . $cmr->get_conf("cmr_table_prefix") . "download (
id, url, path, file_name, file_type, file_size, state, allow_type, allow_email, allow_groups, comment, date_time
) VALUES (
'', '" . cmr_escape($id) . "', '" . cmr_escape($id) . "," . $cmr->post_files["attachment"] . "', '" . $cmr->post_files["attachment"] . "', '?', '?', 'active', '" . cmr_escape($allow_type) . "', '" . cmr_escape($allow_email) . "', '" . cmr_escape($allow_groups) . "', '" . cmr_escape($comment) . "',  NOW() 
)";
 }
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->log_to_db("'" . $cmr->get_user("auth_email") . "', '" . $cmr->get_conf("cmr_table_prefix") . "ticket', '" . cmr_escape($id) . "' ,'email'");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->page["middle1"] = $cmr->get_path("index") . "system/run_result.php";
$cmr->page["middle2"] = $mod->path;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>