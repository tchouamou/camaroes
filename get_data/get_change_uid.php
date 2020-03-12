<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * get_change_uid.php
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */
/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.








get_change_uid.php,Ver 3.0  2011-Sep 22:32:32  
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
// case "change_uid":
$id = get_post("id_user");
$user_email = $cmr->get_column($cmr->get_conf("cmr_table_prefix") . "user", "email", "id", $id);
$old_uid = $cmr->get_column($cmr->get_conf("cmr_table_prefix") . "user", "uid", "id", $id);

// $old_uid = get_post("old_uid");
$new_uid1 = get_post("new_uid1");
$new_uid2 = get_post("new_uid2");

$test_exist = $cmr->get_column($cmr->get_conf("cmr_table_prefix") . "user", "uid", "id", $old_uid);

if(($new_uid1 == $new_uid2) && (empty($test_exist))){
    // ===========
    // ----------------------------
    // ===============================
    // if(($user_email!=($cmr->get_user("auth_email")))&&(($cmr->user["auth_group"] .="noc"))
    // {die("Lei non è ha i diritti sufficienti per cambiare i dati personale di un altro utente. Soltanto gli amministratori del sistema o l'utente stesso lo puo fare");}
    // ===============================
//             cmr_where_query($table = "cmr_user", $email = "guess@localhost", $group = "guess", $type = "0", $list_group = "guest", $cmr->db_connection=0)
    $cmr->query[0] = "UPDATE " . $cmr->get_conf("cmr_table_prefix") . "user SET
    uid = '" . cmr_escape($new_uid1) . "',
    date_time = NOW( ) WHERE id ='" . cmr_escape($id) . "' ;";
    // --------define next layout------
//    $cmr->page["middle1"] = $cmr->get_path("index") . "system/run_result.php";
    $cmr->output[0] = "<p><b> " . $cmr->translate("change_uid_success") . " </b><br /><br /><br />
        <b>" . $cmr->translate("old user uid": ") . "</b>$old_uid;<br />
        <b>" . $cmr->translate("new user uid: ") . "</b>$new_uid1;<br />
        <br /> " . $cmr->translate("thanks") . "  --<br /></p>";
    // ------------------------
		$cmr->email["headers_severity"] = 3;
		$cmr->email["headers_to"] = "" . " <" . $cmr->get_user("auth_email"). ">\r\n";
		$cmr->email["headers_from"] = "" . $cmr->get_conf("cmr_admin_name") . " <" . $cmr->config["cmr_from_email"] . ">\r\n";
		$cmr->email["headers_cc"] = "" ;//. $cmr->config["cmr_cc_name"] . " <" . $cmr->config["cmr_cc_email"] . ">\r\n";
		$cmr->email["headers_bcc"] = "" ;//. $cmr->config["cmr_bcc_name"] . " <" . $cmr->config["cmr_bcc_email"] . ">\r\n";
    // ------------------------
    $cmr->email["subject"] = "" . $cmr->config["cmr_company_name3"] . ":  " . $cmr->translate("change uid") . " ";
    $cmr->email["message"] = "uid " . $cmr->translate("was changed by user") . "  : " . $cmr->get_user("auth_email") . "\n\n\n";
    $cmr->email["message"] .= $cmr->translate("user") . ": $user_email; \n";
    $cmr->email["message"] .= $cmr->translate("old user uid") . ": $old_uid; \n";
    $cmr->email["message"] .= $cmr->translate("new user uid") . ": $new_uid1; \n";
    $cmr->email["message"] .= "\n " . $cmr->translate("thanks") . "  \n";
	$cmr->email["message"] .= "--\r\n"; // dlimiteur de signature
	$cmr->email["message"] .= $cmr->get_user("auth_sign") . "\r\n";
}else{
    // --------define next layout------
//    $cmr->page["middle1"] = $cmr->get_path("index") . "system/run_result.php";
    $cmr->output[0] = "<p><b>" . $cmr->translate("Uid not changed. Insert the same uid") . "</b><br /><br /><br />
        <b>" . $cmr->translate("user: ") . "</b>$user_email;<br />
        <b>" . $cmr->translate("old user uid: ") . "</b>$old_uid;<br />
        <b>" . $cmr->translate("new user uid: ") . "</b>$new_uid1;<br />
        <br /> " . $cmr->translate("thanks") . "  --<br /></p>";
    // ------------------------
		$cmr->email["headers_severity"] = 3;
		$cmr->email["headers_to"] = "" . " <" . $cmr->get_user("auth_email"). ">\r\n";
		$cmr->email["headers_from"] = "" . $cmr->get_conf("cmr_admin_name") . " <" . $cmr->config["cmr_from_email"] . ">\r\n";
		$cmr->email["headers_cc"] = "" ;//. $cmr->config["cmr_cc_name"] . " <" . $cmr->config["cmr_cc_email"] . ">\r\n";
		$cmr->email["headers_bcc"] = "" ;//. $cmr->config["cmr_bcc_name"] . " <" . $cmr->config["cmr_bcc_email"] . ">\r\n";
    // ------------------------
    $cmr->email["subject"] = "" . $cmr->config["cmr_company_name3"] . ":  " . $cmr->translate("change uid");
    $cmr->email["message"] = $cmr->translate("by user") . ": " . $cmr->get_user("auth_email") .  "\n\n";
    $cmr->email["message"] .= $cmr->translate("uid not changed: write the same uid or use another new uid") . "\n\n\n";
    $cmr->email["message"] .= $cmr->translate("user") . ": $user_email; \n";
    $cmr->email["message"] .= $cmr->translate("old user uid") . ": $old_uid; \n";
    $cmr->email["message"] .= $cmr->translate("new user uid") . ": $new_uid1; \n";
    $cmr->email["message"] .= "\n " . $cmr->translate("thanks") . "  \n";
$cmr->email["message"] .= "--\r\n"; // dlimiteur de signature
$cmr->email["message"] .= $cmr->get_user("auth_sign") . "\r\n";
}

/* intestazioni addizionali */
// $cmr->email["headers_severity"]=3;
// $cmr->email["headers_to"] = "". $cmr->get_conf("cmr_admin_name") ." <".$cmr->config["cmr_from_email"] .">\r\n";
// $cmr->email["headers_from"] = "". $cmr->get_conf("cmr_admin_name") ." <".$cmr->config["cmr_from_email"] .">\r\n";
// $cmr->email["headers_cc"] = "".$cmr->config["cmr_cc_name"] ." <".$cmr->config["cmr_cc_email"] .">\r\n";
// $cmr->email["headers_bcc"] = "".$cmr->config["cmr_bcc_name"] ." <".$cmr->config["cmr_bcc_email"] .">\r\n";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->log_to_db("'" . $cmr->get_user("auth_email") . "', '" . $cmr->get_conf("cmr_table_prefix") . "user', '" . cmr_escape($id) . "' ,'change_uid'");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->page["middle1"] = $cmr->get_path("index") . "system/run_result.php";
$cmr->page["middle2"] = $mod->path;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>