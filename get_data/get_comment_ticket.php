<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * get_comment_ticket.php
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */
/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























get_comment_ticket.php,Ver 3.0  2011-Sep 22:32:32  
*/

/**
 * Information about
 * $cmr->query[0] Is used for keeping
 * the query string you will be run in the module run_result.php
 *
 * $cmr->output[0] Is used for keeping
 * the string value you will be see after running run_result.php
 *
 * $cmr->email["subject"] Is used for keeping
 * the title off the message you will be send after running run_result.php
 *
 * $cmr->email["message"] Is used for keeping
 * the text value off the message you will be send after running run_result.php
 */
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once("camaroes_class.php");
include_once("common_begin.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// case "comment_ticket":
$id_ticket = get_post("id_ticket"); //Getting variable [$id_ticket] sended by form [ticket]
// $number= get_post("number");//Getting variable [$number] sended by form [ticket]
// $old_comment= get_post("old_comment");//Getting variable [$old_comment] sended by form [ticket]
$new_comment = get_post("new_comment"); //Getting variable [$comment] sended by form [ticket]
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr_hostname = $cmr->get_conf("db_host");
$cmr_database = $cmr->get_conf("db_name");
$cmr_username = $cmr->get_conf("db_user");
$cmr_password = $cmr->get_conf("db_pw");
$cmr_user = $cmr->get_user("auth_email");
$cmr_group = $cmr->get_user("auth_group");
$cmr_prefix = $cmr->get_conf("cmr_table_prefix");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$new_comment = preg_replace("/(\{\{)([^}{]*)(\}\})/e", "run_code('{{\\2}}', 0, '$cmr_hostname', '$cmr_username', '$cmr_password', '$cmr_database', '$cmr_prefix', '$cmr_user', '$cmr_group')", $new_comment);
$new_comment = stripslashes($new_comment); //remove slashes from new_comment
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$ticket = $cmr->get_column($cmr->get_conf("cmr_table_prefix") . "ticket", "*", "id", $id_ticket);
$number = $ticket["number"];
$title = $ticket["title"];
$call_log_group = $ticket["call_log_group"];
$old_comment = $ticket["comment"];
// $old_attach = $ticket["attach"];
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// -----------------------------------------------------
$cmr->post_var["id_ticket"] = $id_ticket; // for comment ticket
// -----------------------------------------------------

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$new_attach = "";
$comment = $old_comment;
$comment .= "\n* " . date("Y-m-d H:i:s") . " " . $cmr->translate("by") . ": [" . $cmr->get_user("auth_email") . "] ";
$comment .= "\n" . $new_comment . "\n";
// $attach1 = get_post("attach1");
$cmr->post_files["attachment_location"] = $cmr->get_path("index") . "home/groups/" . strtolower(trim($call_log_group)) . "/attach/";
$cmr->post_files = get_post_files($cmr->config, $cmr->post_files);
if($cmr->post_files["attachment"]){
// 	$new_comment .= "\n" . $cmr->translate("attach: ") .  list_attach_link($cmr->post_files["attachment"], "", ", ") . "\n";
	$new_comment .= "\n" . $cmr->translate("attach: [") .  $cmr->post_files["attachment"] . "]\n";
	$new_attach = "," . $cmr->post_files["attachment"];
$comment .= "\n[" . $new_attach . "]\n";
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$allow_type = "";
$allow_email = "";
$allow_groups = "";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// Creating the appropriate SQL string for update_Ticket
$cmr->query[0] = "UPDATE " . $cmr->get_conf("cmr_table_prefix") . "ticket SET comment = '" . cmr_escape($comment) . "' WHERE (id ='" . cmr_escape($id_ticket) . "');";
// ----------------------------
if(($cmr->get_conf("cmr_save_escalation"))){
$cmr->query[1] = "INSERT INTO " . $cmr->get_conf("cmr_table_prefix") . "escalation ( 
id , ticket_number , action , id_ticket , allow_type , allow_email , allow_groups , comment , date_time )
VALUES (
'' , '" . cmr_escape($number) . "' , '" . $cmr->translate("Add comment by") . "(". $cmr->get_user("auth_email") . ")' , '" . cmr_escape($id_ticket) . "' , '" . cmr_escape($allow_type) . "' , '" . cmr_escape($allow_email) . "' , '" . cmr_escape($allow_groups) . "' , '" . cmr_escape($comment) . "' ,  NOW()  
);";
}

if(($cmr->get_conf("cmr_save_attachment")) && strlen($attach1) > 6){
$cmr->query[2] = "INSERT INTO " . $cmr->get_conf("cmr_table_prefix") . "download (
id, url, path, file_name, file_type, file_size, state, allow_type, allow_email, allow_groups, comment, date_time
) VALUES (
'', '" . cmr_escape($id_ticket) . "', '" . cmr_escape($id_ticket) . "," . $cmr->post_files["attachment"] . "', '" . $cmr->post_files["attachment"] . "', '?', '?', 'enable', '" . cmr_escape($allow_type) . "', '" . cmr_escape($allow_email) . "', '" . cmr_escape($allow_groups) . "', '" . cmr_escape($comment) . "',  NOW() 
)";
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// --------define next layout------
$cmr->page["middle1"] = $cmr->get_path("index") . "system/run_result.php";
$cmr->page["middle2"] = "preview_ticket.php";
$cmr->output[0] = "<p><b><u>" . $cmr->translate("Comment added to ticket") . ":[" . cmr_unescape(($number)) . "] ". cmr_unescape(($title)) ."</u></b>";
$cmr->output[0] .= "<br /><br />==========<br />";
$cmr->output[0] .= "<b>" . $cmr->translate("comment") . ": </b>";
$cmr->output[0] .= cmr_unescape(($new_comment));
$cmr->output[0] .= "<br /><br />==========<br />";
$cmr->output[0] .= "</p>";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->email["subject"] = "" . $cmr->config["cmr_company_name3"] . ": " . $cmr->translate("Comment added to ticket") . ":[" . cmr_unescape($number) . "] " . cmr_unescape($title) ;
$cmr->email["message"] = "" . $cmr->translate("Comment added to ticket") . ":[" . cmr_unescape($number) . "] " . $cmr->translate("by") . " " . $cmr->get_user("auth_email");
$cmr->email["message"] .= "\n==========\n";
$cmr->email["message"] .= cmr_unescape($new_comment) . "\n";
$cmr->email["message"] .= "\n==========\n";

$cmr->email["message"] .= "--\r\n"; // dlimiteur de signature
$cmr->email["message"] .= $cmr->get_user("auth_sign") . "\r\n";
		/* intestazioni addizionali */
$cmr->email["recipient"] = "" . $cmr->get_conf("cmr_admin_name") . " <" . $cmr->config["cmr_from_email"] . ">\r\n";
$cmr->email["headers_severity"] = 3;
$cmr->email["headers_to"] = "" . $cmr->config["cmr_bcc_name"] . " <" . $cmr->config["cmr_bcc_email"] . ">\r\n";
$cmr->email["headers_from"] = "" . $cmr->get_conf("cmr_admin_name") . " <" . $cmr->config["cmr_from_email"] . ">\r\n";
$cmr->email["headers_cc"] = "" . $cmr->config["cmr_cc_name"] . " <" . $cmr->config["cmr_cc_email"] . ">\r\n";
$cmr->email["headers_bcc"] = "";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->log_to_db("'" . $cmr->get_user("auth_email") . "', '" . $cmr->get_conf("cmr_table_prefix") . "ticket', '" . $id_ticket . "' ,'comment'");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->page["middle1"] = $cmr->get_path("index") . "system/run_result.php";
$cmr->page["middle2"] = $mod->path;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
