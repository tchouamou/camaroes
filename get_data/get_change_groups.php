<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * get_change_groups.php
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */
/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























get_change_groups.php,Ver 3.0  2011-Sep 22:32:32  
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
// case "change_groups":
$old_groups = $cmr->get_user("auth_groups");
$new_groups = str_replace("'", "", get_post("group_name"));
$the_groups = $cmr->get_column($cmr->get_conf("cmr_table_prefix") . "groups", "*", "name", $new_groups);
$id_groups = $the_groups["id"];

if(strpos($cmr->get_user("auth_list_group"), "'" . $new_groups . "'")){

	$cmr->post_var["id_groups"] = $the_groups["id"];
	
	$cmr->user["auth_group"] = $new_groups;
	$cmr->user["auth_groups"] = $new_groups;
	$cmr->user["auth_group_home"] = $the_groups["home"];
	$cmr->user["auth_group_script"] = $the_groups["login_script"];
	$cmr->user["auth_group_type"] = $the_groups["type"];
	$cmr->user["auth_group_comment"] = $the_groups["comment"];
	$cmr->user["auth_group_sign"] = $the_groups["email_sign"];
	$cmr->user["auth_group_comment"] = $the_groups["comment"];
	$cmr->user["auth_group_type"] = $the_groups["type"];
	$cmr->user["authorisation"] = $the_groups["type"]; //--importante per diritti utenti--
	$cmr->user["auth_type"] = $cmr->get_user("authorisation");
	$cmr->user["auth_group_home"] = $cmr->get_path("home") . $the_groups["home"] . "/";// =========== file group  ==================
	$cmr->user["auth_group_path"] = $cmr->get_path("home") . "home/groups/" . $new_groups . "/";// =========== file group  ==================
	if(($cmr->get_user("auth_group_comment"))) $cmr->user["auth_comment"] = $cmr->get_user("auth_group_comment");
	if(($cmr->get_user("auth_group_sign"))) $cmr->user["auth_sign"] = $cmr->get_user("auth_group_sign");
	
   $cmr->user["auth_list_group"] =  calcul_tree_group($cmr->config,  $new_groups, $cmr->db_connection);

	// --------define next layout------
	//    $cmr->page["middle1"] = $cmr->get_path("index") . "system/run_result.php";
	$cmr->output[0] = "<p><b> " . $cmr->translate("change_groups_success") . " </b><br /><br /><br />";
	$cmr->output[0] .= "<b>" . $cmr->translate("old groups: ") . "</b>" . $old_groups . ";<br />";
	$cmr->output[0] .= "<b>" . $cmr->translate("new groups: ") . "</b>" . $new_groups . ";<br />";
	$cmr->output[0] .= "<br /> " . $cmr->translate("thanks") . "  --<br /></p>";
	// ------------------------
	$cmr->email["headers_severity"] = 3;
	$cmr->email["headers_to"] = "" . " <" . $cmr->get_user("auth_email"). ">\r\n";
	$cmr->email["headers_from"] = "" . $cmr->get_conf("cmr_admin_name") . " <" . $cmr->config["cmr_from_email"] . ">\r\n";
	$cmr->email["headers_cc"] = "" ;//. $cmr->config["cmr_cc_name"] . " <" . $cmr->config["cmr_cc_email"] . ">\r\n";
	$cmr->email["headers_bcc"] = "" ;//. $cmr->config["cmr_bcc_name"] . " <" . $cmr->config["cmr_bcc_email"] . ">\r\n";
    // ------------------------
    $cmr->email["subject"] = "" . $cmr->config["cmr_company_name3"] . ":  " . $cmr->translate("change groups") . " ";
    $cmr->email["message"] = "groups " . $cmr->translate("was changed by user") . "  : " . $cmr->get_user("auth_email") . "\n\n\n";
    $cmr->email["message"] .= $cmr->translate("old groups") . ":" . $old_groups . "; \n";
    $cmr->email["message"] .= $cmr->translate("new groups") . ":" . $new_groups . "; \n";
    $cmr->email["message"] .= "\n " . $cmr->translate("thanks") . "  \n";
	$cmr->email["message"] .= "--\r\n"; // dlimiteur de signature
	$cmr->email["message"] .= $cmr->get_user("auth_sign") . "\r\n";

/* intestazioni addizionali */
// $cmr->email["headers_severity"]=3;
// $cmr->email["headers_to"] = "". $cmr->get_conf("cmr_admin_name") ." <".$cmr->config["cmr_from_email"] .">\r\n";
// $cmr->email["headers_from"] = "". $cmr->get_conf("cmr_admin_name") ." <".$cmr->config["cmr_from_email"] .">\r\n";
// $cmr->email["headers_cc"] = "".$cmr->config["cmr_cc_name"] ." <".$cmr->config["cmr_cc_email"] .">\r\n";
// $cmr->email["headers_bcc"] = "".$cmr->config["cmr_bcc_name"] ." <".$cmr->config["cmr_bcc_email"] .">\r\n";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->log_to_db("'" . $old_email . "', '" . $cmr->get_conf("cmr_table_prefix") . "user', '" . $id_groups . "' ,'change_groups'");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->page["middle1"] = $cmr->get_path("index") . "system/run_result.php";
$cmr->page["middle2"] = $mod->path;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
}

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
