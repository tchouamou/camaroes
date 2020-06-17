<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * get_comment.php
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */
/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























get_comment.php,Ver 3.0  2011-Sep 22:32:32  
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
 * the text off the message you will be send after running run_result.php
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
// case "comment":
$line_id = get_post("line_id"); //Getting variable [$line_id] sended by form [comment]
$text = get_post("text"); //Getting variable [$comment] sended by form [comment]
$table_name= get_post("table_name");//Getting variable [$table_name] sended by form [text]
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
$text = preg_replace("/(\{\{)([^}{]*)(\}\})/e", "run_code('{{\\2}}', 0, '$cmr_hostname', '$cmr_username', '$cmr_password', '$cmr_database', '$cmr_prefix', '$cmr_user', '$cmr_group')", $text);
$text = stripslashes($text); //remove slashes from text
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$attach = get_post("attach1");
$cmr->post_files["attachment_location"] = $cmr->get_path("home") . "home/users/" . strtolower($cmr->get_user("auth_uid")) . "/attach/";
$cmr->post_files = get_post_files($cmr->config, $cmr->post_files);
$text .= "\n" . $cmr->translate("attach: ") .  $cmr->post_files["attachment"] . "\n";
// 	$text .= "\n" . $cmr->translate("attach: ") .  list_attach_link($cmr->post_files["attachment"], "", ", ") . "\n";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// Creating the appropriate SQL string for comment
$text = "\n* " . date("Y-m-d H:i:s") . " " . $cmr->translate("by") . ": [" . $cmr->get_user("auth_email") . "] \n" . $text . "\n";
$cmr->query[0] = "INSERT INTO " . $cmr->get_conf("cmr_table_prefix") . "comment  (id, name, encoding, language, state,  text, allow_type, allow_email,  allow_groups, date_time) values ('', '" . $table_name . "@" . $line_id . "', '', 'text', 'enable', '" . cmr_escape($text) . "', '',   '" . $cmr->get_user("auth_email") . "', '', NOW());";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(($cmr->get_conf("comment_save_attachment")) && strlen($attach) > 6){
$cmr->query[2] = "INSERT INTO " . $cmr->get_conf("cmr_table_prefix") . "download (
id, url, path, file_name, file_type, file_size, state, allow_type, allow_email, allow_groups, comment, date_time
) VALUES (
'', '" . $cmr->post_files["attachment"] . "', '" . $cmr->post_files["attachment"] . "', '" . $cmr->post_files["attachment"] . "', '?', '?', 'enable', '', '" . $cmr->get_user("auth_email") . "', '', '" . cmr_escape($text) . "',  NOW() 
)";
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// echo $cmr->query[0];exit;
// --------define next layout------
$cmr->page["middle1"] = $cmr->get_path("index") . "system/run_result.php";
$cmr->output[0] = "<p><b><u>" . $cmr->translate("Comment added to ") . ":[" . $table_name . "] " . $line_id . "</u></b>";
$cmr->output[0] .= "<br /><br />==========<br />";
$cmr->output[0] .= "<b>" . $cmr->translate("comment") . ": </b>";
$cmr->output[0] .= $text;
$cmr->output[0] .= "<br /><br />==========<br />";
$cmr->output[0] .= "</p>";
// ------------------------
$cmr->email["subject"] = "" . $cmr->config["cmr_company_name3"] . ": " . $cmr->translate("Comment added to ") . ":[" . $table_name . "] " . $line_id ;
$cmr->email["message"] = "" . $cmr->translate("Comment added to ") . ":" . $table_name . "[" . $line_id . "] " . $cmr->translate("by") . " " . $cmr->get_user("auth_email");
$cmr->email["message"] .= "\n==========\n";
$cmr->email["message"] .= $text . "\n";
$cmr->email["message"] .= "\n==========\n";

$cmr->email["message"] .= "--\r\n"; // dlimiteur de signature
$cmr->email["message"] .= $cmr->get_user("auth_sign") . "\r\n";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
/* intestazioni addizionali */
// $cmr->email["recipient"] = "" . $cmr->get_conf("cmr_admin_name") . " <" . $cmr->config["cmr_from_email"] . ">\r\n";
// 		$cmr->email["headers_severity"] = 3;
$cmr->email["headers_to"] = "" . " <" . $cmr->get_user("auth_email") . ">\r\n";
// 		$cmr->email["headers_from"] = "" . $cmr->get_conf("cmr_admin_name") . " <" . $cmr->config["cmr_from_email"] . ">\r\n";
// 		$cmr->email["headers_cc"] = "" ;//. $cmr->config["cmr_cc_name"] . " <" . $cmr->config["cmr_cc_email"] . ">\r\n";
// 		$cmr->email["headers_bcc"] = "";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->log_to_db("'" . $cmr->get_user("auth_email") . "', '" . $table_name . "', '" . $line_id . "' ,'comment'");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->page["middle1"] = $cmr->get_path("index") . "system/run_result.php";
$cmr->page["middle2"] = $mod->path;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
