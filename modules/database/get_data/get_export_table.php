<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * get_export_table.php
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
 * $cmr->query[0]Is used for keeping
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
 **/
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once("camaroes_class.php");
include_once("common_begin.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// case "@_form_@"://When Working in data send by  form [export_table.php]
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->config = $cmr->include_conf($cmr->get_path("module") . "modules/database/conf.d/conf_table.ini", $cmr->config, "var");
include_once($cmr->get_path("module") . "modules/database/function/func_table.php");
include_once($cmr->get_path("module") . "modules/database/class/class_table.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

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

// // ----------------            
// $cmr->language = $cmr->load_lang_need("generators.php");
// $cmr->config = $cmr->load_conf_need("conf_generators.ini");
// $cmr->help = $cmr->load_help_need("generators.php");

// $cmr->action["module_name"] = "form_generator.php";
// $cmr->action["to_load"] = "load_func_need";
// include($cmr->get_path("index") . "system/loader/loader_function.php");
// $cmr->action["to_load"] = "load_class_need";
// include($cmr->get_path("index") . "system/loader/loader_class.php");
// // ----------------            

// ----------------            
include($cmr->get_path("func") . "function/func_zip.php");
// ----------------            

// ----------------            
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
// ----------------            

// ----------------            
$export_type=get_post('export_type', 'post', $cmr->session['pre_match']);
$export_limit=get_post('export_limit', 'post', $cmr->session['pre_match']);
$export_where=get_post('export_where', 'post', $cmr->session['pre_match']);
$into_outfile=get_post('into_outfile', 'post', $cmr->session['pre_match']);
$fields_terminated_by=get_post('fields_terminated_by', 'post', $cmr->session['pre_match']);
$optionally_enclosed_by=get_post('optionally_enclosed_by', 'post', $cmr->session['pre_match']);
$lines_terminated_by=get_post('lines_terminated_by', 'post', $cmr->session['pre_match']);
// -----------------------------------------------------
if(empty($export_type)) $export_type = "txt.txt";
if(empty($export_limit)) $export_limit = "100";
if(empty($export_where)) $export_where = "1";
if(empty($into_outfile)) $into_outfile = "result.txt";
if(empty($fields_terminated_by)) $fields_terminated_by = ",";
if(empty($optionally_enclosed_by)) $optionally_enclosed_by = "\'";
if(empty($lines_terminated_by)) $lines_terminated_by = "\n\r";

// -----------------------------------------------------
$c->get_form_datas("post", "");//Getting variables sended by form [export_table.php]
// -----------------------------------------------------


// -----------------------------------------------------
foreach($array_columns as $key => $value){
if(get_post($value, "post", $cmr->get_session("pre_match"))) $array_list_column[$value] = $value;
}
// -----------------------------------------------------


// -----------------------------------------------------
asort($array_list_column);
$list_column = implode($array_list_column, ", ");
// -----------------------------------------------------
$cmr->output[0] = "";

// -----------------------------------------------------
switch($export_type){
	case "xml":
	$model_file = $cmr->get_path("model") . "model/xml/export.xml";
	break;
	
	case "tex":
	$model_file = $cmr->get_path("model") . "model/pdf/export.tex";
	break;
	
	case "html":
	$model_file = $cmr->get_path("model") . "model/html/export.html";
	break;
	
	case "word":
	case "doc":
	$model_file = $cmr->get_path("model") . "model/doc/export.doc";
	break;
	
	case "pdf":
	$model_file = $cmr->get_path("model") . "model/pdf/export.pdf";
	break;
	
	case "xls":
	$model_file = $cmr->get_path("model") . "model/xls/export.xls";
	break;
	
	case "text":
	case "txt":
	$model_file = $cmr->get_path("model") . "model/txt/export.txt";
	break;
	
	case "cvs":
	$model_file = $cmr->get_path("model") . "model/cvs/export.cvs";
	break;
	
	case "sql":
	$model_file = $cmr->get_path("model") . "model/sql/export.sql";
// -----------------------------------------------------
//  $cmr->query[0]= "select *  " . $cmr->config["cmr_table_prefix"] . "ticket ;";
//  $cmr->query[0]= $c->query_export();
// -----------------------------------------------------
	break;
	
	default:
		$cmr->query[0] = " SELECT * INTO OUTFILE '" . ($into_outfile) . "'";
		$cmr->query[0].= " FIELDS TERMINATED BY '" . ($fields_terminated_by) . "' OPTIONALLY ENCLOSED BY '" . $optionally_enclosed_by . "'";
		$cmr->query[0].= " LINES TERMINATED BY '" . ($lines_terminated_by) . "'";
		$cmr->query[0].= " FROM " . $database . "." . $table_name;
	break;

}
// -----------------------------------------------------
$cmr->post_files["attachment_location"] = $cmr->get_path("index") . "home/groups/" . $cmr->get_user("auth_groups") . "/attach/";
// -----------------------------------------------------
switch($export_type){
	case "xml":
	case "html":
	case "word":
	case "doc":
	case "tex":
	case "pdf":
	case "sql":
	case "xls":
	case "text":
	case "txt":
	case "cvs":
	$export_data = generate(file_get_contents($model_file), $database, "export_" . "table", $table_name, "", $list_column, $export_where,  $export_limit);
	break;
	default:
	// ------------
    $result = &$database_conn->Execute($cmr->query[0]) /*, $database_conn)*/ or db_die(__LINE__  . " - "  . __FILE__ . ": " . $database_conn->ErrorMsg()); // or db_die(__LINE__  . " - "  . __FILE__ . ": " . $database_conn->ErrorMsg());
	$export_data = file_get_contents($into_outfile);
	$cmr->output[0] .= "<p>" .  $cmr->translate(" Click here") . " -> <h2>" . file_link($into_outfile) . "</h2> - " . $cmr->translate(" to download the result") . "</p>";
	// ------------
	break;

}
// 	print_r($export_data);
// -----------------------------------------------------
	$tmpfname = tempnam ($cmr->post_files["attachment_location"], "export_" . date("Y_m_d_h_i_s_")) . "." . $export_type;
	if($fich = fopen($tmpfname, "w")){
		fputs($fich, $export_data);
		fclose($fich);
// 		export($cmr->config, "", $export_type, $tmpfname, "1");
	    $cmr->output[0] .= "<p>" .  $cmr->translate(" Click here") . " -> <h2>" . file_link($tmpfname) . "</h2> - " . $cmr->translate(" to download the result") . "</p>";
	}else{
		print($export_data);
	};
// -----------------------------------------------------
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->log_to_db("'" . $cmr->get_user("auth_email") . "', '" . $cmr->config["cmr_table_prefix"] . "table', '" . $cmr->get_session("id") . "' ,'export'");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


/**
*
*Creating the appropriate SQL string for  export_table
*
**/

/**
*
*Creating the appropriate Message to be send to the administrator
*
**/


/**
*
*Select next module who will trait these var
*
**/


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$cmr->page["middle1"] = $cmr->get_path("index") . "system/run_result.php";
	$cmr->page["middle2"] = $cmr->get_module("path");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// $c->close();
// -----------------------------------------------------
?>