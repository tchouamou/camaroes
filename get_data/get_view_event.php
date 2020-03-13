<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * get_view_event.php
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */
/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.






get_view_event.php,Ver 3.0  2011-Sep 17:42:03  
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
// case "view_event"://When Working in data send by  form [view_event.php]
$list_email = get_post("list_email");
$new_state = array();
$new_group = array();
$new_type = array();
$new_type = array();
$array_email = explode(",", $list_email);
foreach ($array_email as $key => $value){
	    if(!empty($value)){
		     $new_state[$key] = get_post("state_" . $value);
		     $new_group[$key] = get_post("group_" . $value);
		     $new_type[$key] = get_post("type_" . $value);
	     }
}
/*
Creating the appropriate SQL string for  view_event
*/
foreach ($array_email as $key => $value){
	    if(!empty($value)){
		$cmr->query[$key] = "UPDATE " . $cmr->get_conf("cmr_table_prefix") . "user SET ";
		$cmr->query[$key] .= " state='" . $new_state[$key] . "',";
		$cmr->query[$key] .= " type='" . $new_type[$key] . "' ";
		$cmr->query[$key] .= " WHERE email='" . $value . "';";
		
	}
}

foreach ($array_email as $key => $value){
	if(!empty($new_group[$key])){
	$cmr->query[] = "INSERT INTO " . $cmr->get_conf("cmr_table_prefix") . "user_groups VALUES ('', '" . cmr_escape($array_email[$key]) . "' , '" . cmr_escape(trim($new_group[$key])) . "', '" . cmr_escape($new_state[$key]) . "', '', '', '', '', NOW() );"; 
}
		
}
/*
Creating the appropriate Message to be send to the administrator
*/

$cmr->email["headers_severity"] = 3;
$cmr->email["headers_to"] = "" . $cmr->get_conf("cmr_log_name") . " <" . $cmr->get_conf("cmr_log_email") . ">\r\n";
$cmr->email["headers_from"] = "" . $cmr->get_conf("cmr_admin_name") . " <" . $cmr->config["cmr_from_email"] . ">\r\n";
// $cmr->email["headers_cc"] = "".$cmr->config["cmr_cc_name"]." <".$cmr->config["cmr_cc_email"].">\r\n";
// $cmr->email["headers_bcc"] = "".$cmr->config["cmr_bcc_name"]." <".$cmr->config["cmr_bcc_email"].">\r\n";
$cmr->email["headers_bcc"] = "" . $cmr->config["cmr_from_name"] . " <" . $cmr->get_conf("cmr_admin_email") . ">\r\n";

$cmr->email["subject"] = "" . $cmr->config["cmr_company_name3"] . ":  " . $cmr->translate("deleted") . "  group";
$cmr->email["message"] = $cmr->translate("State for users ") . "\n  [" . $list_email . "]\n" . $cmr->translate("were changed by") . " : " . $cmr->get_user("auth_email") . "\n\n\n";
$cmr->email["message"] .= $cmr->get_user("auth_sign") . "\r\n";

/*
Creating the appropriate Message to be view for confirmation
*/
$cmr->output[0] = nl2br($cmr->translate("State for users ") . "\n  [" . $list_email . "]\n" . $cmr->translate("were changed by") . " : " . $cmr->get_user("auth_email"));
/*
Select next module to be run
*/
// $cmr->page["middle1"] = "run_result.php";

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->log_to_db("'" . $cmr->get_user("auth_email") . "', '" . $cmr->get_conf("cmr_table_prefix") . "user', '" . $list_email . "' ,'state_change'");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->page["middle1"] = $cmr->get_path("index") . "system/run_result.php";
// include_once($cmr->get_path("index") . "system/run_result.php");
// // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
