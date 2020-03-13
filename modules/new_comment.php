<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * new_comment.php
 * ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */

/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.

new_comment.php, Ver 3.03, 2011-Aug-Tue 14:19:38
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
$cmr->action["to_load"] = "class_comment.php";
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
$division->prints["match_reset_form"] = $cmr->translate("reset"); 
$division->prints["match_comment_title1"] = ""; 
$division->prints["match_comment_title2"] = ""; 
if(($cmr->translate($mod->base_name))) 
$division->prints["match_comment_title1"] = $cmr->translate($mod->base_name);
if(isset($cmr->language[$mod->base_name."_title"])) 
$division->prints["match_comment_title2"] = $cmr->translate($mod->base_name . "_title");

  $table_name = get_post("table_name");
  $line_id = get_post("line_id");
  
  if(empty($cmr->post_var["table_name"])) $cmr->post_var["table_name"] =  "";
  if(empty($cmr->post_var["line_id"])) $cmr->post_var["line_id"] =  "";
  
  if(empty($table_name)) $table_name = $cmr->post_var["table_name"];
  if(empty($line_id)) $line_id = $cmr->post_var["line_id"];
  
  if($table_name)
  $division->prints["match_policy_title2"] = $cmr->translate("New comment for [" . $table_name ."]");
  
  

$division->prints["match_legend_link"] = $cmr->translate("Links");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(empty($cmr->post_var["id_comment"])) $cmr->post_var["id_comment"] = "";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/new_comment.php?conf_name=conf.d/conf_comment" . $cmr->get_ext("conf") . "&id_comment=" . $cmr->post_var["id_comment"] . "", 1, "new");
$lk->add_link("modules/update_comment.php?conf_name=conf.d/conf_comment" . $cmr->get_ext("conf") . "&id_comment=" . $cmr->post_var["id_comment"] . "", 1, "upadte");
$lk->add_link("modules/search_comment.php?conf_name=conf.d/conf_comment" . $cmr->get_ext("conf") . "&id_comment=" . $cmr->post_var["id_comment"] . "", 1, "search");
$lk->add_link("modules/view_comment.php?conf_name=conf.d/conf_comment" . $cmr->get_ext("conf") . "&id_comment=" . $cmr->post_var["id_comment"] . "", 1, "delete");
$lk->add_link("modules/view_comment.php?conf_name=conf.d/conf_comment" . $cmr->get_ext("conf") . "&id_comment=" . $cmr->post_var["id_comment"] . "", 1, "view");
$lk->add_link("modules/report_comment.php?conf_name=conf.d/conf_comment" . $cmr->get_ext("conf") . "&id_comment=" . $cmr->post_var["id_comment"] . "", 1, "report");
$lk->add_link("modules/preview_comment.php?conf_name=conf.d/conf_comment" . $cmr->get_ext("conf") . "&id_comment=" . $cmr->post_var["id_comment"] . "", 1, "preview");
$division->prints["match_open_tab"] = $lk->open_module_tab(0);

$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/menu_comment.php?conf_name=conf.d/conf_comment" . $cmr->get_ext("conf") . "&id_comment=" . $cmr->post_var["id_comment"], 1);
$division->prints["match_list_link"] = $lk->list_link();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_www_path"] = $cmr->get_path("www");
$division->prints["match_form_param"] = "";
$division->prints["match_form_id"] = "new_form";

file_exists($cmr->config["get_new_comment"]) ? $get_file = $cmr->config["get_new_comment"] : $get_file = $cmr->get_path("get_data") . "get_data/get_new_comment.php";
file_exists($cmr->config["path_new_comment"]) ? $path_file = $cmr->config["path_new_comment"] : $path_file = __FILE__;

$division->prints["match_input_hidden_get"] = input_hidden("<input type=\"hidden\" value=\"" . $get_file . "\" name=\"cmr_get_data\" />");
$division->prints["match_input_hidden_module"] = input_hidden("<input type=\"hidden\" value=\"" . $path_file . "\" name=\"middle1\" />");
$division->prints["match_input_hidden_id_comment"] = input_hidden("<input type=\"hidden\" value=\"" . $cmr->post_var["id_comment"] . "\" name=\"id_comment\" />");
$division->prints["match_input_hidden_conf"] = input_hidden("<input type=\"hidden\" value=\"conf.d/modules/conf_comment" . $cmr->get_ext("conf") . "\" name=\"cmr_conf\" />");

$division->prints["match_legend_comment"] = $cmr->translate("comment");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

  $division->prints['match_label_id'] = "";
  $division->prints['match_function_id'] = ""; //cmrprint_select($cmr->get_conf('cmr_new_function'), 'func_id', '');
  $division->prints['match_value_id'] = "";
  

  $division->prints['match_label_sender'] = "<label><b>" . ucfirst($cmr->translate("sender")) . ":</b></label>";
  $division->prints['match_function_sender'] = ""; // cmrprint_select($cmr->get_conf('cmr_new_function'), 'func_sender', '');
  $division->prints['match_value_sender'] = "<input size=\"20\" type=\"text\" value=\"" . $cmr->user["auth_email"] . "\"  id=\"sender\" name=\"sender\" onclick=\"large_id('comment,sender')\">";
  

  $division->prints['match_label_title'] = "<label><b>" . ucfirst($cmr->translate("title")) . ":</b></label>";
  $division->prints['match_function_title'] = ""; // cmrprint_select($cmr->get_conf('cmr_new_function'), 'func_title', '');
  $division->prints['match_value_title'] = "<input size=\"20\" type=\"text\" value=\"\"  id=\"title\" name=\"title\" onclick=\"large_id('comment,title')\">";
  

  $division->prints['match_label_text'] = "<label><b>" . ucfirst($cmr->translate("text")) . ":</b></label>";
  $division->prints['match_function_text'] = ""; // cmrprint_select($cmr->get_conf('cmr_new_function'), 'func_text', '');
  $division->prints['match_value_text'] = "<textarea rows=\"8\" cols=\"40\" name=\"text\" id=\"text\" onclick=\"large_id('comment,text')\"></textarea>";
  

  $division->prints['match_label_state'] = "<label><b>" . ucfirst($cmr->translate("state")) . ":</b></label>";
  $division->prints['match_function_state'] = cmrprint_select($cmr->get_conf('cmr_new_function'), 'func_state', '');
  $division->prints['match_value_state'] = "<select name=\"state\" id=\"state\"  onclick=\"large_id('comment,state')\">" . $cmr->print_select($cmr->config["cmr_table_prefix"] . "comment", "state", "type") . "</select>" . $cmr->module_link("modules/change_type.php?table_name=comment&column_name=state", "", "->");
  

  $division->prints['match_label_table_name'] = "<label><b>" . ucfirst($cmr->translate("table_name")) . ":</b></label>";
  $division->prints['match_function_table_name'] = cmrprint_select($cmr->get_conf('cmr_new_function'), 'func_table_name', '');
  $division->prints['match_value_table_name'] = "<input size=\"20\" type=\"text\" value=\"\"  id=\"table_name\" name=\"table_name\" onclick=\"large_id('comment,table_name')\">";
  if($table_name){
	$division->prints['match_label_table_name'] = "";
	$division->prints['match_value_table_name'] = input_hidden("<input type=\"hidden\" value=\"" . $table_name . "\" name=\"table_name\">");
  }
  

  $division->prints['match_label_line_id'] = "<label><b>" . ucfirst($cmr->translate("line")) . ":</b></label>";
  $division->prints['match_function_line_id'] = cmrprint_select($cmr->get_conf('cmr_new_function'), 'func_line_id', '');
  $division->prints['match_value_line_id'] = "<input size=\"20\" type=\"text\" value=\"\"  id=\"line_id\" name=\"line_id\" onclick=\"large_id('comment,line_id')\">";
  if($line_id){
	$division->prints['match_label_line_id'] = "";
	$division->prints['match_value_line_id'] = input_hidden("<input type=\"hidden\" value=\"" . $line_id . "\" name=\"line_id\">");
  }

  $division->prints['match_label_encoding'] = "<label><b>" . ucfirst($cmr->translate("encoding")) . ":</b></label>";
  $division->prints['match_function_encoding'] = ""; //cmrprint_select($cmr->get_conf('cmr_new_function'), 'func_encoding', '');
  $division->prints['match_value_encoding'] = "<input size=\"20\" type=\"text\" value=\"" . $cmr->language["cmr_charset"] . "\"  id=\"encoding\" name=\"encoding\" onclick=\"large_id('comment,encoding')\">";

  
  
  $array_value = get_languages_list($cmr->config);
  $division->prints['match_label_language'] = "<label><b>" . ucfirst($cmr->translate("language")) . ":</b></label>";
  $division->prints['match_function_language'] = ""; //cmrprint_select($cmr->get_conf('cmr_new_function'), 'func_language', '');
  
  $division->prints['match_value_language'] = "<select id=\"language\" name=\"language\" onclick=\"large_id('comment,language')\">";
  $division->prints['match_value_language'] .= "<option value=\"" . $cmr->page["language"] . "\">" . $cmr->translate($cmr->page["language"]) . "</opttion>";
  $division->prints['match_value_language'] .= select_order($cmr->language, $array_value[1],  $array_value[2], "1");
  $division->prints['match_value_language'] .= "</select>";


  $division->prints['match_label_date_time'] = "";
  $division->prints['match_function_date_time'] = ""; //cmrprint_select($cmr->get_conf('cmr_new_function'), 'func_date_time', '');
  $division->prints['match_value_date_time'] = "";
  

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_script_calendar"] = ""; // "@_script_calendar_@";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_submit_update"] = $cmr->translate("send update");
$division->prints["match_submit_new"] = $cmr->translate("save new comment");
$division->prints["match_submit_java1"] = $cmr->translate("confirm that you want to update this comment");
$division->prints["match_submit_java2"] = $cmr->translate("confirm that you want to create like new this comment");
$division->prints["match_submit_java"] = $cmr->translate("confirm that you want create this comment");

$division->prints["match_close_tab"] = $lk->close_module_tab();
$division->prints["match_close_windows"] = $division->close(); 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$templates_file = $mod->good_file($cmr->user, $cmr->page["language"], "template", "comment");

// $templates_file = $cmr->good_file("template", "comment");
$division->template = $division->load_template($templates_file);
  
$division->print_template();
$division->prints = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
