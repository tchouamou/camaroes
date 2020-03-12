<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * Update_core.php
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */

/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.
Update_core.php, Ver 3.03, 2011-08-22 18:00:00  
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
// $column_id = "@_column_id_@";
// £_foreach_column_£
// $array_column['@_column_@'] = '@_column_@';
// $array_prints['match_label_@_column_@'] = @_form_label_elmt_@;
// $division->prints['match_function_@_column_@'] = cmrprint_select($cmr->get_conf('cmr_update_function'), 'func_@_column_@', '');
// $division->prints['match_value_@_column_@'] = @_form_box_elmt_upd_@;
// ££_foreach_column_££
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// include($cmr->get_path("module") . "modules/share/new_core.php");

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->action["to_load"] = "class_" . $table_name . ".php";
include($cmr->get_path("index") . "system/loader/loader_class.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if($cmr->post_var["cmr_get_data"] == "get_data/get_" . $mod->base_name . ".php"){
include_once($cmr->get_path("index") . "system/loader/loader_get.php");
include_once($cmr->get_path("index") . "system/run_result.php");
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);
// $division->module["name"] = $mod->name;
$division->module["title"] = $cmr->translate($mod->base_name); 
// $division->module["text"] = "";
$division->prints["match_open_windows"] = $division->show_noclose();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_class_div"] = "update_form";

$division->prints["match_" . $table_name . "_title1"] = ""; 
$division->prints["match_" . $table_name . "_title2"] = ""; 
if(($cmr->translate($mod->base_name))) 
$division->prints["match_" . $table_name . "_title1"] = $cmr->translate($mod->base_name);
if(isset($cmr->language[$mod->base_name."_title"])) 
$division->prints["match_" . $table_name . "_title2"] = $cmr->translate($mod->base_name . "_title");


$division->prints["match_legend_link"] = $cmr->translate("Links");

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(get_post("id_" . $table_name)) $cmr->post_var["id_" . $table_name] = get_post("id_" . $table_name);
if(empty($cmr->post_var["id_" . $table_name])) $cmr->post_var["id_" . $table_name] = $cmr->get_column($cmr->get_conf("cmr_table_prefix") . $table_name, $column_id);
if(empty($cmr->post_var["id_" . $table_name])){
	print($cmr->translate("No " . $table_name . " selected! clic here => "));
	print($cmr->module_link("modules/view_" . $table_name . ".php?conf_name=conf_" . $table_name . $cmr->get_ext("conf") . "&id_" . $table_name . "=", 1));
	print($cmr->translate(" to select one."));
    return;
} 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
	$lk->add_link("modules/new_" . $table_name . ".php?conf_name=conf.d/conf_" . $table_name . $cmr->get_ext("conf") . "&id_" . $table_name . "=" . $cmr->post_var["id_" . $table_name], 1, "new");
	$lk->add_link("modules/update_" . $table_name . ".php?conf_name=conf.d/conf_" . $table_name . $cmr->get_ext("conf") . "&id_" . $table_name . "=" . $cmr->post_var["id_" . $table_name], 1, "upadte");
	$lk->add_link("modules/search_" . $table_name . ".php?conf_name=conf.d/conf_" . $table_name . $cmr->get_ext("conf") . "&id_" . $table_name . "=" . $cmr->post_var["id_" . $table_name], 1, "search");
	$lk->add_link("modules/preview_" . $table_name . ".php?conf_name=conf.d/conf_" . $table_name . $cmr->get_ext("conf") . "&id_" . $table_name . "=" . $cmr->post_var["id_" . $table_name], 1, "preview");
	$lk->add_link("modules/report_" . $table_name . ".php?conf_name=conf.d/conf_" . $table_name . $cmr->get_ext("conf") . "&id_" . $table_name . "=" . $cmr->post_var["id_" . $table_name], 1, "report");
	$lk->add_link("modules/view_" . $table_name . ".php?conf_name=conf.d/conf_" . $table_name . $cmr->get_ext("conf") . "&id_" . $table_name . "=" . $cmr->post_var["id_" . $table_name], 1, "view");
$division->prints["match_open_tab"] = $lk->open_module_tab(1);

$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/menu_" . $table_name . ".php?conf_name=conf.d/conf_" . $table_name . $cmr->get_ext("conf") . "&id_" . $table_name . "=" . $cmr->post_var["id_" . $table_name], 1);
$division->prints["match_list_link"] = $lk->list_link();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// $cmr->query[$table_name] = sprintf("SELECT * FROM  " . $cmr->get_conf("cmr_table_prefix") . $table_name . " where " . $column_id . "='%s'", cmr_escape($cmr->post_var["id_" . $table_name]));

// $cmr->db["result"][$table_name] = cmrdb_query($cmr->query[$table_name], $cmr->db_connection) or db_die(__LINE__  . " - "  . __FILE__ . ": " . cmrdb_error());
// $val_u = cmrdb_fetch_object($cmr->db["result"][$table_name]);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$val_u = $cmr->get_column($cmr->get_conf("cmr_table_prefix") . $table_name, "*", $column_id, $cmr->post_var["id_" . $table_name]);


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$division->prints["match_www_path"] = $cmr->get_path("www");
$division->prints["match_form_param"] = "";
$division->prints["match_form_id"] = "update_form";

file_exists($cmr->config["get_update_" . $table_name]) ? $get_file = $cmr->config["get_update_" . $table_name] : $get_file = $cmr->get_path("get_data") . "get_data/get_update_" . $table_name . ".php";
file_exists($cmr->config["path_update_" . $table_name]) ? $path_file = $cmr->config["path_update_" . $table_name] : $path_file = __FILE__;

$division->prints["match_input_hidden_module"] = cmr_input_hidden("middle1", $path_file, "hidden");
$division->prints["match_input_hidden_get"] = cmr_input_hidden("cmr_get_data", $get_file, "hidden");
$division->prints["match_input_hidden_conf"] = cmr_input_hidden("cmr_conf", "conf.d/modules/conf_" . $table_name . $cmr->get_ext("conf"), "hidden");
$division->prints["match_input_hidden_id_" . $table_name] = cmr_input_hidden("id_" . $table_name, $cmr->post_var["id_" . $table_name], "hidden");

$division->prints["match_legend_" . $table_name] = $cmr->translate($table_name);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//   $division->prints["match_function_" . $key] = $array_prints["match_function_" . $key];
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$_SESSION["__update__"] = array();
foreach($array_column as $key => $value ){
  $division->prints["match_label_" . $key] = $cmr->translate($key);
  $division->prints["match_value_" . $key] = $cmr->print_value($cmr->get_conf("cmr_table_prefix") . $table_name, $key, $val_u[$key], $value["type"], $value["foreign"]);
  $_SESSION["__update__"][$key] = $val_u[$key];
  $division->prints["match_link_" . $key] = "";//$cmr->module_link("modules/new_" . $extern_table . ".php" . "", "", "->")
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_script_calendar"] = ""; // "@_script_calendar_@";


$division->prints["match_submit_update"] = $cmr->translate("save  " . $table_name);
$division->prints["match_submit_new"] = $cmr->translate("save new");
$division->prints["match_submit_java1"] = $cmr->translate("confirm that you want to update this " . $table_name);
$division->prints["match_submit_java2"] = $cmr->translate("confirm that you want to create like new this " . $table_name);
$division->prints["match_reset_form"] = $cmr->translate("confirm that you want to empty this form");

$division->prints["match_close_tab"] = $lk->close_module_tab();
$division->prints["match_close_windows"] = $division->close(); 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$templates_file = $mod->good_file($cmr->user, $cmr->page["language"], "template", $table_name);

// $templates_file = $cmr->good_file("template", $table_name);
$division->template = $division->load_template($templates_file);
  
$division->print_template("template");
$division->prints = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
