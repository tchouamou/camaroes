<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * get_search_table.php
 * ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */
/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */

/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























get_search_table.php, Ver 3.03 
*/

/**
 * Information about
 * $cmr->post_var["sql_table"] and $cmr->post_var["sql"] Is used for keeping
 * the query string you will be run in the module view_search.php
 *
 * $cmr->post_var["search_text"] Is used for keeping
 * the string value off the text to search
 */
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once("camaroes_class.php");
include_once("common_begin.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// case "search_table"://When Working in data send by  form [search_table.php]
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->config = $cmr->include_conf($cmr->get_path("module") . "modules/database/conf.d/conf_table.ini", $cmr->config, "var");
include_once($cmr->get_path("module") . "modules/database/function/func_table.php");
include_once($cmr->get_path("module") . "modules/database/class/class_table.php");
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
// -----------------------------------------------------
$c = new table_class();

// $c->set_cmr_prefix($cmr->get_conf("cmr_table_prefix"));
$c->set_cmr_email($cmr->get_user("auth_email"));
$c->set_cmr_group($cmr->get_user("auth_group"));
$c->set_cmr_type($cmr->get_user("auth_type"));
$c->set_cmr_list_group($cmr->get_user("auth_list_group"));

$c->set_cmr_config($cmr->config);
$c->set_cmr_user($cmr->user);

$c->array_columns = $array_columns;
$c->column_id = $column_id;
$c->database = $cmr->post_var["current_database"];
$c->table_name = $cmr->post_var["current_table"];
// -----------------------------------------------------
$c->get_form_datas("post", "");//Getting variables sended by form [search_table.php]
// -----------------------------------------------------
	foreach($array_columns as $key => $value){
		$array_func["$value"]=get_post("func_" . $value, "post"); //Getting variable [$array_func["@_column_@"]] sended by form search_table.php]
    }

$cmr->post_var["sql_table"] = "table";
$cmr->post_var["search_text"] = "";

/**
*Creating the appropriate SQL string for  searching in table
**/
$cmr->post_var["sql_table"] = "";

$cmr->query[0]  = $c->query_search($array_func);


// $cmr->post_var["sql_table"] = $str_search;
$cmr->post_var["sql_table"] = $cmr->query[0];

	foreach($array_columns as $key => $value){
		$cmr->post_var["search_text"] .= "<b>" . $value . "</b>=" . $c->array_val[$value] . "; ";
    }

$cmr->post_var["sql"] = $cmr->post_var["sql_table"];
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->log_to_db("'" . $cmr->get_user("auth_email") . "', '" . $cmr->config["cmr_table_prefix"] . "table', '" . $cmr->get_session("id") . "' ,'search'");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

/**
*Creating the appropriate notification Message to be send to the administrator group
**/
$file_list = array();
$file_list[] = $cmr->user["auth_user_path"] . "templates/notify/notify_search_table" . $cmr->get_ext("notify");
$file_list[] = $cmr->user["auth_group_path"] . "templates/notify/notify_search_table" . $cmr->get_ext("notify");
$file_list[] = $cmr->get_path("notify") . "modules/database/templates/notify/" . $cmr->get_page("language") . "/notify_search_table" . $cmr->get_ext("notify");
// $file_list[] = $cmr->get_path("notify") . "modules/database/templates/notify/" . $cmr->get_page("language") . "/auto/notify_search_table" . $cmr->get_ext("notify"); 
// $file_list[] = $cmr->get_path("notify")  ."templates/notify/auto/notify_search_table" . $cmr->get_ext("notify");
$templates_notify=cmr_good_file($file_list);

$cmr->notify = $cmr->load_notify($templates_notify);
if(($cmr->get_conf("log_to_page_table"))) $cmr->output[0] = $cmr->notify["to_page"];
if(($cmr->get_conf("log_to_log_table"))) $cmr->output[1] = $cmr->notify["to_log"];
if(($cmr->get_conf("log_to_email_table"))) $cmr->email = $cmr->notify["to_email"];
if(($cmr->get_conf("log_to_db_table")));
// if(($cmr->get_conf("log_to_sms_table")));
// if(($cmr->get_conf("log_to_flux_table")));
// if(($cmr->get_conf("log_to_rss_table")));
// if(($cmr->get_conf("log_to_other_table")));




/*
Select next module who will trait these var
*/
// $c->close();

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// -----------------------------------------------------
$cmr->page["middle1"] = $cmr->get_path("module") . "modules/view_search.php";
$cmr->page["middle2"] = $cmr->get_module("path");
// include_once($cmr->get_path("module") . "modules/view_search.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
