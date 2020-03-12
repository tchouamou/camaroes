<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * imap.php
 * ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */

/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























imap.php,Ver 3.0  2011-Jan-Sun 18:22:17
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
$cmr->action["to_load"] = "imap.php";
include($cmr->get_path("index") . "system/loader/loader_function.php");
$cmr->action["to_load"] = "imap.php";
include($cmr->get_path("index") . "system/loader/loader_class.php");

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

if($cmr->post_var["cmr_get_data"] == "get_data/get_" . $mod->base_name . ".php"){
include_once($cmr->get_path("index") . "system/loader/loader_get.php");
include_once($cmr->get_path("index") . "system/run_result.php");
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$cmr->action["todo"] = "new_imap";

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);



// $division->module["name"]= $mod->name;



$division->module["title"]= $cmr->translate($mod->base_name); 
// $division->module["text"] = "";


















$division->prints["match_open_windows"] = $division->show_noclose();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// $division->prints["imap in C:\Documents and Settings\Eric\Desktop\chiavetta\camaroes\modules\imap.php on line 131
$division->prints["match_mail_title1"] = "";
$division->prints["match_mail_title2"] = "";
$division->prints["cmr_wwwpath"] = "";
$division->prints["match_label_imap"] = "";
$division->prints["match_value_encoding"] = "";
$division->prints["match_value_lang"] = "";
$division->prints["match_value_header"] = "";
$division->prints["match_value_mail_from"] = "";
$division->prints["match_value_mail_to"] = "";
$division->prints["match_value_mail_cc"] = "";
$division->prints["match_value_mail_bcc"] = "";
$division->prints["match_value_mail_title"] = "";
$division->prints["match_value_text"] = "";
$division->prints["match_label_attach1"] = "";
$division->prints["match_label_attach2"] = "";
$division->prints["match_label_attach3"] = "";
$division->prints["match_label_attach4"] = "";

$division->prints["match_imap_title1"] = ""; 
$division->prints["match_imap_title2"] = ""; 
if(($cmr->translate($mod->base_name))) 
$division->prints["match_imap_title1"] = $cmr->translate($mod->base_name);
if(isset($cmr->language[$mod->base_name."_title"])) 
$division->prints["match_imap_title2"] = $cmr->translate($mod->base_name . "_title");


$division->prints["match_legend_link"] = $cmr->translate("Links");


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(empty($cmr->post_var["id_imap"])) $cmr->post_var["id_imap"] = "";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/new_imap.php?conf_name=conf.d/modules/conf_imap.ini&id_imap=" . $cmr->post_var["id_imap"], 1);
$lk->add_link("modules/update_imap.php?conf_name=conf.d/conf_imap" . $cmr->get_ext("conf") . "&id_imap=" . $cmr->post_var["id_imap"], 1);
$lk->add_link("modules/search_imap.php?conf_name=conf.d/conf_imap" . $cmr->get_ext("conf") . "&id_imap=" . $cmr->post_var["id_imap"], 1);
$lk->add_link("modules/view_imap.php?conf_name=conf.d/conf_imap" . $cmr->get_ext("conf") . "&id_imap=" . $cmr->post_var["id_imap"], 1);
$lk->add_link("modules/preview_imap.php?conf_name=conf.d/conf_imap" . $cmr->get_ext("conf") . "&id_imap=" . $cmr->post_var["id_imap"], 1);
$lk->add_link("modules/report_imap.php?conf_name=conf.d/conf_imap" . $cmr->get_ext("conf") . "&id_imap=" . $cmr->post_var["id_imap"] . "&layer=2=&middle2=", 1);
$division->prints["match_open_tab"] = $lk->open_module_tab(0);


$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/view_imap.php?conf_name=conf_imap" . $cmr->get_ext("conf") . "&id_imap=" . $cmr->post_var["id_imap"], 1);
$lk->add_link("modules/menu_imap.php?conf_name=conf.d/conf_imap" . $cmr->get_ext("conf") . "&id_imap=" . $cmr->post_var["id_imap"], 1);
$division->prints["match_list_link"] = $lk->list_link();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_www_path"] = $cmr->get_path("www");
$division->prints["match_form_param"] = "";
$division->prints["match_form_id"] = "new_form";

$division->prints["match_input_hidden_get"] = input_hidden("<input type=\"hidden\" value=\"get_data/guest/get_imap.php\" name=\"cmr_get_data\" />");
$division->prints["match_input_hidden_module"] = input_hidden("<input type=\"hidden\" value=\"modules/" . $cmr->action["todo"] . ".php\" name=\"middle1\" />");
$division->prints["match_input_hidden_conf"] = input_hidden("<input type=\"hidden\" value=\"conf.d/modules/conf_imap" . $cmr->get_ext("conf") . "\" name=\"cmr_conf\" />");

$division->prints["match_legend_imap"] = $cmr->translate("imap");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!




// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
  $division->prints["match_match_value_encoding"] = "";
  $division->prints["match_match_value_lang"] = "";
  $division->prints["match_match_value_imap_from"] = "";
  $division->prints["match_match_value_imap_to"] = "";
  $division->prints["match_match_value_imap_cc"] = "";
  $division->prints["match_match_value_imap_bcc"] = "";
  $division->prints["match_match_value_imap_title"] = "";
  $division->prints["match_match_value_text"] = "";


  $division->prints["match_label_id"] = "";
  $division->prints["match_function_id"] = cmrprint_select($cmr->get_conf("cmr_new_function"), "func_id", "");
  $division->prints["match_input_id"] = "";
  

  $division->prints["match_label_encoding"] = "<label><b>" . ucfirst($cmr->translate("encoding")) . ":</b></label>";
  $division->prints["match_function_encoding"] = cmrprint_select($cmr->get_conf("cmr_new_function"), "func_encoding", "");
  $division->prints["match_input_encoding"] = "<input size=\"20\" type=\"text\" value=\"\"  id=\"encoding\" name=\"encoding\" onclick=\"large_id('imap,encoding')\">";
  

  $division->prints["match_label_lang"] = "<label><b>" . ucfirst($cmr->translate("language")) . ":</b></label>";
  $division->prints["match_function_lang"] = cmrprint_select($cmr->get_conf("cmr_new_function"), "func_lang", "");
  $division->prints["match_input_lang"] = "<input size=\"20\" type=\"text\" value=\"\"  id=\"lang\" name=\"lang\" onclick=\"large_id('imap,lang')\">";
  

  $division->prints["match_label_header"] = "<label><b>" . ucfirst($cmr->translate("header")) . ":</b></label>";
  $division->prints["match_function_header"] = cmrprint_select($cmr->get_conf("cmr_new_function"), "func_header", "");
  $division->prints["match_input_header"] = "<textarea rows=\"8\" cols=\"40\" name=\"header\" id=\"header\" onclick=\"large_id('imap,header')\"></textarea>";
  

  $division->prints["match_label_mail_title"] = "<label><b>" . ucfirst($cmr->translate("mail_title")) . ":</b></label>";
  $division->prints["match_function_mail_title"] = cmrprint_select($cmr->get_conf("cmr_new_function"), "func_mail_title", "");
  $division->prints["match_input_mail_title"] = "<input size=\"20\" type=\"text\" value=\"\"  id=\"mail_title\" name=\"mail_title\" onclick=\"large_id('imap,mail_title')\">";
  

  $division->prints["match_label_mail_from"] = "<label><b>" . ucfirst($cmr->translate("mail_from")) . ":</b></label>";
  $division->prints["match_function_mail_from"] = cmrprint_select($cmr->get_conf("cmr_new_function"), "func_mail_from", "");
  $division->prints["match_input_mail_from"] = "<input size=\"20\" type=\"text\" value=\"\"  id=\"mail_from\" name=\"mail_from\" onclick=\"large_id('imap,mail_from')\">";
  

  $division->prints["match_label_mail_to"] = "<label><b>" . ucfirst($cmr->translate("mail_to")) . ":</b></label>";
  $division->prints["match_function_mail_to"] = cmrprint_select($cmr->get_conf("cmr_new_function"), "func_mail_to", "");
  $division->prints["match_input_mail_to"] = "<input size=\"20\" type=\"text\" value=\"\"  id=\"mail_to\" name=\"mail_to\" onclick=\"large_id('imap,mail_to')\">";
  

  $division->prints["match_label_mail_cc"] = "<label><b>" . ucfirst($cmr->translate("mail_cc")) . ":</b></label>";
  $division->prints["match_function_mail_cc"] = cmrprint_select($cmr->get_conf("cmr_new_function"), "func_mail_cc", "");
  $division->prints["match_input_mail_cc"] = "<input size=\"20\" type=\"text\" value=\"\"  id=\"mail_cc\" name=\"mail_cc\" onclick=\"large_id('imap,mail_cc')\">";
  

  $division->prints["match_label_mail_bcc"] = "<label><b>" . ucfirst($cmr->translate("mail_bcc")) . ":</b></label>";
  $division->prints["match_function_mail_bcc"] = cmrprint_select($cmr->get_conf("cmr_new_function"), "func_mail_bcc", "");
  $division->prints["match_input_mail_bcc"] = "<input size=\"20\" type=\"text\" value=\"\"  id=\"mail_bcc\" name=\"mail_bcc\" onclick=\"large_id('imap,mail_bcc')\">";
  

  $division->prints["match_label_attach"] = "<label><b>" . ucfirst($cmr->translate("attach")) . ":</b></label>";
  $division->prints["match_function_attach"] = cmrprint_select($cmr->get_conf("cmr_new_function"), "func_attach", "");
  $division->prints["match_input_attach"] = "<input type=\"file\" name=\"attach\" id=\"attach\"  />";
  

  $division->prints["match_label_text"] = "<label><b>" . ucfirst($cmr->translate("text")) . ":</b></label>";
  $division->prints["match_function_text"] = cmrprint_select($cmr->get_conf("cmr_new_function"), "func_text", "");
  $division->prints["match_input_text"] = "<textarea rows=\"8\" cols=\"40\" name=\"text\" id=\"text\" onclick=\"large_id('imap,text')\"></textarea>";
  

//   $division->prints["match_label_my_master"] = "<label><b>" . ucfirst($cmr->translate("my_master")) . ":</b></label>";
//   $division->prints["match_function_my_master"] = cmrprint_select($cmr->get_conf("cmr_new_function"), "func_my_master", "");
//   $division->prints["match_input_my_master"] = show_hide("my_master", "begin") . "<select name=\"my_master\" id=\"my_master\"  onclick=\"large_id('imap,my_master')\">" . $cmr->print_select($cmr->get_conf("cmr_table_prefix") . "imap", "encoding,lang,header", "column") . "</select>" . $cmr->module_link("modules/imap.php", "", "->") . show_hide("my_master", "end");
//   

//   $division->prints["match_label_allow_type"] = "<label><b>" . ucfirst($cmr->translate("allow_type")) . ":</b></label>";
//   $division->prints["match_function_allow_type"] = cmrprint_select($cmr->get_conf("cmr_new_function"), "func_allow_type", "");
//   $division->prints["match_input_allow_type"] = show_hide("allow_type", "begin") . "<select name=\"allow_type\" id=\"allow_type\"  onclick=\"large_id('imap,allow_type')\">" . $cmr->print_select($cmr->get_conf("cmr_table_prefix") . "groups", "type", "type") . "</select>" . $cmr->module_link("modules/change_type.php?table_name=groups&column_name=type", "", "->") . show_hide("allow_type", "end") ;
//   

//   $division->prints["match_label_allow_imap"] = "<label><b>" . ucfirst($cmr->translate("allow_imap")) . ":</b></label>";
//   $division->prints["match_function_allow_imap"] = cmrprint_select($cmr->get_conf("cmr_new_function"), "func_allow_imap", "");
//   $division->prints["match_input_allow_imap"] = show_hide("allow_imap", "begin") . "<select name=\"allow_imap\" id=\"allow_imap\"  onclick=\"large_id('imap,allow_imap')\">" . $cmr->print_select($cmr->get_conf("cmr_table_prefix") . "user", "imap", "column") . "</select>" . $cmr->module_link("modules/new_user.php", "", "->") . show_hide("allow_imap", "end");
//   

//   $division->prints["match_label_allow_groups"] = "<label><b>" . ucfirst($cmr->translate("allow_groups")) . ":</b></label>";
//   $division->prints["match_function_allow_groups"] = cmrprint_select($cmr->get_conf("cmr_new_function"), "func_allow_groups", "");
//   $division->prints["match_input_allow_groups"] = show_hide("allow_groups", "begin") . "<select name=\"allow_groups\" id=\"allow_groups\"  onclick=\"large_id('imap,allow_groups')\">" . $cmr->print_select($cmr->get_conf("cmr_table_prefix") . "groups", "name", "column") . "</select>" . $cmr->module_link("modules/new_groups.php", "", "->") . show_hide("allow_groups", "end");
  

  $division->prints["match_label_comment"] = "<label><b>" . ucfirst($cmr->translate("comment")) . ":</b></label>";
  $division->prints["match_function_comment"] = cmrprint_select($cmr->get_conf("cmr_new_function"), "func_comment", "");
  $division->prints["match_input_comment"] = show_hide("comment", "begin") . "<textarea rows=\"8\" cols=\"40\" name=\"comment\" id=\"comment\" onclick=\"large_id('imap,comment')\"></textarea>" . show_hide("comment", "end");
  

  $division->prints["match_label_date_time"] = "";
  $division->prints["match_function_date_time"] = cmrprint_select($cmr->get_conf("cmr_new_function"), "func_date_time", "");
  $division->prints["match_input_date_time"] = "";
  

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_script_calendar"] = ""; // "@_script_calendar_@";


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


$division->prints["match_reset_form"] = $cmr->translate("confirm that you want to empty this form");
$division->prints["match_submit"] = $cmr->translate(" Save");
$division->prints["match_submit_java"] = $cmr->translate("confirm that you want send this mail");

$division->prints["match_close_tab"] = $lk->close_module_tab();
$division->prints["match_close_windows"] = $division->close(); 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if($cmr->action["todo"] == "update_imap"){
  $division->prints["match_match_value_encoding"] = "";
  $division->prints["match_match_value_lang"] = "";
  $division->prints["match_match_value_imap_from"] = "";
  $division->prints["match_match_value_imap_to"] = "";
  $division->prints["match_match_value_imap_cc"] = "";
  $division->prints["match_match_value_imap_bcc"] = "";
  $division->prints["match_match_value_imap_title"] = "";
  $division->prints["match_match_value_text"] = "";
}

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$file_list = array();
$file_list[] = $cmr->get_user("auth_user_path") . "templates/modules/template_imap" . $cmr->get_ext("template");
$file_list[] = $cmr->get_user("auth_group_path") . "templates/modules/template_imap" . $cmr->get_ext("template");
$file_list[] = $cmr->get_path("template") . "templates/modules/template_imap" . $cmr->get_ext("template");
$file_list[] = $cmr->get_path("template") . "templates/modules/auto/template_imap" . $cmr->get_ext("template");
if(!empty($cmr->config["template_" . $mod->base_name])) $file_list[] = $cmr->get_path("template") . $cmr->config["template_" . $mod->base_name];

$division->template = $division->load_template($file_list);
  
$division->print_template();
$division->prints = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!



// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
