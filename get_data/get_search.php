<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * search.php
 * ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */
/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























search.php,Ver 3.0  2011 05:49:24
*/

/**
 * Information about
 * $cmr->post_var["sql_imap"] and $cmr->post_var["sql"] Is used for keeping
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
// case "search"://When Working in data send by form [search]

// ----------------------------
// ----------------------------
if(get_post("search_text")) $cmr->post_var["search_text"] = get_post("search_text");
if(get_post("table")) $cmr->post_var["sql_table"] = trim(get_post("table"));
if(get_post("column")) $cmr->post_var["sql_column"] = trim(get_post("column"));
if(get_post("cmr_action")) $cmr->post_var["cmr_action"] = get_post("cmr_action");


if(empty($cmr->post_var["cmr_action"])) $cmr->post_var["cmr_action"] = "like";
if(empty($cmr->post_var["sql_table"])) $cmr->post_var["sql_table"] = "all";
if(empty($cmr->post_var["sql_column"])) $cmr->post_var["sql_column"] = "all";
if(empty($cmr->post_var["search_text"])) $cmr->post_var["search_text"] = "";

//----------------------------
//----------------------------
// $tables=sql_run("array", $cmr->db_connection, "show_tables", "", $cmr->get_conf("db_name"));
// foreach($tables[0] as $tab){
// $tab_key='sql_'.$tab;
// unset($cmr->post_var[$tab_key]);
// }
// //----------------------------
// //----------------------------
// ------
$column_type = "-";
$list_type = "_";
// echo "0 table=$cmr->post_var["sql_table"] column=$cmr->post_var["sql_column"] ";
if(($cmr->post_var["sql_table"] != "all") && (!cmr_search(",", $cmr->post_var["sql_table"]))){ // --table different to all ---
    if(($cmr->post_var["sql_column"] != "all")){ // --column different to all ----
        // echo " 1 table=$cmr->post_var["sql_table"] column=$cmr->post_var["sql_column"] ";
        // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
//----------------------------
		$cmr->action["table_name"] = $cmr->post_var["sql_table"];
		$cmr->action["column"] = "";
		$cmr->action["action"] = "select";
		$cmr->action["where"] = cmr_where_query($cmr->config, $cmr->user, $cmr->action, $cmr->db_connection);
//----------------------------
        
		$cmr->post_var["sql"] = "SELECT * FROM " . $cmr->post_var["sql_table"];
        $cmr->post_var["sql"] .= " WHERE (( 0 ";

        $cmr->post_var["sql"] .= " OR " . $cmr->post_var["sql_column"] . search_func_column($cmr->post_var["cmr_action"], $cmr->post_var["search_text"]);

            $cmr->post_var["sql"] .= ") AND " . $cmr->action["where"].") "; //call_log_group  in ($sg)) ";
        // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    }else{ // --- column equal all----
    
    

        // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        $cmr->post_var["sql"] = "SELECT * FROM " . $cmr->post_var["sql_table"];
        $cmr->post_var["sql"] .= " WHERE (( 0 ";
// //----------------------------
		$cmr->action["table_name"] = $cmr->post_var["sql_table"];
		$cmr->action["column"] = "";
		$cmr->action["action"] = "select";
		$cmr->action["where"] = cmr_where_query($cmr->config, $cmr->user, $cmr->action, $cmr->db_connection);
// //----------------------------
// //----------------------------
// //----------------------------
        if(is_database($cmr->post_var, "table")){
			// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
			if(empty($cmr->db_connection)) $cmr->db_connection = NewADOConnection($cmr->db["db_type"]);
			if(!empty($cmr->db["db_name"])){
				$cmr->db_connection->Connect($cmr->db["db_host"], $cmr->db["db_user"], $cmr->db["db_pw"], $cmr->db["db_name"]) or db_die(__LINE__  . " - "  . __FILE__ . ": " . $cmr->db_connection->ErrorMsg());
				if(1){ //(!cmrdb_select_db($cmr->db["db_name"], $cmr->db_connection))
					// cmrdb_select_db($cmr->get_conf("db_name"), $cmr->db_connection) or print($cmr->db_connection->ErrorMsg());
				}
			}
			if(empty($cmr->db_connection)) $cmr->db_connection = $cmr->db_connection;
			// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        $colums = sql_run("array", $cmr->db_connection, "show_columns", "", $cmr->post_var["current_database"], $cmr->post_var["current_table"]);
        }else{
        $colums = sql_run("array", $cmr->db_connection, "show_columns", "", $cmr->get_conf("db_name"), $cmr->post_var["sql_table"]);
        } 
// //----------------------------
// //----------------------------
// //----------------------------
		if($colums[0])
        foreach($colums[0] as $col){
            $cmr->post_var["sql"] .= " OR $col" . search_func_column($cmr->post_var["cmr_action"], $cmr->post_var["search_text"]);
        }

            $cmr->post_var["sql"] .= ") AND (" . $cmr->action["where"].")) "; //call_log_group  in ($sg)) ";
        // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        // echo "<br />\$cmr->post_var[\"sql\"] = ".$cmr->post_var["sql"]."<br />";
    }
}else{ // --table equal all  ----
    // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    if(cmr_search(",", $cmr->post_var["sql_table"])){ 
	    $tables[0] = explode(",", $cmr->post_var["sql_table"]);
    }else{
    	$tables = sql_run("array", $cmr->db_connection, "show_tables", "", $cmr->get_conf("db_name"));
	}
	
	if($tables[0])
    foreach($tables[0] as $tab){
	    $tab = trim($tab);
        $tab_key = 'sql_' . $tab;
//----------------------------
		$cmr->action["table_name"] = $tab;
		$cmr->action["column"] = "";
		$cmr->action["action"] = "select";
		$cmr->action["where"] = cmr_where_query($cmr->config, $cmr->user, $cmr->action, $cmr->db_connection);
//----------------------------
        if(!($cmr->post_var["sql_column"] == "all")){ // ---column != all---
            $cmr->post_var[$tab_key] = "SELECT * FROM " . $tab;
            $cmr->post_var[$tab_key] .= " WHERE (( 0 ";
            $cmr->post_var[$tab_key] .= " OR " . $cmr->post_var["sql_column"] . search_func_column($cmr->post_var["cmr_action"], $cmr->post_var["search_text"]);
            // ----------
            $cmr->post_var[$tab_key] .= ") AND (" . $cmr->action["where"].")) ";
//             cmr_where_query($cmr->post_var["sql_table"] = "cmr_user", $email = "guess@localhost", $group = "guess", $type = "0", $list_group = "guest", $cmr->db_connection=0)
        }else{ // ---column = all---
            $colums = sql_run("array", $cmr->db_connection, "show_columns", "", $cmr->get_conf("db_name"), $tab);
            // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
            $cmr->post_var[$tab_key] = "SELECT * FROM " . "$tab";
            $cmr->post_var[$tab_key] .= " WHERE (( 0 ";

		if($colums[0])
            foreach($colums[0] as $col){
                $cmr->post_var[$tab_key] .= " OR $col" . search_func_column($cmr->post_var["cmr_action"], $cmr->post_var["search_text"]);
            }
            $cmr->post_var[$tab_key] .= ") AND (" . $cmr->action["where"].")) ";
            // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
            // echo "===".$tab_key."===".$cmr->post_var[$tab_key]."<br />";
        }
    }
}
// --------define next layout ----------
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->log_to_db("'" . $cmr->get_user("auth_email") . "', '" . $cmr->post_var["sql_table"] . "', '" . $cmr->get_session("id") . "' ,'search " . $cmr->post_var["search_text"] . "'");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->page["middle1"] = $cmr->get_path("module") . "modules/view_search.php";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>