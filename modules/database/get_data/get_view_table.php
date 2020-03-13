<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * get_view_table.php
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */
/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */

/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.


get_view_table.php, Ver 3.03   mbretter Exp $
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
/*
case "view_table"://When Working in data send by  form [view_table.php]
*/
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$database = $cmr->post_var["current_database"];
$table_name = $cmr->post_var["current_table"];
$cmr->action["table_name"] = $cmr->post_var["current_table"];
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(empty($database_conn)) $database_conn = NULL;
$database_conn = database_connect($cmr->db_connection, $database_conn, $cmr->db);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$val_table = array();
if(empty($cmr->post_var["current_dbms"])) $cmr->post_var["current_dbms"] = $cmr->get_conf("db_type");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$the_columns = get_all_columns($database_conn, "", $database . "." . $table_name);
foreach($the_columns as $one_columns) $all_columns[0][] = $one_columns["Field"];
$all_columns[1] = $the_columns;

$array_columns = $all_columns[0];
$column_id = column_id($all_columns[1]);
$date_time1 = column_date_time($all_columns[1]);
$val_table["_column_id_"] = $column_id;
$val_table["_date_time1"] = $date_time1;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->config = $cmr->include_conf($cmr->get_path("module") . "modules/database/conf.d/conf_table.ini", $cmr->config, "var");
include_once($cmr->get_path("module") . "modules/database/function/func_table.php");
include_once($cmr->get_path("module") . "modules/database/class/class_table.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// -----------------------------------------------------
// -----------------------------------------------------
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// -----------------------------------------------------
$check_action = get_post("check_action");
$num_view = get_post("num_view");

$array_check = array();
$list_check.="''";
// -----------------------------------------------------
// -----------------------------------------------------
$count=0;
while($count <= $num_view){
 $count++;
 $val_check = get_post("table_check_" . $count);
	if(strlen($val_check)){
  		$list_check.=", '" . cmrdb_real_escape_string($val_check) . "'";
  		$array_check[] = cmrdb_real_escape_string($val_check);
		}
}
// -----------------------------------------------------
// -----------------------------------------------------



/*
Creating the appropriate SQL string for  table
*/
switch ($check_action){
    case "delete";
			// -----------------------------------------------------
			if(get_post('id_table', 'post', $cmr->session['pre_match'])){
			    $c->id_table = get_post('id_table');
			    $c->set_id_table(get_post('id_table', 'post', $cmr->session['pre_match']));
				$cmr->query[0]  = $c->query_delete(get_post('id_table'));
			}
			/**
			*Creating the appropriate SQL string for  delete_table
			*$cmr->query[0] = "delete from  " . $cmr->config["cmr_table_prefix"] . "table  where  @_column_id_@ = '$c->id';";
			**/
			// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// 			$cmr->log_to_db("'" . $cmr->get_user("auth_email") . "', '" . $cmr->config["cmr_table_prefix"] . "table', '" . $c->id_table . "' ,'delete'");
			// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        break;


        case "policy":
		$cmr->output[0] = code_link($cmr->config, $cmr->page, $cmr->language, "modules/new_policy.php?table_name=" . $table_name . "&line_id=" . $list_check, "", $cmr->translate(" Click here to continue "), "", "", "", " class=\"link\" ");
		$cmr->page["middle1"] = $cmr->get_path("index") . "system/run_result.php";
        break;
        
        case "comment":
		$cmr->output[0] = code_link($cmr->config, $cmr->page, $cmr->language, "modules/new_comment.php?table_name=" . $table_name . "&line_id=" . $list_check, "", $cmr->translate(" Click here to continue "), "", "", "", " class=\"link\" ");
		$cmr->page["middle1"] = $cmr->get_path("index") . "system/run_result.php";
        break;

	    case "select":
	    case "view":
	    case "print":
	    case "filter":
// 	    $cmr->page["middle1"] = $cmr->get_path("module") . "modules/admin/preview_sql.php";
		// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		$file_list = array();
		$file_list[] = $cmr->get_path("module") . "modules/database/view_table.php";
		
		$file_path = cmr_good_file($file_list);
		if(file_exists($file_path)) $cmr->page["middle1"] = $file_path;
		// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        break;
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->log_to_db("'" . $cmr->get_user("auth_email") . "', '" . $cmr->config["cmr_table_prefix"] . "table', '" . $list_check . "', '" . $check_action . "'");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

/*
Creating the appropriate notification Message to be send to the administrator group
*/
$file_list = array();
$file_list[] = $cmr->user["auth_user_path"] . "templates/notify/notify_view_table" . $cmr->get_ext("notify");
$file_list[] = $cmr->user["auth_group_path"] . "templates/notify/notify_view_table" . $cmr->get_ext("notify");
$file_list[] = $cmr->get_path("notify") . "modules/database/templates/notify/" . $cmr->get_page("language") . "/notify_view_table" . $cmr->get_ext("notify");
$templates_notify=cmr_good_file($file_list);

$cmr->notify = $cmr->load_notify($templates_notify);

if(($cmr->get_conf("log_to_page_view_table"))) $cmr->output[0] = $cmr->notify["to_page"];
if(($cmr->get_conf("log_to_log_view_table"))) $cmr->output[1] = $cmr->notify["to_log"];
if(($cmr->get_conf("log_to_email_view_table"))) $cmr->email = $cmr->notify["to_email"];
if(($cmr->get_conf("log_to_db_view_table")));
// if(($cmr->get_conf("log_to_sms_view_table")));
// if(($cmr->get_conf("log_to_flux_view_table")));
// if(($cmr->get_conf("log_to_rss_view_table")));
// if(($cmr->get_conf("log_to_other_view_table")));


/*
Select next module who will trait these var
*/

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$cmr->page["middle1"] = $cmr->get_path("index") . "system/run_result.php";
	$cmr->page["middle2"] = $cmr->get_module("path");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
