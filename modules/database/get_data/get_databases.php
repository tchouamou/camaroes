<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * get_database.php
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */
/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */

/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.










get_database.php, Ver 3.03 
*/

/**
 * Information about
 * $cmr->post_var["sql"] Is used for keeping
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
// case "database"://When Working in data send by  form [database.php]
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->config = $cmr->include_conf($cmr->get_path("module") . "modules/database/conf.d/conf_table.ini", $cmr->config, "var");
include_once($cmr->get_path("module") . "modules/database/function/func_table.php");
include_once($cmr->get_path("module") . "modules/database/class/class_table.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

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
if(empty($cmr->post_var["current_dbms"])) $cmr->post_var["current_dbms"] = $cmr->get_conf("db_type");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$qr = new class_database($cmr->config, $cmr->user, $cmr->action, $database_conn);
$qr->return_type = "array";
$qr->db_connection = $database_conn;
       
$qr->action = get_post("action");
$qr->sql = get_post("sql");

$qr->host = $cmr->db["db_host"];
$qr->user = $cmr->db["db_user"];
$qr->pw = $cmr->db["db_pw"];
       
$qr->row = get_post("row");
$qr->index = get_post("index");
$qr->name = get_post("name");
       
$qr->db = get_post("new_db");
$qr->table = get_post("table");
$qr->field = get_post("field");
       
$qr->type = get_post("type");
$qr->select = get_post("localhost");
$qr->from = get_post("select");
$qr->where = get_post("where");
$qr->group = get_post("group");
$qr->like = get_post("like");
$qr->order = get_post("order");
$qr->limit = get_post("limit");



$qr->cmr_config = $cmr->config;
$qr->cmr_user = $cmr->user;
$qr->cmr_action = $cmr->action;
$qr->prefix = "";
$qr->where_query = "1";	
$qr->list_group = $cmr->user["auth_list_group"];
$qr->email = $cmr->user["auth_email"];
$qr->send_date = date("d-m-Y H:i:s");
$qr->language = $cmr->page["language"];
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$action = get_post("db_action");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

switch ($action){                                  
    case "insert_element":
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$array_val = array();
	$the_columns = get_all_columns($database_conn, "", $database . "." . $table_name);
	foreach($the_columns as $one_columns) $all_columns[0][] = $one_columns["Field"];
	$all_columns[1] = $the_columns;
	
	$array_columns = $all_columns[0];
	foreach($array_columns as $key => $value) $array_val[$value] = get_post($value, "post", "");
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$cmr->post_var["sql"] = cmr_query_insert($array_val, $database . "." . $table_name, $qr->where_query);
    break;
    
    case "update_element":
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$array_val = array();
	$the_columns = get_all_columns($database_conn, "", $database . "." . $table_name);
	foreach($the_columns as $one_columns) $all_columns[0][] = $one_columns["Field"];
	$all_columns[1] = $the_columns;
	
	$array_columns = $all_columns[0];
	foreach($array_columns as $key => $value) $array_val[$value] = get_post($value, "post", "");
	$column_id = column_id($all_columns[1]);
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$cmr->post_var["sql"] =  cmr_query_update($array_val, $column_id, $column_id, $database . "." . $table_name, $qr->where_query);
    break;
    
    case "search_element":
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$array_val = array();
	$array_func = array();
	$the_columns = get_all_columns($database_conn, "", $database . "." . $table_name);
	foreach($the_columns as $one_columns) $all_columns[0][] = $one_columns["Field"];
	$all_columns[1] = $the_columns;
	
	$array_columns = $all_columns[0];
	foreach($array_columns as $key => $value){
		$array_val[$value] = get_post($value, "post", "");
	    $array_func[$value] = get_post("func_" . $value, "post"); //Getting variable [$array_func["@_column_@"]] sended by form search_table.php]
	}
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$cmr->post_var["sql"] = cmr_query_search($array_val, $array_func, $database . "." . $table_name, $qr->where_query);
    break;
    
    case "delete_element":
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$array_val = array();
	$the_columns = get_all_columns($database_conn, "", $database . "." . $table_name);
	foreach($the_columns as $one_columns) $all_columns[0][] = $one_columns["Field"];
	$all_columns[1] = $the_columns;
	
	$array_columns = $all_columns[0];
	foreach($array_columns as $key => $value) $array_val[$value] = get_post($value, "post", "");
	$column_id = column_id($all_columns[1]);
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$cmr->post_var["sql"] = cmr_query_search($array_val, $array_func, $database . "." . $table_name, $qr->where_query);
    break;
    
//     case "variables":
// //      $sql_query = "SHOW VARIABLES;";
// 		$cmr->post_var["sql"] = $qr->get_query("variables");
//     break;                                      
//     case "status":
// //      $sql_query = "SHOW STATUS;";      
// 		$cmr->post_var["sql"] = $qr->get_query("status");
//     break;
//     case "processlist":
// //      $sql_query = "SHOW PROCESSLIST;";
// 		$cmr->post_var["sql"] = $qr->get_query("processlist");
//     break;                                        
//     case "privileges":
// //      $sql_query = "SHOW PRIVILEGES;";
// 		$cmr->post_var["sql"] = $qr->get_query("privileges");
//     break;                                        
//     case "version":
// //      $sql_query = "SELECT VERSION();";  
// 		$cmr->post_var["sql"] = $qr->get_query("version");
//     break;                                        
//     case "date":
// //      $sql_query = "SELECT NOW();";         
// 		$cmr->post_var["sql"] = $qr->get_query("date");
//     break;                                        
//     case "flush_status":
// //      $sql_query = "FLUSH STATUS;"; 
// 		$cmr->post_var["sql"] = $qr->get_query("flush_status");
//     break;                                        
//     case "show_engines":
// //      $sql_query = "SHOW ENGINES;"; 
// 		$cmr->post_var["sql"] = $qr->get_query("show_engines");
//     break;                                        
//     case "show_character":
// //      $sql_query = "SHOW CHARACTER SET" . $like . ";";
// 		$cmr->post_var["sql"] = $qr->get_query("show_character");
//     break;                                        
//     case "show_warnings":
// //      $sql_query = "SHOW WARNINGS;";
// 		$cmr->post_var["sql"] = $qr->get_query("show_warnings");
//     break;                                        
// 
//     case "show_databases":
// //      $sql_query = "SHOW " . $like . " DATABASES;";
// 		$cmr->post_var["sql"] = $qr->get_query("show_databases");
//     break;
//     case "show_create_database":
// //      $sql_query = "SHOW CREATE DATABASE " . $db . ";";
// 		$cmr->post_var["sql"] = $qr->get_query("show_create_database");
//     break;
//     case "create_database":
// //      $sql_query = "CREATE DATABASE " . $db . ";";
// 		$cmr->post_var["sql"] = $qr->get_query("create_database");
//     break;
//     case "drop_databases":
// //      $sql_query = "DROP DATABASES " . $if_exists . $db . ";";
// 		$cmr->post_var["sql"] = $qr->get_query("drop_databases");
//     break;
// 
//     case "show_create_table":
// //      $sql_query = "SHOW CREATE TABLE " . $db . "." . $table . ";";
// 		$cmr->post_var["sql"] = $qr->get_query("show_create_table");
//     break;
//     case "create_table":
//      $sql_query = "CREATE TABLE" . $db . "." . $table . ";";
// 		$cmr->post_var["sql"] = $qr->get_query("create_table");
//     break;
//     case "create_view":
// //      $sql_query = "CREATE TEMPORARY TABLE " . $db . "." . $table . ";";
// 		$cmr->post_var["sql"] = $qr->get_query("create_view");
//     break;
//     case "create_index":
// //      $sql_query = "INDEX  " . $name . " ( " . $field . " , " . $field . "  )";
// 		$cmr->post_var["sql"] = $qr->get_query("create_index");
//     break;
//     case "add_field":
// //      $sql_query = "ALTER TABLE " . $db . "." . $table . " ADD " . $field . " " . $type . ";";
// 		$cmr->post_var["sql"] = $qr->get_query("add_field");
//     break;                                                                    
//     case "add_key":
// //      $sql_query = "ALTER TABLE " . $db . "." . $table . " ADD PRIMARY KEY (" . $field . ", " . $field . ")";
// 		$cmr->post_var["sql"] = $qr->get_query("add_key");
//     break;                                                                    
//     case "add_unique":
// //      $sql_query = "ALTER TABLE " . $db . "." . $table . " ADD UNIQUE  " . $name . "_ (" . $field . ", " . $field . ");";
// 		$cmr->post_var["sql"] = $qr->get_query("add_unique");
//     break;                                                                    
//     case "show_index":
// //      $sql_query = "SHOW INDEX FROM " . $db . "." . $table . "; "; 
// 		$cmr->post_var["sql"] = $qr->get_query("show_index");
//     break;
//     case "show_tables":
// //      $sql_query = "SHOW TABLES FROM " . $db . "; ";
// 		$cmr->post_var["sql"] = $qr->get_query("show_tables");
//     break;
//     case "show_tables_status":
// //      $sql_query = "SHOW TABLE STATUS " . $from . " " . $db . " " . $like . ";";
// 		$cmr->post_var["sql"] = $qr->get_query("show_tables_status");
//     break;
//     case "show_columns":
// //      $sql_query = "EXPLAIN " . $db . "." . $table . " " . $like . ";";
// 		$cmr->post_var["sql"] = $qr->get_query("show_columns");
//     break;
//     case "show_rows":
// //      $sql_query = "SELECT " . $field . " FROM " . $db . "." . $table . " " . $like . ";";
// 		$cmr->post_var["sql"] = $qr->get_query("show_rows");
//     break;
//     case "drop_table":
// //      $sql_query = "DROP TABLE " . $table . " FROM " . $db . "";
// 		$cmr->post_var["sql"] = $qr->get_query("drop_table");
//     break;
//     case "drop_index":
// //      $sql_query = "ALTER TABLE " . $db . "." . $table . " DROP INDEX " . $index . "";
// 		$cmr->post_var["sql"] = $qr->get_query("drop_index");
//     break;
//     case "analyse":
// //      $sql_query = "SELECT * FROM " . $db . "." . $table . " PROCEDURE ANALYSE()";
// 		$cmr->post_var["sql"] = $qr->get_query("analyse");
//     break;
//     case "repair":
// //      $sql_query = "REPAIR TABLE " . $db . "." . $table . ";";
// 		$cmr->post_var["sql"] = $qr->get_query("repair");
//     break;
//     case "check":
// //      $sql_query = "CHECK TABLE " . $db . "." . $table . ";";
// 		$cmr->post_var["sql"] = $qr->get_query("check");
//     break;
//     case "lock":
// //      $sql_query = "LOCK TABLE " . $db . "." . $table . ";";
// 		$cmr->post_var["sql"] = $qr->get_query("lock");
//     break;
//     case "unlock":
// //      $sql_query = "UNLOCK TABLE " . $db . "." . $table . ";";
// 		$cmr->post_var["sql"] = $qr->get_query("unlock");
//     break;
//     case "explain_select":
// //      $sql_query = "EXPLAIN " . $select . ";";
// 		$cmr->post_var["sql"] = $qr->get_query("explain_select");
//     break;
//     case "optmize":
// //      $sql_query = "OPTIMIZE " . $db . "." . $table . ";";
// 		$cmr->post_var["sql"] = $qr->get_query("optmize");
//     break;
//     case "drop_field":
// //      $sql_query = "ALTER TABLE " . $db . "." . $table . " DROP " . $field . ";";
// 		$cmr->post_var["sql"] = $qr->get_query("drop_field");
//     break;
//     case "rename_tables":
// //      $sql_query = "ALTER TABLE " . $db . "." . $table . " RENAME " . $name . ";";
// 		$cmr->post_var["sql"] = $qr->get_query("rename_tables");
//     break;
//     case "add_index":
// //      $sql_query = "ALTER TABLE " . $db . "." . $table . " ADD INDEX " . $index . "";
// 		$cmr->post_var["sql"] = $qr->get_query("add_index");
//     break;
//     case "change_field_type":
// //      $sql_query = "ALTER TABLE " . $db . "." . $table . " MODIFY " . $field . " " . $new_field . " " . $new_type . ";";
// 		$cmr->post_var["sql"] = $qr->get_query("change_field_type");
//     break;
//     case "new_default":
// //      $sql_query = "ALTER TABLE " . $db . "." . $table . " ALTER " . $field . " " . $new_field . " " . $new_type . ";";
// 		$cmr->post_var["sql"] = $qr->get_query("new_default");
//     break;
//     case "change_default":
// //      $sql_query = "ALTER TABLE " . $db . "." . $table . " ALTER " . $field . " " . $new_field . " " . $new_type . ";";
// 		$cmr->post_var["sql"] = $qr->get_query("change_default");
//     break;
//                                                                                                                                  
//     case "select_file":
// //      $sql_query = "SELECT " . $from . " FROM " . $db . "." . $table . " INTO OUTFILE " . $file . " FIELD TERMINATE BY " . $separator . ";";
// 		$cmr->post_var["sql"] = $qr->get_query("select_file");
//     break;
//     case "load_data" : $sql_query = "LAOD DATA LOCAL INFILE " . $file . " " . $option . " into table " . $db . "." . $table . " FIELD TERMINATE BY " . $separator . ";";
// 		$cmr->post_var["sql"] = $qr->get_query("load_data");
//     break;
//                                                                                                 
//     case "grant":
// //      $sql_query = "GRANT PRIVILEGE " . $privilege . " ON " . $db . "." . $table . " TO " . $user . " " . $with . ";";
// 		$cmr->post_var["sql"] = $qr->get_query("grant");
//     break;                                                                                  
//     case "revoke":
// //      $sql_query = "REVOKE PRIVILEGE " . $privilege . " ON " . $db . "." . $table . " FROM " . $user . " " . $with . ";";
// 		$cmr->post_var["sql"] = $qr->get_query("revoke");
//     break;                                                                                  
//                                                                         
//     case "insert":
// //      $sql_query = "INSERT INTO " . $db . "." . $table . " VALUE (" . $data . ", " . $field . "),... ";
// 		$cmr->post_var["sql"] = $qr->get_query("insert");
//     break;                                                          
//     case "replace":
// //      $sql_query = "REPLACE INTO " . $db . "." . $table . " VALUE (" . $data . ", " . $field . "),... ";
// 		$cmr->post_var["sql"] = $qr->get_query("replace");
//     break;                                   
//     case "update":
// //      $sql_query = "UPDATE " . $low_severity . "  " . $db . "." . $table . " SET  " . $field . " " . $new_field . " " . $new_type . " " . $where . ";";
// 		$cmr->post_var["sql"] = $qr->get_query("update");
//     break;                                                                              
//     case "delete":
// //      $sql_query = "DETELE " . $low_severity . " FROM " . $db . "." . $table . " WHERE " . $field . " " . $new_field . " " . $new_type . ";";
// 		$cmr->post_var["sql"] = $qr->get_query("delete");
//     break;                          
// 
//     case "alter_select":
// //      $sql_query = "SELECT FROM " . $db . "." . $table . "." . $field . " ALTER " . $field . " " . $new_field . " " . $new_type . " WHERE " . $where . ";";
// 		$cmr->post_var["sql"] = $qr->get_query("alter_select");
//     break;
// 
//     case "select":
// //         if(empty($field)) $field = "*";
// //      $sql_query = "SELECT " . $field . " FROM " . $table . " WHERE " . $where . " " . $order . " ;";
// 		$cmr->post_var["sql"] = $qr->get_query("select");
//     break;
// 
//     case "select":
    default:
		$cmr->post_var["sql"] = $qr->get_query($action);
    break;
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->log_to_db("'" . $cmr->get_user("auth_email") . "', '" . $qr->db . "." . $qr->prefix . $qr->table . "." . $qr->field . "." . $qr->db . "', '" . $action . "'");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
/*
Creating the appropriate Message to be send to the administrator
*/

/* intestazioni addizionali per l'email*/


/*
Select next module who will trait these var
*/


// -----------------------------------------------------
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
switch ($action){                                  
    case "add_field":
    case "add_columns":
    case "create_table":
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$cmr->page["middle1"] = $cmr->get_path("module") . "modules/database/update_column.php";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    break;


    default:
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$cmr->page["middle1"] = $cmr->get_path("module") . "modules/database/result_sql.php";
	$cmr->page["middle2"] = $cmr->get_module("path");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    break;
}

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
