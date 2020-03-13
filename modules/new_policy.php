<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * new_policy.php
 * ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */

/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.

new_policy.php, Ver 3.03, 2011-Aug-Tue 14:19:54
*/

/**
 * Information about
 *
 * This is a modular application, all can be personalise, config file, template file, class, function, module
 * $division object istance of the class windowss
 *
 * @open _windows Class use to make module layer
 * @code_link() function  who take in input a module name and create and html link to this module
 */
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once("camaroes_class.php");
include_once("common_begin.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->action["to_load"] = "class_policy.php";
include($cmr->get_path("index") . "system/loader/loader_class.php");
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
$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);
// $division->module["name"] = $mod->name;
$division->module["title"] = $cmr->translate($mod->base_name); 
// $division->module["text"] = "";
$division->prints["match_open_windows"] = $division->show_noclose();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_policy_title1"] = ""; 
$division->prints["match_policy_title2"] = ""; 
if(($cmr->translate($mod->base_name))) 
$division->prints["match_policy_title1"] = $cmr->translate($mod->base_name);
if(isset($cmr->language[$mod->base_name."_title"])) 
$division->prints["match_policy_title2"] = $cmr->translate($mod->base_name . "_title");

  $source = get_post("source");
  $table_name = get_post("table_name");
  $line_id = get_post("line_id");
  
  if(!($source)) $source = $cmr->post_var["source"];
  if(!($table_name)) $table_name = $cmr->post_var["table_name"];
  if(!($line_id)) $line_id = $cmr->post_var["line_id"];
  
  if($table_name){
  $division->prints["match_policy_title2"] = $cmr->translate("New Policy for [" . $table_name ."]");
  if(empty($source)) $source = $cmr->config["db_name"];
  
  }
  
$division->prints["match_legend_link"] = $cmr->translate("Links");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(empty($cmr->post_var["id_policy"])) $cmr->post_var["id_policy"] = "";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/new_policy.php?conf_name=conf.d/conf_policy" . $cmr->get_ext("conf") . "&id_policy=" . $cmr->post_var["id_policy"] . "", 1, "new");
$lk->add_link("modules/update_policy.php?conf_name=conf.d/conf_policy" . $cmr->get_ext("conf") . "&id_policy=" . $cmr->post_var["id_policy"] . "", 1, "upadte");
$lk->add_link("modules/search_policy.php?conf_name=conf.d/conf_policy" . $cmr->get_ext("conf") . "&id_policy=" . $cmr->post_var["id_policy"] . "", 1, "search");
$lk->add_link("modules/view_policy.php?conf_name=conf.d/conf_policy" . $cmr->get_ext("conf") . "&id_policy=" . $cmr->post_var["id_policy"] . "", 1, "delete");
$lk->add_link("modules/view_policy.php?conf_name=conf.d/conf_policy" . $cmr->get_ext("conf") . "&id_policy=" . $cmr->post_var["id_policy"] . "", 1, "view");
$lk->add_link("modules/report_policy.php?conf_name=conf.d/conf_policy" . $cmr->get_ext("conf") . "&id_policy=" . $cmr->post_var["id_policy"] . "", 1, "report");
$lk->add_link("modules/preview_policy.php?conf_name=conf.d/conf_policy" . $cmr->get_ext("conf") . "&id_policy=" . $cmr->post_var["id_policy"] . "", 1, "preview");
$division->prints["match_open_tab"] = $lk->open_module_tab(0);

$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/menu_policy.php?conf_name=conf.d/conf_policy" . $cmr->get_ext("conf") . "&id_policy=" . $cmr->post_var["id_policy"], 1);
$division->prints["match_list_link"] = $lk->list_link();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_www_path"] = $cmr->get_path("www");
$division->prints["match_form_param"] = "";
$division->prints["match_form_id"] = "new_form";

file_exists($cmr->config["get_new_policy"]) ? $get_file = $cmr->config["get_new_policy"] : $get_file = $cmr->get_path("get_data") . "get_data/get_new_policy.php";
file_exists($cmr->config["path_new_policy"]) ? $path_file = $cmr->config["path_new_policy"] : $path_file = __FILE__;

$division->prints["match_input_hidden_get"] = input_hidden("<input type=\"hidden\" value=\"" . $get_file . "\" name=\"cmr_get_data\" />");
$division->prints["match_input_hidden_module"] = input_hidden("<input type=\"hidden\" value=\"" . $path_file . "\" name=\"middle1\" />");
$division->prints["match_input_hidden_id_policy"] = input_hidden("<input type=\"hidden\" value=\"" . $cmr->post_var["id_policy"] . "\" name=\"id_policy\" />");
$division->prints["match_input_hidden_conf"] = input_hidden("<input type=\"hidden\" value=\"conf.d/modules/conf_policy" . $cmr->get_ext("conf") . "\" name=\"cmr_conf\" />");

$division->prints["match_legend_policy"] = $cmr->translate("policy");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 
  $division->prints['match_label_id'] = "";
  $division->prints['match_function_id'] =  ""; // cmrprint_select($cmr->get_conf('cmr_new_function'), 'func_id', '');
  $division->prints['match_value_id'] = "";
    
 

  $division->prints['match_label_source'] = "<label><b>" . $cmr->translate("source") . ":</b></label>";
  $division->prints['match_function_source'] =  ""; // cmrprint_select($cmr->get_conf('cmr_new_function'), 'func_source', '');
  $division->prints['match_value_source'] = "<input size=\"20\" type=\"text\" value=\"\"  id=\"source\" name=\"source\" onclick=\"large_id('policy,source')\">";
  if($source){
	$division->prints['match_label_source'] = "";
	$division->prints['match_value_source'] = input_hidden("<input type=\"hidden\" value=\"" . $source . "\" name=\"source\">");
  }
  

  $division->prints['match_label_table_name'] = "<label><b>" . ucfirst($cmr->translate("table_name")) . ":</b></label>";
  $division->prints['match_function_table_name'] =  ""; // cmrprint_select($cmr->get_conf('cmr_new_function'), 'func_table_name', '');
  $division->prints['match_value_table_name'] = "<input size=\"20\" type=\"text\" value=\"\"  id=\"table_name\" name=\"table_name\" onclick=\"large_id('policy,table_name')\">";
  if($table_name){
	$division->prints['match_label_table_name'] = "";
	$division->prints['match_value_table_name'] = input_hidden("<input type=\"hidden\" value=\"" . $table_name . "\" name=\"table_name\">");
  }
  

  $division->prints['match_label_line_id'] = "<label><b>" . ucfirst($cmr->translate("line")) . ":</b></label>";
  $division->prints['match_function_line_id'] =  ""; // cmrprint_select($cmr->get_conf('cmr_new_function'), 'func_line_id', '');
  $division->prints['match_value_line_id'] = "<input size=\"20\" type=\"text\" value=\"\"  id=\"line\" name=\"line\" onclick=\"large_id('policy,line')\">";
  if($line_id){
	$division->prints['match_label_line_id'] = "";
	$division->prints['match_value_line_id'] = input_hidden("<input type=\"hidden\" value=\"" . $line_id . "\" name=\"line\">");
  }
  

  $division->prints['match_label_state'] = "<label><b>" . ucfirst($cmr->translate("state")) . ":</b></label>";
  $division->prints['match_function_state'] =  ""; // cmrprint_select($cmr->get_conf('cmr_new_function'), 'func_state', '');
  $division->prints['match_value_state'] = "<select name=\"state\" id=\"state\"  onclick=\"large_id('policy,state')\">" . $cmr->print_select($cmr->config["cmr_table_prefix"] . "policy", "state", "type") . "</select>" . $cmr->module_link("modules/change_type.php?table_name=policy&column_name=state", "", "->");
  

  $division->prints['match_label_type'] = "<label><b>" . ucfirst($cmr->translate("type")) . ":</b></label>";
  $division->prints['match_function_type'] =  ""; // cmrprint_select($cmr->get_conf('cmr_new_function'), 'func_type', '');
  $division->prints['match_value_type'] = "<select name=\"type\" id=\"type\"  onclick=\"large_id('policy,type')\">" . $cmr->print_select($cmr->config["cmr_table_prefix"] . "policy", "type", "type") . "</select>" . $cmr->module_link("modules/change_type.php?table_name=policy&column_name=type", "", "->");
  

  $division->prints['match_label_privilege'] = "<label><b>" . ucfirst($cmr->translate("privilege")) . ":</b></label>";
  $division->prints['match_function_privilege'] =  ""; // cmrprint_select($cmr->get_conf('cmr_new_function'), 'func_privilege', '');
  $division->prints['match_value_privilege'] = "<select name=\"privilege\" id=\"privilege\"  onclick=\"large_id('policy,privilege')\">" . $cmr->print_select($cmr->config["cmr_table_prefix"] . "policy", "privilege", "type") . "</select>" . $cmr->module_link("modules/change_type.php?table_name=policy&column_name=privilege", "", "->");
  

  $division->prints['match_label_allow_type'] = "<label><b>" . ucfirst($cmr->translate("allow_type")) . ":</b></label>";
  $division->prints['match_function_allow_type'] =  ""; // cmrprint_select($cmr->get_conf('cmr_new_function'), 'func_allow_type', '');
  $division->prints['match_value_allow_type'] = show_hide("allow_type", "begin") . "<select name=\"allow_type\" id=\"allow_type\"  onclick=\"large_id('policy,allow_type')\">" . $cmr->print_select($cmr->config["cmr_table_prefix"] . "groups", "type", "type") . "</select>" . $cmr->module_link("modules/change_type.php?table_name=groups&column_name=type", "", "->") . show_hide("allow_type", "end") ;
  

  $division->prints['match_label_allow_email'] = "<label><b>" . ucfirst($cmr->translate("allow_email")) . ":</b></label>";
  $division->prints['match_function_allow_email'] =  ""; // cmrprint_select($cmr->get_conf('cmr_new_function'), 'func_allow_email', '');
  $division->prints['match_value_allow_email'] = show_hide("allow_email", "begin") . "<select name=\"allow_email\" id=\"allow_email\"  onclick=\"large_id('policy,allow_email')\">" . $cmr->print_select($cmr->config["cmr_table_prefix"] . "user", "email", "column") . "</select>" . $cmr->module_link("modules/new_user.php", "", "->") . show_hide("allow_email", "end");
  

  $division->prints['match_label_allow_groups'] = "<label><b>" . ucfirst($cmr->translate("allow_groups")) . ":</b></label>";
  $division->prints['match_function_allow_groups'] =  ""; // cmrprint_select($cmr->get_conf('cmr_new_function'), 'func_allow_groups', '');
  $division->prints['match_value_allow_groups'] = show_hide("allow_groups", "begin") . "<select name=\"allow_groups\" id=\"allow_groups\"  onclick=\"large_id('policy,allow_groups')\">" . $cmr->print_select($cmr->config["cmr_table_prefix"] . "groups", "name", "column") . "</select>" . $cmr->module_link("modules/new_groups.php", "", "->") . show_hide("allow_groups", "end");
  

  $division->prints['match_label_date_time'] = "";
  $division->prints['match_function_date_time'] = ""; // cmrprint_select($cmr->get_conf('cmr_new_function'), 'func_date_time', '');
  $division->prints['match_value_date_time'] = "";
  

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_script_calendar"] = ""; // "@_script_calendar_@";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_submit_update"] = $cmr->translate("update");
$division->prints["match_submit_new"] = $cmr->translate("save new policy");
$division->prints["match_submit_java1"] = $cmr->translate("confirm that you want to update this policy");
$division->prints["match_submit_java2"] = $cmr->translate("confirm that you want to create like new this policy");
$division->prints["match_submit_java"] = $cmr->translate("confirm that you want create this policy");

$division->prints["match_close_tab"] = $lk->close_module_tab();
$division->prints["match_close_windows"] = $division->close(); 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$templates_file = $mod->good_file($cmr->user, $cmr->page["language"], "template", "policy");

// $templates_file = $cmr->good_file("template", "policy");
$division->template = $division->load_template($templates_file);
  
$division->print_template();
$division->prints = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
