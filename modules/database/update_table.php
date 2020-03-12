<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * Update_table.php
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */

/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























Update_table.php, Ver 3.03   
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

if($cmr->post_var["cmr_get_data"] == "modules/database/get_data/get_update_table.php"){
include_once($cmr->get_path("index") . "system/loader/loader_get.php");
include_once($cmr->get_path("index") . "system/run_result.php");
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

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
if(empty($database_conn)) $database_conn = NULL;
$database_conn = database_connect($cmr->db_connection, $database_conn, $cmr->db);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
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
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
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
$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);



// $division->module["name"]= $mod->name;



$division->module["title"] = $cmr->module_link("modules/database/databases.php?current_dbms=" . $cmr->post_var["current_dbms"], "", $cmr->post_var["current_dbms"]);
$division->module["title"] .= " => " . $cmr->module_link("modules/database/tables.php?current_database=" . $cmr->post_var["current_database"], "", $cmr->post_var["current_database"]);
$division->module["title"] .= " => " . $cmr->module_link("modules/database/columns.php?current_table=" . $cmr->post_var["current_table"], "", $cmr->post_var["current_table"]);
// $division->module["text"] = "";







$division->themes["header_visible"] = 1;
$division->themes["header_tools_left"] = 0;
$division->themes["header_tools_right"] = 0;
$division->themes["header_mouse_effect"] = "1";
$division->themes["header_bgcolor"] = "#000000";
$division->themes["header_color"] = "#FFFFFF";
$division->themes["header_align"] = "left";
$division->themes["header_border"] = "1";
$division->themes["header_bgimage_left"] = "@";
$division->themes["header_bgimage_middle"] = "@";
$division->themes["header_bgimage_right"] = "@";
$division->themes["header_mouse_effect"] = "1";
$division->prints["match_open_windows"] = $division->show_noclose();
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_class_div"] = "update_form";

$division->prints["match_table_title1"] = $cmr->translate($mod->base_name . " " . $table_name); 
$division->prints["match_table_title2"] = ""; 
 

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_menu_db"] = ""; 
if(empty($cmr->post_var["current_table"])) $cmr->post_var["current_table"] = "";
if($cmr->user["authorisation"] >= $cmr->get_conf("cmr_noc_type"))
$division->prints["match_menu_db"] = cmr_menu_db($database_conn, "", $cmr->post_var["current_database"], $cmr->post_var["current_table"], $cmr->post_var["current_column"]);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!



$division->prints["match_legend_link"] = $cmr->translate("Links");
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/database/preview_table.php?conf_name=modules/database/conf.d/conf_table.ini&current_table=" . $cmr->post_var["current_table"] . "", 1, $cmr->translate("preview"));
$lk->add_link("modules/database/update_table.php?conf_name=modules/database/conf.d/conf_table.ini&current_table=" . $cmr->post_var["current_table"] . "", 1, $cmr->translate("update"));
$division->prints["match_open_tab"] = $lk->open_module_tab(1);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/database/login_db.php?current_table=" . $cmr->post_var["current_table"] ,1);
$lk->add_link("modules/database/databases.php?current_table=" . $cmr->post_var["current_table"] ,1);
$lk->add_link("modules/database/tables.php?conf_name=modules/database/conf.d/conf_table.ini&current_table=" . $cmr->post_var["current_table"], 1);
$lk->add_link("modules/database/columns.php?current_table=" . $cmr->post_var["current_table"] ,1);
$lk->add_link("modules/database/update_column.php?current_table=" . $cmr->post_var["current_table"] ,1);
$lk->add_link("modules/database/query_db.php?conf_name=conf.d/conf_query.ini&current_table=" . $cmr->post_var["current_table"], 1);

$division->prints["match_list_link"] = $lk->list_link();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->query["table"] = sprintf("SELECT * FROM  " . $database . ".$table_name where $column_id='%s'", cmr_escape($cmr->post_var["id_table"]));


$result_table = &$database_conn->SelectLimit($cmr->query["table"], 1) /*, $database_conn)*/ or db_die(__LINE__  . " - "  . __FILE__ . ": " . $database_conn->ErrorMsg());
$val_u = $result_table->FetchRow();


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$division->prints["match_www_path"] = $cmr->get_path("www");
$division->prints["match_form_param"] = "";
$division->prints["match_form_id"] = "update_form";

$division->prints["match_input_hidden_get"] = input_hidden("<input type=\"hidden\" value=\"modules/database/get_data/get_update_table.php\" name=\"cmr_get_data\" />");
$division->prints["match_input_hidden_id_table"] = input_hidden("<input type=\"hidden\" value=\"".$cmr->post_var["id_table"]."\" name=\"id_table\" />");
$division->prints["match_input_hidden_module"] = input_hidden("<input type=\"hidden\" value=\"" . __FILE__ . "\" name=\"middle1\" />");
$division->prints["match_input_hidden_conf"] = "";

$division->prints["match_legend_table"] = $cmr->translate("table");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!




// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$division->prints["match_update_column"] = "";
$_SESSION["__update__"] = array();
foreach($array_columns as $key => $value){
  $division->prints["match_update_column"] .= "<tr><td class=\"normal_text\" align=\"rigth\"> ";
  $division->prints["match_update_column"] .= "<label><b>" . ucfirst($cmr->translate($value)) . ":</b></label>";
  $division->prints["match_update_column"] .= "</td><td class=\"normal_text\" align=\"rigth\">";
  $division->prints["match_update_column"] .= cmrprint_select($cmr->get_conf("cmr_update_function"), "func_$value", "");
  $division->prints["match_update_column"] .= "</td><td class=\"normal_text\" align=\"left\">";
  $division->prints["match_update_column"] .= print_column($all_columns[1][$value], $value, $val_u[$value], $table_name);
//   $division->prints["match_update_column"] .= "<input size=\"20\" type=\"text\" value=\"" . $val_u[$value] . "\"  id=\"" . $value . "\" name=\"" . $value . "\" onclick=\"large_id('" . $mod->base_name . "," . $value . "')\">";
  $division->prints["match_update_column"] .= "</td></tr>";
  $_SESSION["__update__"][$key] = $val_u[$value];
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_script_calendar"] = ""; // "@_script_calendar_@";


$division->prints["match_submit_update"] = $cmr->translate("update_table");
$division->prints["match_submit_new"] = $cmr->translate("new_table");
$division->prints["match_submit_java1"] = $cmr->translate("confirm that you want to update this table");
$division->prints["match_submit_java2"] = $cmr->translate("confirm that you want to create like new this table");
$division->prints["match_reset_form"] = $cmr->translate("confirm that you want to empty this form");

$division->prints["match_close_tab"] = $lk->close_module_tab();
$division->prints["match_close_windows"] = $division->close(); 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$file_list = array();
$file_list[] = $cmr->get_user("auth_user_path") . "templates/modules/template_update_table" . $cmr->get_ext("template");
$file_list[] = $cmr->get_user("auth_group_path") . "templates/modules/template_update_table" . $cmr->get_ext("template");
$file_list[] = $cmr->get_path("module") . "modules/database/templates/template_update_table" . $cmr->get_ext("template");
// $file_list[] = $cmr->get_path("template") . "templates/modules/auto/template_update_table" . $cmr->get_ext("template");

$division->template = $division->load_template($file_list);
  
$division->print_template();
$division->prints = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
