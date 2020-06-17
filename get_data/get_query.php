<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * get_query.php
 * ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */
/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























get_query.php,Ver 3.0  2011-Jun-Tue 10:23:18
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
// case "query"://------
$action = trim(get_post("action"));
$on = trim(get_post("on"));

$query_column = trim(get_post("query_column"));
$query_where_column = trim(get_post("query_where_column"));
$query_where_value = trim(get_post("query_where_value"));
$query_group_by_column = trim(get_post("query_group_by_column"));
$query_group_by_order = trim(get_post("query_group_by_order"));
$query_having_column = trim(get_post("query_having_column"));
$query_having_value = trim(get_post("query_having_value"));
$query_order_by_column = trim(get_post("query_order_by_column"));
$query_order_by_order = trim(get_post("query_order_by_order"));
$query_limit1 = trim(get_post("query_limit1"));
$query_limit2 = trim(get_post("query_limit2"));


if(empty($cmr->query[0])) $cmr->query[0] = ""; //strtolower()
// --------next box ----------
$cmr->output[0] = $cmr->query[0];
// ---------------------
if($cmr->query[0] != ""){
    $cmr->email["recipient"] = "" . $cmr->get_conf("cmr_admin_name") . " <" . $cmr->config["cmr_from_email"] . ">\r\n";
    $cmr->email["subject"] = "" . $cmr->get_conf("application_short_name") . ": Eseguito azione administrativa";
    $cmr->email["message"] = "".$cmr->translate["sistem administrator"]."  (" . $cmr->get_user("auth_email") . ")\n\n\n  ".$cmr->translate[" run the next action"]."  \n\nSQL : $cmr->query[0] \n";
    $cmr->email["message"] .= "\n " . $cmr->translate("thanks") . "  \n";
    $cmr->email["message"] .= "--\r\n"; // separator
    /* intestazioni addizionali */
//     $cmr->email["headers_severity"] = 3;
//     $cmr->email["headers_to"] = "" . $cmr->get_conf("cmr_admin_name") . " <" . $cmr->config["cmr_from_email"] . ">\r\n";
//     $cmr->email["headers_from"] = "" . $cmr->get_conf("cmr_admin_name") . " <" . $cmr->config["cmr_from_email"] . ">\r\n";
//     $cmr->email["headers_cc"] = "" ;//. $cmr->config["cmr_cc_name"] . " <" . $cmr->config["cmr_cc_email"] . ">\r\n";
    // $cmr->email["headers_bcc"] = "".$cmr->config["cmr_bcc_name"] ." <".$cmr->config["cmr_bcc_email"] .">\r\n";
}



// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if($on == "sql"){
    $sql = get_post("sql");
    $sql = cmr_search_replace('[\]*["]+', "\"", $sql);
    $sql = cmr_search_replace("[\]*[']+", "'", $sql);
    $cmr->post_var["sql"] = $sql;
//     $cmr->page['middle1'] = "preview_sql.php";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 $cmr->log_to_db("'" . $cmr->get_user("auth_email") . "', '" . $cmr->get_conf("cmr_table_prefix") . "ticket', '" . $cmr->get_session("id") . "' ,'" . $sql . "'");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	include_once($cmr->get_path("module") . "modules/admin/preview_sql.php");
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
}else{
    $cmr->post_var["sql"] = "SELECT $query_column FROM $query_where_column ";
//     $cmr->post_var["sql"] .= " '$query_where_value' ";
    $cmr->post_var["sql"] .= " GROUP BY $query_group_by_column $query_group_by_order ";
    $cmr->post_var["sql"] .= " HAVING $query_having_column = '$query_having_value' ";
    $cmr->post_var["sql"] .= " ORDER BY $query_order_by_column $query_order_by_order";
//    $cmr->post_var["sql"] .= " LIMIT $query_limit1, $query_limit2;";
	}
?>
