<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * preview_table.php
 * ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */
/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */

/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























preview_table.php, Ver 3.03
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
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->config = $cmr->include_conf($cmr->get_path("module") . "modules/database/conf.d/conf_table.ini", $cmr->config, "var");
include_once($cmr->get_path("module") . "modules/database/function/func_table.php");
// // include_once($cmr->get_path("module") . "modules/database/class/class_table.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// $cmr_data = cmr_db_init_data($cmr->db_connection, $cmr->config, $cmr->post_var, $cmr->db, $result_type)
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$val_table = array();
if(empty($cmr->post_var["current_dbms"])) $cmr->post_var["current_dbms"] = $cmr->get_conf("db_type");
$database = $cmr->post_var["current_database"];
$table_name = $cmr->post_var["current_table"];
$base_name = $mod->base_name;
$val_table["_database_"] = $database;
$val_table["_table_"] = $table_name;
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->action["table_name"] = $cmr->post_var["current_table"];
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(empty($database_conn)) $database_conn = NULL;
$database_conn = database_connect($cmr->db_connection, $database_conn, $cmr->db);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$the_columns = get_all_columns($database_conn, "", $database . "." . $table_name);
if($the_columns)
foreach($the_columns as $one_columns) $all_columns[0][] = $one_columns["Field"];
$all_columns[1] = $the_columns;

$array_columns = $all_columns[0];
$column_id = column_id($all_columns[1]);
$_date_time1 = column_date_time($all_columns[1]);
$val_table["_column_id_"] = $column_id;
$val_table["_date_time1"] = $_date_time1;

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// $cmr->post_var["class_module"] = get_post("class_module");
//
// if((!empty($cmr->post_var["class_module"]))||(!empty($cmr->post_var["cmr_get_data"]))){
//      include_once($cmr->get_path("index") . "system/loader/loader_get.php");
// }
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(get_post("id_table")) $cmr->post_var["id_table"] = get_post("id_table");
if(empty($cmr->post_var["id_table"])) $cmr->post_var["id_table"] = $cmr->get_column($database . "." . $table_name, $column_id);
if(empty($cmr->post_var["id_table"])){
	print($cmr->translate("No " . $table_name . " selected! clic here => "));
	print($cmr->module_link("modules/view_table.php?conf_name=conf_table" . $cmr->get_ext("conf") . "&id_table=", 1));
	print($cmr->translate(" to select one."));
//     return;
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$view->prints["match_table"] = $table_name;
$view->prints["match_column_id"] = $column_id;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// $division->module["name"]= $mod->name;



$division->module["title"] = $cmr->module_link("modules/database/databases.php?current_dbms=" . $cmr->post_var["current_dbms"], "", $cmr->post_var["current_dbms"]);
$division->module["title"] .= " => " . $cmr->module_link("modules/database/tables.php?current_database=" . $cmr->post_var["current_database"], "", $cmr->post_var["current_database"]);
$division->module["title"] .= " => " . $cmr->module_link("modules/database/columns.php?current_table=" . $cmr->post_var["current_table"], "", $cmr->post_var["current_table"]);
// $division->module["text"] = "";







$division->themes["header_visible"] = 1;
$division->themes["header_tools_left"] = 0;
$division->themes["header_tools_right"] = 0;
$division->themes["header_bgcolor"] = "#000000";
$division->themes["header_color"] = "#FFFFFF";
$division->themes["header_align"] = "left";
$division->themes["header_border"] = "1";
$division->themes["header_bgimage_left"] = "@";
$division->themes["header_bgimage_middle"] = "@";
$division->themes["header_bgimage_right"] = "@";
$division->themes["header_mouse_effect"] = "1";
$division->prints["match_open_windows"] = $division->show_noclose();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


$division->prints["match_table_title1"] = $cmr->translate($mod->base_name . " " . $table_name);
$division->prints["match_table_title2"] = "";

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_menu_db"] = "";
if(empty($cmr->post_var["current_table"])) $cmr->post_var["current_table"] = "";
if($cmr->user["authorisation"] >= $cmr->get_conf("cmr_noc_type"))
$division->prints["match_menu_db"] = cmr_menu_db($database_conn, "", $cmr->post_var["current_database"], $cmr->post_var["current_table"], $cmr->post_var["current_column"]);

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


$division->prints["match_legend_link"] = $cmr->translate("Links");


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/database/preview_table.php?conf_name=modules/database/conf.d/conf_table.ini&current_table=" . $cmr->post_var["current_table"] . "", 1, $cmr->translate("preview"));
$lk->add_link("modules/database/update_table.php?conf_name=modules/database/conf.d/conf_table.ini&current_table=" . $cmr->post_var["current_table"] . "", 1, $cmr->translate("update"));
$division->prints["match_open_tab"] = $lk->open_module_tab(0);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/database/login_db.php?current_table=" . $cmr->post_var["current_table"] ,1);
$lk->add_link("modules/database/databases.php?current_table=" . $cmr->post_var["current_table"] ,1);
$lk->add_link("modules/database/tables.php?conf_name=modules/database/conf.d/conf_table.ini&current_table=" . $cmr->post_var["current_table"], 1);
$lk->add_link("modules/database/columns.php?current_table=" . $cmr->post_var["current_table"] ,1);
$lk->add_link("modules/database/query_db.php?conf_name=conf.d/conf_query.ini&current_table=" . $cmr->post_var["current_table"], 1);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$division->prints["match_list_link"] = $lk->list_link();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$division->prints["match_www_path"] = $cmr->get_path("www");


$division->prints["match_legend_table"] = $cmr->translate($table_name);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!



// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->action["table_name"] = $table_name;
$cmr->action["column"] = "";
$cmr->action["action"] = "select";
$cmr->action["where"] = cmr_where_query($cmr->config, $cmr->user, $cmr->action, $database_conn);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->query["preview"] = "SELECT * FROM  " . $database . "." . $table_name . " ";
$cmr->query["preview"] .=" WHERE (" . $column_id . " = " . sprintf("'%s'", cmr_escape($cmr->post_var["id_table"]));
$cmr->query["preview"] .= ")  ";
$cmr->query["preview"] .= " AND " . $cmr->action["where"];
//$cmr->query["preview"] .= " LIMIT 1;";
// -----------

$result_preview = &$database_conn->query($cmr->query["preview"]);//, $cmr->get_conf("cmr_max_view")) /*, $database_conn)*/ or db_die(__LINE__  . " - "  . __FILE__ . ": " . $database_conn->error());
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$GLOBALS["current_" . $table_name . "_id"] = $cmr->post_var["id_table"];
//----------
$pdf_data_text = "";
//----------

//----------
$pdf_data_text .= "\n" . $cmr->translate("DATE:") . date("e") ."\n\n" . $cmr->translate("TEXT:") . ":\n";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$division->prints["match_value_column"] = "";
 // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if($result = $result_preview->fetch_object()){
	if($result->$column_id ) $cmr->post_var["id_table"] = $result->$column_id;
	foreach($result as $key => $value){
	$division->prints['match_value_column'] .= '<li><b>' .$cmr->translate($key) . ':</b>';
	$division->prints['match_value_column'] .= show_column_value($key, $value, $cmr->post_var["id_table"]) . '</li>';
	$pdf_data_text .= $cmr->translate($key) . ':' . $value . '\n';
}
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$GLOBALS["current_" . $table_name . "_id"] = $cmr->post_var["id_table"];
if(empty($GLOBALS[$table_name . "_read"])) $GLOBALS[$table_name . "_read"] = array();

if(!in_array ($cmr->post_var["id_table"], $GLOBALS[$table_name . "_read"])){
    $cmr->log_to_db("'" . $cmr->get_user("auth_email") . "', '" . $cmr->get_conf("cmr_table_prefix") . $table_name . "', '" . $cmr->post_var["id_table"] . "' ,'read'");
    $cmr->post_var["current_" . $table_name . "_id"] = $cmr->post_var["id_table"];
    array_push ($GLOBALS[$table_name . "_read"], $cmr->post_var["id_table"]);
}
// --------------------
$pdf_data_text .= "\n===========================\n";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_pdf_title"] = $table_name;
$division->prints["match_pdf_author"] = $cmr->get_user("auth_email");
$division->prints["match_pdf_file"] = "";
$division->prints["match_pdf_links"] = "";
$division->prints["match_pdf_data_type"] = "text";
$division->prints["match_pdf_dim_col"] = "0";
$division->prints["match_pdf_header"] = "";

$division->prints["match_pdf_data"] = wordwrap(htmlentities($pdf_data_text, 80));
$division->prints["match_pdf_confirm"] = $cmr->translate("confirm");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_close_tab"] = $lk->close_module_tab();
$division->prints["match_close_windows"] = $division->close();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$file_list = array();
$file_list[] = $cmr->get_user("auth_user_path") . "templates/template_preview_table" . $cmr->get_ext("template");
$file_list[] = $cmr->get_user("auth_group_path") . "templates/template_preview_table" . $cmr->get_ext("template");
$file_list[] = $cmr->get_path("module") . "modules/database/templates/template_preview_table" . $cmr->get_ext("template");

$division->template = $division->load_template($file_list);
$division->print_template("template1");
$division->prints = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!












// // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// $cmr->action["table_name"] = "comment";
// $cmr->action[$mod->base_name . "_title"] = $cmr->translate("Comment of ") . " [" . $database . "." . $table_name . "]";
// $cmr->action[$mod->base_name . "_title1"] = $cmr->translate("List comment of ") . " [" . $database . "." . $table_name  . "]";
// $cmr->action[$mod->base_name . "_title2"] = "";
// $cmr->action["column"] = "";
// $cmr->action["action"] = "select";
// $cmr->action["where"] = $cmr->where_query();
// // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// $cmr->query[$cmr->action["table_name"]] = "SELECT * FROM " . $cmr->get_conf("cmr_table_prefix") . "comment ";
// $cmr->query[$cmr->action["table_name"]] .= "WHERE (";
// $cmr->query[$cmr->action["table_name"]] .= " (line_id = '" . $cmr->post_var["id_table"] . "') ";
// $cmr->query[$cmr->action["table_name"]] .= " AND (table_name = '" . $database . "." . $table_name . "') ";
// $cmr->query[$cmr->action["table_name"]] .= ") ";
// $cmr->query[$cmr->action["table_name"]] .= " AND " . $cmr->action["where"];

// if(empty($cmr->post_var[$mod->base_name . "_mode"])){
//     $cmr->post_var[$mod->base_name . "_mode"] = "link_detail";
// }

// if(empty($cmr->post_var[$mod->base_name . "_limit"])){
//     $cmr->post_var[$mod->base_name . "_limit"] = 50;
// }

// // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// $file_list = array();
// $file_list[] = $cmr->get_path("module")."modules/view_comment.php";
// $file_list[] = $cmr->get_path("module")."modules/auto/view_comment.php";

// $view_comment_file = cmr_good_file($file_list);
// if(file_exists($view_comment_file))  if(cmr_match_include($division->template, "match_include1")) include($view_comment_file);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!



// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->action["table_name"] = "history";
$cmr->action[$mod->base_name . "_title"] = $cmr->translate("history of ") . " [" . $database . "." . $table_name . "]";
$cmr->action[$mod->base_name . "_title1"] = $cmr->translate("List history of ") . " [" . $database . "." . $table_name . "]";
$cmr->action[$mod->base_name . "_title2"] = "";
$cmr->action["column"] = "";
$cmr->action["action"] = "select";
$cmr->action["where"] = $cmr->where_query();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->query[$cmr->action["table_name"]] = "SELECT * FROM " . $cmr->get_conf("cmr_table_prefix") . "history ";
$cmr->query[$cmr->action["table_name"]] .= "WHERE (";
$cmr->query[$cmr->action["table_name"]] .= " (line_id = '" . $cmr->post_var["id_table"] . "') ";
$cmr->query[$cmr->action["table_name"]] .= " AND (table_name = '" . $database . "." . $table_name . "') ";
$cmr->query[$cmr->action["table_name"]] .= ") ";
$cmr->query[$cmr->action["table_name"]] .= " AND " . $cmr->action["where"];

if(empty($cmr->post_var[$mod->base_name . "_mode"])){
    $cmr->post_var[$mod->base_name . "_mode"] = "link_detail";
}

if(empty($cmr->post_var[$mod->base_name . "_limit"])){
    $cmr->post_var[$mod->base_name . "_limit"] = 50;
}

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$file_list = array();
$file_list[] = $cmr->get_path("module")."modules/view_comment.php";
$file_list[] = $cmr->get_path("module")."modules/auto/view_comment.php";

$view_comment_file = cmr_good_file($file_list);
if(file_exists($view_comment_file))  if(cmr_match_include($division->template, "match_include1")) include($view_comment_file);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->action["table_name"] = $table_name;
$cmr->action[$mod->base_name . "_title"] = $cmr->translate("Analyse of " . $database . "." . $table_name . "]");
$cmr->action[$mod->base_name . "_title1"] = $cmr->translate("Procedure analyse of " . $database . "." . $table_name . "]");
$cmr->action[$mod->base_name . "_title2"] = "";
$cmr->action["column"] = "";
$cmr->action["action"] = "select";
$cmr->action["where"] = $cmr->where_query();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->post_var["sql"] = "SELECT *  FROM " . $database . "." . $table_name." procedure analyse() ";


if($cmr->user["authorisation"] >= $cmr->get_conf("cmr_developer_type")){
if(cmr_match_include($division->template, "match_include2")) include($cmr->get_path("module") ."modules/database/result_sql.php");
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
