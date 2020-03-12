<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * get_report_periodic.php
 * ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */
/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























get_report_periodic.php, Ver 3.03 
*/

/**
 * Information about
 *
 * This is a modular application, all can be personalise, config file, template file, class, function, module
 * $division object istance of the class windowss
 *
 * @open _windows Class use to make module windows
 * @code_link() function  who take in input a module name and create and html link to this module
 */
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once("camaroes_class.php");
include_once("common_begin.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// case "change_type":

$table_name = get_post("table_name");
$column_name = get_post("column_name");
$new_type = get_post("new_type");

//
if($new_type){
	
$new_type = cmr_searchi_replace("\n", "','", $new_type);
$new_type = cmr_searchi_replace("\r", "", $new_type);
    // ===============================
    $cmr->query[0] = "ALTER TABLE " . $cmr->get_conf("cmr_table_prefix") . $table_name ."  CHANGE " . $column_name ." " . $column_name ." ENUM('" . $new_type . "') NOT NULL";
    // --------define next layout------
//    $cmr->page["middle1"] = $cmr->get_path("index") . "system/run_result.php";
    $cmr->output[0] = "<p><b> " . $cmr->translate("change of type run success") . " </b><br /><br /><br />
        <b>" . $cmr->translate("Table: ") . "</b>$table_name;<br />
        <b>" . $cmr->translate("Column: ") . "</b>$column_name;<br />
        <b>" . $cmr->translate("Type: ") . "</b>$new_type;<br />
        <br /> " . $cmr->translate("thanks") . "  --<br /></p>";
    // ------------------------
		$cmr->email["headers_severity"] = 3;
		$cmr->email["headers_to"] = "" . " <" . $cmr->get_user("auth_email") . ">\r\n";
		$cmr->email["headers_from"] = "" . $cmr->get_conf("cmr_admin_name") . " <" . $cmr->config["cmr_from_email"] . ">\r\n";
		$cmr->email["headers_cc"] = "" ;//. $cmr->config["cmr_cc_name"] . " <" . $cmr->config["cmr_cc_email"] . ">\r\n";
		$cmr->email["headers_bcc"] = "" ;//. $cmr->config["cmr_bcc_name"] . " <" . $cmr->config["cmr_bcc_email"] . ">\r\n";
    // ------------------------
    $cmr->email["subject"] = "" . $cmr->config["cmr_company_name3"] . ":  " . $cmr->translate("change type") . " ";
    $cmr->email["message"] = "password " . $cmr->translate("change of type run success") . "  : " . $cmr->get_user("auth_email") . "\n\n\n";
    $cmr->email["message"] .= $cmr->translate("Table") . ": $table_name; \n";
    $cmr->email["message"] .= $cmr->translate("Column") . ": $column_name; \n";
    $cmr->email["message"] .= $cmr->translate("Type") . ": $new_type; \n";
    $cmr->email["message"] .= "\n " . $cmr->translate("thanks") . "  \n";
	$cmr->email["message"] .= "--\r\n"; // dlimiteur de signature
	$cmr->email["message"] .= $cmr->get_user("auth_sign") . "\r\n";
} 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->log_to_db("'" . $cmr->get_user("auth_email") . "', '" . $table_name . "', '" . $column_name . "' ,'table_name'");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->page["middle1"] = $cmr->get_path("index") . "system/run_result.php";
$cmr->page["middle2"] = $mod->path;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>