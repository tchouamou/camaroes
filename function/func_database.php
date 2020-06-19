<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * func_database.php
 * ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */
/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.






func_database.php, Ver 3.03
*/

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once(dirname(__FILE__) . "/../control.php"); //to control access in the module
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// function cmr_query_log($cmr_config = array(), $c = null, $type = "")
// function calcul_tree_group($cmr_config, $conn, $str_list)
// function list_choose($cmr_query = array(), $cmr_label = array(), $conn)
// function list_input($conn, $query = "", $column_name = "name")
// function list_select($conn, $query = "", $column_name = "name")
// function next_max_id($table = "cmr_user", $column="id")
// function return_key($conn, $table = "cmr_user",$give_column = "email", $need_column = "id", $give_value = "guest@localhost")
// function cmr_print_select($cmr_config = array(), $cmr_language = array(), $conn, $table = "cmr_user", $column = "", $action = "type", $db_name = "mysql", $col_id = "", $limit = "", $order = "", $width = "100")
// function select( $conn, $sql = "select * from cmr_user where 1", $border = "1", $cellspacing = "1", $cellpadding = "1")
// function get_all_columns($conn, $cmr_prefix, $table)
// function cmr_column_exist($column_name, $table_name, $conn)
// function cmr_readed_line($cmr_config, $cmr_user, $conn, $table_name)
// function connect_to_db(&$cmr_config, $cmr_db=array())
// function is_database($post_var = array(), $type = "table")
// function db_die(__LINE__  . " - "  . __FILE__ . ": " . $to_print = "", $config = array())
// function sql_run($return = "", $conn = "", $action = "show_databases", $sql = "select email from cmr_user", $db = "mysql", $table = "cmr_user", $field = "email", $sql_data = array())
/*=================================================================*/
if(!(function_exists("db_die"))){
function db_die($to_print = "")
{
$cmr_config["cmr_on_db_error"] = "print";
$cmr_user["authorisation"] = "0";
if((cmr_get_config("cmr_on_db_error"))) $cmr_config["cmr_on_db_error"] = cmr_get_config("cmr_on_db_error");
if((cmr_get_user("authorisation"))) $cmr_user["authorisation"] = cmr_get_user("authorisation");

if($cmr_user["authorisation"] < "5") $to_print = strstr($to_print, ":");
switch(trim($cmr_config["cmr_on_db_error"])){
   case "exit":exit;break;
   case "die":
   case "stop":die("<hr />" . $to_print."<hr />");break;
   case "install":break;
   case "logout":break;
   case "login":break;
   case "print":
   case "nothing":
   default:;
   return print("<hr />" . $to_print."<hr />");
   break;
 }
}
}
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("is_database"))){
function is_database($post_var = array(), $type = "table")
{
	switch($type){
	   case "database":
		   return (!empty($post_var["current_database"]));
	   break;

	   case "column":
		   return (!empty($post_var["current_database"])) && (!empty($post_var["current_table"])) && (!empty($post_var["current_column"]));
	   break;

	   case "table":
	   default:
		   return (!empty($post_var["current_database"])) && (!empty($post_var["current_table"]));
	   break;
	 }
 return false;
}
}
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("connect_to_db"))){
function connect_to_db($cmr_config, $cmr_db=array())
{
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//return null;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		if(($cmr_db)){
			//$conn = NewADOConnection($cmr_db["db_type"]);
			//$connected = $conn->Connect($cmr_db["db_host"], $cmr_db["db_user"], $cmr_db["db_pw"], $cmr_db["db_name"]);
			$conn = new mysqli($cmr_db["db_host"], $cmr_db["db_user"], $cmr_db["db_pw"], $cmr_db["db_name"]);
      if ($conn->connect_errno) print($conn->connect_error);
			//if(empty($connected))
			//if(($connected))
			if(($conn)){
				$cmr_config["db_type"] = $cmr_db["db_type"];
				return $conn;
			}
			//echo "<br />error: " . $conn->connect_error . "<br />";
		}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		if(($cmr_config)){
			//$conn = NewADOConnection($cmr_db["db_type"]);
			//$connected = $conn->Connect($cmr_db["db_host"], $cmr_db["db_user"], $cmr_db["db_pw"], $cmr_db["db_name"]);
			$conn = new mysqli($cmr_config["db_host"], $cmr_config["db_user"], $cmr_config["db_pw"], $cmr_config["db_name"]);
      if ($conn->connect_errno) print($conn->connect_error);
			//if(empty($connected))
			//if(($connected))
			if(($conn)) return $conn;
			//echo "<br />error: " . $conn->connect_error . "<br />";
		}

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

		if(empty($cmr_config["db_type"])) $cmr_config["db_type"] = "mysqli";
		if(empty($cmr_config["db_name"])) $cmr_config["db_name"] = "camaroes_db";
		if(empty($cmr_config["db_host"])) $cmr_config["db_host"] = "localhost";
		if(empty($cmr_config["db_user"])) $cmr_config["db_user"] = "root";
		if(empty($cmr_config["db_pw"])) $cmr_config["db_pw"] = "";

		//$conn = NewADOConnection($cmr_config["db_type"]);
		//$connected = $conn->Connect($cmr_config["db_host"], $cmr_config["db_user"], $cmr_config["db_pw"], $cmr_config["db_name"]);
		$conn = new mysqli($cmr_config["db_host"], $cmr_config["db_user"], $cmr_config["db_pw"]);
    if ($conn->connect_errno) print($conn->connect_error);
		//if(empty($connected))
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

		//if(empty($connected)) echo "<br />error: " . $conn->connect_error . "<br />";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		if($conn->connect_errno) print("<br />Database connection problem!, click <a href=\"" .  $_SERVER['PHP_SELF'] . "?cmr_mode=install_need\" > Here </a>  to correct before continue ");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		if($conn->connect_errno) db_die(__LINE__  . " - "  . __FILE__ . ": " . "<br />Database connection problem!, click <a href=\"" .  $_SERVER['PHP_SELF'] . "?cmr_mode=install_need\" > Here </a>  to correct before continue ");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// 		if(($connected)) return $conn;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

   return $conn;
}
}
/*=================================================================*/
/*=================================================================*/

if(!(function_exists("cmr_db_policy"))){
    /**
     * cmr_db_policy()
     *
     * @return
     **/
 function cmr_db_policy($cmr_config = array(), $cmr_user = array(), $cmr_action = array(), $conn = NULL)
 {
    if(empty($conn)) return 0;
    if(empty($cmr_user["authorisation"])) $cmr_user["authorisation"] = "0";
    if(empty($cmr_action["source"])) $cmr_action["source"] = "";
    if(empty($cmr_action["line"])) $cmr_action["line"] = "**";
    if(empty($cmr_action["action"])) $cmr_action["action"] = "";
    if(empty($cmr_action["table_name"])) $cmr_action["table_name"] = "policy";
    if(empty($cmr_user["auth_email"])) $cmr_user["auth_email"] = "";
    if(empty($cmr_user["auth_group"])) $cmr_user["auth_group"] = "";

    $max_id1[0] = 0;
    $max_id2[0] = 0;


    $query1 = "SELECT MAX(id) FROM " . $cmr_config["cmr_table_prefix"] . "policy";
    $query1 .= " WHERE (state='enable') OR (state='enable')";
    $query1 .= " AND (source='' or source='*' or source LIKE ('%" . $cmr_action["source"] . "%'))";
    $query1 .= " AND (table_name='' or table_name='*' or table_name LIKE ('%" . $cmr_action["table_name"] . "%'))";
    $query1 .= " AND (line_id='' or line_id='*' or line_id= '" . $cmr_action["line"] . "')";
    $query1 .= " AND (type='deny')";
    $query1 .= " AND (privilege='' or privilege='all' or privilege='*' or privilege LIKE ('%" . $cmr_action["action"] . "%'))";
    $query1 .= " AND (allow_type <= '" . $cmr_user["authorisation"] . "' or allow_email LIKE ('%" . $cmr_user["auth_email"] . "%') or allow_groups LIKE ('%" . $cmr_user["auth_group"] . "%')) ";

		if($conn) //$conn->SetFetchMode(ADODB_FETCH_NUM);
		if($conn) $rs = $conn->query($query1) or  db_die(__LINE__  . " - "  . __FILE__ . ": " . $conn->error);//$conn->ErrorMsg());
		if($rs) $max_id1 = $rs->fetch_row();

    $query2 = "SELECT MAX(id) FROM " . $cmr_config["cmr_table_prefix"] . "policy";
    $query2 .= " WHERE (state='enable') OR (state='enable')";
    $query2 .= " AND (source='' or source='*' or source LIKE ('%" . $cmr_action["source"] . "%'))";
    $query2 .= " AND (table_name='' or table_name='*' or table_name LIKE ('%" . $cmr_action["table_name"] . "%'))";
    $query2 .= " AND (line_id='' or line_id='*' or line_id= '" . $cmr_action["line"] . "')";
    $query2 .= " AND (type='allow')";
    $query2 .= " AND (privilege='' or privilege='all' or privilege='*' or privilege LIKE ('%" . $cmr_action["action"] . "%'))";
    $query2 .= " AND (allow_type <= '" . $cmr_user["authorisation"] . "' or allow_email LIKE ('%" . $cmr_user["auth_email"] . "%') or allow_groups LIKE ('%" . $cmr_user["auth_group"] . "%')) ";

		if($conn) //$conn->SetFetchMode(ADODB_FETCH_NUM);
		if(!$rs = $conn->query($query2))  db_die(__LINE__  . " - "  . __FILE__ . ": " . $conn->error);//$conn->ErrorMsg());
		if($rs) $max_id2 = $rs->fetch_row();


   if(empty($max_id1[0]) and ($max_id2[0])) return 1;
   if(($max_id2[0] > $max_id1[0])) return 1;

//    if($cmr_action["table_name"] == "groups"){
//     $query3 .= " AND name IN ('" . $cmr_user["list_group"] . "')";
// 	   }
//    if($cmr_action["table_name"] == "user"){
//     $query3 .= " AND name IN ('" . $cmr_user["list_user"] . "')";
// 	   }


	return 0;
   }
}
/*=================================================================*/
if(!(function_exists("sql_run"))){
    /**
     * sql()
     *
     * @param string $return
     * @param string $conn
     * @param string $action
     * @param string $sql
     * @param mixed $db
     * @param string $table
     * @param string $field
     * @param array $sql_data
     * @return
     **/
function  sql_run($return = "", $conn = "", $action = "show_databases", $sql = "", $db = "", $table = "", $field = "", $sql_data = array())
{
// $sql_data["limit"] = "";
// $sql_data["limit_begin"] = "";
// $sql_data["order"] = "";
// $sql_data["host"] = "localhost";
// $sql_data["user"] = "root";
// $sql_data["pw"] = "pw";
// $sql_data["index"] = "id",
// $sql_data["name"] = "",
// $sql_data["field_type"] = "",
// $sql_data["select"] = "*",
// $sql_data["from"] = "",
// $sql_data["sql_where"] = "1",
// $sql_data["like"] = "",
// $sql_data["row"] = "",
// $sql_data["group_by"] = "id",
// $sql_data["if_exists"],
// $sql_data["new_field"],
// $sql_data["new_type"],
// $sql_data["separator"],
// $sql_data["file"],
// $sql_data["option"],
// $sql_data["privilege"],
// $sql_data["user"],
// $sql_data["with"]
// $sql_data["severity"],
// $sql_data["list_value"],
// $sql_data["valid"]
// $sql_data["cmr_config"]
// $sql_data["cmr_user"]
// $sql_data["cmr_action"]
 if(empty($sql_data["limit_begin"])) $sql_data["limit_begin"] = "";
$result = null;
$sql_query = "";

 if(($action != "query") || (empty($sql_data["valid"]) && ($action == "query"))){
 if(empty($conn)){
 if(empty($sql_data["host"])) $sql_data["host"] = cmr_get_config("db_host");
 if(empty($sql_data["user"])) $sql_data["user"] = cmr_get_config("db_user");
 if(empty($sql_data["pw"])) $sql_data["pw"] = cmr_get_config("db_pw");
			//$conn = NewADOConnection(cmr_get_config("db_type"));
			//$conn->Connect($sql_data["host"], $sql_data["user"], $sql_data["pw"], $db);
			$conn = new mysqli($sql_data["host"], $sql_data["user"], $sql_data["pw"], $db);
 }

 if(empty($sql_data["cmr_config"])) $sql_data["cmr_config"] = cmr_get_config();
 if(empty($sql_data["cmr_user"])) $sql_data["cmr_user"] = cmr_get_user();
 if(empty($sql_data["cmr_action"])){
	 $prefix = "";
	 $sql_data["cmr_action"]["table_name"] = $table;
	 $prefix = $sql_data["cmr_config"]["cmr_table_prefix"];
	 if(!empty($prefix)) $sql_data["cmr_action"]["table_name"] = cmr_searchi_replace("^" . $prefix, "", $table);
	 $sql_data["cmr_action"]["column"] = "";
	 $sql_data["cmr_action"]["action"] = $action;
 }
 }
 if(empty($sql_data["valid"]) && ($conn)) $sql_data["valid"] = cmr_where_query($sql_data["cmr_config"], $sql_data["cmr_user"], $sql_data["cmr_action"], $conn);

 if(empty($sql_data["like"])) $sql_data["like"] = "";
 if(empty($sql_data["order"])) $sql_data["order"] = "";
 if(empty($sql_data["sql_where"])) $sql_data["sql_where"] = " (1) ";
 $sql_data["sql_where"] = $sql_data["sql_where"] . " AND " . $sql_data["valid"];

 switch ($action){
     case "variables" : $sql_query = "SHOW VARIABLES;";
  break;
     case "status" : $sql_query = "SHOW STATUS;";
  break;
     case "processlist" : $sql_query = "SHOW PROCESSLIST;";
  break;
     case "privileges" : $sql_query = "SHOW PRIVILEGES;";
  break;
     case "version" : $sql_query = "SELECT VERSION();";
  break;
     case "date" : $sql_query = "SELECT NOW();";
  break;
     case "flush_status" : $sql_query = "FLUSH STATUS;";
  break;
     case "show_engines" : $sql_query = "SHOW ENGINES;";
  break;
     case "show_character" : $sql_query = "SHOW CHARACTER SET" . $sql_data["like"] . ";";
  break;
     case "show_warnings" : $sql_query = "SHOW WARNINGS;";
  break;

     case "show_databases" : $sql_query = "SHOW " . $sql_data["like"] . " DATABASES;";
  break;
     case "show_create_database" : $sql_query = "SHOW CREATE DATABASE " . $db . ";";
  break;
     case "create_database" : $sql_query = "CREATE DATABASE " . $db . ";";
  break;
     case "drop_databases" : $sql_query = "DROP DATABASES " . $sql_data["if_exists"] . $db . ";";
  break;

     case "show_create_table" : $sql_query = "SHOW CREATE TABLE " . $db . "." . $table . ";";
  break;
     case "create_table" : $sql_query = "CREATE TABLE" . $db . "." . $table . ";";
  break;
     case "create_view" : $sql_query = "CREATE TEMPORARY TABLE " . $db . "." . $table . ";";
  break;

     case "create_index" : $sql_query = "INDEX  " . $sql_data["name"] . " ( " . $sql_data["field_list"] . "  )";
  break;
     case "add_field" : $sql_query = "ALTER TABLE " . $db . "." . $table . " ADD " . $field . " " . $sql_data["field_type"] . ";";
  break;
     case "add_key" : $sql_query = "ALTER TABLE " . $db . "." . $table . " ADD PRIMARY KEY (" . $sql_data["field_list"] . ")";
  break;
     case "add_unique" : $sql_query = "ALTER TABLE " . $db . "." . $table . " ADD UNIQUE  " . $sql_data["name"] . " (" . $sql_data["field_list"] . ");";
  break;
     case "show_index" : $sql_query = "SHOW INDEX FROM " . $db . "." . $table . "; ";
  break;
     case "show_tables" : $sql_query = "SHOW TABLES FROM " . $db . "; ";
  break;
     case "show_tables_status" : $sql_query = "SHOW TABLE STATUS " . $sql_data["from"] . " " . $db . " " . $sql_data["like"] . ";";
  break;
     case "show_columns" : $sql_query = "EXPLAIN " . $db . "." . $table . " " . $sql_data["like"] . ";";
  break;
     case "show_rows" : $sql_query = "SELECT " . $field . " FROM " . $db . "." . $table . " " . $sql_data["like"] . ";";
  break;
     case "drop_table" : $sql_query = "DROP TABLE " . $table . " FROM " . $db . "";
  break;
     case "drop_index" : $sql_query = "ALTER TABLE " . $db . "." . $table . " DROP INDEX " . $sql_data["index"] . "";
  break;
     case "analyse" : $sql_query = "SELECT * FROM " . $db . "." . $table . " PROCEDURE ANALYSE()";
  break;
     case "repair" : $sql_query = "REPAIR TABLE " . $db . "." . $table . ";";
  break;
     case "check" : $sql_query = "CHECK TABLE " . $db . "." . $table . ";";
  break;
     case "lock" : $sql_query = "LOCK TABLE " . $db . "." . $table . ";";
  break;
     case "unlock" : $sql_query = "UNLOCK TABLE " . $db . "." . $table . ";";
  break;
     case "explain_select" : $sql_query = "EXPLAIN " . $sql_data["select"] . ";";
  break;
     case "optmize" : $sql_query = "OPTIMIZE " . $db . "." . $table . ";";
  break;
     case "drop_field" : $sql_query = "ALTER TABLE " . $db . "." . $table . " DROP " . $field . ";";
  break;
     case "rename_tables" : $sql_query = "ALTER TABLE " . $db . "." . $table . " RENAME " . $sql_data["name"] . ";";
  break;
     case "rename_table" : $sql_query = "RENAME TABLE " . $db . "." . $table . " TO " . $sql_data["name"] . ";";
  break;
     case "add_index" : $sql_query = "ALTER TABLE " . $db . "." . $table . " ADD INDEX " . $sql_data["index"] . "";
  break;
     case "change_field_type" : $sql_query = "ALTER TABLE " . $db . "." . $table . " MODIFY " . $field . " " . $sql_data["new_field"] . " " . $sql_data["new_type"] . ";";
  break;
     case "new_default" : $sql_query = "ALTER TABLE " . $db . "." . $table . " ALTER " . $field . " " . $sql_data["new_field"] . " " . $sql_data["new_type"] . ";";
  break;
     case "change_default" : $sql_query = "ALTER TABLE " . $db . "." . $table . " ALTER " . $field . " " . $sql_data["new_field"] . " " . $sql_data["new_type"] . ";";
  break;

     case "select_file" : $sql_query = "SELECT " . $sql_data["from"] . " FROM " . $db . "." . $table . " INTO OUTFILE " . $sql_data["file"] . " FIELD TERMINATE BY " . $sql_data["separator"] . ";";
  break;
     case "load_data" : $sql_query = "LAOD DATA LOCAL INFILE " . $sql_data["file"] . " " . $sql_data["option"] . " into table " . $db . "." . $table . " FIELD TERMINATE BY " . $sql_data["separator"] . ";";
  break;

     case "create_user" : $sql_query = "CREATE USER " . $sql_data["user"] . " " . $sql_data["with"] . ";";
  break;
     case "drop_user" : $sql_query = "DROP USER " . $sql_data["user"] . ";";
  break;
     case "rename_user" : $sql_query = "RENAME USER " . $sql_data["user"] . " TO " . $sql_data["with"] . ";";
  break;
     case "set_password" : $sql_query = "SET PASSWORD " . $sql_data["user"] . " = {" . $sql_data["with"] . "};";
  break;
     case "grant" : $sql_query = "GRANT PRIVILEGE " . $sql_data["privilege"] . " ON " . $db . "." . $table . " TO " . $sql_data["user"] . " " . $sql_data["with"] . ";";
  break;
     case "revoke" : $sql_query = "REVOKE PRIVILEGE " . $sql_data["privilege"] . " ON " . $db . "." . $table . " FROM " . $sql_data["user"] . " " . $sql_data["with"] . ";";
  break;
     case "revoke_all" : $sql_query = "REVOKE ALL PRIVILEGES, GRANT OPTION FROM " . $sql_data["privilege"] . " " . $sql_data["user"] . ";";
  break;
     case "insert" : $sql_query = "INSERT INTO " . $db . "." . $table . " VALUE (" . $sql_data["list_value"] . ")";
  break;
     case "replace" : $sql_query = "REPLACE INTO " . $db . "." . $table . " VALUE (" . $sql_data["list_value"] . ")";
  break;
     case "update" : $sql_query = "UPDATE " . $sql_data["severity"] . "  " . $db . "." . $table . " SET  " . $field . " " . $sql_data["new_field"] . " " . $sql_data["new_type"] . " WHERE " . $sql_data["sql_where"] . ";";
  break;
     case "delete" : $sql_query = "DETELE " . $sql_data["severity"] . " FROM " . $db . "." . $table . " WHERE " . $sql_data["sql_where"] . $field . " " . $sql_data["new_field"] . " " . $sql_data["new_type"] . ";";
  break;

     case "alter_select" : $sql_query = "SELECT FROM " . $db . "." . $table . "." . $field . " ALTER " . $field . " " . $sql_data["new_field"] . " " . $sql_data["new_type"] . " WHERE " . $sql_data["sql_where"] . ";";
  break;

     case "select":
	     if(empty($field)) $field = "*";
	     $sql_query = "SELECT " . $field . " FROM " . $table . " WHERE " . $sql_data["sql_where"] . " " . $sql_data["order"];
  break;

     case "sql":
     case "query":
     default : if(!empty($sql_data["valid"])) $sql_query = $sql;
  break;
 }
/*=================================================================*/
/*=================================================================*/
 switch ($action){
     case "update":
     case "alter_select":
     case "select":
     default :
		if(empty($sql_data["valid"])) $sql_query = "";
     break;
 }
/*=================================================================*/
/*=================================================================*/

 $i = 0;
 // print($sql_query;exit);
 if(($return == "query") || ($return == "sql")){
     //  @@@@@@@@@@@@@@@@@ return a query string @@@@@@@@@@@@@@@@@@@@@@@
     $result = $sql_query;
 } elseif($return == "text"){
     //  @@@@@@@@@@@@@@@@@ return a text result @@@@@@@@@@@@@@@@@@@@@@@
	if($conn){
	if(empty($sql_data["limit"])) {
		/*$rs = $conn->Execute*/ if(!($rs = $conn->query($sql_query))) db_die(__LINE__  . " - "  . __FILE__ . ": " . $conn->error);//$conn->ErrorMsg());
		}else{
		$rs = $conn->query($sql_query); // $sql_data["limit"], $sql_data["limit_begin"]) or  db_die(__LINE__  . " - "  . __FILE__ . ": " . $conn->error);//$conn->ErrorMsg());
	}
	}
	if($rs) while ($sql_data = $rs->fetch_row()){
  foreach($sql_data as $key => $v){
      $res1[$key][$i] = $v;
  }
  $i++;
//   $rs->MoveNext();
     }
     $res2 = implode(";", $res1);
     $result = implode(", ", $res2);
 } elseif($return == "object"){
     //  @@@@@@@@@@@@@@@@@ return an object result @@@@@@@@@@@@@@@@@@@@@@@
	if($conn){
	if(empty($sql_data["limit"])) {
		/*$rs = $conn->Execute*/ if(!($rs = $conn->query($sql_query))) db_die(__LINE__  . " - "  . __FILE__ . ": " . $conn->error);//$conn->ErrorMsg());
		}else{
		$rs = $conn->query($sql_query); // $sql_data["limit"], $sql_data["limit_begin"]) or  db_die(__LINE__  . " - "  . __FILE__ . ": " . $conn->error);//$conn->ErrorMsg());
	}
	}
     $result = array(); /*$s->fetch_object()*/
    if($rs)  while ($result[$i] = $rs->fetch_object()){
  $i++;
//   $rs->MoveNext();
     }
 } elseif($return == "array_assoc"){
     //  @@@@@@@@@@@@@@@@@ return an array assoc @@@@@@@@@@@@@@@@@@@@@@@
		if($conn)
     //$conn->SetFetchMode(ADODB_FETCH_ASSOC);
	if($conn){
	if(empty($sql_data["limit"])) {
		/*$rs = $conn->Execute*/ if(!($rs = $conn->query($sql_query))) db_die(__LINE__  . " - "  . __FILE__ . ": " . $conn->error);//$conn->ErrorMsg());
		}else{
		$rs = $conn->query($sql_query); // $rs = $conn->SelectLimit($sql_query, $sql_data["limit"], $sql_data["limit_begin"]) or  db_die(__LINE__  . " - "  . __FILE__ . ": " . $conn->error);//$conn->ErrorMsg());
	}
	}
     $result = array();
     if($rs) while ($result[$i] = $rs->fetch_assoc()){
  $i++;
//   $rs->MoveNext();
     }
 } elseif($return == "result"){
     //  @@@@@@@@@@@@@@@@@ return an object result @@@@@@@@@@@@@@@@@@@@@@@
	if($conn){
	if(empty($sql_data["limit"])) {
	     //print("<br />" . $sql_query);
		/*$rs = $conn->Execute*/
    $rs = $conn->query($sql_query);
	}else{
		$rs = $conn->query($sql_query); // $rs = $conn->SelectLimit($sql_query, $sql_data["limit"], $sql_data["limit_begin"]) or  db_die(__LINE__  . " - "  . __FILE__ . ": " . $conn->error);//$conn->ErrorMsg());
	}
  //       if($rs) $cmr_action["affected_rows"] = $rs->RecordCount();
    if(!($rs)) db_die(__LINE__  . " - "  . __FILE__ . ": " . $conn->error);//$conn->ErrorMsg());
    $result = $rs;
	}

 }else{ // array
// 			$ADODB_FETCH_MODE = ADODB_FETCH_NUM;
	if($conn)
     //$conn->SetFetchMode(ADODB_FETCH_NUM);
     //  @@@@@@@@@@@@@@@@@ return an array result @@@@@@@@@@@@@@@@@@@@@@@
	if($conn){
	if(empty($sql_data["limit"])) {
		/*$rs = $conn->Execute*/ if(!($rs = $conn->query($sql_query))) db_die(__LINE__  . " - "  . __FILE__ . ": " . $conn->error);//$conn->ErrorMsg());
		}else{
		$rs = $conn->query($sql_query); // $sql_data["limit"], $sql_data["limit_begin"]) or  db_die(__LINE__  . " - "  . __FILE__ . ": " . $conn->error);//$conn->ErrorMsg());
	}
	}
      if($rs){
// 	     $cmr_action["affected_rows"] = $rs->RecordCount();
	     while ($sql_data = $rs->fetch_row()){
			  foreach($sql_data as $key => $v){
			      $result[$key][$i] = $v;
			  }
			  $i++;
		// 	  $rs->MoveNext();
	     }
     $rs->Close();
     }
 }


 return $result;
    }
}
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("readed_line"))){
    /**
     * readed_line()
     *
     * @param array $cmr_config
     * @param array $cmr_user
     * @param $conn
     * @param string $table_name
     * @return
     **/
    function cmr_readed_line($cmr_config, $cmr_user, $conn, $table_name)
    {
	if(empty($cmr_user["auth_email"])||(empty($conn))) return array();
    // ==========
    $sql_id = " SELECT line_id FROM " . $cmr_config["cmr_table_prefix"] . "history ";
    $sql_id .= " WHERE (action='read') ";
    $sql_id .= " AND (table_name='" . $cmr_config["cmr_table_prefix"] . $table_name . "') ";
    $sql_id .= " AND (user_email='" . $cmr_user["auth_email"] . "')";
    $sql_id .= " ORDER BY id DESC ";

	if($conn){
		$sql_data["limit"] =  $cmr_config["cmr_max_view"];
		$sql_data["limit_begin"] =  0;
		$rs = sql_run("result", $conn, "", $sql_id, "", "", "", $sql_data);
	}
//     $rs = $conn->SelectLimit($sql_id, $cmr_config["cmr_max_view"]) or  db_die(__LINE__  . " - "  . __FILE__ . ": " . $conn->error);//$conn->ErrorMsg());
    $array_read = array();
		if($conn)
    //$conn->SetFetchMode(ADODB_FETCH_ASSOC);
    if($rs)
    while ($value = $rs->fetch_assoc()){
	    if(isset($value["line_id"])) array_push($array_read, $value["line_id"]);
// 	    $rs->MoveNext();
    }
    array_push($array_read, "@");
    // ==========
     return array_unique($array_read);
    }
}
/*=================================================================*/
if(!(function_exists("cmr_column_exist"))){
    /**
     * cmr_column_exist()
     *
     * @param string $column_name
     * @param string $table_name
     * @return
     **/
function cmr_column_exist($column_name, $table_name, $conn)
{
 $finded = false;
 $rs = null;
 if($conn) $rs = sql_run("result", $conn, "", "EXPLAIN " . trim($table_name) . ";");
//  /*$rs = $conn->Execute*/ $rs = $conn->query("EXPLAIN " . trim($table_name) . ";") or  print($conn->error);//$conn->ErrorMsg());
 if($rs)
 while ($columns = $rs->fetch_row()){
     if(isset($columns["Field"]) && ($columns["Field"] == $column_name)){
        $finded = true;
  return true;
      }
//       $rs->MoveNext();
     }
     if($finded) return true;
  return false;
    }
}
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("calcul_tree_group"))){
/**
 * calcul_tree_group()
 *
 * @param mixed $str_list
 * @param mixed $conn
 * @return
 **/

function calcul_tree_group($cmr_config, $conn, $str_list)
{
    // -----------------------
	$cmr_action["table_name"] = "father_groups";
	$cmr_action["column"] = "group_father,group_child";
	$cmr_action["action"] = "select";
	$sql_data["valid"] = cmr_where_query($cmr_config, cmr_get_user(), $cmr_action, $conn);

	$sql_data["order"] = "";
	$sql_data["sql_where"] = " ((state='active') OR (state='enable')) ";
	$data = sql_run("array_assoc", $conn, "select", "", $cmr_config["db_name"], $cmr_config["cmr_table_prefix"] . "father_groups", "*", $sql_data);
    // -----------------------

    // -----------------------
    $tab_child = array();
    $temp_tab = explode(",", cmr_search_replace("'", "", $str_list));
    // -----------------------
  if($data)
	 foreach($data as $key => $f_group){
	 if(isset($tab_child[trim($f_group["group_father"])])){
	     $tab_child[trim($f_group["group_father"])] .= ", '" . trim($f_group["group_child"]) . "'";
	 }else{
	     $tab_child[trim($f_group["group_father"])] = "'" . trim($f_group["group_child"]) . "'";
	 }
    }
    // -----------------------
    while (sizeof($temp_tab)){
	 $t_val = array_pop($temp_tab);
	 if((!empty($t_val)) && (!empty($str_list)) && (!empty($tab_child[trim($t_val)])))
	 if((cmr_search(trim($t_val), $str_list)) && (!cmr_search($tab_child[trim($t_val)], $str_list))){
	     $str_list .= ", " . $tab_child[trim($t_val)];
	     $t_tab = explode(", ", cmr_search_replace("'", "", $tab_child[trim($t_val)]));
	     $temp_tab += $t_tab;
	 };
    };
    // -----------------------
    // -----------------------
   $str_list = "'" . implode("', '", array_unique(explode(", ", cmr_search_replace("'", "", $str_list)))) . "'";
    return $str_list;
}
/*=================================================================*/
}
// ==============================================================
// ==============================================================

/*=================================================================*/
// if(!(function_exists("select"))){
//     /**
//      * select()
//      *
//      * @param mixed $conn
//      * @param string $sql
//      * @param string $border
//      * @param string $cellspacing
//      * @param string $cellpadding
//      * @return
//      **/
//     function select($conn, $sql = "", $border = "1", $cellspacing = "1", $cellpadding = "1")
//     {
// 	 $result = sql_run("object", $conn, "sql", $sql);
// 	 // print_r($result);
// 	 // $table.="<thead>";
// 	 // $table.="<th>";
// 	 // $table.="<td>";
// 	 // $table.="</td>";
// 	 // $table.="</th>";
// 	 // $table.="</thead>";
// 	 $table .= "<hr />";
// 	 // $key1=0;
// 	 // $key2=0;
// 	 $table = "<table width=\"100%\" border=\"$border\"  cellspacing=\"$cellspacing=\" cellpadding=\"$cellspacing=\" >";
// 	 foreach($result as $sql_data){
// 	     $table .= "<tr>";
//
// 	     foreach($sql_data as $a){
// 	  $table .= "<td>";
// 	  print("[" . substr($a, 0, 20) . "]");
// 	  $table .= "</td>";
// 	     }
// 	     $table .= "</tr>";
// 	 }
// 	 // $table.="</tbody>";
// 	 $table .= "</table>";
// 	 return $table;
//     }
// }
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("cmr_print_value"))){
    /**
     * cmr_print_value()
     *
     * @param string $column_name
     * @param string $column_value
     * @param string $column_type
     * @param string $column_extern
     * @return
     **/
    function cmr_print_value($cmr_config = array(), $cmr_language = array(), $conn, $table_name = "",  $column_name = "", $column_value = "", $column_type = "", $column_extern = false, $col_id = "", $limit = "", $order = "id", $width = "100")
    {
		$to_return = $column_value;
	    switch(strtolower($column_name)){
		    case "id":
		    case "pwd":
		    case "passwd":
		    case "password":
		    $to_return = "***";
		    break;

		    case "email":
		    case "allow_email":
		    case "user_email":
		    case "mail_from":
		    case "mail_to":
		    case "mail_cc":
		    case "mail_bcc":
        	$to_return = cmr_print_select($cmr_config, $cmr_language, $conn, $table_name, $column_name, "column");
		    break;


		    case "my_master":
		    case "my_slave":
		    case "allow_type":
        	$to_return = cmr_print_select($cmr_config, $cmr_language, $conn, $table_name, $column_name, "type");
		    break;

		    case "group":
		    case "groups":
		    case "group_name":
		    case "allow_groups":
        	$to_return = cmr_print_select($cmr_config, $cmr_language, $conn, $table_name, $column_name, "column");
		    break;



		    case "file":
		    case "attach":
		    case "attachment":
		    case "allegato":

		    case "date_time":
		    case "date":
		    case "time":
		    case "timestamp":

		    case "comment":

		    case "image":
		    case "picture":
		    case "photo":

		    case "certificate":
		    case "my_md5":

		    default:
		    break;
	}
        return $to_return;
  }
}
/*=================================================================*/
 /*=================================================================*/
if(!(function_exists("cmr_print_select"))){
    /**
     * cmr_print_select()
     *
     * @param mixed $conn
     * @param string $table
     * @param string $column
     * @param string $action
     * @param mixed $db_name
     * @param string $col_id
     * @param mixed $limit
     * @param string $order
     * @param string $width
     * @return
     **/
function cmr_print_select($cmr_config = array(), $cmr_language = array(), $conn, $table = "", $column = "", $action = "type", $db_name = "", $col_id = "", $limit = "", $order = "", $width = "100")
{

	$i = 0;
	$col1 = "";
	$col2 = "";
	$col3 = "";
	$data1 = "";
	$data2 = "";
	$sql_data_return = "";

	$tb1 = array();
	$tb2 = array();
	$tb3 = array();
	$tb4 = array();
	$array_value1 = array();
	$array_value2 = array();

     //  @@@@@@@@@@@@@@@@@ return select column name @@@@@@@@@@@@@@@@@@@@@@@
 if($action == "column"){

     if(empty($column))  $column = trim($order);
     @ list($col1, $col2, $col3) = explode(",", $column);
     if(empty($col1))  $col1 = trim($column);
     if(empty($order))  $order = trim($col1);

     $sql_data["limit"] = $limit;
     $sql_data["order"] = "ORDER BY " . $order . " DESC ";
if($conn)
     if(!empty($col1)) $tb1 = sql_run("array", $conn, "select", "", $cmr_config["db_name"], $table, trim($col1), $sql_data);
if($conn)
     if(!empty($col2)) $tb2 = sql_run("array", $conn, "select", "", $cmr_config["db_name"], $table, trim($col2), $sql_data);
if($conn)
     if(!empty($col3)) $tb3 = sql_run("array", $conn, "select", "", $cmr_config["db_name"], $table, trim($col3), $sql_data);
if($conn)
     if(!empty($col_id)) $tb4 = sql_run("array", $conn, "select", "", $cmr_config["db_name"], $table, trim($col_id), $sql_data);


if($tb1)if($tb1[0])
    for($i = 0; ($i < sizeof($tb1[0])); $i++){
	  if(!empty($col1)) $data1 = $tb1[0][$i];
	  if(!empty($col2)) $data1 .= " | " . $tb2[0][$i];
	  if(!empty($col3)) $data1 .= " | " . $tb3[0][$i];
	  (empty($col_id)) ? $data2 = $tb1[0][$i] : $data2 = $tb4[0][$i];

	  $array_value1[] = $data2;
	  $array_value2[] = substr($data1, 0, $width);
     }

     return "<option value=\"\"></option>" . select_order($cmr_language, $array_value1,  $array_value2, "0", $width);
 }

     //  @@@@@@@@@@@@@@@@@ return select list type @@@@@@@@@@@@@@@@@@@@@@@
if($conn)
 if(($action == "type") || ($action == "type_list")){
     $tb1 = sql_run("array_assoc", $conn, "show_columns", "", $cmr_config["db_name"], $table);


     foreach($tb1 as $key => $the_field){
	  if(($the_field['Field']) == $column){
	      $sql_data = $the_field['Type'];
	      $sql_data = substr($sql_data, strpos($sql_data, "(") + 1);
	      $sql_data = substr($sql_data, 0, strrpos($sql_data, ")"));

	      $array_val = explode(",", $sql_data);

	      foreach($array_val as $data1){
		   $data1 = trim(str_replace("'", "", $data1));
		   if(!empty($cmr_language[$data1])){
			   $array_value1[] = $data1;
			   $array_value2[] = $cmr_language[$data1];
		       $sql_data_return .= "<option value=\"" . $data1 . "\">" . $cmr_language[$data1] . "</option>";
		   }else{
			   $array_value1[] = $data1;
			   $array_value2[] = substr($data1, 0, $width);
		       $sql_data_return .= "<option value=\"" . $data1 . "\">" . substr($data1, 0, $width) . "</option>";
		   }
	      }

	      if($action == "type_list") return implode("\n", $array_value1);
	      if(10 < count($array_val)) return "<option></option>" . select_order($cmr_language, $array_value1,  $array_value2, "0", $width);
	      return "<option value=\"\"></option>" . $sql_data_return;
	  }
     }
 }

//  print("</select>" . $column);cmr_print_r ($tb1 );print("<select>");

 return select_order($cmr_language, $array_value1,  $array_value2, "0", $width);
    }
}
// //     call_user_func($function_name, $data1)
// //     call_user_func_array($function_name, $array_val)
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("return_key"))){
    /**
     * return_key()
     *
     * @param mixed $conn
     * @param string $table
     * @param string $give_column
     * @param string $need_column
     * @param string $value
     * @return
     **/
    function return_key($cmr_config, $cmr_user, $conn, $table = "", $need_column = "", $give_column = "", $give_value = "")
    {
	 // -----------
	$cmr_action["table_name"] = cmr_searchi_replace("^" . $cmr_config["cmr_table_prefix"], "", $table);
	$cmr_action["column"] = "";
	$cmr_action["action"] = "select";
	$sql_data["valid"] = cmr_where_query($cmr_config, $cmr_user, $cmr_action, $conn);

	$data = array();
	$sql_data["order"] = "";
	$sql_data["valid"] = "";
	$sql_data["sql_where"] = " (1) ";
	if($give_column) $sql_data["sql_where"] = "  " . $give_column . "=" . sprintf("'%s'", $give_value);
	$data = sql_run("array_assoc", $conn, "select", "", $cmr_config["db_name"], $table, $need_column, $sql_data);
	 // -----------

	 // -----------
	 if($need_column == "*") return $data[0];
	 return $data[0][$need_column];
    }
}
 /*=================================================================*/
//  /*=================================================================*/
// if(!(function_exists("next_max_id"))){
//     /**
//      * next_max_id()
//      *
//      * @param string $table
//      * @param string $column
//      * @return
//      **/
//     function next_max_id($table = "cmr_user", $column="id")
//     {
// 	 $sql = "SELECT MAX(" . $column . ") as max FROM " . $table;
// 	 //$conn->SetFetchMode(ADODB_FETCH_ASSOC);
//
// 	 /*$rs = $conn->Execute*/ $rs = $conn->query($sql) or  db_die(__LINE__  . " - "  . __FILE__ . ": " . $conn->error);//$conn->ErrorMsg());
//
// 	 $tab = $rs->fetch_row();
// 	 $id = $tab["max"] + 1;
// 	 return $id;
//     }
// }
// /*=================================================================*/
/*=================================================================*/
// if(!(function_exists("change_enum"))){
//     /**
//      * change_enum()
//      *
//      * @param mixed $conn
//      * @param string $table
//      * @return
//      **/
//     function change_enum($conn, $table = "cmr_user")
//     {
//  return "";
//  /*=================================================================*/
//     }
// }
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("get_user_type"))){
    /**
     * get_user_type()
     *
     * @param string $give_column
     * @return
     **/
    function get_user_type($object)
    {
	    if(is_array($object)){
		    if(isset($object["level"])) return $object["level"];
		    if(isset($object["type"])) return $object["type"];
    	}
	    if(isset($object->level)) return $object->level;
	 return $object->type;
    }
}
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("cmr_log_to_db"))){
    /**
     * cmr_log_to_db()
     *
     * @param string $give_column
     * @return
     **/
    function cmr_log_to_db($db_connection, $prefix, $values = "")
    {
	$query = "INSERT IGNORE INTO " . $prefix . "history VALUES ('', " . $values . ", " . "NOW());";
	if($db_connection)
	return sql_run("result", $db_connection, "", $query);
// 	return $db_connection->Execute($query) or db_die(__LINE__  . " - "  . __FILE__ . ": " . $db_connection->ErrorMsg());
	return false;
    }
}
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("list_select"))){
    /**
     * list_select()
     *
     * @param mixed $conn
     * @param string $query
     * @param string $column_name
     * @return string
     **/
 function list_select($conn, $query = "", $column_name = "name")
 {
	$str_value = "";
	$array_value = array();


	if(!empty($query)&&(!empty($conn))){
		if($conn)
    //$conn->SetFetchMode(ADODB_FETCH_ASSOC);
		if($conn)
	 $rs = sql_run("result", $conn, "", $query);
// 	/*$rs = $conn->Execute*/ $rs = $conn->query($query) or db_die(__LINE__  . " - "  . __FILE__ . ": " . $conn->error);//$conn->ErrorMsg());; /*, $conn) */
	if($rs)
	while ($val_col = $rs->fetch_assoc()){
	 $array_value[] = $val_col[$column_name];
	};

    $str_value = select_order(cmr_get_language(), $array_value,  $array_value, "");

	}

    return $str_value;
 }
}
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("list_input"))){
    /**
     * list_input()
     *
     * @param mixed $conn
     * @param string $query
     * @param string $column_name
     * @return string
     **/
 function list_input($conn, $query = "", $column_name = "name")
 {
	$str_list = "";
	if(!empty($query))
	if(!cmr_search(" ", $query)){
		 $str_list .= str_replace("|", "\n", $query);
	}else{
		if($conn)
    	//$conn->SetFetchMode(ADODB_FETCH_ASSOC);
		if($conn)
		$rs = sql_run("result", $conn, "", $query);
// 		/*$rs = $conn->Execute*/ $rs = $conn->query($query);
		if($rs)
	    while ($val_col = $rs->fetch_assoc()){
	    	$str_list .= $val_col[$column_name] . "\n";
    	}
	}
    return $str_list;
 }
}
/*=================================================================*/
if(!(function_exists("list_choose"))){
    /**
     * list_choose()
     *
     * @param mixed $conn
     * @param array $cmr_query
     * @param array $cmr_label
     * @return string
     **/

function list_choose($cmr_query = array(), $cmr_label = array(), $conn)
{
	$to_return = "";

	if(empty($cmr_label["title3"])){
	$cmr_label["name3"] = $cmr_label["name2"];
	$cmr_label["column_name3"] = $cmr_label["column_name2"];
	$cmr_label["title3"] = $cmr_label["title2"];
	$cmr_query["title3"] = $cmr_query["title2"];

	$cmr_label["name2"] = $cmr_label["name1"];
	$cmr_label["column_name2"] = $cmr_label["column_name1"];
	$cmr_label["title2"] = $cmr_label["title1"];
	$cmr_query["title2"] = $cmr_query["title1"];

	$cmr_label["name1"] = "";
	$cmr_label["column_name1"] = "";
	$cmr_label["title1"] = "";
	$cmr_query["title1"] = "";

}



	$to_return .= "<div id=\"" . $cmr_label["div"] . "_div\">";
	$to_return .= "<table border=\"1\">";



	$to_return .= "<tr>";
	if(!empty($cmr_label["title1"])){
		$to_return .= "<td align=\"center\">";
		$to_return .= $cmr_label["title1"];
		$to_return .= "</td>";
	}

	if(!empty($cmr_label["title2"])){
	if(!empty($cmr_label["title1"])){
		$to_return .= "<td align=\"center\">";
		$to_return .= "</td>";
	}
	$to_return .= "<td align=\"center\">";
	$to_return .= $cmr_label["title2"];
	$to_return .= "</td>";
	}

	if(!empty($cmr_label["title3"])){
		$to_return .= "<td align=\"center\">";
		$to_return .= "</td>";
		$to_return .= "<td align=\"center\">";
		$to_return .= $cmr_label["title3"];
		$to_return .= "</td>";
	}
	$to_return .= "</tr>";









	$to_return .= "<tr>";
	if(!empty($cmr_label["title1"])){
		$to_return .= "<td align=\"center\">";
		$to_return .= "<textarea class=\"select_class\" rows=\"15\" id=\"" . $cmr_label["name"] . "03\" name=\"" . $cmr_label["name1"] . "\" >";
		$to_return .= list_input($conn, $cmr_query["title1"], $cmr_label["column_name1"]);
		$to_return .= "</textarea>";
		$to_return .= "<br />";
		$to_return .= "<br />";
		$to_return .= "</td>";
	}

	if(!empty($cmr_label["title2"])){
	if(!empty($cmr_label["title1"])){
		$to_return .= "<td align=\"center\"><br />";
		$to_return .= "<input type=\"button\" value=\"<\" onclick=\"select_to_textarea('" . $cmr_label["name"] . "01','" . $cmr_label["name"] . "03');\"><br /><br />";
		$to_return .= "<input type=\"button\" value=\"<<\" onclick=\"export_to_textarea('" . $cmr_label["name"] . "01','" . $cmr_label["name"] . "03');\"><br /><br />";
		$to_return .= "</td>";
	}

	$to_return .= "<td align=\"center\">";
	$to_return .= "<select class=\"select_class\" size=\"15\" id=\"" . $cmr_label["name"] . "01\" ondblclick=\"select_to_textarea('" . $cmr_label["name"] . "01','" . $cmr_label["name"] . "02');\" name=\"" . $cmr_label["name2"] . "\" multiple>";
	$to_return .= list_select($conn, $cmr_query["title2"], $cmr_label["column_name2"]);
	$to_return .= "</select>";
	$to_return .= "<br />";
	// $to_return .= "<!--input type=\"button\" value=\"x\" onclick=\"delete_item('" . $cmr_label["name"] . "01');\"--><br />";
	$to_return .= "</td>";
	}

	if(!empty($cmr_label["title3"])){
		$to_return .= "<td align=\"center\"><br />";
		$to_return .= "<input type=\"button\" value=\">\" onclick=\"select_to_textarea('" . $cmr_label["name"] . "01','" . $cmr_label["name"] . "02');\"><br /><br />";
		$to_return .= "<input type=\"button\" value=\">>\" onclick=\"export_to_textarea('" . $cmr_label["name"] . "01','" . $cmr_label["name"] . "02');\"><br /><br />";
		$to_return .= "</td>";

		$to_return .= "<td align=\"center\">";
		$to_return .= "<textarea class=\"textarea_class\" rows=\"15\" id=\"" . $cmr_label["name"] . "02\" name=\"" . $cmr_label["name3"] . "\" >";
		$to_return .= list_input($conn, $cmr_query["title3"], $cmr_label["column_name3"]);
		$to_return .= "</textarea>";
		$to_return .= "<br />";
		$to_return .= "<br />";
		$to_return .= "</td>";
	}
	$to_return .= "</tr>";
	$to_return .= "<tr>";
	$to_return .= "<td colspan=\"5\" align=\"center\">";
	$to_return .= $cmr_label["comment"];
	$to_return .= "</td>";
	$to_return .= "</tr>";
	$to_return .= "</table>";
	$to_return .= "</div>";

return $to_return;
 /*=================================================================*/
  }
}
/*=================================================================*/
if(!(function_exists("cmr_update_pw"))){
    /**
     * cmr_update_pw()
     *
     * @param  $conn
     * @param string $table
     * @param string $user
     * @param string $pw
     * @return
     **/
    function cmr_update_pw($conn, $table, $user, $pw)
    {
	    $sql_query = "UPDATE " . $table . " SET pw = '" . cmr_escape($pw) . "', date_time = NOW() WHERE uid ='" . $user . "' ;";
		  if($conn) $result_query = sql_run("result", $conn, "", $sql_query);
// 	    $result_query = $conn->Execute($sql_query) /*, $db_con)*/ or print("<li>!!! " . $conn->ErrorMsg() . " !!!? </li>");
	    if(!($result_query)) $total = 0 ;
      if($result_query) $total = $result_query->affected_rows;
	  return $total;
	}
}
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("run_install_query"))){
    /**
     * run_install_query()
     *
     * @param array $sql_query_array
     * @param  $conn
     * @return
     **/
    function run_install_query($sql_query_array = array(), $conn)
    {
    $total = 0;
    $install_prints = "";
    foreach($sql_query_array as $sql_query){
        if($sql_query){
		if($conn)
		$result_query = sql_run("result", $conn, "", $sql_query . ";");
//             $result_query = $conn->Execute($sql_query . ";")  or $install_prints .= ("<li><b><p>!!! " . $conn->ErrorMsg() . " !!!?</p></b><li>");
            if(!($result_query)) $install_prints .= ("<li class=\"alert\">" . $sql_query . ";</li>");
            if($result_query) $total += $result_query->affected_rows;/*, $db_con)*/
        }
        $install_prints .= ("<li>" . $sql_query . ";</li>");
    }
	  return array($total, $install_prints);
	}
}
/*=================================================================*/
if(!(function_exists("cmr_report_sql"))){
    /**
     * cmr_report_sql()
     *
     * @return string
     **/


function cmr_report_sql($cmr_table, $column = array())
{
	$cmr_query = " SELECT " . $column["name"] . ", " . $column["function"] . "(" . $column["name"] . ") ";
	$cmr_query .= " FROM " . $cmr_table . " ";

	$cmr_query .= " WHERE (" . $column["where_column"] . " " . $column["where_operator"] . " ('" . $column["where_value"] . "'))";
	$cmr_query .= " AND NOT ISNULL(" . $column["name"] . ") ";
	$cmr_query .= " AND " . $column["where_query"] . " ";

	if(($column["date_time"])){
		$cmr_query .= " AND DATE_FORMAT(" . $column["date_time"] . ", '%Y-%m-%d %H:%i:%s') BETWEEN  cast('" . $column["date_begin"] . "' as DATETIME) AND cast('" . $column["date_end"] . "' as DATETIME)";
	}

	$cmr_query .= " GROUP BY " . $column["group_by_column"] . " " . $column["group_by_order"];
	$cmr_query .= " HAVING " . $column["having_column"] ." ". $column["having_operator"] ." ('". $column["having_value"] . "')";
	$cmr_query .= " ORDER BY " . $column["order_by_column"] . " " . $column["order_by_order"];
	//$cmr_query .= " LIMIT " . $column["limit"] . ";";
	return $cmr_query;
 }
}
/*=================================================================*/
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
/*=================================================================*/
if(!(function_exists("cmr_get_data_report"))){
    /**
     * cmr_get_data_report()
     *
     * @return array
     **/
function cmr_get_data_report($cmr_db_connection = NULL, $cmr_config = array(), $cmr_post_var = array(), $array_check_table = array(), $sql_property = array(), $true_table = "")
{
	//===============================
$table_name = $true_table;
if(!empty($cmr_config["cmr_table_prefix"])) $table_name = cmr_searchi_replace("^" . $cmr_config["cmr_table_prefix"], "", $true_table);
	//===============================
$lastday = date("Y-m-d H:i:s", time() - (60 * 60 * 24));
$lastweed = date("Y-m-d H:i:s", time() - (60 * 60 * 24 * 7));
$lastmonth = date("Y-m-d H:i:s", time() - (60 * 60 * 24 * 30));
$lastyear = date("Y-m-d H:i:s", time() - (60 * 60 * 24 * 365));
$today = date("Y-m-d H:i:s", time());
	//===============================
$graph_property = array();
$output_property = array();

((strlen(get_post("report_" . $table_name . "_width"))) > 0) ? $graph_property["width"] = get_post("report_" . $table_name . "_width") : $graph_property["width"] = "600";
((strlen(get_post("report_" . $table_name . "_height"))) > 0) ? $graph_property["height"] = get_post("report_" . $table_name . "_height") : $graph_property["height"] = "600";
((strlen(get_post("report_" . $table_name . "_color1"))) > 0) ? $graph_property["color1"] = get_post("report_" . $table_name . "_color1") : $graph_property["color1"] = "navy@0.7";
((strlen(get_post("report_" . $table_name . "_color2"))) > 0) ? $graph_property["color2"] = get_post("report_" . $table_name . "_color2") : $graph_property["color2"] = "blue@0.5";
((strlen(get_post("report_" . $table_name . "_fillcolor1"))) > 0) ? $graph_property["fillcolor1"] = get_post("report_" . $table_name . "_fillcolor1") : $graph_property["fillcolor1"] = "skyblue@0.5";
((strlen(get_post("report_" . $table_name . "_fillcolor2"))) > 0) ? $graph_property["fillcolor2"] = get_post("report_" . $table_name . "_fillcolor2") : $graph_property["fillcolor2"] = "lightblue";
((strlen(get_post("report_" . $table_name . "_font1"))) > 0) ? $graph_property["font1"] = get_post("report_" . $table_name . "_font1") : $graph_property["font1"] = "";
((strlen(get_post("report_" . $table_name . "_font2"))) > 0) ? $graph_property["font2"] = get_post("report_" . $table_name . "_font2") : $graph_property["font2"] = "";

((strlen(get_post("report_" . $table_name . "_show_graph"))) > 0) ? $output_property["show_graph"] = get_post("report_" . $table_name . "_show_graph") : $output_property["show_graph"] = "bar";
((strlen(get_post("report_" . $table_name . "_period"))) > 0) ? $output_property["period"] = get_post("report_" . $table_name . "_period") : $output_property["period"] = "";
((strlen(get_post("report_" . $table_name . "_show_data"))) > 0) ? $output_property["show_data"] = get_post("report_" . $table_name . "_show_data") : $output_property["show_data"] ="yes";

((strlen(get_post("report_" . $table_name . "_begin"))) > 0) ? $sql_property["date_begin"] = get_post("report_" . $table_name . "_begin") : $sql_property["date_begin"] = $lastmonth;
((strlen(get_post("report_" . $table_name . "_end"))) > 0) ? $sql_property["date_end"] = get_post("report_" . $table_name . "_end") : $sql_property["date_end"] = $today;
((strlen(get_post("report_" . $table_name . "_func"))) > 0) ? $sql_property["function"] = get_post("report_" . $table_name . "_func") : $sql_property["function"] = "COUNT";
// ((strlen(get_post("report_" . $table_name . "_column"))) > 0) ? $sql_property["column"] = get_post("report_" . $table_name . "_column") : $sql_property["column"] = $cmr_post_var["report_" . $table_name . "_column"];
((strlen(get_post("report_" . $table_name . "_where_column"))) > 0) ? $sql_property["where_column"] = get_post("report_" . $table_name . "_where_column") : $sql_property["where_column"] = $sql_property["column"];
((strlen(get_post("report_" . $table_name . "_where_operator"))) > 0) ? $sql_property["where_operator"] = get_post("report_" . $table_name . "_where_operator") : $sql_property["where_operator"] = "LIKE";
((strlen(get_post("report_" . $table_name . "_where_value"))) > 0) ? $sql_property["where_value"] = get_post("report_" . $table_name . "_where_value") : $sql_property["where_value"] ="%%";
((strlen(get_post("report_" . $table_name . "_group_by_column"))) > 0) ? $sql_property["group_by_column"] = get_post("report_" . $table_name . "_group_by_column") : $sql_property["group_by_column"] = $sql_property["column"];
((strlen(get_post("report_" . $table_name . "_group_by_order"))) > 0) ? $sql_property["group_by_order"] = get_post("report_" . $table_name . "_group_by_order") : $sql_property["group_by_order"] = "DESC";
((strlen(get_post("report_" . $table_name . "_having_column"))) > 0) ? $sql_property["having_column"] = get_post("report_" . $table_name . "_having_column") : $sql_property["having_column"]  = $sql_property["column"];
((strlen(get_post("report_" . $table_name . "_having_operator"))) > 0) ? $sql_property["having_operator"] = get_post("report_" . $table_name . "_having_operator") : $sql_property["having_operator"] = "LIKE";
((strlen(get_post("report_" . $table_name . "_having_value"))) > 0) ? $sql_property["having_value"] = get_post("report_" . $table_name . "_having_value") : $sql_property["having_value"] = "%%";
((strlen(get_post("report_" . $table_name . "_order_by_column"))) > 0) ? $sql_property["order_by_column"] = get_post("report_" . $table_name . "_order_by_column") : $sql_property["order_by_column"] = $sql_property["column"];
((strlen(get_post("report_" . $table_name . "_order_by_order"))) > 0) ? $sql_property["order_by_order"] = get_post("report_" . $table_name . "_order_by_order") : $sql_property["order_by_order"] = "DESC";
((strlen(get_post("report_" . $table_name . "_limit"))) > 0) ? $sql_property["limit"] = get_post("report_" . $table_name . "_limit") : $sql_property["limit"] = "20";

if(empty($cmr_post_var["report_" . $table_name . "_sql"])) $cmr_post_var["report_" . $table_name . "_sql"] = "";
((strlen(get_post("report_" . $table_name . "_sql"))) > 0) ? $report_sql = get_post("report_" . $table_name . "_sql") : $report_sql = $cmr_post_var["report_" . $table_name . "_sql"];

((strlen(get_post("report_" . $table_name . "_path"))) > 0) ? $report_path = get_post("report_" . $table_name . "_path") : $report_path = "";

// (strlen(get_post("check_all_table")) > 0) ? $check_all_table = get_post("check_all_table") : $check_all_table="";

// �_foreach_column_�
// (strlen(get_post('report_' . $table_name . '_@_column_@')) > 0) ? $array_check_table['@_column_@']= get_post('report_' . $table_name . '_@_column_@') : $extend_sql = '1';
// ��_foreach_column_��
	//==============

// report_@_table_@_id
// report_@_table_@_date_time



	//===============================
	//===============================
	//========Click link for report==
	//===============================
	//===============================
if(!empty($cmr_post_var["report_" . $table_name . "_form"])){

	$output_property["show_graph"] = "default";
	$output_property["period"] = "month";
	$output_property["show_data"] = "yes";
	$sql_property["function"] = "count";
// 	$sql_property["where_column"] = "";
	$sql_property["where_operator"] = "like";
	$sql_property["where_value"]  = "%%";
// 	$sql_property["group_by_column"] = "";
	$sql_property["group_by_order"] = "DESC";
// 	$sql_property["having_column"]  = "";
	$sql_property["having_operator"] = "like";
	$sql_property["having_value"] = "%%";
// 	$sql_property["order_by_column"] = "";
	$sql_property["order_by_order"] = "DESC";
	$sql_property["limit"] = "20";


	if($sql_property["column"] == "*"){
// �foreach_column�
// 	$array_check_table['@_column_@'] = '@_column_@';
// ��foreach_column��

	$sql_property["where_column"] = "";
	$sql_property["group_by_column"] = "";
	$sql_property["order_by_column"] = "";
	$sql_property["having_column"] = "";
	}else{
	$array_check_table[$sql_property["column"]] = $sql_property["column"];
	$sql_property["where_column"] = $sql_property["column"];
	$sql_property["group_by_column"] = $sql_property["column"];
	$sql_property["order_by_column"] = $sql_property["column"];
	$sql_property["having_column"] = $sql_property["column"];
	}
}	//===============================
	//===============================
// $lastday = mktime(0, 0, 0, date("d")-1  , date("m"), date("Y"));
// $lastweed = mktime(0, 0, 0, date("d")-7, date("m"),   date("Y"));
// $lastmonth = mktime(0, 0, 0, date("d"), date("m")-1,   date("Y"));
// $lastyear  = mktime(0, 0, 0, date("d"),   date("m"),   date("Y")-1);
// $today  = mktime(0, 0, 0, date("d"),   date("m"),   date("Y"));

	//===============================
if(empty($output_property["period"])){

	if(empty($sql_property["date_end"])) $sql_property["date_end"] = $today;
	if(empty($sql_property["date_begin"])) $sql_property["date_begin"] = $lastmonth;
	$output_property["period"] = $sql_property["date_begin"] . " => " . $sql_property["date_end"];

	}else{
	$output_property["period"] = cmr_translate($output_property["period"]);
	switch($output_property["period"]){

	case "last_day":
	$sql_property["date_begin"] = $lastday;
	$sql_property["date_end"] = $today;
	break;

	case "last_week":
	$sql_property["date_begin"] = $lastweed;
	$sql_property["date_end"] = $today;
	break;

	case "last_month":
	$sql_property["date_begin"] = $lastmonth;
	$sql_property["date_end"] = $today;
	break;

	case "last_year":
	$sql_property["date_begin"] = $lastyear;
	$sql_property["date_end"] = $today;
	break;

	case "shortmonth":
	$sql_property["date_begin"] = $lastmonth;
	$sql_property["date_end"] = $today;
	break;

	case "month":
	$sql_property["date_begin"] = $lastmonth;
	$sql_property["date_end"] = $today;
	break;

	case "day":
	$sql_property["date_begin"] = $lastday;
	$sql_property["date_end"] = $today;
	break;

	case "shortday":
	$sql_property["date_begin"] = $lastday;
	$sql_property["date_end"] = $today;
	break;

	default:
	break;
	}

}
	//===============================
if((strlen($sql_property["date_begin"]) < 2)) $sql_property["date_begin"] = $lastmonth;
if((strlen($sql_property["date_end"]) < 2)) $sql_property["date_end"] = $today;
	//===============================


	//===============================
if(empty($array_check_table)){
	$array_check_table[$sql_property["column"]] = $sql_property["column"];
}
	//===============================


// 	//===============================
// else{
// 	$sql_property["where_column"] = $sql_property["column"];
// 	$sql_property["group_by_column"] = $sql_property["column"];
// 	$sql_property["order_by_column"] = $sql_property["column"];
// 	$sql_property["having_column"] = $sql_property["column"];
// }
// 	//===============================



$control = 0;

foreach($array_check_table as $key => $value){

//==============
$ydata1 = array();
$ydata2 = array();
$xlabel1 = array();
$xlabel2 = array();
//==============
$control++;
//==============



if($control > 1){
	//==============
	$sql_property["where_column"] = $key;
	$sql_property["group_by_column"] = $key;
	$sql_property["order_by_column"] = $key;
	$sql_property["having_column"] = $key;
	//==============

}else{
	//==============
	if((!cmr_searchi("^[a-z]+", $sql_property["where_column"]))) $sql_property["where_column"] = $key;
	if((!cmr_searchi("^[a-z]+", $sql_property["group_by_column"]))) $sql_property["group_by_column"] = $key;
	if((!cmr_searchi("^[a-z]+", $sql_property["order_by_column"]))) $sql_property["order_by_column"] = $key;
	if((!cmr_searchi("^[a-z]+", $sql_property["having_column"]))) $sql_property["having_column"] = $key;
	//==============
}

	//==============

	//==============
$sql_property["name"] = $key;
$sql_property["date_time"] = $cmr_config["column_date_time1_" . $table_name];
	//==============

	//==============
// $cmr->action["table_name"] = $table_name;
// $cmr->action["column"] = "";
// $cmr->action["action"] = "select";
// $sql_property["where_query"] = $cmr->where_query();
	//==============

	//==============
$cmr_query[$key] = cmr_report_sql($true_table, $sql_property);
	//==============
// if((cmr_searchi("^[a-z]+", $report_sql)))
if(!empty($report_sql)){
	$key = "sql-" . $table_name;
	$cmr_query[$key] = $report_sql;
	$sql_property["date_begin"] = "x";
	$sql_property["date_end"] = "x";
	$sql_property["function"] = "sql";
}
	//==============


	//==============

$data1 = sql_run("array", $cmr_db_connection, "query", $cmr_query[$key], $cmr_config["db_name"]);
// $data2= sql_run("array", $cmr_db_connection, "query", $cmr_query[$key], $cmr_config["db_name"]);

array_push($ydata1, $data1[1]);
array_push($xlabel1, $data1[0]);

// array_push($ydata2, $data2[1]);
// array_push($xlabel2, $data2[0]);




$report_data[$key]["show_data"] = $output_property["show_data"];
$report_data[$key]["show_graph"] = $output_property["show_graph"];
$report_data[$key]["select_period"] = $output_property["period"];

$report_data[$key]["width"] = $graph_property["width"];
$report_data[$key]["height"] = $graph_property["height"];
$report_data[$key]["title"] = $sql_property["function"] . cmr_translate(" " . $table_name . " by ") . $key . cmr_translate(" (Period:") .  $sql_property["date_begin"]  . " => " .  $sql_property["date_end"] . ")";
$report_data[$key]["tab_title"] = $output_property["period"];
$report_data[$key]["xtitle"] = $key;
$report_data[$key]["ytitle"] = ""; //$key;
$report_data[$key]["type1"] = $output_property["show_graph"];//'bar','line','pie','barcode'..
$report_data[$key]["type2"] = "line";//'bar','line'..
$report_data[$key]["legend1"] = cmr_translate("Value");
$report_data[$key]["legend2"] = cmr_translate("Legend"); // "Value";
$report_data[$key]["scale"] = "int";

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$report_data[$key]["xlabel1"] = "";
if(!empty($xlabel1)) $report_data[$key]["xlabel1"] = implode($xlabel1, ",");//'shortmonth','month','day','shortday'..
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$report_data[$key]["xlabel2"] = "";

$report_data[$key]["color1"] = $graph_property["color1"];//'red','orange','navy@0.7','blue@0.5'..
$report_data[$key]["color2"] = $graph_property["color2"];//'red','orange','navy@0.7','blue@0.5'..

$report_data[$key]["fillcolor1"] = $graph_property["fillcolor1"];//'skyblue@0.5','lightblue'..
$report_data[$key]["fillcolor2"] = $graph_property["fillcolor2"];//'skyblue@0.5','lightblue' ..

$report_data[$key]["font1"] = $graph_property["font1"];//'skyblue@0.5','lightblue'..
$report_data[$key]["font2"] = $graph_property["font2"];//'skyblue@0.5','lightblue' ..

$report_data[$key]["path"] = $report_path;//save to file


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$report_data[$key]["ydata1"] = "";
if(!empty($ydata1[0])) $report_data[$key]["ydata1"] = implode($ydata1[0], ",");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$report_data[$key]["xlabel1"] = "";
if(!empty($xlabel1[0])) $report_data[$key]["xlabel1"] = implode($xlabel1[0], ",");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


$report_data[$key]["ydata2"] = array(); //implode($ydata2[0], ",");
$report_data[$key]["xlabel2"] = array(); //implode($xlabel2[0], ",");

}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    return $report_data;
}
}
   //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
/*=================================================================*/
if(!(function_exists("cmr_view_matrix"))){
    /**
     * cmr_view_matrix()
     *
     * @param mixed $conn
     * @param string $view_query
     * @param mixed $view_limit
     * @return
     **/
function cmr_view_matrix($conn, $view_query = "", $view_limit = 5, $view_page = 1)
{
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
/**
 * execute  the sql query and count the total
 */
$matrix = array();
$matrix["total"] = 0;
$matrix["num_view"] = 0;
$matrix["num_page"] = 0;
$matrix["table"] = array();

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$view_result=null;
if($conn) $view_result = sql_run("result", $conn, "", $view_query);
// $view_result = $conn->Execute($view_query) or db_die(__LINE__  . " - "  . __FILE__ . ": " . $conn->error);//$conn->ErrorMsg());
//if($view_result) $matrix["total"] = $view_result->RecordCount();
if($view_result) $matrix["total"] = $view_result->affected_rows;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

if(empty($matrix["total"])) $matrix["total"] = 0;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(!empty($matrix["total"])){
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
/**
 * jumping to page
 */
if($view_limit <= 0) $view_limit = 1;
if($view_page < 0) $view_page = 0;
if(($view_limit * $view_page) >= $matrix["total"] + $view_limit) $view_page = 0;
$view_begin = ($view_page * $view_limit) - $view_limit;
if($view_begin < 0) $view_begin = 0;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
/**
 * num row to be show
 */
// $count_result = $conn->Execute($view_query) or db_die(__LINE__  . " - "  . __FILE__ . ": " . $conn->error);//$conn->ErrorMsg());
if($conn){
$sql_data["limit"] =  $view_limit;
$sql_data["limit_begin"] =  $view_begin;
$count_result = sql_run("result", $conn, "", $view_query, "", "", "", $sql_data);
}
// $count_result = $conn->SelectLimit($view_query, $view_limit, $view_begin);
//if($count_result) $matrix["num_view"] = $count_result->RecordCount();
if($count_result) $matrix["num_view"] = $count_result->affected_rows;
/**
 * calculate number off page
 */
($matrix["num_view"])?($matrix["num_page"] = $matrix["total"] / $view_limit):($matrix["num_page"] = 0);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$num_view  = 0;
while (($val_table = $count_result->fetch_row()) && ($num_view < $view_limit)){
	$num_view++;
	if(!empty($val_table)) $matrix["table"][] = $val_table;
	}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    return $matrix;
}
}
   //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
if(!(function_exists("cmr_query_log"))){
    /**
     * cmr_query_log()
     *
     * @param mixed $cmr_config
     * @param string $type
     * @param mixed $c
     * @return
     **/
  function cmr_query_log($cmr_config = array(), $post = null, $type = "")
    {
			$cmr_query = "";
 	switch($type){
	 	case "email" :
		    if(isset($cmr_config["cmr_save_email"]) && ($cmr_config["cmr_save_email"] != "none")){
			$cmr_query = "INSERT INTO " . $cmr_config["cmr_table_prefix"] . "email (";
			$cmr_query .= "id, encoding, lang, header, mail_title, mail_from, mail_to, mail_cc, mail_bcc, attach, text, my_master, date_time";
			$cmr_query .= ") VALUES (";
			$cmr_query .= "'', '', '" . cmr_escape($post->lang) . "', '', '" . cmr_escape($post->mail_title) . "', '";
			$cmr_query .= cmr_escape($post->mail_from) . "', '" . cmr_escape($post->mail_to) . "', '";
			$cmr_query .= cmr_escape($post->mail_cc) . "', '" . cmr_escape($post->mail_bcc) . "', '";
			$cmr_query .= $post->attach . "', '" . cmr_escape($post->mail_text) . "', '";
			$cmr_query .= cmr_escape($post->my_master) . "',  NOW() ";
			$cmr_query .= ");";
			}
	 	break;
	 	case "escalation" :
			if(!empty($cmr_config["cmr_save_escalation"])){
			$cmr_query = "INSERT INTO " . $cmr_config["cmr_table_prefix"] . "history ( ";
			$cmr_query .= "id, user_email, table_name, line_id, action, date_time )";
			$cmr_query .= "VALUES (";
			$cmr_query .= "'', '" . cmr_escape($post->number) . "', 'ticket', '";
			$cmr_query .= cmr_escape($post->id) . ", " .  cmr_escape($post->state) . "', ',  NOW() ";
			$cmr_query .= ");";
			}
	 	break;
	 	case "attachment" :
			// get_post("attach1").", ".get_post("attach2").", ".get_post("attach3").", ".get_post("attach4");

			if(!empty($cmr_config["cmr_save_attachment"]) && strlen($post->attach) > 6){
			$cmr_query = "INSERT INTO " . $cmr_config["cmr_table_prefix"] . "download (";
			$cmr_query .= "id, url, path, file_name, file_type, file_size, state, date_time";
			$cmr_query .= ") VALUES (";
			$cmr_query .= "'', '" . cmr_escape($post->id) . "', '" . cmr_escape($post->id) . "," . cmr_escape($post->attach) . "', '";
			$cmr_query .= cmr_escape($post->attach) . "', '?', '?', 'enable', ',  NOW() ";
			$cmr_query .= ");";
			 }
	 	break;

	 	default :
	 	break;
	   }
    return $cmr_query;
    }
    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
}
/*=================================================================*/
if(!(function_exists("cmr_sql_view"))){
    /**
     * cmr_sql_view()
     *
     * @param array $cmr_config
     * @param array $cmr_post_var
     * @param array $cmr_action
     * @param string $cmr_query
     * @param string $table_name
     * @param string $base_name
     * @param string $date_time1
     * @return
     **/
function cmr_sql_view($cmr_config, $cmr_post_var, $cmr_action, $conn, $cmr_query, $true_table, $base_name, $date_time1)
{
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$table_name = $true_table;
if(!empty($cmr_config["cmr_table_prefix"])) $table_name = cmr_searchi_replace("^" . $cmr_config["cmr_table_prefix"], "", $true_table);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// $true_table = $cmr_config["cmr_table_prefix"] . $table_name;
$date_time_base1 = $date_time1 . "_" . $base_name;

// $post_desc = " DESC";
// $post_order = $cmr_config["column1_" . $table_name];
// $post_date1 = "";
// $post_date2 = "";
// $post_columns = "6";


$post_desc = $cmr_post_var[$base_name . "_desc"];
$post_not = $cmr_post_var[$base_name . "_not"];
$post_order = $cmr_post_var[$base_name . "_order"];
$post_date1 = $cmr_post_var[$date_time_base1 . "1"];
$post_date2 = $cmr_post_var[$date_time_base1 . "2"];
$post_columns = $cmr_post_var[$base_name . "_columns"];
$post_search = $cmr_post_var[$base_name . "_search"];
// $post_check = $cmr_post_var[$base_name . "_check"];
// $post_search = get_post("__all__" . $base_name);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
/**
 * default sql string value
 */
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(empty($cmr_query)){
	// $table_name=$table_name;
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$cmr_query = "SELECT *";

	if(cmr_column_exist($date_time1, $true_table, $conn))
	$cmr_query .= ", DATE_FORMAT(" . $true_table . "." . $date_time1 . ", '%Y-%m-%d %H:%i:%s') as the_date ";

	$cmr_query .= " FROM  " . $true_table . "";
	$cmr_query .= " WHERE " . $cmr_action["where"];
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!





// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
/**
 * complex mode to loat in the sql string filter condition
 * using constant taked in the configuration file
 */
$i_col = 1;
$cmr_query1 = "";
$constant = $cmr_config["column" . $i_col . "_" . $table_name];

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if($post_search) $cmr_query .= " AND (0 ";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
while ((isset($cmr_config["column" . $i_col . "_" . $table_name])) && (!empty($constant)) && ($i_col <= intval($post_columns))){
    $constant = $cmr_config["column" . $i_col . "_" . $table_name];
    $module_column = $constant . "_" . $base_name;
	$cmr_action[$module_column] = "";

//     if($cmr_post_var["id_" . $table_name] == "_all_") $cmr_post_var[$module_column] = "";
	(empty($cmr_post_var[$module_column])) ? $get_column = "" : $get_column = $cmr_post_var[$module_column];

	if($post_search){
	    $cmr_action[$module_column] = "";
	    $cmr_query .= " OR (" . $true_table . "." . $constant . " LIKE '%" . $post_search . "%') ";
	}

	if(strlen($get_column) > 0){
	    $cmr_action[$module_column] = " [v]";
	    $cmr_query1 .= " AND (" . $true_table . "." . $constant . " " . $post_not . " LIKE '%" . $get_column . "%') ";
    }

    $i_col++;
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if($post_search) $cmr_query .= ")";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr_query .= $cmr_query1;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr_action[$date_time_base1] = "";
/**
 * complete filter in the sql string with the date_time column
 */
if((strlen($post_date1) > 0) || (strlen($post_date2) > 0)){
	$cmr_action[$date_time_base1] = " [v]";
	if(empty($post_date1)) $post_date1 = "0001-01-01 00:00:00";
	if(empty($post_date2)) $post_date2 = date("Y-m-d H:i:s");
	$post_date1 = conv_unix_timestamp($post_date1);
	$post_date2 = conv_unix_timestamp($post_date2);
	$cmr_query .= " AND " . $post_not . " DATE_FORMAT(" . $true_table . "." . $date_time1 . ", '%Y-%m-%d %H:%i:%s') BETWEEN  cast('" . $post_date1 . "' as DATETIME) AND cast('" . $post_date2 . "' as DATETIME) ";
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
/**
 * complete  the sql string with the order condition
 */
if($post_order){
	$cmr_query .= " ORDER BY " . $true_table . "." . $post_order;
	if($post_desc) $cmr_query .=  " " . $post_desc;
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
return $cmr_query;
}
}

/*=================================================================*/
if(!(function_exists("cmr_query_search"))){
    /**
     * Saves the object to the database
     *
     **/
    function cmr_query_search($array_column = array(), $array_func = array(), $table = "", $accept = "", $search = "")
    {
		$str_query = "SELECT * FROM  " . $table . " WHERE ( " . $accept . " ";
		if(strlen($search) > 0) $str_query .= ") AND (0 ";

		foreach($array_column as $key => $value)
		if(strlen($search) > 0) {
			$str_query .= " OR " . $key . " " . search_func_column($array_func[$key], $value);
		}else{
			if(strlen($value) > 0) $str_query .= " AND " . $key . " " . search_func_column($array_func[$key], $value);
		}

		$str_query .= " ) ";
        return $str_query;
    }

}

/*=================================================================*/
/*=================================================================*/
if(!(function_exists("cmr_query_insert"))){
    /**
     * Clones object and saves it to database
     *
     * @return integer $column_id
     **/
    function cmr_query_insert($array_column = array(), $table = "", $accept = "")
    {
		$str_query = "";
        if($accept){
            $str_query = "INSERT INTO  " . $table . " values (";

            foreach($array_column as $key => $value)
            $str_query .= sprintf("'%s',", cmr_escape($value));
			$str_query = substr($str_query, 0, -1);
			$str_query .= ");";
		}

        return $str_query;
    	}

}

/*=================================================================*/
/*=================================================================*/
if(!(function_exists("cmr_query_update"))){
    /**
     * Saves object to database
     *
     * @return integer $column_id
     **/
    function cmr_query_update($array_column = array(), $array_id = array(), $column_id = NULL, $table = "", $accept = "")
    {
	$count = 0;
	$str_query = "UPDATE " . $table . " SET  ";
		foreach($array_column as $key => $value){
		if(empty($_SESSION["__update__"][$key]))$_SESSION["__update__"][$key] = "";
			if((strlen($value) > 0) && ($_SESSION["__update__"][$key] != $value)){
				$str_query .= sprintf($key . "= '%s',", cmr_escape($value));
				$count++;
			}
		}
	($column_id == "") ? $val_id = $array_id["value"] : $val_id = $column_id;
	$str_query = substr($str_query, 0, -1);
	$str_query .= sprintf(" WHERE " . $accept . " AND " . $array_id["key"] . " = '%s';", cmr_escape($val_id));
	if(empty($count)) return "";
	return $str_query;
    }

}

/*=================================================================*/
/*=================================================================*/
if(!(function_exists("cmr_query_delete"))){
        /**
         * Deletes object from database
         *
         * @return boolean
         **/
        function cmr_query_delete($array_id = array(), $column_id = NULL, $table = "", $accept = "")
        {
			empty($column_id) ? $val_id = $array_id["value"] : $val_id = $column_id;
			$str_query  = "DELETE FROM " . $table . " WHERE " . $accept;

			$list_id = "";
			if(is_array($val_id)){
					foreach($val_id as $key => $value)
					$list_id .= "'" . cmr_escape($value) . "',";

					$list_id = substr($list_id, 0, -1);
			}else{
			$list_id = "'" . cmr_escape($val_id) . "'";
			}

			$str_query .= " AND " . $array_id["key"] . " IN " . sprintf("(%s);", $list_id);
            return $str_query;
        }

}

/*=================================================================*/
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
if(!(function_exists("cmr_preview_sql"))){
    /**
     * cmr_preview_sql()
     *
     * @param array $conn
     * @param string $cmr_query
     * @param string $result_type
     * @param string $authorisation
     * @return
     **/
function cmr_preview_sql($conn, $cmr_query = "", $result_type = "", $authorisation = "")
{
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$affected_rows = 0;
if(empty($cmr_query))return $affected_rows;
//----------------------------
if($conn)
//$conn->SetFetchMode(ADODB_FETCH_ASSOC);
if($conn)
$result_query = sql_run("result", $conn, "", $cmr_query);
// $result_query = $conn->Execute($cmr_query) /*, $conn)*/ or db_die(__LINE__  . " - "  . __FILE__ . ": " . $conn->error);//$conn->ErrorMsg());
//if($result_query) $affected_rows = $result_query->RecordCount();
if($result_query) $affected_rows = $result_query->affected_rows;



// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if($authorisation){
?>
<fieldset class="bubble"><legend><?php print(cmr_translate("affectted row:") . $affected_rows);?></legend>
<?php
 $sql_text=highlight_string(wordwrap($cmr_query));
//  print($sql_text);
?>
</fieldset>
<br />
<?php
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if($result_type=="xml"){
?>
<fieldset class="bubble"><legend><?php  print(cmr_translate("xml mode:"));?></legend>
 <table class="normal_text" align="left" border="0">
  <tr> <td align="left" >
  <br />
 <?php
	print("<br />".htmlentities("<") . "<b>" . cmr_translate("sql_result") . "</b>" . htmlentities(">"));
 ?>
  <br />
  </td>
  </tr>
 </table>
 <br />


<?php
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if($conn)
$result_query = sql_run("result", $conn, "", $cmr_query);
// $result_query = $conn->Execute($cmr_query) /*, $conn)*/ or db_die(__LINE__  . " - "  . __FILE__ . ": " . $conn->error);//$conn->ErrorMsg());
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
<p align="left" class="normal_text">
<?php
  $icount = 1;
  if($result_query)
  while ($row_data = $result_query->fetch_row()){
	print("<br /><br /><br />".htmlentities("<") . "<b>" . cmr_translate("rown") . "</b>" . htmlentities(">"));

  foreach($row_data as $key => $value){
			print("<br /><b>".htmlentities("<").ucfirst(cmr_translate($key)).htmlentities(">"));
		   	print("</b><br />".wordwrap($value,100,'<br />',1));
			print("<br /><b>".htmlentities("</").ucfirst(cmr_translate($key)).htmlentities(">"));
		   	print("</b>");
	  }

	print("<br />".htmlentities("</") . "<b>" . cmr_translate("rown") . "</b>" . htmlentities(">"));
// 	$result_query->MoveNext();
	$icount++;
	if($icount > 1000) break;
   }
	print("<br />".htmlentities("</") . "<b>" . cmr_translate("sql_result") . "</b>" . htmlentities(">"));
?>
</p>
  </fieldset>
<?php
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
}else{
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>



 <p>
<fieldset class="bubble"><legend><?php  print(cmr_translate("table mode:"));?></legend>
 <table class="normal_text" align="left" border="1">
 <thead>
 <b>
 <tr>

 <td class="rown3">
 0
 </td>

 <td class="rown1">
 <input id="fiter_preview_query" value="yes" type="checkbox">
 </td>

<?php
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
  $row_data = @ $result_query->fetch_row();
  if($row_data)
  foreach($row_data as $key => $value){
		   print("<td onclick=\"show('number_preview_query')\" class=\"rown3\" align=\"left\"><b>");
			   print(ucfirst($key));
		   print("</b></td>");
	  }
//   foreach($row_data as $key => $value){
// 		   print("<td onclick=\"show('number_preview_query')\" class=\"rown3\" align=\"left\"><b>");
// 			   print($value);
// 		   print("</b></td>");
// 	  }
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
 </b>
 </tr>
 </thead>

 <tbody>
<?php
$icount=1;


while ($row_data = @ $result_query->fetch_row()){
?>
 <tr>

 <td class="rown3">
<?php
print($icount);
?>
 </td>

  <td class="rown1">
 <input id="fiter_preview_query" value="yes" type="checkbox">
 </td>

<?php
foreach($row_data as $key => $value){
   print("<td onclick=\"show('title_preview_query')\" class=\"rown2\" align=\"left\">");
   print(substr($value,0,30));
   if(strlen($value) > 30) print(" ...");
   print("</td>");
  }
?>
	 </tr>

  <?php
//   $result_query->MoveNext();
	$icount++;
	if($icount > 1000) break;

}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
  </tbody>
 </table>
  </fieldset>
 </p>
<?php
	}
    return $affected_rows;
    }
    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    /**
     * get_array_status( )
     *
     * @return
     **/
    /**
     * get_array_status( )
     *
     * @return
     **/
if(!function_exists("get_array_status")){
    function get_array_status()
    {
        // ======database connection==============
        //$conn = NewADOConnection($GLOBALS["dbms_type"]);
        //$conn->Connect($GLOBALS["dbms_host"], $GLOBALS["dbms_user"], $GLOBALS["dbms_pw"], $GLOBALS["dbms_name"]);
        $conn = mysqli($GLOBALS["dbms_host"], $GLOBALS["dbms_user"], $GLOBALS["dbms_pw"], $GLOBALS["dbms_name"]);
        // =======================================
		if($conn)
		$sql_status_result = sql_run("result", $conn, "", "SHOW STATUS;");
//         $sql_status_result = $conn->Execute("show status;") /*, $php_con_new) */ or db_die(__LINE__  . " - "  . __FILE__ . ": " . $conn->error);//$conn->ErrorMsg());
		if($sql_status_result)
        while (($status = $sql_status_result->fetch_row())){
            $array_status[$status[0]] = $status;
//             $sql_status_result->MoveNext();
        }
        return $array_status;
    };
    };
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    /**
     * get_array_variable()
     *
     * @return
     **/
if(!function_exists("get_array_variable")){
    function get_array_variable()
    {
        // ======database connection==============
        //$conn = NewADOConnection($GLOBALS["dbms_type"]);
        //$conn->Connect($GLOBALS["dbms_host"], $GLOBALS["dbms_user"], $GLOBALS["dbms_pw"], $GLOBALS["dbms_name"]);
    $conn = new mysqli($GLOBALS["dbms_host"], $GLOBALS["dbms_user"], $GLOBALS["dbms_pw"], $GLOBALS["dbms_name"]);
        // =======================================
    if ($conn->connect_errno) return array();
		if($conn) $sql_variable_result = sql_run("result", $conn, "", "SHOW VARIABLES;");
//         $sql_variable_result = $conn->Execute("show variables;") /*, $php_con_new) */ or db_die(__LINE__  . " - "  . __FILE__ . ": " . $conn->error);//$conn->ErrorMsg());
		if($sql_variable_result)
        while (($variable = $sql_variable_result->fetch_row())){
            $array_variable[$variable[0]] = $variable;
//             $sql_variable_result->MoveNext();
        }
        return $array_variable;
    };
    };
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    /**
     * get_array_db()
     *
     * @return
     **/
if(!function_exists("get_array_db")){
    function get_array_db()
    {
        // ======database connection==============
        //$conn = NewADOConnection($GLOBALS["dbms_type"]);
        //$conn->Connect($GLOBALS["dbms_host"], $GLOBALS["dbms_user"], $GLOBALS["dbms_pw"], $GLOBALS["dbms_name"]);
    $conn = new mysqli($GLOBALS["dbms_host"], $GLOBALS["dbms_user"], $GLOBALS["dbms_pw"], $GLOBALS["dbms_name"]);
    if ($conn->connect_errno) return array();
        // =======================================
		if($conn)
		$sql_db_result = sql_run("result", $conn, "", "SHOW DATABASES;");
//         $sql_db_result = $conn->Execute("show databases;") /*, $php_con_new) */ or db_die(__LINE__  . " - "  . __FILE__ . ": " . $conn->error);//$conn->ErrorMsg());
		if($sql_db_result)
        while (($db = $sql_db_result->fetch_row())){
            $array_db[$db[0]] = $db;
//             $sql_db_result->MoveNext();
        }
        return $array_db;
    };
    };
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    /**
     * get_array_tables()
     *
     * @param mixed $db_name
     * @return
     **/
if(!function_exists("get_array_tables")){
    function get_array_tables($db_name = "camaroes_db")
    {
		$array_tables = array();
        // ======database connection==============
        //$conn = NewADOConnection($GLOBALS["dbms_type"]);
        //$conn->Connect($GLOBALS["dbms_host"], $GLOBALS["dbms_user"], $GLOBALS["dbms_pw"], $GLOBALS["dbms_name"]);
    $conn = new mysqli($GLOBALS["dbms_host"], $GLOBALS["dbms_user"], $GLOBALS["dbms_pw"], $GLOBALS["dbms_name"]);
    if ($conn->connect_errno) return array();
        // =======================================
		if($conn)
		$sql_tables_result = sql_run("result", $conn, "", "SHOW TABLE STATUS FROM " . $db_name . ";");
//         $sql_tables_result = $conn->Execute("SHOW TABLE STATUS FROM $db_name;") /*, $php_con_new) */ or db_die(__LINE__  . " - "  . __FILE__ . ": " . $conn->error);//$conn->ErrorMsg());
		if($sql_tables_result)
        while (($tables = $sql_tables_result->fetch_row())){
            $array_tables[$tables['Name']] = $tables;
//             $sql_tables_result->MoveNext();
        }
        return $array_tables;
    };
    };
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    /**
     * get_array_index()
     *
     * @param mixed $table_name
     * @return
     **/
if(!function_exists("get_array_index")){
    function get_array_index($cmr_prefix, $table_name)
    {
		$array_columns = array();
    $short_table_name=cmr_searchi_replace("^" . $cmr_prefix, "", $table_name);
        // ======database connection==============
        // $all_rown_table=sql( "array_assoc", $php_con_new, "show_index", "", $GLOBALS["dbms_name"],  $table_name, "", cmr_get_config("cmr_max_view"), "", $GLOBALS["dbms_host"], $GLOBALS["dbms_user"], $GLOBALS["dbms_pw"]);
        // print_r($all_rown_table);
        //$conn = NewADOConnection($GLOBALS["dbms_type"]);
        //$conn->Connect($GLOBALS["dbms_host"], $GLOBALS["dbms_user"], $GLOBALS["dbms_pw"], $GLOBALS["dbms_name"]);
    $conn = new mysqli($GLOBALS["dbms_host"], $GLOBALS["dbms_user"], $GLOBALS["dbms_pw"], $GLOBALS["dbms_name"]);
    if ($conn->connect_errno) return array();
        // =======================================
		if($conn)
		$sql_column_result = sql_run("result", $conn, "", "SHOW INDEX FROM  " . $cmr_prefix . trim($short_table_name) . ";");
//         $sql_column_result = $conn->Execute("show index from  " . $cmr_prefix . trim($short_table_name) . ";") /*, $php_con_new) */ or db_die(__LINE__  . " - "  . __FILE__ . ": " . $conn->error);//$conn->ErrorMsg());
		if($sql_column_result)
        while (($columns = $sql_column_result->fetch_row())){
            $array_columns[] = $columns;
//             $sql_column_result->MoveNext();
        }
        // print_r($array_columns);exit;
        return $array_columns;
    };
    };
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
// ==============================================================
if(!function_exists("get_all_columns")){
    function get_all_columns($conn, $cmr_prefix, $table, $list_column = "")
    {
	 $array_columns = array();
	 if($conn) //$conn->SetFetchMode(ADODB_FETCH_ASSOC);
	 if($conn)
	 $sql_column_result = sql_run("result", $conn, "", "EXPLAIN " . $cmr_prefix . trim($table) . ";");
	 //----------------------
	 if($sql_column_result)
     if(trim($list_column)){
            while (($columns = $sql_column_result->fetch_assoc()))
            if(cmr_search($columns["Field"], $list_column))
            $array_columns[] = $columns;
     }else{
		  while (($columns = $sql_column_result->fetch_assoc())){
		  $array_columns[] = $columns;
			}
	  }
	 //----------------------
	 return $array_columns;
    };
    };
// ==============================================================
/*=================================================================*/
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    /**
     * get_array_columns()
     *
     * @param mixed $table_name
     * @return
     **/
if(!function_exists("get_array_columns")){
    function get_array_columns($cmr_prefix, $table_name, $list_column = "")
    {
		$array_columns = array();
        $short_table_name = cmr_searchi_replace("^" . $cmr_prefix, "", $table_name);
        // ======database connection==============
        //$conn = NewADOConnection($GLOBALS["dbms_type"]);
        //$conn->Connect($GLOBALS["dbms_host"], $GLOBALS["dbms_user"], $GLOBALS["dbms_pw"], $GLOBALS["dbms_name"]);
        $conn = mysqli($GLOBALS["dbms_host"], $GLOBALS["dbms_user"], $GLOBALS["dbms_pw"], $GLOBALS["dbms_name"]);
        // =======================================
	 if($conn) //$conn->SetFetchMode(ADODB_FETCH_ASSOC);
		if($conn)
        if(cmr_search("[[:space:]]", trim($table_name))){
			$sql_column_result = sql_run("result", $conn, "", trim($table_name));
        }else{
			$sql_column_result = sql_run("result", $conn, "", "EXPLAIN " . $cmr_prefix . trim($short_table_name) . ";");
        }
    // ==========================
		if($sql_column_result)
        if(trim($list_column)){
            while (($columns = $sql_column_result->fetch_assoc()))
            if(cmr_search($columns["Field"], $list_column))
            $array_columns[$columns["Field"]] = $columns;
        }else{
            while (($columns = $sql_column_result->fetch_assoc()))
            $array_columns[$columns["Field"]] = $columns;
        }
    // ==========================
        // print_r("<hr />" . $array_columns);exit;
        return $array_columns;
    };
    };
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    /**
     * get_table_columns()
     *
     * @param mixed $table_name
     * @return
     **/
if(!function_exists("get_table_columns")){
    function get_table_columns($db_name, $table_name, $list_column = "", $conn)
    {
	 if($conn) //$conn->SetFetchMode(ADODB_FETCH_ASSOC);
		$array_columns = array();
        // =======================================
		if($conn)
        if(cmr_search("[[:space:]]", trim($table_name))){
			$sql_column_result = sql_run("result", $conn, "", trim($table_name));
        }else{
			$sql_column_result = sql_run("result", $conn, "", "SHOW FULL COLUMNS FROM " . $db_name . "." . $table_name . ";");
        }
    // ==========================
     $i=0;
	 if($sql_column_result)
     if(trim($list_column)){
            while (($columns = $sql_column_result->fetch_assoc())){
	            if(cmr_search($columns["Field"], $list_column)){
                $array_columns[0][$i] = $columns["Field"];
                $array_columns[1][$columns["Field"]] = $columns;
				$i++;
				}
        	}

     }else{
            while (($columns = $sql_column_result->fetch_assoc())){
                $array_columns[0][$i] = $columns["Field"];
                $array_columns[1][$columns["Field"]] = $columns;
				$i++;
        	}
    }
    // ==========================
        return $array_columns;
    };
};
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
     /**
     * write_gen_database( )
     *
     * @return
     **/
   function write_gen_database($conn, $create_path = "", $models_text = "", $name = "", $send_type = "other", $cmr_version = "1.0")
    {
            $sql_query = "REPLACE INTO cmr_source_code (";
            $sql_query .= " id, name, path, language, lang_version, code_version, type, state, author, copyright, my_md5, license, text, date_time )";
            $sql_query .= " VALUES (";
            $sql_query .= " '', '" . $name . "',  '" . cmr_escape($create_path) . "', 'php',  '" . PHP_VERSION . "', 'Camaroes version" . cmr_escape($cmr_version) . "', '" . $send_type . "', 'enable', 'Tchouamou Eric Herve  (tchouamou@gmail.com)', 'Tchouamou Eric Herve  (tchouamou@gmail.com)', '" . cmr_escape(md5($models_text)) ."', 'GPL',  '" . cmr_escape($models_text) . "', NOW()";
            $sql_query .= " );";

            $affected_rows = 0;
		if($conn)
		$query_result = sql_run("result", $conn, "", $sql_query);
//             $query_result = $conn->Execute($sql_query)  or print($conn->error);//$conn->ErrorMsg());
            if($query_result) $affected_rows = $query_result->affected_rows;
// 	        $query_result->Close();
		    return $affected_rows;
	}
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    /**
     * eval_lang()
     *
     * @param string $arg1
     * @param string $arg2
     * @param string $language
     * @return
     **/
if(!function_exists("eval_lang")){
    function eval_lang($arg1 = "", $arg2 = "", $language = "english")
    {
	    $arg3 = ucfirst(str_replace("_", " ", $arg2));
	    $sql_query = "REPLACE INTO cmr_translate (id, code, language, text, translate_language, translate_text, date_time) ";
	    $sql_query .= " VALUES ('', '".cmr_escape($arg1)."', 'english', '".cmr_escape($arg3)."', '".cmr_escape($language)."', '".cmr_escape(cmr_translate($arg2, "english", $language))."', NOW())";
// 	    $conn = cmr_get_db_connection();
//     @ $result = $conn->Execute($sql_query); //  or db_die(__LINE__  . " - "  . __FILE__ . ": " . $conn->error);//$conn->ErrorMsg());
        return  $arg1 . "=" . ucfirst(str_replace("_", " ", cmr_translate($arg2, "english", $language))) . "\n";
    }
    }
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
//     /**
//      * eval_notify()
//      *
//      * @param string $source
//      * @param string $destination
//      * @param string $action
//      * @param string $language
//      * @return
//      **/
// if(!function_exists("eval_notify")){
//     function eval_notify($conn, $source = "", $destination = "", $action = "", $language = "english")
//     {
// 	    $sql_query = "SELECT * FROM `cmr_notify`";
// 	    $sql_query .= " WHERE `source` = '1'";
// 	    $sql_query .= " AND `destination` = '1'";
// 	    $sql_query .= " AND `action` = '1'";
//  	    $sql_query .= " AND `language` = '1'";
// if($conn)
//  	    $query_result = sql_run("array_assoc", $conn, "sql", $sql_query);
//         return  $query_result;
//     }
//     }
//     //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(!(function_exists("cmr_db_data"))){
    /**
     * cmr_db_data()
     *
     * @param $database_conn
     * @return array
     **/
function cmr_db_data($database_conn, $level_db = "", $level_table = "", $level_column = "", $sql_query = "")
{
  $data = array();
  $data_final = array();

  if(empty($sql_query))
  if($level_column){
	$sql_query = "SHOW FULL COLUMNS FROM  " . $level_db . "." . $level_table . " LIKE '" . $level_column . "';";
  }elseif($level_table){
	$sql_query = "SHOW FULL COLUMNS FROM  " . $level_db . "." . $level_table . ";";
  }elseif($level_db){
	$sql_query = "SHOW TABLE STATUS FROM " . $level_db . ";";
  }else{
	$sql_query = "SHOW DATABASES;";
  }


 //$database_conn->SetFetchMode(ADODB_FETCH_ASSOC);
 $result_query = sql_run("result", $database_conn, "", $sql_query);
//  $result_query = &$database_conn->Execute($sql_query) /*, $database_conn)*/ or db_die(__LINE__  . " - "  . __FILE__ . ": " . $database_conn->ErrorMsg());
 while ($row_data = @ $result_query->fetch_assoc()){
	if($row_data) foreach($row_data as $key => $value) $data[$key] = $value;
	$data_final[] = $data;
   }
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	return $data_final;
 }
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
