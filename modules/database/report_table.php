<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * report_table.php
 * ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */

/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























report_table.php, Ver 3.03 
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

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->config = $cmr->include_conf($cmr->get_path("module") . "modules/database/conf.d/conf_table.ini", $cmr->config, "var");
include_once($cmr->get_path("module") . "modules/database/function/func_table.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// 
// if($cmr->post_var["cmr_get_data"] == "get_data/get_" . $mod->base_name . ".php")
// include_once($cmr->get_path("index") . "system/loader/loader_get.php");
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

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);

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
$division->prints["match_form2_id"] = "";

$division->prints["match_class_select"] = "";

$division->prints["match_value_begin_period"] = "";

$division->prints["match_class_button"] = "";

$division->prints["match_value_end_period"] = "";

$division->prints["match_class_button"] = "";

$division->prints["match_class_select"] = "";

$division->prints["match_report_select_font"] = "";

$division->prints["match_link_report_table_number"] = "";

$division->prints["match_link_report_table_lang"] = "";

$division->prints["match_link_report_table_title"] = "";

$division->prints["match_class_ul"] = "";

$division->prints["match_java_submit2"] = "";


$division->prints["match_table_title1"] = $cmr->translate($mod->base_name . " " . $table_name); 
$division->prints["match_table_title2"] = ""; 
 

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_menu_db"] = ""; 
if($cmr->user["authorisation"] >= $cmr->get_conf("cmr_noc_type"))
$division->prints["match_menu_db"] = cmr_menu_db($database_conn, "", $cmr->post_var["current_database"], $cmr->post_var["current_table"], $cmr->post_var["current_column"]);

if(empty($cmr->post_var["current_table"])) $cmr->post_var["current_table"] = "";
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
$division->prints["match_open_tab"] = $lk->open_module_tab(5);
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

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_options_column"] = "";
foreach($array_columns as $key => $value){
  $division->prints["match_options_column"] .= "<option value=\"" . $value . "\">" . $value . "</option>";
    }
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$division->prints["match_www_path"] = $cmr->get_path("www");
$division->prints["match_form_param"] = "";
$division->prints["match_form_id"] = "new_form";

$division->prints["match_input_hidden_get"] = input_hidden("<input type=\"hidden\" value=\"modules/database/get_data/get_report_table.php\" name=\"cmr_get_data\" />");
$division->prints["match_input_hidden_module"] = input_hidden("<input type=\"hidden\" value=\"" . __FILE__ . "\" name=\"middle1\" />");
$division->prints["match_input_hidden_conf"] = "";

$division->prints["match_legend_table"] = $cmr->translate($table_name);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!




// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!



$lastmonth = time() - (60 * 60 * 24 * 30);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$file_list = array();
$file_list[] = $cmr->get_user("auth_user_path") . "templates/modules/template_report_table" . $cmr->get_ext("template");
$file_list[] = $cmr->get_user("auth_group_path") . "templates/modules/template_report_table" . $cmr->get_ext("template");
$file_list[] = $cmr->get_path("module") . "modules/database/templates/template_report_table" . $cmr->get_ext("template");
// $file_list[] = $cmr->get_path("template") . "templates/modules/auto/template_report_table" . $cmr->get_ext("template");

$division->template = $division->load_template($file_list);
  
$division->print_template("template1");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	//===============================
	//========Click Management======
	//===============================
	//===============================
if(!empty($cmr->post_var["report_table_form"])){
	$cmr->post_var["class_module"] = $cmr->post_var["report_table_form"];
    if(cmr_match_include($division->template, "match_include1")) include($cmr->get_path("module") . "modules/database/get_data/get_report_table.php");
    $cmr->post_var["report_table_form"] = "";
}
	//===============================
	//===============================
	//===============================
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_column1"] = "";
$division->prints["match_label_column"] = $cmr->translate("Column");
$division->prints["match_label_show_graph"] = $cmr->translate("Show graph");
$division->prints["match_option_no_graph"] = $cmr->translate("No Graph");
$division->prints["match_option_default"] = $cmr->translate("Default");
$division->prints["match_label_period"] = $cmr->translate("Period");
$division->prints["match_period_user_defined"] = $cmr->translate("User defined");
$division->prints["match_period_last_day"] = $cmr->translate("Last day");
$division->prints["match_period_last_week"] = $cmr->translate("Last week");
$division->prints["match_period_last_month"] = $cmr->translate("Last Month");
$division->prints["match_period_last_year"] = $cmr->translate("Last Year");
$division->prints["match_period_shortmonth"] = $cmr->translate("Shortmonth");
$division->prints["match_period_month"] = $cmr->translate("Month");
$division->prints["match_period_day"] = $cmr->translate("Day");
$division->prints["match_period_shortday"] = $cmr->translate("Shortday");
$division->prints["match_label_show_data"] = $cmr->translate("Show Data");
$division->prints["match_label_data_number"] = $cmr->translate("Data Number");
$division->prints["match_label_begin_period"] = $cmr->translate("Begin period");
$division->prints["match_label_end_period"] = $cmr->translate(" End Period");
$division->prints["match_label_column"] = $cmr->translate("Column");
$division->prints["match_report_select_function"] = cmrprint_select($cmr->get_conf('cmr_report_function'), 'report_table_func', '');
$division->prints["match_label_where"] = $cmr->translate("Where");
$division->prints["match_report_select_operator"] =  cmrprint_select($cmr->get_conf('cmr_report_operator'), 'report_table_where_operator', '');
$division->prints["match_label_group_by"] = $cmr->translate("Group By");
$division->prints["match_option_asc"] = $cmr->translate("ASC");
$division->prints["match_option_desc"] = $cmr->translate("DESC");
$division->prints["match_label_having"] = $cmr->translate("Having");
$division->prints["match_report_select_operator"] = cmrprint_select($cmr->get_conf('cmr_report_operator'), 'report_table_having_operator', '');
$division->prints["match_label_order"] = $cmr->translate("Order By");
$division->prints["match_option_asc"] = $cmr->translate("ASC");
$division->prints["match_option_desc"] = $cmr->translate("DESC");
$division->prints["match_label_width"] = $cmr->translate("width");
$division->prints["match_label_height"] = $cmr->translate("height");
$division->prints["match_label_color1"] = $cmr->translate("color1");
$division->prints["match_report_select_color1"] = cmrprint_select($cmr->get_conf('cmr_report_color'), 'report_table_color1', '');
$division->prints["match_label_color2"] = $cmr->translate("color2");
$division->prints["match_report_select_color2"] = cmrprint_select($cmr->get_conf('cmr_report_color'), 'report_table_color2', '');
$division->prints["match_label_fillcolor1"] = $cmr->translate("fillcolor1");
$division->prints["match_report_select_fillcolor1"] = cmrprint_select($cmr->get_conf('cmr_report_fillcolor'), 'report_table_fillcolor1', '');
$division->prints["match_label_fillcolor2"] = $cmr->translate("fillcolor2");
$division->prints["match_report_select_fillcolor2"] = cmrprint_select($cmr->get_conf('cmr_report_fillcolor'), 'report_table_fillcolor2', '');
$division->prints["match_label_font1"] = $cmr->translate("font1");
$division->prints["match_report_select_font1"] = cmrprint_select($cmr->get_conf('cmr_report_font'), 'report_table_font1', '');
$division->prints["match_label_font2"] = $cmr->translate("font2");
$division->prints["match_report_select_font2"] = cmrprint_select($cmr->get_conf('cmr_report_font'), 'report_table_font2', '');
$division->prints["match_label_save_to"] = $cmr->translate("Save to");
$division->prints["match_label_query"] = $cmr->translate("Query");
$division->prints["match_legend1"] = $cmr->translate("Report");
$division->prints["match_legend_sql"] = $cmr->translate("SQL");
$division->prints["match_submit1"] = $cmr->translate("GO!");
$division->prints["match_java_submit1"] = $cmr->translate("Confirm ?");


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->print_template("template2");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


if($cmr->user["authorisation"] >= $cmr->get_conf("cmr_admin_type")){
$division->prints["match_select_option_query"] = $cmr->print_select($cmr->config['cmr_table_prefix'] . 'query', 'name', 'column', $cmr->config['db_name'], 'text', $cmr->config['cmr_max_view'], 'id', '25') ;

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->print_template("template3");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
}

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$division->prints["match_submit1"] = $cmr->translate("report");
$division->prints["match_submit_java1"] = $cmr->translate("confirm that you want to this table");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


$division->prints["match_link_report_table"] = $cmr->module_link('report_table.php?report_table_form=report_table&report_table_column=*', '', $cmr->translate('Report ') . ' table');






$division->prints["match_link_report_table_column"] = "";
foreach($array_columns as $key => $value){
  $division->prints["match_link_report_table_column"] .= "<li>";
  $division->prints["match_link_report_table_column"] .= "<input class=\"submit\" type=\"checkbox\" value=\"" . $value . "\" name=\"report_" . $table_name . "_" . $value . "\" checked />";
	$division->prints['match_link_report_table_$value'] = $cmr->module_link('report_table.php?report_table_form=report_table&report_table_column=$value', '', $cmr->translate('Report ') . ' [table] ' . $cmr->translate(' By ') . ' [$value]');
  $division->prints["match_link_report_table_column"] .= $cmr->module_link("report_table.php?report_table_form=report_table&report_table_column=" . $value, "", $cmr->translate("Report ") . " [" . $table_name . "] " . $cmr->translate(" By ") . " [" . $value . "] ");
  $division->prints["match_link_report_table_column"] .= "</li>";
}


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$division->prints["match_reset_form"] = $cmr->translate("confirm that you want to empty this form");
$division->prints["match_submit2"] = $cmr->translate("report");
$division->prints["match_submit_java2"] = $cmr->translate("confirm that you want create this report table");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->print_template("template4");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// 	cmr_print_r($cmr->report);exit;
	$cmr->post_var["report_table"] = $table_name;
	//======================================================================
	include_once ($cmr->get_path("module") . "modules/preview_report.php");
	//======================================================================
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!



$division->prints["match_close_tab"] = $lk->close_module_tab();
$division->prints["match_close_windows"] = $division->close(); 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->print_template("template5");
$division->prints = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
