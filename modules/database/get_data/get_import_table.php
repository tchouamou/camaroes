<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * get_import_table.php
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */
/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */

/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.











get_import@_table_name_@.php, Ver 3.03 
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
// case "@_form_@"://When Working in data send by form [import_table.php]

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
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
$cmr->config = $cmr->include_conf($cmr->get_path("module") . "modules/database/conf.d/conf_table.ini", $cmr->config, "var");
include_once($cmr->get_path("module") . "modules/database/function/func_table.php");
include_once($cmr->get_path("module") . "modules/database/class/class_table.php");
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
$import_type = get_post('import_type', 'post', $cmr->session['pre_match']);
$infile = get_post('infile', 'post', $cmr->session['pre_match']);
$import_text = get_post('import_text', 'post', $cmr->session['pre_match']);
$import_action = get_post('import_action', 'post', $cmr->session['pre_match']);
$fields_terminated_by = get_post('fields_terminated_by', 'post', $cmr->session['pre_match']);
$fields_optionally_enclosed_by = get_post('fields_optionally_enclosed_by', 'post', $cmr->session['pre_match']);
$fields_escaped_by = get_post('fields_escaped_by', 'post', $cmr->session['pre_match']);
$lines_starting_by = get_post('lines_starting_by', 'post', $cmr->session['pre_match']);
$lines_terminated_by = get_post('lines_terminated_by', 'post', $cmr->session['pre_match']);
$ignore_number_lines = get_post('ignore_number_lines', 'post', $cmr->session['pre_match']);
// -----------------------------------------------------
if(empty($import_type)) $import_type = "txt";
if(empty($infile)) $infile = "";
if(empty($import_text)) $import_text = "";
if(empty($import_action)) $import_action = "";
if(empty($fields_terminated_by)) $fields_terminated_by = ",";
if(empty($fields_optionally_enclosed_by)) $fields_optionally_enclosed_by = '"';
if(empty($fields_escaped_by)) $fields_escaped_by = "\\";
if(empty($lines_starting_by)) $lines_starting_by = " ";
if(empty($lines_terminated_by)) $lines_terminated_by = "\n";
if(empty($ignore_number_lines)) $ignore_number_lines = "1";


// -----------------------------------------------------
$c->get_form_datas("post", "");//Getting variables sended by form [import table.php]
// -----------------------------------------------------


// -----------------------------------------------------
foreach($array_columns as $key => $value){
	$array_list_column[get_post($value)] = $value;
}
// -----------------------------------------------------



// -----------------------------------------------------
asort($array_list_column);
$list_column = implode($array_list_column, ", ");
// -----------------------------------------------------


// -----------------------------------------------------
$cmr->post_files["attachment_location"] = $cmr->get_path("index") . "home/groups/" . $cmr->get_user("auth_groups") . "/attach/";
$cmr->post_files = get_post_files($cmr->config, $cmr->post_files);
$tmpfname1 = $cmr_post_files["attachment"];
$infile=$tmpfname1;
// -----------------------------------------------------
if($import_text){
// ------------
$tmpfname2 = tempnam ($cmr->post_files["attachment_location"], "import_text_" . date("Y_m_d_h_i_s") . ".txt");
$fich = fopen($tmpfname2, "r");
fputs($fich, $import_text);
fclose($fich);
// ------------
$tmpfname3 = tempnam ($cmr->post_files["attachment_location"], "import_upload_" . date("Y_m_d_h_i_s") . ".txt");
$all_text = file_get_contents($tmpfname1) . "\n" . file_get_contents($tmpfname2);
$fich = fopen($tmpfname3, "r");
fputs($fich, $all_text);
fclose($fich);
// ------------
$infile=$tmpfname3;
}
// -----------------------------------------------------
switch($import_type){
	case "xml":
	// ------------
	$new_text=xml_to_xls($infile);
	// ------------
	$tmpfname4 = tempnam ($cmr->post_files["attachment_location"], "import_xml_" . date("Y_m_d_h_i_s") . ".txt");
	$fich = fopen($tmpfname4, "r");
	fputs($fich, $new_text);
	fclose($fich);
	// ------------
	$infile=$tmpfname4;
	break;
	case "text":
	case "cvs":
	case "xls":
	case "sql":
	default:
	break;
}
// -----------------------------------------------------
// -----------------------------------------------------
switch($import_type){
	case "xml":
	case "sql":
		$cmr->query[0] = file_get_contents($infile);
	break;
	case "text":
	case "cvs":
	case "xls":
	default:
		/*
		Creating the appropriate SQL string for  import_table
		*/

		$cmr->query[0] = "LOAD DATA LOCAL INFILE '" . $infile . "'";
		$cmr->query[0] .= " " . strtoupper($import_action) . " ";
		$cmr->query[0] .= " INTO TABLE " . $database . "." . $table_name;
// 		$cmr->query[0] .= " FIELDS ";
// 		$cmr->query[0] .= " TERMINATED BY '" . ($fields_terminated_by) . "' ";
// 		$cmr->query[0] .= " OPTIONALLY  ENCLOSED BY '" . ($fields_optionally_enclosed_by) . "' ";
// 		$cmr->query[0] .= " ESCAPED BY '" . ($fields_escaped_by) . "' ";
// 		$cmr->query[0] .= " LINES STARTING BY '" . ($lines_starting_by) . "' ";
// 		$cmr->query[0] .= " TERMINATED BY '" . ($lines_terminated_by) . "' ";
// 		$cmr->query[0] .= " IGNORE " . ($ignore_number_lines) . " LINES ";
// 		$cmr->query[0] .= "[(col_name,...)]";
	break;
}
// -----------------------------------------------------
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->log_to_db("'" . $cmr->get_user("auth_email") . "', '" . $cmr->config["cmr_table_prefix"] . "table', '" . $cmr->get_session("id") . "' ,'import'");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!




/*
Select next module who will trait these var
*/


// -----------------------------------------------------
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$cmr->page["middle1"] = $cmr->get_path("index") . "system/run_result.php";
	$cmr->page["middle2"] = $cmr->get_module("path");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>