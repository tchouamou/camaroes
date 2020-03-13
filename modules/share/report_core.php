<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * report_core.php
 * ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */

/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.

report_core.php, Ver 3.03, 2011-08-22 18:00:00
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
// !!!!!!!!!!!!!!!!!!!  INPUT  !!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// $table_name = "@_table_@";
// £_foreach_column_£
// $array_column['@_column_@'] = '@_column_@';
// ££_foreach_column_££
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->action["to_load"] = "class_" . $table_name . ".php";
include($cmr->get_path("index") . "system/loader/loader_class.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// 
// if($cmr->post_var["cmr_get_data"] == "get_data/get_" . $mod->base_name . ".php")
// include_once($cmr->get_path("index") . "system/loader/loader_get.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);
// $division->module["name"] = $mod->name;
$division->module["title"] = $cmr->translate($mod->base_name); 
// $division->module["text"] = "";
$division->prints["match_open_windows"] = $division->show_noclose();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_form2_id"] = "";
$division->prints["match_label_id"] = "";
$division->prints["match_class_select"] = "";
$division->prints["match_value_begin_period"] = "";
$division->prints["match_class_button"] = "";
$division->prints["match_value_end_period"] = "";
$division->prints["match_class_button"] = "";
$division->prints["match_class_select"] = "";
$division->prints["match_report_select_font"] = "";
$division->prints["match_link_report_" . $table_name . "_number"] = "";
$division->prints["match_link_report_" . $table_name . "_lang"] = "";
$division->prints["match_link_report_" . $table_name . "_title"] = "";
$division->prints["match_class_ul"] = "";
$division->prints["match_java_submit2"] = "";


$division->prints["match_" . $table_name . "_title1"] = ""; 
$division->prints["match_" . $table_name . "_title2"] = ""; 
if(($cmr->translate($mod->base_name))) 
$division->prints["match_" . $table_name . "_title1"] = $cmr->translate($mod->base_name);
if(isset($cmr->language[$mod->base_name."_title"])) 
$division->prints["match_" . $table_name . "_title2"] = $cmr->translate($mod->base_name . "_title");


$division->prints["match_legend_link"] = $cmr->translate("Links");


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(empty($cmr->post_var["id_" . $table_name])) $cmr->post_var["id_" . $table_name] = "";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
	$lk->add_link("modules/new_" . $table_name . ".php?conf_name=conf.d/conf_" . $table_name . $cmr->get_ext("conf") . "&id_" . $table_name . "=" . $cmr->post_var["id_" . $table_name], 1, "new");
	$lk->add_link("modules/update_" . $table_name . ".php?conf_name=conf.d/conf_" . $table_name . $cmr->get_ext("conf") . "&id_" . $table_name . "=" . $cmr->post_var["id_" . $table_name], 1, "upadte");
	$lk->add_link("modules/search_" . $table_name . ".php?conf_name=conf.d/conf_" . $table_name . $cmr->get_ext("conf") . "&id_" . $table_name . "=" . $cmr->post_var["id_" . $table_name], 1, "search");
	$lk->add_link("modules/preview_" . $table_name . ".php?conf_name=conf.d/conf_" . $table_name . $cmr->get_ext("conf") . "&id_" . $table_name . "=" . $cmr->post_var["id_" . $table_name], 1, "preview");
	$lk->add_link("modules/report_" . $table_name . ".php?conf_name=conf.d/conf_" . $table_name . $cmr->get_ext("conf") . "&id_" . $table_name . "=" . $cmr->post_var["id_" . $table_name], 1, "report");
// 	$lk->add_link("modules/view_" . $table_name . ".php?conf_name=conf.d/conf_" . $table_name . $cmr->get_ext("conf") . "&id_" . $table_name . "=" . $cmr->post_var["id_" . $table_name], 1, "view");
$division->prints["match_open_tab"] = $lk->open_module_tab(4);

$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/menu_" . $table_name . ".php?conf_name=conf.d/conf_" . $table_name . $cmr->get_ext("conf") . "&id_" . $table_name . "=" . $cmr->post_var["id_" . $table_name], 1);
$division->prints["match_list_link"] = $lk->list_link();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_www_path"] = $cmr->get_path("www");
$division->prints["match_form_param"] = "";
$division->prints["match_form_id"] = "new_form";


(!empty($cmr->config["get_report_" . $table_name]) && file_exists($cmr->config["get_report_" . $table_name])) ? $get_file = $cmr->config["get_report_" . $table_name] : $get_file = $cmr->get_path("get_data") . "get_data/get_report_" . $table_name . ".php";
(!empty($cmr->config["path_report_" . $table_name]) && file_exists($cmr->config["path_report_" . $table_name])) ? $path_file = $cmr->config["path_report_" . $table_name] : $path_file = __FILE__;

$division->prints["match_input_hidden_module"] = cmr_input_hidden("middle1", $path_file, "hidden");
$division->prints["match_input_hidden_get"] = cmr_input_hidden("cmr_get_data", $get_file, "hidden");
$division->prints["match_input_hidden_conf"] = cmr_input_hidden("cmr_conf", "conf.d/modules/conf_" . $table_name . $cmr->get_ext("conf"), "hidden");

$division->prints["match_legend_" . $table_name] = $cmr->translate($table_name);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$lastmonth = time() - (60 * 60 * 24 * 30);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$templates_file = $mod->good_file($cmr->user, $cmr->page["language"], "template", "report_" . $table_name);

// $templates_file = $cmr->good_file("template", "report_" . $table_name);
$division->template = $division->load_template($templates_file);
$division->print_template("template1");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	//===============================
	//========Click Management======
	//===============================
	//===============================
if(!empty($cmr->post_var["report_" . $table_name . "_form"])){
	$cmr->post_var["class_module"] = $cmr->post_var["report_" . $table_name . "_form"];
    if(cmr_match_include($division->template, "match_include1")) include($cmr->get_path("index") . "system/loader/loader_get.php");
    $cmr->post_var["report_" . $table_name . "_form"] = "";
}
	//===============================
	//===============================
	//===============================
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
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
$division->prints["match_report_select_function"] = cmrprint_select($cmr->get_conf('cmr_report_function'), 'report_" . $table_name . "_func', '');
$division->prints["match_label_where"] = $cmr->translate("Where");
$division->prints["match_report_select_operator"] =  cmrprint_select($cmr->get_conf('cmr_report_operator'), 'report_" . $table_name . "_where_operator', '');
$division->prints["match_label_group_by"] = $cmr->translate("Group By");
$division->prints["match_option_asc"] = $cmr->translate("ASC");
$division->prints["match_option_desc"] = $cmr->translate("DESC");
$division->prints["match_label_having"] = $cmr->translate("Having");
$division->prints["match_report_select_operator"] = cmrprint_select($cmr->get_conf('cmr_report_operator'), 'report_" . $table_name . "_having_operator', '');
$division->prints["match_label_order"] = $cmr->translate("Order By");
$division->prints["match_option_asc"] = $cmr->translate("ASC");
$division->prints["match_option_desc"] = $cmr->translate("DESC");
$division->prints["match_label_width"] = $cmr->translate("width");
$division->prints["match_label_height"] = $cmr->translate("height");
$division->prints["match_label_color1"] = $cmr->translate("color1");
$division->prints["match_report_select_color1"] = cmrprint_select($cmr->get_conf('cmr_report_color'), 'report_" . $table_name . "_color1', '');
$division->prints["match_label_color2"] = $cmr->translate("color2");
$division->prints["match_report_select_color2"] = cmrprint_select($cmr->get_conf('cmr_report_color'), 'report_" . $table_name . "_color2', '');
$division->prints["match_label_fillcolor1"] = $cmr->translate("fillcolor1");
$division->prints["match_report_select_fillcolor1"] = cmrprint_select($cmr->get_conf('cmr_report_fillcolor'), 'report_" . $table_name . "_fillcolor1', '');
$division->prints["match_label_fillcolor2"] = $cmr->translate("fillcolor2");
$division->prints["match_report_select_fillcolor2"] = cmrprint_select($cmr->get_conf('cmr_report_fillcolor'), 'report_" . $table_name . "_fillcolor2', '');
$division->prints["match_label_font1"] = $cmr->translate("font1");
$division->prints["match_report_select_font1"] = cmrprint_select($cmr->get_conf('cmr_report_font'), 'report_" . $table_name . "_font1', '');
$division->prints["match_label_font2"] = $cmr->translate("font2");
$division->prints["match_report_select_font2"] = cmrprint_select($cmr->get_conf('cmr_report_font'), 'report_" . $table_name . "_font2', '');
$division->prints["match_label_save_to"] = $cmr->translate("Save to");
$division->prints["match_label_query"] = $cmr->translate("Query");
$division->prints["match_legend1"] = $cmr->translate("Report");
$division->prints["match_legend_sql"] = $cmr->translate("SQL");
$division->prints["match_submit1"] = $cmr->translate("GO!");
$division->prints["match_java_submit1"] = $cmr->translate("Confirm ?");


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->print_template("template2");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


if($cmr->user["authorisation"] >= $cmr->get_conf("cmr_admin_type")){
$division->prints["match_select_option_query"] = $cmr->print_select($cmr->config["cmr_table_prefix"] . "query", "name", "column", $cmr->config["db_name"], "text", $cmr->config["cmr_max_view"], "id", "25") ;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->print_template("template3");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
}

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_submit1"] = $cmr->translate("report");
$division->prints["match_submit_java1"] = $cmr->translate("confirm that you want to this " . $table_name);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


$division->prints["match_link_report_" . $table_name] = $cmr->module_link(" report_" . $table_name . ".php?report_" . $table_name . "_form=report_" . $table_name . "&report_" . $table_name . "_column=*" , " " , $cmr->translate(" Report " ) . "  " . $table_name . " ("  . $cmr->translate("Last Month") . " )" );


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
foreach($array_column as $key => $value ){
$division->prints["match_link_report_" . $table_name . "_" . $key] = $cmr->module_link("report_" . $table_name . ".php?report_" . $table_name . "_form=report_" . $table_name . "&report_" . $table_name . "_column=" . $key, "", " [" . $table_name . "]/[" . $key . "]");
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_reset_form"] = $cmr->translate("confirm that you want to empty this form");
$division->prints["match_submit2"] = $cmr->translate("report");
$division->prints["match_submit_java2"] = $cmr->translate("confirm that you want create this report " . $table_name);
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
