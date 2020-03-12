<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * search_table.php
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */

/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.







search_table.php, Ver 3.03   
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
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
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
$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);



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

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_class_div"] = "search_form";

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
if(empty($cmr->post_var["id_table"])){
    $cmr->post_var["id_table"] = "";
} 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/database/new_table.php?current_table=" . $cmr->post_var["current_table"] , "", $cmr->translate("insert"));
$lk->add_link("modules/database/search_table.php?current_table=" . $cmr->post_var["current_table"] , "", $cmr->translate("search"));
$lk->add_link("modules/database/view_table.php?current_table=" . $cmr->post_var["current_table"] , "", $cmr->translate("view elements"));
$lk->add_link("modules/database/export_table.php?current_table=" . $cmr->post_var["current_table"] , "", $cmr->translate("export"));
$lk->add_link("modules/database/import_table.php?current_table=" . $cmr->post_var["current_table"] , "", $cmr->translate("import"));
$lk->add_link("modules/database/report_table.php?conf_name=modules/database/conf.d/conf_table.ini&current_table=" . $cmr->post_var["current_table"] . "&layer=2", "", $cmr->translate("report"));
$division->prints["match_open_tab"] = $lk->open_module_tab(1);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/database/login_db.php?current_table=" . $cmr->post_var["current_table"] ,1);
$lk->add_link("modules/database/databases.php?current_table=" . $cmr->post_var["current_table"] ,1);
$lk->add_link("modules/database/tables.php?conf_name=modules/database/conf.d/conf_table.ini&current_table=" . $cmr->post_var["current_table"], 1);
$lk->add_link("modules/database/columns.php?current_table=" . $cmr->post_var["current_table"] ,1);
$lk->add_link("modules/database/query_db.php?conf_name=conf.d/conf_query.ini&current_table=" . $cmr->post_var["current_table"], 1);

$division->prints["match_list_link"] = $lk->list_link();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_www_path"] = $cmr->get_path("www");
$division->prints["match_form_param"] = "";
$division->prints["match_form_id"] = "search_form";

$division->prints["match_input_hidden_get"] = input_hidden("<input type=\"hidden\" value=\"modules/database/get_data/get_search_table.php\" name=\"cmr_get_data\" />");
$division->prints["match_input_hidden_module"] = input_hidden("<input type=\"hidden\" value=\"" . __FILE__ . "\" name=\"middle1\" />");
$division->prints["match_input_hidden_conf"] = "";

$division->prints["match_legend_table"] = $cmr->translate("table");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_input_column"] = "";
if($array_columns)
foreach($array_columns as $key => $value){
  $division->prints["match_input_column"] .= "<tr><td class=\"normal_text\" align=\"rigth\"> ";
  $division->prints["match_input_column"] .= "<label><b>" . ucfirst($cmr->translate($value)) . ":</b></label>";
  $division->prints["match_input_column"] .= "</td><td class=\"normal_text\" align=\"rigth\">";
  $division->prints["match_input_column"] .= cmrprint_select($cmr->get_conf("cmr_search_operator"), "func_$value", "");
  $division->prints["match_input_column"] .= "</td><td class=\"normal_text\" align=\"left\">";
if(empty($all_columns[1][$value]))$all_columns[1][$value] = "";
  $division->prints["match_input_column"] .= print_column($all_columns[1][$value], $value, "", $table_name);
//   $division->prints["match_input_column"] .= "<input size=\"20\" type=\"text\" value=\"\"  id=\"" . $value . "\" name=\"" . $value . "\" onclick=\"large_id('" . $mod->base_name . "," . $value . "')\">";
  $division->prints["match_input_column"] .= "</td></tr>";
    }
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_script_calendar"] = ""; // "@_script_calendar_@";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_reset_form"] = $cmr->translate("confirm that you want to empty this form");
$division->prints["match_submit"] = $cmr->translate("search");
$division->prints["match_submit_java"] = $cmr->translate("search");

$division->prints["match_close_tab"] = $lk->close_module_tab();
$division->prints["match_close_windows"] = $division->close(); 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$file_list = array();
$file_list[] = $cmr->get_user("auth_user_path") . "templates/modules/template_search_table" . $cmr->get_ext("template");
$file_list[] = $cmr->get_user("auth_group_path") . "templates/modules/template_search_table" . $cmr->get_ext("template");
$file_list[] = $cmr->get_path("module") . "modules/database/templates/template_search_table" . $cmr->get_ext("template");
// $file_list[] = $cmr->get_path("template") . "templates/modules/auto/template_search_table" . $cmr->get_ext("template");

$division->template = $division->load_template($file_list);
  
$division->print_template();
$division->prints = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// 
// if($cmr->post_var["cmr_get_data"] == "modules/database/get_data/get_search_table.php")
// include_once($cmr->get_path("index") . "system/loader/loader_get.php");
// // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

?>
