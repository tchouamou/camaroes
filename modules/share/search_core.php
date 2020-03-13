<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * search_core.php
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */

/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.
search_core.php, Ver 3.03, 2011-08-22 18:00:00  
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
// $array_prints['match_label_@_column_@'] = @_form_label_elmt_@;
// $array_prints['match_function_@_column_@'] = cmrprint_select($cmr->get_conf('cmr_search_operator'), 'func_@_column_@', '');
// $array_prints['match_value_@_column_@'] = @_form_box_elmt_@;
// ££_foreach_column_££
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// include_once($cmr->get_path("module") . "modules/search.php");
// return;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if($cmr->post_var["cmr_get_data"] == "get_data/get_" . $mod->base_name . ".php"){
$cmr->action["to_load"] = "class_" . $table_name . ".php";
include($cmr->get_path("index") . "system/loader/loader_class.php");
include_once($cmr->get_path("index") . "system/loader/loader_get.php");
include_once($cmr->get_path("index") . "system/run_result.php");
}
$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);
$division->module["title"] = $cmr->translate($mod->base_name); 
// $division->module["name"] = $mod->name;
// $division->module["text"] = "";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_open_windows"] = $division->show_noclose();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_base_name"] = $mod->base_name;
$division->prints["match_class_div"] = "search_form";
$division->prints["match_extend_inputs"] = "search_form";

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

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
	$lk->add_link("modules/new_" . $table_name . ".php?conf_name=conf.d/conf_" . $table_name . $cmr->get_ext("conf") . "&id_" . $table_name . "=" . $cmr->post_var["id_" . $table_name], 1, "new");
	$lk->add_link("modules/update_" . $table_name . ".php?conf_name=conf.d/conf_" . $table_name . $cmr->get_ext("conf") . "&id_" . $table_name . "=" . $cmr->post_var["id_" . $table_name], 1, "upadte");
	$lk->add_link("modules/search_" . $table_name . ".php?conf_name=conf.d/conf_" . $table_name . $cmr->get_ext("conf") . "&id_" . $table_name . "=" . $cmr->post_var["id_" . $table_name], 1, "search");
	$lk->add_link("modules/preview_" . $table_name . ".php?conf_name=conf.d/conf_" . $table_name . $cmr->get_ext("conf") . "&id_" . $table_name . "=" . $cmr->post_var["id_" . $table_name], 1, "preview");
	$lk->add_link("modules/report_" . $table_name . ".php?conf_name=conf.d/conf_" . $table_name . $cmr->get_ext("conf") . "&id_" . $table_name . "=" . $cmr->post_var["id_" . $table_name], 1, "report");
	$lk->add_link("modules/view_" . $table_name . ".php?conf_name=conf.d/conf_" . $table_name . $cmr->get_ext("conf") . "&id_" . $table_name . "=" . $cmr->post_var["id_" . $table_name], 1, "view");
$division->prints["match_open_tab"] = $lk->open_module_tab(2);

$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/menu_" . $table_name . ".php?conf_name=conf.d/conf_" . $table_name . $cmr->get_ext("conf") . "&id_" . $table_name . "=" . $cmr->post_var["id_" . $table_name], 1);
$division->prints["match_list_link"] = $lk->list_link();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_www_path"] = $cmr->get_path("www");
$division->prints["match_form_param"] = "";
$division->prints["match_form_id"] = "search_form";

$get_file = $cmr->get_path("get_data") . "get_data/get_search_" . $table_name . ".php";
$path_file = __FILE__;

if(!empty($cmr->config["get_search_" . $table_name]))
if(file_exists($cmr->config["get_search_" . $table_name])) $get_file = $cmr->config["get_search_" . $table_name];
if(!empty($cmr->config["path_search_" . $table_name]))
if(file_exists($cmr->config["path_search_" . $table_name])) $path_file = $cmr->config["path_search_" . $table_name];

$division->prints["match_input_hidden_get"] = cmr_input_hidden("cmr_get_data", $get_file, "hidden");
$division->prints["match_input_hidden_module"] = cmr_input_hidden("middle1", $path_file, "hidden");
$division->prints["match_input_hidden_conf"] = cmr_input_hidden("cmr_conf", "conf.d/modules/conf_" . $table_name . $cmr->get_ext("conf"), "hidden");

$division->prints["match_input_hidden_get"] = cmr_input_hidden("table", $cmr->config["cmr_table_prefix"] . $table_name, "hidden");
$division->prints["match_input_hidden_module"] = cmr_input_hidden("middle2", __FILE__, "hidden");
$division->prints["match_input_hidden_conf"] = cmr_input_hidden("cmr_get_data", "get_data/get_search.php", "hidden");

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(($cmr->get_page("default_search"))) $cmr->config["cmr_default_table"] = $cmr->get_page("default_search");
$t_table = $cmr->get_conf("cmr_table_prefix") . $cmr->get_conf("cmr_default_table");
if(is_database($cmr->post_var, "table")) 
$t_table = $cmr->post_var["current_database"] . "." . $cmr->post_var["current_table"];
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$division->prints["match_input_hidden_table"] = cmr_input_hidden("table", $t_table, "hidden");
$division->prints["match_input_hidden_module1"] = cmr_input_hidden("middle1", __FILE__, "hidden");
$division->prints["match_input_hidden_get1"] = cmr_input_hidden("cmr_get_data", "get_data/get_search.php", "hidden");
// $division->prints["match_label_text"] = $cmr->translate("text");
// $division->prints["match_label_options"] = $cmr->translate("options");;
$division->prints["match_label_like"] = $cmr->translate('like');
$division->prints["match_label_any"] = $cmr->translate('any');
$division->prints["match_label_all"] = $cmr->translate('all');
$division->prints["match_label_regexp"] = $cmr->translate('regexp');
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


$division->prints["match_legend_" . $table_name] = $cmr->translate($table_name);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//   $division->prints["match_function_" . $key] = $array_prints["match_function_" . $key];
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
foreach($array_column as $key => $value ){
  $division->prints["match_label_" . $key] = $cmr->translate($key);
  $division->prints["match_value_" . $key] = "";//$cmr->print_value($cmr->get_conf("cmr_table_prefix") . $table_name, $key, "", $value["type"], $value["foreign"]);
  $division->prints["match_link_" . $key] = "";//$cmr->module_link("modules/new_" . $extern_table . ".php" . "", "", "->")
  $division->prints["match_function_" . $key]  = "";
  $division->prints["match_input_" . $key]  = "";
  $division->prints["match_options_" . $key]  = "";
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_script_calendar"] = ""; // "@_script_calendar_@";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_reset_form"] = $cmr->translate("confirm that you want to empty this form");
$division->prints["match_submit"] = $cmr->translate("search");
$division->prints["match_submit_java"] = $cmr->translate("search");
$division->prints["match_detail"] = $cmr->translate("detail");

$division->prints["match_close_tab"] = $lk->close_module_tab();
$division->prints["match_close_windows"] = $division->close(); 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$templates_file = $mod->good_file($cmr->user, $cmr->page["language"], "template", "search_" . $table_name);

// $templates_file = $cmr->good_file("template", "search_" . $table_name);
$division->template = $division->load_template($templates_file);
  
$division->print_template("template");
$division->prints = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
